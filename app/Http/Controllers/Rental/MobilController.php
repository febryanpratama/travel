<?php

namespace App\Http\Controllers\Rental;

use App\Http\Controllers\Controller;
use App\Models\Kontrak;
use App\Models\Mobil;
use App\Models\Pengantaran;
use App\Models\Pengembalian;
use App\Models\Penyewaan;
use App\Models\Persyaratan;
use App\Models\Supir;
use App\Services\Rental\MobilService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class MobilController extends Controller
{
    //

    protected $mobilService;

    public function __construct(MobilService $mobilService)
    {
        $this->mobilService = $mobilService;
    }

    public function index()
    {
        $response = $this->mobilService->getMobil();

        $driver = Supir::where('rental_id', Auth::user()->rental->id)->get();
        return view('pages.back.rental.mobil.index', [
            'data' => $response['data'],
            'driver' => $driver
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // dd();
        $response = $this->mobilService->storeMobil($request->all());

        if (!$response['status']) {
            // dd($response['message']);
            return redirect()->back()->withErrors($response['message']);
        } else {
            return redirect()->back()->withSuccess($response['message']);
        }
    }

    public function editMobil(Request $request)
    {

        // dd($request->all());
        $response = $this->mobilService->getMobilById($request->all());

        return back()->withSuccess($response['message']);
    }
    public function indexKontrak()
    {
        // $response = $this->mobilService->getMobilById($id);
        $data = Kontrak::where('rental_id', Auth::user()->rental->id)->get();

        return view('pages.back.rental.kontrak.index', [
            'data' => $data
        ]);
    }

    public function storeKontrak(Request $request)
    {
        $response = $this->mobilService->storeKontrak($request->all());

        if (!$response['status']) {
            # code...
            return redirect()->back()->withErrors($response['message']);
        } else {
            return redirect()->back()->withSuccess($response['message']);
        }
    }

    public function indexPersyaratan()
    {
        $data = Persyaratan::where('rental_id', Auth::user()->rental->id)->get();

        return view('pages.back.rental.persyaratan.index', [
            'data' => $data
        ]);
    }
    public function storePersyaratan(Request $request)
    {

        // dd($request->all());
        $response = $this->mobilService->storePersyaratan($request->all());

        if (!$response['status']) {
            # code...
            return redirect()->back()->withErrors($response['message']);
        } else {
            return redirect()->back()->withSuccess($response['message']);
        }
    }

    public function indexOrders()
    {
        $response = $this->mobilService->getOrders();

        return view('pages.back.rental.orders.index', [
            'data' => $response['data']
        ]);
    }


    public function getDistance(Request $request)
    {
        $url = 'https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins=' . $request->lator . ',' . $request->longor . '&destinations=' . $request->latde . ',' . $request->longde . '&key=AIzaSyDbOpBHYiou-5YwdLAN6yLg554NwQ8ciSc';
        // dd($url);
        $response = Http::get($url);
        $response = json_decode($response, true);
        // dd($response);
        $distance = $response['rows'][0]['elements'][0]['distance']['text'];
        $time = $response['rows'][0]['elements'][0]['duration']['text'];

        // dd($distance);

        return $distance . " - " . $time;
    }

    public function detailOrders($id)
    {
        // dd($id);
        $response = $this->mobilService->getDetailOrders($id);

        if (!$response['status']) {
            return redirect()->back()->withErrors($response['message']);
        } else {
            return view('pages.back.rental.orders.detail-order', [
                'data' => $response['data']
            ]);
        }
    }

    public function detailOrderPersiapan(Request $request, $order_id)
    {
        // dd($order_id);
        $body = $request->all();
        $data = Penyewaan::with('mobil', 'rental', 'customer')->whereNotIn('is_status', ['Keranjang'])->where('id', $order_id)->first();

        if (!$data) {
            return back()->withErrors('Data tidak ditemukan');
        } else {
            DB::beginTransaction();

            try {
                $data->update([
                    'is_status' => 'Dalam Pengantaran'
                ]);

                Pengantaran::create([
                    'penyewaan_id' => $data->id,
                    'keterangan' => $body['keterangan'],
                    'tanggal_pengantaran' => Carbon::now(),
                ]);

                DB::commit();
                return back()->withSuccess('Berhasil mengubah status');
            } catch (\Exception $e) {
                DB::rollback();
                return back()->withErrors($e->getMessage());
            }
        }
    }
    public function detailOrderPengantaran(Request $request, $order_id)
    {
        // dd($order_id);
        $data = Penyewaan::with('mobil', 'rental', 'customer')->whereNotIn('is_status', ['Keranjang'])->where('id', $order_id)->first();

        if (!$data) {
            # code...
            return back()->withErrors('Data tidak ditemukan');
        } else {
            DB::beginTransaction();

            try {
                $data->update([
                    'is_status' => 'Sedang Digunakan'
                ]);

                DB::commit();
                return back()->withSuccess('Berhasil mengubah status');
            } catch (\Exception $e) {
                DB::rollback();
                return back()->withErrors($e->getMessage());
            }
        }
    }

    public function detailOrderDikembalikan(Request $request, $id)
    {
        $body = $request->all();
        $data = Penyewaan::with('mobil', 'rental', 'customer')->whereNotIn('is_status', ['Keranjang'])->where('id', $id)->first();

        if (!$data) {
            # code...
            return back()->withErrors('Data tidak ditemukan');
        } else {
            DB::beginTransaction();

            try {
                $data->update([
                    'is_status' => 'Sudah Dikembalikan',
                    'denda' => $body['denda'] == null ?  $body['denda'] : 0,
                    'keterangan' => $body['keterangan'] == null ?  $body['keterangan'] : null,
                ]);

                Pengembalian::create([
                    'penyewaan_id' => $data->id,
                    'keterangan' => $request->keterangan,
                    'tanggal_pengembalian' => Carbon::now(),
                ]);

                DB::commit();
                return back()->withSuccess('Berhasil Menyelesaikan Order');
            } catch (\Exception $e) {
                DB::rollback();
                return back()->withErrors($e->getMessage());
            }
        }
    }


    public function indexSupir()
    {
        $data = Supir::where('rental_id', Auth::user()->rental->id)->get();

        // dd($data);
        return view('pages.back.rental.supir.index', [
            'data' => $data
        ]);
    }

    public function storeSupir(Request $request)
    {
        // dd($request->all());
        $response = $this->mobilService->storeSupir($request->all());

        if (!$response['status']) {
            # code...
            return redirect()->back()->withErrors($response['message']);
        } else {
            return redirect()->back()->withSuccess($response['message']);
        }
    }

    public function addSupir(Request $request, $mobil_id)
    {
        $validator = Validator::make($request->all(), [
            'supir_id' => 'required|exists:supirs,id',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        $data = Mobil::where('id', $mobil_id)->first();

        $data->update([
            'supir_id' => $request->supir_id
        ]);

        return back()->withSuccess('Berhasil menambahkan supir');
    }
}
