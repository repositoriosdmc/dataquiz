
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Desayuno Corporativo</title>
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
  <body style="background-image: url('../img/fondo2.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: 100% 100%;">

<!--  -->


    <div class="container" >
  		<div class="row justify-content-md-center">

  			<div class="col-md-9" style="padding: 25px 35px; border: 1px solid #c8c7c7; margin: 15px 0; border-radius: 6px; box-shadow: 0px 1px 5px #dddddd;background: white;">
<!-- background-color: rgba(255, 255, 255, .4); transparentar -->
         <div style="text-align:center" >
           <img class="h-log2" src="../img/logo_dmc.png"  width="20%"  ><br> <br>

               <h2 ><b>Desayuno Corporativo</b></h2>

          </div><br>



<hr>
<br>


<div class="texto_inicial">

<form id="form">

  <div class="form-row"  >

    <div class="form-group col-md-12">
      <label for="">Empresa</label>

         <input type="text" class="form-control" name="empresa"  >

      </div>

  </div>



  <div class="form-row"  >

    <div class="form-group col-md-6">
      <label for="">Nombres </label>

         <input type="text" class="form-control" name="nombres" >

      </div>
      <div class="form-group col-md-6">
        <label for="">Apellidos </label>

           <input type="text" class="form-control" name="apellidos" >

        </div>
  </div>

  <div class="form-row"  >
    <div class="form-group col-md-6">
      <label for="">Cargo </label>

         <input type="text" class="form-control" name="cargo" >

      </div>
      <div class="form-group col-md-6">
        <label for="">Unidad de Trabajo / Área </label>

           <input type="text" class="form-control" name="unidad_trabajo" >

        </div>
  </div>

  <div class="form-row"  >
    <div class="form-group col-md-6">
      <label for="">DNI </label>

         <input type="text" class="form-control" name="dni" >

      </div>
      <div class="form-group col-md-6">
        <label for="">Celular </label>

           <input type="text" class="form-control" name="celular" >

        </div>
  </div>

  <div class="form-row"  >
    <div class="form-group col-md-6">
      <label for="">Correo Corporativo </label>

         <input type="text" class="form-control" name="correo_corporativo" >

      </div>
      <div class="form-group col-md-6">
        <label for="">Correo Personal </label>

           <input type="text" class="form-control" name="correo_personal" >

        </div>
  </div>

<hr>

  <div class="form-row"  >
    <div class="form-group col-md-12">

      <div class="alert alert-danger" role="alert">
        Esta promoción solo es valida para Lima metropolitana!
      </div>
      <label for="">Ciudad</label>

         <input type="text" class="form-control" value="Lima" readonly name="" >

      </div>

  </div>



  <div class="form-row"  >
    <div class="form-group col-md-12">
      <label for="">Distrito </label>

      <select class="selector form-control" name="distrito" id="distrito">
        <option selected disabled value="" >--SELECCIONE--</option>
  </select>
      </div>

  </div>





  <div class="form-row"  >
    <div class="form-group col-md-12">


      <label for="">Tipo Dirección </label>

        <select class=" form-control" name="tipo_direccion">
 <option selected disabled value="">--SELECCIONE--</option>
  <option value="CASA">CASA</option>
  <option value="DEPARTAMENTO">DEPARTAMENTO</option>
  <option value="CONDOMINIO">CONDOMINIO</option>
  <option value="RESIDENCIAL">RESIDENCIAL</option>
  <option value="OFICINA">OFICINA</option>
  <option value="LOCAL">LOCAL</option>
  <option value="GALERIA">GALERIA</option>
  <option value="OTRO">OTRO</option>

        </select>

      </div>

  </div>

  <div class="form-row"  >

    <div class="form-group col-md-12">

      <label for="">AV/CALLE/JIRON </label>

  <input type="text" name="avenida" id="avenida" class="form-control" >

      </div>

  </div>

  <div class="form-row"  >

    <div class="form-group col-md-4">

      <label for="">MZ </label>

  <input type="text" name="manzana" id="manzana" class="form-control" >

      </div>

      <div class="form-group col-md-4">

        <label for="">LOTE </label>

    <input type="text" name="lote" id="lote" class="form-control" >

        </div>
        <div class="form-group col-md-4">

          <label for="">NÚMERO </label>

      <input type="text" name="numero" id="numero" class="form-control" >

          </div>


  </div>


  <div class="form-row"  >

    <div class="form-group col-md-12">

      <label for="">REFERENCIA</label>

  <input type="text" name="referencia" class="form-control" >

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

$(".selector").select2();

    $('.js-example-basic-single').select2();


    var html ="";

        $.ajax({
            url:'../suscripcion/controller/controller_coorporativos.php?op=consulta_distrito',
              type:'POST',

                 dataType : "JSON",
             success:function(data){

              data.forEach((item, i) => {


                html += "<option value='"+item.distrito+"'>" +item.distrito+"</option>";

            });
    $("#distrito").append( html );
             }
                 });


});

// $(".btn-buscar").click(function (){
//
//
//  $.ajax({
//      url:'../suscripcion/controller/controller_inscripcion.php?op=pruebaSql',
//        type:'POST',
//
//          // dataType : "JSON",
//       success:function(data){
//
//    alert(data);
//
//
//       }
//           });
//
//
// });

$(document).on('submit','#form',function(e){

     parametros = $(this).serialize();

      $.ajax({
            url:'../suscripcion/controller/controller_coorporativos.php?op=registro_desayuno_corporativo',
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
