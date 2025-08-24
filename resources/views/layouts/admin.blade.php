{{-- File: resources/views/layouts/admin.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Coffee Manjehe Admin')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Custom Admin CSS -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    
    <style>
        :root {
            --admin-primary: #D4A574;
            --admin-secondary: #8B4513;
            --admin-dark: #2D1810;
            --admin-darker: #1A0F0A;
            --admin-success: #10b981;
            --admin-warning: #f59e0b;
            --admin-error: #ef4444;
            --admin-info: #3b82f6;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, var(--admin-darker), var(--admin-dark));
            color: white;
            min-height: 100vh;
        }
        
        .admin-sidebar {
            background: linear-gradient(180deg, var(--admin-dark), var(--admin-darker));
            border-right: 1px solid rgba(212, 165, 116, 0.1);
            backdrop-filter: blur(20px);
        }
        
        .admin-topbar {
            background: rgba(26, 26, 26, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(212, 165, 116, 0.1);
        }
        
        .logo-admin {
            background: linear-gradient(135deg, var(--admin-primary), #F4E4BC);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 700;
        }
        
        .nav-item {
            transition: all 0.3s ease;
            border-radius: 12px;
            margin: 0.25rem 0;
        }
        
        .nav-item:hover, .nav-item.active {
            background: rgba(212, 165, 116, 0.1);
            border-left: 4px solid var(--admin-primary);
            transform: translateX(4px);
        }
        
        .nav-item a {
            color: #d1d5db;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .nav-item:hover a, .nav-item.active a {
            color: var(--admin-primary);
        }
        
        .admin-card {
            background: linear-gradient(135deg, rgba(212, 165, 116, 0.05), rgba(139, 69, 19, 0.05));
            border: 1px solid rgba(212, 165, 116, 0.1);
            border-radius: 16px;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }
        
        .admin-card:hover {
            border-color: rgba(212, 165, 116, 0.3);
            transform: translateY(-2px);
            box-shadow: 0 8px 32px rgba(212, 165, 116, 0.1);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--admin-primary), var(--admin-secondary));
            border: none;
            color: white;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #F4E4BC, var(--admin-primary));
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(212, 165, 116, 0.3);
        }
        
        .btn-success {
            background: linear-gradient(135deg, var(--admin-success), #059669);
            border: none;
        }
        
        .btn-danger {
            background: linear-gradient(135deg, var(--admin-error), #dc2626);
            border: none;
        }
        
        .btn-warning {
            background: linear-gradient(135deg, var(--admin-warning), #d97706);
            border: none;
        }
        
        .btn-info {
            background: linear-gradient(135deg, var(--admin-info), #1e40af);
            border: none;
        }
        
        .alert {
            border-radius: 12px;
            border: none;
            backdrop-filter: blur(10px);
        }
        
        .alert-success {
            background: rgba(16, 185, 129, 0.1);
            border-left: 4px solid var(--admin-success);
            color: #6ee7b7;
        }
        
        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            border-left: 4px solid var(--admin-error);
            color: #fca5a5;
        }
        
        .form-control {
            background: rgba(212, 165, 116, 0.05);
            border: 2px solid rgba(212, 165, 116, 0.1);
            color: white;
            border-radius: 12px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            background: rgba(212, 165, 116, 0.1);
            border-color: var(--admin-primary);
            box-shadow: 0 0 0 0.2rem rgba(212, 165, 116, 0.25);
            color: white;
        }
        
        .form-control::placeholder {
            color: #9ca3af;
        }
        
        .table {
            background: rgba(212, 165, 116, 0.02);
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid rgba(212, 165, 116, 0.1);
        }
        
        .table th {
            background: rgba(212, 165, 116, 0.1);
            border: none;
            color: var(--admin-primary);
            font-weight: 600;
            padding: 1rem;
        }
        
        .table td {
            border: none;
            color: #d1d5db;
            padding: 1rem;
            border-bottom: 1px solid rgba(212, 165, 116, 0.05);
        }
        
        .table tbody tr:hover {
            background: rgba(212, 165, 116, 0.05);
        }
        
        .badge {
            border-radius: 20px;
            padding: 0.5rem 1rem;
            font-weight: 500;
            font-size: 0.8rem;
        }
        
        .badge-success {
            background: rgba(16, 185, 129, 0.2);
            color: #6ee7b7;
            border: 1px solid rgba(16, 185, 129, 0.3);
        }
        
        .badge-warning {
            background: rgba(245, 158, 11, 0.2);
            color: #fbbf24;
            border: 1px solid rgba(245, 158, 11, 0.3);
        }
        
        .badge-danger {
            background: rgba(239, 68, 68, 0.2);
            color: #fca5a5;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }
        
        .badge-primary {
            background: rgba(212, 165, 116, 0.2);
            color: var(--admin-primary);
            border: 1px solid rgba(212, 165, 116, 0.3);
        }
        
        .badge-info {
            background: rgba(59, 130, 246, 0.2);
            color: #93c5fd;
            border: 1px solid rgba(59, 130, 246, 0.3);
        }
        
        .stats-card {
            background: linear-gradient(135deg, rgba(212, 165, 116, 0.1), rgba(139, 69, 19, 0.05));
            border: 1px solid rgba(212, 165, 116, 0.2);
            border-radius: 16px;
            padding: 1.5rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .stats-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 40px rgba(212, 165, 116, 0.15);
            border-color: var(--admin-primary);
        }
        
        .stats-icon {
            background: linear-gradient(135deg, var(--admin-primary), #F4E4BC);
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--admin-darker);
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        
        .stats-content {
            position: relative;
            z-index: 2;
        }
        
        .dropdown-menu {
            background: var(--admin-dark);
            border: 1px solid rgba(212, 165, 116, 0.2);
            border-radius: 12px;
            backdrop-filter: blur(20px);
        }
        
        .dropdown-item {
            color: #d1d5db;
            transition: all 0.3s ease;
        }
        
        .dropdown-item:hover {
            background: rgba(212, 165, 116, 0.1);
            color: var(--admin-primary);
        }
        
        /* Logout link fix */
        .dropdown-item.text-danger {
            color: #dc3545 !important;
            cursor: pointer !important;
            z-index: 10 !important;
            position: relative;
            pointer-events: auto !important;
        }
        .dropdown-item.text-danger:hover, .dropdown-item.text-danger:focus {
            background: rgba(220, 53, 69, 0.1) !important;
            color: #dc3545 !important;
        }
    </style>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('styles')
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="admin-sidebar" style="width: 280px; min-height: 100vh;">
            <div class="p-4">
                <!-- Logo -->
                <div class="text-center mb-4">
                    <h3 class="logo-admin font-weight-bold">
                        <i class="fas fa-coffee me-2"></i>
                        Coffee Manjehe
                    </h3>
                    <p class="text-muted small">Admin Panel</p>
                </div>
                
                <!-- Navigation -->
                <nav class="nav flex-column">
                    <div class="nav-item {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                        <a class="nav-link d-flex align-items-center py-3 px-3" href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-tachometer-alt me-3"></i>
                            Dashboard
                        </a>
                    </div>
                    <div class="nav-item {{ Request::routeIs('admin.products.*') ? 'active' : '' }}">
                        <a class="nav-link d-flex align-items-center py-3 px-3" href="{{ route('admin.products.index') }}">
                            <i class="fas fa-coffee me-3"></i>
                            Coffee Products
                        </a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link d-flex align-items-center py-3 px-3" href="{{ route('home') }}" target="_blank">
                            <i class="fas fa-external-link-alt me-3"></i>
                            View Website
                        </a>
                    </div>
                </nav>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex-fill">
            <!-- Top Bar -->
            <div class="admin-topbar p-3 d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="mb-0 text-white">@yield('page_title', 'Dashboard')</h4>
                    <small class="text-muted">@yield('page_subtitle', 'Welcome back!')</small>
                </div>
                
                <div class="dropdown">
                    <button class="btn btn-outline-light dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle me-2"></i>
                        {{ Auth::guard('admin')->user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user me-2"></i>Profile
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cog me-2"></i>Settings
                            </a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item text-danger" onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin keluar dari admin panel?')) document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Page Content -->
            <div class="p-4">
                @if(session('success'))
                    <div class="alert alert-success d-flex align-items-center mb-4">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="alert alert-danger d-flex align-items-center mb-4">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ session('error') }}
                    </div>
                @endif
                
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        // CSRF setup
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        // Auto hide alerts
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);
        
        // Confirm delete actions
        $(document).on('click', '.btn-delete', function(e) {
            if (!confirm('Apakah Anda yakin ingin menghapus item ini?')) {
                e.preventDefault();
            }
        });

        // Loading state for buttons
        $(document).on('click', '.btn-loading', function() {
            const btn = $(this);
            btn.prop('disabled', true);
            btn.html('<span class="spinner-border spinner-border-sm me-2"></span>Loading...');
        });
        
        // Confirm delete
        function confirmDelete(form) {
            if (confirm('Apakah Anda yakin ingin menghapus item ini?')) {
                form.submit();
            }
        }
        
        // Confirm logout
        function confirmLogout() {
            return confirm('Apakah Anda yakin ingin keluar dari admin panel?');
        }
        
        // Alternative logout function
        function logout() {
            if (confirm('Apakah Anda yakin ingin keluar dari admin panel?')) {
                document.getElementById('logout-form').submit();
            }
        }
        
        // Robust logout function
        function logoutAdmin() {
            if (confirm('Apakah Anda yakin ingin keluar dari admin panel?')) {
                // Create form dynamically
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '{{ route("admin.logout") }}';
                
                // Add CSRF token
                const csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = '{{ csrf_token() }}';
                form.appendChild(csrfInput);
                
                // Add to body and submit
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
    
    <!-- Global logout form -->
    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    @stack('scripts')
</body>
</html>