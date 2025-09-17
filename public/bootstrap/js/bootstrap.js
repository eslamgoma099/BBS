/*!
 * Bootstrap v5.3.0 (https://getbootstrap.com/)
 * Crypt Theme Custom Bootstrap Build - Essential Components Only
 */

(function (global, factory) {
  typeof exports === 'object' && typeof module !== 'undefined' ? factory(exports) :
  typeof define === 'function' && define.amd ? define(['exports'], factory) :
  (global = typeof globalThis !== 'undefined' ? globalThis : global || self, factory(global.bootstrap = {}));
})(this, (function (exports) { 'use strict';

  /**
   * Bootstrap Dropdown
   */
  class Dropdown {
    constructor(element, config = {}) {
      this._element = element;
      this._config = config;
      this._menu = this._getMenuElement();
      this._inNavbar = this._detectNavbar();
      
      this._addEventListeners();
    }

    static get VERSION() {
      return '5.3.0';
    }

    static get Default() {
      return {
        offset: [0, 2],
        boundary: 'clippingParents',
        reference: 'toggle',
        display: 'dynamic',
        popperConfig: null,
        autoClose: true
      };
    }

    toggle() {
      return this._isShown() ? this.hide() : this.show();
    }

    show() {
      if (this._isShown()) {
        return;
      }

      const relatedTarget = {
        relatedTarget: this._element
      };

      const showEvent = new CustomEvent('show.bs.dropdown', {
        bubbles: true,
        cancelable: true,
        detail: relatedTarget
      });

      this._element.dispatchEvent(showEvent);

      if (showEvent.defaultPrevented) {
        return;
      }

      this._createPopper();

      // Hide other dropdowns
      const dropdowns = document.querySelectorAll('.dropdown-menu.show');
      dropdowns.forEach(dropdown => {
        if (dropdown !== this._menu) {
          dropdown.classList.remove('show');
        }
      });

      this._menu.classList.add('show');
      this._element.setAttribute('aria-expanded', true);

      const shownEvent = new CustomEvent('shown.bs.dropdown', {
        bubbles: true,
        detail: relatedTarget
      });
      this._element.dispatchEvent(shownEvent);
    }

    hide() {
      if (!this._isShown()) {
        return;
      }

      const relatedTarget = {
        relatedTarget: this._element
      };

      this._completeHide(relatedTarget);
    }

    dispose() {
      if (this._element) {
        this._element.removeEventListener('click', this._clickHandler);
      }
      
      document.removeEventListener('click', this._documentClickHandler);
    }

    update() {
      this._inNavbar = this._detectNavbar();
    }

    _completeHide(relatedTarget) {
      const hideEvent = new CustomEvent('hide.bs.dropdown', {
        bubbles: true,
        cancelable: true,
        detail: relatedTarget
      });

      this._element.dispatchEvent(hideEvent);

      if (hideEvent.defaultPrevented) {
        return;
      }

      this._menu.classList.remove('show');
      this._element.setAttribute('aria-expanded', false);

      const hiddenEvent = new CustomEvent('hidden.bs.dropdown', {
        bubbles: true,
        detail: relatedTarget
      });
      this._element.dispatchEvent(hiddenEvent);
    }

    _getMenuElement() {
      const sibling = this._element.nextElementSibling;
      return sibling && sibling.classList.contains('dropdown-menu') ? sibling : 
             this._element.querySelector('.dropdown-menu');
    }

    _isShown() {
      return this._menu && this._menu.classList.contains('show');
    }

    _detectNavbar() {
      return this._element.closest('.navbar') !== null;
    }

    _createPopper() {
      // Simple positioning - you can enhance this with Popper.js if needed
      if (this._menu) {
        const rect = this._element.getBoundingClientRect();
        const menuRect = this._menu.getBoundingClientRect();
        
        // Check if dropdown would go off-screen
        if (rect.bottom + menuRect.height > window.innerHeight) {
          this._menu.style.top = 'auto';
          this._menu.style.bottom = '100%';
        } else {
          this._menu.style.top = '100%';
          this._menu.style.bottom = 'auto';
        }
      }
    }

    _addEventListeners() {
      this._clickHandler = (e) => {
        e.preventDefault();
        e.stopPropagation();
        this.toggle();
      };

      this._documentClickHandler = (e) => {
        if (!this._element.contains(e.target) && !this._menu.contains(e.target)) {
          this.hide();
        }
      };

      this._element.addEventListener('click', this._clickHandler);
      document.addEventListener('click', this._documentClickHandler);
    }

    static jQueryInterface(config) {
      return this.each(function () {
        const data = Dropdown.getOrCreateInstance(this, config);

        if (typeof config === 'string') {
          if (typeof data[config] === 'undefined') {
            throw new TypeError(`No method named "${config}"`);
          }

          data[config]();
        }
      });
    }

    static getOrCreateInstance(element, config = {}) {
      let instance = element._bsDropdown;
      
      if (!instance) {
        instance = new Dropdown(element, config);
        element._bsDropdown = instance;
      }

      return instance;
    }
  }

  /**
   * Bootstrap Modal (Simplified)
   */
  class Modal {
    constructor(element, config = {}) {
      this._element = element;
      this._config = config;
      this._backdrop = null;
      this._isShown = false;
      
      this._addEventListeners();
    }

    static get Default() {
      return {
        backdrop: true,
        keyboard: true,
        focus: true
      };
    }

    toggle(relatedTarget) {
      return this._isShown ? this.hide() : this.show(relatedTarget);
    }

    show(relatedTarget) {
      if (this._isShown) {
        return;
      }

      const showEvent = new CustomEvent('show.bs.modal', {
        bubbles: true,
        cancelable: true,
        detail: { relatedTarget }
      });

      this._element.dispatchEvent(showEvent);

      if (showEvent.defaultPrevented) {
        return;
      }

      this._isShown = true;

      this._checkScrollbar();
      this._setScrollbar();

      document.body.classList.add('modal-open');

      this._setEscapeEvent();
      this._resize();

      if (this._config.backdrop) {
        this._showBackdrop(() => this._showElement(relatedTarget));
      } else {
        this._showElement(relatedTarget);
      }
    }

    hide() {
      if (!this._isShown) {
        return;
      }

      const hideEvent = new CustomEvent('hide.bs.modal', {
        bubbles: true,
        cancelable: true
      });

      this._element.dispatchEvent(hideEvent);

      if (hideEvent.defaultPrevented) {
        return;
      }

      this._isShown = false;
      this._element.style.display = 'none';
      this._element.setAttribute('aria-hidden', true);
      this._element.removeAttribute('aria-modal');
      this._element.removeAttribute('role');

      document.body.classList.remove('modal-open');
      this._resetScrollbar();

      if (this._backdrop) {
        this._backdrop.remove();
        this._backdrop = null;
      }

      const hiddenEvent = new CustomEvent('hidden.bs.modal', {
        bubbles: true
      });
      this._element.dispatchEvent(hiddenEvent);
    }

    _showElement(relatedTarget) {
      this._element.style.display = 'block';
      this._element.removeAttribute('aria-hidden');
      this._element.setAttribute('aria-modal', true);
      this._element.setAttribute('role', 'dialog');

      if (this._config.focus) {
        this._enforceFocus();
      }

      const shownEvent = new CustomEvent('shown.bs.modal', {
        bubbles: true,
        detail: { relatedTarget }
      });
      this._element.dispatchEvent(shownEvent);
    }

    _showBackdrop(callback) {
      const backdrop = document.createElement('div');
      backdrop.className = 'modal-backdrop fade show';
      document.body.appendChild(backdrop);
      
      this._backdrop = backdrop;
      
      backdrop.addEventListener('click', () => {
        if (this._config.backdrop === 'static') {
          return;
        }
        this.hide();
      });

      if (callback) {
        callback();
      }
    }

    _setEscapeEvent() {
      if (this._isShown && this._config.keyboard) {
        this._escapeHandler = (e) => {
          if (e.key === 'Escape') {
            this.hide();
          }
        };
        document.addEventListener('keydown', this._escapeHandler);
      } else if (this._escapeHandler) {
        document.removeEventListener('keydown', this._escapeHandler);
        this._escapeHandler = null;
      }
    }

    _resize() {
      // Handle resize if needed
    }

    _enforceFocus() {
      this._focusHandler = (e) => {
        if (document !== e.target && this._element !== e.target && !this._element.contains(e.target)) {
          this._element.focus();
        }
      };
      document.addEventListener('focusin', this._focusHandler);
    }

    _checkScrollbar() {
      const rect = document.body.getBoundingClientRect();
      this._isBodyOverflowing = Math.round(rect.left + rect.right) < window.innerWidth;
      this._scrollbarWidth = this._getScrollbarWidth();
    }

    _setScrollbar() {
      if (this._isBodyOverflowing) {
        document.body.style.paddingRight = `${this._scrollbarWidth}px`;
      }
    }

    _resetScrollbar() {
      document.body.style.paddingRight = '';
    }

    _getScrollbarWidth() {
      const scrollDiv = document.createElement('div');
      scrollDiv.className = 'modal-scrollbar-measure';
      document.body.appendChild(scrollDiv);
      const scrollbarWidth = scrollDiv.getBoundingClientRect().width - scrollDiv.clientWidth;
      document.body.removeChild(scrollDiv);
      return scrollbarWidth;
    }

    _addEventListeners() {
      // Add close button listeners
      const closeButtons = this._element.querySelectorAll('[data-bs-dismiss="modal"]');
      closeButtons.forEach(button => {
        button.addEventListener('click', () => this.hide());
      });
    }

    static getOrCreateInstance(element, config = {}) {
      let instance = element._bsModal;
      
      if (!instance) {
        instance = new Modal(element, config);
        element._bsModal = instance;
      }

      return instance;
    }
  }

  /**
   * Bootstrap Tooltip (Simplified)
   */
  class Tooltip {
    constructor(element, config = {}) {
      this._element = element;
      this._config = config;
      this._tooltip = null;
      this._title = this._getTitle();
      
      this._addEventListeners();
    }

    static get Default() {
      return {
        animation: true,
        template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
        trigger: 'hover focus',
        title: '',
        delay: 0,
        html: false,
        selector: false,
        placement: 'top',
        offset: [0, 0],
        container: false,
        fallbackPlacements: ['top', 'right', 'bottom', 'left'],
        boundary: 'clippingParents',
        customClass: '',
        sanitize: true,
        sanitizeFn: null,
        allowList: {
          '*': ['class', 'dir', 'id', 'lang', 'role'],
          a: ['target', 'href', 'title', 'rel'],
          area: [],
          b: [],
          br: [],
          col: [],
          code: [],
          div: [],
          em: [],
          hr: [],
          h1: [],
          h2: [],
          h3: [],
          h4: [],
          h5: [],
          h6: [],
          i: [],
          img: ['src', 'srcset', 'alt', 'title', 'width', 'height'],
          li: [],
          ol: [],
          p: [],
          pre: [],
          s: [],
          small: [],
          span: [],
          sub: [],
          sup: [],
          strong: [],
          u: [],
          ul: []
        },
        popperConfig: null
      };
    }

    enable() {
      this._enabled = true;
    }

    disable() {
      this._enabled = false;
    }

    toggleEnabled() {
      this._enabled = !this._enabled;
    }

    toggle() {
      if (!this._enabled) {
        return;
      }

      if (this._tooltip) {
        this.hide();
      } else {
        this.show();
      }
    }

    dispose() {
      if (this._tooltip) {
        this.hide();
      }
      
      this._element.removeEventListener('mouseenter', this._mouseenterHandler);
      this._element.removeEventListener('mouseleave', this._mouseleaveHandler);
      this._element.removeEventListener('focus', this._focusHandler);
      this._element.removeEventListener('blur', this._blurHandler);
    }

    show() {
      if (!this._title || this._tooltip) {
        return;
      }

      const tooltip = this._createTooltip();
      this._tooltip = tooltip;

      document.body.appendChild(tooltip);

      this._updatePosition();

      tooltip.classList.add('show');

      const showEvent = new CustomEvent('shown.bs.tooltip', {
        bubbles: true
      });
      this._element.dispatchEvent(showEvent);
    }

    hide() {
      if (!this._tooltip) {
        return;
      }

      this._tooltip.classList.remove('show');

      setTimeout(() => {
        if (this._tooltip) {
          this._tooltip.remove();
          this._tooltip = null;
        }
      }, 150);

      const hideEvent = new CustomEvent('hidden.bs.tooltip', {
        bubbles: true
      });
      this._element.dispatchEvent(hideEvent);
    }

    _createTooltip() {
      const tooltip = document.createElement('div');
      tooltip.className = 'tooltip';
      tooltip.setAttribute('role', 'tooltip');
      
      const arrow = document.createElement('div');
      arrow.className = 'tooltip-arrow';
      
      const inner = document.createElement('div');
      inner.className = 'tooltip-inner';
      inner.textContent = this._title;
      
      tooltip.appendChild(arrow);
      tooltip.appendChild(inner);
      
      return tooltip;
    }

    _getTitle() {
      return this._element.getAttribute('data-bs-original-title') ||
             this._element.getAttribute('title') ||
             this._config.title;
    }

    _updatePosition() {
      if (!this._tooltip) {
        return;
      }

      const elementRect = this._element.getBoundingClientRect();
      const tooltipRect = this._tooltip.getBoundingClientRect();

      let top = elementRect.top - tooltipRect.height - 5;
      let left = elementRect.left + (elementRect.width / 2) - (tooltipRect.width / 2);

      // Adjust if tooltip goes off screen
      if (left < 0) {
        left = 5;
      } else if (left + tooltipRect.width > window.innerWidth) {
        left = window.innerWidth - tooltipRect.width - 5;
      }

      if (top < 0) {
        top = elementRect.bottom + 5;
        this._tooltip.classList.add('bs-tooltip-bottom');
      } else {
        this._tooltip.classList.add('bs-tooltip-top');
      }

      this._tooltip.style.position = 'absolute';
      this._tooltip.style.top = `${top + window.scrollY}px`;
      this._tooltip.style.left = `${left + window.scrollX}px`;
    }

    _addEventListeners() {
      this._mouseenterHandler = () => this.show();
      this._mouseleaveHandler = () => this.hide();
      this._focusHandler = () => this.show();
      this._blurHandler = () => this.hide();

      this._element.addEventListener('mouseenter', this._mouseenterHandler);
      this._element.addEventListener('mouseleave', this._mouseleaveHandler);
      this._element.addEventListener('focus', this._focusHandler);
      this._element.addEventListener('blur', this._blurHandler);
    }

    static getOrCreateInstance(element, config = {}) {
      let instance = element._bsTooltip;
      
      if (!instance) {
        instance = new Tooltip(element, config);
        element._bsTooltip = instance;
      }

      return instance;
    }
  }

  // Auto-initialization
  document.addEventListener('DOMContentLoaded', function() {
    // Initialize dropdowns
    const dropdownElements = document.querySelectorAll('[data-bs-toggle="dropdown"]');
    dropdownElements.forEach(element => {
      new Dropdown(element);
    });

    // Initialize modals
    const modalElements = document.querySelectorAll('.modal');
    modalElements.forEach(element => {
      new Modal(element);
    });

    // Initialize modal triggers
    const modalTriggers = document.querySelectorAll('[data-bs-toggle="modal"]');
    modalTriggers.forEach(trigger => {
      trigger.addEventListener('click', function(e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('data-bs-target') || this.getAttribute('href'));
        if (target) {
          const modal = Modal.getOrCreateInstance(target);
          modal.show(this);
        }
      });
    });

    // Initialize tooltips
    const tooltipElements = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    tooltipElements.forEach(element => {
      new Tooltip(element);
    });
  });

  // Export components
  exports.Dropdown = Dropdown;
  exports.Modal = Modal;
  exports.Tooltip = Tooltip;

  // Create global bootstrap object
  if (typeof window !== 'undefined') {
    window.bootstrap = exports;
  }

}));