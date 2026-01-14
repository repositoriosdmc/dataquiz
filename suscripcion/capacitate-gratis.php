<?php
$paises = file_get_contents("https://gist.githubusercontent.com/Yizack/bbfce31e0217a3689c8d961a356cb10d/raw/107e0bdf27918adea625410af0d340e8fc1cd5bf/countries.json");
$paises = json_decode($paises,TRUE);


 ?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Contenido gratis del día</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="https://survey.dmc.pe/suscripcion/css/selectize.default_2.css">
<link rel="icon"  href="../img/1 (5).png" >
<!--  -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

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

<style media="screen">
  .iti { width: 100%; }   /* para el phone */


</style>
  </head>
  <body style="background-image: url('../img/fondo_carnaval.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: 100% 100%;">
    <div class="container" >
  		<div class="row justify-content-md-center">

	<div class="col-md-8" style="text-align: center; padding:-150px 5px -150px 20px; ">
       <img  src="../img/Logo2.png" alt="Responsive image" class="img-responsive" width="80%" >
      </div>

      	<div class="col-md-8" style="padding: 25px 35px; border: 1px solid #c8c7c7; margin: 15px 0; border-radius: 6px; box-shadow: 0px 1px 5px #dddddd;background: white;">

          <!-- <div >
               <img class="h-log2" src="../img/capacitate-gratis.PNG" width="100%" >
          </div> -->
          <br>

          <!-- inicio -->

          <div id="mensaje">


  				<form   id="agregar" autocomplete="off">




<br>

<!--  -->

<div style="text-align:center">
   <h3> <b>CARNAVAL DE <br>
     CONOCIMIENTOS</b> </h3>
</div>

<br>

<p> <b>Hola</b>, seguimos celebrando los carnavales de conocimientos hasta el <b>domingo 27 de febrero.</b>
  Por tal motivo te estamos entregando 72 horas (25, 26 y 27) de <b>ACCESO GRATUITO a 42 CURSOS.</b>
</p>

<p>

  <b>¡Completa este formulario</b> y únete a la fiesta de aprendizaje en <b>temas de analítica y ciencia de datos!</b>
</p>



<p style="color:red">
(*)Obligatorio
</p>


<hr>
<br>

<div class="form-row">
<input type="hidden" name="codigo_ficha" id="codigo_ficha" value="1790">

</div>
                      <div class="form-row">

                      	<div class="form-group col-md-6">
                      		<label for=""> Nombres : <span style="color:red">*</span></label>
                              <input type="text" class="form-control" id="nombres" name="nombres" required="" placeholder="Nombres" >
                          </div>
                          <div class="form-group col-md-6">
                            <label for="">Apellidos: <span style="color:red">*</span></label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" required="" placeholder="Apellidos" >
                            </div>
                      </div>


                      <div class="form-row">

                        <div class="form-group col-md-12">
                          <label for=""> País de Residencia: <span style="color:red">*</span></label>
                          <select class="selector" id="pais" name="pais">
                            <option value="">--Seleccione--</option>
                            <!--   <option value="Perú">Perú</option> -->
                            <? for ($i = 0; $i < count($paises["countries"]); $i++) { ?>
                              <option value='<?=$paises["countries"][$i]["name_es"]?>'><?=$paises["countries"][$i]["name_es"]?></option>
                            <? } ?>
                          </select>
                          </div>
                          <!-- <div class="form-group col-md-12">
                            <label for="">  Ciudad en la que vive actalmente:</label>
                      <input type="text" class="form-control" id="ciudad" name="ciudad"  placeholder="Ciudad" >
                            </div> -->

                      </div>



                      <div class="form-row">
                           <div class="form-group col-md-12">
                            <label for=""> Correo electrónico: <span style="color:red">*</span>

                            </label>
                            <input type="text" class="form-control" id="correo" name="correo" required="" placeholder="Correo electrónico" required="">
                          </div>
                          <div class="form-group col-md-12">
                            <label for=""> Celular: <span style="color:red">*</span>                  </label>
                            <input type="text" class="form-control" id="phone" name="phone"  required placeholder="">
                          </div>
                      </div>
                      

<!--  -->
<div class="form-check">
    <input class="form-check-input" type="checkbox" value="1" id="datos" name="datos" required style="margin-top: 7px;">
    <label class="form-check-label" for="datos">
        He leído y acepto los <a href="#" data-toggle="modal" data-target="#myModal">términos y condiciones</a>
    </label>

    <div>
        <label id="datos-error" class="error" for="datos" style="display: none;">Campo obligatorio</label>
    </div>
</div>
<br>
                      <div>
                          <button type="submit" class="btn-guardar btn btn-primary" id="button">Enviar</button>
                      </div>

  				</form>
    </div>
<!-- fin -->

<!-- inicio registro exitoso -->
<div id="exito">


<p style="text-align:center">¡Ya estás participando de los <br> <b>CARNAVALES DE CONOCIMIENTOS!</b> </p>

<p>Ingresa a este enlace/botón y descubre todo lo que puedes aprender durante 72 horas. </p>


 <p style="text-align:center">
   <!-- <a >https://onlinedmc.teachable.com/p/contenido-gratis-del-dia</a> -->
    <!-- <a  id=""  class="btn btn-edit btn-sm btn-info"><i class="glyphicon glyphicon-refresh"></i></a> -->

<a type="button"  href="https://onlinedmc.teachable.com/p/acceso-temporal-72-horas" target="_blank" class="btn btn-edit btn-sm btn-primary">
Aquí
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
</svg>   </a>
  </p>

<!-- <div class="col-md-12" style="text-align: center;padding: 55px 30px 30px">
     <img  src="../img/contenidoGratis.png" alt="Responsive image" class="img-responsive" width="60%" >
    </div> -->
</div>
<!-- fin -->
  			</div>
  		</div>
  	</div>

<!--  -->

    <? include_once "view/terminos.php"; ?>

<script type="text/javascript">

</script>

<script src="./assets/js/jquery.min.js"></script>
<script src="https://survey.dmc.pe/suscripcion/assets/js/popper.min.js"></script>
<script src="https://survey.dmc.pe/suscripcion/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://survey.dmc.pe/suscripcion/assets/js/selectize.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="./assets/js/jquery.validate.min.js"></script>

<script type="text/javascript">
function getIp(callback) {
fetch('https://ipinfo.io/json?token=e41e88175aa564', { headers: { 'Accept': 'application/json' }})
.then((resp) => resp.json())
.catch(() => {
  return {
    country: 'us',
  };
})
.then((resp) => callback(resp.country));
}


const phoneInputField = document.querySelector("#phone");
const phoneInput = window.intlTelInput(phoneInputField, {
initialCountry: "auto",
geoIpLookup: getIp,
utilsScript:
"https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
});

// -------


$(document).ready(function()
{

  $(".selector").selectize({
    create: true
  });
  $('.numeral').html('<input type="number" class="form-control" id="num_documento"  name="num_documento"  required="">');


    $("#exito").hide();

      // $("#mensaje").hide();
      // $("#exito").show();
});

$('#tDocumento').change(function(){

  //<input type="number" class="form-control" id="num_documento" onkeyup="countChars(this);" name="num_documento"  required="">
    var resultado = $('#tDocumento').val();

   if(resultado == 'DNI'){
    $('.numeral').html('<input type="number" class="form-control" id="num_documento" onkeyup="countChars(this);" name="num_documento"  required=""> <p id="charNum"> </p>');
$('#img').html('<span class="input-group-text" id="basic-addon1"> <img src="../img/peru.png" style="width:20px;height:20px;" > </span>');
 // $('#num_documento').val('');
 //     $("#num_documento").keydown(function(event){
 //   countChars(this);
 //    });
}else {
  $('.numeral').html('<input type="number" class="form-control" id="num_documento"  name="num_documento"  required="">');
$('#img').html('<span class="input-group-text" id="basic-addon1"> <img src="../img/mundo.png" style="width:20px;height:20px;" > </span>');
}
});



function countChars(obj){


    var maxLength = 8;
    var strLength = obj.value.length;

    if(strLength > maxLength){
        document.getElementById("charNum").innerHTML = '<span style="color: red;">'+strLength+' de '+maxLength+' Formato inválido</span>';
    }else{
          document.getElementById("charNum").innerHTML = "";
    }
}
//registrar
$(document).on('submit','#agregar',function(e){

     parametros = $(this).serialize();

     $.ajax({
           url:'../suscripcion/controller/controller_menbresia_cursoGratis.php?op=plan_gratuito',
           type:'POST',
           data:parametros,
            beforeSend: function() {
              $('.btn-guardar').prop("disabled", true) ;
           },
          success:function(data){
    $('.btn-guardar').prop("disabled", false) ;
           if (data == 'ok') {

             $("#mensaje").hide();
             $("#exito").show();
                 alertify.success('Registro Exitoso!');

            BorrarInputs();

           } else {
                 alertify.error('error de registro!');
           }

}
    });



     e.preventDefault();
});


function BorrarInputs() {
  $('#nombres').val('');
  $('#apellidos').val('');
  $('#edad').val('');
  $('#tDocumento').val('');
  $('#num_documento').val('');
  $('#correo').val('');
  $('#phone').val('');

}

</script>

  </body>
</html>
