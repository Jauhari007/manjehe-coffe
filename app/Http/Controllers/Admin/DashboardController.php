<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoffeeProduct;
use App\Models\Contact;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            $stats = [
                'total_products' => CoffeeProduct::count(),
                'active_products' => CoffeeProduct::active()->count(),
                'featured_products' => CoffeeProduct::featured()->count(),
                'hot_coffee' => CoffeeProduct::byCategory('hot')->count(),
                'cold_coffee' => CoffeeProduct::byCategory('cold')->count(),
                'coffee_beans' => CoffeeProduct::byCategory('beans')->count(),
            ];
            
            $recent_products = CoffeeProduct::with('images')->latest()->take(5)->get();
            
            // Add contact messages data
            $recentMessages = Contact::latest()->take(5)->get();
            $unreadMessages = Contact::where('is_read', false)->count();
            
            return view('admin.dashboard', compact('stats', 'recent_products', 'recentMessages', 'unreadMessages'));
            
        } catch (\Exception $e) {
            Log::error('Dashboard error: ' . $e->getMessage());
            
            // Fallback data jika ada error
            $stats = [
                'total_products' => 0,
                'active_products' => 0,
                'featured_products' => 0,
                'hot_coffee' => 0,
                'cold_coffee' => 0,
                'coffee_beans' => 0,
            ];
            
            $recent_products = collect([]);
            $recentMessages = collect([]);
            $unreadMessages = 0;
            
            return view('admin.dashboard', compact('stats', 'recent_products', 'recentMessages', 'unreadMessages'))
                ->with('error', 'Terjadi kesalahan saat memuat dashboard');
        }
    }
}