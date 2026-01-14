<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
//capa Id
date_default_timezone_set('America/Lima');
if (!isset($_SESSION['ID'])) {
  header('location: ../../suscripcion/inicio_formulario.php');
  return;
}


$valorDecodificado = base64_decode($_GET['cap']);
require_once "../../suscripcion/dao/dao_formularioLogin.php";

$dao_formularioLogin = new dao_formularioLogin();

$resultado = $dao_formularioLogin->consultaEstado($valorDecodificado, $_SESSION['ID']);

if ($resultado["estado_permiso"] > 0) { 
  header('location: ../../suscripcion/inicio_formulario.php');
 return;
}

 if (!$resultado["intentos"]) { 
   $dao_formularioLogin->agregar_estado_certificaciones($_SESSION['ID'],$valorDecodificado,1,null);

  }else{
   $dao_formularioLogin->actualizarEstadoPermiso($_SESSION['ID'], $valorDecodificado,date("Y-m-d H:i:s"),  1);

 }

include "../header.php";
include '../nav.php';

$nombreCap = base64_decode($_GET['nom']);
$ti = base64_decode($_GET['va']);


$datos["capacitacion"] = $valorDecodificado;
$datos["preguntas"] = null;
// $datos["nivel"] = 1;
?>

<style>
    #botonpersonal {
        font: caption;
        -webkit-appearance: button;
        background: blue !important;
        color: white;
        border-color: blue !important;
        padding: 7px 10px;
    }
    #contador {
        color: #5cc0e9;
        margin-bottom: 12px;
        font-size: .9em;
    }
</style>

<div class="container d-flex justify-content-center align-items-center">
  <div class="container-center" style="height: 100%; width: 100%; background-color: rgba(0, 0, 0, 0.4); padding-bottom: 50vh;">
    <br>
    <form id="form" method="POST" enctype="multipart/form-data"  autocomplete="off">
      <input type="hidden" id="encuestaId" name="encuestaId" value="<?= $valorDecodificado ?>">
      <input type="hidden" name="nombreConcurso" value="<?= $_GET['nom'] ?>">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-8">
          <img src="../../img/logo-certif-dmc 2.png" style="max-width: 50%;">
          <br><br>
          <p style="font-family: Helvetica, Arial, sans-serif; color:white">
            Tienes <span class="tiempo_estimado"></span> 20 minutos para realizar la prueba. Al terminar debe cargar el archivo resuelto.
          </p>
          <div id="contador"></div>
        </div>
        <input type="hidden" name="nivel" id="nivel" value="1">
      </div>

      <div class="row">
        <div class="col-md-1"></div>
        <!-- Cuerpo de Preguntas -->
        <div class="form-group div_preguntas col-md-11" id="baseConcurso">
          <div class="encuesta-ct" style="user-select: none;-moz-user-select: none;-webkit-user-select: none;-ms-user-select: none;">
            <input type="hidden" name="preguntaId[]">
            <div class="pregunta-concurso">
              <label class="pay no-select" style="font-family: Helvetica, Arial, sans-serif;color: white;user-select: none;-moz-user-select: none;-webkit-user-select: none;-ms-user-select: none;">
                Descargar archivo → <a href="https://certificaciones.dmc.pe/template/archivos/examen.xlsx" class="btn btn-primary btn-sm" >
                  
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-excel" viewBox="0 0 16 16">
  <path d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z"/>
  <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
</svg> 
                Excel</a>
              </label>
              <div class="p-3 mt-3 mb-2 col-md-11 div-nuevo" style="background-color:white;border-radius: 12px;">
                <div style="font-weight: bold; color:black;" class="custom-control custom-radio">
              
                  <input type="file" name="inputFile" id="inputFile" accept=".xls,.xlsx">
                </div>
              </div>
            </div>
          </div>
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
        var radioButtonId = this.querySelector('.custom-control-input').id;
        var radioButton = document.getElementById(radioButtonId);
        radioButton.checked = true;
    });
}); 

// Duración del cronómetro en segundos (20 minutos)
var duracion = 20 * 60;
var tiempoInicial = Date.now();

// Obtener el elemento del contador
var contadorElemento = document.getElementById("contador");

// Función para actualizar el contador
function actualizarContador() {
    var tiempoActual = Date.now();
    var diferencia = tiempoActual - tiempoInicial;
    var tiempoRestante = duracion - Math.floor(diferencia / 1000);

    var minutes = Math.floor(tiempoRestante / 60);
    var seconds = tiempoRestante % 60;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    seconds = seconds < 10 ? '0' + seconds : seconds;

    contadorElemento.innerHTML = "Tiempo restante: " + minutes + ":" + seconds;

    if (tiempoRestante > 0) {
        requestAnimationFrame(actualizarContador);
    } else {
    
        contadorElemento.innerHTML = "Tiempo acabado";
        window.location.href = "../../suscripcion/inicio_formulario.php";
    }
}

// Llamar a la función inicialmente para mostrar el valor inicial
actualizarContador();

document.getElementById('form').addEventListener('submit', function(event) {
    event.preventDefault();
    var inputFile = document.getElementById('inputFile');

    if (inputFile.files.length > 0) {
        let formData = new FormData();
        formData.append("archivo", inputFile.files[0]);
        formData.append("capacitacion", "<?php echo $valorDecodificado ?>");
        
        fetch("../../suscripcion/controller/controller_formularioLogin.php?op=registroPruebaExcel", {
            method: 'POST',
            body: formData,
        })
        .then(respuesta => respuesta.text())
        .then(decodificado => {
          window.location.href = "https://certificaciones.dmc.pe/template/vista/mensaje-excel.php";
           // console.log(decodificado); 
        });

    } else {
        alert("Selecciona un archivo");
    }
});
</script>

<?php include "../footer.php"; ?>
