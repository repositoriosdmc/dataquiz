<?php


require_once  "dao/gestionbd.php";
require "dao/dao_suscripcion.php";

$mail = "carlosmorih33@gmail.com";
$nombres ="carlos";
$mensaje ="test";
$cMail = new suscripcion();
echo  $cMail->send_mail("Informes DMC", $mail, $nombres, "", "", "", "INFORME CURSOS DMC", $mensaje);

//   $gbd=Gestionbd::getInstancia();
//   $sql="SELECT * FROM formularios_red_social WHERE ID_FORM = 47347";
// //  enviar correo de prueba
//   $cmd=$gbd->prepare($sql);
//
//   $cmd->execute();
//   $lista=$cmd->fetchAll(PDO::FETCH_ASSOC);
//
//   foreach ($lista as $value) {
//      $cMail = new mail();
//
//    // echo $value['correo']."<br>";
//   echo $val = $cMail->send_mail("Informes DMC", "carlosmorih33@gmail.com", "carlos", "", "", "", "Curso gratuito | Introducción a la Analítica de Datos", "mensaje");
//
//  }



 ?>
