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
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://survey.dmc.pe/suscripcion/css/selectize.default_2.css">
    
</head>
<body style="background: #fafafa;">
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-md-7" style="padding: 25px 35px; border: 1px solid #c8c7c7; margin: 15px 0; border-radius: 6px; box-shadow: 0px 1px 5px #dddddd;background: white;">
				<form name="form" method="post" action="controller/controller_suscripcion_dmc.php" id="form">
                    <div style="text-align: center;">
                        <img class="h-log2" src="https://dmc.pe/static/img/logo2-01.svg" alt="" width="127" height="68">
                        <h2 style="margin: 9px 0;">Suscritos</h2>
                    </div>				   
				   <span>
                        <input type="hidden" name="num_usuario" id="num_usuario" value="<?=$usuario;?>">
                        <input type="hidden" name="atendido" id="atendido" value="0">
				   </span>
				   <div class="form-row">
				   	    <div class="form-group col-md-6">
				   	    	<label for="exampleInputEmail1">Medio</label>
                            <select class="form-control" id="medio" name="medio" required="">
                                <option value="">Seleccione Medio</option>
                                <option value="13">Facebook - Comentarios</option>
                                <option value="12">Facebook - Messenger</option>
                                <option value="11">Whatsapp</option>
                                <option value="14">Presencial</option>
                                <option value="15">Llamada</option>
                                <option value="16">Correo Electrónico</option>
                                <option value="21">Instagram</option>
                                <option value="17">Cliengo</option>
                            </select>
                        </div>
                        <!--<div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Asesor</label>
                            <select class="form-control" id="num_usuario" name="num_usuario" required="">
                                <option value="">Seleccione Asesor</option>
                                <option value="15">Angela Huacasi</option>
                                <option value="6">Eduardo Nugkuag</option>
                                <option value="7">Janet Chambi</option>
                                <option value="8">Asistente Académico</option>
                                <option value="9">Aldahir</option>
                                <option value="17">Katherine Duffo</option>
                                <option value="11">Joel Lapa</option>
                                <option value="18">Lisbeth Montero</option>
                                <option value="23">Katherine Flores</option>
                            </select>
                        </div>  -->
                    	
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Tipo de Documento</label>
                            <select class="form-control" id="tDocumento" name="tDocumento">
                                <option value="">Seleccione Documento</option>
                                <option value="DNI">DNI</option>
                                <option value="OTROS">OTROS</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Número de Documento</label>
                            <input type="text" class="form-control" id="num_documento" name="num_documento" pattern="[0-9]{8}" placeholder="85122325">
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
                            <input type="number" class="form-control" id="celular" name="celular" pattern="" placeholder="975491764">
                        </div>	
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Cursos</label>
                            <select id="curso" name="cursos[]"  multiple="multiple" required="">
                                <?php foreach ($listado_curso as $key => $value): ?>
                                    <option value="<?=$value['id']?>"><?=$value["nombre"]?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <!--<div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Observación</label>
                            <textarea name="mensaje" id="mensaje" class="form-control"></textarea>
                        </div>
                    </div>-->
                    <div>
                        <!--<div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="check_mail" name="check_mail" value="1">
                            <label class="form-check-label" for="check_mail">Enviar E-mail</label>
                        </div>-->
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="datos" name="datos" value="1">
                            <label class="form-check-label" for="datos">Acepta Terminos y Condiciones</label>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary" id="button">Enviar</button>
                    </div>
                    
				</form>
			</div>
		</div>
	</div>
    <script src="https://survey.dmc.pe/suscripcion/assets/js/jquery.min.js"></script>
    <script src="https://survey.dmc.pe/suscripcion/assets/js/popper.min.js"></script>
    <script src="https://survey.dmc.pe/suscripcion/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://survey.dmc.pe/suscripcion/assets/js/selectize.min.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#curso').selectize({
                items: [curso],
                plugins: ['remove_button'],
            });
            jQuery.extend(jQuery.validator.messages);

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
        'num_usuario':
        {
          required:true
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

        'apellidos':
        {
          pattern:/^[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}$/
        },

        'celular':
        {
          //pattern:/^((RPM|rpm|rpc|RPC|\*|#)[0-9]{6,7})|((#|\*|)9[0-9]{8})$/
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
        })
    </script>
</body>
</html>