<?php

namespace App\Services;

use App\helpers\Format;
use App\Models\Mobil;
use App\Models\Notifikasi;
use App\Models\pelanggan;
use App\Models\Penyewaan;
use App\Models\Rental;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class FrontService
{

    public static function getMobil()
    {
        $data = Mobil::with('rental')->limit(8)->get();

        return [
            'status' => true,
            'data' => $data
        ];
        // 
    }

    static function getCar($data)
    {
        // dd($data['latitude']);
        $validator = Validator::make($data, [
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        if ($validator->fails()) {
            return [
                'status' => false,
                'message' => $validator->errors()->first(),
            ];
        }

        $latitude = $data['latitude'];
        $longitude = $data['longitude'];
        $radius = 10;
        // $data = DetailUsers::where('latitude', 'like', '%' . '-6.3126432' . '%')->where('longitude', 'like', '%' . '106.8990464' . '%')->get();

        $data = Rental::with('mobil')->selectRaw("id, user_id, nama_rental, nama_pemilik, latitude, longitude,
                         ( 10000 * acos( cos( radians(?) ) *
                           cos( radians( latitude ) )
                           * cos( radians( longitude ) - radians(?)
                           ) + sin( radians(?) ) *
                           sin( radians( latitude ) ) )
                         ) AS distance", [$latitude, $longitude, $latitude])
            ->having("distance", "<", $radius)
            ->limit(20)
            ->get();

        if ($data->isEmpty()) {
            return [
                'status' => false,
                'message' => 'Tidak ada rental yang tersedia',
                'data' => null
            ];
        }

        if ($data[0]->mobil == null) {
            return [
                'status' => false,
                'message' => 'Tidak ada mobil yang tersedia',
                'data' => null
            ];
        }

        if ($data->isNotEmpty()) {
            return [
                'status' => true,
                'message' => 'Your request has been processed successfully',
                'data' => $data
            ];
        }

        return [
            'status' => false,
            'message' => 'Your request has been processed successfully',
            'data' => null
        ];
        // dd($data);
    }

    static function storeRegisterRental($data)
    {
        // 

        // dd($data);
        $validator = Validator::make($data, [
            'tipe' => 'required|in:rental,perorangan',
            'latitude' => 'required',
            'longitude' => 'required',
            'nama_rental' => 'required',
            'nama_pemilik' => 'required',
            'no_ijin_usaha' => 'required|numeric',
            'alamat_rental' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'foto_rental' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {

            // dd($validator->errors()->first());
            return [
                'status' => false,
                'message' => $validator->errors()->first(),
            ];
        }

        DB::beginTransaction();
        try {
            //code...

            if ($data['foto_rental']) {
                $image = $data['foto_rental'];
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/rental');
                $image->move($destinationPath, $name);
                $data['foto_rental'] = $name;
            }

            $user = User::create([
                'name' => $data['nama_pemilik'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                // 'is_active' => 0
            ]);

            $user->assignRole('rental');

            $rental = Rental::create([
                'user_id' => $user->id,
                'nama_pemilik' => $data['nama_pemilik'],
                'nama_rental' => $data['nama_rental'],
                'tipe' => $data['tipe'],
                'no_ijin_usaha' => $data['no_ijin_usaha'],
                'alamat' => $data['alamat_rental'],
                'latitude' => $data['latitude'],
                'longitude' => $data['longitude'],
                'foto_rental' => $name,
            ]);

            DB::commit();

            return  [
                'status' => true,
                'message' => 'Berhasil mendaftar, silahkan tunggu konfirmasi dari admin',
            ];
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return [
                'status' => false,
                'message' => $th->getMessage(),
            ];
        }
    }

    static function storeRegisterCust($data)
    {
        $validator = Validator::make($data, [
            'latitude' => 'required',
            'longitude' => 'required',
            'nama_lengkap' => 'required',
            'nik' => 'required|numeric',
            'alamat' => 'required',
            'no_telp' => 'required|numeric',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ktp' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            # code...
            return [
                'status' => false,
                'message' => $validator->errors()->first(),
            ];
        }

        DB::beginTransaction();

        try {

            if ($data['foto']) {
                $image = $data['foto'];
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/pelanggan');
                $image->move($destinationPath, $name);
                $data['foto'] = $name;
            }
            if ($data['ktp']) {
                $image = $data['ktp'];
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/pelanggan/ktp');
                $image->move($destinationPath, $name);
                $data['ktp'] = $name;
            }

            $user = User::create([
                'name' => $data['nama_lengkap'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'is_active' => '1'
            ]);

            $user->assignRole('user');

            pelanggan::create([
                'user_id' => $user->id,
                'nik' => $data['nik'],
                'nama_lengkap' => $data['nama_lengkap'],
                'alamat' => $data['alamat'],
                'no_telp' => $data['no_telp'],
                'latitude' => $data['latitude'],
                'longitude' => $data['longitude'],
                'foto' => $data['foto'],
                'ktp' => $data['ktp']
            ]);

            DB::commit();

            return [
                'status' => true,
                'message' => 'Berhasil mendaftar, silahkan Login',
            ];
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return [
                'status' => false,
                'message' => $th->getMessage(),
            ];
        }
    }

    static function getDetailMobil($mobil_id)
    {
        $data = Mobil::with('rental', 'rating')->where('id', $mobil_id)->first();

        // dd($data);
        return [
            'status' => true,
            'data' => $data
        ];
    }

    static function storeDetailMobil($data, $mobil_id)
    {
        // 
        $validator = Validator::make($data, [
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
        ]);

        if ($validator->fails()) {
            # code...
            return [
                'status' => false,
                'message' => $validator->errors()->first(),
            ];
        }

        DB::beginTransaction();

        try {


            $mobil = Mobil::with('rental')->where('id', $mobil_id)->first();
            // dd(Auth::user()->pelanggan);
            $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $data['tanggal_mulai'] . ' 00:00:00');
            $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $data['tanggal_selesai'] . ' 23:59:59');

            $diff_in_days = $to->diffInDays($from);

            // dd($diff_in_days);

            $sewa = Penyewaan::create([
                'mobil_id' => $mobil_id,
                'rental_id' => $mobil->rental->id,
                'customer_id' => Auth::user()->pelanggan->id,
                'supir_id' => null,
                'tanggal_mulai' => $data['tanggal_mulai'],
                'tanggal_selesai' => $data['tanggal_selesai'],
                'total_hari' => $diff_in_days,
                'harga' => $mobil->harga_sewa_mobil,
                'total_harga' => ($diff_in_days * $mobil->harga_sewa_mobil),
                'is_status' => 'Keranjang'
            ]);
            DB::commit();
            return [
                'status' => true,
                'message' => 'Berhasil menambahkan ke keranjang'
            ];
        } catch (\Throwable $th) {
            dd($th->getMessage());
            DB::rollback();
            return [
                'status' => false,
                'message' => $th->getMessage(),
            ];
        }
        // dd($mobil);
    }

    public function storeCheckout($data)
    {

        // dd($data);
        $validator = Validator::make($data, [
            'penyewaan_id' => 'required|exists:penyewaans,id',
            'nominal' => 'required|numeric',
            'channel_pembayaran' => 'required|in:Pembayaran Awal,Pelunasan',
            'cb' => 'required|in:on',
            // 'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            # code...
            return [
                'status' => false,
                'message' => $validator->errors()->first(),
            ];
        }

        DB::beginTransaction();
        try {

            $penyewaan = Penyewaan::with('rental', 'customer')->where('id', $data['penyewaan_id'])->where('is_status', 'Keranjang')->first();

            if (!$penyewaan) {
                return [
                    'status' => false,
                    'message' => 'Penyewaan tidak ditemukan'
                ];
            }

            // dd($penyewaan->customer);
            // dd($data);

            if ($data['channel_pembayaran'] == 'Pembayaran Awal') {

                if ($data['nominal'] < (($penyewaan->total_harga / 100) * 50)) {
                    // dd("50% dari total harga adalah " . (($penyewaan->total_harga / 100) * 50));
                    // return back()->withErrors('Nominal pembayaran awal minimal 50% dari total harga');
                    return [
                        'status' => false,
                        'message' => 'Nominal pembayaran awal minimal 50% dari total harga yaitu Rp.' . number_format(($penyewaan->total_harga / 100) * 50)
                    ];
                }
                // $data['nominal'] = $penyewaan->total_harga;
            } else {
                if ($data['nominal'] != $penyewaan->total_harga) {
                    return [
                        'status' => false,
                        'message' => 'Nominal pembayaran harus sama dengan total harga'
                    ];
                    // return back()->withErrors('Nominal pembayaran harus sama dengan total harga');
                }
            }

            // if ($data['bukti_pembayaran']) {
            //     $file = $data['bukti_pembayaran'];
            //     $nama_file = time() . "_" . $file->getClientOriginalName();
            //     $tujuan_upload = 'images/bukti_pembayaran';
            //     $file->move($tujuan_upload, $nama_file);
            // }

            $expiredDate = Carbon::now()->addHours(3);

            $invoice = 'INV-00' . ($penyewaan->id + 1) . '-' . Carbon::now()->format('Y');

            $update = Penyewaan::where('id', $data['penyewaan_id'])->update([
                'kd_invoice' => $invoice,
                'is_status' => 'Dalam Persiapan',
                'is_pembayaran' => $data['channel_pembayaran'] == 'Pelunasan' ? 'Lunas' : 'Belum Lunas',
                'pembayaran_awal' => $data['channel_pembayaran'] == 'Pembayaran Awal' ? $data['nominal'] : 0,
                'sisa_pembayaran' => $data['channel_pembayaran'] == 'Pembayaran Awal' ? ($penyewaan->total_harga - $data['nominal']) : 0,
                'total_pembayaran' => $data['channel_pembayaran'] == 'Pelunasan' ? $data['nominal'] : $data['nominal'],
                'is_location' => $data['is_location'],
                'fee' => ($penyewaan->total_harga * 0.1),
                'expired_date' => $expiredDate
                // 'bukti_pembayaran' => $nama_file
            ]);

            Notifikasi::create([
                'pengirim_id' => $penyewaan->customer->user_id,
                'penerima_id' => $penyewaan->rental->user_id,
                'judul_notifikasi' => 'Pemesanan ' . $penyewaan->mobil->nama_mobil . ' oleh ' . $penyewaan->customer->nama_lengkap,
                'deskripsi_notifikasi' => 'Pemesanan ' . $penyewaan->mobil->nama_mobil . ' oleh ' . $penyewaan->customer->nama_lengkap . ' dengan kode invoice ' . $invoice . ' telah berhasil dilakukan. Silahkan cek detail pemesanan di halaman order anda',
            ]);

            Format::whatsappMessage($penyewaan->customer->no_telp, 'Halo ' . $penyewaan->customer->nama . ', Terima kasih telah melakukan pemesanan di ' . $penyewaan->mobil->rental->nama_rental . '. Berikut adalah detail pemesanan anda : ' . PHP_EOL . 'Kode Invoice : ' . $invoice . PHP_EOL . 'Tanggal Mulai : ' . $penyewaan->tanggal_mulai . PHP_EOL . 'Tanggal Selesai : ' . $penyewaan->tanggal_selesai . PHP_EOL . 'Total Harga : Rp.' . number_format($penyewaan->total_harga) . PHP_EOL . 'Silahkan melakukan pembayaran sebesar Rp.' . number_format($data['nominal']) . ' ke nomor rekening ' . $penyewaan->rental->nama_bank . " -- " . $penyewaan->rental->no_rekening . ' a.n ' . $penyewaan->rental->nama_rekening . ' dan upload bukti pembayaran di menu pembayaran. Terima kasih');
            // Format::whatsappMessage($penyewaan->customer->no_telp, 'Halo ' . $penyewaan->customer->nama . ', Terima kasih telah melakukan pemesanan di ' . $penyewaan->mobil->rental->nama_rental . '. Berikut adalah detail pemesanan anda : ' . PHP_EOL . 'Kode Invoice : ' . $invoice . PHP_EOL . 'Tanggal Mulai : ' . $penyewaan->tanggal_mulai . PHP_EOL . 'Tanggal Selesai : ' . $penyewaan->tanggal_selesai . PHP_EOL . 'Total Harga : Rp.' . number_format($penyewaan->total_harga) . PHP_EOL . 'Silahkan melakukan pembayaran sebesar Rp.' . number_format($data['nominal']) . ' dan upload bukti pembayaran di menu pembayaran. Terima kasih');

            DB::commit();
            return [
                'status' => true,
                'message' => 'Berhasil melakukan pembayaran dengan kode invoice ' . $invoice
            ];
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            DB::rollback();
            return [
                'status' => false,
                'message' => $th->getMessage(),
            ];
        }
    }
}
