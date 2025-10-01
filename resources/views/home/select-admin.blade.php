@extends('layouts.app')
@section('title','Pilih Admin - Order Manjehe Coffee')
@section('content')
<nav id="navbar" class="scrolled" style="position:fixed;top:0;width:100%;z-index:1000;">
    <div class="nav-container">
        <div class="logo">
            <img src="{{ asset('assets/manjehe_logo.png') }}" alt="Logo" style="width:50px;height:50px;margin-right:12px;"> <span>Manjehe Coffee</span>
        </div>
        <ul class="nav-links">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('home') }}#products">Products</a></li>
        </ul>
    </div>
</nav>
<section style="padding-top:120px;min-height:100vh;display:flex;align-items:center;justify-content:center;">
    <div style="max-width:780px;width:100%;background:#121212;border:1px solid #2a2a2a;padding:40px 45px;border-radius:28px;box-shadow:0 10px 40px -10px rgba(0,0,0,.6);">
        <h1 style="font-family:var(--font-primary);font-size:2rem;margin:0 0 10px;">Pilih Admin WhatsApp</h1>
        <p style="color:var(--text-muted);margin:0 0 30px;line-height:1.6;">Silakan pilih admin untuk melanjutkan pemesanan Anda.
            @if($productName)
                <br><strong>Produk:</strong> {{ $productName }} @if($quantity) (Qty: {{ $quantity }}) @endif
            @endif
            <br><strong>Harga:</strong> Rp {{ number_format($price,0,',','.') }}
            <br><strong>Catatan:</strong> Pastikan untuk menyertakan detail pesanan Anda saat menghubungi admin.
            <br>  Anda juga dapat melakukan pembayaran melalui transfer bank ke salah satu rekening berikut
            <br>  BNI : 12624602039 a.n. Sutiyami.
            <br>  BCA Syariah : 0760018564 a.n. Sutiyami.
            <br>  BRI : 6116 0102 6556 537 a.n. Sutiyami.
        </p>
        @php
            $adminNumbers = [
                ['name' => 'Admin 1','phone' => '6281233302500'],
                ['name' => 'Admin 2','phone' => '6282334334737'],
            ];
            $baseMessage = $productName ? "Halo ${productName}, saya ingin memesan" : 'Halo Admin, saya ingin memesan produk kopi Manjehe';
            if($productName){
                $baseMessage = "Halo Admin, saya ingin memesan: ${productName}";
                if($quantity){ $baseMessage .= " (Qty: ${quantity})"; }
                if($price){ $baseMessage .= " | Tolong konfirmasi harga."; }
            }
        @endphp
        <div style="display:grid;gap:25px;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));">
            @foreach($adminNumbers as $admin)
                @php $waUrl = 'https://wa.me/' . $admin['phone'] . '?text=' . urlencode($baseMessage); @endphp
                <a href="{{ $waUrl }}" target="_blank" style="text-decoration:none;display:flex;flex-direction:column;align-items:center;gap:14px;padding:28px 20px;border:1px solid #2d2d2d;background:#1b1b1b;border-radius:22px;transition:.35s;position:relative;overflow:hidden;">
                    <div style="width:74px;height:74px;border-radius:20px;background:#128C7E;display:flex;align-items:center;justify-content:center;font-size:2rem;color:#fff;box-shadow:0 6px 25px -8px #128c7ecc;">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    <h3 style="margin:0;font-size:1.15rem;font-weight:600;">{{ $admin['name'] }}</h3>
                    <div style="font-size:.85rem;color:#b5b5b5;">{{ $admin['phone'] }}</div>
                    <span style="margin-top:4px;background:#128C7E;color:#fff;padding:10px 18px;border-radius:50px;font-weight:600;font-size:.9rem;display:inline-flex;align-items:center;gap:8px;letter-spacing:.5px;">
                        <i class="fas fa-comment-dots"></i> Chat Sekarang
                    </span>
                    <span style="position:absolute;inset:0;pointer-events:none;background:radial-gradient(circle at 30% 20%,rgba(255,255,255,.07),transparent 70%);opacity:0;transition:.5s;"></span>
                </a>
            @endforeach
        </div>
        <div style="margin-top:40px;text-align:center;">
            <a href="{{ url()->previous() }}" style="color:var(--primary-color);text-decoration:none;font-weight:600;">← Kembali</a>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .nav-links a{color:#c9c9c9;}
    .nav-links a:hover{color:var(--primary-color);} 
    a[href*='wa.me']:hover span:last-child{background:#17a57e!important;}
    a[href*='wa.me']:hover{transform:translateY(-4px);box-shadow:0 15px 35px -10px rgba(18,140,126,.45);} 
</style>
@endpush
