@extends('layouts.admin')

@section('title', 'Tambah Produk - Coffee Manjehe Admin')
@section('page_title', 'Tambah Produk Kopi')
@section('page_subtitle', 'Tambahkan produk kopi baru ke dalam katalog')

@push('styles')
<style>
    /* Dark Coffee Theme for Create Product Form */
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
</style>
@endpush

@section('content')
    <div class="row">
        <!-- Form Column -->
        <div class="col-lg-8">
            <form action="{{ route('admin.products.store') }}" method="POST" id="productForm">
                @csrf
                
                @include('admin.products.form')

                <!-- Action Buttons -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Simpan Produk
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Preview Column -->
        <div class="col-lg-4">
            <div class="card sticky-top" style="top: 20px;">
                <div class="card-header">
                    <h5><i class="fas fa-eye me-2"></i>Preview Produk</h5>
                </div>
                <div class="card-body">
                    <div class="preview-card" id="productPreview">
                        <div class="preview-icon">
                            <i class="fas fa-coffee" id="previewIcon"></i>
                        </div>
                        <h5 id="previewName">Nama Produk</h5>
                        <p class="mb-1" id="previewCategory">Kategori</p>
                        <div class="price-preview" id="previewPrice">Rp 0</div>
                        <p class="mt-3 small" id="previewDescription">Deskripsi produk akan muncul di sini...</p>
                        <div id="previewFeatures"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    
    // Icon selection handler
    document.querySelectorAll('.icon-option').forEach(option => {
        option.addEventListener('click', function() {
            // Remove selected class from all options
            document.querySelectorAll('.icon-option').forEach(opt => opt.classList.remove('selected'));
            
            // Add selected class to clicked option
            this.classList.add('selected');
            
            // Set icon value
            const iconClass = this.dataset.icon;
            document.getElementById('icon').value = iconClass;
            
            // Update preview
            updatePreview();
        });
    });
    
    // Feature management
    let featureCount = 1;
    
    document.getElementById('addFeature').addEventListener('click', function() {
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
        featuresContainer.lastElementChild.querySelector('.remove-feature').addEventListener('click', function() {
            this.closest('.feature-input').remove();
            updatePreview();
        });
        
        // Add event listener for input
        featuresContainer.lastElementChild.querySelector('input').addEventListener('input', updatePreview);
    });
    
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
    document.getElementById('price').addEventListener('input', function() {
        let value = this.value.replace(/[^\d]/g, '');
        if (value) {
            this.value = parseInt(value).toLocaleString('id-ID');
        }
        updatePreview();
    });
    
    // Update preview initially
    if (document.getElementById('price').value) {
        document.getElementById('price').dispatchEvent(new Event('input'));
    }
    updatePreview();
});

function updatePreview() {
    // Update name
    const name = document.getElementById('name').value || 'Nama Produk';
    document.getElementById('previewName').textContent = name;
    
    // Update category
    const category = document.getElementById('category').selectedOptions[0]?.text || 'Kategori';
    document.getElementById('previewCategory').textContent = category;
    
    // Update price
    const price = document.getElementById('price').value || '0';
    const priceNumber = parseInt(price.replace(/[^\d]/g, ''));
    document.getElementById('previewPrice').textContent = 'Rp ' + (priceNumber || 0).toLocaleString('id-ID');
    
    // Update description
    const description = document.getElementById('description').value || 'Deskripsi produk akan muncul di sini...';
    document.getElementById('previewDescription').textContent = description.substring(0, 100) + (description.length > 100 ? '...' : '');
    
    // Update icon
    const icon = document.getElementById('icon').value || 'fas fa-coffee';
    document.getElementById('previewIcon').className = icon;
    
    // Update features
    const features = Array.from(document.querySelectorAll('input[name="features[]"]'))
        .map(input => input.value)
        .filter(value => value.trim());
    
    const featuresHtml = features.length > 0 
        ? '<div class="mt-3"><small>' + features.map(f => '• ' + f).join('<br>') + '</small></div>'
        : '';
    document.getElementById('previewFeatures').innerHTML = featuresHtml;
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
