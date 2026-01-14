<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');



ini_set('max_execution_time', '1800');

require_once "dao_certificado_doble.php";

$certificado = new certificadoPDF();

$alumnos = $certificado->listado_alumnos();

$url = array();

//var_dump($alumnos);


foreach ($alumnos as $key => $valor) {

    $id = $valor['codigo'];

    $dConstancia = $valor['constancia'];

    $dCertificado = $valor['certificado'];

    $nombre = urlencode($valor["nombre"]);

    $apellido = urlencode($valor["apellidos"]);

    $search = array("ESPECIALIZACIÓN EN ", "ESPECIALIZACIONES", "ESPECIALIZACIÓN - ", "PEA – ", "PEA ");


    //Reemplazo del caracteres demás
    $replace   = array("");

    //$texto = str_replace($search, $replace, $valor["capacitacion"]);

    $texto = mb_strtoupper($valor["capacitacion"], "UTF-8");

    $capacitacion = urlencode($texto);

    $calificacion = intval($valor["calificacion"]);

    $arrNombre = explode(" ", strtolower($valor["nombre"]));

    $arrApellidos = explode(" ", strtolower($valor["apellidos"]));

    $primerNombre = ucfirst($arrNombre[0]) . " " . ucfirst($arrApellidos[0]);

    $tipo = $valor["tipo"];

    $asistencia = $valor["asistencia"];

    $url = null;


    if ($valor["asistencia"] >= $valor["cap_base_tipo_asistencia"]) {


        if ($dConstancia == 0 && $tipo != "BOOTCAMP") {

            $url["constanciaAsistencia"] = "https://certificaciones.dmc.pe/academico/certificadoGeneradorDoble.php?codigo=" . $id . "&nombre=" . $nombre . "&apellidos=" . $apellido . "&capacitacion=" . $capacitacion . "&notas=" . $calificacion . "&horas=" . $valor["horas_academicas"] . "&fechaIni=" . $valor["fecha_ini"] . "&fechaFin=" . $valor["fecha_fin"] . "&tipo=" . urlencode($tipo) . "&documento=ASISTENCIA";

            $certificado->actualizar_envio_constancia($id);
        }





        if ($calificacion >= 14 && $tipo != "CURSO GRATUITO" && $tipo != "WORKSHOP ONLINE") {

            if ($dCertificado == 0) {

                if ($tipo != "BOOTCAMP") {

                    $url["constanciaNota"] = "https://certificaciones.dmc.pe/academico/certificado_generadorTT.php?codigo=" . $id . "&nombre=" . $nombre . "&apellidos=" . $apellido . "&capacitacion=" . $capacitacion . "&notas=" . $calificacion . "&horas=" . $valor["horas_academicas"] . "&fechaIni=" . $valor["fecha_ini"] . "&fechaFin=" . $valor["fecha_fin"] . "&tipo=" . urlencode($tipo);
                
                }
                $url["certificadoNota"] = "https://certificaciones.dmc.pe/academico/certificadoGeneradorDoble.php?codigo=" . $id . "&nombre=" . $nombre . "&apellidos=" . $apellido . "&capacitacion=" . $capacitacion . "&notas=" . $calificacion . "&horas=" . $valor["horas_academicas"] . "&fechaIni=" . $valor["fecha_ini"] . "&fechaFin=" . $valor["fecha_fin"] . "&tipo=" . urlencode($tipo) . "&documento=APROBADO";

                $certificado->actualizar_envio($id);
            }
        }

        $mensaje = $certificado->mensaje_certificado_digitalV2($primerNombre, $tipo, $texto);

        $asunto = $valor["capacitacion"] . " - Certificados";

        //$certificado->send_mail("Área Académica",$valor['email'],$valor['nombre'],"",$url,"certificado - ".$tipo,$asuntoAcademico,$mensaje);

        //$asuntoAcademico = $asunto." - ".$primerNombre;

        $certificado->send_mail("Área Académica", $valor['email'], $valor['nombre'], "", $url, "certificado - " . $tipo, $asunto, $mensaje, array("asistente.academico@dmc.pe", "marco.medrano@dataminingperu.com"));
        //$certificado->send_mail("Área Académica","marco.medrano@dataminingperu.com",$valor['nombre'],"",$url,"certificado - ".$tipo,$asunto,$mensaje,array("asistente.academico@dmc.pe","marco.medrano@dataminingperu.com"));
        //$certificado->send_mail("Área Académica","marco.medrano@dataminingperu.com",$valor['nombre'],"",$url,"certificado - ".$tipo,$asunto,$mensaje,array("asistente.academico@dmc.pe","marco.medrano@dataminingperu.com"));

        //$certificado->send_mail("Área Académica","asistente.academico@dmc.pe",$primerNombre,"",$url,"certificado",$asuntoAcademico,$mensaje);

        //$certificado->send_mail("Área Académica","marco.medrano@dataminingperu.com",$primerNombre,"",$url,"certificado",$asunto,$mensaje);

    }





    var_dump($url) . "</br>";
    # code...


}

//$url = "https://survey.dmc.pe/academico/certificado_generador.php?codigo=15&nombre=Marco&apellidos=Medrano&capacitacion=Introduccion a Power BI&notas=16&horas=25&fechaFin=2020-10-01&tipo=ESPECIALIZACIÓN DMC";
