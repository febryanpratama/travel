<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $roles = Auth::user()->roles->pluck('name');

        // dd($roles);

        if ($roles[0] == 'admin') {
            return view('pages.back.dashboard');
        } else if ($roles[0] == 'rental') {
            return view('pages.back.dashboard');
        } else {
            return view('pages.back.dashboard');
        }
    }
}
