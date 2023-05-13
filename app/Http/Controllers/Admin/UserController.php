<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Admin\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    public function index()
    {
        $response = $this->userService->index();
        return view('pages.back.admin.user.index', [
            'data' => $response['data']
        ]);
    }

    public function indexAdmin()
    {
        $response = $this->userService->indexAdmin();

        return view('pages.back.admin.customer', [
            'data' => $response['data']
        ]);
    }

    public function detailAdmin()
    {
    }
    public function terimaAdmin($user_id)
    {
        $rental = User::where('id', $user_id)->first();

        if (!$rental) {
            return redirect()->back()->withErrors('Data rental tidak ditemukan');
        }

        $rental->update([
            'is_active' => "1"
        ]);

        return redirect()->back()->withSuccess('Data rental berhasil Diterima');
    }
    public function tolakAdmin($user_id)
    {
        $rental = User::where('id', $user_id)->first();

        if (!$rental) {
            return redirect()->back()->withErrors('Data rental tidak ditemukan');
        }

        $rental->update([
            'is_active' => "0"
        ]);


        return redirect()->back()->withSuccess('Data rental berhasil ditolak');
    }
}
