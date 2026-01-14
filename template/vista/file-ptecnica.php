<?php
session_start();
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

 if (!isset($resultado["intentos"])) { 
  $dao_formularioLogin->agregar_estado_certificaciones($_SESSION['ID'], $valorDecodificado, 1, "");
} elseif ($resultado["intentos"] == 0) {
  $dao_formularioLogin->actualizarEstadoPermiso($_SESSION['ID'], $valorDecodificado, date("Y-m-d H:i:s"), 1);
} else {
  $dao_formularioLogin->actualizarEstadoPermiso($_SESSION['ID'], $valorDecodificado, date("Y-m-d H:i:s"), 1);
} 

 include "../header.php";

 include '../nav.php';


 ?>
 


 <div class="container d-flex justify-content-center align-items-center " >
  <div class="container-center" style="height: 100%; width: 100%; background-color: rgba(0, 0, 0, 0.4); padding-bottom: 50vh;">

   

<br>

<form id="form" name="form" method="POST" enctype="multipart/form-data"  autocomplete="off">


  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-8">

 
          <img src="../../img/dataquiz dmc institute.png"  style="max-width: 50%;">
      <br><br>
        
          <h4 style="color: white"> Subir archivo </h4>  <br>
          <div style="margin-bottom: 12px;">
            <a href="../archivos/PRUEBA%20ENTRADA_NIVELINTERMEDIO.xlsx" download class="btn btn-success btn-sm" style="margin-right: 10px;">Nivel Intermedio </a>
            <a href="../archivos/PRUEBA%20ENTRADA_NIVELBASICO.xlsx" download class="btn btn-success btn-sm">Nivel Básico </a>
            <span aria-hidden="true" style="color: #ffffff; margin: 0 8px; font-size: 1.1em; line-height: 1;">&larr;</span>
            <span style="color: #ffffff; margin-left: 4px; font-size: 0.95em;">Debe descargar el archivo para comenzar el examen.</span>
          </div>
       

      <p style="font-family: Helvetica, Arial, sans-serif; color:white"> Debes subir el archivo en el tiempo indicado.    </p>
      <div id="contador" style="color: #5cc0e9; margin-bottom: 12px; font-size: .9em;"></div>
    </div>
    


  </div>

  <div class="row"> 
  <input type="hidden" class="form-control" name="cap" id="cap" value="<?= $valorDecodificado ?>">
  <input type="hidden" class="form-control" name="intento" id="intento" value="<?= $resultado["intentos"]+1 ?>">

    <div class="col-md-1"></div>
    <!-- Cuerpo de Preguntas-->
    <div class="form-group col-md-11">
      <div class="file-upload-container">
        <div class="file-upload-group">
          <div class="file-upload-header">
            <label for="archivo1" class="custom-file-upload">
              <i class="fas fa-file-upload"></i> Archivo 1
            </label>
            <span class="file-status">(Obligatorio)</span>
          </div>
          <input type="file" name="archivo1" id="archivo1" required class="custom-file-input">
          <div class="file-preview-container">
            <div id="archivo1-preview" class="file-preview">
              <i class="fas fa-file"></i>
              <span class="file-name">No se ha seleccionado archivo</span>
            </div>
            <div class="file-info">
              <span class="file-size">0 KB</span>
              <span class="file-type">Tipo: N/A</span>
            </div>
          </div>
        </div>
        <div class="file-upload-group">
          <div class="file-upload-header">
            <label for="archivo2" class="custom-file-upload">
              <i class="fas fa-file-upload"></i> Archivo 2
            </label>
            <span class="file-status">(Opcional)</span>
          </div>
          <input type="file" name="archivo2" id="archivo2" class="custom-file-input">
          <div class="file-preview-container">
            <div id="archivo2-preview" class="file-preview">
              <i class="fas fa-file"></i>
              <span class="file-name">No se ha seleccionado archivo</span>
            </div>
            <div class="file-info">
              <span class="file-size">0 KB</span>
              <span class="file-type">Tipo: N/A</span>
            </div>
          </div>
        </div>

        <!-- <div class="file-upload-group">
          <div class="file-upload-header">
            <label for="archivo3" class="custom-file-upload">
              <i class="fas fa-file-upload"></i> Archivo 3
            </label>
            <span class="file-status">(Opcional)</span>
          </div>
          <input type="file" name="archivo3" id="archivo3" class="custom-file-input">
          <div class="file-preview-container">
            <div id="archivo3-preview" class="file-preview">
              <i class="fas fa-file"></i>
              <span class="file-name">No se ha seleccionado archivo</span>
            </div>
            <div class="file-info">
              <span class="file-size">0 KB</span>
              <span class="file-type">Tipo: N/A</span>
            </div>
          </div>
        </div> -->

      </div>
    </div>


  </div>

  <hr>

  <div class="row">

    <div class="col-md-12" id="divButton" style="text-align:center">

      <button type="button" class="btn btn-primary btn-envia" style="width: 300px; margin-top: 20px;" id="submitBtn" >Enviar</button>

    </div>
  </div>

  <br>

</form>

</div>
  </div>

<style>
.custom-file-upload {
    display: inline-block;
    padding: 12px 24px;
    background-color: #2764D4;
    color: white;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    border: none;
    font-size: 14px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.custom-file-upload:hover {
    background-color: #599CB5;
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.15);
}

.custom-file-upload i {
    margin-right: 10px;
    color: #fff;
}

.custom-file-input {
    display: none;
}

.file-upload-container {
    display: flex;
    flex-direction: column;
    gap: 20px;
    padding: 20px;
    background-color: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.file-upload-group {
    background-color: rgba(0, 0, 0, 0.2);
    padding: 15px;
    border-radius: 8px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.file-upload-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.file-status {
    font-size: 12px;
    color: #5cc0e9;
    font-weight: 500;
}

.file-preview-container {
    background-color: rgba(255, 255, 255, 0.05);
    padding: 15px;
    border-radius: 6px;
    margin-top: 10px;
}

.file-preview {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #fff;
    font-size: 14px;
}

.file-preview i {
    color: #5cc0e9;
    font-size: 20px;
}

.file-info {
    display: flex;
    justify-content: space-between;
    color: #888;
    font-size: 12px;
    margin-top: 5px;
}

.file-name {
    color: #fff;
    font-size: 14px;
    font-weight: 500;
    color: #666;
    font-size: 0.9em;
}
</style> 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>



document.addEventListener('DOMContentLoaded', function() {

    const fileInputs = [
        { input: 'archivo1', preview: 'archivo1-preview' },
        { input: 'archivo2', preview: 'archivo2-preview' },
        { input: 'archivo3', preview: 'archivo3-preview' }
    ];

    fileInputs.forEach(file => {
        const input = document.getElementById(file.input);
        const preview = document.getElementById(file.preview);
        if (!input || !preview) {
            return; // evitar errores si el input/preview no existe (p.ej., archivo3 comentado)
        }
        const container = preview.parentElement; // .file-preview-container
        const fileName = preview.querySelector('.file-name');
        const fileSize = container.querySelector('.file-size');
        const fileType = container.querySelector('.file-type');

        input.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Update file name
                fileName.textContent = file.name;
                
                // Update file size
                const sizeKB = (file.size / 1024).toFixed(1);
                fileSize.textContent = `${sizeKB} KB`;
                
                // Update file type
                fileType.textContent = `Tipo: ${file.type || 'N/A'}`;
                
                // Add success icon
                preview.querySelector('i').classList.remove('fa-file');
                preview.querySelector('i').classList.add('fa-check-circle');
                preview.querySelector('i').style.color = '#5cc0e9';
            } else {
                // Reset preview
                fileName.textContent = 'No se ha seleccionado archivo';
                fileSize.textContent = '0 KB';
                fileType.textContent = 'Tipo: N/A';
                preview.querySelector('i').classList.remove('fa-check-circle');
                preview.querySelector('i').classList.add('fa-file');
                preview.querySelector('i').style.color = '#5cc0e9';
            }
        });
    });

    // Contador 20 minutos (regresivo)
    const contadorElemento = document.getElementById('contador');
    let tiempoRestante = 2 * 60 * 60; // 2 horas en segundos

    function formatoHHMMSS(seg) {
        const h = Math.floor(seg / 3600);
        const m = Math.floor((seg % 3600) / 60).toString().padStart(2, '0');
        const s = (seg % 60).toString().padStart(2, '0');
        return `${h}:${m}:${s}`;
    }

    function actualizarContador20() {
        if (!contadorElemento) return;
        contadorElemento.textContent = `Tiempo restante: ${formatoHHMMSS(tiempoRestante)}`;
        if (tiempoRestante <= 0) {
            clearInterval(intervalo20);
            // Al terminar, intentar enviar automáticamente o redirigir
            const archivo1Input = document.getElementById('archivo1');
            const submitBtn = document.getElementById('submitBtn');
            if (archivo1Input && archivo1Input.files && archivo1Input.files.length > 0 && submitBtn) {
                submitBtn.click();
            } else {
                // Si no hay archivo obligatorio, redirigir igualmente tras aviso
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        title: 'Tiempo finalizado',
                        text: 'El tiempo ha finalizado. Serás redirigido al inicio.',
                        icon: 'info',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(() => {
                        window.location.href = '../../suscripcion/inicio_formulario';
                    });
                } else {
                    window.location.href = '../../suscripcion/inicio_formulario';
                }
            }
            return;
        }
        tiempoRestante--;
    }

    actualizarContador20();
    const intervalo20 = setInterval(actualizarContador20, 1000);
});
</script> 

  <script>
 
    var miDiv = document.querySelector("body");

miDiv.style.backgroundImage = "url('../../img/fondo general.jpg')";
miDiv.style.backgroundSize = "cover";
miDiv.style.backgroundRepeat = "no-repeat";

// cambia color del navbar
var navbar = document.getElementById("miNavbar");
navbar.classList.remove("bg-light");
navbar.style.backgroundColor = "#slal4la";




//enviar formulario
    document.getElementById('submitBtn').addEventListener('click', function(e) {
      
      e.preventDefault();
      e.stopPropagation();

      //deshabilitar botón
      document.getElementById('submitBtn').disabled = true;

      // Validar que el archivo obligatorio esté presente
      const archivo1Input = document.getElementById('archivo1');
      if (!archivo1Input.files || archivo1Input.files.length === 0) {
          Swal.fire({
              title: 'Archivo obligatorio',
              text: 'Por favor seleccione el archivo de Excel (Archivo 1).',
              icon: 'warning',
              confirmButtonText: 'Ok'
          });
          document.getElementById('submitBtn').disabled = false;
          return; // no continúa si falta el archivo
      }

      const form = document.getElementById('form');
      const formData = new FormData(form);
      const xhr = new XMLHttpRequest();
      xhr.open('POST', '../../suscripcion/controller/controller_formularioLogin.php?op=registroPruebaExcel');
      xhr.onload = function() {
        if (xhr.status === 200) {
          document.getElementById('submitBtn').disabled = false;
          Swal.fire({
            title: '¡Éxito!',
            text: 'Los archivos se han subido correctamente.',
            icon: 'success',
            confirmButtonText: 'Ok',
            timer: 3000,
            timerProgressBar: true,
          });
        setTimeout(function(){
            window.location.href = '../../suscripcion/inicio_formulario';
      }, 3000);
        }
      }; 
      xhr.send(formData);

    });     



  </script>

 <?php
 
 include "../footer.php";

?>