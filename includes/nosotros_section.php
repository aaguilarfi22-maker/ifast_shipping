<!-- NOSOTROS -->
<section id="nosotros" class="nosotros-section">
    <!-- Partículas flotantes -->
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    
    <div class="nosotros-container">
        <!-- Texto a la izquierda -->
        <div class="nosotros-texto">
            <h2 style="color: #162e44;">Conoce sobre nosotros</h2>
            <p style="color: #162e44;">
                Somos una agencia de carga que brinda todos los servicios logísticos de fletes y transportes para embarques hacia Perú.
                Llevamos a trabajar con una filosofía de excelencia en el servicio y con un sistema de planeamiento y capacidad operativa
                para obtener decisiones puntuales en todas las operaciones de comercio internacional.
            </p>
            <a href="docs/brochure_ifast.pdf" class="btn-linea" download>
                <i class="fas fa-download" style="margin-right: 8px;"></i>
                Conoce más de nosotros
            </a>
        </div>

        <!-- Imagen a la derecha -->
        <div class="nosotros-img">
            <img src="img/ANUNCIO.png" alt="Avión transporte" />
        </div>
    </div>
</section>

<style>
/* Sección Nosotros */
.nosotros-section {
    width: 100%;
    min-height: 50vh;
    padding: 80px 0;
    background: linear-gradient(135deg,rgb(255, 255, 255) 0%,rgb(255, 255, 255) 25%,rgb(165, 165, 165) 50%,rgb(255, 255, 255) 75%, #16213e 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

/* Animación de fondo flotante */
.nosotros-section::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
    background-size: 50px 50px;
    animation: float-pattern 20s linear infinite;
    z-index: 1;
}

@keyframes float-pattern {
    0% { transform: translateX(-50px) translateY(-50px); }
    100% { transform: translateX(0) translateY(0); }
}

.nosotros-container {
    max-width: 1200px;
    width: 100%;
    padding: 0 20px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
    position: relative;
    z-index: 2;
}

/* Texto lado izquierdo */
.nosotros-texto {
    opacity: 0;
    transform: translateX(-100px);
    animation: slideInLeft 1s ease-out 0.3s forwards;
}

.nosotros-texto h2 {
    font-size: 2.8rem;
    font-weight: 700;
    color: #162e44 !important;
    margin-bottom: 25px;
    line-height: 1.2;
    opacity: 0;
    transform: translateY(-30px);
    animation: fadeInUp 0.8s ease-out 0.6s forwards;
    position: relative;
}

/* Efecto de subrayado animado */
.nosotros-texto h2::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 0;
    width: 0;
    height: 4px;
    background: linear-gradient(90deg, #FFD700, #FFA500);
    border-radius: 2px;
    animation: expandLine 1s ease-out 1.2s forwards;
}

@keyframes expandLine {
    to { width: 60%; }
}

.nosotros-texto p {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #162e44 !important;
    margin-bottom: 35px;
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 0.8s ease-out 0.9s forwards;
}

/* Botón con animación */
.btn-linea {
    display: inline-flex;
    align-items: center;
    padding: 15px 30px;
    background: linear-gradient(45deg, #FFD700, #FFA500);
    color: #162e44;
    text-decoration: none;
    border-radius: 50px;
    font-weight: 600;
    font-size: 1rem;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(255, 215, 0, 0.3);
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 0.8s ease-out 1.2s forwards;
    position: relative;
    overflow: hidden;
}

.btn-linea::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.5s ease;
}

.btn-linea:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(255, 215, 0, 0.5);
}

.btn-linea:hover::before {
    left: 100%;
}

.btn-linea i {
    margin-right: 8px;
    animation: bounce 2s ease-in-out infinite;
}

@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-3px); }
}

/* Imagen lado derecho */
.nosotros-img {
    position: relative;
    opacity: 0;
    transform: translateX(100px);
    animation: slideInRight 1s ease-out 0.6s forwards;
}

.nosotros-img::before {
    content: '';
    position: absolute;
    top: -20px;
    left: -20px;
    right: -20px;
    bottom: -20px;
    background: linear-gradient(45deg, #FFD700, #FFA500, #FFD700);
    border-radius: 20px;
    z-index: -1;
    animation: rotate 10s linear infinite;
}

@keyframes rotate {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.nosotros-img img {
    width: 100%;
    height: auto;
    border-radius: 15px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease;
    animation: float 3s ease-in-out infinite;
}

.nosotros-img:hover img {
    transform: scale(1.05);
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

/* Animaciones principales */
@keyframes slideInLeft {
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideInRight {
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Partículas flotantes */
.particle {
    position: absolute;
    background: rgba(255, 215, 0, 0.6);
    border-radius: 50%;
    animation: floatParticle 8s ease-in-out infinite;
}

.particle:nth-child(1) {
    width: 8px;
    height: 8px;
    top: 20%;
    left: 10%;
    animation-delay: -2s;
}

.particle:nth-child(2) {
    width: 12px;
    height: 12px;
    top: 60%;
    left: 80%;
    animation-delay: -4s;
}

.particle:nth-child(3) {
    width: 6px;
    height: 6px;
    top: 80%;
    left: 20%;
    animation-delay: -6s;
}

@keyframes floatParticle {
    0%, 100% {
        transform: translateY(0px) rotate(0deg);
        opacity: 0.5;
    }
    50% {
        transform: translateY(-20px) rotate(180deg);
        opacity: 1;
    }
}

/* Responsive */
@media (max-width: 768px) {
    .nosotros-container {
        grid-template-columns: 1fr;
        gap: 40px;
        text-align: center;
    }

    .nosotros-texto {
        order: 2;
    }

    .nosotros-img {
        order: 1;
    }

    .nosotros-texto h2 {
        font-size: 2.2rem;
    }

    .nosotros-texto p {
        font-size: 1rem;
    }

    .btn-linea {
        padding: 12px 25px;
        font-size: 0.9rem;
    }
}

@media (max-width: 480px) {
    .nosotros-section {
        padding: 60px 0;
    }

    .nosotros-container {
        padding: 0 15px;
    }

    .nosotros-texto h2 {
        font-size: 1.8rem;
    }

    .nosotros-texto p {
        font-size: 0.9rem;
    }
}
</style>