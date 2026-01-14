<?php

require_once "../dao/dao_menbresia_cursoGratis.php";

require_once "../dao/dao_mail.php";



$menbresia_cursoGratis = new menbresia_cursoGratis();



$opcion = $_REQUEST['op'];



$nombres = $_REQUEST['nombres'];

$apellidos = $_REQUEST['apellidos'];

$edad = '';

$tDocumento = '';

$num_documento = '0';

$correo = $_REQUEST['correo'];

$phone = $_REQUEST['phone'];



switch ($opcion) {

  case 'plan_gratuito':



 $codigo_ficha = $_REQUEST['codigo_ficha'];

   $fecha = date("Y-m-d H:i:s");



   $id_ficha = $menbresia_cursoGratis->registrar_plan($nombres,$apellidos,$edad,$tDocumento,$num_documento,$correo,$phone,$fecha);

 echo $resultado = $menbresia_cursoGratis->registrar_codigo_ficha($id_ficha,$codigo_ficha);





    break;





  case 'capacitacion-gratuita':

   $codigo_ficha = $_REQUEST['codigo_ficha'];

 $mensaje = $_REQUEST['mensaje'];



 $contador = strlen($num_documento);

 if ($contador == 8 and $tDocumento == "DNI") {



   $id_ficha = $menbresia_cursoGratis->registrar_ficha($nombres,$apellidos,$edad,$tDocumento,$num_documento,$correo,$phone,$mensaje,'CAPACITACION GRATUITA');

   $resultado = $menbresia_cursoGratis->registrar_codigo_ficha($id_ficha,$codigo_ficha);

   if($resultado == "ok"){

    $mail = new mail();

    $mensaje = $menbresia_cursoGratis->mensajePlataforma();

    $mail->send_mail("DMC PLATAFORMA VIRTUAL",$correo,$nombres,"","","","DMC PLATAFORMA VIRTUAL",$mensaje);
   }

    echo $resultado;

 }else if ($tDocumento == "OTROS") {



   $id_ficha = $menbresia_cursoGratis->registrar_ficha($nombres,$apellidos,$edad,$tDocumento,$num_documento,$correo,$phone,$mensaje,'CAPACITACION GRATUITA');

echo $resultado = $menbresia_cursoGratis->registrar_codigo_ficha($id_ficha,$codigo_ficha);

 }else{

  echo "contador";

 }



  break;





  case 'curso_gratis':

   $fecha = date("Y-m-d H:i:s");

   $codigo_ficha = $_REQUEST['codigo_ficha'];

   $mensaje = $_REQUEST['mensaje'];



   $id_ficha = $menbresia_cursoGratis->registrar_ficha($nombres,$apellidos,$edad,$tDocumento,$num_documento,$correo,$phone,$mensaje,'CURSO GRATIS',$fecha);

 echo $resultado = $menbresia_cursoGratis->registrar_codigo_ficha($id_ficha,$codigo_ficha);



  break;



  default:

    // code...

    break;

}





 ?>

