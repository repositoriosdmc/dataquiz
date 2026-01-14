<?

//header("location:https://survey.dmc.pe/suscripcion/mensaje_cierre.php");

$paises = file_get_contents("https://gist.githubusercontent.com/Yizack/bbfce31e0217a3689c8d961a356cb10d/raw/107e0bdf27918adea625410af0d340e8fc1cd5bf/countries.json");
$paises = json_decode($paises, TRUE);



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Semana BI | Capacitaciones gratuitas</title>
  <link rel="icon" href="../img/1 (5).png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://survey.dmc.pe/suscripcion/assets/css/intlTelInput.min.css">
  <style>
    label.is-invalid {
      display: contents;
      font-size: 12px;
      color: red;
    }

    .iti {
      width: 100%;
    }

    .iti .form-control {
      padding-top: 1.625rem;
    }

    .iti+label {
      opacity: .65;
      transform: scale(.85) translateY(-.5rem) translateX(.15rem);
    }

    .iti__flag-container {
      top: 22px;
      left: 7px !important;
    }

    .form-label {
      margin-bottom: 0.5rem;
      font-weight: bold;
      font-size: .9em;
    }





    .cont {
      width: 600px;

    }

    .fondo-nw {
      background: white url(https://survey.dmc.pe/suscripcion/assets/img/particulas.png);
      background-repeat: repeat;
      background-size: contain;
      padding: 25px 35px;
      border: 1px solid #c8c7c7;
      margin: 15px 0;
      border-radius: 6px;
      box-shadow: 0px 1px 5px #dddddd;
      background: white
    }
  </style>

</head>

<body style="background-image: url('../img/fondo1.jpg');background-attachment: fixed;background-repeat: repeat-x; background-size: auto 100%;">
  <div class="container">
    <div class="col-md-10 fondo-nw">
      <a href="https://dmc.pe/" style=" text-align: center; display: block; "> <img src="https://dmc.pe/wp-content/uploads/2021/02/cropped-logotipo.png" alt="" class="" style="width: 100px !important;"> </a>
      Gracias por tu interés en estas capacitaciones. Lamentablemente, el tiempo de registro ha finalizado. Para más novedades, sigue atento(a) a nuestras redes sociales.
    </div>
    <form class="row justify-content-md-center" id="form" name="form" method="post" action="controller/controller_suscrito_curso_gratis.php" style="display:none">
      <div class="col-md-10 fondo-nw">
        <input type="hidden" id="pais" name="pais">
        <input type="hidden" id="celular" name="celular">
        <input type="hidden" id="curso" name="curso" value="<?= $codigo ?>">
        <input type="hidden" id="rdc" name="rdc" value="x">
        <div style=" margin: auto;text-align:center; margin-top:30px">
          <img src="/img/portada-campaña-BI-keyros.jpg" alt="" width="95%">
        </div>

        <div style="margin-top:20px;">


          <p>
            ¡Hola! Somos DMC, y en alianza, la comunidad líder en el Perú vinculada a la analítica de datos. En esta oportunidad nos aliamos con Keyrus, empresa colombiana especializada en el desarrollo de soluciones tecnológicas, para brindarte una serie de capacitaciones asíncronas sin costo alguno enfocadas en la inteligencia de negocios.
          </p>
          <p>
            Solo debes registrarte en este formulario para poder acceder a los cursos de temáticos como Data Storytelling, Tableau Storytelling, Equipos Ágiles BI y Liderazgo de Equipos BI. Recibirás al correo brindado por este medio un enlace para visualizar las capacitaciones. Tienes oportunidad solo hasta el viernes 07 de abril. ¡No te puedes perder esta oportunidad!
          </p>


        </div>



        <div class="row g-2 mb-3">
          <div class="col-md">
            <div class="form-floating">
              <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" pattern="[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}" required autofocus>
              <label for="nombres" id="nombres-error">Nombre</label>
            </div>
          </div>
          <div class="col-md">
            <div class="form-floating">
              <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" pattern="[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}" required>
              <label for="apellidos" id="apellidos-error">Apellidos</label>
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
              <input type="number" class="form-control" id="edad" name="edad" placeholder="Edad" required>
              <label for="floatingInputGrid">¿Me podría indicar su edad? (en años)</label>
            </div>
          </div>
          <div class="col-md">
            <div class="form-floating">

              <select class="form-select" id="pais" name="pais" required aria-label="Floating label select example">
                <option selected>Seleccionar</option>
                <option value="Perú">Perú</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Colombia">Colombia</option>
                <option value="Ecuador">Ecuador</option>
                <?php
                $omitir = array("Perú", "Bolivia", "Colombia", "Ecuador");
                for ($i = 0; $i < count($paises["countries"]); $i++) {
                  $pais = $paises["countries"][$i]["name_es"];
                  if (!in_array($pais, $omitir)) { ?>
                    <option value="<?= $pais ?>"><?= $pais ?></option>
                <?php }
                }
                ?>
              </select>
              <label for="floatingInputGrid">¿Cuál es su país de residencia?</label>
            </div>
          </div>


        </div>
        <div class="row g-2 mb-3">
          <div class="col-md">
            <label for="floatingInputGrid" class="form-label">¿Se encuentra laborando actualmente?</label>
            <select class="form-select" name="estado_laboral" id="estado_laboral" required>
              <option value="">Seleccione</option>
              <option value="Sí">Sí</option>
              <option value="No">No</option>
            </select>
          </div>
        </div>

        <div class="row g-2 mb-3">
          <div class="col-md">
            <div class="">
              <label for="nombres" class="form-label" id="empresa-error">Empresa (si no se encuentra laborando actualmente, considerar último trabajo).</label>
              <input type="text" class="form-control" id="empresa" name="empresa" placeholder="Nombre de empresa" pattern="[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}" required>

            </div>
          </div>
        </div>
        <div class="row g-2 mb-3">
          <div class="col-md">
            <div class="">
              <label for="apellidos" class="form-label" id="cargo-error">Cargo (si no se encuentra laborando actualmente, considerar último trabajo).</label>
              <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Nombre del cargo" pattern="[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}" required>

            </div>
          </div>
        </div>

        <div class="row g-2 mb-3">
          <div class="col-md">
            <div class="form-floating">
              <input type="email" class="form-control" id="correo_corporativo" name="correo_corporativo" placeholder="correo corporativo" required autofocus>
              <label for="correo_corporativo" id="correo_corporativo-error">Correo corporativo</label>
            </div>
          </div>
        </div>

        <div class="row g-2 mb-3">
          <div class="col-md">
            <label for="floatingInputGrid" class="form-label">Indique la carrera que corresponde a su formación de pregrado.</label>
            <select class="form-select" name="carrera" id="carrera" required>
              <option value="">Seleccione</option>
              <option value="Estadística / Ing. Estadística">Estadística / Ing. Estadística</option>
              <option value="Ing. de Sistemas / Ing. Industrial">Ing. de Sistemas / Ing. Industrial</option>
              <option value="Ing. Económica / Economía">Ing. Económica / Economía</option>
              <option value="Administración de Empresas">Administración de Empresas</option>
              <option value="Marketing">Marketing</option>
              <option value="Otro">Otro</option>
            </select>
            <input type="text" class="form-control" id="carrera_otro" name="carrera_otro" placeholder="¿Cuál?" style="margin-top: 10px;display: none;">
          </div>
        </div>


        <div class="row g-2 mb-3">
          <div class="col-md">
            <label for="floatingInputGrid" class="form-label">¿En que qué sector trabaja actualmente? Si no se encuentra trabajando actualmente, considerar las labores del último trabajo</label>
            <select class="form-select" name="sector" id="sector" required>
              <option value="">Seleccione</option>
              <option value="Consultoría">Consultoría</option>
              <option value="Telecomunicaciones">Telecomunicaciones</option>
              <option value="Banca">Banca</option>
              <option value="Retail">Retail</option>
              <option value="Minería">Minería</option>
              <option value="Industria">Industria</option>
              <option value="Seguros">Seguros</option>
              <option value="Retail">Retail</option>
              <option value="Tecnologías de Información">Tecnologías de Información</option>
              <option value="Otro">Otro(Especificar)</option>
            </select>
            <input type="text" class="form-control" id="sector_otro" name="sector_otro" placeholder="¿Cuál?" style="margin-top: 10px;display: none;">
          </div>
        </div>

        <div class="row g-2 mb-3">
          <div class="col-md">
            <label for="floatingInputGrid" class="form-label">¿Qué cantidad de personas tiene la empresa donde labora actualmente? Si no se encuentra trabajando actualmente, considerar las labores del último trabajo</label>
            <select class="form-select  " name="cantidad_persona" id="cantidad_persona" required>
              <option value="">Seleccione</option>
              <option value="Menos o igual a 10">Menos o igual a 10</option>
              <option value="De 11 a 50">De 11 a 50</option>
              <option value="De 51 a 100">De 51 a 100</option>
              <option value="De 101 a 1,000">De 101 a 1,000</option>
              <option value="Más de 1,000">Más de 1,000</option>
              <option value="No Precisa">No Precisa</option>
            </select>
          </div>
        </div>



        <div class="col-12 mb-3">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="datos" name="datos" value="1" required>
            <label class="form-check-label" for="datos">
              He leído y acepto los <a href="#" data-bs-toggle="modal" data-bs-target="#myModal">términos y
                condiciones</a>
            </label>
          </div>
        </div>

        <div class="d-grid gap-2" style=" margin-top: 25px; margin-bottom: 25px; ">
          <button class="btn btn-primary" type="submit" id="button">Enviar</button>
        </div>
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

    function detect_country() {

      var celular = $("#phone").val();

      if (celular) {

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

          if (countryCode == "PE") {
            $('#pais').val("Peru");
            $('#tDocumento').val("DNI");
          }

          callback(countryCode);
        });
      },
    });

    $(document).ready(function() {

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

        } else {

          return false;

        }

      }, "Formato inválido");

      function otro_caption(e) {

        var id = $(this);

        var valor = id.val();

        var tipo = id.attr("type");

        var input_otro = $('#' + id.attr("id") + "_otro");

        var bool_ = id.prop("checked");

        console.log(valor);

        if ((tipo != "checkbox" && valor == "Otro") || (tipo == "checkbox" && bool_ == true)) {

          input_otro.attr("required", "required");
          input_otro.show();
          input_otro.focus();

        } else {

          input_otro.removeAttr("required");
          input_otro.val('');
          input_otro.hide();

        }

        console.log(id.attr("id"));

      }

      $('#institucion_p3').change(function() {

        var valor = $(this).val();

        var label = $("#institucion_p3 :selected").text();

        if (valor != 98) {

          var text = "¿Por qué considera que la institución " + label + " es la mejor?"

          $('#nom_p4').text(text);

          $('#p4').focus();

        }

      });

      $('#p1_9').change(function() {

        var valor = $(this).val();

        if (valor != "4") {

          $('#sector,#cantidad_persona,#cargo').removeAttr("disabled");

        } else {

          $('#sector,#cantidad_persona,#cargo').attr("disabled", "disabled");

        }

      });

      $('#institucion_p3_otro').blur(function() {

        var valor = $(this).val();

        var text = "¿Por qué considera que la institución " + valor + " es la mejor?"

        $('#nom_p4').text(text);

        $('#p4').focus();

      })

      $('#ninguna').change(function() {

        var check = $(this).prop("checked");

        if (check == true) {

          $('.require-one').attr("disabled", "disabled");

        } else {

          $('.require-one').removeAttr("disabled");

        }

      });

      // Agregar la regla personalizada a jQuery Validate
      $.validator.addMethod("notEqualTo", function(value, element, param) {
        return this.optional(element) || value !== $(param).val();
      }, "El campo repite el valor");





      $('#sector,#carrera').change(otro_caption);

      $('#form').validate({
        ignore: ':hidden',
        ignoreTitle: true,
        errorClass: 'is-invalid',
        rules: {
          'num_documento': {
            required: true,
            pattern: /^[0-9]{8}$/,
          },
          'correo': {
            required: true,
            pattern: /^\S+@\S+\.\S+$/
          },
          'nombres': {
            required: true,
            pattern: /^[A-Za-z\sÃÃ‰ÃÃ“ÃšÃ¡Ã©Ã&shy;Ã³ÃºÃ‘Ã±]{2,}$/
          },
          'phone': {
            required: true,
            phoneInternational: true,
          },
          'correo_corporativo': {
            required: true,
            notEqualTo: "#correo"
          },
        },
      });

      function jquery_validation_focus() {

        validator = $("#form").validate({
          invalidHandler: function() {
            return validator.numberOfInvalids()
          }
        });

        console.log(validator.errorList);
      }


      $("form").submit(function() {

        jquery_validation_focus();

        if ($("#form").valid() === true) {

          var btn = $('#button');
          btn.attr("disabled", "disabled");
          btn.text("Enviando...");

        }

      });
    })
  </script>
  <script>
    (function(h, o, t, j, a, r) {
      h.hj = h.hj || function() {
        (h.hj.q = h.hj.q || []).push(arguments)
      };
      h._hjSettings = {
        hjid: 1904810,
        hjsv: 6
      };
      a = o.getElementsByTagName('head')[0];
      r = o.createElement('script');
      r.async = 1;
      r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
      a.appendChild(r);
    })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
  </script>
</body>

</html>