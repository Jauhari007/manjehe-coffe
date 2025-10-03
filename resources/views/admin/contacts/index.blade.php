@extends('layouts.admin')

@section('title', 'Pesan Pelanggan - Manjehe Coffee Admin')
@section('page_title', 'Pesan Pelanggan')
@section('page_subtitle', 'Kelola pesan dari pelanggan')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="admin-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="d-flex align-items-center gap-3">
                        <h5 class="card-title text-white mb-0">
                            <i class="fas fa-envelope"></i>
                            Pesan Pelanggan
                        </h5>
                        <span class="badge badge-primary" id="total-messages">{{ $totalCount }} Total</span>
                        @if($unreadCount > 0)
                        <span class="badge badge-warning" id="unread-count">{{ $unreadCount }} Belum Dibaca</span>
                        @endif
                    </div>
                    
                    <div class="d-flex gap-2">
                        @if($unreadCount > 0)
                        <button type="button" class="btn btn-sm btn-outline-success" id="mark-all-read">
                            <i class="fas fa-check-double"></i>
                            Tandai Semua Dibaca
                        </button>
                        @endif
                        <button type="button" class="btn btn-sm btn-outline-light" onclick="refreshMessages()">
                            <i class="fas fa-sync-alt"></i>
                            Refresh
                        </button>
                    </div>
                </div>

                <!-- Filter dan Search -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-sm btn-outline-light filter-btn active" data-filter="all">
                                Semua
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-warning filter-btn" data-filter="unread">
                                Belum Dibaca
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-success filter-btn" data-filter="read">
                                Sudah Dibaca
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" id="search-input" placeholder="Cari berdasarkan nama, email, atau pesan...">
                            <div class="input-group-append">
                                <button class="btn btn-outline-light btn-sm" type="button" id="search-btn">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Messages List -->
                <div id="messages-container">
                    @include('admin.contacts.partials.messages-list', ['messages' => $messages])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .message-item {
        transition: all 0.3s ease;
        border-radius: 12px !important;
        background: rgba(26, 15, 10, 0.4) !important;
        border: 1px solid rgba(212, 165, 116, 0.1) !important;
        margin-bottom: 1rem;
    }
    
    .message-item:hover {
        transform: translateX(5px);
        border-color: rgba(212, 165, 116, 0.3) !important;
        box-shadow: 0 4px 12px rgba(212, 165, 116, 0.1);
    }
    
    .message-item.unread {
        background: rgba(255, 193, 7, 0.1) !important;
        border-color: rgba(255, 193, 7, 0.3) !important;
    }
    
    .message-item.unread .message-header {
        position: relative;
    }
    
    .message-item.unread .message-header::before {
        content: '';
        position: absolute;
        left: -15px;
        top: 50%;
        transform: translateY(-50%);
        width: 8px;
        height: 8px;
        background: #ffc107;
        border-radius: 50%;
    }
    
    .message-actions {
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .message-item:hover .message-actions {
        opacity: 1;
    }
    
    .message-content {
        max-height: 60px;
        overflow: hidden;
        position: relative;
    }

    .contact-meta {
        color: #f8d487 !important;
    }

    .contact-meta i {
        color: #ffde75 !important;
        margin-right: 4px;
    }
    
    .message-content.expanded {
        max-height: none;
    }
    
    .message-expand-btn {
        position: absolute;
        bottom: 0;
        right: 0;
        background: linear-gradient(90deg, transparent, rgba(26, 15, 10, 0.8));
        padding: 0 10px;
        border: none;
        color: #d4a574;
        font-size: 0.8rem;
    }
    
    .filter-btn.active {
        background: rgba(212, 165, 116, 0.2) !important;
        border-color: #d4a574 !important;
        color: #d4a574 !important;
    }
    
    .pagination {
        justify-content: center;
    }
    
    .pagination .page-link {
        background: rgba(26, 15, 10, 0.6);
        border-color: rgba(212, 165, 116, 0.3);
        color: #d4a574;
    }
    
    .pagination .page-link:hover {
        background: rgba(212, 165, 116, 0.2);
        border-color: #d4a574;
        color: #d4a574;
    }
    
    .pagination .page-item.active .page-link {
        background: #d4a574;
        border-color: #d4a574;
        color: #2d1810;
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Filter functionality
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const filter = this.dataset.filter;
            loadMessages({ status: filter === 'all' ? '' : filter });
        });
    });
    
    // Search functionality
    document.getElementById('search-btn').addEventListener('click', performSearch);
    document.getElementById('search-input').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            performSearch();
        }
    });
    
    // Mark all as read
    const markAllReadBtn = document.getElementById('mark-all-read');
    if (markAllReadBtn) {
        markAllReadBtn.addEventListener('click', function() {
            if (confirm('Tandai semua pesan sebagai dibaca?')) {
                fetch('{{ route("admin.contacts.markAllAsRead") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showNotification(data.message, 'success');
                        refreshMessages();
                    }
                });
            }
        });
    }
    
    // Auto refresh every 30 seconds
    setInterval(updateUnreadCount, 30000);
});

function performSearch() {
    const searchTerm = document.getElementById('search-input').value;
    const activeFilter = document.querySelector('.filter-btn.active').dataset.filter;
    
    loadMessages({ 
        search: searchTerm,
        status: activeFilter === 'all' ? '' : activeFilter
    });
}

function loadMessages(params = {}) {
    const url = new URL('{{ route("admin.contacts.index") }}');
    Object.keys(params).forEach(key => {
        if (params[key]) url.searchParams.append(key, params[key]);
    });
    
    fetch(url, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('messages-container').innerHTML = data.html;
        updateUnreadBadge(data.unreadCount);
        attachMessageEvents();
    })
    .catch(error => {
        console.error('Error loading messages:', error);
        showNotification('Gagal memuat pesan', 'error');
    });
}

function refreshMessages() {
    const activeFilter = document.querySelector('.filter-btn.active').dataset.filter;
    const searchTerm = document.getElementById('search-input').value;
    
    loadMessages({ 
        status: activeFilter === 'all' ? '' : activeFilter,
        search: searchTerm
    });
}

function updateUnreadCount() {
    fetch('{{ route("admin.contacts.unreadCount") }}')
    .then(response => response.json())
    .then(data => {
        updateUnreadBadge(data.count);
    });
}

function updateUnreadBadge(count) {
    const unreadBadge = document.getElementById('unread-count');
    const markAllBtn = document.getElementById('mark-all-read');
    
    if (count > 0) {
        if (unreadBadge) {
            unreadBadge.textContent = count + ' Belum Dibaca';
        } else {
            // Create badge if it doesn't exist
            const totalBadge = document.getElementById('total-messages');
            const newBadge = document.createElement('span');
            newBadge.className = 'badge badge-warning';
            newBadge.id = 'unread-count';
            newBadge.textContent = count + ' Belum Dibaca';
            totalBadge.parentNode.insertBefore(newBadge, totalBadge.nextSibling);
        }
        
        if (markAllBtn) markAllBtn.style.display = 'inline-block';
    } else {
        if (unreadBadge) unreadBadge.remove();
        if (markAllBtn) markAllBtn.style.display = 'none';
    }
}

function attachMessageEvents() {
    // Status toggle events
    document.querySelectorAll('.status-toggle').forEach(btn => {
        btn.addEventListener('click', function() {
            const messageId = this.dataset.messageId;
            toggleMessageStatus(messageId);
        });
    });
    
    // Delete events
    document.querySelectorAll('.delete-message').forEach(btn => {
        btn.addEventListener('click', function() {
            const messageId = this.dataset.messageId;
            if (confirm('Hapus pesan ini?')) {
                deleteMessage(messageId);
            }
        });
    });
    
    // Expand message events
    document.querySelectorAll('.message-expand-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const content = this.closest('.message-content');
            content.classList.toggle('expanded');
            this.style.display = content.classList.contains('expanded') ? 'none' : 'block';
        });
    });
}

function toggleMessageStatus(messageId) {
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
            refreshMessages();
        }
    });
}

function deleteMessage(messageId) {
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
            refreshMessages();
        }
    });
}

function showNotification(message, type = 'info') {
    if (typeof window.showAdminNotification === 'function') {
        window.showAdminNotification(message, type);
    } else {
        // Fallback for simple alert
        alert(message);
    }
}

// Initialize events on page load
document.addEventListener('DOMContentLoaded', function() {
    attachMessageEvents();
});
</script>
@endpush