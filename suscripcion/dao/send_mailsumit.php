<?php

$lsEmail = array(

    'tereza10070914@gmail.com',
    'fransquispec@gmail.com',
);


require_once "dao_mail.php";

require_once "dao_mensajedmc.php";

$mensaje = new mensajeDMC();

$mensajeSummit = $mensaje->mensaje_summit();

$mail = new mail();

$bbc = array("marco.medrano@dataminingperu.com","natalia.guerrero@dmc.pe","cesar.quezada@dmc.pe","anthony.palomino@dmc.pe","miguel.ore@dataminingperu.com");

foreach($lsEmail as $email){

    $mail->send_mail("Informes DMC", $email, "DMC", "", "", "", 'LivData Summit: Confirmaci¨®n de compra', $mensajeSummit,$bbc);

}