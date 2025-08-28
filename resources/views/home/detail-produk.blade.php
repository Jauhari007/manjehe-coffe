@extends('layouts.app')

@php use Illuminate\Support\Str; @endphp
@section('title', $product->name . ' - Coffee Manjehe')
@section('meta_description', Str::limit(strip_tags($product->description), 150))

@php
	$images = $product->images; 
@endphp

@section('content')

    <!-- Navigation -->
    <nav id="navbar">
        <div class="nav-container">
            <div class="logo">
                <img src="{{ asset('assets/manjehe_logo.png') }}" alt="Coffee Manjehe Logo" style="width: 50px; height: 50px; margin-right: 12px;">
                <span>Manjehe Coffee</span>
            </div>
            <ul class="nav-links">
                <li><a href="{{ route('home') }}" data-text="Home"><i class="fas fa-home"></i>Home</a></li>
                <li><a href="{{ route('home') }}#products" data-text="Products"><i class="fas fa-shopping-bag"></i>Products</a></li>
                <li><span class="product-name-nav">{{ $product->name }}</span></li>
            </ul>
            <div class="mobile-menu-btn">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

		<!-- Main Product Detail Section Wrapper (added) -->
		<section class="product-detail-page">
		<div class="detail-wrapper" style="display:flex;gap:50px;flex-wrap:wrap;">
			<div class="detail-gallery" style="flex:1;min-width:320px;">
				<div class="main-image" style="position:relative;border:1px solid #333;border-radius:16px;overflow:hidden;background:#111;">
					<img src="{{ $images->first() ? asset('storage/' . $images->first()->image_path) : asset('storage/product_images/default-product.jpg') }}" alt="{{ $product->name }}" style="width:100%;display:block;object-fit:cover;max-height:480px;">
				</div>
				@if($images->count() > 1)
				<div class="thumbs" style="display:flex;gap:12px;margin-top:15px;flex-wrap:wrap;">
					@foreach($images as $img)
						<button class="thumb-btn" data-src="{{ asset('storage/' . $img->image_path) }}" style="cursor:pointer;border:none;background:#1e1e1e;padding:6px;border-radius:10px;flex:0 0 90px;">
							<img src="{{ asset('storage/' . $img->image_path) }}" alt="Thumb {{ $loop->iteration }}" style="width:100%;border-radius:8px;object-fit:cover;height:70px;">
						</button>
					@endforeach
				</div>
				@endif
			</div>
			<div class="detail-info" style="flex:1;min-width:320px;">
				<h1 style="font-family:var(--font-primary);font-size:2.4rem;margin-bottom:10px;">{{ $product->name }}</h1>
				<div style="display:flex;align-items:center;gap:12px;color:var(--text-muted);margin-bottom:15px;font-size:0.9rem;">
					<span class="cat" style="background:#222;padding:6px 14px;border-radius:30px;border:1px solid #333;">
						@switch($product->category)
							@case('hot') Hot Coffee @break
							@case('cold') Cold Coffee @break
							@case('beans') Coffee Beans @break
							@default Coffee
						@endswitch
					</span>
					@if($product->is_featured)
						<span style="color:var(--primary-color);display:flex;align-items:center;gap:4px;"><i class="fas fa-crown"></i> Best Seller</span>
					@endif
				</div>
				<p style="line-height:1.7;margin-bottom:20px;max-width:620px;">{!! nl2br(e($product->description)) !!}</p>
				<div class="price" style="font-size:2rem;font-weight:600;color:var(--primary-color);margin-bottom:25px;">{{ $product->formatted_price }}</div>

				@if($product->features && is_array($product->features))
				<div class="features" style="margin-bottom:25px;">
					<h3 style="font-size:1.1rem;letter-spacing:1px;margin-bottom:10px;color:var(--accent-gold);text-transform:uppercase;">Features</h3>
					<ul style="list-style:none;display:flex;flex-wrap:wrap;gap:10px;padding:0;">
						@foreach($product->features as $feat)
							<li style="background:#1b1b1b;border:1px solid #2a2a2a;padding:8px 14px;border-radius:30px;font-size:0.85rem;">{{ $feat }}</li>
						@endforeach
					</ul>
				</div>
				@endif

				<div class="actions" style="display:flex;flex-wrap:wrap;gap:15px;align-items:center;">
					<a href="{{ route('order.select', ['product' => $product->name, 'price' => $product->price]) }}" class="order-btn" style="background:var(--whatsapp-green);color:#fff;padding:14px 28px;border-radius:40px;text-decoration:none;font-weight:600;display:inline-flex;align-items:center;gap:8px;">
						<i class="fab fa-whatsapp"></i> Pilih Admin
					</a>
					<button id="shareProduct" style="background:#222;color:#fff;padding:14px 24px;border-radius:40px;border:1px solid #333;cursor:pointer;display:inline-flex;align-items:center;gap:8px;">
						<i class="fas fa-share-alt"></i> Share
					</button>
				</div>
			</div>
		</div>

		<div style="margin-top:60px;">
			<h2 style="font-family:var(--font-primary);font-size:1.8rem;margin-bottom:20px;">Produk Lainnya</h2>
			<div class="related" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:24px;">
				@php
					$related = \App\Models\CoffeeProduct::active()->where('id','!=',$product->id)->take(4)->get();
				@endphp
				@forelse($related as $rel)
					<a href="{{ route('product.show', $rel) }}" style="text-decoration:none;color:inherit;background:#141414;border:1px solid #222;border-radius:16px;overflow:hidden;display:flex;flex-direction:column;">
						<div style="position:relative;padding-top:66%;background:#111;">
							@if($rel->images->first())
								<img src="{{ asset('storage/' . $rel->images->first()->image_path) }}" alt="{{ $rel->name }}" style="position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover;">
							@endif
						</div>
						<div style="padding:14px 16px;display:flex;flex-direction:column;gap:6px;">
							<strong style="font-size:1rem;">{{ $rel->name }}</strong>
							<span style="color:var(--primary-color);font-weight:600;font-size:0.9rem;">{{ $rel->formatted_price }}</span>
						</div>
					</a>
				@empty
					<p>Tidak ada produk lain.</p>
				@endforelse
			</div>
		</div>
	</div>
	</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
	// Initialize navbar functionality same as home page
	const navbar = document.getElementById('navbar');
	const navLinks = document.querySelector('.nav-links');
	const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
	
	// Add scrolled class immediately for detail page
	navbar.classList.add('scrolled');
	
	// Navbar scroll effect
	window.addEventListener('scroll', function() {
		if (window.scrollY > 100) {
			navbar.classList.add('scrolled');
		} else {
			navbar.classList.remove('scrolled');
		}
	});
	
	// Mobile menu toggle
	if (mobileMenuBtn) {
		mobileMenuBtn.addEventListener('click', function() {
			this.classList.toggle('active');
			navLinks.classList.toggle('active');
		});
	}
	
	// Close mobile menu when clicking on links
	const navLinksItems = document.querySelectorAll('.nav-links a');
	navLinksItems.forEach(link => {
		link.addEventListener('click', function() {
			navLinks.classList.remove('active');
			if (mobileMenuBtn) mobileMenuBtn.classList.remove('active');
		});
	});

	// Thumbnail click to swap main image
	document.querySelectorAll('.thumb-btn').forEach(btn => {
		btn.addEventListener('click', function() {
			const src = this.getAttribute('data-src');
			const main = document.querySelector('.main-image img');
			if(main) main.src = src;
			document.querySelectorAll('.thumb-btn').forEach(b=>b.classList.remove('active'));
			this.classList.add('active');
		});
	});

	// Share API
	const shareBtn = document.getElementById('shareProduct');
	if(shareBtn) {
		shareBtn.addEventListener('click', function() {
			const shareData = {
				title: '{{ addslashes($product->name) }} - Coffee Manjehe',
				text: 'Cek produk kopi favorit saya: {{ addslashes($product->name) }}',
				url: window.location.href
			};
			if(navigator.share) {
				navigator.share(shareData).catch(()=>{});
			} else {
				// fallback copy
				if (navigator.clipboard) {
					navigator.clipboard.writeText(shareData.url);
				}
				alert('Link disalin ke clipboard!');
			}
		});
	}
});
</script>
@endpush

@push('styles')
<style>
/* Additional styling for product name in navbar */
.product-name-nav {
    color: var(--primary-color);
    font-weight: 600;
    font-size: 1rem;
    display: flex;
    align-items: center;
    padding: 0.5rem 1rem;
}

/* Ensure navbar starts with scrolled appearance and proper spacing */
#navbar {
    background: rgba(42, 24, 16, 0.95) !important;
    backdrop-filter: blur(20px);
    box-shadow: 0 4px 30px rgba(212, 165, 116, 0.1);
    border-bottom: 1px solid rgba(212, 165, 116, 0.1);
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000;
}

/* Ensure proper spacing for content below navbar (use padding to create space so backgrounds extend naturally) */
.product-detail-page {
	padding-top: 120px; /* Adjust this value if navbar height changes */
}

/* Breadcrumb styling */
.breadcrumb {
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--text-muted);
    font-size: 0.9rem;
}

.breadcrumb a {
    color: var(--primary-color);
    text-decoration: none;
    transition: color 0.3s ease;
}

.breadcrumb a:hover {
    color: var(--accent-gold);
}

.breadcrumb span:not(:last-child) {
    color: var(--text-muted);
}
</style>
@endpush
@endsection
