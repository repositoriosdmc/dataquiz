<?

require_once "dao/dao_inscripcion.php";

$curso=inscripcion::listado_curso();

?>

<!DOCTYPE>

<html>

	<head>

		<meta charset="utf-8">

    <meta property="og:image" content="http://www.bigdatasummit.pe/conferencia/assets/images/logo/conferencia.png">

    <link rel="icon" type="image/x-icon" href="http://www.bigdatasummit.pe/wp-content/uploads/2015/05/favicon.ico">

    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">

    <title>Suscripción Big Data Analytics Summit</title>

		<link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

		<link type="text/css" href="http://dmc.dataminingperu.com/assets/styles/bootstrap.min.css" rel="stylesheet">

		<link type="text/css" href="css/selectize.default.css" rel="stylesheet">

		<script src="http://dmc.dataminingperu.com/assets/js/jquery.min.js"></script>

    <script src="http://dmc.dataminingperu.com/assets/js/bootstrap.min.js"></script>

    <script src="http://dmc.dataminingperu.com/assets/js/jquery.validate.min.js"></script>

		<script src="js/selectize.min.js"></script>

    <script src="http://survey.dataminingperu.com/inscripcion/assets/js/detect.js"></script>

		<script src="js/app_prueba.js"></script>

		<style>

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

		.tp{

			background: #227316;

			padding:0;

      border-radius: 0px 0px 6px 6px;

		}

		.tpp{

			background-color: #2C9320;

      padding: 7px 27px;

      padding-bottom: 1px;

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

    }

    .vrd{

      color: #057120;

    }

    .selectize-input.input-active{

      border-color: #189E2D !important;

      box-shadow: inset 0 10px 10px -10px rgba(0, 0, 0, 0.1),0 0 6px rgba(51, 160, 36, 0.6) !important;

    }

    .log{

      width: 20%;

      margin-left: -15px;

      margin-bottom: 30px;

    }

    .log-b{

      width: 100%;

      height: 75%;

    }

    .ignore{

      display: none !important;

    }

    .form-group label{

      color: white;

      font-weight: normal !important;

    }

    .col-md-4 p{

      margin-bottom: 10px;

    }

    .clear{

      clear: both;

    }

    .popover{

      width: 100%;

    }

    .img-b{

      margin: 0;

      background: #1e8e11 url(img/portada.jpg) no-repeat;

      background-size: contain;

    }

    .btn.btn-danger{

      font-size: 16px;

    }

    .btn.btn-danger span{

      font-size: 15px;

      padding-right: 5px;

    }

    .usu{

      background: #d9534f;

      color: white;

    }

    .required_{
      position: relative;
    }

    .required_:after{
      content: '(*)';
      position: absolute;
      top: 0;
      margin-left: 7px;

    }

		</style>

<!-- Facebook Pixel Code -->

<script>

!function(f,b,e,v,n,t,s){

  if(f.fbq)

    return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};

  if(!f._fbq)f._fbq=n;

  n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;

  t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,

  document,'script','//connect.facebook.net/en_US/fbevents.js');

  fbq('init', '1064200720291743');

  fbq('track', "PageView");

  // CompleteRegistration

// Track when a registration form is completed (ex. complete subscription, sign up for a service)



  fbq('track', "PageView");</script>

  <noscript><img height="1" width="1" style="display:none"

src="https://www.facebook.com/tr?id=1064200720291743&ev=PageView&noscript=1"

/></noscript>

<!-- End Facebook Pixel Code -->	</head>

	<body>

		<div>

			<div class="row img-b" style="margin:0px">

        <div class="col-md-6" style="padding:0">

        </div>

        <div class="col-md-6 tp">

          <h1>BIG DATA ANALYTICS SUMMIT</h1>

          <h4>25 y 26 de Agosto</h2>

          <div class="tpp">

            <form id="form" action="controller/controller_inscripcion.php" method="post">

              <input type="hidden" name="documento" value="DNI">

              <input type="hidden" name="codigo" id="codigo" value="">

              <h5>

                Solicita información

              </h5>

              <h5>

                Déjanos tus datos y nos pondremos en contacto contigo.

              </h5>
              <h5>(*) Campos requeridos</h5>

              <div class="row">

                <div class="col-md-6">

                  <div class="form-group">

                    <label class="required_" for="">E-mail Personal</label>

                    <input type="email"  name="correo" class="form-control" id="correo" placeholder="janet.quise@gmail.com" required>

                  </div>

                </div>

              

              </div>

              <div class="row show_tt">
                <div class="col-md-6 show_tt">

                  <div class="form-group">

                    <label class="required_" for="exampleInputEmail1">Nombres</label>

                    <input type="text" name="nombres" class="form-control" pattern="[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}" id="" placeholder="Janet" required>

                  </div>

                </div>

                <div class="col-md-6">

                  <div class="form-group">

                    <label class="required_" for="">Apellidos</label>

                    <input type="text" name="apellidos" class="form-control" pattern="[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}" id="" placeholder="Quispe De las Casas" required>

                  </div>

                </div>

              </div>

              <div class="row show_tt">

                <div class="col-md-6">

                  <div class="form-group">

                    <label class="required_" for="">Celular</label>

                    <input type="text" name="celular" class="form-control" maxlength="11" pattern="((RPM|rpm|rpc|RPC|\*|#)[0-9]{6,7})|((#|\*|)9[0-9]{8})" id="celular" placeholder="#975491764" required>

                  </div>

                </div>

                <div class="col-md-6">

                  <div class="form-group">

                    <label for="">Centro de Trabajo</label>

                    <input type="text" id="centro_trabajo" name="centro_trabajo" class="form-control" id="" placeholder="DMC">

                  </div>

                </div>

              </div>



              <div class="form-group">

                <label class="required_" for="">¿Como se enteró?</label>

                <select name="medio" class="form-control" required>

                  <option value=""></option>

                  <option value="Facebook">Facebook</option>

                  <option value="Google">Google</option>

                  <option value="Folleto informativo">Folleto informativo</option>

                  <option value="Ex-Alumno">Ex-Alumno</option>

                  <option value="Amigos">Amigos</option>

                  <option value="Página Web">Página Web</option>

                  <option value="Linkedin">Linkedin</option>

                  <option value="Correo Electrónico">Correo Electrónico</option>

                </select>

                <label for="medio" class="error"></label>

              </div>
              <input type="hidden" name="curso[]" value=22>  
              <button type="button" class="btn btn-danger" id="show">

                  <span class="glyphicon glyphicon-plus" aria-hidden="true">

                  </span>

                  Agregar Consulta

              </button>

              <div class="form-group" id="second" style="display:none;">

                <label for="">Consulta</label>

                <textarea class="form-control" rows="3" id="consulta" name="consulta" placeholder="Tu curso de mayor interés y cual es tu consulta."></textarea>

              </div>

              <div class="form-group">

                <div class="checkbox ope show_tt">

                  <label style="font-size: 12px;">

                    <input type="checkbox" name="datos" id="datos" value="1" checked style="margin-top: 2.5px;">
                    <a data-toggle="modal" style="color:white;" data-target="#myModal">De conformidad con la Ley N° 29733, Ley de Protección de Datos Personales.</a>

                  </label>

                </div>
              </div>
              <div class="form-group">
                <button type="submit" id="button" class="pull-right btn btn-primary btn-lg" data-loading-text="Enviando...">Enviar</button>

                <div class="spinner">

                  <div class="rect1"></div>

                  <div class="rect2"></div>

                  <div class="rect4"></div>

                  <div class="rect5"></div>

                </div>

                <div class="clear"></div>

              </div>

            </form>

          </div>

        </div>

      </div>

      <div class="container">

          <div class="row">

            <div class="col-md-4">

              <h3 class="vrd">Contáctanos</h3>

              <p class="ope">

                <span class="vrd">Telf. Oficina: </span>

                +51(1) 253-5066

              </p>

              <p class="ope">

                <span class="vrd">Móvil: </span>

                #995900126 / #985129029

              </p>

              <p class="ope">

                <span class="vrd">E-mail: </span>

                contacto@bigdatasummit.pe

              </p>

              <p class="ope">

                <span class="vrd">Dirección: </span>

                Calle Río de la Plata 167 Of. 203 - San Isidro

              </p>

              <p class="ope">

                <span class="vrd">Redes Sociales: </span>

                <a href="https://www.facebook.com/bigdatasummit.pe/" target="_blank">Facebook</a>

              </p>



            </div>

            <div class="clear"></div>

          </div>

      </div>

		</div>
    <? include_once "view/terminos.php"; ?>
		<script type="text/javascript"> var _gaq = _gaq || []; _gaq.push(['_setAccount', 'UA-7977306-1']); _gaq.push(['_trackPageview']); (function() { var ga = document.createElement('script'); ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; ga.setAttribute('async', 'true'); document.documentElement.firstChild.appendChild(ga); })(); </script>
		<!-- Piwik -->
		<script type="text/javascript"> var _paq = _paq || []; _paq.push(["trackPageView"]); _paq.push(["enableLinkTracking"]); (function() { var u=(("https:" == document.location.protocol) ? "https" : "http") + "://www.peruanalitica.com/analytics/"; _paq.push(["setTrackerUrl", u+"piwik.php"]); _paq.push(["setSiteId", "1"]); var d=document, g=d.createElement("script"), s=d.getElementsByTagName("script")[0]; g.type="text/javascript"; g.defer=true; g.async=true; g.src=u+"piwik.js"; s.parentNode.insertBefore(g,s); })(); </script> <!-- End Piwik Code -->
	</body>

</html>
