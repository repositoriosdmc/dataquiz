
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Alumnos Corporativos</title>
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


  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style media="screen">

</style>
  </head>
  <body style="background-image: url('../img/fondo1.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: 100% 100%;">

<!--  -->


    <div class="container" >
  		<div class="row justify-content-md-center">

  			<div class="col-md-9" style="padding: 25px 35px; border: 1px solid #c8c7c7; margin: 15px 0; border-radius: 6px; box-shadow: 0px 1px 5px #dddddd;background: white;">
<!-- background-color: rgba(255, 255, 255, .4); transparentar -->
         <div style="text-align:center" >
           <img class="h-log2" src="../img/logo_dmc.png"  width="20%"  ><br> <br>

               <h2 ><b>Pre Inscripcion Alumnos Corporativos</b></h2>

          </div><br>



<hr>
<br>


<div class="texto_inicial">

<form id="form">

  <div class="form-row"  >

    <div class="form-group col-md-12">
      <label for="">Empresa</label>

         <input type="text" class="form-control" name="empresa" id="empresa" >

      </div>

  </div>



  <div class="form-row"  >

    <div class="form-group col-md-6">
      <label for="">Nombres </label>

         <input type="text" class="form-control" name="nombres" id="nombres">

      </div>
      <div class="form-group col-md-6">
        <label for="">Apellidos </label>

           <input type="text" class="form-control" name="apellidos" id="apellidos">

        </div>
  </div>

  <div class="form-row"  >
    <div class="form-group col-md-6">
      <label for="">Cargo </label>

         <input type="text" class="form-control" name="cargo" id="cargo">

      </div>
      <div class="form-group col-md-6">
        <label for="">Unidad de Trabajo o Área </label>

           <input type="text" class="form-control" name="u_trabajo" id="u_trabajo">

        </div>
  </div>

  <div class="form-row"  >
    <div class="form-group col-md-6">
      <label for="">DNI </label>

         <input type="text" class="form-control" name="dni" id="dni">

      </div>
      <div class="form-group col-md-6">
        <label for="">Celular </label>

           <input type="text" class="form-control" name="celular" id="celular">

        </div>
  </div>

  <div class="form-row"  >
    <div class="form-group col-md-6">
      <label for="">Correo Corporativo </label>

         <input type="text" class="form-control" name="correo_corporativo" id="correo_corporativo" >

      </div>
      <div class="form-group col-md-6">
        <label for="">Correo Personal </label>

           <input type="text" class="form-control" name="correo_personal" id="correo_personal" >

        </div>
  </div>


  <div class="form-row"  >
    <div class="form-group col-md-12">
      <label for="">Selecciona los cursos que quisieras llevar (Máximo de 3 cursos seleccionables) </label>

      <select class="js-example-basic-multiple form-control" name="cursos[]" id="cursos" multiple="multiple">

  </select>
      </div>

  </div>

<br>


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
                          <button type="submit" class="btn btn-primary btn-guardar" id="button">Enviar</button>
                      </div>

</form>

</div>


<!-- inicio registro exitoso -->
<div id="exito">


<p style="text-align:center"> <b>¡Gracias por registrarte!</b> </p>

<p></p>

</div>
<!-- fin -->



  			</div>
<br>


  		</div>
  	</div>

<!--  -->

<!--  -->

    <? include_once "view/terminos.php"; ?>
    <script src="./assets/js/jquery.min.js"></script>
    <script src="https://survey.dmc.pe/suscripcion/assets/js/popper.min.js"></script>
    <script src="https://survey.dmc.pe/suscripcion/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://survey.dmc.pe/suscripcion/assets/js/selectize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>

<script type="text/javascript">

// -------

$(document).ready(function(event)
{
  $("#exito").hide();

 //  $("#exito").show();
 // $(".texto_inicial").hide();
$("#cursos").select2({
  maximumSelectionLength: 3
});
    $('.js-example-basic-single').select2();

  var html ="";

      $.ajax({
          url:'../suscripcion/controller/controller_coorporativos.php?op=consulta',
            type:'POST',

               dataType : "JSON",
           success:function(data){

            data.forEach((item, i) => {


              html += "<option value='"+item.capacitacion_base_nombre+"'>" +item.capacitacion_base_nombre+"</option>";

          });
  $("#cursos").append( html );
           }
               });


});



$(document).on('submit','#form',function(e){

     parametros = $(this).serialize();

      $.ajax({
            url:'../suscripcion/controller/controller_coorporativos.php?op=registro_alumno_corporativo',
            type:'POST',
           data:parametros,
             beforeSend: function() {
               // $('.btn-guardar').prop("disabled", true) ;
            },
           success:function(data){

             if (data == 'ok') {
               $("#exito").show();
           $(".texto_inicial").hide();
         }else {
           alert('Error de registro, intentelo nuevamente por favor.');
         }
 }
     });



     e.preventDefault();
});


</script>

  </body>
</html>
