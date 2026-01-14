<?php

require_once "gestionbd.php";

class inscripcion_summit{


  public function buscar_codigo($codigo){



      $gbd=Gestionbd::getInstancia();


    $sql="SELECT cantidad FROM codigo_invitados WHERE codigo=:codigo limit 1";

          $cmd=$gbd->prepare($sql);

          $cmd->bindparam(":codigo",$codigo);

          $cmd->execute();

          $lista=$cmd->fetch(PDO::FETCH_ASSOC);




      return isset($lista['cantidad']) ? $lista['cantidad'] : 0 ;


    }


// buscar inscritos
public function buscar_incritos($codigo){



    $gbd=Gestionbd::getInstancia();

   $sql="SELECT sum(cantidad_registrados) as cantidad from inscripcion_summit WHERE codigo=:codigo group by cantidad_registrados;";

        $cmd=$gbd->prepare($sql);

        $cmd->bindparam(":codigo",$codigo);

        $cmd->execute();

        $lista=$cmd->fetch(PDO::FETCH_ASSOC);




    return isset($lista['cantidad']) ? $lista['cantidad'] : 0 ;


  }

//

public function registrar($nombre_empresa,$ruc,$telefono_empresa,$nombres,$apellidos,
 $dni,$phone,$mail,$cantidad,$codigo_generado){

    $gbd=Gestionbd::getInstancia();

    $sql="insert into inscripcion_summit(nombre_empresa,ruc,telefono_empresa,
        nombres,apellidos,numero_documento,celular,
       correo,codigo,cantidad_registrados)
        values
     (:nombre_empresa,:ruc,:telefono_empresa,:nombres,:apellidos,:dni,:celular,:correo,:codigo,
     :cantidad_registrados)";


$cmd=$gbd->prepare($sql);

$cmd->bindparam(':nombre_empresa',$nombre_empresa);
$cmd->bindparam(':ruc',$ruc);
$cmd->bindparam(':telefono_empresa',$telefono_empresa);
$cmd->bindparam(':nombres',$nombres);
$cmd->bindparam(':apellidos',$apellidos);
$cmd->bindparam(':dni',$dni);
$cmd->bindparam(':celular',$phone);
$cmd->bindparam(':correo',$mail);
$cmd->bindparam(':codigo',$codigo_generado);
$cmd->bindparam(':cantidad_registrados',$cantidad);

if ($cmd->execute()) {
return "ok";
}else {
return "no registro";
}




}

    //


    public function buscar_personas($codigo){

        $gbd=Gestionbd::getInstancia();
        $sql = 'SELECT *, cantidad_registrados - (SELECT count(*) as cantidad from invitados WHERE codigo=:codigo group by codigo) total from inscripcion_summit  WHERE codigo=:codigo';

    //  $sql="SELECT * from inscripcion_summit where codigo = :codigo";

            $cmd=$gbd->prepare($sql);

            $cmd->bindparam(":codigo",$codigo);

            $cmd->execute();

            $lista=$cmd->fetch(PDO::FETCH_ASSOC);

  echo json_encode($lista);

      }
//

public function registrar_invitados($codigo_generado,$nombres_invitado,$apellidos_invitado,
$tipo_doc,$num_doc,$phone,$mail,$pais){

    $gbd=Gestionbd::getInstancia();

    $sql="INSERT into invitados(nombres,apellidos,tipo_documento,numero_doc,telefono,email,pais,codigo)
        values
     (:nombres,:apellidos,:tipo_documento,:numero_doc,:telefono,:email,:pais,:codigo)";



$cmd=$gbd->prepare($sql);

$cmd->bindparam(':codigo',$codigo_generado);
$cmd->bindparam(':nombres',$nombres_invitado);
$cmd->bindparam(':apellidos',$apellidos_invitado);
$cmd->bindparam(':tipo_documento',$tipo_doc);
$cmd->bindparam(':numero_doc',$num_doc);
$cmd->bindparam(':telefono',$phone);
$cmd->bindparam(':email',$mail);
$cmd->bindparam(':pais',$pais);
if ($cmd->execute()) {
return "ok";
}else {
return "no registro";
}




}
//

public function registrar_gratuito($id_ficha,$nombres,$apellidos,$cargo,$nombre_empresa,$tipo_doc,$numero_doc,$phone,$correo,$pais){

    $gbd=Gestionbd::getInstancia();

    $sql="insert into invitados_directivos (id_ficha,nombre,apellido,cargo,empresa,tipo_documento,nro_documento,telefono,correo,pais)
        values
     (:id_ficha,:nombres,:apellidos,:cargo,:empresa,:tipo_doc,:numero_doc,:celular,:correo,:pais)";



$cmd=$gbd->prepare($sql);

$cmd->bindparam(':id_ficha',$id_ficha);
$cmd->bindparam(':nombres',$nombres);
$cmd->bindparam(':apellidos',$apellidos);
$cmd->bindparam(':empresa',$nombre_empresa);
$cmd->bindparam(':tipo_doc',$tipo_doc);
$cmd->bindparam(':numero_doc',$numero_doc);
$cmd->bindparam(':celular',$phone);
$cmd->bindparam(':correo',$correo);
$cmd->bindparam(':pais',$pais);
$cmd->bindparam(':cargo',$cargo);

if ($cmd->execute()) {
return "ok";
}else {
return "no registro";
}




}


// cuestionario

public function registrar_cuestionario($nombres,$apellidos,$FICHA_CONTACTO_CENTRO_TRABAJO,$tDocumento,$num_documento,
$phone,$correo,$pais,$fecha)
{

try {
    $gbd=Gestionbd::getInstancia();

$sql="insert into ficha_contacto(FICHA_CONTACTO_NOMBRES,FICHA_CONTACTO_APELLIDOS,FICHA_CONTACTO_CENTRO_TRABAJO,
FICHA_CONTACTO_TIPO_DOC,FICHA_CONTACTO_NUM_DOCUMENTO,
FICHA_CONTACTO_TELEFONO,FICHA_CONTACTO_EMAIL, FICHA_CONTACTO_PAIS,FECHA_REGISTRO)
        values
     (:nombres,:apellidos,:FICHA_CONTACTO_CENTRO_TRABAJO,:tDocumento,:num_documento,:phone,
     :correo,:pais,:fecha)";

$cmd=$gbd->prepare($sql);

$cmd->bindparam(':nombres',$nombres);
$cmd->bindparam(':apellidos',$apellidos);
$cmd->bindparam(':FICHA_CONTACTO_CENTRO_TRABAJO',$FICHA_CONTACTO_CENTRO_TRABAJO);
$cmd->bindparam(':tDocumento',$tDocumento);
$cmd->bindparam(':num_documento',$num_documento);
$cmd->bindparam(':phone',$phone);
$cmd->bindparam(':correo',$correo);
$cmd->bindparam(':pais',$pais);
$cmd->bindparam(':fecha',$fecha);
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

//

//codigo
public function registrar_codigo($id_ficha,$codigo_ficha){

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


public function registrar_cuestionario_gratuito($nombres,$apellidos,$FICHA_CONTACTO_CENTRO_TRABAJO,$tDocumento,$num_documento,
$phone,$correo,$pais,$fecha,$FICHA_CONTACTO_CARGO)
{

try {
    $gbd=Gestionbd::getInstancia();

$sql="insert into ficha_contacto(FICHA_CONTACTO_NOMBRES,FICHA_CONTACTO_APELLIDOS,FICHA_CONTACTO_CENTRO_TRABAJO,
FICHA_CONTACTO_TIPO_DOC,FICHA_CONTACTO_NUM_DOCUMENTO,
FICHA_CONTACTO_TELEFONO,FICHA_CONTACTO_EMAIL, FICHA_CONTACTO_PAIS,FECHA_REGISTRO,FICHA_CONTACTO_CARGO)
        values
     (:nombres,:apellidos,:FICHA_CONTACTO_CENTRO_TRABAJO,:tDocumento,:num_documento,:phone,
     :correo,:pais,:fecha,:FICHA_CONTACTO_CARGO)";

$cmd=$gbd->prepare($sql);

$cmd->bindparam(':nombres',$nombres);
$cmd->bindparam(':apellidos',$apellidos);
$cmd->bindparam(':FICHA_CONTACTO_CENTRO_TRABAJO',$FICHA_CONTACTO_CENTRO_TRABAJO);
$cmd->bindparam(':tDocumento',$tDocumento);
$cmd->bindparam(':num_documento',$num_documento);
$cmd->bindparam(':phone',$phone);
$cmd->bindparam(':correo',$correo);
$cmd->bindparam(':pais',$pais);
$cmd->bindparam(':fecha',$fecha);
$cmd->bindparam(':FICHA_CONTACTO_CARGO',$FICHA_CONTACTO_CARGO);
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



public function sql_ejecutar($cargo){

    $gbd=Gestionbd::getInstancia();

    // $sql="ALTER TABLE invitados MODIFY COLUMN telefono bigint";
try {

  $sql=$cargo;
  $cmd=$gbd->prepare($sql);


  if ($cmd->execute()) {
  return "ok";
  }else {
  return "no registro";
  }

} catch (\Exception $e) {
  echo "ERROR: " . $e->getMessage();
}







}




}
