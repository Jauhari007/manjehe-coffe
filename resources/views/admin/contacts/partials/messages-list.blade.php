@if($messages->count() > 0)
    <div class="messages-list">
        @foreach($messages as $message)
        <div class="message-item {{ !$message->is_read ? 'unread' : '' }}" data-id="{{ $message->id }}">
            <div class="card-body p-3">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="message-header d-flex align-items-center gap-3 flex-grow-1">
                        <div class="message-avatar">
                            <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <i class="fas fa-user text-white"></i>
                            </div>
                        </div>
                        
                        <div class="message-info flex-grow-1">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <h6 class="mb-0 text-white">{{ $message->name }}</h6>
                                <div class="message-actions d-flex gap-2">
                                    <button type="button" 
                                            class="btn btn-sm {{ $message->is_read ? 'btn-outline-warning' : 'btn-outline-success' }} status-toggle"
                                            data-message-id="{{ $message->id }}"
                                            title="{{ $message->is_read ? 'Tandai belum dibaca' : 'Tandai sudah dibaca' }}">
                                        <i class="fas {{ $message->is_read ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                                    </button>
                                    <a href="{{ route('admin.contacts.show', $message) }}" 
                                       class="btn btn-sm btn-outline-info"
                                       title="Lihat detail">
                                        <i class="fas fa-search"></i>
                                    </a>
                                    <button type="button" 
                                            class="btn btn-sm btn-outline-danger delete-message"
                                            data-message-id="{{ $message->id }}"
                                            title="Hapus pesan">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="contact-meta small mb-2">
                                <i class="fas fa-envelope"></i> {{ $message->email }}
                                @if($message->phone)
                                <span class="mx-2">|</span>
                                <i class="fas fa-phone"></i> {{ $message->phone }}
                                @endif
                            </div>
                            
                            <div class="message-content position-relative">
                                <p class="text-light mb-0">{{ $message->message }}</p>
                                @if(strlen($message->message) > 100)
                                <button type="button" class="message-expand-btn">
                                    <i class="fas fa-chevron-down"></i> Lihat selengkapnya
                                </button>
                                @endif
                            </div>
                            
                            <div class="message-meta mt-2 d-flex justify-content-between align-items-center">
                                <small class="contact-meta">
                                    <i class="fas fa-clock"></i>
                                    {{ optional($message->created_at)->diffForHumans() ?? 'N/A' }}
                                </small>
                                @if(!$message->is_read)
                                <span class="badge badge-warning">Baru</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    <!-- Pagination -->
    @if($messages->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $messages->links() }}
    </div>
    @endif
@else
    <div class="text-center py-5">
        <div class="mb-3">
            <i class="fas fa-inbox fa-3x text-muted"></i>
        </div>
        <h5 class="text-muted">Tidak ada pesan</h5>
        <p class="text-muted mb-0">Belum ada pesan dari pelanggan.</p>
    </div>
@endif