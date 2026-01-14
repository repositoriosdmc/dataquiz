<?php


//  session_start();


  include "../template/header.php";

  include '../template/nav.php';

 if (!isset($_SESSION['ID'])) {

    header('location: ../suscripcion/inicio_formulario.php');
  }

  require_once "../suscripcion/dao/dao_formularioLogin.php";

  $dao_formularioLogin = new dao_formularioLogin();

  $examenes = $dao_formularioLogin->consultaExamenes($_SESSION['CORREO']);


?>


<div class="container d-flex justify-content-center align-items-center ">
  <div class="container-center" style="height: 100%; width: 100%; background-color: rgba(0, 0, 0, 0.4); padding-bottom: 50vh;">


    <span id="contenido-body" >

      <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
    
          <div class="col-7 mt-4 mb-4">
        
          <h4 style="color: white">Bienvenido <?php echo $_SESSION['USUARIO'] ?> </h4>
          <p style="color: white">Seleccione el test que realizará:</p>
          </div>
        </div>
      </div> 


<div class="listado">
        
<!-- <div class="container mt-2 mb-3" >
          <div class="row justify-content-center align-items-center">
              <div class="col-md-6 col-sm-6" >
                  <div class="pt-2 pr-5 pb-2 pl-5 contenido-card " style="border-radius: 5px; background-color:white " >
                      <div class="">
                          <label class="form-check-label" >
                          <b>CHALLENGE</b>
                          </label>
                      </div>
                  </div>
              </div>
              <div class="col-2">
              <div class="form-check d-flex align-items-center justify-content-start" >
                  <a type="button"  style="color:white;border-radius: 12px;" href="../template/home.php"  class="btn btn-success pt-2 pr-5 pb-2 pl-5 " > Iniciar</a>
         
                  </div>
              </div>
          </div>
       </div>

       <div class="container mt-2 mb-3" >
          <div class="row justify-content-center align-items-center">
              <div class="col-md-6 col-sm-6" >
                  <div class="pt-2 pr-5 pb-2 pl-5 contenido-card " style="border-radius: 5px; background-color:white " >
                      <div class="">
                          <label class="form-check-label" >
                         <b> CERTIFICACIÓN</b>
                          </label>
                      </div>
                  </div>
              </div>
              <div class="col-2">
              <div class="form-check d-flex align-items-center justify-content-start" >
                  <a type="button"  style="color:white;border-radius: 12px;" href="../template/vista/certificaciones.php"  class="btn btn-success pt-2 pr-5 pb-2 pl-5 " > Iniciar</a>
         
                  </div>
              </div>
          </div>
       </div> -->
       <div class="container mt-2 mb-3">
          <div class="row justify-content-center align-items-center">
            <?php 
            $hasQuiz = !empty(array_intersect([2, 3], array_column($examenes, 'formulario'))); // Verifica si existe el formulario 2 o 3
            $hasChallenge = in_array(1, array_column($examenes, 'formulario')); // Verifica si existe el formulario 1
            ?>
            
            <?php if ($hasQuiz): ?>
              <div class="col-12 <?php echo $hasChallenge ? 'col-md-4' : 'col-md-6' ?> mb-3">
                <div class="d-flex justify-content-center">
                  <a type="button" 
                     style="color:white;border-radius: 12px;" 
                     href="../template/vista/prueba-tecnica" 
                     class="btn btn-primary w-50">
                    Data Quiz 
                  </a>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($hasChallenge): ?>
              <div class="col-12 <?php echo $hasQuiz ? 'col-md-4' : 'col-md-6' ?> mb-3">
                <div class="d-flex justify-content-center">
                  <a type="button" 
                     style="color:white;border-radius: 12px;" 
                     href="../template/home" 
                     class="btn btn-primary w-50">
                    CHALLENGE DMC
                  </a>
                </div>
              </div>
            <?php endif; ?>
          </div>
       </div>
</div>



</span>


</div>
</div>






  <script>
 
  $(document).ready(function() {



  });




  var miDiv = document.querySelector("body");

miDiv.style.backgroundImage = "url('../img/fondo%20general.jpg')";
miDiv.style.backgroundSize = "cover";
miDiv.style.backgroundRepeat = "no-repeat";

// cambia color del navbar
var navbar = document.getElementById("miNavbar");
navbar.classList.remove("bg-light");
navbar.style.backgroundColor = "#slal4la";


  </script>



  <!-- fin -->

  <?php

  //  include "../template/footer.php";

  ?>
