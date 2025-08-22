<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoffeeProduct;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_products' => CoffeeProduct::count(),
            'active_products' => CoffeeProduct::active()->count(),
            'featured_products' => CoffeeProduct::featured()->count(),
            'hot_coffee' => CoffeeProduct::byCategory('hot')->count(),
            'cold_coffee' => CoffeeProduct::byCategory('cold')->count(),
            'coffee_beans' => CoffeeProduct::byCategory('beans')->count(),
        ];
        
        $recent_products = CoffeeProduct::latest()->take(5)->get();
        
        return view('admin.dashboard', compact('stats', 'recent_products'));
    }
}