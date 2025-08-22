@extends('layouts.admin')
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
