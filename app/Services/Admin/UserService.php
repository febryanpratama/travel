<?php

namespace App\Services\Admin;

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
}
