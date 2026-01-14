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
				<form name="form" method="post" action="controller/controller_suscripcion_dmc.php" id="form">
                    <div style="text-align: center;">
                        <img class="h-log2" src="http://dmc.pe/static/img/logo2-01.svg" alt="" width="127" height="68">
                        <h2 style="margin: 9px 0;">CONCURSO PEA DATA ARCHITECT 2024</h2>
                    </div>				   
				   <span>
                        <input type="hidden" name="num_usuario" id="num_usuario" value="">
                        <input type="hidden" name="cursos[]" id="cursos" value="119">
				   </span>
				   <div class="form-row">
				   	    <div class="form-group col-md-6">
				   	    	<label for="exampleInputEmail1">Medio</label>
                            <select class="form-control" id="medio" name="medio" required="">
                                <option value="" selected="selected">¿Como se enteró?</option>
                                <option value="1">Facebook</option>
                                <option value="2">Google</option>
                                <option value="3">Folleto informativo</option>
                                <option value="4">Alumno - Ex-Alumno</option>
                                <option value="5">Linkedin</option>
                                <option value="6">Correo Electrónico</option>
                                <option value="8">Youtube</option>
                                <option value="11">WhatsApp</option>
                                <option value="7">Otros</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">D.N.I</label>
                            <input type="text" class="form-control" id="num_documento" name="num_documento" pattern="[0-9]{8}" placeholder="65432187">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Nombres</label>
                            <input type="text" class="form-control" id="nombres" name="nombres" pattern="[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}" placeholder="Luis">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" pattern="[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}" placeholder="Quispe">
                        </div>  
                    </div>
                    <div class="form-row">
                    	<div class="form-group col-md-6">
                    		<label for="exampleInputEmail1">E-mail</label>
                            <input type="email" class="form-control" id="correo" name="correo" placeholder="capacitacion@dmc.pe" required="">
                        </div>
                        <div class="form-group col-md-6">
                        	<label for="exampleInputEmail1">Celular</label>
                            <input type="text" class="form-control" id="celular" name="celular" pattern="((RPM|rpm|rpc|RPC|\*|#)[0-9]{6,7})|((#|\*|)9[0-9]{8})" placeholder="975491764">
                        </div>	
                    </div>
                    <div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="datos" name="datos" value="1" required>
                            <label class="form-check-label" for="datos">Acepta Terminos y Condiciones</label>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                    
				</form>
			</div>
		</div>
	</div>
    <script src="http://survey.dmc.pe/suscripcion/assets/js/jquery.min.js"></script>
    <script src="http://survey.dmc.pe/suscripcion/assets/js/popper.min.js"></script>
    <script src="http://survey.dmc.pe/suscripcion/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://survey.dmc.pe/suscripcion/assets/js/selectize.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            /*$('#curso').selectize({
                items: [curso],
                plugins: ['remove_button'],
            });*/
        })
    </script>
</body>
</html>