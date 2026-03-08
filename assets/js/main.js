/**
 * Union Arquitetura - Main JavaScript
 *
 * @package Union_Arquitetura
 */

(function() {
    'use strict';

    // DOM Ready
    document.addEventListener('DOMContentLoaded', function() {
        initMobileMenu();
        initSmoothScroll();
        initRevealAnimations();
        initHeaderScroll();
    });

    /**
     * Mobile Menu Toggle
     */
    function initMobileMenu() {
        const menuToggle = document.querySelector('.mobile-menu-toggle');
        const mobileNav = document.querySelector('.mobile-navigation');
        
        if (!menuToggle || !mobileNav) return;

        menuToggle.addEventListener('click', function() {
            const isOpen = mobileNav.getAttribute('aria-hidden') === 'false';
            
            mobileNav.setAttribute('aria-hidden', isOpen ? 'true' : 'false');
            menuToggle.setAttribute('aria-expanded', !isOpen);
            
            if (!isOpen) {
                mobileNav.style.display = 'block';
                document.body.style.overflow = 'hidden';
            } else {
                mobileNav.style.display = 'none';
                document.body.style.overflow = '';
            }
        });

        // Close menu when clicking a link
        const mobileLinks = mobileNav.querySelectorAll('a');
        mobileLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                mobileNav.setAttribute('aria-hidden', 'true');
                mobileNav.style.display = 'none';
                document.body.style.overflow = '';
            });
        });
    }

    /**
     * Smooth Scroll for Anchor Links
     */
    function initSmoothScroll() {
        const anchorLinks = document.querySelectorAll('a[href^="#"]');
        
        anchorLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                
                if (href === '#') return;
                
                const target = document.querySelector(href);
                
                if (target) {
                    e.preventDefault();
                    
                    const headerHeight = document.querySelector('.site-header').offsetHeight;
                    const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    /**
     * Reveal Animations on Scroll
     */
    function initRevealAnimations() {
        const revealElements = document.querySelectorAll('.reveal, .reveal-delayed');
        
        if (!revealElements.length) return;
        
        // Check if Intersection Observer is supported
        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            revealElements.forEach(function(element) {
                observer.observe(element);
            });
        } else {
            // Fallback for older browsers
            revealElements.forEach(function(element) {
                element.classList.add('revealed');
            });
        }
    }

    /**
     * Header Background on Scroll
     */
    function initHeaderScroll() {
        const header = document.querySelector('.site-header');
        
        if (!header) return;

        let lastScrollTop = 0;
        const scrollThreshold = 100;

        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            // Add/remove scrolled class
            if (scrollTop > scrollThreshold) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
            
            // Hide/show header on scroll direction
            if (scrollTop > lastScrollTop && scrollTop > 200) {
                header.classList.add('header-hidden');
            } else {
                header.classList.remove('header-hidden');
            }
            
            lastScrollTop = scrollTop;
        }, { passive: true });
    }

    /**
     * Lazy Loading Images (Native + Fallback)
     */
    function initLazyLoading() {
        const lazyImages = document.querySelectorAll('img[loading="lazy"]');
        
        if ('loading' in HTMLImageElement.prototype) {
            // Native lazy loading supported
            return;
        }
        
        // Fallback for browsers without native support
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });

            lazyImages.forEach(function(img) {
                imageObserver.observe(img);
            });
        }
    }

    /**
     * Form Validation
     */
    function initFormValidation() {
        const forms = document.querySelectorAll('.contact-form');
        
        forms.forEach(function(form) {
            form.addEventListener('submit', function(e) {
                const requiredFields = form.querySelectorAll('[required]');
                let isValid = true;
                
                requiredFields.forEach(function(field) {
                    if (!field.value.trim()) {
                        isValid = false;
                        field.classList.add('error');
                    } else {
                        field.classList.remove('error');
                    }
                    
                    // Email validation
                    if (field.type === 'email' && field.value) {
                        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        if (!emailRegex.test(field.value)) {
                            isValid = false;
                            field.classList.add('error');
                        }
                    }
                });
                
                if (!isValid) {
                    e.preventDefault();
                    // Show error message
                    const errorMsg = form.querySelector('.form-error') || createErrorMessage(form);
                    errorMsg.textContent = 'Por favor, preencha todos os campos obrigatórios corretamente.';
                    errorMsg.style.display = 'block';
                }
            });
        });
    }

    function createErrorMessage(form) {
        const errorDiv = document.createElement('div');
        errorDiv.className = 'form-error';
        errorDiv.style.cssText = 'color: #dc2626; margin-bottom: 1rem; font-size: 0.875rem;';
        form.insertBefore(errorDiv, form.firstChild);
        return errorDiv;
    }

})();
