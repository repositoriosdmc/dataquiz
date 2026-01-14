<?php


require_once "../dao/dao_oferta_laboral.php";

$oferta_laboral = new oferta_laboral();

// empresa
  $empresa = $_REQUEST['empresa'];
  $ruc = $_REQUEST['ruc'];
  $telefono_empresa = $_REQUEST['telefono_empresa'];
  $rubro = $_REQUEST['rubro'];

// solicitante
  $nombre_contacto = $_REQUEST['nombre_contacto'];
  $apellidos_contacto = $_REQUEST['apellidos_contacto'];
  $dni = $_REQUEST['dni'];
  $correo_coorporativo = $_REQUEST['correo_coorporativo'];
  $celular_contacto = $_REQUEST['celular_contacto'];
  $cargo_contacto = $_REQUEST['cargo_contacto'];

// oferta
  $nombre_puesto = $_REQUEST['nombre_puesto'];
  $area = $_REQUEST['area'];
  $remuneracion = $_REQUEST['remuneracion'];

  $requisitos = $_REQUEST['requisitos'];
  $funciones = $_REQUEST['funciones'];
  $beneficios = $_REQUEST['beneficios'];

//
   $herramienta_excel = $_REQUEST['herramienta_excel'];
   $herramienta_sql = $_REQUEST['herramienta_sql'];
   $herramienta_oracle = $_REQUEST['herramienta_oracle'];
   $herramienta_r = $_REQUEST['herramienta_r'];
   $herramienta_python = $_REQUEST['herramienta_python'];
   $herramienta_cloud = $_REQUEST['herramienta_cloud'];
   $herramienta_programacion = $_REQUEST['herramienta_programacion'];
   $herramienta_sas = $_REQUEST['herramienta_sas'];
   $herramienta_powerbi = $_REQUEST['herramienta_powerbi'];
   $herramienta_tableau = $_REQUEST['herramienta_tableau'];
   $herramienta_otros = $_REQUEST['herramienta_otros'];



       $id_persona = $oferta_laboral->registrar_persona($nombre_contacto,$apellidos_contacto,$dni,$correo_coorporativo,$celular_contacto,$cargo_contacto);

       // $id_empresa = $oferta_laboral->registrar_empresa($id_persona,$empresa,$ruc,$telefono_empresa,$rubro);

  echo $valor = $oferta_laboral->registrar_oferta(0,$nombre_puesto,$area,$remuneracion,$requisitos,$funciones,$beneficios,$herramienta_excel,$herramienta_sql,$herramienta_oracle,$herramienta_r,
    $herramienta_python,$herramienta_cloud,$herramienta_programacion,$herramienta_sas,$herramienta_powerbi,$herramienta_tableau,$herramienta_otros,
  $id_persona,$empresa,$ruc,$telefono_empresa,$rubro);

?>
