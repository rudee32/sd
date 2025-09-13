@extends('layouts.app')

@section('content')
<div class="min-vh-100 d-flex align-items-center justify-content-center position-relative overflow-hidden p-3">
    <!-- Background Elements -->
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(135deg, #4f46e5 0%, #6366f1 50%, #06b6d4 100%); z-index: -2;"></div>
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: url(''); opacity: 0; z-index: -1;"></div>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7 col-sm-9">
                <div class="card border-0 shadow-3xl rounded-5 overflow-hidden login-form" style="backdrop-filter: blur(30px); background: rgba(255, 255, 255, 0.85);">
                    <div class="card-header bg-transparent border-0 text-center py-5">
                        <div class="mb-4">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-gradient-primary shadow-lg" style="width: 90px; height: 90px;">
                                <i class="bi bi-shield-lock text-white" style="font-size: 2.5rem;"></i>
                            </div>
                        </div>
                        <h2 class="mb-2 fw-bold text-dark display-5">
                            Admin Login
                        </h2>
                        <p class="text-muted mb-0 fs-5">Masuk ke panel administrasi</p>
                    </div>
                    <div class="card-body px-5 pb-5">
                        <form method="POST" action="{{ route('login.post') }}" class="needs-validation" novalidate>
                            @csrf

                            <div class="mb-4">
                                <label for="email" class="form-label fw-semibold text-dark mb-2">{{ __('Email Address') }}</label>
                                <div class="input-group input-group-lg shadow-sm rounded-4 overflow-hidden">
                                    <span class="input-group-text bg-primary bg-gradient border-0 text-white" style="border-radius: 1rem 0 0 1rem;">
                                        <i class="bi bi-envelope fs-4"></i>
                                    </span>
                                    <input id="email" type="email" class="form-control border-0 @error('email') is-invalid @enderror" 
                                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus 
                                           placeholder="admin@example.com" style="border-radius: 0 1rem 1rem 0; box-shadow: none;">
                                </div>
                                @error('email')
                                    <div class="invalid-feedback d-block mt-2">
                                        <i class="bi bi-exclamation-circle me-1"></i>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold text-dark mb-2">{{ __('Password') }}</label>
                                <div class="input-group input-group-lg shadow-sm rounded-4 overflow-hidden">
                                    <span class="input-group-text bg-primary bg-gradient border-0 text-white" style="border-radius: 1rem 0 0 1rem;">
                                        <i class="bi bi-lock fs-4"></i>
                                    </span>
                                    <input id="password" type="password" class="form-control border-0 @error('password') is-invalid @enderror" 
                                           name="password" required autocomplete="current-password" 
                                           placeholder="Enter your password" style="border-radius: 0 1rem 1rem 0; box-shadow: none;">
                                    <button class="btn btn-outline-light border-start-0" type="button" id="togglePassword" style="border-radius: 0 1rem 1rem 0;">
                                        <i class="bi bi-eye text-primary fs-5" id="toggleIcon"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback d-block mt-2">
                                        <i class="bi bi-exclamation-circle me-1"></i>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-4 form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="border-radius: 0.25rem;">
                                <label class="form-check-label text-dark fw-medium" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>

                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-primary btn-lg fw-bold py-3 rounded-4 shadow-lg" style="background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%); border: none; box-shadow: 0 12px 35px rgba(99, 102, 241, 0.5); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>{{ __('Login') }}
                                </button>
                            </div>

                            @if (Route::has('password.request'))
                                <div class="text-center">
                                    <a class="text-decoration-none text-primary fw-medium" href="{{ route('password.request') }}">
                                        <i class="bi bi-question-circle me-1"></i>{{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                            @endif
                        </form>
                    </div>
                    <div class="card-footer bg-transparent border-0 text-center py-4">
                        <small class="text-muted">
                            <i class="bi bi-shield-check me-1"></i>
                            © 2024 PELITA KALIMENDONG - Admin Panel
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.shadow-3xl {
    box-shadow: 0 35px 60px -15px rgba(0, 0, 0, 0.3);
}

.bg-gradient-primary {
    background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%);
}

.input-group-text {
    font-size: 1.25rem;
}

.form-control:focus {
    border-color: #4f46e5;
    box-shadow: 0 0 0 0.25rem rgba(79, 70, 229, 0.4);
}

.btn-primary {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 45px rgba(79, 70, 229, 0.5);
}

.btn-primary:active {
    transform: translateY(0);
}

.card {
    animation: slideUp 0.6s ease-out;
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Password toggle functionality
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('toggleIcon');
    
    if (togglePassword && passwordInput && toggleIcon) {
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Toggle icon
            if (type === 'password') {
                toggleIcon.classList.remove('bi-eye-slash');
                toggleIcon.classList.add('bi-eye');
            } else {
                toggleIcon.classList.remove('bi-eye');
                toggleIcon.classList.add('bi-eye-slash');
            }
        });
    }
    
    // Form validation
    const form = document.querySelector('.needs-validation');
    if (form) {
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            } else {
                // Add loading state to button
                const submitBtn = form.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.classList.add('loading');
                    submitBtn.disabled = true;
                }
            }
            form.classList.add('was-validated');
        });
    }
    
    // Auto-focus on email field
    const emailInput = document.getElementById('email');
    if (emailInput) {
        emailInput.focus();
    }
});
</script>
@endpush
