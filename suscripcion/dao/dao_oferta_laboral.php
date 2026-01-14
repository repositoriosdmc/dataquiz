<?php

require_once "gestionbd.php";

class oferta_laboral{

  public function registrar_empresa($id_persona,$nombre_empresa,$ruc,$telefono,$rubro){

      $gbd=Gestionbd::getInstancia();

      $sql="insert into empresa(ID_PERSONA,NOMBRE_EMPRESA,RUC,TELEFONO,RUBRO)
          values
       (:ID_PERSONA,:NOMBRE_EMPRESA,:RUC,:TELEFONO,:RUBRO)";

  $cmd=$gbd->prepare($sql);

  $cmd->bindparam(':ID_PERSONA',$id_persona);
  $cmd->bindparam(':NOMBRE_EMPRESA',$nombre_empresa);
  $cmd->bindparam(':RUC',$ruc);
  $cmd->bindparam(':TELEFONO',$telefono);
  $cmd->bindparam(':RUBRO',$rubro);

  if ($cmd->execute()) {
  return $gbd->lastInsertId();
  }else {
  return "no registro";
  }

  }





  public function  registrar_oferta($id_empresa,$nombre_puesto,$area,$remuneracion,$requisitos,$funciones,$beneficios,$herramienta_excel,$herramienta_sql,$herramienta_oracle,$herramienta_r,
     $herramienta_python,$herramienta_cloud,$herramienta_programacion,$herramienta_sas,$herramienta_powerbi,$herramienta_tableau,$herramienta_otros,
   $id_persona,$empresa,$ruc,$telefono_empresa,$rubro){
try {
      $gbd=Gestionbd::getInstancia();

      $sql="insert into oferta_laboral(ID_EMPRESA,NOMBRE_PUESTO,AREA_POSTULACION,REMUNERACION_OFRECIDA,REQUISITOS,FUNCIONES,BENFICIOS,HERRAMIENTA_EXCEL,HERRAMIENTA_SQL,HERRAMIENTA_ORACLE,HERRAMIENTA_R,HERRAMIENTA_PYTHON,
      HERRAMIENTA_CLOUD,HERRAMIENTA_PROGRAMACION,HERRAMIENTA_SAS,HERRAMIENTA_POWER_BI,HERRAMIENTA_TABLEAU,HERRAMIENTA_OTROS,
      id_persona,nombre_empresa,ruc,telefono,rubro)
          values
       (:ID_EMPRESA,:NOMBRE_PUESTO,:AREA_POSTULACION,:REMUNERACION_OFRECIDA,:REQUISITOS,:FUNCIONES,:BENFICIOS,:HERRAMIENTA_EXCEL,:HERRAMIENTA_SQL,:HERRAMIENTA_ORACLE,:HERRAMIENTA_R,:HERRAMIENTA_PYTHON,
       :HERRAMIENTA_CLOUD,:HERRAMIENTA_PROGRAMACION,:HERRAMIENTA_SAS,:HERRAMIENTA_POWER_BI,:HERRAMIENTA_TABLEAU,:HERRAMIENTA_OTROS,
       :id_persona,:nombre_empresa,:ruc,:telefono,:rubro)";

  $cmd=$gbd->prepare($sql);

  $cmd->bindparam(':ID_EMPRESA',$id_empresa);
  $cmd->bindparam(':NOMBRE_PUESTO',$nombre_puesto);
  $cmd->bindparam(':AREA_POSTULACION',$area);
  $cmd->bindparam(':REMUNERACION_OFRECIDA',$remuneracion);
  $cmd->bindparam(':REQUISITOS',$requisitos);
  $cmd->bindparam(':FUNCIONES',$funciones);
  $cmd->bindparam(':BENFICIOS',$beneficios);
  $cmd->bindparam(':HERRAMIENTA_EXCEL',$herramienta_excel);
  $cmd->bindparam(':HERRAMIENTA_SQL',$herramienta_sql);
  $cmd->bindparam(':HERRAMIENTA_ORACLE',$herramienta_oracle);
  $cmd->bindparam(':HERRAMIENTA_R',$herramienta_r);
  $cmd->bindparam(':HERRAMIENTA_PYTHON',$herramienta_python);
  $cmd->bindparam(':HERRAMIENTA_CLOUD',$herramienta_cloud);
  $cmd->bindparam(':HERRAMIENTA_PROGRAMACION',$herramienta_programacion);
  $cmd->bindparam(':HERRAMIENTA_SAS',$herramienta_sas);
  $cmd->bindparam(':HERRAMIENTA_POWER_BI',$herramienta_powerbi);
  $cmd->bindparam(':HERRAMIENTA_TABLEAU',$herramienta_tableau);
  $cmd->bindparam(':HERRAMIENTA_OTROS',$herramienta_otros);

  $cmd->bindparam(':id_persona',$id_persona);
  $cmd->bindparam(':nombre_empresa',$empresa);
  $cmd->bindparam(':ruc',$ruc);
  $cmd->bindparam(':telefono',$telefono_empresa);
  $cmd->bindparam(':rubro',$rubro);

  if ($cmd->execute()) {
  return "ok";
  }else {
  return "no registro";
  }


}
 catch (Exception $e)
{
   echo "ERROR: " . $e->getMessage();

}


  }

// registro persona

public function registrar_persona($nombre_contacto,$apellidos_contacto,$dni,$correo_coorporativo,$celular_contacto,$cargo_contacto)
{

try {
    $gbd=Gestionbd::getInstancia();

$sql="insert into persona (PERSONA_NOMBRE,PERSONA_APELLIDOS,PERSONA_NUMERO_DOCUMENTO,PERSONA_EMAIL,PERSONA_TELEFONO1,PERSONA_CARGO) values
(:PERSONA_NOMBRE,:PERSONA_APELLIDOS,:PERSONA_NUMERO_DOCUMENTO,:PERSONA_EMAIL,:PERSONA_TELEFONO1,:PERSONA_CARGO)";

$cmd=$gbd->prepare($sql);

$cmd->bindparam(':PERSONA_NOMBRE',$nombre_contacto);
$cmd->bindparam(':PERSONA_APELLIDOS',$apellidos_contacto);
$cmd->bindparam(':PERSONA_NUMERO_DOCUMENTO',$dni);
$cmd->bindparam(':PERSONA_EMAIL',$correo_coorporativo);
$cmd->bindparam(':PERSONA_TELEFONO1',$celular_contacto);
$cmd->bindparam(':PERSONA_CARGO',$cargo_contacto);


if ($cmd->execute()) {
  return $gbd->lastInsertId();
}else {
return "no registro";
}


 }
  catch (Exception $e)
 {
    echo "ERROR: " . $e->getMessage();

 }


}



}

?>
