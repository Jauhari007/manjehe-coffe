@extends('layouts.admin')

@section('title', 'Detail Pesan - Manjehe Coffee Admin')
@section('page_title', 'Detail Pesan')
@section('page_subtitle', 'Pesan dari ' . $contact->name)

@section('content')
<div class="row">
    <div class="col-12">
        <div class="admin-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="d-flex align-items-center gap-3">
                        <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-outline-light">
                            <i class="fas fa-arrow-left"></i>
                            Kembali
                        </a>
                        <h5 class="card-title text-white mb-0">
                            <i class="fas fa-envelope"></i>
                            Detail Pesan
                        </h5>
                        @if(!$contact->is_read)
                        <span class="badge badge-warning">Baru</span>
                        @endif
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="button" 
                                class="btn btn-sm {{ $contact->is_read ? 'btn-outline-warning' : 'btn-outline-success' }}"
                                onclick="toggleStatus({{ $contact->id }})">
                            <i class="fas {{ $contact->is_read ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                            {{ $contact->is_read ? 'Tandai Belum Dibaca' : 'Tandai Sudah Dibaca' }}
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="deleteMessage({{ $contact->id }})">
                            <i class="fas fa-trash"></i>
                            Hapus
                        </button>
                    </div>
                </div>

                <div class="message-detail">
                    <!-- Sender Info -->
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <div class="sender-info p-4 rounded" style="background: rgba(212, 165, 116, 0.1); border: 1px solid rgba(212, 165, 116, 0.2);">
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                        <i class="fas fa-user fa-2x text-white"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-white mb-1">{{ $contact->name }}</h4>
                                        <p class="text-muted mb-0 contact-meta">
                                            <i class="fas fa-envelope"></i> {{ $contact->email }}
                                        </p>
                                        @if($contact->phone)
                                        <p class="text-muted mb-0 contact-meta">
                                            <i class="fas fa-phone"></i> {{ $contact->phone }}
                                        </p>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="message-meta">
                                    <div class="row text-center">
                                        <div class="col-6">
                                            <div class="meta-item">
                                                <i class="fas fa-calendar text-primary"></i>
                                                <div class="mt-1">
                                                    <small class="text-muted">Tanggal</small>
                                                    <div class="text-white contact-meta">{{ $contact->created_at->format('d M Y') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="meta-item">
                                                <i class="fas fa-clock text-primary"></i>
                                                <div class="mt-1">
                                                    <small class="text-muted">Waktu</small>
                                                    <div class="text-white contact-meta">{{ $contact->created_at->format('H:i') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="status-info p-4 rounded" style="background: rgba(26, 15, 10, 0.4); border: 1px solid rgba(212, 165, 116, 0.1);">
                                <h6 class="text-white mb-3">
                                    <i class="fas fa-info-circle"></i>
                                    Status Pesan
                                </h6>
                                
                                <div class="status-item mb-3">
                                    <label class="text-muted small">Status Baca:</label>
                                    <div>
                                        @if($contact->is_read)
                                        <span class="badge badge-success">
                                            <i class="fas fa-check"></i> Sudah Dibaca
                                        </span>
                                        @else
                                        <span class="badge badge-warning">
                                            <i class="fas fa-clock"></i> Belum Dibaca
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="status-item">
                                    <label class="text-muted small">Diterima:</label>
                                    <div class="text-white contact-meta">
                                        {{ optional($contact->created_at)->diffForHumans() ?? 'N/A' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Message Content -->
                    <div class="message-content p-4 rounded" style="background: rgba(26, 15, 10, 0.6); border: 1px solid rgba(212, 165, 116, 0.2);">
                        <h6 class="text-white mb-3">
                            <i class="fas fa-comment"></i>
                            Isi Pesan
                        </h6>
                        <div class="message-text text-light" style="line-height: 1.6; font-size: 1.1rem;">
                            {!! nl2br(e($contact->message)) !!}
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="quick-actions mt-4 p-4 rounded" style="background: rgba(212, 165, 116, 0.05); border: 1px solid rgba(212, 165, 116, 0.1);">
                        <h6 class="text-white mb-3">
                            <i class="fas fa-bolt"></i>
                            Aksi Cepat
                        </h6>
                        
                        <div class="d-flex gap-3 flex-wrap">
                            <a href="mailto:{{ $contact->email }}" class="btn btn-outline-primary">
                                <i class="fas fa-reply"></i>
                                Balas via Email
                            </a>
                            
                            @if($contact->phone)
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->phone) }}" 
                               target="_blank" 
                               class="btn btn-outline-success">
                                <i class="fab fa-whatsapp"></i>
                                WhatsApp
                            </a>
                            <a href="tel:{{ $contact->phone }}" class="btn btn-outline-info">
                                <i class="fas fa-phone"></i>
                                Telepon
                            </a>
                            @endif
                            
                            <button type="button" class="btn btn-outline-secondary" onclick="copyToClipboard()">
                                <i class="fas fa-copy"></i>
                                Salin Pesan
                            </button>
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
    .sender-info, .status-info, .message-content, .quick-actions {
        transition: all 0.3s ease;
    }
    
    .sender-info:hover, .status-info:hover, .message-content:hover, .quick-actions:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(212, 165, 116, 0.1);
    }
    
    .meta-item {
        text-align: center;
    }
    
    .meta-item i {
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
    }
    
    .status-item {
        border-bottom: 1px solid rgba(212, 165, 116, 0.1);
        padding-bottom: 0.5rem;
    }
    
    .status-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }
    
    .message-text {
        max-height: none;
        white-space: pre-wrap;
        word-wrap: break-word;
    }
    
    .btn {
        transition: all 0.3s ease;
    }
    
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .contact-meta {
        color: #f8d487 !important;
    }

    .contact-meta i {
        color: #ffde75 !important;
        margin-right: 6px;
    }
</style>
@endpush

@push('scripts')
<script>
function toggleStatus(messageId) {
    fetch(`/admin/contacts/${messageId}/status`, {
        method: 'PATCH',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showNotification(data.message, 'success');
            // Refresh page to update status
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('Gagal mengubah status', 'error');
    });
}

function deleteMessage(messageId) {
    if (confirm('Apakah Anda yakin ingin menghapus pesan ini?')) {
        fetch(`/admin/contacts/${messageId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification(data.message, 'success');
                // Redirect to contacts index
                setTimeout(() => {
                    window.location.href = '{{ route("admin.contacts.index") }}';
                }, 1000);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Gagal menghapus pesan', 'error');
        });
    }
}

function copyToClipboard() {
    const messageText = `{{ $contact->message }}`;
    const tempTextArea = document.createElement('textarea');
    tempTextArea.value = messageText;
    document.body.appendChild(tempTextArea);
    tempTextArea.select();
    document.execCommand('copy');
    document.body.removeChild(tempTextArea);
    
    showNotification('Pesan berhasil disalin ke clipboard', 'success');
}

function showNotification(message, type = 'info') {
    if (typeof window.showAdminNotification === 'function') {
        window.showAdminNotification(message, type);
    } else {
        // Fallback for simple alert
        alert(message);
    }
}
</script>
@endpush