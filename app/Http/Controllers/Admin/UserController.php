<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    // public function store
}
