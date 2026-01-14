<?php


 session_start();
 if (!isset($_SESSION[ID])) {

    header('location: ../../suscripcion/inicio_formulario.php');
  }
  
  require_once "../../suscripcion/dao/dao_formularioLogin.php";


 include "../../template/header.php";

 include '../../template/nav.php';



?>
<style>
.p-detalle {
    color:#0653C8;
    font-family: serif;
    font-size: 120%
}
.span-detalle {
    color:white;
}
</style>


<!--  -->
<div class="container d-flex justify-content-center align-items-center ">
  <div class="container-center" style="height: 100%; width: 100%; background-color: rgba(0, 0, 0, 0.4); padding-bottom: 10vh;">

  <span id="contenido-body" >


<div class="container mt-5">
  <div class="row justify-content-center align-items-center">
    <div class="col-md-8 col-sm-12 mb-3">
    <img src="../../img/logo-certif-dmc 2.png"  style="max-width: 50%;">
    </div>

    <div class="col-md-8 col-sm-8 mt-4 mb-4">
    <div class="d-flex justify-content-between">
    <div>
    <h3 style="color: white">PRUEBA AFP INTEGRA</h3>

    <h5 class="pt-3 pb-3 text-white" >
<svg xmlns="http://www.w3.org/2000/svg" width="36" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
</svg> 

<?php echo $_SESSION[NOMBRE]." ".$_SESSION[APELLIDO] ?>  </h5>
    </div>




    
    </div>
    </div>
  </div>

</div>


</span>

</div>

</div>






<div class="container d-flex justify-content-center align-items-center ">
<div class="container-center" style="height: 100%; width: 100%; background-color: white; padding-bottom: 10vh;">

<div class="container mt-5">
<div class="row justify-content-center align-items-center">
    <div class="col-8 mt-4 mb-4">
  
    <h3 style="color: #006AFF"> <b>Feedback </b> </h3>

   
    <p> <b>¡Registro exitoso! </b> </p>

<p>Gracias por participar.</p>
   



        <a class="btn btn-primary pl-5 pr-5 mt-5" href="../../suscripcion/inicio_formulario.php">Continuar</a> 
    </div>

    </div>
</div>
</div>
</div>

<script>
   var miDiv = document.querySelector("body");

miDiv.style.backgroundImage = "url('../../img/fondo general.jpg')";
miDiv.style.backgroundSize = "cover";
miDiv.style.backgroundRepeat = "no-repeat";

// cambia color del navbar
var navbar = document.getElementById("miNavbar");
navbar.classList.remove("bg-light");
navbar.style.backgroundColor = "#slal4la";



</script>

  <!-- fin -->

  <?php

   include "../../template/footer.php";

  ?>
