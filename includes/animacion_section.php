<style>
       

        .animation-container {
            padding: 100px;

            width: min(900px, 95vw);
            height: min(500px, 70vh);
            background: linear-gradient(to bottom, #87CEEB 0%, #87CEEB 60%, #90EE90 60%, #32CD32 100%);
            border-radius: min(20px, 2vw);
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            border: 3px solid #ffcc00;
        }

        /* Nubes decorativas */
        .cloud {
            position: absolute;
            background: white;
            border-radius: 50px;
            opacity: 0.8;
        }

        .cloud:before, .cloud:after {
            content: '';
            position: absolute;
            background: white;
            border-radius: 50px;
        }

        .cloud1 {
            width: 6.7vw;
            height: 2.2vw;
            top: 16%;
            left: 11%;
            animation: float 8s infinite ease-in-out;
        }

        .cloud1:before {
            width: 3.3vw;
            height: 3.3vw;
            top: -1.7vw;
            left: 1.1vw;
        }

        .cloud1:after {
            width: 4.4vw;
            height: 2.8vw;
            top: -1.1vw;
            right: 1.1vw;
        }

        .cloud2 {
            width: 8.9vw;
            height: 2.8vw;
            top: 24%;
            right: 17%;
            animation: float 10s infinite ease-in-out reverse;
        }

        .cloud2:before {
            width: 3.9vw;
            height: 3.9vw;
            top: -2vw;
            left: 1.7vw;
        }

        .cloud2:after {
            width: 5vw;
            height: 3.3vw;
            top: -1.7vw;
            right: 1.7vw;
        }

        @keyframes float {
            0%, 100% { transform: translateX(0) translateY(0); }
            25% { transform: translateX(2.2vw) translateY(-1.1vw); }
            50% { transform: translateX(4.4vw) translateY(0); }
            75% { transform: translateX(2.2vw) translateY(1.1vw); }
        }

        /* Avión */
        .airplane {
            position: absolute;
            font-size: clamp(20px, 4.4vw, 40px);
            color: #ffffff;
            top: 10%;
            left: -5.6%;
            transform: rotate(-10deg);
            animation: airplane-landing 15s infinite ease-in-out;
            z-index: 10;
        }

        @keyframes airplane-landing {
            0% { left: -5.6%; top: 10%; transform: rotate(-10deg); }
            15% { left: 22.2%; top: 36%; transform: rotate(0deg); }
            20% { left: 24.4%; top: 40%; transform: rotate(0deg); }
            25% { left: 24.4%; top: 40%; transform: rotate(0deg); }
            100% { left: 24.4%; top: 40%; transform: rotate(0deg); }
        }

        /* Persona saliendo del avión */
        .person-pilot {
            position: absolute;
            font-size: clamp(15px, 3.3vw, 30px);
            color: #ffcc00;
            top: 46%;
            left: 26.7%;
            opacity: 0;
            animation: person-exit 15s infinite ease-in-out;
        }

        @keyframes person-exit {
            0%, 25% { opacity: 0; transform: translateX(0); }
            30% { opacity: 1; transform: translateX(0); }
            40% { opacity: 1; transform: translateX(3.3vw); }
            45% { opacity: 1; transform: translateX(3.3vw); }
            100% { opacity: 1; transform: translateX(3.3vw); }
        }

        /* Paquete siendo entregado */
        .package {
            position: absolute;
            font-size: clamp(12px, 2.8vw, 25px);
            color: #8B4513;
            top: 47%;
            left: 30%;
            opacity: 0;
            animation: package-delivery 15s infinite ease-in-out;
        }

        @keyframes package-delivery {
            0%, 30% { opacity: 0; transform: translateX(0); }
            35% { opacity: 1; transform: translateX(0); }
            50% { opacity: 1; transform: translateX(16.7vw); }
            55% { opacity: 0; transform: translateX(16.7vw); }
            100% { opacity: 0; transform: translateX(16.7vw); }
        }

        /* Warehouse */
        .warehouse {
            position: absolute;
            font-size: clamp(30px, 6.7vw, 60px);
            color: #696969;
            top: 36%;
            left: 44.4%;
        }

        /* Persona saliendo del warehouse */
        .person-worker {
            position: absolute;
            font-size: clamp(15px, 3.3vw, 30px);
            color: #ffcc00;
            top: 46%;
            left: 50%;
            opacity: 0;
            animation: worker-exit 15s infinite ease-in-out;
        }

        @keyframes worker-exit {
            0%, 50% { opacity: 0; transform: translateX(0); }
            55% { opacity: 1; transform: translateX(0); }
            65% { opacity: 1; transform: translateX(5.6vw); }
            70% { opacity: 0; transform: translateX(5.6vw); }
            100% { opacity: 0; transform: translateX(5.6vw); }
        }

        /* Camión */
        .truck {
            position: absolute;
            font-size: clamp(20px, 4.4vw, 40px);
            color: #ffcc00;
            top: 40%;
            left: 55.6%;
            animation: truck-journey 15s infinite ease-in-out;
        }

        @keyframes truck-journey {
            0%, 65% { left: 55.6%; }
            80% { left: 77.8%; }
            100% { left: 77.8%; }
        }

        /* Casa de destino */
        .house {
            position: absolute;
            font-size: clamp(25px, 5.6vw, 50px);
            color: #8B4513;
            top: 38%;
            left: 83.3%;
        }

        /* Conductor del camión */
        .truck-driver {
            position: absolute;
            font-size: clamp(12px, 2.8vw, 25px);
            color: #32CD32;
            top: 46%;
            left: 80%;
            opacity: 0;
            animation: driver-delivery 15s infinite ease-in-out;
        }

        @keyframes driver-delivery {
            0%, 80% { opacity: 0; transform: translateX(0); }
            82% { opacity: 1; transform: translateX(0); }
            87% { opacity: 1; transform: translateX(3.3vw); }
            92% { opacity: 1; transform: translateX(3.3vw); }
            100% { opacity: 1; transform: translateX(3.3vw); }
        }

        /* Persona recibiendo el paquete */
        .person-receiver {
            position: absolute;
            font-size: clamp(15px, 3.3vw, 30px);
            color: #32CD32;
            top: 46%;
            left: 86.7%;
            opacity: 0;
            animation: receiver-appears 15s infinite ease-in-out;
        }

        @keyframes receiver-appears {
            0%, 82% { opacity: 0; }
            85% { opacity: 1; }
            100% { opacity: 1; }
        }

        /* Paquete final */
        .final-package {
            position: absolute;
            font-size: clamp(12px, 2.8vw, 25px);
            color: #8B4513;
            top: 47%;
            left: 80%;
            opacity: 0;
            animation: final-delivery 15s infinite ease-in-out;
        }

        @keyframes final-delivery {
            0%, 82% { opacity: 0; transform: translateX(0); }
            85% { opacity: 1; transform: translateX(0); }
            90% { opacity: 1; transform: translateX(3.3vw); }
            95% { opacity: 1; transform: translateX(6.7vw); }
            100% { opacity: 1; transform: translateX(6.7vw); }
        }

        /* Título */
        .title {
            position: absolute;
            top: 2%;
            left: 50%;
            transform: translateX(-50%);
            color: #ffffff;
            font-size: clamp(14px, 2.7vw, 24px);
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            z-index: 100;
            text-align: center;
            padding: 0 5px;
        }

        /* Indicadores de progreso */
        .progress-bar {
            position: absolute;
            bottom: 4%;
            left: 50%;
            transform: translateX(-50%);
            width: min(300px, 80%);
            height: 6px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 3px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: #ffcc00;
            border-radius: 3px;
            animation: progress 15s infinite ease-in-out;
        }

        @keyframes progress {
            0% { width: 0%; }
            20% { width: 20%; }
            40% { width: 40%; }
            60% { width: 60%; }
            80% { width: 80%; }
            100% { width: 100%; }
        }

        /* Efectos de partículas */
        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: #ffcc00;
            border-radius: 50%;
            animation: particle-float 3s infinite ease-in-out;
        }

        .particle1 {
            top: 50%;
            left: 27.8%;
            animation-delay: 0s;
        }

        .particle2 {
            top: 44%;
            left: 50%;
            animation-delay: 6s;
        }

        .particle3 {
            top: 48%;
            left: 80%;
            animation-delay: 10s;
        }

        @keyframes particle-float {
            0%, 100% { transform: translateY(0) scale(1); opacity: 0; }
            50% { transform: translateY(-2.2vw) scale(1.5); opacity: 1; }
        }

        /* Responsive para tablets */
        @media (max-width: 768px) {
            .animation-container {
                height: min(400px, 60vh);
                border-radius: 15px;
            }
            
            .title {
                font-size: clamp(12px, 3vw, 20px);
            }
            
            .cloud1 {
                width: 8vw;
                height: 3vw;
            }
            
            .cloud1:before {
                width: 4vw;
                height: 4vw;
                top: -2vw;
            }
            
            .cloud1:after {
                width: 5vw;
                height: 3.5vw;
                top: -1.5vw;
            }
            
            .cloud2 {
                width: 10vw;
                height: 3.5vw;
            }
            
            .cloud2:before {
                width: 4.5vw;
                height: 4.5vw;
                top: -2.5vw;
            }
            
            .cloud2:after {
                width: 6vw;
                height: 4vw;
                top: -2vw;
            }
        }

        /* Responsive para móviles */
        @media (max-width: 480px) {
            body {
                padding: 5px;
            }
            
            .animation-container {
                width: 98vw;
                height: min(350px, 50vh);
                border-radius: 10px;
                border-width: 2px;
            }
            
            .title {
                font-size: clamp(10px, 3.5vw, 18px);
                top: 1%;
            }
            
            .progress-bar {
                width: 90%;
                height: 4px;
                bottom: 2%;
            }
            
            .particle {
                width: 3px;
                height: 3px;
            }
            
            .cloud1, .cloud2 {
                display: none;
            }
            
            @keyframes float {
                0%, 100% { transform: translateX(0) translateY(0); }
                25% { transform: translateX(3vw) translateY(-1.5vw); }
                50% { transform: translateX(6vw) translateY(0); }
                75% { transform: translateX(3vw) translateY(1.5vw); }
            }
        }

        /* Responsive para pantallas muy pequeñas */
        @media (max-width: 320px) {
            .animation-container {
                height: min(280px, 45vh);
            }
            
            .title {
                font-size: 12px;
            }
            
            .airplane, .truck {
                font-size: 18px;
            }
            
            .house, .warehouse {
                font-size: 22px;
            }
            
            .person-pilot, .person-worker, .person-receiver {
                font-size: 16px;
            }
            
            .package, .final-package {
                font-size: 14px;
            }
            
            .truck-driver {
                font-size: 12px;
            }
        }

        /* Responsive para pantallas grandes */
        @media (min-width: 1200px) {
            .animation-container {
                width: 1000px;
                height: 550px;
            }
            
            .title {
                font-size: 28px;
            }
            
            .progress-bar {
                width: 350px;
            }
        }

        /* Optimización para dispositivos con orientación landscape */
        @media (orientation: landscape) and (max-height: 500px) {
            .animation-container {
                height: 85vh;
            }
            
            .title {
                font-size: clamp(10px, 2.5vh, 20px);
            }
        }
    </style>

<center>
        <div class="animation-container">
        <div class="title">🚚 Proceso de Entrega Internacional 📦</div>
        
        <!-- Nubes -->
        <div class="cloud cloud1"></div>
        <div class="cloud cloud2"></div>
        
        <!-- Avión -->
        <div class="airplane"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAC40lEQVR4nO2ZW4hOURTHfwZJbpNMIQqlvkF5EA8uEw+MMomklDxMuaRMbuX6QDQvNJQXfRJFPHgRikIu5WVCmkTxgjCIDCGNYY7WtKZOp3P7zrf3/kbOv/5vZ+1z/uesvfZ/rQM5cjjDRuAecBwYzT+KuYDn4+sSxIwF+tNHcC4gRHg0RdwevfYNcBCooYIYCfwMEdKWIvZuIKYDWEiF0BQiQvgD6JcQeyokrhOYRwXQFiFEOC5FgQiLaweqcYiZMSKECxLip8XEtuAQxQQh6xLiJfU+RcTKvhvvQsQQ4GuCkCMp1rkUE3/CgQ4aE0QIHwMjEtbZHhPfBUy2LeROCiHC71qd5kSsMysh/rxtIZ0phfj5FNgWOPjkVF8F3AS6Q2L+ANNtCnmXQYj/rLgA1ANVvjUnAc3A28D1V2wKaSlDiJ8vgX2BCjUAWApcBn7rdbNtCakGnhgS05tCV4EVwMCAqdyr+8waJugp7BnmB+AwUPDdqyqF5SkLkhKtFsT08gGwHhiKAwwGTkZUHVP8ok3bDBeC6gzvmyjKPXYCo2yKGQTsiPFQJil+7Cww3+b+GQ7sT+HHTPE5sMvmvGCYblYXKefpuXMDWKnnkXFI+VwCXLdcFDwfZRawW7PDCqZoBfrmSNBnLQ7WpjVi0d87EuPpsCOp/S4ZksMfHYrwlK+AiSYE1Kjz9SrIZ+U6heXqo7w+wGJWp5w0qHDNbqC2FBENBh1yu/ZBa7WM9/YqXkamGev2DB1OG3h4KdFngEUh5XMMsFUdcpa1ZTgSi3qdyGd9eHnT14DVOnZKg1rgQIkOQuxTpGE8VsbJLW92Swl+6RawWbtIPwo66X+YIlVDUczYszeXuvEU931t8m1gQ4i1F5FrNM1fBO59KO1vgih26BSxrkz73RCy9q+E5kuawKlJX72gk4+uiBHQRR0uSAqaghjRVv2N8QhYZnDtnmrSqEZtE7DYVc+dI0eOHDly5Pif8Rd+2R+JGFYv5AAAAABJRU5ErkJggg==" alt="airplane-landing"></div>
        
        <!-- Persona piloto -->
        <div class="person-pilot">🧑‍✈️</div>
        
        <!-- Paquete -->
        <div class="package">📦</div>
        
        <!-- Warehouse -->
        <div class="warehouse">🏭</div>
        
        <!-- Conductor del camión -->
        <div class="truck-driver">🚶‍♂️</div>
        
        <!-- Trabajador -->
        <div class="person-worker">👷</div>
        
        <!-- Camión -->
        <div class="truck">🚛</div>
        
        <!-- Casa -->
        <div class="house">🏠</div>
        
        <!-- Persona recibiendo -->
        <div class="person-receiver">🙋‍♂️</div>
        
        <!-- Paquete final -->
        <div class="final-package">📦</div>
        
        <!-- Partículas -->
        <div class="particle particle1"></div>
        <div class="particle particle2"></div>
        <div class="particle particle3"></div>
        
        <!-- Barra de progreso -->
        <div class="progress-bar">
            <div class="progress-fill"></div>
        </div>
    </div>

    </center>
