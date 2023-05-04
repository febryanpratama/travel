<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Penyewaan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function indexMobil()
    {
        $data = Mobil::with('rental')->get();

        return view('pages.back.admin.list-mobil', [
            'data' => $data
        ]);
    }

    public function indexOrder()
    {
        $data = Penyewaan::with('rental', 'customer')->whereNotIn('is_status', ['Keranjang'])->get();

        return view('pages.back.admin.list-order', [
            'data' => $data
        ]);
    }

    public function detailOrder($order_id)
    {
        $data = Penyewaan::with('rental',  'customer', 'pengantaran', 'pengembalian')->where('id', $order_id)->first();

        // dd($data);
        if (!$data) {
            return back()->withErrors('Data Tidak Ditemukan');
        }

        return view('pages.back.admin.detail-order', [
            'data' => $data
        ]);
    }
}
