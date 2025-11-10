    <style>
        .modalidades-section {
            background: linear-gradient(135deg, #0f1e2c 0%, #1a2d3e 100%);
            padding: 80px 20px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .modalidades-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 20%, rgba(255, 204, 0, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(255, 204, 0, 0.05) 0%, transparent 50%);
            pointer-events: none;
        }

        .modalidades-title {
            font-size: 3.5rem;
            font-weight: 800;
            color: #ffcc00;
            text-align: center;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            letter-spacing: -1px;
            position: relative;
            z-index: 2;
        }

        .modalidades-subtitle {
            font-size: 1.3rem;
            color: #ffffff;
            text-align: center;
            margin-bottom: 60px;
            max-width: 800px;
            line-height: 1.6;
            opacity: 0.9;
            position: relative;
            z-index: 2;
        }

        .modalidades-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            max-width: 1400px;
            width: 100%;
            position: relative;
            z-index: 2;
        }

        .modalidad-box {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.3),
                0 0 0 1px rgba(255, 204, 0, 0.2);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
        }

        .modalidad-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, #ffcc00, #ffd633);
            transform: translateX(-100%);
            transition: transform 0.6s ease;
        }

        .modalidad-box:hover::before {
            transform: translateX(0);
        }

        .modalidad-box:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 
                0 30px 60px rgba(0, 0, 0, 0.4),
                0 0 0 2px rgba(255, 204, 0, 0.4);
        }

        .modalidad-amarilla {
            background: linear-gradient(135deg, #ffcc00 0%, #ffd633 100%);
            color: #0f1e2c;
        }

        .modalidad-amarilla::before {
            background: linear-gradient(90deg, #0f1e2c, #1a2d3e);
        }

        .modalidad-imagen {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 15px;
            margin-bottom: 25px;
            transition: transform 0.4s ease;
        }

        .modalidad-box:hover .modalidad-imagen {
            transform: scale(1.05);
        }

        .modalidad-texto h3 {
            font-size: 2.2rem;
            font-weight: 700;
            color: #0f1e2c;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .modalidad-amarilla .modalidad-texto h3 {
            color: #0f1e2c;
        }

        .modalidad-texto p {
            font-size: 1.1rem;
            line-height: 1.7;
            color: #0f1e2c;
            margin-bottom: 25px;
        }

        .modalidad-amarilla .modalidad-texto p {
            color: #0f1e2c;
        }

        .video-container {
            position: relative;
            width: 100%;
            height: 250px;
            background: #000;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            margin-top: 25px;
        }

        .video-placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #0f1e2c 0%, #1a2d3e 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .video-placeholder:hover {
            background: linear-gradient(135deg, #1a2d3e 0%, #0f1e2c 100%);
        }

        .play-button {
            width: 80px;
            height: 80px;
            background: rgba(255, 204, 0, 0.9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .play-button:hover {
            background: #ffcc00;
            transform: scale(1.1);
        }

        .play-button::after {
            content: '';
            width: 0;
            height: 0;
            border-left: 25px solid #0f1e2c;
            border-top: 15px solid transparent;
            border-bottom: 15px solid transparent;
            margin-left: 5px;
        }

        .video-title {
            color: #ffffff;
            font-size: 1.2rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 10px;
        }

        .video-subtitle {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
            text-align: center;
        }

        .modalidad-numero {
            position: absolute;
            top: -20px;
            right: -20px;
            width: 80px;
            height: 80px;
            background: #ffcc00;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: 800;
            color: #0f1e2c;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .modalidad-amarilla .modalidad-numero {
            background: #ffffff;
            color: #0f1e2c;
        }

        @media (max-width: 768px) {
            .modalidades-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            
            .modalidades-title {
                font-size: 2.5rem;
            }
            
            .modalidades-subtitle {
                font-size: 1.1rem;
            }
            
            .modalidad-box {
                padding: 30px;
            }
            
            .modalidad-texto h3 {
                font-size: 1.8rem;
            }
            
            .video-container {
                height: 220px;
            }
        }
    </style>

    <section id="modalidades" class="modalidades-section">
        <h2 class="modalidades-title">Modalidades de envío</h2>
        <p class="modalidades-subtitle">
            Brindamos el servicio de compra e importación de USA-PERÚ para realizar sus compras de productos nuevos. Tenemos 2 modalidades.
        </p>

        <div class="modalidades-grid">
            <!-- Modalidad 01 -->
            <div class="modalidad-box">
                <div class="modalidad-numero">01</div>
                <img src="img/modalidad01.webp" alt="Modalidad 1" class="modalidad-imagen" />
                <div class="modalidad-texto">
                    <h3>Modalidad 01</h3>
                    <p>
                        Es que compre directamente y solo indique nuestra dirección en USA, de esa manera sus productos llegarán a nuestro almacén y podremos realizar la importación.
                    </p>
                </div>
                <div class="video-container">
                    <div class="video-placeholder" onclick="loadVideo('modalidad1', '/BopTA6LIWcw?si=PxcV-Xol3m56OpfK')">
                        <div class="play-button"></div>
                        <div class="video-title">Video Tutorial</div>
                        <div class="video-subtitle">Aprende cómo funciona la Modalidad 01</div>
                    </div>
                </div>
            </div>

            <!-- Modalidad 02 -->
            <div class="modalidad-box modalidad-amarilla">
                <div class="modalidad-numero">02</div>
                <img src="img/modalidad2.webp" alt="Modalidad 2" class="modalidad-imagen" />
                <div class="modalidad-texto">
                    <h3>Modalidad 02</h3>
                    <p>
                        Es que utilice nuestro servicio de compra. Solo debe enviarnos los links de los productos que desea a nuestro correo:
                        <br /><strong></strong> o vía
                        <strong>Whatsapp (902 937 040)</strong> y le enviaremos la cotización.
                    </p>
                </div>
                <div class="video-container">
                    <div class="video-placeholder" onclick="loadVideo('modalidad2', 'VIDEO_ID_2')">
                        <div class="play-button"></div>
                        <div class="video-title">Video Tutorial</div>
                        <div class="video-subtitle">Aprende cómo funciona la Modalidad 02</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function loadVideo(modalidad, videoId) {
            // Encuentra el contenedor del video
            const videoContainer = document.querySelector(`[onclick="loadVideo('${modalidad}', '${videoId}')"]`).parentElement;
            
            // Crea el iframe de YouTube
            const iframe = document.createElement('iframe');
            iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0&modestbranding=1`;
            iframe.style.width = '100%';
            iframe.style.height = '100%';
            iframe.style.border = 'none';
            iframe.style.borderRadius = '15px';
            iframe.setAttribute('allowfullscreen', '');
            iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture');
            
            // Reemplaza el placeholder con el iframe
            videoContainer.innerHTML = '';
            videoContainer.appendChild(iframe);
        }
    </script>
