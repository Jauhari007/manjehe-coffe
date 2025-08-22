<?php

namespace App\Http\Controllers;

use App\Models\CoffeeProduct;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = CoffeeProduct::active()->orderBy('is_featured', 'desc')->get();
        
        return view('home.index', compact('products'));
    }

    public function products(Request $request)
    {
        $query = CoffeeProduct::active();
        
        if ($request->has('category') && $request->category !== 'all') {
            $query->byCategory($request->category);
        }
        
        $products = $query->orderBy('is_featured', 'desc')->get();
        
        if ($request->ajax()) {
            return response()->json([
                'html' => view('partials.products', compact('products'))->render()
            ]);
        }
        
        return view('home.products', compact('products'));
    }
}