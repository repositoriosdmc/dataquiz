<?php
$paises = file_get_contents("https://gist.githubusercontent.com/Yizack/bbfce31e0217a3689c8d961a356cb10d/raw/107e0bdf27918adea625410af0d340e8fc1cd5bf/countries.json");
$paises = json_decode($paises,TRUE);


 ?>
<!DOCTYPE html>
<html lang="es" >
  <head>
    <meta charset="utf-8">
    <title>Curso gratuito | Introducción a la
Analítica de Datos.</title>
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
          <div style="text-align: center;" >
               <img class="h-log2" src="../img/logo_dmc.png"  width="18%" >


         </div>
<br>
<div id="texto_inicial">






<p>

  <b>¡Hola! Somos DMC,</b>
  la comunidad líder en el Perú vinculada a la analítica de datos. Te invitamos a
  participar de nuestro curso <b> “Introducción a la Analítica de Datos”,</b> una <b>capacitación totalmente
  gratuita</b> de 09 horas cronológicas bajo la modalidad de clases virtuales 100% en vivo, que se
  realizará el lunes 23/01, miércoles 25/01 y miércoles 01/02 de 7:30 pm a 10:30 pm.

</p>
<p>
  Son <b>300 vacantes directas disponibles</b> para las primeras personas en registrarse en este formulario.
  Si no logras acceder a una vacante directa, ¡no te desanimes! Sortearemos 200 vacantes
  adicionales entre todas las personas inscritas <b>hasta el miércoles 18 de enero.</b> De acceder a una de
  las vacantes directas o ser ganador de una de las vacantes adicionales, recibirás un mensaje el
  jueves 19 de enero, a través del correo electrónico que nos dejes, con toda la información sobre el
  inicio de clases.
<b>¡Apresúrate y mucha suerte!</b>
</p>




<hr>
<br>
	<form name="form" id="form" autocomplete="off">

      <p style="text-align:center"> <b>A. INFORMACIÓN GENERAL</b> </p>

              <div class="form-row">

                      	<div class="form-group col-md-6">
                      		<label for="">A1. Nombres:</label>
                              <input type="text" required  class="form-control" id="nombres"  name="nombres"  >
                          </div>


                            <div class="form-group col-md-6">
                              <label for="">A2. Apellidos:</label>
                                  <input type="text" class="form-control" id="apellidos"  name="apellidos" >
                              </div>
              </div>
               <div class="form-row">

                 <div class="form-group col-md-6">
                   <label for=""> A3. Celular:</label>
                 <input type="text" class="form-control" required style="size: 100px;" id="phone" name="phone"   placeholder="">
                   </div>

                                    <div class="form-group col-md-6">
                                      <label for="">A4.  Email:</label>
                                          <input required type="text"  class="form-control"  id="mail" name="mail" >
                                      </div>

              </div>

               <div class="form-row">


                     <div class="form-group col-md-6">
                      <label for="exampleFormControlInput1">A5. Tipo de documento:</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend" id="img">
                  <span class="input-group-text" id="basic-addon1"> <img src="../img/peru.png" style="width:20px;height:20px;" > </span>
                        </div>
                      <select class="form-control valid"  id="tDocumento" name="tDocumento" >

                          <option value="DNI">DNI</option>
                          <option value="OTROS">OTROS </option>
                      </select>


                      </div>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="">A6. N° Documento:</label>
                    <input type="number" step="any" class="form-control"  id="nro_documento" name="nro_documento"  >
                      </div>
              </div>

                  <!-- <p style="text-align:center"> <b>B. SITUACIÓN LABORAL</b> </p> -->
              <div class="form-row">

                        <div class="form-group col-md-12">
                          <label for="">A7. Género:</label> <br>
                              <!-- <input type="number" step="any"  class="form-control" id="edad" name="edad" > -->
                              <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="b1_genero" id="b1_generoH" value="H">
  <label class="form-check-label" for="b1_generoH">Hombre</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="b1_genero" id="b1_generoM" value="M">
  <label class="form-check-label" for="b1_generoM">Mujer</label>
</div>

                          </div>



              </div>

              <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">A8. Edad </label>
                      <input type="number" step="any" class="form-control edad" id="edad" name="edad"   placeholder="">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="">A9. País de residencia </label>
                    <select class="selector"  id="pais" name="pais">
                      <option value="">Seleccione</option>
                      <!--   <option value="Perú">Perú</option> -->
                      <? for ($i = 0; $i < count($paises["countries"]); $i++) { ?>
                        <option value='<?=$paises["countries"][$i]["name_es"]?>'><?=$paises["countries"][$i]["name_es"]?></option>
                      <? } ?>
                    </select>
                  </div>
              </div>
               <div class="form-row">


                   <div class="form-group col-md-12">
                 <label  >A10. Formación de pregrado </label>

                 <select required class="form-control b4_formacion" name="b4_formacion">
                   <option value="" selected disabled>Seleccione</option>
                   <option  >Ingeniería de Sistemas </option>
                  <option >Ingeniería Industrial </option>
                   <option  >Ingeniería Informática </option>
                   <option >Ingeniería Estadística </option>
                   <option  >Ingeniería Electrónica </option>
                   <option >Ingeniería Económica / Economía</option>
                   <option >Ciencias de la Computación</option>
                   <option >Administrador / Administración de Empresas</option>
                   <option value="0">Otro</option>
                 </select>

       <input type="text" class="form-control b4_otro" id="" name="b4_otro" placeholder="¿Cuál?"  >
               </div>




              </div>


<!-- cambiado -->
                <p style="text-align:center"> <b>B. SITUACIÓN LABORAL</b> </p>


                               <div class="row">

                                 <div class="form-group col-md-12">
                                   <label for="">B1. ¿Cuál de las siguientes frases describe mejor su situación laboral? </label>
                                   <select class="form-control c1_situacionLaboral" name="c1_situacionLaboral" id="c1_situacionLaboral" >
                                     <option value="" selected disabled>Seleccione</option>
                                     <option >Actualmente estoy laborando, mi ocupación principal es dependiente</option>
                                     <option >Actualmente estoy laborando, mi ocupación principal es independiente</option>
                                     <option >Actualmente no estoy laborando,
                                       pero sí he trabajado antes</option>
                                     <option >Aún no he laborado</option>
                                   </select>
                                   </div>
                                   <div class="form-group col-md-12">

                                   <label for=""> B2. ¿Qué puesto tiene actualmente en su trabajo? Si no se encuentra trabajando actualmente, considerar las labores del último trabajo  </label>
                                      <select class="form-control cargo" name="cargo" id="cargo" >
                                     <option value="" selected disabled>Seleccione</option>
                                     <option >Practicante Preprofesional</option>
                                     <option>Practicante Profesional</option>
                                     <option >Analista / Ejecutivo Jr.</option>
                                     <option >Analista / Ejecutivo Sr.</option>
                                     <option >Jefe / Subgerente</option>
                                     <option >Gerente de Área</option>
                                     <option >Director / VP</option>
                                     <option >Gerente general / Dueño empresa</option>
                                     <option value="98">Otro (Especificar):</option>
                                   </select>
                                      <input type="text" class="form-control cargo_otro" id="cargo_otro" name="cargo_otro" placeholder="Especificar"  >


                                     </div>
                                <div class="col-md-12 form-group">
                                  <label for="floatingInputGrid" class="form-label">B3. ¿En qué sector trabaja actualmente? Si no se encuentra trabajando actualmente, considerar las labores del último trabajo</label>
                                  <select class="form-control sector" name="sector" id="sector" >
                                    <option value="" selected disabled>Seleccione</option>
                                    <option value="Consultoría">Consultoría</option>
                                    <option value="Telecomunicaciones">Telecomunicaciones</option>
                                    <option value="Banca">Banca</option>
                                    <option value="Retail">Retail</option>
                                    <option value="Minería">Minería</option>
                                    <option value="Industria">Industria</option>
                                    <option value="Seguros">Seguros</option>
                                    <option value="Tecnologías de Información">Tecnologías de Información</option>
                                    <option value="Sector Publico">Sector Público</option>
                                    <option value="Educación">Educación</option>
                                    <option value="Marketing/ Publicidad">Marketing/ Publicidad</option>
                                    <option value="Administración">Administración</option>
                                    <option value="Otro">Otro</option>
                                  </select>
                  <input type="text" class="form-control c3_otro" id="c3_otro" name="c3_otro" placeholder="¿Cuál?"  >
                                </div>
                              </div>
                              <div class="row">
                               <div class="col-md-12 form-group">
                                <label for="">B4. ¿Qué cantidad de personas tiene la empresa donde labora actualmente? Si no se encuentra trabajando actualmente, considerar las labores del último trabajo </label>
                                <select class="form-control cantidad_trabajadores" name="cantidad_trabajadores" >
                                <option value="" selected disabled>Seleccione</option>
                                <option >Menos de 10</option>
                                <option >De 11 a 50</option>
                                <option>De 51 a 100</option>
                                <option >De 101 a 1,000</option>
                                <option >Más de 1,000</option>
                                <option >No Precisa</option>

                              </select>

                              </div>
                              </div>
                              <div class="row">
                               <div class="col-md-12 form-group">
                                <label for="">B5. ¿En qué rango se encuentra su remuneración mensual?  </label>
                                <select class="form-control rango_remuneracion_mensual" name="rango_remuneracion_mensual"  >
                                <option value="" selected disabled>Seleccione</option>
                                <option >Menos de S/1,000</option>
                                <option >De S/1,001 a S/2,000</option>
                                <option >De S/2,001 a S/3,000</option>
                                <option >De S/3,001 a S/4,000</option>
                                <option >De S/4,001 a S/5,000</option>
                                <option >De S/5,001 a S/6,000</option>
                                <option >De S/6,001 a S/7,000</option>
                                <option >De S/7,001 a S/8,000</option>
                                <option >Más de S/8,000</option>
                                <option >No Precisa</option>

                              </select>

                              </div>
                              </div>

                              <div class="row">
                               <div class="col-md-12">
                                <label for="">B6. Según las principales labores que desempeña en su centro de trabajo, ¿qué perfil considera se acomoda mejor a sus funciones?  </label>
                                <select class="form-control c6_labores" name="c6_labores"  >
                                <option value="" selected disabled>Seleccione</option>
                                <option  title="Profesionales de diversas áreas que trabajan y manipulan datos en formatos básicos (Excel)" >Profesional de negocios </option>
                                <option title="Profesionales que manipulan datos trabajando con software especializado en base de datos" >Profesional de business intelligence</option>
                                <option title="Profesionales encargados de realizar analítica avanzada y modelos predictivos en su organización" >Profesional de analítica y ciencia de datos</option>
                                <option title="Profesionales encargados de los sistemas informáticos y manejo de herramientas de tecnologías computacionales" >Profesional de Tecnologías de información (TI)</option>
                                <option title="Profesionales encargados de la construcción y mantenimiento de la estructura tecnológica que soporta los procesos de la organización">Profesional de arquitectura de datos</option>
                                <option title="Profesionales encargados de la administración, procesamiento y el correcto almacenamiento de los datos para que puedan ser utilizados de forma accesible por las áreas de la organización">Profesional de ingeniería de datos</option>
                                <option title="Profesionales que utilizan los diferentes servicios que ofrecen las nubes para una organización (AWS, GCP, AZURE, etc)">Profesional de tecnologías Cloud</option>
                                <option title="Profesionales encargados en optimizar los procesos y flujos de trabajo en proyectos analíticsos de la organización">Profesional DevOps/ MLOps</option>

                                <option >Otro</option>

                              </select>
                                <input type="text" class="form-control c6_otro" id="c6_otro" name="c6_otro" placeholder="Especificar"  >
                              </div>
                              </div>



<br>

    <p style="text-align:center" > <b>C. INSTITUCIONES </b> </p>


    <div class="row">
      <div class="form-group col-md-12">
  <label for="" > <b> C1.
Considerando únicamente capacitaciones relacionadas a temas y herramientas de análisis de datos, ¿cuáles de las siguientes instituciones conoce que brinden dichas capacitaciones?
 ¿Y en cuáles de ellas se ha capacitado alguna vez? ¿Y cuál considera que es la mejor institución para capacitarse en esos temas?
 </b> </label> <br> <br>
<div class="table-responsive">
      <table>
        <tr>
          <td> <b>Instituciones</b> </td>
          <td  ><div style="width: 150px;text-align:center"> <b>Sí brinda</b> </div></td>
          <td  ><div style="width: 150px;text-align:center"> <b>Sí me he capacitado</b> </div></td>
          <!-- <td style="text-align:center"><div style="width: 120px;"> <b>Es la mejor</b> </div></td> -->
        </tr>

        <tr>
          <td>DMC</td>
          <td style="text-align:center"> <input type="checkbox" nombre_ck="dmc" class="btn-check" id="check_dmc1" name="check_dmc1" value="1"></td>
          <td style="text-align:center"> <input type="checkbox"  name="check_dmc2" value="1"></td>
          <!-- <td style="text-align:center"> <input type="checkbox"  name="check_dmc3" value="1"></td> -->
        </tr>
        <tr>
          <td>Data Science Research</td>
          <td style="text-align:center"> <input type="checkbox" nombre_ck="Data Science Research" class="btn-check"  name="check_dsr1" value="1"></td>
          <td style="text-align:center"> <input type="checkbox"  name="check_dsr2" value="1"></td>
          <!-- <td style="text-align:center"> <input type="checkbox"  name="check_dsr3" value="1"></td> -->
        </tr>
        <tr>
          <td>Social Data Consulting</td>
          <td style="text-align:center"> <input type="checkbox" nombre_ck="Social Data Consulting" class="btn-check"  name="check_sdc1" value="1"></td>
          <td style="text-align:center"> <input type="checkbox"  name="check_sdc2" value="1"></td>
          <!-- <td style="text-align:center"> <input type="checkbox"  name="check_sdc3" value="1"></td> -->
        </tr>
        <tr>
          <td>New Horizons</td>
          <td style="text-align:center"> <input type="checkbox"  name="check_nh1" value="1"></td>
          <td style="text-align:center"> <input type="checkbox"  name="check_nh2" value="1"></td>
          <!-- <td style="text-align:center"> <input type="checkbox"  name="check_nh3" value="1"></td> -->
        </tr>
        <tr>
          <td>Cedhinfo</td>
          <td style="text-align:center"> <input type="checkbox"  name="check_ci1" value="1"></td>
          <td style="text-align:center"> <input type="checkbox"  name="check_ci2" value="1"></td>
          <!-- <td style="text-align:center"> <input type="checkbox"  name="check_ci3" value="1"></td> -->
        </tr>
        <tr>
          <td>Business Insight Center</td>
          <td style="text-align:center"> <input type="checkbox"  name="check_bic1" value="1"></td>
          <td style="text-align:center"> <input type="checkbox"  name="check_bic2" value="1"></td>
          <!-- <td style="text-align:center"> <input type="checkbox"  name="check_bic3" value="1"></td> -->
        </tr>
        <tr>
          <td>Big Data Academy</td>
          <td style="text-align:center"> <input type="checkbox"  name="check_bda1" value="1"></td>
          <td style="text-align:center"> <input type="checkbox"  name="check_bda2" value="1"></td>
          <!-- <td style="text-align:center"> <input type="checkbox"  name="check_bda3" value="1"></td> -->
        </tr>
        <tr>
          <td>Data Path</td>
          <td style="text-align:center"> <input type="checkbox"  name="check_dp1" value="1"></td>
          <td style="text-align:center"> <input type="checkbox"  name="check_dp2" value="1"></td>
          <!-- <td style="text-align:center"> <input type="checkbox"  name="check_dp3" value="1"></td> -->
        </tr>
        <tr>
          <td>UTEC</td>
          <td style="text-align:center"> <input type="checkbox"  name="check_utec1" value="1"></td>
          <td style="text-align:center"> <input type="checkbox"  name="check_utec2" value="1"></td>
          <!-- <td style="text-align:center"> <input type="checkbox"  name="check_utec3" value="1"></td> -->
        </tr>
        <tr>
          <td>UPC</td>
          <td style="text-align:center"> <input type="checkbox"  name="check_upc1" value="1"></td>
          <td style="text-align:center"> <input type="checkbox"  name="check_upc2" value="1"></td>
          <!-- <td style="text-align:center"> <input type="checkbox"  name="check_upc3" value="1"></td> -->
        </tr>

        <tr>
          <td>Cibertec</td>
          <td style="text-align:center"> <input type="checkbox"  name="check_cib1" value="1"></td>
          <td style="text-align:center"> <input type="checkbox"  name="check_cib2" value="1"></td>
          <!-- <td style="text-align:center"> <input type="checkbox"  name="check_cib3" value="1"></td> -->
        </tr>
        <tr>
          <td>Plataforma: Coursera</td>
          <td style="text-align:center"> <input type="checkbox"  name="check_cour1" value="1"></td>
          <td style="text-align:center"> <input type="checkbox"  name="check_cour2" value="1"></td>
          <!-- <td style="text-align:center"> <input type="checkbox"  name="check_cour3" value="1"></td> -->
        </tr>
        <tr>
          <td>Plataforma: Platzi</td>
          <td style="text-align:center"> <input type="checkbox"  name="check_pl1" value="1"></td>
          <td style="text-align:center"> <input type="checkbox"  name="check_pl2" value="1"></td>
          <!-- <td style="text-align:center"> <input type="checkbox"  name="check_pl3" value="1"></td> -->
        </tr>
        <tr>
          <td>Plataforma: Udemy</td>
          <td style="text-align:center"> <input type="checkbox"  name="check_ud1" value="1"></td>
          <td style="text-align:center"> <input type="checkbox"  name="check_ud2" value="1"></td>
          <!-- <td style="text-align:center"> <input type="checkbox"  name="check_ud3" value="1"></td> -->
        </tr>
        <tr>
          <td>Plataforma: Netzum</td>
          <td style="text-align:center"> <input type="checkbox"  name="check_net1" value="1"></td>
          <td style="text-align:center"> <input type="checkbox"  name="check_net2" value="1"></td>
          <!-- <td style="text-align:center"> <input type="checkbox"  name="check_net3" value="1"></td> -->
        </tr>
        <tr>
          <td>Plataforma: edX</td>
          <td style="text-align:center"> <input type="checkbox"  name="check_edx1" value="1"></td>
          <td style="text-align:center"> <input type="checkbox"  name="check_edx2" value="1"></td>
          <!-- <td style="text-align:center"> <input type="checkbox"  name="check_edx3" value="1"></td> -->
        </tr>
        <tr>
          <td>Plataforma: Crehana</td>
          <td style="text-align:center"> <input type="checkbox"  name="check_cr1" value="1"></td>
          <td style="text-align:center"> <input type="checkbox"  name="check_cr2" value="1"></td>
          <!-- <td style="text-align:center"> <input type="checkbox"  name="check_cr3" value="1"></td> -->
        </tr>
        <tr>
          <td>Plataforma: Coderhouse</td>
          <td style="text-align:center"> <input type="checkbox"  name="check_dc1" value="1"></td>
          <td style="text-align:center"> <input type="checkbox"  name="check_dc2" value="1"></td>
        </tr>
        <tr>
          <td>Brigo</td>
          <td style="text-align:center"> <input type="checkbox"  name="check_ka1" value="1"></td>
          <td style="text-align:center"> <input type="checkbox"  name="check_ka2" value="1"></td>

        </tr>
        <!-- <tr>
          <td>Plataforma: Datacamp</td>
          <td style="text-align:center"> <input type="checkbox"  name="check_dc1" value="1"></td>
          <td style="text-align:center"> <input type="checkbox"  name="check_dc2" value="1"></td>
          <td style="text-align:center"> <input type="checkbox"  name="check_dc3" value="1"></td>
        </tr> -->
        <!-- <tr>
          <td>Plataforma: Khan Academy</td>
          <td style="text-align:center"> <input type="checkbox"  name="check_ka1" value="1"></td>
          <td style="text-align:center"> <input type="checkbox"  name="check_ka2" value="1"></td>
          <td style="text-align:center"> <input type="checkbox"  name="check_ka3" value="1"></td>
        </tr> -->

        <!-- <tr>
          <td>Plataforma: Codeacademy</td>
          <td style="text-align:center"> <input type="checkbox"  name="check_cc1" value="1"></td>
          <td style="text-align:center"> <input type="checkbox"  name="check_cc2" value="1"></td>
          <td style="text-align:center"> <input type="checkbox"  name="check_cc3" value="1"></td>
        </tr> -->
        <tr>
          <td>Plataforma: Kagle</td>
          <td style="text-align:center"> <input type="checkbox"  name="check_k1" value="1"></td>
          <td style="text-align:center"> <input type="checkbox"  name="check_k2" value="1"></td>
          <!-- <td style="text-align:center"> <input type="checkbox"  name="check_k3" value="1"></td> -->
        </tr>
        <!-- <tr>
          <td>Plataforma: Analytics Vidhya</td>
          <td style="text-align:center"> <input type="checkbox"  name="check_pav1" value="1"></td>
          <td style="text-align:center"> <input type="checkbox"  name="check_pav2" value="1"></td>
          <td style="text-align:center"> <input type="checkbox"  name="check_pav3" value="1"></td>
        </tr> -->
        <tr>
          <td>De forma autodidacta</td>
          <td style="text-align:center"> <input type="checkbox"  name="check_au1" value="1"></td>
          <td style="text-align:center"> <input type="checkbox"  name="check_au2" value="1"></td>
          <!-- <td style="text-align:center"> <input type="checkbox"  name="check_au3" value="1"></td> -->
        </tr>
      </table>
  </div>

        </div>
        <div class="form-group col-md-12">
        <label> Otros :</label>
        <textarea name="empresa_otro" id="" class="form-control empresa_otro" placeholder="Especificar" rows="2" cols="4"></textarea>
        </div>



    </div>

    <div class="row">
     <div class="col-md-12">
      <label for="">C2. Y DE LAS INSITITUCIONES QUE CONOCE ¿cuál considera que es la mejor institución para capacitarse en esos temas?   </label>
      <select class="form-control b5_centroEstudio" name="b5_centroEstudio">
          <option value="">Seleccione</option>
          <option>DMC</option>
          <option>Data Science Research</option>
          <option>Social Data Consulting</option>
          <option>New Horizons</option>
          <option>Cedhinfo</option>
          <option>Business Insight Center</option>
          <option>Big Data Academy</option>
          <option>Data Path</option>
          <option>UTEC</option>
          <option>UPC</option>
          <option>Cibertec</option>
          <option>Plataforma: Coursera</option>
          <option>Plataforma: Platzi</option>
          <option>Plataforma: Udemy</option>
          <option>Plataforma: Netzum</option>
          <option>Plataforma: edX</option>
          <option>Plataforma: Crehana</option>
          <option>Plataforma: Coderhouse</option>
          <option>Brigo</option>
          <option>Plataforma: Kagle</option>
          <option>De forma autodidacta</option>
          <option>Otro</option>

      </select>
                  <input type="text" class="form-control b5_otro" id="b5_otro" name="b5_otro" placeholder="Especificar"  >
  </div>
    </div>
    <br>
  <!--  <div class="row">
      <div class="form-group col-md-12">
  <label for=""> <mark> <b>C2. Valore las siguientes instituciones educativas en una escala del 0 al 10, considerando su experiencia o lo que haya escuchado sobre sus capacitaciones en analítica o BI:</b> </mark> </label> <br> <br>

        </div>
        <div class="form-group col-md-12">

          <div class="d-flex justify-content-between">
                  <label > <b>DMC</b> </label>
                  <div class="form-group">

                    <input class="radio-inline"  name="d2_dmc" value="1" type="radio"> 1
                      <input class="radio-inline"  name="d2_dmc" value="2" type="radio"> 2
                      <input class="radio-inline"  name="d2_dmc" value="3" type="radio"> 3
                      <input class="radio-inline"  name="d2_dmc" value="4" type="radio"> 4
                      <input class="radio-inline"  name="d2_dmc" value="5" type="radio"> 5
                      <input class="radio-inline"  name="d2_dmc" value="6" type="radio"> 6
                      <input class="radio-inline"  name="d2_dmc" value="7" type="radio"> 7
                      <input class="radio-inline"  name="d2_dmc" value="8" type="radio"> 8
                      <input class="radio-inline"  name="d2_dmc" value="9" type="radio"> 9
                      <input class="radio-inline"  name="d2_dmc" value="10" type="radio"> 10
                      <input class="radio-inline"  name="d2_dmc" value="99" type="radio"> NC

                  </div>
                </div>
          </div>
        <div class="form-group col-md-12">

          <div class="d-flex justify-content-between">
                  <label > <b>Data Science Research</b> </label>
                  <div class="form-group">

                    <input class="radio-inline"  name="d2_dsr" value="1" type="radio">1
                    <input class="radio-inline"  name="d2_dsr" value="2" type="radio"> 2
                    <input class="radio-inline"  name="d2_dsr" value="3" type="radio"> 3
                    <input class="radio-inline"  name="d2_dsr" value="4" type="radio"> 4
                    <input class="radio-inline"  name="d2_dsr" value="5" type="radio"> 5
                    <input class="radio-inline"  name="d2_dsr" value="6" type="radio"> 6
                    <input class="radio-inline"  name="d2_dsr" value="7" type="radio"> 7
                    <input class="radio-inline"  name="d2_dsr" value="8" type="radio"> 8
                    <input class="radio-inline"  name="d2_dsr" value="9" type="radio"> 9
                    <input class="radio-inline"  name="d2_dsr" value="10" type="radio"> 10
                    <input class="radio-inline"  name="d2_dsr" value="99" type="radio"> NC

                  </div>
                </div>
          </div>
          <div class="form-group col-md-12">

            <div class="d-flex justify-content-between">
                    <label > <b>Social Data Consulting</b> </label>
                    <div class="form-group">

                      <input class="radio-inline"  name="d2_sdc" value="1" type="radio">1
                      <input class="radio-inline"  name="d2_sdc" value="2" type="radio"> 2
                      <input class="radio-inline"  name="d2_sdc" value="3" type="radio"> 3
                      <input class="radio-inline"  name="d2_sdc" value="4" type="radio"> 4
                      <input class="radio-inline"  name="d2_sdc" value="5" type="radio"> 5
                      <input class="radio-inline"  name="d2_sdc" value="6" type="radio"> 6
                      <input class="radio-inline"  name="d2_sdc" value="7" type="radio"> 7
                      <input class="radio-inline"  name="d2_sdc" value="8" type="radio"> 8
                      <input class="radio-inline"  name="d2_sdc" value="9" type="radio"> 9
                      <input class="radio-inline"  name="d2_sdc" value="10" type="radio"> 10
                      <input class="radio-inline"  name="d2_sdc" value="99" type="radio"> NC

                    </div>
                  </div>
            </div>
            <div class="form-group col-md-12">

              <div class="d-flex justify-content-between">
                      <label > <b>New Horizons</b> </label>
                      <div class="form-group">


                        <input class="radio-inline"  name="d2_nh" value="1" type="radio"> 1
                        <input class="radio-inline"  name="d2_nh" value="2" type="radio"> 2
                        <input class="radio-inline"  name="d2_nh" value="3" type="radio"> 3
                        <input class="radio-inline"  name="d2_nh" value="4" type="radio"> 4
                        <input class="radio-inline"  name="d2_nh" value="5" type="radio"> 5
                        <input class="radio-inline"  name="d2_nh" value="6" type="radio"> 6
                        <input class="radio-inline"  name="d2_nh" value="7" type="radio"> 7
                        <input class="radio-inline"  name="d2_nh" value="8" type="radio"> 8
                        <input class="radio-inline"  name="d2_nh" value="9" type="radio"> 9
                        <input class="radio-inline"  name="d2_nh" value="10" type="radio"> 10
                        <input class="radio-inline"  name="d2_nh" value="99" type="radio"> NC

                      </div>
                    </div>
              </div>
              <div class="form-group col-md-12">

                <div class="d-flex justify-content-between">
                        <label > <b>Cedhinfo</b> </label>
                        <div class="form-group">

                    <input class="radio-inline"  name="d2_cedhinfo" value="1" type="radio"> 1
                    <input class="radio-inline"  name="d2_cedhinfo" value="2" type="radio"> 2
                    <input class="radio-inline"  name="d2_cedhinfo" value="3" type="radio"> 3
                    <input class="radio-inline"  name="d2_cedhinfo" value="4" type="radio"> 4
                    <input class="radio-inline"  name="d2_cedhinfo" value="5" type="radio"> 5
                    <input class="radio-inline"  name="d2_cedhinfo" value="6" type="radio"> 6
                    <input class="radio-inline"  name="d2_cedhinfo" value="7" type="radio"> 7
                    <input class="radio-inline"  name="d2_cedhinfo" value="8" type="radio"> 8
                    <input class="radio-inline"  name="d2_cedhinfo" value="9" type="radio"> 9
                    <input class="radio-inline"  name="d2_cedhinfo" value="10" type="radio"> 10
                    <input class="radio-inline"  name="d2_cedhinfo" value="99" type="radio"> NC

                        </div>
                      </div>
                </div>

                <div class="form-group col-md-12">

                  <div class="d-flex justify-content-between">
                          <label > <b>Business Insight Center</b> </label>
                          <div class="form-group">

                        <input class="radio-inline"  name="d2_bic" value="1" type="radio"> 1
                        <input class="radio-inline"  name="d2_bic" value="2" type="radio"> 2
                        <input class="radio-inline"  name="d2_bic" value="3" type="radio"> 3
                        <input class="radio-inline"  name="d2_bic" value="4" type="radio"> 4
                        <input class="radio-inline"  name="d2_bic" value="5" type="radio"> 5
                        <input class="radio-inline"  name="d2_bic" value="6" type="radio"> 6
                        <input class="radio-inline"  name="d2_bic" value="7" type="radio"> 7
                        <input class="radio-inline"  name="d2_bic" value="8" type="radio"> 8
                        <input class="radio-inline"  name="d2_bic" value="9" type="radio"> 9
                        <input class="radio-inline"  name="d2_bic" value="10" type="radio"> 10
                        <input class="radio-inline"  name="d2_bic" value="99" type="radio"> NC

                          </div>
                        </div>
                  </div>

                  <div class="form-group col-md-12">

                    <div class="d-flex justify-content-between">
                            <label > <b>Big Data Academy</b> </label>
                            <div class="form-group">

                            <input class="radio-inline"  name="d2_bda" value="1" type="radio"> 1
                            <input class="radio-inline"  name="d2_bda" value="2" type="radio"> 2
                            <input class="radio-inline"  name="d2_bda" value="3" type="radio"> 3
                            <input class="radio-inline"  name="d2_bda" value="4" type="radio"> 4
                            <input class="radio-inline"  name="d2_bda" value="5" type="radio"> 5
                            <input class="radio-inline"  name="d2_bda" value="6" type="radio"> 6
                            <input class="radio-inline"  name="d2_bda" value="7" type="radio"> 7
                            <input class="radio-inline"  name="d2_bda" value="8" type="radio"> 8
                            <input class="radio-inline"  name="d2_bda" value="9" type="radio"> 9
                            <input class="radio-inline"  name="d2_bda" value="10" type="radio"> 10
                            <input class="radio-inline"  name="d2_bda" value="99" type="radio"> NC

                            </div>
                          </div>
                    </div>

                    <div class="form-group col-md-12">

                      <div class="d-flex justify-content-between">
                              <label > <b>Data Path</b> </label>
                              <div class="form-group">

                              <input class="radio-inline"  name="d2_dp" value="1" type="radio"> 1
                              <input class="radio-inline"  name="d2_dp" value="2" type="radio"> 2
                              <input class="radio-inline"  name="d2_dp" value="3" type="radio"> 3
                              <input class="radio-inline"  name="d2_dp" value="4" type="radio"> 4
                              <input class="radio-inline"  name="d2_dp" value="5" type="radio"> 5
                              <input class="radio-inline"  name="d2_dp" value="6" type="radio"> 6
                              <input class="radio-inline"  name="d2_dp" value="7" type="radio"> 7
                              <input class="radio-inline"  name="d2_dp" value="8" type="radio"> 8
                              <input class="radio-inline"  name="d2_dp" value="9" type="radio"> 9
                              <input class="radio-inline"  name="d2_dp" value="10" type="radio"> 10
                              <input class="radio-inline"  name="d2_dp" value="99" type="radio"> NC

                              </div>
                            </div>
                      </div>

                      <div class="form-group col-md-12">

                        <div class="d-flex justify-content-between">
                                <label > <b>UTEC</b> </label>
                                <div class="form-group">


                      <input class="radio-inline"  name="d2_utec" value="1" type="radio"> 1
                      <input class="radio-inline"  name="d2_utec" value="2" type="radio"> 2
                      <input class="radio-inline"  name="d2_utec" value="3" type="radio"> 3
                      <input class="radio-inline"  name="d2_utec" value="4" type="radio"> 4
                      <input class="radio-inline"  name="d2_utec" value="5" type="radio"> 5
                      <input class="radio-inline"  name="d2_utec" value="6" type="radio"> 6
                      <input class="radio-inline"  name="d2_utec" value="7" type="radio"> 7
                      <input class="radio-inline"  name="d2_utec" value="8" type="radio"> 8
                      <input class="radio-inline"  name="d2_utec" value="9" type="radio"> 9
                      <input class="radio-inline"  name="d2_utec" value="10" type="radio"> 10
                      <input class="radio-inline"  name="d2_utec" value="99" type="radio"> NC

                                </div>
                              </div>
                        </div>
                        <div class="form-group col-md-12">

                          <div class="d-flex justify-content-between">
                                  <label > <b>UPC</b> </label>
                                  <div class="form-group">


                    <input class="radio-inline"  name="d2_upc" value="1" type="radio"> 1
                    <input class="radio-inline"  name="d2_upc" value="2" type="radio"> 2
                    <input class="radio-inline"  name="d2_upc" value="3" type="radio"> 3
                    <input class="radio-inline"  name="d2_upc" value="4" type="radio"> 4
                    <input class="radio-inline"  name="d2_upc" value="5" type="radio"> 5
                    <input class="radio-inline"  name="d2_upc" value="6" type="radio"> 6
                    <input class="radio-inline"  name="d2_upc" value="7" type="radio"> 7
                    <input class="radio-inline"  name="d2_upc" value="8" type="radio"> 8
                    <input class="radio-inline"  name="d2_upc" value="9" type="radio"> 9
                    <input class="radio-inline"  name="d2_upc" value="10" type="radio"> 10
                    <input class="radio-inline"  name="d2_upc" value="99" type="radio"> NC
                                  </div>
                                </div>
                          </div>
                          <div class="form-group col-md-12">

                            <div class="d-flex justify-content-between">
                                    <label > <b>Cibertec</b> </label>
                                    <div class="form-group">

                                    <input class="radio-inline"  name="d2_cibertec" value="1" type="radio"> 1
                                    <input class="radio-inline"  name="d2_cibertec" value="2" type="radio"> 2
                                    <input class="radio-inline"  name="d2_cibertec" value="3" type="radio"> 3
                                    <input class="radio-inline"  name="d2_cibertec" value="4" type="radio"> 4
                                    <input class="radio-inline"  name="d2_cibertec" value="5" type="radio"> 5
                                    <input class="radio-inline"  name="d2_cibertec" value="6" type="radio"> 6
                                    <input class="radio-inline"  name="d2_cibertec" value="7" type="radio"> 7
                                    <input class="radio-inline"  name="d2_cibertec" value="8" type="radio"> 8
                                    <input class="radio-inline"  name="d2_cibertec" value="9" type="radio"> 9
                                    <input class="radio-inline"  name="d2_cibertec" value="10" type="radio"> 10
                                    <input class="radio-inline"  name="d2_cibertec" value="99" type="radio"> NC

                                    </div>
                                  </div>
                            </div>
                            <div class="form-group col-md-12">
                              <div class="d-flex justify-content-between">
                                      <label > <b>Plataforma: Coursera</b> </label>
                                      <div class="form-group">

                            <input class="radio-inline"  name="d2_coursera" value="1" type="radio"> 1
                            <input class="radio-inline"  name="d2_coursera" value="2" type="radio"> 2
                            <input class="radio-inline"  name="d2_coursera" value="3" type="radio"> 3
                            <input class="radio-inline"  name="d2_coursera" value="4" type="radio"> 4
                            <input class="radio-inline"  name="d2_coursera" value="5" type="radio"> 5
                            <input class="radio-inline"  name="d2_coursera" value="6" type="radio"> 6
                            <input class="radio-inline"  name="d2_coursera" value="7" type="radio"> 7
                            <input class="radio-inline"  name="d2_coursera" value="8" type="radio"> 8
                            <input class="radio-inline"  name="d2_coursera" value="9" type="radio"> 9
                            <input class="radio-inline"  name="d2_coursera" value="10" type="radio"> 10
                            <input class="radio-inline"  name="d2_coursera" value="99" type="radio"> NC
                                      </div>
                                    </div>
                              </div>
                              <div class="form-group col-md-12">
                                <div class="d-flex justify-content-between">
                                        <label > <b>Plataforma: Platzi</b> </label>
                                        <div class="form-group">

                    <input class="radio-inline"  name="d2_platzi" value="1" type="radio"> 1
                    <input class="radio-inline"  name="d2_platzi" value="2" type="radio"> 2
                    <input class="radio-inline"  name="d2_platzi" value="3" type="radio"> 3
                    <input class="radio-inline"  name="d2_platzi" value="4" type="radio"> 4
                    <input class="radio-inline"  name="d2_platzi" value="5" type="radio"> 5
                    <input class="radio-inline"  name="d2_platzi" value="6" type="radio"> 6
                    <input class="radio-inline"  name="d2_platzi" value="7" type="radio"> 7
                    <input class="radio-inline"  name="d2_platzi" value="8" type="radio"> 8
                    <input class="radio-inline"  name="d2_platzi" value="9" type="radio"> 9
                    <input class="radio-inline"  name="d2_platzi" value="10" type="radio"> 10
                    <input class="radio-inline"  name="d2_platzi" value="99" type="radio"> NC
                                        </div>
                                      </div>
                                </div>
                                <div class="form-group col-md-12">
                                  <div class="d-flex justify-content-between">
                                          <label > <b>Plataforma: Udemy</b> </label>
                                          <div class="form-group">

                                    <input class="radio-inline"  name="d2_udemy" value="1" type="radio"> 1
                                    <input class="radio-inline"  name="d2_udemy" value="2" type="radio"> 2
                                    <input class="radio-inline"  name="d2_udemy" value="3" type="radio"> 3
                                    <input class="radio-inline"  name="d2_udemy" value="4" type="radio"> 4
                                    <input class="radio-inline"  name="d2_udemy" value="5" type="radio"> 5
                                    <input class="radio-inline"  name="d2_udemy" value="6" type="radio"> 6
                                    <input class="radio-inline"  name="d2_udemy" value="7" type="radio"> 7
                                    <input class="radio-inline"  name="d2_udemy" value="8" type="radio"> 8
                                    <input class="radio-inline"  name="d2_udemy" value="9" type="radio"> 9
                                    <input class="radio-inline"  name="d2_udemy" value="10" type="radio"> 10
                                    <input class="radio-inline"  name="d2_udemy" value="99" type="radio"> NC
                                          </div>
                                        </div>
                                  </div>
                                  <div class="form-group col-md-12">
                                    <div class="d-flex justify-content-between">
                                            <label > <b>Plataforma: Netzum</b> </label>
                                            <div class="form-group">

                          <input class="radio-inline"  name="d2_netzum" value="1" type="radio"> 1
                          <input class="radio-inline"  name="d2_netzum" value="2" type="radio"> 2
                          <input class="radio-inline"  name="d2_netzum" value="3" type="radio"> 3
                          <input class="radio-inline"  name="d2_netzum" value="4" type="radio"> 4
                          <input class="radio-inline"  name="d2_netzum" value="5" type="radio"> 5
                          <input class="radio-inline"  name="d2_netzum" value="6" type="radio"> 6
                          <input class="radio-inline"  name="d2_netzum" value="7" type="radio"> 7
                          <input class="radio-inline"  name="d2_netzum" value="8" type="radio"> 8
                          <input class="radio-inline"  name="d2_netzum" value="9" type="radio"> 9
                          <input class="radio-inline"  name="d2_netzum" value="10" type="radio"> 10
                          <input class="radio-inline"  name="d2_netzum" value="99" type="radio"> NC

                                            </div>
                                          </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                      <div class="d-flex justify-content-between">
                                              <label > <b>Plataforma: edX</b> </label>
                                              <div class="form-group">

                                <input class="radio-inline"  name="d2_edx" value="1" type="radio"> 1
                                <input class="radio-inline"  name="d2_edx" value="2" type="radio"> 2
                                <input class="radio-inline"  name="d2_edx" value="3" type="radio"> 3
                                <input class="radio-inline"  name="d2_edx" value="4" type="radio"> 4
                                <input class="radio-inline"  name="d2_edx" value="5" type="radio"> 5
                                <input class="radio-inline"  name="d2_edx" value="6" type="radio"> 6
                                <input class="radio-inline"  name="d2_edx" value="7" type="radio"> 7
                                <input class="radio-inline"  name="d2_edx" value="8" type="radio"> 8
                                <input class="radio-inline"  name="d2_edx" value="9" type="radio"> 9
                                <input class="radio-inline"  name="d2_edx" value="10" type="radio"> 10
                                <input class="radio-inline"  name="d2_edx" value="99" type="radio"> NC

                                              </div>
                                            </div>
                                      </div>
                                    <div class="form-group col-md-12">
                                      <div class="d-flex justify-content-between">
                                              <label > <b>Plataforma: Crehana</b> </label>
                                              <div class="form-group">

                                        <input class="radio-inline"  name="d2_crehana" value="1" type="radio"> 1
                                        <input class="radio-inline"  name="d2_crehana" value="2" type="radio"> 2
                                        <input class="radio-inline"  name="d2_crehana" value="3" type="radio"> 3
                                        <input class="radio-inline"  name="d2_crehana" value="4" type="radio"> 4
                                        <input class="radio-inline"  name="d2_crehana" value="5" type="radio"> 5
                                        <input class="radio-inline"  name="d2_crehana" value="6" type="radio"> 6
                                        <input class="radio-inline"  name="d2_crehana" value="7" type="radio"> 7
                                        <input class="radio-inline"  name="d2_crehana" value="8" type="radio"> 8
                                        <input class="radio-inline"  name="d2_crehana" value="9" type="radio"> 9
                                        <input class="radio-inline"  name="d2_crehana" value="10" type="radio"> 10
                                        <input class="radio-inline"  name="d2_crehana" value="99" type="radio"> NC

                                              </div>
                                            </div>
                                      </div>


    </div>
 -->

<br>
    <p style="text-align:center"> <b>D. PREFERENCIAS</b> </p>
<br>

<div class="form-row">
  <div class="form-group col-md-12">
    <label>	D1.¿Qué tipo de capacitaciones ha tenido en análisis de datos en el último año? </label>
    </div>
  <div class="form-group col-md-6">


    <div class="form-check">
      <input class="form-check-input require-three" type="checkbox" value="1" id="check_pr" name="check_pr">
      <label for="check_pr"  class="form-check-label" >
    Presencial
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input require-three" type="checkbox" value="1" id="check_ocv" name="check_ocv">
      <label for="check_ocv" class="form-check-label" >
  Online - Clases en vivo
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input require-three" type="checkbox" value="1" id="check_ob" name="check_ob">
      <label for="check_ob" class="form-check-label" >
Online - Blended (Vivo + Grabado)
      </label>
    </div>



    </div>

    <div class="form-group col-md-6" >



      <div class="form-check">
        <input class="form-check-input require-three" type="checkbox" value="1" id="check_ocg" name="check_ocg">
        <label for="check_ocg" class="form-check-label" >
Online - Clases grabadas
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input require-three" type="checkbox" value="1" id="check_ni" name="check_ni">
        <label for="check_ni" class="form-check-label">
  Ninguna
        </label>
      </div>


        <label for="" class="form-check-label" >
  Otro
        </label>
          <input type="text" class="form-control" placeholder="Especificar" name="check_capcitacionOtro" >



      </div>

</div>


                <div class="form-row">
                  <div class="form-group col-md-12">

                    <label>	D2.  ¿Cuál es su modalidad preferida para capacitarse? </label>

                    <select class="form-control e2_modalidad" name="e2_modalidad">
                      <option value="">Seleccione</option>
                      <option >Presencial </option>
                     <option >Online - Clases en vivo </option>
                      <option >Online - Blended (Vivo + Grabado) </option>
                      <option >Online – Clases grabadas </option>

                      <option value="Otro">Otro</option>
                    </select>

          <input type="text" class="form-control e2_otro" id="e2_otro" name="e2_otro" placeholder="Especificar"  >

                    </div>
                </div>


                <!-- <div class="form-row">
                  <div class="form-group col-md-12">
                    <label>	D3. ¿En qué días de la semana preferiría llevar una capacitación bajo la modalidad Online – en vivo?  </label>
                    </div>
                  <div class="form-group col-md-6">


                    <div class="form-check">
                      <input class="form-check-input require-three" type="checkbox" value="1" id="check_l" name="dia_pref_capLunes">
                      <label for="check_l"  class="form-check-label" >
                    Lunes
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input require-three" type="checkbox" value="1" id="check_ma" name="dia_pref_capMartes">
                      <label for="check_ma" class="form-check-label" >
                  Martes
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input require-three" type="checkbox" value="1" id="check_mi" name="dia_pref_capMiercoles">
                      <label for="check_mi" class="form-check-label" >
                Miércoles
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input require-three" type="checkbox" value="1" id="check_j" name="dia_pref_capJueves">
                      <label for="check_j" class="form-check-label" >
                    Jueves
                      </label>
                    </div>


                    </div>

                    <div class="form-group col-md-6" >



                      <div class="form-check">
                        <input class="form-check-input require-three" type="checkbox" value="1" id="check_v" name="dia_pref_capViernes">
                        <label for="check_v" class="form-check-label" >
                Viernes
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input require-three" type="checkbox" value="1" id="check_s" name="dia_pref_capSabado">
                        <label for="check_s" class="form-check-label">
                  Sábado
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input require-three" type="checkbox" value="1" id="check_d" name="dia_pref_capDomingo">
                        <label for="check_d" class="form-check-label" >
                  Domingo
                        </label>
                      </div>


                      </div>

                </div> -->
                <!-- <div class="form-row">
                  <div class="form-group col-md-12">
                    <label>	D4. ¿Cuál considera como la hora de inicio adecuada para llevar una clase bajo la modalidad Online – en vivo?  </label>
                    </div>

                    <div class="form-group col-md-6" >

                      <div class="form-check">
                        <input class="form-check-input require-three" type="checkbox" value="1" id="check_6am" name="horario6am">
                        <label for="check_6am" class="form-check-label" >
                    6:00 am
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input require-three" type="checkbox" value="1" id="check_7am" name="horario7am">
                        <label for="check_7am" class="form-check-label" >
                  7:00 am
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input require-three" type="checkbox" value="1" id="check_8am" name="horario8am">
                        <label for="check_8am" class="form-check-label">
                  8:00 am
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input require-three" type="checkbox" value="1" id="check_9am" name="horario9am">
                        <label for="check_9am" class="form-check-label" >
                  9:00 am
                        </label>
                      </div>


                      </div>

                  <div class="form-group col-md-6">


                    <div class="form-check">
                      <input class="form-check-input require-three" type="checkbox" value="1" id="check_5pm" name="horario5pm">
                      <label for="check_5pm"  class="form-check-label" >
                    5:00 pm
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input require-three" type="checkbox" value="1" id="check_6pm" name="horario6pm">
                      <label for="check_6pm" class="form-check-label" >
                  6:00 pm
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input require-three" type="checkbox" value="1" id="check_7pm" name="horario7pm">
                      <label for="check_7pm" class="form-check-label" >
                7:00 pm
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input require-three" type="checkbox" value="1" id="check_8pm" name="horario8pm">
                      <label for="check_8pm" class="form-check-label" >
                    8:00 pm
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input require-three" type="checkbox" value="1" id="check_9pm" name="horario9pm">
                      <label for="check_9pm" class="form-check-label" >
                    9:00 pm
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input require-three" type="checkbox" value="1" id="check_10pm" name="horario10pm">
                      <label for="check_10pm" class="form-check-label" >
                    10:00 pm
                      </label>
                    </div>
                    </div>

                    <div class="form-group col-md-12">
                  <label> Otros :</label>
                  <textarea name="horario_otro" id="horario_otro" class="form-control" placeholder="Especificar" rows="2" cols="4"></textarea>
                    </div>

                </div> -->

                <!-- fin check -->
                <!-- <div class="form-row">


                    <div class="form-group col-md-12">

                      <label>	D5. ¿Cuántas horas considera que debería durar una clase bajo la modalidad online – en vivo? </label>

                      <select class="selector e4_DuracionHorario" name="e4_DuracionHorario">
                      <option value="">Seleccione</option>
                      <option value="1 hora">1 hora</option>
                      <option value="2 horas">2 horas </option>
                      <option value="3 horas">3 horas </option>
                      <option value="4 horas">4 horas</option>
                      <option value="Más de 4 horas">Más de 4 horas</option>

                      </select>

                      </div>

                      <div class="form-group col-md-12">

                        <label>	D6. Considerando todas las clases, ¿cuántas horas totales considera adecuadas para una capacitación bajo la modalidad online - en vivo?  </label>

                        <select class="selector e5_DuracionCapacitacion" name="e5_DuracionCapacitacion">
                        <option value="">Seleccione</option>
                        <option value="Hasta 10 horas">Hasta 10 horas</option>
                        <option value="De 11 a 25 horas">De 11 a 25 horas </option>
                        <option value="De 26 a 50 horas">De 26 a 50 horas </option>
                        <option value="De 51 a 100 horas">De 51 a 100 horas</option>
                        <option value="Más de 100 horas">Más de 100 horas</option>

                        </select>

                        </div>
                </div> -->

                <div class="form-row">


                    <div class="form-group col-md-12">

                      <label>	D3. Si tuviera que capacitarse bajo la modalidad online clases en vivo,
                         ¿qué tan adecuado considera que sería tener clases los días de semana (entre lunes y viernes) de 7:00pm a 10:00pm?  </label>

                      <select class="form-control d3" name="d3">
                      <option value="">Seleccione</option>
                      <option >Definitivamente no podría</option>
                      <option >Se me dificultaría </option>
                      <option >Es probable que se me acomode </option>
                      <option >Es el más adecuado para mí</option>
                      <option >No Precisa</option>

                      </select>

                      </div>

                      <div class="form-group col-md-12">

                        <label>	D4. Si tuviera que capacitarse bajo la modalidad online clases en vivo, ¿qué tan adecuado considera que sería tener clases los fines de semana (sábados y domingos) de 9:00 am a 1:00 pm?   </label>

                        <select class="form-control d4" name="d4">
                        <option value="">Seleccione</option>
                        <option >Definitivamente no podría</option>
                        <option >Se me dificultaría </option>
                        <option >Es probable que se me acomode </option>
                        <option >Es el más adecuado para mí</option>
                        <option >No Precisa</option>

                        </select>

                        </div>

                        <div class="form-group col-md-12">

                          <label>	D5. Si tuviera que capacitarse bajo la modalidad online clases en vivo, ¿qué tan adecuado considera que sería tener clases los días de semana (entre lunes y viernes) de 7:00 am a 9:00 am?    </label>

                          <select class="form-control d5" name="d5">
                          <option value="">Seleccione</option>
                          <option >Definitivamente no podría</option>
                          <option >Se me dificultaría </option>
                          <option >Es probable que se me acomode </option>
                          <option >Es el más adecuado para mí</option>
                          <option >No Precisa</option>

                          </select>

                          </div>
                          <div class="form-group col-md-12">

                            <label>	D6. Si tuviera que capacitarse bajo la modalidad online clases en vivo, ¿qué tan adecuado considera que sería tener clases los fines de semana (sábados y domingos) 2:00 pm a 6:00 pm?   </label>

                            <select class="form-control d6" name="d6">
                            <option value="">Seleccione</option>
                            <option >Definitivamente no podría</option>
                            <option >Se me dificultaría </option>
                            <option >Es probable que se me acomode </option>
                            <option >Es el más adecuado para mí</option>
                            <option >No Precisa</option>

                            </select>

                            </div>
                            <div class="form-group col-md-12">

                              <label>	D7. Si tuviera que capacitarse bajo la modalidad online clases en vivo, ¿qué tan adecuado considera que sería tener clases los días de semana (entre lunes y viernes) de 9:00 pm a 12:00 am?  </label>

                              <select class="form-control d7" name="d7">
                              <option value="">Seleccione</option>
                              <option >Definitivamente no podría</option>
                              <option >Se me dificultaría </option>
                              <option >Es probable que se me acomode </option>
                              <option >Es el más adecuado para mí</option>
                              <option >No Precisa</option>

                              </select>

                              </div>
                </div>

<hr>

<div class="form-check">
    <input class="form-check-input" required type="checkbox" value="1" id="datos1" name="datos1"  style="margin-top: 7px;">
    <label class="form-check-label" for="datos1">
      Acepto que DMC utilice mis datos para temas analíticos.
    </label>


</div>

<div class="form-check">
    <input class="form-check-input" required type="checkbox" value="1" id="datos" name="datos"  style="margin-top: 7px;">
    <label class="form-check-label" for="datos">
        He leído y acepto los <a href="#" data-toggle="modal" data-target="#myModal">términos y condiciones.</a>
    </label>



</div>
<br>
<div class="row">
                        <div class="col-md-12" >

                              <button type="submit" class="btn btn-primary btn-envia" id="button">Enviar</button>

                      </div>      </div>

  				</form>

  			</div>



        <!-- inicio registro exitoso -->
        <div id="exito" style="text-align:center">

 <p >


<b>¡Hola! </b> <br>
Gracias por tu interés en este curso gratuito, pero desafortunadamente ya se cerró la etapa de registros.
Si accediste directamente a una de las 300 vacantes o eres una de las 300 personas que ganaron una beca a través del sorteo,
estarás recibiendo un correo con todos los detalles del inicio de clases en el transcurso del día. Recuerda revisar siempre tu bandeja de no deseados.
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
// -------


$(document).ready(function(event)
{

  $(".selector").selectize({
    create: true
  });

$(".cargo_otro,.b4_otro,.c3_otro,.e2_otro,.c6_otro,.b5_otro").hide();
     // $('#exito').hide();


   $('#texto_inicial').hide();

});

// $(document).on('click','.btn-check',function(e){
  // $(".ct option[value='X']").remove();
  // $(".btn-check option").remove();
  // let valoresCheck = [];
  //
  // $('[class="btn-check"]:checked').each(function(){
  //     valoresCheck.push('<option>'+$(this).attr("nombre_ck")+'</option>');
  // });

  // $(".b5_centroEstudio").append(valoresCheck.join(""));

// if( $('.btn-check').prop('checked') ) {
//    $(".b5_centroEstudio").append('<option value="'+$(this).attr("nombre_ck")+'" >'+$(this).attr("nombre_ck")+'</option>');
//
// }else {
//   $(".b5_centroEstudio option[value='"+$(this).attr("nombre_ck")+"']").remove();
//
// }
//
//   })

$('.b5_centroEstudio').change(function(){
      if($(this).val() == 'Otro'){
        $(".b5_otro").show();
      }else {
        $(".b5_otro").hide();
      }
  });

$('.b4_formacion').change(function(){
      if($(this).val() == 0){
        $(".b4_otro").show();
      }else {
        $(".b4_otro").hide();
      }
  });


$('.c6_labores').change(function(){

    if($(this).val() == 'Otro'){
$(".c6_otro").show();
  }else {
$(".c6_otro").hide();
}
  });



$('.cargo').change(function(){

    if($(this).val() == 98){
$(".cargo_otro").show();
  }else {
$(".cargo_otro").hide();
}
  });

  $('.e2_modalidad').change(function(){
        if($(this).val() == 'Otro'){
          $(".e2_otro").show();
        }else {
          $(".e2_otro").hide();
        }
    });
    $('.sector').change(function(){

        if($(this).val() == 'Otro'){
    $(".c3_otro").show();
      }else {
    $(".c3_otro").hide();
    }
      });
  $('.b8_formacion').change(function(){

       if($(this).val() == 0){
   $(".b4_otro").show();
     }else {
   $(".b4_otro").hide();
   }
    });



  $('.c1_situacionLaboral').change(function(){

       if ($(this).val() == 'Aún no he laborado') {
         document.getElementById("check_dmc1").focus();
           $('.cargo,.sector,.cantidad_trabajadores,.rango_remuneracion_mensual,.c6_labores').attr('disabled', 'disabled');
         }else {
           $('.cargo,.sector,.cantidad_trabajadores,.rango_remuneracion_mensual,.c6_labores').removeAttr('disabled');
         }

   });


$('#tDocumento').change(function(){

    var resultado = $('#tDocumento').val();

   if(resultado == 'DNI'){

$('#img').html('<span class="input-group-text" id="basic-addon1"> <img src="../img/peru.png" style="width:20px;height:20px;" > </span>');
}else {

$('#img').html('<span class="input-group-text" id="basic-addon1"> <img src="../img/mundo.png" style="width:20px;height:20px;" > </span>');
}
});

$(document).on('submit','#form',function(e){
  parametros = $(this).serialize();


  $.ajax({
        url:'../suscripcion/controller/controller_sorteoAniversario.php?op=registro',
        type:'POST',
        data:parametros,

          beforeSend:function(){

               $('.btn-envia').prop("disabled", true) ;
                            Swal.fire({
                    title : "¡Registrando!",
                    text : "Espere por Favor",
                    showConfirmButton : false,
                   timer : 4000
                                })
                        },
       success:function(data){


   if (data == 'ok') {
    Swal.fire({
                    icon: 'success',

                    title: "¡Registrado!",
                    text: "Gracias por tu interes en este curso.",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    timer : 3000

                  })

                  $("#texto_inicial").hide();
                  $('#exito').show();
   }else {
     Swal.fire({
                   icon: 'error',
                    title: "¡Upps..!",
                    text: "Algo salio mal, Intentalo nuevamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    timer : 3000

                  })
   }



}
 });

 e.preventDefault();
});
</script>

  </body>
</html>
