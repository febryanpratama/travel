<?php

namespace App\Services\Admin;

use App\Models\User;

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
