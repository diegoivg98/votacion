$(document).ready(function() {
    $('#correo').blur(function() {
        var correo = $('#correo').val();
        var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!regex.test(correo)) {
            alert('El correo electrónico ingresado no es válido.');
            $('#correo').val('');
        }
    });
});