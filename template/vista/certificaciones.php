<?php


 session_start();
 if (!isset($_SESSION[ID])) {

  header('location: ../../suscripcion/inicio_formulario.php');
}

 include "../../template/header.php";

 include '../../template/nav.php';



?>


<div class="container d-flex justify-content-center align-items-center ">
  <div class="container-center" style="height: 100%; width: 100%; background-color: rgba(0, 0, 0, 0.4); padding-bottom: 20vh;">

  <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
          <div class="col-md-8 col-sm-12 mb-3">
          <img src="../../../img/logo-certif-dmc 2.png"  style="max-width: 50%;">
          </div>
          </div>
      </div>
    <span id="contenido-body" >

      <div class="container s">
        <div class="row justify-content-center align-items-center">
          <!-- <div class="col-md-8 col-sm-12 mb-3">
          <img src="../../img/logo-certif-dmc 2.png"  style="max-width: 50%;">
          </div>  -->

          <div class="col-8 mt-4 mb-4">
        
          <h4 style="color: white">Seleccione uno de nuestros exámenes para continuar:</h4>
          </div>
        </div>
      </div> 


<div class="listado">

</div>



</span>


</div>
</div>
  <script>



    let valorForm = "";
    let nombreSeleccionado = "";
  $(document).ready(function() {



    var miDiv = document.querySelector("body");

    miDiv.style.backgroundImage = "url('../../../img/fondo general.jpg')";
    miDiv.style.backgroundSize = "cover";
    miDiv.style.backgroundRepeat = "no-repeat";

    // cambia color del navbar
    var navbar = document.getElementById("miNavbar");
    navbar.classList.remove("bg-light");
    navbar.style.backgroundColor = "#slal4la";

    // inicio lista
    $.ajax({
      url: '../../suscripcion/controller/controller_formularioLogin.php?op=listaCapacitaciones',
      type: 'POST',
      data: {},
      dataType: 'JSON',
      success: function(data) {
        var html = "";
        let contador = 0;

        data.forEach((item, i) => {
        //   if (item.estado_examen === "pendiente" && (item.formulario != null && item.formulario != 0) ) {
          if (item.estado_examen === "pendiente" && item.formulario == 1 ) {
            contador++;
      html += `
      <div class="container mt-2 mb-3" >
          <div class="row justify-content-center align-items-center">
              <div class="col-md-6 col-sm-6" >
                  <div class="pt-2 pr-5 pb-2 pl-5 contenido-card " style="border-radius: 5px; background-color:white " >
                      <div class="">
                          <label class="form-check-label" ><b>${item.nombre}</b></label>
                      </div>
                  </div>
              </div>
              <div class="col-2">
                  <div class="form-check d-flex align-items-center justify-content-start" >
                  <button type="button"  style="color:white;border-radius: 12px;" value="${item.id_formulario}" data-nombre="${item.nombre}" class="btn btn-primary pt-2 pr-5 pb-2 pl-5 btn-continuar" name="button"> Iniciar</button>
         
                  </div>
              </div>
          </div>
      </div>`;
          }

        });

       $(".listado").html(html);



      }
    });
  });





  let contenidoBody = document.getElementById("contenido-body");

  document.addEventListener('click', function(event) {



    if (event.target.classList.contains('btn-continuar')) {
         valorForm = event.target.value;
         nombreSeleccionado = event.target.getAttribute('data-nombre');
         console.log("Valor del botón:", valorForm);
        // console.log("Valor del atributo data-tabla:", tabla);
        // Realiza aquí las operaciones que desees con los valores obtenidos
    /*  if ( valorForm == 14 ) {
                  Swal.fire({
            title: "Esta certificación requiere una inversión.",
            text: "¿Quiere solicitar acceso?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "¡Sí, quiero solicitar!"
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire({
                title: "Perfecto!",
                text: "Revisa tu correo con datos de pago.",
                icon: "success"
              });
            }
          });

          return;
      } */
      contenidoBody.innerHTML =  `

<div class="container mt-5">
 <div class="row justify-content-center align-items-center">
   <div class="col-8">

   <h4 style="color: white">Instrucciones:</h4>
   <br>
   <ul style="color: white">
   <li>Número de preguntas: <span style="color:#00edff" >40</span></li>
   <li>Tienes un límite de tiempo: <span style="color:#00edff" >40 minutos</span></li>
   <li>Debe ser terminado en una sesión <span style="color:#00edff" >(No puedes guardar y continuar después).</span></li>
   <li>No se te permitirá <span style="color:#00edff" >regresar y cambiar tus respuestas.</span></li>

   <li>Nota mínima aprobatoria: <span style="color:#00edff" >80%</span></li>
   </ul>

   </div>
 </div>
</div>

<div class="container mt-2 mb-3" >
          <div class="row justify-content-center align-items-center">
             <div class="col-md-6 col-sm-6">
    <div class="pt-2 pr-5 pb-2 pl-5 contenido-card" style="border-radius: 5px; background-color:white">
        <div class="">
            <label class="form-check-label"><b>¿Cuenta con experiencia en desarrollos de analítica y BI?</b></label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="experience" id="experienceYes" value="si">
            <label class="form-check-label" for="experienceYes">
                Sí
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="experience" id="experienceNo" value="no">
            <label class="form-check-label" for="experienceNo">
                No
            </label>
        </div>
    </div>
</div>

              <div class="col-2">
                  <div class="form-check d-flex align-items-center justify-content-start" >
             
                  </div>
              </div>
          </div>
      </div>


<div class="container mt-5">
 <div class="row justify-content-center align-items-center">
   <div class="col-8">

     <button type="button" class="btn btn-primary pt-1 pr-5 pb-1 pl-5 btn-comenzar" name="button"> Comenzar</button>
   </div>
 </div>
</div>



`; 
    }
}

);




$(document).on('click','.btn-comenzar',function(){
  // console.log(nombreSeleccionado);
   // setTimeout(() => {
   //     console.log("Delayed for 2 second.");
   //    }, 2000);

   
 // window.location.href = '../../../template/vista/formulario-certificaciones.php?cap=' + window.btoa(valorForm)+ '&nom=' + window.btoa(nombreSeleccionado);

console.log(document.querySelector('input[name="experience"]:checked').value);

});

  </script>



  <!-- fin -->

  <?php

   include "../../template/footer.php";

  ?>
