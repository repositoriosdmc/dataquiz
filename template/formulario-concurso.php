<?php

// https://www.shanidkv.com/blog/font-awesome-icons-css-content-values


/*error_reporting(E_ALL);
ini_set('display_errors', '1');*/
session_start();

if (!isset($_SESSION[ID])) {

  header('location: ../suscripcion/inicio_formulario.php');

}

unset($_SESSION['nivel']);
unset($_SESSION['preguntasCorrectas']);
unset($_SESSION['preguntasIncorrectas']);

require_once "../suscripcion/dao/dao_formularioLogin.php";

include "header.php";

include 'nav.php';


$valorDecodificado = base64_decode($_GET['cap']); //capa Id

$nombreCap = base64_decode($_GET['nom']);

$ti = base64_decode($_GET['va']);

$dao_formularioLogin = new dao_formularioLogin();

$datos["capacitacion"] = $valorDecodificado;

$datos["preguntas"] = null;

$datos["nivel"] = 1;

$pregunta = $dao_formularioLogin->consultaConcursoPreguntas($datos);

if (!empty($pregunta)) {
  $_SESSION["capacitacion"] = $valorDecodificado;
}
?>

<div class="alert " role="alert" style="background-image: url('../../img/Fondo de evaluación.jpg');  background-repeat: no-repeat; background-size: 100% 100%; ">

  <br> <img src="https://certificaciones.dmc.pe/img/logo_encuesta.png" style=" float: right; " width="140px">

  <div class="row">

    <div class="col-md-1"></div>

    <div class="col-md-10">

      <h4 style="color:white; "><?=utf8_encode($nombreCap); ?></h4>

    </div>

  </div>

  <br><br>

</div>

<hr>

<br>


<form id="form" name="form" method="POST" action="../suscripcion/controller/controller_formularioLogin.php?op=GuardarCLiv" autocomplete="off">

  <input type="hidden" id="encuestaId" name="encuestaId" value="<?= $valorDecodificado ?>">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-8">

      <p style="font-family: Helvetica, Arial, sans-serif; color:#8E93A3">Tienes <span class="tiempo_estimado"></span> 15 segundos por pregunta para resolver este examen que consta de <span class="nro_preguntas"></span> preguntas aleatorias. <br> Revisa detenidamente antes de enviar tus respuestas. </p>
      <div id="contador" style="color: #5cc0e9; margin-bottom: 12px; font-size: .9em;"></div>
    </div>
    <input type="hidden" name="nivel" id="nivel" value="1">
  </div>

  <div class="row">

    <div class="col-md-1"></div>
    <!-- Cuerpo de Preguntas-->
    <div class="form-group div_preguntas col-md-11" id="baseConcurso">
      <div class="encuesta-ct">
        <input type="hidden" name="preguntaId[]" value="<?= $pregunta['id_pregunta'] ?>">
        <div class="pregunta-concurso">
          <label class="pay no-select" style="font-family: Helvetica, Arial, sans-serif;color: #8E93A3;">
            <?= $pregunta["pregunta"] ?>
          </label>
          <? foreach (json_decode($pregunta["opciones"], true) as $key => $opc) : ?>
            <div style="font-family: Helvetica, Arial, sans-serif; color:#8E93A3" class="custom-control custom-radio">
              <input type="radio" id="radio-1-<?= $key ?>" name="respuesta_1" value="<?= $opc['opcion'] . "§" . $opc['numero'] ?>" class="custom-control-input">
              <label class="custom-control-label" for="radio-1-<?= $key ?>"><?= $opc['opcion'] ?></label>
            </div>
          <? endforeach; ?>
        </div>
      </div>

    </div>
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <div id="notificacion"></div>
      <button type="button" class="btn btn-primary btn-envia" id="butonSiguiente" onclick="listaPreguntaConcurso()">Siguiente Pregunta</button>
    </div>

  </div>

  <hr>

  <div class="row">

    <div class="col-md-12" id="divButton" style="text-align:center">

      <button type="submit" class="btn btn-primary btn-envia" style="width: 300px;" id="button">Enviar</button>

    </div>
  </div>

  <br>

</form>



<script type="text/javascript">
  // Obtén una referencia al botón de submit
  var submitButton = document.getElementById("button");

  var nextButton = document.getElementById("butonSiguiente");

  // Desactiva el botón
  submitButton.disabled = true;

  var duracionInicial = 15;

  // Definir la duración del contador en segundos
  var duracion = duracionInicial;

  // Obtener el elemento del contador
  var contadorElemento = document.getElementById("contador");

  // Función para actualizar el contador
  function actualizarContador(num = null) {
    contadorElemento.innerHTML = "Tiempo restante: " + duracion + " segundos";

    // Si el contador llega a cero, detenerlo
    if (duracion === 0) {
      clearInterval(intervalo);
      contadorElemento.innerHTML = "¡Contador finalizado!";

      if (num < 10) {
        nextButton.click();
      } else if (num == 10 && duracion === 0) {
        submitButton.click();
      }

    }



    // Restar 1 segundo de la duración
    duracion--;
  }

  // Llamar a la función inicialmente para mostrar el valor inicial
  actualizarContador();

  // Actualizar el contador cada segundo
  var intervalo = setInterval(actualizarContador, 1000);

  function getRespuesta() {
    var elementosEncuesta = document.querySelectorAll(".encuesta-ct");
    var ultimoElementoEncuesta = elementosEncuesta[elementosEncuesta.length - 1];

    var radiosPregunta = ultimoElementoEncuesta.querySelectorAll('input[type="radio"]');
    var ultimoRadioSeleccionado = null;

    radiosPregunta.forEach(function(radio) {
      if (radio.checked) {
        ultimoRadioSeleccionado = radio.value;
      }
    });

    return ultimoRadioSeleccionado;

  }

  function listaPreguntaConcurso() {

    var capacitacion = $('#encuestaId').val();

    var preguntasId = [];

    var valor = getRespuesta();

    $('[name="preguntaId[]"]').each(function() {
      preguntasId.push($(this).val());
    });

    var numero = (preguntasId.length) + 1

    $.ajax({

      url: '../suscripcion/controller/controller_formularioLogin.php?op=consultaPreguntaConcurso',

      type: 'POST',

      data: {
        "capacitacion": capacitacion,
        "preguntas[]": preguntasId,
        'respuesta': valor,
      },

      dataType: 'JSON',

      beforeSend: function() {

        nextButton.textContent = "Cargando...";
        nextButton.disabled = true;

      },

      success: function(data) {


        var contador = 0;

        var datos = data.datos;

        if (datos.opciones) {

          var originalDiv = document.querySelector('.encuesta-ct');

          if (originalDiv) {

            // Clona el elemento
            var clonedDiv = originalDiv.cloneNode(true);

            clonedDiv.removeAttribute("style")

            // Cambia el texto de la clase "pay no-select"
            clonedDiv.querySelector('.pay').textContent = datos.pregunta;

            //
            //clonedDiv.querySelectorAll('input[type="radio"]').value = datos.id_pregunta;
            clonedDiv.querySelector('input[type="hidden"]').value = datos.id_pregunta;

            // Obtén la lista de radioInputs del elemento clonado
            var customRadioDivs = clonedDiv.querySelectorAll('.custom-radio');

            // Elimina los radioInputs existentes
            customRadioDivs.forEach(function(div) {
              div.remove();
            });

            var opciones = JSON.parse(datos.opciones);

            if (opciones) {

              opciones.forEach(function(valor, index) {
                var nuevoInput = document.createElement("input");
                nuevoInput.classList.add("custom-control-input");
                nuevoInput.type = "radio";
                nuevoInput.value = valor.opcion + "§" + valor.numero;
                nuevoInput.id = "radio-" + numero + "-" + index;
                nuevoInput.name = "respuesta_" + numero;

                var nuevoLabel = document.createElement("label");
                nuevoLabel.classList.add("custom-control-label");
                nuevoLabel.textContent = valor.opcion;
                nuevoLabel.setAttribute("for", "radio-" + numero + "-" + index);

                var nuevoDiv = document.createElement("div");
                nuevoDiv.classList.add("custom-control", "custom-radio");
                nuevoDiv.style.fontFamily = "Helvetica, Arial, sans-serif";
                nuevoDiv.style.color = "#8E93A3";
                nuevoDiv.appendChild(nuevoInput);
                nuevoDiv.appendChild(nuevoLabel);

                // Obtén todos los elementos con la clase "encuesta-ct"
                // Ocultar la sección original
                var ultimoElemento = document.querySelector(".encuesta-ct:last-child");
                ultimoElemento.style.display = "none"

                clonedDiv.appendChild(nuevoDiv);
              });

            }
          }

        } //Termina la siguiente pregunta 

        var nivel = document.getElementById("nivel");
        var notificacion = document.getElementById("notificacion");

        // Modifica el texto del elemento
        nivel.value = data.nivel;

        /*var estado =  data.estado

        var estadoRespuesta = null;

        if (estado ==1 ){

          estadoRespuesta = "Correcto"

        }else if(estado ==0){

          estadoRespuesta = "Incorrecto"

        }


        notificacion.textContent = estadoRespuesta;*/

        $(".div_preguntas").append(clonedDiv);

        nextButton.textContent = "Siguiente Pregunta";
        nextButton.disabled = false;

        //Reiniciar el contador
        clearInterval(intervalo);
        // Reiniciar la duración al valor inicial
        duracion = duracionInicial;

        // Llamar a la función inicialmente para mostrar el valor inicial
        actualizarContador();

        // Iniciar un nuevo intervalo
        intervalo = setInterval(function() {
          actualizarContador(numero);
        }, 1000);

        if (numero == 10) {
          nextButton.style.display = "none";
          submitButton.disabled = false;
        }

      }




    });

  }
</script>

<?php include "footer.php"; ?>