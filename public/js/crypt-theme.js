// منع الشاشة السوداء فوراً
(function() {
    'use strict';

    // Force visibility immediately
    document.documentElement.style.visibility = 'visible';
    document.documentElement.style.opacity = '1';

    if (document.body) {
        document.body.style.visibility = 'visible';
        document.body.style.opacity = '1';
        document.body.style.display = 'block';
    }

    // Force app container visibility
    const appSecret = document.getElementById('app_secret');
    if (appSecret) {
        appSecret.style.visibility = 'visible';
        appSecret.style.opacity = '1';
        appSecret.style.display = 'block';
    }
})();

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    console.log('DOM loaded - fixing layout...');

    // Remove any loading screens immediately
    const loadingElements = document.querySelectorAll('.loading, .loader, .spinner, .overlay, .loading-overlay, .modal-backdrop');
    loadingElements.forEach(el => {
        el.style.display = 'none';
        el.remove();
    });

    // Ensure layout components are visible
    const sidebar = document.querySelector('.new-crypt-sidebar');
    const header = document.querySelector('.new-crypt-header');
    const main = document.querySelector('main');
    const appSecret = document.getElementById('app_secret');

    if (sidebar) {
        sidebar.style.display = 'block';
        sidebar.style.visibility = 'visible';
        sidebar.style.opacity = '1';
        console.log('Sidebar fixed');
    }

    if (header) {
        header.style.display = 'flex';
        header.style.visibility = 'visible';
        header.style.opacity = '1';
        console.log('Header fixed');
    }

    if (main) {
        main.style.display = 'block';
        main.style.visibility = 'visible';
        main.style.opacity = '1';
        main.style.marginLeft = '280px';
        main.style.marginTop = '70px';
        console.log('Main content fixed');
    }

    if (appSecret) {
        appSecret.style.display = 'block';
        appSecret.style.visibility = 'visible';
        appSecret.style.opacity = '1';
        console.log('App container fixed');
    }

    // Initialize components
    initializeSidebar();
    initializeTheme();
    initializeDropdowns();

    console.log('Layout initialization complete');
});

// Sidebar functionality
function initializeSidebar() {
    const sidebarToggle = document.getElementById('sidebar-mobile-toggle');
    const sidebar = document.querySelector('.new-crypt-sidebar');

    if (sidebarToggle && sidebar) {
        sidebarToggle.addEventListener('click', function(e) {
            e.preventDefault();
            sidebar.classList.toggle('active');
            console.log('Sidebar toggled');
        });
    }

    // Close sidebar on outside click (mobile)
    document.addEventListener('click', function(e) {
        if (window.innerWidth <= 991 && sidebar && sidebarToggle &&
            !sidebar.contains(e.target) &&
            !sidebarToggle.contains(e.target) &&
            sidebar.classList.contains('active')) {
            sidebar.classList.remove('active');
        }
    });
}

// Theme functionality
function initializeTheme() {
    const themeToggle = document.getElementById('darkMode');

    if (themeToggle) {
        themeToggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();

            document.body.classList.toggle('crypt-dark');
            const isDark = document.body.classList.contains('crypt-dark');

            if (isDark) {
                document.body.style.backgroundColor = '#1a1d29';
            } else {
                document.body.style.backgroundColor = '#ffffff';
            }

            localStorage.setItem('theme', isDark ? 'dark' : 'light');
            console.log('Theme toggled to:', isDark ? 'dark' : 'light');
        });
    }

    // Load saved theme
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
        document.body.classList.add('crypt-dark');
        document.body.style.backgroundColor = '#1a1d29';
    } else {
        document.body.classList.remove('crypt-dark');
        document.body.style.backgroundColor = '#ffffff';
    }
}

// Dropdown functionality
function initializeDropdowns() {
    let activeDropdown = null;

    // Global dropdown functions
    window.toggleDropdown = function(dropdownId) {
        const dropdown = document.getElementById(dropdownId + '-dropdown');
        if (!dropdown) {
            console.error('Dropdown not found:', dropdownId);
            return;
        }

        if (activeDropdown === dropdownId) {
            closeAllDropdowns();
        } else {
            closeAllDropdowns();
            dropdown.classList.add('active');
            activeDropdown = dropdownId;
            console.log('Dropdown opened:', dropdownId);
        }
    };

    window.closeDropdown = function() {
        closeAllDropdowns();
    };

    window.closeAllDropdowns = function() {
        document.querySelectorAll('.header-dropdown.active').forEach(dropdown => {
            dropdown.classList.remove('active');
        });
        activeDropdown = null;
    };

    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        if (activeDropdown && !e.target.closest('.header-dropdown')) {
            closeAllDropdowns();
        }
    });

    // Handle escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && activeDropdown) {
            closeAllDropdowns();
        }
    });
}

// Copy to clipboard functionality
window.copyToClipboard = function(text) {
    if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(text).then(function() {
            console.log('Copied: ' + text);
        }).catch(function(err) {
            console.error('Could not copy text: ', err);
        });
    }
};

// Handle JavaScript errors gracefully
window.addEventListener('error', function(e) {
    console.warn('JS Error caught:', e.error);
    // Ensure visibility even on error
    document.body.style.visibility = 'visible';
    document.body.style.opacity = '1';
    return true;
});

// Final safety check on window load
window.addEventListener('load', function() {
    setTimeout(function() {
        // Final verification
        document.body.style.visibility = 'visible';
        document.body.style.opacity = '1';

        const appSecret = document.getElementById('app_secret');
        if (appSecret) {
            appSecret.style.visibility = 'visible';
            appSecret.style.opacity = '1';
        }

        // Apply saved theme
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'dark') {
            document.body.style.backgroundColor = '#1a1d29';
        } else {
            document.body.style.backgroundColor = '#ffffff';
        }

        console.log('Final layout check complete');
    }, 100);
});

// Emergency visibility fix (runs every 2 seconds for first 10 seconds)
let emergencyCheck = 0;
const emergencyInterval = setInterval(function() {
    emergencyCheck++;

    if (document.body.style.visibility !== 'visible' ||
        document.body.style.opacity !== '1') {

        document.body.style.visibility = 'visible';
        document.body.style.opacity = '1';
        document.body.style.display = 'block';

        console.log('Emergency visibility fix applied');
    }

    if (emergencyCheck >= 5) { // Stop after 10 seconds
        clearInterval(emergencyInterval);
    }
}, 2000);
