
    <style>

        /* Estilos base para las cards */
        .card {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 25%, #0f1419 50%, #1a1a2e 75%, #16213e 100%);
            border-radius: 12px;
            padding: 20px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 1px solid #333;
            overflow: hidden;
            position: relative;
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            border-color: #ffcc00;
        }

        .card-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }

        .card-header img {
            width: 238px;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
            flex-shrink: 0;
        }

        .card-header h3 {
            color: #ffcc00;
            font-size: 1.1rem;
            margin: 0;
            line-height: 1.3;
        }

        /* Estilos para el contenido expandible */
        .card-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease-out, padding 0.4s ease-out;
            padding: 0;
        }

        .card:hover .card-content {
            max-height: 350px;
            padding: 15px 0 0 0;
        }

        .card-content p {
            color: #ccc;
            font-size: 0.95rem;
            line-height: 1.6;
            margin: 0;
            opacity: 0;
            transition: opacity 0.3s ease 0.1s;
            text-align: justify;
        }

        .card:hover .card-content p {
            opacity: 1;
        }

        /* Indicador visual de que es expandible */
        .card::after {
            content: "▼";
            position: absolute;
            right: 20px;
            top: 20px;
            color: #666;
            font-size: 0.8rem;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .card:hover::after {
            transform: rotate(180deg);
            color: #ffcc00;
        }

        /* Estilos para el contenedor de cards */
        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        

        /* Estilos para las secciones */
        .section {
            width: 100%;
            min-height: 20vh;
            padding: 40px 0;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 25%, #0f1419 50%, #1a1a2e 75%, #16213e 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .section h2 {
          color: white;
          font-size: 1.8rem;
          font-weight: bold;
          margin-bottom: 15px;
          text-transform: uppercase;
          letter-spacing: 1px;
        }


        /* Sección Aereo Profesional */
        .aereo-section {
            width: 100%;
            min-height: 10vh;
            padding: 40px 0;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 25%, #0f1419 50%, #1a1a2e 75%, #16213e 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .aereo-card {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 25%, #0f1419 50%, #1a1a2e 75%, #16213e 100%);
            border-radius: 12px;
            padding: 30px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 1px solid #333;
            overflow: hidden;
            position: relative;
            display: flex;
            align-items: flex-start;
            gap: 30px;
            width: 70%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .aereo-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
            border-color: #FFD700;
        }

        .aereo-image {
            width: 50%;
            max-width: 700px;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
            flex-shrink: 0;
        }

        .aereo-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        .aereo-title {
            color: #FFD700;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .aereo-card-content p {
            color: #ccc;
            font-size: 0.95rem;
            line-height: 1.6;
            margin: 0;
            opacity: 0;
            transition: opacity 0.3s ease 0.1s;
            text-align: justify;
        }


        .aereo-description {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease-out, padding 0.4s ease-out;
            padding: 0;
        }

        .aereo-card:hover .aereo-description {
            max-height: 300px;
            padding: 10px 0 0 0;
        }

        .aereo-card:hover .aereo-description p {
          
            color: #ffff;
            font-size: 0.95rem;
            line-height: 1.6;
            margin: 1;
            opacity: ;
            transition:0.3s ease 0.1s;
            text-align: justify;
        }

        .aereo-card::after {
            content: "▼";
            position: absolute;
            right: 30px;
            top: 30px;
            color: #666;
            font-size: 1rem;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .aereo-card:hover::after {
            transform: rotate(180deg);
            color: #FFD700;
        }

        /* Responsive Tablets */
        @media (max-width: 1024px) {
            .section {
                min-height: auto;
                padding: 40px 0;
            }

            .aereo-section {
                min-height: auto;
                padding: 40px 0;
            }

            .card-container {
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 20px;
                padding: 0 15px;
            }

            .aereo-card {
                padding: 25px;
                gap: 25px;
            }

            .aereo-image {
                height: 200px;
            }

            .section-title {
                font-size: 2.2rem;
                margin-bottom: 30px;
            }

            .aereo-title {
                font-size: 1.6rem;
            }
        }

        /* Responsive Mobile */
        @media (max-width: 768px) {
            .section {
                padding: 30px 0;
            }

            .aereo-section {
                padding: 30px 0;
            }

            .card-container {
                grid-template-columns: 1fr;
                gap: 20px;
                padding: 0 15px;
            }

            .card {
                max-width: 100%;
            }

            .card-header {
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }

            .card-header img {
                width: 100%;
                max-width: 300px;
                height: 150px;
            }

            .section-title {
                font-size: 2rem;
                margin-bottom: 25px;
                padding: 0 15px;
            }

            .aereo-card {
                flex-direction: column;
                text-align: center;
                gap: 20px;
                padding: 20px;
                margin: 0 15px;
            }

            .aereo-image {
                width: 100%;
                height: 180px;
                max-width: 100%;
            }

            .aereo-title {
                font-size: 1.4rem;
            }

            .aereo-description p {
                text-align: left;
                font-size: 0.9rem;
            }
        }

        /* Responsive Small Mobile */
        @media (max-width: 480px) {
            .section {
                padding: 20px 0;
            }

            .aereo-section {
                padding: 20px 0;
            }

            .card-container {
                padding: 0 10px;
            }

            .card {
                padding: 15px;
            }

            .card-header img {
                height: 120px;
            }

            .section-title {
                font-size: 1.8rem;
                padding: 0 10px;
            }

            .aereo-card {
                padding: 15px;
                margin: 0 10px;
            }

            .aereo-image {
                height: 150px;
            }

            .aereo-title {
                font-size: 1.2rem;
            }

            .card-content p,
            .aereo-description p {
                font-size: 0.85rem;
            }
        .section h2{
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

        }
    </style>

    <section id="servicios" class="section">
        <h2 class="title-servicios" id="title-servicios">Nuestros Servicios</h2>
        <br>
        <div class="card-container">
            <div class="card">
                <div class="card-header">
                    <img src="img/sobre_nosotros.webp" alt="Servicio 1"> 
                </div>
                <div class="card-content">
                    <h3 style="color: #ffcc00">"¿App o página? ¡Tú eliges dónde comprar, nosotros lo traemos!"</h3>
                    <p>No importa si compras desde una app móvil, una tienda online o tu navegador favorito. Con nuestra plataforma, tú decides cómo y dónde comprar, y nosotros nos encargamos del resto.</p>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <img src="img/usa2.png" alt="USA">
                </div>
                <div class="card-content">
                    <h3 style="color: #ffcc00">📦 ¿Compraste online? ¡Nosotros lo recibimos por ti en USA!</h3>
                    <p>Compra en cualquier tienda del mundo y envíalo a nuestra dirección en Miami. Te ofrecemos seguimiento en tiempo real, control de paquetes y recepción segura.</p>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <img src="img/peru01.jpg" alt="Perú">
                </div>
                <div class="card-content">
                    <h3 style="color: #ffcc00">🚚 Recibe tus compras en cualquier parte del Perú</h3>
                    <p>Despachamos tus productos con total seguridad y rapidez, desde Lima hasta cualquier punto del país. Cobertura nacional, entrega confiable.</p>
                </div>
            </div>
        </div>
<br>
<br>

        <div class="aereo-card">
            <img src="img/servicios.webp" alt="Aereo Profesional" class="aereo-image">
            
            <div class="aereo-content">
                <h3 class="aereo-title">SERVICIO AÉREO PROFESIONAL</h3>
                
                <div class="aereo-description">
                    <p>IFAST SHIPPING tiene una disposición una amplia red de agentes en distintas partes del mundo, así como Estados Unidos con restricciones para poder evaluar sus mercancías cuenten con un espacio de reserva y llegar a su punto de destino más rápido y en menor tiempo con servicio inconvenientemente para el bien de usted y su negocio.</p>
                </div>
            </div>
        </div>
    </section>
