<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Mobil;
use App\Models\Penyewaan;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //
    public function indexMobil()
    {
        $data = Mobil::with('rental')->get();

        $rental = Rental::with('auth')->whereRelation('auth', 'is_active', '1')->get();

        return view('pages.back.admin.list-mobil', [
            'data' => $data,
            'rental' => $rental
        ]);
    }

    public function indexFee()
    {
        $data = Fee::with('rental')->get();

        // dd($data);
        return view('pages.back.admin.fee', [
            'data' => $data
        ]);
    }

    public function storeMobil(Request $request)
    {
        $data = $request->all();

        // dd($data);

        $validator = Validator::make($data, [
            'rental_id' => 'required|exists:rentals,id',
            'tipe_mobil' => 'required',
            'merk_mobil' => 'required',
            'nama_mobil' => 'required',
            'transmisi_mobil' => 'required',
            'kapasitas_mobil' => 'required',
            'warna_mobil' => 'required',
            'jenis_bbm' => 'required',
            'fasilitas_mobil' => 'required',
            'plat_mobil' => 'required',
            'harga_sewa_mobil' => 'required|numeric',
            'foto_mobil' => 'required',
            'keterangan_mobil' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors()->first());
        }


        if ($data['foto_mobil']) {
            # code...
            $foto_mobil = $data['foto_mobil'];
            $foto_mobil_name = time() . $foto_mobil->getClientOriginalName();
            $foto_mobil->move('images/mobil', $foto_mobil_name);
            $data['foto_mobil'] = $foto_mobil_name;
        }

        $mobil = Mobil::create([
            'rental_id' => $data['rental_id'],
            'tipe_mobil' => $data['tipe_mobil'],
            'merk_mobil' => $data['merk_mobil'],
            'nama_mobil' => $data['nama_mobil'],
            'transmisi_mobil' => $data['transmisi_mobil'],
            'kapasitas_mobil' => $data['kapasitas_mobil'],
            'warna_mobil' => $data['warna_mobil'],
            'jenis_bbm' => $data['jenis_bbm'],
            'fasilitas_mobil' => $data['fasilitas_mobil'],
            'plat_mobil' => $data['plat_mobil'],
            'harga_sewa_mobil' => $data['harga_sewa_mobil'],
            'foto_mobil' => $data['foto_mobil'],
            'keterangan_mobil' => $data['keterangan_mobil'],
            'status_mobil' => 'tersedia',
        ]);

        return back()->withSuccess('Data Berhasil Ditambahkan');
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

    public function syaratketentuan($order_id)
    {
        $data = Penyewaan::with('rental', 'mobil', 'customer', 'rental.syarat', 'rental.kontrak')->where('id', $order_id)->first();

        // dd($data);

        if (!$data) {
            return back()->withErrors('Data Tidak Ditemukan');
        }

        // dd($data);

        return view('pages.back.admin.syaratketentuan', [
            'data' => $data
        ]);
    }
}
