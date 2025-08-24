@extends('layouts.admin')

@section('title', 'Detail Produk - Coffee Manjehe Admin')
@section('page_title', 'Detail Produk Kopi')
@section('page_subtitle', 'Informasi lengkap produk "' . $product->name . '"')

@push('styles')
<style>
    .product-card {
        background: linear-gradient(135deg, #8B4513, #D2691E);
        color: white;
        border-radius: 15px;
        padding: 30px;
        text-align: center;
        margin-bottom: 20px;
    }
    
    .product-icon {
        font-size: 4rem;
        margin-bottom: 20px;
        opacity: 0.9;
    }
    
    .info-card {
        border-left: 4px solid #8B4513;
    }
    
    .info-label {
        font-weight: 600;
        color: #6c757d;
        margin-bottom: 5px;
    }
    
    .info-value {
        font-size: 1.1rem;
        color: #333;
    }
    
    .feature-list {
        list-style: none;
        padding-left: 0;
    }
    
    .feature-list li {
        padding: 8px 0;
        border-bottom: 1px solid #e9ecef;
    }
    
    .feature-list li:last-child {
        border-bottom: none;
    }
    
    .status-timeline {
        position: relative;
        padding-left: 30px;
    }
    
    .status-timeline::before {
        content: '';
        position: absolute;
        left: 10px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #dee2e6;
    }
    
    .status-item {
        position: relative;
        margin-bottom: 20px;
    }
    
    .status-item::before {
        content: '';
        position: absolute;
        left: -25px;
        top: 5px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #28a745;
        border: 2px solid white;
        box-shadow: 0 0 0 2px #28a745;
    }
    
    .status-item.inactive::before {
        background: #dc3545;
        box-shadow: 0 0 0 2px #dc3545;
    }
</style>
@endpush

@section('content')
    <div class="row">
        <!-- Product Display -->
        <div class="col-lg-4">
            <div class="product-card">
                <div class="product-icon">
                    <i class="{{ $product->icon ?? 'fas fa-coffee' }}"></i>
                </div>
                <h3 class="mb-3">{{ $product->name }}</h3>
                <p class="mb-2">
                    @switch($product->category)
                        @case('hot')
                            <i class="fas fa-fire me-1"></i> Kopi Panas
                            @break
                        @case('cold')
                            <i class="fas fa-snowflake me-1"></i> Kopi Dingin
                            @break
                        @case('beans')
                            <i class="fas fa-seedling me-1"></i> Biji Kopi
                            @break
                    @endswitch
                </p>
                <h2 class="mb-4">{{ $product->formatted_price }}</h2>
                
                <div class="mb-3">
                    @if($product->is_active)
                        <span class="badge bg-success fs-6 me-2">Aktif</span>
                    @else
                        <span class="badge bg-danger fs-6 me-2">Nonaktif</span>
                    @endif
                    
                    @if($product->is_featured)
                        <span class="badge bg-warning text-dark fs-6">
                            <i class="fas fa-star me-1"></i> Unggulan
                        </span>
                    @endif
                </div>
                
                <div class="mt-4">
                    <a href="{{ $product->whatsapp_url }}" target="_blank" class="btn btn-success">
                        <i class="fab fa-whatsapp me-2"></i>
                        Pesan via WhatsApp
                    </a>
                </div>
            </div>
            
            <!-- Action Buttons -->
            <div class="card">
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>
                            Edit Produk
                        </a>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100 btn-delete">
                                <i class="fas fa-trash me-2"></i>
                                Hapus Produk
                            </button>
                        </form>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-2"></i>
                            Kembali ke Daftar
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Information -->
        <div class="col-lg-8">
            <!-- Description -->
            <div class="card info-card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-info-circle me-2"></i>
                        Deskripsi Produk
                    </h5>
                </div>
                <div class="card-body">
                    <p class="mb-0" style="line-height: 1.6; font-size: 1.1rem;">
                        {{ $product->description }}
                    </p>
                </div>
            </div>

            <!-- Features -->
            @if($product->features && count($product->features) > 0)
                <div class="card info-card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fas fa-list me-2"></i>
                            Fitur Produk
                        </h5>
                    </div>
                    <div class="card-body">
                        <ul class="feature-list">
                            @foreach($product->features as $feature)
                                <li>
                                    <i class="fas fa-check text-success me-2"></i>
                                    {{ $feature }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <!-- Product Details -->
            <div class="card info-card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-cog me-2"></i>
                        Detail Produk
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="info-label">Harga</div>
                            <div class="info-value text-success fw-bold">{{ $product->formatted_price }}</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="info-label">Kategori</div>
                            <div class="info-value">
                                @switch($product->category)
                                    @case('hot')
                                        <span class="badge bg-danger">
                                            <i class="fas fa-fire me-1"></i> Kopi Panas
                                        </span>
                                        @break
                                    @case('cold')
                                        <span class="badge bg-info">
                                            <i class="fas fa-snowflake me-1"></i> Kopi Dingin
                                        </span>
                                        @break
                                    @case('beans')
                                        <span class="badge bg-warning text-dark">
                                            <i class="fas fa-seedling me-1"></i> Biji Kopi
                                        </span>
                                        @break
                                @endswitch
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="info-label">Icon</div>
                            <div class="info-value">
                                <i class="{{ $product->icon ?? 'fas fa-coffee' }} me-2"></i>
                                {{ $product->icon ?? 'fas fa-coffee' }}
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="info-label">ID Produk</div>
                            <div class="info-value">#{{ $product->id }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- WhatsApp Settings -->
            <div class="card info-card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fab fa-whatsapp me-2"></i>
                        Pengaturan WhatsApp
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="info-label">Pesan WhatsApp</div>
                        <div class="info-value">
                            @if($product->whatsapp_text)
                                {{ $product->whatsapp_text }}
                            @else
                                <em class="text-muted">Menggunakan pesan default: "Halo Coffee Manjehe, saya ingin memesan {{ $product->name }}"</em>
                            @endif
                        </div>
                    </div>
                    <div>
                        <div class="info-label">Link WhatsApp</div>
                        <div class="info-value">
                            <a href="{{ $product->whatsapp_url }}" target="_blank" class="text-decoration-none">
                                {{ $product->whatsapp_url }}
                                <i class="fas fa-external-link-alt ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Status Timeline -->
            <div class="card info-card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-history me-2"></i>
                        Informasi Status
                    </h5>
                </div>
                <div class="card-body">
                    <div class="status-timeline">
                        <div class="status-item {{ $product->is_active ? '' : 'inactive' }}">
                            <h6 class="mb-1">Status Aktif</h6>
                            <p class="mb-0 text-muted">
                                @if($product->is_active)
                                    <i class="fas fa-check text-success me-1"></i>
                                    Produk aktif dan ditampilkan di website
                                @else
                                    <i class="fas fa-times text-danger me-1"></i>
                                    Produk nonaktif dan tidak ditampilkan di website
                                @endif
                            </p>
                        </div>
                        
                        <div class="status-item {{ $product->is_featured ? '' : 'inactive' }}">
                            <h6 class="mb-1">Status Unggulan</h6>
                            <p class="mb-0 text-muted">
                                @if($product->is_featured)
                                    <i class="fas fa-star text-warning me-1"></i>
                                    Produk ditampilkan sebagai unggulan
                                @else
                                    <i class="fas fa-star text-muted me-1"></i>
                                    Produk tidak ditampilkan sebagai unggulan
                                @endif
                            </p>
                        </div>
                        
                        <div class="status-item">
                            <h6 class="mb-1">Tanggal Dibuat</h6>
                            <p class="mb-0 text-muted">
                                <i class="fas fa-calendar me-1"></i>
                                {{ $product->created_at->format('d F Y, H:i') }}
                                ({{ $product->created_at->diffForHumans() }})
                            </p>
                        </div>
                        
                        <div class="status-item">
                            <h6 class="mb-1">Terakhir Diperbarui</h6>
                            <p class="mb-0 text-muted">
                                <i class="fas fa-clock me-1"></i>
                                {{ $product->updated_at->format('d F Y, H:i') }}
                                ({{ $product->updated_at->diffForHumans() }})
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
