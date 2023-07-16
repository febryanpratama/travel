<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Pelanggan;
use App\Models\Penyewaan;
use App\Models\Rental;
use App\Models\User;
use App\Services\FrontService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    //

    protected $frontService;
    public function __construct(FrontService $frontService)
    {
        $this->frontService = $frontService;
    }

    public function index()
    {
        $response = $this->frontService->getMobil();

        // $auth = Auth::user();

        if (Auth::user()) {
            // return redirect('/login')->withErrors('Silahkan Login Sebagai User');
            $pelanggan = Pelanggan::where('user_id', Auth::user()->id)->first();

            if ($pelanggan) {
                $latitude = $pelanggan->latitude;
                $longitude = $pelanggan->longitude;
            } else {
                $latitude = null;
                $longitude = null;
            }
        } else {
            $latitude = null;
            $longitude = null;
        }
        // if ($auth == null) {
        //     # code...
        // } else {
        //     $auth = true;
        //     $latitude = Auth::user()->Pelanggan->latitude;
        //     $longitude = Auth::user()->Pelanggan->longitude;
        // }
        // dd($response);
        return view('pages.front.landing', [
            'data' => $response['data'],
            'latitude' => $latitude,
            'longitude' => $longitude,
        ]);
    }

    public function cariMobil()
    {

        if (Auth::user()) {
            // return redirect('/login')->withErrors('Silahkan Login Sebagai User');
            $pelanggan = Pelanggan::where('user_id', Auth::user()->id)->first();

            if ($pelanggan) {
                $latitude = $pelanggan->latitude;
                $longitude = $pelanggan->longitude;
            } else {
                $latitude = null;
                $longitude = null;
            }
        } else {
            $latitude = null;
            $longitude = null;
        }

        // dd($pelanggan);

        return view('pages.front.carimobil', [
            'latitude' => $latitude,
            'longitude' => $longitude,
            'data' => null
        ]);
    }

    public function postMobil(Request $request)
    {
        // dd($request->all());

        $nama_mobil = $request->nama_mobil;
        // dd()
        $data = Mobil::where('nama_mobil', 'like', "%{$nama_mobil}%")->where('status_mobil', 'tersedia')->get();
        // dd($data);

        return view('pages.front.carimobil', [
            'data' => $data,
        ]);
        // dd($data);
    }
    public function tentangkami()
    {
        return view('pages.front.tentangkami');
    }

    public function register()
    {
        return view('pages.front.auth.register');
    }

    public function registerPost(Request $request)
    {
        // dd($request->all());

        $response = $this->frontService->storeRegisterRental($request->all());

        if (!$response['status']) {
            // dd($response['message']);
            return back()->withErrors($response['message']);
        } else {
            return redirect('/login')->withSuccess($response['message']);
        }
    }

    public function registerPostCust(Request $request)
    {
        $response = $this->frontService->storeRegisterCust($request->all());
        if (!$response['status']) {
            // dd($response['message']);
            return redirect()->back()->withErrors($response['message']);
        } else {
            return redirect('/login')->withSuccess($response['message']);
        }
    }

    public function registerCust()
    {
        return view('pages.front.auth.registercust');
    }

    public function detail($id)
    {
        $response = $this->frontService->getDetailMobil($id);

        if (Auth::user()) {
            // return redirect('/login')->withErrors('Silahkan Login Sebagai User');
            $pelanggan = Pelanggan::where('user_id', Auth::user()->id)->first();

            if ($pelanggan) {
                $latitude = $pelanggan->latitude;
                $longitude = $pelanggan->longitude;
            } else {
                $latitude = null;
                $longitude = null;
            }
        } else {
            $latitude = null;
            $longitude = null;
        }
        if (!$response['status']) {
            return back()->withErrors($response['message']);
        } else {
            return view('pages.front.detail', [
                'data' => $response['data'],
                'latitude' => $latitude,
                'longitude' => $longitude,
            ]);
        }
    }
    public function getCar(Request $request)
    {
        $response = $this->frontService->getCar($request->all());

        // dd($response);
        if ($response['status']) {
            return view('pages.front.list', ['data' => $response['data']]);
        } else {
            return view('pages.front.list', ['data' => []]);
        }
    }

    public function detailPost(Request $request, $mobil_id)
    {
        // dd($request->all());
        // dd(Auth::user()->roles->pluck('name')[0]);
        if (!Auth::user()) {
            return redirect('/login')->withErrors('Silahkan Login Sebagai User');
        }
        if (Auth::user()->roles->pluck('name')[0] != 'user') {
            // "belum login";
            return back()->withErrors('Silahkan Login Sebagai User');
        } else {

            $response = $this->frontService->storeDetailMobil($request->all(), $mobil_id);
            // dd($request->all());

            if (!$response['status']) {
                return back()->withErrors($response['message']);
            } else {
                return redirect('/cart')->withSuccess($response['message']);
            }
        }
    }

    public function detailRental($rental_id)
    {
        // dd($rental_id);

        $response = Mobil::with('rental')->where('rental_id', $rental_id)->get();

        if ($response->isEmpty()) {
            return back()->withErrors('Data Tidak Ditemukan');
        }
        return view('pages.front.detailrental', [
            'data' => $response
        ]);
    }
    public function indexCart()
    {
        // dd(Auth::user());
        if (!Auth::user()) {
            return redirect('/login')->withErrors('Silahkan Login Sebagai User');
        }
        $data = Penyewaan::with('mobil', 'mobil.supir', 'rental', 'customer')->where('customer_id', Auth::user()->pelanggan->id)->where('is_status', 'Keranjang')->where('is_pembayaran', 'Belum Dibayar')->get();

        return view('pages.front.cart', [
            'data' => $data
        ]);
    }


    public function detailCart($id)
    {
        $data = Penyewaan::with('mobil', 'rental', 'customer', 'rental.syarat', 'rental.kontrak')->where('id', $id)->first();

        // dd($data);
        if (!$data) {
            # code...
            return redirect('/')->withErrors('Data Tidak Ditemukan');
        }
        return view('pages.front.detailcart', [
            'data' => $data
        ]);
    }

    public function hapusCart($id)
    {
        $data = Penyewaan::where('id', $id)->first();

        if (!$data) {
            return back()->withErrors('Data Tidak Ditemukan');
        }

        $data->delete();

        return back()->withSuccess('Data Keranjang Berhasil Dihapus');
    }

    public function checkout(Request $request)
    {
        // dd($request->all());

        $response = $this->frontService->storeCheckout($request->all());

        if (!$response['status']) {
            return redirect()->back()->withErrors($response['message']);
        } else {
            return redirect('/')->withSuccess($response['message']);
        }
    }


    public function syaratKetentuan($rental_id)
    {
        $data = Rental::with('syarat', 'kontrak')->where('id', $rental_id)->first();

        // dd($data);

        if (!$data) {
            return back()->withErrors('Data Tidak Ditemukan');
        }

        // dd($data);

        return view('pages.front.syaratketentuan', [
            'data' => $data
        ]);
    }


    public function forgotPassword()
    {
        return view('pages.front.auth.forgotpassword');
    }

    public function checkMail(Request $request)
    {
        // $response = $this->frontService->checkMail($request->all());/

        $email = User::where('email', $request->email)->first();

        if (!$email) {
            return response()->json([
                'status' => false,
                'message' => 'Email Tidak Ditemukan'
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Email Ditemukan'
        ]);
    }

    public function storeforgotPassword(Request $request)
    {
        // dd($request->all());
        $email = User::where('email', $request->email)->first();

        if (!$email) {
            return redirect()->back()->withErrors('Email Tidak Ditemukan');
        }

        $email->update([
            'password' => bcrypt($request->password)
        ]);

        return redirect('/login')->withSuccess('Berhasil Merubah Password anda. Silahkan Login Kembali');
    }

    public function cekExpiredPenyewaan()
    {
        $data = Penyewaan::where('bukti_pembayaran', null)->get();

        foreach ($data as $key => $value) {
            $date = Carbon::parse($value->expired_date);
            $now = Carbon::now();

            if ($date->diffInHours($now) < 3) {
                // dd("ada");
                $value->update([
                    'is_pembayaran' => 'Expired'
                ]);
            }
            // else {
            //     dd("tidak ada");
            // }
        }
    }
}
