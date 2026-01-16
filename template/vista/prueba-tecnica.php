<?php


 session_start();
 if (!isset($_SESSION['ID'])) {

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
          <!-- <img src="../../../img/logo-prueba-tecnica-dmc.png"  style="max-width: 50%;"> -->
         <img src="../../img/dataquiz%20dmc%20institute.png" style="max-width: 50%;">
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
          <h4 style="color: white">Seleccione uno de nuestros Test para continuar test:</h4>
          </div>
        </div>
      </div>


      <?php 
   // Datos de SMOWL
    $entityName = 'PEDMC'; // Smowltech 
    $secretKey = '7db40721dc20ca1373f99c84e521a22527f15c8a'; // Smowltech 
    $token = "ed0fb392b022afd509bda83f0745075dfa2212f0"; //Smowltech 
    
    // Datos del usuario
    $userName = "carlos";
    $userEmail = "carlosmorih33@gmail.com";
    $lang = 'es'; // Idioma español
    $activityUrl = 'https://dataquiz.dmc.pe/template/vista/prueba-tecnica';
    
    
   // $smowlUrl = "https://app.smowltech.net/register/?entityName={$entityName}&token={$token}&userName=" . urlencode($userName) . "&userEmail=" . urlencode($userEmail) . "&lang={$lang}&type=0&activityUrl=" . urlencode($activityUrl);
   
   $smowlUrl = "https://app.smowltech.net/register/?
    entityName={$entityName}&
    token={$token}&
    userName=" . urlencode($userName) . "&
    userEmail=" . urlencode($userEmail) . "&
    lang={$lang}&
    type=0&activityUrl=" . urlencode($activityUrl);
?>


<a href="<?php echo $smowlUrl ?>">SMOWL registro</a>

<div class="listado">

</div>



</span>


</div>
</div>
  <script>



    let valorForm = "";
    let nombreSeleccionado = "";
  $(document).ready(function() {

    let formularioSesion = <?php echo $_SESSION['FORMULARIO'] ?>;
  
    
    var miDiv = document.querySelector("body");

    miDiv.style.backgroundImage = "url('../../img/fondo%20general.jpg')";
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
          
           
          if (item.estado_examen === "pendiente" && item.formulario == 3 && item.correo !== null) {
      html += `
      <div class="container mt-2 mb-3" >
          <div class="row justify-content-center align-items-center">
              <div class="col-md-6 col-sm-6" >
                  <div class="pt-2 pr-5 pb-2 pl-5 contenido-card " style="border-radius: 5px; background-color:white " >
                      <div class="">
                          <label class="form-check-label" ><b>${item.nombre} </b></label>
                      </div>
                  </div>
              </div>
              <div class="col-2">
                  <div class="form-check d-flex align-items-center justify-content-start" >
                  <button type="button"  style="color:white;border-radius: 12px;" value="${item.id_formulario}" data-formulario="${item.formulario}" data-nombre="${item.nombre}" data-preguntas="${item.cantidad_preguntas}" class="btn btn-primary pt-2 pr-5 pb-2 pl-5 btn-continuar" name="button"> Iniciar</button>
         
                  </div>
              </div>
          </div>
      </div>`;
          }

          if (item.estado_examen === "pendiente" && item.formulario == 2 && item.correo !== null) {
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
                        <button type="button"  style="color:white;border-radius: 12px;" value="${item.id_formulario}" data-formulario="${item.formulario}" data-preguntas="${item.cantidad_preguntas}" data-nombre="${item.nombre}" class="btn btn-primary pt-2 pr-5 pb-2 pl-5 btn-continuar" name="button"> Iniciar</button>
              
                        </div>
                    </div>
                </div>
            </div> `;
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
         cantidadPreguntas = event.target.getAttribute('data-preguntas');
         formularioSeleccionado = event.target.getAttribute('data-formulario');


         if (formularioSeleccionado == 2) {
          contenidoBody.innerHTML =  `
          <div class="container mt-5">
 <div class="row justify-content-center align-items-center">
   <div class="col-8">

   <h4 style="color: white">Instrucciones:</h4>
   <br>
   <ul style="color: white">
    ${valorForm == 74 ? `
    <li>Tiene 2 horas para terminar la evaluación.</li>
    <li>Solo puede subir máximo 2 archivos.</li>
    <li>Al terminar de subir sus archivos esta opción desaparecera.</li>
   
    `
     : 
    `<li>Número de preguntas: <span style="color:#00edff" >${cantidadPreguntas}</span></li>
    <li>Tienes un límite de tiempo: <span style="color:#00edff" >20 minutos</span></li>
    <li>Debe ser terminado en una sesión <span style="color:#00edff" >(No puedes guardar y continuar después).</span></li>
   <li>No se te permitirá <span style="color:#00edff" >regresar y cambiar tus respuestas.</span></li>
    `}
   

 
   </ul>

   </div>
 </div>
</div>



<div class="container mt-2 mb-3" >
          <div class="row justify-content-center align-items-center">
            

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
         }else {
          
         

        let tiempoTotal = calcularTiempoTotal(cantidadPreguntas);
         
        contenidoBody.innerHTML =  `

<div class="container mt-5">
 <div class="row justify-content-center align-items-center">
   <div class="col-8">

   <h4 style="color: white">Instrucciones:</h4>
   <br>
   <ul style="color: white">
   <li>Número de preguntas: <span style="color:#00edff" >${cantidadPreguntas}</span></li>
   <li>Tienes un límite de tiempo: <span style="color:#00edff" >${tiempoTotal}</span></li>
   <li>Duración: <span style="color:#00edff" >Cada pregunta tiene máximo de 40 segundos</span></li>
   <li>Debe ser terminado en una sesión <span style="color:#00edff" >(No puedes guardar y continuar después).</span></li>
   <li>No se te permitirá <span style="color:#00edff" >regresar y cambiar tus respuestas.</span></li>

 
   </ul>

   </div>
 </div>
</div>



<div class="container mt-2 mb-3" >
          <div class="row justify-content-center align-items-center">
            

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
});




$(document).on('click','.btn-comenzar',function(){

 // console.log(valorForm);

   if(formularioSeleccionado != 2){
    
   
  window.location.href = '../../template/vista/formulario-tecnica?cap=' + window.btoa(valorForm)+ '&nom=' + window.btoa(nombreSeleccionado)+'&pre=' + window.btoa(cantidadPreguntas);


    
   }else if(valorForm == 74){ //idprueba
    
    console.log(valorForm);
    window.location.href = '../../template/vista/file-ptecnica?cap=' + window.btoa(valorForm);

}else{
  window.location.href = '../../template/vista/formulario-preguntas?cap=' + window.btoa(valorForm)+ '&nom=' + window.btoa(nombreSeleccionado)+'&pre=' + window.btoa(cantidadPreguntas);

} 
});


function calcularTiempoTotal(cantidadPreguntas) {
    const segundosPorPregunta = 40;
    const totalSegundos = cantidadPreguntas * segundosPorPregunta;
    // const horas = Math.floor(totalSegundos / 3600);
    const minutos = Math.floor((totalSegundos % 3600) / 60);
    const segundos = totalSegundos % 60;
    return `${minutos} minutos y ${segundos} segundos`;
}

/*
$(document).on('click','.btn-subirArchivo',function(){

 // window.location.href = '../../../template/vista/formulario-tecnica?cap=' + window.btoa(valorForm)+ '&nom=' + window.btoa(nombreSeleccionado)+'&pre=' + window.btoa(cantidadPreguntas);
  window.location.href = '../../../template/vista/file-ptecnica';

}); */


  </script>



  <!-- fin -->

  <?php

   include "../../template/footer.php";

  ?>
