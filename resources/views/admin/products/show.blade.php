@extends('layouts.admin')

@section('title', 'Detail Produk - Manjehe Coffee Admin')
@section('page_title', 'Detail Produk Kopi')
@section('page_subtitle', 'Informasi lengkap produk "' . $product->name . '"')

@push('styles')
<style>
    /* THEME TOKENS */
    :root {
        --coffee-dark: #1a1a1a;
        --coffee-brown: #8B4513;
        --coffee-brown-mid: #CD853F;
        --coffee-accent: #D2691E;
        --coffee-accent-soft: #F4A460;
        --coffee-gradient: linear-gradient(135deg, #8B4513 0%, #CD853F 50%, #D2691E 100%);
        --glass-bg: rgba(255,255,255,0.95);
        --border-glow: 1px solid rgba(139, 69, 19, 0.2);
        --radius-xl: 20px;
        --radius-md: 12px;
        --transition: .3s ease;
        --shadow-soft: 0 4px 20px rgba(0,0,0,0.15);
        --shadow-lift: 0 8px 25px rgba(0,0,0,0.25);
        --grad-header: linear-gradient(90deg, #f8f9fa, #e9ecef);
    }

    /* BASE REFINEMENTS */
    body { background: linear-gradient(135deg, #f5f5f5 0%, #e8e8e8 100%) fixed; }
    .card { 
        border: var(--border-glow); 
        border-radius: var(--radius-md); 
        overflow: hidden; 
        background: var(--glass-bg); 
        box-shadow: var(--shadow-soft);
        margin-bottom: 1.5rem;
    }
    .card-header { 
        background: var(--grad-header); 
        border-bottom: 2px solid var(--coffee-accent); 
        padding: 1rem 1.25rem;
    }
    .card-header h5 { 
        letter-spacing: 0.5px; 
        font-weight: 600; 
        color: var(--coffee-dark);
        margin: 0;
    }

    /* PRODUCT HERO */
    .product-card { 
        position: relative; 
        background: var(--coffee-gradient); 
        color: white; 
        border-radius: var(--radius-xl); 
        padding: 2.5rem 2rem; 
        text-align: center; 
        margin-bottom: 2rem; 
        box-shadow: var(--shadow-soft); 
        overflow: hidden;
        border: 3px solid rgba(255,255,255,0.2);
    }
    .product-card:hover { 
        box-shadow: var(--shadow-lift); 
        transform: translateY(-2px); 
        transition: var(--transition);
    }

    .product-icon { 
        font-size: 4rem; 
        margin-bottom: 1rem; 
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3); 
        filter: drop-shadow(0 0 10px rgba(255,255,255,0.3));
    }
    .product-card h3 { 
        font-weight: 700; 
        letter-spacing: 0.5px; 
        text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        margin-bottom: 1rem;
    }
    .product-card h2 {
        font-size: 2.5rem;
        font-weight: 800;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.4);
        color: #fff;
    }

    /* RIBBON FEATURED */
    .ribbon { 
        position: absolute; 
        top: 15px; 
        left: -50px; 
        transform: rotate(-45deg); 
        background: linear-gradient(90deg, #FFD700, #FFA500); 
        color: #8B4513; 
        font-weight: 700; 
        padding: 8px 60px; 
        font-size: 0.75rem; 
        letter-spacing: 1px; 
        text-transform: uppercase; 
        box-shadow: 0 4px 8px rgba(0,0,0,0.3);
        text-shadow: none;
    }

    /* BUTTON ENHANCEMENTS */
    .btn { 
        transition: var(--transition); 
        border-radius: 10px; 
        font-weight: 600; 
        padding: 0.75rem 1.5rem;
        border: none;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .btn-warning { 
        background: linear-gradient(135deg, #FFA500, #FF8C00); 
        color: white; 
        box-shadow: 0 4px 12px rgba(255, 165, 0, 0.3);
    }
    .btn-warning:hover { 
        background: linear-gradient(135deg, #FF8C00, #FF7F00); 
        transform: translateY(-2px); 
        box-shadow: 0 6px 16px rgba(255, 165, 0, 0.4);
        color: white;
    }
    .btn-danger { 
        background: linear-gradient(135deg, #DC3545, #C82333); 
        color: white;
        box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3);
    }
    .btn-danger:hover { 
        background: linear-gradient(135deg, #C82333, #BD2130); 
        transform: translateY(-2px); 
        box-shadow: 0 6px 16px rgba(220, 53, 69, 0.4);
        color: white;
    }
    .btn-outline-secondary { 
        border: 2px solid var(--coffee-brown); 
        color: var(--coffee-brown); 
        background: transparent;
        font-weight: 600;
    }
    .btn-outline-secondary:hover { 
        background: var(--coffee-brown); 
        color: white; 
        transform: translateY(-2px);
    }
    .btn-success { 
        background: linear-gradient(135deg, #28A745, #20C997); 
        color: white;
        box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);
    }
    .btn-success:hover { 
        background: linear-gradient(135deg, #20C997, #17A2B8); 
        transform: translateY(-2px); 
        box-shadow: 0 6px 16px rgba(40, 167, 69, 0.4);
        color: white;
    }

    /* BADGES */
    .badge { 
        padding: 0.6em 1em; 
        border-radius: 25px; 
        font-weight: 600; 
        letter-spacing: 0.3px; 
        text-transform: uppercase;
        font-size: 0.75rem;
    }
    .badge.bg-success { 
        background: linear-gradient(135deg, #28A745, #20C997) !important; 
        color: white !important;
        box-shadow: 0 2px 8px rgba(40, 167, 69, 0.3);
    }
    .badge.bg-danger { 
        background: linear-gradient(135deg, #DC3545, #C82333) !important; 
        color: white !important;
        box-shadow: 0 2px 8px rgba(220, 53, 69, 0.3);
    }
    .badge.bg-warning { 
        background: linear-gradient(135deg, #FFC107, #FF8C00) !important; 
        color: #8B4513 !important;
        font-weight: 700;
        box-shadow: 0 2px 8px rgba(255, 193, 7, 0.3);
    }
    .badge.bg-info { 
        background: linear-gradient(135deg, #17A2B8, #007BFF) !important; 
        color: white !important;
        box-shadow: 0 2px 8px rgba(23, 162, 184, 0.3);
    }

    /* INFO CARDS */
    .info-card { 
        position: relative; 
        border: var(--border-glow);
        background: white;
    }
    .info-card .card-body { 
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%); 
        padding: 1.5rem;
    }
    .info-label { 
        font-weight: 700; 
        text-transform: uppercase; 
        font-size: 0.7rem; 
        letter-spacing: 1px; 
        color: var(--coffee-brown); 
        margin-bottom: 0.5rem; 
    }
    .info-value { 
        font-size: 1.1rem; 
        color: var(--coffee-dark); 
        font-weight: 500; 
        line-height: 1.4;
    }
    .info-value.text-success { 
        color: #28A745 !important; 
        font-weight: 700;
    }
    .card.info-card h5 { 
        font-size: 1.1rem; 
        letter-spacing: 0.5px; 
        color: var(--coffee-dark);
    }

    /* FEATURES LIST */
    .feature-list { 
        list-style: none; 
        padding-left: 0; 
        margin: 0; 
        display: grid; 
        gap: 12px; 
    }
    .feature-list li { 
        position: relative; 
        padding: 15px 20px 15px 50px; 
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%); 
        border: 2px solid var(--coffee-accent); 
        border-radius: 12px; 
        font-weight: 500; 
        color: var(--coffee-dark); 
        overflow: hidden;
        transition: var(--transition);
    }
    .feature-list li:before { 
        content: "✓"; 
        position: absolute; 
        left: 18px; 
        top: 50%; 
        width: 24px; 
        height: 24px; 
        border-radius: 50%; 
        background: linear-gradient(135deg, #28A745, #20C997); 
        color: white;
        font-weight: 700;
        font-size: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        transform: translateY(-50%); 
        box-shadow: 0 2px 8px rgba(40, 167, 69, 0.3);
    }
    .feature-list li i { display: none; }
    .feature-list li:hover { 
        border-color: var(--coffee-brown); 
        box-shadow: 0 4px 12px rgba(139, 69, 19, 0.2); 
        transform: translateY(-2px);
    }

    /* STATUS TIMELINE */
    .status-timeline { 
        position: relative; 
        margin-left: 8px; 
        padding-left: 40px; 
    }
    .status-timeline:before { 
        content: ""; 
        position: absolute; 
        left: 18px; 
        top: 10px; 
        bottom: 10px; 
        width: 4px; 
        background: linear-gradient(180deg, var(--coffee-brown), var(--coffee-accent)); 
        border-radius: 4px; 
    }
    .status-item { 
        position: relative; 
        margin: 0 0 30px; 
        padding: 20px 24px; 
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%); 
        border: 2px solid var(--coffee-accent); 
        border-radius: 16px; 
        transition: var(--transition);
        box-shadow: 0 2px 8px rgba(139, 69, 19, 0.1);
    }
    .status-item:last-child { margin-bottom: 0; }
    .status-item:before { 
        content: ""; 
        position: absolute; 
        left: -32px; 
        top: 28px; 
        width: 20px; 
        height: 20px; 
        border-radius: 50%; 
        background: linear-gradient(135deg, #28A745, #20C997); 
        border: 4px solid white;
        box-shadow: 0 0 0 2px var(--coffee-brown);
        transition: var(--transition); 
    }
    .status-item.inactive:before { 
        background: linear-gradient(135deg, #DC3545, #C82333); 
    }
    .status-item:hover { 
        transform: translateY(-3px); 
        box-shadow: 0 6px 20px rgba(139, 69, 19, 0.2); 
        border-color: var(--coffee-brown);
    }
    .status-item h6 { 
        font-weight: 700; 
        letter-spacing: 0.5px; 
        font-size: 1rem; 
        color: var(--coffee-brown); 
        text-transform: uppercase; 
        margin-bottom: 0.5rem;
    }
    .status-item p { 
        color: var(--coffee-dark) !important; 
        font-size: 0.95rem; 
        line-height: 1.5;
        margin: 0;
    }

    /* TYPO IMPROVEMENTS */
    p, .info-value, .feature-list li, .status-item p { 
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
    }
    h3, h5 { 
        font-family: 'Arial', 'Helvetica', sans-serif; 
    }

    /* RESPONSIVE TWEAKS */
    @media (max-width: 991.98px) {
        .product-card { margin-bottom: 2rem; }
    }
    @media (max-width: 575.98px) {
        .product-card { padding: 2rem 1.5rem; }
        .feature-list { grid-template-columns: 1fr; }
        .status-item { padding: 16px 20px; }
    }

    /* ADDITIONAL CONTRAST IMPROVEMENTS */
    .text-muted { color: #6c757d !important; }
    .card-body { color: var(--coffee-dark); }
    a { color: var(--coffee-brown); text-decoration: none; }
    a:hover { color: var(--coffee-accent); text-decoration: underline; }
</style>
</style>
@endpush

@section('content')
    <div class="row">
        <!-- Product Display -->
        <div class="col-lg-4">
            <div class="product-card">
                @if($product->is_featured)
                    <span class="ribbon"><i class="fas fa-star me-1"></i> Unggulan</span>
                @endif
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
                
                <div class="mt-4">
                    <a href="{{ route('order.select', ['product' => $product->name, 'price' => $product->price]) }}" class="btn btn-success">
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
                            <button type="submit" class="btn btn-danger w-100 btn-delete" data-confirm="Yakin ingin menghapus produk ini? Tindakan tidak dapat dibatalkan.">
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
                    <p class="mb-0" style="line-height:1.7; font-size:1.1rem; font-weight:400; letter-spacing:0.3px; color: var(--coffee-dark);">
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
                                ({{ optional($product->created_at)->diffForHumans() ?? 'N/A' }})
                            </p>
                        </div>
                        
                        <div class="status-item">
                            <h6 class="mb-1">Terakhir Diperbarui</h6>
                            <p class="mb-0 text-muted">
                                <i class="fas fa-clock me-1"></i>
                                {{ $product->updated_at->format('d F Y, H:i') }}
                                ({{ optional($product->updated_at)->diffForHumans() ?? 'N/A' }})
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
