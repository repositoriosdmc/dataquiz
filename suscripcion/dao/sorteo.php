<?php
/*error_reporting(E_ALL);
ini_set('display_errors', '1');*/
require_once "dao/dao_suscripcion.php";
require_once "dao/dao_persona.php";

$suscripcion=new suscripcion();

$persona = new persona();

$curso=$suscripcion->listado_curso_concurso();

$universidades = $persona->lista_universidades();





$emb = isset($_GET["emb"]) ? $_GET["emb"] : null;

session_start();

$num=0;
$capacitacion_id=0;

$GtCurso=isset($_GET['curso']) ? $_GET['curso'] : 0 ;

if ($GtCurso) {

	$capacitacion_id=$suscripcion->obtener_capacitacion_id($GtCurso);

}

if(isset($_SESSION["smensaje"])){
    $num=1;
    unset($_SESSION["smensaje"]);
}

$paises = $suscripcion->getPaises();



?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Sorteo de Becas</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://survey.dataminingperu.com/inscripcion/assets/css/font.css">
    <link rel="stylesheet" href="https://survey.dmc.pe/suscripcion/assets/css/selectize.default.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=6Le2ur4UAAAAAEzsOmFOu9-1q4Iz3alvn6csaZdi"></script>
    <script src="https://www.google.com/recaptcha/api.js"
    async defer>
</script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.17.6/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/additional-methods.min.js"></script>
    <script src="https://survey.dmc.pe/suscripcion/assets/js/selectize.min.js"></script>    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


    <style>
    
        *{
            font-family: "jaf-bernino-sans","Lucida Grande","Lucida Sans Unicode","Lucida Sans",Geneva,Verdana,sans-serif !important;
            
        }

        label,blockquote{
            font-weight: bold;
            font-size: 12px;
        }

        .add_more_button {
            margin-top: 10px;
        }

        .input-group{
            margin-top: 7px;
        }

        blockquote{
            padding: 5px 20px;
            margin: 5px 10px 20px 0;
            font-size: 15px;
            border-left: 5px solid #ffc107;
            color:white;
        }

        .form-control{
            border-color:white;
        }

        .form-control:focus{
            border-color: #222954;
            box-shadow: 0 0 0 0.2rem rgba(34, 41, 84, 0.38);
        }
        .grecaptcha-badge{
            display:none !important;
        }
    </style>

</head>
<body style="background:#222954;color: white;">
	<div class="container">
        <div class="row justify-content-md-center">
        	<div class="col col-md-7" style="background: #007cbb; padding: 20px 44px;">
        		<form action="controller/controller_persona.php" id="form" method="post">
                    
                    <?php if ($capacitacion_id>0): ?>
                        <input type="hidden" name="capacitacion_id" id="capacitacion_id" value=<?=$capacitacion_id;?>>
                        <?php endif ?>
        			<div style="text-align: center;margin-bottom: 20px;">
                        <p style="font-size: 14px;">Sorteo de Becas</p>   
                        <img class="h-log2" src="https://dmc.pe/uploads/logo-dmc-2019.png" alt="" width="127" height="68">
                    </div>
                    
                    <blockquote>Datos</blockquote>
                    <div class="row">
 
        				<div class="col-md-6 form-group">
                            <label for="exampleInputEmail1">Nombres</label>
                            <input type="text" class="form-control" id="nombres" name="nombres" pattern="[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}" placeholder="..." required autocomplete="off">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="exampleInputEmail1">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" pattern="[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}" placeholder="..." required autocomplete="off">
                        </div>
                    </div>
                    <div class="row">

                            <div class="col-md-6 form-group">
                                <label for="exampleInputEmail1">Fec. Nacimiento</label>
                                <input type="date" class="form-control" id="fec" name="fec" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="exampleInputEmail1">País</label>
                                <select id="pais" name="pais" class="form-control" required="">
                                    <option value="">Selecciona</option>
                                    <?php foreach ($paises as $key => $value): ?>
                                        <option value="<?=$value->translations->es?>"><?=$value->translations->es?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                    </div>
                    <div class="row">

                            <div class="col-md-6 form-group">
                                <label for="exampleInputEmail1">Ciudad</label>
                                <input type="text" class="form-control" id="ciudad" name="ciudad" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="exampleInputEmail1">Tipo de Documento</label>
                                <select name="tDocumento" id="tDocumento" class="form-control" required>
                                    <option value="" selected="selected">Seleccionar el Tipo de Documento</option>
                                    <option value="1">DNI</option>
                                    <option value="2">PASAPORTE</option>
                                    <option value="3">CARNÉ DE EXTRANJERÍA</option>
                                    <option value="4">OTRO</option>

                                </select>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="exampleInputEmail1">DNI/PASAPORTE/OTRO</label>
                                <input type="text" class="form-control" id="num_documento" name="num_documento" placeholder="..." required autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Correo</label>
                                <input type="email" class="form-control" id="correo" name="correo[]" autocomplete="off" required placeholder="...@x.com">
                                <button type="button" class="btn btn-warning add_more_button">Agregar Otro Correo</button>
                            </div>
                        </div>
                        <div class="col-md-6">        
                            <div class="form-group">
                                <label for="exampleInputEmail1">Celular</label>
                                <input type="number" class="form-control" id="celular" name="celular[]" autocomplete="off" required placeholder="..........">
                                <button type="button" class="btn btn-warning add_more_button">Agregar Otro Celular</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
        
        			    	<div class="col-md-6 form-group">
                                <label for="exampleInputEmail1">Grado Institución</label>
                                <select name="grado" id="grado" class="form-control" required>
                                    <option value="">Seleccionar</option>
                                    <option value="1">Universitario</option>
                                    <option value="2">Instituto</option>
                                    <option value="3">Egresado</option>
                                    <option value="4">Maestría</option>
                                </select>
                            </div>


                            <div class="col-md-6 form-group">
                                <label for="exampleInputEmail1">Institución</label>
                                <select name="institucion" id="institucion" required>
                                    <option value=""></option>
                                    <?php foreach ($universidades as $key => $universidad) : ?>
                                        <option value=<?=$universidad["id"]?>>
                                            <?=$universidad['universidad']?> 	
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                
                            </div>
                    </div>
                    <div class="row">        
                            <div class="form-group">
                                <label for="exampleInputEmail1">Profesión / Especialidad</label>
                                <input type="text" class="form-control" id="especialidad" name="especialidad" placeholder="..." required>
                            </div>
                        </div>   
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Centro de Trabajo / Empresa</label>
                                <input type="text" class="form-control" id="centro_trabajo" name="centro_trabajo" pattern="[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}" placeholder="...">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Puesto</label>
                                <input type="text" class="form-control" id="cargo" name="cargo" pattern="[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}" placeholder="...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Curso de interés</label>
                                <select name="cursos[]" id="select" required>
                                    <?php foreach ($curso as $key => $value) : ?>
                                        <option value=<?=$value["id"]?>>
                                            <?=$value['nombre']?> 	
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="exampleInputEmail1">¿En qué otros cursos o temas te gustaría capacitarte?. Mencionar 3 o más</label>
                                <input type="text" class="form-control" id="mensaje" name="mensaje" pattern="[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}" placeholder="...">
                            </div>
                        </div>
                    </div>
                    <div class="checkbox ope show">
                        <input type="checkbox" name="datos" id="datos" value="1" required="" style="margin-top: 2.5px;">
                        <label for="datos" style="font-size: 12px;">De conformidad con la 
                            <a data-toggle="modal" style="font-family: arial; font-size: 12px; color: #222954; font-weight: bold; cursor: pointer;" data-target="#myModal">Ley N° 29733</a>, Ley de Protección de Datos Personales.
                        </label>
                        <label id="datos-error" class="error" for="datos" style="display:none;">Este campo es obligatorio.</label>
                        
                    </div>
                    <div class="checkbox ope show">
                        <input type="checkbox" name="sorteo" id="sorteo" value="1" required="" style="margin-top: 2.5px;">
                        <label for="sorteo" style="font-size: 12px;">Estoy de acuerdo con los terminos y condiciones del 
                            <a data-toggle="modal" style="font-family: arial; font-size: 12px; color: #222954; font-weight: bold; cursor: pointer;" data-target="#sorteoModal">sorteo</a>.
                        </label>
                        <label id="datos-error" class="error" for="sorteo" style="display:none;">Este campo es obligatorio.</label>
                        
                    </div>
                    <div class="g-recaptcha" data-sitekey="6Le2ur4UAAAAAEzsOmFOu9-1q4Iz3alvn6csaZdi"></div>
                    <input type="text" name="emb" id="emb" style="visibility: hidden;">
                    <button type="submit" class="btn btn-warning btn-lg btn-block" id="button" style="background: #222954; color: white;border:1px solid #222954">Enviar</button>
        			
        		</form>
        	</div>
         </div>
    </div>
    <div class="modal fade in " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none; padding-right: 19px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel" style="color: #434343;font-weight: bold;">Términos y Condiciones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-justify" style="color: #434343; font-size: 14px; font-family: sans-serif;font-weight: none;">
        De conformidad con la  <a href="http://bit.ly/1FSjlb2" target="_blank" style="cursor:pointer;">Ley N° 29733</a>, Ley de Protección de Datos Personales, el usuario da su consentimiento para el tratamiento de
los datos personales que son facilitados en el presente formulario o por cualquier medio desde el momento de su ingreso o utilización
del portal. Asimismo, el usuario consiente que la Empresa Data Mining Consulting SAC pueda ceder estos datos a terceros para los
fines expuestos a continuación  otros que crea conveniente.



Estos serán incorporados en el banco de datos de usuarios de Data Mining Consulting, para utilizarlos en envío de publicidad mediante
cualquier medio y soporte, envío de invitaciones a actividades convocadas por DMC o sus socios comerciales, para fines estadísticos,
gestiones institucionales y administrativas; y se mantendrán mientras sean útiles para que la Empresa pueda prestar y ofrecer sus
servicios y darles trámite.



El usuario podrá ejercer los derechos de acceso, rectificación, oposición y cancelación de los datos personales escribiendo a
capacitacion@dmc.pe o a la siguiente dirección Jr. Rio de la Plata 167. Of. 203.
      </div>
    </div>
  </div>
</div>

<div class="modal fade in " id="sorteoModal" tabindex="-1" role="dialog" aria-labelledby="sorteoLabel" style="display: none; padding-right: 19px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel" style="color: #434343;font-weight: bold;">Términos y Condiciones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-justify" style="color: #434343; font-size: 14px; font-family: sans-serif;font-weight: none;">
        <p>Debido a la coyuntura actual y los cambios laborales y económicos que esto ha generado, DMC Perú lanza esta iniciativa para apoyar a la comunidad analítica a seguir capacitándose y reforzando sus habilidades.</p>
        <p>CRITERIOS GENERALES:</p>
        <p>Organizador: DMC Perú.</p>
        <p>Ganador: 11 ganadores (01 ganador por curso virtual).</p>
        <p>Premio: Una (01) beca para uno de los cursos virtuales:</p>
        <ul>
            <li>Power BI User</li>
            <li>SQL for Analytics Básico</li>
            <li>Fundamentos de programación con R</li>
            <li>Python for Analytics</li>
            <li>Minería de Datos con R (Nivel 1)</li>
            <li>Analytics for Beginners</li>
            <li>Dashboards en Excel</li>
            <li>Credit Scoring</li>
            <li>Aplicaciones de Excel con Macros y VBA (Nivel 1)</li>
            <li>Machine Learning Inmersion</li>
            <li>Fundamentos de programación con Python</li>

        </ul>
        <p>Cierre de sorteo: domingo 24 de mayo a las 11:59 p.m.</p>
        <p>Publicación de resultados: lunes 25 de mayo a las 4:00 p.m.</p>
        <p>Mecánica del sorteo:</p>
        <p>Registrarse en formulario.</p>
        <p>Compartir la publicación de RR.SS. en modo público.</p>
        <p>Etiquetar a 5 amigos que tengan interés en los cursos.</p>
        <p><b>TÉRMINOS Y CONDICIONES:</b></p>
        <p>Sobre el ganador y canje de premio:</p>
        <ul>
            <li>-Cada persona solo puede participar por la beca de un curso virtual.</li>
            <li>-El concurso tendrá 11 ganadores, uno (01) para cada curso de la lista disponible.</li>
            <li>-Los ganadores serán aquellos que salga elegidos mediante un sorteo aleatorio entre todos los participantes que cumplan con todos los requisitos.</li>
            <li>-El premio solo es válido para los cursos virtuales e inicios especificados en la lista y no aplica para otros cursos virtuales, otros inicios ni workshops internacionales.</li>
            <li>-El premio no es transferible.</li>
            <li>-Los ganadores del sorteo tendrán que identificarse a través de cualquiera de nuestros canales de comunicación para acceder al premio.</li>
            <li>-Los ganadores tendrán hasta el martes 26 de mayo para confirmar su inscripción en el curso virtual por el que participaron. En caso el ganador desista, se realizará un nuevo sorteo aleatorio con los participantes que cumplieron los requisitos.</li>
        </ul>
        <p>DMC Perú</p>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">



    $(document).ready(function() { 

        <?php if($num==1){ ?>
            Swal.fire(
                'Su registro se guardo exitosamente!!',
                '-',
                'success'
            )
        <?php } ?>

       

        
        jQuery.extend(jQuery.validator.messages, {required: "Campo obligatorio"});


        $.validator.addMethod("embj", function(value, element, param) {

            var response = grecaptcha.getResponse();console.log(response.length);
            
            if(response.length==0){
                return false;
            }

            return true;
        }, "Campo Obligatorio.");

        $.validator.addMethod("pattern", function(value, element, param) {
            if (this.optional(element)) {

                return true;

            }

            if (typeof param === "string") {

                param = new RegExp("^(?:" + param + ")$");

            }
            
            return param.test(value);

        }, "Formato inválido");

        var select=$('#select');

        var curso_=$('#capacitacion_id').val();

        var curso=curso_==undefined ? [] :curso_.split(",");

        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {

            $('#select-beast,#select').addClass("form-control");
            
            $('#show').hide();

            $("#second").show();

            adress="bottom";

            select.val(curso);
            

        }else{

            

            select.selectize({

                items: curso,

                plugins: ['remove_button'],

            });

            adress="top";

        }

        $('#institucion').selectize({
            sortField: 'text'
        });

        


        $('.add_more_button').click(function(e){ //click event on add more fields button having class add_more_button
            e.preventDefault();
            var father_input = $(this).parents(".form-group");
            var first_input = father_input.find(".form-control:first");
            var clone = $('<div>').append(first_input.clone() ).html();
            var button_delete = "<div class='input-group-append'> <span class='input-group-text remove_field'>-</span> </div>";
            var clone_input = "<div class='input-group'>"+ clone + button_delete +"</div>";
            var existe = first_input.siblings(".input-group");

            if(existe.length==0){
                first_input.after(clone_input);
            }else{
                existe.last().after(clone_input)
            }

            father_input.find(".form-control:last").focus();
                
        });  
            
        $('.form-group').on("click",".remove_field", function(e){ //user click on remove text links
            e.preventDefault(); 
            $(this).parent('div').parent('div').remove();
        });

        $('#grado').change(function(){
            var grado = $(this).val();
            if(grado==1 || grado==2){
                $('#ciclo').removeAttr("readonly").attr("required","required").focus();
            }else{
                $('#ciclo').removeAttr("required").attr("readonly","readonly").val("");
                $('#institucion').focus();
            }
        });

        $.validator.addMethod("prueba", function(value, element) {

            var dni = value;

            var tipo_documento= 1; 

            isSuccess=true;

            if( dni.length>7 ){
                $.ajax({
                   method: "POST",
                   data:{tp_doc:tipo_documento,num_doc:dni},
                   url:"jx/validar_dni.php",
                   dataType:"json",
                   async: false,
                   success:
                        function(data) { 

                            if(data!==false){
                               isSuccess = data==1 ? false : true;
                            }
                        
                        }
                });
            }

            return isSuccess;

        },function() {return "Ud. esta registrado."});

        $('#form').validate({

            ignore: ':hidden', 

                ignoreTitle: true,

            rules:

                {
                    'num_documento':
                    {
                        required:true,
                        //pattern:/^[0-9]{8}$/,
                        prueba:true
                    },
                    'emb':
                    {
                        embj:true
                    }
                }

                    
        });

        $("form").submit(function() { console.log($("#form").valid());

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