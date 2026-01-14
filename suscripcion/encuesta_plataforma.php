<?

$paises = file_get_contents("https://restcountries.eu/rest/v2/all?fields=name");  
$paises = json_decode($paises,TRUE);  

?>
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





    .cont {
      width: 600px;

    }
  </style>

</head>

<body style="background: #005078;">
  <div class="container">
    <form class="row justify-content-md-center" id="form" name="form" method="post" action="controller/controller_suscrito_plataforma.php">
      <div class="col-md-8" style="margin-bottom:25px;background: white url(https://survey.dmc.pe/suscripcion/assets/img/particulas.png); background-repeat: repeat; background-size: contain;">
        <input type="hidden" id="celular" name="celular">
        <input type="hidden" id="curso" name="curso" value="465">
        <input type="hidden" id="rdc" name="rdc" value="x">
        <div style="width: 20%; margin: auto;">
          <img src="https://dmc.pe/uploads/logo2-dmc-2019.png" alt="" style="text-align: center; width: 180px; margin: 0; margin-top: 15px;margin-bottom: 15px;">
        </div>
        <div>
          <p style="text-align: center;"><b>Registro - Nueva Plataforma Virtual DMC</b></p>
          <p>
            ¡Hola! Somos DMC, la comunidad líder en el Perú vinculada a la analítica de datos. Te invitamos a participar en la prueba gratuita de nuestra nueva Plataforma Virtual, el cual es un espacio para tu aprendizaje en Ciencia de Datos y Analítica, 100% online y con acceso 24/7 los 365 días del año.
          </p>
          <p>
            <b>¿Qué beneficios obtendrás?:</b>
          <ul>
            <li>Aprenderás a tu ritmo, con acceso 24/7.</li>
            <li>+500 horas de contenido didáctico.</li>
            <li>8 Categorías: Herramientas Cloud, Visualización de datos, Inteligencia artificial, Machine learning, Base de datos, Análisis de datos, Transformación digital, Analítica avanzada en la industria.</li>
            <li>Expertos en Ciencia de Datos, nacionales e internacionales.</li>
            <li>Certificado y Constancia digital.</li>
            <li>Material práctico (ppt, lecturas, videotutoriales, libros, ejercicios, base de datos, scripts).</li>
            </li>Formar parte de la Comunidad DMC.</li>
          </ul>
          </p>
          <p>
            Podrás acceder a la Plataforma Virtual DMC desde el <b>lunes 15/marzo hasta el domingo 28/marzo.</b> Luego de registrarte recibirás un correo de confirmación con el acceso a la Plataforma. Recuerda que las vacantes son limitadas.
          </p>
          <p>
            ¡Disfruta tu aprendizaje! #ilovedata
          </p>
        </div>


        <div class="row g-2 mb-3">
          <div class="col-md">
            <div class="form-floating">
              <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" pattern="[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}" autofocus required>
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
              <select class="form-select" name="sexo" id="sexo" required>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
              </select>
              <label for="floatingInputGrid">Sexo</label>
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
              <input type="date" class="form-control" id="fec_nac" name="fec_nac" placeholder="FechaNacimiento" required>
              <label for="floatingInputGrid">Fecha de nacimiento</label>
            </div>
          </div>
          <div class="col-md">
            <div class="form-floating">
              <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" required>
              <label for="floatingInputGrid">Email</label>
            </div>
          </div>

        </div>
        <div class="row g-2 mb-3">
          <div class="col-md">
            <div class="form-floating">

              <select class="form-select" id="pais" name="pais" required>
                <option value="">Seleccionar</option>
                <? foreach($paises as $value => $pais){ ?>
                <option value='<?= $pais["name"] == "Peru" ? "Perú" : $pais["name"] ?>'><?= $pais["name"] == "Peru" ? "Perú" : $pais["name"] ?></option>
                <? } ?>
              </select>
              <label for="floatingInputGrid">¿Cuál es su país de residencia?</label>
            </div>
          </div>
          <div class="col-md">
            <div class="form-floating">
              <input type="text" class="form-control" id="provincia" name="provincia" placeholder="cargo" required>
              <label for="floatingInputGrid">¿En qué ciudad vive actualmente?</label>
            </div>
          </div>
        </div>
        <div class="row g-2 mb-3">

          <div class="col-md">
            <label for="floatingInputGrid" class="form-label">¿Cuál de las siguientes frases describe mejor su ocupación actual?</label>

            <select class="form-select" name="p1_1" id="p1_1" required>
              <option value="">Seleccione</option>
              <option value="1">Trabajo en una empresa</option>
              <option value="2">Tengo un negocio propio</option>
              <option value="3">Estudio y tengo una empresa</option>
              <option value="4">Estudio y tengo un negocio propio</option>
              <option value="5">Solo estudio</option>
            </select>


          </div>
        </div>
        <div class="row g-2 mb-3">
          <div class="col-md">
            <label for="floatingInputGrid" class="form-label">¿En que qué sector trabaja actualmente? Si no se encuentra trabajando, considerar las labores del último trabajo</label>
            <select class="form-select" name="sector" id="sector" required>
              <option value="">Seleccione</option>
              <option value="1">Consultoría</option>
              <option value="2">Telecomunicaciones</option>
              <option value="3">Banca</option>
              <option value="4">Retail</option>
              <option value="5">Minería</option>
              <option value="6">Industria</option>
              <option value="7">Seguros</option>
              <option value="8">Retail</option>
              <option value="9">Tecnologías de Información</option>
              <option value="98">Otro(Especificar)</option>
            </select>
            <input type="text" class="form-control" id="sector_otro" name="sector_otro" placeholder="¿Cuál?" style="margin-top: 10px;display: none;">
          </div>
        </div>

        <div class="row g-2 mb-3">
          <div class="col-md">
            <label for="floatingInputGrid" class="form-label">¿Qué cargo tiene actualmente? Si no se encuentra trabajando, considerar las labores del último trabajo</label>

            <select class="form-select  " name="cargo" id="cargo" required>
              <option value="">Seleccione</option>
              <option value="1">Practicante Preprofesional</option>
              <option value="2">Practicante Profesional</option>
              <option value="3">Asistente / Ejecutivo Jr</option>
              <option value="4">Analista / Ejecutivo Sr</option>
              <option value="5">Jefe / Coordinador</option>
              <option value="6">Gerente de área / Sub Gerente</option>
              <option value="7">Director / VP</option>
              <option value="8">Gerente general / Dueño empresa</option>
              <option value="98 ">Otro (Especificar):</option>
            </select>
            <input type="text" class="form-control" id="cargo_otro" name="cargo_otro" placeholder="¿Cuál?" style="margin-top: 10px;display: none;">
          </div>
        </div>
        <div class="row g-2 mb-3">
          <div class="col-md">´
            <label for="floatingInputGrid" class="form-label">¿Cuál es la modalidad que prefiere para capacitarse?</label>
            <select class="form-select " name="modalidad" id="modalidad" required>
              <option value="">Seleccione</option>
              <option value="1">Presencial</option>
              <option value="2">Online – Clases en vivo</option>
              <option value="3">Online – Blended (Vivo + Grabado)</option>
              <option value="4">Online – Clases grabadas</option>
              <option value="98">Otro</option>
            </select>
            <input type="text" class="form-control" id="modalidad_otro" name="modalidad_otro" placeholder="¿Cuál?" style="margin-top: 10px;display: none;">

          </div>
        </div>

        <div class="row g-2 mb-3">
          <div>En base a la pregunta anterior. Indique las razones de la selección de la modalidad preferida:</div>
          <div class="col-md">
            <div class="form-check">
              <input class="form-check-input require-three" type="checkbox" value="1" id="precio" name="precio">
              <label class="form-check-label" for="precio">
                Precio
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input require-three" type="checkbox" value="1" id="iteraccion_docente" name="iteraccion_docente">
              <label class="form-check-label" for="iteraccion_docente">
                Interacción con el docente
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input require-three" type="checkbox" value="1" id="iteraccion_companeros" name="iteraccion_companeros">
              <label class="form-check-label" for="iteraccion_companeros">
                Interacción con los compañeros
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input require-three" type="checkbox" value="1" id="libertad_horario" name="libertad_horario">
              <label class="form-check-label" for="libertad_horario">
                Libertad de horario
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input require-three" type="checkbox" value="1" id="asistencia_academica" name="asistencia_academica">
              <label class="form-check-label" for="asistencia_academica">
                Asistencia académica
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input require-three" type="checkbox" value="1" id="cantidad_horas" name="cantidad_horas">
              <label class="form-check-label" for="cantidad_horas">
                Cantidad de horas del curso
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input require-three" type="checkbox" value="1" id="p2_otro" name="p2_otro">
              <label class="form-check-label" for="p2_otro">
                Otro
              </label>
              <input type="text" class="form-control" id="p2_otro_otro" name="p2_otro_otro" placeholder="¿Cuál?" style="margin-top: 10px;display: none;">
            </div>
          </div>
        </div>



        <div class="row g-2 mb-3">
          <div>¿Cuál(es) de las siguientes plataformas virtuales utiliza o ha utilizado?</div>
          <div class="col-md">
            <div class="form-check">
              <input class="form-check-input require-three" type="checkbox" value="1" id="coursera" name="coursera">
              <label class="form-check-label" for="coursera">
                Coursera
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input require-three" type="checkbox" value="1" id="platzi" name="platzi">
              <label class="form-check-label" for="platzi">
                Platzi
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input require-three" type="checkbox" value="1" id="netzum" name="netzum">
              <label class="form-check-label" for="netzum">
                Netzum
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input require-three" type="checkbox" value="1" id="edx" name="edx">
              <label class="form-check-label" for="edx">
                edX
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input require-three" type="checkbox" value="1" id="datacamp" name="datacamp">
              <label class="form-check-label" for="datacamp">
                Datacamp
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input require-three" type="checkbox" value="1" id="codeacademy" name="codeacademy">
              <label class="form-check-label" for="codeacademy">
                Codeacademy
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input require-three" type="checkbox" value="1" id="ninguna" name="ninguna">
              <label class="form-check-label" for="ninguna">
                Ninguna
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input require-three" type="checkbox" value="1" id="p3_otro" name="p3_otro">
              <label class="form-check-label" for="p3_otro">
                Otro
              </label>
              <input type="text" class="form-control" id="p3_otro_otro" name="p3_otro_otro" placeholder="¿Cuál?" style="margin-top: 10px;display: none;">
            </div>
          </div>

        </div>
        <div class="col-md">
          <div class="form-floating">
            <input type="text" class="form-control" id="p4" name="p4" placeholder="Apellidos" required>
            <label for="p4" id="p4-error">Si ha seleccionado alguna plataforma virtual, indique las razones del uso o preferencia de dicha(s) plataforma(s):</label>
          </div>
        </div>
        <div class="row g-2 mb-3">
          <div class="col-md">´
            <label for="floatingInputGrid" class="form-label">¿Qué tipo de capacitaciones ha tenido en análisis de datos?</label>
            <select class="form-select " name="tipo_capacitacion" id="tipo_capacitacion" required>
              <option value="">Seleccione</option>
              <option value="1">Gratuitas</option>
              <option value="2">Pagadas</option>
              <option value="3">Ambas</option>
              <option value="4">Ninguna</option>
            </select>
          </div>
        </div>
        <div class="row g-2 mb-3">
          <div> ¿Qué beneficios le gustaría recibir? </div>
          <div class="col-md">
            <div class="form-check">
              <input class="form-check-input require-three" type="checkbox" value="1" id="constancia_digital" name="constancia_digital">
              <label class="form-check-label" for="constancia_digital">
                Constancia digital
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input require-three" type="checkbox" value="1" id="asesoria_docente" name="asesoria_docente">
              <label class="form-check-label" for="asesoria_docente">
                Asesoría del docente
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input require-three" type="checkbox" value="1" id="variedad_cursos" name="variedad_cursos">
              <label class="form-check-label" for="variedad_cursos">
                Variedad de cursos
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input require-three" type="checkbox" value="1" id="ruta_aprendizaje" name="ruta_aprendizaje">
              <label class="form-check-label" for="ruta_aprendizaje">
                Rutas de aprendizaje
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input require-three" type="checkbox" value="1" id="comunidad" name="comunidad">
              <label class="form-check-label" for="comunidad">
                Formar parte de la Comunidad DMC
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input require-three" type="checkbox" value="1" id="promociones" name="promociones">
              <label class="form-check-label" for="promociones">
                Promociones de cursos
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input require-three" type="checkbox" value="1" id="p6_otro" name="p6_otro">
              <label class="form-check-label" for="p6_otro">
                Otro
              </label>
              <input type="text" class="form-control" id="p6_otro_otro" name="p6_otro_otro" placeholder="¿Cuál?" style="margin-top: 10px;display: none;">
            </div>
          </div>

        </div>

        <div class="row g-2 mb-3">
          <div>¿Qué tipo de cursos estaría interesado en aprender para mejorar su perfil profesional?</div>
          <div class="col-md">
            <div class="form-check">
              <input class="form-check-input require-three" type="checkbox" value="1" id="base_datos" name="base_datos">
              <label class="form-check-label" for="base_datos">
                Base de datos
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input require-three" type="checkbox" value="1" id="visualizacion_datos" name="visualizacion_datos">
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
          </div>
          <div class="col-md">
            <div class="form-check">
              <input class="form-check-input require-three" type="checkbox" value="1" id="inteligencia_artificial" name="inteligencia_artificial">
              <label class="form-check-label" for="inteligencia_artificial">
                Inteligencia Artificial
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input require-three" type="checkbox" value="1" id="metodologia_agil" name="metodologia_agil">
              <label class="form-check-label" for="metodologia_agil">
                Metodologías ágiles
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input require-three" type="checkbox" value="1" id="habilidades_blandas" name="habilidades_blandas">
              <label class="form-check-label" for="habilidades_blandas">
                Habilidades Blandas
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input require-three" type="checkbox" value="1" id="p7_otro" name="p7_otro">
              <label class="form-check-label" for="p7_otro">
                Otro
              </label>
              <input type="text" class="form-control" id="p7_otro_otro" name="p7_otro_otro" placeholder="¿Cuál?" style="margin-top: 10px;display: none;">
            </div>
          </div>

        </div>

        <div class="col-12 mb-3">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="datos_2" name="datos_2" value="1" required>
            <label class="form-check-label" for="datos_2">
              Acepto que DMC utilice mis datos para temas analíticos
            </label>
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

        <div class="d-grid gap-2" style="margin-bottom:30px">
          <button class="btn btn-primary" type="submit">Enviar</button>
        </div>
      </div>
    </form>
  </div>
  <!-- Modal -->
  <? include_once "view/terminos.php"; ?>
  <!-- Matomo -->
  <script type="text/javascript">
    var _paq = window._paq = window._paq || [];
    /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
      var u = "//www.peruanalitica.com/analytics/";
      _paq.push(['setTrackerUrl', u + 'matomo.php']);
      _paq.push(['setSiteId', '6']);
      var d = document,
        g = d.createElement('script'),
        s = d.getElementsByTagName('script')[0];
      g.type = 'text/javascript';
      g.async = true;
      g.src = u + 'matomo.js';
      s.parentNode.insertBefore(g, s);
    })();
  </script>
  <!-- End Matomo Code -->
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

      $('#pais').change(function() {

        var valor = $(this).val();

        if (valor == "Perú") {

          $('#num_documento').attr("pattern", "[0-9]{8}");

        } else {

          $('#num_documento').removeAttr("pattern");

        }
      })

      function otro_caption(e) {

        var id = $(this);

        var valor = id.val();

        var tipo = id.attr("type");

        var input_otro = $('#' + id.attr("id") + "_otro");

        var bool_ = id.prop("checked");

        console.log(valor);

        if ((tipo != "checkbox" && valor == 98) || (tipo == "checkbox" && bool_ == true)) {

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

          $(this).removeAttr("disabled");

        } else {

          $('.require-one').removeAttr("disabled");

        }

      });

      $('#ninguna_p2').change(function() {

        var check = $(this).prop("checked");

        if (check == true) {

          $('.require-two').attr("disabled", "disabled");

          $(this).removeAttr("disabled");

        } else {

          $('.require-two').removeAttr("disabled");

        }

      });

      $('#p7_ninguna').change(function() {

        var check = $(this).prop("checked");

        if (check == true) {

          $('.require-three').attr("disabled", "disabled");

          $(this).removeAttr("disabled");

        } else {

          $('.require-three').removeAttr("disabled");

        }

      });

      $('#p1_1').change(function() {

        var valor = $(this).val();

        if (valor == 5) {
          $('#sector,#sector_otro,#cargo,#cargo_otro').attr("disabled", "disabled");
          $('#modalidad').focus();

        } else {
          $('#sector,#sector_otro,#cargo,#cargo_otro').removeAttr("disabled");
        }
      })







      $('#sector,#cargo,#institucion_p3,#modalidad  ,#otro_institucion,#otro_institucion_p2,#p7_otro,#p2_otro,#p3_otro,#p6_otro').change(otro_caption);

      $('#form').validate({
        ignore: ':hidden',
        ignoreTitle: true,
        errorClass: 'is-invalid',
        rules: {
          'num_documento': {
            required: true,
            /*pattern: /^[0-9]{8}$/,*/
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
          'cibertec': {
            required: {
              depends: function(element) {
                return $('.require-one:checked').length == 0;
              }
            }
          },
          'cibertec_p2': {
            required: {
              depends: function(element) {
                return $('.require-two:checked').length == 0;
              }
            }
          },
          'base_datos': {
            required: {
              depends: function(element) {
                return $('.require-three:checked').length == 0;
              }
            }
          }
        },
      });
    })
  </script>
</body>

</html>