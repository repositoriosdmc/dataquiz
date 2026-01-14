<?php

/*error_reporting(E_ALL);
ini_set('display_errors', '1');
*/
session_start();    

require "../dao/dao_formularioLogin.php";

require "../dao/dao_suscripcion.php";

$cMail = new suscripcion();


$dao_formularioLogin = new dao_formularioLogin();


$opcion = $_REQUEST['op'];



switch ($opcion) {


  //para el select de login 
  case 'consultaUsuario':
    $datos = $resultado = $dao_formularioLogin->consultaUsuario($_REQUEST["correo"]);

    echo json_encode($datos);
    break;
  break;

  case 'registroPruebaExcel':

    // Manejo de hasta 3 archivos provenientes del formulario de prueba técnica
    $camposArchivos = ['archivo1', 'archivo2', 'archivo3'];

    $uploadFileDir = '../../template/archivos/examenes/';
    // Verificar si la carpeta existe y crearla si no
    if (!file_exists($uploadFileDir)) {
        mkdir($uploadFileDir, 0777, true);
    }  

    $messages = [];
    foreach ($camposArchivos as $campo) {
        if (isset($_FILES[$campo]) && $_FILES[$campo]['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES[$campo]['tmp_name'];
            $fileName    = $_FILES[$campo]['name'];
            $fileSize    = $_FILES[$campo]['size'];
            $fileType    = $_FILES[$campo]['type'];

            $fileNameCmps = explode('.', $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            // Renombrar archivo para incluir ID de usuario y evitar colisiones
            $newFileName = $_SESSION['ID'] . '-' . $_REQUEST['intento'] . '-' . $fileName;
            $dest_path   = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $messages[] = 'Archivo subido exitosamente: ' . $newFileName;
               //$messages[] = 'ok';
                // Registrar en base de datos / DAO
                 $dao_formularioLogin->registrarArchivoExcel($_REQUEST['intento'],$campo,$_SESSION['ID'], $newFileName, $fileName);
             
            } else {
                $messages[] = 'Error al subir el archivo ' . $fileName . ' (código ' . $_FILES[$campo]['error'] . ')';
            }
        }
    }
    $dao_formularioLogin->agregarResultadosFormLogin($_SESSION['ID'], $_REQUEST['cap'], $_REQUEST['intento']);
    // Si no se cargó ningún archivo
    if (empty($messages)) {
        $messages[] = 'No se recibió ningún archivo para cargar.';
    }

    echo json_encode(['messages' => $messages]);



 
  break; 

  case 'consultaPreguntaConcurso':


    

    // Verifica si el usuario ya ha respondido a todas las preguntas o está iniciando la encuesta.


    if (!isset($_SESSION['nivel'])) {
      $_SESSION['nivel'] = 1;
      $_SESSION['preguntasCorrectas'] = 0;
      $_SESSION['preguntasIncorrectas'] = 0;
    }

    $preguntaId = end($_REQUEST["preguntas"]); //final

    $estado = null;

    if (isset($_REQUEST["respuesta"])  && !empty($_REQUEST["respuesta"])) {

      list($textRespuesta, $numRespuesta) =  explode("§", $_REQUEST["respuesta"]);

      $validarRespuesta = $dao_formularioLogin->validar_respuesta($preguntaId, $numRespuesta);

      if ($validarRespuesta == "ok") {
        $_SESSION['preguntasCorrectas']++;
        $estado = 1;
      } else {
        $_SESSION['preguntasIncorrectas']++;
        $estado = 0;
      }

      if ($_SESSION['preguntasCorrectas'] == 2 && $_SESSION['nivel'] < 5) {
        $_SESSION['nivel']++;
      } else if ($_SESSION['preguntasIncorrectas'] == 2 && $_SESSION['nivel'] > 1) {
        $_SESSION['nivel']--;
      }

      if ($_SESSION['preguntasCorrectas'] == 2 || $_SESSION['preguntasIncorrectas'] == 2) {

        $_SESSION['preguntasCorrectas'] = 0;
        $_SESSION['preguntasIncorrectas'] = 0;
      }
    }

    $_REQUEST['nivel'] = $_SESSION['nivel']; //ya no se usa nivel

    $valores =   $dao_formularioLogin->consultaConcursoPreguntas($_REQUEST);


    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(

      array(

        'mensaje' => 'no existe',

        'nivel' => $_SESSION['nivel'],

        //'estado' => $estado,

        'datos' => $valores

      )

    );



    break;



    case 'consultaPreguntaCertificaciones':

   
      
  
      // Verifica si el usuario ya ha respondido a todas las preguntas o está iniciando la encuesta.
  
  
      if (!isset($_SESSION['nivel'])) {
        $_SESSION['nivel'] = 1;
        $_SESSION['preguntasCorrectas'] = 0;
        $_SESSION['preguntasIncorrectas'] = 0;
      }
  
      $preguntaId = end($_REQUEST["preguntas"]);
  
      $estado = null;
  
      if (isset($_REQUEST["respuesta"])  && !empty($_REQUEST["respuesta"])) {
  
        list($textRespuesta, $numRespuesta) =  explode("§", $_REQUEST["respuesta"]);
  
        $validarRespuesta = $dao_formularioLogin->validar_respuesta($preguntaId, $numRespuesta);
  
        if ($validarRespuesta == "ok") {
          $_SESSION['preguntasCorrectas']++;
          $estado = 1;
        } else {
          $_SESSION['preguntasIncorrectas']++;
          $estado = 0;
        }
  
        if ($_SESSION['preguntasCorrectas'] == 8 && $_SESSION['nivel'] < 5) {
          $_SESSION['nivel']++;
        } else if ($_SESSION['preguntasIncorrectas'] == 4 && $_SESSION['nivel'] > 1) {
          $_SESSION['nivel']--;
        }
  
        if ($_SESSION['preguntasCorrectas'] == 8 || $_SESSION['preguntasIncorrectas'] == 4) {
  
          $_SESSION['preguntasCorrectas'] = 0;
          $_SESSION['preguntasIncorrectas'] = 0;
        }
      }
  
      $_REQUEST['nivel'] = $_SESSION['nivel'];
  
    //  $valores =   $dao_formularioLogin->consultaConcursoPreguntas($_REQUEST);
    $valores =   $dao_formularioLogin->consultaPreguntasCertificaciones($_REQUEST);
    
      
      echo json_encode(
  
        array(
  
          'mensaje' => 'no existe',
  
          'nivel' => $_SESSION['nivel'],
  
          //'estado' => $estado,
  
          'datos' => $valores
  
        )
  
      );
  
      break;



  case 'activarCuenta':



    $activado = $dao_formularioLogin->validarUsuario($_REQUEST);

    if ($activado > 0) {

      echo "esta cuenta ya esta activa";
    } else {

      echo  $dao_formularioLogin->activarCuenta($_REQUEST);
    }



    break;

  case 'GuardarCLiv':

    unset($_SESSION['nivel']);
    unset($_SESSION['preguntasCorrectas']);
    unset($_SESSION['preguntasIncorrectas']);

    //Proceso de Guardado

    $usuario = $_SESSION["ID"];

    $capacitacionId = $_SESSION["capacitacion"];

    //


    switch ($_POST['nivel']) {
      case 5:
        $nombreNivel = "Master";
        break;
      case 4:
        $nombreNivel = "Experto";
        break;
      case 3:
        $nombreNivel = "Avanzado";
        break;
      case 2:
        $nombreNivel = "Intermedio";
        break;
      case 1:
        $nombreNivel = "Principiante";
        break;
      default:
        $nombreNivel = "Desconocido";
    }

    $resultado = $dao_formularioLogin->consultaEstado($capacitacionId, $usuario);

    if ($resultado == null) {

      $dao_formularioLogin->agregar_estado($usuario, $capacitacionId);

      $intento = 1;
    } else {

      $intento = $resultado["intentos"] + 1;

      $dao_formularioLogin->actualizarEstadoPermiso($usuario, $capacitacionId,0);
    }

    foreach ($_POST['preguntaId'] as $key => $preguntaId) {

      $respuestaKey = "respuesta_" . ($key + 1);
      
      if (!isset($_POST[$respuestaKey]) || empty($_POST[$respuestaKey])) {
        continue;
      }
      
      list($textRespuesta, $numRespuesta) = explode('§', $_POST[$respuestaKey]);

      $estado = $dao_formularioLogin->registrarRespuestas($preguntaId, $textRespuesta, $numRespuesta, $usuario, $intento);
    }

    //$puntaje = $dao_formularioLogin->puntajeconcursoLiv($capacitacionId, $usuario, $intento);

    $nombreUsuario = $dao_formularioLogin->getNombreUsuario($usuario);

    if ($estado == "ok") {

      unset($_SESSION['capacitacion']);

      $_SESSION['nombreNivel'] = $nombreNivel;

      //$_SESSION['puntaje'] = $puntaje['puntaje'];

      $_SESSION['nombreUsuario'] = $nombreUsuario['nombres'];

      header("Location: https://certificaciones.dmc.pe/template/GraciasPuntaje.php");

      exit;
    }



    break;

  case 'GuardarCconcursoDataScienceAdvanced':

    unset($_SESSION['nivel']);
    unset($_SESSION['preguntasCorrectas']);
    unset($_SESSION['preguntasIncorrectas']);
    unset($_SESSION['nombreConcurso']);
    unset($_SESSION['idConcurso']);

    //Proceso de Guardado

    $usuario = $_SESSION["ID"];

    $capacitacionId = $_SESSION["capacitacion"];

    //

    $resultado = $dao_formularioLogin->consultaEstado($capacitacionId, $usuario);

    $estadoConcurso = 0;

    if ($resultado == null) {

      $dao_formularioLogin->agregar_estado($usuario, $capacitacionId);

      $intento = 1;
    } else {

      //$intento = $resultado["intentos"] + 1;
      $intento = $resultado["intentos"] ;


      // if($intento == 3){//Por el momento
      //   $estadoConcurso = 1;
      // }

     // $dao_formularioLogin->actualizarEstadoPermiso($usuario, $capacitacionId, $estadoConcurso);

    }

    foreach ($_POST['preguntaId'] as $key => $preguntaId) {

      $respuestaKey = "respuesta_" . ($key + 1);
      
      if (!isset($_POST[$respuestaKey]) || empty($_POST[$respuestaKey])) {
        continue;
      }
      
      list($textRespuesta, $numRespuesta) = explode('§', $_POST[$respuestaKey]);

      $estado = $dao_formularioLogin->registrarRespuestas($preguntaId, $textRespuesta, $numRespuesta, $usuario, $intento);
    }

    $puntaje = $dao_formularioLogin->puntajeConcursoAdvancedDataScience($capacitacionId, $usuario, $intento);
    $puntajeMaximo = $dao_formularioLogin->puntajeMaximoConcursoAdvancedDataScience($capacitacionId, $usuario);

    $nombreUsuario = $dao_formularioLogin->getNombreUsuario($usuario);

    if ($estado == "ok") {
      $dao_formularioLogin->agregarResultadosCertificaciones($_SESSION['ID'], $capacitacionId,$resultado["intentos"]);
      unset($_SESSION['capacitacion']);

      //$_SESSION['nombreNivel'] = $nombreNivel;

      $_SESSION['puntaje'] = $puntaje['puntaje'];

      $_SESSION['puntajeMaximo'] = $puntajeMaximo['puntaje'];

      $_SESSION['intento'] = $intento;

      $_SESSION['nombreUsuario'] = $nombreUsuario['nombres'];

      $_SESSION['nombreConcurso'] = $_POST['nombreConcurso'];

      $_SESSION['idConcurso'] = $_POST['encuestaId'];

      header("Location: https://certificaciones.dmc.pe/template/GraciasPuntajeConcurso.php");

      exit;
    }



    break;

// inicio certificaciones
    case 'GuardarCertificaciones':
      unset($_SESSION['nivel']);
      unset($_SESSION['preguntasCorrectas']);
      unset($_SESSION['preguntasIncorrectas']);
      unset($_SESSION['nombreConcurso']);
      unset($_SESSION['idConcurso']);
  
      //Proceso de Guardado
  
      $usuario = $_SESSION["ID"];
  
      $capacitacionId = $_SESSION["capacitacion"];
  
      //
  
      $resultado = $dao_formularioLogin->consultaEstado($capacitacionId, $usuario);
  
      $estadoConcurso = 0;
  
      if ($resultado == null) {
  
     //   $dao_formularioLogin->agregar_estado($usuario, $capacitacionId);
  
        $intento = 1;
      } else {
  
         $intento = $resultado["intentos"] ;
  
        if($intento == 1){//Por el momento
          $estadoConcurso = 1;
        }
  
      }

 
      if ($resultado["id_usuario"]) { //valida si existe el registro
        date_default_timezone_set('America/Lima');
        $estadoDato = ($resultado["intentos"] >= 2) ? 1 : 0; //si supera los 2 intentos cambia el estado (cambiar a 2)
        $fecha_fin = date("Y-m-d H:i:s");
        

      $dao_formularioLogin->actualizarEstado($_SESSION['ID'],$capacitacionId,$fecha_fin,$estadoDato);
     
      }

  
      foreach ($_POST['preguntaId'] as $key => $preguntaId) {
  
        $respuestaKey = "respuesta_" . ($key + 1);
        
        if (!isset($_POST[$respuestaKey]) || empty($_POST[$respuestaKey])) {
          continue;
        }
        
        list($textRespuesta, $numRespuesta) = explode('§', $_POST[$respuestaKey]);
  
        $estado = $dao_formularioLogin->registrarRespuestas($preguntaId, $textRespuesta, $numRespuesta, $usuario, $intento);
      }
  
      $puntaje = $dao_formularioLogin->puntajeConcursoAdvancedDataScience($capacitacionId, $usuario, $intento);
      $puntajeMaximo = $dao_formularioLogin->puntajeMaximoConcursoAdvancedDataScience($capacitacionId, $usuario);
  
      $nombreUsuario = $dao_formularioLogin->getNombreUsuario($usuario);
      
  
      if ($estado == "ok") {

        //consultar el porcentaje del examen
        
        $data = $dao_formularioLogin->porcentajeCertificaciones($capacitacionId , $_SESSION['ID'],$resultado["intentos"]);
        $html = "";
        $porcentajeCalculado = $data["porcentaje"];
        if ($porcentajeCalculado >= 80) {
          $html = '<br><br> Puedes descargar el certificado a través del siguiente enlace:
            <br> <a href="https://certificaciones.dmc.pe/template/archivos/certificado.php?cap=' . $capacitacionId . '&us=' . $_SESSION['ID'] . '&in=' . $resultado["intentos"] . '" target="_blank">Descarga Aquí</a>';
        }
       
      
  
       $mensaje = $dao_formularioLogin->pantillaResultadoNotas($porcentajeCalculado , utf8_encode(base64_decode($_POST['nombreConcurso'])), $_SESSION[NOMBRE], $_SESSION[APELLIDO],$html);

       $cMail->send_mail("Informes DMC", $_SESSION[CORREO], $_SESSION[NOMBRE], "", "", "", "INFORME CERTIFICACIONES DMC", $mensaje);
 
        //registro de porcentajes
        $dao_formularioLogin->agregarResultadosCertificaciones($_SESSION['ID'], $capacitacionId,$resultado["intentos"]);
      
        unset($_SESSION['capacitacion']);
  
        //$_SESSION['nombreNivel'] = $nombreNivel;
  
        $_SESSION['puntaje'] = $puntaje['puntaje'];
  
        $_SESSION['puntajeMaximo'] = $puntajeMaximo['puntaje'];
  
        $_SESSION['intento'] = $intento;
  
        $_SESSION['nombreUsuario'] = $nombreUsuario['nombres'];
  
        $_SESSION['nombreConcurso'] = $_POST['nombreConcurso'];
  
        $_SESSION['idConcurso'] = $_POST['encuestaId'];
  
        header("Location: https://certificaciones.dmc.pe/template/vista/certificaciones-aprobado.php");
   
        exit;


    
      }

  
    break;

    // fin certificaciones


    // inicio prueba tecnica
    case 'GuardarPruebaTecnica':
      unset($_SESSION['nivel']);
      unset($_SESSION['preguntasCorrectas']);
      unset($_SESSION['preguntasIncorrectas']);
      unset($_SESSION['nombreConcurso']);
      unset($_SESSION['idConcurso']);
  
      //Proceso de Guardado
  
      $usuario = $_SESSION["ID"];
  
      $capacitacionId = $_SESSION["capacitacion"];
  
      //
  
      $resultado = $dao_formularioLogin->consultaEstado($capacitacionId, $usuario);
  
      $estadoConcurso = 0;
  
      if ($resultado == null) {
  
     //   $dao_formularioLogin->agregar_estado($usuario, $capacitacionId);
  
        $intento = 1;
      } else {
  
         $intento = $resultado["intentos"] ;
    
  
  
        if($intento == 1){//Por el momento
          $estadoConcurso = 1;
        }
  
 

      }

 
      if ($resultado["id_usuario"]) { //valida si existe el registro
        date_default_timezone_set('America/Lima');
        $estadoDato = ($resultado["intentos"] >= 1) ? 1 : 0; //si supera los 2 intentos cambia el estado (cambiar a 2)
        $fecha_fin = date("Y-m-d H:i:s");
        $porcentaje = 0;

     // $dao_formularioLogin->actualizarEstado($_SESSION['ID'],$capacitacionId,$fecha_fin,$estadoDato);
     
      } 

  
      foreach ($_POST['preguntaId'] as $key => $preguntaId) {
  
        $respuestaKey = "respuesta_" . ($key + 1);
        
        if (!isset($_POST[$respuestaKey]) || empty($_POST[$respuestaKey])) {
          // Registrar pregunta sin respuesta
          $estado = $dao_formularioLogin->registrarRespuestas($preguntaId, '', '', $usuario, $intento);
          continue;
        }
        
        list($textRespuesta, $numRespuesta) = explode('§', $_POST[$respuestaKey]);
  
        $estado = $dao_formularioLogin->registrarRespuestas($preguntaId, $textRespuesta, $numRespuesta, $usuario, $intento);
      }
  
      $puntaje = $dao_formularioLogin->puntajeConcursoAdvancedDataScience($capacitacionId, $usuario, $intento);
      $puntajeMaximo = $dao_formularioLogin->puntajeMaximoConcursoAdvancedDataScience($capacitacionId, $usuario);
  
      $nombreUsuario = $dao_formularioLogin->getNombreUsuario($usuario);
      
  
      if ($estado == "ok") {

        //consultar el porcentaje del examen
       // $data = $dao_formularioLogin->porcentajeCertificaciones(34, 2330,2);
       // echo $data["porcentaje"];
      //  $data = $dao_formularioLogin->porcentajeCertificaciones($capacitacionId , $_SESSION['ID'],$resultado["intentos"]);
       /* 

 */
        //registro de porcentajes
        $dao_formularioLogin->agregarResultadosCertificaciones($_SESSION['ID'], $capacitacionId,$resultado["intentos"]);
      
        unset($_SESSION['capacitacion']);
  
        //$_SESSION['nombreNivel'] = $nombreNivel;
  
        $_SESSION['puntaje'] = $puntaje['puntaje'];
  
        $_SESSION['puntajeMaximo'] = $puntajeMaximo['puntaje'];
  
        $_SESSION['intento'] = $intento;
  
        $_SESSION['nombreUsuario'] = $nombreUsuario['nombres'];
  
        $_SESSION['nombreConcurso'] = $_POST['nombreConcurso'];
  
        $_SESSION['idConcurso'] = $_POST['encuestaId'];

        
        if ($_SESSION['ID'] == 2275) {
          $data = $dao_formularioLogin->porcentajeCertificaciones($capacitacionId , $_SESSION['ID'],$resultado["intentos"]);
          $mensaje = $dao_formularioLogin->pantillaResultadoNotas($capacitacionId,$_SESSION['ID'],$data["nombre"],$data["porcentaje"], $dato_cap["nombre"], $_SESSION['NOMBRE'], $_SESSION['APELLIDO'],'');

            try {
              $resultadoEnvio = $cMail->send_mail("Informes DMC", $_SESSION['CORREO'], $_SESSION['NOMBRE'], "", "", "", "INFORME CURSOS DMC", $mensaje);
            } catch (Exception $e) {
              $resultadoEnvio = "Error: " . $e->getMessage();
            }
            $dao_formularioLogin->registrarEstadoEnvio($capacitacionId , $_SESSION['ID'],$resultadoEnvio);
        } 
  
 
      header("Location: ../../template/vista/mensaje-confirmacion");
        exit;


    
      }

  
    break;

    // fin prueba tecnica

  case 'registraRespuestas':


    $resultado = $dao_formularioLogin->consultaEstado($_REQUEST["capacitacion"], $_SESSION['ID']);



    $dato_cap = $dao_formularioLogin->consultaFormularios($_REQUEST["capacitacion"]);



    for ($i = 0; $i <= $dato_cap["cantidad_preguntas"]; $i++) { // el 20 cantidad de preguntas del formulario

      //  (alt 21 en teclado) § <- agrego este caracter especial para que no interfiera con el explode porque es muy raro su uso

      $idarray = explode("§", $_REQUEST[$i]);

      $id_pregunta = $idarray[0];

      $numero_opcion_seleccionado = $idarray[2]; // este es el numero de todas las opciones que selecciono el estudiante

      $respuesta_seleccionado = $idarray[1]; //este el texto



      if ($id_pregunta) {

        $resultado_registro = $dao_formularioLogin->registrarRespuestas($id_pregunta, $respuesta_seleccionado, $numero_opcion_seleccionado, $_SESSION['ID'], $resultado["intentos"]);
      }
    }





    if (isset($_SESSION['ID'])) {


      // conteo de puntos obtenidos y envio de correo

      $contadorPuntos = 0;

      $puntosObtenidos = 0;

      $indice = 1;

      $resultado_examen = $dao_formularioLogin->resultadosExamen($_REQUEST["capacitacion"], $_SESSION['ID']);





      foreach ($resultado_examen as $value) {



        if ($value["respuesta_seleccionada"] === $value["respuesta"]) {

          $puntosObtenidos += $value["puntaje"];
        }



        $indice++; // el contador de la lista que se muestra



      }



      //registro de notas

      $dao_formularioLogin->registro_calificaciones($_SESSION['ID'], $_REQUEST["capacitacion"], $puntosObtenidos);



      //correo de notas obtenida

      $mensaje = $dao_formularioLogin->pantillaResultadoNotas($puntosObtenidos, $dato_cap["nombre"], $_SESSION['NOMBRE'], $_SESSION['APELLIDO'],'');

      $cMail->send_mail("Informes DMC", $_SESSION['CORREO'], $_SESSION['NOMBRE'], "", "", "", "INFORME CURSOS DMC", $mensaje);



      echo json_encode(



        array(



          'title' => 'Registrado',

          'text' => "¡Revise su bandeja de correo para visualizar el resultado!",

          'type' => 'success'



        )



      );
    } else {

      echo json_encode(

        array(



          'title' => 'UPS',

          'text' => "¡No se pudo realizar el registro, comuniquese con soporte!",

          'type' => 'error'



        )



      );
    }





    break;



  case 'listaCapacitaciones':

    header('Content-Type: application/json; charset=utf-8');
    
    if (isset($_SESSION['ID'])) {
      $dao_formularioLogin->consultaActivarEstados($_SESSION['ID']);
      echo $dao_formularioLogin->listaCapacitaciones($_SESSION['ID']);
    } else {
      echo json_encode(['error' => 'Sesión no válida']);
    }




    break;





  case 'registroAlumno':

    $mail = $_REQUEST["correo"];

    $contraseña = $_REQUEST["contraseña"];

    $nombres = $_REQUEST["nombres"];

    $hash = md5(rand(0, 1000));



    //$link = 'https://certificaciones.dmc.pe/suscripcion/mensaje_confirmacion.php?email=' . $mail . '&hash=' . $hash;
 



   // $mensaje = $dao_formularioLogin->plantillaCertificacion($link, $mail, $contraseña);

    if ($_REQUEST["contraseña"] == $_REQUEST["repita_contraseña"]) { // comparativa de contraseñas

      $valor = $dao_formularioLogin->consultaUsuarioexistente($_REQUEST);

      if ($valor > 0) { //validar usuario existente

        echo '

        ¡Este correo ya esta registrado a esta prueba!

        ';
      } else { //

        $resultado = $dao_formularioLogin->registrarUsuario($_REQUEST, $hash);
        echo $resultado;
      /*  if ($resultado == "ok") {
          echo  $cMail->send_mail("Informes DMC", $mail, $nombres, "", "", "", "CERTIFICACIONES DMC", $mensaje);

        } */
   }
    } else {

      echo 'Las contraseñas son distintas. ';
    } 





    break;







    case 'registroAlumnoCertificacion':

      $mail = $_REQUEST["correo"];

      $contraseña = $_REQUEST["contraseña"];

      $nombres = $_REQUEST["nombres"];

      $hash = md5(rand(0, 1000));



      $link = 'https://certificaciones.dmc.pe/suscripcion/mensaje_confirmacion.php?email=' . $mail . '&hash=' . $hash;





      $mensaje = $dao_formularioLogin->plantillaConfirmacion($link, $mail, $contraseña);



      if ($_REQUEST["contraseña"] == $_REQUEST["repita_contraseña"]) { // comparativa de contraseñas

        $valor = $dao_formularioLogin->consultaUsuarioexistenteCertificacion($_REQUEST, $hash);

        if ($valor > 0) { //validar usuario existente

          echo '



          el correo ya esta registrado



          ';
        } else { //

          $resultado = $dao_formularioLogin->registrarUsuario($_REQUEST, $hash);

        /*  if ($resultado == "ok") {

            echo  $cMail->send_mail("Informes DMC", $mail, $nombres, "", "", "", "SUSCRIPCIÓN QUIZ DMC", $mensaje);
          } */
        }
      } else {

        echo 'Las contraseñas son distintas. ';
      }





      break;




  default:

    return "vacio";

    break;
}
