<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIPLOMA LEAD DATA OFFICER - DMC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Hotjar Tracking Code for intranetdmc.com -->
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-58DN985H');
    </script>
    <!-- End Google Tag Manager -->
    <script>
        (function(h, o, t, j, a, r) {
            h.hj = h.hj || function() {
                (h.hj.q = h.hj.q || []).push(arguments)
            };
            h._hjSettings = {
                hjid: 3866457,
                hjsv: 6
            };
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script');
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
    </script>
</head>
<style>
    body {
        font-family: Geometria-Medium !important;
    }

    b {
        font-family: Geometria-bold !important;
    }

    @font-face {
        font-family: 'Geometria-Bold';
        font-style: normal;
        font-weight: normal;
        src: local('Geometria-Bold'), url('https://certificaciones.dmc.pe/suscripcion/assets/fonts/Geometria-Bold.woff') format('woff');
    }

    @font-face {
        font-family: 'Geometria-Medium';
        font-style: normal;
        font-weight: normal;
        src: local('Geometria-Medium'), url('https://certificaciones.dmc.pe/suscripcion/assets/fonts/Geometria-Medium.woff') format('woff');
    }

    .container-sm {
        max-width: 100%;

    }

    .fondito {
        background: url(https://certificaciones.dmc.pe/suscripcion/assets/img/dpm-ldo/fondo-ldo-portada.png);
        background-size: cover;
        height: 670px;
    }

    .fondito .col-md-7 {
        padding: 0;
    }

    .fondito .col-md-7 img {
        display: none;
    }

    .mb-3 {
        margin-bottom: 0.4rem !important;
    }

    .form {
        background: white;
        padding: 18px 5px;
        margin: 120px 0;
        margin-left: 53px;
        margin-right: 30px;
        border-radius: 26px;
    }

    .text-center.title-pr {
        font-family: Geometria-Medium;
        color: #c3922e;
    }

    .text-center.title-pr p,
    .text-center.title-sc p {
        margin: 0;
        line-height: 1;
        font-size: 24px;
        font-weight: bold;
        font-family: Geometria-Medium;
    }

    .text-center.title-sc {
        margin: 18px 0;
    }

    .text-center.title-sc p {
        font-size: 11px;
    }

    .form-control {
        font-family: Geometria-Medium;
    }

    label.form-check-label {
        font-family: Geometria-Medium;
        font-size: 13px;
    }

    button.btn.btn-sm {
        color: white;
        background: #c3922e;
        border-radius: 6px;
        padding: 5px 14px;
        font-size: 14px;
        font-family: Geometria-Medium;
    }

    .txt-title {
        color: #c3922d;
        font-size: 36px;
        font-weight: bold;
        margin: 30px 0;
    }

    .icon-t {
        font-size: 18px;
        margin-bottom: 40px;
        display: flex;
    }

    .icon-t span {
        margin-left: 10px;
    }

    .icon-t .tt {
        margin-top: 1px;
        margin-left: 15px;
        font-size: 17px;
    }

    .ds ::marker {
        font-size: 22px;
        color: #c1902c;
        /* width: 116px; */
    }

    .ds li {
        height: 90px;
        font-size: 15px;
    }

    .icon-t .pq {
        font-weight: bold;
        font-size: 19px;
        margin-left: 16px;
        color: black;
    }

    a.icon-a {
        margin-top: 22px;
        display: inline-block;
        margin-right: 5px;
    }

    .text-center.link {
        margin-top: 35px;
        padding-bottom: 35px;
    }

    .text-center.link div {
        display: inline-block;
        color: white;
        margin-right: 29px;
        font-size: 12px;
    }

    .ort {
        display: inline-block;
        margin-left: 35px;
    }

    .whats-float {
        position: fixed;
        transform: translate(108px, 0px);
        top: 25%;
        right: 0;
        width: 150px;
        overflow: hidden;
        background-color: #25d366;
        color: #FFF;
        border-radius: 2px 0 0 2px;
        z-index: 10;
        transition: all 0.5s ease-in-out;
        vertical-align: middle
    }

    .whats-float a span {
        color: white;
        font-size: 15px;
        padding-top: 8px;
        padding-bottom: 10px;
        position: absolute;
        line-height: 16px;
        font-weight: bolder;
    }

    .whats-float i {
        font-size: 30px;
        color: white;
        line-height: 30px;
        padding: 10px;
        transform: rotate(0deg);
        transition: all 0.5s ease-in-out;
        text-align: center;

    }

    .whats-float:hover {
        color: #FFFFFF;
        transform: translate(0px, 0px);
    }

    .whats-float:hover i {
        transform: rotate(360deg);
    }

    .wrapper {
        width: 100%;
        padding-top: 20px;
        text-align: center;
    }

    .slider {
        width: 90%;
        margin: 0px auto;
    }

    .slick-slide {
        margin: 10px;
    }

    .slick-slide img {
        width: 100%;
    }

    .card-sp {
        display: flex;
        align-items: center;
        margin-top: 28px;
    }

    .card-sp .cnt {
        margin-left: 14px;
        text-align: left;
    }

    .txt-ns {
        font-size: 24px;
        text-align: left;
        margin: 0;
        margin-top: 20px;
        color: #c3922d;
    }

    @media screen and (min-width: 1450px) {

        .fondito {
            height: 870px;
        }
    }

    .slick-next:before, .slick-prev:before{
        color: #323232;
    }

    @media (max-width: 767px) {
        /* Agrega estilos específicos para pantallas medianas aquí */

        .fondito {
            background: white;
            height: auto;
        }

        .fondito .col-md-7 img {
            display: block;
        }

        .bn .col-8 {
            font-size: 39px;
            margin-bottom: 9px;
        }

        .bn .col-8.bn {
            margin-top: -58px;
            font-size: 22px;
        }

        .text-center.title-pr p,
        .text-center.title-sc p {
            font-size: 38px;
        }

        .text-center.title-sc p {
            font-size: 18px;
        }

        .form {
            margin: 20px 15px;
        }

        .ort {
            display: block;
            margin: 0;
        }

        .ds li {
            height: auto;
            font-size: 21px;
            margin-bottom: 15px;
        }

        .icon-t .pq {
            text-align: left;
        }
    }
</style>

<body style="background-color: #2c2c2c;">
    <div class="whats-float">
        <a href="https://wa.me/51902815695" target="_blank">
            <i class="fa fa-whatsapp"></i><span>WhatsApp<br><small>+51 902815695</small></span>
        </a>
    </div>
    <div class="container-sm fondito">
        <div class="row">
            <div class="col-md-7">
                <img src="https://certificaciones.dmc.pe/suscripcion/assets/img/dpm-ldo/fondo-ldo-portada.png" width="100%" alt="">
            </div>
            <div class="col-md-4">
                <div class="row form">
                    <form method="post" id="form" name="form" action="controller/controller_suscripcion.php">
                        <input type="hidden" name="cursos" id="cursos" value="3234">
                        <input type="hidden" name="redirect" value="5">
                        <input type="hidden" name="atendido" id="atendido" value="0">
                        <input type="hidden" name="nomCapacitacion" id="nomCapacitacion" value="DIPLOMA LEAD DATA OFFICER">
                        <input type="hidden" name="brch" value="https://dmc.pe/producto/diploma-lead-data-officer/">
                        <div class="text-center title-pr">
                            <p>¡COMPLETA</p>
                            <p>TUS DATOS!</p>
                        </div>
                        <div class="text-center title-sc">
                            <p>Potencia tu perfil con nuevas</p>
                            <p>Competencias y destácate en el mercado</p>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombre" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="apPaterno" name="apPaterno" placeholder="Apellido Paterno" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="apMaterno" name="apMaterno" placeholder="Apellido Materno" required>
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control" id="celular" name="celular" placeholder="Celular" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="correo" name="correo" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="datos" name="datos" required>
                                <label class="form-check-label" for="datos">
                                    Acepto haber leído las <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color:#ec5456">politicas de privacidad</a>
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="checkInfo" name="publicidad" required>
                                <label class="form-check-label" for="checkInfo">
                                    Autorizo el envío de publicidad de información comercial
                                </label>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-sm" id="btnEnviar">Descargar brochure</button>
                        </div>


                    </form>
                </div>

            </div>

        </div>
    </div>
    <div class="container-sm">
        <div class="row">
            <div class="col-md-6" style="background-color: white;">
                <div class="    row justify-content-end">
                    <div class="col-8" style="padding-right: 40px;">
                        <div class="txt-title">Sobre el diploma</div>
                        <div style="    margin-bottom: 60px;
    font-size: 18px;
    color: #747474;
    text-align: justify;
">
                            El Diploma Lead Data Officer te permitirá
                            diseñar estrategias a partir de datos y
                            orquestar procesos, tecnología y personal
                            desde <b>cuatro perspectivas: liderazgo de
                                equipos, estrategia de datos, gestión
                                analítica avanzada, y gobierno y arquitectura
                                de datos.</b>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="background: #c3922d; color: white;">
                <div class="row">
                    <div class="col-9" style="margin-top: 40px;padding-left: 60px;">
                        <div class="icon-t">
                            <div>
                                <img src="https://certificaciones.dmc.pe/suscripcion/assets/img/dpm-ldo/inicio.svg" alt="" width="29">
                            </div>
                            <div class="tt">
                                Inicio: 29 de mayo,2024
                            </div>
                        </div>
                        <div class="icon-t">
                            <div>
                                <img src="https://certificaciones.dmc.pe/suscripcion/assets/img/dpm-ldo/duracion.svg" alt="" width="29">
                            </div>
                            <div class="tt">Duración: 03 meses</div>
                        </div>
                        <div class="icon-t">
                            <div>
                                <img src="https://certificaciones.dmc.pe/suscripcion/assets/img/dpm-ldo/horario.svg" alt="" width="29">
                            </div>
                            <div class="tt">
                                Horario: Lunes y miércoles de 7:30pm a 10:30 pm (GMT-5)
                            </div>
                        </div>
                        <div class="icon-t">
                            <div>
                                <img src="https://certificaciones.dmc.pe/suscripcion/assets/img/dpm-ldo/certificacion.svg" alt="" width="29">
                            </div>
                            <div class="tt">
                                <div style="font-weight: 700;">Certificación Internacional: Innovation</div>
                                <div>Management Proffesional Certificatio</div>
                                <div style="font-weight: 600;">Certiprof</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container-sm" style="background: #0c0e17;
    color: white;">
        <div class="text-center" style="font-size: 25px; padding-top: 34px; font-weight: bold; line-height: 1; color:#c1902c">¿Qué
            aprenderás en este diploma?</div>
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-top: 30px; padding-bottom: 35px;">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <ul class="ds">
                            <li>Fundamentos del liderazgo de equipos de
                                datos y sobre presentaciones efectivas
                                mediante la aplicación de storytelling</li>
                            <li>Estrategias de datos y sobre las técnicas
                                para su monetización.</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="ds">
                            <li>Técnicas de machine learning, las técnicas
                                avanzadas de data analytics y
                                management para la gestión de productos de datos.</li>
                            <li>Gobierno y arquitectura de datos como soporte a
                                la estrategia corporativa.</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container-sm" style="background-color: white;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row justify-content-center">
                    <div class="col-8" style="text-align: center;margin-bottom: 35px;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="txt-ns">¿Por qué DMC?</div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card-sp">
                                            <img src="https://certificaciones.dmc.pe/suscripcion/assets/img/dpm-ldo/docentes-lideres.svg" width="55">
                                            <div class="cnt">
                                                <div>Docentes</div>
                                                <div>líderes</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-sp">
                                            <img src="https://certificaciones.dmc.pe/suscripcion/assets/img/dpm-ldo/portafolio-especializado.svg" width="55">
                                            <div class="cnt">
                                                <div>Portafolio</div>
                                                <div>especializado</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card-sp" style="justify-content: center;">
                                            <img src="https://certificaciones.dmc.pe/suscripcion/assets/img/dpm-ldo/metodologia-innovadora.svg" width="55">
                                            <div class="cnt">
                                                <div>Metodología</div>
                                                <div>innovadora</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-sp">
                                            <img src="https://certificaciones.dmc.pe/suscripcion/assets/img/dpm-ldo/reconocimiento-empresarial.svg" width="55">
                                            <div class="cnt">
                                                <div>Reconocimiento</div>
                                                <div>empresarial</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-sp">
                                            <img src="https://certificaciones.dmc.pe/suscripcion/assets/img/dpm-ldo/atencion-personalizada.svg" width="55">
                                            <div class="cnt">
                                                <div>Atención</div>
                                                <div>personalizada</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-6">
                                <img src="https://certificaciones.dmc.pe/suscripcion/assets/img/dpm-ldo/man-dmc.png" width="340">
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container-sm" style=" background: white; padding: 30px 45px; color: white; padding-bottom: 70px;">
        <div class="text-center" style="font-size: 40px;color:#c3922d">Plana Docente</div>
        <div class="wrapper">
            <div id="carouselExample" class="slider">

                <div>
                    <img width="160" src="https://certificaciones.dmc.pe/suscripcion/assets/img/dpm-ldo/doc/docente-02.png">
                </div>
                <div>
                    <img width="160" src="https://certificaciones.dmc.pe/suscripcion/assets/img/dpm-ldo/doc/docente-03.png">
                </div>
                <div>
                    <img width="160" src="https://certificaciones.dmc.pe/suscripcion/assets/img/dpm-ldo/doc/docente-04.png">
                </div>

                <div>
                    <img width="160" src="https://certificaciones.dmc.pe/suscripcion/assets/img/dpm-ldo/doc/docente-05.png ">
                </div>
                <div>
                    <img width="160" src="https://certificaciones.dmc.pe/suscripcion/assets/img/dpm-ldo/doc/docente-06.png">
                </div>
                <div>
                    <img width="160" src="https://certificaciones.dmc.pe/suscripcion/assets/img/dpm-ldo/doc/docente-07.png">
                </div>
                <div>
                    <img width="160" src="https://certificaciones.dmc.pe/suscripcion/assets/img/dpm-ldo/doc/docente-08.png ">
                </div>
                <div>
                    <img width="160" src="https://certificaciones.dmc.pe/suscripcion/assets/img/dpm-ldo/doc/docente-09.png">
                </div>
            </div>
        </div>
    </div>
    <div class="container-sm bn" style="background: #c3922d;">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center" style="font-size: 25px;
            color: #003380;
            font-weight: bold;
            line-height: 1;
            /* display: list-item; */
            margin: 50px 0;">
                <div class="row justify-content-center">
                    <div class="col-md-8" style="color:white">
                        <div>Conoce los beneficios</div>
                        <div>de la clases virtuales</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="margin: 42px 0 ;font-weight: bold;">
                <div class="row justify-content-center">
                    <div class="col-8 bn" style="background: #b08429; padding-top: 15px; border-radius: 8px; color: #ede3ce;">
                        <div class="row">
                            <div class="col-md-6">
                                <ul style="font-size: 14px;">
                                    <li>Clases 100% en vivo</li>
                                    <li>Asesoría Académica</li>

                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul style="font-size: 14px;">

                                    <li>Plataforma E-learning</li>
                                    <li>Soporte técnico</li>
                                </ul>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-sm" style="background: black;">
        <div class="text-center">
            <a href="https://www.facebook.com/datamining.pe" target="_blank" class="icon-a"><img src="https://certificaciones.dmc.pe/suscripcion/assets/img/pea-ds/facebook.png" width="32" alt=""></a>
            <a href="https://www.instagram.com/dmc_peru/" target="_blank" class="icon-a"><img src="https://certificaciones.dmc.pe/suscripcion/assets/img/pea-ds/instagram.png" width="32" alt=""></a>
            <a href="https://api.whatsapp.com/send/?phone=%2B51960446568&text&type=phone_number&app_absent=0" target="_blank" class="icon-a"><img src="https://certificaciones.dmc.pe/suscripcion/assets/img/pea-ds/whatsapp.png" width="32" alt=""></a>
            <a href="https://www.youtube.com/@DMCPeru" target="_blank" class="icon-a"><img src="https://certificaciones.dmc.pe/suscripcion/assets/img/pea-ds/youtube.png" width="32" alt=""></a>
            <a href="https://www.linkedin.com/company/dmc-peru/?originalSubdomain=pe" target="_blank" class="icon-a"><img src="https://certificaciones.dmc.pe/suscripcion/assets/img/pea-ds/linkedin.png" width="32" alt=""></a>
        </div>
        <div class="text-center link">
            <div>DMC. 2024. Todos los derechos reservados</div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Términos y condiciones</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-justify">
                    De conformidad con la <a href="http://bit.ly/1FSjlb2" target="_blank" style="cursor:pointer;">Ley N° 29733</a>, Ley de Protección de Datos Personales, el usuario da su consentimiento para el tratamiento de
                    los datos personales que son facilitados en el presente formulario o por cualquier medio desde el momento de su ingreso o utilización
                    del portal. Asimismo, el usuario consiente que la Empresa Data Mining Consulting SAC pueda ceder estos datos a terceros para los
                    fines expuestos a continuación otros que crea conveniente.



                    Estos serán incorporados en el banco de datos de usuarios de Data Mining Consulting, para utilizarlos en envío de publicidad mediante
                    cualquier medio y soporte, envío de invitaciones a actividades convocadas por DMC o sus socios comerciales, para fines estadísticos,
                    gestiones institucionales y administrativas; y se mantendrán mientras sean útiles para que la Empresa pueda prestar y ofrecer sus
                    servicios y darles trámite.



                    El usuario podrá ejercer los derechos de acceso, rectificación, oposición y cancelación de los datos personales escribiendo a
                    capacitacion@dmc.pe o a la siguiente dirección Jr. Rio de la Plata 167. Of. 102.
                </div>

            </div>
        </div>
    </div>
    <!--<div class="modal fade in show" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-right: 17px; display: block;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-justify">

                    
                </div>
            </div>
        </div>
    </div>-->
</body>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
    $(document).ready(function() {
        $('.slider').slick({

            infinite: true,
            speed: 300,
            slidesToShow: 5,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        var formulario = document.getElementById('form');
        var boton = document.getElementById('btnEnviar');

        formulario.addEventListener('submit', function() {
            // Deshabilitar el botón al enviar el formulario
            boton.disabled = true;
        });
    });
</script>

</html>