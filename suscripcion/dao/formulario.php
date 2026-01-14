
<?php

/*error_reporting(E_ALL);
ini_set('display_errors', '1');*/

session_start();

require_once "dao/dao_suscripcion.php";

$suscripcion=new suscripcion();

$curso =$suscripcion->listado_curso_power();

$concurso=$_GET["concurso"];

$GtCurso=$_GET['curso'];

if ($GtCurso) {

	$capacitacion_id=$suscripcion->obtener_capacitacion_id($GtCurso);

}

$especializacion = NULL;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMC - Consultas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://survey.dmc.pe/suscripcion/assets/css/intlTelInput.min.css">
    <link rel="stylesheet" type="text/css" href="https://survey.dmc.pe/suscripcion/assets/css/form.css">
    <style>
        .multiselect {
            margin-top:10px;
}

.accordion{

    background: #848484;
    padding: 7px 8px;
    border-radius: 4px;
    color: white;
    cursor: pointer;

}
.accordion.sb{
    margin-left: 9px;
    border: 1px solid #848484 !important;
    background: white !important;
    color: #848484;
    margin-top: 7px;
    margin-bottom: 7px;
    font-size: 15px;
}

.multiselect label{
	text-align: left;
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

.tpp{
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


    </style>
</head>
<body style="background: #f1f1f1;">
    <div>
        <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-4" style="background: white;">
                <!-- Banner -->
                <div class="banner">
                    <!--<div class="slogan">#AprendeConLosPioneros</div>-->
                    <div>
                        <img src="https://survey.dmc.pe/suscripcion/assets/img/power.png" width="100%" alt="">
                    </div>
                </div>
                <!--  Condicional 1 ↓ --> 
                <div class="pasos" id="paso1">
                    <!-- Paso 1↓ -->
                    <div>
                        <div class="primer-texto">
                            Paso 1:
                        </div>
                        <div class="segundo-texto">
                            - Elige un tema -
                        </div>
                        <div class="tercer-texto">
                            Hola, este formulario es para acceder a los contenidos relacionados al siguiente tema:
                        </div>
                    </div>
                    <!-- Capacitaciones↓ -->
                    <form id="capaForm" action="">
                        <?php if ($capacitacion_id>0): ?>
                            	<input type="hidden" name="capacitacion_id" id="capacitacion_id" value=<?=$capacitacion_id;?>>
                        <?php endif ?>
                        <input type="hidden" name="curso_id" id="curso_id" value=<?=$GtCurso;?>>
                        <div class="capacitacion">
                            <select name="capacitacion" id="capacitacion" required>
                                <option value="" data-celular="" data-contenido="">Seleccione ↓</option>
                                <? foreach ($curso as $key => $value) : ?>
                                    <option value='<?=$value["id"]?>' data-celular='<?=$value["celular"]?>' data-contenido='<?=$value["descripcion"]?>'>
                                        <?=$value['nombre']?> 	
                                    </option>
                                <? endforeach; ?>
                            </select>
                            <div class="contenido" id="contenido">
                                
                            </div>
                            <div class="tercer-texto" style="margin-top:30px;margin-bottom:20px">
                                También puedes seleccionar otros temas de tú interés.
                            </div>
                            <div>
                                <? foreach ($curso as $key => $value) :  $categoria = $value["categoria"]; $linea = $value["linea"];?>
                                    <? if($especializacion!=$categoria){ ?> 
                                        <div class="multiselect"> 
                                          
                                                <div class="accordion active" style="background:#848484;" onclick="return false;">
                                                    <?=$categoria?>
                                                    <i class="arrow down" style="border-color: white; margin-top: 7px; margin-right: 3px; float: right;"></i>
                                                </div>
                                                <div style="display: none;">
                                        <? } ?>
                                        <? if($herramienta!=$linea ){ ?> 
                                            <div class="accordion sb">
                                                <?=$linea?>
                                                <i class="arrow down" style="border-color: #848484; margin-top: 7px; margin-right: 1px; float: right;"></i>
                                            </div>
                                            <div id="checkboxes" class="tpp">
                                        <? $herramienta = $linea ;} ?>   
                                        <label for='one-<?=$value["id"]?>'>
                                            <input type="checkbox" id='one-<?=$value["id"]?>' value='<?=$value["id"]?>' name="capa"/>
                                            <?=$value['nombre']?> 
                                        </label>
                                    <? if($curso[$key+1]["linea"]!=$linea){ ?> 
                                        </div>
                                    <? } ?>
                                    <? if($curso[$key+1]["categoria"]!=$categoria){ ?> 
                                        </div></div>
                                    <? } $especializacion = $categoria ;?> 
                                <? endforeach; ?>
                            </div>
                            <label id="capacitacion-error" class="error" for="capacitacion" style="display: none;">Seleccione una opción</label>
                            <div style="margin-top: 45px;">
                                <button type="button" class="boton" id="siguiente">Siguiente</button>
                            </div>
                        
                        </div>
                    </form>
                </div>
                <!--  Condicional 2 ↓ -->

                <div class="pasos" id="paso2" style="display: none;">
                    <!-- Paso 2↓ -->
                    <div>
                        <div class="regresar">
                            <a href="#" id="regresar">← Regresar</a>
                        </div>
                        
                        <div class="primer-texto">
                            Paso 2:
                        </div>
                        <div class="segundo-texto">
                            - Registra tus datos -
                        </div>
                        <div class="tercer-texto">
                            Por favor bríndanos tus datos para enviarte toda la información:
                        </div>
                    </div>
                    <!-- Formulario -->
                    <div style="text-align: left; margin-top: 30px;">
                        <form id="form" name="form" method="POST" action="controller/controller_suscripcion.php">
                            <input type="hidden" name="cursos" id="cursos">
                            <input type="hidden" name="atendido" id="atendido" value="0">
                            <input type="hidden" name="celVendedor" id="celVendedor">
                            <input type="hidden" name="redirect" value ="1">
                            <input type="hidden" name="medio" id="medio" value="<?=$_GET['medio']?>">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nombres y Apellidos</label>
                                <input type="text" class="form-control" id="nombres" name="nombres"  required placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Teléfono</label>
                                <input type="text" class="form-control" id="phone" name="phone"  required placeholder="">
                                <label id="phone-error" class="error" for="phone" style="display: none;">Campo obligatorio</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Email</label>
                                <input type="email" class="form-control" id="correo" name="correo"  required placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Ciudad</label>
                                <input type="text" class="form-control" id="provincia" name="provincia"  required placeholder="">
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlInput1">Tipo de documento</label>
                                    <select class="form-control valid" id="tDocumento" name="tDocumento" required="">
                                        <option value="">Seleccione</option>
                                        <option value="DNI">DNI</option>
                                        <option value="OTROS">OTROS</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlInput1" style="text-align: center;display: inherit;">Nº</label>
                                    <input type="text" class="form-control" id="num_documento" name="num_documento"  required="">
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
                            <div style="margin-top: 15px;text-align: center;margin-bottom: 35px;">
                                <button type="submit" class="boton" id ="button">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--  Condicional 2 ↓ -->
                </div>
                
            </div>
        </div>
    </div>
    <!-- Modal -->
    <? include_once "view/terminos.php"; ?>
    <script src="https://survey.dmc.pe/suscripcion/assets/js/jquery.min.js"></script>
    <script src="https://survey.dmc.pe/suscripcion/assets/js/popper.min.js"></script>
    <script src="https://survey.dmc.pe/suscripcion/assets/js/bootstrap.min.js"></script>
    <script src="https://survey.dmc.pe/suscripcion/assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/detect.js"></script>
    <script src="https://survey.dmc.pe/suscripcion/assets/js/intlTelInput.min.js"></script>
    <script src="https://survey.dmc.pe/suscripcion/assets/js/utils.js"></script>
    <script type="text/javascript">

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

        function selected_capacitacion(){
            var contenido = $('#capacitacion').find("option:selected").data('contenido');
            var id = $('#capacitacion').val();
            var celular = $('#capacitacion').find("option:selected").data('celular');
            var otros_curso = "one-"+id;
            $('#contenido').text(contenido);
            $('#cursos').val(id);
            $('#celVendedor').val(celular);console.log("one-"+id);
            
            $('.tpp input').removeAttr("onclick"); console.log(otros_curso);
            $('#'+otros_curso).attr("onclick","return false;");
            document.getElementById(otros_curso).checked = true;
        }

        function actualizacion_capacitacion(){

            var arr = [];

            $("input:checkbox[name=capa]:checked").each(function(){
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

        j=0;

        var mobile = window.ui.os == "Android" ||  window.ui.so == "iPhone" ? "Mobile" : "Desktop" ;

        var url = document.referrer == "" ? null : document.referrer;

        var input = document.querySelector("#phone");

        var curso_id = $('#curso_id').val();

        var curso_=$('#capacitacion_id').val();

        var curso=curso_==undefined ? [] :curso_.split(",");



        if(curso.length>0){
            var sortBySelect = document.querySelector("#capacitacion"); 
            sortBySelect.value = curso; 
            sortBySelect.dispatchEvent(new Event("change"));
            $('#capacitacion').val(curso).trigger("click");
            selected_capacitacion();
        }


        $.post("./ajax/visitasW.php", {

            dispositivo : mobile,
            navegador : window.ui.browser,
            so: window.ui.os,
            capacitacion_id: curso_id,
            url: url

        },function(data){

            console.log(data);

        });

        

        function detect_country(){

            var celular = $("#phone").val();

            if(celular){

                var pais = $(".iti__selected-flag").attr("title").split(" ");

                var nombrePais = pais[0].replace(":", "");;

                var full_phone = iti.getNumber();

                $('#celular').val(full_phone);

                $('#pais').val(nombrePais);
  
                console.log(iti.isValidNumber());

            }
    
        }

        detect_country();

        $(document).ready(function(){

            $('.selectBox').click(function(){ 

                var checkboxes = $(this).parent(".TPP");console.log(checkboxes);

                var expanded = checkboxes.data("expanded");

                if (!expanded) {

                    checkboxes.show();
                    
                    checkboxes.data("expanded",true);

                } else {

                    checkboxes.hide();
                    checkboxes.data("expanded",false);

                }

            });

            $("#tDocumento").change(function(){

                var valor = $(this).val();

                var pais = $('#pais').val();

                if( valor == "DNI" && pais == "Peru" ){

                    $("#num_documento").rules( "remove" ,"pattern");

                    $("#num_documento").attr("pattern","[0-9]{8}");

                    $("#num_documento" ).rules( "add" ,{"pattern":/^[0-9]{8}$/});

                }else {

                    $( "#num_documento" ).rules( "remove" ,"pattern");

                    $('#num_documento').attr("pattern","[a-zA-Z0-9]{7,50}");

                    $("#num_documento" ).rules( "add" ,{"pattern":/^[a-zA-Z0-9]{7,50}$/});
                    
                }

            });

            $('#capacitacion').on('change', selected_capacitacion);

            $('#siguiente').click(function(){

                actualizacion_capacitacion();

                j++
 
                if($("#capaForm").valid()==true){
                    $('#paso1').hide();
                    $('#paso2').show();
                    $('#nombres').focus();
                }

                if(j===1){
                    iti = window.intlTelInput(input, {
                        initialCountry: "auto",
                        geoIpLookup: function(callback) {
                            $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {

                                var countryCode = (resp && resp.country) ? resp.country : "";

                                if(countryCode=="PE"){
                                    $('#pais').val("Peru");
                                    $('#tDocumento').val("DNI");
                                }
                                detect_country()
                                callback(countryCode);
                            });
                        },
                    });
                }
      
            });

            $('#regresar').click(function(){

                $('#paso1').show();
                $('#paso2').hide();

            });

            jQuery.extend(jQuery.validator.messages, {required: "Campo obligatorio"});

            $.validator.addMethod("phoneInternational", function(value, element, param) {

                if (iti.isValidNumber()) {

                  return true;

                }else{

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

                rules:
                {
                    capacitacion: true
                }

            });

            $('#form').validate({

                ignore: ':hidden', 

                ignoreTitle: true,

                rules:

                {
                    'num_documento':
                    {

                        required:true,
                        pattern:/^[0-9]{8}$/,

                    },

                    'correo':
                    {

                        required:true,
                        pattern: /^\S+@\S+\.\S+$/

                    },

                    'nombres':
                    {

                        required:true,
                        pattern:/^[A-Za-z\sÃÃ‰ÃÃ“ÃšÃ¡Ã©Ã­Ã³ÃºÃ‘Ã±]{2,}$/

                    },

                    'phone':
                    {

                        required:true,
                        phoneInternational:true,

                    },
                    'curso[]':

                    {
                        required:true
                    }

                }
            });

            function jquery_validation_focus(){

                validator = $("#form").validate({invalidHandler: function() { return validator.numberOfInvalids()}});

                console.log(validator.errorList);

            }


            $("form").submit(function() {

                jquery_validation_focus();

                if($("#form").valid()===true){

                var btn = $('#button');
                btn.attr("disabled","disabled");
                btn.text("Enviando...");

                }

            });

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
    <!-- Hotjar Tracking Code for dmc.pe -->
    <script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:1904810,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
</body>
</html>