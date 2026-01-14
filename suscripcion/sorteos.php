<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SORTEO</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="https://survey.dmc.pe/suscripcion/css/selectize.default_2.css">



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
  <body style="background-image: url('../img/banner-edit-fondo.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: 100% 100%;">



    <div class="container">
  		<div class="row justify-content-md-center">

        <div class="col-md-8" style="text-align: center;padding: 35px 20px 20px">
             <img  src="../img/logo.png" alt="Responsive image" class="img-responsive" width="60%" >
            </div>

  			<div class="col-md-8" style="padding: 25px 35px; border: 1px solid #c8c7c7; margin: 15px 0; border-radius: 6px; box-shadow: 0px 1px 5px #dddddd;background: white;">
          <div style="text-align: center;">
             <img class="h-log2" src="../img/sorteo.PNG"  width="100%">

         </div>
<br>
<div id="texto_inicial">



  				<form name="form" id="form" autocomplete="off">



<p>

 <b>¡Hola! Solo faltan unos pasos para que participes de la Membresía Mensual.</b>
</p>


<p>

  El equipo de Plataforma Virtual DMC, dará acceso a cursos especializados en analítica totalmente gratis por un mes a todas las personas que acierten el marcador final del partido Uruguay vs Perú.
  <br> <br>
  *01 Membresía Mensual está valorizada en US$ 129.
</p>

<br>

<p><b>Para participar solo debes estos simples pasos:</b>: <br>
&nbsp; 1.	Síguenos en nuestras redes sociales: <br>
&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  a.	Instagram: <a href="https://bit.ly/PlataformaVirtual-IG" target="_blank">https://bit.ly/PlataformaVirtual-IG</a> <br>
&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  b.	Facebook: <a href="https://bit.ly/PlataformaVirtual-FB" target="_blank">https://bit.ly/PlataformaVirtual-FB</a> <br>
<span style=" padding-top: 25px;">&nbsp; 2. Comparte la publicación original en modo público. <br> <br> </span>


&nbsp; 3.	Completa este breve formulario.


</p>



<p>

  <b>Términos y condiciones:</b>  <br>  <br>
  -  Podrás participar hasta las 6:30 p.m. del jueves 24 de marzo. <br>
  - Los ganadores deberán haber cumplido todos los pasos para recibir el premio. <br>
  - Se comunicarán los ganadores el 25 de marzo. <br>
  - No se puede hacer traspasos.

</p>

<hr>
<br>

<div class="form-row">
<input type="hidden" name="codigo_ficha" id="codigo_ficha" value="1836">  <!-- aqui va el código de ficha que me pasa katy-->

</div>
                      <div class="form-row">

                      	<div class="form-group col-md-6">
                      		<label for=""> Nombres :</label>
                              <input type="text" class="form-control" id="nombres" name="nombres" required="" placeholder="Nombres " required="">
                          </div>
                          <div class="form-group col-md-6">
                        		<label for="">  Apellidos:</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" required="" placeholder="Apellidos" required="">
                            </div>

                      </div>

                      <div class="form-row">

                        <div class="form-group col-md-6">
                          <label for="exampleFormControlInput1">Tipo de documento</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend" id="img">
<span class="input-group-text" id="basic-addon1"> <img src="../img/peru.png" style="width:20px;height:20px;" > </span>
                            </div>
                          <select class="form-control valid" id="tDocumento" name="tDocumento" required="">
                              <option value="">Seleccione</option>
                              <option value="DNI">DNI</option>
                              <option value="OTROS">OTROS </option>
                          </select>


                          </div>
                        </div>


                          <div class="form-group col-md-6">
                            <label for="exampleFormControlInput1">Nº</label>
  <div class="numeral">  </div>


                      </div>

                    </div>

                      <div class="form-row">
                          <div class="form-group col-md-12">
                            <label for=""> Correo electrónico:        </label>
                            <input type="email" class="form-control" id="correo" name="correo" required="" placeholder="Correo electrónico" required="">
                          </div>

                      </div>

<div class="row">
  <div class="form-group col-md-12">
    <label for=""> Celular:</label>
<br>
<input type="text" class="form-control" style="size: 100px;" id="phone" name="phone"  required placeholder="">

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
                          <button type="submit" class="btn btn-primary" id="button">Enviar</button>
                      </div>

  				</form>

  			</div>



        <!-- inicio registro exitoso -->
        <div id="exito">
        <p style="text-align:center; font-size: 24px;"> <b>¡Gracias por registrarte! </b> </p>




        <p>
✅ ¿Qué incluye la Membresía Mensual? ► <a href="https://bit.ly/PV-mensual">https://bit.ly/PV-mensual</a> <br><br>

✅ Si tienes alguna consulta escríbenos al inbox o al WhatsApp ► <a href="https://bit.ly/pvdmc-wsp">https://bit.ly/pvdmc-wsp</a>
          <!-- Visita nuestra web y conoce todas las novedades ► <a href="https://bit.ly/Plataforma-DMC" target="_blank">https://bit.ly/Plataforma-DMC</a> -->

         </p>
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
// ---

$(document).ready(function()
{


   $('.numeral').html('<input type="number" class="form-control" id="num_documento"  name="num_documento" placeholder="Nº" required="">');

     $("#exito").hide();
  //     $("#exito").show();
  // $("#texto_inicial").hide();

});

$('#tDocumento').change(function(){

    var resultado = $('#tDocumento').val();

   if(resultado == 'DNI'){
    $('.numeral').html('<input type="number" class="form-control" id="num_documento" onkeyup="countChars(this);" name="num_documento" placeholder="Nº" required=""> <p id="charNum"> </p>');
$('#img').html('<span class="input-group-text" id="basic-addon1"> <img src="../img/peru.png" style="width:20px;height:20px;" > </span>');
}else {
  $('.numeral').html('<input type="number" class="form-control" id="num_documento"  name="num_documento" placeholder="Nº" required="">');
//
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
$(document).on('submit','#form',function(e){

     parametros = $(this).serialize();

     $.ajax({
           url:'../suscripcion/controller/controller_menbresia_cursoGratis.php?op=sorteo',
           type:'POST',
           data:parametros,
             beforeSend: function() {
               $('.btn-guardar').prop("disabled", true) ;
            },
          success:function(data){
     $('.btn-guardar').prop("disabled", false) ;
           if (data == 'ok') {
               $("#exito").show();
           $("#texto_inicial").hide();

               alertify.success('Se registro correctamente!');


            }else   {
                alertify.error('El DNI debe tener 8 digitos!');
             }


}
    });



     e.preventDefault();
});

</script>

  </body>
</html>
