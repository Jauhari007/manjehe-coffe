<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoffeeProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CoffeeProductController extends Controller
{
    public function index(Request $request)
    {
        $query = CoffeeProduct::query();

        // Search functionality
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        // Category filter
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Status filter
        if ($request->filled('status')) {
            switch ($request->status) {
                case 'active':
                    $query->where('is_active', true);
                    break;
                case 'inactive':
                    $query->where('is_active', false);
                    break;
                case 'featured':
                    $query->where('is_featured', true);
                    break;
            }
        }

        $products = $query->orderBy('created_at', 'desc')->paginate(10);
        
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|in:hot,cold,beans',
            'icon' => 'required|string',
            'features' => 'nullable|array',
            'features.*' => 'string',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'whatsapp_text' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();
        $data['features'] = $request->features ? array_filter($request->features) : [];
        $data['is_featured'] = $request->has('is_featured');
        $data['is_active'] = $request->has('is_active');

        CoffeeProduct::create($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk kopi berhasil ditambahkan!');
    }

    public function show(CoffeeProduct $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(CoffeeProduct $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, CoffeeProduct $product)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|in:hot,cold,beans',
            'icon' => 'required|string',
            'features' => 'nullable|array',
            'features.*' => 'string',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'whatsapp_text' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();
        $data['features'] = $request->features ? array_filter($request->features) : [];
        $data['is_featured'] = $request->has('is_featured');
        $data['is_active'] = $request->has('is_active');

        $product->update($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk kopi berhasil diperbarui!');
    }

    public function destroy(CoffeeProduct $product)
    {
        $product->delete();
        
        return redirect()->route('admin.products.index')
            ->with('success', 'Produk kopi berhasil dihapus!');
    }
}