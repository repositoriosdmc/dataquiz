<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "dao_certificado_doble.php";

$certificado = new certificadoPDF();

/*$piedra = $certificado->pdf_agregar_imagen("ESPECIALIZACIÓN DMC");

var_dump($piedra);

echo $piedra["fondo"];*/


$alumnos = array (
    /*array(
        "codigo" =>1,
        "nombre" =>"Marco",
        "apellidos" =>"Medrano Contreras",
        "capacitacion" =>"GOOGLE CLOUD PLATFORM FUNDAMENTALS",
        "calificacion" =>14,
        "tipo" => "ESPECIALIZACIÓN DMC",
        "horas_academicas" => 25,
        "fecha_fin" => "2021-08-01",
        "email" =>"marco.medrano@dataminingperu.com",
        "asistencia"=>1
    ),*/

    /* CURSO GRATUITO */
    /*array(
        "codigo" =>1,
        "nombre" =>"CESAR01",
        "apellidos" =>"QUEZADA",
        "capacitacion" =>"Curso gratuito prueba",
        "calificacion" =>18,
        "tipo" => "CURSO GRATUITO",
        "horas_academicas" => 9,
        "fecha_fin" => "2021-08-01",
        "email" =>"cesar.quezada@dmc.pe",
        "asistencia"=>0.8
    ),

    array(
        "codigo" =>1,
        "nombre" =>"CESAR02",
        "apellidos" =>"QUEZADA",
        "capacitacion" =>"Curso gratuito prueba",
        "calificacion" =>15,
        "tipo" => "CURSO GRATUITO",
        "horas_academicas" => 9,
        "fecha_fin" => "2021-08-01",
        "email" =>"cesar.quezada@dmc.pe",
        "asistencia"=>0.6
    ),

    array(
        "codigo" =>1,
        "nombre" =>"CESAR03",
        "apellidos" =>"QUEZADA",
        "capacitacion" =>"Curso gratuito prueba",
        "calificacion" =>10,
        "tipo" => "CURSO GRATUITO",
        "horas_academicas" => 9,
        "fecha_fin" => "2021-08-01",
        "email" =>"cesar.quezada@dmc.pe",
        "asistencia"=>1
    ),

    array(
        "codigo" =>1,
        "nombre" =>"CESAR04",
        "apellidos" =>"QUEZADA",
        "capacitacion" =>"Curso gratuito prueba",
        "calificacion" =>16,
        "tipo" => "CURSO GRATUITO",
        "horas_academicas" => 9,
        "fecha_fin" => "2021-08-01",
        "email" =>"cesar.quezada@dmc.pe",
        "asistencia"=>1
    ),

    array(
        "codigo" =>1,
        "nombre" =>"CESAR05",
        "apellidos" =>"QUEZADA",
        "capacitacion" =>"Curso gratuito prueba",
        "calificacion" =>null,
        "tipo" => "CURSO GRATUITO",
        "horas_academicas" => 9,
        "fecha_fin" => "2021-08-01",
        "email" =>"cesar.quezada@dmc.pe",
        "asistencia"=>0.8
    ),


    array(
        "codigo" =>1,
        "nombre" =>"MARITZA01",
        "apellidos" =>"QUEZADA",
        "capacitacion" =>"Curso gratuito prueba",
        "calificacion" =>12,
        "tipo" => "CURSO GRATUITO",
        "horas_academicas" => 9,
        "fecha_fin" => "2021-08-01",
        "email" =>"maritza.vicente@dmc.pe",
        "asistencia"=>1
    ),

    array(
        "codigo" =>1,
        "nombre" =>"MARITZA02",
        "apellidos" =>"QUEZADA",
        "capacitacion" =>"Curso gratuito prueba",
        "calificacion" =>17,
        "tipo" => "CURSO GRATUITO",
        "horas_academicas" => 9,
        "fecha_fin" => "2021-08-01",
        "email" =>"maritza.vicente@dmc.pe",
        "asistencia"=>0.8
    ),

    array(
        "codigo" =>1,
        "nombre" =>"MARITZA03",
        "apellidos" =>"QUEZADA",
        "capacitacion" =>"Curso gratuito prueba",
        "calificacion" =>NULL,
        "tipo" => "CURSO GRATUITO",
        "horas_academicas" => 9,
        "fecha_fin" => "2021-08-01",
        "email" =>"maritza.vicente@dmc.pe",
        "asistencia"=>0.6
    ),

    array(
        "codigo" =>1,
        "nombre" =>"MARITZA04",
        "apellidos" =>"QUEZADA",
        "capacitacion" =>"Curso gratuito prueba",
        "calificacion" =>14,
        "tipo" => "CURSO GRATUITO",
        "horas_academicas" => 9,
        "fecha_fin" => "2021-08-01",
        "email" =>"maritza.vicente@dmc.pe",
        "asistencia"=>1
    ),

    array(
        "codigo" =>1,
        "nombre" =>"MARITZA05",
        "apellidos" =>"QUEZADA",
        "capacitacion" =>"Curso gratuito prueba",
        "calificacion" =>16,
        "tipo" => "CURSO GRATUITO",
        "horas_academicas" => 9,
        "fecha_fin" => "2021-08-01",
        "email" =>"maritza.vicente@dmc.pe",
        "asistencia"=>0.75
    ), */

    // Curso Regulares

    /*array(
        "codigo" =>1,
        "nombre" =>"Joel",
        "apellidos" =>"Lapa",
        "capacitacion" =>"Oracle for BI",
        "calificacion" =>18,
        "tipo" => "CURSO ONLINE",
        "horas_academicas" => 24,
        "fecha_ini" => "2021-10-20",
        "fecha_fin" => "2021-11-05",
        "email" =>"joel.lapa@dmc.pe",
        "asistencia"=>1
    ),

    array(
        "codigo" =>1,
        "nombre" =>"Janet",
        "apellidos" =>"Chambi",
        "capacitacion" =>"STATISTICS FOR DATA SCIENCE",
        "calificacion" =>15,
        "tipo" => "CURSO ONLINE",
        "horas_academicas" => 24,
        "fecha_ini" => "2021-11-30",
        "fecha_fin" => "2021-12-16",
        "email" =>"janet.chambi@dmc.pe",
        "asistencia"=>1
    ),

    array(
        "codigo" =>1,
        "nombre" =>"Victor",
        "apellidos" =>"Zela",
        "capacitacion" =>"Oracle for BI",
        "calificacion" =>18,
        "tipo" => "CURSO ONLINE",
        "horas_academicas" => 24,
        "fecha_ini" => "2021-10-20",
        "fecha_fin" => "2021-11-05",
        "email" =>"victor.zela@dmc.pe",
        "asistencia"=>0.83
    ),

    array(
        "codigo" =>1,
        "nombre" =>"Edwin",
        "apellidos" =>"Huaynate",
        "capacitacion" =>"Dashboards en Excel y Google Data Studio",
        "calificacion" =>19,
        "tipo" => "CURSO ONLINE",
        "horas_academicas" => 28,
        "fecha_ini" => "2021-11-26",
        "fecha_fin" => "2021-12-17",
        "email" =>"edwin.huaynate@dmc.pe",
        "asistencia"=>0.86
    ),

    array(
        "codigo" =>1,
        "nombre" =>"Maritza",
        "apellidos" =>"Vicente",
        "capacitacion" =>"Metodologías Ágiles en Business Intelligence",
        "calificacion" =>18,
        "tipo" => "CURSO ONLINE",
        "horas_academicas" => 20,
        "fecha_ini" => "2021-11-23",
        "fecha_fin" => "2021-12-07",
        "email" =>"maritza.vicente@dmc.pe",
        "asistencia"=>0.80
    ),

    array(
        "codigo" =>1,
        "nombre" =>"Angela",
        "apellidos" =>"Huacasi",
        "capacitacion" =>"Python Fundamentals",
        "calificacion" =>20,
        "tipo" => "CURSO ONLINE",
        "horas_academicas" => 24,
        "fecha_ini" => "2021-11-29",
        "fecha_fin" => "2021-12-20",
        "email" =>"angela.huacasi@dmc.pe",
        "asistencia"=>0.67
    ),*/

    array(
        "codigo" =>1,
        "nombre" =>"CESAR01",
        "apellidos" =>"Quezada",
        "capacitacion" =>"Optimización de procesos de carga para un Data Warehouse",
        "calificacion" =>18,
        "tipo" => "CURSO POWER",
        "horas_academicas" => 9,
        "fecha_ini" => "2022-03-31",
        "fecha_fin" => "2021-04-02",
        "email" =>"cesar.quezada@dmc.pe",
        "asistencia"=>1
    ),
    array(
        "codigo" =>1,
        "nombre" =>"CESAR02",
        "apellidos" =>"Quezada",
        "capacitacion" =>"Optimización de procesos de carga para un Data Warehouse",
        "calificacion" =>15,
        "tipo" => "CURSO POWER",
        "horas_academicas" => 9,
        "fecha_ini" => "2022-03-31",
        "fecha_fin" => "2021-04-02",
        "email" =>"marco.medrano@dataminingperu.com",
        "asistencia"=>1
    ),
    array(
        "codigo" =>1,
        "nombre" =>"CESAR03",
        "apellidos" =>"Quezada",
        "capacitacion" =>"Optimización de procesos de carga para un Data Warehouse",
        "calificacion" =>10,
        "tipo" => "CURSO POWER",
        "horas_academicas" => 9,
        "fecha_ini" => "2022-03-31",
        "fecha_fin" => "2021-04-02",
        "email" =>"marco.medrano@dataminingperu.com",
        "asistencia"=>1
    ),
    array(
        "codigo" =>1,
        "nombre" =>"CESAR04",
        "apellidos" =>"Quezada",
        "capacitacion" =>"Optimización de procesos de carga para un Data Warehouse",
        "calificacion" =>16,
        "tipo" => "CURSO POWER",
        "horas_academicas" => 9,
        "fecha_ini" => "2022-03-31",
        "fecha_fin" => "2021-04-02",
        "email" =>"marco.medrano@dataminingperu.com",
        "asistencia"=>1
    ),
    array(
        "codigo" =>1,
        "nombre" =>"CESAR05",
        "apellidos" =>"Quezada",
        "capacitacion" =>"Creación de indicadores y dashboards con Google Data Studio",
        "calificacion" =>"",
        "tipo" => "CURSO POWER",
        "horas_academicas" => 9,
        "fecha_ini" => "2022-03-31",
        "fecha_fin" => "2021-04-02",
        "email" =>"marco.medrano@dataminingperu.com",
        "asistencia"=>0.8
    ),
    array(
        "codigo" =>1,
        "nombre" =>"CESAR06",
        "apellidos" =>"Quezada",
        "capacitacion" =>"Creación de indicadores y dashboards con Google Data Studio",
        "calificacion" =>12,
        "tipo" => "CURSO POWER",
        "horas_academicas" => 9,
        "fecha_ini" => "2022-03-31",
        "fecha_fin" => "2021-04-02",
        "email" =>"marco.medrano@dataminingperu.com",
        "asistencia"=>1
    ),
    array(
        "codigo" =>1,
        "nombre" =>"CESAR07",
        "apellidos" =>"Quezada",
        "capacitacion" =>"Creación de indicadores y dashboards con Google Data Studio",
        "calificacion" =>17,
        "tipo" => "CURSO POWER",
        "horas_academicas" => 9,
        "fecha_ini" => "2022-03-31",
        "fecha_fin" => "2021-04-02",
        "email" =>"marco.medrano@dataminingperu.com",
        "asistencia"=>1
    ),
    array(
        "codigo" =>1,
        "nombre" =>"CESAR08",
        "apellidos" =>"Quezada",
        "capacitacion" =>"Creación de indicadores y dashboards con Google Data Studio",
        "calificacion" =>"",
        "tipo" => "CURSO POWER",
        "horas_academicas" => 9,
        "fecha_ini" => "2022-03-31",
        "fecha_fin" => "2021-04-02",
        "email" =>"marco.medrano@dataminingperu.com",
        "asistencia"=>0.6
    ),
    array(
        "codigo" =>1,
        "nombre" =>"CESAR06",
        "apellidos" =>"Quezada",
        "capacitacion" =>"Creación de indicadores y dashboards con Google Data Studio",
        "calificacion" =>14,
        "tipo" => "CURSO POWER",
        "horas_academicas" => 9,
        "fecha_ini" => "2022-03-31",
        "fecha_fin" => "2021-04-02",
        "email" =>"marco.medrano@dataminingperu.com",
        "asistencia"=>1
    ),
    array(
        "codigo" =>1,
        "nombre" =>"CESAR10",
        "apellidos" =>"Quezada",
        "capacitacion" =>"Creación de indicadores y dashboards con Google Data Studio",
        "calificacion" =>16,
        "tipo" => "CURSO POWER",
        "horas_academicas" => 9,
        "fecha_ini" => "2022-03-31",
        "fecha_fin" => "2021-04-02",
        "email" =>"marco.medrano@dataminingperu.com",
        "asistencia"=>1
    )

    
);

$url = array();

foreach ($alumnos as $key => $valor) {

    $id = $valor['codigo'];

    $nombre = urlencode($valor["nombre"]);

    $apellido = urlencode($valor["apellidos"]);

    $search = array("ESPECIALIZACIÓN EN ", "ESPECIALIZACIONES","ESPECIALIZACIÓN - ", "PEA – ", "PEA ");
    
    
    //Reemplazo del caracteres demás
    $replace   = array(""); 

    //$texto = str_replace($search, $replace, $valor["capacitacion"]);
    
    $texto = $valor["capacitacion"];
    
    $capacitacion = urlencode($texto);

    $calificacion = intval($valor["calificacion"]);

    $arrNombre = explode(" ",strtolower($valor["nombre"]));

    $arrApellidos = explode(" ",strtolower($valor["apellidos"]));

    $primerNombre = ucfirst($arrNombre[0])." ".ucfirst($arrApellidos[0]);

    $tipo = $valor["tipo"];

    $asistencia = $valor["asistencia"];

    $url = null;


    if($asistencia==1){

        $url["constanciaAsistencia"] = "https://survey.dmc.pe/academico/certificadoGeneradorDoble.php?codigo=".$id."&nombre=".$nombre."&apellidos=".$apellido."&capacitacion=".$capacitacion."&notas=".$calificacion."&horas=".$valor["horas_academicas"]."&fechaIni=".$valor["fecha_ini"]."&fechaFin=".$valor["fecha_fin"]."&tipo=".urlencode($tipo)."&documento=ASISTENCIA";

        if($calificacion>=14 && $tipo != "CURSO GRATUITO" && $tipo!= "WORKSHOP ONLINE" && $tipo!= "CURSO POWER"){

            $url["constanciaNota"] = "https://survey.dmc.pe/academico/certificado_generadorTT.php?codigo=".$id."&nombre=".$nombre."&apellidos=".$apellido."&capacitacion=".$capacitacion."&notas=".$calificacion."&horas=".$valor["horas_academicas"]."&fechaIni=".$valor["fecha_ini"]."&fechaFin=".$valor["fecha_fin"]."&tipo=".urlencode($tipo);
    
            $url["certificadoNota"] = "https://survey.dmc.pe/academico/certificadoGeneradorDoble.php?codigo=".$id."&nombre=".$nombre."&apellidos=".$apellido."&capacitacion=".$capacitacion."&notas=".$calificacion."&horas=".$valor["horas_academicas"]."&fechaIni=".$valor["fecha_ini"]."&fechaFin=".$valor["fecha_fin"]."&tipo=".urlencode($tipo)."&documento=APROBADO";
        
        }
    }
    


    $mensaje = $certificado->mensaje_certificado_digitalV2($primerNombre,$tipo,$texto);

    $asunto = $valor["capacitacion"]. " - Certificados";


    
    
    $certificado->send_mail("Área Académica",$valor['email'],$valor['nombre'],"",$url,"certificado - ".$tipo,$asunto,$mensaje);
   
    //$certificado->send_mail("Área Académica","asistente.academico@dmc.pe",$valor['nombre'],"",$url,"certificado",$asunto,$mensaje);

    //$certificado->send_mail("Área Académica","cesar.quezada@dmc.pe",$primerNombre,"",$url,"certificado",$asunto,$mensaje);
    
    //$certificado->send_mail("Área Académica","marco.medrano@dataminingperu.com",$primerNombre,"",$url,"certificado",$asunto,$mensaje);
    
    //$certificado->send_mail("Área Académica","yelsi.vega@dataminingperu.com",$primerNombre,"",$url,"certificado",$asunto,$mensaje);
    
    //$certificado->send_mail("Área Académica","carlos.chavarria@dataminingperu.com",$primerNombre,"",$url,"certificado",$asunto,$mensaje);

    //$certificado->actualizar_envio($id);
    
    var_dump( $url)."</br>";    
    # code...

    
}

//$url = "https://survey.dmc.pe/academico/certificado_generador.php?codigo=15&nombre=Marco&apellidos=Medrano&capacitacion=Introduccion a Power BI&notas=16&horas=25&fechaFin=2020-10-01&tipo=ESPECIALIZACIÓN DMC";
?>