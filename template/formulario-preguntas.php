<?php
// https://www.shanidkv.com/blog/font-awesome-icons-css-content-values
session_start();
if (!isset($_SESSION[ID])) {
header('location: ../suscripcion/inicio_formulario.php');
}
include "header.php";
include 'nav.php';


 $valorDecodificado = base64_decode($_GET['cap']);
$nombreCap = base64_decode($_GET['nom']);
$ti = base64_decode($_GET['va']);


?>


<div class="alert " role="alert"  style="background-image: url('../../img/Fondo de evaluación.jpg');  background-repeat: no-repeat; background-size: 100% 100%; ">
<br>    <img  src="https://certificaciones.dmc.pe/img/logo_encuesta.png" style=" float: right; " width="140px" >

<div class="row">
  <div class="col-md-1">

  </div>
  <div class="col-md-10">
    <h4 style="color:white; " ><?php echo $nombreCap; ?></h4>

      <p style="color:#59B5EB;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
      <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
    </svg>
          <strong>Tiempo: <span id="hours"></span> horas : <span id="minutes"></span> minutos : <span id="seconds"></span> segundos  </strong> </p>
           <p id="message"></p>
  </div>

</div>

  <br><br>
</div>


<hr>

<br>



<form name="form" id="form" autocomplete="off">


  <div class="row">
    <div class="col-md-1">

    </div>
    <div class="col-md-8">
  <p style="font-family: Helvetica, Arial, sans-serif; color:#8E93A3" >Tienes <span class="tiempo_estimado" ></span> minutos para resolver este examen que consta de <span class="nro_preguntas" ></span> preguntas aleatorias. <br> Revisa detenidamente antes de enviar tus respuestas. </p>
    </div>  </div>

<div class="row">
  <div class="col-md-1">

  </div>
  <div class="form-group div_preguntas col-md-10">

  </div>

</div>
<hr>
<div class="row">

                    <div class="col-md-12" style="text-align:center" >



                          <button type="submit" class="btn btn-primary btn-envia" style="width: 300px;" id="button">Enviar</button>



                  </div>      </div>
                  <br>



      </form>

<script type="text/javascript">

  var capacitacion ="";

  var json_data = [];



$(document).ready(function(event)

{

      capacitacion = "<?php echo $valorDecodificado; ?>";







listaPreguntas();


});

document.addEventListener('DOMContentLoaded', () => {

  var  ti  = "<?php echo $ti; ?>";

  const timeString = ti;
  const timeParts = timeString.split(':');

  const hora = parseInt(timeParts[0], 10);
  const minutos = parseInt(timeParts[1], 10);

  if (hora == 0) {
     $(".tiempo_estimado").html(minutos);
  }else {
     $(".tiempo_estimado").html(hora+":"+minutos);
  }



       //===
       // VARIABLES
       //===
       const now = new Date();
       const target = new Date();
       target.setHours(now.getHours() + hora); //horas
       target.setMinutes(now.getMinutes() + minutos); //minutos
       target.setSeconds(0);
       target.setMilliseconds(0);

       // DOM for render
       const SPAN_HOURS = document.querySelector('span#hours');
       const SPAN_MINUTES = document.querySelector('span#minutes');
       const SPAN_SECONDS = document.querySelector('span#seconds');
       const MESSAGE = document.querySelector('#message');
       // Milliseconds for the calculations
       const MILLISECONDS_OF_A_SECOND = 1000;
       const MILLISECONDS_OF_A_MINUTE = MILLISECONDS_OF_A_SECOND * 60;
       const MILLISECONDS_OF_A_HOUR = MILLISECONDS_OF_A_MINUTE * 60;

       //===
       // FUNCTIONS
       //===

       /**
       * Method that updates the countdown and the sample
       */
       function updateCountdown() {
           // Calcs
           const now = new Date();
           const duration = target - now;
           let remainingHours = Math.floor(duration / MILLISECONDS_OF_A_HOUR);
           let remainingMinutes = Math.floor((duration % MILLISECONDS_OF_A_HOUR) / MILLISECONDS_OF_A_MINUTE);
           let remainingSeconds = Math.floor((duration % MILLISECONDS_OF_A_MINUTE) / MILLISECONDS_OF_A_SECOND);

           // Check if countdown is finished
           if (duration <= 0) {
               clearInterval(countdownInterval);
               remainingHours = remainingMinutes = remainingSeconds = 0;
               MESSAGE.textContent = "¡Tiempo terminado!";

               // ajax
               $.ajax({

             url:'../suscripcion/controller/controller_formularioLogin.php?op=registraRespuestas',
             type:'POST',
             data:$("#form").serialize()+ '&capacitacion='+capacitacion,
             dataType:'JSON',
             beforeSend:function(){

             Swal.fire({
             title:'Cargando..',
             text:'Espere un momento',
              showConfirmButton : false
             })

             },
             success:function(data){
               Swal.fire({

               title:"¡El tiempo se término!",
               text:data.text,
               icon:data.type,
               timer:3000,
               showConfirmButton:false
               });

               setTimeout(function(){
               window.location.href='../suscripcion/inicio_formulario.php'
               },3000);

             }

             });
               // fin ajax

           }

           // Render
           SPAN_HOURS.textContent = remainingHours < 10 ? '0' + remainingHours : remainingHours;
           SPAN_MINUTES.textContent = remainingMinutes < 10 ? '0' + remainingMinutes : remainingMinutes;
           SPAN_SECONDS.textContent = remainingSeconds < 10 ? '0' + remainingSeconds : remainingSeconds;
       }

       //===
       // INIT
       //===
       updateCountdown();
       // Refresh every second
       const countdownInterval = setInterval(updateCountdown, MILLISECONDS_OF_A_SECOND);
   });


function listaPreguntas(){
  $.ajax({

        url:'../suscripcion/controller/controller_formularioLogin.php?op=consultaPreguntas',

        type:'POST',

        data:{"capacitacion":capacitacion},
         dataType:'JSON',
          beforeSend:function(){
            Swal.fire({

           title:'Cargando',
           text:'Espere un momento',
           imageUrl:"../img/loader2.gif",
           showConfirmButton:false

           });
                         },

        success:function(data){

          if (data.mensaje == "existe") {
            window.location.href="../template/home.php";
          }else {


          var contador = 0;


          data.datos.forEach((item, i) => {
              var contadorOpciones = 0;
            contador++;
            var filaHTML = '<br> <label class="pay no-select" style="font-family: Helvetica, Arial, sans-serif; color:#8E93A3">'+contador+'. ';
                filaHTML += item.pregunta+'</label><br>';


              if (item.opciones) {
                  res = JSON.parse(item.opciones);
                    res.forEach(function(is) {
                      contadorOpciones ++;
                      filaHTML += '<div style="font-family: Helvetica, Arial, sans-serif; color:#8E93A3" class="custom-control custom-radio">';
                        filaHTML += '<input type="radio"  id="radio'+contador+'-'+contadorOpciones+'" name="'+contador+'" value="'+item.id_pregunta+'§'+is.opcion+'§'+is.numero+'" class="custom-control-input">';
                        filaHTML += '<label class="custom-control-label" for="radio'+contador+'-'+contadorOpciones+'">'+is.opcion+'</label>';
                      filaHTML += '</div>';

                    });

              }
              $(".div_preguntas").append(filaHTML);


              });


              Swal.fire({

              title:"¡Bienvenido al examen de "+"<?php echo $nombreCap; ?>" +"!",
              text:"Empieza ahora.",
              icon:"success",
              timer:3000,
              showConfirmButton:true
              });
}
      $(".nro_preguntas").html(contador);

}

});
}


$(document).on('submit','#form',function(e){



  $.ajax({

        url:'../suscripcion/controller/controller_formularioLogin.php?op=registraRespuestas',

        type:'POST',

        data:$(this).serialize()+ '&capacitacion='+capacitacion,
        dataType:'JSON',
        beforeSend: function() {

            $('.btn-envia').prop("disabled", true) ;
            Swal.fire({

           title:'Cargando',
           text:'Espere un momento',
           imageUrl:"../img/loader2.gif",
           showConfirmButton:false

           });
        },

        success:function(data){

        $('.btn-envia').prop("disabled", false) ;
      setTimeout(function(){

      window.location.href='../suscripcion/inicio_formulario.php'


      },3000);
      Swal.fire({

      title:data.title,
      text:data.text,
      icon:data.type,
      timer:3000,
      showConfirmButton:false
    });
}

});

 e.preventDefault();

});

// desactivar en back
(function (global) {

	if(typeof (global) === "undefined")
	{
		throw new Error("window is undefined");
	}

    var _hash = "!";
    var noBackPlease = function () {
        global.location.href += "#";

		// making sure we have the fruit available for juice....
		// 50 milliseconds for just once do not cost much (^__^)
        global.setTimeout(function () {
            global.location.href += "!";
        }, 50);
    };

	// Earlier we had setInerval here....
    global.onhashchange = function () {
        if (global.location.hash !== _hash) {
            global.location.hash = _hash;
        }
    };

    global.onload = function () {

		noBackPlease();

		// disables backspace on page except on input fields and textarea..
		document.body.onkeydown = function (e) {
            var elm = e.target.nodeName.toLowerCase();
            if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                e.preventDefault();
            }
            // stopping event bubbling up the DOM tree..
            e.stopPropagation();
        };

    };

})(window);
</script>


<?php include "footer.php"; ?>
