<style>

    .modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
    backdrop-filter: blur(5px);
}

.modal-content {
    background-color: white;
    margin: 5% auto;
    padding: 0;
    border-radius: 15px;
    width: 90%;
    max-width: 500px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.3);
    animation: modalSlideIn 0.3s ease;
}

@keyframes modalSlideIn {
    from { transform: translateY(-50px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

.modal-header {
    background: linear-gradient(135deg, #ffcc00, #ffa500);
    color: white;
    padding: 20px;
    border-radius: 15px 15px 0 0;
    position: relative;
}

.modal-header h3 {
    margin: 0;
    font-size: 1.5rem;
    color: #1c2b3a;
    
    
}

.close {
    position: absolute;
    right: 20px;
    top: 20px;
    color: white;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
    color: #1c2b3a;
    transition: all 0.3s ease;
}

.close:hover {
    transform: scale(1.1);
}

.modal-body {
    padding: 30px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: #2c3e50;
    font-weight: 500;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 12px;
    border: 2px solid #ecf0f1;
    border-radius: 8px;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.form-group input:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #ffcc00;
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
}

.form-group textarea {
    resize: vertical;
    min-height: 100px;
}

.rating-group {
    display: flex;
    align-items: center;
    gap: 5px;
}

.rating-star {
    font-size: 1.5rem;
    color: #ddd;
    cursor: pointer;
    transition: all 0.2s ease;
}

.rating-star:hover,
.rating-star.active {
    color: #ffcc00;
    transform: scale(1.1);
}

.submit-btn {
    background: linear-gradient(135deg, #ffcc00, #ffa500);
    color: white;
    border: none;
    padding: 12px 30px;
    font-size: 1rem;
    border-radius: 25px;
    cursor: pointer;
    width: 100%;
    transition: all 0.3s ease;
    margin-top: 10px;
}

.submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px #ffcc00;
    color: #1c2b3a;
}

.submit-btn:disabled {
    opacity: 0.7;
    cursor: not-allowed;
    transform: none;
}

.message {
    padding: 12px;
    border-radius: 8px;
    margin-bottom: 20px;
    text-align: center;
}

.message.success {
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
    color: #155724;
}

.message.error {
    background-color: #f8d7da;
    border: 1px solid #f5c6cb;
    color: #721c24;
}

.success-message {
    position: fixed;
    top: 20px;
    right: 20px;
    background: linear-gradient(45deg, #27ae60, #2ecc71);
    color: white;
    padding: 15px 25px;
    border-radius: 10px;
    box-shadow: 0 5px 20px rgba(39, 174, 96, 0.3);
    z-index: 1001;
    animation: slideInRight 0.5s ease;
}

@keyframes slideInRight {
    from { transform: translateX(100%); opacity: 0; }
    to { transform: translateX(0); opacity: 1; }
}

.success-message.fade-out {
    animation: fadeOut 0.5s ease forwards;
}

@keyframes fadeOut {
    from { opacity: 1; }
    to { opacity: 0; }
}

@media (max-width: 768px) {
    .modal-content {
        width: 95%;
        margin: 10% auto;
    }
}

</style>




<!-- Modal para agregar testimonio -->
<div id="testimonialModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <center><h3>Agregar Testimonio</h3></center>
            <span class="close" onclick="closeModal()">&times;</span>
        </div>
        <div class="modal-body">
            <div id="messageContainer"></div>
            <form id="testimonialForm">
                <div class="form-group">
                    <label for="firstName">Nombre *</label>
                    <input type="text" id="firstName" name="first_name" required>
                </div>
                
                <div class="form-group">
                    <label for="lastName">Apellido *</label>
                    <input type="text" id="lastName" name="last_name" required>
                </div>
                
                <div class="form-group">
                    <label for="comment">Comentario *</label>
                    <textarea id="comment" name="comment" maxlength="500" required placeholder="Comparte tu experiencia con nuestro servicio..."></textarea>
                </div>
                
                <div class="form-group">
                    <label>Calificación *</label>
                    <div class="rating-group">
                        <span class="rating-star" data-rating="1">★</span>
                        <span class="rating-star" data-rating="2">★</span>
                        <span class="rating-star" data-rating="3">★</span>
                        <span class="rating-star" data-rating="4">★</span>
                        <span class="rating-star" data-rating="5">★</span>
                        <input type="hidden" id="rating" name="rating" value="0">
                    </div>
                </div>
                
                <button type="submit" class="submit-btn">Enviar Testimonio</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('testimonialForm');
    const messageContainer = document.getElementById('messageContainer');
    const ratingInput = document.getElementById('rating');
    const stars = document.querySelectorAll('.rating-star');

    // ⭐ Manejo de calificación por estrellas
    stars.forEach(star => {
        star.addEventListener('click', function () {
            const rating = parseInt(this.getAttribute('data-rating'));
            ratingInput.value = rating;

            stars.forEach(s => {
                s.classList.remove('active');
                if (parseInt(s.getAttribute('data-rating')) <= rating) {
                    s.classList.add('active');
                }
            });
        });
    });

    // 📤 Envío del formulario por AJAX
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(form);

        fetch('./process/process_testimonial.php', {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            messageContainer.innerHTML = '';
            const message = document.createElement('div');
            message.className = 'message ' + (data.success ? 'success' : 'error');
            message.innerText = data.message;
            messageContainer.appendChild(message);

            if (data.success) {
                form.reset();
                ratingInput.value = 0;
                stars.forEach(s => s.classList.remove('active'));
            }
        })
        .catch(err => {
            messageContainer.innerHTML = '<div class="message error">Ocurrió un error inesperado.</div>';
            console.error(err);
        });
    });
});
function openmodaltestimonios() {
    document.getElementById('testimonialModal').style.display = 'block';
    document.body.style.overflow = 'hidden';
}

function closeModal() {
    document.getElementById('testimonialModal').style.display = 'none';
    document.body.style.overflow = 'auto';
}
</script>