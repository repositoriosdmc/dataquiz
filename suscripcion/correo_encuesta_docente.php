<?php
require_once  "dao/gestionbd.php";
require "dao/dao_suscripcion.php";
$cMail = new suscripcion();

  $gbd=Gestionbd::getInstancia();
  $sql="SELECT
    cc.CAPACITACION_CLASE_ID,
    cc.FLAG_ENVIO_ENCUESTA_DOCENTE,
    cc.CAPACITACION_CLASE_FECHA,
    cb.CAPACITACION_BASE_NOMBRE,
    c.CAPACITACION_ESTADO,
cc.CAPACITACION_CLASE_NUM_SESION, c.CAPACITACION_SESIONES,cc.PROFESOR_ID
,p.PERSONA_EMAIL,p.PERSONA_NOMBRE,p.PERSONA_APELLIDOS
FROM capacitacion_clase cc
JOIN capacitacion c ON c.CAPACITACION_ID = cc.CAPACITACION_ID
join persona p on p.PERSONA_ID = cc.PROFESOR_ID
LEFT JOIN capacitacion_base cb ON cb.CAPACITACION_BASE_ID = c.CAPACITACION_BASE_ID
WHERE
 cc.CAPACITACION_CLASE_ESTADO = 1 AND
cc.CAPACITACION_CLASE_FECHA=DATE(NOW())
HAVING cc.CAPACITACION_CLASE_NUM_SESION = c.CAPACITACION_SESIONES";

  $cmd=$gbd->prepare($sql);
  $cmd->execute();
  $lista=$cmd->fetchAll(PDO::FETCH_ASSOC);

// print_r($lista);

foreach ($lista as $key => $value) {

  // echo $value["persona_nombre"];
  // echo "<br>";
  // echo $value["persona_email"];
  //   echo "<br>";
  // echo $value["flag_envio_encuesta_docente"];
  // echo "<br>";
  // echo $cMail->send_mail("Informes DMC", "carlos.mori@dataminingperu.com", "carlos mori", "", "", "", "INFORME CURSOS DMC","hola");

// echo actualizaEstado($value["capacitacion_clase_id"]);


}


function actualizaEstado($id_clase){
  $gbd=Gestionbd::getInstancia();

      try {
  $sql2="UPDATE capacitacion_clase set FLAG_ENVIO_ENCUESTA_DOCENTE = 1 where CAPACITACION_CLASE_ID = :cap_clase_id";

  $cmd=$gbd->prepare($sql2);
  $cmd->bindparam(':cap_clase_id',$id_clase);
  $cmd->execute();
  $lista=$cmd->fetch(PDO::FETCH_ASSOC);

  return "actualizado";
} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage();
}
}


 ?>
