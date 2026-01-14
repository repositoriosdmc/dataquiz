<?php
 $id = $_GET['num'];

?>

<!DOCTYPE html>

<html lang="es" dir="ltr">

<head>

  <meta charset="utf-8">

  <title>Registro</title>


<!-- Meta Pixel Code -->
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
<!-- End Meta Pixel Code -->

  <link rel="icon"  href="../img/1 (5).png" >

  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="https://survey.dmc.pe/suscripcion/css/selectize.default_2.css">







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



  <style media="screen">
    .iti {
      width: 100%;
    }

    /* para el phone */
  </style>

  <!-- Hotjar Tracking Code for Encuestas -->
  <!-- Hotjar Tracking Code for Concurso -->
  <script>
    (function(h, o, t, j, a, r) {
      h.hj = h.hj || function() {
        (h.hj.q = h.hj.q || []).push(arguments)
      };
      h._hjSettings = {
        hjid: 3739493,
        hjsv: 6
      };
      a = o.getElementsByTagName('head')[0];
      r = o.createElement('script');
      r.async = 1;
      r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
      a.appendChild(r);
    })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
  </script>

</head>

<body style="background-image: url('../img/fondo1.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: 100% 100%;">







  <div class="container">

    <div class="row justify-content-md-center">



      <!-- <div class="col-md-8" style="text-align: center;padding: 35px 20px 20px">

             <img  src="../img/logo.png" alt="Responsive image" class="img-responsive" width="60%" >

            </div> -->



      <div class="col-md-8" style="padding: 25px 35px; border: 1px solid #c8c7c7; margin: 15px 0; border-radius: 6px; box-shadow: 0px 1px 5px #dddddd;background: white;">

        <!-- <div style="text-align: center;">

               <img class="h-log2" src="../img/Cabecera-edit.jpg"  width="100%" >





         </div> -->



        <div id="texto_inicial">





          <!--<h3 style="text-align: center; color:#767772">¡Hola, somos DMC!</h3>-->




          <div style="text-align: center;">
            <img src="../img/logo dmc institute-01.png"  style="width: 70%; height: 70%; padding-bottom: 20px;">
          </div>

          <p style="text-align:center;color:#767772">

            <!--Completa el siguiente formulario. Al terminar <br> se te enviará un correo electrónico para activar tu cuenta.-->
            Registra tus datos y activa tu cuenta.
          </p>

























          <hr>

          <br>



          <form name="form" id="form" autocomplete="off">

            <div class="mensaje">

            </div>

            <input type="hidden" name="grupo" value="<?php echo $id; ?>">

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

                He leído y acepto los <a href="#" data-toggle="modal" data-target="#myModal">términos y condiciones</a>

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
<label > <b>¿Ya tienes cuenta?</b> Logueate <a href="https://certificaciones.dmc.pe/suscripcion/inicio_formulario"> Aquí </a> </label>

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

            <!-- Te llegará un correo para <b>activar tu cuenta,</b> una vez activa
            dirígete al botón que está más abajo para iniciar sesión. No olvidar revisar tu bandeja de SPAM. -->
      Puedes iniciar sesión con tus datos de registro.
            <br>

            <br> <a type="button" class="btn btn-sm btn-primary" style="text-align:center;width: 200px;" href="https://certificaciones.dmc.pe/suscripcion/inicio_formulario"> Iniciar sesión</a> 

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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="./assets/js/jquery.min.js"></script>

  <script src="https://certificaciones.dmc.pe/suscripcion/assets/js/popper.min.js"></script>

  <script src="https://certificaciones.dmc.pe/suscripcion/assets/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="https://survey.dmc.pe/suscripcion/assets/js/selectize.min.js"></script>

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

      Swal.fire({
  title: "Revisa tus datos antes de registrar",
  text: "si tus datos son correctos, presiona registrar. ",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Si, registrar"
}).then((result) => {
  if (result.isConfirmed) {



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

            Swal.fire({
      title: "Registrado!",
      text: "Tu registro ha sido exitoso.",
      icon: "success"
    });

          } else {

            $(".mensaje").attr("class", "mensaje alert alert-danger").html(data);

            $('#button').prop("disabled", false);

          }



        }

      });




    }
  });


      e.preventDefault();

    });
  </script>



</body>

</html>