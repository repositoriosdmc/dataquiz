<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Formulario</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="https://survey.dmc.pe/suscripcion/css/selectize.default_2.css">

<!--  -->


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
             <img class="h-log2" src="../img/summit.jpeg"  width="100%" ><br><br>
               <h2 ><b>FORMULARIO DE INSCRIPCIÓN</b></h2>

          </div><br>
  				<form   id="agregar" autocomplete="off">



<hr>
<br>
<div class="form-row" id="inscripcionselect" >

  <div class="form-group col-md-12">
    <label for=""> Tipo de Inscripción: <span style="color:red">*</span></label>

<select class="form-control" required name="tipo" id="tipo">
  <option value="">Seleccione</option>
  <option value="coorporativa">Coorporativa</option>
  <option value="gratuita">Gratuita</option>
</select>

    </div>

</div>

<div id="formulario">

                      <div class="form-row" >

	<div class="form-group col-md-12 titulo" style="text-align:center">

  </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
            <input type="hidden" readonly class="form-control" id="codigo_ficha" name="codigo_ficha" value="1587">
        </div>
    </div>

  <!-- <div id="div_coorporativo" class="div_coorporativo" > -->
      <div class="form-row " >
                      	<div class="form-group col-md-12">
                      		<label for=""> Nombre de Empresa: </label>
                              <input type="text" value="" required class="form-control nombre_empresa" id="nombre_empresa" name="nombre_empresa"  placeholder="Nombre de Empresa" >
                          </div>

                          <div class="form-group col-md-12 div_coorporativo">
                            <label for="">Ruc: </label>
                                <input type="number" step="any" value="" class="form-control" id="ruc" name="ruc"  placeholder="RUC" >
                            </div>


                            <div class="form-group col-md-12 div_coorporativo">
                            <label for=""> Teléfono de Empresa: </label>
                            <input type="number" step="any" value="" class="form-control telefono_empresa" id="telefono_empresa" name="telefono_empresa"  placeholder="Teléfono" >
                            </div>


                  </div>
  <!-- </div> -->

    <div class="form-row" >
                            <div class="form-group col-md-12">
                            <label for="">Nombres de Contacto: </label>
                            <input type="text" class="form-control" required id="nombres" name="nombres" placeholder="Nombres de Contacto" >
                            </div>
                            <div class="form-group col-md-12">
                            <label for="">Apellidos de Contacto: </label>
                            <input type="text" class="form-control" required id="apellidos" name="apellidos"  placeholder="Apellidos de Contacto" >
                            </div>

                            <div class="form-group col-md-12">
                            <label for="">DNI: </label>
                            <input type="number" step="any" class="form-control" id="dni" name="dni"  placeholder="DNI" >
                            </div>
                      </div>
                      <div class="row">



                        <div class="form-group col-md-12">
                          <label for=""> Celular Contacto:</label>
                      <br>
                      <input type="text" class="form-control phone" style="size: 100px;" id="phone" name="phone"   placeholder="">

                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-md-12">
                          <label class="titulo_correo"></label>
                      <br>
                      <input type="email" required class="form-control"  id="mail" name="mail" >

                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-12">
                          <label for=""> Cantidad de entradas:</label>
                      <br>
                      <input type="number" required class="form-control cantidad" id="cantidad" name="cantidad" placeholder="Cantidad de entradas">

                        </div>


                        <div class="form-group col-md-3 ">

                             <button  type="button" class="btn btn-success btn-generar" name="button">Generar código</button>
                        </div>

                      <div class="form-group col-md-12">
                        <label for=""> Código :</label>
                    <br>
                    <input type="text" readonly required class="form-control codigo" id="codigo_generado" name="codigo_generado" placeholder="Código">

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
     <h2 ><b style="text-align:center; color:green"  >SU REGISTRO FUE EXITOSO</b></h2>
     <p> <b>Nombres:</b> <span id="nombre_exito"></span> <br>
         <b>Apellidos:</b> <span id="apellido_exito"></span><br>
       <b>Código:</b> <span id="codigo_exito"></span> </p>
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
 $(".div_coorporativo").hide();
 $("#formulario").hide();

 $("#inscripcionselect").show();
 $(".exito").hide();
});


 $(document).on('change', '#tipo', function(event) {

   let res = $('#tipo').val();
   if(res == "gratuita"){

     $("#formulario").show();
     $('.titulo').html('<h3><b>Inscripción Summit Gratuita</b></h3>');
     $('.titulo_correo').html('Correo:');
     $(".div_coorporativo").hide();
     $('#mail').attr('placeholder','Correo');
 }else if(res == "coorporativa"){
     $('.titulo').html('<h3><b>Inscripción Summit Coorporativos</b></h3>');
     $("#formulario").show();
     $(".div_coorporativo").show();
     $('.titulo_correo').html('Correo Coorporativo:');
     $('#mail').attr('placeholder','Correo Coorporativo');
 }else {
     $("#formulario").hide();
     $(".div_coorporativo").hide();

 }
});




$(".btn-generar").click(function (){


  $.ajax({
       url:'../suscripcion/controller/controller_inscripcion.php?op=crear_codigo',
        type:'POST',
        // data:parametros,

       success:function(data){
       $('#codigo_generado').val(data);
       }
           });

});
//--


//registrar
$(document).on('submit','#agregar',function(e){
  var codigo1 = $('#cantidad').val();

     parametros = $(this).serialize();
  var codigo_generado1 = $('#codigo_generado').val();
if (codigo_generado1 == '') {
       alertify.error('Debe generar el código');
}else {

   $.ajax({
         url:'../suscripcion/controller/controller_inscripcion.php?op=lista_invitados',
         type:'POST',
         data:parametros,

        success:function(data){
          $("#formulario").hide();

          $("#inscripcionselect").hide();
          $(".exito").show();
          $('#nombre_exito').html($('#nombres').val());
          $('#apellido_exito').html($('#apellidos').val());
          $('#codigo_exito').html($('#codigo_generado').val());
        }
           });
}



     e.preventDefault();
});

</script>

  </body>
</html>
