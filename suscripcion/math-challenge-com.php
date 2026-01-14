<?php

$paises = file_get_contents("https://gist.githubusercontent.com/Yizack/bbfce31e0217a3689c8d961a356cb10d/raw/107e0bdf27918adea625410af0d340e8fc1cd5bf/countries.json");

$paises = json_decode($paises,TRUE);

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













<p>



  Hola, somos DMC Perú,

  la comunidad líder en el Perú vinculada a la analítica de datos. Estamos celebrando el Día de las Matemáticas (14 de marzo) con un Math Challenge con el que podrás poner a prueba tus conocimientos y a la vez ganar grandes promociones.

</p>











<hr>

<br>

	<form name="form" id="form" autocomplete="off">

  <input type="hidden" name="vendedor" value="<?=$usuario?>">





<!-- cambiado -->

                <p style="text-align:center"> <b>A) PREGUNTAS</b> </p>

                <label><b>1.	A un carpintero le pidieron construir un triángulo de madera con un ángulo de 37° y otro de 42°. ¿Cuántos grados mide el tercer ángulo?</b></label>

                <div class="form-check">

                  <input class="form-check-input seleccionados"  value="100°" type="radio" nombre_campo="<b> 1) Rpta:</b>  	100° <br> La suma de los lados de todo triángulo suman 180°" name="b1" id="b1_1"/>

                  <label class="form-check-label" for="b1_1"> 	100° </label>

                </div>

                <div class="form-check">

                  <input class="form-check-input seleccionados" value="102°" type="radio" nombre_campo="<b>1) Rpta:</b>  	102° <br> La suma de los lados de todo triángulo suman 180°" name="b1" id="b1_2" />

                  <label class="form-check-label" for="b1_2"> 	102° </label>

                </div>

                <div class="form-check">

                  <input class="form-check-input seleccionados" value="101°" type="radio" nombre_campo="<b>1) Rpta:</b>  	101°<br>La suma de los lados de todo triángulo suman 180°" name="b1" id="b1_3" />

                  <label class="form-check-label" for="b1_3"> 	101°</label>

                </div>

                <div class="form-check">

                  <input class="form-check-input seleccionados" value="103°" type="radio" nombre_campo="<b>1) Rpta:</b>  	103°<br> La suma de los lados de todo triángulo suman 180°" name="b1" id="b1_4" />

                  <label class="form-check-label" for="b1_4"> 	103° </label>

                </div>



                <!-- <label>Mas info: La suma de los lados de todo triángulo suman 180°</label> -->

                <br>



                <label><b>2.	¿Quién es el padre de las matemáticas?</b></label>

                <div class="form-check">

                  <input class="form-check-input seleccionados" value="Galileo" type="radio" nombre_campo="<b>2) Rpta:</b> 	Galileo<br>A menudo se considera a Tales de Mileto como el padre de las matemáticas. Tales fue un filósofo, matemático y astrónomo

                  griego que vivió en el siglo VI  Es conocido por su trabajo en geometría, particularmente por su teorema sobre los triángulos semejantes, y por su capacidad para predecir eclipses solares." name="b2" id="b2_1"/>

                  <label class="form-check-label" for="b2_1"> 	Galileo </label>

                </div>

                <div class="form-check">

                  <input class="form-check-input seleccionados" value="Tales de Mileto" type="radio" nombre_campo="<b>2) Rpta:</b> 	Tales de Mileto<br> A menudo se considera a Tales de Mileto como el padre de las matemáticas. Tales fue un filósofo, matemático y astrónomo

                  griego que vivió en el siglo VI  Es conocido por su trabajo en geometría, particularmente por su teorema sobre los triángulos semejantes, y por su capacidad para predecir eclipses solares." name="b2" id="b2_2" />

                  <label class="form-check-label" for="b2_2"> 	Tales de Mileto </label>

                </div>

                <div class="form-check">

                  <input class="form-check-input seleccionados" value="Copernico" type="radio" nombre_campo="<b>2) Rpta:</b> 	Copernico<br>A menudo se considera a Tales de Mileto como el padre de las matemáticas. Tales fue un filósofo, matemático y astrónomo

                  griego que vivió en el siglo VI  Es conocido por su trabajo en geometría, particularmente por su teorema sobre los triángulos semejantes, y por su capacidad para predecir eclipses solares."  name="b2" id="b2_3" />

                  <label class="form-check-label" for="b2_3"> 	Copernico</label>

                </div>

                <div class="form-check">

                  <input class="form-check-input seleccionados" value="Arquímedes" type="radio" nombre_campo="<b>2) Rpta:</b> 	Arquímedes<br>A menudo se considera a Tales de Mileto como el padre de las matemáticas. Tales fue un filósofo, matemático y astrónomo

                  griego que vivió en el siglo VI  Es conocido por su trabajo en geometría, particularmente por su teorema sobre los triángulos semejantes, y por su capacidad para predecir eclipses solares. " name="b2" id="b2_4" />

                  <label class="form-check-label" for="b2_4"> 	Arquímedes</label>

                </div>



                <br>



                <label><b>3.	¿Qué cuerpo geométrico se forma con la siguiente imagen?</b></label>



                <div  >

                     <img class="h-log2" src="../img/p3.png"  width="15%" >



               </div>





                <div class="form-check">

                  <input class="form-check-input seleccionados" value="Prisma" type="radio" nombre_campo="<b>3) Rpta:</b> 	Prisma" name="b3" id="b3_1"/>

                  <label class="form-check-label" for="b3_1"> 	Prisma </label>

                </div>

                <div class="form-check">

                  <input class="form-check-input seleccionados" value="Esfera" type="radio" nombre_campo="<b>3) Rpta:</b> 	Esfera" name="b3" id="b3_2" />

                  <label class="form-check-label" for="b3_2"> 	Esfera</label>

                </div>

                <div class="form-check">

                  <input class="form-check-input seleccionados" value="Pirámide" type="radio" nombre_campo="<b>3) Rpta:</b> 	Pirámide" name="b3" id="b3_3" />

                  <label class="form-check-label" for="b3_3">	Pirámide</label>

                </div>

                <div class="form-check">

                  <input class="form-check-input seleccionados" value="Cilindro" type="radio" nombre_campo="<b>3) Rpta:</b> 	Cilindro." name="b3" id="b3_4" />

                  <label class="form-check-label" for="b3_4"> 	Cilindro.</label>

                </div>





                <br>



                <label><b>4.	¿Cuántos decimales tiene el número pi π?</b></label>

                <div class="form-check">

                  <input class="form-check-input seleccionados" value="Dos" type="radio" nombre_campo="<b>4) Rpta:</b> 	Dos<br>A lo largo del tiempo, varios estudiosos se han dedicado a calcular el número π y

                   aún no han llegado al final. Para el 2019 se habían calculado más de 31 billones de decimales." name="b4" id="b4_1"/>

                  <label class="form-check-label" for="b4_1">	Dos </label>

                </div>

                <div class="form-check">

                  <input class="form-check-input seleccionados" value="Cien" type="radio" nombre_campo="<b> 4) Rpta:</b> 	Cien<br>A lo largo del tiempo, varios estudiosos se han dedicado a calcular el número π y

                   aún no han llegado al final. Para el 2019 se habían calculado más de 31 billones de decimales." name="b4" id="b4_2" />

                  <label class="form-check-label" for="b4_2">	Cien</label>

                </div>

                <div class="form-check">

                  <input class="form-check-input seleccionados" value="Infinitos" type="radio" nombre_campo="<b>4) Rpta:</b> 	Cien<br>A lo largo del tiempo, varios estudiosos se han dedicado a calcular el número π y

                   aún no han llegado al final. Para el 2019 se habían calculado más de 31 billones de decimales." name="b4" id="b4_3" />

                  <label class="form-check-label" for="b4_3">	Infinitos</label>

                </div>

                <div class="form-check">

                  <input class="form-check-input seleccionados" value="Mil" type="radio" nombre_campo="<b> 4) Rpta:</b> 	Mil<br>A lo largo del tiempo, varios estudiosos se han dedicado a calcular el número π y

                   aún no han llegado al final. Para el 2019 se habían calculado más de 31 billones de decimales." name="b4" id="b4_4" />

                  <label class="form-check-label" for="b4_4">	Mil</label>

                </div>

                <div class="form-check">

                  <input class="form-check-input seleccionados" value="Veinte" type="radio" nombre_campo="<b>4) Rpta:</b> 	Veinte<br>A lo largo del tiempo, varios estudiosos se han dedicado a calcular el número π y

                   aún no han llegado al final. Para el 2019 se habían calculado más de 31 billones de decimales." name="b4" id="b4_5" />

                  <label class="form-check-label" for="b4_5">	Veinte</label>

                </div>







<br>



<label><b>5.	¿Qué expresa esta fórmula? e = mc²?</b></label>

<div class="form-check">

  <input class="form-check-input seleccionados" value="Circunferencia de un círculo" type="radio" nombre_campo="<b>5) Rpta:</b> 	Circunferencia de un círculo<br>

  Es conocida como la "relación de equivalencia masa-energía" y fue propuesta por Albert Einstein en su teoría de la relatividad especial en 1905. La fórmula establece que la energía (e) contenida en un objeto es igual a su masa (m) multiplicada por la velocidad de la luz al cuadrado (c²)" name="b5" id="b5_1"/>

  <label class="form-check-label" for="b5_1">	Circunferencia de un círculo </label>

</div>

<div class="form-check">

  <input class="form-check-input seleccionados" value="La teoría de la probabilidad" type="radio" nombre_campo="<b>5) Rpta:</b> 	La teoría de la probabilidad<br>

  Es conocida como la "relación de equivalencia masa-energía" y fue propuesta por Albert Einstein en su teoría de la relatividad especial en 1905. La fórmula establece que la energía (e) contenida en un objeto es igual a su masa (m) multiplicada por la velocidad de la luz al cuadrado (c²)" name="b5" id="b5_2" />

  <label class="form-check-label" for="b5_2">	La teoría de la probabilidad</label>

</div>

<div class="form-check">

  <input class="form-check-input seleccionados" value="La relación entre masa y energía" type="radio" nombre_campo="<b>5) Rpta:</b>	La relación entre masa y energía<br>

  Es conocida como la "relación de equivalencia masa-energía" y fue propuesta por Albert Einstein en su teoría de la relatividad especial en 1905. La fórmula establece que la energía (e) contenida en un objeto es igual a su masa (m) multiplicada por la velocidad de la luz al cuadrado (c²)" name="b5" id="b5_3" />

  <label class="form-check-label" for="b5_3">	La relación entre masa y energía </label>

</div>

<div class="form-check">

  <input class="form-check-input seleccionados" value="Volumen de un cubo" type="radio" nombre_campo="<b>5) Rpta:</b> 	Volumen de un cubo<br>

  Es conocida como la "relación de equivalencia masa-energía" y fue propuesta por Albert Einstein en su teoría de la relatividad especial en 1905. La fórmula establece que la energía (e) contenida en un objeto es igual a su masa (m) multiplicada por la velocidad de la luz al cuadrado (c²)" name="b5" id="b5_4" />

  <label class="form-check-label" for="b5_4">	Volumen de un cubo</label>

</div>





<br>



<label><b>6.	¿Cuánto tiempo tarda la luz del Sol en llegar a la Tierra?</b></label>

<div class="form-check">

  <input class="form-check-input seleccionados" value="minutos" type="radio" nombre_campo="<b>6) Rpta:</b> 	12 minutos

  <br> A lo largo del tiempo, varios estudiosos se han dedicado a calcular el número π y aún no han llegado al final. Para el 2019 se habían calculado más de 31 billones de decimales." name="b6" id="b6_1"/>

  <label class="form-check-label" for="b6_1">	12 minutos</label>

</div>

<div class="form-check">

  <input class="form-check-input seleccionados" value="1 día" type="radio" nombre_campo="<b>6) Rpta:</b> 	1 día

    <br> A lo largo del tiempo, varios estudiosos se han dedicado a calcular el número π y aún no han llegado al final. Para el 2019 se habían calculado más de 31 billones de decimales." name="b6" id="b6_2" />

  <label class="form-check-label" for="b6_2">	1 día</label>

</div>

<div class="form-check">

  <input class="form-check-input seleccionados" value="12 horas" type="radio" nombre_campo="<b>6) Rpta:</b>	12 horas

    <br> A lo largo del tiempo, varios estudiosos se han dedicado a calcular el número π y aún no han llegado al final. Para el 2019 se habían calculado más de 31 billones de decimales." name="b6" id="b6_3" />

  <label class="form-check-label" for="b6_3"> 	12 horas</label>

</div>

<div class="form-check">

  <input class="form-check-input seleccionados" value="8 minutos" type="radio" nombre_campo="<b>6) Rpta:</b> 	8 minutos

    <br> A lo largo del tiempo, varios estudiosos se han dedicado a calcular el número π y aún no han llegado al final. Para el 2019 se habían calculado más de 31 billones de decimales." name="b6" id="b6_4" />

  <label class="form-check-label" for="b6_4">	8 minutos</label>

</div>

<div class="form-check">

  <input class="form-check-input seleccionados" value="8 segundos" type="radio" nombre_campo="<b>6) Rpta:</b> 	8 segundos

    <br> A lo largo del tiempo, varios estudiosos se han dedicado a calcular el número π y aún no han llegado al final. Para el 2019 se habían calculado más de 31 billones de decimales." name="b6" id="b6_5" />

  <label class="form-check-label" for="b6_5">	8 segundos</label>

</div>





<br>



<label><b>7.	Un señor nació en el año 1959 y se casó a los 34 años, 3 años después nació su hija y cuando su hija tenía 36 años falleció. ¿En qué año murió el señor?</b></label>

<div class="form-check">

  <input class="form-check-input seleccionados" nombre_campo="<b>7) Rpta:</b> 	2032

  <br>El señor nació en 1959, se casó cuando tenía 34 años, es decir se casó en 1993; su hija nació 3 años después, es decir en el año 1996; y cuando su hija tenía 36 años falleció es decir 1996 + 36 = 2032." value="2032" type="radio" name="b7" id="b7_1"/>

  <label class="form-check-label" for="b7_1">	2032</label>

</div>

<div class="form-check">

  <input class="form-check-input seleccionados" nombre_campo="<b>7) Rpta:</b>  2029

  <br>El señor nació en 1959, se casó cuando tenía 34 años, es decir se casó en 1993; su hija nació 3 años después, es decir en el año 1996; y cuando su hija tenía 36 años falleció es decir 1996 + 36 = 2032." value="2029" type="radio" name="b7" id="b7_2" />

  <label class="form-check-label"  for="b7_2"> 2029</label>

</div>

<div class="form-check">

  <input class="form-check-input seleccionados" nombre_campo="<b>7) Rpta:</b>  2031

  <br>El señor nació en 1959, se casó cuando tenía 34 años, es decir se casó en 1993; su hija nació 3 años después, es decir en el año 1996; y cuando su hija tenía 36 años falleció es decir 1996 + 36 = 2032." value="2031" type="radio" name="b7" id="b7_3" />

  <label class="form-check-label" for="b7_3">  2031</label>

</div>

<div class="form-check">

  <input class="form-check-input seleccionados" nombre_campo="<b>7) Rpta:</b> 	2030

  <br>El señor nació en 1959, se casó cuando tenía 34 años, es decir se casó en 1993; su hija nació 3 años después, es decir en el año 1996; y cuando su hija tenía 36 años falleció es decir 1996 + 36 = 2032." value="2030" type="radio" name="b7" id="b7_4" />

  <label class="form-check-label" for="b7_4">	2030</label>

</div>









<br>



<label><b>8.	¿A quién se conoce como "la calculadora humana"?</b></label>

<div class="form-check">

  <input class="form-check-input seleccionados" nombre_campo="<b>8) Rpta:</b> 	Alan Turing

  <br>Katherine G. Johnson (1918-2020) fue la matemática estadounidense responsable de los cálculos para sincronizar el Módulo Lunar del Proyecto Apolo con el Módulo de Comando y Servicio en órbita lunar." value="Alan Turing" type="radio" name="b8" id="b8_1"/>

  <label class="form-check-label" for="b8_1">	Alan Turing</label>

</div>

<div class="form-check">

  <input class="form-check-input seleccionados" nombre_campo="<b>8) Rpta:</b> 	James Maxwell

  <br>Katherine G. Johnson (1918-2020) fue la matemática estadounidense responsable de los cálculos para sincronizar el Módulo Lunar del Proyecto Apolo con el Módulo de Comando y Servicio en órbita lunar." value="James Maxwell" type="radio" name="b8" id="b8_2" />

  <label class="form-check-label" for="b8_2">	James Maxwell</label>

</div>

<div class="form-check">

  <input class="form-check-input seleccionados" nombre_campo="<b>8) Rpta:</b> 	Srinivasa Ramanujan

  <br>Katherine G. Johnson (1918-2020) fue la matemática estadounidense responsable de los cálculos para sincronizar el Módulo Lunar del Proyecto Apolo con el Módulo de Comando y Servicio en órbita lunar." value="Srinivasa Ramanujan" type="radio" name="b8" id="b8_3" />

  <label class="form-check-label" for="b8_3"> 	Srinivasa Ramanujan</label>

</div>

<div class="form-check">

  <input class="form-check-input seleccionados" nombre_campo="<b>8) Rpta:</b> 	Katherine G. Johnson

  <br>Katherine G. Johnson (1918-2020) fue la matemática estadounidense responsable de los cálculos para sincronizar el Módulo Lunar del Proyecto Apolo con el Módulo de Comando y Servicio en órbita lunar." value="Katherine G. Johnson" type="radio" name="b8" id="b8_4" />

  <label class="form-check-label" for="b8_4">	Katherine G. Johnson</label>

</div>





<br>



<label><b>9.	 La suma de los cuadrados de los catetos es igual al cuadrado de la hipotenusa . Es el teorema de:</b></label>

<div class="form-check">

  <input class="form-check-input seleccionados" nombre_campo="<b>9) Rpta:</b> 	Tales

  <br>En matemáticas, el teorema de Pitágoras es una relación en geometría euclidiana entre los tres lados de un triángulo rectángulo. Afirma que el área del cuadrado cuyo lado es la hipotenusa (el lado opuesto al ángulo recto) es igual a la suma de las áreas

  de los cuadrados cuyos lados son los catetos (los otros dos lados que no son la hipotenusa). Este teorema se puede escribir como una ecuación que relaciona las longitudes de los lados 'a', 'b' y 'c'. Es la proposición más conocida entre las que tienen nombre propio en la matemática ." value="Tales" type="radio" name="b9" id="b9_1"/>

  <label class="form-check-label" for="b9_1">	Tales.</label>

</div>

<div class="form-check">

  <input class="form-check-input seleccionados" nombre_campo="<b>9) Rpta:</b> 	Euler.

  <br>En matemáticas, el teorema de Pitágoras es una relación en geometría euclidiana entre los tres lados de un triángulo rectángulo. Afirma que el área del cuadrado cuyo lado es la hipotenusa (el lado opuesto al ángulo recto) es igual a la suma de las áreas

  de los cuadrados cuyos lados son los catetos (los otros dos lados que no son la hipotenusa). Este teorema se puede escribir como una ecuación que relaciona las longitudes de los lados 'a', 'b' y 'c'. Es la proposición más conocida entre las que tienen nombre propio en la matemática ." value="Euler" type="radio" name="b9" id="b9_2" />

  <label class="form-check-label" for="b9_2">	Euler.</label>

</div>

<div class="form-check">

  <input class="form-check-input seleccionados" nombre_campo="<b>9) Rpta:</b> 	Pitágoras.

  <br>En matemáticas, el teorema de Pitágoras es una relación en geometría euclidiana entre los tres lados de un triángulo rectángulo. Afirma que el área del cuadrado cuyo lado es la hipotenusa (el lado opuesto al ángulo recto) es igual a la suma de las áreas

  de los cuadrados cuyos lados son los catetos (los otros dos lados que no son la hipotenusa). Este teorema se puede escribir como una ecuación que relaciona las longitudes de los lados 'a', 'b' y 'c'. Es la proposición más conocida entre las que tienen nombre propio en la matemática ." value="Pitágoras" type="radio" name="b9" id="b9_3" />

  <label class="form-check-label" for="b9_3"> 	Pitágoras.</label>

</div>

<div class="form-check">

  <input class="form-check-input seleccionados" nombre_campo="<b>9) Rpta:</b> 	Ptolomeo

  <br>En matemáticas, el teorema de Pitágoras es una relación en geometría euclidiana entre los tres lados de un triángulo rectángulo. Afirma que el área del cuadrado cuyo lado es la hipotenusa (el lado opuesto al ángulo recto) es igual a la suma de las áreas

  de los cuadrados cuyos lados son los catetos (los otros dos lados que no son la hipotenusa). Este teorema se puede escribir como una ecuación que relaciona las longitudes de los lados 'a', 'b' y 'c'. Es la proposición más conocida entre las que tienen nombre propio en la matemática ." value="Ptolomeo" type="radio" name="b9" id="b9_4" />

  <label class="form-check-label" for="b9_4">	Ptolomeo.</label>

</div>







<br>



<label><b>10.	¿En qué distribución la media y la varianza son iguales?</b></label>

<div class="form-check">

  <input class="form-check-input seleccionados" nombre_campo="<b>10) Rpta:</b> 	Binomial

  <br>En teoría de probabilidad y estadística, la distribución de Poisson es una distribución de probabilidad discreta que expresa, a partir de una frecuencia de ocurrencia media, la probabilidad de que ocurra un determinado número de eventos

  durante cierto período de tiempo." value="Binomial" type="radio" name="b10" id="b10_1"/>

  <label class="form-check-label" for="b10_1">	Binomial</label>

</div>

<div class="form-check">

  <input class="form-check-input seleccionados" nombre_campo="<b>10) Rpta:</b> 	Poisson

  <br>En teoría de probabilidad y estadística, la distribución de Poisson es una distribución de probabilidad discreta que expresa, a partir de una frecuencia de ocurrencia media, la probabilidad de que ocurra un determinado número de eventos

  durante cierto período de tiempo." value="Poisson" type="radio" name="b10" id="b10_2" />

  <label class="form-check-label" for="b10_2">	Poisson</label>

</div>

<div class="form-check">

  <input class="form-check-input seleccionados" nombre_campo="<b>10) Rpta:</b> 	Normal

  <br>En teoría de probabilidad y estadística, la distribución de Poisson es una distribución de probabilidad discreta que expresa, a partir de una frecuencia de ocurrencia media, la probabilidad de que ocurra un determinado número de eventos

  durante cierto período de tiempo." value="Normal" type="radio" name="b10" id="b10_3" />

  <label class="form-check-label" for="b10_3">	Normal</label>

</div>

<div class="form-check">

  <input class="form-check-input seleccionados" nombre_campo="<b>10) Rpta:</b> 	Hipergeométrica

  <br>En teoría de probabilidad y estadística, la distribución de Poisson es una distribución de probabilidad discreta que expresa, a partir de una frecuencia de ocurrencia media, la probabilidad de que ocurra un determinado número de eventos

  durante cierto período de tiempo." value="Hipergeométrica" type="radio" name="b10" id="b10_4" />

  <label class="form-check-label" for="b10_4">	Hipergeométrica</label>

</div>



<!-- A -->

<p style="text-align:center"> <b>B) INFORMACIÓN GENERAL</b> </p>



<p>Déjanos tus datos de contacto para enviarte por correo el descuento obtenido:</p>

        <div class="form-row">



                  <div class="form-group col-md-6">

                    <label for="">1. Nombres:</label>

                        <input type="text" required  class="form-control" id="nombres"  name="nombres"  >

                    </div>





                      <div class="form-group col-md-6">

                        <label for="">2. Apellidos:</label>

                            <input type="text" required class="form-control" id="apellidos"  name="apellidos" >

                        </div>

        </div>

         <div class="form-row">



           <div class="form-group col-md-6">

             <label for=""> 3. Celular:</label>

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







        <!-- inicio registro exitoso -->

        <div id="exito" >

          <!-- <h2 style="text-align:center" >¡Gracias por participar de este Math Challenge!</h2> -->

<br> <p >


  ¡Hola!
  Gracias por tu interés, pero desafortunadamente ya se cerró la etapa de registros. Si accediste al descuento, estarás recibiendo un correo con todos los detalles. Recuerda revisar siempre tu bandeja de no deseados.

</p>




        </div>

        <!-- fin -->



        <div id="resumen" >









        </div>

    </div>



  		</div>





  	</div>



<!--  -->



    <? include_once "view/terminos.php"; ?>



<script type="text/javascript">



</script>



<script src="./assets/js/jquery.min.js"></script>

<script src="https://survey.dmc.pe/suscripcion/assets/js/popper.min.js"></script>

<script src="https://survey.dmc.pe/suscripcion/assets/js/bootstrap.min.js"></script>

<script type="text/javascript" src="https://survey.dmc.pe/suscripcion/assets/js/selectize.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="./assets/js/jquery.validate.min.js"></script>



<script type="text/javascript">



 function getIp(callback) {

 fetch('https://ipinfo.io/json?token=e41e88175aa564', { headers: { 'Accept': 'application/json' }})

 .then((resp) => resp.json())

 .catch(() => {

   return {

     country: 'us',

   };

 })

 .then((resp) => callback(resp.country));

 }







 const phoneInputField = document.querySelector("#phone");

 const phoneInput = window.intlTelInput(phoneInputField, {

 initialCountry: "auto",

 geoIpLookup: getIp,

 utilsScript:

 "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",

 });

// -------





$(document).ready(function(event)

{



  $(".selector").selectize({

    create: true

  });

// ocultar para terminar

   // $(".a10_otro").hide();
   //
   //     $('#exito').hide();
   //
   // $('#resumen').hide();



// activar para terminar

   $('#texto_inicial').hide();

    $(".banner_inicial").hide();

});









$('.b4_formacion').change(function(){

      if($(this).val() == 0){

        $(".a10_otro").show();

      }else {

        $(".a10_otro").hide();

      }

  });









$('#tDocumento').change(function(){



    var resultado = $('#tDocumento').val();



   if(resultado == 'DNI'){



$('#img').html('<span class="input-group-text" id="basic-addon1"> <img src="../img/peru.png" style="width:20px;height:20px;" > </span>');

}else {



$('#img').html('<span class="input-group-text" id="basic-addon1"> <img src="../img/mundo.png" style="width:20px;height:20px;" > </span>');

}

});



$(document).on('submit','#form',function(e){

  parametros = $(this).serialize();





  var  html = "";

  // alert( $('input[name=b1]:checked', '#form').val());

          var seleccionado = document.getElementsByClassName("seleccionados");

             for (let index = 1; index < seleccionado.length; index++) {

               const element_value = seleccionado[index].value;

               let attribute = seleccionado[index].getAttribute('nombre_campo');





               if ($(seleccionado[index]).is(":checked") && element_value != "" ) {





                 html += attribute+"<br><br>";

               }

             }

             // $('#resumen').html(`<h3 style="text-align:center" >

             // ¡Gracias por participar de este Math Challenge!</h3><p>Te enviamos el resultado de tu prueba al correo que nos brindaste,

             //  así como el descuento obtenido de acuerdo a tus respuestas correctas.</p>

             //  <p> Si quieres conocer el detalle de las respuestas, te dejamos el resumen aquí:</p>

             //  <div>${html}</div>

             //  `);

             $(".banner_inicial").hide();



  $.ajax({

        url:'../suscripcion/controller/controller_sorteoAniversario.php?op=registro_matematica_comerciales',

        type:'POST',

        data:parametros,

          beforeSend:function(){



                $('.btn-envia').prop("disabled", true) ;

                             Swal.fire({

                    title : "Procesando su registro",

                     text : "Espere un momento, por favor.",

                     showConfirmButton : false,

                    timer : 4000

                                })

                         },

        success:function(data){





   if (data == 'ok') {

    Swal.fire({

                    icon: 'success',



                    title: "¡Registrado!",

                    text: "",

                    showConfirmButton: true,

                    confirmButtonText: "Cerrar",

                    timer : 3000



                  })



                  $('#texto_inicial').hide();

                    $(".banner_inicial").hide();

                     $('#exito').show();

   }else {

     Swal.fire({

                   icon: 'error',

                    title: "¡Upps..!",

                    text: "Algo salio mal, Intentalo nuevamente",

                    showConfirmButton: true,

                    confirmButtonText: "Cerrar",

                    timer : 3000



                  })

   }







}

});

 e.preventDefault();

});

</script>



  </body>

</html>
