@extends('layouts.admin')

@section('title', 'Edit Produk - Coffee Manjehe Admin')
@section('page_title', 'Edit Produk Kopi')
@section('page_subtitle', 'Perbarui informasi produk "' . $product->name . '"')

@push('styles')
<style>
    /* Dark Coffee Theme for Edit Product Form */
    .icon-selector {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));
        gap: 12px;
        max-height: 350px;
        overflow-y: auto;
        border: 1px solid rgba(212, 165, 116, 0.3);
        border-radius: 12px;
        padding: 20px;
        background: linear-gradient(135deg, rgba(26, 15, 10, 0.4), rgba(26, 15, 10, 0.2)) !important;
        backdrop-filter: blur(10px);
    }
    
    .icon-selector::-webkit-scrollbar {
        width: 8px;
    }
    
    .icon-selector::-webkit-scrollbar-track {
        background: rgba(212, 165, 116, 0.1);
        border-radius: 10px;
    }
    
    .icon-selector::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, #D4A574, rgba(212, 165, 116, 0.8));
        border-radius: 10px;
    }
    
    .icon-option {
        text-align: center;
        padding: 15px 10px;
        border: 2px solid rgba(212, 165, 116, 0.2);
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        background: rgba(26, 15, 10, 0.3) !important;
        color: #e5e7eb !important;
    }
    
    .icon-option:hover {
        border-color: #D4A574 !important;
        background: rgba(212, 165, 116, 0.15) !important;
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(212, 165, 116, 0.2);
        color: #D4A574 !important;
    }
    
    .icon-option.selected {
        border-color: #D4A574 !important;
        background: linear-gradient(135deg, #D4A574, rgba(212, 165, 116, 0.8)) !important;
        color: #2D1810 !important;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(212, 165, 116, 0.3);
    }
    
    .icon-option i {
        font-size: 24px;
        margin-bottom: 8px;
        display: block;
        transition: transform 0.3s ease;
    }
    
    .icon-option:hover i {
        transform: scale(1.1);
    }
    
    .icon-option small {
        font-size: 0.75rem;
        font-weight: 500;
        text-transform: capitalize;
    }
    
    /* Form Styling - Dark Theme */
    .card {
        background: linear-gradient(135deg, rgba(212, 165, 116, 0.05), rgba(139, 69, 19, 0.03)) !important;
        border: 1px solid rgba(212, 165, 116, 0.15) !important;
        border-radius: 15px !important;
        backdrop-filter: blur(20px);
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
    }
    
    .card-header {
        background: linear-gradient(135deg, rgba(212, 165, 116, 0.15), rgba(139, 69, 19, 0.1)) !important;
        border-bottom: 1px solid rgba(212, 165, 116, 0.2) !important;
        border-radius: 15px 15px 0 0 !important;
        padding: 1.5rem;
    }
    
    .card-header h5 {
        color: #D4A574 !important;
        font-weight: 600;
        margin-bottom: 0;
    }
    
    .card-body {
        padding: 2rem;
        background: transparent !important;
    }
    
    /* Form Controls - Dark Theme */
    .form-control,
    .form-select {
        background: rgba(26, 15, 10, 0.4) !important;
        border: 1px solid rgba(212, 165, 116, 0.3) !important;
        color: #e5e7eb !important;
        border-radius: 10px !important;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
    }
    
    .form-control:focus,
    .form-select:focus {
        background: rgba(26, 15, 10, 0.6) !important;
        border-color: #D4A574 !important;
        box-shadow: 0 0 0 0.2rem rgba(212, 165, 116, 0.15) !important;
        color: #D4A574 !important;
    }
    
    /* Remove all white backgrounds from inputs */
    .form-control,
    .form-select,
    input[type="text"],
    input[type="number"],
    textarea,
    select {
        background: rgba(26, 15, 10, 0.4) !important;
        background-color: rgba(26, 15, 10, 0.4) !important;
    }
    
    .form-control:focus,
    .form-select:focus,
    input[type="text"]:focus,
    input[type="number"]:focus,
    textarea:focus,
    select:focus {
        background: rgba(26, 15, 10, 0.6) !important;
        background-color: rgba(26, 15, 10, 0.6) !important;
    }
    
    .form-control::placeholder {
        color: rgba(229, 231, 235, 0.5) !important;
    }
    
    /* Completely Remove Floating Label Double Text Effect */
    .form-floating > label {
        color: #D4A574 !important;
        font-weight: 500;
        background: transparent !important;
        padding: 0.375rem 0.75rem !important;
        border-radius: 6px !important;
        opacity: 1 !important;
        text-shadow: none !important;
        z-index: 2 !important;
    }
    
    /* Hide placeholder text to prevent double effect */
    .form-floating > .form-control::placeholder,
    .form-floating > .form-select::placeholder {
        color: transparent !important;
        opacity: 0 !important;
    }
    
    /* Ensure clean label display without Bootstrap conflicts */
    .form-floating > .form-control:focus ~ label,
    .form-floating > .form-control:not(:placeholder-shown) ~ label,
    .form-floating > .form-select ~ label {
        background: transparent !important;
        opacity: 1 !important;
        text-shadow: none !important;
        transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem) !important;
        top: 0px !important;
    }
    
    /* Clean input styling without interference */
    .form-floating > .form-control:focus,
    .form-floating > .form-control:not(:placeholder-shown),
    .form-floating > .form-select:focus,
    .form-floating > .form-select:not([value=""]) {
        padding-top: 1.625rem !important;
        padding-bottom: 0.625rem !important;
    }
    
    /* Force override any Bootstrap default styling */
    .form-floating label {
        background: transparent !important;
        opacity: 1 !important;
        text-shadow: none !important;
    }
    
    /* Feature Input Styling */
    .feature-input {
        margin-bottom: 15px;
    }
    
    .input-group .form-control {
        border-radius: 10px 0 0 10px !important;
    }
    
    .input-group .btn {
        border-radius: 0 10px 10px 0 !important;
        border-left: none;
    }
    
    /* Price Preview */
    .price-preview {
        font-size: 1.5rem;
        font-weight: bold;
        color: #10b981 !important;
        margin-top: 10px;
        padding: 0.75rem;
        background: rgba(16, 185, 129, 0.1);
        border: 1px solid rgba(16, 185, 129, 0.3);
        border-radius: 10px;
        text-align: center;
    }
    
    /* Preview Card Enhancement */
    .preview-card {
        background: linear-gradient(135deg, #D4A574, #B8956A) !important;
        color: #2D1810 !important;
        border-radius: 20px !important;
        padding: 2rem;
        text-align: center;
        box-shadow: 0 15px 40px rgba(212, 165, 116, 0.3);
        transition: transform 0.3s ease;
    }
    
    .preview-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 50px rgba(212, 165, 116, 0.4);
    }
    
    .preview-icon {
        font-size: 4rem !important;
        margin-bottom: 20px;
        opacity: 0.9;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }
    
    .preview-card h5 {
        font-weight: 700;
        margin-bottom: 10px;
        color: #2D1810 !important;
    }
    
    .preview-card h4 {
        color: #1a5f3f !important;
        font-weight: 800;
        text-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }
    
    /* Switch Styling */
    .form-check-input {
        background-color: rgba(26, 15, 10, 0.4) !important;
        border: 1px solid rgba(212, 165, 116, 0.5) !important;
        width: 3rem;
        height: 1.5rem;
    }
    
    .form-check-input:checked {
        background-color: #D4A574 !important;
        border-color: #D4A574 !important;
    }
    
    .form-check-input:focus {
        box-shadow: 0 0 0 0.2rem rgba(212, 165, 116, 0.25) !important;
    }
    
    .form-check-label {
        color: #e5e7eb !important;
        margin-left: 0.75rem;
    }
    
    .form-check-label strong {
        color: #D4A574 !important;
    }
    
    .form-check-label .text-muted {
        color: rgba(229, 231, 235, 0.7) !important;
    }
    
    /* Button Styling */
    .btn {
        border-radius: 10px !important;
        font-weight: 500;
        transition: all 0.3s ease;
        padding: 0.75rem 1.5rem;
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
    
    .btn-outline-secondary {
        border-color: rgba(212, 165, 116, 0.6) !important;
        color: rgba(212, 165, 116, 0.8) !important;
    }
    
    .btn-outline-secondary:hover {
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
    
    .btn-outline-danger {
        border-color: #ef4444 !important;
        color: #ef4444 !important;
    }
    
    .btn-outline-danger:hover {
        background: rgba(239, 68, 68, 0.1) !important;
        border-color: #ef4444 !important;
        color: #ef4444 !important;
    }
    
    .btn-sm.btn-outline-primary {
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
    }
    
    /* Badge Styling */
    .badge {
        font-weight: 500;
        padding: 0.5rem 0.8rem;
        border-radius: 8px;
        font-size: 0.75rem;
        border: 1px solid rgba(255, 255, 255, 0.2);
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
    
    /* Text Color Adjustments */
    .text-muted {
        color: rgba(229, 231, 235, 0.7) !important;
    }
    
    /* Invalid Feedback */
    .invalid-feedback {
        color: #ef4444 !important;
    }
    
    /* Sticky Preview */
    .position-sticky {
        top: 2rem !important;
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .card-body {
            padding: 1.5rem;
        }
        
        .card-header {
            padding: 1rem;
        }
        
        .icon-selector {
            grid-template-columns: repeat(auto-fill, minmax(70px, 1fr));
            gap: 10px;
            padding: 15px;
        }
        
        .icon-option {
            padding: 12px 8px;
        }
        
        .icon-option i {
            font-size: 20px;
        }
        
        .preview-card {
            padding: 1.5rem;
        }
        
        .preview-icon {
            font-size: 3rem !important;
        }
    }
    
    /* Animation */
    .card {
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
    
    /* Small Text Adjustments */
    small.text-muted {
        color: rgba(229, 231, 235, 0.6) !important;
    }
    
    /* Only fix the white background issue without breaking layout */
    .form-floating > label:after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(26, 15, 10, 0.95) !important;
        border-radius: 4px;
        z-index: -1;
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
