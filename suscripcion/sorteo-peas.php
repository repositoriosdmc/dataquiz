


<?php
$paises = file_get_contents("https://gist.githubusercontent.com/Yizack/bbfce31e0217a3689c8d961a356cb10d/raw/107e0bdf27918adea625410af0d340e8fc1cd5bf/countries.json");
$paises = json_decode($paises,TRUE);


 ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sorteo PEAS</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="https://survey.dmc.pe/suscripcion/css/selectize.default_2.css">

<!--  -->

<link rel="stylesheet" href="https://code.jquery.com/jquery-3.5.1.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />

<!-- alertify  -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
       <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/alertify.min.js"></script>
       <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/css/alertify.min.css"/>
       <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/css/themes/default.min.css"/> -->
<!--  -->


<link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js">

 <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

      <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-112204121-1"></script>

<!-- select 2 -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->

<!-- selectsize -->
  <link rel="stylesheet" href="http://selectize.github.io/selectize.js/css/selectize.default.css" >
  <script src="http://selectize.github.io/selectize.js/js/selectize.js"></script>

<!-- sweetalert -->
  <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
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

  			<div class="col-md-10" style="padding: 25px 35px; border: 1px solid #c8c7c7; margin: 15px 0; border-radius: 6px; box-shadow: 0px 1px 5px #dddddd;background: white;">

<div class="texto_inicial">


<form id="agregar" autocomplete="off">

<div style="text-align:center">
  <p ><h2> <b>SORTEO DE MEDIAS BECAS PEAS</b> </h2></p>
</div>

<p><b>¡Hola! Somos DMC,</b> la comunidad líder en el Perú vinculada a la analítica de datos. Esta vez, te invitamos a participar por cinco medias becas para cada uno de nuestros últimos Programas de Especialización del 2021.
</p>

<p>Podrás elegir entre el PEA Data Science Fundamentals, el PEA Advanced Data Science, el PEA Business Intelligence Fundamentals y el PEA Data Analytics for Management. Estos cuatro PEAS tienen una duración de entre 5 a 7 meses y se desarrollarán de forma virtual, con clases totalmente en vivo.
</p>



<p>De resultar seleccionado para una de las medias becas, se deberá cumplir con los requisitos de conocimientos y experiencia necesaria para cada programa, así como la capacidad económica de pagar el 50% que no cubre el beneficio. Nos comunicaremos con los ganadores por medio de los datos de contacto que nos proporcionen en este formulario para anunciar los resultados y comprobar los requerimientos. ¡Mucha suerte!
</p>

 <hr>
  <br>

  <div class="form-row">

    <div class="form-group col-md-6">
      <label for=""> Nombres:</label>
          <input type="text" class="form-control" id="nombres" name="nombres" required placeholder="Nombres " >
      </div>
      <div class="form-group col-md-6">
        <label for="">  Apellidos:</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" required placeholder="Apellidos" >
        </div>

  </div>


  <div class="form-row">

    <div class="form-group col-md-6">
      <label for=""> Tipo Documento:</label>
         <select class="selector"  name="tipo_doc" id="tipo_doc">
           <option value="">--Seleccione--</option>
           <option value="DNI">DNI</option>
           <option value="OTROS">OTROS</option>
         </select>
      </div>
      <div class="form-group col-md-6">
        <label for="">  Nro. Documento:</label>
            <input type="number" class="form-control" required id="nro_documento" name="nro_documento" placeholder="Nro. Documento:" >
        </div>

  </div>

  <div class="form-row">

    <div class="form-group col-md-6">
      <label for=""> Género:</label>
         <select class="selector" name="genero" id="genero">
           <option value="">--Seleccione--</option>
           <option value="Hombre">Hombre</option>
           <option value="Mujer">Mujer</option>
         </select>
      </div>
      <div class="form-group col-md-6">
        <label for="">  Celular:</label>
<input type="text" class="form-control" style="size: 100px;" id="phone" name="phone" required  placeholder="">
        </div>

  </div>

  <div class="form-row">

    <div class="form-group col-md-6">
      <label for=""> Edad:</label>
                <input type="number" class="form-control" id="edad" required name="edad"  placeholder="Edad" >
      </div>
      <div class="form-group col-md-6">
        <label for="">  Correo:</label>
  <input type="email" class="form-control" id="correo" name="correo" required  placeholder="Correo" >
        </div>

  </div>

  <div class="form-row">

    <div class="form-group col-md-6">
      <label for=""> País de Residencia:</label>
      <select class="selector" id="pais" name="pais">
        <option value="">--Seleccione--</option>
        <? for ($i = 0; $i < count($paises["countries"]); $i++) { ?>
          <option value='<?=$paises["countries"][$i]["name_es"]?>'><?=$paises["countries"][$i]["name_es"]?></option>
        <? } ?>
      </select>
      </div>
      <div class="form-group col-md-6">
        <label for="">  Ciudad en la que vive actalmente:</label>
  <input type="text" class="form-control" id="ciudad" name="ciudad"  placeholder="Ciudad" >
        </div>

  </div>


  <div class="form-row">

      <div class="form-group col-md-12">
        <label for=""> Carrera de estudios:</label>
  <input type="text" class="form-control" id="carrera" name="carrera"  placeholder="Carrera de estudios" >
        </div>

  </div>


  <div class="form-row">

      <div class="form-group col-md-12">
          <label for="">¿Qué puesto tiene actualmente en su trabajo? (Si no se encuentra trabajando actualmente, considerar las labores del último trabajo)   </label>
          <select class="selector" id="puesto_trabajo"  name="puesto_trabajo" >
          <option value="">--Seleccione--</option>
          <option value="Practicante Preprofesional">Practicante Preprofesional</option>
          <option value="Practicante Profesional">Practicante Profesional </option>
          <option value="Asistente / Ejecutivo jr">Asistente / Ejecutivo jr</option>
          <option value="Analista / Ejecutivo Sr">Analista / Ejecutivo Sr</option>
          <option value="Jefe / Sub Gerente">Jefe / Sub Gerente</option>
          <option value="Gerente de área">Gerente de área</option>
          <option value="Director / VP">Director / VP</option>
          <option value="Gerente general / Dueño empresa">Gerente general / Dueño empresa</option>
          <option value="Otros">Otros</option>
          </select>
        </div>

        <div id="div_trabajo_otros" class="form-group col-md-12">
          <label for=""> Especificar el Puesto:</label>
      <input type="text" class="form-control " id="trabajo_otros" name="trabajo_otros"  placeholder="Especificar el Puesto" >
          </div>
  </div>


<div class="row">
    <label> &nbsp;&nbsp; 	¿Cuál de estos conocimientos posee y ha desarrollado en su experiencia profesional?  </label><br>
</div>
  <div class="row">

    <div class="col-md">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="1" id="base_datos" name="base_datos">
      <label class="form-check-label" for="base_datos">
        Base de datos
      </label>
    </div>

    <div class="form-check">
      <input class="form-check-input require-three" type="checkbox" value="1" id="visualizacion_datos"
        name="visualizacion_datos">
      <label class="form-check-label" for="visualizacion_datos">
        Visualización de datos
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input require-three" type="checkbox" value="1" id="r_python" name="r_python">
      <label class="form-check-label" for="r_python">
        Herramientas analíticas (R, Python)
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input require-three" type="checkbox" value="1" id="cloud" name="cloud">
      <label class="form-check-label" for="cloud">
        Herramientas on Cloud
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input require-three" type="checkbox" value="1" id="big_data" name="big_data">
      <label class="form-check-label" for="big_data">
        Herramientas de big data
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input require-three" type="checkbox" value="1" id="machine_learning" name="machine_learning">
      <label class="form-check-label" for="machine_learning">
        Herramientas de Machine Learning
      </label>
    </div>
    </div><div class="col-md">
    <div class="form-check">
      <input class="form-check-input require-three" type="checkbox" value="1" id="inteligencia_artificial"
        name="inteligencia_artificial">
      <label class="form-check-label" for="inteligencia_artificial">
        Inteligencia Artificial
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input require-three" type="checkbox" value="98" id="metodologia_agil" name="metodologia_agil">
      <label class="form-check-label" for="metodologia_agil">
        Metodologías ágiles
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input require-three" type="checkbox" value="1" id="ninguna" name="ninguna">
      <label class="form-check-label" for="ninguna">
        Ninguna
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input require-three" type="checkbox" value="1" id="otro" name="otro">
      <label class="form-check-label" for="otro">
        Otro
      </label>
      <!-- <input type="text" class="form-control" id="p7_otro_otro" name="p7_otro_otro" placeholder="¿Cuál?" style="margin-top: 10px;display: none;" > -->
    </div>
    </div>

  </div>

<br>
  <div class="form-row">

        <div  class="form-group col-md-12">

          <label for="floatingInputGrid" class="form-label">¿En que qué sector trabaja actualmente? Si no se encuentra trabajando actualmente, considerar las labores del último trabajo</label>
          <select class="selector" name="sector" id="sector" >
            <option value="">--Seleccione--</option>
            <option value="Consultoría">Consultoría</option>
            <option value="Telecomunicaciones">Telecomunicaciones</option>
            <option value="Banca">Banca</option>
            <option value="Retail">Retail</option>
            <option value="Minería">Minería</option>
            <option value="Industria">Industria</option>
            <option value="Seguros">Seguros</option>
            <option value="Tecnologías de Información">Tecnologías de Información</option>
            <option value="Otro">Otro</option>
          </select>
          </div>
  </div>

<div class="form-row">

      <div  class="form-group col-md-12">

        <label for="floatingInputGrid" class="form-label">¿En cuál de los 4 Programas de Especialización Analítica está interesado?</label>
        <select class="selector" name="especializacion_analitica" id="especializacion_analitica" >
          <option value="">--Seleccione--</option>
          <option value="PEA Data Science Fundamentals">PEA Data Science Fundamentals</option>
          <option value="PEA Advanced Data Science">PEA Advanced Data Science</option>
          <option value="PEA Business Intelligence Fundamentals">PEA Business Intelligence Fundamentals</option>
          <option value="PEA Data Analytics for Management">PEA Data Analytics for Management</option>

        </select>
        </div>
    <div id="texto_final" style="text-align: center;padding-left: 17%;  padding-top: -25px;">


            <div id="Science_Fundamentals" class="card text-white bg-primary mb-3" style="text-align: center;max-width: 36rem;">
              <div class="card-header">PEA Data Science Fundamentals</div>
              <div class="card-body">






                <p class="card-text">Inicia la ruta para convertirte en un científico de datos aprendiendo lenguajes de programación y las principales técnicas de análisis predictivo. <br>
<b>Inversión</b>: S/. 6,100 / <b>Media beca</b>: S/. 3,050
                </p>
              </div>
            </div>


          <div id="Data_Science" class="card text-white bg-secondary mb-3" style="text-align: center;max-width: 36rem;">
            <div class="card-header">PEA Advanced Data Science</div>
            <div class="card-body">

              <p class="card-text">Perfecciona tus conocimientos en ciencia de datos para resolver problemáticas analíticas de mediano y alto grado de dificultad.<br>
  <b>Inversión</b>: S/. 12,500 / <b>Media beca</b>: S/. 6,250
              </p>
            </div>
          </div>


          <div id="Intelligence_Fundamentals" class="card text-white bg-danger mb-3" style="text-align: center;max-width: 36rem;">
            <div class="card-header">PEA Business Intelligence Fundamentals</div>
            <div class="card-body">

              <p class="card-text">Aprende a manejar, analizar y visualizar grandes volúmenes de datos de forma metodológica y eficiente. <br>
<b>Inversión</b>: S/. 4,500 / <b>Media beca</b>: S/. 2,250
              </p>
            </div>
          </div>



          <div id="for_Management" class="card text-white bg-success mb-3" style="text-align: center;max-width: 36rem;">
            <div class="card-header">PEA Data Analytics for Management</div>
            <div class="card-body">

              <p class="card-text">Comprende el aporte de las diferentes áreas relacionadas al análisis de datos y cómo pueden potenciar las estrategias de tu organización. <br>
<b>Inversión</b>: S/. 3,600 / <b>Media beca</b>: S/. 1,800
              </p>
            </div>
          </div>

          </div>
</div>




  <div class="form-check">
      <input class="form-check-input" type="checkbox" value="1" id="datos" name="datos"  style="margin-top: 7px;">
      <label class="form-check-label" for="datos">
          He leído y acepto los <a href="#" data-toggle="modal" data-target="#myModal">términos y condiciones</a>
      </label>

      <div>
          <label id="datos-error" class="error" for="datos" style="display: none;">Campo obligatorio</label>
      </div>
  </div>
  <br>
                        <div>
                            <button type="submit" class="btn btn-primary btn-envia" id="button">Enviar</button>
                        </div>



</form>


</div>


<!-- inicio registro exitoso -->
<div id="exito">


<p style="text-align:center"> <b>¡Gracias por tu interés en este sorteo! </b> </p>

<!-- <p> ¡Gracias por llenar el formulario! Ya estás participando del sorteo por medias becas para nuestros Programas de Especialización Analítica del 2021. </p>
<p>De resultar uno de los ganadores, nos estaremos comunicando al correo electrónico y número de teléfono brindado en este registro. </p> -->
<p>
Lamentablemente, la fecha de participación ya terminó. Nos contactaremos con los ganadores en el transcurso del día.
</p>
<p>Para más beneficios y novedades, síguenos en nuestro fanpage: <b>DMC Perú.</b> </p>
<p>Haz click en el siguiente enlace ► <a href="https://www.facebook.com/datamining.pe">https://www.facebook.com/datamining.pe </a> </p>
</div>
<!-- fin -->



  			</div>
<br>


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

$(document).ready(function(event)
{
// $('#exito').hide();


$('#for_Management').hide();
$('#Intelligence_Fundamentals').hide();
$('#Data_Science').hide();
$('#Science_Fundamentals').hide();

  $('#div_trabajo_otros').hide();
// $('#formulario').hide();

// $('.exito').hide();
$('.texto_inicial').hide();
$('#exito').show();

  $(".selector").selectize({
    create: true
  });
});







$('#especializacion_analitica').change(function(){

    var resultado = $('#especializacion_analitica').val();
  if(resultado == 'PEA Data Science Fundamentals'){

$('#Science_Fundamentals').show();

$('#for_Management').hide();
  $('#Data_Science').hide();

      $('#Intelligence_Fundamentals').hide();

}else if(resultado == 'PEA Advanced Data Science'){

  $('#Data_Science').show();

  $('#for_Management').hide();

      $('#Science_Fundamentals').hide();
        $('#Intelligence_Fundamentals').hide();

}else if(resultado == 'PEA Business Intelligence Fundamentals'){

$('#Intelligence_Fundamentals').show();
$('#for_Management').hide();
  $('#Data_Science').hide();
    $('#Science_Fundamentals').hide();


}else if (resultado == 'PEA Data Analytics for Management'){
  $('#for_Management').show();


    $('#Data_Science').hide();
      $('#Science_Fundamentals').hide();
        $('#Intelligence_Fundamentals').hide();

}else {
  $('#for_Management').hide();
    $('#Data_Science').hide();
      $('#Science_Fundamentals').hide();
        $('#Intelligence_Fundamentals').hide();
}

});




$('#puesto_trabajo').change(function(){
    var resultado = $('#puesto_trabajo').val();
  if(resultado == 'Otros'){
   $('#div_trabajo_otros').show();
}else {
$('#div_trabajo_otros').hide();
}
});



$(document).on('submit','#agregar',function(e){
  parametros = $(this).serialize();

  $.ajax({
        url:'../suscripcion/controller/controller_sorteo_peas.php?op=registro',
        type:'POST',
        data:parametros,
           beforeSend: function() {
 $('.btn-envia').prop("disabled", true);
         },
       success:function(data){

   if (data == 'ok') {
     $('.texto_inicial').hide();
  $('#exito').show();
   }else {
     alert('no se registro, comuniquese con nosotros :(');
   }


}
 });

e.preventDefault();
});
</script>

  </body>
</html>
