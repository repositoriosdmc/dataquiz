<?php

error_reporting(E_ALL);

ini_set('max_execution_time', '3600');
ini_set('display_errors', '1');

require_once "dao_certificado.php";

$certificado = new certificadoPDF();


$testing = array(
  array('nombreApellidos'=>'JUAN ALONSO HERNÁNDEZ CATAÑO','correo'=>'jhernandezc@pucp.pe','url'=>'DMC TALKS 01'),array('nombreApellidos'=>'Fernando Rafael Calla Yarihuaman','correo'=>'160887@unsaac.edu.pe','url'=>'DMC TALKS 02'),array('nombreApellidos'=>'Ismael Alexander Jeronimo Garnica','correo'=>'jeronimo_garnica@hotmail.com','url'=>'DMC TALKS 03'),array('nombreApellidos'=>'Paolo Giancarlo Morales Santiago','correo'=>'paolo210281@gmail.com','url'=>'DMC TALKS 04'),array('nombreApellidos'=>'ROMULO RAMIREZ QUISPE','correo'=>'cesarrq1@gmail.com','url'=>'DMC TALKS 05'),array('nombreApellidos'=>'Javier Enrique Mallqui Bravo','correo'=>'jamallqui@falabella.com.pe','url'=>'DMC TALKS 06'),array('nombreApellidos'=>'Joel Josias Nuñez Anaya','correo'=>'joelnuan@gmail.com','url'=>'DMC TALKS 07'),array('nombreApellidos'=>'Carla Karina Laura Gálvez','correo'=>'carlalaura0412@gmail.com','url'=>'DMC TALKS 08'),array('nombreApellidos'=>'Fredy Arce Vargas ','correo'=>'farcev14@gmail.com','url'=>'DMC TALKS 09'),array('nombreApellidos'=>'Joselyn del Pilar Olivares Baldeón','correo'=>'olivaresjoselyn95@gmail.com','url'=>'DMC TALKS 10'),array('nombreApellidos'=>'Ruben Alexander Palomino Yangua','correo'=>'ruben_py@hotmail.com','url'=>'DMC TALKS 11'),array('nombreApellidos'=>'Melanie Chinchayan','correo'=>'mchinchayand@gmail.com ','url'=>'DMC TALKS 12'),array('nombreApellidos'=>'GERALDINE GIANELA QUISPE TAPARA','correo'=>'geraldine22qt@gmail.com','url'=>'DMC TALKS 13'),array('nombreApellidos'=>'Marcia Yessenia Ccasani Tito','correo'=>'myccasanit@gmail.com','url'=>'DMC TALKS 14'),array('nombreApellidos'=>'RÓMULO RAMÍREZ QUISPE','correo'=>'cesarrq1@gmail.com','url'=>'DMC TALKS 15'),array('nombreApellidos'=>'willy campos lozada','correo'=>'willycamposlozada@gmail.com','url'=>'DMC TALKS 16'),array('nombreApellidos'=>'Juan Manuel Burga Altamirano ','correo'=>'baltamirano@crece.uss.edu.pe','url'=>'DMC TALKS 17'),array('nombreApellidos'=>'Renzo Nicolas Marroquin Rubio','correo'=>'20151207@lamolina.edu.pe','url'=>'DMC TALKS 18'),array('nombreApellidos'=>'Christian David Velásquez Díaz','correo'=>'c.velasquezdiaz@hotmail.com','url'=>'DMC TALKS 19'),array('nombreApellidos'=>'César Aníbal Vilcherrez Zárate','correo'=>'CESAR.VILCHERREZ@PUCP.EDU.PE','url'=>'DMC TALKS 20'),array('nombreApellidos'=>'BETSSI ARLENNE RAMOS CALCINA','correo'=>'betssi4ar@gmail.com','url'=>'DMC TALKS 21'),array('nombreApellidos'=>'Orlando Ricardo Cortez De La Cruz','correo'=>'20101292@lamolina.edu.pe','url'=>'DMC TALKS 22'),array('nombreApellidos'=>'Pablo Enrique Mazuelos Soldevilla','correo'=>'pablo.mazuelos.s@gmail.com','url'=>'DMC TALKS 23'),array('nombreApellidos'=>'Elber Miguel Nuñez Montañez ','correo'=>'elbernunez97@gmail.com ','url'=>'DMC TALKS 24'),array('nombreApellidos'=>'Diana Landa Castillo','correo'=>'dlandac@gmail.com ','url'=>'DMC TALKS 25'),array('nombreApellidos'=>'SANDRA JAQUELINE MENDOZA CASTILLO','correo'=>'SANDRA.MENDOZACASTI@GMAIL.COM','url'=>'DMC TALKS 26'),array('nombreApellidos'=>'José Verde Venturo','correo'=>'jverdeventuro@yahoo.es','url'=>'DMC TALKS 27'),array('nombreApellidos'=>'Deisy Raquel Cervantes Garces','correo'=>'cervantesgarces3690@gmail.com','url'=>'DMC TALKS 28'),array('nombreApellidos'=>'Juan Carlos Huapaya Millán','correo'=>'huapayajuancarlos@gmail.com','url'=>'DMC TALKS 29'),array('nombreApellidos'=>'Manuel Alfredo Ventura Suclupe ','correo'=>'mventurasuclupe@gmail.com ','url'=>'DMC TALKS 30'),array('nombreApellidos'=>'Max Zambrana Raudales','correo'=>'max.zambrana@gmail.com','url'=>'DMC TALKS 31'),array('nombreApellidos'=>'Erick Adrian Torres Huaman','correo'=>'erickadriantorres@gmail.com','url'=>'DMC TALKS 32'),array('nombreApellidos'=>'ANGEL GABRIEL GONZALES CAVE','correo'=>'aggc9882@gmail.com','url'=>'DMC TALKS 33'),array('nombreApellidos'=>'RENZO CARLO ARMIJO CARRILLO','correo'=>'renzoarmijo@gmail.com','url'=>'DMC TALKS 34'),array('nombreApellidos'=>'Alex Peñafort Gonzalez Robles','correo'=>'alpegonzalez@hotmail.com','url'=>'DMC TALKS 35'),array('nombreApellidos'=>'Alan Enrique Grosso Romo','correo'=>'alan','url'=>'DMC TALKS 36'),array('nombreApellidos'=>'LUIS ALFREDO LOPEZ GONZALES','correo'=>'Llopezg2810@gmail.com','url'=>'DMC TALKS 37'),array('nombreApellidos'=>'MARTIN MOISES SOTO CORDOVA','correo'=>'martin.soto.cordova@gmail.com','url'=>'DMC TALKS 38'),array('nombreApellidos'=>'Diana Milagros Céspedes Malpartida','correo'=>'dianamilces@gmail.com','url'=>'DMC TALKS 39'),array('nombreApellidos'=>'Alex Velasquez','correo'=>'alex.velasquez08@outlook.com','url'=>'DMC TALKS 40'),array('nombreApellidos'=>'David Bernardo Cruz Silva','correo'=>'dcs14.1unmsm@gmail.com','url'=>'DMC TALKS 41'),array('nombreApellidos'=>'José Luis Guerrero Caycho','correo'=>'jguerrerocaycho@gmail.com','url'=>'DMC TALKS 42'),array('nombreApellidos'=>'Alexander Jesús Chirinos Marcas','correo'=>'alezander1422@gmail.com','url'=>'DMC TALKS 43'),array('nombreApellidos'=>'Felipe Junior Manrique Collantes','correo'=>'Fmanrique@pucp.pe','url'=>'DMC TALKS 44'),array('nombreApellidos'=>'María Emilia Arias Condori ','correo'=>'me.ariasc@alum.up.edu.pe ','url'=>'DMC TALKS 45'),array('nombreApellidos'=>'DANNY ROMAN CASTILLO APAZA','correo'=>'DANYYCASTILLO@GMAIL.COM','url'=>'DMC TALKS 46'),array('nombreApellidos'=>'Max Florencio Cajo Chavez','correo'=>'cajochavez09@gmail.com ','url'=>'DMC TALKS 47'),array('nombreApellidos'=>'FILEMON CURASMA CASAVILCA','correo'=>'12345.filemon@gmail.com','url'=>'DMC TALKS 48'),array('nombreApellidos'=>'MIGUEL ANGEL ARIAS GUZMAN','correo'=>'MIGUELARIASGUZMAN10@GMAIL.COM','url'=>'DMC TALKS 49'),array('nombreApellidos'=>'JORGE ARMANDO YALI AGÜERO','correo'=>'jayanetperu@gmail.com','url'=>'DMC TALKS 50'),array('nombreApellidos'=>'Erick Giampiero Guerrero Caycho','correo'=>'erick.guerrero.c@hotmail.com','url'=>'DMC TALKS 51'),array('nombreApellidos'=>'Janett Deisy Julca Flores','correo'=>'janettjulca@gmail.com','url'=>'DMC TALKS 52'),array('nombreApellidos'=>'Piero Miguel Matta Cadenas','correo'=>'pierox06@gmail.com','url'=>'DMC TALKS 53'),array('nombreApellidos'=>'Kriss Carolina','correo'=>'sdckrissminano@gmail.com','url'=>'DMC TALKS 54'),array('nombreApellidos'=>'Néstor Wilfredo Coasaca Escarcena','correo'=>'nestor.coess@gmail.com','url'=>'DMC TALKS 55'),array('nombreApellidos'=>'PAOLA MILAGROS CHERRE CORILLOCLLA','correo'=>'PAOLA.CHERRE@BIZLINKS.COM.PE','url'=>'DMC TALKS 56'),array('nombreApellidos'=>'Ricardo Sosa Campana','correo'=>'ricardo.sosa@icpna.edu.pe','url'=>'DMC TALKS 57')

);

foreach ($testing as $key => $valor) {

    $asunto = "Certificado de Participación: ".$valor["capacitacion"];

    $nombre = urlencode($valor["nombreApellidos"]);
    
    $capacitacion = urlencode($valor["capacitacion"]);

    $fechaFin = "2020-08-04";
    
    $url = "https://survey.dmc.pe/academico/pdf_certificado/".str_replace(" ", "%20", $valor["url"]).".pdf";

    $mensaje = $certificado->dmc_talks();

    //echo $valor['correo'];
    var_dump($certificado->send_mail("Área Académica",$valor['correo'],$valor['nombre'],"",$url,"certificado",$asunto,$mensaje));
   

    var_dump($certificado->send_mail("Área Académica","eventos@dmc.pe",$valor['nombre'],"",$url,"certificado",$asunto,$mensaje));

    echo $url;    

    //echo $mensaje;
    # code...
}




?>