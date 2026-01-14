<?php

// Importa las clases de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Carga cada archivo de la clase manualmente

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class mail{

    public function send_mail($from_name,$correo,$nom,$file,$url,$id,$asunto,$mensaje, $bbc = null){

        $mail = new PHPMailer;

		//$mail->SMTPDebug = 3;            JOIN (SELECT @curRow := 0, @curType := '') r) a                   // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'mail.intranetdmc.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'test@intranetdmc.com';
		$mail->Password = 'YZtOIDQ.5IqM';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;                                       // TCP port to connect to

		$mail->setFrom('capacitacion@dmc.pe', $from_name);
		$mail->addAddress($correo, $nom);     // Add a recipient

        if($bbc != null){

            foreach($bbc as $val) {
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

		if ($url) {
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


}