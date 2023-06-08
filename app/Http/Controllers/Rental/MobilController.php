<?php

namespace App\Http\Controllers\Rental;

use App\helpers\Format;
use App\Http\Controllers\Controller;
use App\Models\Kontrak;
use App\Models\Mobil;
use App\Models\Notifikasi;
use App\Models\Pengantaran;
use App\Models\Pengembalian;
use App\Models\Penyewaan;
use App\Models\Persyaratan;
use App\Models\Rental;
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

    public function getRent()
    {
        $response = Rental::with('auth')->whereRelation('auth', 'is_active', '1')->get();

        return response()->json([
            'status' => true,
            'message' => 'Data rental berhasil diambil',
            'data' => $response
        ]);
    }

    public function getCars()
    {
        $response = Mobil::with('rental', 'rental.auth')->whereRelation('rental.auth', 'is_active', '1')->get();

        // dd($response);
        return response()->json([
            'status' => true,
            'message' => 'Data mobil berhasil diambil',
            'data' => $response
        ]);
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

                Notifikasi::create([
                    'pengirim_id' => Auth::user()->id,
                    'penerima_id' => $data->customer->user_id,
                    'judul_notifikasi' => 'Mobil Sedang Diantar oleh ' . $data->rental->nama_rental,
                    'deskripsi_notifikasi' => 'Mobil Sedang Diantar oleh ' . $data->rental->nama_rental . ' dengan keterangan ' . $body['keterangan'],
                ]);

                Format::whatsappMessage($data->customer->no_telp, 'Pengantaran Mobil dari rental ' . $data->rental->nama_rental . ' telah diterima oleh driver. Silahkan menunggu konfirmasi selanjutnya. Terima kasih');

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
        // dd($request->all());
        $data = Penyewaan::with('mobil', 'rental', 'customer')->whereNotIn('is_status', ['Keranjang'])->where('id', $order_id)->first();

        if (!$data) {
            # code...
            return back()->withErrors('Data tidak ditemukan');
        } else {
            DB::beginTransaction();

            try {

                if ($request['is_status'] == 'Disetujui') {
                    $data->update([
                        'is_status' => 'Sedang Digunakan'
                    ]);

                    Format::whatsappMessage($data->customer->no_telp, 'Pengantaran Mobil dari rental ' . $data->rental->nama_rental . ' telah diterima. Silahkan menunggu konfirmasi selanjutnya. Terima kasih');
                    Notifikasi::create([
                        'pengirim_id' => Auth::user()->id,
                        'penerima_id' => $data->customer->user_id,
                        'judul_notifikasi' => 'Mobil telah Diantar oleh ' . $data->rental->nama_rental,
                        'deskripsi_notifikasi' => 'Mobil telahj Diantar oleh ' . $data->rental->nama_rental . ' dan siap digunakan oleh anda',
                    ]);
                } else {
                    $data->update([
                        'is_status' => 'Ditolak',
                        'keterangan' => $request['keterangan']
                    ]);
                    Notifikasi::create([
                        'pengirim_id' => Auth::user()->id,
                        'penerima_id' => $data->customer->user_id,
                        'judul_notifikasi' => 'Pengantaran Mobil dari ' . $data->rental->nama_rental . ' ditolak',
                        'deskripsi_notifikasi' => 'Pengantaran Mobil dari ' . $data->rental->nama_rental . ' ditolak dengan keterangan ' . $request['keterangan'],
                    ]);

                    Format::whatsappMessage($data->customer->no_telp, 'Pengantaran Mobil dari rental ' . $data->rental->nama_rental . ' ditolak. Silahkan menunggu konfirmasi selanjutnya. Terima kasih');
                }

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

                Notifikasi::create([
                    'pengirim_id' => Auth::user()->id,
                    'penerima_id' => $data->customer->user_id,
                    'judul_notifikasi' => 'Mobil telah Dikembalikan kepada ' . $data->rental->nama_rental,
                    'deskripsi_notifikasi' => 'Mobil telah Dikembalikan kepada ' . $data->rental->nama_rental . ' dengan keterangan ' . $body['keterangan'],
                ]);

                Format::whatsappMessage($data->customer->no_telp, 'Mobil dari rental ' . $data->rental->nama_rental . ' telah dikembalikan. Terima kasih telah menggunakan layanan kami.');

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

    public function editSupir(Request $request, $supir_id)
    {
        // dd
        $supir = Supir::where('id', $supir_id)->first();

        if (!$supir) {
            return back()->withErrors('Data Supir tidak ditemukan');
        }

        if (array_key_exists('foto', $request->all())) {

            $image = $request->file('foto');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/supir');
            $image->move($destinationPath, $name);

            $supir->update([
                'foto' => $name
            ]);
        }

        $supir->update([
            'nama_supir' => $request['nama_supir'],
            'no_hp' => $request['no_hp'],
            'alamat' => $request['alamat'],
        ]);

        return back()->withSuccess('Data Supir Berhasil Diubah');
    }

    public function hapusSupir($supir_id)
    {
        $supir = Supir::where('id', $supir_id)->first();

        if (!$supir) {
            return back()->withErrors('Data Supir tidak ditemukan');
        }

        $supir->delete();

        return back()->withSuccess('Data Supir berhasil Dihapus');
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

    public function indexProfile()
    {
        // dd('asd');

        $data = Rental::with('auth')->where('id', Auth::user()->rental->id)->first();

        // dd($data);
        return view('pages.back.rental.profil', [
            'data' => $data
        ]);
    }

    public function storeProfile(Request $request)
    {
        // dd($request->all());

        $response = $this->mobilService->storeProfile($request->all());

        if (!$response['status']) {
            # code...
            return redirect()->back()->withErrors($response['message']);
        } else {
            return redirect()->back()->withSuccess($response['message']);
        }
    }
}
