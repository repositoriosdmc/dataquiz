
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Inscripción Summit</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="https://survey.dmc.pe/suscripcion/css/selectize.default_2.css">

<!--  -->

<link rel="stylesheet" href="https://code.jquery.com/jquery-3.5.1.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />

<!--  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
       <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/alertify.min.js"></script>
       <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/css/alertify.min.css"/>
       <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/css/themes/default.min.css"/>
<!--  -->


<link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js">

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

  			<div class="col-md-12" style="padding: 25px 35px; border: 1px solid #c8c7c7; margin: 15px 0; border-radius: 6px; box-shadow: 0px 1px 5px #dddddd;background: white;">

          <div style="text-align:center" >
              <img class="h-log2" src="../img/summit.jpeg"  width="65%"  ><br> <br>
               <h2 ><b>FORMULARIO DE INSCRIPCIÓN</b></h2>

          </div><br>



<hr>
<br>
<div class="form-row" id="inscripcionselect" >
  <div class="form-group col-md-2"></div>
  <div class="form-group col-md-6">
    <label for="">Ingrese su código</label>

<input type="text" class="form-control codigo" id="codigo" name="codigo" >
    </div>
  <div class="form-group col-md-3">
    <div style="padding-bottom: 31px"></div>
<button type="button" class="btn btn-success btn-buscar" name="button">Buscar</button>
</div>
</div>


			<form   id="agregar" autocomplete="off">
<div id="formulario">
<input type="hidden" name="codigo_generado" id="codigo_generado" >
<div class="form-row" >
<br>
<div class="form-group col-md-12 titulo" style="text-align:center">
 <h6>
<p>Saludos <b><span id="mensaje_nombre"></span></b> en este formulario debe ingresar los datos de los invitados </p>
</h6>
 <h6> <p>El código <b><span id="mensaje_codigo"></span></b> cuenta con <b><span id="mensaje_cantidad"></span> de <span id="mensaje_total"></span> </b> entradas disponibles para que pueda registrar. </p>
</h6>
</div>
<div class="form-group col-md-12 titulo" >
<input type="hidden" class="form-control" readonly name="contador" id="contador">

<h4> <b class="text-secondary" >Por favor ingrese sus invitados:</b> </h4>
</div>
</div>



                      <div class="row">
                        <div class="form-group col-md-4">
                          <label for=""> Nombres:</label>
                      <br>
                      <input type="text" class="form-control" required id="nombres_invitado" name="nombres_invitado"   placeholder="">

                        </div>
                        <div class="form-group col-md-4">
                          <label for=""> Apellidos:</label>
                      <br>
                                        <input type="text" required class="form-control" id="apellidos_invitado" name="apellidos_invitado"   placeholder="">

                        </div>
                        <div class="form-group col-md-4">
                          <label for=""> Tipo. Doc:</label>
                      <br>
                      <select class="form-control tipo_doc" id="tipo_doc" required name="tipo_doc" >
<option value="">Seleccione</option>
<option value="DNI">DNI</option>
<option value="OTROS">OTROS </option>
</select>

                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-md-4">
                          <label for=""> Número Doc.:</label>
                      <br>
                            <input type="text" required class="form-control " id="num_doc" name="num_doc"   placeholder="">
                        </div>
                        <div class="form-group col-md-4">
                          <label for=""> Teléfono:</label>
                      <br>
                      <input type="number" required class="form-control phone" style="size: 100px;" id="phone" name="phone"   placeholder="">

                        </div>
                        <div class="form-group col-md-4">
                          <label for=""> Email:</label>
                      <br>
                    <input type="text" class="form-control " required id="mail" name="mail"   placeholder="">

                        </div>
                      </div>
            <div class="row">
              <div class="form-group col-md-4">
                <label for=""> Pais:</label>

                  <input type="text" class="form-control " required id="pais" name="pais"   placeholder="">
              </div>
      <div class="form-group col-md-4">
        <div style="padding-bottom: 31px"></div>
      <input type="submit" class="btn btn-primary btn-agregar" name="" value="Agregar">

        </div>

              </div>



			</form>


               <div class="table-responsive">
              <table class="table table-condensed" id="tablaInvitados">
     <thead>
       <tr>
<th>NOMBRES</th>
<th>APELLIDOS</th>
<th>TIPO DOC.</th>
<th>NÚMERO DOC.</th>
<th>TELÉFONO</th>
<th>EMAIL</th>
<th>PAIS</th>
</tr>
     </thead>
   <tbody>

   </tbody>

              </table>
              </div>
<!--  -->
  <!-- <div id="terminos"> -->

<!-- <br>
                      <div>
                          <button type="submit" class="btn-guardar btn btn-primary" id="button">Enviar</button>
                      </div>



</div>

<div class="exito" style="text-align:center; ">

</div>
              <!-- </div> -->



  			</div>
<br>
        <div class="exito" style="text-align:center; ">
             <h2 ><b style="text-align:center; color:green"  >SU REGISTRO FUE EXITOSO</b></h2>
            <p><b style="text-align:center; color:green"  > <h2>Las invitaciones disponibles para este código se acabaron</h2></b> </p>
        </div>

  		</div>
  	</div>

<!--  -->








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

$(document).ready(function(event)
{
$('#formulario').hide();

$('.exito').hide();
});

$(".btn-buscar").click(function (){
var resultado =  $('#codigo').val();
$('#codigo_generado').val(resultado);

$.ajax({
     url:'../suscripcion/controller/controller_inscripcion.php?op=inscripcion_invitados',
      type:'POST',
       data:{resultado:resultado},
        dataType : "JSON",
     success:function(data){
 if (Object.keys(data).length === 0) {
       alertify.error('No se encontro el código');
    }  else{

            if (data.total == '0') {
                 alertify.error('Las entradas para este código se acabaron');
            }else {
               $('#mensaje_total').html(data.cantidad_registrados);
               $('#mensaje_nombre').html(data.nombres+" "+data.apellidos);
               $('#mensaje_codigo').html(data.codigo);
               $('#formulario').show();

               if (data.total) {
                  $('#mensaje_cantidad').html(data.total);
                   $('#contador').val(data.total);
               }else {
                    $('#mensaje_cantidad').html(data.cantidad_registrados);
                    $('#contador').val(data.cantidad_registrados);
               }
            }



    }




     }
         });




});

//  url:'../suscripcion/controller/controller_inscripcion.php?op=inscripcion_invitados',

   continvitado = 0;

  $(document).on("submit",'#agregar',function(e){
    parametros = $(this).serialize();
    var table = document.getElementById("tablaInvitados");

    var row = table.insertRow(1);
    var cell0 = row.insertCell(0);
    var cell1 = row.insertCell(1);
    var cell2 = row.insertCell(2);
    var cell3 = row.insertCell(3);
    var cell4 = row.insertCell(4);
    var cell5 = row.insertCell(5);
    var cell6 = row.insertCell(6);
  cell0.innerHTML = $('#nombres_invitado').val() ;
  cell1.innerHTML = $('#apellidos_invitado').val() ;
  cell2.innerHTML = $('#tipo_doc').val() ;
  cell3.innerHTML = $('#num_doc').val() ;
  cell4.innerHTML = $('#phone').val() ;
  cell5.innerHTML = $('#mail').val();
  cell6.innerHTML = $('#pais').val();


   //---
     $.ajax({
          url:'../suscripcion/controller/controller_inscripcion.php?op=registro_invitados',
           type:'POST',
            data:parametros,
            beforeSend: function() {
         $('.btn-agregar').prop("disabled", true);
           },
          success:function(data){
             $('.btn-agregar').prop("disabled", false);
            alertify.success('Se registro correctamente!');
     continvitado = parseInt(document.getElementById("contador").value);
     numero = continvitado - 1;
     borrarimput();
     $('#contador').val(numero); 
     $('#mensaje_cantidad').html(numero)

     if (numero == 0) {

     cerrarInvitaciones();
     }

     }
   });
//--
  event.preventDefault();

});

function cerrarInvitaciones() {
  setTimeout(function(){
 $('#codigo').val('');
 $('#formulario').hide();
  $('.exito').show();
   }, 2000);
}

function borrarimput(){
  $('#nombres_invitado').val('');
  $('#apellidos_invitado').val('');
  $('#num_doc').val('');
  $('#phone').val('');
  $('#mail').val('');
  $('#pais').val('');
}

</script>

  </body>
</html>
