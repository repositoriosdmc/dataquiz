<?php

// Importa las clases de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Carga cada archivo de la clase manualmente

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


// Crea una nueva instancia de PHPMailer
$mail = new PHPMailer(true);




// Configura las opciones de envío
$mail->isSMTP();
$mail->Host = 'mail.intranetdmc.com';
$mail->SMTPAuth = true;
$mail->Username = 'test@intranetdmc.com';
$mail->Password = 'YZtOIDQ.5IqM';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;


// Configura las opciones del correo electrónico
$mail->setFrom('capacitacion@dmc.pe', 'DMC');
$mail->addAddress('marco.medrano@dataminingperu.com', 'dmc');
$mail->Subject = 'Asunto del correo electrónico';
$mail->Body    = 'Cuerpo del correo electrónico';


// Envía el correo electrónico
if(!$mail->send()) {
    echo 'Error al enviar el mensaje: ' . $mail->ErrorInfo;
} else {
    echo 'Mensaje enviado con éxito';
}

echo phpversion();