<div class="mb-3">
    <label>Nama Produk</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $product->name ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="description" class="form-control" required>{{ old('description', $product->description ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label>Harga</label>
    <input type="number" name="price" class="form-control" value="{{ old('price', $product->price ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Kategori</label>
    <select name="category" class="form-control" required>
        <option value="hot" {{ old('category', $product->category ?? '') == 'hot' ? 'selected' : '' }}>Hot</option>
        <option value="cold" {{ old('category', $product->category ?? '') == 'cold' ? 'selected' : '' }}>Cold</option>
        <option value="beans" {{ old('category', $product->category ?? '') == 'beans' ? 'selected' : '' }}>Beans</option>
    </select>
</div>
<div class="mb-3">
    <label>Icon</label>
    <input type="text" name="icon" class="form-control" value="{{ old('icon', $product->icon ?? '') }}">
</div>
<div class="mb-3">
    <label>Fitur (pisahkan dengan koma)</label>
    <input type="text" name="features[]" class="form-control" value="{{ old('features', is_array($product->features ?? null) ? implode(',', $product->features) : ($product->features ?? '')) }}">
</div>
<div class="mb-3">
    <label>Whatsapp Text</label>
    <input type="text" name="whatsapp_text" class="form-control" value="{{ old('whatsapp_text', $product->whatsapp_text ?? '') }}">
</div>
<div class="form-check mb-2">
    <input type="checkbox" name="is_featured" class="form-check-input" id="is_featured" {{ old('is_featured', $product->is_featured ?? false) ? 'checked' : '' }}>
    <label class="form-check-label" for="is_featured">Featured</label>
</div>
<div class="form-check mb-2">
    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" {{ old('is_active', $product->is_active ?? false) ? 'checked' : '' }}>
    <label class="form-check-label" for="is_active">Aktif</label>
</div>
