document.addEventListener('DOMContentLoaded', function() {
    const surveyForm = document.getElementById('survey-form');

    surveyForm.addEventListener('submit', function(event) {
        event.preventDefault();  // Previene el comportamiento por defecto del formulario
        const selectedGame = document.querySelector('input[name="bestGame"]:checked').value;
        alert(`¡Gracias por participar! Has votado por: ${selectedGame}`);
        // Aquí puedes añadir lógica adicional para enviar la respuesta al servidor
    });
});
