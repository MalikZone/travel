<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\TravelPackageController;
use Illuminate\Http\Request;
use App\TravelPackage;

class DetailController extends Controller
{
    public function index(Request $request, $slug)
    {
        $travel_package = TravelPackage::with(['galleries'])->where('slug', $slug)->firstOrFail();
        return view('pages.detail',
        [
            'travel_package' => $travel_package,
        ]);
    }
}
