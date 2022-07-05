<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Letter;
use App\Models\Product;
use App\Models\Trip;
use App\Models\Village;
use App\Models\VillageHistory;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::all()->count();
        $trips = Trip::all()->count();
        $villages = Village::all()->count();
        $cultures = VillageHistory::all()->count();

        return view('pages.admin.dashboard', [
            'products' => $products,
            'trips' => $trips,
            'villages' => $villages,
            'cultures' => $cultures,
        ]);
    }
}
