<?

require_once "dao/dao_suscripcion.php";

$suscripcion=new suscripcion();
$curso=$suscripcion->listado_curso();
if ($_GET['curso']) {
	$capacitacion_id=$suscripcion->obtener_capacitacion_id($_GET['curso']);
	$capacitacion=$suscripcion->charla_informativa_check($_GET['curso']);
}


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
						<div class="menu-wrap">
							<ul class="menu-list">
							<!-- "menu-list" es usado para el menu responsive -->
							    <li class="menu-item"><a href="http://dmc.pe/especializacion/" class="menu-link ">ESPECIALIZACIÓN</a></li>
							    <!--<li class="menu-item"><a href="https://dmc.pe/categoria/cursos-universitarios/" class="menu-link ">CURSOS UNIVERSITARIOS</a></li>-->
							    <li class="menu-item"><a href="http://dmc.pe/categoria/cursos-especializados/" class="menu-link ">CURSO ESPECIALIZADO</a></li>
							    <li class="menu-item"><a href="https://dmc.pe/categoria/workshops/" class="menu-link ">WORKSHOPS</a></li>
							    <li class="menu-item"><a href="http://dmc.pe/categoria/cursos-especializados/" class="menu-link ">NOSOTROS</a></li>
							    <li class="menu-item"><a href="/suscripcion/" class="menu-link active">CONTACTO</a></li>
							    <li class="menu-item no-visible"><a href="http://dmc.pe/bolsa-trabajo/" class="menu-link ">BOLSA TRABAJO</a></li>
						    </ul>
					    </div>
					</nav>
				</div>
			</div>
		</header>
		<!-- HEADER END -->
		<!-- CONTENT START -->
		<!-- BLOQUE 23 -->
		<section class="b28"><div class="b28-main wancho"><div class="b28-envolve"><div class="b28-title"><h2><strong>Mensaje</strong> enviado</h2></div><div class="b28-text"><p>Únete a nuestra familia.</p><p>Ud. registrado a la charla informativa.</p></div><div class="b28-btn"><a href="/" class="g-btn celeste">VOLVER AL INICIO</a></div></div><div class="b28-img"><img src="https://dmc.pe/static/img/img-enviado.png" width="271" height="364" alt=""></div></div></section>
    <footer class="footer">
    	<div class="envolfoot wancho">
    		<div class="sectfoot1">
    			<div class="footlogo">
    				<img src="https://dmc.pe/uploads/logo2-dmc-2019.png" width="127" height="68" alt="">
    			</div>
    			<div class="footlinks">
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
	<script src="./assets/js/app_prueba.js?v=0.11"></script>
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