<?php

namespace App\Services\Rental;

use App\Models\Kontrak;
use App\Models\Mobil;
use App\Models\Penyewaan;
use App\Models\Persyaratan;
use App\Models\Supir;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MobilService
{
    //
    static function getMobil()
    {
        $mobil = Mobil::with('rental')->where('rental_id', Auth::user()->rental->id)->get();

        // dd($mobil);
        return [
            'status' => true,
            'message' => 'Data Mobil berhasil diambil',
            'data' => $mobil,
        ];
    }

    static function storeMobil($data)
    {
        $validator = Validator::make($data, [
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
            return [
                'status' => false,
                'message' => $validator->errors()->first(),
            ];
        }


        if ($data['foto_mobil']) {
            # code...
            $foto_mobil = $data['foto_mobil'];
            $foto_mobil_name = time() . $foto_mobil->getClientOriginalName();
            $foto_mobil->move('images/mobil', $foto_mobil_name);
            $data['foto_mobil'] = $foto_mobil_name;
        }

        $mobil = Mobil::create([
            'rental_id' => Auth::user()->rental->id,
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

        return [
            'status' => true,
            'message' => 'Mobil berhasil ditambahkan',
        ];
    }

    static function storeKontrak($data)
    {
        $validator = Validator::make($data, [
            'perjanjian' => 'required|mimes:pdf|max:2048',
            'keterangan' => 'required',
        ]);

        if ($validator->fails()) {
            # code...
            return [
                'status' => false,
                'message' => $validator->errors()->first(),
            ];
        }

        if ($data['perjanjian']) {
            $perjanjian = $data['perjanjian'];
            $perjanjian_name = time() . $perjanjian->getClientOriginalName();
            $perjanjian->move('files/perjanjian', $perjanjian_name);
            $data['perjanjian'] = $perjanjian_name;
        }

        $kontrak = Kontrak::create([
            'rental_id' => Auth::user()->rental->id,
            'perjanjian' => $data['perjanjian'],
            'keterangan' => $data['keterangan'],
        ]);

        return [
            'status' => true,
            'message' => 'Kontrak berhasil ditambahkan',
        ];
    }

    static function storePersyaratan($data)
    {
        $validator = Validator::make($data, [
            'persyaratan' => 'required|mimes:pdf|max:2048',
            'keterangan' => 'required',
        ]);

        if ($validator->fails()) {
            # code...

            dd($validator->errors()->first());
            return [
                'status' => false,
                'message' => $validator->errors()->first(),
            ];
        }

        if ($data['persyaratan']) {
            $persyaratan = $data['persyaratan'];
            $persyaratan_name = time() . $persyaratan->getClientOriginalName();
            $persyaratan->move('files/persyaratan', $persyaratan_name);
            $data['persyaratan'] = $persyaratan_name;
        }

        Persyaratan::create([
            'rental_id' => Auth::user()->rental->id,
            'persyaratan' => $data['persyaratan'],
            'keterangan' => $data['keterangan'],
        ]);

        return [
            'status' => true,
            'message' => 'Persyaratan berhasil ditambahkan',
        ];
    }


    static function getOrders()
    {

        $orders = Penyewaan::with('mobil', 'rental', 'customer')->where('rental_id', Auth::user()->rental->id)->whereNotIn('is_status', ['Keranjang'])->get();
        return [
            'status' => true,
            'message' => 'Data Order berhasil diambil',
            'data' => $orders,
        ];
    }

    static function getDetailOrders($order_id)
    {
        $order = Penyewaan::with('mobil', 'rental', 'customer')->where('rental_id', Auth::user()->rental->id)->where('id', $order_id)->first();

        if (!$order) {
            # code...
            return [
                'status' => false,
                'message' => 'Data Order tidak ditemukan',
            ];
        }
        return [
            'status' => true,
            'message' => 'Data Order berhasil diambil',
            'data' => $order,
        ];
    }

    static function storeSupir($data)
    {
        $validator = Validator::make($data, [
            'nama_supir' => 'required',
            'foto' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        if ($validator->fails()) {
            return [
                'status' => false,
                'message' => $validator->errors()->first(),
            ];
        }

        if ($data['foto']) {
            $foto = $data['foto'];
            $foto_name = time() . $foto->getClientOriginalName();
            $foto->move('images/supir', $foto_name);
            $data['foto'] = $foto_name;
        }

        Supir::create([
            'rental_id' => Auth::user()->rental->id,
            'nama_supir' => $data['nama_supir'],
            'foto' => $data['foto'],
            'no_hp' => $data['no_hp'],
            'alamat' => $data['alamat'],
        ]);

        return [
            'status' => true,
            'message' => 'Data Supir berhasil ditambahkan',
        ];
    }
}
