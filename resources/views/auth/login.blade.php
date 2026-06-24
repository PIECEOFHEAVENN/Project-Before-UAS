<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .login-container {
            max-width: 420px;
            margin: auto;
            width: 100%;
            padding: 0 15px;
        }
        .login-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
            padding: 0;
        }
        .login-card .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 30px 30px 25px;
            text-align: center;
            border-bottom: none;
        }
        .login-card .card-header h3 {
            color: white;
            font-weight: 700;
            margin-bottom: 5px;
            font-size: 24px;
        }
        .login-card .card-header p {
            color: rgba(255,255,255,0.8);
            margin-bottom: 0;
            font-size: 14px;
        }
        .login-card .card-header .icon {
            font-size: 50px;
            color: white;
            margin-bottom: 10px;
            display: block;
        }
        .login-card .card-body {
            padding: 30px;
        }
        .login-card .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            transition: all 0.3s;
        }
        .login-card .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .login-card .form-label {
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }
        .login-card .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s;
        }
        .login-card .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }
        .login-card .btn-primary:active {
            transform: translateY(0);
        }
        .login-card .alert {
            border-radius: 10px;
            font-size: 14px;
        }
        .login-card .demo-info {
            background: #f8f9fa;
            padding: 12px;
            border-radius: 10px;
            text-align: center;
            margin-top: 15px;
            font-size: 13px;
            color: #6c757d;
        }
        .login-card .demo-info strong {
            color: #333;
        }
        .login-card .footer-text {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
            color: #6c757d;
        }
        .login-card .footer-text a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }
        .login-card .footer-text a:hover {
            text-decoration: underline;
        }
        .input-group-icon {
            position: relative;
        }
        .input-group-icon .form-control {
            padding-left: 45px;
        }
        .input-group-icon .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #adb5bd;
            font-size: 18px;
            z-index: 10;
        }
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #adb5bd;
            z-index: 10;
            background: none;
            border: none;
        }
        .password-toggle:hover {
            color: #667eea;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="card login-card">
            <div class="card-header">
                <span class="icon">
                    <i class="bi bi-shield-lock-fill"></i>
                </span>
                <h3>Admin Login</h3>
                <p>Masuk ke panel administrasi perusahaan</p>
            </div>
            <div class="card-body">
                <!-- Alert Success -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- Alert Error -->
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        @foreach($errors->all() as $error)
                            <p class="mb-0">{{ $error }}</p>
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- Form Login -->
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">
                            <i class="bi bi-envelope-fill me-1"></i> Alamat Email
                        </label>
                        <div class="input-group-icon">
                            <span class="input-icon"><i class="bi bi-envelope"></i></span>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   placeholder="contoh@email.com" 
                                   required 
                                   autofocus>
                        </div>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">
                            <i class="bi bi-key-fill me-1"></i> Password
                        </label>
                        <div class="input-group-icon">
                            <span class="input-icon"><i class="bi bi-lock"></i></span>
                            <input type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   id="password" 
                                   name="password" 
                                   placeholder="Masukkan password" 
                                   required>
                            <button type="button" class="password-toggle" id="togglePassword">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Ingat saya</label>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Masuk
                        </button>
                    </div>
                </form>

                <!-- Demo Info -->
                <div class="demo-info">
                    <i class="bi bi-info-circle me-1"></i>
                    Email: <strong>admin@osella.com</strong> | Password: <strong>password123</strong>
                </div>

                <div class="footer-text">
                    <i class="bi bi-building me-1"></i>
                    &copy; {{ date('Y') }} Company Profile - All Rights Reserved
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle Password Visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        });

        // Auto dismiss alert after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                const alerts = document.querySelectorAll('.alert');
                alerts.forEach(function(alert) {
                    const closeBtn = alert.querySelector('.btn-close');
                    if (closeBtn) {
                        closeBtn.click();
                    }
                });
            }, 5000);
        });
    </script>
</body>
</html>