<?php

namespace App\Http\Controllers;

use App\Models\Penyewaan;
use App\Models\Rental;
use App\Services\FrontService;
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

        // dd($response);
        return view('pages.front.landing', [
            'data' => $response['data'],
        ]);
    }

    public function register()
    {
        return view('pages.front.auth.register');
    }

    public function registerPost()
    {
        $response = $this->frontService->storeRegisterRental(request()->all());

        if (!$response['status']) {
            // dd($response['message']);
            return redirect()->back()->withErrors($response['message']);
        } else {
            return redirect('/login')->withSuccess($response['message']);
        }
    }

    public function registerPostCust(Request $request)
    {
        // dd($request->all());
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

        // dd($response);
        return view('pages.front.detail', [
            'data' => $response['data'],
        ]);
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
                return redirect('/')->withSuccess($response['message']);
            }
        }
    }

    public function indexCart()
    {
        // dd(Auth::user());
        if (!Auth::user()) {
            return redirect('/login')->withErrors('Silahkan Login Sebagai User');
        }
        $data = Penyewaan::with('mobil', 'rental', 'customer')->where('customer_id', Auth::user()->pelanggan->id)->where('is_status', 'Keranjang')->where('is_pembayaran', 'Belum Dibayar')->get();

        return view('pages.front.cart', [
            'data' => $data
        ]);
    }


    public function detailCart($id)
    {
        $data = Penyewaan::with('mobil', 'rental', 'customer')->where('id', $id)->first();

        // dd($data);
        if (!$data) {
            # code...
            return redirect('/')->withErrors('Data Tidak Ditemukan');
        }
        return view('pages.front.detailcart', [
            'data' => $data
        ]);
    }

    public function checkout(Request $request)
    {
        // dd($request->all());

        $response = $this->frontService->storeCheckout($request->all());

        if (!$response) {
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
}
