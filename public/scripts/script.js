$(document).ready(function() {
    var intervalo = setInterval(function() {
      $.ajax({
        url: 'acciones/consultar_estado.php',
        method: 'POST',
        dataType: 'json',
        success: function(response) {
          console.log('Respuesta recibida:', response); // Para depuración
          
          if (response.campo_cambiado == '1' || response.campo_cambiado == '3') {
            clearInterval(intervalo);
            window.location.href = "inicio.php";
          } else if(response.campo_cambiado == '2') {
            clearInterval(intervalo);
            window.location.href = "404.php";
          }
        },
        error: function(xhr, status, error) {
          console.log('Error al realizar la consulta:', error);
          console.log('Status:', status);
          console.log('Response:', xhr.responseText);
        }
      });
    }, 2000);
});
