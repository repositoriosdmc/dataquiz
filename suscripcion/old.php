<?

require_once "dao/dao_suscripcion.php";

$outcurso=array(190,15,96,98);

$suscripcion=new suscripcion();
$curso=$suscripcion->listado_curso_base();
$concurso=$_GET["concurso"];
$GtCurso=$_GET['curso'];
if ($GtCurso) {
	$capacitacion_id=$_GET['curso'];
	//$capacitacion=$suscripcion->charla_informativa_check($GtCurso);
}

$concurso_id=$concurso==1 ? 9 : 0 ;
?>
<!DOCTYPE html>
<html>
<head>
	<title>DMC</title>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="https://survey.dataminingperu.com/inscripcion/assets/css/bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
	<link rel="stylesheet" type="text/css" href="./assets/css/styles.css?v=11202662259">
	<link rel="stylesheet" type="text/css" href="./assets/css/blocks_styl.css?v=21202662259">
	<link rel="stylesheet" type="text/css" href="./assets/css/selectize.default.css">
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
<!-- Código de instalación Cliengo para http://dmc.pe/ -->
 <script type="text/javascript">(function () {
 var ldk = document.createElement('script');
 ldk.type = 'text/javascript';
 ldk.async = true;
 ldk.src = 'https://s.cliengo.com/weboptimizer/5bd1f3afe4b06315e2a3b6f4/5bd1f3b0e4b06315e2a3b6f7.js';
 var s = document.getElementsByTagName('script')[0];
 s.parentNode.insertBefore(ldk, s);
 })();</script>
<!-- End Matomo Code -->
<!-- inicio favicon  iphone retina, ipad, iphone en orden-->
<link rel="icon" type="image/png" href="http://dmc.pe/thumbs/d1eb5aa88ee913c8ed577a44600cf7d1.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://dmc.pe/thumbs/9ded712545c88ae3d41c80d0c4c9662e.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://dmc.pe/thumbs/4ff35423e76e462e8eeb7a4f9a5fc627.png">
<link rel="apple-touch-icon-precomposed" href="http://dmc.pe/thumbs/94fb1a66f6d925a57ccebcea14abf427.png">
<!-- end favicon -->
</head>
<body>
	<div class="menu-mobile-open icon-menu"></div>
	<div class="menu-mobile-close icon-close"></div>
	<div class="menu-overlay"></div>
	<!-- html solo para el menu responsive -->
	<div class="cnt-wrapper"><div class="wrapper">
		<!-- HEADER START -->
		<header class="header">
			<div class="fix-head">
				<div class="wancho header-ctn">
					<a href="http://dmc.pe" class="header-logo">
						<img class="h-log1" src="https://dmc.pe/uploads/logo2-dmc-2019.png" alt="" width="127" height="68">
						<img class="h-log2" src="https://dmc.pe/uploads/logo2-dmc-2019.png" alt="" width="127" height="68">
					</a>
					<nav class="menu">
						<? if( array_search($_GET["curso"],$outcurso)===false ){ ?>
						<div class="menu-wrap">
							<ul class="menu-list">
							<!-- "menu-list" es usado para el menu responsive -->
							    <li class="menu-item"><a href="http://dmc.pe/especializacion/" class="menu-link ">ESPECIALIZACIÓN</a></li>
							    <li class="menu-item"><a href="http://dmc.pe/categoria/cursos-especializados/" class="menu-link ">CURSO ESPECIALIZADO</a></li>
							    <li class="menu-item"><a href="http://dmc.pe/categoria/cursos-especializados/" class="menu-link ">NOSOTROS</a></li>
							    <li class="menu-item"><a href="/suscripcion/" class="menu-link active">CONTACTO</a></li>
							    <li class="menu-item no-visible"><a href="http://dmc.pe/bolsa-trabajo/" class="menu-link ">BOLSA TRABAJO</a></li>
						    </ul>
					    </div>
					    <? } ?>
					</nav>
				</div>
			</div>
		</header>
		<!-- HEADER END -->
		<!-- CONTENT START -->
		<!-- BLOQUE 23 -->
		<section class="b23">
			<div class="b23main wancho">
				<div class="b23title">
					<h2>Solicitud de Información</h2>
					
				</div>
				<div class="b23envolver">
					
					<div class="b23formulario" style="margin-bottom: 30px;">
						<p style="margin-top: -35px; margin-bottom: 35px; font-weight: 500;">Completa el formulario para conocer más sobre los cursos, programas, workshops y la experiencia de estudiar en DMC. Recibirás un E-Mail con la información dentro de la próxima hora.</p>

						<form name="form" method="post" action="controller/controller_suscripcion_dmc.php" novalidate="novalidate" id="form">
							<input type="hidden" name="tt" id="tt" value="1">
							<?php if ($capacitacion): ?>
							    <li style="font-size: 27px; font-weight: bold; color: #5150b2;"><?=$concurso==1 ? "Concurso de Conocimiento de " : ""?><?=$capacitacion?></li>
							    <input type="hidden" name="cursos[]" id="curso" value=<?=$capacitacion_id?>>
					        <?endif;?>
							<input type="hidden" name="documento" value="DNI">
							<input type="hidden" id="check_mail" name="check_mail" value="1">
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
											<input type="text" id="num_documento" name="num_documento" required="required" class="validate[required]" pattern="[0-9]{8}" placeholder="*DNI">
										</div>
										<div class="b23input">
										    <input type="email" id="correo" name="correo" required="required" class="validate[required]" placeholder="*E-mail">
									    </div>
								    </div>
							    </li>
								<li class="show_tt">
									<div class="b23item">
										<div class="b23input">
											<input type="text" id="nombres" name="nombres" required="required" class="validate[required]" pattern="[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}" placeholder="*Nombres">
										</div>
										<div class="b23input">
											<input type="text" id="celular" name="celular" required="required" class="validate[required]" pattern="((RPM|rpm|rpc|RPC|\*|#)[0-9]{6,7})|((#|\*|)9[0-9]{8})" placeholder="*Teléfono">
										</div>
									</div>
								</li>

								<li>
									<div class="b23item">
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
										<div class="b23input show_tt">
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
							    <?php if ($capacitacion && $concurso!=1 && $GtCurso!=98): ?>
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
						    <input type="hidden" id="form__token" name="form[_token]" value="WAIHFmvq7tW6N6z0mj121F6zuq5wAB5z41zxDR6u0uQ">
					    </form>
					</div>
					<div class="b23contenido">
						<h2>Contáctanos</h2>
						<div class="b23innerbx">
							<h3>Call center:</h3>
							<a href="tel:2535066" style="color: white;">253 - 5066</a>
						</div>
						<div class="b23innerbx">
							<h3>Of. administrativas:</h3><a href="tel:975491764" style="color: white;">975491764</a>
						</div>
						<div class="b23innerbx">
							<h3>Escríbenos a:</h3><a href="mailto:capacitacion@dmc.pe" style="color: white;">capacitacion@dmc.pe</a>
						</div>
					</div>
				</div>
			</div>
	    </section>
	<!-- CONTENT END -->
    </div>
    <div class="b26"  style="height:100%; width:100%;">
    	<div id="google-map">
    		<a href="https://goo.gl/51qV66" target="_blank">
    		    <img src="./assets/img/mapa.png" width="100%" height="100%">
    		</a>
    	</div>
    </div>
    <footer class="footer">
    	<div class="envolfoot wancho">
    		<div class="sectfoot1">
    			<div class="footlogo">
    				<img src="https://dmc.pe/uploads/logo2-dmc-2019.png" width="127" height="68" alt="">
    			</div>
    			<div class="footlinks">
    				<? if(array_search($_GET["curso"],$outcurso)===false){ ?>
    				<ul>
    					<div class="contador">
    						<li>
    							<a href="http://dmc.pe/especializacion/">Especialización</a>
    						</li>
    						<li>
    							<a href="http://dmc.pe/categoria/cursos-libres/">Cursos Libres</a>
    						</li>
    						<li>
    							<a href="http://dmc.pe/nosotros/">Nosotros</a>
    						</li>
    					</div>
    					<div class="contador">
    						<li>
    							<a href="/suscripcion/">Contacto</a>
    						</li>
    						<li>
    							<a href="http://dmc.pe/bolsa-trabajo/">Bolsa de trabajo</a>
    						</li>
    					</div>
    				</ul>

    			<? } ?>
    			</div>
    			<div class="footcorreos">
    				<div class="fooitem">
    					<div class="envolico">
    						<a href="mailto:capacitacion@dmc.pe">capacitacion@dmc.pe</a>
    					</div>
    				</div>
    				<div class="footdireccion">
    					<div class="envolico"><a href="https://goo.gl/51qV66" target="_blank"><p>Jr. Río de la Plata 167. Of. 203. San Isidro 15046</p></a></div></div></div><div class="footubicanos"><div class="footext1"><p>Call center: <a href="tel:2535066">253 - 5066</a></p><p>Of. administrativas: <a href="tel:975491764">975491764</a></p></div></div></div></div><!-- creditos --><section class="footer-copy"><div class="wancho"><div class="footer-copy-left"><p>Data Mining Consulting <span id="id_year">2017</span> Todos los derechos reservados |</p><a class="link-staff" target="_blank" href="https://www.staffdigital.pe/">Diseño Página web: <strong class="staffteam">staffdigital</strong></a></div><div class="footer-copy-right"><span>Siguenos en:</span><ul><li><a target="_blank" class="icon-fbb" href="http://www.facebook.com/datamining.pe"></a></li><li><a target="_blank" class="icon-inn" href="http://pe.linkedin.com/company/data-mining-consulting-sac"></a></li><li><a target="_blank" class="icon-ytt" href="https://www.youtube.com/channel/UCj6rAxxsEePOwgqg_7WeGig"></a></li><li><a target="_blank" class="icon-gl" href="https://plus.google.com/u/0/b/103739130001422668214/103739130001422668214/about"></a></li><li><a target="_blank" class="icon-twt" href="http://twitter.com/dataminingperu"></a></li></ul></div></div></section>
    				</div>
    			</footer>
    			<? include_once "view/terminos.php"; ?>
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/additional-methods.min.js"></script>
    <script src="./assets/js/selectize.min.js"></script>
	<script src="./assets/js/detect.js"></script>
	<script src="./assets/js/app_prueba.js?v=0.12"></script>
    <script>

    // validando form
    $(function() {
        var map;
        var marker;

        

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