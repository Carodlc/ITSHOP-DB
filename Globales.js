function establecerIdUsuario(id) {
    sessionStorage.setItem('idUsuario', id);
}

function obtenerIdUsuario() {
    return sessionStorage.getItem('idUsuario');
}

function establecerRolUsuario(rol) {
    sessionStorage.setItem('rolUsuario', rol);
}

function obtenerRolUsuario() {
    return sessionStorage.getItem('rolUsuario');
}


// Agrega un event listener al botón de cerrar sesión
document.addEventListener("DOMContentLoaded", function() {
    // Tu código JavaScript aquí
    var logoutBtn = document.getElementById("logoutBtn");
    if (logoutBtn) {
        logoutBtn.addEventListener("click", function(event) {
            event.preventDefault();
            sessionStorage.removeItem('idUsuario');
            location.reload();
        });
    }
    
});




