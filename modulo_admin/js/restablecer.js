// restablecer.js - Validación de contraseñas

document.addEventListener('DOMContentLoaded', function() {
    // Toggle password visibility
    const togglePassword = document.getElementById('togglePassword');
    const togglePasswordConfirm = document.getElementById('togglePasswordConfirm');
    const passwordInput = document.getElementById('password');
    const passwordConfirmInput = document.getElementById('password_confirm');
    const eyeIcon = document.getElementById('eyeIcon');
    const eyeIconConfirm = document.getElementById('eyeIconConfirm');
    
    if (togglePassword && passwordInput) {
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            if (type === 'text') {
                eyeIcon.classList.remove('bi-eye');
                eyeIcon.classList.add('bi-eye-slash');
            } else {
                eyeIcon.classList.remove('bi-eye-slash');
                eyeIcon.classList.add('bi-eye');
            }
        });
    }
    
    if (togglePasswordConfirm && passwordConfirmInput) {
        togglePasswordConfirm.addEventListener('click', function() {
            const type = passwordConfirmInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordConfirmInput.setAttribute('type', type);
            
            if (type === 'text') {
                eyeIconConfirm.classList.remove('bi-eye');
                eyeIconConfirm.classList.add('bi-eye-slash');
            } else {
                eyeIconConfirm.classList.remove('bi-eye-slash');
                eyeIconConfirm.classList.add('bi-eye');
            }
        });
    }
    
    // Validación en tiempo real de la contraseña
    if (passwordInput) {
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            const helpDiv = document.getElementById('passwordHelp');
            const strength = checkPasswordStrength(password);
            
            // Mostrar requisitos
            let message = '<small>';
            
            if (password.length === 0) {
                message = '';
            } else if (password.length < 8) {
                message += '<span class="text-danger">✗ Mínimo 8 caracteres</span><br>';
            } else {
                message += '<span class="text-success">✓ Mínimo 8 caracteres</span><br>';
            }
            
            if (password.length > 0) {
                if (!/[A-Z]/.test(password)) {
                    message += '<span class="text-danger">✗ Una mayúscula</span><br>';
                } else {
                    message += '<span class="text-success">✓ Una mayúscula</span><br>';
                }
                
                if (!/[a-z]/.test(password)) {
                    message += '<span class="text-danger">✗ Una minúscula</span><br>';
                } else {
                    message += '<span class="text-success">✓ Una minúscula</span><br>';
                }
                
                if (!/[0-9]/.test(password)) {
                    message += '<span class="text-danger">✗ Un número</span>';
                } else {
                    message += '<span class="text-success">✓ Un número</span>';
                }
            }
            
            message += '</small>';
            helpDiv.innerHTML = message;
            
            // Barra de fortaleza
            const strengthBar = document.createElement('div');
            strengthBar.className = 'password-strength';
            
            if (strength === 'weak') {
                strengthBar.classList.add('strength-weak');
            } else if (strength === 'medium') {
                strengthBar.classList.add('strength-medium');
            } else if (strength === 'strong') {
                strengthBar.classList.add('strength-strong');
            }
            
            // Remover barra anterior si existe
            const oldBar = helpDiv.querySelector('.password-strength');
            if (oldBar) {
                oldBar.remove();
            }
            
            if (password.length > 0) {
                helpDiv.appendChild(strengthBar);
            }
        });
    }
    
    // Validación de confirmación de contraseña
    if (passwordConfirmInput) {
        passwordConfirmInput.addEventListener('input', function() {
            const password = passwordInput.value;
            const confirmPassword = this.value;
            const helpDiv = document.getElementById('confirmHelp');
            
            if (confirmPassword.length === 0) {
                helpDiv.innerHTML = '';
            } else if (password !== confirmPassword) {
                helpDiv.innerHTML = '<small class="text-danger">✗ Las contraseñas no coinciden</small>';
            } else {
                helpDiv.innerHTML = '<small class="text-success">✓ Las contraseñas coinciden</small>';
            }
        });
    }
    
    // Validación del formulario
    const resetForm = document.getElementById('resetForm');
    
    if (resetForm) {
        resetForm.addEventListener('submit', function(e) {
            const password = passwordInput.value;
            const confirmPassword = passwordConfirmInput.value;
            
            // Validar contraseña
            if (!isValidPassword(password)) {
                e.preventDefault();
                showAlert('La contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula y un número.', 'danger');
                return false;
            }
            
            // Validar que coincidan
            if (password !== confirmPassword) {
                e.preventDefault();
                showAlert('Las contraseñas no coinciden.', 'danger');
                return false;
            }
            
            // Mostrar spinner
            const submitBtn = resetForm.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.classList.add('loading');
                submitBtn.disabled = true;
            }
        });
    }
});

// Función para verificar fortaleza de contraseña
function checkPasswordStrength(password) {
    let strength = 0;
    
    if (password.length >= 8) strength++;
    if (/[A-Z]/.test(password)) strength++;
    if (/[a-z]/.test(password)) strength++;
    if (/[0-9]/.test(password)) strength++;
    if (/[^A-Za-z0-9]/.test(password)) strength++;
    
    if (strength < 3) return 'weak';
    if (strength < 5) return 'medium';
    return 'strong';
}

// Función para validar contraseña
function isValidPassword(password) {
    return password.length >= 8 && 
           /[A-Z]/.test(password) && 
           /[a-z]/.test(password) && 
           /[0-9]/.test(password);
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
    
    const form = document.getElementById('resetForm');
    if (form) {
        form.insertBefore(alertDiv, form.firstChild);
        
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(alertDiv);
            bsAlert.close();
        }, 5000);
    }
}