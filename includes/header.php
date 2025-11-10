 <style>
    /* ================= HEADER Y NAVEGACIÓN ================= */
    .header {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
        background: linear-gradient(135deg, #1a1a2e 0%, #16213e 25%, #0f1419 50%, #1a1a2e 75%, #16213e 100%);
        padding: 1rem 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
    }

    .header.scrolled {
        background: rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 2px 4px rgba(0, 0, 0, 0.06);
        padding: 0.75rem 2rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .header.scrolled .header-nav-links a,
    .header.scrolled .header-menu-toggle span {
        color: #ffcc00 !important;
    }

    .header-logo-container {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1.5rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
    }

    .header-logo-img {
        width: 180px;
        height: auto;
        object-fit: contain;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        opacity: 1;
        transform: scale(1);
    }

    .header-logo-img.header-logo-default {
        position: absolute;
        top: 50%;
        left: 80px;
        transform: translate(-50%, -50%) scale(1);
    }

    .header-logo-img.header-logo-scrolled {
        position: absolute;
        top: 50%;
        left: 80px;
        transform: translate(-50%, -50%) scale(0.9);
        opacity: 0;
    }

    .header.scrolled .header-logo-img.header-logo-default {
        opacity: 0;
        transform: translate(-50%, -50%) scale(0.9);
    }

    .header.scrolled .header-logo-img.header-logo-scrolled {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
    }

    .header-logo-container:hover .header-logo-img {
        transform: translate(-50%, -50%) scale(1.05);
    }

    .header-menu-toggle {
        display: none;
        cursor: pointer;
        padding: 0.75rem;
        background: none;
        border: none;
        outline: none;
        z-index: 1001;
        border-radius: 8px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .header-menu-toggle:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .header-menu-toggle span {
        display: block;
        width: 25px;
        height: 3px;
        background-color: #ffcc00;
        margin: 5px 0;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        transform-origin: center;
        border-radius: 10px;
        border-color: black;
    }

    .header-menu-toggle.active span:nth-child(1) {
        transform: translateY(8px) rotate(45deg);
    }

    .header-menu-toggle.active span:nth-child(2) {
        opacity: 0;
        transform: scale(0);
    }

    .header-menu-toggle.active span:nth-child(3) {
        transform: translateY(-8px) rotate(-45deg);
    }

    .header-nav-links {
        display: flex;
        list-style: none;
        gap: 2rem;
        margin: 0;
        padding: 0;
        align-items: center;
    }

    .header-nav-links a {
        color: #ffffff;
        text-decoration: none;
        font-weight: 500;
        font-size: 1rem;
        padding: 0.75rem 0;
        position: relative;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
    }

    .header-nav-links a::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, #ffcc00, #ffd700);
        transition: all 0.3s ease;
        transform: translateX(-50%);
        border-radius: 2px;
    }

    .header-nav-links a:hover::after {
        width: 100%;
    }

    .header-nav-links a:hover {
        color: #ffcc00;
        transform: translateY(-2px);
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 992px) {
        .header {
            padding: 0.75rem 1.5rem;
        }

        .header-menu-toggle {
            display: block;
        }

        .header-nav-links {
            position: fixed;
            top: 0;
            right: -100%;
            width: 300px;
            height: 100vh;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 25%, #0f1419 50%, #1a1a2e 75%, #16213e 100%);
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 2rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: -10px 0 30px rgba(0, 0, 0, 0.3);
        }

        .header-nav-links.active {
            right: 0;
        }

        .header-nav-links li {
            opacity: 0;
            transform: translateX(50px);
        }

        .header-nav-links.active li {
            animation: slideInRight 0.5s ease forwards;
        }

        .header-nav-links.active li:nth-child(1) { animation-delay: 0.1s; }
        .header-nav-links.active li:nth-child(2) { animation-delay: 0.2s; }
        .header-nav-links.active li:nth-child(3) { animation-delay: 0.3s; }
        .header-nav-links.active li:nth-child(4) { animation-delay: 0.4s; }
        .header-nav-links.active li:nth-child(5) { animation-delay: 0.5s; }
        .header-nav-links.active li:nth-child(6) { animation-delay: 0.6s; }

        .header-nav-links a {
            font-size: 1.2rem;
            padding: 1rem 0;
        }

        .header-logo-img {
            width: 150px;
        }
    }

    @media (max-width: 768px) {
        .header {
            padding: 0.5rem 1rem;
        }

        .header-logo-img {
            width: 130px;
        }

        .header-nav-links {
            width: 280px;
        }

        .header-nav-links a {
            font-size: 1.1rem;
        }
    }

    @keyframes slideInRight {
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
</style>

<!-- HEADER / NAV -->
<header class="header" id="main-header">
    <div class="header-logo-container">
        <a href="/">
            <!-- Logo por defecto (visible inicialmente) -->
            <img src="img/logotipo.png" 
                 alt="Logo IFAST Default" 
                 class="header-logo-img header-logo-default" 
                 width="180" 
                 height="60" 
                 loading="lazy"/>
            
            <!-- Logo para scroll (visible al hacer scroll) -->
            <img src="img/logotipo2.png" 
                 alt="Logo IFAST Scrolled" 
                 class="header-logo-img header-logo-scrolled" 
                 width="180" 
                 height="60" 
                 loading="lazy"/>
        </a>
    </div>

    <button class="header-menu-toggle" id="header-menu-toggle" aria-label="Menú principal">
        <span></span>
        <span></span>
        <span></span>
    </button>
    
    <nav aria-label="Navegación principal">
        <ul class="header-nav-links" id="header-nav-links">
            <li><a href="#servicios">Servicios</a></li>
            <li><a href="#nosotros">Nosotros</a></li>
            <li><a href="#tiendas">Tiendas</a></li>
            <li><a href="#modalidades">Modalidades</a></li>
            <li><a href="#tarifas-section">Tarifas</a></li>
            <li><a href="#faq_ventana" onclick="abrirVentanaFAQ();return false;">F.A.Q</a></li>
        </ul>
    </nav>
</header>

<script>
    // ======== ELEMENTOS DEL DOM ========
    const DOM = {
        header: document.getElementById('main-header'),
        menuToggle: document.getElementById('header-menu-toggle'),
        navLinks: document.getElementById('header-nav-links')
    };

    // ======== FUNCIONES UTILITARIAS ========
    const utils = {
        debounce: (func, wait) => {
            let timeout;
            return function() {
                const context = this, args = arguments;
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(context, args), wait);
            };
        },
        
        toggleElement: (element, className) => {
            element.classList.toggle(className);
        },
        
        closeElement: (element, className) => {
            element.classList.remove(className);
        }
    };

    // ======== EFECTO SCROLL HEADER ========
    const initScrollEffect = () => {
        const handleScroll = utils.debounce(() => {
            const scrolled = window.pageYOffset > 50;
            
            if (scrolled) {
                DOM.header.classList.add('scrolled');
            } else {
                DOM.header.classList.remove('scrolled');
            }
        }, 10);

        window.addEventListener('scroll', handleScroll);
    };

    // ======== MENÚ TOGGLE ========
    const initMenu = () => {
        DOM.menuToggle.addEventListener("click", (e) => {
            e.preventDefault();
            utils.toggleElement(DOM.navLinks, "active");
            utils.toggleElement(DOM.menuToggle, "active");
        });

        // Cerrar menú al hacer clic en enlaces
        document.querySelectorAll(".header-nav-links a").forEach(link => {
            link.addEventListener("click", () => {
                if (window.innerWidth <= 992 && DOM.navLinks.classList.contains("active")) {
                    utils.closeElement(DOM.navLinks, "active");
                    utils.closeElement(DOM.menuToggle, "active");
                }
            });
        });

        // Cerrar menú al hacer clic fuera
        document.addEventListener('click', (e) => {
            if (!DOM.header.contains(e.target) && DOM.navLinks.classList.contains('active')) {
                utils.closeElement(DOM.navLinks, "active");
                utils.closeElement(DOM.menuToggle, "active");
            }
        });

        // Cerrar menú al redimensionar ventana
        window.addEventListener('resize', () => {
            if (window.innerWidth > 992) {
                utils.closeElement(DOM.navLinks, "active");
                utils.closeElement(DOM.menuToggle, "active");
            }
        });
    };

    // ======== SMOOTH SCROLL ========
    const initSmoothScroll = () => {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    };

    // ======== FUNCIÓN FAQ (PLACEHOLDER) ========
    function abrirVentanaFAQ() {
        console.log('Abriendo ventana FAQ...');
        // Aquí iría tu lógica para abrir la ventana FAQ
    }

    // ======== INICIALIZACIÓN ========
    document.addEventListener('DOMContentLoaded', () => {
        initScrollEffect();
        initMenu();
        initSmoothScroll();
    });
</script>