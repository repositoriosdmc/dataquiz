<?php

require_once "gestionbd.php";

class sorteoPea{

  public function registrar($nombres,$apellidos,$tipo_doc,$nro_documento,$genero,$phone,$edad,$correo,$pais,$ciudad,
 $carrera,$puesto_trabajo){


      $gbd=Gestionbd::getInstancia();



      $sql="insert into ficha_contacto (FICHA_CONTACTO_NOMBRES,FICHA_CONTACTO_APELLIDOS,FICHA_CONTACTO_TIPO_DOC,FICHA_CONTACTO_NUM_DOCUMENTO,
      FICHA_CONTACTO_SEXO,FICHA_CONTACTO_TELEFONO,FICHA_CONTACTO_EDAD,FICHA_CONTACTO_EMAIL,FICHA_CONTACTO_PAIS,FICHA_CONTACTO_PROVINCIA,
FICHA_CONTACTO_PROFESION,FICHA_CONTACTO_CARGO,FECHA_REGISTRO
)values
 (:FICHA_CONTACTO_NOMBRES,:FICHA_CONTACTO_APELLIDOS,:FICHA_CONTACTO_TIPO_DOC,:FICHA_CONTACTO_NUM_DOCUMENTO
,:FICHA_CONTACTO_SEXO,:FICHA_CONTACTO_TELEFONO,:FICHA_CONTACTO_EDAD,:FICHA_CONTACTO_EMAIL,:FICHA_CONTACTO_PAIS,:FICHA_CONTACTO_PROVINCIA
,:FICHA_CONTACTO_PROFESION,:FICHA_CONTACTO_CARGO,now()) ";



  $cmd=$gbd->prepare($sql);



  $cmd->bindparam(':FICHA_CONTACTO_NOMBRES',$nombres);
  $cmd->bindparam(':FICHA_CONTACTO_APELLIDOS',$apellidos);
  $cmd->bindparam(':FICHA_CONTACTO_TIPO_DOC',$tipo_doc);
  $cmd->bindparam(':FICHA_CONTACTO_NUM_DOCUMENTO',$nro_documento);
  $cmd->bindparam(':FICHA_CONTACTO_SEXO',$genero);
  $cmd->bindparam(':FICHA_CONTACTO_TELEFONO',$phone);
  $cmd->bindparam(':FICHA_CONTACTO_EDAD',$edad);
  $cmd->bindparam(':FICHA_CONTACTO_EMAIL',$correo);
  $cmd->bindparam(':FICHA_CONTACTO_PAIS',$pais);
  $cmd->bindparam(':FICHA_CONTACTO_PROVINCIA',$ciudad);
  $cmd->bindparam(':FICHA_CONTACTO_PROFESION',$carrera);
  $cmd->bindparam(':FICHA_CONTACTO_CARGO',$puesto_trabajo);



//  $cmd->bindparam(':FECHA_REGISTRO',$fecha);

if ($cmd->execute()) {

		return $gbd->lastInsertId();

}else {

  return "no registro";

}

  }




  public function registrar_codigo_ficha($id_ficha,$codigo_ficha){

      $gbd=Gestionbd::getInstancia();


      $sql="insert into ficha_contacto_capacitacion(FICHA_CONTACTO_ID,CAPACITACION_ID)
          values
       (:FICHA_CONTACTO_ID,:CAPACITACION_ID)";

  $cmd=$gbd->prepare($sql);


  $cmd->bindparam(':FICHA_CONTACTO_ID',$id_ficha);
  $cmd->bindparam(':CAPACITACION_ID',$codigo_ficha);

  if ($cmd->execute()) {

    return "ok";

  }else {

  return "no registro";

  }

  }


//registrar

public function registrar_curso_gratis_datos($id_ficha,$base_datos,$visualizacion_datos,$r_python,$cloud,$big_data,$machine_learning,
   $inteligencia_artificial,$metodologia_agil,$ninguna,$otro,$especializacion_analitica,$sector){


    $gbd=Gestionbd::getInstancia();



    $sql="insert into suscrito_curso_gratis (ficha_contacto_id,p2_7_base_datos,p2_7_visualizacion_datos,p2_7_herramienta_analitica,p2_7_herramienta_cloud,
    p2_7_herramienta_big_data,p2_7_herramienta_machine_learning,p2_7_inteligencia_artificial,p2_7_metodologias_agiles,
    p2_7_ninguna,p2_7_otro,programa_especializacion,sector_trabajo)
values (:ficha_contacto_id,:p2_7_base_datos,:p2_7_visualizacion_datos,:p2_7_herramienta_analitica,:p2_7_herramienta_cloud,:p2_7_herramienta_big_data
,:p2_7_herramienta_machine_learning,:p2_7_inteligencia_artificial,:p2_7_metodologias_agiles,:p2_7_ninguna,:p2_7_otro,:especializacion_analitica,:sector_trabajo);";



$cmd=$gbd->prepare($sql);



$cmd->bindparam(':ficha_contacto_id',$id_ficha);
$cmd->bindparam(':p2_7_base_datos',$base_datos);
$cmd->bindparam(':p2_7_visualizacion_datos',$visualizacion_datos);
$cmd->bindparam(':p2_7_herramienta_analitica',$r_python);
$cmd->bindparam(':p2_7_herramienta_cloud',$cloud);
$cmd->bindparam(':p2_7_herramienta_big_data',$big_data);
$cmd->bindparam(':p2_7_herramienta_machine_learning',$machine_learning);
$cmd->bindparam(':p2_7_inteligencia_artificial',$inteligencia_artificial);
$cmd->bindparam(':p2_7_metodologias_agiles',$metodologia_agil);
$cmd->bindparam(':p2_7_ninguna',$ninguna);
$cmd->bindparam(':p2_7_otro',$otro);
$cmd->bindparam(':especializacion_analitica',$especializacion_analitica);
$cmd->bindparam(':sector_trabajo',$sector);


if ($cmd->execute()) {

  return 'ok';

}else {

return "no registro";

}

}




}


 ?>
