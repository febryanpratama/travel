<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\Pengantaran;
use App\Models\Penyewaan;
use App\Models\Rating;
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

    public function  detailOrderDigunakan(Request $request, $id)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'rating' => 'required|numeric|min:1|max:5',
            'review' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

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

                Rating::create([
                    'penyewaan_id' => $data->id,
                    'rental_id' => $data->rental_id,
                    'mobil_id' => $data->mobil_id,
                    'user_id' => $data->customer_id,
                    'rating' => $request->rating,
                    'review' => $request->review,
                ]);
                DB::commit();

                return back()->withSuccess('Berhasil mengubah status');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors($e->getMessage());
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
