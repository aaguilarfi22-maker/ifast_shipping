<!-- SECTIONS -->
<section class="carousel-container">
    <div class="carousel-slide active">
        <div class="slide-content">
            <button class="explore-btn">EXPLORAR</button>
        </div>
    </div>
    
    <div class="carousel-slide">
        <div class="slide-content">
            <button class="explore-btn">DESCUBRIR</button>
        </div>
    </div>
    
    <div class="carousel-slide">
        <div class="slide-content">
            <button class="explore-btn">COMENZAR</button>
        </div>
    </div>
    
    <div class="carousel-slide">
        <div class="slide-content">
            <button class="explore-btn">COTIZAR</button>
        </div>
    </div>
    
    <div class="carousel-slide">
        <div class="slide-content">
            <button class="explore-btn">CONTACTAR</button>
        </div>
    </div>
    
    <!-- Navegación -->
    <button class="nav-btn prev-btn">❮</button>
    <button class="nav-btn next-btn">❯</button>
    
    <!-- Indicadores -->
    <div class="carousel-indicators">
        <span class="indicator active" data-slide="0"></span>
        <span class="indicator" data-slide="1"></span>
        <span class="indicator" data-slide="2"></span>
        <span class="indicator" data-slide="3"></span>
        <span class="indicator" data-slide="4"></span>
    </div>
</section>

<!-- STYLE -->
<style>
    .carousel-container {
        position: relative;
        width: 100vw;
        height: 100vh;
        overflow: hidden;
        margin: 0;
        padding: 0;
    }

    .carousel-slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.8s ease-in-out;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .carousel-slide.active {
        opacity: 1;
    }

    .carousel-slide:nth-child(1) {
        background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('img/ANUNCIO.png');
        background-size: cover;
        background-position: center;
    }

    .carousel-slide:nth-child(2) {
        background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('img/anuncio_2.png');
        background-size: cover;
        background-position: center;
    }

    .carousel-slide:nth-child(3) {
        background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://images.unsplash.com/photo-1494412574643-ff11b0a5c1c3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
        background-size: cover;
        background-position: center;
    }

    .carousel-slide:nth-child(4) {
        background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://logistica360.pe/wp-content/uploads/2023/11/compras-online.jpg');
        background-size: cover;
        background-position: center;
    }

    .carousel-slide:nth-child(5) {
        background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://www.elementlogic.net/content/uploads/sites/8/2024/10/for-4-main-functions-of-warehouse-1200x649-1.jpg');
        background-size: cover;
        background-position: center;
    }

    .slide-content {
        text-align: center;
        color: white;
        max-width: 900px;
        padding: 0 20px;
        z-index: 2;
    }

    .slide-title {
        font-size: clamp(2.5rem, 6vw, 5rem);
        font-weight: bold;
        margin-bottom: 20px;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        background: linear-gradient(45deg, #ffd700, #ffed4a);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        line-height: 1.2;
        display: none;
    }

    .slide-subtitle {
        font-size: clamp(1.2rem, 3vw, 2rem);
        margin-bottom: 30px;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        opacity: 0.9;
        display: none;
    }

    .explore-btn {
        background: rgba(255, 255, 255, 0.2);
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.8);
        padding: 15px 40px;
        font-size: 1.1rem;
        font-weight: bold;
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .explore-btn:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }

    .nav-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255, 255, 255, 0.2);
        color: white;
        border: none;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        font-size: 1.5rem;
        cursor: pointer;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        z-index: 10;
    }

    .nav-btn:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: translateY(-50%) scale(1.1);
    }

    .prev-btn {
        left: 30px;
    }

    .next-btn {
        right: 30px;
    }

    .carousel-indicators {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 15px;
        z-index: 10;
    }

    .indicator {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.4);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .indicator.active {
        background: #ffd700;
        transform: scale(1.2);
    }

    .indicator:hover {
        background: rgba(255, 255, 255, 0.7);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .nav-btn {
            width: 50px;
            height: 50px;
            font-size: 1.2rem;
        }
        
        .prev-btn {
            left: 20px;
        }
        
        .next-btn {
            right: 20px;
        }
        
        .slide-content {
            padding: 0 30px;
        }
        
        .explore-btn {
            padding: 12px 30px;
            font-size: 1rem;
        }
    }
</style>

<!-- SCRIPT -->
<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.carousel-slide');
    const indicators = document.querySelectorAll('.indicator');
    const totalSlides = slides.length;

    function showSlide(index) {
        // Remover clase active de todos los slides e indicadores
        slides.forEach(slide => slide.classList.remove('active'));
        indicators.forEach(indicator => indicator.classList.remove('active'));
        
        // Añadir clase active al slide e indicador actual
        slides[index].classList.add('active');
        indicators[index].classList.add('active');
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        showSlide(currentSlide);
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        showSlide(currentSlide);
    }

    // Event listeners para los botones de navegación
    document.querySelector('.next-btn').addEventListener('click', nextSlide);
    document.querySelector('.prev-btn').addEventListener('click', prevSlide);

    // Event listeners para los indicadores
    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => {
            currentSlide = index;
            showSlide(currentSlide);
        });
    });

    // Auto-play del carrusel
    setInterval(nextSlide, 5000);

    // Navegación con teclado
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') {
            prevSlide();
        } else if (e.key === 'ArrowRight') {
            nextSlide();
        }
    });
</script>