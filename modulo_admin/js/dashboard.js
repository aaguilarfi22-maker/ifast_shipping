
// dashboard.js - Funcionalidades del dashboard

document.addEventListener('DOMContentLoaded', function() {
    // Confirmar logout
    const logoutLinks = document.querySelectorAll('a[href*="logout"]');
    
    logoutLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            if (!confirm('¿Está seguro que desea cerrar sesión?')) {
                e.preventDefault();
                return false;
            }
        });
    });
    
    // Animación de números en las cards
    animateNumbers();
    
    // Actualizar reloj en tiempo real
    updateClock();
    setInterval(updateClock, 1000);
    
    // Tooltips de Bootstrap
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});

// Función para animar números
function animateNumbers() {
    const numbers = document.querySelectorAll('.card h2');
    
    numbers.forEach(number => {
        const text = number.textContent.trim();
        
        // Solo animar si es un número
        if (/^\d+$/.test(text)) {
            const finalNumber = parseInt(text);
            let currentNumber = 0;
            const increment = Math.ceil(finalNumber / 50);
            const duration = 1000; // 1 segundo
            const stepTime = duration / 50;
            
            const counter = setInterval(() => {
                currentNumber += increment;
                if (currentNumber >= finalNumber) {
                    currentNumber = finalNumber;
                    clearInterval(counter);
                }
                number.textContent = currentNumber.toLocaleString();
            }, stepTime);
        }
    });
}

// Función para actualizar el reloj (si se agrega)
function updateClock() {
    const clockElement = document.getElementById('clock');
    if (clockElement) {
        const now = new Date();
        const timeString = now.toLocaleTimeString('es-PE', {
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        });
        clockElement.textContent = timeString;
    }
}

// Función para refrescar datos
function refreshDashboard() {
    console.log('Refrescando dashboard...');
    // Aquí puedes agregar código AJAX para actualizar datos
    
    // Mostrar notificación
    showNotification('Dashboard actualizado', 'success');
}

// Función para mostrar notificaciones
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
    notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 250px;';
    notification.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    document.body.appendChild(notification);
    
    // Auto-dismiss después de 3 segundos
    setTimeout(() => {
        const bsAlert = new bootstrap.Alert(notification);
        bsAlert.close();
    }, 3000);
}

// Búsqueda en tabla
function searchTable() {
    const input = document.getElementById('searchInput');
    const filter = input.value.toUpperCase();
    const table = document.querySelector('.table');
    const tr = table.getElementsByTagName('tr');
    
    for (let i = 1; i < tr.length; i++) {
        let found = false;
        const td = tr[i].getElementsByTagName('td');
        
        for (let j = 0; j < td.length; j++) {
            if (td[j]) {
                const txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    found = true;
                    break;
                }
            }
        }
        
        tr[i].style.display = found ? '' : 'none';
    }
}

// Exportar datos (ejemplo)
function exportData(format) {
    console.log(`Exportando datos en formato: ${format}`);
    showNotification(`Exportando datos en formato ${format}...`, 'info');
    
    // Aquí puedes agregar la lógica real de exportación
}

// Detectar inactividad y cerrar sesión automáticamente
let inactivityTimer;
const inactivityLimit = 30 * 60 * 1000; // 30 minutos

function resetInactivityTimer() {
    clearTimeout(inactivityTimer);
    inactivityTimer = setTimeout(() => {
        alert('Sesión cerrada por inactividad.');
        window.location.href = 'login.php?timeout=1';
    }, inactivityLimit);
}

// Resetear timer con cualquier actividad del usuario
document.addEventListener('mousemove', resetInactivityTimer);
document.addEventListener('keypress', resetInactivityTimer);
document.addEventListener('click', resetInactivityTimer);
document.addEventListener('scroll', resetInactivityTimer);

// Iniciar timer
resetInactivityTimer();