<?php

require_once "../dao/dao_menbresia_cursoGratis.php";

require_once "../dao/dao_mail.php";



$menbresia_cursoGratis = new menbresia_cursoGratis();



$opcion = $_REQUEST['op'];



$nombres = $_REQUEST['nombres'];

$apellidos = $_REQUEST['apellidos'];

$edad = '';

$tDocumento = $_REQUEST['tDocumento'];

$num_documento =  $_REQUEST['num_documento'];

$correo = $_REQUEST['correo'];

$phone = $_REQUEST['phone'];



switch ($opcion) {

  case 'plan_gratuito':



 $codigo_ficha = $_REQUEST['codigo_ficha'];

   $fecha = date("Y-m-d H:i:s");
//
$pais = $_REQUEST['pais'];

   $id_ficha = $menbresia_cursoGratis->registrar_plan($pais,$nombres,$apellidos,$edad,$tDocumento,$num_documento,$correo,$phone,$fecha);

 echo $resultado = $menbresia_cursoGratis->registrar_codigo_ficha($id_ficha,$codigo_ficha);





    break;





  case 'sorteo':

   $codigo_ficha = $_REQUEST['codigo_ficha'];

 $mensaje = $_REQUEST['mensaje'];



 $contador = strlen($num_documento);

 if ($contador == 8 and $tDocumento == "DNI") {



    $id_ficha = $menbresia_cursoGratis->registrar_ficha_sorteo($nombres,$apellidos,$correo,$phone,$tDocumento,$num_documento);

   $resultado = $menbresia_cursoGratis->registrar_codigo_ficha($id_ficha,'1836');



    echo $resultado;

 }else if ($tDocumento == "OTROS") {



  $id_ficha = $menbresia_cursoGratis->registrar_ficha_sorteo($nombres,$apellidos,$correo,$phone,$tDocumento,$num_documento);

echo $resultado = $menbresia_cursoGratis->registrar_codigo_ficha($id_ficha,'1836');



 }else{

  echo "contador";

 }



  break;







  case 'curso_gratis':

   $fecha = date("Y-m-d H:i:s");

   $codigo_ficha = $_REQUEST['codigo_ficha'];

    $nombres;
    $apellidos;
    $correo;
    $phone;

//1630


    $id_ficha = $menbresia_cursoGratis->registrar_ficha($nombres,$apellidos,$correo,$phone);

  echo $resultado = $menbresia_cursoGratis->registrar_codigo_ficha($id_ficha,'1814');



  break;



  default:

    // code...

    break;

}





 ?>
