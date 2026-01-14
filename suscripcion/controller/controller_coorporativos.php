<?php


require_once "../dao/dao_coorporativos.php";

$coorporativos = new coorporativos();

  $opcion = $_REQUEST['op'];


  switch ($opcion) {
    case 'consulta':
     echo $valor = $coorporativos->consulta_cursos();
      break;

    case 'consulta_distrito':
         echo $distrito = $coorporativos->consulta_distrito();

    break;

    case 'registro_alumno_corporativo':

    $codigo_ficha = '123';

  $empresa  = $_REQUEST['empresa'];
  $nombres  = $_REQUEST['nombres'];
  $apellidos  = $_REQUEST['apellidos'];
  $cargo  = $_REQUEST['cargo'];
  $u_trabajo  = $_REQUEST['u_trabajo']; //corporativo
  $dni  = $_REQUEST['dni'];
  $celular  = $_REQUEST['celular'];
  $correo_corporativo  = $_REQUEST['correo_corporativo'];//corporativo
  $correo_personal  = $_REQUEST['correo_personal'];

  $cursos  = $_REQUEST['cursos'];//corporativo




    $id_ficha = $coorporativos->registro_ficha($empresa,$nombres,$apellidos,
   $cargo,$dni,$celular,$correo_personal);

   $codigo = $coorporativos->registrar_codigo_ficha($id_ficha,$codigo_ficha);

    echo  $resultado = $coorporativos->registro_corporativo($id_ficha,$u_trabajo,$correo_corporativo,'','','','','','','',$cursos[0],$cursos[1],$cursos[2],'ALUMNOS CORPORATIVOS');


    break;


case 'registro_desayuno_corporativo':

  $codigo_ficha = '123';

    $empresa  = $_REQUEST['empresa'];
    $nombres  = $_REQUEST['nombres'];
    $apellidos  = $_REQUEST['apellidos'];
    $cargo  = $_REQUEST['cargo'];
    $unidad_trabajo  = $_REQUEST['unidad_trabajo'];//corporativo
    $dni  = $_REQUEST['dni'];
    $celular  = $_REQUEST['celular'];
    $correo_corporativo  = $_REQUEST['correo_corporativo'];//corporativo
    $correo_personal  = $_REQUEST['correo_personal'];
    $distrito  = $_REQUEST['distrito'];//corporativo
    $tipo_direccion  = $_REQUEST['tipo_direccion'];//corporativo
    $avenida  = $_REQUEST['avenida'];//corporativo
    $manzana  = $_REQUEST['manzana'];//corporativo
    $lote  = $_REQUEST['lote'];//corporativo
    $numero  = $_REQUEST['numero'];//corporativo
    $referencia  = $_REQUEST['referencia'];//corporativo

      $id_ficha = $coorporativos->registro_ficha($empresa,$nombres,$apellidos,
     $cargo,$dni,$celular,$correo_personal);

    $codigo = $coorporativos->registrar_codigo_ficha($id_ficha,$codigo_ficha);

     echo  $resultado = $coorporativos->registro_corporativo($id_ficha,$unidad_trabajo,$correo_corporativo,$distrito,$tipo_direccion,$avenida,$manzana,$lote,$numero,$referencia,'','','','DESAYUNO CORPORATIVO');
  break;


    default:
      // code...
      break;
  }
