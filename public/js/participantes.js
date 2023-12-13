document.addEventListener('DOMContentLoaded', function() {
    const participantesContainer = document.getElementById('participantes-container');
    const addParticipantButton = document.querySelector('.add-participant');

    addParticipantButton.addEventListener('click', function() {
        // Crear nuevos campos de entrada para CI y Nombre
        const newParticipantInput = document.createElement('input');
        newParticipantInput.type = 'text';
        newParticipantInput.name = 'ci[]';
        newParticipantInput.className = 'ci';
        newParticipantInput.id = 'ci';
        newParticipantInput.placeholder = 'CI';
        newParticipantInput.value = '';

        const newParticipantNInput = document.createElement('input');
        newParticipantNInput.type = 'text';
        newParticipantNInput.name = 'nombre[]';
        newParticipantNInput.id = 'nombre';
        newParticipantNInput.className = 'nombre';
        newParticipantNInput.placeholder = 'Nombre';
        newParticipantNInput.value = '';
        newParticipantNInput.readOnly = true;

        // Agregar los nuevos campos de entrada al contenedor de participantes
        participantesContainer.appendChild(newParticipantInput);
        participantesContainer.appendChild(newParticipantNInput);

        // Agregar un evento de escucha al nuevo campo de entrada CI
        newParticipantInput.addEventListener('input', function() {
            const ciValue = this.value;
            const nombreField = newParticipantNInput; // Obtener el campo de nombre asociado al nuevo CI.
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
    });
});