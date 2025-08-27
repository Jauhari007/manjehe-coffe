@extends('layouts.admin')

@section('title', 'Tambah Produk - Coffee Manjehe Admin')
@section('page_title', 'Tambah Produk Kopi')
@section('page_subtitle', 'Tambahkan produk kopi baru ke dalam katalog')

@push('styles')
<style>
    /* Dark Coffee Theme for Create Product Form */
    
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
        border-color: rgba(212, 165, 116, 0.3) !important;
    }
    
    .btn-outline-danger {
        color: #dc3545 !important;
        border-color: #dc3545 !important;
        background: transparent !important;
    }
    
    .btn-outline-danger:hover {
        background: #dc3545 !important;
        border-color: #dc3545 !important;
        color: white !important;
    }
    
    .btn-outline-success {
        color: #D4A574 !important;
        border-color: #D4A574 !important;
        background: transparent !important;
    }
    
    .btn-outline-success:hover {
        background: #D4A574 !important;
        border-color: #D4A574 !important;
        color: #2D1810 !important;
    }
    
    /* Preview Card */
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
    
    .price-preview {
        font-size: 1.25rem;
        font-weight: bold;
        color: #28a745;
        margin-top: 5px;
    }
    
    /* Valid/Invalid States */
    .form-control.is-valid,
    .form-select.is-valid {
        border-color: #28a745 !important;
    }
    
    .form-control.is-invalid,
    .form-select.is-invalid {
        border-color: #dc3545 !important;
    }
    
    /* Form Text */
    .form-text {
        color: rgba(229, 231, 235, 0.6) !important;
    }
    
    /* File Input */
    input[type="file"] {
        background: rgba(26, 15, 10, 0.4) !important;
        border: 1px solid rgba(212, 165, 116, 0.3) !important;
        color: #e5e7eb !important;
        border-radius: 10px !important;
    }
    
    input[type="file"]:focus {
        background: rgba(26, 15, 10, 0.6) !important;
        border-color: #D4A574 !important;
        box-shadow: 0 0 0 0.2rem rgba(212, 165, 116, 0.15) !important;
    }
    
    /* Form Check */
    .form-check-input {
        background-color: rgba(26, 15, 10, 0.4) !important;
        border-color: rgba(212, 165, 116, 0.3) !important;
    }
    
    .form-check-input:checked {
        background-color: #D4A574 !important;
        border-color: #D4A574 !important;
    }
    
    .form-check-input:focus {
        box-shadow: 0 0 0 0.2rem rgba(212, 165, 116, 0.15) !important;
    }
    
    .form-check-label {
        color: #e5e7eb !important;
        font-weight: 500;
    }
</style>
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- Informasi Dasar -->
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Produk *</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Kategori *</label>
                        <select class="form-select @error('category') is-invalid @enderror" 
                                id="category" name="category" required>
                            <option value="">Pilih Kategori</option>
                            @foreach($categories as $value => $label)
                                <option value="{{ $value }}" {{ old('category') == $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Harga (Rp) *</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" 
                               id="price" name="price" value="{{ old('price') }}" required>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi *</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Gambar -->
            <div class="card mt-4">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="images" class="form-label">Gambar Produk *</label>
                        <input type="file" class="form-control @error('images') is-invalid @enderror" 
                               id="images" name="images[]" multiple accept="image/*" required>
                        <div class="form-text">Format: JPG, PNG, GIF (Max: 5MB)</div>
                        @error('images')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div id="imagePreview" class="row mt-3"></div>
                </div>
            </div>

            <!-- Pengaturan -->
            <div class="card mt-4">
                <div class="card-body">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" checked>
                        <label class="form-check-label" for="is_active">
                            Aktif
                        </label>
                    </div>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1">
                        <label class="form-check-label" for="is_featured">
                            Produk Unggulan
                        </label>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Simpan Produk
                </button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary ms-2">
                    <i class="fas fa-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Format harga
    const priceInput = document.getElementById('price');
    priceInput.addEventListener('input', function(e) {
        let value = this.value.replace(/\D/g, '');
        if (value) {
            value = parseInt(value).toLocaleString('id-ID');
            this.value = value;
        }
    });

    // Preview gambar
    const imageInput = document.getElementById('images');
    const preview = document.getElementById('imagePreview');
    
    imageInput.addEventListener('change', function() {
        preview.innerHTML = '';
        Array.from(this.files).forEach(file => {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                const col = document.createElement('div');
                col.className = 'col-md-3';
                const img = document.createElement('img');
                img.className = 'img-thumbnail';
                img.style.height = '150px';
                img.style.width = '100%';
                img.style.objectFit = 'cover';
                
                reader.onload = e => img.src = e.target.result;
                reader.readAsDataURL(file);
                
                col.appendChild(img);
                preview.appendChild(col);
            }
        });
    });
});
</script>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Update preview when form fields change
    updatePreview();
    
    // Add event listeners
    const nameInput = document.getElementById('name');
    const categoryInput = document.getElementById('category');
    const priceInput = document.getElementById('price');
    const descInput = document.getElementById('description');
    
    if (nameInput) nameInput.addEventListener('input', updatePreview);
    if (categoryInput) categoryInput.addEventListener('change', updatePreview);
    if (priceInput) priceInput.addEventListener('input', updatePreview);
    if (descInput) descInput.addEventListener('input', updatePreview);
    
    // Feature management
    let featureCount = 1;
    
    const addFeatureBtn = document.getElementById('addFeature');
    if (addFeatureBtn) {
        addFeatureBtn.addEventListener('click', function() {
            featureCount++;
            const featuresContainer = document.getElementById('featuresContainer');
            const newFeature = `
                <div class="feature-input">
                    <div class="input-group">
                        <input type="text" class="form-control" name="features[]" placeholder="Contoh: 100% Arabika">
                        <button type="button" class="btn btn-outline-danger remove-feature">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            `;
            featuresContainer.insertAdjacentHTML('beforeend', newFeature);
            
            // Add event listener for remove button
            const newFeatureElement = featuresContainer.lastElementChild;
            const removeBtn = newFeatureElement.querySelector('.remove-feature');
            if (removeBtn) {
                removeBtn.addEventListener('click', function() {
                    this.closest('.feature-input').remove();
                    updatePreview();
                });
            }
            
            // Add event listener for input
            const newInput = newFeatureElement.querySelector('input');
            if (newInput) {
                newInput.addEventListener('input', updatePreview);
            }
        });
    }
    
    // Remove feature handler for existing features
    document.querySelectorAll('.remove-feature').forEach(btn => {
        btn.addEventListener('click', function() {
            this.closest('.feature-input').remove();
            updatePreview();
        });
    });
    
    // Add event listeners for existing feature inputs
    document.querySelectorAll('input[name="features[]"]').forEach(input => {
        input.addEventListener('input', updatePreview);
    });
    
    // Price formatting
    if (priceInput) {
        priceInput.addEventListener('input', function() {
            // Ambil semua digit, gabung, lalu format ribuan
            let value = this.value.replace(/[^\d]/g, '');
            if (value) {
                // Hanya format jika value memang angka
                this.value = Number(value).toLocaleString('id-ID');
            } else {
                this.value = '';
            }
            updatePreview();
        });
    }

    // Pastikan sebelum submit, value price adalah angka tanpa titik
    const productForm = document.getElementById('productForm');
    if (productForm) {
        productForm.addEventListener('submit', function(e) {
            const priceInput = document.getElementById('price');
            if (priceInput) {
                priceInput.value = priceInput.value.replace(/\./g, '').replace(/,/g, '');
            }
        });
    }
    
    // Update preview initially
    if (priceInput && priceInput.value) {
        priceInput.dispatchEvent(new Event('input'));
    }
    updatePreview();
});

function updatePreview() {
    // Defensive: only update if element exists
    const nameInput = document.getElementById('name');
    const categoryInput = document.getElementById('category');
    const priceInput = document.getElementById('price');
    const descInput = document.getElementById('description');
    
    if (!nameInput || !categoryInput || !priceInput || !descInput) return;

    const name = nameInput.value || 'Nama Produk';
    const previewName = document.getElementById('previewName');
    if (previewName) previewName.textContent = name;

    const category = categoryInput.selectedOptions[0]?.text || 'Kategori';
    const previewCategory = document.getElementById('previewCategory');
    if (previewCategory) previewCategory.textContent = category;

    const price = priceInput.value || '0';
    const priceNumber = parseInt(price.replace(/[^\d]/g, ''));
    const previewPrice = document.getElementById('previewPrice');
    if (previewPrice) previewPrice.textContent = 'Rp ' + (priceNumber ? priceNumber.toLocaleString('id-ID') : '0');

    const description = descInput.value || 'Deskripsi produk akan muncul di sini...';
    const previewDescription = document.getElementById('previewDescription');
    if (previewDescription) previewDescription.textContent = description.substring(0, 100) + (description.length > 100 ? '...' : '');

    // Features
    const features = Array.from(document.querySelectorAll('input[name="features[]"]'))
        .map(input => input.value)
        .filter(value => value.trim());
    const featuresHtml = features.length > 0 
        ? '<div class="mt-3"><small>' + features.map(f => '• ' + f).join('<br>') + '</small></div>'
        : '';
    const previewFeatures = document.getElementById('previewFeatures');
    if (previewFeatures) previewFeatures.innerHTML = featuresHtml;
}

// Form validation
const productForm = document.getElementById('productForm');
if (productForm) {
    productForm.addEventListener('submit', function(e) {
        const requiredFields = ['name', 'category', 'price', 'description'];
        let isValid = true;
        
        requiredFields.forEach(fieldName => {
            const field = document.getElementById(fieldName);
            if (field && !field.value.trim()) {
                field.classList.add('is-invalid');
                isValid = false;
            } else if (field) {
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
        
        // Check images for create mode
        const imagesInput = document.getElementById('images');
        if (imagesInput && imagesInput.hasAttribute('required') && (!imagesInput.files || imagesInput.files.length === 0)) {
            imagesInput.classList.add('is-invalid');
            isValid = false;
        }
        
        if (!isValid) {
            e.preventDefault();
            alert('Mohon lengkapi semua field yang wajib diisi');
        }
    });
}
</script>
@endpush