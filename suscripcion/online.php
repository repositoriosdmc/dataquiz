<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMC ONLINE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://survey.dmc.pe/suscripcion/assets/css/intlTelInput.min.css">
    <style>

      label.is-invalid {
        display: contents;
        font-size: 12px;
        color: red;
      }

      .iti{
        width:100%;
      }

      .iti .form-control{
        padding-top: 1.625rem;
      }

      .iti + label{
        opacity: .65;
        transform: scale(.85) translateY(-.5rem) translateX(.15rem);
      }

      .iti__flag-container{
        top: 22px;
        left: 7px !important;
      }

      .cell{
        border: 1ps solid transparent;
      }

      .cell:focus{
        outline:none;
      }

      .form-control,.form-control:focus,.form-select{
      	background: #ffffff00;
        border: none;
        border-bottom: 1px solid;
        box-shadow: none;
        color: white;
      }

      .form-floating>label,.form-check-label,a{
      	color: white;
      }

      select option {
        color: black;
      }

      .cont{
      	width: 600px; 
      	padding: 30px 66px; 
      	background: #319ee9bf; 
      	border-radius: 57px; 
      	margin-top: 50px; 
      	margin-left: 90px;
      }

      @media (max-width: 600px) {
       .cont{

       	    width: 100%;
            margin: 0 auto;
            padding: 10px;
            border-radius: 0;
   
       }
}

    </style>
    
  </head>
<body style="background: url(https://survey.dmc.pe/suscripcion/assets/img/contacto-fondo-online.jpg); background-size: cover;">
    <div class="cont">
        <form id="form" name="form" method="post" action="controller/controller_suscripcion_dmc.php">
          <input type="hidden" id="pais" name="pais">
          <input type="hidden" id="celular" name="celular">
          <input type="hidden" id="curso" name="cursos[]" value="465">
          <input type="hidden" id="rdc" name="rdc" value="x">
            <h2 class="text-center mb-3" style="color: white">Contáctanos</h2>
            <div class="row g-2 mb-3">
                <div class="col-md">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" pattern="[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}" required>
                    <label for="nombres" id="nombres-error">Nombres</label> 
                  </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" pattern="[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}" required>
                    <label for="floatingInputGrid">Apellidos</label>
                    </div>
                </div>
            </div>
            <div class="row g-2 mb-3">
                <div class="col-md">
                  <div class="form-floating">
                    <select class="form-select" name="tDocumento" id="tDocumento" required>
                        <option value="DNI">DNI</option>
                        <option value="OTROS">OTROS</option>
                    </select>
                    <label for="floatingInputGrid">Tipo Documento</label>
                  </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                    <input type="text" class="form-control" id="num_documento" name="num_documento" placeholder="Número" required>
                    <label for="floatingInputGrid">Número</label>
                    </div>
                </div>
            </div>
            <div class="row g-2 mb-3">
                <div class="col-md">
                  <div class="form-floating">
                    <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" required>
                    <label for="floatingInputGrid">Email</label>
                  </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                    <input type="text" class="form-control" id="phone" name="phone" required>
                    <label for="floatingInputGrid">Celular</label>
                    </div>
                </div>
            </div>
            <div class="row g-2 mb-3">
                <div class="col-md">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="centro_trabajo" name="centro_trabajo" placeholder="centro_trabajo">
                    <label for="floatingInputGrid">Centro de Trabajo</label>
                  </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                    <input type="text" class="form-control" id="cargo" name="cargo" placeholder="cargo">
                    <label for="floatingInputGrid">Cargo</label>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
              <textarea class="form-control" placeholder="Deja tu comentario aquí..." id="mensaje" name="mensaje" style="height: 100px" required></textarea>
              <label for="floatingTextarea2">Mensaje</label>
            </div>
            <div class="col-12 mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="datos" name="datos" value="1" required>
                  <label class="form-check-label" for="datos">
                    He leído y acepto los <a href="#" data-bs-toggle="modal" data-bs-target="#myModal">términos y condiciones</a>
                  </label>
                </div>
            </div>
            
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Enviar</button>
            </div>

        </form>
    </div>
    <!-- Modal -->
    <? include_once "view/terminos.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://survey.dmc.pe/suscripcion/assets/js/jquery.min.js"></script>
    <script src="https://survey.dmc.pe/suscripcion/assets/js/intlTelInput.min.js"></script>
    <script src="https://survey.dmc.pe/suscripcion/assets/js/utils.js"></script>
    <script src="https://survey.dmc.pe/suscripcion/assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript">

      var input = document.querySelector("#phone");

      function detect_country(){

        var celular = $("#phone").val();

        if(celular){

            var pais = $(".iti__selected-flag").attr("title").split(" ");

            var nombrePais = pais[0].replace(":", "");

            var full_phone = iti.getNumber();

            $('#celular').val(full_phone);

            $('#pais').val(nombrePais);

        }

      }

      iti = window.intlTelInput(input, {
        initialCountry: "auto",
        geoIpLookup: function(callback) {
            $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {

                var countryCode = (resp && resp.country) ? resp.country : "";

                if(countryCode=="PE"){
                    $('#pais').val("Peru");
                    $('#tDocumento').val("DNI");
                }

                callback(countryCode);
            });
        },
      });

      $(document).ready(function(){

        valid = 0;

        $('.close').html("").addClass("btn-close").removeClass("close");

        $('#phone').blur(detect_country).keyup(detect_country).keydown(detect_country);
      	
      	$.validator.addMethod("pattern", function(value, element, param) {

                if (this.optional(element)) {
                  return true;
                }

                if (typeof param === "string") {
                  param = new RegExp("^(?:" + param + ")$");
                }

                return param.test(value);

        }, "Formato inválido");

        $.validator.addMethod("phoneInternational", function(value, element, param) {

          if (iti.isValidNumber()) {

            return true;

          }else{

            return false;

          }

        }, "Formato inválido");

        $('#form').validate({
          ignore: ':hidden', 
          ignoreTitle: true,
          errorClass: 'is-invalid',
          rules:
          {
            'num_documento':
            {
              required:true,
              pattern:/^[0-9]{8}$/,
            },
            'correo':
            {
              required:true,
              pattern: /^\S+@\S+\.\S+$/
            },
            'nombres':
            {
              required:true,
              pattern:/^[A-Za-z\sÃÃ‰ÃÃ“ÃšÃ¡Ã©Ã&shy;Ã³ÃºÃ‘Ã±]{2,}$/
            },
            'phone':
            {
              required:true,
              phoneInternational:true,
            }
          }
        });
      })
    </script>
</body>
</html>