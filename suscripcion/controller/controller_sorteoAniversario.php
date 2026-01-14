<?php



require "../dao/dao_sorteo.php";

require "../dao/dao_mail.php";



  $sorteoAniversario = new sorteoAniversario();







 $opcion = $_REQUEST['op'];







 switch ($opcion) {



   case 'registro':


       $nombres = $_REQUEST['nombres'];
       $apellidos = $_REQUEST['apellidos'];
       $celular = $_REQUEST['phone'];
       $mail = $_REQUEST['mail'];
       $tDocumento = $_REQUEST['tDocumento'];
       $nro_documento = $_REQUEST['nro_documento'];
       $genero = $_REQUEST['b1_genero'];
       $edad = $_REQUEST['edad'];
       $pais = $_REQUEST['pais'];


  $profesion = $_REQUEST['b4_formacion'];
  if ($profesion =='0') {
  $profesion = $_REQUEST['b4_otro'];
  }




              $id_ficha = $sorteoAniversario->registrar($nombres,$apellidos,$celular,$mail,$tDocumento,$nro_documento,
              $genero,$edad,$pais,$profesion);

            // $id_ficha = 333;
       echo $sorteoAniversario->registrar_datosSecundarios($id_ficha,$_REQUEST);

       $sorteoAniversario->registrar_codigo($id_ficha,'3235');

       $cMail = new mail();
     $valor = $sorteoAniversario->consulta_correlativo();


     if ($valor['numero'] <= 300) {
      //$mensaje = $sorteoAniversario->mensajeCursoGratuito();

     }else {
       //$mensaje = $sorteoAniversario->mensajeVacanteAgotada();

     }

     $cMail->send_mail("Informes DMC", $mail, $nombres, "", "", "", "Curso gratuito | Introducción a la Analítica de Datos", $mensaje);

//----







     break;

   case 'registro_matematica':
   $nombres = $_REQUEST['nombres'];
   $apellidos = $_REQUEST['apellidos'];
   $celular = $_REQUEST['phone'];
   $mail = $_REQUEST['mail'];
   $tDocumento = $_REQUEST['tDocumento'];
   $nro_documento = $_REQUEST['nro_documento'];


  $contador = 0;
    if ($_REQUEST['b1'] == "101°") {
      $contador ++;
    }

    if ($_REQUEST['b2'] == "Tales de Mileto") {
      $contador ++;
    }

    if ($_REQUEST['b3'] == "Cilindro") {
      $contador ++;
    }

    if ($_REQUEST['b4'] == "Infinitos") {
      $contador ++;
    }

    if ($_REQUEST['b5'] == "La relación entre masa y energía") {
      $contador ++;
    }

    if ($_REQUEST['b6'] == "8 minutos") {
      $contador ++;
    }

    if ($_REQUEST['b7'] == "2032") {
      $contador ++;
    }
    if ($_REQUEST['b8'] == "Katherine G. Johnson") {
      $contador ++;
    }
    if ($_REQUEST['b9'] == "Pitágoras") {
      $contador ++;
    }
    if ($_REQUEST['b10'] == "Poisson") {
      $contador ++;
    }

    $id_ficha = $sorteoAniversario->registrarCuestionarioMatematica($nombres,$apellidos,$celular,$mail,$tDocumento,$nro_documento);
    $sorteoAniversario->registrar_codigo($id_ficha,'2485');
    echo  $sorteoAniversario->registrar_datosCurso($id_ficha,$_REQUEST,$contador);

    $_SESSION["status"] = "ok";

  if ($contador >= 7 ) {
      $mensaje = $sorteoAniversario->mensajeSieteMasCorrectas($contador);
  }else {
      $mensaje = $sorteoAniversario->mensajeSeisMenosCorrectas($contador);
  }
 $cMail = new mail();
  $cMail->send_mail("Informes DMC", $mail, $nombres, "", "", "", "DMC | Math Challenge", $mensaje);

     break;

     case 'registro_matematica_comerciales':
     $nombres = $_REQUEST['nombres'];
     $apellidos = $_REQUEST['apellidos'];
     $celular = $_REQUEST['phone'];
     $mail = $_REQUEST['mail'];
     $tDocumento = $_REQUEST['tDocumento'];
     $nro_documento = $_REQUEST['nro_documento'];


    $contador = 0;
      if ($_REQUEST['b1'] == "101°") {
        $contador ++;
      }

      if ($_REQUEST['b2'] == "Tales de Mileto") {
        $contador ++;
      }

      if ($_REQUEST['b3'] == "Cilindro") {
        $contador ++;
      }

      if ($_REQUEST['b4'] == "Infinitos") {
        $contador ++;
      }

      if ($_REQUEST['b5'] == "La relación entre masa y energía") {
        $contador ++;
      }

      if ($_REQUEST['b6'] == "8 minutos") {
        $contador ++;
      }

      if ($_REQUEST['b7'] == "2032") {
        $contador ++;
      }
      if ($_REQUEST['b8'] == "Katherine G. Johnson") {
        $contador ++;
      }
      if ($_REQUEST['b9'] == "Pitágoras") {
        $contador ++;
      }
      if ($_REQUEST['b10'] == "Poisson") {
        $contador ++;
      }

      $id_ficha = $sorteoAniversario->registrarCuestionarioMatematica($nombres,$apellidos,$celular,$mail,$tDocumento,$nro_documento);

      $sorteoAniversario->registrar_codigo($id_ficha,'2492');
      
      echo  $sorteoAniversario->registrar_datosCurso($id_ficha,$_REQUEST,$contador);

      $_SESSION["status"] = "ok";

    if ($contador >= 7 ) {

        $mensaje = $sorteoAniversario->mensajeSieteMasCorrectas($contador);

    }else {

        $mensaje = $sorteoAniversario->mensajeSeisMenosCorrectas($contador);
        
    }
   $cMail = new mail();
    $cMail->send_mail("Informes DMC", $mail, $nombres, "", "", "", "DMC | Math Challenge", $mensaje);

       break;

   default:



     // code...



     break;



 }
