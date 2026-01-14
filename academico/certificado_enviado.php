<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "dao_certificado.php";

$certificado = new certificadoPDF();

$alumnos = $certificado->listado_alumnos();





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

    $url = "https://survey.dmc.pe/academico/certificado_generador.php?codigo=".$id."&nombre=".$nombre."&apellidos=".$apellido."&capacitacion=".$capacitacion."&notas=".$calificacion."&horas=".$valor["horas_academicas"]."&fechaFin=".$valor["fecha_fin"]."&tipo=".urlencode($tipo)."&fechaIni=".$valor["fecha_ini"];

    if($tipo == "CURSO ONLINE" || $tipo == "CURSO POWER"){

        $mensaje = $certificado->mensaje_certificado_digital($primerNombre);

        $asunto = "Certificado de Aprobación: ".$valor["capacitacion"];

    }else if($tipo == "CURSO GRATUITO"){

        $mensaje = $certificado->mensaje_curso_gratuito($primerNombre);

        $asunto = "CONSTANCIA DE PARTICIPACIÓN: ".$valor["capacitacion"];
        
    }else if($tipo == "TALLER ONLINE"){

        $mensaje = $certificado->mensaje_certificado_digital($primerNombre);

        $asunto = "Certificado de participación: ".$valor["capacitacion"];
        
    }
    
    
    
    $certificado->send_mail("Área Académica",$valor['email'],$valor['nombre'],"",$url,$asunto,$asunto,$mensaje);
   
    $certificado->send_mail("Área Académica","asistente.academico@dmc.pe",$valor['nombre'],"",$url,"certificado",$asunto,$mensaje);
    //$certificado->send_mail("Área Académica","cesar.quezada@dmc.pe",$valor['nombre'],"",$url,"certificado",$asunto,$mensaje);

    $certificado->send_mail("Área Académica","marco.medrano@dataminingperu.com",$primerNombre,"",$url,"certificado",$asunto,$mensaje);
    
    //$certificado->send_mail("Área Académica","yelsi.vega@dataminingperu.com",$primerNombre,"",$url,"certificado",$asunto,$mensaje);
    
    //$certificado->send_mail("Área Académica","carlos.chavarria@dataminingperu.com",$primerNombre,"",$url,"certificado",$asunto,$mensaje);

    
    if($tipo != "CURSO GRATUITO"){

        $certificado->actualizar_envio($id);

    }else{

        $certificado->actualizar_envio_constancia($id);

    }
    
    
    echo $url;    
    # code...
}




?>