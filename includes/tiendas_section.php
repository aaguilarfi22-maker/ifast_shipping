
    <style>
        .tienda-section {
            padding: 60px 20px;
            background: white;
            position: relative;
            overflow: hidden;
        }

        .tienda-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 193, 7, 0.08) 0%, rgba(255, 235, 59, 0.05) 50%, rgba(255, 152, 0, 0.08) 100%);
            z-index: 1;
        }

        .tienda-categoria-title {
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 50px;
            color: #0f1e2c;
            position: relative;
            z-index: 2;
        }

        .tienda-categoria-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, #ff9800, #ffc107);
            border-radius: 2px;
        }

        .tienda-categoria-carousel-container {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
            z-index: 2;
        }

        .tienda-categoria-carousel {
            display: flex;
            gap: 20px;
            overflow-x: auto;
            scroll-behavior: smooth;
            padding: 20px 0;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .tienda-categoria-carousel::-webkit-scrollbar {
            display: none;
        }

        .tienda-categoria-item {
            position: relative;
            min-width: 280px;
            height: 200px;
            border-radius: 20px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .tienda-categoria-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(
                135deg,
                rgba(0, 0, 0, 0.3) 0%,
                rgba(0, 0, 0, 0.1) 50%,
                rgba(0, 0, 0, 0.4) 100%
            );
            transition: all 0.4s ease;
        }

        .tienda-categoria-item:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .tienda-categoria-item:hover::before {
            background: linear-gradient(
                135deg,
                rgba(255, 152, 0, 0.4) 0%,
                rgba(255, 193, 7, 0.3) 50%,
                rgba(0, 0, 0, 0.5) 100%
            );
        }

        .tienda-categoria-item span {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            padding: 25px 15px;
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            z-index: 3;
            transition: all 0.4s ease;
        }

        .tienda-categoria-item:hover span {
            transform: translateY(-5px);
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.9);
        }

        .tienda-categoria-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: linear-gradient(135deg, #ff9800, #ffc107);
            color: white;
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            font-size: 1.5rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 152, 0, 0.3);
            z-index: 4;
        }

        .tienda-categoria-btn:hover {
            transform: translateY(-50%) scale(1.1);
            box-shadow: 0 6px 20px rgba(255, 152, 0, 0.5);
        }

        .tienda-categoria-btn.left {
            left: -25px;
        }

        .tienda-categoria-btn.right {
            right: -25px;
        }

        .tienda-categoria-lista-dinamica {
            margin-top: 50px;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .tienda-categoria-lista-dinamica h3 {
            font-size: 1.8rem;
            color: #374151;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .tienda-categoria-lista-dinamica ul {
            list-style: none;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
        }

        .tienda-categoria-lista-dinamica li {
            background: white;
            padding: 12px 24px;
            border-radius: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .tienda-categoria-lista-dinamica li:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 152, 0, 0.2);
            border-color: #ff9800;
        }

        .tienda-categoria-btn-ver-mas {
            background: linear-gradient(135deg, #ff9800, #ffc107);
            color: white;
            border: none;
            padding: 15px 40px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(255, 152, 0, 0.3);
            margin-top: 40px;
            position: relative;
            z-index: 2;
        }

        .tienda-categoria-btn-ver-mas:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(255, 152, 0, 0.4);
        }

        .tienda-categoria-btn-ver-mas:active {
            transform: translateY(-1px);
        }

        @media (max-width: 768px) {
            .tienda-categoria-title {
                font-size: 2rem;
            }
            
            .tienda-categoria-item {
                min-width: 250px;
                height: 180px;
            }
            
            .tienda-categoria-item span {
                font-size: 1.3rem;
                padding: 20px 10px;
            }
            
            .tienda-categoria-btn {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }
            
            .tienda-categoria-btn.left {
                left: -20px;
            }
            
            .tienda-categoria-btn.right {
                right: -20px;
            }
        }

        @media (max-width: 480px) {
            .tienda-categoria-item {
                min-width: 220px;
                height: 160px;
            }
            
            .tienda-categoria-item span {
                font-size: 1.2rem;
            }
        }
    </style>

    <!-- TIENDAS RECOMENDADAS -->
    <section id="tiendas" class="tienda-section">
        <h2 class="tienda-categoria-title">"Lo que necesitas, está justo aquí."</h2>

        <div class="tienda-categoria-carousel-container">
            <button class="tienda-categoria-btn left" id="btn-left">‹</button>
            <div class="tienda-categoria-carousel" id="tiendaCarousel">
                <div class="tienda-categoria-item" data-cat="calzado" style="background-image: url('img/calzado2.jpg');"><span>Calzado</span></div>
                <div class="tienda-categoria-item" data-cat="deporte" style="background-image: url('img/deportes.jpg');"><span>Deporte</span></div>
                <div class="tienda-categoria-item" data-cat="hogar" style="background-image: url('img/hogar.jpg');"><span>Hogar</span></div>
                <div class="tienda-categoria-item" data-cat="electronicos" style="background-image: url('img/electronica.jpg');"><span>Electrónicos</span></div>
                <div class="tienda-categoria-item" data-cat="disfraces" style="background-image: url('img/disfraces.jpeg');"><span>Disfraces</span></div>
                <div class="tienda-categoria-item" data-cat="oficina" style="background-image: url('img/oficina1.jpg');"><span>Oficina</span></div>
                <div class="tienda-categoria-item" data-cat="juguetes" style="background-image: url('img/juguetes.jpg');"><span>Juguetes</span></div>
                <div class="tienda-categoria-item" data-cat="salud & Belleza" style="background-image: url('img/belleza.webp');"><span>Salud y Belleza</span></div>
                <div class="tienda-categoria-item" data-cat="respuestos & accesorios" style="background-image: url('img/repuestos.webp');"><span>Respuestos & Accesorios</span></div>
            </div>
            <button class="tienda-categoria-btn right" id="btn-right">›</button>
        </div>



        <center><button id="verMasBtn" onclick="abrirVentana()" class="tienda-categoria-btn-ver-mas">🛍️ Ver Tiendas Recomendadas</button></center>
    </section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.getElementById('tiendaCarousel');
    const btnLeft = document.getElementById('btn-left');
    const btnRight = document.getElementById('btn-right');

    const scrollAmount = 300; // Ajusta según ancho del item

    btnLeft.addEventListener('click', () => {
        carousel.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
    });

    btnRight.addEventListener('click', () => {
        carousel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
    });

    // Carga dinámica de tiendas según categoría (simulado)
    const categorias = document.querySelectorAll('.tienda-categoria-item');
    const titulo = document.getElementById('tituloCategoria');
    const lista = document.getElementById('listaTiendas');

    categorias.forEach(item => {
        item.addEventListener('click', () => {
            const cat = item.dataset.cat;
            titulo.textContent = `Tiendas recomendadas en "${item.textContent.trim()}"`;
            lista.innerHTML = '';

            // Simulación de tiendas (puedes cambiar esto por llamada fetch a tu backend si deseas)
            const tiendasFalsas = [
                `Mega Store de ${cat}`,
                `Outlet ${cat}`,
                `${cat} Express`,
                `Todo en ${cat}`
            ];

            tiendasFalsas.forEach(nombre => {
                const li = document.createElement('li');
                li.textContent = nombre;
                lista.appendChild(li);
            });
        });
    });
});


</script>
