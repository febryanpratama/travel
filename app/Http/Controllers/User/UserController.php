<?php

namespace App\Http\Controllers\User;

use App\helpers\Format;
use App\Http\Controllers\Controller;
use App\Models\Notifikasi;
use App\Models\Pelanggan;
use App\Models\Pengantaran;
use App\Models\Penyewaan;
use App\Models\Rating;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
        $data = Penyewaan::with('mobil', 'mobil.supir', 'rental', 'customer', 'pengantaran', 'pengembalian')->where('customer_id', Auth::user()->Pelanggan->id)->whereNotIn('is_status', ['Keranjang'])->where('id', $id)->first();

        if (!$data) {
            # code...
            return back()->withErrors('Data tidak ditemukan');
        } else {
            return view('pages.back.user.detail-order', [
                'data' => $data
            ]);
        }
    }

    public function  detailOrderDigunakan(Request $request, $id)
    {
        // dd($request->all());

        // $validator = Validator::make($request->all(), [
        //     'rating' => 'required|numeric|min:1|max:5',
        //     'review' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     return back()->withErrors($validator->errors());
        // }

        DB::beginTransaction();

        try {
            $data = Penyewaan::with('mobil', 'rental', 'customer', 'pengantaran', 'pengembalian')->where('id', $id)->first();

            if (!$data) {
                # code...
                return back()->withErrors('Data tidak ditemukan');
            } else {
                // dd($data);
                $data->update([
                    'is_status' => 'Selesai Digunakan'
                ]);

                // Rating::create([
                //     'penyewaan_id' => $data->id,
                //     'rental_id' => $data->rental_id,
                //     'mobil_id' => $data->mobil_id,
                //     'user_id' => $data->customer_id,
                //     'rating' => $request->rating,
                //     'review' => $request->review,
                // ]);
                Format::whatsappMessage($data->customer->no_telp, 'Mobil telah selesai digunakan, mohon untuk melakukan pengembalian mobil');

                Notifikasi::create([
                    'pengirim_id' => Auth::user()->id,
                    'penerima_id' => $data->rental->user_id,
                    'judul_notifikasi' => 'Mobil telah selesai digunakan',
                    'deskripsi_notifikasi' => 'Mobil telah selesai digunakan, mohon untuk melakukan pengembalian mobil'
                ]);
                DB::commit();

                return back()->withSuccess('Berhasil mengubah status');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors($e->getMessage());
        }
    }

    public function inputBukti(Request $request, $id)
    {
        $order = Penyewaan::with('customer')->where('id', $id)->first();

        if (!$order) {
            return back()->withErrors('Data tidak ditemukan');
        }

        if ($request['bukti_pembayaran']) {
            $file = $request['bukti_pembayaran'];
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'images/bukti_pembayaran';
            $file->move($tujuan_upload, $nama_file);

            $order->update([
                'bukti_pembayaran' => $nama_file,
            ]);

            Format::whatsappMessage($order->customer->no_telp, 'Bukti pembayaran telah diterima, mohon menunggu konfirmasi dari Rental');

            return back()->withSuccess('Berhasil mengirim bukti pembayaran');
        }

        return back()->withErrors('Bukti pembayaran tidak boleh kosong');
    }
    public function indexProfile()
    {

        $data = Pelanggan::with('user')->where('user_id', Auth::user()->id)->first();

        return view('pages.back.user.profile', [
            'data' => $data
        ]);
    }

    public function storeProfile(Request $request)
    {
        // dd($request->all());

        $user = User::where('id', Auth::user()->id)->first();

        if (!$user) {
            return back()->withErrors('Data tidak ditemukan');
        }

        if ($request['password'] != null) {
            $user->update([
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
            ]);
        }

        $user->update([
            'email' => $request['email'],
        ]);

        if ($request['foto']) {
            $foto = $request->file('foto');
            $nama_foto = time() . "_" . $foto->getClientOriginalName();
            $tujuan_upload = 'images/pelanggan';
            $foto->move($tujuan_upload, $nama_foto);

            Pelanggan::where('user_id', Auth::user()->id)->update([
                'foto' => $nama_foto,
            ]);
        }

        if ($request['ktp']) {
            $ktp = $request->file('ktp');
            $nama_ktp = time() . "_" . $ktp->getClientOriginalName();
            $tujuan_upload = 'images/pelanggan/ktp';
            $ktp->move($tujuan_upload, $nama_ktp);

            Pelanggan::where('user_id', Auth::user()->id)->update([
                'ktp' => $nama_ktp,
            ]);
        }

        Pelanggan::where('user_id', Auth::user()->id)->update([
            'nama_lengkap' => $request['nama_lengkap'],
            'nik' => $request['nik'],
            'no_telp' => $request['no_telpon'],
            'alamat' => $request['alamat'],
        ]);

        return back()->withSuccess('Berhasil mengubah data');
    }
}
