<?php

namespace App\Services\Admin;

use App\Models\pelanggan;
use App\Models\Pelanggan as ModelsPelanggan;
use App\Models\User;

class UserService
{
    static function index()
    {
        $data = User::with('rental')->roles(['rental'])->get();
        // return 'Hello World';
        // dd($data);
        return [
            'status' => true,
            'data' => $data
        ];
    }

    static function indexAdmin()
    {
        $data = ModelsPelanggan::with('user')->get();

        return [
            'status' => true,
            'data' => $data
        ];
    }
}
