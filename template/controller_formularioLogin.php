<?php



session_start();







require "../dao/dao_formularioLogin.php";



require "../dao/dao_suscripcion.php";

$cMail = new suscripcion();





$dao_formularioLogin = new dao_formularioLogin();





$opcion = $_REQUEST['op'];



switch ($opcion) {


  case 'consultaForm':

    break;

  case 'consultaPreguntas':

    // $dao_formularioLogin->agregar_estado($_SESSION[ID],$_REQUEST["capacitacion"]);

    //

    // echo $dao_formularioLogin->consultaPreguntas($_REQUEST);

    $resultado = $dao_formularioLogin->consultaEstado($_REQUEST["capacitacion"], $_SESSION[ID]);



    if ($resultado["estado_permiso"] == 1) { // si el alumno ya dio este examen

      echo json_encode(

        array(



          'mensaje' => 'existe',

          'datos' => ""

        )

      );
    } else {

      if ($resultado["estado_permiso"] === "0") {

        $dao_formularioLogin->actualizarEstadoPermiso($_SESSION[ID], $_REQUEST["capacitacion"]);
      } else {

        $dao_formularioLogin->agregar_estado($_SESSION[ID], $_REQUEST["capacitacion"]);
      }

      $valores =   $dao_formularioLogin->consultaPreguntas($_REQUEST);

      echo json_encode(

        array(



          'mensaje' => 'no existe',

          'datos' => $valores

        )

      );
    }

    break;

  case 'consultaPreguntaConcurso':

    // $dao_formularioLogin->agregar_estado($_SESSION[ID],$_REQUEST["capacitacion"]);



    session_start();

    // Verifica si el usuario ya ha respondido a todas las preguntas o está iniciando la encuesta.


    if (!isset($_SESSION['nivel'])) {
      $_SESSION['nivel'] = 1;
      $_SESSION['preguntasCorrectas'] = 0;
      $_SESSION['preguntasIncorrectas'] = 0;
    }

    $preguntaId = end($_REQUEST["preguntas"]);

    if (isset($_REQUEST["respuesta"])) {

      list($textRespuesta, $numRespuesta) =  explode("§", $_REQUEST["respuesta"]);

      $validarRespuesta = $dao_formularioLogin->validar_respuesta($preguntaId, $numRespuesta);

      if ($validarRespuesta == "ok") {
        $_SESSION['preguntasCorrectas']++;
      } else {
        $_SESSION['preguntasIncorrectas']++;
      }

      if ($_SESSION['preguntasCorrectas'] == 2) {
        $_SESSION['nivel']++;
      } else if ($_SESSION['preguntasIncorrectas'] == 2 && $_SESSION['nivel'] > 1) {
        $_SESSION['nivel']--;
      }

      if ($_SESSION['preguntasCorrectas'] == 2 || $_SESSION['preguntasIncorrectas'] == 2) {

        $_SESSION['preguntasCorrectas'] = 0;
        $_SESSION['preguntasIncorrectas'] = 0;
      }
    }



    $valores =   $dao_formularioLogin->consultaConcursoPreguntas($_REQUEST);


    echo json_encode(

      array(



        'mensaje' => 'no existe',

        'nivel' => $_SESSION['nivel'],

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

    foreach($_POST['preguntaId'] as $key => $pregunta){

      echo $pregunta.$_POST["respuesta_".($key+1)]."<br>";
      echo "respuesta_".($key+1)."<br>";
      
    }



    break;



  case 'registraRespuestas':







    $resultado = $dao_formularioLogin->consultaEstado($_REQUEST["capacitacion"], $_SESSION[ID]);



    $dato_cap = $dao_formularioLogin->consultaFormularios($_REQUEST["capacitacion"]);



    for ($i = 0; $i <= $dato_cap["cantidad_preguntas"]; $i++) { // el 20 cantidad de preguntas del formulario

      //  (alt 21 en teclado) § <- agrego este caracter especial para que no interfiera con el explode porque es muy raro su uso

      $idarray = explode("§", $_REQUEST[$i]);

      $id_pregunta = $idarray[0];

      $numero_opcion_seleccionado = $idarray[2]; // este es el numero de todas las opciones que selecciono el estudiante

      $respuesta_seleccionado = $idarray[1]; //este el texto



      if ($id_pregunta) {



        $resultado_registro = $dao_formularioLogin->registrarRespuestas($id_pregunta, $respuesta_seleccionado, $numero_opcion_seleccionado, $_SESSION[ID], $resultado["intentos"]);
      }
    }





    if ($_SESSION[ID]) {





      // conteo de puntos obtenidos y envio de correo

      $contadorPuntos = 0;

      $puntosObtenidos = 0;

      $indice = 1;

      $resultado_examen = $dao_formularioLogin->resultadosExamen($_REQUEST["capacitacion"], $_SESSION[ID]);





      foreach ($resultado_examen as $value) {



        if ($value["respuesta_seleccionada"] === $value["respuesta"]) {

          $puntosObtenidos += $value["puntaje"];
        }



        $indice++; // el contador de la lista que se muestra



      }



      //registro de notas

      $dao_formularioLogin->registro_calificaciones($_SESSION[ID], $_REQUEST["capacitacion"], $puntosObtenidos);



      //correo de notas obtenida

      $mensaje = $dao_formularioLogin->pantillaResultadoNotas($puntosObtenidos, $dato_cap["nombre"], $_SESSION[NOMBRE], $_SESSION[APELLIDO]);

      $cMail->send_mail("Informes DMC", $_SESSION[CORREO], $_SESSION[NOMBRE], "", "", "", "INFORME CURSOS DMC", $mensaje);



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





    echo $dao_formularioLogin->listaCapacitaciones($_SESSION[ID]);





    break;





  case 'registroAlumno':

    $mail = $_REQUEST["correo"];

    $contraseña = $_REQUEST["contraseña"];

    $nombres = $_REQUEST["nombres"];

    $hash = md5(rand(0, 1000));



    $link = 'https://certificaciones.dmc.pe/suscripcion/mensaje_confirmacion.php?email=' . $mail . '&hash=' . $hash;





    $mensaje = $dao_formularioLogin->plantillaConfirmacion($link, $mail, $contraseña);



    if ($_REQUEST["contraseña"] == $_REQUEST["repita_contraseña"]) { // comparativa de contraseñas

      $valor = $dao_formularioLogin->consultaUsuarioexistente($_REQUEST, $hash);

      if ($valor > 0) { //validar usuario existente

        echo '



        el correo ya esta registrado



        ';
      } else { //

        $resultado = $dao_formularioLogin->registrarUsuario($_REQUEST, $hash);

        if ($resultado = "ok") {

          echo  $cMail->send_mail("Informes DMC", $mail, $nombres, "", "", "", "INFORME CURSOS DMC", $mensaje);
        }
      }
    } else {

      echo 'Las contraseñas son distintas. ';
    }





    break;

  default:

    return "vacio";

    break;
}
