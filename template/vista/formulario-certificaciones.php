<?php

session_start();
header('Content-Type: text/html; charset=utf-8');
//capa Id

if (!isset($_SESSION['ID'])) {

  header('location: ../../suscripcion/inicio_formulario.php');
  return;
}

$valorDecodificado = base64_decode($_GET['cap']);

require_once "../../suscripcion/dao/dao_formularioLogin.php";

$dao_formularioLogin = new dao_formularioLogin();


$resultado = $dao_formularioLogin->consultaEstado($valorDecodificado, $_SESSION['ID']);
if ($resultado["intentos"] >= 2) { //cambiar a 2

  header('location: ../../suscripcion/inicio_formulario.php');
  return;
}
unset($_SESSION['nivel']);
unset($_SESSION['preguntasCorrectas']);
unset($_SESSION['preguntasIncorrectas']);

//si no existe en permisos se crea, de lo contrario edita la fecha_inicio del examen
date_default_timezone_set('America/Lima');

  if (!$resultado["intentos"]) { 
    $dao_formularioLogin->agregar_estado_certificaciones($_SESSION['ID'],$valorDecodificado,0);
  }else{
    $dao_formularioLogin->actualizarFechaInicio($_SESSION['ID'],$valorDecodificado,date("Y-m-d H:i:s"));
  //$dao_formularioLogin->actualizarEstadoPermiso($_SESSION['ID'], $valorDecodificado,date("Y-m-d H:i:s"),  1);
  }



   include "../header.php";

   include '../nav.php';

$nombreCap = base64_decode($_GET['nom']);

$ti = base64_decode($_GET['va']);


$datos["capacitacion"] = $valorDecodificado;

$datos["preguntas"] = null;

$datos["nivel"] = 1;



$pregunta = $dao_formularioLogin->consultaConcursoPreguntas($datos);

 if (!empty($pregunta)) {
   $_SESSION["capacitacion"] = $valorDecodificado;
 }
?>



<div class="container d-flex justify-content-center align-items-center " >
  <div class="container-center" style="height: 100%; width: 100%; background-color: rgba(0, 0, 0, 0.4); padding-bottom: 50vh;">

   

<br>

<form id="form" name="form" method="POST" onsubmit="return enviarFormulario()" action="../../suscripcion/controller/controller_formularioLogin.php?op=GuardarCertificaciones" autocomplete="off">

  <input type="hidden" id="encuestaId" name="encuestaId" value="<?= $valorDecodificado ?>">
  <input type="hidden" name="nombreConcurso" value="<?= $_GET['nom'] ?>">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-8">

 
          <img src="../../img/logo-certif-dmc 2.png"  style="max-width: 50%;">
      <br><br>
        
          <h4 style="color: white">Pregunta <span id="numeroPregunta" >1</span> de 40  </h4>  <br>
       

      <p style="font-family: Helvetica, Arial, sans-serif; color:white">Tienes <span class="tiempo_estimado"></span> 40 segundos por pregunta para resolver este examen que consta de <span class="nro_preguntas"></span> preguntas aleatorias. <br> Revisa detenidamente antes de enviar tus respuestas. </p>
      <div id="contador" style="color: #5cc0e9; margin-bottom: 12px; font-size: .9em;"></div>
    </div>
    <input type="hidden" name="nivel" id="nivel" value="1">
  </div>

  <div class="row">

    <div class="col-md-1"></div>
    <!-- Cuerpo de Preguntas-->
    <div class="form-group div_preguntas col-md-11" id="baseConcurso">
      <div class="encuesta-ct" style="user-select: none;-moz-user-select: none;-webkit-user-select: none;  -ms-user-select: none;" >
        <input type="hidden" name="preguntaId[]" value="<?= $pregunta['id_pregunta'] ?>">
        <div class="pregunta-concurso">
          <label class="pay no-select" style="font-family: Helvetica, Arial, sans-serif;color: white;user-select: none;-moz-user-select: none;-webkit-user-select: none;  -ms-user-select: none;">
            <?= $pregunta["pregunta"] ?>
          </label>
          <? foreach (json_decode($pregunta["opciones"], true) as $key => $opc) : ?>

              
                <div class="p-3 mt-3 mb-2 col-md-6 div-nuevo" style="background-color:white;border-radius: 12px;">
                    <div style="font-weight: bold;  color:black; " class="custom-control custom-radio">
                      <input type="radio" id="radio-1-<?= $key ?>" name="respuesta_1" value="<?= $opc['opcion'] . "§" . $opc['numero'] ?>" class="custom-control-input">
                      <label class="custom-control-label" for="radio-1-<?= $key ?>"><?= $opc['opcion'] ?></label>
                    </div>
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

      <button type="submit" class="btn btn-primary btn-envia" style="width: 300px;" id="button" >Enviar</button>

    </div>
  </div>

  <br>

</form>

</div>
  </div>

<script type="text/javascript">
  
var miDiv = document.querySelector("body");

miDiv.style.backgroundImage = "url('../../img/fondo general.jpg')";
miDiv.style.backgroundSize = "cover";
miDiv.style.backgroundRepeat = "no-repeat";

// cambia color del navbar
var navbar = document.getElementById("miNavbar");
navbar.classList.remove("bg-light");
navbar.style.backgroundColor = "#slal4la";

//al marcar el card se seleccione el radioButton
document.querySelectorAll('.contenido-card').forEach(function(card) {
    card.addEventListener('click', function() {
        // Obtener el radio button asociado al card
        var radioButtonId = this.querySelector('.custom-control-input').id;
        var radioButton = document.getElementById(radioButtonId);

        // Marcar el radio button
        radioButton.checked = true;
    });
}); 

//original
  // Obtén una referencia al botón de submit
  var submitButton = document.getElementById("button");

  var nextButton = document.getElementById("butonSiguiente");

  // Desactiva el botón
  submitButton.disabled = true;

  var duracionInicial = 40;

  var cantidadPreguntas = 40;

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

      if (num < cantidadPreguntas) {
        nextButton.click();
      } else if (num == cantidadPreguntas && duracion === 0) {
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
 //var intervalo = setInterval(actualizarContador, 1000000);
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
  let contador = 1;
  function listaPreguntaConcurso() {

   // window.location.href = "https://certificaciones.dmc.pe/template/vista/certificaciones-aprobado.php";

    
    $(".div-nuevo").hide();
    contador++;
    console.log(contador);
     $("#numeroPregunta").html(contador);
    var capacitacion = $('#encuestaId').val();

    var preguntasId = [];

    var valor = getRespuesta();

    $('[name="preguntaId[]"]').each(function() {
      preguntasId.push($(this).val());
    });

    var numero = (preguntasId.length) + 1

    $.ajax({

      url: '../../suscripcion/controller/controller_formularioLogin.php?op=consultaPreguntaCertificaciones',

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

                //  <div class="p-3 mt-3 mb-2 col-md-6" style="background-color:white;border-radius: 12px;">
               

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
                nuevoDiv.style.fontWeight = "bold";
                nuevoDiv.style.color = "black";

                nuevoDiv.appendChild(nuevoInput);
                nuevoDiv.appendChild(nuevoLabel);

                var nuevoDiv2 = document.createElement("div");
                nuevoDiv2.classList.add("p-3", "mt-3", "mb-2","col-md-6");
                nuevoDiv2.style.borderRadius = "12px";
                nuevoDiv2.style.backgroundColor = "white";


                nuevoDiv2.appendChild(nuevoDiv);
                // Obtén todos los elementos con la clase "encuesta-ct"
                // Ocultar la sección original
                 var ultimoElemento = document.querySelector(".encuesta-ct:last-child");
                 ultimoElemento.style.display = "none"
          

                clonedDiv.appendChild(nuevoDiv2);
              });

            }
          }

        } //Termina la siguiente pregunta

        var nivel = document.getElementById("nivel");
        var notificacion = document.getElementById("notificacion");

        // Modifica el texto del elemento
        nivel.value = data.nivel;



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

        if (numero == 40) {
          nextButton.style.display = "none";
          submitButton.disabled = false;
        }

      }



    });

  }

  function enviarFormulario() {
      // Bloquear el botón
      var boton = document.getElementById('button');
      boton.disabled = true;


      // console.log("hola");

    }
</script>

<?php include "../footer.php"; ?>
