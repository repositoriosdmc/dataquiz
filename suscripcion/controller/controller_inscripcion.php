<?php


require_once "../dao/dao_inscripcion_summit.php";

$inscripcion_summit = new inscripcion_summit();

  $opcion = $_REQUEST['op'];
switch ($opcion) {

  case 'crear_codigo':

 $cadena_aleatoria = substr( md5( time() . rand() ), 0, 8 );
echo strtoupper($cadena_aleatoria);



    break;
  case 'lista_invitados':
   $fecha = date("Y-m-d H:i:s");
   $codigo_ficha = $_REQUEST['codigo_ficha'];
$nombre_empresa = $_REQUEST['nombre_empresa'];
$ruc = $_REQUEST['ruc'];
 $telefono_empresa = $_REQUEST['telefono_empresa'];
$nombres = $_REQUEST['nombres'];
$apellidos = $_REQUEST['apellidos'];
$dni = $_REQUEST['dni'];
$phone = $_REQUEST['phone'];
 $mail = $_REQUEST['mail'];
 $cantidad = $_REQUEST['cantidad'];
 $codigo_generado = $_REQUEST['codigo_generado'];

//aca
$id_ficha = $inscripcion_summit->registrar_cuestionario($nombres,$apellidos,$nombre_empresa,'DNI',$dni,
$phone,$mail,'',$fecha);

 $respuesta = $inscripcion_summit->registrar_codigo($id_ficha,$codigo_ficha);
 echo $resultado = $inscripcion_summit->registrar($nombre_empresa,$ruc,$telefono_empresa,$nombres,$apellidos,
  $dni,$phone,$mail,$cantidad,$codigo_generado);
  break;

  case 'inscripcion_invitados':
   $resultado = $_REQUEST['resultado'];

echo $valor = $inscripcion_summit->buscar_personas($resultado);
  break;

  case 'registro_invitados':

$codigo_generado = $_REQUEST['codigo_generado'];
 $nombres_invitado = $_REQUEST['nombres_invitado'];
$apellidos_invitado = $_REQUEST['apellidos_invitado'];
$tipo_doc = $_REQUEST['tipo_doc'];
$num_doc = $_REQUEST['num_doc'];
$phone = $_REQUEST['phone'];
$mail = $_REQUEST['mail'];
 $pais = $_REQUEST['pais'];

echo $valor = $inscripcion_summit->registrar_invitados($codigo_generado,$nombres_invitado,$apellidos_invitado,
$tipo_doc,$num_doc,$phone,$mail,$pais);
  break;



  case 'lista-gratuitos':

   $fecha = date("Y-m-d H:i:s");


 $nombres = $_REQUEST['nombres'];
 $apellidos = $_REQUEST['apellidos'];
 $nombre_empresa = $_REQUEST['nombre_empresa'];
 $tipo_doc = $_REQUEST['tipo_doc'];
 $numero_doc = $_REQUEST['numero_doc'];
 $phone = $_REQUEST['phone'];
 $correo = $_REQUEST['correo'];

 if ($_REQUEST['pais'] == 'Otro') {
    $pais = $_REQUEST['otro_pais'];
 } else {
    $pais = $_REQUEST['pais'];
 }

  $cargo = $_REQUEST['cargo'];

   $id_ficha = $inscripcion_summit->registrar_cuestionario_gratuito($nombres,$apellidos,$nombre_empresa,$tipo_doc,$numero_doc,
   $phone,$correo,$pais,$fecha,$cargo);

echo  $respuesta = $inscripcion_summit->registrar_codigo($id_ficha,2410);

//    echo $resultado = $inscripcion_summit->registrar_gratuito($id_ficha,$nombres,$apellidos,$cargo,$nombre_empresa,$tipo_doc,$numero_doc,$phone,$correo,$pais);

  break;

  case 'pruebaSql':

      $cargo = $_REQUEST['correo'];
    echo $resultado = $inscripcion_summit->sql_ejecutar($cargo);

  break;
  default:
    // code...
    break;
}

 ?>
