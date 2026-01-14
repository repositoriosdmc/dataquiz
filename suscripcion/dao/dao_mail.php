<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class MailSender {
    private $mail;
    
    public function __construct() {
        $this->mail = new PHPMailer(true);
        
        // Configuración del servidor SMTP (datos estáticos para pruebas)
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.gmail.com'; // Servidor SMTP de Gmail para pruebas
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'tu_correo@gmail.com'; // Reemplazar con tu correo
        $this->mail->Password = 'tu_contraseña_de_aplicacion'; // Reemplazar con tu contraseña de aplicación
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port = 587;
        $this->mail->CharSet = 'UTF-8';
    }
    
    public function sendMail($to, $subject, $body) {
        try {
            // Configuración del correo
            $this->mail->setFrom('tu_correo@gmail.com', 'DMC Perú');
            $this->mail->addAddress($to);
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $body;
            
            // Enviar el correo
            $this->mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Error al enviar correo: " . $e->getMessage());
            return false;
        }
    }
    
    // Método para enviar correo de confirmación
    public function sendConfirmationMail($to, $name, $link) {
        $subject = "Confirmación de Registro - DMC Perú";
        $body = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .button { 
                    background-color: #007bff; 
                    color: white; 
                    padding: 10px 20px; 
                    text-decoration: none; 
                    border-radius: 5px; 
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <h2>¡Bienvenido a DMC Perú!</h2>
                <p>Hola {$name},</p>
                <p>Gracias por registrarte. Para confirmar tu cuenta, por favor haz clic en el siguiente botón:</p>
                <p>
                    <a href='{$link}' class='button'>Confirmar Registro</a>
                </p>
                <p>Si no puedes hacer clic en el botón, copia y pega el siguiente enlace en tu navegador:</p>
                <p>{$link}</p>
                <p>Saludos,<br>El equipo de DMC Perú</p>
            </div>
        </body>
        </html>";
        
        return $this->sendMail($to, $subject, $body);
    }
    
    // Método para enviar correo de resultados
    public function sendResultsMail($to, $name, $score, $courseName) {
        $subject = "Resultados de tu Evaluación - DMC Perú";
        $body = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .score { 
                    font-size: 24px; 
                    color: #007bff; 
                    font-weight: bold; 
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <h2>Resultados de tu Evaluación</h2>
                <p>Hola {$name},</p>
                <p>Has completado la evaluación del curso: <strong>{$courseName}</strong></p>
                <p>Tu puntuación es: <span class='score'>{$score}%</span></p>
                <p>Gracias por participar en nuestra evaluación.</p>
                <p>Saludos,<br>El equipo de DMC Perú</p>
            </div>
        </body>
        </html>";
        
        return $this->sendMail($to, $subject, $body);
    }
} 