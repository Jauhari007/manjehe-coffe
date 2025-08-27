@extends('layouts.admin')
@section('title', 'Kelola Produk - Manjehe Coffee Admin')
@section('page_title', 'Kelola Produk Kopi')
<link rel="icon" type="image/png" href="{{ asset('assets/manjehe_logo.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/manjehe_logo.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/manjehe_logo.png') }}">
<link rel="icon" type="image/png" sizes="48x48" href="{{ asset('assets/manjehe_logo.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/manjehe_logo.png') }}">
<link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/manjehe_logo.png') }}">
<link rel="icon" type="image/png" sizes="512x512" href="{{ asset('assets/manjehe_logo.png') }}">
@section('page_subtitle', 'Tambah, edit, dan kelola semua produk kopi Anda')

@push('styles')
<style>
    /* Product Page Dark Theme */
    .product-image {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 8px;
    }
    
    .status-toggle {
        cursor: pointer;
    }
    
    .table-actions {
        white-space: nowrap;
    }
    
    /* Filter Card - Coffee Theme */
    .filter-card {
        background: linear-gradient(135deg, rgba(212, 165, 116, 0.08), rgba(139, 69, 19, 0.05)) !important;
        border: 1px solid rgba(212, 165, 116, 0.2) !important;
        border-radius: 15px !important;
        backdrop-filter: blur(20px);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }
    
    .filter-card .card-body {
        padding: 2rem;
    }
    
    .filter-card .form-label {
        color: #D4A574 !important;
        font-weight: 600;
        margin-bottom: 0.75rem;
    }
    
    .filter-card .form-control,
    .filter-card .form-select {
        background: rgba(26, 15, 10, 0.4) !important;
        border: 1px solid rgba(212, 165, 116, 0.3) !important;
        color: #e5e7eb !important;
        border-radius: 10px !important;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
    }
    
    .filter-card .form-control:focus,
    .filter-card .form-select:focus {
        background: rgba(26, 15, 10, 0.6) !important;
        border-color: #D4A574 !important;
        box-shadow: 0 0 0 0.2rem rgba(212, 165, 116, 0.15) !important;
        color: #D4A574 !important;
    }
    
    .filter-card .input-group-text {
        background: rgba(212, 165, 116, 0.2) !important;
        border: 1px solid rgba(212, 165, 116, 0.3) !important;
        color: #D4A574 !important;
        border-radius: 10px 0 0 10px !important;
    }
    
    /* Main Card - Dark Theme */
    .card {
        background: linear-gradient(135deg, rgba(212, 165, 116, 0.05), rgba(139, 69, 19, 0.03)) !important;
        border: 1px solid rgba(212, 165, 116, 0.15) !important;
        border-radius: 15px !important;
        backdrop-filter: blur(20px);
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }
    
    /* Table Styling - Dark Coffee Theme */
    .table {
        background: transparent !important;
        margin-bottom: 0;
    }
    
    .table thead th {
        background: linear-gradient(135deg, rgba(212, 165, 116, 0.15), rgba(139, 69, 19, 0.1)) !important;
        border: none !important;
        color: #D4A574 !important;
        font-weight: 600;
        padding: 1.5rem 1rem;
        border-bottom: 2px solid rgba(212, 165, 116, 0.3) !important;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 0.85rem;
    }
    
    .table tbody td {
        background: rgba(26, 15, 10, 0.3) !important;
        border: none !important;
        color: #e5e7eb !important;
        padding: 1.25rem 1rem;
        border-bottom: 1px solid rgba(212, 165, 116, 0.1) !important;
        vertical-align: middle;
    }
    
    .table tbody tr {
        transition: all 0.3s ease;
    }
    
    .table tbody tr:hover {
        background: rgba(212, 165, 116, 0.1) !important;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(212, 165, 116, 0.15);
    }
    
    .table tbody tr:hover td {
        background: transparent !important;
        border-bottom-color: rgba(212, 165, 116, 0.3) !important;
    }
    
    /* Product Info Styling */
    .table tbody h6 {
        color: #D4A574 !important;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    
    .table tbody .text-muted {
        color: rgba(229, 231, 235, 0.7) !important;
    }
    
    /* Badge Styling */
    .badge {
        font-weight: 500;
        padding: 0.5rem 0.8rem;
        border-radius: 8px;
        font-size: 0.75rem;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .badge.bg-secondary {
        background: linear-gradient(135deg, rgba(212, 165, 116, 0.8), rgba(139, 69, 19, 0.6)) !important;
        color: #2D1810 !important;
        border-color: rgba(212, 165, 116, 0.4);
    }
    
    .badge.bg-success {
        background: linear-gradient(135deg, #10b981, #059669) !important;
        border-color: rgba(16, 185, 129, 0.4);
    }
    
    .badge.bg-danger {
        background: linear-gradient(135deg, #ef4444, #dc2626) !important;
        border-color: rgba(239, 68, 68, 0.4);
    }
    
    .badge.bg-warning {
        background: linear-gradient(135deg, #f59e0b, #d97706) !important;
        border-color: rgba(245, 158, 11, 0.4);
    }
    
    /* Button Styling */
    .btn {
        border-radius: 10px !important;
        font-weight: 500;
        transition: all 0.3s ease;
        border-width: 1px;
    }
    
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #D4A574, #B8956A) !important;
        border-color: #D4A574 !important;
        color: #2D1810 !important;
    }
    
    .btn-primary:hover {
        background: linear-gradient(135deg, #B8956A, #A67C52) !important;
        border-color: #B8956A !important;
        color: #2D1810 !important;
    }
    
    .btn-outline-primary {
        border-color: #D4A574 !important;
        color: #D4A574 !important;
        background: transparent !important;
    }
    
    .btn-outline-primary:hover {
        background: rgba(212, 165, 116, 0.1) !important;
        border-color: #D4A574 !important;
        color: #D4A574 !important;
    }
    
    .btn-outline-info {
        border-color: #3b82f6 !important;
        color: #3b82f6 !important;
    }
    
    .btn-outline-info:hover {
        background: rgba(59, 130, 246, 0.1) !important;
        border-color: #3b82f6 !important;
        color: #3b82f6 !important;
    }
    
    .btn-outline-warning {
        border-color: #f59e0b !important;
        color: #f59e0b !important;
    }
    
    .btn-outline-warning:hover {
        background: rgba(245, 158, 11, 0.1) !important;
        border-color: #f59e0b !important;
        color: #f59e0b !important;
    }
    
    .btn-outline-danger {
        border-color: #ef4444 !important;
        color: #ef4444 !important;
    }
    
    .btn-outline-danger:hover {
        background: rgba(239, 68, 68, 0.1) !important;
        border-color: #ef4444 !important;
        color: #ef4444 !important;
    }
    
    .btn-outline-secondary {
        border-color: rgba(212, 165, 116, 0.6) !important;
        color: rgba(212, 165, 116, 0.8) !important;
    }
    
    .btn-outline-secondary:hover {
        background: rgba(212, 165, 116, 0.1) !important;
        border-color: #D4A574 !important;
        color: #D4A574 !important;
    }
    
    /* Header Styling */
    .page-header h4 {
        color: #D4A574 !important;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    
    .page-header .text-muted {
        color: rgba(229, 231, 235, 0.7) !important;
    }
    
    /* Card Footer */
    .card-footer {
        background: rgba(212, 165, 116, 0.05) !important;
        border-top: 1px solid rgba(212, 165, 116, 0.2) !important;
        color: #e5e7eb !important;
        padding: 1.5rem;
    }
    
    .card-footer .text-muted {
        color: rgba(229, 231, 235, 0.7) !important;
    }
    
    /* Pagination Styling */
    .pagination .page-link {
        background: rgba(26, 15, 10, 0.4) !important;
        border: 1px solid rgba(212, 165, 116, 0.3) !important;
        color: #D4A574 !important;
        margin: 0 2px;
        border-radius: 8px !important;
    }
    
    .pagination .page-link:hover {
        background: rgba(212, 165, 116, 0.2) !important;
        border-color: #D4A574 !important;
        color: #D4A574 !important;
    }
    
    .pagination .page-item.active .page-link {
        background: linear-gradient(135deg, #D4A574, #B8956A) !important;
        border-color: #D4A574 !important;
        color: #2D1810 !important;
    }
    
    /* Empty State */
    .text-center.py-5 {
        background: rgba(26, 15, 10, 0.2) !important;
        border: 2px dashed rgba(212, 165, 116, 0.3) !important;
        border-radius: 15px !important;
        margin: 2rem 0;
        padding: 3rem 2rem !important;
    }
    
    .text-center.py-5 h4 {
        color: #D4A574 !important;
    }
    
    .text-center.py-5 p {
        color: rgba(229, 231, 235, 0.7) !important;
    }
    
    .text-center.py-5 .fa-coffee {
        color: rgba(212, 165, 116, 0.6) !important;
    }
    
    /* Icon Styling */
    .fa-2x {
        color: #D4A574 !important;
    }
    
    /* Price Styling */
    .text-success {
        color: #10b981 !important;
        font-weight: 600;
    }
    
    /* Responsive Enhancements */
    @media (max-width: 768px) {
        .filter-card .card-body {
            padding: 1.5rem;
        }
        
        .table thead th,
        .table tbody td {
            padding: 1rem 0.75rem;
        }
        
        .btn-group .btn {
            padding: 0.375rem 0.5rem;
        }
    }
    
    /* Animation enhancements */
    .card,
    .filter-card {
        animation: fadeInUp 0.6s ease-out;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Button group enhancements */
    .btn-group .btn {
        margin: 0 1px;
    }
    
    .btn-group .btn:first-child {
        border-radius: 8px 0 0 8px !important;
    }
    
    .btn-group .btn:last-child {
        border-radius: 0 8px 8px 0 !important;
    }
    
    .btn-group .btn:only-child {
        border-radius: 8px !important;
    }
</style>
@endpush

@section('content')
    <!-- Action Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 page-header">
        <div>
            <h4 class="mb-1">Daftar Produk Kopi</h4>
            <p class="text-muted mb-0">Total: {{ $products->total() }} produk</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>
            Tambah Produk Baru
        </a>
    </div>

    <!-- Filter & Search -->
    <div class="card filter-card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('admin.products.index') }}" class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Cari Produk</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control" name="search" 
                               value="{{ request('search') }}" placeholder="Nama produk...">
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Kategori</label>
                    <select class="form-select" name="category">
                        <option value="">Semua Kategori</option>
                        <option value="hot" {{ request('category') == 'hot' ? 'selected' : '' }}>Kopi Panas</option>
                        <option value="cold" {{ request('category') == 'cold' ? 'selected' : '' }}>Kopi Dingin</option>
                        <option value="beans" {{ request('category') == 'beans' ? 'selected' : '' }}>Biji Kopi</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="status">
                        <option value="">Semua Status</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                        <option value="featured" {{ request('status') == 'featured' ? 'selected' : '' }}>Unggulan</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">&nbsp;</label>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-outline-primary">
                            <i class="fas fa-filter me-1"></i> Filter
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Products Table -->
    <div class="card">
        <div class="card-body p-0">
            @if($products->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Produk</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>Ditambahkan</th>
                                <th width="150">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        @if($product->images->count() > 0)
                                            <img src="{{ $product->images->first()->image_url }}" class="product-image" alt="Gambar Produk">
                                        @else
                                            <span class="text-muted small">Tidak ada gambar</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h6 class="mb-1 fw-bold">{{ $product->name }}</h6>
                                                <p class="mb-0 text-muted small">
                                                    {{ Str::limit($product->description, 50) }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary">
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
                                        </span>
                                    </td>
                                    <td>
                                        <strong class="text-success">{{ $product->formatted_price }}</strong>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column gap-1">
                                            @if($product->is_active)
                                                <span class="badge bg-success">Aktif</span>
                                            @else
                                                <span class="badge bg-danger">Nonaktif</span>
                                            @endif
                                            
                                            @if($product->is_featured)
                                                <span class="badge bg-warning text-dark">
                                                    <i class="fas fa-star me-1"></i> Unggulan
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <small class="text-muted">
                                            {{ $product->created_at->format('d M Y') }}<br>
                                            {{ $product->created_at->format('H:i') }}
                                        </small>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.products.show', $product) }}" 
                                               class="btn btn-sm btn-outline-info" title="Lihat">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.products.edit', $product) }}" 
                                               class="btn btn-sm btn-outline-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.products.destroy', $product) }}" 
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger btn-delete" 
                                                        title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                @if($products->hasPages())
                    <div class="card-footer">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted">
                                Menampilkan {{ $products->firstItem() }} - {{ $products->lastItem() }} 
                                dari {{ $products->total() }} produk
                            </div>
                            {{ $products->links() }}
                        </div>
                    </div>
                @endif
            @else
                <div class="text-center py-5">
                    <i class="fas fa-coffee fa-4x text-muted mb-3"></i>
                    <h4 class="text-muted">Belum ada produk</h4>
                    <p class="text-muted mb-4">
                        @if(request()->hasAny(['search', 'category', 'status']))
                            Tidak ada produk yang sesuai dengan filter Anda.
                        @else
                            Mulai dengan menambahkan produk kopi pertama Anda.
                        @endif
                    </p>
                    
                    @if(request()->hasAny(['search', 'category', 'status']))
                        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary me-2">
                            <i class="fas fa-times me-2"></i>
                            Reset Filter
                        </a>
                    @endif
                    
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>
                        Tambah Produk Pertama
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Auto-submit form on filter change
    $(document).ready(function() {
        $('select[name="category"], select[name="status"]').change(function() {
            $(this).closest('form').submit();
        });
    });
</script>
@endpush