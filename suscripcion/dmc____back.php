<?
/*error_reporting(E_ALL);
ini_set('display_errors', '1');*/
require_once "dao/dao_suscripcion.php";

$outcurso=array(190,15,96,98);

$suscripcion=new suscripcion();
$curso=$suscripcion->listado_curso();
$concurso=$_GET["concurso"];
$GtCurso=$_GET['curso'];
if ($GtCurso) {
	$capacitacion_id=$suscripcion->obtener_capacitacion_id($GtCurso);
	$capacitacion=$suscripcion->charla_informativa_check($GtCurso);
}

//Get Paises

$paises = $suscripcion->getPaises();

$concurso_id=$concurso==1 ? 9 : 0 ;
?>
<!DOCTYPE html>
<html>
<head>
	<title>DMC</title>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<!--<link rel="stylesheet" type="text/css" href="https://survey.dataminingperu.com/inscripcion/assets/css/bootstrap.min.css">-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
	<link rel="stylesheet" type="text/css" href="./assets/css/styles.css?v=11202662259">
	<link rel="stylesheet" type="text/css" href="./assets/css/blocks_styl.css?v=21202662259">
	<link rel="stylesheet" type="text/css" href="./assets/css/selectize.default.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/intlTelInput.min.css">
	<style type="text/css">
		.ignore{
			display: none;
		}
        .modal-backdrop.fade{
            opacity: .5;
        }
        button[disabled] {
            background: #5150b285;
        }
        .b23formulario{
        	padding:0;
        }
        .b23-bt button{
        	background: white;
        	color: black;
        }
        .b23envolver{
        	color:white;
        }

        input::placeholder,textarea::placeholder{
        	color:white !important;
        }
        .selectize-input{
        	background: transparent;
        }
        select option{
        	color:black;
        }
        .b23input input, .b23input select, .b23input textarea{
        	color:white;
        	border-color:white;
        	background: transparent;
        }
	</style>
	<!-- Matomo -->
<script type="text/javascript">
  var _paq = _paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//www.peruanalitica.com/analytics/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', '6']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();

</script>

<!-- End Matomo Code -->
<!-- inicio favicon  iphone retina, ipad, iphone en orden-->
<link rel="icon" type="image/png" href="http://dmc.pe/thumbs/d1eb5aa88ee913c8ed577a44600cf7d1.png">
<!-- end favicon -->
</head>
<body class="modal-open">
	<img src="data.jpg" alt="" style="position: fixed; width:100%; height: 100%; /*min-width: 100%; min-height: 100%; top: 50%; left: 50%; transform: translateX(-50%) translateY(-50%); z-index: -1;*/">
	<div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: block; padding-top: 20px; overflow: scroll;">
		<div class="modal-dialog modal-xl" role="document" style="pointer-events:auto;">
		<div class="row">
			<div class="col-md-6">
				<img src="teenwork.jpg" width="100%" height="80%" style="margin-top:15px;">
			</div>
			<div class="col-md-6">
				<section class="b23">
			<div class="b23main wancho">
				<div style="text-align: center;">
					<img src="https://dmc.pe/uploads/logo-dmc-2019.png" width="100px">
				</div>
				<div class="b23title">
					<h2 style="color: white; text-align: center;margin:25px 0;">Formulario de Inscripción</h2>
					
				</div>
				<div class="b23envolver">
					
					<div class="b23formulario" style="margin-bottom: 30px;">

						<p style="margin-top: -35px; margin-bottom: 35px; font-weight: 500;">Completa el formulario para acceder a los contenidos Digitales</p>

						<form name="form" method="post" action="controller/controller_suscripcion.php" novalidate="novalidate" id="form">
							<?php if ($capacitacion): ?>
							    <li style="font-size: 27px; font-weight: bold; color: #5150b2;"><?=$concurso==1 ? "Concurso de Conocimiento de " : ""?><?=$capacitacion?></li>
							    <input type="hidden" name="cursos[]" id="curso" value=<?=$capacitacion_id?>>
					        <?endif;?>
							<input type="hidden" name="documento" value="DNI">
                            <input type="hidden" name="codigo" id="codigo">
                            <input type="hidden" name="browser" id="browser">
                            <input type="hidden" name="version" id="version">
                            <input type="hidden" name="atendido" id="atendido" value="<?=$concurso_id?>">
                            <?php if ($capacitacion_id>0): ?>
                            	<input type="hidden" name="capacitacion_id" id="capacitacion_id" value=<?=$capacitacion_id;?>>
                            <?php endif ?>
                            <input type="hidden" name="so" id="so">
							<ul>
								<li>
							    	<div class="b23item">
							    		<div class="b23input">
							    			<select name="pais" id="pais" required>
							    				<option value="" selected="selected">Seleccionar País</option>
							    				<?php foreach ($paises as $pais): ?>
							    					<option value="<?=$pais->translations->es?>"><?=$pais->translations->es?></option>
							    				<?php endforeach ?>
							    			</select>
							    		</div>
							    		<div class="b23input">
											<input type="text" id="provincia" name="provincia" required="required" class="validate[required]"  placeholder="Provincia/Ciudad" autofocus>
										</div>
							    		
							    	</div>
							    </li>
								<li>
									<div class="b23item">
										<div class="b23input">
							    			<select name="tDocumento" id="tDocumento" required>
							    				<option value="" selected="selected">Seleccionar el Tipo de Documento</option>
							    				<option value="DNI">DNI</option>
							    				<option value="PASAPORTE">PASAPORTE</option>
							    				<option value="CARNÉ DE EXTRANJERÍA">CARNÉ DE EXTRANJERÍA</option>
							    			</select>
							    		</div>
										<div class="b23input">
											<input type="text" id="num_documento" name="num_documento" required="required" class="validate[required]" pattern="[0-9]{8}" placeholder="Número de documento" autofocus>
										</div>
										
								    </div>
							    </li>
								<li class="show_tt">
									<div class="b23item">
										<div class="b23input">
											<input type="text" id="nombres" name="nombres" required="required" class="validate[required]" pattern="[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}" placeholder="*Nombres y Apellidos">
										</div>
										<div class="b23input">
										    <input type="email" id="correo" name="correo" required="required" class="validate[required]" placeholder="*E-mail">
									    </div>
										
									</div>
								</li>

								<li>
									<div class="b23item">
										<div class="b23input">
											<input type="text" id="celular" name="celular" required="required" class="validate[required]" pattern="((RPM|rpm|rpc|RPC|\*|#)[0-9]{6,7})|((#|\*|)9[0-9]{8})" placeholder="*Teléfono">
										</div>
										<div class="b23input">
											<select id="medio" name="medio" class="validate[required]" placeholder="*¿Como se enteró?">
												<option value="" selected="selected">¿Como se enteró?</option>
												<option value="1">Facebook</option>
												<option value="2">Google</option>
												<option value="3">Folleto informativo</option>
												<option value="4">Alumno - Ex-Alumno</option>
												<option value="5">Linkedin</option>
												<option value="6">Correo Electrónico</option>
												<option value="8">Youtube</option>
												<option value="11">WhatsApp</option>
												<option value="21">Instagram</option>
												<option value="7">Otros</option>
												<?php if ($_GET["facebook_leads"]==1): ?>
													<option value="10">Facebook - Leads</option>
												<?php endif ?>
											</select>
										</div>
										
									</div>
								</li>
								<li>
									<div class="b23item">
										<div class="b23input b23with">
											<input type="text" id="centro_trabajo" name="centro_trabajo" class="" placeholder="Centro de Trabajo">
										</div>
									</div>
								</li>
								<?php if (!$capacitacion): ?>
								<li>
									<div class="b23item">
										<div class="b23input b23with">
										    <select id="select" name="cursos[]" required="required" class="validate[required]" placeholder="*Seleccione el curso que desea" multiple="multiple">
											    <? foreach ($curso as $key => $value) : ?>
                                                    <option value=<?=$value["id"]?>>
                                                        <?=$value['nombre']?> 	
                                                    </option>
                                                <? endforeach; ?>
										    </select>
									    </div>
								    </div>
							    </li>
							    
							    <?php endif; ?>
							    <?php if ($capacitacion && $concurso!=1 /*&& $GtCurso!=98*/): ?>
							    	<li>
									    <div class="b23item">
										    <div class="b23input b23with">
										        <select id="charla_informativa" name="charla_informativa" required="required" class="validate[required]" placeholder="Asistir a la Charla Informativa">
										    	    <option value="">*Asistir a la Charla Informativa</option>
											        <option value="1">Sí</option>
											        <option value="0">No</option>
										        </select>
									        </div>
								        </div>
							        </li>
								<?php endif ?>
								
								<?php if ($capacitacion && $concurso=1): ?>
								<input type="hidden" name="charla_informativa" id="charla_informativa" value="1">
								<?php endif ?>
							    
							    <li>
								    <div class="b23item">
									    <div class="b23input b23with">
										    <textarea id="mensaje" name="mensaje"  class="validate[required]" placeholder="Mensaje"></textarea>
									    </div>
								    </div>
							    </li>
						    </ul>
						    <div style="margin-bottom: -25px;">
						    <div class="checkbox ope show">
                                <label style="font-size: 12px;">
                                    <input type="checkbox" name="datos" id="datos" value="1" required="" style="margin-top: 2.5px;">
                                    <a data-toggle="modal" style="font-family: arial; font-size: 12px; font-weight: bold;" data-target="#myModal">De conformidad con la Ley N° 29733, Ley de Protección de Datos Personales.</a>
                                </label>
                            </div></div>
						    <div class="b23text">
							    <span>*Todos los campos son obligatorios</span>
							    <div class="b23-bt">
								    <button type="submit" class="g-btn" id="button" data-loading-text="Enviando...">ENVIAR</button>
							    </div>
						    </div>

					    </form>
					</div>
					
				</div>
			</div>
	    </section>
		</div>
			
		</div></div>
	</div>
		
	<!-- CONTENT END -->
    

    	<div class="modal-backdrop fade show"></div>		
    <? include_once "view/terminos.php"; ?>
    
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/additional-methods.min.js"></script>
    <script src="./assets/js/selectize.min.js"></script>
	<script src="./assets/js/detect.js"></script>
	<script src="./assets/js/detect.js"></script>
	<script src="./assets/js/intlTelInput.min.js"></script>
	<script src="./assets/js/utils.js"></script>
	<script src="./assets/js/app_prueba.js?v=0.12"></script>

    <script type="text/javascript">
    	$.get("https://ipinfo.io", function(response) {
           if(response.country=="PE"){
           	$('#pais').val("Perú");
           	$('#tDocumento').val("DNI");
           }
        }, "jsonp");

    	$(document).ready(function(){

    		$("#tDocumento").change(function(){

    			var valor = $(this).val();

    			var pais = $('#pais').val();

    			if( valor == "DNI" && pais == "Perú" ){

    				$("#num_documento,#celular").rules( "remove" ,"pattern");

    				$("#num_documento").attr("pattern","[0-9]{8}");

    				$("#num_documento" ).rules( "add" ,{"pattern":/^[0-9]{8}$/});

    				$("#celular" ).rules( "add" ,{"pattern":/^((RPM|rpm|rpc|RPC|\*|#)[0-9]{6,7})|((#|\*|)9[0-9]{8})$/});


    			}else {

    				$( "#num_documento,#celular" ).rules( "remove" ,"pattern");

    				$('#num_documento').attr("pattern","[a-zA-Z0-9]{8,11}");

    				$("#num_documento" ).rules( "add" ,{"pattern":/^[a-zA-Z0-9]{8,11}$/});
    				$('#celular').rules( "add" ,{"pattern":/^[0-9]{7,20}$/});
    			}
    		})

    	});
    </script>

    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window,document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
         fbq('init', '1064200720291743'); 
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" src="https://www.facebook.com/tr?id=1064200720291743&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
</body>
</html>