document.addEventListener('DOMContentLoaded', function() {
    const statusText = document.getElementById('status-text');

    function verificarConexion() {
        if (navigator.onLine) {
            statusText.textContent = 'Servidor en linea y funcionando';
            statusText.className = 'online';
        } else {
            statusText.textContent = 'Sin conexion';
            statusText.className = 'offline';
        }
    }

    verificarConexion();
    setInterval(verificarConexion, 5000);

    window.addEventListener('online', verificarConexion);
    window.addEventListener('offline', verificarConexion);
});