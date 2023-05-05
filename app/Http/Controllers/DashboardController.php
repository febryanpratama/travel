<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Pelanggan;
use App\Models\Penyewaan;
use App\Models\Rental;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $roles = Auth::user()->roles->pluck('name');

        // dd($roles);

        if ($roles[0] == 'admin') {

            $rental = Rental::with('auth')->whereRelation('auth', 'is_active', '1')->count();
            $pelanggan = Pelanggan::with('user')->count();
            $orderTotal = Penyewaan::whereNotIn('is_status', ['keranjang'])->whereYear('created_at', Carbon::now()->year)->count();
            $orderberjalan = Penyewaan::whereNotIn('is_status', ['keranjang', 'selesai'])->whereYear('created_at', Carbon::now()->year)->count();
            $orderSelesai = Penyewaan::where('is_status', 'selesai')->whereYear('created_at', Carbon::now()->year)->count();
            $mobil = Mobil::count();

            $order = Penyewaan::with('mobil', 'rental')->whereNotIn('is_status', ['keranjang'])->whereYear('created_at', Carbon::now()->year)->orderByDESC('created_at')->get()->take(5);

            return view('pages.back.dashboard', [
                'rental' => $rental,
                'pelanggan' => $pelanggan,
                'ordertotal' => $orderTotal,
                'orderselesai' => $orderSelesai,
                'order' => $order,
                'orderberjalan' => $orderberjalan,
                'mobil' => $mobil
            ]);
        } else if ($roles[0] == 'rental') {
            // $rental = Rental::with('auth')->whereRelation('auth', 'is_active', '1')->count();
            // $pelanggan = Pelanggan::with('user')->count();

            $mobil = Mobil::where('rental_id', Auth::user()->rental->id)->count();
            $orderTotal = Penyewaan::whereNotIn('is_status', ['keranjang'])->where('rental_id', Auth::user()->rental->id)->whereYear('created_at', Carbon::now()->year)->count();
            $orderberjalan = Penyewaan::whereNotIn('is_status', ['keranjang', 'selesai'])->where('rental_id', Auth::user()->rental->id)->whereYear('created_at', Carbon::now()->year)->count();
            $orderSelesai = Penyewaan::where('is_status', 'selesai')->where('rental_id', Auth::user()->rental->id)->whereYear('created_at', Carbon::now()->year)->count();

            $order = Penyewaan::with('mobil', 'rental')->where('rental_id', Auth::user()->rental->id)->whereNotIn('is_status', ['keranjang'])->whereYear('created_at', Carbon::now()->year)->orderByDESC('created_at')->get()->take(5);

            return view('pages.back.dashboard', [
                'ordertotal' => $orderTotal,
                'orderselesai' => $orderSelesai,
                'order' => $order,
                'orderberjalan' => $orderberjalan,
                'mobil' => $mobil
            ]);
        } else {
            $orderTotal = Penyewaan::whereNotIn('is_status', ['keranjang'])->where('rental_id', Auth::user()->Pelanggan->id)->whereYear('created_at', Carbon::now()->year)->count();
            $orderberjalan = Penyewaan::whereNotIn('is_status', ['keranjang', 'selesai'])->where('rental_id', Auth::user()->Pelanggan->id)->whereYear('created_at', Carbon::now()->year)->count();
            $orderSelesai = Penyewaan::where('is_status', 'selesai')->where('rental_id', Auth::user()->Pelanggan->id)->whereYear('created_at', Carbon::now()->year)->count();
            $order = Penyewaan::with('mobil', 'rental')->where('rental_id', Auth::user()->Pelanggan->id)->whereNotIn('is_status', ['keranjang'])->whereYear('created_at', Carbon::now()->year)->orderByDESC('created_at')->get()->take(5);

            return view('pages.back.dashboard', [
                'ordertotal' => $orderTotal,
                'orderselesai' => $orderSelesai,
                'order' => $order,
                'orderberjalan' => $orderberjalan,
            ]);
        }
    }
}
