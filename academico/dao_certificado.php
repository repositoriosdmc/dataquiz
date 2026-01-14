<?php



require_once "mail/PHPMailerAutoload.php";

require_once "certificado_detalle.php";

require_once "gestionbd.php";

require('pdf/fpdf.php');

class certificadoPDF extends FPDF
{

    public function eliminar_acentos($cadena)
    {

        //Reemplazamos la A y a
        $cadena = str_replace(
            array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
            array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
            $cadena
        );

        //Reemplazamos la E y e
        $cadena = str_replace(
            array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
            array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
            $cadena
        );

        //Reemplazamos la I y i
        $cadena = str_replace(
            array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
            array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
            $cadena
        );

        //Reemplazamos la O y o
        $cadena = str_replace(
            array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
            array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
            $cadena
        );

        //Reemplazamos la U y u
        $cadena = str_replace(
            array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
            array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
            $cadena
        );

        //Reemplazamos la N, n, C y c
        $cadena = str_replace(
            array('Ñ', 'ñ', 'Ç', 'ç'),
            array('N', 'n', 'C', 'c'),
            $cadena
        );

        return $cadena;
    }

    function TextWithDirection($x, $y, $txt, $direction = 'R')
    {
        if ($direction == 'R')
            $s = sprintf('BT %.2F %.2F %.2F %.2F %.2F %.2F Tm (%s) Tj ET', 1, 0, 0, 1, $x * $this->k, ($this->h - $y) * $this->k, $this->_escape($txt));
        elseif ($direction == 'L')
            $s = sprintf('BT %.2F %.2F %.2F %.2F %.2F %.2F Tm (%s) Tj ET', -1, 0, 0, -1, $x * $this->k, ($this->h - $y) * $this->k, $this->_escape($txt));
        elseif ($direction == 'U')
            $s = sprintf('BT %.2F %.2F %.2F %.2F %.2F %.2F Tm (%s) Tj ET', 0, 1, -1, 0, $x * $this->k, ($this->h - $y) * $this->k, $this->_escape($txt));
        elseif ($direction == 'D')
            $s = sprintf('BT %.2F %.2F %.2F %.2F %.2F %.2F Tm (%s) Tj ET', 0, -1, 1, 0, $x * $this->k, ($this->h - $y) * $this->k, $this->_escape($txt));
        else
            $s = sprintf('BT %.2F %.2F Td (%s) Tj ET', $x * $this->k, ($this->h - $y) * $this->k, $this->_escape($txt));
        if ($this->ColorFlag)
            $s = 'q ' . $this->TextColor . ' ' . $s . ' Q';
        $this->_out($s);
    }

    public function pdf_text_center($ct)
    {
        //ct -> detalle del certificado
        $pdfx =  new FPDF('L');
        $pdfx->AddFont($ct["fuente"], '', $ct["fuente"] . ".php");
        $pdfx->AddPage();
        $pdfx->SetFont($ct["fuente"], '', $ct["tamanio"]);
        $midPtX = $pdfx->GetPageWidth() / 2;
        //now we need to know how long the write string is

        $texto = self::eliminar_acentos($ct["text"]);

        $len = $pdfx->GetStringWidth($texto);

        //now we need to divide that by two to calculate the shift
        $shiftLeft = $len / 2;
        //now calculate our new X value
        $x = $midPtX - $shiftLeft;
        return $x;
    }

    public function pdf_agregar_imagen($tipo)
    {

        $pdf_imagen = array();

        if ($tipo == "CURSO ONLINE" || $tipo == NULL) {

            $url = "https://survey.dmc.pe/academico/plantilla/CertificadoFv4.png";

            $logo = "http://survey.dmc.pe/academico/plantilla/dmcColor.png";

            $assets["logo"] = array(
                "url" => "http://survey.dmc.pe/academico/plantilla/dmcColor.png",
                "posicion" => array(125, 163, 0, 35)
            );

            $firmaDirectorArriba = 156;

            $firmaGerenteArriba = 152;
        } else if ($tipo == "CURSO POWER") {

            $url = "https://survey.dmc.pe/academico/plantilla/CertificadoPower.png";

            $logo = "https://survey.dmc.pe/academico/plantilla/logoOscuro.png";

            $assets["marcaPower"] = array(
                "url" => "https://survey.dmc.pe/academico/plantilla/marca-power.png",
                "posicion" => array(122, 8, 0, 36)
            );

            $assets["textoImagen"] = array(
                "url" => "https://survey.dmc.pe/academico/plantilla/certi-titulo.png",
                "posicion" => array(91, 38, 0, 30)
            );

            $assets["vineta"] = array(
                "url" => "https://survey.dmc.pe/academico/plantilla/vineta.png",
                "posicion" => array(142, 67, 0, 9)
            );

            $assets["medalla"] = array(
                "url" => "https://survey.dmc.pe/academico/plantilla/medalla.png",
                "posicion" => array(137, 125, 0, 27)
            );

            $assets["logo"] = array(
                "url" => "https://survey.dmc.pe/academico/plantilla/logoOscuro.png",
                "posicion" => array(136, 154, 0, 18)
            );

            $firmaDirectorArriba = 140;

            $firmaGerenteArriba = 136;



            /*$assets[""] = array(
                "url"=>"","posicion"=>array(0,25,35,25)
            );*/
        } else if ($tipo == "CURSO GRATUITO") {

            $url = "https://survey.dmc.pe/academico/plantilla/fondoCertificado2021.png";

            $logo = "logoDMC2021.png";

            

            $assets["firmaGerente"] = array(
                "url"=>"http://survey.dmc.pe/academico/plantilla/FJoelL.png",
                "posicion"=>array(90,150.5,0,40)
            );

            $assets["firmaDirector"] = array(
                "url"=>"http://survey.dmc.pe/academico/plantilla/FJonnyC.png",
                "posicion"=>array(180,155.5,0,25)
            );

            /*$assets["selloGerente"] = array(
                "url"=>"https://survey.dmc.pe/academico/plantilla/sello-gerente-general.png",
                "posicion"=>array(111,154,0,25)
            );

            $assets["selloDirector"] = array(
                "url"=>"https://survey.dmc.pe/academico/plantilla/sello-director-academico.png",
                "posicion"=>array(192,154,0,25)
            );*/
        }


        /*
        foreach ($x as $key => $value) {
    foreach($value as $cr => $con){
        var_dump($value["url"]);
    }
}
        */

        $pdf_imagen["fondo"] = $url;

        $pdf_imagen["logo"] = $logo;

        $pdf_imagen["assets"] = $assets;

        $pdf_imagen["director"] = $firmaDirectorArriba;

        $pdf_imagen["gerente"] = $firmaGerenteArriba;

        return $pdf_imagen;
    }

    public function generar_certificado($codigo, $nombre, $apellidos, $capacitacion, $horas, $calificacion, $fechaFin, $tipo = NULL, $fechaIni = NULL,$tipoCertificado="APROBADO")
    {

        $certificado = new certificado();

        $detalle = $certificado->certificado; // Array de la primera hoja

        $notas = $certificado->notas; // Array de la segunda hoja

        $pdfImg = self::pdf_agregar_imagen($tipo);


        // Datos Generales

        if (isset($codigo)) {

            $detalle["codigo"]["text"] = $codigo;
        }

        if (isset($nombre)) {

            $nombreApellidos = mb_strtoupper($nombre . " " . $apellidos, "UTF-8");

            $detalle["nombre"]["text"] = $nombreApellidos;

            $notas["nombre"]["text"] = $nombreApellidos;
        }

        if (isset($capacitacion)) {

            $detalle["capacitacion"]["text"] = $capacitacion;
        }

        setlocale(LC_ALL, 'es_PE');

        $detalle["fecha"]["text"] = strftime("Lima, %d de %B de %Y",  strtotime($fechaFin));



        if (isset($horas)) {

            $detalle["horas"]["text"] = $horas;
        }

        if ($tipo == "CURSO POWER") {

            $calificacion = 4;

            unset($detalle["textoCertificado"]);

            unset($detalle["textoEspecializacion"]);

            $detalle["honor"]["color"] = array(135, 135, 135);

            $detalle["honor"]["position"] = array(0, 81);

            $detalle["nombre"]["position"] = array(0, 96);

            $detalle["nombre"]["color"] = array(135, 135, 135);

            //-++unset($detalle["honor"]);
        } else if ($tipo == "CURSO GRATUITO") {

            if ($tipoCertificado == "APROBADO") {

                $textoCertificado = "CERTIFICADO";

                $textoEspecializadoCurso = "Por haber aprobado el curso";

            } else if ($tipoCertificado == "ASISTENCIA") {

                $textoCertificado = "CONSTANCIA";

                $textoEspecializadoCurso = "Por haber participado en el curso";

            }

            $textoCertificado = "CONSTANCIA";

            $textoEspecializadoCurso = "Por haber participado en el curso";

            $detalle["textoCertificado"]["text"] = $textoCertificado;

            $detalle["textoCertificado"]["position"] = array(88, 62);

            $detalle["textoCertificado"]["tamanio"] = 50;

            $detalle["textoCertificado"]["color"] = array(0, 35, 47);

            $detalle["textoCertificado"]["center"] = "ok";

            $detalle["textoCertificado"]["fuente"] = "Geometria-Bold";

            $detalle["textoEspecializacion"]["text"] = "SE OTORGA A";

            $detalle["textoEspecializacion"]["position"] = array(129, 78);

            $detalle["textoEspecializacion"]["tamanio"] = 14;

            $detalle["textoEspecializacion"]["color"] = array(87, 87, 86);

            $detalle["textoEspecializacion"]["center"] = "ok";

            $detalle["textoEspecializacion"]["fuente"] = "Geometria-regular";

            $detalle["honor"]["position"] = array(46, 69.5);

            $detalle["honor"]["tamanio"] = 12;

            $detalle["honor"]["color"] = array(255, 255, 255);

            $detalle["honor"]["center"] = "right";

            $detalle["honor"]["fuente"] = "Geometria-Regular";

            $detalle["nombre"]["text"] =  mb_strtoupper($nombre . " " . $apellidos, "UTF-8");

            $detalle["nombre"]["position"] = array(125, 89);

            $detalle["nombre"]["tamanio"] = 25;

            $detalle["nombre"]["color"] = array(0, 193, 213);

            $detalle["nombre"]["fuente"] = "Geometria-Bold";

            $detalle["nombre"]["center"] = "ok";

            $detalle["especializado"]["text"] = $textoEspecializadoCurso;

            $detalle["especializado"]["position"] = array(125, 100);

            $detalle["especializado"]["tamanio"] = 14;

            $detalle["especializado"]["fuente"] = "Geometria-regular";

            $detalle["especializado"]["color"] = array(87, 87, 86);

            $detalle["especializado"]["center"] = "ok";

            $detalle["capacitacion"]["text"] = "INTELIGENCIA ANALÍTICA PARA LA";

            $detalle["capacitacion"]["position"] = array(125, 110);

            $detalle["capacitacion"]["tamanio"] = 18;

            $detalle["capacitacion"]["color"] = array(0, 35, 47);

            $detalle["capacitacion"]["fuente"] = "Geometria-Bold";

            $detalle["capacitacion"]["center"] = "ok";

            $detalle["capacitacion_2"]["text"] = "GESTIÓN DE PRECIOS";

            $detalle["capacitacion_2"]["position"] = array(125, 118);

            $detalle["capacitacion_2"]["tamanio"] = 18;

            $detalle["capacitacion_2"]["color"] = array(0, 35, 47);

            $detalle["capacitacion_2"]["fuente"] = "Geometria-Bold";

            $detalle["capacitacion_2"]["center"] = "ok";

            $detalle["vivo"]["text"] = "CLASES EN VIVO";

            $detalle["vivo"]["position"] = array(125, 126);

            $detalle["vivo"]["tamanio"] = 12;

            $detalle["vivo"]["color"] = array(0, 193, 213);

            $detalle["vivo"]["fuente"] = "Geometria-Bold";

            $detalle["vivo"]["center"] = "ok";

            $detalle["horas_b"]["text"] = "Realizado desde el ".strftime("%d de %B",  strtotime($fechaIni))." hasta el " . strftime("%d de %B del %Y",  strtotime($fechaFin)) . ",";

            $detalle["horas_b"]["position"] = array(125, 134);

            $detalle["horas_b"]["tamanio"] = 14;

            $detalle["horas_b"]["color"] = array(87, 87, 86);

            $detalle["horas_b"]["fuente"] = "Geometria-regular";

            $detalle["horas_b"]["center"] = "ok";

            $detalle["horas_c"]["text"] = "completando un total de ";

            $detalle["horas_c"]["position"] = array(92.7, 140);

            $detalle["horas_c"]["tamanio"] = 14;

            $detalle["horas_c"]["color"] = array(87, 87, 86);

            $detalle["horas_c"]["fuente"] = "Geometria-regular";

            $detalle["horas_c"]["center"] = "fixed";

            $detalle["horas_d"]["text"] = str_pad($detalle["horas"]["text"],2,"00") . " horas académicas";

            $detalle["horas_d"]["position"] = array(153.5, 140);

            $detalle["horas_d"]["tamanio"] = 14;

            $detalle["horas_d"]["color"] = array(87, 87, 86);

            $detalle["horas_d"]["fuente"] = "Geometria-Medium";

            $detalle["horas_d"]["center"] = "fixed";

            $detalle["fecha"]["text"] = ucfirst(strftime("%B del %Y",  strtotime($fechaFin)));

            $detalle["fecha"]["position"] = array(125, 148);

            $detalle["fecha"]["tamanio"] = 12;

            $detalle["fecha"]["fuente"] = "Geometria-Medium";

            $detalle["fecha"]["color"] = array(0, 35, 47);

            $detalle["fecha"]["center"] = "ok";

            unset($detalle["horas"]);

            unset($detalle["empresa_2"]);

            unset($detalle["empresaDirecto"]);

            unset($detalle["cargoDirecto"]);

            $detalle["gerente"]["position"] = array(91, 185);

            $detalle["gerente"]["tamanio"] = 12;

            $detalle["gerente"]["color"] = array(0, 193, 213);

            $detalle["gerente"]["fuente"] = "Geometria-Medium";

            $detalle["gerente"]["center"] = "fixed";

            $detalle["gerenteCargo"]["text"] = "GERENTE GENERAL";

            $detalle["gerenteCargo"]["position"] = array(90, 191);

            $detalle["gerenteCargo"]["tamanio"] = 11;

            $detalle["gerenteCargo"]["color"] = array(0, 35, 47);

            $detalle["gerenteCargo"]["fuente"] = "Geometria-Medium";

            $detalle["gerenteCargo"]["center"] = "fixed";

            $detalle["director"]["position"] = array(166.5, 185);

            $detalle["director"]["tamanio"] = 12;

            $detalle["director"]["color"] = array(0, 191, 213);

            $detalle["director"]["fuente"] = "Geometria-Medium";

            $detalle["director"]["center"] = "fixed";

            $detalle["directorCargo"]["text"] = "DIRECTOR ACADÉMICO";

            $detalle["directorCargo"]["position"] = array(166.5, 191);

            $detalle["directorCargo"]["tamanio"] = 11;

            $detalle["directorCargo"]["color"] = array(0, 35, 47);

            $detalle["directorCargo"]["fuente"] = "Geometria-Medium";

            $detalle["directorCargo"]["center"] = "fixed";

            $detalle["codigo"]["color"] = array(87, 87, 86);

            $detalle["codigo"]["fuente"] = "Geometria-regular";

            $detalle["codigo"]["tamanio"] = 9;

            $detalle["codigo"]["position"] = array(285, 202);

            $detalle["codigo"]["center"] = "right";

        }


        if (isset($calificacion)) {

            $honor = $calificacion >= 18 ? " CON ORGULLO" : "";

            $detalle["honor"]["text"] = "SE OTORGA" . $honor . " A:";

            $notas["calificacion"]["text"] = $calificacion;
        }





        $pdf = new FPDF('L');


        $pdf->AddFont('MinionPro-Semibold', '', 'MinionPro-Semibold.php');
        $pdf->AddFont('MinionPro-Bold', '', 'MinionPro-Bold.php');
        $pdf->AddFont('MinionPro-Regular', '', 'MinionPro-Regular.php');


        $pdf->AddFont('Geometria-Medium', '', 'Geometria-Medium.php');
        $pdf->AddFont('Geometria-Bold', '', 'Geometria-Bold.php');
        $pdf->AddFont('Geometria-Regular', '', 'Geometria-regular.php');



        $pdf->SetRightMargin(false);
        $pdf->SetAutoPageBreak(false); // eliminar margin bottom (desactiva el salto a pagina)
        $pdf->AddPage();
        //$pdf->Image('https://survey.dmc.pe/plantilla/certificado.png', 0, 0, 297, 210);
        $pdf->Image($pdfImg["fondo"], 0, 0, 297, 210);
        /* Linea de firma Instructor */
        /*$line_x=110;
        $pdf->Line($line_x+0.8, 177.0, $line_x-55, 177.0); */

        /* Texto Horas */

        //$capacitacion = "(".$capacitacion." - clases en vivo),";





        /* Firmas */

        $firmaDirector = "http://survey.dmc.pe/academico/plantilla/FJonnyC.png";

        $firmaGerente = "http://survey.dmc.pe/academico/plantilla/FJoelL.png";


        $logoColor = "http://survey.dmc.pe/academico/plantilla/dmcColor.png";


        if ($tipo != "CURSO GRATUITO") {

            $pdf->Cell(100, 100, "", 100, 100, 'C', $pdf->Image($firmaDirector, 67, $pdfImg["director"], 0, 22));

            $pdf->Cell(100, 100, "", 100, 100, 'C', $pdf->Image($firmaGerente, 205, $pdfImg["gerente"], 0, 35));

        } else {

            $logo = "https://survey.dmc.pe/academico/plantilla/logoDMC2021.png";

            $pdf->Cell(140, 140, "", 70, 70, 'C', $pdf->Image($logo, 45, 30.5, 0, 12));

            $dataDriven = "https://survey.dmc.pe/academico/plantilla/dataDriven2021.png";

            $pdf->Cell(100, 100, "", 60, 60, 'C', $pdf->Image($dataDriven, 225, 15.5, 0, 30));

            /*$firmaGerente = "http://survey.dmc.pe/academico/plantilla/FJoelL.png";

            $pdf->Cell(100, 100, "", 60, 60, 'C', $pdf->Image($firmaGerente, 90, 150.5, 0, 40));

            $firmaDirector = "http://survey.dmc.pe/academico/plantilla/FJonnyC.png";

            $pdf->Cell(100, 100, "", 60, 60, 'C', $pdf->Image($firmaDirector, 180, 155.5, 0, 25));*/
        }





        if ($tipo == "CURSO ONLINE") {

            $horas_acamedicas = "impartido por el centro de capacitación DMC Perú con una duración de " . $detalle["horas"]["text"] . " horas académicas.";
        } else if ($tipo == "TALLER ONLINE") {

            $horas_acamedicas = "impartido por el centro de capacitación DMC Perú con una duración 60 minutos.";

            $detalle["textoEspecializacion"]["text"] = "DE PARTICIPACIÓN";

            $detalle["especializado"]["text"] = "Por haber asistido al Taller Online:";
            
        } else if ($tipo == "CURSO POWER") {

            $detalle["especializado"]["text"] = "Por haber participado en el curso virtual:";

            $detalle["especializado"]["position"] = array(0, 108);

            $detalle["especializado"]["tamanio"] = 13;

            $detalle["especializado"]["fuente"] = "MinionPro-Semibold";

            $detalle["especializado"]["color"] = array(135, 135, 135);

            $detalle["capacitacion"]["text"] = "(" . $capacitacion . " - clases en vivo),";

            $detalle["capacitacion"]["position"] = array(0, 114);

            $detalle["capacitacion"]["tamanio"] = 13;

            $detalle["capacitacion"]["fuente"] = "MinionPro-Semibold";

            $detalle["capacitacion"]["color"] = array(135, 135, 135);

            $horas_acamedicas = "impartido por el centro de capacitación DMC Perú con una duración de " . $detalle["horas"]["text"] . " horas académicas.";

            $detalle["horas"]["position"] = array(0, 120);

            $detalle["horas"]["tamanio"] = 13;

            $detalle["horas"]["fuente"] = "MinionPro-Semibold";

            $detalle["horas"]["color"] = array(135, 135, 135);

            $detalle["fecha"]["position"] = array(0, 174);

            $detalle["fecha"]["tamanio"] = 13;

            $detalle["fecha"]["fuente"] = "MinionPro-Semibold";

            $detalle["fecha"]["color"] = array(135, 135, 135);

            $detalle["gerente"]["position"] = array(81, 164);

            $detalle["gerente"]["tamanio"] = 17;

            $detalle["gerente"]["fuente"] = "MinionPro-Bold";

            $detalle["gerente"]["color"] = array(135, 135, 135);

            $detalle["gerenteCargo"]["position"] = array(78, 170);

            $detalle["gerenteCargo"]["tamanio"] = 14;

            $detalle["gerenteCargo"]["fuente"] = "MinionPro-Bold";

            $detalle["gerenteCargo"]["color"] = array(135, 135, 135);

            unset($detalle["empresa_2"]);

            $detalle["director"]["position"] = array(216, 164);

            $detalle["director"]["tamanio"] = 16;

            $detalle["director"]["fuente"] = "MinionPro-Bold";

            $detalle["director"]["color"] = array(135, 135, 135);

            $detalle["cargoDirecto"]["position"] = array(216, 170);

            $detalle["cargoDirecto"]["tamanio"] = 14;

            $detalle["cargoDirecto"]["fuente"] = "MinionPro-Bold";

            $detalle["cargoDirecto"]["color"] = array(135, 135, 135);

            unset($detalle["empresaDirecto"]);
        }

        //$pdf->Cell(100,100, "", 100, 100, 'C',$pdf->Image($logoColor,125,163,0,35));


        /*else if($tipo == "Congreso"){

            $logoCongreso = "http://survey.dmc.pe/academico/plantilla/EREII.png";

            $pdf->Cell(100,100, "", 100, 100, 'C',$pdf->Image($logoColor,150,163,0,35));

            $pdf->Cell(100,100, "", 100, 100, 'C',$pdf->Image($logoCongreso,110,162,0,35));

            $horas_acamedicas = "impartido por el centro de capacitación DMC Perú en el IV Encuentro Regional de Estudiantes de Ingeniería Industrial con una duración de 5 horas.";

            $detalle["textoEspecializacion"]["text"]="DE PARTICIPACIÓN";

            $detalle["especializado"]["text"]="Por haber asistido al Taller Online:";

        }*/



        $detalle["horas"]["text"] = $horas_acamedicas;

        //assets img

        if (count($pdfImg["assets"]) > 0) {

            foreach ($pdfImg["assets"] as $key => $value) {

                $pdf->Cell(
                    100,
                    100,
                    "",
                    100,
                    100,
                    'C',
                    $pdf->Image($value["url"], $value["posicion"][0], $value["posicion"][1], $value["posicion"][2], $value["posicion"][3])
                );
            }
        }


        foreach ($detalle as $key => $value) {
            $pdf->SetFont($value["fuente"], '', $value["tamanio"]);
            /* Transformación a UTF8 */
            $text = iconv('UTF-8', 'windows-1252', $value["text"]);
            $color = $value["color"];
            $pdf->SetTextColor($color[0], $color[1], $color[2]);
            $x = $value["position"][0];
            $y = $value["position"][1];
            $estado = $value["center"];
            /* Centrar en bloques */
            if ($estado == "ok") {
                $x = self::pdf_text_center($value);
            } else if ($estado == "right") {
                $len = $pdf->GetStringWidth($text) / 2;
                $x = $x - $len;
            }

            $pdf->setXY($x, $y);
            $pdf->Write(0, $text);
        }


        //Notas

        if ($tipo == "CURSO ONLINE") {

            $pdf->AddPage();
            $pdf->Image('http://survey.dmc.pe/academico/plantilla/CertificadoNv3.png', 0, 0, 297, 210);

            $logoOscuro = "http://survey.dmc.pe/academico/plantilla/dmcBlack.png";

            $pdf->Cell(100, 100, "", 100, 100, 'C', $pdf->Image($logoOscuro, 123, 25, 0, 37));

            foreach ($notas as $key => $value) {
                $pdf->SetFont($value["fuente"], '', $value["tamanio"]);
                /* Transformación a UTF8 */
                $text = iconv('UTF-8', 'windows-1252', $value["text"]);
                $color = $value["color"];
                $pdf->SetTextColor($color[0], $color[1], $color[2]);
                $x = $value["position"][0];
                $y = $value["position"][1];
                $estado = $value["center"];
                /* Centrar en bloques */
                if ($estado == "ok") {
                    $x = self::pdf_text_center($value);
                }

                $pdf->setXY($x, $y);
                $pdf->Write(0, $text);
            }
        }


        return $pdf->Output();
    }


    public function mensaje_certificado()
    {

        $html = "<p>Estimado (a) alumno (a), reciba un cordial saludo de DMC</p>";

        $html .= "<p>Sirva la presente para enviar el certificado del curso en asunto.</p>";

        $html .= "<p>Agradecemos por habernos escogido para esta capacitación, esperando que haya sido de gran crecimiento para ti.</p>";

        $html .= "Así mismo te animamos a seguir aprendiendo con nosotros...Te invitamos a visitar nuestra página web <a href='https://dmc.pe/categoria/curso-online-en-vivo/'>DMC PERÚ</a> donde podrás observar los cursos que inician próximamente y por el <a href='https://www.facebook.com/datamining.pe/'>Facebook</a> para que puedan estar al tanto de nuestros talleres gratuitos en la modalidad online.";

        $html .= "<p>#YOMEQUEDOENCASA</p>";

        $html .= "<p>#DMConline</p>";

        return $html;
    }

    public function send_mail($from_name, $correo, $nom, $file, $url, $id, $asunto, $mensaje)
    {
        $mail = new PHPMailer;

        //$mail->SMTPDebug = 3;            JOIN (SELECT @curRow := 0, @curType := '') r) a                   // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'dmc.pe';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'test@dmc.pe';                 // SMTP username
        $mail->Password = 'typ6s;QNugNX';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        $mail->From = 'capacitacion@dmc.pe';
        $mail->FromName = $from_name;
        $mail->addAddress($correo, $nom);     // Add a recipient

        if (is_array($file)) {
            foreach ($file as $key => $value) {
                $tmp = $file[$key]["tmp_name"];
                if (is_uploaded_file($tmp)) {
                    $mail->addAttachment($tmp, $file[$key]["name"]);
                }
            }
        }

        if(is_array($url)){

            foreach($url as $key =>$value){

                $mail->addStringAttachment(file_get_contents($value), $id . ".pdf");

            }

        }else if($url) {
            
            $mail->addStringAttachment(file_get_contents($url), $id . ".pdf");

        }

        


        // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->CharSet = 'UTF-8';
        $mail->Subject = $asunto;
        $mail->Body    = $mensaje; //'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        return $mail->send();

        /*if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }*/
    }

    public function mensaje_certificado_digital($nombre)
    {

        $html = '<table width="100%" cellspacing="0" cellpadding="0" border="0" name="bmeMainBody" style="background-color: rgb(238, 238, 238);" bgcolor="#eeeeee"><tbody><tr><td width="100%" valign="top" align="center"> <table cellspacing="0" cellpadding="0" border="0" name="bmeMainColumnParentTable"><tbody><tr><td name="bmeMainColumnParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate;"> <table name="bmeMainColumn" class="bmeHolder bmeMainColumn" style="max-width: 600px; overflow: visible; border-radius: 0px; border-collapse: separate; border-spacing: 0px;" cellspacing="0" cellpadding="0" border="0" align="center">   <tbody><tr><td width="100%" class="blk_container bmeHolder" name="bmePreHeader" valign="top" align="center" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: rgb(255, 255, 255);" bgcolor="#ffffff"><div id="dv_14" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(0, 125, 186);"><tbody><tr><td class="tblCellMain" style="padding: 5px 20px;"> <table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px none rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_31" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td> <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 5px 20px; background-color: rgb(255, 255, 255);"><img src="https://images.benchmarkemail.com/client197129/image6795135.png" class="mobile-img-large" width="560" style="max-width: 1200px; display: block; width: 560px;" alt="" border="0"></td></tr></tbody> </table></td></tr></tbody> </table></div></td></tr><tr><td width="100%" class="bmeHolder" valign="top" align="center" name="bmeMainContentParent" style="border: 0px none rgb(102, 102, 102); border-radius: 0px; border-collapse: separate; border-spacing: 0px; overflow: hidden;"> <table name="bmeMainContent" style="border-radius: 0px; border-collapse: separate; border-spacing: 0px; border: 0px none transparent;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"> <tbody><tr><td width="100%" class="blk_container bmeHolder" name="bmeHeader" valign="top" align="center" style="border: 0px none transparent; color: rgb(56, 56, 56); background-color: rgb(255, 255, 255);" bgcolor="#ffffff"> <div id="dv_11" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td> <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 0px;"><img src="https://images.benchmarkemail.com/client197129/image8759465.jpg" class="mobile-img-large" width="600" style="max-width: 1200px; display: block; width: 600px;" alt="" border="0"></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_10" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text"><tbody><tr><td> <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><td class="tdPart" valign="top" align="center"> <table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float:left; background-color:transparent;" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="line-height: 125%;"> <p style="margin-top: 0px; margin-bottom: 0px;"><strong><span style="font-size: 24px;">Hola, ';

        $html .= $nombre;

        $html .= '</span></strong></p> <p style="margin-top: 0px; margin-bottom: 0px;">&nbsp;</p> <p style="margin-top: 0px; margin-bottom: 0px;">Habiendo aprobado satisfactoriamente el curso de especialización en asunto, adjuntamos el certificado correspondiente.</p> <p style="margin-top: 0px; margin-bottom: 0px;">&nbsp;</p> <p style="margin-top: 0px; margin-bottom: 0px;text-align:justify;">Aprovechamos la oportunidad para agradecerte por confiar en nosotros para fortalecer tus conocimientos y habilidades. Esperamos que nuestras clases hayan sido de gran provecho para ti y podamos contar contigo en nuestras aulas nuevamente.</p> <p style="margin-top: 0px; margin-bottom: 0px;">&nbsp;</p> <p style="margin-top: 0px; margin-bottom: 0px;text-align:justify;">Te recordamos que puedes visitar nuestra página web www.dmc.pe o nuestras redes sociales para conocer sobre nuestros cursos, descuentos, concursos, tips y mucho más.&nbsp;</p> <p style="margin-top: 0px; margin-bottom: 0px;">&nbsp;</p> <p style="margin-top: 0px; margin-bottom: 0px;">Atentamente,</p> </div></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></div></td></tr>    <tr><td width="100%" class="blk_container bmeHolder" name="bmePreFooter" valign="top" align="center" style="color: rgb(56, 56, 56); border: 0px none transparent;" bgcolor=""> <div id="dv_15" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_social_follow" style="background-color: rgb(0, 0, 0);"><tbody><tr><td class="tblCellMain" align="center" style="padding: 15px 20px;"> <table class="tblContainer mblSocialContain" cellspacing="0" cellpadding="0" border="0" align="center" style="text-align:center;"><tbody><tr><td class="tdItemContainer"> <table cellspacing="0" cellpadding="0" border="0" class="mblSocialContain" style="table-layout: auto;"><tbody><tr><td valign="top" name="bmeSocialTD" class="bmeSocialTD"><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="website" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=A6B44E8&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/wb_btn.png" alt="Website" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="facebook" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=A6B44E9&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/fb_btn.png" alt="Facebook" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="instagram" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=A6B44EB&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/in_btn.png" alt="Instagram" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="linkedin" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=A6B44EA&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/li_btn.png" alt="LinkedIn" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="youtube" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=A6B44EC&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/yt_btn.png" alt="YouTube" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_18" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(0, 0, 0);"><tbody><tr><td class="tblCellMain" style="padding: 5px 20px;"> <table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px solid rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_16" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text"><tbody><tr><td> <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><td class="tdPart" valign="top" align="center" style="background-color: rgb(0, 0, 0);"> <table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float: left; background-color: rgb(0, 0, 0);" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 10px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="line-height: 150%; text-align: center;"><span style="font-size: 12px; color: #ffffff;"><strong>Contáctanos <br></strong>Celular:&nbsp;&nbsp;985 126 691 <br>E-mail:&nbsp;capacitacion@dmc.pe&nbsp; <br>Web:&nbsp;<a href="https://dmc.bmetrack.com/c/l?u=A6EA533&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=es&amp;q=http://www.dataminingperu.com&amp;source=gmail&amp;ust=1479825622894000&amp;usg=AFQjCNGSQnnBL7u51fMYryR0gnBFEieTjw"><span style="color: #ffffff;">www.dmc.pe</span></a>&nbsp; <br>Oficina: calle Río de la Plata 167, Of. 203 - San Isidro</span></div></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></div> </td></tr> </tbody> </table> </td></tr> </tbody> </table> </td></tr></tbody> </table></td></tr></tbody> </table>';

        return $html;
    }

    public function mensaje_curso_gratuito($nombre)
    {

        $html = '<table width="100%" cellspacing="0" cellpadding="0" border="0" name="bmeMainBody" style="background-color: rgb(238, 238, 238);" bgcolor="#eeeeee"><tbody><tr><td width="100%" valign="top" align="center"> <table cellspacing="0" cellpadding="0" border="0" name="bmeMainColumnParentTable"><tbody><tr><td name="bmeMainColumnParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate;"> <table name="bmeMainColumn" class="bmeHolder bmeMainColumn" style="max-width: 600px; overflow: visible; border-radius: 0px; border-collapse: separate; border-spacing: 0px;" cellspacing="0" cellpadding="0" border="0" align="center">   <tbody><tr><td width="100%" class="blk_container bmeHolder" name="bmePreHeader" valign="top" align="center" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: rgb(255, 255, 255);" bgcolor="#ffffff"><div id="dv_14" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(0, 125, 186);"><tbody><tr><td class="tblCellMain" style="padding: 5px 20px;"> <table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px none rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_31" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td> <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 5px 20px; background-color: rgb(255, 255, 255);"><img src="https://images.benchmarkemail.com/client197129/image6795135.png" class="mobile-img-large" width="560" style="max-width: 1200px; display: block; width: 560px;" alt="" border="0"></td></tr></tbody> </table></td></tr></tbody> </table></div></td></tr><tr><td width="100%" class="bmeHolder" valign="top" align="center" name="bmeMainContentParent" style="border: 0px none rgb(102, 102, 102); border-radius: 0px; border-collapse: separate; border-spacing: 0px; overflow: hidden;"> <table name="bmeMainContent" style="border-radius: 0px; border-collapse: separate; border-spacing: 0px; border: 0px none transparent;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"> <tbody><tr><td width="100%" class="blk_container bmeHolder" name="bmeHeader" valign="top" align="center" style="border: 0px none transparent; color: rgb(56, 56, 56); background-color: rgb(255, 255, 255);" bgcolor="#ffffff"> <div id="dv_11" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td> <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 0px;"><img src="https://images.benchmarkemail.com/client197129/image8759465.jpg" class="mobile-img-large" width="600" style="max-width: 1200px; display: block; width: 600px;" alt="" border="0"></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_10" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text"><tbody><tr><td> <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><td class="tdPart" valign="top" align="center"> <table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float:left; background-color:transparent;" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="line-height: 125%;"> <p style="margin-top: 0px; margin-bottom: 0px;"><strong><span style="font-size: 24px;">Hola, ';

        $html .= $nombre;

        $html .= '</span></strong></p> <p style="margin-top: 0px; margin-bottom: 0px;">&nbsp;</p> <p style="margin-top: 0px; margin-bottom: 0px;">Adjuntamos la constancia de participación correspondiente al curso mencionado en el asunto de este correo.</p> <p style="margin-top: 0px; margin-bottom: 0px;">&nbsp;</p> <p style="margin-top: 0px; margin-bottom: 0px;text-align:justify;">Aprovechamos para agradecerte por confiar en nosotros para fortalecer tus conocimientos y habilidades. Esperamos que nuestras clases hayan sido de gran provecho para ti y podamos contar contigo en nuestras aulas nuevamente.</p> <p style="margin-top: 0px; margin-bottom: 0px;">&nbsp;</p> <p style="margin-top: 0px; margin-bottom: 0px;text-align:justify;">Te recordamos que puedes visitar nuestra página web www.dmc.pe o nuestras redes sociales para conocer sobre nuestros cursos, descuentos, concursos, tips y mucho más.</p> <p style="margin-top: 0px; margin-bottom: 0px;">&nbsp;</p> <p style="margin-top: 0px; margin-bottom: 0px;">Atentamente,</p> </div></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></div></td></tr>    <tr><td width="100%" class="blk_container bmeHolder" name="bmePreFooter" valign="top" align="center" style="color: rgb(56, 56, 56); border: 0px none transparent;" bgcolor=""> <div id="dv_15" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_social_follow" style="background-color: rgb(0, 0, 0);"><tbody><tr><td class="tblCellMain" align="center" style="padding: 15px 20px;"> <table class="tblContainer mblSocialContain" cellspacing="0" cellpadding="0" border="0" align="center" style="text-align:center;"><tbody><tr><td class="tdItemContainer"> <table cellspacing="0" cellpadding="0" border="0" class="mblSocialContain" style="table-layout: auto;"><tbody><tr><td valign="top" name="bmeSocialTD" class="bmeSocialTD"><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="website" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=A6B44E8&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/wb_btn.png" alt="Website" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="facebook" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=A6B44E9&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/fb_btn.png" alt="Facebook" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="instagram" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=A6B44EB&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/in_btn.png" alt="Instagram" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="linkedin" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=A6B44EA&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/li_btn.png" alt="LinkedIn" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="youtube" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=A6B44EC&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/yt_btn.png" alt="YouTube" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_18" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(0, 0, 0);"><tbody><tr><td class="tblCellMain" style="padding: 5px 20px;"> <table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px solid rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_16" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text"><tbody><tr><td> <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><td class="tdPart" valign="top" align="center" style="background-color: rgb(0, 0, 0);"> <table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float: left; background-color: rgb(0, 0, 0);" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 10px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="line-height: 150%; text-align: center;"><span style="font-size: 12px; color: #ffffff;"><strong>Contáctanos <br></strong>Celular:&nbsp;&nbsp;985 126 691 <br>E-mail:&nbsp;capacitacion@dmc.pe&nbsp; <br>Web:&nbsp;<a href="https://dmc.bmetrack.com/c/l?u=A6EA533&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=es&amp;q=http://www.dataminingperu.com&amp;source=gmail&amp;ust=1479825622894000&amp;usg=AFQjCNGSQnnBL7u51fMYryR0gnBFEieTjw"><span style="color: #ffffff;">www.dmc.pe</span></a>&nbsp; <br>Oficina: calle Río de la Plata 167, Of. 203 - San Isidro</span></div></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></div> </td></tr> </tbody> </table> </td></tr> </tbody> </table> </td></tr></tbody> </table></td></tr></tbody> </table>';

        return $html;
    }

    public function mensaje_certificado_digital_congreso($nombre)
    {

        $html = '<table width="100%" cellspacing="0" cellpadding="0" border="0" name="bmeMainBody" style="background-color: rgb(238, 238, 238);" bgcolor="#eeeeee"><tbody><tr><td width="100%" valign="top" align="center"> <table cellspacing="0" cellpadding="0" border="0" name="bmeMainColumnParentTable"><tbody><tr><td name="bmeMainColumnParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate;"> <table name="bmeMainColumn" class="bmeHolder bmeMainColumn" style="max-width: 600px; overflow: visible; border-radius: 0px; border-collapse: separate; border-spacing: 0px;" cellspacing="0" cellpadding="0" border="0" align="center">   <tbody><tr><td width="100%" class="blk_container bmeHolder" name="bmePreHeader" valign="top" align="center" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: rgb(255, 255, 255);" bgcolor="#ffffff"><div id="dv_14" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(0, 125, 186);"><tbody><tr><td class="tblCellMain" style="padding: 5px 20px;"> <table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px none rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_31" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td> <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 5px 20px; background-color: rgb(255, 255, 255);"><img src="https://images.benchmarkemail.com/client197129/image6795135.png" class="mobile-img-large" width="560" style="max-width: 1200px; display: block; width: 560px;" alt="" border="0"></td></tr></tbody> </table></td></tr></tbody> </table></div></td></tr><tr><td width="100%" class="bmeHolder" valign="top" align="center" name="bmeMainContentParent" style="border: 0px none rgb(102, 102, 102); border-radius: 0px; border-collapse: separate; border-spacing: 0px; overflow: hidden;"> <table name="bmeMainContent" style="border-radius: 0px; border-collapse: separate; border-spacing: 0px; border: 0px none transparent;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"> <tbody><tr><td width="100%" class="blk_container bmeHolder" name="bmeHeader" valign="top" align="center" style="border: 0px none transparent; color: rgb(56, 56, 56); background-color: rgb(255, 255, 255);" bgcolor="#ffffff"> <div id="dv_11" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td> <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 0px;"></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_10" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text"><tbody><tr><td> <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><td class="tdPart" valign="top" align="center"> <table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float:left; background-color:transparent;" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="line-height: 125%;"> <p style="margin-top: 0px; margin-bottom: 0px;"><strong><span style="font-size: 24px;">Hola, ';

        $html .= $nombre;

        $html .= '</span></strong></p> <p style="margin-top: 0px; margin-bottom: 0px;">&nbsp;</p> <p style="margin-top: 0px; margin-bottom: 0px;">Por haber asistido al taller impartido por DMC Perú en el IV Encuentro Regional de Estudiantes de Ingeniería Industria "El Rol del Ingeniero Industrial en época de crisis", adjuntamos el certificado correspondiente.</p> <p style="margin-top: 0px; margin-bottom: 0px;">&nbsp;</p> <p style="margin-top: 0px; margin-bottom: 0px;text-align:justify;">Aprovechamos la oportunidad para agradecerte por confiar en nosotros para fortalecer tus conocimientos y habilidades. Esperamos que este taller haya sido de gran provecho para ti.</p> <p style="margin-top: 0px; margin-bottom: 0px;">&nbsp;</p> <p style="margin-top: 0px; margin-bottom: 0px;text-align:justify;">Te recordamos que puedes visitar nuestra página web www.dmc.pe o nuestras redes sociales para conocer sobre nuestros talleres, cursos, descuentos, concurso, tips y mucho más.&nbsp;</p> <p style="margin-top: 0px; margin-bottom: 0px;">&nbsp;</p> <p style="margin-top: 0px; margin-bottom: 0px;">Atentamente,</p> </div></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></div></td></tr>    <tr><td width="100%" class="blk_container bmeHolder" name="bmePreFooter" valign="top" align="center" style="color: rgb(56, 56, 56); border: 0px none transparent;" bgcolor=""> <div id="dv_15" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_social_follow" style="background-color: rgb(0, 0, 0);"><tbody><tr><td class="tblCellMain" align="center" style="padding: 15px 20px;"> <table class="tblContainer mblSocialContain" cellspacing="0" cellpadding="0" border="0" align="center" style="text-align:center;"><tbody><tr><td class="tdItemContainer"> <table cellspacing="0" cellpadding="0" border="0" class="mblSocialContain" style="table-layout: auto;"><tbody><tr><td valign="top" name="bmeSocialTD" class="bmeSocialTD"><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="website" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=A6B44E8&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/wb_btn.png" alt="Website" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="facebook" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=A6B44E9&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/fb_btn.png" alt="Facebook" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="instagram" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=A6B44EB&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/in_btn.png" alt="Instagram" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="linkedin" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=A6B44EA&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/li_btn.png" alt="LinkedIn" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="youtube" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=A6B44EC&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/yt_btn.png" alt="YouTube" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_18" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(0, 0, 0);"><tbody><tr><td class="tblCellMain" style="padding: 5px 20px;"> <table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px solid rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_16" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text"><tbody><tr><td> <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><td class="tdPart" valign="top" align="center" style="background-color: rgb(0, 0, 0);"> <table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float: left; background-color: rgb(0, 0, 0);" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 10px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="line-height: 150%; text-align: center;"><span style="font-size: 12px; color: #ffffff;"><strong>Contáctanos <br></strong>Celular:&nbsp;&nbsp;985 126 691 <br>E-mail:&nbsp;capacitacion@dmc.pe&nbsp; <br>Web:&nbsp;<a href="https://dmc.bmetrack.com/c/l?u=A6EA533&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=es&amp;q=http://www.dataminingperu.com&amp;source=gmail&amp;ust=1479825622894000&amp;usg=AFQjCNGSQnnBL7u51fMYryR0gnBFEieTjw"><span style="color: #ffffff;">www.dmc.pe</span></a>&nbsp; <br>Oficina: calle Río de la Plata 167, Of. 203 - San Isidro</span></div></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></div> </td></tr> </tbody> </table> </td></tr> </tbody> </table> </td></tr></tbody> </table></td></tr></tbody> </table>';

        return $html;
    }

    public function dmc_talks()
    {

        $html = '<table width="100%" cellspacing="0" cellpadding="0" border="0" name="bmeMainBody" style="background-color: rgb(238, 238, 238);" bgcolor="#eeeeee"><tbody><tr><td width="100%" valign="top" align="center"> <table cellspacing="0" cellpadding="0" border="0" name="bmeMainColumnParentTable"><tbody><tr><td name="bmeMainColumnParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate;"> <table name="bmeMainColumn" class="bmeHolder bmeMainColumn" style="max-width: 600px; overflow: visible; border-radius: 0px; border-collapse: separate; border-spacing: 0px;" cellspacing="0" cellpadding="0" border="0" align="center">   <tbody><tr><td width="100%" class="blk_container bmeHolder" name="bmePreHeader" valign="top" align="center" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: rgb(255, 255, 255);" bgcolor="#ffffff"><div id="dv_14" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(70, 164, 201);"><tbody><tr><td class="tblCellMain" style="padding: 5px 20px;"> <table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px none rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_16" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td> <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 0px;"><img src="https://images.benchmarkemail.com/client197129/image9787890.png" class="mobile-img-large" width="600" style="max-width: 960px; display: block; border-radius: 0px; width: 600px;" alt="" data-radius="0" border="0"></td></tr></tbody> </table></td></tr></tbody> </table></div></td></tr><tr><td width="100%" class="bmeHolder" valign="top" align="center" name="bmeMainContentParent" style="border: 0px none rgb(102, 102, 102); border-radius: 0px; border-collapse: separate; border-spacing: 0px; overflow: hidden;"> <table name="bmeMainContent" style="border-radius: 0px; border-collapse: separate; border-spacing: 0px; border: 0px none transparent;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"> <tbody><tr><td width="100%" class="blk_container bmeHolder" name="bmeHeader" valign="top" align="center" style="border: 0px none transparent; color: rgb(56, 56, 56); background-color: rgb(255, 255, 255);" bgcolor="#ffffff"><div id="dv_18" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text" style=""><tbody><tr><td> <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><td class="tdPart" valign="top" align="center"> <table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float:left; background-color:transparent;" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="line-height: 150%;"> <p style="text-align: justify; margin-top: 0px; margin-bottom: 0px;"><strong><span style="font-size: 16px;"><span style="font-size: 18px;">Hola, <br></span></span></strong><strong style="font-size: 12px;">&nbsp;</strong>&nbsp;</p> <p style="text-align: justify; margin-top: 0px; margin-bottom: 0px;"><span style="font-size: 12px;">Queremos agredecer tu asistencia a nuestro evento internacional <strong>DMC Talks</strong>, realizado el 11 de diciembre, y por dejarnos compartir nuestros conocimientos y experiencias, y la de nuestros ponentes contigo.</span></p> <p style="text-align: justify; margin-top: 0px; margin-bottom: 0px;">&nbsp;</p> <p style="text-align: justify; margin-top: 0px; margin-bottom: 0px;"><span style="font-size: 12px;">Esperamos que esta charla sobre <strong>"L</strong><span style="font-size: 12px;"><strong>ow touch economy y la era del big data" </strong></span>te haya sido de utilidad y puedas aplicar esta información en tu organización.&nbsp;</span></p> <p style="text-align: justify; margin-top: 0px; margin-bottom: 0px;">&nbsp;</p> <p style="text-align: justify; margin-top: 0px; margin-bottom: 0px;"><strong><span style="font-size: 12px;">Adjuntamos el certificado de participación correspondiente.</span></strong></p> <p style="text-align: justify; margin-top: 0px; margin-bottom: 0px;">&nbsp;</p> <p style="text-align: justify; margin-top: 0px; margin-bottom: 0px;"><span style="font-size: 12px;">¡Hasta la próxima oportunidad!</span></p> <p style="text-align: justify; margin-top: 0px; margin-bottom: 0px;">&nbsp;</p> <p style="text-align: justify; margin-top: 0px; margin-bottom: 0px;"><span style="font-size: 12px;">Atentamente,</span></p> <p style="text-align: justify; margin-top: 0px; margin-bottom: 0px;"><span style="font-size: 14px;"> <em><strong>DMC Perú</strong></em></span></p> </div></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></div> </td></tr>  <tr><td width="100%" class="blk_container bmeHolder bmeBody" name="bmeBody" valign="top" align="center" style="color: rgb(56, 56, 56); border: 0px none transparent;" bgcolor=""> </td></tr> <tr><td width="100%"> <table class="bmeHolder" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" name="bmeBody" style="color: rgb(56, 56, 56); border: 0px none transparent;" bgcolor=""> <tbody><tr> <td width="100%" valign="top" align="center">   <div> <table class="blk_parent1" cellspacing="0" cellpadding="0" style="max-width: 600px;" width="600" align="center"><tbody><tr><td valign="top" align="center" width="33%" class="tdPart" bgcolor="transparent" style=""> <table cellspacing="0" cellpadding="0" border="0" width="100%" class="blk_parent" align="left" style="float:left;"><tbody><tr><td valign="top" align="center" class="blk_container bmeColumn1" name="bmeColumn1" style="color: rgb(56, 56, 56); border: 0px none transparent;" bgcolor=""> </td></tr></tbody> </table></td><td valign="top" align="center" class="tdPart" width="33%" bgcolor="transparent" style=""> <table cellspacing="0" cellpadding="0" border="0" width="100%" class="blk_parent" align="left" style="float:left;"><tbody><tr><td valign="top" align="center" class="blk_container bmeColumn2" name="bmeColumn2" style="color: rgb(56, 56, 56); border: 0px none transparent;" bgcolor=""> </td></tr></tbody> </table></td><td valign="top" align="center" width="33%" class="tdPart"> <table cellspacing="0" cellpadding="0" border="0" width="100%" class="blk_parent" align="left" style="float:left;"><tbody><tr><td valign="top" align="center" class="blk_container bmeColumn3" name="bmeColumn3" style="color: rgb(56, 56, 56); border: 0px none transparent;" bgcolor=""> </td></tr></tbody> </table>   </td></tr></tbody> </table> </div> </td> </tr></tbody> </table> </td></tr> <tr><td width="100%" class="blk_container bmeHolder" name="bmePreFooter" valign="top" align="center" style="color: rgb(56, 56, 56); border: 0px none transparent;" bgcolor=""> <div id="dv_27" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text" style=""><tbody><tr><td> <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><td class="tdPart" valign="top" align="center" style="background-color: rgb(0, 0, 0);"> <table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float: left; background-color: rgb(0, 0, 0);" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="line-height: 150%; text-align: center;"><span style="color: #ffffff;"><strong>¡Contáctanos!</strong></span> <br><span style="color: #ffffff; font-size: 12px;">Si tienes alguna consulta, comunícate con nuestros asesores</span> <br><span style="font-size: 12px;"><span style="color: #ffffff;">comerciales a los teléfonos:</span>&nbsp;<span style="color: #16a7e0;"><a rel="noopener" href="http://dmc.bmetrack.com/c/l?u=B9B26F8&amp;e=11B38A9&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="color: #16a7e0;">+51 994 227 768</a></span>&nbsp;<span style="color: #ffffff;">con Katherine Flores,&nbsp;</span> <br><span style="color: #16a7e0;"><a rel="noopener" href="http://dmc.bmetrack.com/c/l?u=B9B26F9&amp;e=11B38A9&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="color: #16a7e0;">+51 981 350 255</a>&nbsp;</span><span style="color: #ffffff;">con Yelsi Vega,</span>&nbsp;<span style="color: #16a7e0;"><a rel="noopener" href="http://dmc.bmetrack.com/c/l?u=B9B26FA&amp;e=11B38A9&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="color: #16a7e0;">+51 936 753 732</a></span>&nbsp;<span style="color: #ffffff;">con Lisbeth Montero,</span> <br><span style="color: #16a7e0;"><a rel="noopener" href="http://dmc.bmetrack.com/c/l?u=B9B26FB&amp;e=11B38A9&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="color: #16a7e0;">+51 902 815 695</a>&nbsp;</span><span style="color: #ffffff;">con&nbsp;Alfonso Algoner o</span>&nbsp;<span style="color: #16a7e0;"><a rel="noopener" href="http://dmc.bmetrack.com/c/l?u=B9B26FC&amp;e=11B38A9&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="color: #16a7e0;">+51&nbsp;934 620 143</a>&nbsp;</span><span style="color: #ffffff;">con Jessy Yllesca.</span></span></div></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_10" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(255, 255, 255);"><tbody><tr><td class="tblCellMain" style="padding: 2px 20px;"> <table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px none rgb(255, 255, 255); min-width: 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid;"><tbody><tr><td><span></span></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_15" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_social_follow" style="background-color: rgb(0, 0, 0);"><tbody><tr><td class="tblCellMain" align="center" style="padding-top:15px; padding-bottom:15px; padding-left:20px; padding-right:20px;"> <table class="tblContainer mblSocialContain" cellspacing="0" cellpadding="0" border="0" align="center" style="text-align:center;"><tbody><tr><td class="tdItemContainer"> <table cellspacing="0" cellpadding="0" border="0" class="mblSocialContain" style="table-layout: auto;"><tbody><tr><td valign="top" name="bmeSocialTD" class="bmeSocialTD"><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="website" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="http://dmc.bmetrack.com/c/l?u=B9B26E4&amp;e=11B38A9&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/wb_btn.png" alt="Website" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="facebook" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="http://dmc.bmetrack.com/c/l?u=B9B26E5&amp;e=11B38A9&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/fb_btn.png" alt="Facebook" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="instagram" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="http://dmc.bmetrack.com/c/l?u=B9B26E6&amp;e=11B38A9&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/in_btn.png" alt="Instagram" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="linkedin" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="http://dmc.bmetrack.com/c/l?u=B9B26E7&amp;e=11B38A9&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/li_btn.png" alt="LinkedIn" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="youtube" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="height: 20px; padding-right: 20px;"><a href="http://dmc.bmetrack.com/c/l?u=B9B26E8&amp;e=11B38A9&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/yt_btn.png" alt="YouTube" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></div> </td></tr> </tbody> </table> </td></tr><tr><td width="100%" class="blk_container bmeHolder" name="bmeFooter" valign="top" align="center" style="color: rgb(102, 102, 102); border: 0px none transparent;" bgcolor=""><div id="dv_20" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style=""><tbody><tr></tr></tbody> </table></div><div id="dv_17" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_footer" style=""><tbody><tr><td name="tblCell" class="tblCell" style="padding: 10px 20px;word-break: break-word;" valign="top" align="left"> <table cellpadding="0" cellspacing="0" border="0" width="100%"><tbody><tr><td name="bmeBadgeText" style="text-align:left; word-break: break-word;" align="left"><span id="spnFooterText" style="font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 11px; line-height: 140%;">Este mensaje fue enviado a  por <br>Jr. Rio de la Plata 167. Of. 203, LIMA, LIMA  L35, Peru</span> </td></tr></tbody> </table></td></tr></tbody> </table></div></td></tr> </tbody> </table> </td></tr></tbody> </table></td></tr></tbody> </table>';

        return $html;
    }

    public function listado_alumnos()
    {
        $gbd = Gestionbd::getInstancia();
        $sql = "SELECT os.orden_servicio_id AS codigo ,date(c.CAPACITACION_FECHA_INICIO) AS fecha_ini ,c.capacitacion_fecha_fin AS fecha_fin, p.persona_nombre AS nombre, p.persona_apellidos AS apellidos, ROUND(c.capacitacion_horas/.75) AS horas_academicas, p.persona_email AS email,cb.capacitacion_base_tipo AS tipo, cb.capacitacion_base_nombre AS capacitacion, if(os.CAPACITACION_FLAG_ENTREGA_CONSTANCIA =1 and ifnull(os.CAPACITACION_FECHA_ENTREGA_CONSTANCIA,0) =0, null, os.capacitacion_nota) AS calificacion FROM orden_servicio os INNER JOIN capacitacion c ON os.servicio_id = c.capacitacion_id INNER JOIN capacitacion_base cb ON c.capacitacion_base_id = cb.capacitacion_base_id INNER JOIN persona p ON os.usuario_servicio = p.persona_id LEFT JOIN orden_servicio_baja osb ON os.orden_servicio_id = osb.orden_servicio_id WHERE osb.orden_servicio_id IS NULL AND (IFNULL(os.capacitacion_flag_entrega_certificado,0)=0 AND ( os.`ORDEN_SERVICIO_MONTO_REAL` - os.orden_servicio_monto_pagado) < 1 AND ( os.capacitacion_nota>=14 AND NOT cb.capacitacion_base_tipo IN ('PEA','PEA ONLINE','CURSO GRATUITO') AND c.capacitacion_fecha_fin >= '2020-04-01' AND DATE(DATE_ADD(c.`CAPACITACION_FECHA_FIN`, INTERVAL 7 DAY))<=DATE(NOW()) OR cb.capacitacion_base_tipo = 'CURSO POWER' AND DATE(DATE_ADD(c.`CAPACITACION_FECHA_FIN`, INTERVAL 1 DAY))<=DATE(NOW()) ) AND NOT os.servicio_id IN (855,859,880,884,854,846,888,847,868,858,843,881,845,873,856) ) OR (cb.`CAPACITACION_BASE_TIPO` = 'CURSO GRATUITO' AND DATE(DATE_ADD(c.`CAPACITACION_FECHA_FIN`, INTERVAL 2 DAY))<=DATE(NOW()) AND os.`CAPACITACION_FLAG_ENTREGA_CONSTANCIA` = 1 AND IFNULL(os.`CAPACITACION_FECHA_ENTREGA_CONSTANCIA`,0)=0)";
        $cmd = $gbd->prepare($sql);
        $cmd->execute();
        $lista = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
    }

    public function actualizar_envio($id)
    {
        $gbd = Gestionbd::getInstancia();
        $sql = "update orden_servicio set capacitacion_flag_entrega_certificado = 1, capacitacion_fecha_entrega_certificado = now() where orden_servicio_id = :id";
        $cmd = $gbd->prepare($sql);
        $cmd->bindparam(":id", $id);
        $cmd->execute();
    }

    public function actualizar_envio_constancia($id)
    {
        $gbd = Gestionbd::getInstancia();
        $sql = "update orden_servicio set capacitacion_fecha_entrega_constancia = now() where orden_servicio_id = :id";
        $cmd = $gbd->prepare($sql);
        $cmd->bindparam(":id", $id);
        $cmd->execute();
    }
}
