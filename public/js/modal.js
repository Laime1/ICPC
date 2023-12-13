// Obtén referencias a elementos relevantes
const modalEliminar = document.getElementById("modalEliminar");
const confirmarEliminarBtn = document.getElementById("confirmarEliminar");
const cancelarEliminarBtn = document.getElementById("cancelarEliminar");

let rutaEliminarUsuario = '';

// Función para mostrar el modal de confirmación
function mostrarModal(ruta) {
    rutaEliminarUsuario = ruta; // Almacenar la ruta para eliminar
    modalEliminar.style.display = "block";
}

// Manejar clic en "Sí" para eliminar
confirmarEliminarBtn.addEventListener("click", function() {
    if (rutaEliminarUsuario !== '') {
        window.location.href = rutaEliminarUsuario; // Redirigir para eliminar
    }
    modalEliminar.style.display = "none";
    rutaEliminarUsuario = '';
});

// Manejar clic en "No" para cancelar
cancelarEliminarBtn.addEventListener("click", function() {
    modalEliminar.style.display = "none";
    rutaEliminarUsuario = '';
});