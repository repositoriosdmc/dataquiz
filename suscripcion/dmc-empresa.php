<?php

/*error_reporting(E_ALL);
ini_set('display_errors', '1');*/

//session_start();



require_once "dao/dao_suscripcion.php";

$suscripcion = new suscripcion();

$capacitacion = NULL;

$GtCapacitacion = $_GET['curso'];

$pbcd = 0;

$img = "https://certificaciones.dmc.pe/suscripcion/assets/img/datacohete.png";

if ($GtCapacitacion != "") {

    $capacitacion = $suscripcion->listado_cursoV3($GtCapacitacion);
}

if ($GtCapacitacion == "1403") {
    $img = "https://certificaciones.dmc.pe/suscripcion/assets/img/campaniaOctubre2023.jpg";
}


if ($_GET['fbclid'] != "") {

    $pbcd = 1;
}

$usuario = $_GET['usuario'];
if ($usuario != "") {

    $telefonoUsuario = $suscripcion->getCelularVendedor($usuario);
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMC - Consultas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://certificaciones.dmc.pe/suscripcion/assets/css/intlTelInput.min.css">
    <link rel="stylesheet" type="text/css" href="https://certificaciones.dmc.pe/suscripcion/assets/css/form.css">
    <link rel="stylesheet" type="text/css" href="https://certificaciones.dmc.pe/suscripcion/assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.bootstrap5.min.css" type="text/css">
    <style>
        .multiselect {
            margin-top: 10px;
        }

        .accordion {

            background: #848484;
            padding: 7px 8px;
            border-radius: 4px;
            color: white;
            cursor: pointer;

        }

        .accordion.sb {
            margin-left: 9px;
            border: 1px solid #848484 !important;
            background: white !important;
            color: #848484;
            margin-top: 7px;
            margin-bottom: 7px;
            font-size: 15px;
            text-align: center;
        }

        .multiselect label {
            text-align: left;
            display: block;
        }

        .arrow {
            border: solid black;
            border-width: 0 3px 3px 0;
            display: inline-block;
            padding: 3px;
        }

        .right {
            transform: rotate(-45deg);
            -webkit-transform: rotate(-45deg);
        }

        .left {
            transform: rotate(135deg);
            -webkit-transform: rotate(135deg);
        }

        .up {
            transform: rotate(-135deg);
            -webkit-transform: rotate(-135deg);
        }

        .down {
            transform: rotate(45deg);
            -webkit-transform: rotate(45deg);
        }

        .tpp {
            margin-left: 10px;
        }

        .selectBox {

            position: relative;
            padding-top: 10px;

        }

        .selectBox select {
            width: 100%;
            font-weight: normal;
        }

        .overSelect {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
        }

        #checkboxes {
            display: none;
        }

        #checkboxes label {
            text-align: left;
            display: block;
            padding-left: 5px;
            COLOR: #4d8fe3;
            cursor: pointer;
        }

        .at {
            text-align: left;
            margin-left: 10px;
            margin-top: 8px;
        }

        .bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn) {
            width: 100% !important;
        }


        .texto-capa {
            color: #2a7bb7;
            border: 2px solid transparent;
            border-left-color: #2A7BB8;
            padding-left: 7px;
            font-weight: bold;
            font-size: 13pt;
        }

        .logo {
            margin-top: 22px;
        }

        .texto-info {
            color: #808080;
            font-size: 11pt;
            margin-top: 11px;
        }

        @media only screen and (max-width: 800px) {

            .texto-capa {
                background: #2A7BB8;
                color: white;
                text-align: center;
                margin-left: -15px;
                margin-right: -15px;
                border: none;
                padding: 7px 0;
            }

            .banner {
                margin-left: 0 !important;
            }

            .cht {
                display: none;
            }

            .logo {
                text-align: center;
            }

            .texto-info {
                text-align: center;
                font-size: 9pt;
            }
        }
    </style>
    <!-- Matomo -->
    <script type="text/javascript">
        var _paq = _paq || [];
        /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
        _paq.push(['trackPageView']);
        _paq.push(['enableLinkTracking']);
        (function() {
            var u = "//www.peruanalitica.com/analytics/";
            _paq.push(['setTrackerUrl', u + 'piwik.php']);
            _paq.push(['setSiteId', '6']);
            var d = document,
                g = d.createElement('script'),
                s = d.getElementsByTagName('script')[0];
            g.type = 'text/javascript';
            g.async = true;
            g.defer = true;
            g.src = u + 'piwik.js';
            s.parentNode.insertBefore(g, s);
        })();
    </script>
</head>

<body style="background: #f1f1f1;">
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5" style="background: white;">
                    <!-- Banner -->
                    <div class="banner" style="background-color: white;text-align:left;margin-left: 20px;padding:0;margin-bottom:12px">
                        <!--<div class="slogan">#AprendeConLosPioneros</div>-->
                        <div class="logo">
                            <img src="https://certificaciones.dmc.pe/suscripcion/assets/img/logo-dmc.png" width="110" height="57" style="margin-top: 14px; margin-bottom: 10px;">
                        </div>
                        <?php if ($GtCapacitacion == 889) { ?>
                            <p class="texto-info">Por favor bríndanos tus datos para participar.</p>
                        <?php } else { ?>
                            <p class="texto-info">Por favor bríndanos tus datos para enviarte información sobre:</p>
                        <?php } ?>
                        <p class="texto-capa"><?= $capacitacion['nombre'] ?></p>
                    </div>


                    <!--  Condicional 2 ↓ -->

                    <div class="pasos" id="paso2">

                        <!-- Formulario -->
                        <div style="text-align: left; margin-top: 30px;">
                            <form id="form" name="form" method="POST" action="controller/controller_suscripcion.php">
                                <input type="hidden" name="cursos" id="cursos" value='<?= $capacitacion["id"] ?>'>
                                <input type="hidden" name="atendido" id="atendido" value="0">
                                <input type="hidden" name="celVendedor" id="celVendedor" value='<?=$telefonoUsuario ?>'>
                                <input type="hidden" name="numUsuario" id="numUsuario" value='<?=$usuario ?>'>
                                <input type="hidden" name="celular" id="celular" required>
                                <input type="hidden" name="nomCapacitacion" id="nomCapacitacion" value='<?= $capacitacion["nombre"] ?>'>
                                <input type="hidden" name="redirect" value="1">
                                <input type="hidden" name="pais" id="pais">
                                <input type="hidden" name="medio" id="medio" value="<?= $_GET['medio'] ?>">
                                <input type="hidden" name="pbcd" id="pbcd" value="<?= $pbcd ?>">
                                <input type="hidden" name="formato" id="formato" value="<?= $_GET['formato'] ?>">

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleFormControlInput1">Nombres</label>
                                        <input type="text" class="form-control" id="nombres" name="nombres" autofocus required placeholder="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleFormControlInput1">Apellidos</label>
                                        <input type="text" class="form-control" id="apellidos" name="apellidos" autofocus required placeholder="">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleFormControlInput1">Teléfono</label>
                                        <input type="text" class="form-control" id="phone" name="phone" autocomplete="on" required placeholder="">
                                        <label id="phone-error" class="error" for="phone" style="display: none;">Campo obligatorio</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleFormControlInput1">Email</label>
                                        <input type="email" class="form-control" id="correo" name="correo" required placeholder="">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="exampleFormControlInput1">Cargo</label>
                                        <input type="text" class="form-control" id="cargo" name="cargo" autocomplete="on" required placeholder="">
                                        <label id="phone-error" class="error" for="phone" style="display: none;">Campo obligatorio</label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleFormControlInput1">Edad</label>
                                        <input type="number" class="form-control" id="edad" name="edad" required placeholder="">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col">
                                        <label for="exampleFormControlInput1">Perfil de interés</label>
                                        <select class="form-control" id="perfil" name="perfil" required="">
                                            <option value="">Seleccione</option>
                                            <option value="DATA ANALYTICS">DATA ANALYTICS</option>
                                            <option value="DATA ENGINEER">DATA ENGINEER</option>
                                            <option value="DATA SCIENCE">DATA SCIENCE</option>
                                        </select>
                                    </div>

                                </div>



                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="datos" name="datos" required style="margin-top: 7px;">
                                    <label class="form-check-label" for="datos">
                                        He leído y acepto los <a href="#" data-toggle="modal" data-target="#myModal">términos y condiciones</a>
                                    </label>

                                    <div>
                                        <label id="datos-error" class="error" for="datos" style="display: none;">Campo obligatorio</label>
                                    </div>
                                </div>
                                <div style="margin-top: 25px;text-align: center;margin-bottom: 35px;">
                                    <button type="submit" class="boton" id="button">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--  Condicional 2 ↓ -->
                </div>
                <div class="col-md-5 cht" style="padding: 0;">
                    <img src="<?= $img ?>" width="100%" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <? include_once "view/terminos.php"; ?>
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/bootstrap-select.js"></script>
    <script src="./assets/js/detect.js"></script>
    <script src="./assets/js/intlTelInput.min.js"></script>
    <script src="./assets/js/utils.js"></script>
    <script src="./assets/js/bootstrap-select.js"></script>
    <script src="./assets/js/detect.js"></script>
    <script type="text/javascript">
        console.log(window.ui);



        mobile = window.ui.os == "Android" || window.ui.so == "iPhone" ? "Mobile" : "Desktop";

        selectView = window.ui.os == "Windows" && window.ui.browser == "Chrome" ? true : false;



        curso_id = $("#capacitacion_id").val();

        url = document.referrer == "" ? null : document.referrer;

        /*$.post("./ajax/visitasW.php", {

            dispositivo: mobile,
            navegador: window.ui.browser,
            so: window.ui.os,
            capacitacion_id: curso_id,
            url: url

        }, function(data) {

            console.log(data);

        });*/

        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }

        $('.multiselect .accordion:first').trigger("click");

        function selected_capacitacion() {
            var contenido = $('#capacitacion').find("option:selected").data('contenido');
            var id = $('#capacitacion').val();
            var celular = $('#capacitacion').find("option:selected").data('celular');
            var capacitacion = $('#capacitacion').find("option:selected").text();
            var otros_curso = "one-" + id;
            console.log(capacitacion);

            $('#contenido').text(contenido);
            //$('#contenido p').text(capacitacion);
            $('#cursos').val(id);
            $('#celVendedor').val(celular);
            $('#nomCapacitacion').val(capacitacion);


            $('.tpp input').removeAttr("onclick");
            console.log(otros_curso);
            $('#' + otros_curso).attr("onclick", "return false;");
            document.getElementById(otros_curso).checked = true;
        }

        function actualizacion_capacitacion() {

            var arr = [];

            $('.multiselect input:checkbox').filter(':checked').each(function() {
                arr.push($(this).val());
            });

            console.log(arr);

            $('#cursos').val(arr);


        }

        var expanded = false;

        /*function showCheckboxes() {
            
            var checkboxes = document.getElementByClass("TPP");

            if (!expanded) {
                checkboxes.style.display = "block";
                expanded = true;
            } else {
                checkboxes.style.display = "none";
                expanded = false;
            }

        }*/

        j = 0;

        var mobile = window.ui.os == "Android" || window.ui.so == "iPhone" ? "Mobile" : "Desktop";

        var url = document.referrer == "" ? null : document.referrer;

        var input = document.querySelector("#phone");

        var curso_id = $('#curso_id').val();

        var curso_ = $('#capacitacion_id').val();

        var curso = curso_ == undefined ? [] : curso_.split(",");



        if (curso.length > 0) {
            var sortBySelect = document.querySelector("#capacitacion");
            sortBySelect.value = curso;
            sortBySelect.dispatchEvent(new Event("change"));
            $('#capacitacion').val(curso).trigger("click");
            selected_capacitacion();
        }


        $.post("./ajax/visitasW.php", {

            dispositivo: mobile,
            navegador: window.ui.browser,
            so: window.ui.os,
            capacitacion_id: curso_id,
            url: url

        }, function(data) {

            console.log(data);

        });



        function detect_country() {

            var celular = $("#phone").val();

            if (celular) {

                var pais = $(".iti__selected-flag").attr("title").split(" ");

                var nombrePais = pais[0].replace(":", "");;

                var full_phone = iti.getNumber();

                $('#celular').val(full_phone);

                $('#pais').val(nombrePais);

                console.log(iti.isValidNumber());

            }

        }

        //$('#capacitacion').selectize();


        detect_country();

        $(document).ready(function() {

            $("#cInteres").selectize();

            if (selectView === true) {
                console.log("hola");

                $('#tDocumento').attr("class", "selectpicker");

                $('.selectpicker').selectpicker();

            }



            $('#phone').blur(detect_country).keyup(detect_country).keydown(detect_country);

            $('.selectBox').click(function() {

                var checkboxes = $(this).parent(".TPP");

                var expanded = checkboxes.data("expanded");

                if (!expanded) {

                    checkboxes.show();

                    checkboxes.data("expanded", true);

                } else {

                    checkboxes.hide();
                    checkboxes.data("expanded", false);

                }

            });

            $("#tDocumento").change(function() {

                var valor = $(this).val();

                var pais = $('#pais').val();

                if (valor == "DNI" && pais == "Peru") {

                    $("#num_documento").rules("remove", "pattern");

                    $("#num_documento").attr("pattern", "[0-9]{8}");

                    $("#num_documento").rules("add", {
                        "pattern": /^[0-9]{8}$/
                    });

                } else {

                    $("#num_documento").rules("remove", "pattern");

                    $('#num_documento').attr("pattern", "[a-zA-Z0-9]{7,50}");

                    $("#num_documento").rules("add", {
                        "pattern": /^[a-zA-Z0-9]{3,50}$/
                    });

                }

            });

            $('#capacitacion').on('change', selected_capacitacion);


            //var input = document.querySelector("#phone");

            $('#nombres').blur(function() {

                j++

                if (j === 1) {
                    iti = window.intlTelInput(input, {
                        initialCountry: "auto",
                        geoIpLookup: function(callback) {
                            $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {

                                var countryCode = (resp && resp.country) ? resp.country : "";

                                if (countryCode == "PE") {
                                    $('#pais').val("Peru");



                                    $('#tDocumento').val("DNI");

                                    if (selectView === true) {

                                        $('.selectpicker').selectpicker('refresh');
                                    }
                                }

                                detect_country()
                                callback(countryCode);
                            });
                        },
                    });
                }

            });





            $('.multiselect input:checkbox').click(function() {


                if ($('.multiselect input:checkbox').filter(':checked').length >= 3) {

                    $('#siguienteB').focus().trigger("click");



                }




            });

            jQuery.extend(jQuery.validator.messages, {
                required: "Campo obligatorio"
            });

            $.validator.addMethod("phoneInternational", function(value, element, param) {

                if (iti.isValidNumber()) {

                    return true;

                } else {

                    return false;

                }


            }, "Formato inválido");



            $.validator.addMethod("pattern", function(value, element, param) {

                if (this.optional(element)) {

                    return true;

                }

                if (typeof param === "string") {

                    param = new RegExp("^(?:" + param + ")$");

                }

                return param.test(value);

            }, "Formato inválido");

            $('#capaForm').validate({

                ignore: ':hidden',

                ignoreTitle: true,

                rules: {
                    capacitacion: true,
                    'capa[]': {
                        required: true,
                        maxlength: 3
                    }
                },
                messages: {
                    'capa[]': {
                        required: "Seleccione un curso",
                        maxlength: "Máximo se puede seleccionar 3 cursos"
                    }
                },

            });

            $('#form').validate({

                ignore: ':hidden',

                ignoreTitle: true,

                rules:

                {
                    'num_documento': {

                        required: true,
                        pattern: /^[0-9]{8}$/,

                    },

                    'correo': {

                        required: true,
                        pattern: /^\S+@\S+\.\S+$/

                    },

                    'nombres': {

                        required: true,
                        pattern: /^[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}$/

                    },

                    'cInteres[]': {

                        required: true

                    },

                    'phone': {

                        required: true,
                        phoneInternational: true,

                    },
                    'curso[]':

                    {
                        required: true
                    }

                }
            });

            function jquery_validation_focus() {

                validator = $("#form").validate({
                    invalidHandler: function() {
                        return validator.numberOfInvalids()
                    }
                });

                console.log(validator.errorList);

            }


            $("form").submit(function() {

                jquery_validation_focus();

                if ($("#form").valid() === true) {

                    var btn = $('#button');
                    btn.attr("disabled", "disabled");
                    btn.text("Enviando...");

                }

            });

        });
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-2LMTH0KY61"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-2LMTH0KY61');
    </script>


    <!-- Facebook Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1064200720291743');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" src="https://www.facebook.com/tr?id=1064200720291743&ev=PageView&noscript=1" />
    </noscript>
    <!-- End Facebook Pixel Code -->
    <!-- Hotjar Tracking Code for dmc.pe -->
    <!-- Hotjar Tracking Code for https://certificaciones.dmc.pe -->
    <script>
        (function(h, o, t, j, a, r) {
            h.hj = h.hj || function() {
                (h.hj.q = h.hj.q || []).push(arguments)
            };
            h._hjSettings = {
                hjid: 2819597,
                hjsv: 6
            };
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script');
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js" integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>