<!-- Basic Information -->
<div class="card mb-4">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-info-circle me-2"></i>
            Informasi Dasar
        </h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <div class="mb-3">
                    <label for="name" class="form-label text-warning" style="font-weight:600;">Nama Produk *</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                           id="name" name="name" value="{{ old('name', $product->name ?? '') }}" 
                           placeholder="Masukkan nama produk" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="category" class="form-label text-warning" style="font-weight:600;">Kategori *</label>
                    <select class="form-select @error('category') is-invalid @enderror" 
                            id="category" name="category" required>
                        <option value="">Pilih Kategori</option>
                        <option value="hot" {{ old('category', $product->category ?? '') == 'hot' ? 'selected' : '' }}>Kopi Panas</option>
                        <option value="cold" {{ old('category', $product->category ?? '') == 'cold' ? 'selected' : '' }}>Kopi Dingin</option>
                        <option value="beans" {{ old('category', $product->category ?? '') == 'beans' ? 'selected' : '' }}>Biji Kopi</option>
                    </select>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label text-warning" style="font-weight:600;">Deskripsi Produk *</label>
            <textarea class="form-control @error('description') is-invalid @enderror" 
                      id="description" name="description" 
                      placeholder="Tuliskan deskripsi produk" 
                      style="height: 160px;" required>{{ old('description', $product->description ?? '') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="price" class="form-label text-warning" style="font-weight:600;">Harga (Rp) *</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" 
                           id="price" name="price" value="{{ old('price', $product->price ?? '') }}" 
                           placeholder="Contoh: 25000" min="0" step="1000" required>
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="price-preview" id="pricePreview"></div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="whatsapp_text" class="form-label text-warning" style="font-weight:600;">Pesan WhatsApp (Opsional)</label>
                    <textarea class="form-control" id="whatsapp_text" name="whatsapp_text" 
                              placeholder="Teks yang akan otomatis terisi saat pesan" style="height: 120px;">{{ old('whatsapp_text', $product->whatsapp_text ?? '') }}</textarea>
                    <small class="text-muted">Kosongkan untuk menggunakan pesan default</small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Icon Selection -->
<div class="card mb-4">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-icons me-2"></i>
            Pilih Icon Produk
        </h5>
    </div>
    <div class="card-body">
        <input type="hidden" name="icon" id="selectedIcon" value="{{ old('icon', $product->icon ?? '') }}">
        <div class="icon-selector" id="iconSelector">
            @php
                $icons = [
                    'fas fa-coffee', 'fas fa-mug-hot', 'fas fa-seedling', 'fas fa-leaf',
                    'fas fa-fire', 'fas fa-snowflake', 'fas fa-star', 'fas fa-heart',
                    'fas fa-sun', 'fas fa-moon', 'fas fa-cloud', 'fas fa-mountain',
                    'fas fa-tree', 'fas fa-gem', 'fas fa-crown', 'fas fa-award',
                    'fas fa-gift', 'fas fa-magic', 'fas fa-bolt', 'fas fa-diamond'
                ];
            @endphp
            
            @foreach($icons as $icon)
                <div class="icon-option {{ old('icon', $product->icon ?? '') == $icon ? 'selected' : '' }}" data-icon="{{ $icon }}">
                    <i class="{{ $icon }}"></i>
                    <small>{{ str_replace(['fas fa-', '-'], ['', ' '], $icon) }}</small>
                </div>
            @endforeach
        </div>
        @error('icon')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
</div>

<!-- Features -->
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">
            <i class="fas fa-list me-2"></i>
            Fitur Produk
        </h5>
        <button type="button" class="btn btn-sm btn-outline-primary" id="addFeature">
            <i class="fas fa-plus me-1"></i> Tambah Fitur
        </button>
    </div>
    <div class="card-body">
        <div id="featuresContainer">
            @php
                $features = old('features', $product->features ?? ['']);
                if (!is_array($features)) $features = [$features];
                if (empty($features)) $features = [''];
            @endphp
            
            @foreach($features as $feature)
                <div class="feature-input">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" 
                               name="features[]" value="{{ $feature }}" 
                               placeholder="Masukkan fitur produk...">
                        <button type="button" class="btn btn-outline-danger btn-remove-feature">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
        <small class="text-muted">Tambahkan fitur-fitur unggulan dari produk ini</small>
    </div>
</div>

<!-- Status Settings -->
<div class="card mb-4">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-cog me-2"></i>
            Pengaturan Status
        </h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input" 
                           id="is_active" name="is_active" value="1" 
                           {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">
                        <strong>Produk Aktif</strong>
                        <br><small class="text-muted">Produk akan ditampilkan di website</small>
                    </label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input" 
                           id="is_featured" name="is_featured" value="1" 
                           {{ old('is_featured', $product->is_featured ?? false) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_featured">
                        <strong>Produk Unggulan</strong>
                        <br><small class="text-muted">Tampilkan sebagai produk unggulan</small>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    // Icon selection
    $('.icon-option').click(function() {
        $('.icon-option').removeClass('selected');
        $(this).addClass('selected');
        const icon = $(this).data('icon');
        $('#selectedIcon').val(icon);
        if ($('#previewIcon').length) {
            $('#previewIcon').attr('class', icon);
        }
    });

    // Set default icon if exists
    if ($('#selectedIcon').val()) {
        $(`.icon-option[data-icon="${$('#selectedIcon').val()}"]`).addClass('selected');
    }

    // Add feature functionality
    $('#addFeature').click(function() {
        const featureHtml = `
            <div class="feature-input">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" name="features[]" placeholder="Masukkan fitur produk...">
                    <button type="button" class="btn btn-outline-danger btn-remove-feature">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        `;
        $('#featuresContainer').append(featureHtml);
    });

    // Remove feature functionality
    $(document).on('click', '.btn-remove-feature', function() {
        if ($('.feature-input').length > 1) {
            $(this).closest('.feature-input').remove();
        }
    });

    // Price formatting
    $('#price').on('input', function() {
        const price = parseInt($(this).val()) || 0;
        const formatted = 'Rp ' + price.toLocaleString('id-ID');
        $('#pricePreview').text(formatted);
        if ($('#previewPrice').length) {
            $('#previewPrice').text(formatted);
        }
    });

    // Trigger initial price format
    if ($('#price').val()) {
        $('#price').trigger('input');
    }
});
</script>
@endpush

@push('styles')
<style>
    /* Override any white backgrounds in form.blade.php */
    .form-control,
    .form-select,
    input[type="text"],
    input[type="number"],
    textarea,
    select {
        background: rgba(26, 15, 10, 0.4) !important;
        background-color: rgba(26, 15, 10, 0.4) !important;
        border: 1px solid rgba(212, 165, 116, 0.3) !important;
        color: #e5e7eb !important;
        border-radius: 10px !important;
    }
    
    .form-control:focus,
    .form-select:focus,
    input[type="text"]:focus,
    input[type="number"]:focus,
    textarea:focus,
    select:focus {
        background: rgba(26, 15, 10, 0.6) !important;
        background-color: rgba(26, 15, 10, 0.6) !important;
        border-color: #D4A574 !important;
        box-shadow: 0 0 0 0.2rem rgba(212, 165, 116, 0.15) !important;
        color: #D4A574 !important;
    }
    
    /* Remove floating label backgrounds completely */
    .form-floating > label {
        background: transparent !important;
        background-color: transparent !important;
        color: #D4A574 !important;
        font-weight: 500;
        opacity: 1 !important;
        text-shadow: none !important;
        z-index: 2 !important;
    }
    
    .form-floating > .form-control:focus ~ label,
    .form-floating > .form-control:not(:placeholder-shown) ~ label,
    .form-floating > .form-select ~ label {
        background: transparent !important;
        background-color: transparent !important;
        opacity: 1 !important;
        text-shadow: none !important;
    }
    
    /* Hide placeholder to prevent double text */
    .form-floating > .form-control::placeholder,
    .form-floating > .form-select::placeholder {
        color: transparent !important;
        opacity: 0 !important;
    }
    
    .form-control::placeholder {
        color: rgba(229, 231, 235, 0.5) !important;
    }
    
    /* Price preview styling */
    .price-preview {
        font-size: 1.25rem;
        font-weight: bold;
        color: #28a745 !important;
        margin-top: 5px;
        padding: 0.5rem;
        background: rgba(40, 167, 69, 0.1);
        border: 1px solid rgba(40, 167, 69, 0.3);
        border-radius: 8px;
        text-align: center;
    }
    
    /* Switch styling */
    .form-check-input {
        background-color: rgba(26, 15, 10, 0.4) !important;
        border: 1px solid rgba(212, 165, 116, 0.5) !important;
    }
    
    .form-check-input:checked {
        background-color: #D4A574 !important;
        border-color: #D4A574 !important;
    }
    
    .form-check-label {
        color: #e5e7eb !important;
    }
    
    .form-check-label strong {
        color: #D4A574 !important;
    }
    
    .text-muted {
        color: rgba(229, 231, 235, 0.7) !important;
    }
</style>
@endpush
