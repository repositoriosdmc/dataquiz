<?php
// https://www.shanidkv.com/blog/font-awesome-icons-css-content-values
session_start();
if (!isset($_SESSION[ID])) {
header('location: ../suscripcion/inicio_formulario.php');
}
include "header.php";
include 'nav.php';
?>

<style media="screen">
* {
  margin: 0;
  padding: 0;
}

html {
  height: 100%;
}

/*Background color*/
#grad1 {
  /* background-color: #9C27B0; */

  /* background-image: linear-gradient(120deg, white, #1DA7FA); */
}

/*form styles*/
#msform {
  text-align: center;
  position: relative;
  margin-top: 20px;
}

#msform fieldset .form-card {

  background: white;
  border: 0 none;
  border-radius: 0px;
  box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
  padding: 20px 40px 30px 40px;
  box-sizing: border-box;
  width: 94%;
  margin: 0 3% 20px 3%;

  /*stacking fieldsets above each other*/
  position: relative;
}

#msform fieldset {
  background: white;
  border: 0 none;
  border-radius: 0.5rem;
  box-sizing: border-box;
  width: 100%;
  margin: 0;
  padding-bottom: 20px;

  /*stacking fieldsets above each other*/
  position: relative;
}

/*Hide all except first fieldset*/
#msform fieldset:not(:first-of-type) {
  display: none;
}

#msform fieldset .form-card {
  text-align: left;
  color: #9E9E9E;
}

#msform input, #msform textarea {
  padding: 0px 8px 4px 8px;
  border: none;
  border-bottom: 1px solid #ccc;
  border-radius: 0px;
  margin-bottom: 25px;
  margin-top: 2px;
  width: 100%;
  box-sizing: border-box;
  font-family: montserrat;
  color: #2C3E50;
  font-size: 16px;
  letter-spacing: 1px;
}

#msform input:focus, #msform textarea:focus {
  -moz-box-shadow: none !important;
  -webkit-box-shadow: none !important;
  box-shadow: none !important;
  border: none;
  font-weight: bold;
  border-bottom: 2px solid skyblue;
  outline-width: 0;
}

/*Blue Buttons*/
#msform .action-button {
  width: 100px;
  background: skyblue;
  font-weight: bold;
  color: white;
  border: 0 none;
  border-radius: 0px;
  cursor: pointer;
  padding: 10px 5px;
  margin: 10px 5px;
}

/*boton verde confirmacion*/
#msform .boton-confirmacion {
  width: 100px;
  background: green;
  font-weight: bold;
  color: white;
  border: 0 none;
  border-radius: 0px;
  cursor: pointer;
  padding: 10px 5px;
  margin: 10px 5px;
}

#msform .action-button:hover, #msform .action-button:focus {
  box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue;
}

/*Previous Buttons*/
#msform .action-button-previous {
  width: 100px;
  background: #616161;
  font-weight: bold;
  color: white;
  border: 0 none;
  border-radius: 0px;
  cursor: pointer;
  padding: 10px 5px;
  margin: 10px 5px;
}

#msform .action-button-previous:hover, #msform .action-button-previous:focus {
  box-shadow: 0 0 0 2px white, 0 0 0 3px #616161;
}

/*Dropdown List Exp Date*/
select.list-dt {
  border: none;
  outline: 0;
  border-bottom: 1px solid #ccc;
  padding: 2px 5px 3px 5px;
  margin: 2px;
}

select.list-dt:focus {
  border-bottom: 2px solid skyblue;
}

/*The background card*/
.card {
  z-index: 0;

  border-radius: 0.5rem;
  position: relative;
  /* border-color: #000;;
   border-width: 1px;
   border-style: solid; */
   background: linear-gradient(left, #f00, #f80, #ff0, #0f0, #00f, #60f, #c0f);

}

/*FieldSet headings*/
.fs-title {
  font-size: 25px;
  color: #2C3E50;
  margin-bottom: 10px;
  font-weight: bold;
  text-align: left;
}

/*progressbar*/
#progressbar {
  margin-bottom: 30px;
  overflow: hidden;
  color: lightgrey;
}

#progressbar .active {
  color: #000000;
}

#progressbar li {
  list-style-type: none;
  font-size: 12px;
  width: 25%;
  float: left;
  position: relative;
}

/*Icons in the ProgressBar*/
#progressbar #account:before {
  font-family: FontAwesome;
  content: "\f02d";
}

#progressbar #personal:before {
  font-family: FontAwesome;
  content: "\f007";
}

#progressbar #payment:before {
  font-family: FontAwesome;
  content: "\f0ee";
}

#progressbar #confirm:before {
  font-family: FontAwesome;
  content: "\f00c";
}

/*ProgressBar before any progress*/
#progressbar li:before {
  width: 50px;
  height: 50px;
  line-height: 45px;
  display: block;
  font-size: 18px;
  color: #ffffff;
  background: lightgray;
  border-radius: 50%;
  margin: 0 auto 10px auto;
  padding: 2px;
}

/*ProgressBar connectors*/
#progressbar li:after {
  content: '';
  width: 100%;
  height: 2px;
  background: lightgray;
  position: absolute;
  left: 0;
  top: 25px;
  z-index: -1;
}

/*Color number of the step and the connector before it*/
#progressbar li.active:before, #progressbar li.active:after {
  background: skyblue;
}

/*Imaged Radio Buttons*/
.radio-group {
  position: relative;
  margin-bottom: 25px;
}

.radio {
  display:inline-block;
  width: 204;
  height: 104;
  border-radius: 0;
  background: lightblue;
  box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
  box-sizing: border-box;
  cursor:pointer;
  margin: 8px 2px;
}

.radio:hover {
  box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3);
}

.radio.selected {
  box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1);
}

/*Fit image in bootstrap div*/
.fit-image{
  width: 100%;
  object-fit: cover;
}
</style>

<div class="div_contenido">



<div class="contenedor" style="text-align:center">

<div class="texto_inicio row justify-content-center mt-0 ">
  <div  class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">

        <h2><strong>Prueba de Aptitud DMC - Data Science Fundamentals (Edición Online - IV)</strong></h2>

        <div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Importante!</h4>
  <p>El tiempo de duración es de 1 hora, al término se cerrará el formulario</p>
</div>

</div></div>

<!--  -->



</div>

<div class="div_tiempo" style="text-align:center">
  <h1><strong>Tiempo: <span id="Tiempo" >01:00:00</span>  </strong> </h1>

  <input type="button" class="boton" id="inicio" value="Comenzar &#9658;" onclick="inicio();">
</div>


<!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
<br>

  <hr>
    <div class="row justify-content-center mt-0">
        <div  class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
            <div  class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2><strong>PEA Advanced Data Science </strong></h2>
                <p>DMC Perú</p>
                <div class="row">
                    <div  class="col-md-12 mx-0">
                        <form id="msform" autocomplete="off"  enctype="multipart/form-data">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Preguntas</strong></li>
                                <li id="personal"><strong>Detalles</strong></li>
                                <li id="payment"><strong>Archivos</strong></li>
                                <li id="confirm"><strong>Final</strong></li>
                            </ul>
                            <!-- fieldsets -->
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Información </h2>

                                          <label class="pay">1. Es una Variable Cualitativa Ordinal:</label>

                                                    <div class="form-group">

                                                      <div class="custom-control custom-radio">
                                                        <input type="radio" id="radio1_1" name="pregunta1" value="Sexo" class="custom-control-input">
                                                        <label class="custom-control-label" for="radio1_1">Sexo</label>
                                                      </div>
                                                      <div class="custom-control custom-radio">
                                                        <input type="radio" id="radio1_2" name="pregunta1" value="Nº de muelas cariadas" class="custom-control-input">
                                                        <label class="custom-control-label" for="radio1_2">  Nº de muelas cariadas</label>
                                                      </div>

                                                      <div class="custom-control custom-radio">
                                                        <input type="radio" id="radio1_3" name="pregunta1" value="Edad en rangos" class="custom-control-input">
                                                        <label class="custom-control-label" for="radio1_3">   Edad en rangos</label>
                                                      </div>

                                                      <div class="custom-control custom-radio">
                                                        <input type="radio" id="radio1_4" name="pregunta1" value="Temperatura corporal" class="custom-control-input">
                                                        <label class="custom-control-label" for="radio1_4"> Temperatura corporal</label>
                                                      </div>

                                                      <div class="custom-control custom-radio">
                                                        <input type="radio" id="radio1_5" name="pregunta1" value="Raza (blanca, negra, amarilla)." class="custom-control-input">
                                                        <label class="custom-control-label" for="radio1_5"> Raza (blanca, negra, amarilla).</label>
                                                      </div>
                                                    </div>

  <label class="pay">2. Es una Variable Cuantitativa Continua:</label>
                                                    <div class="form-group">

                                                      <div class="custom-control custom-radio">
                                                        <input type="radio" id="radio2_1" name="pregunta2" value="Sexo" class="custom-control-input">
                                                        <label class="custom-control-label" for="radio2_1">Sexo</label>
                                                      </div>
                                                      <div class="custom-control custom-radio">
                                                        <input type="radio" id="radio2_2" name="pregunta2" value="Nº de muelas cariadas" class="custom-control-input">
                                                        <label class="custom-control-label" for="radio2_2">  Nº de muelas cariadas</label>
                                                      </div>

                                                      <div class="custom-control custom-radio">
                                                        <input type="radio" id="radio2_3" name="pregunta2" value="Edad en rangos" class="custom-control-input">
                                                        <label class="custom-control-label" for="radio2_3">   Edad en rangos</label>
                                                      </div>

                                                      <div class="custom-control custom-radio">
                                                        <input type="radio" id="radio2_4" name="pregunta2" value="Temperatura corporal" class="custom-control-input">
                                                        <label class="custom-control-label" for="radio2_4"> Temperatura corporal</label>
                                                      </div>

                                                      <div class="custom-control custom-radio">
                                                        <input type="radio" id="radio2_5" name="pregunta2" value="Raza (blanca, negra, amarilla)." class="custom-control-input">
                                                        <label class="custom-control-label" for="radio2_5"> Raza (blanca, negra, amarilla).</label>
                                                      </div>


                                                    </div>


<label class="pay">3. El histograma se usa para representar variables:</label>

<div class="form-group">

  <div class="custom-control custom-radio">
    <input type="radio" id="radio3_1" name="pregunta3" value="Cualitativas" class="custom-control-input">
    <label class="custom-control-label" for="radio3_1">Cualitativas</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" id="radio3_2" name="pregunta3" value="Cuantitativas Discretas." class="custom-control-input">
    <label class="custom-control-label" for="radio3_2"> Cuantitativas Discretas.</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio3_3" name="pregunta3" value="Cuantitativas Continuas." class="custom-control-input">
    <label class="custom-control-label" for="radio3_3"> Cuantitativas Continuas.</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio3_4" name="pregunta3" value="Cualquiera" class="custom-control-input">
    <label class="custom-control-label" for="radio3_4">Cualquiera</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio3_5" name="pregunta3" value="Opción 5" class="custom-control-input">
    <label class="custom-control-label" for="radio3_5">Opción 5</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio3_6" name="pregunta3" value="Ciertas 1 y 2" class="custom-control-input">
    <label class="custom-control-label" for="radio3_6">Ciertas 1 y 2.</label>
  </div>
</div>


<label class="pay">4. El Diagrama de Barras se usa para representar variables:</label>

<div class="form-group">

  <div class="custom-control custom-radio">
    <input type="radio" id="radio4_1" name="pregunta4" value="Cualitativas" class="custom-control-input">
    <label class="custom-control-label" for="radio4_1">Cualitativas</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" id="radio4_2" name="pregunta4" value="Cuantitativas Discretas" class="custom-control-input">
    <label class="custom-control-label" for="radio4_2"> Cuantitativas Discretas.</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio4_3" name="pregunta4" value="Cuantitativas Continuas" class="custom-control-input">
    <label class="custom-control-label" for="radio4_3"> Cuantitativas Continuas.</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio4_4" name="pregunta4" value="Cualquiera" class="custom-control-input">
    <label class="custom-control-label" for="radio4_4">Cualquiera</label>
  </div>


  <div class="custom-control custom-radio">
    <input type="radio" id="radio4_5" name="pregunta4" value="Ciertas 1 y 2" class="custom-control-input">
    <label class="custom-control-label" for="radio4_5">Ciertas 1 y 2.</label>
  </div>
</div>

<label class="pay">5. Cuando la muestra es asimétrica, el mejor estadístico de centralización que puede usarse es:</label>

<div class="form-group">

  <div class="custom-control custom-radio">
    <input type="radio" id="radio5_1" name="pregunta5" value="Media Aritmética" class="custom-control-input">
    <label class="custom-control-label" for="radio5_1">Media Aritmética.</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" id="radio5_2" name="pregunta5" value="Mediana" class="custom-control-input">
    <label class="custom-control-label" for="radio5_2"> Mediana</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio5_3" name="pregunta5" value="Moda" class="custom-control-input">
    <label class="custom-control-label" for="radio5_3"> Moda</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio5_4" name="pregunta5" value="Media Geométrica" class="custom-control-input">
    <label class="custom-control-label" for="radio5_4">Media Geométrica</label>
  </div>


  <div class="custom-control custom-radio">
    <input type="radio" id="radio5_5" name="pregunta5" value="Media Armónica" class="custom-control-input">
    <label class="custom-control-label" for="radio5_5">Media Armónica.</label>
  </div>
</div>


<label class="pay">6. Cuando a todos los datos de una muestra se les multiplica una constante</label>

<div class="form-group">

  <div class="custom-control custom-radio">
    <input type="radio" id="radio6_1" name="pregunta6" value="La Media queda multiplicada por esa constante, la Desviación Típica no varía" class="custom-control-input">
    <label class="custom-control-label" for="radio6_1">La Media queda multiplicada por esa constante, la Desviación Típica no varía</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" id="radio6_2" name="pregunta6" value="El Coeficiente de Variación se multiplica por esa constante" class="custom-control-input">
    <label class="custom-control-label" for="radio6_2"> El Coeficiente de Variación se multiplica por esa constante</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio6_3" name="pregunta6" value="Tanto la Media como la Desviación Típica se multiplican por esa constante" class="custom-control-input">
    <label class="custom-control-label" for="radio6_3"> Tanto la Media como la Desviación Típica se multiplican por esa constante</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio6_4" name="pregunta6" value="El Coeficiente de Variación no varía" class="custom-control-input">
    <label class="custom-control-label" for="radio6_4">El Coeficiente de Variación no varía</label>
  </div>


  <div class="custom-control custom-radio">
    <input type="radio" id="radio6_5" name="pregunta6" value="Correctas 3 y 4" class="custom-control-input">
    <label class="custom-control-label" for="radio6_5">Correctas 3 y 4</label>
  </div>
</div>


<label class="pay">7. Una de las siguientes distribuciones de probabilidad corresponde a una Variable Discreta.</label>

<div class="form-group">

  <div class="custom-control custom-radio">
    <input type="radio" id="radio7_1" name="pregunta7" value="Normal" class="custom-control-input">
    <label class="custom-control-label" for="radio7_1">Normal</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" id="radio7_2" name="pregunta7" value="Chi-Cuadrado" class="custom-control-input">
    <label class="custom-control-label" for="radio7_2"> Chi-Cuadrado</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio7_3" name="pregunta7" value="Hipergeométrica" class="custom-control-input">
    <label class="custom-control-label" for="radio7_3">Hipergeométrica</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio7_4" name="pregunta7" value="T. de Student" class="custom-control-input">
    <label class="custom-control-label" for="radio7_4">T. de Student</label>
  </div>


  <div class="custom-control custom-radio">
    <input type="radio" id="radio7_5" name="pregunta7" value="F. de Snedecor" class="custom-control-input">
    <label class="custom-control-label" for="radio7_5">F. de Snedecor</label>
  </div>
</div>

<label class="pay">8. Es una Variable Cualitativa Dicotómica</label>

<div class="form-group">
  <div class="custom-control custom-radio">
    <input type="radio" id="radio8_1" name="pregunta8" value="Sexo (M, F)" class="custom-control-input">
    <label class="custom-control-label" for="radio8_1">Sexo (M, F)</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" id="radio8_2" name="pregunta8" value="Bebe (no, poco, mucho)" class="custom-control-input">
    <label class="custom-control-label" for="radio8_2">Bebe (no, poco, mucho)</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio8_3" name="pregunta8" value="Nº de muelas cariadas" class="custom-control-input">
    <label class="custom-control-label" for="radio8_3">Nº de muelas cariadas</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio8_4" name="pregunta8" value="Temperatura corporal" class="custom-control-input">
    <label class="custom-control-label" for="radio8_4">Temperatura corporal</label>
  </div>


  <div class="custom-control custom-radio">
    <input type="radio" id="radio8_5" name="pregunta8" value="Raza (blanca, negra, amarilla)" class="custom-control-input">
    <label class="custom-control-label" for="radio8_5">Raza (blanca, negra, amarilla)</label>
  </div>
</div>


<label class="pay">9. La Distribución Normal</label>

<div class="form-group">
  <div class="custom-control custom-radio">
    <input type="radio" id="radio9_1" name="pregunta9" value="Es asimétrica" class="custom-control-input">
    <label class="custom-control-label" for="radio9_1">Es asimétrica</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" id="radio9_2" name="pregunta9" value="Es una distribución de probabilidad de variable discreta" class="custom-control-input">
    <label class="custom-control-label" for="radio9_2">Es una distribución de probabilidad de variable discreta</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio9_3" name="pregunta9" value="La Mediana no coincide con la Moda" class="custom-control-input">
    <label class="custom-control-label" for="radio9_3">La Mediana no coincide con la Moda</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio9_4" name="pregunta9" value="Es asintótica" class="custom-control-input">
    <label class="custom-control-label" for="radio9_4">Es asintótica</label>
  </div>


  <div class="custom-control custom-radio">
    <input type="radio" id="radio9_5" name="pregunta9" value="Es bimodal" class="custom-control-input">
    <label class="custom-control-label" for="radio9_5">Es bimodal</label>
  </div>
</div>

<label class="pay">10. Una de las siguientes afirmaciones no se refiere a la Normal</label>

<div class="form-group">
  <div class="custom-control custom-radio">
    <input type="radio" id="radio10_1" name="pregunta10" value="Es una Distribución de probabilidad de Variable Discreta" class="custom-control-input">
    <label class="custom-control-label" for="radio10_1">Es una Distribución de probabilidad de Variable Discreta</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" id="radio10_2" name="pregunta10" value="Asintótica" class="custom-control-input">
    <label class="custom-control-label" for="radio10_2">Asintótica</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio10_3" name="pregunta10" value="Es simétrica respecto a su media" class="custom-control-input">
    <label class="custom-control-label" for="radio10_3">Es simétrica respecto a su media</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio10_4" name="pregunta10" value="Queda definida por la media y la desviación típica" class="custom-control-input">
    <label class="custom-control-label" for="radio10_4">Queda definida por la media y la desviación típica</label>
  </div>


  <div class="custom-control custom-radio">
    <input type="radio" id="radio10_5" name="pregunta10" value="La Media, Moda y Mediana coinciden" class="custom-control-input">
    <label class="custom-control-label" for="radio10_5">La Media, Moda y Mediana coinciden</label>
  </div>
</div>

<label class="pay">11. Comando para obtener el promedio de un set de datos en R</label>

<div class="form-group">
  <div class="custom-control custom-radio">
    <input type="radio" id="radio11_1" name="pregunta11" value="aver" class="custom-control-input">
    <label class="custom-control-label" for="radio11_1">aver</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" id="radio11_2" name="pregunta11" value="mean" class="custom-control-input">
    <label class="custom-control-label" for="radio11_2">mean</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio11_3" name="pregunta11" value="average" class="custom-control-input">
    <label class="custom-control-label" for="radio11_3">average</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio11_4" name="pregunta11" value="summary" class="custom-control-input">
    <label class="custom-control-label" for="radio11_4">summary</label>
  </div>

</div>


<label class="pay">12. Comando en R para visualizar la ruta del directorio actual de trabajo</label>

<div class="form-group">
  <div class="custom-control custom-radio">
    <input type="radio" id="radio12_1" name="pregunta12" value="aver" class="custom-control-input">
    <label class="custom-control-label" for="radio12_1">setwd()</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" id="radio12_2" name="pregunta12" value="mean" class="custom-control-input">
    <label class="custom-control-label" for="radio12_2">encoding()</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio12_3" name="pregunta12" value="average" class="custom-control-input">
    <label class="custom-control-label" for="radio12_3">getwd()</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio12_4" name="pregunta12" value="summary" class="custom-control-input">
    <label class="custom-control-label" for="radio12_4">write()</label>
  </div>

</div>

<label class="pay">13. Se tiene una base de datos Data con las variables: edad y género. ¿Cómo se llama a la variable edad para realizar operaciones en R?</label>

<div class="form-group">
  <div class="custom-control custom-radio">
    <input type="radio" id="radio13_1" name="pregunta13" value="aver" class="custom-control-input">
    <label class="custom-control-label" for="radio13_1">Data(edad)</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" id="radio13_2" name="pregunta13" value="mean" class="custom-control-input">
    <label class="custom-control-label" for="radio13_2">Data->edad</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio13_3" name="pregunta13" value="average" class="custom-control-input">
    <label class="custom-control-label" for="radio13_3">Data$edad</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio13_4" name="pregunta13" value="summary" class="custom-control-input">
    <label class="custom-control-label" for="radio13_4">Data(“edad”)</label>
  </div>

</div>

<label class="pay">14. En R, el comando boxplot permite:</label>
<div class="form-group">
  <div class="custom-control custom-radio">
    <input type="radio" id="radio14_1" name="pregunta14" value="Mostrar valores agrupados por criterios" class="custom-control-input">
    <label class="custom-control-label" for="radio14_1">Mostrar valores agrupados por criterios</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" id="radio14_2" name="pregunta14" value="Generar un diagrama de cajas y bigotes" class="custom-control-input">
    <label class="custom-control-label" for="radio14_2">Generar un diagrama de cajas y bigotes</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio14_3" name="pregunta14" value="Generar un histograma" class="custom-control-input">
    <label class="custom-control-label" for="radio14_3">Generar un histograma</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio14_4" name="pregunta14" value="Generar un gráfico de dispersión" class="custom-control-input">
    <label class="custom-control-label" for="radio14_4">Generar un gráfico de dispersión</label>
  </div>
</div>

<label class="pay">15. Librería para tratamiento de variables tipo fecha en R</label>
<div class="form-group">
  <div class="custom-control custom-radio">
    <input type="radio" id="radio15_1" name="pregunta15" value="datetrat" class="custom-control-input">
    <label class="custom-control-label" for="radio15_1">datetrat</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" id="radio15_2" name="pregunta15" value="glm" class="custom-control-input">
    <label class="custom-control-label" for="radio15_2">glm</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio15_3" name="pregunta15" value="lubridate" class="custom-control-input">
    <label class="custom-control-label" for="radio15_3">lubridate</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio15_4" name="pregunta15" value="VIM" class="custom-control-input">
    <label class="custom-control-label" for="radio15_4">VIM</label>
  </div>
</div>


<label class="pay">16. En R, x <- 1 es lo mismo que: x == 1</label>
<div class="form-group">
  <div class="custom-control custom-radio">
    <input type="radio" id="radio16_1" name="pregunta16" value="datetrat" class="custom-control-input">
    <label class="custom-control-label" for="radio16_1">datetrat</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" id="radio16_2" name="pregunta16" value="glm" class="custom-control-input">
    <label class="custom-control-label" for="radio16_2">glm</label>
  </div>
</div>

<label class="pay">17. ¿Cómo convertir un vector de características en un vector de entero en R?</label>
<div class="form-group">
  <div class="custom-control custom-radio">
    <input type="radio" id="radio17_1" name="pregunta17" value="as.integer" class="custom-control-input">
    <label class="custom-control-label" for="radio17_1">as.integer</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" id="radio17_2" name="pregunta17" value="as.numeric" class="custom-control-input">
    <label class="custom-control-label" for="radio17_2">as.numeric</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio17_3" name="pregunta17" value="tointeger" class="custom-control-input">
    <label class="custom-control-label" for="radio17_3">tointeger</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio17_4" name="pregunta17" value="converttointeger" class="custom-control-input">
    <label class="custom-control-label" for="radio17_4">converttointeger</label>
  </div>
</div>

<label class="pay">18. Tiene un archivo, “november.csv”, en el directorio, “/ Documents / expend /”. ¿Cómo lees este archivo en R?</label>
<div class="form-group">
  <div class="custom-control custom-radio">
    <input type="radio" id="radio18_1" name="pregunta18" value="readLines(/Documents/expenses/november.csv)" class="custom-control-input">
    <label class="custom-control-label" for="radio18_1">readLines(/Documents/expenses/november.csv)</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" id="radio18_2" name="pregunta18" value="read.csv(“/Documents/expenses/november.csv”)" class="custom-control-input">
    <label class="custom-control-label" for="radio18_2">read.csv(“/Documents/expenses/november.csv”)</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio18_3" name="pregunta18" value="read.csv(/Documents/expenses/november.csv)" class="custom-control-input">
    <label class="custom-control-label" for="radio18_3">read.csv(/Documents/expenses/november.csv)</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio18_4" name="pregunta18" value="ninguna de las anteriores" class="custom-control-input">
    <label class="custom-control-label" for="radio18_4">ninguna de las anteriores</label>
  </div>
</div>

<label class="pay">19. librería para el tratamiento de modelos lineales en R</label>
<div class="form-group">
  <div class="custom-control custom-radio">
    <input type="radio" id="radio19_1" name="pregunta19" value="rpart" class="custom-control-input">
    <label class="custom-control-label" for="radio19_1">rpart</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" id="radio19_2" name="pregunta19" value="pca" class="custom-control-input">
    <label class="custom-control-label" for="radio19_2">pca</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio19_3" name="pregunta19" value="glm" class="custom-control-input">
    <label class="custom-control-label" for="radio19_3">glm</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio19_4" name="pregunta19" value="k-means" class="custom-control-input">
    <label class="custom-control-label" for="radio19_4">k-means</label>
  </div>
</div>

<label class="pay">20. librería el tratamiento de árboles de clasificación en R</label>
<div class="form-group">
  <div class="custom-control custom-radio">
    <input type="radio" id="radio20_1" name="pregunta20" value="rpart" class="custom-control-input">
    <label class="custom-control-label" for="radio20_1">rpart</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" id="radio20_2" name="pregunta20" value="pca" class="custom-control-input">
    <label class="custom-control-label" for="radio20_2">pca</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio20_3" name="pregunta20" value="glm" class="custom-control-input">
    <label class="custom-control-label" for="radio20_3">glm</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio20_4" name="pregunta20" value="k-means" class="custom-control-input">
    <label class="custom-control-label" for="radio20_4">k-means</label>
  </div>
</div>

<label class="pay">21. Python es un lenguaje de programación …</label>
<div class="form-group">
  <div class="custom-control custom-radio">
    <input type="radio" id="radio21_1" name="pregunta21" value="Orientado a java" class="custom-control-input">
    <label class="custom-control-label" for="radio21_1">Orientado a java</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" id="radio21_2" name="pregunta21" value="Orientado a respuestas" class="custom-control-input">
    <label class="custom-control-label" for="radio21_2">Orientado a respuestas</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio21_3" name="pregunta21" value="Orientado a objetos" class="custom-control-input">
    <label class="custom-control-label" for="radio21_3">Orientado a objetos</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio21_4" name="pregunta21" value="Orientado a procedimientos" class="custom-control-input">
    <label class="custom-control-label" for="radio21_4">Orientado a procedimientos</label>
  </div>
</div>

<label class="pay">22. ¿Qué es Jupyter Notebook?</label>
<div class="form-group">
  <div class="custom-control custom-radio">
    <input type="radio" id="radio22_1" name="pregunta22" value="Consola que permite realizar calendarios programados" class="custom-control-input">
    <label class="custom-control-label" for="radio22_1">Consola que permite realizar calendarios programados</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" id="radio22_2" name="pregunta22" value="Entorno computacional para realizar análisis" class="custom-control-input">
    <label class="custom-control-label" for="radio22_2">Entorno computacional para realizar análisis</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio22_3" name="pregunta22" value="Sistema operativo para implementar analítica" class="custom-control-input">
    <label class="custom-control-label" for="radio22_3">Sistema operativo para implementar analítica</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio22_4" name="pregunta22" value="Complemento Linux" class="custom-control-input">
    <label class="custom-control-label" for="radio22_4">Complemento Linux</label>
  </div>
</div>

<label class="pay">23. ¿Qué permiten los alias en la programación en Python?</label>
<div class="form-group">
  <div class="custom-control custom-radio">
    <input type="radio" id="radio23_1" name="pregunta23" value="Cambiar los nombres de las librerías en Python" class="custom-control-input">
    <label class="custom-control-label" for="radio23_1">Cambiar los nombres de las librerías en Python</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" id="radio23_2" name="pregunta23" value="Cambiar los nombres a los módulos en Python" class="custom-control-input">
    <label class="custom-control-label" for="radio23_2">Cambiar los nombres a los módulos en Python</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio23_3" name="pregunta23" value="Abreviar los nombres de las librerías para hacer los llamados" class="custom-control-input">
    <label class="custom-control-label" for="radio23_3">Abreviar los nombres de las librerías para hacer los llamados</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio23_4" name="pregunta23" value="Abreviar los nombres de los módulos para hacer los llamados" class="custom-control-input">
    <label class="custom-control-label" for="radio23_4">Abreviar los nombres de los módulos para hacer los llamados</label>
  </div>
</div>

<label class="pay">24. Se tiene una base de datos Data con las variables: edad y género. ¿Cómo se llama a la variable edad para realizar operaciones en Python?</label>
<div class="form-group">
  <div class="custom-control custom-radio">
    <input type="radio" id="radio24_1" name="pregunta24" value="Data(edad)" class="custom-control-input">
    <label class="custom-control-label" for="radio24_1">Data(edad)</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" id="radio24_2" name="pregunta24" value="Data->edad" class="custom-control-input">
    <label class="custom-control-label" for="radio24_2">Data->edad</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio24_3" name="pregunta24" value="Data$edad" class="custom-control-input">
    <label class="custom-control-label" for="radio24_3">Data$edad</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio24_4" name="pregunta24" value="Data[“edad”]" class="custom-control-input">
    <label class="custom-control-label" for="radio24_4">Data[“edad”]</label>
  </div>
</div>


<label class="pay">25. Se tiene una base de datos de nombre: “Data”, ¿Cómo se puede mostrar el formato de todas las variables de la base?</label>
<div class="form-group">
  <div class="custom-control custom-radio">
    <input type="radio" id="radio25_1" name="pregunta25" value="Datos$dtypes" class="custom-control-input">
    <label class="custom-control-label" for="radio25_1">Datos$dtypes</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" id="radio25_2" name="pregunta25" value="Datos(dtypes)" class="custom-control-input">
    <label class="custom-control-label" for="radio25_2">Datos(dtypes)</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio25_3" name="pregunta25" value="Datos.dtypes" class="custom-control-input">
    <label class="custom-control-label" for="radio25_3">Datos.dtypes</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio25_4" name="pregunta25" value="Ninguna de las anteriores" class="custom-control-input">
    <label class="custom-control-label" for="radio25_4">Ninguna de las anteriores</label>
  </div>
</div>

<label class="pay">26. Se tiene una base de datos de nombre: “Data”, ¿Cómo se puede visualizar una muestra de 20 casos de la base Data?</label>
<div class="form-group">
  <div class="custom-control custom-radio">
    <input type="radio" id="radio26_1" name="pregunta26" value="Data(head$20)" class="custom-control-input">
    <label class="custom-control-label" for="radio26_1">Data(head$20)</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" id="radio26_2" name="pregunta26" value="Data.head(20)" class="custom-control-input">
    <label class="custom-control-label" for="radio26_2">Data.head(20)</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio26_3" name="pregunta26" value="Data$head[20]" class="custom-control-input">
    <label class="custom-control-label" for="radio26_3">Data$head[20]</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio26_4" name="pregunta26" value="Ninguna de las anteriores" class="custom-control-input">
    <label class="custom-control-label" for="radio26_4">Ninguna de las anteriores</label>
  </div>
</div>

<label class="pay">27. El módulo matplotlib de Python es utilizado para:</label>
<div class="form-group">
  <div class="custom-control custom-radio">
    <input type="radio" id="radio27_1" name="pregunta27" value="Módulo para análisis matemático" class="custom-control-input">
    <label class="custom-control-label" for="radio27_1">Módulo para análisis matemático</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" id="radio27_2" name="pregunta27" value="Módulo para análisis gráficos" class="custom-control-input">
    <label class="custom-control-label" for="radio27_2">Módulo para análisis gráficos</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio27_3" name="pregunta27" value="Módulo para análisis predictivo" class="custom-control-input">
    <label class="custom-control-label" for="radio27_3">Módulo para análisis predictivo</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio27_4" name="pregunta27" value="Módulo para diseño de páginas web" class="custom-control-input">
    <label class="custom-control-label" for="radio27_4">Módulo para diseño de páginas web</label>
  </div>
</div>

<label class="pay">28. El módulo scikit-learn de Python es utilizado para:</label>
<div class="form-group">
  <div class="custom-control custom-radio">
    <input type="radio" id="radio28_1" name="pregunta28" value="Módulo para análisis matemático" class="custom-control-input">
    <label class="custom-control-label" for="radio28_1">Módulo para análisis matemático</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" id="radio28_2" name="pregunta28" value="Módulo para análisis gráficos" class="custom-control-input">
    <label class="custom-control-label" for="radio28_2">Módulo para análisis gráficos</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio28_3" name="pregunta28" value="Módulo para análisis predictivo" class="custom-control-input">
    <label class="custom-control-label" for="radio28_3">Módulo para análisis predictivo</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio28_4" name="pregunta28" value="Módulo para diseño de páginas web" class="custom-control-input">
    <label class="custom-control-label" for="radio28_4">Módulo para diseño de páginas web</label>
  </div>
</div>

<label class="pay">29. No es una palabra reservada en Python</label>
<div class="form-group">
  <div class="custom-control custom-radio">
    <input type="radio" id="radio29_1" name="pregunta29" value="import" class="custom-control-input">
    <label class="custom-control-label" for="radio29_1">import</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" id="radio29_2" name="pregunta29" value="global" class="custom-control-input">
    <label class="custom-control-label" for="radio29_2">global</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio29_3" name="pregunta29" value="yield" class="custom-control-input">
    <label class="custom-control-label" for="radio29_3">yield</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio29_4" name="pregunta29" value="final" class="custom-control-input">
    <label class="custom-control-label" for="radio29_4">final</label>
  </div>
</div>

<label class="pay">30. ¿Cómo nombra una función en Python?</label>
<div class="form-group">
  <div class="custom-control custom-radio">
    <input type="radio" id="radio30_1" name="pregunta30" value="function" class="custom-control-input">
    <label class="custom-control-label" for="radio30_1">function</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" id="radio30_2" name="pregunta30" value="global" class="custom-control-input">
    <label class="custom-control-label" for="radio30_2">global</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio30_3" name="pregunta30" value="def" class="custom-control-input">
    <label class="custom-control-label" for="radio30_3">def</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio30_4" name="pregunta30" value="int" class="custom-control-input">
    <label class="custom-control-label" for="radio30_4">int</label>
  </div>
</div>

<label class="pay">31. ¿Cuál de los siguientes es un ejemplo de un algoritmo determinista?</label>
<div class="form-group">
  <div class="custom-control custom-radio">
    <input type="radio" id="radio31_1" name="pregunta31" value="PCA" class="custom-control-input">
    <label class="custom-control-label" for="radio31_1">PCA</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" id="radio31_2" name="pregunta31" value="K-Means" class="custom-control-input">
    <label class="custom-control-label" for="radio31_2">K-Means</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio31_3" name="pregunta31" value="Ninguna de las anteriores" class="custom-control-input">
    <label class="custom-control-label" for="radio31_3">Ninguna de las anteriores</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio31_4" name="pregunta31" value="int" class="custom-control-input">
    <label class="custom-control-label" for="radio31_4">int</label>
  </div>
</div>

<label class="pay">32. Una correlación de Pearson entre dos variables es cero, pero, aun así, sus valores todavía pueden estar relacionados entre sí</label>
<div class="form-group">
  <div class="custom-control custom-radio">
    <input type="radio" id="radio32_1" name="pregunta32" value="Verdadero" class="custom-control-input">
    <label class="custom-control-label" for="radio32_1">Verdadero</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" id="radio32_2" name="pregunta32" value="Falso" class="custom-control-input">
    <label class="custom-control-label" for="radio32_2">Falso</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio32_3" name="pregunta32" value="Verdadero, según el tipo de variable" class="custom-control-input">
    <label class="custom-control-label" for="radio32_3">Verdadero, según el tipo de variable</label>
  </div>
</div>

<label class="pay">33. ¿Por qué se necesita un conjunto de validación y uno de prueba para hacer análisis predictivo?</label>
<div class="form-group">
  <div class="custom-control custom-radio">
    <input type="radio" id="radio33_1" name="pregunta33" value="Para escoger el mejor modelo entre dos conjuntos de datos" class="custom-control-input">
    <label class="custom-control-label" for="radio33_1">Para escoger el mejor modelo entre dos conjuntos de datos</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" id="radio33_2" name="pregunta33" value="Para medir el desempeño predictivo en data no analizada" class="custom-control-input">
    <label class="custom-control-label" for="radio33_2">Para medir el desempeño predictivo en data no analizada</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio33_3" name="pregunta33" value="Para realizar la validación cruzada entre dos conjuntos de datos" class="custom-control-input">
    <label class="custom-control-label" for="radio33_3">Para realizar la validación cruzada entre dos conjuntos de datos</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio33_4" name="pregunta33" value="Todas las anteriores" class="custom-control-input">
    <label class="custom-control-label" for="radio33_4">Todas las anteriores</label>
  </div>
</div>

<label class="pay">34. La métrica accuracy toma valores entre:</label>
<div class="form-group">
  <div class="custom-control custom-radio">
    <input type="radio" id="radio34_1" name="pregunta34" value="[1 ; 100]" class="custom-control-input">
    <label class="custom-control-label" for="radio34_1">[1 ; 100]</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" id="radio34_2" name="pregunta34" value="[-1 ; 1]" class="custom-control-input">
    <label class="custom-control-label" for="radio34_2">[-1 ; 1]</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio34_3" name="pregunta34" value="[1 ; 5]" class="custom-control-input">
    <label class="custom-control-label" for="radio34_3">[1 ; 5]</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio34_4" name="pregunta34" value="[0 ; 1]" class="custom-control-input">
    <label class="custom-control-label" for="radio34_4">[0 ; 1]</label>
  </div>
</div>

<label class="pay">35. Respecto al número de clusters, cuál de las siguientes afirmaciones es verdadera</label>
<div class="form-group">
  <div class="custom-control custom-radio">
    <input type="radio" id="radio35_1" name="pregunta35" value="El número de clusters no se puede determinar" class="custom-control-input">
    <label class="custom-control-label" for="radio35_1">El número de clusters no se puede determinar</label>
  </div>
  <div class="custom-control custom-radio">
    <input type="radio" id="radio35_2" name="pregunta35" value="El número de clusters es relativo a un criterio de calidad de los clusters.  Esto significa que existe un grado de subjetividad para definir tal número" class="custom-control-input">
    <label class="custom-control-label" for="radio35_2">El número de clusters es relativo a un criterio de calidad de los clusters.  Esto significa que existe un grado de subjetividad para definir tal número</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio35_3" name="pregunta35" value="Existe un valor único y absoluto para el número de clusters definido por el método Elbow" class="custom-control-input">
    <label class="custom-control-label" for="radio35_3">Existe un valor único y absoluto para el número de clusters definido por el método Elbow</label>
  </div>

  <div class="custom-control custom-radio">
    <input type="radio" id="radio35_4" name="pregunta35" value="Todas las anteriores" class="custom-control-input">
    <label class="custom-control-label" for="radio35_4">Todas las anteriores</label>
  </div>
</div>

                                </div>
                                <input type="button" name="next" class="next action-button" value="Siguiente"/>
                            </fieldset>
                            <fieldset>
                              <div class="form-card">
                                  <h2 class="fs-title">Detalles</h2>

                                  <!-- <label class="pay">pregunta 4</label>
                                  <input type="text" name="holdername" placeholder=""/>
                                  <label class="pay">pregunta 5</label>
                                  <input type="text" name="holdername" placeholder=""/> -->
                                  <label class="pay">36. ¿Qué expectativa tiene sobre el programa?</label>
                                  <textarea name="pregunta36" rows="3" cols="20"></textarea>
                              </div>
                                <!--  -->
                                <input type="button" name="previous" class="previous action-button-previous" value="Atras"/>
                                <input type="button" name="next" class="next action-button" value="Siguiente"/>
                            </fieldset>
                            <fieldset>
                              <div class="form-card">

                                <h2 class="fs-title">Archivos </h2>
                                  <div class="alert alert-danger" role="alert">
Descargar los formatos (los botones de color verde y azul) y completar el contenido. Al finalizar debe subirlos debidamente completados.
</div>
<br>
                                  <label class="pay">Archivo 1</label>
  <div class="float-right"><a href='../img/manual.docx'  class="btn btn-success btn-sm " title="Descargar" > Formato archivo 1 <i class="fa fa-download" aria-hidden="true"></i></a></div>
                                  <input type="file" name="archivo1" class="file">
                                    <label class="pay">Archivo 2</label>
    <div class="float-right"><a href='../img/manual.docx' class="btn btn-primary btn-sm " title="Descargar" >Formato archivo 2 <i class="fa fa-download" aria-hidden="true"></i></a></div>
                                    <input type="file" name="archivo2" class="file">

                              </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Atras"/>
                                <input type="button" name="make_payment" class="next action-button" value="Confirm"/>
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title text-center">Registro Correcto!</h2>
                                    <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-3">
                                            <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image">
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                            <h5>Muchas gracias por participar. El equipo de DMC</h5>
                                        </div>
                                    </div>
                                </div>
<input type="button" name="previous" class="previous action-button-previous" value="Atras"/>
                              <button class="boton-confirmacion">Enviar</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<script type="text/javascript">
$(document).ready(function(){

$("#grad1").hide();


var current_fs, next_fs, previous_fs; //fieldsets
var opacity;

$(".next").click(function(){

    current_fs = $(this).parent();
    next_fs = $(this).parent().next();

    //Add Class Active
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

    //show the next fieldset
    next_fs.show();
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function(now) {
            // for making fielset appear animation
            opacity = 1 - now;

            current_fs.css({
                'display': 'none',
                'position': 'relative'
            });
            next_fs.css({'opacity': opacity});
        },
        duration: 600
    });
});

$(".previous").click(function(){

    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();

    //Remove class active
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

    //show the previous fieldset
    previous_fs.show();

    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function(now) {
            // for making fielset appear animation
            opacity = 1 - now;

            current_fs.css({
                'display': 'none',
                'position': 'relative'
            });
            previous_fs.css({'opacity': opacity});
        },
        duration: 600
    });
});

$('.radio-group .radio').click(function(){
    $(this).parent().find('.radio').removeClass('selected');
    $(this).addClass('selected');
});

$(".submit").click(function(){
    return false;
})

});



function registrarDatos(titulo,texto,tipo){
  parametros =  new FormData($('#msform')[0]);
$.ajax({

url:'../suscripcion/controller/controller_formularioLogin.php?op=registroCuestionario',
type:'POST',
data:parametros,
contentType:false,
processData:false,
dataType:'JSON',
beforeSend:function(){

// $(".boton-confirmacion").prop('disabled', true);
//  Swal.fire({
//  title:'Registrando..',
//  text:'Espere un momento por favor',
//   showConfirmButton : false
//  })
},

success:function(data){
 $(".boton-confirmacion").prop('disabled', false);


 if(data.type=='success')
 {
   swal({

   title:titulo,
   text:texto,
   type:tipo,
    timer:3000,
   showConfirmButton:false
   });

   setTimeout(function(){
  window.location.href='../template/home.php'
  // window.location.href='../home.php'
 },3000);

}else {
  swal({

  title:data.title,
  text:data.text,
  type:data.type,
   timer:3000,
  showConfirmButton:false
  });
}

}

});

}

$(document).on('submit','#msform',function(e){
registrarDatos('Registrado','¡El registro se realizo con exito!','success');
e.preventDefault();
});

// var tiempo = 61;
// function myTimer() {
//   if(tiempo === 0) {
// 		// alert("fin");
//     clearInterval(tiempo);
//   } else {
//     tiempo = tiempo - 1;
//     // console.log(af);
// 		$('#timer').html(tiempo);
//
//   }
// }
// var timer = setInterval(function(){ myTimer() }, 1000);


var segundos = 60;
var minutos =59;

function inicio() {

    $(".texto_inicio").hide("fade");
  $("#grad1").show();
  control = setInterval(cronometro, 1000);
  document.getElementById("inicio").disabled = true;

}



function cronometro() {

  segundos -= 1;

 if (segundos == 0) {

    segundos = 60;
    minutos -= 1;
  }


  if (segundos == 60 && minutos == -1) { // cuando se acaba el tiempo

   $('.div_tiempo').hide();
   registrarDatos('Se acabo el tiempo','El registro se realizó de manera automática','warning');
}else {
          if (segundos < 10 && minutos < 10) {
                document.getElementById('Tiempo').innerHTML = ("0" + minutos + ":" + "0" + segundos);
          }
          else if (segundos >= 10 && minutos < 10) {
            document.getElementById('Tiempo').innerHTML = ("0" + minutos + ":" + segundos);
          }
          else if (segundos < 10 && minutos > 10) {
            document.getElementById('Tiempo').innerHTML = (+minutos + ":" + "0" + segundos);

          }else {
            document.getElementById('Tiempo').innerHTML = (minutos + ":" + segundos);
          }
}



}


</script>
<!-- fin -->
<?php include "footer.php"; ?>
