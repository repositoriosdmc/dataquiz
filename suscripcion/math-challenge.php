<?php

// $paises = file_get_contents("https://gist.githubusercontent.com/Yizack/bbfce31e0217a3689c8d961a356cb10d/raw/107e0bdf27918adea625410af0d340e8fc1cd5bf/countries.json");

// $paises = json_decode($paises,TRUE);



if($_SESSION["status"]=="ok"){

  header("Location: https://dmc.pe/");

}

if($_GET["usu"]){

  $usuario = $_GET["usu"];

}


 ?>

<!DOCTYPE html>

<html lang="es" >

  <head>

    <meta charset="utf-8">

    <title>DMC | Math Challenge </title>

    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  	<link rel="stylesheet" type="text/css" href="https://survey.dmc.pe/suscripcion/css/selectize.default_2.css">





<link rel="icon"  href="../img/1 (5).png" >







<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />





<!--  -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

       <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/alertify.min.js"></script>

       <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/css/alertify.min.css"/>

       <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/css/themes/default.min.css"/>

<!--  -->







 <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>



      <!-- Global site tag (gtag.js) - Google Analytics -->

  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-112204121-1"></script>



<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<style media="screen">

  .iti { width: 100%; }   /* para el phone */





table {

  font-family: arial, sans-serif;

  border-collapse: collapse;

  width: 100%;

}



td, th {

  border: 1px solid #dddddd;

  text-align: left;

  padding: 8px;

}







</style>

  </head>

  <body style="background-image: url('../img/fondo1.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: 100% 100%;">







    <div class="container">

  		<div class="row justify-content-md-center">



        <!-- <div class="col-md-8" style="text-align: center;padding: 35px 20px 20px">

             <img  src="../img/logo.png" alt="Responsive image" class="img-responsive" width="60%" >

            </div> -->

<br>

  			<div class="col-md-10" style="padding: 25px 35px; border: 1px solid #c8c7c7; margin: 15px 0; border-radius: 6px; box-shadow: 0px 1px 5px #dddddd;background: white;">

          <div class="banner_inicial" style="text-align: center;" >

               <img  src="../img/Portada_campana_mate.png"  width="95%" >





         </div>

<br>

<div id="texto_inicial">





<!-- A -->

<p style="text-align:center"> <b>B) INFORMACIÓN GENERAL</b> </p>





         <div class="form-row">



           <div class="form-group col-md-6">

             <label for=""> 3. Celular2:</label>

           <input type="text" class="form-control" required style="size: 100px;" id="phone" name="phone"   placeholder="">

             </div>



                              <div class="form-group col-md-6">

                                <label for="">4.  Email:</label>

                                    <input required type="email"  class="form-control"  id="mail" name="mail" >

                                </div>



        </div>



         <div class="form-row">





               <div class="form-group col-md-6">

                <label for="exampleFormControlInput1">5. Tipo de documento:</label>

                <div class="input-group mb-3">

                  <div class="input-group-prepend" id="img">

            <span class="input-group-text" id="basic-addon1"> <img src="../img/peru.png" style="width:20px;height:20px;" > </span>

                  </div>

                <select class="form-control valid"  id="tDocumento" name="tDocumento" >



                    <option value="DNI">DNI</option>

                    <option value="OTROS">OTROS </option>

                </select>





                </div>

              </div>



              <div class="form-group col-md-6">

                <label for="">6. N° Documento:</label>

              <input type="number" step="any" class="form-control"  id="nro_documento" name="nro_documento"  >

                </div>

        </div>



<hr>







<div class="form-check">

    <input class="form-check-input" required type="checkbox" value="1" id="datos1"  style="margin-top: 7px;">

    <label class="form-check-label" for="datos1">

      Acepto que DMC utilice mis datos para temas analíticos.

    </label>





</div>



<div class="form-check">

    <input class="form-check-input" required type="checkbox" value="1" id="datos" style="margin-top: 7px;">

    <label class="form-check-label" for="datos">

        He leído y acepto los <a href="#" data-toggle="modal" data-target="#myModal">términos y condiciones.</a>

    </label>







</div>

<br>

<div class="row">

                        <div class="col-md-12" >



                              <button type="submit" class="btn btn-primary btn-envia" id="button">Enviar</button>



                      </div>      </div>



  				</form>



  			</div>








  		</div>





  	</div>



<!--  -->



    <? include_once "view/terminos.php"; ?>





<script type="text/javascript">



 function getIp(callback) {

 fetch('https://ipinfo.io/json?token=e41e88175aa564', { headers: { 'Accept': 'application/json' }})
 .then((resp) => resp.json())
 .catch(() => {
  return {
    country: 'us',
  };
 })
 .then((resp) => {
  callback(resp.country);
  console.log(resp);
 });
}






 const phoneInputField = document.querySelector("#phone");

 const phoneInput = window.intlTelInput(phoneInputField, {

 initialCountry: "auto",

 geoIpLookup: getIp,

 utilsScript:

 "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",

 });

// -------






</script>



  </body>

</html>
