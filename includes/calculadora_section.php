    <section id="calculo-envio" class="calculo-section">
        <div class="calculo-flex">
            <!-- Columna izquierda: formulario -->
            <div class="calculo-formulario">
                <h2 class="calculo-title">Calcular Envío</h2>
                
                <div class="calculo-input-group">
                    <label for="costo-producto" class="calculo-label">
                        <h3>Costo del Producto:</h3>
                    </label>
                    <div class="calculo-input-wrapper">
                        <span class="calculo-currency-symbol">$</span>
                        <input type="number" id="costo-producto" placeholder="0.00" step="0.01" min="0" />
                        <span class="calculo-currency-text">USD</span>
                    </div>
                </div>

                <div class="calculo-input-group">
                    <label for="peso" class="calculo-label">
                        <h3>Peso del Producto:</h3>
                    </label>
                    <div class="calculo-input-wrapper">
                        <input type="number" id="peso" placeholder="2.5" step="0.1" min="0.1" />
                        <span class="calculo-unit-text">Kg</span>
                    </div>
                </div>

                <div class="calculo-fixed-cost">
                    <h3>Desaduanaje fijo por guía:</h3>
                    <div class="calculo-cost-highlight">$5.00 USD</div>
                </div>

                <div class="calculo-services-section">
                    <h3>Servicios adicionales:</h3>
                    <div class="calculo-checkbox-group">
                        <label class="calculo-checkbox-label">
                            <input type="checkbox" class="extra" value="5" data-service="Reempaque">
                            <span class="calculo-checkmark"></span>
                            <span class="calculo-service-text">Reempaque <span class="calculo-service-price">($5.00)</span></span>
                        </label>
                        <label class="calculo-checkbox-label">
                            <input type="checkbox" class="extra" value="3" data-service="Cambio de Consignatario">
                            <span class="calculo-checkmark"></span>
                            <span class="calculo-service-text">Cambio de Consignatario <span class="calculo-service-price">($3.00)</span></span>
                        </label>
                        <label class="calculo-checkbox-label">
                            <input type="checkbox" class="extra" value="1" data-service="Compra">
                            <span class="calculo-checkmark"></span>
                            <span class="calculo-service-text">Compra <span class="calculo-service-price">($1.00)</span></span>
                        </label>
                    </div>
                </div>

                <button class="calculo-btn-calcular" onclick="calcularEnvio()">
                    <span>Calcular Envío</span>
                </button>
            </div>

            <!-- Columna derecha: resultado -->
            <div class="calculo-resultado">
                <h2 class="calculo-title">Resultado del Envío</h2>
                
                <div id="resultado-envio" class="calculo-resultado-content">
                    <div class="calculo-placeholder-text">
                        <i class="calculo-icon-calculator"></i>
                        <p>Ingrese el costo del producto y el peso para calcular el envío completo</p>
                    </div>
                </div>

                <a href="https://api.whatsapp.com/send?phone=51953420927&text=Hola%20IFAST%2C%20quiero%20informaci%C3%B3n%20del%20servicio%20" 
                   class="calculo-btn-cotizar" role="button">
                    <span>💬 Cotizar Ahora</span>
                </a>
            </div>
        </div>
    </section>

    <style>
        /* Estilos para la sección de cálculo de envío */
        .calculo-section {
            background: #ffff;
            padding: 10px;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            margin: 40px 0;
        }

        .calculo-flex {
            display: flex;
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto;
            align-items: flex-start;
        }

        .calculo-formulario {
            flex: 1;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 25%, #0f1419 50%, #1a1a2e 75%, #16213e 100%);
            padding: 40px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 204, 0, 0.2);
        }

        .calculo-resultado {
            flex: 1;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 25%, #0f1419 50%, #1a1a2e 75%, #16213e 100%);
            padding: 40px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 204, 0, 0.3);
            position: relative;
            overflow: hidden;
        }

        .calculo-title {
            color: #ffcc00;
            font-size: 2.2rem;
            margin-bottom: 30px;
            text-align: center;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .calculo-input-group {
            margin-bottom: 25px;
        }

        .calculo-label {
            display: block;
            margin-bottom: 8px;
        }

        .calculo-label h3 {
            color: #ffcc00;
            font-size: 1.1rem;
            margin: 0;
            font-weight: 600;
        }

        .calculo-input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgb(255, 204, 0);
            border-radius: 10px;
            padding: 20px;
            transition: all 0.3s ease;
        }

        .calculo-input-wrapper:focus-within {
            border-color: #ffcc00;
            box-shadow: 0 0 30px rgba(255, 204, 0, 0.3);
        }

        .calculo-input-wrapper input {
            background: transparent;
            border: none;
            color: #ffcc00;
            font-size: 1.1rem;
            padding: 15px 10px;
            flex: 1;
            outline: none;
        }

        .calculo-input-wrapper input::placeholder {
            color: rgba(255, 255, 255, 0.52);
        }

        .calculo-currency-symbol, .calculo-unit-text, .calculo-currency-text {
            color: #ffcc00;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .calculo-fixed-cost {
            background: rgba(255, 204, 0, 0.1);
            padding: 20px;
            border-radius: 10px;
            margin: 25px 0;
            border-left: 4px solid #ffcc00;
        }

        .calculo-fixed-cost h3 {
            color: #ffcc00;
            margin: 0 0 10px 0;
            font-size: 1.1rem;
        }

        .calculo-cost-highlight {
            color: #fff;
            font-size: 1.5rem;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .calculo-services-section {
            margin: 25px 0;
        }

        .calculo-services-section h3 {
            color: #ffcc00;
            margin-bottom: 15px;
            font-size: 1.1rem;
        }

        .calculo-checkbox-group {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .calculo-checkbox-label {
            display: flex;
            align-items: center;
            cursor: pointer;
            padding: 12px;
            border-radius: 8px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.05);
        }

        .calculo-checkbox-label:hover {
            background: rgba(255, 204, 0, 0.1);
            transform: translateX(5px);
        }

        .calculo-checkbox-label input[type="checkbox"] {
            display: none;
        }

        .calculo-checkmark {
            width: 20px;
            height: 20px;
            border: 7px solid #ffcc00;
            border-radius: 4px;
            margin-right: 12px;
            position: relative;
            transition: all 0.3s ease;
        }

        .calculo-checkbox-label input[type="checkbox"]:checked + .calculo-checkmark {
            background: #ffcc00;
        }

        .calculo-checkbox-label input[type="checkbox"]:checked + .calculo-checkmark::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #1c2b3a;
            font-weight: bold;
            font-size: 14px;
        }

        .calculo-service-text {
            color: #fff;
            font-size: 1rem;
        }

        .calculo-service-price {
            color: #ffcc00;
            font-weight: 600;
        }

        .calculo-btn-calcular {
            width: 100%;
            background: linear-gradient(135deg, #ffcc00, #ffa500);
            color: #1c2b3a;
            border: none;
            padding: 18px;
            border-radius: 10px;
            font-size: 1.2rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 8px 20px rgba(255, 204, 0, 0.3);
        }

        .calculo-btn-calcular:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(255, 204, 0, 0.4);
        }

        .calculo-btn-calcular:active {
            transform: translateY(0);
        }

        .calculo-resultado-content {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 30px;
            min-height: 200px;
            border: 1px solid rgba(255, 204, 0, 0.2);
        }

        .calculo-placeholder-text {
            text-align: center;
            color: rgba(255, 255, 255, 0.7);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .calculo-icon-calculator {
            font-size: 3rem;
            margin-bottom: 15px;
        }

        .calculo-icon-calculator::before {
            content: '🧮';
        }

        .calculo-desglose-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid rgba(255, 204, 0, 0.2);
            color: #fff;
        }

        .calculo-desglose-item:last-child {
            border-bottom: none;
            font-weight: 700;
            font-size: 1.1rem;
            color: #ffcc00;
            border-top: 2px solid #ffcc00;
            padding-top: 15px;
            margin-top: 10px;
        }

        .calculo-btn-cotizar {
            display: block;
            width: 100%;
            background: linear-gradient(135deg, #25D366, #128C7E);
            color: white;
            text-decoration: none;
            padding: 18px;
            border-radius: 10px;
            text-align: center;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(37, 211, 102, 0.3);
        }

        .calculo-btn-cotizar:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(37, 211, 102, 0.4);
            text-decoration: none;
            color: white;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .calculo-flex {
                flex-direction: column;
                gap: 20px;
            }
            
            .calculo-formulario, .calculo-resultado {
                padding: 25px;
            }
            
            .calculo-title {
                font-size: 1.8rem;
            }
            
            .calculo-section {
                padding: 30px 15px;
            }
        }
    </style>

    <script>
        function calcularEnvio() {
            // Obtener valores del formulario
            const costoProducto = parseFloat(document.getElementById('costo-producto').value) || 0;
            const pesoInput = parseFloat(document.getElementById('peso').value) || 0;
            
            // Validaciones
            if (costoProducto <= 0) {
                mostrarError('Por favor, ingrese un costo de producto válido');
                return;
            }
            
            if (pesoInput <= 0) {
                mostrarError('Por favor, ingrese un peso válido');
                return;
            }
            
            // Aplicar regla del peso mínimo (redondear a 1kg si es menor)
            const pesoParaCalculo = pesoInput < 1 ? 1 : pesoInput;
            
            // Cálculo del costo por peso (ejemplo: $10.00 por kg)
            const costoPorKg = 10;
            const costoEnvio = pesoParaCalculo * costoPorKg;
            
            // Desaduanaje fijo
            const desaduanaje = 5.00;
            
            // Servicios adicionales - CORREGIDO
            const checkboxes = document.querySelectorAll('.extra:checked');
            let serviciosAdicionales = 0;
            const serviciosSeleccionados = [];
            
            checkboxes.forEach(checkbox => {
                const valor = parseFloat(checkbox.value);
                serviciosAdicionales += valor;
                
                // Obtener el nombre del servicio del atributo data-service
                const servicioNombre = checkbox.getAttribute('data-service');
                serviciosSeleccionados.push({
                    nombre: servicioNombre,
                    costo: valor
                });
            });
            
            console.log('Servicios seleccionados:', serviciosSeleccionados);
            console.log('Total servicios adicionales:', serviciosAdicionales);
            
            // Cálculo total
            const totalEnvio = costoEnvio + desaduanaje + serviciosAdicionales;
            const totalGeneral = costoProducto + totalEnvio;
            
            // Mostrar resultado
            mostrarResultado({
                costoProducto,
                pesoOriginal: pesoInput,
                pesoFacturado: pesoParaCalculo,
                costoEnvio,
                desaduanaje,
                serviciosAdicionales,
                serviciosSeleccionados,
                totalEnvio,
                totalGeneral
            });
        }

        function mostrarResultado(datos) {
            const resultadoDiv = document.getElementById('resultado-envio');
            
            let serviciosHTML = '';
            if (datos.serviciosSeleccionados.length > 0) {
                serviciosHTML = datos.serviciosSeleccionados.map(servicio => 
                    `<div class="calculo-desglose-item">
                        <span>${servicio.nombre}</span>
                        <span>$${servicio.costo.toFixed(2)}</span>
                    </div>`
                ).join('');
            }
            
            const pesoInfo = datos.pesoOriginal < 1 ? 
                `<small style="color: #ffa500;">(Peso mínimo facturable: 1 kg)</small>` : '';
            
            resultadoDiv.innerHTML = `
                <div class="calculo-desglose-item">
                    <span>Costo del Producto</span>
                    <span>$${datos.costoProducto.toFixed(2)}</span>
                </div>
                <div class="calculo-desglose-item">
                    <span>Peso: ${datos.pesoOriginal} kg ${pesoInfo}</span>
                    <span>$${datos.costoEnvio.toFixed(2)}</span>
                </div>
                <div class="calculo-desglose-item">
                    <span>Desaduanaje</span>
                    <span>$${datos.desaduanaje.toFixed(2)}</span>
                </div>
                ${serviciosHTML}
                <div class="calculo-desglose-item">
                    <span><strong>TOTAL ENVÍO</strong></span>
                    <span><strong>$${datos.totalEnvio.toFixed(2)}</strong></span>
                </div>
                <div class="calculo-desglose-item">
                    <span><strong>TOTAL GENERAL</strong></span>
                    <span><strong>$${datos.totalGeneral.toFixed(2)}</strong></span>
                </div>
               <div class="advertencia-impuesto" style="margin-top: 15px; padding: 10px; background-color: #fff3cd; border: 1px solid #ffeaa7; border-radius: 5px; color: #856404;">
               <strong>⚠️ Si el valor de su pedido supera los $200 dólares, estará sujeto al pago del impuesto correspondiente establecido por aduanas.</strong>
              </div>
            `;
        }

        function mostrarError(mensaje) {
            const resultadoDiv = document.getElementById('resultado-envio');
            resultadoDiv.innerHTML = `
                <div style="text-align: center; color: #ffcc00; padding: 20px;">
                    <div style="font-size: 2rem; margin-bottom: 10px;">⚠️</div>
                    <p>${mensaje}</p>
                </div>
            `;
        }

        // Validación en tiempo real
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input[type="number"]');
            
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    if (this.value < 0) {
                        this.value = 0;
                    }
                });
            });
        });
    </script>

