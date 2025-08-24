@extends('layouts.admin')

@section('title', 'Kelola Produk - Coffee Manjehe Admin')
@section('page_title', 'Kelola Produk Kopi')
@section('page_subtitle', 'Tambah, edit, dan kelola semua produk kopi Anda')

@push('styles')
<style>
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
    
    .filter-card {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        border-radius: 10px;
        border: none;
    }
</style>
@endpush

@section('content')
    <!-- Action Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
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
                                        <div class="d-flex align-items-center">
                                            <div class="me-3">
                                                <i class="{{ $product->icon }} fa-2x text-primary"></i>
                                            </div>
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