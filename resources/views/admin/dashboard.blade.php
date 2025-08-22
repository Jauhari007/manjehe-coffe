{{-- File: resources/views/admin/dashboard.blade.php --}}
@extends('layouts.admin')

@section('title', 'Dashboard - Coffee Manjehe Admin')
@section('page_title', 'Dashboard')
@section('page_subtitle', 'Selamat datang di panel admin Coffee Manjehe!')

@section('content')
    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stats-card">
                <div class="stats-icon">
                    <i class="fas fa-coffee"></i>
                </div>
                <div class="stats-content">
                    <h3 class="text-white">{{ $totalProducts }}</h3>
                    <p class="text-muted mb-0">Total Produk</p>
                    <small class="text-success">
                        <i class="fas fa-arrow-up"></i> {{ $activeProducts }} Aktif
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
                    <h3 class="text-white">{{ $featuredProducts }}</h3>
                    <p class="text-muted mb-0">Produk Unggulan</p>
                    <small class="text-info">
                        <i class="fas fa-crown"></i> Best Sellers
                    </small>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="stats-card">
                <div class="stats-icon bg-info">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="stats-content">
                    <h3 class="text-white">{{ $totalMessages }}</h3>
                    <p class="text-muted mb-0">Total Pesan</p>
                    <small class="text-warning">
                        <i class="fas fa-bell"></i> {{ $unreadMessages }} Belum dibaca
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
                    
                    @if($recentProducts->count() > 0)
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
                                    @foreach($recentProducts as $product)
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