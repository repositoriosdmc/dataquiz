<?php

$paises = file_get_contents("https://gist.githubusercontent.com/Yizack/bbfce31e0217a3689c8d961a356cb10d/raw/107e0bdf27918adea625410af0d340e8fc1cd5bf/countries.json");

$paises = json_decode($paises, TRUE);





?>

<!DOCTYPE html>

<html lang="es">

<head>

  <meta charset="utf-8">

  <title>DMC | Sorteo de aniversario</title>

  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="https://certificaciones.dmc.pe/suscripcion/css/selectize.default_2.css">





  <link rel="icon" href="../img/1 (5).png">







  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />





  <!--  -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/alertify.min.js"></script>

  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/css/alertify.min.css" />

  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/css/themes/default.min.css" />

  <!--  -->







  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>



  <!-- Global site tag (gtag.js) - Google Analytics -->

  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-112204121-1"></script>



  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



  <style media="screen">
    .iti {
      width: 100%;
    }

    /* para el phone */





    table {

      font-family: arial, sans-serif;

      border-collapse: collapse;

      width: 100%;

    }



    td,
    th {

      border: 1px solid #dddddd;

      text-align: left;

      padding: 8px;

    }
  </style>

</head>

<body style="background-image: url('../img/fondo-2024.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: 100% 100%;">







  <div class="container">

    <div class="row justify-content-md-center">



      <!-- <div class="col-md-8" style="text-align: center;padding: 35px 20px 20px">

             <img  src="../img/logo.png" alt="Responsive image" class="img-responsive" width="60%" >

            </div> -->

      <br>

      <div class="col-md-10" style="padding: 25px 35px; border: 1px solid #c8c7c7; margin: 15px 0; border-radius: 6px;background: white;">

        <div style="text-align: center;">

          <img class="h-log2" src="../img/Logo-colorweb.png" width="18%">





        </div>

        <br>

        <div id="texto_inicial">

          <p>

            <b>¡Hola! Somos DMC,</b>

            pioneros en la formación de profesionales y empresas en Data & Analytics con más de 15 años de experiencia. Como líderes en la comunidad analítica, celebramos este mes un año más, por lo que te invitamos a participar del sorteo de 1 beca integral en la capacitación que elijas para que lleves tus conocimientos y dominio de los datos a otro nivel.

          </p>
          <p>
            Podrás elegir entre más de 50 opciones disponibles en nuestras categorías de cursos, especializaciones, programas/diplomas y bootcamps virtuales totalmente en vivo, valorizados hasta en US $2,500, con los que podrás potenciar tu carrera profesional y prepararte en los roles analíticos más demandados en la actualidad.
          </p>

          <p>Para participar solo tienes que completar este formulario hasta el lunes 11 de marzo. El sorteo se realizará el día martes 12 de marzo a través de las historias en nuestras redes sociales. La persona ganadora será posteriormente contactada por nuestros asesores para realizar la inscripción respectiva en la capacitación deseada. ¡No dejes pasar esta gran oportunidad de capacitarte gratis!</p>

          <hr>

          <br>

          <form name="form" id="form" autocomplete="off">



            <p style="text-align:center"> <b>A. INFORMACIÓN GENERAL</b> </p>



            <div class="form-row">



              <div class="form-group col-md-6">

                <label for="">A1. Nombres:</label>

                <input type="text" required class="form-control" id="nombres" name="nombres">

              </div>





              <div class="form-group col-md-6">

                <label for="">A2. Apellidos:</label>

                <input type="text" class="form-control" id="apellidos" name="apellidos">

              </div>

            </div>

            <div class="form-row">



              <div class="form-group col-md-6">

                <label for=""> A3. Celular:</label>

                <input type="text" class="form-control" required style="size: 100px;" id="phone" name="phone" placeholder="">

              </div>



              <div class="form-group col-md-6">

                <label for="">A4. Email:</label>

                <input required type="text" class="form-control" id="mail" name="mail">

              </div>



            </div>



            <div class="form-row">





              <div class="form-group col-md-6">

                <label for="exampleFormControlInput1">A5. Tipo de documento:</label>

                <div class="input-group mb-3">

                  <div class="input-group-prepend" id="img">

                    <span class="input-group-text" id="basic-addon1"> <img src="../img/peru.png" style="width:20px;height:20px;"> </span>

                  </div>

                  <select class="form-control valid" id="tDocumento" name="tDocumento">



                    <option value="DNI">DNI</option>

                    <option value="OTROS">OTROS </option>

                  </select>





                </div>

              </div>



              <div class="form-group col-md-6">

                <label for="">A6. N° Documento:</label>

                <input type="number" step="any" class="form-control" id="nro_documento" name="nro_documento">

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

                <input type="number" step="any" class="form-control edad" id="edad" name="edad" placeholder="">

              </div>

              <div class="form-group col-md-6">

                <label for="">A9. País de residencia </label>

                <select class="selector" id="pais" name="pais">

                  <option value="">Seleccione</option>

                  <!--   <option value="Perú">Perú</option> -->

                  <? for ($i = 0; $i < count($paises["countries"]); $i++) { ?>

                    <option value='<?= $paises["countries"][$i]["name_es"] ?>'><?= $paises["countries"][$i]["name_es"] ?></option>

                  <? } ?>

                </select>

              </div>

            </div>

            <div class="form-row">





              <div class="form-group col-md-12">

                <label>A10. Formación de pregrado </label>



                <select required class="form-control b4_formacion" name="b4_formacion">

                  <option value="" selected disabled>Seleccione</option>

                  <option>Ingeniería de Sistemas </option>

                  <option>Ingeniería Industrial </option>

                  <option>Ingeniería Informática </option>

                  <option>Ingeniería Estadística </option>

                  <option>Ingeniería Electrónica </option>

                  <option>Ingeniería Económica / Economía</option>

                  <option>Ciencias de la Computación</option>

                  <option>Administrador / Administración de Empresas</option>

                  <option value="0">Otro</option>

                </select>

                <input type="text" class="form-control b4_otro" id="" name="b4_otro" placeholder="¿Cuál?">

              </div>

            </div>

            <!-- cambiado -->

            <p style="text-align:center"> <b>B. SITUACIÓN LABORAL</b> </p>


            <div class="row">

              <div class="form-group col-md-12">

                <label for="">B1. ¿Cuál de las siguientes frases describe mejor su situación laboral? </label>

                <select class="form-control c1_situacionLaboral" name="c1_situacionLaboral" id="c1_situacionLaboral">

                  <option value="" selected disabled>Seleccione</option>

                  <option>Actualmente estoy laborando, mi ocupación principal es dependiente</option>

                  <option>Actualmente estoy laborando, mi ocupación principal es independiente</option>

                  <option>Actualmente no estoy laborando,

                    pero sí he trabajado antes</option>

                  <option>Aún no he laborado</option>

                </select>

              </div>

              <div class="form-group col-md-12">



                <label for=""> B2. ¿Qué puesto tiene actualmente en su trabajo? Si no se encuentra trabajando actualmente, considerar las labores del último trabajo </label>

                <select class="form-control cargo" name="cargo" id="cargo">

                  <option value="" selected disabled>Seleccione</option>

                  <option>Practicante Preprofesional</option>

                  <option>Practicante Profesional</option>

                  <option>Analista / Ejecutivo Jr.</option>

                  <option>Analista / Ejecutivo Sr.</option>

                  <option>Jefe / Subgerente</option>

                  <option>Gerente de Área</option>

                  <option>Director / VP</option>

                  <option>Gerente general / Dueño empresa</option>

                  <option value="98">Otro (Especificar):</option>

                </select>

                <input type="text" class="form-control cargo_otro" id="cargo_otro" name="cargo_otro" placeholder="Especificar">





              </div>

              <div class="col-md-12 form-group">

                <label for="floatingInputGrid" class="form-label">B3. ¿En qué sector trabaja actualmente? Si no se encuentra trabajando actualmente, considerar las labores del último trabajo</label>

                <select class="form-control sector" name="sector" id="sector">

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

                <input type="text" class="form-control c3_otro" id="c3_otro" name="c3_otro" placeholder="¿Cuál?">

              </div>

            </div>




            <br>


            <p style="text-align:center"> <b>D. PREFERENCIAS</b> </p>

            <br>



            <div class="form-row">

              <div class="form-group col-md-12">

                <label> D1.¿Qué tipo de capacitaciones ha tenido en análisis de datos en el último año? </label>

              </div>

              <div class="form-group col-md-6">

                <div class="form-check">

                  <input class="form-check-input require-three" type="checkbox" value="1" id="check_pr" name="check_pr">

                  <label for="check_pr" class="form-check-label">

                    Presencial

                  </label>

                </div>

                <div class="form-check">

                  <input class="form-check-input require-three" type="checkbox" value="1" id="check_ocv" name="check_ocv">

                  <label for="check_ocv" class="form-check-label">

                    Online - Clases en vivo

                  </label>

                </div>

                <div class="form-check">

                  <input class="form-check-input require-three" type="checkbox" value="1" id="check_ob" name="check_ob">

                  <label for="check_ob" class="form-check-label">

                    Online - Blended (Vivo + Grabado)

                  </label>

                </div>
              </div>

              <div class="form-group col-md-6">

                <div class="form-check">

                  <input class="form-check-input require-three" type="checkbox" value="1" id="check_ocg" name="check_ocg">

                  <label for="check_ocg" class="form-check-label">

                    Online - Clases grabadas

                  </label>

                </div>

                <div class="form-check">

                  <input class="form-check-input require-three" type="checkbox" value="1" id="check_ni" name="check_ni">

                  <label for="check_ni" class="form-check-label">

                    Ninguna

                  </label>

                </div>

                <label for="" class="form-check-label">

                  Otro

                </label>

                <input type="text" class="form-control" placeholder="Especificar" name="check_capcitacionOtro">

              </div>

            </div>

            <div class="form-row">

              <div class="form-group col-md-12">

                <label> D2.¿Qué días de la semana consideras ideales para llevar capacitaciones en la noche? </label>

              </div>

              <div class="form-group col-md-6">

                <div class="form-check">

                  <input class="form-check-input require-three" type="checkbox" value="1" id="dsLunes" name="dsLunes">

                  <label for="dsLunes" class="form-check-label">

                    Lunes

                  </label>

                </div>

                <div class="form-check">

                  <input class="form-check-input require-three" type="checkbox" value="1" id="dsMartes" name="dsMartes">

                  <label for="dsMartes" class="form-check-label">

                    Martes

                  </label>

                </div>

                <div class="form-check">

                  <input class="form-check-input require-three" type="checkbox" value="1" id="dsMiercoles" name="dsMiercoles">

                  <label for="dsMiercoles" class="form-check-label">

                    Miércoles

                  </label>

                </div>
              </div>

              <div class="form-group col-md-6">

                <div class="form-check">

                  <input class="form-check-input require-three" type="checkbox" value="1" id="dsJueves" name="dsJueves">

                  <label for="dsJueves" class="form-check-label">

                    Jueves

                  </label>

                </div>

                <div class="form-check">

                  <input class="form-check-input require-three" type="checkbox" value="1" id="dsViernes" name="dsViernes">

                  <label for="dsViernes" class="form-check-label">

                    Viernes

                  </label>

                </div>

              </div>

            </div>

            <div class="form-row">

              <div class="form-group col-md-12">

                <label> D3.¿Consideras una buena opción capacitarte los fines de semana? </label>

              </div>

              <div class="form-group col-md-6">

                <div class="form-check">

                  <input class="form-check-input require-three" type="checkbox" value="1" id="fsSabado" name="fsSabado">

                  <label for="fsSabado" class="form-check-label">

                    Solo los sábados

                  </label>

                </div>

                <div class="form-check">

                  <input class="form-check-input require-three" type="checkbox" value="1" id="fsDomingo" name="fsDomingo">

                  <label for="fsDomingo" class="form-check-label">

                    Solo los domingos

                  </label>

                </div>


              </div>

              <div class="form-group col-md-6">

                <div class="form-check">

                  <input class="form-check-input require-three" type="checkbox" value="1" id="fsSabadoDomingo" name="fsSabadoDomingo">

                  <label for="fsSabadoDomingo" class="form-check-label">

                    Sábados y domingos

                  </label>

                </div>

                <div class="form-check">

                  <input class="form-check-input require-three" type="checkbox" value="1" id="fsNinguno" name="fsNinguno">

                  <label for="fsNinguno" class="form-check-label">

                    Ninguno

                  </label>

                </div>

              </div>

            </div>


            <div class="form-row">

              <div class="form-group col-md-12">

                <label> D4.¿Qué tipo de cursos estaría interesado en aprender para mejorar su perfil profesional? </label>

              </div>

              <div class="form-group col-md-6">

                <div class="form-check">

                  <input class="form-check-input require-three" type="checkbox" value="1" id="chk_base_datos" name="chk_base_datos">

                  <label for="chk_base_datos" class="form-check-label">

                    Base de Datos

                  </label>

                </div>

                <div class="form-check">

                  <input class="form-check-input require-three" type="checkbox" value="1" id="chk_visualizacion_datos" name="chk_visualizacion_datos">

                  <label for="chk_visualizacion_datos" class="form-check-label">

                    Visualización de datos

                  </label>

                </div>

                <div class="form-check">

                  <input class="form-check-input require-three" type="checkbox" value="1" id="chk_herramienta_analitica" name="chk_herramienta_analitica">

                  <label for="chk_herramienta_analitica" class="form-check-label">

                    Herramientas analíticas(R y Python)

                  </label>

                </div>

                <div class="form-check">

                  <input class="form-check-input require-three" type="checkbox" value="1" id="chk_cloud" name="chk_cloud">

                  <label for="chk_cloud" class="form-check-label">

                    Herramientas on cloud

                  </label>

                </div>

                <div class="form-check">

                  <input class="form-check-input require-three" type="checkbox" value="1" id="chk_big_data" name="chk_big_data">

                  <label for="chk_big_data" class="form-check-label">

                    Herramientas de big data

                  </label>

                </div>

                <div class="form-check">

                  <input class="form-check-input require-three" type="checkbox" value="1" id="chk_machine_learning" name="chk_machine_learning">

                  <label for="chk_machine_learning" class="form-check-label">

                    Herramientas de machine learning

                  </label>

                </div>


              </div>

              <div class="form-group col-md-6">

                <div class="form-check">

                  <input class="form-check-input require-three" type="checkbox" value="1" id="chk_inteligencia_artificial" name="chk_inteligencia_artificial">

                  <label for="chk_inteligencia_artificial" class="form-check-label">

                    Inteligencia artificial

                  </label>

                </div>

                <div class="form-check">

                  <input class="form-check-input require-three" type="checkbox" value="1" id="chk_metodologias_agiles" name="chk_metodologias_agiles">

                  <label for="chk_metodologias_agiles" class="form-check-label">

                    Metodologías ágiles

                  </label>

                </div>

                <div class="form-check">

                  <input class="form-check-input require-three" type="checkbox" value="1" id="chk_ninguna" name="chk_ninguna">

                  <label for="chk_ninguna" class="form-check-label">

                    Ninguna

                  </label>



                </div>

                <label for="" class="form-check-label">Otro</label>

                <input type="text" class="form-control" placeholder="Especificar" name="chk_otro">

              </div>

            </div>


            <div class="form-row">

              <div class="form-group col-md-12">

                <label> D4. ¿En qué perfile analítico tienes más interés en capacitarte?</label>

              </div>

              <div class="form-group col-md-6">

                <div class="form-check">

                  <input class="form-check-input require-three" type="checkbox" value="1" id="cpDataAnalyst" name="cpDataAnalyst">

                  <label for="cpDataAnalyst" class="form-check-label">

                    Data Analyst

                  </label>

                </div>

                <div class="form-check">

                  <input class="form-check-input require-three" type="checkbox" value="1" id="cpDataScience" name="cpDataScience">

                  <label for="cpDataScience" class="form-check-label">

                    Data Scientist

                  </label>

                </div>


              </div>

              <div class="form-group col-md-6">

                <div class="form-check">

                  <input class="form-check-input require-three" type="checkbox" value="1" id="cpDataEngineer" name="cpDataEngineer">

                  <label for="cpDataEngineer" class="form-check-label">

                    Data Engineer

                  </label>

                </div>
                <label for="" class="form-check-label">Otro</label>

                <input type="text" class="form-control" placeholder="Especificar" name="cpOtro">


              </div>

            </div>

            <hr>

            <div class="form-check">

              <input class="form-check-input" required type="checkbox" value="1" id="datos1" name="datos1" style="margin-top: 7px;">

              <label class="form-check-label" for="datos1">

                Acepto que DMC utilice mis datos para temas analíticos.

              </label>





            </div>



            <div class="form-check">

              <input class="form-check-input" required type="checkbox" value="1" id="datos" name="datos" style="margin-top: 7px;">

              <label class="form-check-label" for="datos">

                He leído y acepto los <a href="#" data-toggle="modal" data-target="#myModal">términos y condiciones.</a>

              </label>


            </div>

            <br>

            <div class="row">

              <div class="col-md-12">

                <button type="submit" class="btn btn-primary btn-envia" id="button">Enviar</button>

              </div>
            </div>

          </form>

        </div>

        <!-- inicio registro exitoso -->

        <div id="exito" style="text-align:center;display:none">



          <p>


            <b>¡Hola! </b> <br>

            ¡Gracias por completar el formulario! No te olvides de seguir nuestras redes sociales (Facebook, Instagram, TikTok y LinkedIn) para enterarte de la realización del sorteo y conocer sobre más y próximas novedades.
          </p>





        </div>

        <!-- fin -->

      </div>



    </div>









    <!--  -->



    <? include_once "view/terminos.php"; ?>



    <script type="text/javascript">



    </script>



    <script src="./assets/js/jquery.min.js"></script>

    <script src="https://certificaciones.dmc.pe/suscripcion/assets/js/popper.min.js"></script>

    <script src="https://certificaciones.dmc.pe/suscripcion/assets/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="https://certificaciones.dmc.pe/suscripcion/assets/js/selectize.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="./assets/js/jquery.validate.min.js"></script>



    <script type="text/javascript">
      function getIp(callback) {

        fetch('https://ipinfo.io/json?token=e41e88175aa564', {
            headers: {
              'Accept': 'application/json'
            }
          })

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





          //$('#texto_inicial').hide();



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



      $('.b5_centroEstudio').change(function() {

        if ($(this).val() == 'Otro') {

          $(".b5_otro").show();

        } else {

          $(".b5_otro").hide();

        }

      });



      $('.b4_formacion').change(function() {

        if ($(this).val() == 0) {

          $(".b4_otro").show();

        } else {

          $(".b4_otro").hide();

        }

      });





      $('.c6_labores').change(function() {



        if ($(this).val() == 'Otro') {

          $(".c6_otro").show();

        } else {

          $(".c6_otro").hide();

        }

      });







      $('.cargo').change(function() {



        if ($(this).val() == 98) {

          $(".cargo_otro").show();

        } else {

          $(".cargo_otro").hide();

        }

      });



      $('.e2_modalidad').change(function() {

        if ($(this).val() == 'Otro') {

          $(".e2_otro").show();

        } else {

          $(".e2_otro").hide();

        }

      });

      $('.sector').change(function() {



        if ($(this).val() == 'Otro') {

          $(".c3_otro").show();

        } else {

          $(".c3_otro").hide();

        }

      });

      $('.b8_formacion').change(function() {



        if ($(this).val() == 0) {

          $(".b4_otro").show();

        } else {

          $(".b4_otro").hide();

        }

      });







      $('.c1_situacionLaboral').change(function() {



        if ($(this).val() == 'Aún no he laborado') {

          document.getElementById("check_dmc1").focus();

          $('.cargo,.sector,.cantidad_trabajadores,.rango_remuneracion_mensual,.c6_labores').attr('disabled', 'disabled');

        } else {

          $('.cargo,.sector,.cantidad_trabajadores,.rango_remuneracion_mensual,.c6_labores').removeAttr('disabled');

        }



      });





      $('#tDocumento').change(function() {



        var resultado = $('#tDocumento').val();



        if (resultado == 'DNI') {



          $('#img').html('<span class="input-group-text" id="basic-addon1"> <img src="../img/peru.png" style="width:20px;height:20px;" > </span>');

        } else {



          $('#img').html('<span class="input-group-text" id="basic-addon1"> <img src="../img/mundo.png" style="width:20px;height:20px;" > </span>');

        }

      });



      $(document).on('submit', '#form', function(e) {

        parametros = $(this).serialize();





        $.ajax({

          url: '../suscripcion/controller/controller_sorteoAniversario.php?op=registro',

          type: 'POST',

          data: parametros,



          beforeSend: function() {



            $('.btn-envia').prop("disabled", true);

            Swal.fire({

              title: "¡Registro en proceso!",

              text: "Espere, por Favor",

              showConfirmButton: false,

              timer: 4000

            })

          },

          success: function(data) {

            console.log(data.trim())
            console.log(data.trim() == 'ok')





            if (data.trim() == 'ok') {

              Swal.fire({

                icon: 'success',



                title: "¡Registrado!",

                text: "Gracias por tu interés en el sorteo de aniversario.",

                showConfirmButton: true,

                confirmButtonText: "Cerrar",

                timer: 3000



              })



              $("#texto_inicial").hide();

              $('#exito').show();

            } else {

              Swal.fire({

                icon: 'error',

                title: "¡Upps..!",

                text: "Algo salio mal, Intentalo nuevamente",

                showConfirmButton: true,

                confirmButtonText: "Cerrar",

                timer: 3000



              })

            }







          }

        });



        e.preventDefault();

      });
    </script>



</body>

</html>