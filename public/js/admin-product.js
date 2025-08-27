document.addEventListener('DOMContentLoaded', function() {
    
    // Features Management
    initializeFeaturesManagement();
    
    // Form submission handling
    initializeFormSubmission();
    
    // Image preview functionality  
    initializeImagePreview();
    
    // Price formatting
    initializePriceFormatting();
    
    // Real-time preview updates
    initializePreviewUpdates();
    
    function initializeFeaturesManagement() {
        const featuresContainer = document.getElementById('featuresContainer');
        const addFeatureBtn = document.getElementById('addFeature');
        
        if (!featuresContainer || !addFeatureBtn) return;
        
        // Add feature button handler
        addFeatureBtn.addEventListener('click', function() {
            const newFeatureDiv = document.createElement('div');
            newFeatureDiv.className = 'feature-input';
            newFeatureDiv.innerHTML = `
                <div class="input-group">
                    <input type="text" class="form-control" name="features[]" 
                           placeholder="Contoh: 100% Arabika">
                    <button type="button" class="btn btn-outline-danger remove-feature">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            `;
            
            featuresContainer.appendChild(newFeatureDiv);
            
            // Add event listener to the new remove button
            const removeBtn = newFeatureDiv.querySelector('.remove-feature');
            if (removeBtn) {
                removeBtn.addEventListener('click', function() {
                    newFeatureDiv.remove();
                    // Update preview after removing feature
                    if (window.updateFeaturePreview) {
                        window.updateFeaturePreview();
                    }
                });
            }
            
            // Add event listener for preview update
            const newInput = newFeatureDiv.querySelector('input[name="features[]"]');
            if (newInput) {
                newInput.addEventListener('input', function() {
                    if (window.updateFeaturePreview) {
                        window.updateFeaturePreview();
                    }
                });
            }
        });
        
        // Remove feature button handlers for existing features
        featuresContainer.addEventListener('click', function(e) {
            if (e.target.closest('.remove-feature')) {
                const featureDiv = e.target.closest('.feature-input');
                if (featureDiv) {
                    featureDiv.remove();
                    // Update preview after removing feature
                    if (window.updateFeaturePreview) {
                        window.updateFeaturePreview();
                    }
                }
            }
        });
    }
    
    function initializeFormSubmission() {
        const productForm = document.getElementById('productForm');
        if (!productForm) return;
        
        productForm.addEventListener('submit', function(e) {
            // Don't prevent default - let Laravel handle the form submission normally
            const submitBtn = this.querySelector('.btn-loading, button[type="submit"]');
            if (submitBtn) {
                // Show loading state
                submitBtn.disabled = true;
                const originalContent = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Memperbarui...';
                
                // Re-enable after a short delay in case of validation errors
                setTimeout(function() {
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalContent;
                    }
                }, 10000); // 10 seconds timeout
            }
        });
    }
    
    function initializeImagePreview() {
        // Single image preview function to avoid conflicts
        window.previewImages = function(input) {
            const previewContainer = document.getElementById('imagePreviewContainer');
            if (!previewContainer || !input) return;
            
            previewContainer.innerHTML = ''; // Clear existing previews

            if (input.files && input.files.length > 0) {
                const maxFiles = 5;
                const files = Array.from(input.files).slice(0, maxFiles);

                files.forEach((file, index) => {
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        const col = document.createElement('div');
                        col.className = 'col-md-4 mb-3 preview-item';
                        col.innerHTML = `
                            <div class="position-relative">
                                <img src="${e.target.result}" class="img-thumbnail preview-image" 
                                     alt="Preview" style="width: 100%; height: 150px; object-fit: cover;">
                                <span class="badge bg-success position-absolute top-0 start-0 m-2">
                                    Gambar Baru ${index + 1}
                                </span>
                            </div>
                        `;
                        previewContainer.appendChild(col);
                    };

                    reader.readAsDataURL(file);
                });
            }
        };
    }
    
    function initializePriceFormatting() {
        const priceInput = document.getElementById('price');
        if (!priceInput) return;
        
        priceInput.addEventListener('input', function() {
            // Remove all non-numeric characters
            let value = this.value.replace(/[^0-9]/g, '');
            
            if (value) {
                // Format with dots as thousand separators
                let formatted = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                this.value = formatted;
                
                // Update preview if exists
                const previewPrice = document.getElementById('previewPrice');
                if (previewPrice) {
                    previewPrice.textContent = 'Rp ' + formatted;
                }
            } else {
                // Update preview if exists
                const previewPrice = document.getElementById('previewPrice');
                if (previewPrice) {
                    previewPrice.textContent = 'Rp 0';
                }
            }
        });
    }
    
    function initializePreviewUpdates() {
        // Make updateFeaturePreview globally available
        window.updateFeaturePreview = function() {
            const features = [];
            const featureInputs = document.querySelectorAll('input[name="features[]"]');
            
            if (featureInputs) {
                featureInputs.forEach(input => {
                    if (input && input.value && input.value.trim()) {
                        features.push(input.value.trim());
                    }
                });
            }

            const previewFeatures = document.getElementById('previewFeatures');
            if (!previewFeatures) return;

            let featuresHtml = '';
            if (features.length > 0) {
                featuresHtml = '<div class="small"><strong>Fitur:</strong><br>';
                features.forEach(feature => {
                    featuresHtml += `<i class="fas fa-check me-1"></i> ${feature}<br>`;
                });
                featuresHtml += '</div>';
            }
            
            previewFeatures.innerHTML = featuresHtml;
        };
        
        // Real-time preview updates with null checks
        const nameInput = document.getElementById('name');
        if (nameInput) {
            nameInput.addEventListener('input', function() {
                const previewName = document.getElementById('previewName');
                if (previewName) {
                    previewName.textContent = this.value || 'Nama Produk';
                }
            });
        }

        const descInput = document.getElementById('description');
        if (descInput) {
            descInput.addEventListener('input', function() {
                const previewDesc = document.getElementById('previewDescription');
                if (previewDesc) {
                    previewDesc.textContent = this.value || 'Deskripsi produk akan muncul di sini...';
                }
            });
        }

        const categorySelect = document.getElementById('category');
        if (categorySelect) {
            categorySelect.addEventListener('change', function() {
                const previewCategory = document.getElementById('previewCategory');
                if (previewCategory) {
                    let categoryText = 'Kategori';
                    
                    switch(this.value) {
                        case 'hot':
                            categoryText = 'Kopi Panas';
                            break;
                        case 'cold':
                            categoryText = 'Kopi Dingin';
                            break;
                        case 'beans':
                            categoryText = 'Biji Kopi';
                            break;
                        default:
                            categoryText = 'Kategori';
                    }
                    
                    previewCategory.textContent = categoryText;
                }
            });
        }

        // Features preview with safer event delegation
        document.addEventListener('input', function(e) {
            if (e.target && e.target.matches && e.target.matches('input[name="features[]"]')) {
                if (window.updateFeaturePreview) {
                    window.updateFeaturePreview();
                }
            }
        });

        // Status preview with better null checking
        const isActiveInput = document.getElementById('is_active');
        const isFeaturedInput = document.getElementById('is_featured');
        
        function updateStatusPreview() {
            const previewStatus = document.getElementById('previewStatus');
            if (!previewStatus) return;
            
            let statusHtml = '';
            
            const isActive = isActiveInput ? isActiveInput.checked : false;
            const isFeatured = isFeaturedInput ? isFeaturedInput.checked : false;
            
            if (isActive) {
                statusHtml += '<span class="badge bg-success me-1">Aktif</span>';
            } else {
                statusHtml += '<span class="badge bg-danger me-1">Nonaktif</span>';
            }
            
            if (isFeatured) {
                statusHtml += '<span class="badge bg-warning text-dark">Unggulan</span>';
            }
            
            previewStatus.innerHTML = statusHtml;
        }

        // Add event listeners for status inputs
        if (isActiveInput) {
            isActiveInput.addEventListener('change', updateStatusPreview);
        }
        
        if (isFeaturedInput) {
            isFeaturedInput.addEventListener('change', updateStatusPreview);
        }

        // Initial preview updates
        if (window.updateFeaturePreview) {
            window.updateFeaturePreview();
        }
        
        // Trigger price formatting if price exists
        const priceInput = document.getElementById('price');
        if (priceInput && priceInput.value) {
            const event = new Event('input');
            priceInput.dispatchEvent(event);
        }
        
        // Initial status update
        updateStatusPreview();
    }
    
    // Clear validation errors when inputs change
    document.addEventListener('input', function(e) {
        if (e.target && e.target.matches && e.target.matches('input, select, textarea')) {
            e.target.classList.remove('is-invalid');
            const feedbackDiv = e.target.parentNode ? e.target.parentNode.querySelector('.invalid-feedback') : null;
            if (feedbackDiv) {
                feedbackDiv.textContent = '';
            }
        }
    });
    
    // Additional safety check for jQuery if it's being used
    if (typeof $ !== 'undefined') {
        $(document).ready(function() {
            // Initialize price formatting on page load
            const priceInput = $('#price');
            if (priceInput.length && priceInput.val()) {
                priceInput.trigger('input');
            }
            
            // Initialize feature preview
            if (window.updateFeaturePreview) {
                window.updateFeaturePreview();
            }

            // Add delete confirmation
            $('.btn-delete').click(function(e) {
                e.preventDefault();
                if (confirm('Apakah Anda yakin ingin menghapus produk ini?')) {
                    $(this).closest('form').submit();
                }
            });
        });
    }
});