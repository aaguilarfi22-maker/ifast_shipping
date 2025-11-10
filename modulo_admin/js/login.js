// login.js - Funcionalidad del formulario de login

document.addEventListener('DOMContentLoaded', function() {
    // Toggle password visibility
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');
    
    if (togglePassword && passwordInput && eyeIcon) {
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Cambiar icono
            if (type === 'text') {
                eyeIcon.classList.remove('bi-eye');
                eyeIcon.classList.add('bi-eye-slash');
            } else {
                eyeIcon.classList.remove('bi-eye-slash');
                eyeIcon.classList.add('bi-eye');
            }
        });
    }
    
    // Validación del formulario
    const loginForm = document.getElementById('loginForm');
    
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;
            
            // Validar email
            if (!isValidEmail(email)) {
                e.preventDefault();
                showAlert('Por favor, ingrese un correo electrónico válido.', 'danger');
                return false;
            }
            
            // Validar contraseña no vacía
            if (password.length === 0) {
                e.preventDefault();
                showAlert('Por favor, ingrese su contraseña.', 'danger');
                return false;
            }
            
            // Mostrar spinner de carga
            const submitBtn = loginForm.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.classList.add('loading');
                submitBtn.disabled = true;
            }
        });
    }
    
    // Auto-dismiss alerts después de 5 segundos
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 5000);
    });
});

// Función para validar email
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Función para mostrar alertas
function showAlert(message, type = 'danger') {
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
    alertDiv.role = 'alert';
    alertDiv.innerHTML = `
        <i class="bi bi-exclamation-triangle-fill"></i> ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    const form = document.getElementById('loginForm');
    if (form) {
        form.insertBefore(alertDiv, form.firstChild);
        
        // Auto-dismiss después de 5 segundos
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(alertDiv);
            bsAlert.close();
        }, 5000);
    }
}

// Prevenir múltiples envíos del formulario
let formSubmitted = false;

document.addEventListener('submit', function(e) {
    if (formSubmitted) {
        e.preventDefault();
        return false;
    }
    formSubmitted = true;
    
    // Resetear después de 5 segundos (en caso de error)
    setTimeout(() => {
        formSubmitted = false;
    }, 5000);
});