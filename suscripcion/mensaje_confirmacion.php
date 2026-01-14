<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />

<!-- Bootstrap CSS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
       <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/alertify.min.js"></script>
       <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/css/alertify.min.css"/>
       <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/css/themes/default.min.css"/>

<title>DMC CONFIRMACIÓN DE CUENTA</title>
</head>
<body>
<br>

<div class="row">
<div class="col-md-2">

</div>
<div class="col-sm-8">
<div class="card">
<div class="card-body">
<h5 class="card-title">Hola </h5>
<p class="card-text">Su cuenta  <?php echo $_REQUEST["email"]; ?> esta activada.</p>

<a href="inicio_formulario.php" class="btn btn-primary">Ingresa a tu cuenta</a>
</div>
</div>
</div>
<div class="col-md-2">

</div>
</div>


<script>
$(document).ready(function(){
   var correo = "<?php echo $_REQUEST["email"]; ?>";
   var hash = "<?php echo $_REQUEST["hash"]; ?>";
  $.ajax({
        url:'../suscripcion/controller/controller_formularioLogin.php?op=activarCuenta',
       type:'POST',
        data:{"correo":correo,"hash":hash},
         // beforeSend: function() {
         //    $('.btn-guardar').prop("disabled", true) ;
         // },
       success:function(data){

         // alert(data);

}
 });
});
</script>

</body>
</html>
