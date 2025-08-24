@extends('layouts.admin')

@section('title', 'Edit Produk - Coffee Manjehe Admin')
@section('page_title', 'Edit Produk Kopi')
@section('page_subtitle', 'Perbarui informasi produk "' . $product->name . '"')

@push('styles')
<style>
    .icon-selector {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));
        gap: 10px;
        max-height: 300px;
        overflow-y: auto;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        padding: 15px;
        background-color: #f8f9fa;
    }
    
    .icon-option {
        text-align: center;
        padding: 15px 10px;
        border: 2px solid transparent;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        background: white;
    }
    
    .icon-option:hover {
        border-color: #8B4513;
        background-color: #f8f4e6;
        transform: translateY(-2px);
    }
    
    .icon-option.selected {
        border-color: #8B4513;
        background-color: #8B4513;
        color: white;
    }
    
    .icon-option i {
        font-size: 24px;
        margin-bottom: 5px;
        display: block;
    }
    
    .feature-input {
        margin-bottom: 10px;
    }
    
    .price-preview {
        font-size: 1.25rem;
        font-weight: bold;
        color: #28a745;
        margin-top: 5px;
    }
    
    .preview-card {
        background: linear-gradient(135deg, #8B4513, #D2691E);
        color: white;
        border-radius: 15px;
        padding: 20px;
        text-align: center;
    }
    
    .preview-icon {
        font-size: 3rem;
        margin-bottom: 15px;
        opacity: 0.9;
    }
</style>
@endpush

@section('content')
    <div class="row">
        <!-- Form Column -->
        <div class="col-lg-8">
            <form action="{{ route('admin.products.update', $product) }}" method="POST" id="productForm">
                @csrf
                @method('PUT')
                
                @include('admin.products.form')

                <!-- Action Buttons -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>
                                Kembali
                            </a>
                            <div>
                                <a href="{{ route('admin.products.show', $product) }}" class="btn btn-outline-info me-2">
                                    <i class="fas fa-eye me-2"></i>
                                    Lihat Detail
                                </a>
                                <button type="submit" class="btn btn-primary btn-loading">
                                    <i class="fas fa-save me-2"></i>
                                    Update Produk
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Preview Column -->
        <div class="col-lg-4">
            <div class="position-sticky" style="top: 20px;">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fas fa-eye me-2"></i>
                            Preview Produk
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="preview-card" id="productPreview">
                            <div class="preview-icon">
                                <i class="{{ $product->icon ?? 'fas fa-coffee' }}" id="previewIcon"></i>
                            </div>
                            <h5 id="previewName">{{ $product->name }}</h5>
                            <p class="mb-2" id="previewCategory">
                                @switch($product->category)
                                    @case('hot') Kopi Panas @break
                                    @case('cold') Kopi Dingin @break
                                    @case('beans') Biji Kopi @break
                                    @default Kategori @endswitch
                            </p>
                            <h4 class="mb-3" id="previewPrice">{{ $product->formatted_price }}</h4>
                            <p class="small" id="previewDescription">{{ $product->description }}</p>
                            
                            <div class="mt-3" id="previewFeatures">
                                @if($product->features && count($product->features) > 0)
                                    <div class="small">
                                        <strong>Fitur:</strong><br>
                                        @foreach($product->features as $feature)
                                            <i class="fas fa-check me-1"></i> {{ $feature }}<br>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            
                            <div class="mt-3" id="previewStatus">
                                @if($product->is_active)
                                    <span class="badge bg-success me-1">Aktif</span>
                                @else
                                    <span class="badge bg-danger me-1">Nonaktif</span>
                                @endif
                                
                                @if($product->is_featured)
                                    <span class="badge bg-warning text-dark">Unggulan</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Real-time preview updates
    $('#name').on('input', function() {
        const name = $(this).val() || 'Nama Produk';
        $('#previewName').text(name);
    });

    $('#description').on('input', function() {
        const desc = $(this).val() || 'Deskripsi produk akan muncul di sini...';
        $('#previewDescription').text(desc);
    });

    $('#category').on('change', function() {
        const category = $(this).val();
        let categoryText = 'Kategori';
        
        switch(category) {
            case 'hot':
                categoryText = 'Kopi Panas';
                break;
            case 'cold':
                categoryText = 'Kopi Dingin';
                break;
            case 'beans':
                categoryText = 'Biji Kopi';
                break;
        }
        
        $('#previewCategory').text(categoryText);
    });

    // Update features preview
    function updatePreview() {
        const features = [];
        $('input[name="features[]"]').each(function() {
            if ($(this).val().trim()) {
                features.push($(this).val().trim());
            }
        });

        let featuresHtml = '';
        if (features.length > 0) {
            featuresHtml = '<div class="small"><strong>Fitur:</strong><br>';
            features.forEach(feature => {
                featuresHtml += `<i class="fas fa-check me-1"></i> ${feature}<br>`;
            });
            featuresHtml += '</div>';
        }
        
        $('#previewFeatures').html(featuresHtml);
    }

    // Update preview when features change
    $(document).on('input', 'input[name="features[]"]', updatePreview);

    // Status preview
    $('#is_active, #is_featured').on('change', function() {
        let statusHtml = '';
        
        if ($('#is_active').is(':checked')) {
            statusHtml += '<span class="badge bg-success me-1">Aktif</span>';
        } else {
            statusHtml += '<span class="badge bg-danger me-1">Nonaktif</span>';
        }
        
        if ($('#is_featured').is(':checked')) {
            statusHtml += '<span class="badge bg-warning text-dark">Unggulan</span>';
        }
        
        $('#previewStatus').html(statusHtml);
    });

    // Initial preview update
    updatePreview();
});
</script>
@endpushyouts.admin')
@section('content')
<div class="container">
    <h1>Edit Produk Kopi</h1>
    <form action="{{ route('admin.products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.products.form', ['product' => $product])
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
