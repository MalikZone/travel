<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Transaction;
use App\TravelPackage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $metaTitle = 'Halaman Dashboard';
        return view('pages.admin.dashboard', 
            [
                'metaTitle' => $metaTitle,
                'travel_package'=> TravelPackage::count(),
                'transaction' => Transaction::count(),
                'transaction_pending' => Transaction::where('transaction_status', 'PENDING')->count(),
                'transaction_success' => Transaction::where('transaction_status', 'SUCCESS')->count(),
            ]);
    }
}
