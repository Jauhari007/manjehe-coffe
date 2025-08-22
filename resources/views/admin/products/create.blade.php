{{-- File: resources/views/admin/products/create.blade.php --}}
@extends('layouts.admin')

@section('title', 'Tambah Produk - Coffee Manjehe Admin')
@section('page_title', 'Tambah Produk Baru')
@section('page_subtitle', 'Tambahkan produk kopi baru ke katalog Coffee Manjehe')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Back Button -->
            <div class="mb-4">
                <a href="{{ route('admin.products.index') }}" class="btn btn-outline-light">
                    <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar Produk
                </a>
            </div>

            <!-- Form Card -->
            <div class="admin-card">
                <div class="card-header bg-transparent border-bottom border-secondary">
                    <div class="d-flex align-items-center">
                        <div class="stats-icon me-3" style="width: 50px; height: 50px;">
                            <i class="fas fa-plus"></i>
                        </div>
                        <div>
                            <h5 class="text-white mb-0">Form Produk Baru</h5>
                            <small class="text-muted">Isi semua informasi produk dengan lengkap</small>
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <form action="{{ route('admin.products.store') }}" method="POST" id="productForm">
                        @csrf
                        
                        <div class="row">
                            <!-- Basic Information -->
                            <div class="col-lg-6">
                                <h6 class="text-white mb-3">
                                    <i class="fas fa-info-circle me-2"></i>Informasi Dasar
                                </h6>
                                
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label text-white">Nama Produk *</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name') }}" 
                                           placeholder="Contoh: Espresso Manjehe Premium">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="category" class="form-label text-white">Kategori *</label>
                                    <select class="form-control @error('category') is-invalid @enderror" 
                                            id="category" name="category">
                                        <option value="">-- Pilih Kategori --</option>
                                        <option value="hot" {{ old('category') === 'hot' ? 'selected' : '' }}>Hot Coffee</option>
                                        <option value="cold" {{ old('category') === 'cold' ? 'selected' : '' }}>Cold Coffee</option>
                                        <option value="beans" {{ old('category') === 'beans' ? 'selected' : '' }}>Coffee Beans</option>
                                    </select>
                                    @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="price" class="form-label text-white">Harga *</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-dark text-light border-secondary">Rp</span>
                                        <input type="number" class="form-control @error('price') is-invalid @enderror" 
                                               id="price" name="price" value="{{ old('price') }}" 
                                               placeholder="15000" min="0" step="1000">
                                        <span class="input-group-text bg-dark text-light border-secondary" id="priceUnit">/ cup</span>
                                        @error('price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <small class="text-muted">Masukkan harga tanpa titik atau koma</small>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="icon" class="form-label text-white">Icon *</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-dark text-light border-secondary">
                                            <i id="iconPreview" class="fas fa-coffee"></i>
                                        </span>
                                        <select class="form-control @error('icon') is-invalid @enderror" 
                                                id="icon" name="icon">
                                            <option value="">-- Pilih Icon --</option>
                                            <option value="fas fa-coffee" {{ old('icon') === 'fas fa-coffee' ? 'selected' : '' }}>Coffee Cup</option>
                                            <option value="fas fa-mug-hot" {{ old('icon') === 'fas fa-mug-hot' ? 'selected' : '' }}>Hot Mug</option>
                                            <option value="fas fa-glass-whiskey" {{ old('icon') === 'fas fa-glass-whiskey' ? 'selected' : '' }}>Cold Glass</option>
                                            <option value="fas fa-seedling" {{ old('icon') === 'fas fa-seedling' ? 'selected' : '' }}>Coffee Beans</option>
                                            <option value="fas fa-fire" {{ old('icon') === 'fas fa-fire' ? 'selected' : '' }}>Hot & Spicy</option>
                                            <option value="fas fa-snowflake" {{ old('icon') === 'fas fa-snowflake' ? 'selected' : '' }}>Ice Cold</option>
                                        </select>
                                        @error('icon')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Description & Features -->
                            <div class="col-lg-6">
                                <h6 class="text-white mb-3">
                                    <i class="fas fa-align-left me-2"></i>Deskripsi & Fitur
                                </h6>

                                <div class="form-group mb-3">
                                    <label for="description" class="form-label text-white">Deskripsi *</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              id="description" name="description" rows="4" 
                                              placeholder="Deskripsikan produk kopi Anda dengan menarik...">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Maksimal 500 karakter</small>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label text-white">Fitur Produk</label>
                                    <div id="featuresContainer">
                                        @if(old('features'))
                                            @foreach(old('features') as $index => $feature)
                                                <div class="feature-item mb-2">
                                                    <div class="input-group">
                                                        <span class="input-group-text bg-dark text-light border-secondary">
                                                            <i class="fas fa-star"></i>
                                                        </span>
                                                        <input type="text" class="form-control" name="features[]" 
                                                               value="{{ $feature }}" placeholder="Contoh: Single Origin">
                                                        <button type="button" class="btn btn-outline-danger" onclick="removeFeature(this)">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="feature-item mb-2">
                                                <div class="input-group">
                                                    <span class="input-group-text bg-dark text-light border-secondary">
                                                        <i class="fas fa-star"></i>
                                                    </span>
                                                    <input type="text" class="form-control" name="features[]" 
                                                           placeholder="Contoh: Single Origin">
                                                    <button type="button" class="btn btn-outline-danger" onclick="removeFeature(this)">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <button type="button" class="btn btn-outline-success btn-sm" onclick="addFeature()">
                                        <i class="fas fa-plus me-2"></i>Tambah Fitur
                                    </button>
                                    <small class="text-muted d-block mt-1">Maksimal 5 fitur per produk</small>
                                </div>

                                <!-- Status Options -->
                                <h6 class="text-white mb-3 mt-4">
                                    <i class="fas fa-toggle-on me-2"></i>Status & Pengaturan
                                </h6>

                                <div class="form-group mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="is_active" 
                                               name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                        <label class="form-check-label text-white" for="is_active">
                                            Produk Aktif
                                        </label>
                                    </div>
                                    <small class="text-muted">Produk aktif akan ditampilkan di website</small>
                                </div>

                                <div class="form-group mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="is_featured" 
                                               name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                                        <label class="form-check-label text-white" for="is_featured">
                                            Produk Unggulan
                                            <i class="fas fa-crown text-warning ms-1"></i>
                                        </label>
                                    </div>
                                    <small class="text-muted">Produk unggulan akan ditampilkan di bagian atas</small>
                                </div>
                            </div>
                        </div>

                        <!-- Preview Section -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <h6 class="text-white mb-3">
                                    <i class="fas fa-eye me-2"></i>Preview Produk
                                </h6>
                                <div class="product-preview p-4 rounded" style="background: rgba(212, 165, 116, 0.05); border: 1px solid rgba(212, 165, 116, 0.2);">
                                    <div class="d-flex align-items-start">
                                        <div class="product-icon-preview me-3">
                                            <i id="previewIcon" class="fas fa-coffee text-warning" style="font-size: 2rem;"></i>
                                        </div>
                                        <div class="flex-fill">
                                            <h5 class="text-white mb-1" id="previewName">Nama Produk</h5>
                                            <span class="badge badge-primary mb-2" id="previewCategory">Kategori</span>
                                            <p class="text-light small mb-2" id="previewDescription">Deskripsi produk akan muncul di sini...</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="text-warning fw-bold" id="previewPrice">Rp 0</span>
                                                <div class="d-flex gap-2">
                                                    <span class="badge badge-success" id="previewStatus">Aktif</span>
                                                    <span class="badge badge-warning" id="previewFeatured" style="display: none;">
                                                        <i class="fas fa-crown me-1"></i>Featured
                                                    </span>
                                                </div>
                                            </div>
                                            <div id="previewFeatures" class="mt-2"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="d-flex justify-content-between mt-4 pt-4 border-top border-secondary">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-light">
                                <i class="fas fa-arrow-left me-2"></i>Batal
                            </a>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-outline-warning" onclick="resetForm()">
                                    <i class="fas fa-undo me-2"></i>Reset
                                </button>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save me-2"></i>Simpan Produk
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div class="toast show" role="alert">
                <div class="toast-header bg-success text-white">
                    <i class="fas fa-check-circle me-2"></i>
                    <strong class="me-auto">Berhasil</strong>
                </div>
                <div class="toast-body">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif

    @if($errors->any())
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div class="toast show" role="alert">
                <div class="toast-header bg-danger text-white">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <strong class="me-auto">Error</strong>
                </div>
                <div class="toast-body">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Update preview when form fields change
    updatePreview();
    
    // Add event listeners
    document.getElementById('name').addEventListener('input', updatePreview);
    document.getElementById('category').addEventListener('change', updatePreview);
    document.getElementById('price').addEventListener('input', updatePreview);
    document.getElementById('description').addEventListener('input', updatePreview);
    document.getElementById('icon').addEventListener('change', updateIcon);
    document.getElementById('is_active').addEventListener('change', updatePreview);
    document.getElementById('is_featured').addEventListener('change', updatePreview);
    
    // Update price unit based on category
    document.getElementById('category').addEventListener('change', function() {
        const priceUnit = document.getElementById('priceUnit');
        const category = this.value;
        
        if (category === 'beans') {
            priceUnit.textContent = '/ kg';
        } else {
            priceUnit.textContent = '/ cup';
        }
        updatePreview();
    });
    
    // Features input listeners
    document.addEventListener('input', function(e) {
        if (e.target.name === 'features[]') {
            updatePreview();
        }
    });
});

function updatePreview() {
    const name = document.getElementById('name').value || 'Nama Produk';
    const category = document.getElementById('category').value;
    const price = document.getElementById('price').value;
    const description = document.getElementById('description').value || 'Deskripsi produk akan muncul di sini...';
    const isActive = document.getElementById('is_active').checked;
    const isFeatured = document.getElementById('is_featured').checked;
    
    // Update preview elements
    document.getElementById('previewName').textContent = name;
    document.getElementById('previewDescription').textContent = description;
    
    // Category badge
    const categoryBadge = document.getElementById('previewCategory');
    if (category) {
        const categoryNames = {
            'hot': 'Hot Coffee',
            'cold': 'Cold Coffee', 
            'beans': 'Coffee Beans'
        };
        categoryBadge.textContent = categoryNames[category] || 'Kategori';
        categoryBadge.style.display = 'inline-block';
    } else {
        categoryBadge.textContent = 'Kategori';
        categoryBadge.style.display = 'inline-block';
    }
    
    // Price
    const priceText = price ? `Rp ${parseInt(price).toLocaleString('id-ID')}` : 'Rp 0';
    const unit = category === 'beans' ? '/kg' : '/cup';
    document.getElementById('previewPrice').textContent = priceText + ' ' + unit;
    
    // Status badges
    const statusBadge = document.getElementById('previewStatus');
    const featuredBadge = document.getElementById('previewFeatured');
    
    statusBadge.textContent = isActive ? 'Aktif' : 'Nonaktif';
    statusBadge.className = `badge ${isActive ? 'badge-success' : 'badge-secondary'}`;
    
    featuredBadge.style.display = isFeatured ? 'inline-block' : 'none';
    
    // Features preview
    updateFeaturesPreview();
}

function updateIcon() {
    const iconSelect = document.getElementById('icon');
    const iconPreview = document.getElementById('iconPreview');
    const previewIcon = document.getElementById('previewIcon');
    
    if (iconSelect.value) {
        iconPreview.className = iconSelect.value;
        previewIcon.className = iconSelect.value + ' text-warning';
        previewIcon.style.fontSize = '2rem';
    } else {
        iconPreview.className = 'fas fa-coffee';
        previewIcon.className = 'fas fa-coffee text-warning';
        previewIcon.style.fontSize = '2rem';
    }
}

function updateFeaturesPreview() {
    const featuresInputs = document.querySelectorAll('input[name="features[]"]');
    const previewFeatures = document.getElementById('previewFeatures');
    
    let featuresHTML = '';
    featuresInputs.forEach(input => {
        if (input.value.trim()) {
            featuresHTML += `<small class="badge badge-outline-light me-1 mb-1"><i class="fas fa-star me-1"></i>${input.value}</small>`;
        }
    });
    
    previewFeatures.innerHTML = featuresHTML;
}

function addFeature() {
    const container = document.getElementById('featuresContainer');
    const featureItems = container.querySelectorAll('.feature-item');
    
    if (featureItems.length >= 5) {
        alert('Maksimal 5 fitur per produk');
        return;
    }
    
    const newFeature = document.createElement('div');
    newFeature.className = 'feature-item mb-2';
    newFeature.innerHTML = `
        <div class="input-group">
            <span class="input-group-text bg-dark text-light border-secondary">
                <i class="fas fa-star"></i>
            </span>
            <input type="text" class="form-control" name="features[]" placeholder="Contoh: Single Origin">
            <button type="button" class="btn btn-outline-danger" onclick="removeFeature(this)">
                <i class="fas fa-times"></i>
            </button>
        </div>
    `;
    
    container.appendChild(newFeature);
    
    // Add event listener for new input
    const newInput = newFeature.querySelector('input[name="features[]"]');
    newInput.addEventListener('input', updatePreview);
}

function removeFeature(button) {
    const container = document.getElementById('featuresContainer');
    const featureItems = container.querySelectorAll('.feature-item');
    
    if (featureItems.length > 1) {
        button.closest('.feature-item').remove();
        updatePreview();
    } else {
        alert('Minimal 1 fitur harus ada');
    }
}

function resetForm() {
    if (confirm('Apakah Anda yakin ingin mereset form? Semua data yang telah diisi akan hilang.')) {
        document.getElementById('productForm').reset();
        
        // Reset features to default
        const container = document.getElementById('featuresContainer');
        container.innerHTML = `
            <div class="feature-item mb-2">
                <div class="input-group">
                    <span class="input-group-text bg-dark text-light border-secondary">
                        <i class="fas fa-star"></i>
                    </span>
                    <input type="text" class="form-control" name="features[]" placeholder="Contoh: Single Origin">
                    <button type="button" class="btn btn-outline-danger" onclick="removeFeature(this)">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        `;
        
        // Re-add event listener
        const newInput = container.querySelector('input[name="features[]"]');
        newInput.addEventListener('input', updatePreview);
        
        // Reset icons and preview
        updateIcon();
        updatePreview();
    }
}

// Form validation
document.getElementById('productForm').addEventListener('submit', function(e) {
    const requiredFields = ['name', 'category', 'price', 'description', 'icon'];
    let isValid = true;
    
    requiredFields.forEach(fieldName => {
        const field = document.getElementById(fieldName);
        if (!field.value.trim()) {
            field.classList.add('is-invalid');
            isValid = false;
        } else {
            field.classList.remove('is-invalid');
        }
    });
    
    // Check features
    const featuresInputs = document.querySelectorAll('input[name="features[]"]');
    let hasFeature = false;
    featuresInputs.forEach(input => {
        if (input.value.trim()) {
            hasFeature = true;
        }
    });
    
    if (!hasFeature) {
        alert('Minimal harus ada 1 fitur produk');
        isValid = false;
    }
    
    if (!isValid) {
        e.preventDefault();
        alert('Mohon lengkapi semua field yang wajib diisi');
    }
});
</script>
@endpush