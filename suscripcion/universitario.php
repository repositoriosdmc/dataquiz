<?
session_start();
require_once "dao/dao_suscripcion.php";

$suscripcion=new suscripcion();

if($_GET["susu"]){
    $usuario=$_GET["susu"];
}else if(isset($_SESSION["susuario"])){
    $usuario=$_SESSION["susuario"];
    unset($_SESSION["susuario"]);
}
$uni=$_GET["uni"];
if($_GET["uni"]>0){
    $evento=array(
    144=>array("nombre"=>"UNI","fecha"=>"Viernes 29 de Noviembre","horario"=>"3:00pm - 5:00pm","lugar"=>" Auditorio FIIS UNI"),
    145=>array("nombre"=>"UTEC","fecha"=>"Martes 25 de Junio","horario"=>"6-8 pm","lugar"=>"UTEC VENTURES"),
    146=>array("nombre"=>"USIL","fecha"=>"Miércoles 26 de Junio","horario"=>"11 a 1pm","lugar"=>"USIL Ventures"),
    147=>array("nombre"=>"UNFV","fecha"=>"Jueves 27 de Junio","horario"=>"11am a 1pm","lugar"=>"Auditorio 1 de la FIIS"),
    157=>array("nombre"=>"UESAN","fecha"=>"Viernes 15 de noviembre","horario"=>"3pm a 5pm","lugar"=>"Auditorio"),
    149=>array("nombre"=>"UNMSM","fecha"=>"Jueves 4 de Julio","horario"=>"4 a 6pm","lugar"=>"Coworking 1551"),
    150=>array("nombre"=>"UTP","fecha"=>"Viernes 19 de Julio","horario"=>"4pm a 6pm","lugar"=>"Salón de Reuniones"),
    151=>array("nombre"=>"PUCP","fecha"=>"Viernes 12 de Julio","horario"=>"6pm a 8pm","lugar"=>"Open PUCP"),
    152=>array("nombre"=>"UNALM","fecha"=>"Jueves 22 de Agosto","horario"=>"2pm a 4pm","lugar"=>"Auditorio A3"),
    156=>array("nombre"=>"UNAC","fecha"=>"Miércoles 28 de Agosto","horario"=>"4pm a 6pm","lugar"=>" Auditorio FIIS")

);
    $detalle=$evento[$uni];
    $detalle["id"]=$uni;


}else{
    $evento=array(
    "20-06-2019"=>array("nombre"=>"Auditorio CEPS - UNI","id"=>144),
    "25-06-2019"=>array("nombre"=>"UTEC Ventures - UTEC","id"=>145),
    "26-06-2019"=>array("nombre"=>"USIL Ventures - USIL","id"=>146),
    "27-06-2019"=>array("nombre"=>"Auditorio 1 de la FIIS - UNFV","id"=>147),
    "02-07-2019"=>array("nombre"=>"Auditorio XYZ - URP","id"=>148),
    "04-07-2019"=>array("nombre"=>"Coworking 1551 - UNMSM","id"=>149),
    "09-07-2019"=>array("nombre"=>"Auditorio MNP - UTP","id"=>150),
    "11-07-2019"=>array("nombre"=>"Open PUCP - PUCP","id"=>151));
    $hoy =   strtotime(date("d-m-Y"));
    foreach($evento AS $key=>$date) {
        $timestamp = strtotime(date($key));
        if($timestamp >= $hoy) {
            $detalle=$evento[$key];
            break;
        } 
    }
}




?>
<!DOCTYPE html>
<html>
<head>
	<title>DMC - Contacto</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://survey.dmc.pe/suscripcion/css/selectize.default_2.css">
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112204121-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-112204121-1');
</script>

    
</head>
<body style="background: #fafafa;">
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-md-8" style="padding: 25px 35px; border: 1px solid #c8c7c7; margin: 15px 0; border-radius: 6px; box-shadow: 0px 1px 5px #dddddd;background: white;">
                <? if($_SESSION["smensaje"]=="OK"){ unset($_SESSION["smensaje"]);?>
                    <div style="font-size: 41px; color: #00ec00; text-align: center; margin-bottom: 25px;">Inscripción realizada!</div>
                <? } ?>
                <? if($_GET["uni"]!=151) {?>
				<form name="form" method="post" action="controller/controller_suscripcion_dmc.php" id="form">
                    <input type="hidden" name="medio" id="medio" value="0">
                    <div style="text-align: center;">
                        <img class="h-log2" src="https://dmc.pe/uploads/logo2-dmc-2019.png" alt="" width="127" height="68">
                        <h2 style="margin: 9px 0;">DMC Talks 4 University - <?=$detalle["nombre"]?></h2>
                        
                    </div>
                    <div style="margin: 20px 0;">
                        <p style="margin-bottom: 0;"><b>Fecha: </b><?=$detalle["fecha"]?></p>
                        <p style="margin-bottom: 0;"><b>Horario: </b><?=$detalle["horario"]?></p>
                        <p style="margin-bottom: 0;"><b>Lugar: </b><?=$detalle["lugar"]?></p>
                    </div>		   
				   <span>
                        <input type="hidden" name="num_usuario" id="num_usuario" value="">
                        <input type="hidden" name="cursos[]" id="cursos" value=<?=$detalle["id"]?>>
				   </span>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="exampleInputEmail1">DNI</label>
                            <input type="text" class="form-control" id="num_documento" name="num_documento" required="" pattern="[0-9]{8}" placeholder="DNI">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="exampleInputEmail1">Nombres y Apellidos</label>
                            <input type="text" class="form-control" id="nombres" name="nombres" required="" pattern="[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}" placeholder="Luis">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="exampleInputEmail1">Universidad</label>
                            <input type="text" class="form-control" id="universidad" name="universidad" required="" pattern="[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}" placeholder="">
                        </div> 
                        
                    </div>
                    <div class="form-row">
                        
                    	<div class="form-group col-md-6">
                    		<label for="exampleInputEmail1">E-mail</label>
                            <input type="email" class="form-control" id="correo" name="correo" required="" placeholder="capacitacion@dmc.pe" required="">
                        </div>
                        <div class="form-group col-md-6">
                        	<label for="exampleInputEmail1">Celular</label>
                            <input type="text" class="form-control" id="celular" required="" name="celular" pattern="((RPM|rpm|rpc|RPC|\*|#)[0-9]{6,7})|((#|\*|)9[0-9]{8})" placeholder="975491764">
                        </div>	
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-7">
                            <label for="exampleInputEmail1">Nivel de Conocimiento de Data Science del 1 a 10</label>
                            <select id="calificacion" name="calificacion" required="" class="form-control" required="">
                                <option value="">Seleccione</option>
                                <? for ($i = 1; $i <= 10; $i++) { ?>
                                    <option value="<?=$i?>"><?=$i?></option>
                                <? } ?>
                            </select>
                        </div>  
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-7">
                            <label for="exampleInputEmail1">Herramientas que conoce</label>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="R" id="defaultCheck1" name="curso[]" required="">
                                <label class="form-check-label" for="defaultCheck1">R</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="SQL" id="defaultCheck6" name="curso[]" required="">
                                <label class="form-check-label" for="defaultCheck6">SQL</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Spark" id="defaultCheck2" name="curso[]" required="">
                                <label class="form-check-label" for="defaultCheck2">Spark</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Hadoop" id="defaultCheck3" name="curso[]" required="">
                                <label class="form-check-label" for="defaultCheck3">Hadoop</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="MongoDB" id="defaultCheck4" name="curso[]" required="">
                                <label class="form-check-label" for="defaultCheck4">MongoDB</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Power Pivot" id="defaultCheck5" name="curso[]" required="">
                                <label class="form-check-label" for="defaultCheck5">Power Pivot</label>
                            </div>
                            <label id="curso[]-error" class="error" for="curso[]" style="display: none;">Campo obligatorio</label>
                        </div>  
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Cómo se enteró del evento</label>
                            <select id="medio" name="medio" class="form-control" required="">
                                <option value="">¿Como se entero?</option>
                                <option value="1">Facebook DMC</option>
                                <option value="5">Linkedin DMC</option>
                                <option value="21">Instagram DMC</option>
                                <option value="19">Facebook de la Universidad</option>
                                <option value="20">Un Amigo</option>
                            </select>
                        </div>  
                    </div>
                    <div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="datos" name="datos" value="1" required>
                            <label class="form-check-label" for="datos">Acepto Términos y Condiciones</label>
                            <div>
                            <label id="datos-error" class="error" for="datos" style="display: none;">Campo obligatorio</label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary" id="button">Enviar</button>
                    </div>
                    
				</form>
            <? }else{ ?>
                <div style="text-align: center;">
                    <img class="h-log2" src="https://dmc.pe/uploads/logo2-dmc-2019.png" alt="" width="127" height="68">
                    <p>
                    Se agotaron las entradas para el Open PUCP.
                    Aún pueden registrarse al próximo Evento de DMC Talks en UTP : <a href="http://bit.ly/DMCTalksUTPCentro">Registrarse</a>
                    </p>

                </div>
                <? } ?>
			</div>
		</div>
	</div>
    <script src="./assets/js/jquery.min.js"></script>
    <script src="https://survey.dmc.pe/suscripcion/assets/js/popper.min.js"></script>
    <script src="https://survey.dmc.pe/suscripcion/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://survey.dmc.pe/suscripcion/assets/js/selectize.min.js"></script>

    <script src="./assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript">
   
    $(document).ready(function(){
        jQuery.extend(jQuery.validator.messages, {required: "Campo obligatorio"});

  $.validator.addMethod("pattern", function(value, element, param) {

      if (this.optional(element)) {

        return true;

      }

      if (typeof param === "string") {

        param = new RegExp("^(?:" + param + ")$");

      }

      return param.test(value);

    }, "Formato inválido");
 
    $('#form').validate({

      ignore: ':hidden', 

        ignoreTitle: true,

      rules:

      {
        'num_documento':
        {
          required:true,
          pattern:/^[0-9]{8}$/,
          /*dni_repeat:true,
          verificar_inscripcion:true*/
        },
        'correo':
        {
          required:true,
          pattern: /^\S+@\S+\.\S+$/
        },
        'nombres':
        {
          required:true,
          pattern:/^[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}$/
        },

        'ap_pat':
        {
          required:true,
          pattern:/^[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}$/
        },

        'ap_mat':
        {
          required:true,
          pattern:/^[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}$/
        },

        'celular':
        {
          required:true,
          pattern:/^((RPM|rpm|rpc|RPC|\*|#)[0-9]{6,7})|((#|\*|)9[0-9]{8})$/
        },
        'universidad':
        {
          required:true
          
        },
        'calificacion':
        {
            required:true
        },
        'medio':
        {
            required:true
        },
        'curso[]':

        {
          required:true
        }

      }

    }); 
    $("form").submit(function() {

      

       if($("#form").valid()===true){

        var btn = $('#button');
        btn.attr("disabled","disabled");
        btn.text("Enviando...");

        }

    });
    }); 
</script>
</body>
</html>