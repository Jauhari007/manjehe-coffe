<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Coffee Manjehe</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #8B4513;
            --secondary-color: #D2691E;
            --accent-color: #F4E4BC;
            --dark-color: #3C2414;
        }

        body {
            background: linear-gradient(135deg, var(--primary-color), var(--dark-color));
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-container {
            max-width: 400px;
            width: 100%;
        }

        .login-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            padding: 2rem;
            border: none;
        }

        .brand-logo {
            text-align: center;
            margin-bottom: 2rem;
        }

        .brand-logo i {
            font-size: 4rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .brand-title {
            color: var(--dark-color);
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .brand-subtitle {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .form-floating label {
            color: #6c757d;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(139, 69, 19, 0.25);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 10px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--dark-color), var(--primary-color));
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        .alert {
            border-radius: 10px;
            border: none;
        }

        .footer-link {
            text-align: center;
            margin-top: 2rem;
        }

        .footer-link a {
            color: white;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .footer-link a:hover {
            color: var(--accent-color);
        }

        .coffee-animation {
            position: fixed;
            top: 20px;
            right: 20px;
            font-size: 2rem;
            color: rgba(255,255,255,0.3);
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .login-bg-icon {
            position: fixed;
            opacity: 0.1;
            color: white;
            font-size: 8rem;
            z-index: -1;
        }

        .login-bg-icon:nth-child(1) { top: 10%; left: 10%; }
        .login-bg-icon:nth-child(2) { top: 60%; right: 15%; }
        .login-bg-icon:nth-child(3) { bottom: 20%; left: 20%; }
    </style>
</head>
<body>
    <!-- Background Icons -->
    <i class="fas fa-coffee login-bg-icon"></i>
    <i class="fas fa-mug-hot login-bg-icon"></i>
    <i class="fas fa-seedling login-bg-icon"></i>
    
    <!-- Floating Coffee Animation -->
    <div class="coffee-animation">
        <i class="fas fa-coffee"></i>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="login-container">
                    <div class="card login-card">
                        <!-- Brand -->
                        <div class="brand-logo">
                            <i class="fas fa-coffee"></i>
                            <h3 class="brand-title">Coffee Manjehe</h3>
                            <p class="brand-subtitle">Admin Panel</p>
                        </div>

                        <!-- Alerts -->
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-circle me-2"></i>
                                {{ $errors->first() }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <!-- Login Form -->
                        <form method="POST" action="{{ route('admin.login') }}">
                            @csrf
                            
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email') }}" 
                                       placeholder="name@example.com" required autofocus>
                                <label for="email">Email Address</label>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                       id="password" name="password" placeholder="Password" required>
                                <label for="password">Password</label>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember" value="1">
                                <label class="form-check-label" for="remember">
                                    Ingat saya
                                </label>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-sign-in-alt me-2"></i>
                                    Masuk ke Admin Panel
                                </button>
                            </div>
                        </form>

                        <!-- Additional Info -->
                        <div class="text-center mt-4">
                            <small class="text-muted">
                                <i class="fas fa-shield-alt me-1"></i>
                                Akses terbatas untuk administrator
                            </small>
                        </div>
                    </div>

                    <!-- Footer Link -->
                    <div class="footer-link">
                        <a href="{{ route('home') }}">
                            <i class="fas fa-arrow-left me-2"></i>
                            Kembali ke Website
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Auto-hide alerts after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);

        // Add loading state to submit button
        document.querySelector('form').addEventListener('submit', function() {
            const submitBtn = document.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Memproses...';
            submitBtn.disabled = true;
        });
    </script>
</body>
</html>
