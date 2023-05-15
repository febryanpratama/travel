<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\Pengantaran;
use App\Models\Penyewaan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //

    public function indexOrders()
    {

        $data = Penyewaan::with('mobil', 'rental', 'customer')->where('customer_id', Auth::user()->Pelanggan->id)->whereNotIn('is_status', ['Keranjang'])->get();

        // dd($data);
        return view('pages.back.user.order', [
            'data' => $data
        ]);
    }

    public function detailOrders($id)
    {
        $data = Penyewaan::with('mobil', 'rental', 'customer', 'pengantaran', 'pengembalian')->where('customer_id', Auth::user()->Pelanggan->id)->whereNotIn('is_status', ['Keranjang'])->where('id', $id)->first();

        if (!$data) {
            # code...
            return back()->withErrors('Data tidak ditemukan');
        } else {
            return view('pages.back.user.detail-order', [
                'data' => $data
            ]);
        }
    }

    public function  detailOrderDigunakan($id)
    {
        $data = Penyewaan::with('mobil', 'rental', 'customer', 'pengantaran', 'pengembalian')->where('id', $id)->first();

        if (!$data) {
            # code...
            return back()->withErrors('Data tidak ditemukan');
        } else {
            $data->update([
                'is_status' => 'Selesai Digunakan'
            ]);

            return back()->withSuccess('Berhasil mengubah status');
        }
    }
    public function indexProfile()
    {

        $data = Pelanggan::with('user')->where('user_id', Auth::user()->id)->first();

        return view('pages.back.user.profile', [
            'data' => $data
        ]);
    }
}
