@extends('layouts.admin')

@section('title','Profil Admin')
@section('page_title','Profil Admin')
@section('page_subtitle','Kelola informasi akun dan keamanan')

@section('content')
<div class="container-xxl py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-xl-11">
            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-5" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="row g-4 g-lg-5">
                <!-- Profile Information Section -->
                <div class="col-xl-4 col-lg-5">
                    <div class="admin-card profile-card h-100">
                        <div class="card-header">
                            <h5 class="mb-0 text-white">
                                <i class="fas fa-user-circle me-2 text-warning"></i>
                                Informasi Profil
                            </h5>
                            <small class="text-muted">Kelola data akun Anda</small>
                        </div>
                        <div class="card-body p-4">
                            <!-- Profile Avatar Section -->
                            <div class="text-center mb-5">
                                <div class="profile-avatar">
                                    <i class="fas fa-user-circle"></i>
                                </div>
                                <h6 class="text-white mt-3 mb-1">{{ $admin->name }}</h6>
                                <small class="text-muted">Administrator</small>
                            </div>

                            <!-- Profile Update Form -->
                            <form action="{{ route('admin.profile.update.info') }}" method="POST" class="profile-form">
                                @csrf
                                <div class="form-group mb-4">
                                    <label class="form-label text-white mb-2">
                                        <i class="fas fa-user me-1"></i> Nama Lengkap
                                    </label>
                                    <input type="text" name="name" 
                                           class="form-control profile-input @error('name') is-invalid @enderror" 
                                           value="{{ old('name',$admin->name) }}" 
                                           placeholder="Masukkan nama lengkap">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group mb-5">
                                    <label class="form-label text-white mb-2">
                                        <i class="fas fa-envelope me-1"></i> Email Address
                                    </label>
                                    <input type="email" name="email" 
                                           class="form-control profile-input @error('email') is-invalid @enderror" 
                                           value="{{ $admin->email }}" 
                                           readonly tabindex="-1" aria-readonly="true"
                                           style="cursor:not-allowed; opacity:.85;"
                                           title="Email tidak dapat diubah">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <button type="submit" class="btn btn-primary w-100 btn-update">
                                    <i class="fas fa-save me-2"></i> Simpan Perubahan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Password & Activity Section -->
                <div class="col-xl-8 col-lg-7">
                    <div class="row g-4">
                        <!-- Change Password Card -->
                        <div class="col-12">
                            <div class="admin-card security-card">
                                <div class="card-header">
                                    <h5 class="mb-0 text-white">
                                        <i class="fas fa-shield-alt me-2 text-info"></i>
                                        Keamanan Akun
                                    </h5>
                                    <small class="text-muted">Ubah password untuk menjaga keamanan akun</small>
                                </div>
                                <div class="card-body p-4">
                                    <form action="{{ route('admin.profile.update.password') }}" method="POST" class="password-form">
                                        @csrf
                                        <div class="row g-4">
                                            <div class="col-md-6">
                                                <label class="form-label text-white mb-2">
                                                    <i class="fas fa-lock me-1"></i> Password Lama
                                                </label>
                                                <div class="password-wrapper">
                                                    <input id="current_password" type="password" name="current_password" 
                                                           class="form-control profile-input pr-toggle-padding @error('current_password') is-invalid @enderror"
                                                           placeholder="Masukkan password lama" autocomplete="current-password">
                                                    <button type="button" class="password-toggle" data-target="current_password" aria-label="Lihat/Sembunyikan password lama">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </div>
                                                @error('current_password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label text-white mb-2">
                                                    <i class="fas fa-key me-1"></i> Password Baru
                                                </label>
                                                <div class="password-wrapper">
                                                    <input id="password" type="password" name="password" 
                                                           class="form-control profile-input pr-toggle-padding @error('password') is-invalid @enderror"
                                                           placeholder="Masukkan password baru" autocomplete="new-password">
                                                    <button type="button" class="password-toggle" data-target="password" aria-label="Lihat/Sembunyikan password baru">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </div>
                                                @error('password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label text-white mb-2">
                                                    <i class="fas fa-check-circle me-1"></i> Konfirmasi Password
                                                </label>
                                                <div class="password-wrapper">
                                                    <input id="password_confirmation" type="password" name="password_confirmation" 
                                                           class="form-control profile-input pr-toggle-padding"
                                                           placeholder="Ulangi password baru" autocomplete="new-password">
                                                    <button type="button" class="password-toggle" data-target="password_confirmation" aria-label="Lihat/Sembunyikan konfirmasi password">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-end">
                                                <button type="submit" class="btn btn-info w-100 btn-update">
                                                    <i class="fas fa-shield-alt me-2"></i> Update Password
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Activity Log Card -->
                        <div class="col-12">
                            <div class="admin-card activity-card">
                                <div class="card-header">
                                    <h5 class="mb-0 text-white">
                                        <i class="fas fa-history me-2 text-success"></i>
                                        Riwayat Aktivitas
                                    </h5>
                                    <small class="text-muted">Log aktivitas login dan logout terbaru</small>
                                </div>
                                <div class="card-body p-0">
                                    <div class="activity-log-container">
                                        @forelse($logs as $log)
                                            <div class="activity-log-item">
                                                <div class="activity-icon">
                                                    @if($log->action === 'login')
                                                        <i class="fas fa-sign-in-alt text-success"></i>
                                                    @elseif($log->action === 'logout')
                                                        <i class="fas fa-sign-out-alt text-warning"></i>
                                                    @else
                                                        <i class="fas fa-key text-info"></i>
                                                    @endif
                                                </div>
                                                <div class="activity-content">
                                                    <div class="activity-action">
                                                        {{ ucfirst($log->action) }}
                                                        @if($log->action === 'password_update')
                                                            Password
                                                        @endif
                                                    </div>
                                                    <div class="activity-meta">
                                                        <span class="activity-time">
                                                            <i class="fas fa-clock me-1"></i>
                                                            {{ \Carbon\Carbon::parse($log->created_at)->format('d M Y, H:i') }}
                                                        </span>
                                                        <span class="activity-ip">
                                                            <i class="fas fa-map-marker-alt me-1"></i>
                                                            {{ $log->ip_address }}
                                                        </span>
                                                    </div>
                                                    @if($log->user_agent)
                                                        <div class="activity-agent">
                                                            {{ Str::limit($log->user_agent, 60) }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @empty
                                            <div class="empty-state">
                                                <i class="fas fa-history text-muted mb-3"></i>
                                                <p class="text-muted">Belum ada aktivitas yang tercatat</p>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
/* Profile Page Styles */
.profile-card {
    border: 1px solid rgba(212, 165, 116, 0.2);
    background: linear-gradient(135deg, rgba(212, 165, 116, 0.08), rgba(139, 69, 19, 0.05));
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.security-card {
    border: 1px solid rgba(59, 130, 246, 0.2);
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.08), rgba(37, 99, 235, 0.05));
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.activity-card {
    border: 1px solid rgba(34, 197, 94, 0.2);
    background: linear-gradient(135deg, rgba(34, 197, 94, 0.08), rgba(22, 163, 74, 0.05));
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.card-header {
    background: rgba(26, 15, 10, 0.3);
    border-bottom: 1px solid rgba(212, 165, 116, 0.1);
    padding: 2rem 2rem 1.5rem 2rem;
}

.card-body {
    padding: 2rem;
}

.profile-avatar {
    width: 90px;
    height: 90px;
    background: linear-gradient(135deg, rgba(212, 165, 116, 0.2), rgba(139, 69, 19, 0.1));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    border: 3px solid rgba(212, 165, 116, 0.3);
    transition: all 0.3s ease;
}

.profile-avatar:hover {
    transform: scale(1.05);
    border-color: rgba(212, 165, 116, 0.5);
}

.profile-avatar i {
    font-size: 2.8rem;
    color: var(--admin-primary);
}

.profile-input {
    background: rgba(26, 15, 10, 0.3) !important;
    border: 1px solid rgba(212, 165, 116, 0.2) !important;
    color: #e5e7eb !important;
    padding: 1rem 1.25rem;
    border-radius: 10px;
    transition: all 0.3s ease;
    font-size: 0.95rem;
}

.profile-input:focus {
    border-color: var(--admin-primary) !important;
    box-shadow: 0 0 0 0.25rem rgba(212, 165, 116, 0.25) !important;
    background: rgba(26, 15, 10, 0.5) !important;
    transform: translateY(-1px);
}

.profile-input::placeholder {
    color: rgba(229, 231, 235, 0.5);
}

/* Password toggle */
.password-wrapper {
    position: relative;
}

.password-toggle {
    position: absolute;
    top: 50%;
    right: 0.85rem;
    transform: translateY(-50%);
    background: transparent;
    border: none;
    color: rgba(229,231,235,0.5);
    cursor: pointer;
    padding: 0.25rem 0.4rem;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: color .2s ease;
}

.password-toggle:hover, .password-toggle:focus {
    color: var(--admin-primary);
}

.pr-toggle-padding {
    padding-right: 2.5rem !important;
}

.btn-update {
    border-radius: 10px;
    padding: 1rem 1.5rem;
    font-weight: 600;
    font-size: 0.95rem;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.btn-update:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
}

.activity-log-container {
    max-height: 500px;
    overflow-y: auto;
    padding: 1.5rem;
}

.activity-log-item {
    display: flex;
    align-items: flex-start;
    padding: 1.5rem;
    border-bottom: 1px solid rgba(212, 165, 116, 0.1);
    transition: all 0.3s ease;
    margin-bottom: 0.5rem;
}

.activity-log-item:hover {
    background: rgba(212, 165, 116, 0.05);
    border-radius: 12px;
    transform: translateX(5px);
}

.activity-log-item:last-child {
    border-bottom: none;
    margin-bottom: 0;
}

.activity-icon {
    width: 50px;
    height: 50px;
    background: rgba(26, 15, 10, 0.3);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 1.5rem;
    flex-shrink: 0;
    border: 1px solid rgba(212, 165, 116, 0.2);
    transition: all 0.3s ease;
}

.activity-log-item:hover .activity-icon {
    transform: scale(1.1);
}

.activity-content {
    flex: 1;
    padding-top: 0.25rem;
}

.activity-action {
    font-weight: 600;
    color: #e5e7eb;
    margin-bottom: 0.75rem;
    font-size: 1rem;
}

.activity-meta {
    display: flex;
    gap: 1.5rem;
    margin-bottom: 0.5rem;
    flex-wrap: wrap;
}

.activity-time,
.activity-ip {
    font-size: 0.875rem;
    color: rgba(229, 231, 235, 0.7);
    display: flex;
    align-items: center;
}

.activity-agent {
    font-size: 0.8rem;
    color: rgba(229, 231, 235, 0.5);
    font-style: italic;
    line-height: 1.4;
}

.empty-state {
    text-align: center;
    padding: 4rem 2rem;
}

.empty-state i {
    font-size: 3.5rem;
    display: block;
    margin-bottom: 1rem;
}

/* Form Label Styling */
.form-label {
    font-weight: 600;
    margin-bottom: 0.75rem;
    display: flex;
    align-items: center;
    font-size: 0.95rem;
    letter-spacing: 0.25px;
}

.form-label i {
    opacity: 0.8;
    margin-right: 0.5rem;
}

/* Alert Styling */
.alert {
    border-radius: 12px;
    border: none;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    padding: 1.25rem 1.5rem;
    margin-bottom: 2rem;
}

.alert-success {
    background: linear-gradient(135deg, rgba(34, 197, 94, 0.15), rgba(22, 163, 74, 0.1));
    color: #22c55e;
    border-left: 4px solid #22c55e;
}

/* Container improvements */
.container-xxl {
    max-width: 1400px;
    padding-left: 2rem;
    padding-right: 2rem;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .container-xxl {
        padding-left: 1.5rem;
        padding-right: 1.5rem;
    }
}

@media (max-width: 768px) {
    .container-xxl {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    .card-header {
        padding: 1.5rem 1.5rem 1rem 1.5rem;
    }
    
    .card-body {
        padding: 1.5rem;
    }
    
    .activity-meta {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .profile-avatar {
        width: 70px;
        height: 70px;
    }
    
    .profile-avatar i {
        font-size: 2.2rem;
    }
    
    .activity-log-container {
        max-height: 400px;
        padding: 1rem;
    }
    
    .activity-log-item {
        padding: 1rem;
        margin-bottom: 0.25rem;
    }
    
    .activity-icon {
        width: 40px;
        height: 40px;
        margin-right: 1rem;
    }
    
    .btn-update {
        padding: 0.875rem 1.25rem;
        font-size: 0.9rem;
    }
    
    .profile-input {
        padding: 0.875rem 1rem;
        font-size: 0.9rem;
    }
}

@media (max-width: 576px) {
    .container-xxl {
        padding-left: 0.75rem;
        padding-right: 0.75rem;
    }
    
    .empty-state {
        padding: 2.5rem 1rem;
    }
    
    .empty-state i {
        font-size: 2.5rem;
    }
}

/* Scrollbar Styling */
.activity-log-container::-webkit-scrollbar {
    width: 8px;
}

.activity-log-container::-webkit-scrollbar-track {
    background: rgba(212, 165, 116, 0.1);
    border-radius: 10px;
}

.activity-log-container::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, var(--admin-primary), rgba(212, 165, 116, 0.8));
    border-radius: 10px;
}

.activity-log-container::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, rgba(212, 165, 116, 0.9), var(--admin-primary));
}

/* Additional spacing utilities */
.row.g-4.g-lg-5 > * {
    padding-bottom: 1.5rem;
}

@media (min-width: 992px) {
    .row.g-4.g-lg-5 > * {
        padding-bottom: 2rem;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.password-toggle').forEach(function(btn){
        btn.addEventListener('click', function(){
            const targetId = this.getAttribute('data-target');
            const input = document.getElementById(targetId);
            if(!input) return;
            const icon = this.querySelector('i');
            if(input.type === 'password') {
                input.type = 'text';
                this.classList.add('active');
                if(icon) { icon.classList.remove('fa-eye'); icon.classList.add('fa-eye-slash'); }
            } else {
                input.type = 'password';
                this.classList.remove('active');
                if(icon) { icon.classList.remove('fa-eye-slash'); icon.classList.add('fa-eye'); }
            }
        });
    });
});
</script>
@endpush
