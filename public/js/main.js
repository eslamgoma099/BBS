/**
 * Crypt Theme - Main JavaScript
 */

(function() {
    'use strict';

    // DOM Ready
    document.addEventListener('DOMContentLoaded', function() {
        initSidebarToggle();
        initDropdowns();
        initTooltips();
        initMobileMenu();
        initThemeControls();
        initUtilities();
    });

    /**
     * Initialize Sidebar Toggle
     */
    function initSidebarToggle() {
        const collapseBtn = document.getElementById('sidebar-collapse');
        const mobileToggleBtn = document.getElementById('sidebar-mobile-toggle');
        const sidebar = document.querySelector('.sidebar');
        const wrapper = document.querySelector('.wrapper');

        if (collapseBtn && sidebar) {
            collapseBtn.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');
                if (wrapper) {
                    wrapper.classList.toggle('sidebar-collapsed');
                }
                
                // Store state in localStorage
                const isCollapsed = sidebar.classList.contains('collapsed');
                localStorage.setItem('sidebarCollapsed', isCollapsed);
            });
        }

        if (mobileToggleBtn && sidebar) {
            mobileToggleBtn.addEventListener('click', function() {
                sidebar.classList.toggle('show');
                document.body.classList.toggle('sidebar-open');
            });
        }

        // Restore sidebar state
        const savedState = localStorage.getItem('sidebarCollapsed');
        if (savedState === 'true' && sidebar && wrapper) {
            sidebar.classList.add('collapsed');
            wrapper.classList.add('sidebar-collapsed');
        }

        // Close mobile sidebar on outside click
        document.addEventListener('click', function(e) {
            if (window.innerWidth <= 768) {
                const sidebar = document.querySelector('.sidebar');
                const mobileToggle = document.getElementById('sidebar-mobile-toggle');
                
                if (sidebar && !sidebar.contains(e.target) && !mobileToggle.contains(e.target)) {
                    sidebar.classList.remove('show');
                    document.body.classList.remove('sidebar-open');
                }
            }
        });
    }

    /**
     * Initialize Dropdown Functionality
     */
    function initDropdowns() {
        // Handle custom dropdown toggles
        document.addEventListener('click', function(e) {
            const dropdownTrigger = e.target.closest('[data-bs-toggle="dropdown"]');
            
            if (dropdownTrigger) {
                e.preventDefault();
                const dropdownMenu = dropdownTrigger.nextElementSibling;
                
                if (dropdownMenu && dropdownMenu.classList.contains('dropdown-menu')) {
                    // Close other dropdowns
                    document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                        if (menu !== dropdownMenu) {
                            menu.classList.remove('show');
                        }
                    });
                    
                    // Toggle current dropdown
                    dropdownMenu.classList.toggle('show');
                }
            }
        });

        // Close dropdowns on outside click
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.dropdown')) {
                document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                    menu.classList.remove('show');
                });
            }
        });

        // Handle dropdown item clicks
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('dropdown-item')) {
                // Close dropdown after item click
                const dropdown = e.target.closest('.dropdown-menu');
                if (dropdown) {
                    dropdown.classList.remove('show');
                }
            }
        });
    }

    /**
     * Initialize Tooltips
     */
    function initTooltips() {
        // Initialize Bootstrap tooltips if available
        if (typeof bootstrap !== 'undefined' && bootstrap.Tooltip) {
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        }

        // Custom popover functionality
        const popoverElements = document.querySelectorAll('[data-bs-toggle="popover"]');
        popoverElements.forEach(element => {
            element.addEventListener('mouseenter', function() {
                const content = this.getAttribute('data-bs-content');
                if (content) {
                    showTooltip(this, content);
                }
            });

            element.addEventListener('mouseleave', function() {
                hideTooltip();
            });
        });
    }

    /**
     * Show custom tooltip
     */
    function showTooltip(element, content) {
        hideTooltip(); // Hide any existing tooltip

        const tooltip = document.createElement('div');
        tooltip.className = 'custom-tooltip';
        tooltip.textContent = content;
        tooltip.style.cssText = `
            position: absolute;
            background: var(--crypt-dark-card);
            color: var(--crypt-text);
            padding: 6px 8px;
            border-radius: 4px;
            font-size: 12px;
            border: 1px solid var(--crypt-border);
            z-index: 9999;
            pointer-events: none;
            white-space: nowrap;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        `;

        document.body.appendChild(tooltip);

        const rect = element.getBoundingClientRect();
        tooltip.style.left = rect.left + (rect.width / 2) - (tooltip.offsetWidth / 2) + 'px';
        tooltip.style.top = rect.bottom + 5 + 'px';

        // Store reference for cleanup
        window.currentTooltip = tooltip;
    }

    /**
     * Hide custom tooltip
     */
    function hideTooltip() {
        if (window.currentTooltip) {
            window.currentTooltip.remove();
            window.currentTooltip = null;
        }
    }

    /**
     * Initialize Mobile Menu
     */
    function initMobileMenu() {
        // Handle mobile responsive behavior
        function handleResize() {
            const sidebar = document.querySelector('.sidebar');
            const wrapper = document.querySelector('.wrapper');
            
            if (window.innerWidth > 768) {
                if (sidebar) {
                    sidebar.classList.remove('show');
                }
                if (document.body) {
                    document.body.classList.remove('sidebar-open');
                }
            }
        }

        window.addEventListener('resize', debounce(handleResize, 250));
        handleResize(); // Initial call
    }

    /**
     * Initialize Theme Controls
     */
    function initThemeControls() {
        // Handle dark/light theme toggle if needed
        const themeToggle = document.getElementById('darkMode');
        
        if (themeToggle) {
            themeToggle.addEventListener('click', function() {
                document.body.classList.toggle('crypt-dark');
                document.body.classList.toggle('crypt-light');
                
                // Save theme preference
                const isDark = document.body.classList.contains('crypt-dark');
                localStorage.setItem('theme', isDark ? 'dark' : 'light');
            });
        }

        // Restore theme preference
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            document.body.classList.remove('crypt-dark', 'crypt-light');
            document.body.classList.add(savedTheme === 'dark' ? 'crypt-dark' : 'crypt-light');
        }
    }

    /**
     * Initialize Utility Functions
     */
    function initUtilities() {
        // Copy to clipboard functionality
        window.copyToClipboard = function(text) {
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(text).then(() => {
                    showNotification('Copied to clipboard!', 'success');
                }).catch(() => {
                    fallbackCopyToClipboard(text);
                });
            } else {
                fallbackCopyToClipboard(text);
            }
        };

        // Fallback copy method
        function fallbackCopyToClipboard(text) {
            const textArea = document.createElement('textarea');
            textArea.value = text;
            textArea.style.position = 'fixed';
            textArea.style.left = '-999999px';
            textArea.style.top = '-999999px';
            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();
            
            try {
                document.execCommand('copy');
                showNotification('Copied to clipboard!', 'success');
            } catch (err) {
                showNotification('Failed to copy', 'error');
            }
            
            document.body.removeChild(textArea);
        }

        // Show notification
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `notification notification-${type}`;
            notification.textContent = message;
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: var(--crypt-dark-card);
                color: var(--crypt-text);
                padding: 12px 16px;
                border-radius: 6px;
                border: 1px solid var(--crypt-border);
                z-index: 10000;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
                animation: slideInRight 0.3s ease;
            `;

            if (type === 'success') {
                notification.style.borderColor = 'var(--bs-success)';
            } else if (type === 'error') {
                notification.style.borderColor = 'var(--bs-danger)';
            }

            document.body.appendChild(notification);

            setTimeout(() => {
                notification.style.animation = 'slideOutRight 0.3s ease forwards';
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.parentNode.removeChild(notification);
                    }
                }, 300);
            }, 3000);
        }

        // Add CSS animations
        if (!document.getElementById('notification-styles')) {
            const style = document.createElement('style');
            style.id = 'notification-styles';
            style.textContent = `
                @keyframes slideInRight {
                    from { transform: translateX(100%); opacity: 0; }
                    to { transform: translateX(0); opacity: 1; }
                }
                @keyframes slideOutRight {
                    from { transform: translateX(0); opacity: 1; }
                    to { transform: translateX(100%); opacity: 0; }
                }
            `;
            document.head.appendChild(style);
        }
    }

    /**
     * Debounce function
     */
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    /**
     * Global utility functions
     */
    window.CryptTheme = {
        toggleDropdown: function(dropdownId) {
            const dropdown = document.getElementById(dropdownId + '-dropdown');
            if (dropdown) {
                const menu = dropdown.querySelector('.dropdown-menu');
                if (menu) {
                    // Close other dropdowns
                    document.querySelectorAll('.dropdown-menu').forEach(m => {
                        if (m !== menu) m.classList.remove('show');
                    });
                    menu.classList.toggle('show');
                }
            }
        },

        closeDropdown: function() {
            document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                menu.classList.remove('show');
            });
        },

        showNotification: function(message, type) {
            // Reuse the notification function defined above
            const event = new CustomEvent('showNotification', { 
                detail: { message, type } 
            });
            document.dispatchEvent(event);
        },

        // Theme Toggle Functions
        initThemeToggle: function() {
            const themeToggle = document.getElementById('themeToggle');
            if (!themeToggle) return;
            
            // Get saved theme from localStorage or default to dark
            const savedTheme = localStorage.getItem('crypt-theme') || 'dark';
            
            // Apply saved theme
            this.applyTheme(savedTheme);
            
            // Theme toggle click handler
            themeToggle.addEventListener('click', () => {
                const body = document.body;
                const currentTheme = body.classList.contains('crypt-dark') ? 'dark' : 'light';
                const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
                
                this.applyTheme(newTheme);
                localStorage.setItem('crypt-theme', newTheme);
                
                console.log('Theme switched to:', newTheme);
            });
        },

        // Apply theme to body and html elements
        applyTheme: function(theme) {
            const body = document.body;
            const html = document.documentElement;
            
            if (theme === 'dark') {
                body.classList.remove('crypt-light');
                body.classList.add('crypt-dark');
                html.classList.remove('crypt-light');
                html.classList.add('crypt-dark');
            } else {
                body.classList.remove('crypt-dark');
                body.classList.add('crypt-light');
                html.classList.remove('crypt-dark');
                html.classList.add('crypt-light');
            }
        }
    };

    // Initialize theme toggle on page load
    document.addEventListener('DOMContentLoaded', function() {
        window.CryptTheme.initThemeToggle();
    });

})();