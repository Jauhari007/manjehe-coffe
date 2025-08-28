@extends('layouts.admin')

@section('title', 'Dashboard - Manjehe Coffee Admin')
@section('page_title', 'Dashboard')

<link rel="icon" type="image/png" href="{{ asset('assets/manjehe_logo.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/manjehe_logo.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/manjehe_logo.png') }}">
<link rel="icon" type="image/png" sizes="48x48" href="{{ asset('assets/manjehe_logo.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/manjehe_logo.png') }}">
<link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/manjehe_logo.png') }}">
<link rel="icon" type="image/png" sizes="512x512" href="{{ asset('assets/manjehe_logo.png') }}">
@section('page_subtitle', 'Selamat datang di panel admin Manjehe Coffee!')

@section('content')
     

    <!-- Main Content -->
    <div class="row mb-5">
        <!-- Recent Products -->
        <div class="col-lg-8 mb-4">
            <div class="admin-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title text-white mb-0">
                            <i class="fas fa-coffee me-2 text-warning"></i>
                            Produk Terbaru
                        </h5>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-light btn-sm">
                            <i class="fas fa-eye me-2"></i>
                            Lihat Semua
                        </a>
                    </div>

                    <!-- Stats Cards -->
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="stats-card">
                                <div class="stats-icon bg-primary">
                                    <i class="fas fa-coffee"></i>
                                </div>
                                <div class="stats-content">
                                    <h3 class="text-white">{{ $stats['total_products'] }}</h3>
                                    <p class="text-muted mb-0">Total Produk</p>
                                    <small class="text-success">
                                        <i class="fas fa-arrow-up"></i> {{ $stats['active_products'] }} Aktif
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="stats-card">
                                <div class="stats-icon bg-success">
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="stats-content">
                                    <h3 class="text-white">{{ $stats['featured_products'] }}</h3>
                                    <p class="text-muted mb-0">Produk Unggulan</p>
                                    <small class="text-warning">
                                        <i class="fas fa-crown"></i> Best Sellers
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="stats-card">
                                <div class="stats-icon bg-danger">
                                    <i class="fas fa-thermometer-three-quarters"></i>
                                </div>
                                <div class="stats-content">
                                    <h3 class="text-white">{{ $stats['hot_coffee'] }}</h3>
                                    <p class="text-muted mb-0">Kopi Panas</p>
                                    <small class="text-danger">
                                        <i class="fas fa-fire"></i> Hot Coffee
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="stats-card">
                                <div class="stats-icon bg-info">
                                    <i class="fas fa-cube"></i>
                                </div>
                                <div class="stats-content">
                                    <h3 class="text-white">{{ $stats['cold_coffee'] }}</h3>
                                    <p class="text-muted mb-0">Kopi Dingin</p>
                                    <small class="text-info">
                                        <i class="fas fa-snowflake"></i> Cold Coffee
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @if($recent_products->count() > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recent_products as $product)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="product-icon-small me-3">
                                                        @if($product->images && $product->images->count() > 0)
                                                            <img src="{{ asset('storage/' . $product->images->first()->image_path) }}" class="product-image" style="width:32px;height:32px;object-fit:cover;border-radius:6px;" alt="Gambar Produk">
                                                        @else
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0 text-white">{{ $product->name }}</h6>
                                                        <small class="text-white-50">{{ Str::limit($product->description, 30) }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge badge-primary">{{ ucfirst($product->category) }}</span>
                                            </td>
                                            <td class="text-warning fw-bold">{{ $product->formatted_price }}</td>
                                            <td>
                                                @if($product->is_active)
                                                    <span class="badge badge-success">Aktif</span>
                                                @else
                                                    <span class="badge badge-danger">Non-aktif</span>
                                                @endif
                                                
                                                @if($product->is_featured)
                                                    <span class="badge badge-warning ms-1">
                                                        <i class="fas fa-star"></i>
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-outline-light">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-coffee text-white-50 mb-3" style="font-size: 3rem;"></i>
                            <h5 class="text-white-50">Belum ada produk</h5>
                            <p class="text-white-50">Mulai dengan menambahkan produk kopi pertama Anda.</p>
                            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>
                                Tambah Produk
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Sidebar Content -->
        <div class="col-lg-4">
            <!-- Recent Messages -->
            <div class="admin-card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title text-white mb-0">
                            <i class="fas fa-comments me-2 text-info"></i>
                            Pesan Terbaru
                        </h5>
                        @if($unreadMessages > 0)
                            <span class="badge badge-warning">{{ $unreadMessages }}</span>
                        @endif
                    </div>
                    
                    @if($recentMessages->count() > 0)
                        <div class="messages-list">
                            @foreach($recentMessages as $message)
                                <div class="message-item mb-3 p-3 rounded {{ !$message->is_read ? 'bg-info bg-opacity-10 border border-info border-opacity-25' : '' }}">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h6 class="text-white mb-0">{{ $message->name }}</h6>
                                        @if(!$message->is_read)
                                            <span class="badge badge-info">Baru</span>
                                        @endif
                                    </div>
                                    <p class="text-white-50 small mb-1">{{ $message->email }}</p>
                                    <p class="text-light small mb-2">{{ Str::limit($message->message, 50) }}</p>
                                    <small class="text-white-50">{{ $message->created_at->diffForHumans() }}</small>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-comments text-white-50 mb-3" style="font-size: 3rem;"></i>
                            <p class="text-white-50">Belum ada pesan</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Category Overview -->
            <div class="admin-card">
                <div class="card-body">
                    <h5 class="card-title text-white mb-4">
                        <i class="fas fa-chart-pie me-2 text-warning"></i>
                        Kategori Produk
                    </h5>
                    
                    @php
                        $total = max($stats['total_products'] ?? 0, 0);
                        $pctHot = $total ? round(($stats['hot_coffee'] / $total) * 100, 2) : 0;
                        $pctCold = $total ? round(($stats['cold_coffee'] / $total) * 100, 2) : 0;
                        $pctBeans = $total ? round(($stats['coffee_beans'] / $total) * 100, 2) : 0;
                    @endphp
                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-light">Kopi Panas</span>
                            <strong class="text-danger">{{ $stats['hot_coffee'] }}</strong>
                        </div>
                        <div class="progress mb-3" style="height: 10px;">
                            <div class="progress-bar bg-danger" style="width: <?php echo $pctHot; ?>%;"></div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-light">Kopi Dingin</span>
                            <strong class="text-info">{{ $stats['cold_coffee'] }}</strong>
                        </div>
                        <div class="progress mb-3" style="height: 10px;">
                            <div class="progress-bar bg-info" style="width: <?php echo $pctCold; ?>%;"></div>
                        </div>
                    </div>

                    <div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-light">Biji Kopi</span>
                            <strong class="text-warning">{{ $stats['coffee_beans'] }}</strong>
                        </div>
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar bg-warning" style="width: <?php echo $pctBeans; ?>%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row">
        <div class="col-12">
            <div class="admin-card">
                <div class="card-body">
                    <h5 class="card-title text-white mb-4">
                        <i class="fas fa-rocket me-2 text-success"></i>
                        Aksi Cepat
                    </h5>
                    
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.products.create') }}" class="btn btn-success w-100 py-3">
                                <i class="fas fa-plus-circle d-block mb-2" style="font-size: 2rem;"></i>
                                <span>Tambah Produk</span>
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-primary w-100 py-3">
                                <i class="fas fa-list d-block mb-2" style="font-size: 2rem;"></i>
                                <span>Kelola Produk</span>
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('home') }}" target="_blank" class="btn btn-info w-100 py-3">
                                <i class="fas fa-eye d-block mb-2" style="font-size: 2rem;"></i>
                                <span>Lihat Website</span>
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <button class="btn btn-warning w-100 py-3" onclick="window.location.reload()">
                                <i class="fas fa-sync d-block mb-2" style="font-size: 2rem;"></i>
                                <span>Refresh Data</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    /* Enhanced Dashboard Styling */
    .product-icon-small {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, rgba(212, 165, 116, 0.2), rgba(139, 69, 19, 0.1));
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid rgba(212, 165, 116, 0.3);
    }
    
    /* Table Styling - Dark Theme */
    .table {
        background: rgba(26, 15, 10, 0.6) !important;
        border: 1px solid rgba(212, 165, 116, 0.2) !important;
        border-radius: 12px !important;
        overflow: hidden;
    }
    
    .table thead th {
        background: rgba(212, 165, 116, 0.15) !important;
        border: none !important;
        color: #D4A574 !important;
        font-weight: 600;
        padding: 1rem;
        border-bottom: 2px solid rgba(212, 165, 116, 0.3) !important;
    }
    
    .table tbody td {
        background: rgba(26, 15, 10, 0.4) !important;
        border: none !important;
        color: #e5e7eb !important;
        padding: 1rem;
        border-bottom: 1px solid rgba(212, 165, 116, 0.1) !important;
        vertical-align: middle;
    }
    
    .table tbody tr {
        transition: all 0.3s ease;
    }
    
    .table tbody tr:hover {
        background: rgba(212, 165, 116, 0.1) !important;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(212, 165, 116, 0.15);
    }
    
    .table tbody tr:hover td {
        background: transparent !important;
    }
    
    /* Message Item Styling */
    .message-item {
        transition: all 0.3s ease;
        border-radius: 12px !important;
        background: rgba(26, 15, 10, 0.4) !important;
        border: 1px solid rgba(212, 165, 116, 0.1) !important;
    }
    
    .message-item:hover {
        transform: translateX(5px);
        border-color: rgba(212, 165, 116, 0.3) !important;
        box-shadow: 0 4px 12px rgba(212, 165, 116, 0.1);
    }
    
    .message-item.bg-info {
        background: rgba(59, 130, 246, 0.1) !important;
        border-color: rgba(59, 130, 246, 0.3) !important;
    }
    
    .messages-list {
        max-height: 400px;
        overflow-y: auto;
        padding-right: 8px;
    }
    
    .messages-list::-webkit-scrollbar {
        width: 6px;
    }
    
    .messages-list::-webkit-scrollbar-track {
        background: rgba(212, 165, 116, 0.1);
        border-radius: 10px;
    }
    
    .messages-list::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, var(--admin-primary), rgba(212, 165, 116, 0.8));
        border-radius: 10px;
    }
    
    /* Stats Card Enhanced */
    .stats-card {
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(212, 165, 116, 0.2) !important;
        background: linear-gradient(135deg, rgba(212, 165, 116, 0.08), rgba(139, 69, 19, 0.05)) !important;
    }
    
    .stats-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--admin-primary), #F4E4BC);
    }
    
    .stats-content {
        position: relative;
        z-index: 2;
    }
    
    /* Admin Card Enhanced */
    .admin-card {
        border: 1px solid rgba(212, 165, 116, 0.15) !important;
        background: linear-gradient(135deg, rgba(212, 165, 116, 0.05), rgba(139, 69, 19, 0.03)) !important;
        backdrop-filter: blur(20px);
    }
    
    .admin-card .card-body {
        padding: 2rem;
    }
    
    /* Button Enhancements */
    .btn {
        transition: all 0.3s ease;
        border-radius: 10px !important;
        font-weight: 500;
    }
    
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.15);
    }
    
    .btn-outline-light {
        border-color: rgba(212, 165, 116, 0.5) !important;
        color: #D4A574 !important;
    }
    
    .btn-outline-light:hover {
        background: rgba(212, 165, 116, 0.1) !important;
        border-color: #D4A574 !important;
        color: #D4A574 !important;
    }
    
    /* Progress Bar Styling */
    .progress {
        background: rgba(255,255,255,0.1) !important;
        border-radius: 10px !important;
        border: 1px solid rgba(212, 165, 116, 0.1);
    }
    
    .progress-bar {
        border-radius: 10px !important;
        transition: width 0.6s ease;
    }
    
    /* Badge Styling */
    .badge {
        font-weight: 500;
        padding: 0.5rem 0.8rem;
        border-radius: 8px;
        font-size: 0.75rem;
    }
    
    .badge-primary {
        background: linear-gradient(135deg, rgba(212, 165, 116, 0.8), rgba(212, 165, 116, 0.6)) !important;
        color: #2D1810 !important;
        border: 1px solid rgba(212, 165, 116, 0.4);
    }
    
    /* Title Styling */
    .card-title {
        font-weight: 600;
        letter-spacing: 0.5px;
    }
    
    /* Responsive Enhancements */
    @media (max-width: 768px) {
        .admin-card .card-body {
            padding: 1.5rem;
        }
        
        .stats-card {
            margin-bottom: 1rem;
        }
        
        .table-responsive {
            border-radius: 12px;
            border: 1px solid rgba(212, 165, 116, 0.2);
        }
    }
    
    /* Animation for stats */
    .stats-card:hover .stats-content h3 {
        transform: scale(1.05);
        transition: transform 0.3s ease;
    }
    
    /* Empty state styling */
    .text-center.py-5 {
        background: rgba(26, 15, 10, 0.3);
        border-radius: 12px;
        border: 2px dashed rgba(212, 165, 116, 0.3);
        margin: 1rem 0;
    }
    
    /* Icon animations */
    .fa-coffee, .fa-star, .fa-thermometer-three-quarters, .fa-cube {
        transition: transform 0.3s ease;
    }
    
    .stats-card:hover .fa-coffee,
    .stats-card:hover .fa-star,
    .stats-card:hover .fa-thermometer-three-quarters,
    .stats-card:hover .fa-cube {
        transform: rotate(10deg) scale(1.1);
    }
</style>
@endpush