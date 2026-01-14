<?
require_once "dao/dao_suscripcion.php";
session_start();
$suscripcion=new suscripcion();
$listado_curso=$suscripcion->listado_curso_base();


?>
<!DOCTYPE html>
<html>
<head>
	<title>DMC - Contacto</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://survey.dmc.pe/suscripcion/css/selectize.default_2.css">
    
</head>
<body style="background: #fafafa;">
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-md-7" style="padding: 25px 35px; border: 1px solid #c8c7c7; margin: 15px 0; border-radius: 6px; box-shadow: 0px 1px 5px #dddddd;background: white;">
				<form name="form" method="post" action="controller/controller_suscripcion_dmc.php" id="form">
                    <input type="hidden" name="medio" id="medio" value="1">
                    <input type="hidden" id="curso" name="cursos[]" value="362">
                    <input type="hidden" id="check_mail" name="check_mail" value="1">
                    <div style="text-align: center;">
                        <img class="h-log2" src="http://bigdatasummit.pe/BDAS2019/assets/img/bdas.png" alt="" width="127" height="102" style="margin-bottom: 30px;">
                        <!--<h2 style="margin: 9px 0;">Big Data Analytics Summit</h2>-->
                    </div>				   
				   <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Nombres y Apellidos</label>
                            <input type="text" class="form-control" id="nombres" name="nombres" pattern="[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}" required placeholder="Luis">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">D.N.I</label>
                            <input type="text" class="form-control" id="num_documento" name="num_documento" pattern="[0-9]{8}" required placeholder="04532512">
                        </div>
                    </div>
                    <div class="form-row">
                    	<div class="form-group col-md-6">
                    		<label for="exampleInputEmail1">E-mail</label>
                            <input type="email" class="form-control" id="correo" name="correo" placeholder="capacitacion@dmc.pe" required="">
                        </div>
                        <div class="form-group col-md-6">
                        	<label for="exampleInputEmail1">Celular</label>
                            <input type="text" class="form-control" id="celular" name="celular" pattern="((RPM|rpm|rpc|RPC|\*|#)[0-9]{6,7})|((#|\*|)9[0-9]{8})" required placeholder="975491764">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Centro de Trabajo o Lugar de Estudio</label>
                            <input type="text" class="form-control" id="centro_trabajo" name="centro_trabajo" pattern="[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}" required placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Cargo o carrera</label>
                            <input type="text" class="form-control" id="cargo" name="cargo" pattern="[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}" required placeholder="">
                        </div>
                    </div>
                    <div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="datos" name="datos" value="1" required>
                            <label class="form-check-label" for="datos">
                                <a data-toggle="modal" style="font-family: arial; font-size: 12px; font-weight: bold;" data-target="#myModal">De conformidad con la Ley N° 29733, Ley de Protección de Datos Personales.</a>
                            </label>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary" id="button">Enviar</button>
                    </div>
                    <?php if($_SESSION["smensaje"]=="OK"){ ?>
                        <p>Gracias por participar</p>
                    <?php unset($_SESSION["smensaje"]);} ?>
                    
				</form>
			</div>
		</div>
	</div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Términos y Condiciones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>De conformidad con la Ley N° 29733, Ley de Protección de Datos Personales, el usuario da su consentimiento para el tratamiento de los datos personales que son facilitados en el presente formulario o por cualquier medio desde el momento de su ingreso o utilización del portal. Asimismo, el usuario consiente que la Empresa Data Mining Consulting SAC pueda ceder estos datos a terceros para los fines expuestos a continuación otros que crea conveniente. Estos serán incorporados en el banco de datos de usuarios de Data Mining Consulting, para utilizarlos en envío de publicidad mediante cualquier medio y soporte, envío de invitaciones a actividades convocadas por DMC o sus socios comerciales, para fines estadísticos, gestiones institucionales y administrativas; y se mantendrán mientras sean útiles para que la Empresa pueda prestar y ofrecer sus servicios y darles trámite. El usuario podrá ejercer los derechos de acceso, rectificación, oposición y cancelación de los datos personales escribiendo a capacitacion@dmc.pe o a la siguiente dirección Jr. Rio de la Plata 167. Of. 203.</p>
      </div>

    </div>
  </div>
</div>
    <script src="https://survey.dmc.pe/suscripcion/assets/js/jquery.min.js"></script>
    <script src="https://survey.dmc.pe/suscripcion/assets/js/popper.min.js"></script>
    <script src="https://survey.dmc.pe/suscripcion/assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/additional-methods.min.js"></script>
    <script type="text/javascript" src="https://survey.dmc.pe/suscripcion/assets/js/selectize.min.js"></script>
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