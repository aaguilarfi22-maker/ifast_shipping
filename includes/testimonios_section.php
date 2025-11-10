<style>
.testimonials-section {
    padding: 60px 0;
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
}

.testimonials-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.testimonials-header {
    text-align: center;
    margin-bottom: 50px;
}

.testimonials-header h2 {
    font-size: 2.5rem;
    color: #2c3e50;
    margin-bottom: 15px;
    position: relative;
}

.testimonials-header h2::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 3px;
    background: linear-gradient(45deg, #ffcc00, #ffa500);
    border-radius: 2px;
}

.testimonials-header p {
    font-size: 1.1rem;
    color: #7f8c8d;
    max-width: 600px;
    margin: 0 auto;
}

/* Botón flotante que redirige al formulario */
.testimonios_btn {
    background: linear-gradient(45deg, #ffcc00, #ffa500);
    color: white;
    border: none;
    padding: 12px 30px;
    font-size: 1rem;
    border-radius: 25px;
    cursor: pointer;
    margin-bottom: 40px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
    display: block;
    margin-left: auto;
    margin-right: auto;
}

.testimonios_btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(52, 152, 219, 0.4);
}

.testimonials-carousel {
    position: relative;
    overflow: hidden;
    margin-top: 40px;
}

.testimonials-track {
    display: flex;
    transition: transform 0.5s ease;
    gap: 30px;
}

.testimonial-card {
    background: white;
    border-radius: 15px;
    padding: 25px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    position: relative;
    border-left: 4px solid #ffcc00;
    min-width: 320px;
    flex-shrink: 0;
}

.testimonial-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

.testimonial-rating {
    display: flex;
    margin-bottom: 15px;
}


.star {
    color: #ffcc00;
    font-size: 1.2rem;
    margin-right: 2px;
}

.star.empty {
    color: #ddd;
}

.testimonial-comment {
    font-size: 1rem;
    line-height: 1.6;
    color: #2c3e50;
    margin-bottom: 20px;
    font-style: italic;
    position: relative;
}

.testimonial-comment::before {
    content: '"';
    font-size: 3rem;
    color: #ffcc00;
    position: absolute;
    top: -10px;
    left: -15px;
    opacity: 0.3;
}

.testimonial-author {
    display: flex;
    align-items: center;
    margin-top: 20px;
}

.author-avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: linear-gradient(135deg, #ffcc00, #ffa500);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 1.2rem;
    margin-right: 15px;
}

.author-info h4 {
    color: #2c3e50;
    margin-bottom: 3px;
    font-size: 1.1rem;
}

.author-info span {
    color: #7f8c8d;
    font-size: 0.9rem;
}

/* Controles del carrusel */
.carousel-controls {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px;
    margin-top: 30px;
}

.carousel-btn {
    background: linear-gradient(135deg, #ffcc00, #ffa500);
    color: white;
    border: none;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    font-size: 1.5rem;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px #ffcc00;
    display: flex;
    align-items: center;
    justify-content: center;
}

.carousel-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px #ffcc00;
}

.carousel-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
    transform: none;
}

.carousel-indicators-testimonios {
    display: flex;
    gap: 10px;
}

.carousel-indicator {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: #ddd;
    cursor: pointer;
    transition: all 0.3s ease;
}

.carousel-indicator.active {
    background: #ffcc00;
    transform: scale(1.2);
}

.empty-testimonials {
    text-align: center;
    padding: 60px 20px;
    color: #7f8c8d;
}

.empty-testimonials h3 {
    font-size: 1.5rem;
    margin-bottom: 10px;
}

@media (max-width: 768px) {
    .testimonial-card {
        min-width: 280px;
    }

    .testimonials-header h2 {
        font-size: 2rem;
    }

    .carousel-controls {
        flex-direction: column;
        gap: 15px;
    }
}

</style>

<section class="testimonials-section">
    <div class="testimonials-container">
        <div class="testimonials-header">
            <h2>Testimonios de Nuestros Clientes</h2>
            <p>Descubre lo que nuestros clientes dicen sobre nuestro servicio de envíos</p>
        </div>

        <div class="testimonials-carousel" id="testimonialsCarousel">
            <div class="testimonials-track" id="testimonialsTrack">
                <?php
                // Conexión a la base de datos
                require_once './config/database.php';
                
                // Consultar testimonios aprobados
                $sql = "SELECT first_name, last_name, comment, rating, created_at FROM comments WHERE is_approved = 1 ORDER BY created_at DESC";
                $result = $conn->query($sql);
                
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $firstName = htmlspecialchars($row['first_name']);
                        $lastName = htmlspecialchars($row['last_name']);
                        $comment = htmlspecialchars($row['comment']);
                        $rating = (int)$row['rating'];
                        $date = date('d/m/Y', strtotime($row['created_at']));
                        $initials = strtoupper(substr($firstName, 0, 1) . substr($lastName, 0, 1));
                        
                        echo '<div class="testimonial-card">';
                        echo '<div class="testimonial-rating">';
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $rating) {
                                echo '<span class="star">★</span>';
                            } else {
                                echo '<span class="star empty">★</span>';
                            }
                        }
                        echo '</div>';
                        echo '<div class="testimonial-comment">' . $comment . '</div>';
                        echo '<div class="testimonial-author">';
                        echo '<div class="author-avatar">' . $initials . '</div>';
                        echo '<div class="author-info">';
                        echo '<h4>' . $firstName . ' ' . $lastName . '</h4>';
                        echo '<span>' . $date . '</span>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<div class="empty-testimonials">';
                    echo '<h3>¡Sé el primero en dejar un testimonio!</h3>';
                    echo '<p>Ayuda a otros clientes compartiendo tu experiencia</p>';
                    echo '</div>';
                }
                
                $conn->close();
                ?>
            </div>
        </div>
        
        <div class="carousel-controls" id="carouselControls">
            <button class="carousel-btn" id="prevBtn" onclick="prevSlide()">❮</button>
            <div class="carousel-indicators-testimonios" id="carouselIndicators"></div>
            <button class="carousel-btn" id="nextBtn" onclick="nextSlide()">❯</button>
        </div>
    </div>
<br>
<br>
    <button class="testimonios_btn" onclick="openmodaltestimonios()">
    ✨ Agregar Testimonio
</button>

</section>



<script>
document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.getElementById('testimonialsCarousel');
    const btnLeft = document.getElementById('prevBtn');
    const btnRight = document.getElementById('nextBtn');
    const track = document.getElementById('testimonialsTrack');
    const indicatorsContainer = document.getElementById('carouselIndicators');

    let currentSlide = 0;
    let testimonialsPerView = 3;
    const cardWidth = 320 + 30;

    function getTotalTestimonials() {
        return document.querySelectorAll('.testimonial-card').length;
    }

    function updateCarouselView() {
        if (window.innerWidth <= 768) {
            testimonialsPerView = 1;
        } else if (window.innerWidth <= 1024) {
            testimonialsPerView = 2;
        } else {
            testimonialsPerView = 3;
        }

        const translateX = -currentSlide * cardWidth;
        track.style.transform = `translateX(${translateX}px)`;

        btnLeft.disabled = currentSlide === 0;
        btnRight.disabled = currentSlide >= getTotalTestimonials() - testimonialsPerView;
        updateIndicators();
    }

    function createIndicators() {
        const maxSlides = Math.max(0, getTotalTestimonials() - testimonialsPerView + 1);
        indicatorsContainer.innerHTML = '';

        for (let i = 0; i < maxSlides; i++) {
            const indicator = document.createElement('div');
            indicator.className = 'carousel-indicator';
            indicator.onclick = () => goToSlide(i);
            indicatorsContainer.appendChild(indicator);
        }
    }

    function updateIndicators() {
        const indicators = document.querySelectorAll('.carousel-indicator');
        indicators.forEach((indicator, index) => {
            indicator.classList.toggle('active', index === currentSlide);
        });
    }

    function goToSlide(slideIndex) {
        const maxSlides = Math.max(0, getTotalTestimonials() - testimonialsPerView + 1);
        currentSlide = Math.max(0, Math.min(slideIndex, maxSlides - 1));
        updateCarouselView();
    }

    btnLeft.addEventListener('click', () => {
        if (currentSlide > 0) {
            currentSlide--;
            updateCarouselView();
        }
    });

    btnRight.addEventListener('click', () => {
        const maxSlides = Math.max(0, getTotalTestimonials() - testimonialsPerView + 1);
        if (currentSlide < maxSlides - 1) {
            currentSlide++;
            updateCarouselView();
        }
    });

    window.addEventListener('resize', () => {
        updateCarouselView();
        createIndicators();
    });

    // Inicializar
    if (!document.querySelector('.empty-testimonials')) {
        updateCarouselView();
        createIndicators();

        if (getTotalTestimonials() > testimonialsPerView) {
            startAutoSlide();
            carousel.addEventListener('mouseenter', stopAutoSlide);
            carousel.addEventListener('mouseleave', startAutoSlide);
        }
    }

    let autoSlideInterval;

    function startAutoSlide() {
        autoSlideInterval = setInterval(() => {
            const maxSlides = Math.max(0, getTotalTestimonials() - testimonialsPerView + 1);
            if (currentSlide < maxSlides - 1) {
                currentSlide++;
            } else {
                currentSlide = 0;
            }
            updateCarouselView();
        }, 5000);
    }

    function stopAutoSlide() {
        clearInterval(autoSlideInterval);
    }
});
</script>





