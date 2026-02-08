/**
 * Navegar Sistemas - Dark Premium Theme
 * @package Navegar_Sistemas
 * @since 6.0.0
 */

(function() {
    'use strict';

    /**
     * Performance Utilities
     */
    function throttle(func, wait) {
        let timeout;
        let lastTime = 0;
        return function executedFunction(...args) {
            const now = Date.now();
            const remaining = wait - (now - lastTime);

            if (remaining <= 0) {
                if (timeout) {
                    clearTimeout(timeout);
                    timeout = null;
                }
                lastTime = now;
                func.apply(this, args);
            } else if (!timeout) {
                timeout = setTimeout(() => {
                    lastTime = Date.now();
                    timeout = null;
                    func.apply(this, args);
                }, remaining);
            }
        };
    }

    /**
     * DOM Elements
     */
    const menuToggle = document.getElementById('menu-toggle');
    const menuContainer = document.getElementById('menu-container');
    const contactForm = document.getElementById('contact-form');
    const header = document.getElementById('site-header');

    /**
     * Initialize all components
     */
    function init() {
        initMobileMenu();
        initSmoothScroll();
        initContactForm();
        initHeaderScroll();
        initScrollSpy();
        initScrollAnimations();
        initCounters();
    }

    /**
     * Mobile Menu
     */
    function initMobileMenu() {
        if (!menuToggle || !menuContainer) return;

        menuToggle.addEventListener('click', toggleMenu);

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && menuContainer.classList.contains('is-open')) {
                closeMenu();
            }
        });

        const menuLinks = menuContainer.querySelectorAll('a[href^="#"]');
        menuLinks.forEach(function(link) {
            link.addEventListener('click', closeMenu);
        });

        document.addEventListener('click', function(e) {
            if (menuContainer.classList.contains('is-open') &&
                !menuContainer.contains(e.target) &&
                !menuToggle.contains(e.target)) {
                closeMenu();
            }
        });
    }

    function toggleMenu() {
        const isOpen = menuToggle.getAttribute('aria-expanded') === 'true';
        if (isOpen) {
            closeMenu();
        } else {
            openMenu();
        }
    }

    function openMenu() {
        menuToggle.setAttribute('aria-expanded', 'true');
        menuToggle.classList.add('is-active');
        menuContainer.classList.add('is-open');
        document.body.style.overflow = 'hidden';
    }

    function closeMenu() {
        menuToggle.setAttribute('aria-expanded', 'false');
        menuToggle.classList.remove('is-active');
        menuContainer.classList.remove('is-open');
        document.body.style.overflow = '';
    }

    /**
     * Smooth Scroll
     */
    function initSmoothScroll() {
        const anchorLinks = document.querySelectorAll('a[href^="#"]');

        anchorLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);

                if (targetElement) {
                    e.preventDefault();
                    const headerHeight = header ? header.offsetHeight : 0;
                    const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - headerHeight;

                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });

                    if (history.pushState) {
                        history.pushState(null, null, targetId);
                    }
                }
            });
        });
    }

    /**
     * Header scroll behavior
     */
    function initHeaderScroll() {
        if (!header) return;

        let lastScroll = 0;
        const scrollThreshold = 10;

        const handleScroll = throttle(() => {
            const currentScroll = window.pageYOffset || document.documentElement.scrollTop;

            if (Math.abs(currentScroll - lastScroll) < scrollThreshold) return;

            if (currentScroll > 100) {
                header.classList.add('is-scrolled');
            } else {
                header.classList.remove('is-scrolled');
            }

            if (currentScroll > lastScroll && currentScroll > 300) {
                header.classList.add('is-hidden');
            } else {
                header.classList.remove('is-hidden');
            }

            lastScroll = currentScroll;
        }, 16);

        window.addEventListener('scroll', handleScroll, { passive: true });
    }

    /**
     * Scroll Spy for Navigation
     */
    function initScrollSpy() {
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('.nav-menu a[href^="#"]');

        if (!sections.length || !navLinks.length) return;

        const observerOptions = {
            root: null,
            rootMargin: '-30% 0px -70% 0px',
            threshold: 0
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const activeId = entry.target.getAttribute('id');

                    navLinks.forEach(link => {
                        link.classList.remove('active');
                        if (link.getAttribute('href') === `#${activeId}`) {
                            link.classList.add('active');
                        }
                    });
                }
            });
        }, observerOptions);

        sections.forEach(section => observer.observe(section));
    }

    /**
     * Scroll Animations
     */
    function initScrollAnimations() {
        const animatedElements = document.querySelectorAll('[data-animate]');

        if (!animatedElements.length) return;

        const observerOptions = {
            root: null,
            rootMargin: '0px 0px -10% 0px',
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const element = entry.target;
                    const delay = element.dataset.delay || 0;

                    setTimeout(() => {
                        element.classList.add('animated');
                    }, parseInt(delay));

                    observer.unobserve(element);
                }
            });
        }, observerOptions);

        animatedElements.forEach(element => observer.observe(element));
    }

    /**
     * Animated Counters
     */
    function initCounters() {
        const counters = document.querySelectorAll('.stat-number[data-count]');

        if (!counters.length) return;

        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.5
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseFloat(counter.dataset.count);
                    const text = counter.textContent;
                    const suffix = text.replace(/[0-9.]/g, '');
                    const duration = 2000;
                    const startTime = performance.now();

                    function updateCounter(currentTime) {
                        const elapsed = currentTime - startTime;
                        const progress = Math.min(elapsed / duration, 1);
                        const easeProgress = 1 - Math.pow(1 - progress, 3); // easeOutCubic
                        const currentValue = Math.floor(target * easeProgress);

                        if (target % 1 !== 0) {
                            counter.textContent = (target * easeProgress).toFixed(1) + suffix;
                        } else {
                            counter.textContent = currentValue + suffix;
                        }

                        if (progress < 1) {
                            requestAnimationFrame(updateCounter);
                        }
                    }

                    requestAnimationFrame(updateCounter);
                    observer.unobserve(counter);
                }
            });
        }, observerOptions);

        counters.forEach(counter => observer.observe(counter));
    }

    /**
     * Contact Form
     */
    function initContactForm() {
        if (!contactForm) return;

        const submitButton = contactForm.querySelector('button[type="submit"]');
        const formMessage = document.getElementById('form-message');

        contactForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            clearFormErrors();

            const isValid = validateForm();
            if (!isValid) return;

            submitButton.disabled = true;
            const originalText = submitButton.innerHTML;
            submitButton.innerHTML = 'Enviando...';

            try {
                const formData = new FormData(contactForm);
                formData.append('action', 'navegar_contact_form');

                const response = await fetch(navegarData.ajaxUrl, {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();

                if (result.success) {
                    showFormMessage(result.data.message || 'Mensagem enviada com sucesso!', 'success');
                    contactForm.reset();
                } else {
                    showFormMessage(result.data?.message || 'Erro ao enviar mensagem.', 'error');
                }
            } catch (error) {
                showFormMessage('Erro ao enviar mensagem. Tente novamente.', 'error');
                console.error('Form submission error:', error);
            } finally {
                submitButton.disabled = false;
                submitButton.innerHTML = originalText;
            }
        });

        const inputs = contactForm.querySelectorAll('input, textarea');
        inputs.forEach(function(input) {
            input.addEventListener('blur', function() {
                validateField(this);
            });
        });
    }

    function validateForm() {
        let isValid = true;
        const inputs = contactForm.querySelectorAll('[required]');

        inputs.forEach(function(input) {
            if (!validateField(input)) {
                isValid = false;
            }
        });

        return isValid;
    }

    function validateField(field) {
        const value = field.value.trim();
        let isValid = true;
        let errorMessage = '';

        clearFieldError(field);

        if (field.hasAttribute('required') && !value) {
            isValid = false;
            errorMessage = 'Este campo é obrigatório';
        }

        if (field.type === 'email' && value && isValid) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(value)) {
                isValid = false;
                errorMessage = 'Por favor, insira um email válido';
            }
        }

        if (field.name === 'name' && value && isValid) {
            if (value.length < 2) {
                isValid = false;
                errorMessage = 'Nome deve ter pelo menos 2 caracteres';
            }
        }

        if (field.tagName === 'TEXTAREA' && value && isValid) {
            if (value.length < 10) {
                isValid = false;
                errorMessage = 'Mensagem deve ter pelo menos 10 caracteres';
            }
        }

        if (!isValid) {
            field.classList.add('has-error');
            showFieldError(field, errorMessage);
        } else if (value) {
            field.classList.remove('has-error');
            field.classList.add('has-success');
        }

        return isValid;
    }

    function showFieldError(field, message) {
        const fieldWrapper = field.closest('.form-group') || field.parentElement;
        let errorEl = fieldWrapper.querySelector('.field-error');

        if (!errorEl) {
            errorEl = document.createElement('span');
            errorEl.className = 'field-error';
            fieldWrapper.appendChild(errorEl);
        }

        errorEl.textContent = message;
        errorEl.style.display = 'block';
    }

    function clearFieldError(field) {
        field.classList.remove('has-error', 'has-success');
        const fieldWrapper = field.closest('.form-group') || field.parentElement;
        const errorEl = fieldWrapper.querySelector('.field-error');
        if (errorEl) {
            errorEl.style.display = 'none';
        }
    }

    function clearFormErrors() {
        const inputs = contactForm.querySelectorAll('input, textarea');
        inputs.forEach(function(input) {
            clearFieldError(input);
        });
        hideFormMessage();
    }

    function showFormMessage(message, type) {
        const formMessage = document.getElementById('form-message');
        if (!formMessage) return;

        formMessage.textContent = message;
        formMessage.className = 'form-message is-visible ' + type;
    }

    function hideFormMessage() {
        const formMessage = document.getElementById('form-message');
        if (!formMessage) return;

        formMessage.textContent = '';
        formMessage.className = 'form-message';
    }

    /**
     * Initialize when DOM is ready
     */
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
