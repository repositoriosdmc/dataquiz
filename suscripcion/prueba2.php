
<?php
require_once  "dao/gestionbd.php";
require_once  "dao/dao_suscripcion.php";


 $suscripcion=new suscripcion();



  $gbd=Gestionbd::getInstancia();
  $sql="SELECT * FROM formularios_red_social WHERE ESTADO_ENVIO = 0 and PLANTILLA = 'AUTOMATICA'";
//  $sql="SELECT * FROM formularios_red_social WHERE  PLANTILLA = 'AUTOMATICA' and ID_FORM = 1477 ";
  $cmd=$gbd->prepare($sql);

  $cmd->execute();
  $lista=$cmd->fetchAll(PDO::FETCH_ASSOC);


   //   foreach ($lista as $value) {
   //
   //
   //    echo $value['correo']."<br>";
   //    echo $value['id_form']."<br> codigo:  ";
   //    echo $value['codigo']."<br>";
   //
   // if ($value['id_form']) {
   //      echo $mensaje = $suscripcion->ficha_facebook($value['codigo'],$value['nombre'],$value['correo']);
   //
   //
   //
   //    $sql="UPDATE formularios_red_social set ESTADO_ENVIO = 1 where ID_FORM = :id_form";
   //
   //    $cmd=$gbd->prepare($sql);
   //
   //   $cmd->bindparam(':id_form',$value['id_form']);
   //
   //     $cmd->execute();
   //  }
   //
   //
   //  }




 ?>
