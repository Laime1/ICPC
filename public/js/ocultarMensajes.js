        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                var message = document.getElementById('message');
                var error = document.getElementById('error');
                var success = document.getElementById('success');

                if (message) {
                    message.style.display = 'none';
                }

                if (error) {
                    error.style.display = 'none';
                }

                if (success) {
                    success.style.display = 'none';
                }
            }, 5000); // 5000 milisegundos = 5 segundos
        });
