@extends('layouts.admin')

@section('title', 'Edit Produk - Coffee Manjehe Admin')
@section('page_title', 'Edit Produk Kopi')
@section('page_subtitle', 'Perbarui informasi produk "' . $product->name . '"')

@push('styles')
<style>
    /* Dark Coffee Theme for Edit Product Form */
    
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
    
    .form-control::placeholder {
        color: rgba(229, 231, 235, 0.5) !important;
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
    
    /* Form input styling */
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
    
    .text-muted {
        color: rgba(229, 231, 235, 0.7) !important;
    }
    
    .invalid-feedback {
        color: #ef4444 !important;
    }
    
    .img-thumbnail {
        border: 2px solid rgba(212, 165, 116, 0.3) !important;
        background: rgba(26, 15, 10, 0.2) !important;
        border-radius: 10px !important;
    }
    
    @media (max-width: 768px) {
        .card-body {
            padding: 1.5rem;
        }
        
        .card-header {
            padding: 1rem;
        }
        
        .preview-card {
            padding: 1.5rem;
        }
    }
    
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
</style>
@endpush

@section('content')
    <div class="row">
        <!-- Form Column -->
        <div class="col-lg-8">
            <form action="{{ route('admin.products.update', $product) }}" 
                  method="POST" 
                  id="productForm" 
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <!-- Product Information Card -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fas fa-info-circle me-2"></i>
                            Informasi Produk
                        </h5>
                    </div>
                    <div class="card-body">
                        <!-- Product Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                <i class="fas fa-coffee me-2"></i>
                                Nama Produk
                            </label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name', $product->name) }}" 
                                   placeholder="Contoh: Kopi Arabika Premium"
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">
                                <i class="fas fa-align-left me-2"></i>
                                Deskripsi
                            </label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" 
                                      name="description" 
                                      rows="4" 
                                      placeholder="Masukkan deskripsi produk..."
                                      required>{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <!-- Price -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="price" class="form-label">
                                        <i class="fas fa-tag me-2"></i>
                                        Harga (Rp)
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('price') is-invalid @enderror" 
                                           id="price" 
                                           name="price" 
                                           value="{{ old('price', number_format($product->price, 0, ',', '.')) }}" 
                                           placeholder="Contoh: 25.000"
                                           required>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Category -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="category" class="form-label">
                                        <i class="fas fa-list me-2"></i>
                                        Kategori
                                    </label>
                                    <select class="form-select @error('category') is-invalid @enderror" 
                                            id="category" 
                                            name="category" 
                                            required>
                                        <option value="">Pilih Kategori</option>
                                        <option value="hot" {{ old('category', $product->category) == 'hot' ? 'selected' : '' }}>
                                            Kopi Panas
                                        </option>
                                        <option value="cold" {{ old('category', $product->category) == 'cold' ? 'selected' : '' }}>
                                            Kopi Dingin
                                        </option>
                                        <option value="beans" {{ old('category', $product->category) == 'beans' ? 'selected' : '' }}>
                                            Biji Kopi
                                        </option>
                                    </select>
                                    @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Images Card -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fas fa-images me-2"></i>
                            Gambar Produk
                        </h5>
                    </div>
                    <div class="card-body">
                        <!-- Current Images -->
                        @if($product->images && $product->images->count() > 0)
                            <div class="mb-4">
                                <h6 class="text-muted mb-3">Gambar Saat Ini:</h6>
                                <div class="row" id="currentImages">
                                    @foreach($product->images as $image)
                                        <div class="col-md-4 mb-3">
                                            <div class="position-relative">
                                                <img src="{{ Storage::url($image->image_path) }}" 
                                                     class="img-thumbnail" 
                                                     alt="Product Image" 
                                                     style="width: 100%; height: 150px; object-fit: cover;">
                                                <span class="badge bg-info position-absolute top-0 start-0 m-2">
                                                    Gambar {{ $loop->iteration }}
                                                </span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Upload New Images -->
                        <div class="mb-3">
                            <label for="images" class="form-label">
                                Upload Gambar Baru (Opsional)
                            </label>
                            <input type="file" 
                                   class="form-control @error('images') is-invalid @enderror @error('images.*') is-invalid @enderror" 
                                   id="images" 
                                   name="images[]" 
                                   multiple 
                                   accept="image/*"
                                   onchange="previewImages(this)">
                            <div class="form-text">
                                Format: JPG, PNG, GIF, WEBP. Maksimal 5MB per file. Maksimal 5 gambar.
                                <br><strong>Catatan:</strong> Jika Anda mengupload gambar baru, semua gambar lama akan diganti.
                            </div>
                            @error('images')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @error('images.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image Preview Container -->
                        <div class="row" id="imagePreviewContainer"></div>
                    </div>
                </div>

                <!-- Product Features Card -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fas fa-star me-2"></i>
                            Fitur Produk
                        </h5>
                    </div>
                    <div class="card-body">
                        <div id="featuresContainer">
                            @if($product->features && count($product->features) > 0)
                                @foreach($product->features as $feature)
                                    <div class="feature-input">
                                        <div class="input-group">
                                            <input type="text" 
                                                   class="form-control" 
                                                   name="features[]" 
                                                   value="{{ $feature }}"
                                                   placeholder="Contoh: 100% Arabika">
                                            <button type="button" class="btn btn-outline-danger remove-feature">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="feature-input">
                                    <div class="input-group">
                                        <input type="text" 
                                               class="form-control" 
                                               name="features[]" 
                                               placeholder="Contoh: 100% Arabika">
                                        <button type="button" class="btn btn-outline-danger remove-feature">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        
                        <button type="button" id="addFeature" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-plus me-2"></i>
                            Tambah Fitur
                        </button>
                    </div>
                </div>

                <!-- WhatsApp Settings Card -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fab fa-whatsapp me-2"></i>
                            Pengaturan WhatsApp
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="whatsapp_text" class="form-label">
                                Custom Text WhatsApp (Opsional)
                            </label>
                            <textarea class="form-control" 
                                      id="whatsapp_text" 
                                      name="whatsapp_text" 
                                      rows="3" 
                                      placeholder="Text khusus untuk WhatsApp...">{{ old('whatsapp_text', $product->whatsapp_text) }}</textarea>
                            <div class="form-text">
                                Jika kosong, akan menggunakan template default.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Settings Card -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fas fa-cog me-2"></i>
                            Pengaturan
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" 
                                           type="checkbox" 
                                           id="is_active" 
                                           name="is_active" 
                                           value="1" 
                                           {{ old('is_active', $product->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        <i class="fas fa-eye me-2"></i>
                                        Aktif
                                    </label>
                                </div>
                                <small class="text-muted">Produk akan ditampilkan di website</small>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" 
                                           type="checkbox" 
                                           id="is_featured" 
                                           name="is_featured" 
                                           value="1" 
                                           {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_featured">
                                        <i class="fas fa-star me-2"></i>
                                        Produk Unggulan
                                    </label>
                                </div>
                                <small class="text-muted">Akan ditampilkan di bagian unggulan</small>
                            </div>
                        </div>
                    </div>
                </div>

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
                                <button type="submit" class="btn btn-primary">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Features Management
    initializeFeaturesManagement();
    
    // Initialize Form Submission
    initializeFormSubmission();
    
    // Initialize Image Preview
    initializeImagePreview();
    
    // Initialize Price Formatting
    initializePriceFormatting();
    
    // Initialize Preview Updates
    initializePreviewUpdates();
    
    function initializeFeaturesManagement() {
        const featuresContainer = document.getElementById('featuresContainer');
        const addFeatureBtn = document.getElementById('addFeature');
        
        if (!featuresContainer || !addFeatureBtn) return;
        
        // Add feature button handler
        addFeatureBtn.addEventListener('click', function() {
            const newFeatureDiv = document.createElement('div');
            newFeatureDiv.className = 'feature-input';
            newFeatureDiv.innerHTML = `
                <div class="input-group">
                    <input type="text" class="form-control" name="features[]" 
                           placeholder="Contoh: 100% Arabika">
                    <button type="button" class="btn btn-outline-danger remove-feature">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            `;
            
            featuresContainer.appendChild(newFeatureDiv);
            
            // Add event listener to the new remove button
            const removeBtn = newFeatureDiv.querySelector('.remove-feature');
            if (removeBtn) {
                removeBtn.addEventListener('click', function() {
                    newFeatureDiv.remove();
                    updateFeaturePreview();
                });
            }
            
            // Add event listener for preview update
            const newInput = newFeatureDiv.querySelector('input[name="features[]"]');
            if (newInput) {
                newInput.addEventListener('input', updateFeaturePreview);
            }
        });
        
        // Remove feature button handlers for existing features
        featuresContainer.addEventListener('click', function(e) {
            if (e.target.closest('.remove-feature')) {
                const featureDiv = e.target.closest('.feature-input');
                if (featureDiv) {
                    featureDiv.remove();
                    updateFeaturePreview();
                }
            }
        });
    }
    
    function initializeFormSubmission() {
        const productForm = document.getElementById('productForm');
        if (!productForm) return;
        
        productForm.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn) {
                // Show loading state
                submitBtn.disabled = true;
                const originalContent = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Memperbarui...';
                
                // Clean price value before submit
                const priceInput = document.getElementById('price');
                if (priceInput && priceInput.value) {
                    priceInput.value = priceInput.value.replace(/[^0-9]/g, '');
                }
                
                // Re-enable after timeout in case of error
                setTimeout(function() {
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalContent;
                    }
                }, 10000);
            }
        });
    }
    
    function initializeImagePreview() {
        window.previewImages = function(input) {
            const previewContainer = document.getElementById('imagePreviewContainer');
            if (!previewContainer || !input) return;
            
            previewContainer.innerHTML = '';

            if (input.files && input.files.length > 0) {
                const maxFiles = 5;
                const files = Array.from(input.files).slice(0, maxFiles);

                files.forEach((file, index) => {
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        const col = document.createElement('div');
                        col.className = 'col-md-4 mb-3 preview-item';
                        col.innerHTML = `
                            <div class="position-relative">
                                <img src="${e.target.result}" class="img-thumbnail preview-image" 
                                     alt="Preview" style="width: 100%; height: 150px; object-fit: cover;">
                                <span class="badge bg-success position-absolute top-0 start-0 m-2">
                                    Gambar Baru ${index + 1}
                                </span>
                            </div>
                        `;
                        previewContainer.appendChild(col);
                    };

                    reader.readAsDataURL(file);
                });
            }
        };
    }
    
    function initializePriceFormatting() {
        const priceInput = document.getElementById('price');
        if (!priceInput) return;
        
        priceInput.addEventListener('input', function() {
            let value = this.value.replace(/[^0-9]/g, '');
            
            if (value) {
                let formatted = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                this.value = formatted;
                
                const previewPrice = document.getElementById('previewPrice');
                if (previewPrice) {
                    previewPrice.textContent = 'Rp ' + formatted;
                }
            } else {
                const previewPrice = document.getElementById('previewPrice');
                if (previewPrice) {
                    previewPrice.textContent = 'Rp 0';
                }
            }
        });
    }
    
    function initializePreviewUpdates() {
        // Real-time preview updates
        const nameInput = document.getElementById('name');
        if (nameInput) {
            nameInput.addEventListener('input', function() {
                const previewName = document.getElementById('previewName');
                if (previewName) {
                    previewName.textContent = this.value || 'Nama Produk';
                }
            });
        }

        const descInput = document.getElementById('description');
        if (descInput) {
            descInput.addEventListener('input', function() {
                const previewDesc = document.getElementById('previewDescription');
                if (previewDesc) {
                    previewDesc.textContent = this.value || 'Deskripsi produk akan muncul di sini...';
                }
            });
        }

        const categorySelect = document.getElementById('category');
        if (categorySelect) {
            categorySelect.addEventListener('change', function() {
                const previewCategory = document.getElementById('previewCategory');
                if (previewCategory) {
                    let categoryText = 'Kategori';
                    
                    switch(this.value) {
                        case 'hot':
                            categoryText = 'Kopi Panas';
                            break;
                        case 'cold':
                            categoryText = 'Kopi Dingin';
                            break;
                        case 'beans':
                            categoryText = 'Biji Kopi';
                            break;
                        default:
                            categoryText = 'Kategori';
                    }
                    
                    previewCategory.textContent = categoryText;
                }
            });
        }

        // Features preview with event delegation
        document.addEventListener('input', function(e) {
            if (e.target && e.target.matches && e.target.matches('input[name="features[]"]')) {
                updateFeaturePreview();
            }
        });

        // Status preview
        const isActiveInput = document.getElementById('is_active');
        const isFeaturedInput = document.getElementById('is_featured');
        
        function updateStatusPreview() {
            const previewStatus = document.getElementById('previewStatus');
            if (!previewStatus) return;
            
            let statusHtml = '';
            
            const isActive = isActiveInput ? isActiveInput.checked : false;
            const isFeatured = isFeaturedInput ? isFeaturedInput.checked : false;
            
            if (isActive) {
                statusHtml += '<span class="badge bg-success me-1">Aktif</span>';
            } else {
                statusHtml += '<span class="badge bg-danger me-1">Nonaktif</span>';
            }
            
            if (isFeatured) {
                statusHtml += '<span class="badge bg-warning text-dark">Unggulan</span>';
            }
            
            previewStatus.innerHTML = statusHtml;
        }

        if (isActiveInput) {
            isActiveInput.addEventListener('change', updateStatusPreview);
        }
        
        if (isFeaturedInput) {
            isFeaturedInput.addEventListener('change', updateStatusPreview);
        }

        // Initial preview updates
        updateFeaturePreview();
        updateStatusPreview();
        
        // Trigger price formatting if price exists
        const priceInput = document.getElementById('price');
        if (priceInput && priceInput.value) {
            const event = new Event('input');
            priceInput.dispatchEvent(event);
        }
    }
    
    // Feature preview update function
    function updateFeaturePreview() {
        const features = [];
        const featureInputs = document.querySelectorAll('input[name="features[]"]');
        
        if (featureInputs) {
            featureInputs.forEach(input => {
                if (input && input.value && input.value.trim()) {
                    features.push(input.value.trim());
                }
            });
        }

        const previewFeatures = document.getElementById('previewFeatures');
        if (!previewFeatures) return;

        let featuresHtml = '';
        if (features.length > 0) {
            featuresHtml = '<div class="small"><strong>Fitur:</strong><br>';
            features.forEach(feature => {
                featuresHtml += `<i class="fas fa-check me-1"></i> ${feature}<br>`;
            });
            featuresHtml += '</div>';
        }
        
        previewFeatures.innerHTML = featuresHtml;
    }
    
    // Clear validation errors when inputs change
    document.addEventListener('input', function(e) {
        if (e.target && e.target.matches && e.target.matches('input, select, textarea')) {
            e.target.classList.remove('is-invalid');
            const feedbackDiv = e.target.parentNode ? e.target.parentNode.querySelector('.invalid-feedback') : null;
            if (feedbackDiv) {
                feedbackDiv.textContent = '';
            }
        }
    });
    
    // Delete confirmation
    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('btn-delete')) {
            e.preventDefault();
            if (confirm('Apakah Anda yakin ingin menghapus produk ini?')) {
                e.target.closest('form').submit();
            }
        }
    });
});
</script>
@endpush