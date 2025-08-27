<!-- Basic Information Card -->
<div class="card">
    <div class="card-header">
        <h5><i class="fas fa-info-circle me-2"></i>Informasi Dasar</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                           id="name" name="name" placeholder="Nama Produk" 
                           value="{{ old('name', $product->name ?? '') }}" required>
                    <label for="name">Nama Produk *</label>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <select class="form-select @error('category') is-invalid @enderror" 
                            id="category" name="category" required>
                        <option value="">Pilih Kategori</option>
                        @foreach($categories as $key => $value)
                            <option value="{{ $key }}" 
                                {{ old('category', $product->category ?? '') == $key ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                    <label for="category">Kategori *</label>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('price') is-invalid @enderror" 
                   id="price" name="price" placeholder="Harga" 
                   value="{{ old('price', isset($product) ? number_format($product->price, 0, ',', '.') : '') }}" 
                   oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, '.')" required>
            <label for="price">Harga (Rp) *</label>
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-floating mb-3">
            <textarea class="form-control @error('description') is-invalid @enderror" 
                      id="description" name="description" placeholder="Deskripsi" 
                      style="height: 120px" required>{{ old('description', $product->description ?? '') }}</textarea>
            <label for="description">Deskripsi Produk *</label>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-floating mb-3">
            <textarea class="form-control @error('whatsapp_text') is-invalid @enderror" 
                      id="whatsapp_text" name="whatsapp_text" placeholder="Teks WhatsApp" 
                      style="height: 80px">{{ old('whatsapp_text', $product->whatsapp_text ?? '') }}</textarea>
            <label for="whatsapp_text">Teks WhatsApp (Opsional)</label>
            <div class="form-text">Teks yang akan muncul saat pelanggan menghubungi via WhatsApp</div>
            @error('whatsapp_text')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<!-- Features Card -->
<div class="card">
    <div class="card-header">
        <h5><i class="fas fa-star me-2"></i>Fitur Produk</h5>
    </div>
    <div class="card-body">
        <div id="featuresContainer">
            @if(old('features') || (isset($product) && $product->features))
                @foreach(old('features', $product->features ?? []) as $index => $feature)
                    <div class="feature-input">
                        <div class="input-group">
                            <input type="text" class="form-control" name="features[]" 
                                   placeholder="Contoh: 100% Arabika" value="{{ $feature }}">
                            @if($index > 0)
                                <button type="button" class="btn btn-outline-danger remove-feature">
                                    <i class="fas fa-times"></i>
                                </button>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <div class="feature-input">
                    <div class="input-group">
                        <input type="text" class="form-control" name="features[]" 
                               placeholder="Contoh: 100% Arabika">
                    </div>
                </div>
            @endif
        </div>
        
        <button type="button" id="addFeature" class="btn btn-outline-success mt-2">
            <i class="fas fa-plus me-2"></i>Tambah Fitur
        </button>
        
        @error('features')
            <div class="text-danger mt-2">{{ $message }}</div>
        @enderror
    </div>
</div>

<!-- Images Card -->
<div class="card">
    <div class="card-header">
        <h5><i class="fas fa-images me-2"></i>Gambar Produk</h5>
    </div>
    <div class="card-body">
        <!-- Existing Images (for edit mode) -->
        @if(isset($product) && $product->images->count() > 0)
            <div class="mb-3">
                <label class="form-label">Gambar Saat Ini:</label>
                <div class="row" id="currentImages">
                    @foreach($product->images as $image)
                        <div class="col-md-4 mb-2">
                            <img src="{{ $image->image_url }}" 
                                 class="img-thumbnail" 
                                 style="width: 100%; height: 120px; object-fit: cover;">
                        </div>
                    @endforeach
                </div>
                <div class="form-text text-warning">
                    <i class="fas fa-exclamation-triangle me-1"></i>
                    Upload gambar baru akan mengganti semua gambar yang ada
                </div>
            </div>
        @endif
        
        <div class="mb-3">
            <label for="images" class="form-label text-warning" style="font-weight:600;">
                {{ isset($product) ? 'Gambar Baru (Opsional)' : 'Gambar Produk *' }}
            </label>
            <div class="custom-file-input position-relative">
                <input type="file" class="form-control @error('images') is-invalid @enderror @error('images.*') is-invalid @enderror" 
                       id="images" name="images[]" multiple 
                       accept="image/jpeg,image/png,image/jpg,image/gif,image/webp" 
                       {{ !isset($product) ? 'required' : '' }}
                       onchange="previewImages(this)">
                <div class="form-text mt-1">
                    <i class="fas fa-info-circle me-1"></i>
                    Format yang didukung: JPEG, PNG, JPG, GIF, WEBP. Maksimal 5 gambar, masing-masing 5MB.
                </div>
                @error('images')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
                @error('images.*')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Image Preview Container -->
            <div id="imagePreviewContainer" class="row mt-3">
                <!-- New images will be previewed here -->
            </div>
        </div>
    </div>
</div>

<!-- Settings Card -->
<div class="card">
    <div class="card-header">
        <h5><i class="fas fa-cog me-2"></i>Pengaturan</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                           value="1" {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">
                        Aktif
                    </label>
                    <div class="form-text">Produk akan ditampilkan di katalog</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" 
                           value="1" {{ old('is_featured', $product->is_featured ?? false) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_featured">
                        Produk Unggulan
                    </label>
                    <div class="form-text">Produk akan ditampilkan di halaman utama</div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Image preview functionality
    const imageInput = document.getElementById('images');
    const imagePreview = document.getElementById('imagePreview');
    
    if (imageInput) {
        imageInput.addEventListener('change', function(e) {
            imagePreview.innerHTML = '';
            imagePreview.style.display = 'none';
            
            if (e.target.files && e.target.files.length > 0) {
                imagePreview.style.display = 'flex';
                
                Array.from(e.target.files).forEach((file, index) => {
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const col = document.createElement('div');
                            col.className = 'col-md-4 col-6 mb-3';
                            col.innerHTML = `
                                <div class="position-relative">
                                    <img src="${e.target.result}" 
                                         class="img-thumbnail" 
                                         style="width: 100%; height: 120px; object-fit: cover;">
                                    <span class="position-absolute top-0 start-0 badge bg-primary m-1">
                                        ${index + 1}
                                    </span>
                                </div>
                            `;
                            imagePreview.appendChild(col);
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }
        });
    }
    
    // Form validation enhancement
    const requiredFields = ['name', 'category', 'price', 'description'];
    
    // Real-time validation
    requiredFields.forEach(fieldName => {
        const field = document.getElementById(fieldName);
        if (field) {
            field.addEventListener('blur', function() {
                if (!this.value.trim()) {
                    this.classList.add('is-invalid');
                } else {
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                }
            });
            
            field.addEventListener('input', function() {
                if (this.value.trim()) {
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                }
            });
        }
    });
});
</script>
@endpush