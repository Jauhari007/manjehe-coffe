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
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                           id="name" name="name" value="{{ old('name', $product->name ?? '') }}" 
                           placeholder="Nama Produk" required>
                    <label for="name">Nama Produk *</label>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <select class="form-select @error('category') is-invalid @enderror" 
                            id="category" name="category" required>
                        <option value="">Pilih Kategori</option>
                        <option value="hot" {{ old('category', $product->category ?? '') == 'hot' ? 'selected' : '' }}>
                            Kopi Panas
                        </option>
                        <option value="cold" {{ old('category', $product->category ?? '') == 'cold' ? 'selected' : '' }}>
                            Kopi Dingin
                        </option>
                        <option value="beans" {{ old('category', $product->category ?? '') == 'beans' ? 'selected' : '' }}>
                            Biji Kopi
                        </option>
                    </select>
                    <label for="category">Kategori *</label>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-floating mb-3">
            <textarea class="form-control @error('description') is-invalid @enderror" 
                      id="description" name="description" 
                      placeholder="Deskripsi produk..." 
                      style="height: 120px;" required>{{ old('description', $product->description ?? '') }}</textarea>
            <label for="description">Deskripsi Produk *</label>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="number" class="form-control @error('price') is-invalid @enderror" 
                           id="price" name="price" value="{{ old('price', $product->price ?? '') }}" 
                           placeholder="Harga" min="0" step="1000" required>
                    <label for="price">Harga (Rp) *</label>
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="price-preview" id="pricePreview"></div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <textarea class="form-control" id="whatsapp_text" name="whatsapp_text" 
                              placeholder="Pesan WhatsApp..." style="height: 80px;">{{ old('whatsapp_text', $product->whatsapp_text ?? '') }}</textarea>
                    <label for="whatsapp_text">Pesan WhatsApp (Opsional)</label>
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
