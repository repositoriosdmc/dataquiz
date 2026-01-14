<?php

/*error_reporting(E_ALL);
ini_set('display_errors', '1');*/

// Importa las clases de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Carga cada archivo de la clase manualmente

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//require('pdf/textbox.php');

require_once "dao_tools.php";

class certificadoPDF extends tools
{


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

        //$url = "https://certificaciones.dmc.pe/academico/plantilla/fondo-certificado-summit.png";
        $url = "https://certificaciones.dmc.pe/academico/plantilla/certificadoSummit2023.png";

        $logo = "logoDMC2021.png";

        /*$assets["logo"] = array(

            "url" => "https://certificaciones.dmc.pe/academico/plantilla/logo-summit.png",
                
            "posicion" => array(127, 22, 0, 15)
        );

        $assets["selloGerente"] = array(

            "url"=>"https://certificaciones.dmc.pe/academico/plantilla/sello-gerente-general-plomo.png",
            "posicion"=>array(111,154,0,20)

        );

        $assets["selloDirector"] = array(

            "url"=>"https://certificaciones.dmc.pe/academico/plantilla/sello-director-academico-plomo.png",
            "posicion"=>array(184,154,0,20)

        );

        $assets["firmaGerente"] = array(

            "url"=>"https://certificaciones.dmc.pe/academico/plantilla/firma-joel-nitido.png",
            "posicion"=>array(91,158,0,17)

        );

        $assets["firmaDirector"] = array(

            "url"=>"https://certificaciones.dmc.pe/academico/plantilla/firma-jonny-chambi-nitido.png",
            "posicion"=>array(168,155,0,20)

        );*/

        $firmaDirectorArriba = 236;

        $firmaGerenteArriba = 232;

        $pdf_imagen["fondo"] = $url;

        $pdf_imagen["logo"] = $logo;

        $pdf_imagen["assets"] = $assets;

        $pdf_imagen["director"] = $firmaDirectorArriba;

        $pdf_imagen["gerente"] = $firmaGerenteArriba;

        return $pdf_imagen;
    }

    public function generar_certificado($codigo, $nombre, $apellidos, $capacitacion, $horas, $calificacion, $fechaFin, $tipo = NULL, $fechaIni = NULL)
    {

        $certificado = new tools();

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
        $modo_tipo = $tipo == "ESPECIALIZACIÓN DMC" ? "la especialización"  : "el curso";

        $textoCertificado = "CERTIFICADO";

        $textoEspecializadoCurso = "de participación";

        /*$detalle["textoCertificado"]["text"] = $textoCertificado;

            $detalle["textoCertificado"]["position"] = array(10, 57);

            $detalle["textoCertificado"]["tamanio"] = 45;

            $detalle["textoCertificado"]["color"] = array(0, 41, 69);

            $detalle["textoCertificado"]["center"] = "ok";

            $detalle["textoCertificado"]["fuente"] = "Panton-Regular";*/

        unset($detalle["textoCertificado"]);

        unset($detalle["especializado"]);

        /*$detalle["especializado"]["text"] = $textoEspecializadoCurso;

            $detalle["especializado"]["position"] = array(125, 71);

            $detalle["especializado"]["tamanio"] = 20;

            $detalle["especializado"]["fuente"] = "Panton-Regular";

            $detalle["especializado"]["color"] = array(87, 87, 86);

            $detalle["especializado"]["center"] = "ok";*/


        /*$detalle["textoEspecializacion"]["text"] = "SE OTORGA A";

            $detalle["textoEspecializacion"]["position"] = array(129, 85);

            $detalle["textoEspecializacion"]["tamanio"] = 13;

            $detalle["textoEspecializacion"]["color"] = array(87, 87, 86);

            $detalle["textoEspecializacion"]["center"] = "ok";

            $detalle["textoEspecializacion"]["fuente"] = "Geometria-regular";*/

        unset($detalle["textoEspecializacion"]);

        //unset($detalle["textoEspecializacion"]);

        $detalle["nombre"]["text"] =  mb_strtoupper($nombre . " " . $apellidos, "UTF-8");

        $detalle["nombre"]["position"] = array(98, 108);

        $detalle["nombre"]["tamanio"] = 22;

        $detalle["nombre"]["color"] = array(16, 90, 152);

        $detalle["nombre"]["fuente"] = "Geometria-Medium";

        $detalle["nombre"]["center"] = "ok";


        unset($detalle["honor"]);

        unset($detalle["capacitacion_t"]);

        /*$detalle["horas_b"]["text"] = "Por haber participado en el congreso AI & Analytics";

            $detalle["horas_b"]["position"] = array(105, 112);

            $detalle["horas_b"]["tamanio"] = 12;

            $detalle["horas_b"]["color"] = array(87, 87, 86);

            $detalle["horas_b"]["fuente"] = "Geometria-regular";

            $detalle["horas_b"]["center"] = "ok";

            $detalle["horas_c"]["text"] = "Summit, llevado a cabo del 18 al 22 de octubre del 2021";

            $detalle["horas_c"]["position"] = array(58, 118);

            $detalle["horas_c"]["tamanio"] = 12;

            $detalle["horas_c"]["color"] = array(87, 87, 86);

            $detalle["horas_c"]["fuente"] = "Geometria-regular";

            $detalle["horas_c"]["center"] = "ok";*/


        /*$detalle["fecha"]["text"] = strftime("Lima, %B del %Y",  strtotime($fechaFin));

            $detalle["fecha"]["position"] = array(125, 129);

            $detalle["fecha"]["tamanio"] = 12;

            $detalle["fecha"]["fuente"] = "Geometria-regular";

            $detalle["fecha"]["color"] = array(0, 41, 69);

            $detalle["fecha"]["center"] = "ok";*/

        unset($detalle["fecha"]);

        unset($detalle["horas"]);

        unset($detalle["empresa_2"]);

        unset($detalle["empresaDirecto"]);

        unset($detalle["cargoDirecto"]);

        unset($detalle["capacitacion"]);


        //Firmas

        /*$detalle["gerente"]["text"] = "MBA Joel Lapa B.";

            $detalle["gerente"]["position"] = array(89, 180);

            $detalle["gerente"]["tamanio"] = 11;

            $detalle["gerente"]["color"] = array(16, 90, 152);

            $detalle["gerente"]["fuente"] = "Geometria-Medium";

            $detalle["gerente"]["center"] = "fixed";

            $detalle["gerenteCargo"]["text"] = "GERENTE GENERAL";

            $detalle["gerenteCargo"]["position"] = array(86, 186);

            $detalle["gerenteCargo"]["tamanio"] = 11;

            $detalle["gerenteCargo"]["color"] = array(87, 87, 86);

            $detalle["gerenteCargo"]["fuente"] = "Geometria-Medium";

            $detalle["gerenteCargo"]["center"] = "fixed";

            $detalle["director"]["text"] = "MBA Jonny Chambi C.";

            $detalle["director"]["position"] = array(157,180);

            $detalle["director"]["tamanio"] = 11;

            $detalle["director"]["color"] = array(16, 90, 152);

            $detalle["director"]["fuente"] = "Geometria-Medium";

            $detalle["director"]["center"] = "fixed";

            $detalle["directorCargo"]["text"] = "DIRECTOR ACADÉMICO";

            $detalle["directorCargo"]["position"] = array(155, 186);

            $detalle["directorCargo"]["tamanio"] = 11;

            $detalle["directorCargo"]["color"] = array(87, 87, 86);

            $detalle["directorCargo"]["fuente"] = "Geometria-Medium";

            $detalle["directorCargo"]["center"] = "fixed";

            $detalle["codigo"]["color"] = array(87, 87, 86);

            $detalle["codigo"]["fuente"] = "Geometria-regular";

            $detalle["codigo"]["tamanio"] = 9;

            $detalle["codigo"]["position"] = array(200, 270);

            $detalle["codigo"]["center"] = "right";*/

        unset($detalle["gerente"]);
        unset($detalle["gerenteCargo"]);
        unset($detalle["director"]);
        unset($detalle["directorCargo"]);
        unset($detalle["codigo"]);

        //Capacitacion






        $pdf = new PDF_TextBox('L');


        $pdf->AddFont('Panton-SemiBold', '', 'Panton-SemiBold.php');
        $pdf->AddFont('Panton-Regular', '', 'Panton-Regular.php');
        $pdf->AddFont('Geometria-regular', '', 'Geometria-regular.php');

        $pdf->AddFont('Geometria-Medium', '', 'Geometria-Medium.php');
        $pdf->AddFont('Geometria-Bold', '', 'Geometria-Bold.php');
        $pdf->AddFont('Geometria-Regular', '', 'Geometria-regular.php');



        $pdf->SetRightMargin(false);
        $pdf->SetAutoPageBreak(false); // eliminar margin bottom (desactiva el salto a pagina)
        $pdf->AddPage();
        //$pdf->Image('https://certificaciones.dmc.pe/plantilla/certificado.png', 0, 0, 297, 210);
        $pdf->Image($pdfImg["fondo"], 0, 0, 297, 210);
        /* Linea de firma Instructor */
        /*$line_x=110;
        $pdf->Line($line_x+0.8, 177.0, $line_x-55, 177.0); */

        /* Texto Horas */

        //$capacitacion = "(".$capacitacion." - clases en vivo),";





        /* Firmas */

        $firmaDirector = "http://certificaciones.dmc.pe/academico/plantilla/FJonnyC.png";

        $firmaGerente = "http://certificaciones.dmc.pe/academico/plantilla/FJoelL.png";


        $logoColor = "http://certificaciones.dmc.pe/academico/plantilla/dmcColor.png";


        /*if ($tipo != "CURSO GRATUITO") {*/

        $pdf->Cell(100, 100, "", 100, 100, 'C', $pdf->Image($firmaDirector, 137, $pdfImg["director"], 0, 22));

        $pdf->Cell(100, 100, "", 100, 100, 'C', $pdf->Image($firmaGerente, 48, $pdfImg["gerente"], 0, 35));
        /*} else {

            $logo = "https://certificaciones.dmc.pe/academico/plantilla/logoDMC2021.png";

            $pdf->Cell(140, 140, "", 70, 70, 'C', $pdf->Image($logo, 45, 30.5, 0, 12));

            $dataDriven = "https://certificaciones.dmc.pe/academico/plantilla/dataDriven2021.png";

            $pdf->Cell(100, 100, "", 60, 60, 'C', $pdf->Image($dataDriven, 225, 15.5, 0, 30));

            $firmaGerente = "http://certificaciones.dmc.pe/academico/plantilla/FJoelL.png";

            $pdf->Cell(100, 100, "", 60, 60, 'C', $pdf->Image($firmaGerente, 90, 150.5, 0, 40));

            $firmaDirector = "http://certificaciones.dmc.pe/academico/plantilla/FJonnyC.png";

            $pdf->Cell(100, 100, "", 60, 60, 'C', $pdf->Image($firmaDirector, 180, 155.5, 0, 25));
        }*/







        //assets img

        //$pdf->Rect(0, 0, 20, 20, 'D');

        /*$pdf->SetFont('Arial','',15);
$pdf->SetXY(80,35);
$pdf->drawTextBox('This sentence is centered in the middle of the box.', 50, 50, 'C', 'M');*/


        // Data rows

        // (loop) foreach($data as $row) {


        $pdf->SetFont('Geometria-Medium', '', 16);
        $pdf->SetXY(42.5, 128);
        $pdf->SetTextColor(255, 255, 255);

        $text_P = iconv('UTF-8', 'windows-1252', $capacitacion);
        $pdf->drawTextBox($text_P, 58, 56, 'C', 'M', false);




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



        return $pdf->Output();
    }


    public function mensaje_certificado()
    {

        $html = "<p>Estimado (a) alumno (a), reciba un cordial saludo de DMC</p>";

        $html .= "<p>Sirva la presente para enviar el certificado del curso en asunto.</p>";

        $html .= "<p>Agradecemos por habernos escogido para esta capacitación, esperando que haya sido de gran crecimiento para ti.</p>";

        $html .= "Así mismo te animamos a seguir aprendiendo con nosotros...Te invitamos a visitar nuestra página web <a href='https://intranetdmc.com/categoria/curso-online-en-vivo/'>DMC PERÚ</a> donde podrás observar los cursos que inician próximamente y por el <a href='https://www.facebook.com/datamining.pe/'>Facebook</a> para que puedan estar al tanto de nuestros talleres gratuitos en la modalidad online.";

        $html .= "<p>#YOMEQUEDOENCASA</p>";

        $html .= "<p>#DMConline</p>";

        return $html;
    }

    public function send_mail($from_name, $correo, $nom, $file, $url, $id, $asunto, $mensaje, $bbc = null)
    {
        $mail = new PHPMailer;

        //$mail->SMTPDebug = 3;            JOIN (SELECT @curRow := 0, @curType := '') r) a                   // Enable verbose debug output
        $mail->isSMTP();
        $mail->Host = 'mail.intranetdmc.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'test@intranetdmc.com';
        $mail->Password = 'YZtOIDQ.5IqM';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;                                  // TCP port to connect to

        $mail->setFrom('capacitacion@dmc.pe', $from_name);
        $mail->addAddress($correo, $nom);     // Add a recipient

        if ($bbc != null) {

            foreach ($bbc as $val) {
                $mail->addBCC($val);
            }
        }

        if (is_array($file)) {
            foreach ($file as $key => $value) {
                $tmp = $file[$key]["tmp_name"];
                if (is_uploaded_file($tmp)) {
                    $mail->addAttachment($tmp, $file[$key]["name"]);
                }
            }
        }

        if (is_array($url)) {

            foreach ($url as $key => $value) {

                $mail->addStringAttachment(file_get_contents($value), $id . ".pdf");
            }
        } else if ($url) {
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
    }

    public function mensaje_certificado_digital($nombre)
    {

        $html = '<table width="100%" cellspacing="0" cellpadding="0" border="0" name="bmeMainBody" style="background-color: rgb(238, 238, 238);" bgcolor="#eeeeee"><tbody><tr><td width="100%" valign="top" align="center"> <table cellspacing="0" cellpadding="0" border="0" name="bmeMainColumnParentTable"><tbody><tr><td name="bmeMainColumnParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate;"> <table name="bmeMainColumn" class="bmeHolder bmeMainColumn" style="max-width: 600px; overflow: visible; border-radius: 0px; border-collapse: separate; border-spacing: 0px;" cellspacing="0" cellpadding="0" border="0" align="center">   <tbody><tr><td width="100%" class="blk_container bmeHolder" name="bmePreHeader" valign="top" align="center" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: rgb(255, 255, 255);" bgcolor="#ffffff"><div id="dv_14" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(0, 125, 186);"><tbody><tr><td class="tblCellMain" style="padding: 5px 20px;"> <table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px none rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_31" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td> <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 5px 20px; background-color: rgb(255, 255, 255);"><img src="https://images.benchmarkemail.com/client197129/image6795135.png" class="mobile-img-large" width="560" style="max-width: 1200px; display: block; width: 560px;" alt="" border="0"></td></tr></tbody> </table></td></tr></tbody> </table></div></td></tr><tr><td width="100%" class="bmeHolder" valign="top" align="center" name="bmeMainContentParent" style="border: 0px none rgb(102, 102, 102); border-radius: 0px; border-collapse: separate; border-spacing: 0px; overflow: hidden;"> <table name="bmeMainContent" style="border-radius: 0px; border-collapse: separate; border-spacing: 0px; border: 0px none transparent;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"> <tbody><tr><td width="100%" class="blk_container bmeHolder" name="bmeHeader" valign="top" align="center" style="border: 0px none transparent; color: rgb(56, 56, 56); background-color: rgb(255, 255, 255);" bgcolor="#ffffff"> <div id="dv_11" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td> <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 0px;"><img src="https://certificaciones.dmc.pe/academico/plantilla/banner-summit.jpg" class="mobile-img-large" width="600" style="max-width: 1200px; display: block; width: 600px;" alt="" border="0"></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_10" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text"><tbody><tr><td> <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><td class="tdPart" valign="top" align="center"> <table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float:left; background-color:transparent;" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="line-height: 125%;"> <p style="margin-top: 0px; margin-bottom: 0px;"><strong><span style="font-size: 24px;">Hola, ';

        $html .= $nombre;

        $html .= '</span></strong></p> <p style="margin-top: 0px; margin-bottom: 0px;">&nbsp;</p> <p style="margin-top: 0px; margin-bottom: 0px;">Estamos muy contentos de haber contado con tu asistencia en el AI &amp; Analytics Summit 2021.</p> <p style="margin-top: 0px; margin-bottom: 0px;">&nbsp;</p> <p style="margin-top: 0px; margin-bottom: 0px;text-align:justify;">Esperamos que los conocimientos y experiencias compartidas por nuestros ponentes te hayan inspirado a seguir transformando el mundo a través de los datos.</p> <p style="margin-top: 0px; margin-bottom: 0px;">&nbsp;</p> <p style="margin-top: 0px; margin-bottom: 0px;text-align:justify;">Adjuntamos el certificado digital de participación correspondiente.</p> <p style="margin-top: 0px; margin-bottom: 0px;">&nbsp;</p> <p style="margin-top: 0px; margin-bottom: 0px;">¡Gracias por confiar en nosotros y te esperamos en la siguiente edición!</p> </div></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></div></td></tr>    <tr><td width="100%" class="blk_container bmeHolder" name="bmePreFooter" valign="top" align="center" style="color: rgb(56, 56, 56); border: 0px none transparent;" bgcolor=""> <div id="dv_15" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_social_follow" style="background-color: rgb(0, 0, 0);"><tbody><tr><td class="tblCellMain" align="center" style="padding: 15px 20px;"> <table class="tblContainer mblSocialContain" cellspacing="0" cellpadding="0" border="0" align="center" style="text-align:center;"><tbody><tr><td class="tdItemContainer"> <table cellspacing="0" cellpadding="0" border="0" class="mblSocialContain" style="table-layout: auto;"><tbody><tr><td valign="top" name="bmeSocialTD" class="bmeSocialTD"><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="website" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=A6B44E8&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/wb_btn.png" alt="Website" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="facebook" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=A6B44E9&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/fb_btn.png" alt="Facebook" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="instagram" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=A6B44EB&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/in_btn.png" alt="Instagram" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="linkedin" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=A6B44EA&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/li_btn.png" alt="LinkedIn" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="youtube" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=A6B44EC&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/yt_btn.png" alt="YouTube" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_18" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(0, 0, 0);"><tbody><tr><td class="tblCellMain" style="padding: 5px 20px;"> <table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px solid rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_16" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text"><tbody><tr><td> <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><td class="tdPart" valign="top" align="center" style="background-color: rgb(0, 0, 0);"> <table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float: left; background-color: rgb(0, 0, 0);" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 10px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="line-height: 150%; text-align: center;"><span style="font-size: 12px; color: #ffffff;"><strong>Contáctanos <br></strong>Celular:&nbsp;&nbsp;985 126 691 <br>E-mail:&nbsp;capacitacion@intranetdmc.com&nbsp; <br>Web:&nbsp;<a href="https://dmc.bmetrack.com/c/l?u=A6EA533&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=es&amp;q=http://www.dataminingperu.com&amp;source=gmail&amp;ust=1479825622894000&amp;usg=AFQjCNGSQnnBL7u51fMYryR0gnBFEieTjw"><span style="color: #ffffff;">www.intranetdmc.com</span></a>&nbsp; <br>Oficina: calle Río de la Plata 167, Of. 203 - San Isidro</span></div></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></div> </td></tr> </tbody> </table> </td></tr> </tbody> </table> </td></tr></tbody> </table></td></tr></tbody> </table>';

        return $html;
    }

    public function mensaje_curso_gratuito($nombre)
    {

        $html = '<table width="100%" cellspacing="0" cellpadding="0" border="0" name="bmeMainBody" style="background-color: rgb(238, 238, 238);" bgcolor="#eeeeee"><tbody><tr><td width="100%" valign="top" align="center"> <table cellspacing="0" cellpadding="0" border="0" name="bmeMainColumnParentTable"><tbody><tr><td name="bmeMainColumnParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate;"> <table name="bmeMainColumn" class="bmeHolder bmeMainColumn" style="max-width: 600px; overflow: visible; border-radius: 0px; border-collapse: separate; border-spacing: 0px;" cellspacing="0" cellpadding="0" border="0" align="center">   <tbody><tr><td width="100%" class="blk_container bmeHolder" name="bmePreHeader" valign="top" align="center" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: rgb(255, 255, 255);" bgcolor="#ffffff"><div id="dv_14" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(0, 125, 186);"><tbody><tr><td class="tblCellMain" style="padding: 5px 20px;"> <table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px none rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_31" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td> <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 5px 20px; background-color: rgb(255, 255, 255);"><img src="https://images.benchmarkemail.com/client197129/image6795135.png" class="mobile-img-large" width="560" style="max-width: 1200px; display: block; width: 560px;" alt="" border="0"></td></tr></tbody> </table></td></tr></tbody> </table></div></td></tr><tr><td width="100%" class="bmeHolder" valign="top" align="center" name="bmeMainContentParent" style="border: 0px none rgb(102, 102, 102); border-radius: 0px; border-collapse: separate; border-spacing: 0px; overflow: hidden;"> <table name="bmeMainContent" style="border-radius: 0px; border-collapse: separate; border-spacing: 0px; border: 0px none transparent;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"> <tbody><tr><td width="100%" class="blk_container bmeHolder" name="bmeHeader" valign="top" align="center" style="border: 0px none transparent; color: rgb(56, 56, 56); background-color: rgb(255, 255, 255);" bgcolor="#ffffff"> <div id="dv_11" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td> <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 0px;"><img src="https://images.benchmarkemail.com/client197129/image8759465.jpg" class="mobile-img-large" width="600" style="max-width: 1200px; display: block; width: 600px;" alt="" border="0"></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_10" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text"><tbody><tr><td> <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><td class="tdPart" valign="top" align="center"> <table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float:left; background-color:transparent;" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="line-height: 125%;"> <p style="margin-top: 0px; margin-bottom: 0px;"><strong><span style="font-size: 24px;">Hola, ';

        $html .= $nombre;

        $html .= '</span></strong></p> <p style="margin-top: 0px; margin-bottom: 0px;">&nbsp;</p> <p style="margin-top: 0px; margin-bottom: 0px;">Adjuntamos la constancia de participación correspondiente al curso mencionado en el asunto de este correo.</p> <p style="margin-top: 0px; margin-bottom: 0px;">&nbsp;</p> <p style="margin-top: 0px; margin-bottom: 0px;text-align:justify;">Aprovechamos para agradecerte por confiar en nosotros para fortalecer tus conocimientos y habilidades. Esperamos que nuestras clases hayan sido de gran provecho para ti y podamos contar contigo en nuestras aulas nuevamente.</p> <p style="margin-top: 0px; margin-bottom: 0px;">&nbsp;</p> <p style="margin-top: 0px; margin-bottom: 0px;text-align:justify;">Te recordamos que puedes visitar nuestra página web www.intranetdmc.com o nuestras redes sociales para conocer sobre nuestros cursos, descuentos, concursos, tips y mucho más.</p> <p style="margin-top: 0px; margin-bottom: 0px;">&nbsp;</p> <p style="margin-top: 0px; margin-bottom: 0px;">Atentamente,</p> </div></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></div></td></tr>    <tr><td width="100%" class="blk_container bmeHolder" name="bmePreFooter" valign="top" align="center" style="color: rgb(56, 56, 56); border: 0px none transparent;" bgcolor=""> <div id="dv_15" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_social_follow" style="background-color: rgb(0, 0, 0);"><tbody><tr><td class="tblCellMain" align="center" style="padding: 15px 20px;"> <table class="tblContainer mblSocialContain" cellspacing="0" cellpadding="0" border="0" align="center" style="text-align:center;"><tbody><tr><td class="tdItemContainer"> <table cellspacing="0" cellpadding="0" border="0" class="mblSocialContain" style="table-layout: auto;"><tbody><tr><td valign="top" name="bmeSocialTD" class="bmeSocialTD"><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="website" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=A6B44E8&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/wb_btn.png" alt="Website" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="facebook" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=A6B44E9&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/fb_btn.png" alt="Facebook" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="instagram" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=A6B44EB&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/in_btn.png" alt="Instagram" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="linkedin" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=A6B44EA&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/li_btn.png" alt="LinkedIn" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="youtube" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=A6B44EC&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/yt_btn.png" alt="YouTube" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_18" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(0, 0, 0);"><tbody><tr><td class="tblCellMain" style="padding: 5px 20px;"> <table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px solid rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_16" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text"><tbody><tr><td> <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><td class="tdPart" valign="top" align="center" style="background-color: rgb(0, 0, 0);"> <table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float: left; background-color: rgb(0, 0, 0);" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 10px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="line-height: 150%; text-align: center;"><span style="font-size: 12px; color: #ffffff;"><strong>Contáctanos <br></strong>Celular:&nbsp;&nbsp;985 126 691 <br>E-mail:&nbsp;capacitacion@intranetdmc.com&nbsp; <br>Web:&nbsp;<a href="https://dmc.bmetrack.com/c/l?u=A6EA533&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=es&amp;q=http://www.dataminingperu.com&amp;source=gmail&amp;ust=1479825622894000&amp;usg=AFQjCNGSQnnBL7u51fMYryR0gnBFEieTjw"><span style="color: #ffffff;">www.intranetdmc.com</span></a>&nbsp; <br>Oficina: calle Río de la Plata 167, Of. 203 - San Isidro</span></div></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></div> </td></tr> </tbody> </table> </td></tr> </tbody> </table> </td></tr></tbody> </table></td></tr></tbody> </table>';

        return $html;
    }

    public function mensaje_certificado_digital_congreso($nombre)
    {

        $html = '<table width="100%" cellspacing="0" cellpadding="0" border="0" name="bmeMainBody" style="background-color: rgb(238, 238, 238);" bgcolor="#eeeeee"><tbody><tr><td width="100%" valign="top" align="center"> <table cellspacing="0" cellpadding="0" border="0" name="bmeMainColumnParentTable"><tbody><tr><td name="bmeMainColumnParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate;"> <table name="bmeMainColumn" class="bmeHolder bmeMainColumn" style="max-width: 600px; overflow: visible; border-radius: 0px; border-collapse: separate; border-spacing: 0px;" cellspacing="0" cellpadding="0" border="0" align="center">   <tbody><tr><td width="100%" class="blk_container bmeHolder" name="bmePreHeader" valign="top" align="center" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: rgb(255, 255, 255);" bgcolor="#ffffff"><div id="dv_14" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(0, 125, 186);"><tbody><tr><td class="tblCellMain" style="padding: 5px 20px;"> <table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px none rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_31" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td> <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 5px 20px; background-color: rgb(255, 255, 255);"><img src="https://images.benchmarkemail.com/client197129/image6795135.png" class="mobile-img-large" width="560" style="max-width: 1200px; display: block; width: 560px;" alt="" border="0"></td></tr></tbody> </table></td></tr></tbody> </table></div></td></tr><tr><td width="100%" class="bmeHolder" valign="top" align="center" name="bmeMainContentParent" style="border: 0px none rgb(102, 102, 102); border-radius: 0px; border-collapse: separate; border-spacing: 0px; overflow: hidden;"> <table name="bmeMainContent" style="border-radius: 0px; border-collapse: separate; border-spacing: 0px; border: 0px none transparent;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"> <tbody><tr><td width="100%" class="blk_container bmeHolder" name="bmeHeader" valign="top" align="center" style="border: 0px none transparent; color: rgb(56, 56, 56); background-color: rgb(255, 255, 255);" bgcolor="#ffffff"> <div id="dv_11" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td> <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 0px;"></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_10" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text"><tbody><tr><td> <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><td class="tdPart" valign="top" align="center"> <table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float:left; background-color:transparent;" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="line-height: 125%;"> <p style="margin-top: 0px; margin-bottom: 0px;"><strong><span style="font-size: 24px;">Hola, ';

        $html .= $nombre;

        $html .= '</span></strong></p> <p style="margin-top: 0px; margin-bottom: 0px;">&nbsp;</p> <p style="margin-top: 0px; margin-bottom: 0px;">Por haber asistido al taller impartido por DMC Perú en el IV Encuentro Regional de Estudiantes de Ingeniería Industria "El Rol del Ingeniero Industrial en época de crisis", adjuntamos el certificado correspondiente.</p> <p style="margin-top: 0px; margin-bottom: 0px;">&nbsp;</p> <p style="margin-top: 0px; margin-bottom: 0px;text-align:justify;">Aprovechamos la oportunidad para agradecerte por confiar en nosotros para fortalecer tus conocimientos y habilidades. Esperamos que este taller haya sido de gran provecho para ti.</p> <p style="margin-top: 0px; margin-bottom: 0px;">&nbsp;</p> <p style="margin-top: 0px; margin-bottom: 0px;text-align:justify;">Te recordamos que puedes visitar nuestra página web www.intranetdmc.com o nuestras redes sociales para conocer sobre nuestros talleres, cursos, descuentos, concurso, tips y mucho más.&nbsp;</p> <p style="margin-top: 0px; margin-bottom: 0px;">&nbsp;</p> <p style="margin-top: 0px; margin-bottom: 0px;">Atentamente,</p> </div></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></div></td></tr>    <tr><td width="100%" class="blk_container bmeHolder" name="bmePreFooter" valign="top" align="center" style="color: rgb(56, 56, 56); border: 0px none transparent;" bgcolor=""> <div id="dv_15" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_social_follow" style="background-color: rgb(0, 0, 0);"><tbody><tr><td class="tblCellMain" align="center" style="padding: 15px 20px;"> <table class="tblContainer mblSocialContain" cellspacing="0" cellpadding="0" border="0" align="center" style="text-align:center;"><tbody><tr><td class="tdItemContainer"> <table cellspacing="0" cellpadding="0" border="0" class="mblSocialContain" style="table-layout: auto;"><tbody><tr><td valign="top" name="bmeSocialTD" class="bmeSocialTD"><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="website" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=A6B44E8&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/wb_btn.png" alt="Website" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="facebook" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=A6B44E9&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/fb_btn.png" alt="Facebook" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="instagram" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=A6B44EB&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/in_btn.png" alt="Instagram" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="linkedin" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=A6B44EA&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/li_btn.png" alt="LinkedIn" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="youtube" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=A6B44EC&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/yt_btn.png" alt="YouTube" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_18" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(0, 0, 0);"><tbody><tr><td class="tblCellMain" style="padding: 5px 20px;"> <table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px solid rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_16" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text"><tbody><tr><td> <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><td class="tdPart" valign="top" align="center" style="background-color: rgb(0, 0, 0);"> <table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float: left; background-color: rgb(0, 0, 0);" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 10px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="line-height: 150%; text-align: center;"><span style="font-size: 12px; color: #ffffff;"><strong>Contáctanos <br></strong>Celular:&nbsp;&nbsp;985 126 691 <br>E-mail:&nbsp;capacitacion@intranetdmc.com&nbsp; <br>Web:&nbsp;<a href="https://dmc.bmetrack.com/c/l?u=A6EA533&amp;e=1076A1C&amp;c=30209&amp;t=1&amp;seq=1" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=es&amp;q=http://www.dataminingperu.com&amp;source=gmail&amp;ust=1479825622894000&amp;usg=AFQjCNGSQnnBL7u51fMYryR0gnBFEieTjw"><span style="color: #ffffff;">www.intranetdmc.com</span></a>&nbsp; <br>Oficina: calle Río de la Plata 167, Of. 203 - San Isidro</span></div></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></div> </td></tr> </tbody> </table> </td></tr> </tbody> </table> </td></tr></tbody> </table></td></tr></tbody> </table>';

        return $html;
    }

    public function mensaje_liv_data_summit()
    {

        $html = '<table width="100%" cellspacing="0" cellpadding="0" border="0" name="bmeMainBody" style="background-color: #e6e6e8;" bgcolor="#e6e6e8"><tbody><tr><td width="100%" valign="top" align="center"> <table cellspacing="0" cellpadding="0" border="0" name="bmeMainColumnParentTable"><tbody><tr><td name="bmeMainColumnParent" style="border-collapse: separate;"> <table name="bmeMainColumn" class="bmeHolder bmeMainColumn" style="max-width: 600px; overflow: visible;" cellspacing="0" cellpadding="0" border="0" align="center">    <tbody><tr id="section_1" class="flexible-section" data-columns="1" data-section-type="bmePreHeader"><td width="100%" class="blk_container bmeHolder" name="bmePreHeader" valign="top" align="center" bgcolor="#e6e6e8" style="background-color: rgb(230, 230, 232); color: rgb(102, 102, 102);   "></td></tr> <tr><td width="100%" class="bmeHolder" valign="top" align="center" name="bmeMainContentParent" style="border-color: rgb(128, 128, 128); border-radius: 5px; border-collapse: separate; border-spacing: 0px;"> <table name="bmeMainContent" style="border-radius: 5px; border-collapse: separate;border-spacing: 0px; overflow: hidden;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"> <tbody><tr id="section_2" class="flexible-section" data-columns="1"><td width="100%" class="blk_container bmeHolder" name="bmeHeader" valign="top" align="center" bgcolor="#ffffff" style="background-color: rgb(255, 255, 255);   "><div id="dv_1" class="blk_wrapper" style=""> <table class="blk" name="blk_image" width="600" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td> <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="bmeImage" style="padding: 0px; border-collapse: collapse;" align="center"><img src="https://images.benchmarkemail.com/client1575935/image14592205.jpg" class="mobile-img-large" width="600" style="max-width: 1200px; display: block; border-radius: 0px;" alt="" data-radius="0" border="0"></td></tr></tbody> </table></td></tr></tbody> </table></div> </td></tr> <tr id="section_3" class="flexible-section" data-columns="1"><td width="100%" class="blk_container bmeHolder bmeBody" name="bmeBody" valign="top" align="center" bgcolor="#ffffff" style="background-color: rgb(255, 255, 255); color: rgb(54, 56, 56);   "><div id="dv_2" class="blk_wrapper" style=""> <table class="blk" name="blk_text" width="600" border="0" cellpadding="0" cellspacing="0" style=""><tbody><tr><td> <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><th valign="top" align="center" class="tdPart"> <table name="tblText" style="float:left;" align="left" border="0" cellpadding="0" cellspacing="0" class="tblText" width="600"><tbody><tr><td name="tblCell" style="padding: 10px 20px; font-size: 14px; font-weight: 400; font-family: Arial, Helvetica, sans-serif; color: rgb(56, 56, 56); text-align: left; word-break: break-word;" align="left" valign="top" class="tblCell"><div style="line-height: 150%;"><span style="font-size: 20px; line-height: 150%; color: rgb(0, 0, 0);"><strong>¡Hola!</strong></span></div></td></tr></tbody> </table></th></tr></tbody> </table></td></tr></tbody> </table></div> <div id="dv_3" class="blk_wrapper" style=""> <table class="blk" name="blk_text" width="600" border="0" cellpadding="0" cellspacing="0" style=""><tbody><tr><td> <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><th valign="top" align="center" class="tdPart"> <table name="tblText" style="float:left;" align="left" border="0" cellpadding="0" cellspacing="0" class="tblText" width="600"><tbody><tr><td name="tblCell" style="padding: 10px 20px; font-size: 14px; font-weight: 400; font-family: Arial, Helvetica, sans-serif; color: rgb(56, 56, 56); text-align: left; word-break: break-word;" align="left" valign="top" class="tblCell"><div style="text-align: justify; line-height: 150%;"> <p style="color: rgb(56, 56, 56); font-family: Arial, Helvetica, sans-serif; font-size: 14px; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255); margin-top: 0px; margin-bottom: 0px; line-height: 150%;"><span style="font-size: 15px; color: rgb(0, 0, 0); line-height: 150%;">Esperamos que te encuentres excelente después de compartir junto a nosotros y más de 500 profesionales un fin de semana lleno de&nbsp;nuevos conocimientos y experiencias en el <strong>LivData Summit 2023.</strong> &nbsp;</span></p> <p style="color: rgb(56, 56, 56); font-family: Arial, Helvetica, sans-serif; font-size: 14px; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255); margin-top: 0px; margin-bottom: 0px; line-height: 150%;">&nbsp;</p> <p style="color: rgb(56, 56, 56); font-family: Arial, Helvetica, sans-serif; font-size: 14px; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255); margin-top: 0px; margin-bottom: 0px; line-height: 150%;"><span style="font-size: 15px;"><span style="color: rgb(0, 0, 0); line-height: 150%;">Queremos agradecer tu participación en el evento y mencionarte que tu presencia fue de mucha importancia para nosotros. </span><span style="color: rgb(0, 0, 0); line-height: 150%;">Esperamos que hayas tenido una agradable atención y disfrutado estos dos días al igual que nosotros.</span></span> <br> <br></p> <p style="color: rgb(56, 56, 56); font-family: Arial, Helvetica, sans-serif; font-size: 14px; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255); margin-top: 0px; margin-bottom: 0px; line-height: 150%;"><span style="font-size: 15px; color: rgb(0, 0, 0); line-height: 150%;">Para finalizar, queremos agradecer tu audiencia y colaboración esperando volver a contar contigo en nuestros próximos eventos.</span> <br> <br></p> <p style="color: rgb(56, 56, 56); font-family: Arial, Helvetica, sans-serif; font-size: 14px; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255); margin-top: 0px; margin-bottom: 0px; line-height: 150%;"><span style="font-size: 15px; color: rgb(0, 0, 0); line-height: 150%;">Hemos adjuntado al final de este correo tu certificado por participación. También podrás encontrar <span>las fotos del evento y visualizar las presentaciones de los ponentes.&nbsp;</span></span></p> <p style="color: rgb(56, 56, 56); font-family: Arial, Helvetica, sans-serif; font-size: 14px; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255); margin-top: 0px; margin-bottom: 0px; line-height: 150%;">&nbsp;</p> <p style="color: rgb(56, 56, 56); font-family: Arial, Helvetica, sans-serif; font-size: 14px; text-align: justify; white-space: normal; background-color: rgb(255, 255, 255); margin-top: 0px; margin-bottom: 0px; line-height: 150%;"><span style="font-size: 15px; color: rgb(0, 0, 0); line-height: 150%;">Por favor, recuerda dejarnos tu opinión en la encuesta que podrás encontrar más abajo. Esto será importante para brindarte mayor excelencia en nuestra próxima Conferencia Internacional.&nbsp;</span></p> </div> <div style="text-align: justify; line-height: 150%;">&nbsp;</div> <div style="text-align: justify; line-height: 150%;"><span style="font-size: 15px; line-height: 150%; color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif;">Esperamos contar con usted en una próxima oportunidad si así lo dispone.</span></div> <div style="text-align: justify; line-height: 150%;">&nbsp;</div> <div style="text-align: justify; line-height: 150%;"><span style="font-size: 15px; line-height: 150%; color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif;">¡Muchas gracias!&nbsp;</span></div> <div style="text-align: justify; line-height: 150%;">&nbsp;</div> <div style="text-align: justify; line-height: 150%;"><span style="font-size: 15px; line-height: 150%; color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif;">Atte.&nbsp;&nbsp;</span></div></td></tr></tbody> </table></th></tr></tbody> </table></td></tr></tbody> </table></div> <div id="dv_4" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_imagecaption" style="width: 600px;"><tbody><tr><td> <table cellspacing="0" cellpadding="0" class="bmeCaptionContainer" width="100%" style="padding: 0px 20px; border-collapse: separate;"><tbody><tr><td class="bmeImageContainerRow" valign="top" gutter="10"> <table width="100%" cellpadding="0" cellspacing="0" border="0"><tbody><tr><td class="tdPart" valign="top"> <table cellspacing="0" cellpadding="0" border="0" class="bmeImageContainer" width="100%" align="left" style="float:left;"><tbody><tr><td valign="top" name="tdContainer"> <table cellspacing="0" cellpadding="0" border="0" class="bmeImageTable" dimension="100%" imgid="1" width="560" height=""><tbody><tr><td name="bmeImgHolder" width="100%" align="left" valign="middle" height=""><img src="https://images.benchmarkemail.com/client1575935/image14579479.png" style="max-width: 75px; display: block; border-radius: 0px;" alt="" data-radius="0" data-original-max-width="500" border="0" width="75" class="keep-custom-width" data-customwidth="15"></td></tr></tbody> </table> <table cellspacing="0" cellpadding="0" border="0" class="bmeCaptionTable" width="560" style="padding-top: 20px; border-collapse: separate; word-break: break-word;"><tbody><tr><td name="tblCell" class="tblCell" valign="top" align="left" style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: normal; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="line-height: 150%;"><span>Jonny Chambi&nbsp; <br>Gerente General&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; <br></span></div> <div style="line-height: 150%;"><span>DMC</span></div></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_5" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style=""><tbody><tr><td class="tblCellMain" style="padding: 20px;"> <table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px solid rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody> </table></td></tr></tbody> </table></div></td></tr> <tr id="section_4" class="flexible-section" data-columns="1"><td width="100%" class="blk_container bmeHolder" name="bmePreFooter" valign="top" align="center" bgcolor="#ffffff" style="background-color: rgb(255, 255, 255);   "> <div id="dv_18" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text" style=""><tbody><tr><td> <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><th class="tdPart" valign="top" align="center" style="background-color: rgb(0, 0, 0);"> <table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float: left; background-color: rgb(0, 0, 0);" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 10px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="text-align: center;"><strong><span style="color: rgb(255, 255, 255); font-size: 15px;">¡Eso no es todo!</span></strong></div></td></tr></tbody> </table></th></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_9" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text" style=""><tbody><tr><td> <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><th class="tdPart" valign="top" align="center"> <table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float:left; background-color:transparent;" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 10px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="line-height: 150%; text-align: justify;"><span style="font-size: 15px; line-height: 150%; color: rgb(0, 0, 0);">Queremos compartir contigo los momentos más importantes de esta Conferencia. Mira <span>en nuestro fanpage</span>&nbsp;el álbum de fotos compartido del #LivDataSummit 2023&nbsp;</span></div></td></tr></tbody> </table></th></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_21" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_button" style=""><tbody><tr><td width="20"></td><td align="center"> <table class="tblContainer" cellspacing="0" cellpadding="0" border="0" width="100%"><tbody><tr><td height="10"></td></tr><tr><td align="center"> <table cellspacing="0" cellpadding="0" border="0" class="bmeButton" align="center" style="border-collapse: separate;"><tbody><tr><td style="border-radius: 50px; border-width: 0px; border-style: none; border-color: transparent; background-color: rgb(0, 0, 0); text-align: center; font-family: Arial, Helvetica, sans-serif; font-size: 14px; padding: 10px 25px; font-weight: bold; word-break: break-word;" class="bmeButtonText"><span style="font-family:Arial, Verdana; font-size:14px;color:#FFFFFF;"><a style="color:#FFFFFF;text-decoration:none;" target="_blank" draggable="false" href="https://clt1575935.benchurl.com/c/l?u=102744B1&amp;e=16E3E9C&amp;c=180BFF&amp;t=1&amp;l=B45507C7&amp;email=RwBlKeGCGP8rbbnUDjbayQ%3D%3D&amp;seq=1" data-link-type="web">Ver fotos</a></span></td></tr></tbody> </table></td></tr><tr><td height="10"></td></tr></tbody> </table></td><td width="20"></td></tr></tbody> </table></div><div id="dv_12" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td> <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 0px 20px;"><img src="https://images.benchmarkemail.com/client1575935/image14593366.jpg" class="mobile-img-large" width="560" style="max-width: 640px; display: block; border-radius: 0px;" alt="" data-radius="0" border="0"></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_11" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style=""><tbody><tr><td class="tblCellMain" style="padding-top:20px; padding-bottom:20px;padding-left:20px;padding-right:20px;"> <table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px solid rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_20" class="blk_wrapper"> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text" style=""><tbody><tr><td> <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><th class="tdPart" valign="top" align="center" style="background-color: rgb(0, 0, 0);"> <table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float: left; background-color: rgb(0, 0, 0);" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 10px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="text-align: center;"><strong><span style="color: rgb(255, 255, 255); font-size: 15px;">¿Qué te pareció?</span></strong></div></td></tr></tbody> </table></th></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_15" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text" style=""><tbody><tr><td> <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><th class="tdPart" valign="top" align="center"> <table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float:left; background-color:transparent;" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 10px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="line-height: 150%;"><span style="font-size: 15px; color: rgb(0, 0, 0); line-height: 150%;">Por último, queremos conocer tu opinión acerca del&nbsp;<strong>Livdata Summit 2023</strong>. Agradeceríamos que nos dejes tus comentarios y sugerencias completando la siguiente encuesta&nbsp;sobre el desarrollo del&nbsp;evento:</span></div></td></tr></tbody> </table></th></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_16" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td> <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 5px 20px;"><a href="https://clt1575935.benchurl.com/c/l?u=10274763&amp;e=16E3E9C&amp;c=180BFF&amp;t=1&amp;l=B45507C7&amp;email=RwBlKeGCGP8rbbnUDjbayQ%3D%3D&amp;seq=1" target="_blank" draggable="false"><img src="https://images.benchmarkemail.com/client1575935/image14592216.jpg" width="304.2" style="max-width: 304.2px; display: block; border-radius: 0px;" alt="" data-radius="0" border="0" data-original-max-width="553" class="keep-custom-width mobile-img-large" data-customwidth="55"></a></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_17" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style=""><tbody><tr><td class="tblCellMain" style="padding-top:20px; padding-bottom:20px;padding-left:20px;padding-right:20px;"> <table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px solid rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_19" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text" style=""><tbody><tr><td> <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><th class="tdPart" valign="top" align="center" style="background-color: rgb(0, 0, 0);"> <table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float: left; background-color: rgb(0, 0, 0);" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 10px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="text-align: center;"><strong><span style="color: rgb(255, 255, 255); font-size: 15px;">¿Te perdiste alguna ponencia?</span></strong></div></td></tr></tbody> </table></th></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_13" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text" style=""><tbody><tr><td> <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><th class="tdPart" valign="top" align="center"> <table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float:left; background-color:transparent;" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 10px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="line-height: 150%;"><span style="font-size: 15px; line-height: 150%; color: rgb(0, 0, 0);">Los vídeos de los expositores serán subidos a nuestro canal en los próximos días y te haremos llegar un correo con la confirmación y enlace de visualización. Mientras tanto, te facilitamos las presentaciones digitales disponibles y libres de difusión&nbsp;de los ponentes:&nbsp;</span></div></td></tr></tbody> </table></th></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_14" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_button" style=""><tbody><tr><td width="40"></td><td align="center"> <table class="tblContainer" cellspacing="0" cellpadding="0" border="0" width="100%"><tbody><tr><td height="0"></td></tr><tr><td align="center"> <table cellspacing="0" cellpadding="0" border="0" class="bmeButton" align="center" style="border-collapse: separate;"><tbody><tr><td style="border-radius: 50px; border-width: 0px; border-style: none; border-color: transparent; background-color: rgb(0, 0, 0); text-align: center; font-family: Arial, Helvetica, sans-serif; font-size: 14px; padding: 10px 20px; font-weight: bold; word-break: break-word;" class="bmeButtonText"><span style="font-family:Arial, Verdana; font-size:14px;color:#FFFFFF;"><a style="color:#FFFFFF;text-decoration:none;" target="_blank" href="https://clt1575935.benchurl.com/c/l?u=10274394&amp;e=16E3E9C&amp;c=180BFF&amp;t=1&amp;l=B45507C7&amp;email=RwBlKeGCGP8rbbnUDjbayQ%3D%3D&amp;seq=1" data-link-type="web">Ver presentaciones</a></span></td></tr></tbody> </table></td></tr><tr><td height="0"></td></tr></tbody> </table></td><td width="40"></td></tr></tbody> </table></div><div id="dv_10" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style=""><tbody><tr><td class="tblCellMain" style="padding-top:20px; padding-bottom:20px;padding-left:20px;padding-right:20px;"> <table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px solid rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_6" class="blk_wrapper" style=""> <table cellspacing="0" cellpadding="0" border="0" style="" name="blk_social_follow" width="600" class="blk"><tbody><tr><td class="tblCellMain" align="center" style="padding-top:10px; padding-bottom:10px; padding-left:20px; padding-right:20px;"> <table class="tblContainer mblSocialContain" cellspacing="0" cellpadding="0" border="0" align="center" style="text-align:center;"><tbody><tr><td class="tdItemContainer"> <table cellspacing="0" cellpadding="0" border="0" class="mblSocialContain" style="table-layout: auto;"><tbody><tr><td valign="top" name="bmeSocialTD"><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="facebook" style="float:left;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="20" style="padding-right:20px;height:20px;"><a href="https://clt1575935.benchurl.com/c/l?u=1024B98B&amp;e=16E3E9C&amp;c=180BFF&amp;t=1&amp;l=B45507C7&amp;email=RwBlKeGCGP8rbbnUDjbayQ%3D%3D&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/fb_btn.png" alt="Facebook" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="linkedin" style="float:left;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="20" style="height:20px;"><a href="https://clt1575935.benchurl.com/c/l?u=1024B98C&amp;e=16E3E9C&amp;c=180BFF&amp;t=1&amp;l=B45507C7&amp;email=RwBlKeGCGP8rbbnUDjbayQ%3D%3D&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/li_btn.png" alt="LinkedIn" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></div> </td></tr> </tbody> </table> </td></tr>  <tr id="section_5" class="flexible-section" data-columns="1" data-section-type="bmeFooter"><td width="100%" class="blk_container bmeHolder" name="bmeFooter" valign="top" align="center" bgcolor="#e6e6e8" style="background-color: rgb(230, 230, 232); color: rgb(102, 102, 102);   "><div id="dv_8" class="blk_wrapper"> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_footer" style=""><tbody><tr><td name="tblCell" class="tblCell" style="padding: 20px; word-break: break-word;" valign="top" align="left"> </td></tr></tbody> </table></div></td></tr> </tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table>';

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
