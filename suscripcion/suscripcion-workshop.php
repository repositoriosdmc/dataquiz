<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Formulario de inscripción</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="https://survey.dmc.pe/suscripcion/css/selectize.default_2.css">

<!--  -->
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

tr:nth-child(even) {
  background-color: #dddddd;

}
</style>
  </head>
  <body style="background-color:#26394e">



    <div class="container" >
  		<div class="row justify-content-md-center">

  			<div class="col-md-8" style="padding: 25px 35px; border: 1px solid #c8c7c7; margin: 15px 0; border-radius: 6px; box-shadow: 0px 1px 5px #dddddd;background: white;">

          <div style="text-align:center" >
             <img class="h-log2" src="../img/keyrus-banner.jpeg"  width="100%" ><br><br>
             <div class="formulario">
               <h3 ><b> <u>FORMULARIO DE INSCRIPCIÓN</u> </b></h3>
             </div>



          </div>

          <br>
  				<form   id="agregar" autocomplete="off">





<div class="formulario">
  <p>Te damos la bienvenida al workshop gratuito <b>"Liderazgo de Equipos de BI"</b>,
    dictado en alianza con Keyrus, empresa colombiana especializada en el desarrollo
    de soluciones tecnológicas.</p>
    <p>Tu participación en esta capacitación es totalmente gratuita, solo debes confirmar tu asistencia a la clase
      (este sábado 11 de febrero de 10:00 am. a 1:00 pm.) a través del registro en este formulario:</p>
  <hr>
                      <div class="form-row" >

	<div class="form-group col-md-12 titulo" style="text-align:center">

  </div>
    </div>


<!-- ocultos -->


 <!-- <div class="form-row">
  <div class="form-group col-md-12">
  <input type="text" readonly class="form-control" id="fecha" name="fecha"   >

  </div>
</div> -->

  <!-- </div> -->

    <div class="form-row" >
                            <div class="form-group col-md-12">
                            <label for="">Nombres: </label>
                            <input type="text" class="form-control" required id="nombres" name="nombres" placeholder="Nombres de Contacto" onkeyup="this.value = this.value.toUpperCase();">
                            </div>
                            <div class="form-group col-md-12">
                            <label for="">Apellidos: </label>
                            <input type="text" class="form-control" required id="apellidos" name="apellidos"  placeholder="Apellidos de Contacto" onkeyup="this.value = this.value.toUpperCase();" >
                            </div>

                            <!-- <div class="form-group col-md-12">
                            <label for="">DNI: </label>
                            <input type="number" step="any" class="form-control" id="dni" name="dni"  placeholder="DNI" >
                            </div> -->
                      </div>



                       <div class="form-row " >
                                        <div class="form-group col-md-12">
                                          <label for=""> Cargo: </label>
                                              <input type="text" value="" required class="form-control " id="cargo" name="cargo"  placeholder="Cargo" >
                                          </div>
                            </div>


                      <div class="form-row " >
                                        <div class="form-group col-md-12">
                                          <label for=""> Empresa: </label>
                                              <input type="text" value="" required class="form-control nombre_empresa" id="nombre_empresa" name="nombre_empresa"  placeholder="Nombre de Empresa" >
                                          </div>
                            </div>


                <div class="form-row " >

    <div class="form-group col-md-12">
        <label for=""> Tipo Documento: </label>
<select class="form-control" name="tipo_doc" required id="tipo_doc">
<option value="">Seleccione</option>
<option value="DNI">DNI</option>
<option value="OTRO">OTRO</option>
</select>

                      </div>
                </div>
                            <div class="form-row " >
                              <div class="form-group col-md-12">
                              <label for="">Nro. Documento: </label>
                              <input type="number" step="any" class="form-control" id="numero_doc" name="numero_doc"  placeholder="Nro. Documento" >
                              </div>
                                  </div>

                      <div class="row">


                        <div class="form-group col-md-12">
                          <label for=""> Teléfono:</label>
                      <br>
                      <input type="text" class="form-control phone" style="size: 100px;" id="phone" name="phone"   placeholder="Teléfono">

                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-md-12">
                          <label for=""> Correo:</label>
                      <br>
                      <input type="email" required class="form-control"  id="correo" name="correo" placeholder="Correo" >

                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-12">
                          <label for=""> País:</label>
                      <br>
                      <!-- <input type="text" required class="form-control " id="pais" name="pais" placeholder="Pais"> -->
                       <select class="form-control" required id="pais" name="pais">
                         <option value="">Seleccione</option>
                         <option value="Perú">Perú</option>
                         <option value="Mexico">Mexico</option>
                         <option value="Colombia">Colombia</option>
                         <option value="Argentina">Argentina</option>
                         <option value="Chile">Chile</option>
                         <option value="Bolivia">Bolivia</option>
                         <option value="Ecuador">Ecuador</option>
                         <option value="Otro">Otro</option>
                       </select>
                        </div>


                  </div>

                  <div class="form-row" id="div_otros">
                    <div class="form-group col-md-12">
                <label>Especificar:</label>
              <input type="text" class="form-control" name="otro_pais" id="otro_pais">
                    </div>

                </div>
<!--  -->
  <!-- <div id="terminos"> -->
<br>
                      <div>
                          <button type="submit" class="btn-guardar btn btn-primary" id="button">Enviar</button>
                      </div>



</div>

<div class="exito" style="text-align:center; ">
     <h2 ><span id="nombre_exito"></span>  <span id="apellido_exito"></span><b>, TU REGISTRO FUE EXITOSO</b></h2>
     <p>
       <h6>
Gracias por confirmar tu participación en este workshop. En las siguientes horas un asistente académico
 te brindará los accesos a la clase a través del correo brindado en este formulario.
</h6>  </p>
</div>
              <!-- </div> -->

  				</form>

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

$("#div_otros").hide();


  $(".exito").hide();

 //  $(".formulario").hide();
 // $(".exito").show();
});



$('#pais').change(function(){
    var resultado = $('#pais').val();
  if(resultado == 'Otro'){
   $('#div_otros').show();
}else {
$('#div_otros').hide();
}
});


//registrar
$(document).on('submit','#agregar',function(e){


      parametros = $(this).serialize();

      $.ajax({
            url:'../suscripcion/controller/controller_inscripcion.php?op=lista-gratuitos',
            type:'POST',
            data:parametros,

           success:function(data){

              if (data == 'ok') {


                $(".formulario").hide();
   $(".exito").show();
   $('#apellido_exito').html($('#apellidos').val());
   $('#nombre_exito').html($('#nombres').val());
              }

           }
              });



     e.preventDefault();
});

</script>

  </body>
</html>
