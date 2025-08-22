@extends('layouts.admin')
@section('content')
<div class="container">
    <h1>Detail Produk Kopi</h1>
    <div>
        <strong>Nama:</strong> {{ $product->name }}<br>
        <strong>Deskripsi:</strong> {{ $product->description }}<br>
        <strong>Harga:</strong> {{ $product->formatted_price ?? $product->price }}<br>
        <strong>Kategori:</strong> {{ $product->category }}<br>
        <strong>Fitur:</strong> {{ is_array($product->features) ? implode(', ', $product->features) : $product->features }}<br>
        <strong>Featured:</strong> {{ $product->is_featured ? 'Ya' : 'Tidak' }}<br>
        <strong>Aktif:</strong> {{ $product->is_active ? 'Ya' : 'Tidak' }}<br>
        <strong>Whatsapp Text:</strong> {{ $product->whatsapp_text }}<br>
    </div>
    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
