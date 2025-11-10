
     <style>
        /* =================================
           BOTÓN PRINCIPAL PARA ABRIR VENTANA
           ================================= */
        .btn-abrir-tiendas {
            position: fixed;
            top: 20px;
            right: 20px;
            background: linear-gradient(45deg, rgb(15, 30, 44), rgb(25, 50, 75));
            color: #FFD700;
            border: none;
            padding: 15px 25px;
            font-size: 16px;
            border-radius: 50px;
            cursor: pointer;
            font-weight: bold;
            box-shadow: 0 6px 20px rgba(15, 30, 44, 0.4);
            z-index: 1000;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-abrir-tiendas:hover {
            background: linear-gradient(45deg, rgb(25, 50, 75), rgb(15, 30, 44));
            box-shadow: 0 12px 30px rgba(255, 215, 0, 0.4);
            transform: translateY(-2px);
        }

        /* =================================
           VENTANA FLOTANTE
           ================================= */
        .ventana-flotante {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            z-index: 2000;
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .ventana-flotante.mostrar {
            display: flex;
            opacity: 1;
            justify-content: center;
            align-items: center;
        }

        .contenido-ventana {
            background: #f8f9faff;
            width: 95%;
            max-width: 1200px;
            max-height: 90vh;
            border-radius: 20px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            transform: scale(0.9);
            transition: transform 0.3s ease;
        }

        .ventana-flotante.mostrar .contenido-ventana {
            transform: scale(1);
        }

        .btn-cerrar {
            position: absolute;
            top: 15px;
            right: 20px;
            background:#FFD700;
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 20px;
            font-weight: bold;
            z-index: 2001;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .btn-cerrar:hover {
            background: #0f1e2c;
            transform: scale(1.1);
        }

        .contenido-scroll {
            max-height: 90vh;
            overflow-y: auto;
            padding: 20px;
            padding-top: 60px;
        }

        .contenido-scroll::-webkit-scrollbar {
            width: 8px;
        }

        .contenido-scroll::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .contenido-scroll::-webkit-scrollbar-thumb {
            background: linear-gradient(45deg, rgb(15, 30, 44), #FFD700);
            border-radius: 10px;
        }

        /* =================================
           ESTILOS ORIGINALES DE LA TIENDA
           ================================= */
        .btn-ver-mas {
            background: linear-gradient(45deg, rgb(15, 30, 44), rgb(25, 50, 75));
            color: #FFD700;
            border: none;
            padding: 15px 30px;
            font-size: 18px;
            border-radius: 12px;
            cursor: pointer;
            font-weight: bold;
            box-shadow: 0 6px 20px rgba(15, 30, 44, 0.4);
            position: relative;
            overflow: hidden;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            width: 100%;
            max-width: 300px;
            margin: 20px auto;
            display: block;
        }

        .btn-ver-mas:hover {
            background: linear-gradient(45deg, rgb(25, 50, 75), rgb(15, 30, 44));
            box-shadow: 0 12px 30px rgba(255, 215, 0, 0.4);
            transform: translateY(-2px);
        }

        .header-banner {
            background: linear-gradient(135deg, #0f1e2c 0%, #0f1e2c 50%, #0f1e2c 100%);
            color: #000;
            text-align: center;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 18px;
            font-weight: bold;
            border: 3px dashed #FFD700;
            position: relative;
            overflow: hidden;
        }

        .header-banner::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: repeating-linear-gradient(
                45deg,
                transparent,
                transparent 10px,
                rgba(255, 255, 255, 0.1) 10px,
                rgba(255, 255, 255, 0.1) 20px
            );
            animation: shimmer 3s linear infinite;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .header-banner h1 {
            position: relative;
            z-index: 2;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .categorias-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .categoria-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
        }

        .categoria-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }

        .categoria-imagen {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .categoria-card:hover .categoria-imagen {
            transform: scale(1.05);
        }

        .categoria-titulo {
            background: linear-gradient(45deg, rgb(15, 30, 44), rgb(25, 50, 75));
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            position: relative;
            z-index: 2;
        }

        .categoria-titulo::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(255, 215, 0, 0.1), rgba(255, 165, 0, 0.1));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .categoria-card:hover .categoria-titulo::before {
            opacity: 1;
        }

        .tiendas-expandible {
            max-height: 0;
            overflow: hidden;
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            transition: all 0.4s ease;
            border-top: 1px solid #e9ecef;
        }

        .tiendas-expandible.mostrar {
            max-height: 350px;
            padding: 20px;
            overflow-y: auto;
        }

        .tiendas-expandible::-webkit-scrollbar {
            width: 6px;
        }

        .tiendas-expandible::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .tiendas-expandible::-webkit-scrollbar-thumb {
            background: linear-gradient(45deg, rgb(15, 30, 44), #FFD700);
            border-radius: 10px;
        }

        .store-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 15px;
            align-items: center;
        }

        .store-item {
            background: white;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100px;
        }

        .store-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        .store-logo {
            max-width: 80px;
            max-height: 50px;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .store-item:hover .store-logo {
            transform: scale(1.1);
        }

        .store-name {
            font-size: 12px;
            color: #333;
            margin-top: 8px;
            font-weight: bold;
        }

        .store-item a {
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            width: 100%;
        }

        /* Categorías específicas */
        .calzado { border-left: 5px solid #FFD700; }
        .deporte { border-left: 5px solid #FFD700; }
        .hogar { border-left: 5px solid #FFD700; }
        .electronica { border-left: 5px solid #FFD700; }
        .disfraces { border-left: 5px solid #FFD700; }
        .oficina { border-left: 5px solid #FFD700; }
        .ropa { border-left: 5px solid #FFD700; }
        .repuestos { border-left: 5px solid #FFD700; }
        .juguetes { border-left: 5px solid #FFD700; }

        /* Responsive */
        @media (max-width: 768px) {
            .btn-abrir-tiendas {
                top: 10px;
                right: 10px;
                padding: 12px 20px;
                font-size: 14px;
            }

            .contenido-ventana {
                width: 98%;
                max-height: 95vh;
                margin: 1%;
            }

            .categorias-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            
            .store-grid {
                grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
                gap: 10px;
            }
            
            .categoria-imagen {
                height: 150px;
            }
        }

        @media (max-width: 480px) {
            .header-banner {
                font-size: 16px;
                padding: 12px;
            }
            
            .store-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
   <div id="ventanaFlotante" class="ventana-flotante">
        <div class="contenido-ventana">
            <button class="btn-cerrar" onclick="cerrarVentana()">×</button>
            
            <div class="contenido-scroll">
                <!-- Header Banner -->
                <div class="header-banner">
                    <h1 style="color: white;">🛍️ Tiendas Recomendadas en Estados Unidos 🛍️</h1>
                </div>

                <!-- Botón Ver Más -->
                <button class="btn-ver-mas" onclick="toggleAllCategories()" style="color: white;">
                    Ver Todas las Categorías
                </button>

                <!-- Grid de Categorías -->
                <div class="categorias-grid">
                    <!-- Calzado -->
                    <div class="categoria-card calzado" onclick="toggleTiendas('calzado')">
                        <img src="https://images.unsplash.com/photo-1549298916-b41d501d3772?w=400&h=300&fit=crop" alt="Calzado" class="categoria-imagen">
                        <div class="categoria-titulo">👟 Calzado</div>
                        <div id="tiendasCalzado" class="tiendas-expandible">
                            <div class="store-grid">
                                <div class="store-item">
                                    <a href="https://www.nike.com" target="_blank">
                                        <img src="https://logoeps.com/wp-content/uploads/2013/03/nike-vector-logo.png" alt="Nike" class="store-logo">
                                        <div class="store-name">Nike</div>
                                    </a>
                                </div>
                                <div class="store-item">
                                    <a href="https://www.dsw.com" target="_blank"><img src="img/LOGOS/dws.jpg" alt="DSW Logo" class="store-logo">
                                        <div class="store-name">DSW</div>
                                    </a>
                                </div>
                                <div class="store-item">
                                    <a href="https://www.footlocker.com/" target="_blank"><img src="img/LOGOS/Foot-Locker-Logo.png" alt="Footlocker Logo" class="store-logo">
                                        <div class="store-name">Foot Locker</div>
                                    </a>
                                </div>
                                <div class="store-item">
                                    <a href="https://www.zappos.com/" target="_blank"><img src="img/LOGOS/zappos-logo_brandlogos.png" alt="Zappos Logo" class="store-logo">
                                        <div class="store-name">Zappos</div>
                                    </a>
                                </div>
                                 <div class="store-item">
                                    <a href="https://www.6pm.com/" target="_blank"><img src="img/LOGOS/6PM.png" alt="6pm Logo" class="store-logo">
                                        <div class="store-name">6pm</div>
                                    </a>
                                </div>
                                <div class="store-item">
                                    <a href="https://www.kohls.com/" target="_blank"><img src="img/LOGOS/Kohl's_logo.svg.png" alt="Kohls Logo" class="store-logo">
                                        <div class="store-name">Kohl´s</div>
                                    </a>
                                </div>                                                              
                                <div class="store-item">
                                    <a href="https://www.skechers.com/" target="_blank"><img src="img/LOGOS/Skechers-logo-500x207-1.png" alt="Skechers Logo" class="store-logo">
                                        <div class="store-name">Skechers</div>
                                    </a>
                                </div>
                                <div class="store-item">
                                    <a href="https://www.finishline.com/" target="_blank"><img src="img/LOGOS/finish-line-inc-logo.svg" alt="Finishline Logo" class="store-logo">
                                        <div class="store-name">Finishline</div>
                                    </a>
                                </div>
                                <div class="store-item">
                                    <a href="https://www.dtlr.com/" target="_blank"><img src="img/LOGOS/dtlr-inc-logo-vector.png" alt="DTLR Logo" class="store-logo">
                                        <div class="store-name">DTLR</div>
                                    </a>
</div>                                                                                               
                            </div>
                        </div>
                    </div>

                    <!-- Deporte -->
                    <div class="categoria-card deporte" onclick="toggleTiendas('deporte')">
                        <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=400&h=300&fit=crop" alt="Deporte" class="categoria-imagen">
                        <div class="categoria-titulo">⚽ Deporte</div>
                        <div id="tiendasDeporte" class="tiendas-expandible">
                            <div class="store-grid">
                                <div class="store-item">
                                    <a href="https://www.amazon.com" target="_blank">
                                        <img src="https://logos-world.net/wp-content/uploads/2020/04/Amazon-Logo.png" alt="Amazon" class="store-logo">
                                        <div class="store-name">Amazon</div>
                                    </a>
                                </div>
                                <div class="store-item">
                                    <a href="https://www.nike.com" target="_blank">
                                        <img src="https://logoeps.com/wp-content/uploads/2013/03/nike-vector-logo.png" alt="Nike" class="store-logo">
                                        <div class="store-name">Nike</div>
                                    </a>
                                </div>
                                <div class="store-item">
                                    <a href="https://www.dickssportinggoods.com/?tsa=Y" target="_blank"><img src="img/LOGOS/dicks.png" alt="dicks" class="store-logo">
                                        <div class="store-name">Dick's</div>
                                    </a>
                                </div>
                                <div class="store-item">
                                    <a href="https://www.underarmour.com/en-us/" target="_blank"><img src="img/LOGOS/underarmour.png" alt="underarmour" class="store-logo">
                                        <div class="store-name">Under Armour</div>
                                    </a>
                                </div>
                                 <div class="store-item">
                                    <a href="https://www.thenorthface.com/en-us" target="_blank"><img src="img/LOGOS/thenorthface.png" alt="thenorthface" class="store-logo">
                                        <div class="store-name">ThenorthFace</div>
                                    </a>
                                </div>
                                <div class="store-item">
                                    <a href="https://www.walmart.com/" target="_blank"><img src="img/LOGOS/Walmart_logo.svg.png" alt="walmart" class="store-logo"></a>
                                        <div class="store-name">Walmart</div>
                                    </a>
                                </div>                                                               
                            </div>
                        </div>
                    </div>

                    <!-- Hogar -->
                    <div class="categoria-card hogar" onclick="toggleTiendas('hogar')">
                        <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=400&h=300&fit=crop" alt="Hogar" class="categoria-imagen">
                        <div class="categoria-titulo">🏠 Hogar</div>
                        <div id="tiendasHogar" class="tiendas-expandible">
                            <div class="store-grid">
                                <div class="store-item">
                                    <a href="https://www.amazon.com" target="_blank">
                                        <img src="https://logos-world.net/wp-content/uploads/2020/04/Amazon-Logo.png" alt="Amazon" class="store-logo">
                                        <div class="store-name">Amazon</div>
                                    </a>
                                </div>
                                <div class="store-item">
                                    <a href="https://www.kohls.com/" target="_blank"><img src="img/LOGOS/Kohl's_logo.svg.png" alt="Kohls Logo" class="store-logo">
                                    <div class="store-name">Kohl's</div>
                                    </a>
                                </div>
                                <div class="store-item">
                                    <a href="https://www.walmart.com/" target="_blank"><img src="img/LOGOS/Walmart_logo.svg.png" alt="walmart" class="store-logo">
                                        <div class="store-name">Walmart</div>
                                    </a>
                                </div>
                                <div class="store-item">
                                    <a href="https://www.kmart.com/" target="_blank"><img src="img/LOGOS/Kmart_logo.svg.png" alt="kmart" class="store-logo">
                                        <div class="store-name">Kmart</div>
                                    </a>
                                </div>
                                 <div class="store-item">
                                    <a href="https://www.bedbathandbeyond.com/" target="_blank"><img src="img/LOGOS/bedbathandbeyond.png" alt="Bedbathandbeyond" class="store-logo">
                                        <div class="store-name">BedBathandBeyond</div>
                                    </a>
                                </div>                               
                            </div>
                        </div>
                    </div>

                    <!-- Electrónica -->
                    <div class="categoria-card electronica" onclick="toggleTiendas('electronica')">
                        <img src="https://images.unsplash.com/photo-1498049794561-7780e7231661?w=400&h=300&fit=crop" alt="Electrónica" class="categoria-imagen">
                        <div class="categoria-titulo">📱 Electrónica</div>
                        <div id="tiendasElectronica" class="tiendas-expandible">
                            <div class="store-grid">
                                <div class="store-item">
                                    <a href="https://www.amazon.com" target="_blank">
                                        <img src="https://logos-world.net/wp-content/uploads/2020/04/Amazon-Logo.png" alt="Amazon" class="store-logo">
                                        <div class="store-name">Amazon</div>
                                    </a>
                                </div>
                                <div class="store-item">
                                    <a href="https://www.apple.com" target="_blank">
                                        <img src="https://logos-world.net/wp-content/uploads/2020/04/Apple-Logo.png" alt="Apple" class="store-logo">
                                        <div class="store-name">Apple</div>
                                    </a>
                                </div>
                                <div class="store-item">
                                    <a href="https://www.bestbuy.com/" target="_blank"><img src="img/LOGOS/best-buy-logo.png" alt="Bestbuy" class="store-logo">
                                        <div class="store-name">Best Buy</div>
                                    </a>
                                </div>
                                <div class="store-item">
                                    <a href="https://www.walmart.com/" target="_blank"><img src="img/LOGOS/Walmart_logo.svg.png" alt="walmart" class="store-logo">
                                        <div class="store-name">Walmart</div>
                                    </a>
                                </div>
                                <div class="store-item">
                                    <a href="https://www.sony.com/en/" target="_blank"><img src="img/LOGOS/sony.webp" alt="Sony" class="store-logo"></a>
                                        <div class="store-name">Sony</div>
                                    </a>
                                </div>
                                <div class="store-item">
                                    <a href="https://www.newegg.com/" target="_blank"><img src="img/LOGOS/newegg.png" alt="Newegg" class="store-logo"></a>
                                        <div class="store-name">Sony</div>
                                    </a>
                                </div>                                                                
                            </div>
                        </div>
                    </div>

                    <!-- Disfraces -->
                    <div class="categoria-card disfraces" onclick="toggleTiendas('disfraces')">
                        <img src="img/disfraces.jpeg" alt="Disfraces" class="categoria-imagen">
                        <div class="categoria-titulo">🎭 Disfraces</div>
                        <div id="tiendasDisfraces" class="tiendas-expandible">
                            <div class="store-grid">
                                <div class="store-item">
                                    <a href="https://www.disneystore.com/" target="_blank"><img src="img/LOGOS/disney-store-logo.svg" alt="Disneystore" class="store-logo">
                                        <div class="store-name">Disney Store</div>
                                    </a>
                                </div>
                                <div class="store-item">
                                    <a href="https://www.partycity.com/" target="_blank"><img src="img/LOGOS/party.svg" alt="Partycity" class="store-logo">
                                        <div class="store-name">Party City</div>
                                    </a>
                                </div>
                                <div class="store-item">
                                    <a href="https://www.amazon.com" target="_blank">
                                        <img src="https://logos-world.net/wp-content/uploads/2020/04/Amazon-Logo.png" alt="Amazon" class="store-logo">
                                        <div class="store-name">Amazon</div>
                                    </a>
                                </div>
                                 <div class="store-item">
                                    <a href="https://www.rakuten.com/" target="_blank"><img src="img/LOGOS/rak-logo-brand-v1.svg" alt="Rakuten" class="store-logo">
                                        <div class="store-name">Amazon</div>
                                    </a>
                                </div>                               
                            </div>
                        </div>
                    </div>

                    <!-- Oficina -->
                    <div class="categoria-card oficina" onclick="toggleTiendas('oficina')">
                        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=400&h=300&fit=crop" alt="Oficina" class="categoria-imagen">
                        <div class="categoria-titulo">🏢 Oficina</div>
                        <div id="tiendasOficina" class="tiendas-expandible">
                            <div class="store-grid">
                                <div class="store-item">
                                    <a href="https://www.amazon.com" target="_blank">
                                        <img src="https://logos-world.net/wp-content/uploads/2020/04/Amazon-Logo.png" alt="Amazon" class="store-logo">
                                        <div class="store-name">Amazon</div>
                                    </a>
                                </div>
                                <div class="store-item">
                                    <a href="https://www.bestbuy.com/" target="_blank"><img src="img/LOGOS/best-buy-logo.png" alt="Bestbuy" class="store-logo">
                                        <div class="store-name">Best Buy</div>
                                    </a>
                                </div>
                                <div class="store-item">
                                    <a href="https://www.kmart.com/" target="_blank"><img src="img/LOGOS/Kmart_logo.svg.png" alt="kmart" class="store-logo">
                                        <div class="store-name">Kmart</div>
                                    </a>
                                </div>
                                <div class="store-item">
                                    <a href="https://www.walmart.com/" target="_blank"><img src="img/LOGOS/Walmart_logo.svg.png" alt="walmart" class="store-logo">
                                        <div class="store-name">Walmart</div>
                                    </a>
                                </div>
                                <div class="store-item">
                                    <a href="https://www.officedepot.com/" target="_blank"><img src="img/LOGOS/officedepot.svg" alt="walmart" class="store-logo">
                                        <div class="store-name">Officedepot</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Repuestos & Autopartes -->
                    <div class="categoria-card repuestos" onclick="toggleTiendas('repuestos')">
                        <img src="https://images.unsplash.com/photo-1486262715619-67b85e0b08d3?w=400&h=300&fit=crop" alt="Repuestos" class="categoria-imagen">
                        <div class="categoria-titulo">🔧 Repuestos & Autopartes</div>
                        <div id="tiendasRepuestos" class="tiendas-expandible">
                            <div class="store-grid">
                                <div class="store-item">
                                    <a href="https://www.audiusa.com/en/" target="_blank">
                                        <img src="img/LOGOS/audi-logo.png" alt="Audiusa" class="store-logo">
                                        <div class="store-name">Audi USA</div>
                                    </a>
                                </div>
                                 <div class="store-item">
                                    <a href="https://www.ebay.com/" target="_blank">
                                        <img src="img/LOGOS/EBay_logo.svg.png" alt="EBay" class="store-logo">
                                        <div class="store-name">ebay</div>
                                    </a>
                                </div>
                                <div class="store-item">
                                    <a href="https://shop.bmwusa.com/" target="_blank">
                                        <img src="img/LOGOS/BMW.svg.png" alt="BMW" class="store-logo">
                                        <div class="store-name">Shop BMW M Performance Parts</div>
                                    </a>
                                </div>
                                <div class="store-item">
                                    <a href="https://www.subaruonlineparts.com/" target="_blank">
                                        <img src="img/LOGOS/Subaru-logo-scaled.webp" alt="Subaru" class="store-logo">
                                        <div class="store-name">SubaruOnlineParts</div>
                                    </a>
                                </div>
                                <div class="store-item">
                                    <a href="https://mbparts.mbusa.com/" target="_blank">
                                        <img src="img/LOGOS/mercedes.png" alt="Mercedes" class="store-logo">
                                        <div class="store-name">Mercedes-Bens Parts</div>
                                    </a>
                                </div>
                                <div class="store-item">
                                    <a href="https://autoparts.toyota.com/" target="_blank">
                                        <img src="img/LOGOS/toyota.webp" alt="Toyota" class="store-logo">
                                        <div class="store-name">Toyota Parts Center Online</div>
                                    </a>
                                </div>
                                <div class="store-item">
                                    <a href="https://www.uspartslocators.com/" target="_blank">
                                        <img src="img/LOGOS/parts_locators.png" alt="uspartslocators" class="store-logo">
                                        <div class="store-name">US Parts Locators</div>
                                    </a>
                                </div>
                                <div class="store-item">
                                    <a href="https://www.rockauto.com/" target="_blank">
                                        <img src="img/LOGOS/rockauto.png" alt="Rockauto" class="store-logo">
                                        <div class="store-name">ROCKAUTO</div>
                                    </a>
                                </div>
                                 <div class="store-item">
                                    <a href="https://www.walmart.com/" target="_blank"><img src="img/LOGOS/Walmart_logo.svg.png" alt="walmart" class="store-logo">
                                        <div class="store-name">Walmart</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Juguetes -->
                    <div class="categoria-card juguetes" onclick="toggleTiendas('juguetes')">
                        <img src="https://images.unsplash.com/photo-1545558014-8692077e9b5c?w=400&h=300&fit=crop" alt="Juguetes" class="categoria-imagen">
                        <div class="categoria-titulo">🧸 Juguetes Coleccionables</div>
                        <div id="tiendasJuguetes" class="tiendas-expandible">
                            <div class="store-grid">
<div class="store-item">
  <a href="https://www.amazon.com/" target="_blank">
    <img src="https://logos-world.net/wp-content/uploads/2020/04/Amazon-Logo.png" alt="amazon" class="store-logo">
    <div class="store-name">Amazon</div>
  </a>
</div>

<div class="store-item">
  <a href="https://www.americangirl.com/" target="_blank">
    <img src="img/LOGOS/americangirl.png" alt="americangirl" class="store-logo">
    <div class="store-name">American Girl</div>
  </a>
</div>

<div class="store-item">
  <a href="https://www.gap.com/Asset_Archive/AllBrands/franchiseLandingPages/gap/franchiseLanding-gap-pe.html" target="_blank">
    <img src="img/LOGOS/gap.png" alt="gap" class="store-logo">
    <div class="store-name">Gap</div>
  </a>
</div>

<div class="store-item">
  <a href="https://www.carters.com/" target="_blank">
    <img src="img/LOGOS/Carters.png" alt="carters" class="store-logo">
    <div class="store-name">Carters</div>
  </a>
</div>

<div class="store-item">
  <a href="https://funko.com/" target="_blank">
    <img src="img/LOGOS/funko.svg" alt="funko" class="store-logo">
    <div class="store-name">Funko</div>
  </a>
</div>

<div class="store-item">
  <a href="https://www.disneystore.com/" target="_blank">
    <img src="img/LOGOS/disney-store-logo.svg" alt="disney" class="store-logo">
    <div class="store-name">Disney Store</div>
  </a>
</div>

<div class="store-item">
  <a href="https://www.entertainmentearth.com/" target="_blank">
    <img src="img/LOGOS/EE_logo.svg" alt="entertainmentearth" class="store-logo">
    <div class="store-name">Entertainment Earth</div>
  </a>
</div>

<div class="store-item">
  <a href="https://kids.mattel.com/hot-wheels" target="_blank">
    <img src="img/LOGOS/Hot-Wheels-Logo.png" alt="hotwheels" class="store-logo">
    <div class="store-name">Hot Wheels</div>
  </a>
</div>

<div class="store-item">
  <a href="https://www.lego.com/en-us?consent-modal=show&age-gate=grown_up" target="_blank">
    <img src="img/LOGOS/LEGO_logo.png" alt="lego" class="store-logo">
    <div class="store-name">LEGO</div>
  </a>
</div>

<div class="store-item">
  <a href="https://www.pokemoncenter.com/" target="_blank">
    <img src="img/LOGOS/pokemoncenter_logo.png" alt="pokemon" class="store-logo">
    <div class="store-name">Pokemon Center</div>
  </a>
</div>

<div class="store-item">
  <a href="https://www.childrensplace.com/us/home" target="_blank">
    <img src="img/LOGOS/Childrens_Place_Logo.png" alt="childrensplace" class="store-logo">
    <div class="store-name">Children’s Place</div>
  </a>
</div>

<div class="store-item">
  <a href="https://ustoy.com/" target="_blank">
    <img src="img/LOGOS/us_toys-logo.png" alt="ustoy" class="store-logo">
    <div class="store-name">US Toy</div>
  </a>
</div>

<div class="store-item">
  <a href="https://www.walmart.com/" target="_blank">
    <img src="img/LOGOS/Walmart-Logo.png" alt="walmart" class="store-logo">
    <div class="store-name">Walmart</div>
  </a>
</div>
                            </div>
                        </div>
                    </div>

                    <!-- Ropa & Vestimenta -->
                    <div class="categoria-card ropa" onclick="toggleTiendas('ropa')">
                        <img src="https://images.unsplash.com/photo-1445205170230-053b83016050?w=400&h=300&fit=crop" alt="Ropa" class="categoria-imagen">
                        <div class="categoria-titulo">👕 Ropa & Vestimenta</div>
                        <div id="tiendasRopa" class="tiendas-expandible">
                            <div class="store-grid">
                               <div class="store-item">
  <a href="https://www.amazon.com/" target="_blank">
    <img src="https://logos-world.net/wp-content/uploads/2020/04/Amazon-Logo.png" alt="amazon" class="store-logo">
    <div class="store-name">Amazon</div>
  </a>
</div>

<div class="store-item">
  <a href="https://www.carters.com/" target="_blank">
    <img src="img/LOGOS/Carters.png" alt="carters" class="store-logo">
    <div class="store-name">Carters</div>
  </a>
</div>

<div class="store-item">
  <a href="https://www.coachoutlet.com/" target="_blank">
    <img src="img/LOGOS/Coach-Logo.png" alt="coachoutlet" class="store-logo">
    <div class="store-name">Coach Outlet</div>
  </a>
</div>

<div class="store-item">
  <a href="https://www.champssports.com/" target="_blank">
    <img src="img/LOGOS/champssports.png" alt="champssports" class="store-logo">
    <div class="store-name">Champs Sports</div>
  </a>
</div>

<div class="store-item">
  <a href="https://www.ebags.com/" target="_blank">
    <img src="img/LOGOS/Samsonite-Logo.png" alt="ebags" class="store-logo">
    <div class="store-name">Samsonite</div>
  </a>
</div>

<div class="store-item">
  <a href="https://www.finishline.com/" target="_blank">
    <img src="img/LOGOS/finish-line-inc-logo.svg" alt="finishline" class="store-logo">
    <div class="store-name">Finish Line</div>
  </a>
</div>

<div class="store-item">
  <a href="https://www.forever21.com/" target="_blank">
    <img src="img/LOGOS/forever-21-logo.png" alt="forever21" class="store-logo">
    <div class="store-name">Forever 21</div>
  </a>
</div>

<div class="store-item">
  <a href="https://www.gap.com/" target="_blank">
    <img src="img/LOGOS/gap.png" alt="gap" class="store-logo">
    <div class="store-name">Gap</div>
  </a>
</div>

<div class="store-item">
  <a href="https://www.kohls.com/" target="_blank">
    <img src="img/LOGOS/Kohl's_logo.svg.png" alt="kohls" class="store-logo">
    <div class="store-name">Kohl's</div>
  </a>
</div>

<div class="store-item">
  <a href="https://www.macys.com/" target="_blank">
    <img src="img/LOGOS/Macys_Logo.png" alt="macys" class="store-logo">
    <div class="store-name">Macy's</div>
  </a>
</div>

<div class="store-item">
  <a href="https://www.nike.com/" target="_blank">
    <img src="img/LOGOS/nike.png" alt="nike" class="store-logo">
    <div class="store-name">Nike</div>
  </a>
</div>

<div class="store-item">
  <a href="https://oldnavy.gap.com/" target="_blank">
    <img src="img/LOGOS/Old_Navy_Logo.png" alt="oldnavy" class="store-logo">
    <div class="store-name">Old Navy</div>
  </a>
</div>

<div class="store-item">
  <a href="https://www.nordstrom.com/" target="_blank">
    <img src="img/LOGOS/Nordstrom-logo.png" alt="nordstrom" class="store-logo">
    <div class="store-name">Nordstrom</div>
  </a>
</div>

<div class="store-item">
  <a href="https://www.quiksilver.com/" target="_blank">
    <img src="img/LOGOS/Quicksilver-Logo.png" alt="quiksilver" class="store-logo">
    <div class="store-name">Quiksilver</div>
  </a>
</div>

<div class="store-item">
  <a href="https://www.zappos.com/" target="_blank">
    <img src="img/LOGOS/zappos-logo_brandlogos.png" alt="zappos" class="store-logo">
    <div class="store-name">Zappos</div>
  </a>
</div>

<div class="store-item">
  <a href="https://www.zara.com/us/" target="_blank">
    <img src="img/LOGOS/Zara_Logo.png" alt="zara" class="store-logo">
    <div class="store-name">Zara</div>
  </a>
</div>

<div class="store-item">
  <a href="https://www.armani.com/en-wx/" target="_blank">
    <img src="img/LOGOS/armani.svg" alt="armani" class="store-logo">
    <div class="store-name">Armani</div>
  </a>
</div>

<div class="store-item">
  <a href="https://bananarepublic.gap.com/" target="_blank">
    <img src="img/LOGOS/Banana-Republic-Logo.png" alt="bananarepublic" class="store-logo">
    <div class="store-name">Banana Republic</div>
  </a>
</div>

<div class="store-item">
  <a href="https://www.aeropostale.com/" target="_blank">
    <img src="img/LOGOS/Aeropostale-Logo.png" alt="aeropostale" class="store-logo">
    <div class="store-name">Aeropostale</div>
  </a>
</div>

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Función para abrir la ventana flotante
        function abrirVentana() {
            const ventana = document.getElementById('ventanaFlotante');
            ventana.classList.add('mostrar');
            document.body.style.overflow = 'hidden'; // Evitar scroll del fondo
        }

        // Función para cerrar la ventana flotante
        function cerrarVentana() {
            const ventana = document.getElementById('ventanaFlotante');
            ventana.classList.remove('mostrar');
            document.body.style.overflow = 'auto'; // Restaurar scroll del fondo
            
            // Cerrar todas las categorías expandidas
            document.querySelectorAll('.tiendas-expandible').forEach(div => {
                div.classList.remove('mostrar');
            });
            
            // Restaurar texto del botón
            const btn = document.querySelector('.btn-ver-mas');
            btn.textContent = 'Ver Todas las Categorías';
        }

        // Función para capitalizar primera letra
        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

        // Función para expandir/colapsar tiendas
        function toggleTiendas(categoria) {
            // Cerrar todas las categorías abiertas
            document.querySelectorAll('.tiendas-expandible').forEach(div => {
                if (div.id !== `tiendas${capitalizeFirstLetter(categoria)}`) {
                    div.classList.remove('mostrar');
                }
            });
            
            // Alternar la categoría seleccionada
            const tiendasDiv = document.getElementById(`tiendas${capitalizeFirstLetter(categoria)}`);
            tiendasDiv.classList.toggle('mostrar');
            
            // Scroll suave al elemento expandido
            if (tiendasDiv.classList.contains('mostrar')) {
                setTimeout(() => {
                    tiendasDiv.scrollIntoView({ 
                        behavior: 'smooth', 
                        block: 'nearest' 
                    });
                }, 300);
            }
        }

        // Función para alternar todas las categorías
        function toggleAllCategories() {
            const expandibles = document.querySelectorAll('.tiendas-expandible');
            const algunaAbierta = Array.from(expandibles).some(div => div.classList.contains('mostrar'));
            
            expandibles.forEach(div => {
                if (algunaAbierta) {
                    div.classList.remove('mostrar');
                } else {
                    div.classList.add('mostrar');
                }
            });
            
            // Cambiar texto del botón
            const btn = document.querySelector('.btn-ver-mas');
            if (algunaAbierta) {
                btn.textContent = 'Ver Todas las Categorías';
            } else {
                btn.textContent = 'Cerrar Todas las Categorías';
            }
        }

        // Cerrar ventana con tecla ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                cerrarVentana();
            }
        });

        // Cerrar ventana al hacer clic fuera del contenido
        document.getElementById('ventanaFlotante').addEventListener('click', function(e) {
            if (e.target === this) {
                cerrarVentana();
            }
        });
    </script>