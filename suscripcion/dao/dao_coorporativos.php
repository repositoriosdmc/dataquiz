<?php

require_once "gestionbd.php";

class coorporativos{


  public function consulta_cursos()
  {

  try {
      $gbd=Gestionbd::getInstancia();

      $sql = "SELECT CAPACITACION_BASE_NOMBRE,CAPACITACION_FECHA_INICIO from capacitacion
left join capacitacion_base on capacitacion.CAPACITACION_BASE_ID = capacitacion_base.CAPACITACION_BASE_CODIGO
WHERE CAPACITACION_BASE_ESTADO = '1' and CAPACITACION_FECHA_INICIO  BETWEEN '2021-12-01 00:00:00' and '2021-12-30 00:00:00'
order by CAPACITACION_FECHA_INICIO DESC";


          $cmd=$gbd->prepare($sql);

          $cmd->execute();

          $lista=$cmd->fetchAll(PDO::FETCH_ASSOC);

      echo json_encode($lista);

   }
    catch (Exception $e)
   {
      echo "ERROR: " . $e->getMessage();

   }


  }



  public function consulta_distrito()
  {

  try {
      $gbd=Gestionbd::getInstancia();

      $sql = "SELECT * from ubdistrito where idProv in ('127' ) ";

// SELECT * from ubdistrito where idProv in ('127','67' ) and idDist not in ('685',686,687,688,689,690,691,692)";
          $cmd=$gbd->prepare($sql);

          $cmd->execute();

          $lista=$cmd->fetchAll(PDO::FETCH_ASSOC);

      echo json_encode($lista);

   }
    catch (Exception $e)
   {
      echo "ERROR: " . $e->getMessage();

   }


  }

// registrar ficha contacto


public function registro_ficha($FICHA_CONTACTO_CENTRO_TRABAJO,$FICHA_CONTACTO_NOMBRES,$FICHA_CONTACTO_APELLIDOS,
$FICHA_CONTACTO_CARGO,$FICHA_CONTACTO_NUM_DOCUMENTO,$FICHA_CONTACTO_TELEFONO,$FICHA_CONTACTO_EMAIL){

try {
    $gbd=Gestionbd::getInstancia();



          $sql="insert into ficha_contacto(FICHA_CONTACTO_CENTRO_TRABAJO,FICHA_CONTACTO_NOMBRES,FICHA_CONTACTO_APELLIDOS,FICHA_CONTACTO_CARGO,FICHA_CONTACTO_NUM_DOCUMENTO,
          FICHA_CONTACTO_TELEFONO,FICHA_CONTACTO_EMAIL,FECHA_REGISTRO)
              values
           (:FICHA_CONTACTO_CENTRO_TRABAJO,:FICHA_CONTACTO_NOMBRES,:FICHA_CONTACTO_APELLIDOS,:FICHA_CONTACTO_CARGO,:FICHA_CONTACTO_NUM_DOCUMENTO,
           :FICHA_CONTACTO_TELEFONO,:FICHA_CONTACTO_EMAIL,now())";



      $cmd=$gbd->prepare($sql);

      $cmd->bindparam(':FICHA_CONTACTO_CENTRO_TRABAJO',$FICHA_CONTACTO_CENTRO_TRABAJO);
      $cmd->bindparam(':FICHA_CONTACTO_NOMBRES',$FICHA_CONTACTO_NOMBRES);
      $cmd->bindparam(':FICHA_CONTACTO_APELLIDOS',$FICHA_CONTACTO_APELLIDOS);
      $cmd->bindparam(':FICHA_CONTACTO_CARGO',$FICHA_CONTACTO_CARGO);
      $cmd->bindparam(':FICHA_CONTACTO_NUM_DOCUMENTO',$FICHA_CONTACTO_NUM_DOCUMENTO);
      $cmd->bindparam(':FICHA_CONTACTO_TELEFONO',$FICHA_CONTACTO_TELEFONO);
      $cmd->bindparam(':FICHA_CONTACTO_EMAIL',$FICHA_CONTACTO_EMAIL);


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


// ficha_contacto_capacitacion

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



public function registro_corporativo($ID_FICHA_CONTACTO,$AREA,$CORREO_CORPORATIVO,$DISTRITO,$TIPO_DIRECCION,$AVENIDA,$MANZANA,$LOTE,$NUMERO,$REFERENCIA,$CURSO_1,$CURSO_2,$CURSO_3,$TIPO_REGISTRO){

try {
    $gbd=Gestionbd::getInstancia();


    $sql="insert into corporativo(ID_FICHA_CONTACTO,AREA,CORREO_CORPORATIVO,DISTRITO,TIPO_DIRECCION,AVENIDA,MANZANA,LOTE,NUMERO,REFERENCIA,CURSO_1,CURSO_2,CURSO_3,TIPO_REGISTRO)
        values
     (:ID_FICHA_CONTACTO,:AREA,:CORREO_CORPORATIVO,:DISTRITO,:TIPO_DIRECCION,:AVENIDA,:MANZANA,:LOTE,:NUMERO,:REFERENCIA,:CURSO_1,:CURSO_2,:CURSO_3,:TIPO_REGISTRO)";

     $cmd=$gbd->prepare($sql);

     $cmd->bindparam(':ID_FICHA_CONTACTO',$ID_FICHA_CONTACTO);
     $cmd->bindparam(':AREA',$AREA);
     $cmd->bindparam(':CORREO_CORPORATIVO',$CORREO_CORPORATIVO);
     $cmd->bindparam(':DISTRITO',$DISTRITO);
     $cmd->bindparam(':TIPO_DIRECCION',$TIPO_DIRECCION);
     $cmd->bindparam(':AVENIDA',$AVENIDA);
     $cmd->bindparam(':MANZANA',$MANZANA);
     $cmd->bindparam(':LOTE',$LOTE);
     $cmd->bindparam(':NUMERO',$NUMERO);
     $cmd->bindparam(':REFERENCIA',$REFERENCIA);
     $cmd->bindparam(':CURSO_1',$CURSO_1);
     $cmd->bindparam(':CURSO_2',$CURSO_2);
     $cmd->bindparam(':CURSO_3',$CURSO_3);
     $cmd->bindparam(':TIPO_REGISTRO',$TIPO_REGISTRO);
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


}

?>
