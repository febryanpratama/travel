<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use App\Services\Admin\RentalService;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    //

    protected $rentalService;

    public function __construct(RentalService $rentalService)
    {
        $this->rentalService = $rentalService;
    }

    public function index()
    {
        $response = $this->rentalService->index();
        return view('pages.back.admin.rental.index', [
            'data' => $response['data']
        ]);
    }
    public function indexStore()
    {
        // $response = $this->rentalService->indexStore();
        return view('pages.back.admin.rental.indexStore', [
            // 'data' => $response['data']
        ]);
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $response = $this->rentalService->store($request->all());
        if (!$response['status']) {
            return redirect()->back()->withErrors($response['message']);
        } else {
            return redirect('admin/rental')->withSuccess($response['message']);
        }
        // return redirect()->back()->withSuccess($response['message']);
    }

    public function terima($id)
    {
        $response = $this->rentalService->terima($id);
        return redirect()->back()->withSuccess($response['message']);
    }

    public function detail($id)
    {
        $rental = Rental::where('id', $id)->first();

        if (!$rental) {
            return back()->withErrors('Data Rental Tidak Ditemukan');
        }

        return view('pages.back.admin.detail-rental', [
            'data' => $rental
        ]);
    }
}
