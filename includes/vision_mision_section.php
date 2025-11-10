<style>
        /* Sección principal */
        .mision-vision-section {
            padding: 50px 20px;
            max-width: 100%;
            margin: 0 auto;
            background: #0a0a0a;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 50vh;
        }

        .mision-vision-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 30%, rgba(59, 130, 246, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(168, 85, 247, 0.1) 0%, transparent 50%);
            pointer-events: none;
        }

        /* Grid de las cajas */
        .mision-vision-grid {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 50px;
            position: relative;
            z-index: 1;
            width: 100%;
            flex-wrap: wrap;
        }

        /* Caja individual */
        .mision-vision-box {
            background: linear-gradient(135deg, #1a1a1a 0%, #2a2a2a 100%);
            border-radius: 20px;
            padding: 70px 30px;
            text-align: justify;
            position: relative;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            cursor: pointer;
            border: 1px solid #333;
            overflow: hidden;
            width: 300px;
            max-width: 100%;
            min-height: 280px;
        }

        .mision-vision-box::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: conic-gradient(
                transparent, 
                rgba(59, 130, 246, 0.1), 
                transparent
            );
            transition: transform 0.6s ease;
            transform: rotate(0deg);
        }

        .mision-vision-box:hover::before {
            transform: rotate(360deg);
        }

        .mision-vision-box:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 
                0 25px 50px rgba(0, 0, 0, 0.5),
                0 0 50px rgba(59, 130, 246, 0.2);
            border-color: #3b82f6;
            min-height: 320px;
        }

        .mision-vision-box:nth-child(2):hover {
            box-shadow: 
                0 25px 50px rgba(0, 0, 0, 0.5),
                0 0 50px rgba(168, 85, 247, 0.2);
            border-color: #a855f7;
        }

        /* Contenedor del ícono */
        .icono-circulo {
            position: relative;
            width: 120px;
            height: 120px;
            margin: 0 auto 30px;
            z-index: 2;
        }

        .icono-central {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            z-index: 3;
            transition: all 0.4s ease;
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.3);
        }

        .mision-vision-box:nth-child(2) .icono-central {
            background: linear-gradient(135deg, #a855f7, #7c3aed);
            box-shadow: 0 10px 30px rgba(168, 85, 247, 0.3);
        }

        .icono-central img {
            width: 90px;
            height: 100px;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .mision-vision-box:hover .icono-central {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 15px 40px rgba(59, 130, 246, 0.5);
        }

        .mision-vision-box:nth-child(2):hover .icono-central {
            box-shadow: 0 15px 40px rgba(168, 85, 247, 0.5);
        }

        .mision-vision-box:hover .icono-central img {
            transform: scale(1.1) rotate(-5deg);
        }

        /* Anillos animados */
        .icono-acento {
            position: absolute;
            top: -10px;
            left: -10px;
            width: 120px;
            height: 120px;
            border: 2px solid transparent;
            border-radius: 50%;
            background: linear-gradient(45deg, #3b82f6, transparent, #1e40af, transparent);
            background-size: 400% 400%;
            animation: gradientRotate 4s ease infinite;
            z-index: 1;
        }

        .mision-vision-box:nth-child(2) .icono-acento {
            background: linear-gradient(45deg, #a855f7, transparent, #7c3aed, transparent);
            background-size: 400% 400%;
        }

        .icono-acento::before {
            content: '';
            position: absolute;
            top: 4px;
            left: 4px;
            right: 4px;
            bottom: 4px;
            background: #1a1a1a;
            border-radius: 50%;
            z-index: -1;
        }

        @keyframes gradientRotate {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Texto */
        .mision-vision-box h3 {
            text-align: center;
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: #fff;
            position: relative;
            z-index: 2;
            transition: all 0.3s ease;
        }

        .mision-vision-box:hover h3 {
            color: #3b82f6;
            transform: translateY(-5px);
        }

        .mision-vision-box:nth-child(2):hover h3 {
            color: #a855f7;
        }

        /* Párrafo con efecto de despliegue solo al hover */
        .mision-vision-box p {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #ccc;
            position: relative;
            z-index: 2;
            /* Oculto por defecto */
            max-height: 0px;
            opacity: 0;
            overflow: hidden;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            transform: translateY(20px);
            margin-top: 0px;
            
        }

        /* Solo aparece al pasar el mouse */
        .mision-vision-box:hover p {
            max-height: 500px;
            opacity: 1;
            transform: translateY(0);
            color: #fff;
            margin-top: 10px;


        }

        /* Partículas flotantes */
        .mision-vision-box::after {
            content: '';
            position: absolute;
            top: 20px;
            right: 20px;
            width: 6px;
            height: 6px;
            background: #3b82f6;
            border-radius: 50%;
            opacity: 0;
            transition: all 0.3s ease;
            box-shadow: 
                10px 10px 0 #3b82f6,
                -10px -10px 0 #3b82f6,
                10px -10px 0 #3b82f6,
                -10px 10px 0 #3b82f6;
        }

        .mision-vision-box:nth-child(2)::after {
            background: #a855f7;
            box-shadow: 
                10px 10px 0 #a855f7,
                -10px -10px 0 #a855f7,
                10px -10px 0 #a855f7,
                -10px 10px 0 #a855f7;
        }

        .mision-vision-box:hover::after {
            opacity: 0.3;
            animation: float 2s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .mision-vision-grid {
                flex-direction: column;
                gap: 30px;
            }
            
            .mision-vision-box {
                padding: 30px 20px;
                width: 100%;
                max-width: 350px;
                min-height: 240px;
            }
            
            .mision-vision-box:hover {
                min-height: 280px;
            }
            
            .icono-circulo {
                width: 100px;
                height: 100px;
            }
            
            .icono-central {
                width: 80px;
                height: 80px;
            }
            
            .icono-central img {
                width: 40px;
                height: 40px;
            }
            
            .icono-acento {
                width: 100px;
                height: 100px;
                top: -10px;
                left: -10px;
            }
            
            .mision-vision-box h3 {
                font-size: 1.5rem;
            }
            
            .mision-vision-box p {
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            .mision-vision-section {
                padding: 60px 15px;
            }
            
            .mision-vision-box {
                min-height: 220px;
            }
            
            .mision-vision-box:hover {
                min-height: 260px;
            }
            
            .mision-vision-box h3 {
                font-size: 1.3rem;
            }
            
            .mision-vision-box p {
                font-size: 0.9rem;
            }
        }
    </style>

<section class="mision-vision-section">
        <div class="mision-vision-grid">
            <!-- Misión -->
            <div class="mision-vision-box">
                <div class="icono-circulo">
                    <div class="icono-central">
                        <img src="img/mision3.png" alt="Icono Misión" />
                    </div>
                    <div class="icono-acento"></div>
                </div>
                <h3>Misión</h3>
                <p>"Proporcionar  servicios de entrega rápida y segura a nivel nacional e internacional, satisfaciendo las necesidades de nuestros clientes con pasión y dedicación, y brindándoles una experiencia de entrega confiable y eficiente que supere sus expectativas"</p>
            </div>

            <!-- Visión -->
            <div class="mision-vision-box">
                <div class="icono-circulo">
                    <div class="icono-central">
                        <img src="img/vision.png" alt="Icono Visión" />
                    </div>
                    <div class="icono-acento"></div>
                </div>
                <h3>Visión</h3>
                <p>"Ser la empresa líder en servicios  de importación con una entrega rápida y segura a nivel global, con una red de almacenes estratégicos en diferentes partes del mundo, que permita a nuestros clientes importar productos a Perú de manera eficiente y confiable"</p>
            </div>
        </div>
    </section>
