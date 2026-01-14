<?
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "dao/mail/PHPMailerAutoload.php";

$correo="marco.medrano@dataminingperu.com";
$nom="Marco";
$from_name="TT";
$asunto="asas";
$mensaje="aa";
$file=null;
$url=null;
 $mail = new PHPMailer;

        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        //$mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'ssl://server.iguanahost.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'test@dataminingperu.com';                 // SMTP username
        $mail->Password = '031Xca2xI8A5s';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        $mail->From = 'informes@dataminingperu.com';
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
        $mail->isHTML(true);                                   // Set email format to HTML
        $mail->CharSet = 'UTF-8';
        $mail->Subject =$asunto;
        $mail->Body    = $mensaje; //'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        var_dump($mail->send());
        if (!$mail->Send()) {
    throw new Exception($mail->ErrorInfo);
}

?>