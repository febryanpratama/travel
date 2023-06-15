<?php

namespace App\Services\Admin;

use App\Models\Rental;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RentalService
{
    static function index()
    {
        $data = User::with('rental')
            ->whereHas('rental')->get();
        // return 'Hello World';
        return [
            'status' => true,
            'data' => $data
        ];
    }

    static function store($data)
    {
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

    static function terima($id)
    {
        $user = User::where('id', $id)->update([
            'is_active' => '1'
        ]);

        // dd($user);

        return [
            'status' => true,
            'message' => 'Berhasil Melakukan Verifikasi Rental'
        ];
    }
}
