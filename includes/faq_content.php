<style>

/* ================= FAQ ================= */
.faq-ventana {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.8);
  z-index: 10000;
  justify-content: center;
  align-items: center;
  animation: fadeIn 0.3s ease;
}

.faq-ventana.show {
  display: flex;
}

.faq-contenido {
  background-color: var(--light-color);
  padding: 40px;
  max-width: 800px;
  width: 90%;
  max-height: 80vh;
  overflow-y: auto;
  border-radius: 10px;
  position: relative;
  box-shadow: var(--shadow-lg);
  margin: auto;
  animation: slideIn 0.3s ease;
}

@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

@keyframes slideIn {
  from { 
    transform: translateY(-50px);
    opacity: 0;
  }
  to { 
    transform: translateY(0);
    opacity: 1;
  }
}

.faq-contenido h2 {
  color: var(--primary-color);
  text-align: center;
  margin-bottom: 20px;
  font-size: 2em;
}

.faq-contenido p {
  color: var(--text-color);
  margin-bottom: 30px;
  text-align: center;
  font-size: 1.1em;
}

.faq-item {
  margin-bottom: 15px;
  border-bottom: 1px solid #eee;
  padding-bottom: 15px;
}

.faq-btn-item {
  background-color: var(--primary-color);
  color: var(--light-color);
  padding: 15px 20px;
  font-size: 1.1em;
  width: 100%;
  text-align: left;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: var(--transition);
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.faq-btn-item:hover {
  background-color: var(--accent-color);
}

.faq-btn-item::after {
  content: '+';
  font-size: 1.5em;
  transition: transform 0.3s ease;
}

.faq-btn-item.active::after {
  content: '-';
  transform: rotate(180deg);
}

.faq-respuesta {
  display: none;
  padding: 20px;
  background-color: #f9f9f9;
  border-radius: 0 0 5px 5px;
  margin-top: 5px;
  color: var(--text-color);
  line-height: 1.6em;
  animation: slideDown 0.3s ease;
}

@keyframes slideDown {
  from {
    opacity: 0;
    max-height: 0;
  }
  to {
    opacity: 1;
    max-height: 200px;
  }
}

.faq-respuesta p {
  margin-bottom: 10px;
  text-align: left;
}

.cerrar {
  position: absolute;
  top: 15px;
  right: 20px;
  font-size: 30px;
  color: var(--primary-color);
  cursor: pointer;
  transition: var(--transition);
}

.cerrar:hover {
  color: var(--secondary-color);
  transform: rotate(90deg);
}

/* Responsive */
@media (max-width: 768px) {
  .faq-contenido {
    padding: 20px;
    width: 95%;
    max-height: 85vh;
  }
  
  .faq-contenido h2 {
    font-size: 1.5em;
  }
}


</style>

    <div id="faqVentana" class="faq-ventana">
        <div class="faq-contenido">
            <span class="cerrar" onclick="cerrarVentanaFAQ()">&times;</span>
            <h2>---- Preguntas frecuentes de Shipping ----</h2>
            <h3 style="color: #0f1e2c; text-align: center; margin-bottom: 20px;">Te resolvemos todas las dudas que puedas tener sobre el shipping y sobre nuestro servicio.</h3>

            <!-- Acordeón de preguntas frecuentes -->
            <div class="faq-item">
                <button class="faq-btn-item" onclick="toggleFAQ('faq1')">¿Cómo comprar?</button>
                <div id="faq1" class="faq-respuesta">
                    <p>Si desea realizar una compra tienes dos formas, puedes comprar directamente desde una página americana y poner nuestra dirección en Miami o también podemos comprar por ti, solo tienes que enviar los enlaces de los productos que deseas, para poder realizar la cotización.</p>
                </div>
            </div>
        
            <div class="faq-item">
                <button class="faq-btn-item" onclick="toggleFAQ('faq2')">¿Qué es shipping?</button>
                <div id="faq2" class="faq-respuesta">
                    <p>Envío es cuando el vendedor o tienda en línea pone su compra en manos de un tranportista (Fedex, Dhl, USPS, etc.) para que el paquete llegue a nuestro almacén y sea recibido.</p>
                </div>
            </div>
        
            <div class="faq-item">
                <button class="faq-btn-item" onclick="toggleFAQ('faq3')">¿Qué es la orden de compra?</button>
                <div id="faq3" class="faq-respuesta">
                    <p>La orden de compra es el documento que la tienda en línea envía a su correo electrónico, con esto verifica que su compra ha sido realizada de manera exitosa.</p>
                </div>
            </div>
        
            <div class="faq-item">
                <button class="faq-btn-item" onclick="toggleFAQ('faq4')">¿Qué es el número de tracking?</button>
                <div id="faq4" class="faq-respuesta">
                    <p>El número de tracking es el número de rastreo o número de seguimiento que el transportista(Fedex,Dhl,USPS,etc) Le da al vendedor o a la tienda online para que pueda realizar el seguimiento del paquete hasta la llegada del producto a nuestro almacén.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <button class="faq-btn-item" onclick="toggleFAQ('faq5')">¿Cuáles son los requisitos para una importación rápida y exitosa?</button>
                <div id="faq5" class="faq-respuesta">
                    <p>- Realice su compra en línea De una página americana confiable.</p>
                    <p>- Enviar tu Orden de compra Que la tienda te Envió Al Momento de Realizar El Pago.</p>
                    <p>- Enviarnos El Número de seguimiento</p>
                    <p>- Enviar su DNI o Número de RUC Para Que La Importación vaya consignada a su nombre, ya Que nacionalizaremos tus Productos.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-btn-item" onclick="toggleFAQ('faq6')">¿Se puede importar cualquier producto?</button>
                <div id="faq6" class="faq-respuesta">
                    <p>No, hay productos que cuentan con restricciones, puede ver en nuestra sección productos restringidos o consultar vía correo electrónico.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-btn-item" onclick="toggleFAQ('faq7')">¿Si me encuentro en provincia me pueden enviar mi paquete?</button>
                <div id="faq7" class="faq-respuesta">
                    <p>Sí, no hay ningún inconveniente, la mayoría de clientes son de diversos lugares del Perú, una vez que el producto llega a nuestra oficina en Lima, nosotros nos encargamos del embalado y rotulado de la caja para que sea enviada a Provincia.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-btn-item" onclick="toggleFAQ('faq8')">¿Qué garantía tengo que me llegará el producto?</button>
                <div id="faq8" class="faq-respuesta">
                    <p>Las tiendas americanas tienen una plataforma segura, es decir son responsables desde el producto venta de la tienda hasta la llegada a nuestro almacén, una vez que el producto se encuentra en nuestro almacén, nosotros corremos con toda la responsabilidad, es por eso que las empresas de transporte nos ofrecen una firma al momento que reciben los productos. Si los productos no cuentan con firma no tenemos responsables, es por eso que se les recomienda enviar sus paquetes a nuestro almacén con operadores confiables como UPS, DHL, FEDEX.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <button class="faq-btn-item" onclick="toggleFAQ('faq9')">¿Mi producto se encuentra en buenas manos?</button>
                <div id="faq9" class="faq-respuesta">
                    <p>Somos una empresa de mensajería internacional IFAST SHIPPING. Tenemos millas de clientes satisfechos con nuestros servicios de importación y cuidamos sus productos como si fueran nuestros, con profesionalismo y compromiso.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-btn-item" onclick="toggleFAQ('faq10')">¿Qué garantías me ofrecen?</button>
                <div id="faq10" class="faq-respuesta">
                    <p>Por parte nuestra contamos con una lista de páginas recomendadas en el mundo las críticas que han sido examinadas, por ende bríndanos la seguridad en la compra. La tienda es RESPONSABLE desde que el producto sale desde su tienda hasta la llegada a nuestro almacén, una vez que el producto se encuentra en nuestro almacén, nosotros corremos con toda la responsabilidad.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-btn-item" onclick="toggleFAQ('faq11')">¿Diferencias entre billing y shipping address?</button>
                <div id="faq11" class="faq-respuesta">
                    <p>1.-BILLING ADDRESS: Es la dirección de facturación, es la dirección de cobro que se tiene registrada con el emisor de la tarjeta. Es decir, es la dirección a donde se registran sus estados de cuenta.</p>
                    <p>2.-SHIPPING ADDRESS : Es la dirección de envío(entrega). El producto a nuestro almacén de Miami.</p>
                </div>
            </div>
        </div>
    </div>



<script>
// Función global para abrir FAQ
function abrirVentanaFAQ() {
    document.getElementById("faqVentana").style.display = "flex";
}

// Función para cerrar FAQ
function cerrarVentanaFAQ() {
    document.getElementById("faqVentana").style.display = "none";
}

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', function() {
    // Buscar el botón FAQ por ID o por texto
    const btnFAQ = document.getElementById("btnFAQ") || 
                   document.querySelector('a[href*="faq"]') || 
                   document.querySelector('a[href="#faq_ventana"]');
    
    if (btnFAQ) {
        btnFAQ.addEventListener("click", function (e) {
            e.preventDefault();
            abrirVentanaFAQ();
        });
    }
    
    // También escuchar clicks en cualquier enlace que contenga "faq"
    document.addEventListener('click', function(e) {
        if (e.target.tagName === 'A' && 
            (e.target.href.includes('#faq_ventana') || 
             e.target.textContent.toLowerCase().includes('f.a.q'))) {
            e.preventDefault();
            abrirVentanaFAQ();
        }
    });
});

// Cerrar al hacer clic fuera del contenido
window.onclick = function(event) {
    const ventana = document.getElementById("faqVentana");
    if (event.target === ventana) {
        cerrarVentanaFAQ();
    }
}

// Alternar secciones FAQ (acordeón)
function toggleFAQ(id) {
    var item = document.getElementById(id);
    var button = document.querySelector(`[onclick="toggleFAQ('${id}')"]`);
    
    if (item.style.display === "block") {
        item.style.display = "none";
        button.classList.remove('active');
    } else {
        item.style.display = "block";
        button.classList.add('active');
    }
}

// Cerrar con tecla ESC
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        cerrarVentanaFAQ();
    }
});
</script>