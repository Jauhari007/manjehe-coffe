<?php

namespace App\Http\Controllers;

use App\Models\CoffeeProduct;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

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

    public function about(): View
    {
        $stats = [];
        return view('about', compact('stats'));
    }

    public function contact(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string|max:1000',
        ]);
    $validated['is_read'] = true;
    \App\Models\Contact::create($validated);

        return redirect()->back()->with('success', 'Pesan Anda telah dikirim.');
    }

    public function showProduct(CoffeeProduct $product): View
    {
        // Eager load images
        $product->load('images');
        return view('home.detail-produk', compact('product'));
    }

    public function selectOrderAdmin(Request $request): View
    {
        $productName = $request->query('product');
        $quantity = (int) $request->query('qty', 1);
        $price = $request->query('price');
        return view('home.select-admin', compact('productName','quantity','price'));
    }
}