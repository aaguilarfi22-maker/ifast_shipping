    <style>


        /* Contenedor fijo en la esquina */
        .social-container {
            position: fixed;
            right: 20px;
            bottom: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            z-index: 1000;
        }

        /* Estilos para las redes sociales */
        .red-social-fb,
        .red-social-ig,
        .red-social-tt {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            font-size: 18px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }

        .red-social-fb:hover,
        .red-social-ig:hover,
        .red-social-tt:hover
         {
         transform: scale(1.1);
        }

        /* Facebook */
        .red-social-fb {
            background: #1877F2;
        }

        /* Instagram */
        .red-social-ig {
            background: linear-gradient(45deg, #405DE6, #5B51D8, #833AB4, #C13584, #E1306C, #FD1D1D);
        }

        /* TikTok */
        .red-social-tt {
            background: #000;
        }

        /* Contenido de ejemplo */
        .content {
            padding: 50px;
            text-align: center;
            color: #333;
        }

    .whatsapp-widget {
    position: fixed;
    bottom: 180px;
    right: 15px;
    z-index: 9999;
  }
  
.whatsapp-widget:hover{
         transform: scale(1.1);
        }
  
  .whatsapp-toggle {
    background-color: #25d366;
    color: white;
    width: 55px;
    height: 55px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
  }
  
  .whatsapp-box {
    display: none;
    flex-direction: column;
    background: white;
    border-radius: 10px;
    padding: 15px;
    margin-bottom: 10px;
    width: 250px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
  }
  
  .whatsapp-box p {
    font-size: 14px;
    margin-bottom: 10px;
    color: #222;
    font-weight: bold;
  }
  
  .whatsapp-box a {
    display: flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
    background-color: #25d366;
    color: white;
    padding: 10px;
    border-radius: 6px;
    margin-bottom: 10px;
    font-size: 0.95em;
    transition: background 0.3s ease;
  }
  
  .whatsapp-box a:hover {
    background-color: #1ebe5d;
  }

  .tooltip-btn::after {
    content: attr(data-tooltip);
    position: absolute;
    right: 60px;
    top: 50%;
    transform: translateY(-50%);
    background-color: #222;
    color: #fff;
    padding: 5px 10px;
    font-size: 0.85em;
    border-radius: 5px;
    white-space: nowrap;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s ease;
    z-index: 9999;
  }
  
  .tooltip-btn:hover::after {
    opacity: 1;
  }
    </style>




<div class="social-container">
<div class="whatsapp-widget">
  <div class="whatsapp-toggle" onclick="toggleWspBox(event)">
    <i class="fab fa-whatsapp"></i>
  </div>

  <div class="whatsapp-box" id="wspBox">
    <p><strong>Chatea con nosotros</strong></p>
    <a href="https://wa.link/szivx7" target="_blank">
      <i class="fab fa-whatsapp"></i> VENTAS
    </a>
    <a href="https://wa.link/886o9k" target="_blank">
      <i class="fab fa-whatsapp"></i> VENTAS PARA EMPRENDEDORES
    </a>
    <a href="https://wa.link/r79gvg" target="_blank">
      <i class="fab fa-whatsapp"></i> SUGERENCIAS & RECLAMOS
    </a>
  </div>
</div>
<a href="https://www.facebook.com/IFAST.Shipping.pe/?locale=es_LA" class="red-social-fb" target="_blank">
  <i class="fab fa-facebook-f"></i>
</a>

<!-- Instagram -->
<a href="https://instagram.com/IFASTShipping" class="red-social-ig" target="_blank">
  <i class="fab fa-instagram"></i>
</a>

<!-- TikTok -->
<a href="https://www.tiktok.com/@ifast_shipping" class="red-social-tt" target="_blank">
  <i class="fab fa-tiktok"></i>
</a>
  </div>
</div>


<script>

   function toggleWspBox(event) {
  event.stopPropagation(); // Evita que se cierre al hacer clic en el ícono
  const box = document.getElementById("wspBox");
  box.style.display = box.style.display === "flex" ? "none" : "flex";
}

document.addEventListener("click", function (event) {
  const box = document.getElementById("wspBox");
  const toggle = document.querySelector(".whatsapp-toggle");

  if (
    box.style.display === "flex" &&
    !box.contains(event.target) &&
    !toggle.contains(event.target)
  ) {
    box.style.display = "none";
  }
});

document.querySelectorAll(".whatsapp-box a").forEach(link => {
  link.addEventListener("click", () => {
    document.getElementById("wspBox").style.display = "none";
  });
});



function toggleRedesBox(event) {
  event.stopPropagation();
  const box = document.getElementById("redesBox");
  box.style.display = box.style.display === "flex" ? "none" : "flex";
}

document.addEventListener("click", function (event) {
  const box = document.getElementById("redesBox");
  const toggle = document.querySelector(".redes-toggle");

  if (
    box.style.display === "flex" &&
    !box.contains(event.target) &&
    !toggle.contains(event.target)
  ) {
    box.style.display = "none";
  }
});

</script>