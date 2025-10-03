@push('scripts')
<script>
// Notification system for admin panel
function showAdminNotification(message, type = 'info', duration = 5000) {
    // Remove existing notifications
    const existingNotifications = document.querySelectorAll('.admin-notification');
    existingNotifications.forEach(notification => notification.remove());
    
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `admin-notification alert alert-${type} alert-dismissible fade show`;
    notification.style.cssText = `
        position: fixed;
        top: 90px;
        right: 20px;
        min-width: 300px;
        max-width: 400px;
        z-index: 10000;
        background: rgba(26, 15, 10, 0.95);
        border: 1px solid rgba(212, 165, 116, 0.3);
        color: #e5e7eb;
        border-radius: 12px;
        backdrop-filter: blur(20px);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        animation: slideInRight 0.3s ease-out;
    `;
    
    // Set icon based on type
    let icon = 'fas fa-info-circle';
    if (type === 'success') icon = 'fas fa-check-circle';
    else if (type === 'warning') icon = 'fas fa-exclamation-triangle';
    else if (type === 'danger') icon = 'fas fa-exclamation-circle';
    
    notification.innerHTML = `
        <div class="d-flex align-items-center">
            <i class="${icon} mr-2"></i>
            <span>${message}</span>
            <button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    `;
    
    document.body.appendChild(notification);
    
    // Auto remove after duration
    setTimeout(() => {
        if (notification.parentNode) {
            notification.style.animation = 'slideOutRight 0.3s ease-in';
            setTimeout(() => notification.remove(), 300);
        }
    }, duration);
    
    // Manual close
    notification.querySelector('.close').addEventListener('click', () => {
        notification.style.animation = 'slideOutRight 0.3s ease-in';
        setTimeout(() => notification.remove(), 300);
    });
}

// Add animation keyframes
if (!document.querySelector('#notification-animations')) {
    const style = document.createElement('style');
    style.id = 'notification-animations';
    style.textContent = `
        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        @keyframes slideOutRight {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);
}

// Make function globally available
window.showAdminNotification = showAdminNotification;
</script>
@endpush