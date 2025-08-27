<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoffeeProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CoffeeProductController extends Controller
{
    public function index(Request $request)
    {
        $query = CoffeeProduct::with('images');

        // Search functionality
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
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

        $products = $query->latest()->paginate(10);
        $categories = [
            'hot' => 'Kopi Panas',
            'cold' => 'Kopi Dingin',
            'beans' => 'Biji Kopi'
        ];

        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = [
            'hot' => 'Kopi Panas',
            'cold' => 'Kopi Dingin',
            'beans' => 'Biji Kopi'
        ];
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Debug log
        Log::info('Store product request:', [
            'request_data' => $request->except(['images']),
            'has_files' => $request->hasFile('images')
        ]);

        // Validasi
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|string',
            'category' => 'required|in:hot,cold,beans',
            'images' => 'required|array|min:1',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'features' => 'nullable|array',
            'features.*' => 'nullable|string|max:255',
            'whatsapp_text' => 'nullable|string'
        ], [
            'images.required' => 'Minimal harus ada 1 gambar produk',
            'images.*.required' => 'File gambar wajib diisi',
            'images.*.image' => 'File harus berupa gambar',
            'images.*.mimes' => 'Format gambar harus: jpeg, png, jpg, gif, atau webp',
            'images.*.max' => 'Ukuran gambar maksimal 5MB'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            DB::beginTransaction();
            
            // Bersihkan input harga
            $cleanPrice = (int) preg_replace('/[^0-9]/', '', $request->price);

            // Filter features yang tidak kosong
            $features = [];
            if ($request->has('features')) {
                $features = array_values(array_filter($request->features, function($feature) {
                    return !empty(trim($feature ?? ''));
                }));
            }

            // Buat produk
            $product = CoffeeProduct::create([
                'name' => trim($request->name),
                'description' => trim($request->description),
                'price' => $cleanPrice,
                'category' => $request->category,
                'product_id' => 'PRD-' . strtoupper(uniqid()),
                'features' => $features,
                'whatsapp_text' => $request->whatsapp_text ? trim($request->whatsapp_text) : null,
                'is_active' => $request->boolean('is_active', true),
                'is_featured' => $request->boolean('is_featured', false),
            ]);

            Log::info('Product created:', ['product_id' => $product->id]);

            // Upload gambar
            if ($request->hasFile('images')) {
                // Pastikan direktori exists
                $uploadPath = storage_path('app/public/product_images');
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                    Log::info('Created product_images directory');
                }

                foreach ($request->file('images') as $index => $image) {
                    // Validasi file sebelum upload
                    if (!$image->isValid()) {
                        throw new \Exception('File gambar tidak valid pada index: ' . $index);
                    }

                    // Generate nama file unik
                    $fileName = time() . '_' . uniqid() . '_' . $index . '.' . $image->getClientOriginalExtension();
                    
                    // Simpan file menggunakan Laravel Storage
                    try {
                        $storedPath = $image->storeAs('product_images', $fileName, 'public');
                        
                        if ($storedPath) {
                            // Simpan ke database
                            $product->images()->create([
                                'image_path' => $storedPath
                            ]);
                            
                            Log::info('Image saved successfully:', [
                                'product_id' => $product->id,
                                'filename' => $fileName,
                                'stored_path' => $storedPath
                            ]);
                        } else {
                            throw new \Exception('Gagal menyimpan gambar: ' . $fileName);
                        }
                    } catch (\Exception $e) {
                        Log::error('Error storing image:', [
                            'filename' => $fileName,
                            'error' => $e->getMessage()
                        ]);
                        throw $e;
                    }
                }
            }

            DB::commit();
            
            Log::info('Product created successfully with images', ['product_id' => $product->id]);

            return redirect()
                ->route('admin.products.index')
                ->with('success', 'Produk berhasil ditambahkan!');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating product:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            // Cleanup uploaded images if product creation failed
            if (isset($product) && $product->id) {
                foreach ($product->images as $image) {
                    Storage::disk('public')->delete($image->image_path);
                }
            }

            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['error' => 'Gagal menambahkan produk: ' . $e->getMessage()]);
        }
    }

    public function edit(CoffeeProduct $product)
    {
        $categories = [
            'hot' => 'Kopi Panas',
            'cold' => 'Kopi Dingin',
            'beans' => 'Biji Kopi'
        ];
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function show(CoffeeProduct $product)
    {
        $categories = [
            'hot' => 'Kopi Panas',
            'cold' => 'Kopi Dingin',
            'beans' => 'Biji Kopi'
        ];
        return view('admin.products.show', compact('product', 'categories'));
    }

    public function update(Request $request, CoffeeProduct $product)
    {
        Log::info('Update product request:', [
            'product_id' => $product->id,
            'request_data' => $request->except(['images']),
            'has_files' => $request->hasFile('images')
        ]);

        // Validasi - gambar optional saat update
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|string',
            'category' => 'required|in:hot,cold,beans',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'features' => 'nullable|array',
            'features.*' => 'nullable|string|max:255',
            'whatsapp_text' => 'nullable|string'
        ], [
            'images.*.image' => 'File harus berupa gambar',
            'images.*.mimes' => 'Format gambar harus: jpeg, png, jpg, gif, atau webp',
            'images.*.max' => 'Ukuran gambar maksimal 5MB'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            DB::beginTransaction();

            // Bersihkan input harga
            $cleanPrice = (int) preg_replace('/[^0-9]/', '', $request->price);

            // Filter features yang tidak kosong
            $features = [];
            if ($request->has('features')) {
                $features = array_values(array_filter($request->features, function($feature) {
                    return !empty(trim($feature ?? ''));
                }));
            }

            // Update produk
            $product->update([
                'name' => trim($request->name),
                'description' => trim($request->description),
                'price' => $cleanPrice,
                'category' => $request->category,
                'features' => $features,
                'whatsapp_text' => $request->whatsapp_text ? trim($request->whatsapp_text) : null,
                'is_active' => $request->boolean('is_active', true),
                'is_featured' => $request->boolean('is_featured', false)
            ]);

            Log::info('Product basic data updated:', ['product_id' => $product->id]);

            // Upload gambar baru jika ada
            if ($request->hasFile('images') && count($request->file('images')) > 0) {
                // Pastikan direktori exists
                $uploadPath = storage_path('app/public/product_images');
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                    Log::info('Created product_images directory');
                }

                Log::info('Processing new images:', ['count' => count($request->file('images'))]);

                // Hapus gambar lama dari storage dan database
                foreach ($product->images as $oldImage) {
                    // Hapus file fisik
                    try {
                        if (Storage::disk('public')->exists($oldImage->image_path)) {
                            Storage::disk('public')->delete($oldImage->image_path);
                            Log::info('Old image deleted from storage:', ['path' => $oldImage->image_path]);
                        }
                    } catch (\Exception $e) {
                        Log::warning('Failed to delete old image:', [
                            'path' => $oldImage->image_path,
                            'error' => $e->getMessage()
                        ]);
                    }
                    
                    // Hapus record dari database
                    $oldImage->delete();
                }

                // Simpan gambar baru
                foreach ($request->file('images') as $index => $image) {
                    // Validasi file sebelum upload
                    if (!$image->isValid()) {
                        throw new \Exception('File gambar tidak valid pada index: ' . $index);
                    }

                    // Generate nama file unik
                    $fileName = time() . '_' . uniqid() . '_' . $index . '.' . $image->getClientOriginalExtension();
                    
                    // Simpan gambar menggunakan Laravel Storage
                    try {
                        $storedPath = $image->storeAs('product_images', $fileName, 'public');
                        
                        if ($storedPath) {
                            // Simpan ke database
                            $product->images()->create([
                                'image_path' => $storedPath
                            ]);

                            Log::info('New image saved successfully:', [
                                'product_id' => $product->id,
                                'filename' => $fileName,
                                'stored_path' => $storedPath
                            ]);
                        } else {
                            throw new \Exception('Gagal menyimpan gambar: ' . $fileName);
                        }
                    } catch (\Exception $e) {
                        Log::error('Error storing new image:', [
                            'filename' => $fileName,
                            'error' => $e->getMessage()
                        ]);
                        throw $e;
                    }
                }
            }

            DB::commit();

            Log::info('Product updated successfully:', ['product_id' => $product->id]);

            return redirect()->route('admin.products.index')
                ->with('success', 'Produk berhasil diperbarui!');

        } catch (\Exception $e) {
            DB::rollBack();
            
            Log::error('Error updating product:', [
                'product_id' => $product->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Gagal memperbarui produk: ' . $e->getMessage()]);
        }
    }

    public function destroy(CoffeeProduct $product)
    {
        try {
            DB::beginTransaction();

            // Hapus semua gambar dari storage
            foreach ($product->images as $image) {
                try {
                    if (Storage::disk('public')->exists($image->image_path)) {
                        Storage::disk('public')->delete($image->image_path);
                        Log::info('Image deleted from storage:', ['path' => $image->image_path]);
                    }
                } catch (\Exception $e) {
                    Log::warning('Failed to delete image from storage:', [
                        'path' => $image->image_path,
                        'error' => $e->getMessage()
                    ]);
                }
                
                $image->delete();
            }

            // Hapus produk
            $product->delete();

            DB::commit();

            return redirect()->route('admin.products.index')
                ->with('success', 'Produk berhasil dihapus!');

        } catch (\Exception $e) {
            DB::rollBack();
            
            Log::error('Error deleting product:', [
                'product_id' => $product->id,
                'error' => $e->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => 'Gagal menghapus produk: ' . $e->getMessage()]);
        }
    }
}