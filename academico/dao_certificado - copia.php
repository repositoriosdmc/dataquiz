<?php

require('pdf/fpdf.php');

require_once "certificicado_detalle.php";

require_once "mail/PHPMailerAutoload.php";

class certificadoPDF{

    public function pdf_text_center($ct){
        //ct -> detalle del certificado
        $pdfx = new FPDF('L');
        $pdfx->AddFont($ct["fuente"],'',$ct["fuente"].".php");
        $pdfx->AddPage();
        $pdfx->SetFont($ct["fuente"],'',$ct["tamanio"]);
        $midPtX = $pdfx->GetPageWidth() / 2;
        //now we need to know how long the write string is
        $len=$pdfx->GetStringWidth($ct["text"]);
        //now we need to divide that by two to calculate the shift
        $shiftLeft = $len / 2;
        //now calculate our new X value
        $x = $midPtX - $shiftLeft;
        return $x;
    }

    public function generar_certificado($codigo,$nombreApellidos,$capacitacion,$horas,$calificacion)
    {
        $certificado=new certificado();

        $detalle=$certificado->certificado;
        
        $notas=$certificado->notas;
        
        
        if(isset($codigo)){
        
            $detalle["codigo"]["text"]=$codigo;
            
        }
        
        //$nombreApellidos = "Marco Antonio Medrano Contreras";
        
        if(isset($nombreApellidos)){
        
            $detalle["nombre"]["text"]=$nombreApellidos;

            $notas["nombre"]["text"]=$nombreApellidos;
            
        }
        
        if(isset($capacitacion)){
        
            $detalle["capacitacion"]["text"]=$capacitacion;
            
        }
        
        if(isset($horas)){
        
            $detalle["horas"]["text"]=$horas;
            
        }

        if(isset($calificacion)){

            $notas["calificacion"]["text"] = $calificacion;

        }
        
        //setlocale(LC_ALL, 'es_PE');
            
        //$detalle["fecha"]["text"]=strftime("%I:%M %P",strtotime(date("Ymd")));
        
        
        
        $pdf = new FPDF('L');
        $pdf->AddFont('MinionPro-Semibold','','MinionPro-Semibold.php');
        $pdf->AddFont('MinionPro-Bold','','MinionPro-Bold.php');
        $pdf->AddFont('MinionPro-Regular','','MinionPro-Regular.php');
        $pdf->SetRightMargin(false);
        $pdf->SetAutoPageBreak(false);// eliminar margin bottom (desactiva el salto a pagina)
        $pdf->AddPage();
        //$pdf->Image('https://survey.dmc.pe/plantilla/certificado.png', 0, 0, 297, 210);
        $pdf->Image('http://digitacion.dmc.pe/academico/certificado/plantilla_certificado_4.png', 0, 0, 297, 210);
        /* Linea de firma Instructor */
        $line_x=110;
        $pdf->Line($line_x+0.8, 177.0, $line_x-55, 177.0); 
        
        /* Texto Horas */
        
        $horas_acamedicas="realizado en el centro de capacitación DMC, con una duración de ".$detalle["horas"]["text"]." horas académicas.";
        $detalle["horas"]["text"]=$horas_acamedicas;
        
        foreach ($detalle as $key => $value) {
            $pdf->SetFont($value["fuente"],'',$value["tamanio"]);
            /* Transformación a UTF8 */
            $text = iconv('UTF-8', 'windows-1252', $value["text"]);
            $color=$value["color"];
            $pdf->SetTextColor($color[0],$color[1],$color[2]);
            $x=$value["position"][0];
            $y=$value["position"][1];
            $estado=$value["center"];
            /* Centrar en bloques */
            if ($estado=="ok") {
                $x=self::pdf_text_center($value);
            }else if($estado=="right"){
                $len=$pdf->GetStringWidth($text)/2;
                $x=$x-$len;
            }
        
            $pdf->setXY($x,$y); 
            $pdf->Write(0, $text); 
        }

        $img1="http://survey.dmc.pe/academico/plantilla/JoelLapa.png";

        $pdf->Cell(100,200, "", 500, 100, 'C',$pdf->Image($img1,65,151,0,40));
        
        
        //Notas
        $pdf->AddPage();
        $pdf->Image('http://digitacion.dmc.pe/academico/certificado/plantilla_notas_1.png', 0, 0, 297, 210);
        foreach ($notas as $key => $value) {
            $pdf->SetFont($value["fuente"],'',$value["tamanio"]);
            /* Transformación a UTF8 */
            $text = iconv('UTF-8', 'windows-1252', $value["text"]);
            $color=$value["color"];
            $pdf->SetTextColor($color[0],$color[1],$color[2]);
            $x=$value["position"][0];
            $y=$value["position"][1];
            $estado=$value["center"];
            /* Centrar en bloques */
            if ($estado=="ok") {
                $x=self::pdf_text_center($value);
            }
        
            $pdf->setXY($x,$y); 
            $pdf->Write(0, $text); 
        }
        
        
        return $pdf->Output();
        
    }


    public function mensaje_certificado(){

        $html="<p>Estimado (a) alumno (a), reciba un cordial saludo de DMC</p>";

        $html.="<p>Sirva la presente para enviar el certificado del curso en asunto.</p>";

        $html.="<p>Agradecemos por habernos escogido para esta capacitación, esperando que haya sido de gran crecimiento para ti.</p>";

        $html.="Así mismo te animamos a seguir aprendiendo con nosotros...Te invitamos a visitar nuestra página web <a href='https://dmc.pe/categoria/curso-online-en-vivo/'>DMC PERÚ</a> donde podrás observar los cursos que inician próximamente y por el <a href='https://www.facebook.com/datamining.pe/'>Facebook</a> para que puedan estar al tanto de nuestros talleres gratuitos en la modalidad online.";

        $html.="<p>#YOMEQUEDOENCASA</p>";

        $html.="<p>#DMConline</p>";

        return $html;

    }

    public function send_mail($from_name,$correo,$nom,$file,$url,$id,$asunto,$mensaje){
        $mail = new PHPMailer;

        //$mail->SMTPDebug = 3;            JOIN (SELECT @curRow := 0, @curType := '') r) a                   // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'dataminingperu.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'test@dataminingperu.com';                 // SMTP username
        $mail->Password = '^bMpgLN%PAno';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        $mail->From = 'capacitacion@dmc.pe';
        $mail->FromName = $from_name;
        $mail->addAddress($correo, $nom);     // Add a recipient

        if(is_array($file)){
            foreach ($file as $key => $value) {
                $tmp=$file[$key]["tmp_name"];
                if(is_uploaded_file($tmp)){
                    $mail->addAttachment($tmp,$file[$key]["name"]);
                }
            }
        }

        if($url){
            $mail->addStringAttachment(file_get_contents($url),$id.".pdf");
        }


        // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->CharSet = 'UTF-8';
        $mail->Subject =$asunto;
        $mail->Body    = $mensaje;//'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        return $mail->send();

        /*if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }*/
    }



}