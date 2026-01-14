<?php

$paises = file_get_contents("https://gist.githubusercontent.com/Yizack/bbfce31e0217a3689c8d961a356cb10d/raw/107e0bdf27918adea625410af0d340e8fc1cd5bf/countries.json");

$paises = json_decode($paises,TRUE);



 ?>

<!DOCTYPE html>

<html lang="es" >

  <head>

    <meta charset="utf-8">

    <title>DMC | Math Challenge </title>

    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  	<link rel="stylesheet" type="text/css" href="https://survey.dmc.pe/suscripcion/css/selectize.default_2.css">





<link rel="icon"  href="../img/1 (5).png" >







<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />





<!--  -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

       <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/alertify.min.js"></script>

       <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/css/alertify.min.css"/>

       <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/css/themes/default.min.css"/>

<!--  -->







 <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>



      <!-- Global site tag (gtag.js) - Google Analytics -->

  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-112204121-1"></script>



<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<style media="screen">

  .iti { width: 100%; }   /* para el phone */





table {

  font-family: arial, sans-serif;

  border-collapse: collapse;

  width: 100%;

}



td, th {

  border: 1px solid #dddddd;

  text-align: left;

  padding: 8px;

}







</style>

  </head>

  <body style="background-image: url('../img/fondo1.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: 100% 100%;">







    <div class="container">

  		<div class="row justify-content-md-center">



        <!-- <div class="col-md-8" style="text-align: center;padding: 35px 20px 20px">

             <img  src="../img/logo.png" alt="Responsive image" class="img-responsive" width="60%" >

            </div> -->

<br>

  			<div class="col-md-10" style="padding: 25px 35px; border: 1px solid #c8c7c7; margin: 15px 0; border-radius: 6px; box-shadow: 0px 1px 5px #dddddd;background: white;">

          <div class="banner_inicial" style="text-align: center;" >

                <img  src="https://certificaciones.dmc.pe/img/logo_encuesta.png"  width="20%" >
                <h2> <b>EXCEL AVANZADO </b> </h2>
          </div>
          <div class="div_tiempo" style="text-align:center">
            <h3><strong>Tiempo: <span id="Tiempo" >01:00:00</span>  </strong> </h3>


          </div>
<br>

<div id="texto_inicial">













<p>



  Hola, somos DMC Perú



</p>











<hr>

<br>

	<form name="form" id="form" autocomplete="off">




<div class="form-group div_preguntas">

</div>

<div class="row">

                        <div class="col-md-12" >



                              <button type="submit" class="btn btn-primary btn-envia" id="button">Enviar</button>



                      </div>      </div>



  				</form>



  			</div>








    </div>



  		</div>





  	</div>






<script src="./assets/js/jquery.min.js"></script>

<script src="https://survey.dmc.pe/suscripcion/assets/js/popper.min.js"></script>

<script src="https://survey.dmc.pe/suscripcion/assets/js/bootstrap.min.js"></script>

<script type="text/javascript" src="https://survey.dmc.pe/suscripcion/assets/js/selectize.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="./assets/js/jquery.validate.min.js"></script>



<script type="text/javascript">


  var preguntas = "";
  var json_data = [];
$(document).ready(function(event)

{
   preguntas = "a";


  $.ajax({

        url:'../suscripcion/controller/controller_formularioLogin.php?op=consultaPreguntas',

        type:'POST',

        //data:,
        dataType:'JSON',
          // beforeSend:function(){
          //
          //                },

        success:function(data){
          var contador = 0;


          data.forEach((item, i) => {
              var contadorOpciones = 0;
            contador++;
            var filaHTML = '<label class="pay">'+contador+'. ';
                filaHTML += item.pregunta+'</label><br>';


              if (item.opciones) {
                  res = JSON.parse(item.opciones);
                    res.forEach(function(is) {
                      contadorOpciones ++;
                      filaHTML += '<div class="custom-control custom-radio">';
                        filaHTML += '<input type="radio" id="radio'+contador+'-'+contadorOpciones+'" name="'+contador+'" value="'+is.opcion+'" class="custom-control-input">';
                        filaHTML += '<label class="custom-control-label" for="radio'+contador+'-'+contadorOpciones+'">'+is.opcion+'</label>';
                      filaHTML += '</div>';
                          // is.opcion;
                    });

              }
              $(".div_preguntas").append(filaHTML);

              // incio guarda preguntas

              data = {
                          numero: contador,
                          pregunta : item.pregunta

                          };
                          json_data.push(data);
                          preguntas = JSON.stringify(json_data);
              //fin gp
              });


}

});

inicio();
});
var segundos = 60;
var minutos =19;
function inicio() {

    $(".texto_inicio").hide("fade");
  $("#grad1").show();
  control = setInterval(cronometro, 1000);


}
function cronometro() {

  segundos -= 1;

 if (segundos == 0) {

    segundos = 60;
    minutos -= 1;
  }


  if (segundos == 60 && minutos == -1) { // cuando se acaba el tiempo

   $('.div_tiempo').hide();
   registrarDatos('Se acabo el tiempo','El registro se realizó de manera automática','warning');
}else {
          if (segundos < 10 && minutos < 10) {
                document.getElementById('Tiempo').innerHTML = ("0" + minutos + ":" + "0" + segundos);
          }
          else if (segundos >= 10 && minutos < 10) {
            document.getElementById('Tiempo').innerHTML = ("0" + minutos + ":" + segundos);
          }
          else if (segundos < 10 && minutos > 10) {
            document.getElementById('Tiempo').innerHTML = (+minutos + ":" + "0" + segundos);

          }else {
            document.getElementById('Tiempo').innerHTML = (minutos + ":" + segundos);
          }
}



}

$(document).on('submit','#form',function(e){



  $.ajax({

        url:'../suscripcion/controller/controller_formularioLogin.php?op=registraPreguntas',

        type:'POST',

        data:$(this).serialize()+ '&listapregunta=' + preguntas,
        // dataType:'JSON',
          // beforeSend:function(){
          //
          //                },

        success:function(data){
          alert(data);

}

});

 e.preventDefault();

});






</script>



  </body>

</html>
