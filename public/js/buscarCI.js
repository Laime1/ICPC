document.getElementById('ci').addEventListener('input', function() {
    const ciValue = this.value;
    const nombreField = document.getElementById('nombre');
    const usuarios = document.querySelectorAll('.usuario');

    let foundMatch = false; // Variable de control para detener el bucle cuando se encuentra una coincidencia.

    usuarios.forEach(usuario => {
        if (usuario.getAttribute('data-ci') === ciValue) {
            nombreField.value = usuario.getAttribute('data-nombre');
            foundMatch = true; // Establece la variable de control a true.
            return; // Detiene el bucle cuando se encuentra una coincidencia.
        }
    });

    if (!foundMatch) {
        nombreField.value = ''; // Limpia el campo de nombre si no se encuentra una coincidencia.
    }
});