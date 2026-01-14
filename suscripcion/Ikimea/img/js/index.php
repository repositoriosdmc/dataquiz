<?

require_once "dao/dao_inscripcion.php";

$inscripcion=new inscripcion();
$curso=$inscripcion->listado_curso();

?>

<!DOCTYPE>

<html>

	<head>

	<meta charset="utf-8">

    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">

    <title>DMC - Suscripción</title>
	<link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link type="text/css" href="http://survey.dataminingperu.com/inscripcion/assets/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="css/selectize.default.css" rel="stylesheet">
	<link type="text/css" href="css/stylesheet.css" rel="stylesheet">
	<script src="http://survey.dataminingperu.com/inscripcion/assets/js/jquery-1.10.0.min.js"></script>
    <script src="http://survey.dataminingperu.com/inscripcion/assets/js/bootstrap.min.js"></script>
    <script src="http://survey.dataminingperu.com/inscripcion/assets/js/jquery.validate.min.js"></script>
    <script src="js/selectize.min.js"></script>
	<script src="http://survey.dataminingperu.com/inscripcion/assets/js/detect.js"></script>
	<script src="js/app_prueba.js"></script>
	<style>

    .error{
        color: white;
    }

    *{

      outline: none !important;

    }



	body{

		font-family: 'Fjalla One', sans-serif;

	}

    .ope{

      font-family: 'Open Sans', sans-serif;

    }

    ::-webkit-input-placeholder {

      font-family: cursive !important;

    }

	h1,h4{
		position: relative;
		color: white;
		margin: 0;
		padding-left: 25px;
		padding-bottom:15px;
		padding-top: 60px;
	}

    h4{

      padding-top: 36px;

    }

    h1:after{
      content:'';
      position: absolute;
      background-color: white;
      width: 150px;
      height: 1px;
      bottom: 0;
      left: 28px;
    }

    h1{
      font-weight: bold;
    }

    h5{
        color: white;
        padding-bottom: 10px;
        font-family: arial;
        font-size: 22px;
        font-weight: bold;
    }


    /*.selectize-input.input-active{
      border-color: #189E2D !important;
      box-shadow: inset 0 10px 10px -10px rgba(0, 0, 0, 0.1),0 0 6px rgba(51, 160, 36, 0.6) !important;
    }*/

    .ignore{
      display: none !important;
    }

    .form-group label{
      color: white;
      font-weight: normal !important;
    }

    .clear{
      clear: both;
    }

    .popover{
      width: 100%;
    }

    .img-b{
      margin: 0;
      background: url(img/272.jpg) no-repeat;
      background-size: contain;
    }

    .btn.btn-danger{
      font-size: 16px;
    }

    .btn.btn-danger span{
      font-size: 15px;
      padding-right: 5px;
    }


    .required_,.trs{
        position: relative;
        font:inherit;
        font-size: 16px;
        font-weight: bold;
        font-family: arial;
    }

    .required_:after{
      content: '(*)';
      position: absolute;
      top: -1px;
      right: -4px;

    }
    .space{
    	padding: 4px 26px;
        margin-bottom: 15px;
    }

    .space-bottom{
    	margin-bottom: 10px;
    }
    .required_.col-sm-2{
    	color: white;
    }
    .form-control{
    	background: #787878;
    	color: #f1ecec;
    	border:transparent;
    }
    .form-control:focus,.selectize-input.input-active{
    	background: #3c3c3c;
        color: white;
        border: 1px solid #66afe9 !important;
    }
    .footer{
    	background: #004d89;
        width: 100%;
        padding: 17px 5px;

    }
    .selectize-input, .selectize-control.single .selectize-input.input-active,.selectize-input.full{
    	background: #787878;
    	color: white;
    }
    .selectize-input input {
    	color: white;
    }


</style>

<!-- Facebook Pixel Code -->

<script>

!function(f,b,e,v,n,t,s){

  if(f.fbq)
    return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;
  n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,document,'script','//connect.facebook.net/en_US/fbevents.js');
  fbq('init', '1064200720291743');
  fbq('track', "PageView");

  // CompleteRegistration
  // Track when a registration form is completed (ex. complete subscription, sign up for a service)

  fbq('track', "PageView");
 </script>
 <noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1064200720291743&ev=PageView&noscript=1"/>
    <div style="position: fixed; top: 0px; left: 0px; z-index: 3000;  height: 100%; width: 100%; background-color: #FFFFFF">
        <p style="margin-left: 10px">Habilitar Javascript</p>
    </div>
 </noscript>

<!-- End Facebook Pixel Code -->	

</head>
<body style="background: #004d89;">
    <div class="fond" style="background: url(img/fondo_suscritos.jpg) no-repeat; min-height: 840px; ">
        <div class="row" style="margin: 0;">
            <div class="col-md-8 col-md-offset-2">
                <form id="form" class="form-horizontal" action="controller/controller_inscripcion.php" method="post">
                <input type="hidden" name="documento" value="DNI">
                <input type="hidden" name="codigo" id="codigo">
                <input type="hidden" name="browser" id="browser">
                <input type="hidden" name="version" id="version">
                <input type="hidden" name="so" id="so">
                <div class="space">
                    <div style="width: 160px;margin: 0 auto;margin-top: 30px;">
                        <a href="http://dataminingperu.com/" target="_blank">
                        	<img src="img/DMC-Azul.png" width="100%" height="80">
                        </a>
                    </div>
                </div>
                <div class="space" style="background: rgba(0, 60, 102, 0.8);">
                	<h5 style="font-size: 36px;font-family:arial">Solicita información:</h5>
                    <h5 style="font-size: 16px;font-family:arial">Déjanos tus datos y nos pondremos en contacto contigo. Recibirás un email dentro en unos minutos. En caso la información solicitada no ha sido respondida en un plazo de 24 horas comunicarse con el siguiente número: <a href="tel:+975491764" style="color:#FF9800;">975491764</a></h5>
                </div>
                
                <div class="space" style="background: rgba(43, 43, 43, 0.76); padding-bottom: 30px;">
                    <h5>(*) Campos requeridos para poder completar tu solicitud.</h5>
                    <div class="row space-bottom">
                        <div class="">
                                <label class="required_ col-sm-2" for="">E-mail</label>
                                <div class="col-sm-10">
                                    <input type="email"  name="correo" id="correo" class="form-control" placeholder="luis.gomez@gmail.com" autofocus required>
                                </div>
                            
                            </div>
                        
                    </div>
                    <div class="show_tt">
                        <div class="row space-bottom">
                            <div class="show_tt">
                                <label class="required_ col-sm-2" for="exampleInputEmail1">Nombres y <span style="font-size: 10px;"> Apellidos</span></label>
                                <div class="col-sm-4">
                                    <input type="text" name="nombres" class="form-control" pattern="[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}" id="" placeholder="Luis Gómez" required>
                                </div>
                            </div>
                            <div class="">
                                <label class="required_ col-sm-2" for="">Celular</label>
                                <div class="col-sm-4">
                                    <input type="text" name="celular" class="form-control" maxlength="11" pattern="((RPM|rpm|rpc|RPC|\*|#)[0-9]{6,7})|((#|\*|)9[0-9]{8})" id="celular" placeholder="995900126" required>
                                </div>
                            
                            </div>
                        </div>
                        <div class="row space-bottom">
                        	
                            
                        </div>
                    </div>
                    
                    <div class="row" >
                        <label class="required_ col-sm-2" for="">¿Como se enteró?</label>
                        <div class="col-sm-4">
                        	<select name="medio" id="medio" class="form-control" placeholder="Escriba aquí" required>
                                <option value="">Seleccione una opción</option>
                                <option value="1">Facebook</option>
                                <option value="2">Google</option>
                                <option value="3">Folleto informativo</option>
                                <option value="4">Alumno - Ex-Alumno</option>
                                <option value="5">Linkedin</option>
                                <option value="6">Correo Electrónico</option>
                                <option value="8">Youtube</option>
                                <option value="7">Otros</option>
                            </select>
                            <label for="medio" class="error"></label>
                        </div>
                        <div class="col-sm-6 show_tt" id="show_t">
                            <button type="button" class="btn btn-block" style="line-height: 20px;"> 
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                Agregar Lugar de Trabajo
                            </button>
                        </div>
                        <div class="show_tt" id="first" style="display: none;">
                            <label for="" class="col-sm-2 trs" style="color:white">L. Trabajo</label>
                            <div class="col-sm-4">
                                <input type="text" id="centro_trabajo" name="centro_trabajo" class="form-control" id="" placeholder="Data Mining Consulting">
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="row" style="position: relative;">

                        <label class="required_ col-sm-2" for="">Curso de Interés</label>
                        <div class="col-sm-10">
                        	<select name="curso[]" multiple="multiple" id="select" required>
                                <? foreach ($curso as $key => $value) : ?>
                                    <option value=<?=$value["id"]?>>
                                        <?=$value['nombre']?> 	
                                    </option>
                                <? endforeach; ?>
                            </select>
                            <label for="curso[]" class="error"></label>
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger" id="show" style="margin:15px 0;">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true">
                    	
                        </span>
                         Agregar Consulta
                    </button>
                    <div class="form-group" id="second" style="display:none;">
                        <label for="">Consulta</label>
                        <textarea class="form-control" rows="3" id="consulta" name="consulta" placeholder="Tu curso de mayor interés y cual es tu consulta."></textarea>
                    </div>
                    <div class="">
                        <div class="checkbox ope show">
                            <label style="font-size: 12px;">
                                <input type="checkbox" name="datos" id="datos" value="1" checked style="margin-top: 2.5px;">
                                <a data-toggle="modal" style="color:white;font-family: arial; font-size: 16px; font-weight: bold;" data-target="#myModal">De conformidad con la Ley N° 29733, Ley de Protección de Datos Personales.</a>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="">
                        <button type="submit" id="button" class="pull-right btn btn-primary btn-lg" data-loading-text="Enviando...">Enviar</button>
                        <div class="spinner">
                            <div class="rect1"></div>
                            <div class="rect2"></div>
                            <div class="rect4"></div>
                            <div class="rect5"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="content">
            <div class="row" style="margin: 0px;">
    		    <div class="col-md-6">
    		    	<div style="display: inline-block;margin-right: 15px;"><a href="https://www.facebook.com/datamining.pe" target="_blank"><img src="img/facebook.png" width="40" height="40"></a></div>
    		    	<div style="display: inline-block;margin-right: 15px;"><a href="https://www.youtube.com/channel/UCj6rAxxsEePOwgqg_7WeGig" target="_blank"><img src="img/youtube.png" width="40" height="40"></a></div>
    		    	<div style="display: inline-block;"><a href="tel:+51995900126" target="_blank"><img src="img/wsp.png" width="40" height="40"></a></div>
    		    </div>
    		    <div class="col-md-6">
    		        <div class="text-right">
    		        	<a href="http://dataminingperu.com/" target="_blank" style="color: white;font-size: 25px;">dataminingperu.com</a>
    		        </div>
    		    </div>
    	    </div>	
        </div>
    	
    </div>
    <? include_once "view/terminos.php"; ?>
	<script type="text/javascript"> var _gaq = _gaq || []; _gaq.push(['_setAccount', 'UA-7977306-1']); _gaq.push(['_trackPageview']); (function() { var ga = document.createElement('script'); ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; ga.setAttribute('async', 'true'); document.documentElement.firstChild.appendChild(ga); })(); </script>
	<!-- Piwik -->
	<script type="text/javascript"> var _paq = _paq || []; _paq.push(["trackPageView"]); _paq.push(["enableLinkTracking"]); (function() { var u=(("https:" == document.location.protocol) ? "https" : "http") + "://www.peruanalitica.com/analytics/"; _paq.push(["setTrackerUrl", u+"piwik.php"]); _paq.push(["setSiteId", "1"]); var d=document, g=d.createElement("script"), s=d.getElementsByTagName("script")[0]; g.type="text/javascript"; g.defer=true; g.async=true; g.src=u+"piwik.js"; s.parentNode.insertBefore(g,s); })(); </script> <!-- End Piwik Code -->
</body>

</html>
