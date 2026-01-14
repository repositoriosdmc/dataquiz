<?php

/*error_reporting(E_ALL);
ini_set('display_errors', '1');
*/
require_once "dao_certificado.php";

$certificado = new certificadoPDF();

/*$piedra = $certificado->pdf_agregar_imagen("CURSO ONLINE");

var_dump($piedra);

echo $piedra["fondo"];*/


$alumnos = array (
    array(
        "codigo" =>1,
        "nombre" =>"Marco",
        "apellidos" =>"Medrano Contreras",
        "capacitacion" =>"GOOGLE CLOUD PLATFORM FUNDAMENTALS",
        "calificacion" => 0,
        "tipo" => "CURSO GRATUITO",
        "horas_academicas" => 25,
        "fecha_fin" => "2021-08-01",
        "email" =>"marco.medrano@dataminingperu.com"
    ),

    array(
        "codigo" =>1,
        "nombre" =>"Janet",
        "apellidos" =>"Chambi Canahuire",
        "capacitacion" =>"GOOGLE CLOUD PLATFORM FUNDAMENTALS",
        "calificacion" => 0,
        "tipo" => "CURSO GRATUITO",
        "horas_academicas" => 16,
        "fecha_fin" => "2021-03-01",
        "email" =>"janet.chambi@dmc.pe"
    ),

    array(
        "codigo" =>1,
        "nombre" =>"Angela",
        "apellidos" =>"Huacasi Parisuaña",
        "capacitacion" =>"GOOGLE CLOUD PLATFORM FUNDAMENTALS",
        "calificacion" => 0,
        "tipo" => "CURSO GRATUITO",
        "horas_academicas" => 16,
        "fecha_fin" => "2021-03-01",
        "email" =>"angela.huacasi@dmc.pe"
    ),

    array(
        "codigo" =>1,
        "nombre" =>"Victor",
        "apellidos" =>"Zela Villegas",
        "capacitacion" =>"GOOGLE CLOUD PLATFORM FUNDAMENTALS",
        "calificacion" => 0,
        "tipo" => "CURSO GRATUITO",
        "horas_academicas" => 16,
        "fecha_fin" => "2021-06-01",
        "email" =>"victor.zela@dmc.pe"
    ),

    array(
        "codigo" =>1,
        "nombre" =>"Cesar",
        "apellidos" =>"Quezada Balcazar",
        "capacitacion" =>"FUNDAMENTOS DE R",
        "calificacion" => 0,
        "tipo" => "CURSO GRATUITO",
        "horas_academicas" => 25,
        "fecha_fin" => "2021-06-01",
        "email" =>"cesar.quezada@dmc.pe"
    ),
    array(
        "codigo" =>1,
        "nombre" =>"Joel",
        "apellidos" =>"Lapa Berríos",
        "capacitacion" =>"GOOGLE CLOUD PLATFORM FUNDAMENTALS",
        "calificacion" => 0,
        "tipo" => "CURSO GRATUITO",
        "horas_academicas" => 25,
        "fecha_fin" => "2021-06-01",
        "email" =>"joel.lapa@dmc.pe"
    ),
    array(
        "codigo" =>1,
        "nombre" =>"Maritza",
        "apellidos" =>"Vicente Montes",
        "capacitacion" =>"GOOGLE CLOUD PLATFORM FUNDAMENTALS",
        "calificacion" => 0,
        "tipo" => "CURSO GRATUITO",
        "horas_academicas" => 25,
        "fecha_fin" => "2021-06-01",
        "email" =>"maritza.vicente@dmc.pe"
    ),
    
);


foreach ($alumnos as $key => $valor) {

    $id = $valor['codigo'];

    $nombre = urlencode($valor["nombre"]);

    $apellido = urlencode($valor["apellidos"]);
    
    $capacitacion = urlencode($valor["capacitacion"]);

    $calificacion = intval($valor["calificacion"]);

    $arrNombre = explode(" ",strtolower($valor["nombre"]));

    $arrApellidos = explode(" ",strtolower($valor["apellidos"]));

    $primerNombre = ucfirst($arrNombre[0])." ".ucfirst($arrApellidos[0]);

    $tipo = $valor["tipo"];

    $url = "https://survey.dmc.pe/academico/certificado_generador.php?codigo=".$id."&nombre=".$nombre."&apellidos=".$apellido."&capacitacion=".$capacitacion."&notas=".$calificacion."&horas=".$valor["horas_academicas"]."&fechaFin=".$valor["fecha_fin"]."&tipo=".urlencode($tipo);

    if($tipo == "CURSO ONLINE" || $tipo == "CURSO POWER"){

        $mensaje = $certificado->mensaje_certificado_digital($primerNombre);

        $asunto = "Certificado de Aprobación: ".$valor["capacitacion"];

    }else if($tipo == "CURSO GRATUITO"){

        $mensaje = $certificado->mensaje_curso_gratuito($primerNombre);

        if($calificacion>=14){

            $asunto = "CERTIFICADO DE APROBACIÓN: ".$valor["capacitacion"];

        }else{

            $asunto = "CONSTANCIA DE PARTICIPACIÓN: ".$valor["capacitacion"];

        }

        
        
    }else if($tipo == "TALLER ONLINE"){

        $mensaje = $certificado->mensaje_certificado_digital($primerNombre);

        $asunto = "Certificado de participación: ".$valor["capacitacion"];
        
    }
    
    
    
    $certificado->send_mail("Área Académica",$valor['email'],$valor['nombre'],"",$url,"certificado",$asunto,$mensaje);
   
    //$certificado->send_mail("Área Académica","asistente.academico@dmc.pe",$valor['nombre'],"",$url,"certificado",$asunto,$mensaje);

    //$certificado->send_mail("Área Académica","marco.medrano@dataminingperu.com",$primerNombre,"",$url,"certificado",$asunto,$mensaje);
    
    //$certificado->send_mail("Área Académica","yelsi.vega@dataminingperu.com",$primerNombre,"",$url,"certificado",$asunto,$mensaje);
    
    //$certificado->send_mail("Área Académica","carlos.chavarria@dataminingperu.com",$primerNombre,"",$url,"certificado",$asunto,$mensaje);

    //$certificado->actualizar_envio($id);
    
    //echo $url;    
    # code...

    
}
$url = "https://survey.dmc.pe/academico/certificado_generador.php?codigo=15&nombre=Marco&apellidos=Medrano&capacitacion=Introduccion a Power BI&notas=16&horas=25&fechaFin=2020-10-01&tipo=CURSO GRATUITO";
?>