<!DOCTYPE html>



<html lang="es" dir="ltr">



<head>

<link rel="icon"  href="../img/1 (5).png" >

  <meta charset="utf-8">



  <title>Registros</title>



  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">



  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">



  <!-- <link rel="stylesheet" type="text/css" href="https://survey.dmc.pe/suscripcion/css/selectize.default_2.css">

 -->



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


 <!-- Pega el código del pixel de Facebook justo antes de la etiqueta de cierre </head> -->
 <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1064200720291743');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=1064200720291743&ev=PageView&noscript=1"
    /></noscript>
    <!-- Fin del código del pixel de Facebook -->




  <style media="screen">

    .iti {

      width: 100%;

    }



    /* para el phone */



    @media (max-height: 30px) {

     .div-con-gradiente {

       height: 100px !important;/* Ajusta la altura para pantallas más pequeñas */

     }

   }

  </style>



  <!-- Hotjar Tracking Code for Encuestas -->

  <!-- Hotjar Tracking Code for Concurso -->



</head>



<body style="background-image: url('../img/fondo general.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: 100% 100%;">



  <div class="col-md-12 "  style="text-align: right;padding: 35px 20px 20px ">

     <img src="../img/logo-dmc.png" alt="" class="img-fluid" style="max-width: 18%;">

   </div>

  <div class="container">



    <div class="row justify-content-md-center">





      <!-- <div class="col-md-8" style="text-align: center;padding: 35px 20px 20px">



             <img  src="../img/logo.png" alt="Responsive image" class="img-responsive" width="60%" >



            </div> -->







      <div class="col-md-10 " style="padding: 25px 25px 25px; border: 1px solid #c8c7c7; margin: 15px 0; border-radius: 6px; box-shadow: 0px 1px 5px #dddddd; background: white;">



        <div id="texto_inicial">





          <div style="text-align: center;padding: 0px 25px 45px">

            <img src="../img/logo-certif-dmc.png" alt="">

          </div>









          <form name="form" id="form" autocomplete="off">



            <div class="mensaje">







            </div>



            <input type="hidden" name="formulario" value="3">



            <div class="form-row">







              <div class="form-group col-md-6">



                <label for=""> Nombres :</label>



                <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres " required="">



              </div>



              <div class="form-group col-md-6">



                <label for=""> Apellidos:</label>



                <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" required="">



              </div>







            </div>







            <div class="form-row">







              <div class="form-group col-md-6">



                <label for=""> Tipo Documento :</label>



                <select class="form-control tipo_documento" name="tipo_documento">



                  <option value="DNI">DNI</option>



                  <option value="PASAPORTE">PASAPORTE</option>



                  <option value="CARNET EXTRANJERÍA">CARNET EXTRANJERÍA</option>



                  <option value="OTRO">OTRO</option>



                </select>



              </div>



              <div class="form-group col-md-6">



                <label for=""> Número Documento:</label>



                <input type="number" step="any" class="form-control numero_documento" id="numero_documento" name="numero_documento" placeholder="Número Documento">



              </div>







            </div>











            <div class="form-row">



              <div class="form-group col-md-6">



                <label for=""> Email: </label>



                <input type="email" class="form-control" id="correo" name="correo" placeholder="Email" required="">



              </div>



              <div class="form-group col-md-6">



                <label for=""> Teléfono: </label>



                <input type="number" step="any" class="form-control" id="telefono" name="telefono" required="" placeholder="teléfono" required="">



              </div>



            </div>







            <div class="form-row">



              <div class="form-group col-md-6">



                <label for=""> Contraseña: </label>



                <input type="password" class="form-control" name="contraseña" placeholder="Contraseña" required="">



              </div>



              <div class="form-group col-md-6">



                <label for=""> Repita contraseña: </label>



                <input type="password" class="form-control"  name="repita_contraseña" placeholder="Repita contraseña" required="">



              </div>



            </div>











            <br>



            <!--  -->



            <div class="form-check" style="text-align:center">



              <input class="form-check-input" type="checkbox" value="1" id="datos" name="datos" required style="margin-top: 7px;">



              <label class="form-check-label" for="datos">



                He leído y acepto los <a href="../img/challenge_term_y_cond.pdf" target="_blank" data-toggle="modal" data-target="#myModal">términos y condiciones</a>



              </label>



              <div>



                <label id="datos-error" class="error" for="datos" style="display: none;">Campo obligatorio</label>



              </div>



            </div>



            <br>



            <div style="text-align:center">



              <button type="submit" style="width: 200px; " class="btn btn-primary" id="button">Enviar</button>



            </div>



             <div style="text-align:center">



             <br> 

   <label > <b>¿Ya tienes cuenta?</b> Logueate <a href="https://certificaciones.dmc.pe/suscripcion/inicio_formulario.php"> Aquí </a> </label>



            </div> 



          </form>







        </div>















        <!-- inicio registro exitoso -->



        <div id="exito">











          <p style="text-align:center">



            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" style="color:blue; " class="bi bi-check-circle" viewBox="0 0 16 16">



              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />



              <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />



            </svg> <br>



            <b>¡Gracias por registrarte!</b>

          </p>











          <p style="text-align:center">



            Te llegará un correo para <b>activar tu cuenta,</b> una vez activa

            dirígete al botón que está más abajo para iniciar sesión. No olvidar revisar tu bandea de SPAM.



            <br>



            <!-- <br> <a type="button" class="btn btn-sm btn-primary" style="text-align:center;width: 200px;" href="https://certificaciones.dmc.pe/suscripcion/inicio_formulario.php"> Iniciar sesión</a> -->



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





  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>







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



























    const phoneInputField = document.querySelector("#telefono");



    const phoneInput = window.intlTelInput(phoneInputField, {



      initialCountry: "auto",



      geoIpLookup: getIp,



      utilsScript:



        "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",



    });



    // ---



    $(document).ready(function() {







      //  $("#texto_inicial").hide();







      $("#exito").hide();



      //  $("#exito").show();





    });







    //registrar



    $(document).on('submit', '#form', function(e) {





      parametros = $(this).serialize();







      $.ajax({



        url: '../suscripcion/controller/controller_formularioLogin.php?op=registroAlumno',



        type: 'POST',



        data: parametros,



        beforeSend: function() {



          $('#button').prop("disabled", true);







        },



        success: function(data) {



          if (data == 1) {



            $("#texto_inicial").hide();



            $("#exito").show();



          } else {



            $(".mensaje").attr("class", "mensaje alert alert-danger").html(data);



            $('#button').prop("disabled", false);



          }





          // alert(data);







        }



      });







      e.preventDefault();



    });

  </script>







</body>



</html>

