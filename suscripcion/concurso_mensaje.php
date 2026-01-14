<?
require_once "dao/dao_suscripcion.php";

$suscripcion=new suscripcion();
$listado_curso=$suscripcion->listado_curso_base();
if($_GET["susu"]){
    $usuario=$_GET["susu"];
}else if(isset($_SESSION["susuario"])){
    $usuario=$_SESSION["susuario"];
    unset($_SESSION["susuario"]);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>DMC - Contacto</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="http://survey.dmc.pe/suscripcion/css/selectize.default_2.css">
    
</head>
<body style="background: #fafafa;">
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-md-7" style="padding: 25px 35px; border: 1px solid #c8c7c7; margin: 15px 0; border-radius: 6px; box-shadow: 0px 1px 5px #dddddd;background: white;">
                <div style="text-align: center;">
                        <img class="h-log2" src="http://dmc.pe/static/img/logo2-01.svg" alt="" width="127" height="68">
                </div>
				<p style=" margin-top: 25px; text-align: center; ">Haz completado tú inscripción. En breves momentos te llegara un mensaje de confirmación a tú correo, por favor revisar tu spam.</p>
			</div>
		</div>
	</div>
    <script src="http://survey.dmc.pe/suscripcion/assets/js/jquery.min.js"></script>
    <script src="http://survey.dmc.pe/suscripcion/assets/js/popper.min.js"></script>
    <script src="http://survey.dmc.pe/suscripcion/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://survey.dmc.pe/suscripcion/assets/js/selectize.min.js"></script>
    
</body>
</html>