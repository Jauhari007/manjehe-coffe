@extends('layouts.admin')

@section('title', 'Dashboard - Coffee Manjehe Admin')
@section('page_title', 'Dashboard')
@section('page_subtitle', 'Selamat datang di panel admin Coffee Manjehe!')

@section('content')
    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-gradient-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-1">{{ $stats['total_products'] }}</h3>
                            <p class="mb-0">Total Produk</p>
                            <small class="text-white-50">
                                <i class="fas fa-arrow-up"></i> {{ $stats['active_products'] }} Aktif
                            </small>
                        </div>
                        <div class="text-white-50">
                            <i class="fas fa-coffee fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-gradient-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-1">{{ $stats['featured_products'] }}</h3>
                            <p class="mb-0">Produk Unggulan</p>
                            <small class="text-white-50">
                                <i class="fas fa-crown"></i> Best Sellers
                            </small>
                        </div>
                        <div class="text-white-50">
                            <i class="fas fa-star fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-gradient-warning text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-1">{{ $stats['hot_coffee'] }}</h3>
                            <p class="mb-0">Kopi Panas</p>
                            <small class="text-white-50">
                                <i class="fas fa-fire"></i> Hot Coffee
                            </small>
                        </div>
                        <div class="text-white-50">
                            <i class="fas fa-thermometer-three-quarters fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-gradient-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-1">{{ $stats['cold_coffee'] }}</h3>
                            <p class="mb-0">Kopi Dingin</p>
                            <small class="text-white-50">
                                <i class="fas fa-snowflake"></i> Cold Coffee
                            </small>
                        </div>
                        <div class="text-white-50">
                            <i class="fas fa-cube fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Recent Products -->
        <div class="col-lg-8 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-coffee me-2"></i>
                        Produk Terbaru
                    </h5>
                </div>
                <div class="card-body">
                    @if($recent_products->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Ditambahkan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recent_products as $product)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <i class="{{ $product->icon }} me-2 text-primary"></i>
                                                    <strong>{{ $product->name }}</strong>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-secondary">
                                                    {{ ucfirst($product->category) }}
                                                </span>
                                            </td>
                                            <td>{{ $product->formatted_price }}</td>
                                            <td>
                                                @if($product->is_active)
                                                    <span class="badge bg-success">Aktif</span>
                                                @else
                                                    <span class="badge bg-danger">Nonaktif</span>
                                                @endif
                                                @if($product->is_featured)
                                                    <span class="badge bg-warning">Unggulan</span>
                                                @endif
                                            </td>
                                            <td>{{ $product->created_at->diffForHumans() }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-primary">
                                <i class="fas fa-eye me-2"></i>
                                Lihat Semua Produk
                            </a>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-coffee fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">Belum ada produk</h5>
                            <p class="text-muted">Mulai dengan menambahkan produk kopi pertama Anda.</p>
                            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>
                                Tambah Produk
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-lg-4 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-bolt me-2"></i>
                        Aksi Cepat
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>
                            Tambah Produk Baru
                        </a>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-primary">
                            <i class="fas fa-list me-2"></i>
                            Kelola Produk
                        </a>
                        <a href="{{ route('home') }}" class="btn btn-outline-success" target="_blank">
                            <i class="fas fa-external-link-alt me-2"></i>
                            Lihat Website
                        </a>
                    </div>
                </div>
            </div>

            <!-- Category Overview -->
            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-chart-pie me-2"></i>
                        Kategori Produk
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span>Kopi Panas</span>
                            <strong>{{ $stats['hot_coffee'] }}</strong>
                        </div>
                        <div class="progress mb-3" style="height: 8px;">
                            <div class="progress-bar bg-danger" style="width: {{ $stats['total_products'] > 0 ? ($stats['hot_coffee'] / $stats['total_products']) * 100 : 0 }}%"></div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span>Kopi Dingin</span>
                            <strong>{{ $stats['cold_coffee'] }}</strong>
                        </div>
                        <div class="progress mb-3" style="height: 8px;">
                            <div class="progress-bar bg-info" style="width: {{ $stats['total_products'] > 0 ? ($stats['cold_coffee'] / $stats['total_products']) * 100 : 0 }}%"></div>
                        </div>
                    </div>

                    <div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span>Biji Kopi</span>
                            <strong>{{ $stats['coffee_beans'] }}</strong>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-warning" style="width: {{ $stats['total_products'] > 0 ? ($stats['coffee_beans'] / $stats['total_products']) * 100 : 0 }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                    </small>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stats-card">
                <div class="stats-icon bg-warning">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="stats-content">
                    <h3 class="text-white">24/7</h3>
                    <p class="text-muted mb-0">Layanan</p>
                    <small class="text-success">
                        <i class="fas fa-clock"></i> Always Open
                    </small>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Products & Messages -->
    <div class="row">
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
                            Lihat Semua
                        </a>
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
                                                        <i class="{{ $product->icon }} text-warning"></i>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0 text-white">{{ $product->name }}</h6>
                                                        <small class="text-muted">{{ Str::limit($product->description, 30) }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge badge-primary">{{ ucfirst($product->category) }}</span>
                                            </td>
                                            <td class="text-warning">{{ $product->formatted_price }}</td>
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
                        <div class="text-center py-4">
                            <i class="fas fa-coffee text-muted" style="font-size: 3rem;"></i>
                            <p class="text-muted mt-2">Belum ada produk</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Recent Messages -->
        <div class="col-lg-4 mb-4">
            <div class="admin-card">
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
                                <div class="message-item mb-3 p-3 rounded {{ !$message->is_read ? 'bg-info bg-opacity-10 border border-info border-opacity-25' : 'bg-dark bg-opacity-25' }}">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h6 class="text-white mb-0">{{ $message->name }}</h6>
                                        @if(!$message->is_read)
                                            <span class="badge badge-info">Baru</span>
                                        @endif
                                    </div>
                                    <p class="text-muted small mb-1">{{ $message->email }}</p>
                                    <p class="text-light small mb-2">{{ Str::limit($message->message, 50) }}</p>
                                    <small class="text-muted">{{ $message->created_at->diffForHumans() }}</small>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-comments text-muted" style="font-size: 3rem;"></i>
                            <p class="text-muted mt-2">Belum ada pesan</p>
                        </div>
                    @endif
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
    .product-icon-small {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: rgba(212, 165, 116, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .message-item {
        transition: all 0.3s ease;
        border-radius: 12px !important;
    }
    
    .message-item:hover {
        transform: translateX(5px);
    }
    
    .messages-list {
        max-height: 400px;
        overflow-y: auto;
    }
    
    .messages-list::-webkit-scrollbar {
        width: 4px;
    }
    
    .messages-list::-webkit-scrollbar-track {
        background: rgba(212, 165, 116, 0.1);
        border-radius: 10px;
    }
    
    .messages-list::-webkit-scrollbar-thumb {
        background: var(--admin-primary);
        border-radius: 10px;
    }
</style>
@endpush