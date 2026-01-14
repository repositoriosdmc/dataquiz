<?php
require_once "../dao/dao_sorteoPea.php";

$sorteoPea = new sorteoPea();



 $opcion = $_REQUEST['op'];

$codigo_ficha = '1643';

 $nombres = $_REQUEST['nombres'];
 $apellidos = $_REQUEST['apellidos'];
 $tipo_doc = $_REQUEST['tipo_doc'];
 $nro_documento = $_REQUEST['nro_documento'];
 $genero = $_REQUEST['genero'];
 $phone = $_REQUEST['phone'];
 $edad = $_REQUEST['edad'];
 $correo = $_REQUEST['correo'];
 $pais = $_REQUEST['pais'];
 $ciudad = $_REQUEST['ciudad'];
 $carrera = $_REQUEST['carrera'];

if ($_REQUEST['puesto_trabajo'] != 'Otros') {
 $puesto_trabajo = $_REQUEST['puesto_trabajo'];
} else {
   $puesto_trabajo = $_REQUEST['trabajo_otros']; //condicional
}





 $base_datos = $_REQUEST['base_datos'];
 $visualizacion_datos = $_REQUEST['visualizacion_datos'];
 $r_python = $_REQUEST['r_python'];
 $cloud = $_REQUEST['cloud'];
 $big_data = $_REQUEST['big_data'];
 $machine_learning = $_REQUEST['machine_learning'];
 $inteligencia_artificial = $_REQUEST['inteligencia_artificial'];
 $metodologia_agil = $_REQUEST['metodologia_agil'];
 $ninguna = $_REQUEST['ninguna'];
 $otro = $_REQUEST['otro'];

 $sector = $_REQUEST['sector'];
 $especializacion_analitica = $_REQUEST['especializacion_analitica'];


  $id_ficha = $sorteoPea->registrar($nombres,$apellidos,$tipo_doc,$nro_documento,$genero,$phone,$edad,$correo,$pais,$ciudad,
$carrera,$puesto_trabajo);

   $resultado = $sorteoPea->registrar_codigo_ficha($id_ficha,$codigo_ficha);

    echo $valor = $sorteoPea->registrar_curso_gratis_datos($id_ficha,$base_datos,$visualizacion_datos,$r_python,$cloud,$big_data,$machine_learning,
       $inteligencia_artificial,$metodologia_agil,$ninguna,$otro,$especializacion_analitica,$sector);



 ?>
