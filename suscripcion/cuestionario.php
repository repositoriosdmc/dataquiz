<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CUESTIONARIO</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<!--  -->

<!-- bandera -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
<!--  -->

<!--alertify  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
       <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/alertify.min.js"></script>
       <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/css/alertify.min.css"/>
       <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.12.0/build/css/themes/default.min.css"/>
<!--  -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- bandera -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<!--  -->




<style media="screen">
  .iti { width: 100%; }   /* para el phone */


</style>
  </head>
  <body style="background-image: url('../img/banner-edit-fondo.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: 100% 100%;">



    <div class="container">
  		<div class="row justify-content-md-center">



  			<div class="col-md-10" style="padding: 25px 35px; border: 1px solid #c8c7c7; margin: 15px 0; border-radius: 6px; box-shadow: 0px 1px 5px #dddddd;background: white;">

<br>


  				<form name="form" id="form-agregar" autocomplete="off">

            <div style="text-align: center;">

      <img class="h-log2" src="../img/summit-estudio.jpg"  width="100%"  ><br> <br>
      <h3 ><b>ESTUDIO DEL PROFESIONAL EN ANALÍTICA DE DATOS</b></h3>
    </div><br>
<p>

<div class="vista_inicial">

  <b>¡Hola! Somos DMC</b>, la comunidad líder en el Perú vinculada a la analítica de datos. Te invitamos a participar del estudio "Perfil del profesional en analítica de datos"
  con el que buscamos conocer la situación actual de un profesional en auge, sus conocimientos, habilidades y preferencias.


  </p>

  <p>
  Responder la encuesta te tomará aproximadamente 15 minutos, todas las respuestas serán tratadas de forma confidencial y con rigor estadístico.
  </p>

  <p>
  Al finalizar el proceso de análisis estaremos muy gustosos de compartir contigo los resultados del estudio, los que serán presentados en el AI & Analytics Summit 2021.
  Además, por participar de este estudio tendrás acceso a las actividades gratuitas de esta nueva edición del congreso.

  </p>


  <hr>
  <br>
  <div class="form-row">

    <div class="form-group col-md-6">

          <input type="hidden" class="form-control" id="codigo" name="codigo" value="1581">
      </div>


  </div>

   <div class="form-row">
    <div class="form-group col-md-12">
    <input type="hidden" readonly class="form-control" id="fecha" name="fecha"  value="<?php  echo date("Y-m-d H:i:s"); ?>" >

    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
  <u><h5>A. PERFIL DEL ENTREVISTADO</h5></u>

    </div>
  </div>

                      <div class="form-row">

                      	<div class="form-group col-md-6">
                      		<label for="">A1. Nombres :</label>
                              <input type="text" required class="form-control" id="nombres" name="nombres"  placeholder="Nombres " >
                          </div>
                          <div class="form-group col-md-6">
                        		<label for="">  Apellidos:</label>
                                <input type="text" required class="form-control" id="apellidos" name="apellidos"  placeholder="Apellidos">
                            </div>

                      </div>

                      <div class="form-row">

                        <div class="form-group col-md-6">
                          <label for=""> A2.Tipo documento:</label>
                          <select class="form-control valid js-example-basic-single" required id="tDocumento" name="tDocumento" >
                              <option value="">Seleccione</option>
                              <option value="DNI">DNI</option>
                              <option value="OTROS">OTROS </option>
                          </select>

                          </div>
                          <div class="form-group col-md-6">
                            <label for=""> Número:</label>


                            <input type="text" required class="form-control" id="numero" name="numero"  placeholder="Número " >

                            </div>

                      </div>

  <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="">A3.  Género:</label>
            <br>
                        <label class="radio-inline">
            <input type="radio" required name="genero" value="HOMBRE" > HOMBRE
            </label>&nbsp;&nbsp;
            <label class="radio-inline">
            <input type="radio" required name="genero" value="MUJER"> MUJER
            </label>

                        </div>
    </div>
                      <!-- <div class="row">
                        <div class="form-group col-md-6">
                          <label for=""> A4.Celular:</label>
                      <br>
                      <input type="text" class="form-control"  id="phone" name="phone"   placeholder="">
                        </div>

                        <div class="form-group col-md-6">
                          <label for=""> A5.¿Me podría indicar su edad?</label>
<input type="number" step="any" class="form-control" name="edad" id="edad" placeholder="Edad" value="">
                        </div>

                      </div> -->

                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <label for=""> A4.Celular:</label>
                          <input type="text" class="form-control"  id="phone" name="phone"   placeholder="">
                          </div>
                          <div class="form-group col-md-6">
                              <label for=""> A5.¿Me podría indicar su edad?</label>
                      <input type="number" step="any" class="form-control" name="edad" id="edad" required placeholder="Edad" >
                          </div>
                      </div>



                      <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="">A6. Correo electrónico:        </label>
                            <input type="email" class="form-control" id="correo" name="correo" required  placeholder="Correo electrónico" >
                          </div>
                          <div class="form-group col-md-6">
                            <label for="">A7. Pais:       </label>
                            <input type="text" class="form-control" id="pais" name="pais" required placeholder="Pais" >
                          </div>
                      </div>

                      <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="">A8. En que ciudad vive: (No considerar los de Perú)      </label>
                            <input type="text" class="form-control" id="ciudad" name="ciudad"  placeholder="En que ciudad vive" >
                          </div>

  <div class="form-group col-md-6">
      <label for=""> A9.	¿Que frase describe mejor su situación laboral?     </label>
    <select class="form-control " id="frase_laboral" name="frase_laboral" required >
        <option value="">Seleccione</option>
        <option value="Actualmente estoy laborando, mi ocupación principal es dependiente">Actualmente estoy laborando, mi ocupación principal es dependiente</option>
        <option value="Actualmente estoy laborando, mi ocupación principal es independiente">Actualmente estoy laborando, mi ocupación principal es independiente </option>
        <option value="Actualmente no estoy laborando, pero sí he trabajado antes">Actualmente no estoy laborando, pero sí he trabajado antes</option>
        <option value="Aún no he laborado">Aún no he laborado</option>

    </select>
    </div>
                      </div>
    <div class="form-row">
      <div class="form-group col-md-12">
          <label for="">A10.	¿En que qué sector trabaja actualmente? (Si no se encuentra trabajando actualmente, considerar las labores del último trabajo)   </label>
        <select class="form-control " required id="sector_trabajo" name="sector_trabajo" >
            <option value="">Seleccione</option>
            <option value="Consultoría">Consultoría</option>
            <option value="Telecomunicacones">Telecomunicacones </option>
            <option value="Banca">Banca</option>
            <option value="Retail">Retail</option>
            <option value="Minería">Minería</option>
            <option value="Industria">Industria</option>
            <option value="Seguros">Seguros</option>
            <option value="Tecnologías de la Información">Tecnologías de la Información</option>
            <option value="Otros">Otros</option>
        </select>
        </div>

  </div>
  <div class="form-row" id="div10_otros">
    <div class="form-group col-md-12">
<label>Especificar:</label>
<textarea name="sector_trabajo_otros"  placeholder="especificar" id="sector_trabajo_otros" class="form-control" rows="2" cols="20"></textarea>
    </div>

</div>
  <div class="form-row">
    <div class="form-group col-md-12">
        <label for="">A11.	¿Qué cantidad de personas tiene la empresa donde labora actualmente? (Si no se encuentra trabajando actualmente, considerar las labores del último trabajo) ?   </label>
      <select class="form-control " required id="cantidad_trabajadores" name="cantidad_trabajadores">
      <option value="">Seleccione</option>
      <option value="Menos de 10">Menos de 10</option>
      <option value="De 11 a 50">De 11 a 50 </option>
      <option value="De 51 a 100">De 51 a 100</option>
      <option value="De 101 a 1,000">De 101 a 1,000</option>
      <option value="Más de 1,000">Más de 1,000</option>
      <option value="No Precisa">No Precisa</option>
      </select>
      </div>
</div>
<div class="form-row">
  <div class="form-group col-md-12">
      <label for="">A12.   ¿Qué puesto tiene actualmente en su trabajo? (Si no se encuentra trabajando actualmente, considerar las labores del último trabajo)   </label>
    <select class="form-control " id="puesto_trabajo" required name="puesto_trabajo" >
    <option value="">Seleccione</option>
    <option value="Practicante Preprofesional">Practicante Preprofesional</option>
    <option value="Practicante Profesional">Practicante Profesional </option>
    <option value="Asistente / Ejecutivo jr">Asistente / Ejecutivo jr</option>
    <option value="Analista / Ejecutivo Sr">Analista / Ejecutivo Sr</option>
    <option value="Jefe / Sub Gerente">Jefe / Sub Gerente</option>
    <option value="Gerente de área">Gerente de área</option>
    <option value="Director / VP">Director / VP</option>
    <option value="Gerente general / Dueño empresa">Gerente general / Dueño empresa</option>
    <option value="Otros">Otros</option>
    </select>
    </div>
</div>
<div class="form-row" id="div12_otros">
  <div class="form-group col-md-12">
<label>Especificar:</label>
<textarea name="puesto_trabajo_otros" placeholder="especificar" id="puesto_trabajo_otros" class="form-control" rows="2" cols="20"></textarea>
  </div>

</div>
<!-- nuevo -->

<div class="form-row">

<div class="form-group col-md-12">
    <label for="">A13. ¿En qué rango se encuentra su remuneración mensual? (Monto en dólares)   </label>
  <select class="form-control " id="rango_remuneracion_mensual" required name="rango_remuneracion_mensual" >
      <option value="">Seleccione</option>
      <option value="Menos de $500">Menos de $500</option>
      <option value="De $501 a $750">De $501 a $750</option>
      <option value="De $751 a $1,000">De $751 a $1,000</option>
      <option value="De $1,001 a $2,000">De $1,001 a $2,000</option>
      <option value="De $2,001 a $4,000">De $2,001 a $4,000</option>
      <option value="Más de $4,000">Más de $4,000</option>
      <option value="No precisa">No precisa</option>
  </select>
  </div>

  </div>


<!--  -->

<div class="form-row">

<div class="form-group col-md-12">
    <label for="">A14. ¿Según la actividad de su trabajo y según lo que ha desarrollado en su vida laborar, ¿se considera un …?  </label>
  <select class="form-control " id="actividad_laboral" required name="actividad_laboral" >
      <option value="">Seleccione</option>
      <option value="Analista de datos">Analista de datos</option>
      <option value="Analista de tecnologías de información">Analista de tecnologías de información </option>
      <option value="Arquitecto de datos">Arquitecto de datos</option>
      <option value="Ingeniero de datos">Ingeniero de datos</option>
      <option value="Científico de datos">Científico de datos</option>
      <option value="Cloud Engineer">Cloud Engineer</option>
      <option value="Cloud Developer">Cloud Developer</option>
      <option value="Cloud Analyst">Cloud Analyst</option>
      <option value="Ingeniero DevOps">Ingeniero DevOps</option>
      <option value="Otro">Otro</option>
  </select>
  </div>

  </div>
  <div class="form-row" id="div13_otros">
    <div class="form-group col-md-12">
  <label>Especificar:</label>
  <textarea name="actividad_laboral_otros" placeholder="especificar" id="actividad_laboral_otros" class="form-control" rows="2" cols="20"></textarea>
    </div>

  </div>
<!--  -->
<div class="form-row">
  <div class="form-group col-md-12">
      <label for="">A15.	Dominio del Idioma Inglés  </label>
    <select class="form-control " required id="ingles" name="ingles" >
        <option value="">Seleccione</option>
        <option value="Avanzado">Avanzado</option>
        <option value="Intermedio">Intermedio </option>
        <option value="Básico">Básico</option>
        <option value="Ninguno">Ninguno</option>
    </select>
    </div>



    <div class="form-group col-md-12">
      <label for="">A16.	¿En el último año ha cambiado de trabajo?</label>
<br>
      <label class="radio-inline">
<input type="radio" name="cambio_trabajo_ultimo_año" required value="si" >&nbsp;SI
</label>&nbsp;&nbsp;
<label class="radio-inline">
<input type="radio" name="cambio_trabajo_ultimo_año" required value="no">&nbsp;NO
</label>
      </div>

      <div class="form-group col-md-12">
        <label for="">A17.	¿En el último año ha cambiado de funciones o ha sido promovido?</label>
  <br>
        <label class="radio-inline">
  <input type="radio" name="cambio_funciones_ultimo_año" required value="si" >&nbsp;SI
  </label>&nbsp;&nbsp;
  <label class="radio-inline">
  <input type="radio" name="cambio_funciones_ultimo_año" required value="no">&nbsp;NO
  </label>
        </div>


                    <div class="form-group col-md-12">
                      <label for="">A18.	¿En el último año se ha capacitado en algún tema de analítica de datos?</label>
          <br>
                      <label class="radio-inline">
          <input type="radio" name="capacitacion" required value="si" >&nbsp;SI
          </label>&nbsp;&nbsp;
          <label class="radio-inline">
          <input type="radio" name="capacitacion" required value="no">&nbsp;NO
          </label>

                      </div>


  </div>




  <div class="form-row">
    <div class="form-group col-md-12">

      <label>	A19.   ¿Bajo qué modalidad se ha capacitado? </label>
      <div class="form-check">
        <input class="form-check-input require-three" type="checkbox" value="1" id="Presencial" name="modalidad_Presencial">
        <label class="form-check-label" >
        Presencial
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input require-three" type="checkbox" value="1" id="modalidad_vivo" name="modalidad_vivo">
        <label class="form-check-label" >
   Online - clases en vivo
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input require-three" type="checkbox" value="1" id="modalidad_grabadoVivo" name="modalidad_grabadoVivo">
        <label class="form-check-label" >
      Online - Blended (Vivo + Grabado)
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input require-three" type="checkbox" value="1" id="modalidad_grabado" name="modalidad_grabado">
        <label class="form-check-label" >
        Online - Clases grabadas
        </label>
      </div>
      <label>Otros:</label>
      <textarea name="modalidad_otros" placeholder="especificar" id="modalidad_otros" class="form-control" rows="2" cols="20"></textarea>

      </div>
  </div>


  <div class="form-row">
    <div class="form-group col-md-12">
        <label for="">A20.	¿Cuál es su modalidad preferida para capacitarse?  </label>
      <select class="form-control " id="mod_capacitacion" required name="mod_capacitacion" >
       <option value="">Seleccione</option>
       <option value="Presencial">Presencial</option>
       <option value="Online - clases en vivo"> Online - clases en vivo</option>
       <option value="Online - Blended (Vivo + Grabado)">Online - Blended (Vivo + Grabado)</option>
       <option value="Online - Clases grabadas">Online - Clases grabadas</option>
       <option value="Otros">Otros</option>
      </select>
      </div>
  </div>
   <div class="form-row" id="div16_otros" >
    <div class="form-group col-md-12">
  <label>Otro:</label>
  <textarea name="mod_capacitacion_otros" placeholder="especificar" id="mod_capacitacion_otros" class="form-control" rows="2" cols="20"></textarea>
    </div>

  </div>

<!--  -->
<p>  <label for="">A21.	En una escala, donde 1 es Totalmente Insatisfecho y 10 es Totalmente Satisfecho</label></p>
<div class="form-row">
          <div class="form-group col-md-12">

          <div class="d-flex justify-content-between">
                  <label>¿Qué tan satisfecho se encuentra con su <b>trabajo actual?</b>  </label>
                  <div class="form-group">
                    <input class="radio-inline" required name="nivel_satisfaccion_trabajo" value="1" type="radio"> 1
                    <input class="radio-inline" required name="nivel_satisfaccion_trabajo" value="2" type="radio"> 2
                    <input class="radio-inline" required name="nivel_satisfaccion_trabajo" value="3" type="radio"> 3
                    <input class="radio-inline" required name="nivel_satisfaccion_trabajo" value="4" type="radio"> 4
                    <input class="radio-inline" required name="nivel_satisfaccion_trabajo" value="5" type="radio"> 5
                    <input class="radio-inline" required name="nivel_satisfaccion_trabajo" value="6" type="radio"> 6
                    <input class="radio-inline" required name="nivel_satisfaccion_trabajo" value="7" type="radio"> 7
                    <input class="radio-inline" required name="nivel_satisfaccion_trabajo" value="8" type="radio"> 8
                    <input class="radio-inline" required name="nivel_satisfaccion_trabajo" value="9" type="radio"> 9
                    <input class="radio-inline" required name="nivel_satisfaccion_trabajo" value="10" type="radio"> 10
                    <input class="radio-inline" required name="nivel_satisfaccion_trabajo" value="NS/NP" type="radio"> NS/NP

                  </div>
                </div>
                      </div>
  </div>
  <div class="form-row">
            <div class="form-group col-md-12">

            <div class="d-flex justify-content-between">
                    <label>¿Qué tan satisfecho está con su <b>horario de trabajo?</b>   </label>
                    <div class="form-group">
                      <input class="radio-inline" required name="nivel_satisfaccion_horario" value="1" type="radio"> 1
                      <input class="radio-inline" required name="nivel_satisfaccion_horario" value="2" type="radio"> 2
                      <input class="radio-inline" required name="nivel_satisfaccion_horario" value="3" type="radio"> 3
                      <input class="radio-inline" required name="nivel_satisfaccion_horario" value="4" type="radio"> 4
                      <input class="radio-inline" required name="nivel_satisfaccion_horario" value="5" type="radio"> 5
                      <input class="radio-inline" required name="nivel_satisfaccion_horario" value="6" type="radio"> 6
                      <input class="radio-inline" required name="nivel_satisfaccion_horario" value="7" type="radio"> 7
                      <input class="radio-inline" required name="nivel_satisfaccion_horario" value="8" type="radio"> 8
                      <input class="radio-inline" required name="nivel_satisfaccion_horario" value="9" type="radio"> 9
                      <input class="radio-inline" required name="nivel_satisfaccion_horario" value="10" type="radio"> 10
                      <input class="radio-inline" required name="nivel_satisfaccion_horario" value="NS/NP" type="radio"> NS/NP

                    </div>
                  </div>
                        </div>
    </div>
    <div class="form-row">
              <div class="form-group col-md-12">

              <div class="d-flex justify-content-between">
                      <label>¿Qué tan satisfecho está con su <b>remuneración</b> actual?   </label>
                      <div class="form-group">
                        <input class="radio-inline" required name="nivel_satisfaccion_remuneracion" value="1" type="radio"> 1
                        <input class="radio-inline" required name="nivel_satisfaccion_remuneracion" value="2" type="radio"> 2
                        <input class="radio-inline" required name="nivel_satisfaccion_remuneracion" value="3" type="radio"> 3
                        <input class="radio-inline" required name="nivel_satisfaccion_remuneracion" value="4" type="radio"> 4
                        <input class="radio-inline" required name="nivel_satisfaccion_remuneracion" value="5" type="radio"> 5
                        <input class="radio-inline" required name="nivel_satisfaccion_remuneracion" value="6" type="radio"> 6
                        <input class="radio-inline" required name="nivel_satisfaccion_remuneracion" value="7" type="radio"> 7
                        <input class="radio-inline" required name="nivel_satisfaccion_remuneracion" value="8" type="radio"> 8
                        <input class="radio-inline" required name="nivel_satisfaccion_remuneracion" value="9" type="radio"> 9
                        <input class="radio-inline" required name="nivel_satisfaccion_remuneracion" value="10" type="radio"> 10
                        <input class="radio-inline" required name="nivel_satisfaccion_remuneracion" value="NS/NP" type="radio"> NS/NP

                      </div>
                    </div>
                          </div>
      </div>
<!--  -->

  <div class="form-row">
    <div class="form-group col-md-6">

      <label>	A21.	¿Cuál considera es el mejor centro para capacitarse en temas de analítica de datos? </label>
      <div class="form-check">
        <input class="form-check-input require-three" type="checkbox" value="1" id="institutos_nacionales" name="capacitacion_institutos_nacionales">
        <label class="form-check-label" >
      Institutos especializados nacionales
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input require-three" type="checkbox" value="1" id="capacitacion_institutos_extranjeros" name="capacitacion_institutos_extranjeros">
        <label class="form-check-label" >
      Institutos especializados extranjeros
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input require-three" type="checkbox" value="1" id="capacitacion_Unacionales" name="capacitacion_Unacionales">
        <label class="form-check-label" >
      Universidades nacionales
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input require-three" type="checkbox" value="1" id="capacitacion_Uextranjeros" name="capacitacion_Uextranjeros">
        <label class="form-check-label" >
        Universidades extranjeras
        </label>
      </div>

      <div class="form-check">
        <input class="form-check-input require-three" type="checkbox" value="1" id="capacitacion_coursera" name="capacitacion_coursera">
        <label class="form-check-label" >
      Plataforma: Coursera
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input require-three" type="checkbox" value="1" id="capacitacion_platzi" name="capacitacion_platzi">
        <label class="form-check-label" >
      Plataforma: Platzi
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input require-three" type="checkbox" value="1" id="capacitacion_udemy" name="capacitacion_udemy">
        <label class="form-check-label" >
  Plataforma: Udemy
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input require-three" type="checkbox" value="1" id="capacitacion_netzum" name="capacitacion_netzum">
        <label class="form-check-label" >
      Plataforma: Netzum
        </label>
      </div>
      </div>

      <div class="form-group col-md-6">
<br>
        <label>	&nbsp;</label>

        <div class="form-check">
          <input class="form-check-input require-three" type="checkbox" value="1" id="capacitacion_edx" name="capacitacion_edx">
          <label class="form-check-label" >
  Plataforma: edX
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input require-three" type="checkbox" value="1" id="capacitacion_datacamp" name="capacitacion_datacamp">
          <label class="form-check-label" >
        Plataforma: Datacamp
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input require-three" type="checkbox" value="1" id="capacitacion_khan" name="capacitacion_khan">
          <label class="form-check-label" >
        Plataforma: Khan Academy
          </label>
        </div>

        <div class="form-check">
          <input class="form-check-input require-three" type="checkbox" value="1" id="capacitacion_Codeacademy" name="capacitacion_Codeacademy">
          <label class="form-check-label" >
      Plataforma: Codeacademy
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input require-three" type="checkbox" value="1" id="capacitacion_Kagle" name="capacitacion_Kagle">
          <label class="form-check-label" >
      Plataforma: Kagle
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input require-three" type="checkbox" value="1" id="capacitacion_Analytics_Vidhya" name="capacitacion_Analytics_Vidhya">
          <label class="form-check-label" >
    Plataforma: Analytics Vidhya
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input require-three" type="checkbox" value="1" id="capacitacion_autodidacta" name="capacitacion_autodidacta">
          <label class="form-check-label" >
  De forma autodidacta
          </label>
        </div>
        </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-12">
  <label> Otros :</label>
  <textarea name="capacitacion_otros" id="capacitacion_otros" class="form-control" placeholder="Especificar" rows="2" cols="5"></textarea>
    </div>
</div>
<!-- <div class="form-row">
  <div class="form-group col-md-12">
<label>A19.	¿Por qué considera que la institución (institución mencionada en la pregunta A17) es la mejor?</label>
<input type="text" class="form-control" name="consideracion_institucion" id="consideracion_institucion" placeholder="Comente">
  </div>
</div> -->

<div class="form-row">
  <div class="form-group col-md-12">
<u><h5>B. HERRAMIENTAS TECNOLÓGICAS</h5></u>

  </div>
</div>
<p>  <label for="">B1.	En una escala del 1al 10, donde 1 es Nada importante y 10 es Muy importante, ¿Qué tan importante son las siguientes herramientas tecnológicas para la ANALÍTICA DE DATOS?</label></p>
<div class="form-row">
          <div class="form-group col-md-12">

          <div class="d-flex justify-content-between">
                  <label> <b>B1.1 Bases de datos</b> </label>
                  <div class="form-group">
                    <input class="radio-inline" required name="bd" value="1" type="radio"> 1
                    <input class="radio-inline" required name="bd" value="2" type="radio"> 2
                    <input class="radio-inline" required name="bd" value="3" type="radio"> 3
                    <input class="radio-inline" required name="bd" value="4" type="radio"> 4
                    <input class="radio-inline" required name="bd" value="5" type="radio"> 5
                    <input class="radio-inline" required name="bd" value="6" type="radio"> 6
                    <input class="radio-inline" required name="bd" value="7" type="radio"> 7
                    <input class="radio-inline" required name="bd" value="8" type="radio"> 8
                    <input class="radio-inline" required name="bd" value="9" type="radio"> 9
                    <input class="radio-inline" required  name="bd" value="10" type="radio"> 10
                    <input class="radio-inline" required name="bd" value="NS/NP" type="radio"> NS/NP

                  </div>
                </div>
                      </div>
  </div>
  <div class="form-row">
                      <div class="form-group col-md-12">

                        <div class="d-flex justify-content-between">
                                <label class="Bold"> <b>B1.2 Visualización</b> </label>
                                <div class="form-group">
                                  <input class="radio-inline" required name="vizualizacion" value="1" type="radio"> 1
                                  <input class="radio-inline" required name="vizualizacion" value="2" type="radio"> 2
                                  <input class="radio-inline" required name="vizualizacion" value="3" type="radio"> 3
                                  <input class="radio-inline" required name="vizualizacion" value="4" type="radio"> 4
                                  <input class="radio-inline" required name="vizualizacion" value="5" type="radio"> 5
                                  <input class="radio-inline" required name="vizualizacion" value="6" type="radio"> 6
                                  <input class="radio-inline" required name="vizualizacion" value="7" type="radio"> 7
                                  <input class="radio-inline" required name="vizualizacion" value="8" type="radio"> 8
                                  <input class="radio-inline" required name="vizualizacion" value="9" type="radio"> 9
                                  <input class="radio-inline" required name="vizualizacion" value="10" type="radio"> 10
                                  <input class="radio-inline" required name="vizualizacion" value="NS/NP" type="radio"> NS/NP

                                </div>
                              </div>
                        </div>
    </div>

    <div class="form-row">
                        <div class="form-group col-md-12">


              <div class="d-flex justify-content-between">
                        <label><b>B1.3 Herramientas ETL</b> </label>
                      <div class="form-group">
                        <input class="radio-inline" required name="etl" value="1" type="radio"> 1
                        <input class="radio-inline" required name="etl" value="2" type="radio"> 2
                        <input class="radio-inline" required name="etl" value="3" type="radio"> 3
                        <input class="radio-inline" required name="etl" value="4" type="radio"> 4
                        <input class="radio-inline" required name="etl" value="5" type="radio"> 5
                        <input class="radio-inline" required name="etl" value="6" type="radio"> 6
                        <input class="radio-inline" required name="etl" value="7" type="radio"> 7
                        <input class="radio-inline" required name="etl" value="8" type="radio"> 8
                        <input class="radio-inline" required name="etl" value="9" type="radio"> 9
                        <input class="radio-inline" required name="etl" value="10" type="radio"> 10
                        <input class="radio-inline" required name="etl" value="NS/NP" type="radio"> NS/NP

                      </div>
                    </div>

                          </div>
      </div>

      <div class="form-row">
                          <div class="form-group col-md-12">

                <div class="d-flex justify-content-between">
                          <label> <b>B1.4 Programación</b> </label>
                        <div class="form-group">
                          <input class="radio-inline" required name="programacion" value="1" type="radio"> 1
                          <input class="radio-inline" required name="programacion" value="2" type="radio"> 2
                          <input class="radio-inline" required name="programacion" value="3" type="radio"> 3
                          <input class="radio-inline" required name="programacion" value="4" type="radio"> 4
                          <input class="radio-inline" required name="programacion" value="5" type="radio"> 5
                          <input class="radio-inline" required name="programacion" value="6" type="radio"> 6
                          <input class="radio-inline" required name="programacion" value="7" type="radio"> 7
                          <input class="radio-inline" required name="programacion" value="8" type="radio"> 8
                          <input class="radio-inline" required name="programacion" value="9" type="radio"> 9
                          <input class="radio-inline" required name="programacion" value="10" type="radio"> 10
                          <input class="radio-inline" required name="programacion" value="NS/NP" type="radio"> NS/NP

                        </div>
                      </div>
                            </div>
        </div>


        <div class="form-row">
                            <div class="form-group col-md-12">

                                  <div class="d-flex justify-content-between">
                                            <label> <b>B1.5 Herramientas Analíticas</b> </label>
                                          <div class="form-group">
                                            <input class="radio-inline" required name="analiticas" value="1" type="radio"> 1
                                            <input class="radio-inline" required name="analiticas" value="2" type="radio"> 2
                                            <input class="radio-inline" required name="analiticas" value="3" type="radio"> 3
                                            <input class="radio-inline" required name="analiticas" value="4" type="radio"> 4
                                            <input class="radio-inline" required name="analiticas" value="5" type="radio"> 5
                                            <input class="radio-inline" required name="analiticas" value="6" type="radio"> 6
                                            <input class="radio-inline" required name="analiticas" value="7" type="radio"> 7
                                            <input class="radio-inline" required name="analiticas" value="8" type="radio"> 8
                                            <input class="radio-inline" required name="analiticas" value="9" type="radio"> 9
                                            <input class="radio-inline" required name="analiticas" value="10" type="radio"> 10
                                            <input class="radio-inline" required name="analiticas" value="NS/NP" type="radio"> NS/NP

                                          </div>
                                        </div>
                              </div>
          </div>

          <div class="form-row">
                              <div class="form-group col-md-12">


                    <div class="d-flex justify-content-between">
                    <label> <b>B1.6 Tecnologías Cloud</b> </label>
                            <div class="form-group">
                              <input class="radio-inline" required name="cloud" value="1" type="radio"> 1
                              <input class="radio-inline" required name="cloud" value="2" type="radio"> 2
                              <input class="radio-inline" required name="cloud" value="3" type="radio"> 3
                              <input class="radio-inline" required name="cloud" value="4" type="radio"> 4
                              <input class="radio-inline" required name="cloud" value="5" type="radio"> 5
                              <input class="radio-inline" required name="cloud" value="6" type="radio"> 6
                              <input class="radio-inline" required name="cloud" value="7" type="radio"> 7
                              <input class="radio-inline" required name="cloud" value="8" type="radio"> 8
                              <input class="radio-inline" required name="cloud" value="9" type="radio"> 9
                              <input class="radio-inline" required name="cloud" value="10" type="radio"> 10
                              <input class="radio-inline" required name="cloud" value="NS/NP" type="radio"> NS/NP

                            </div>
                          </div>
                                </div>
            </div>
            <div class="form-row">
                                <div class="form-group col-md-12">


                      <div class="d-flex justify-content-between">
                      <label> <b>B1.7 Big Data</b> </label>
                              <div class="form-group">
                                <input class="radio-inline" required name="big_data" value="1" type="radio"> 1
                                <input class="radio-inline" required name="big_data" value="2" type="radio"> 2
                                <input class="radio-inline" required name="big_data" value="3" type="radio"> 3
                                <input class="radio-inline" required name="big_data" value="4" type="radio"> 4
                                <input class="radio-inline" required name="big_data" value="5" type="radio"> 5
                                <input class="radio-inline" required name="big_data" value="6" type="radio"> 6
                                <input class="radio-inline" required name="big_data" value="7" type="radio"> 7
                                <input class="radio-inline" required name="big_data" value="8" type="radio"> 8
                                <input class="radio-inline" required name="big_data" value="9" type="radio"> 9
                                <input class="radio-inline" required name="big_data" value="10" type="radio"> 10
                                <input class="radio-inline" required name="big_data" value="NS/NP" type="radio"> NS/NP

                              </div>
                            </div>
                                  </div>
              </div>


              <div class="form-row">
                <div class="form-group col-md-6">

                  <label>B2.	Qué herramientas / Tecnologías para ANALÍTICA DE DATOS sabes utilizar?  </label>
                  <div class="form-check">
                    <input class="form-check-input require-three" type="checkbox" value="1" id="herramientas_SPSS" name="herramientas_SPSS">
                    <label class="form-check-label" >
                  SPSS
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input require-three" type="checkbox" value="1" id="herramientas_SAS" name="herramientas_SAS">
                    <label class="form-check-label" >
                SAS
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input require-three" type="checkbox" value="1" id="herramientas_MINITAB" name="herramientas_MINITAB">
                    <label class="form-check-label" >
              MINITAB
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input require-three" type="checkbox" value="1" id="herramientas_RAPIDMINER" name="herramientas_RAPIDMINER">
                    <label class="form-check-label" >
                  RAPIDMINER
                    </label>
                  </div>

                  <div class="form-check">
                    <input class="form-check-input require-three" type="checkbox" value="1" id="herramientas_R" name="herramientas_R">
                    <label class="form-check-label" >
                R
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input require-three" type="checkbox" value="1" id="herramientas_PYTHON" name="herramientas_PYTHON">
                    <label class="form-check-label" >
                PYTHON
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input require-three" type="checkbox" value="1" id="herramientas_EXCEL" name="herramientas_EXCEL">
                    <label class="form-check-label" >
            EXCEL
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input require-three" type="checkbox" value="1" id="herramientas_ANACONDA" name="herramientas_ANACONDA">
                    <label class="form-check-label" >
                  ANACONDA
                    </label>
                  </div>
                  </div>

                  <div class="form-group col-md-6">
            <br>
                    <label>	&nbsp;</label>

                    <div class="form-check">
                      <input class="form-check-input require-three" type="checkbox" value="1" id="herramientas_SQL" name="herramientas_SQL">
                      <label class="form-check-label" >
              SQL
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input require-three" type="checkbox" value="1" id="herramientas_ORACLE" name="herramientas_ORACLE">
                      <label class="form-check-label" >
                ORACLE
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input require-three" type="checkbox" value="1" id="herramientas_TENSORFLOW" name="herramientas_TENSORFLOW">
                      <label class="form-check-label" >
                TENSORFLOW
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input require-three" type="checkbox" value="1" id="herramientas_KERAS" name="herramientas_KERAS">
                      <label class="form-check-label" >
                KERAS
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input require-three" type="checkbox" value="1" id="herramientas_POWER_BI" name="herramientas_POWER_BI">
                      <label class="form-check-label" >
                  POWER BI
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input require-three" type="checkbox" value="1" id="herramientas_TABLEAU" name="herramientas_TABLEAU">
                      <label class="form-check-label" >
              TABLEAU
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input require-three" type="checkbox" value="1" id="herramientas_APACHE_SPARK" name="herramientas_APACHE_SPARK">
                      <label class="form-check-label" >
            APACHE SPARK
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input require-three" type="checkbox" value="1" id="herramientas_NINGUNA" name="herramientas_NINGUNA">
                      <label class="form-check-label" >
        NINGUNA
                      </label>
                    </div>
                    </div>
                    <div class="form-group col-md-12">
                  <label>Otros:</label>
                  <textarea name="herramientas_otros" placeholder="especificar" id="herramientas_otros" class="form-control" rows="2" cols="20"></textarea>
                    </div>
              </div>



              <div class="form-row">
                <div class="form-group col-md-6">

                  <label>B3.	¿Cuáles de ellas utilizas actualmente en tu trabajo?  </label>
                  <div class="form-check">
                    <input class="form-check-input require-three" type="checkbox" value="1" id="uso_actual_SPSS" name="uso_actual_SPSS">
                    <label class="form-check-label" >
                  SPSS
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input require-three" type="checkbox" value="1" id="uso_actual_SAS" name="uso_actual_SAS">
                    <label class="form-check-label" >
                SAS
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input require-three" type="checkbox" value="1" id="uso_actual_MINITAB" name="uso_actual_MINITAB">
                    <label class="form-check-label" >
              MINITAB
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input require-three" type="checkbox" value="1" id="uso_actual_RAPIDMINER" name="uso_actual_RAPIDMINER">
                    <label class="form-check-label" >
                  RAPIDMINER
                    </label>
                  </div>

                  <div class="form-check">
                    <input class="form-check-input require-three" type="checkbox" value="1" id="uso_actual_R" name="uso_actual_R">
                    <label class="form-check-label" >
                R
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input require-three" type="checkbox" value="1" id="uso_actual_PYTHON" name="uso_actual_PYTHON">
                    <label class="form-check-label" >
                PYTHON
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input require-three" type="checkbox" value="1" id="uso_actual_EXCEL" name="uso_actual_EXCEL">
                    <label class="form-check-label" >
            EXCEL
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input require-three" type="checkbox" value="1" id="uso_actual_ANACONDA" name="uso_actual_ANACONDA">
                    <label class="form-check-label" >
                  ANACONDA
                    </label>
                  </div>
                  </div>

                  <div class="form-group col-md-6">
            <br>


                    <div class="form-check">
                      <input class="form-check-input require-three" type="checkbox" value="1" id="uso_actual_SQL" name="uso_actual_SQL">
                      <label class="form-check-label" >
              SQL
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input require-three" type="checkbox" value="1" id="uso_actual_ORACLE" name="uso_actual_ORACLE">
                      <label class="form-check-label" >
                ORACLE
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input require-three" type="checkbox" value="1" id="uso_actual_TENSORFLOW" name="uso_actual_TENSORFLOW">
                      <label class="form-check-label" >
                TENSORFLOW
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input require-three" type="checkbox" value="1" id="uso_actual_KERAS" name="uso_actual_KERAS">
                      <label class="form-check-label" >
                KERAS
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input require-three" type="checkbox" value="1" id="uso_actual_POWER_BI" name="uso_actual_POWER_BI">
                      <label class="form-check-label" >
                  POWER BI
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input require-three" type="checkbox" value="1" id="uso_actual_TABLEAU" name="uso_actual_TABLEAU">
                      <label class="form-check-label" >
              TABLEAU
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input require-three" type="checkbox" value="1" id="uso_actual_APACHE_SPARK" name="uso_actual_APACHE_SPARK">
                      <label class="form-check-label" >
            APACHE SPARK
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input require-three" type="checkbox" value="1" id="uso_actual_NINGUNA" name="uso_actual_NINGUNA">
                      <label class="form-check-label" >
        NINGUNA
                      </label>
                    </div>
                    </div>
                    <div class="form-group col-md-12">
                  <label>Otros:</label>
                  <textarea name="uso_actual_otro" placeholder="especificar" id="uso_actual_otro" class="form-control" rows="2" cols="20"></textarea>
                    </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-12">
<label>B4.	¿Cuál de las herramientas o tecnologías para ANALÍTICA DE DATOS consideras que es la mejor? </label>
<select class="form-control" id="mejor_herramienta" required name="mejor_herramienta">
  <option value="">Seleccione</option>
  <option value="SPSS">SPSS</option>
  <option value="SAS">SAS</option>
  <option value="MINITAB">MINITAB</option>
  <option value="RAPIDMINER">RAPIDMINER</option>
  <option value="R">R</option>
  <option value="PYTHON">PYTHON</option>
  <option value="EXCEL">EXCEL</option>
  <option value="ANACONDA">ANACONDA</option>
  <option value="SQL">SQL</option>
  <option value="ORACLE">ORACLE</option>
  <option value="TENSORFLOW">TENSORFLOW</option>
  <option value="KERAS">KERAS</option>
  <option value="POWER BI">POWER BI</option>
  <option value="TABLEAU">TABLEAU</option>
  <option value="APACHE SPARK">APACHE SPARK</option>
  <option value="Ninguna">Ninguna</option>
  <option value="Otros">Otros</option>

</select>

                </div>
          </div>

          <div class="form-row" id="divB4_otros" >
           <div class="form-group col-md-12">
         <label>Otros:</label>
         <textarea name="mejor_herramienta_otros" placeholder="especificar" id="mejor_herramienta_otros" class="form-control" rows="2" cols="20"></textarea>
           </div>

         </div>

   <div class="form-row">
  <div class="form-group col-md-12">
       <label>B5.	¿Qué métodos y algoritmos de analítica de datos/ aprendizaje automático suele utilizar para una aplicación del mundo real?  </label>
   </div>
</div>
          <div class="form-row">
            <div class="form-group col-md-6">


              <div class="form-check">
                <input class="form-check-input require-three" type="checkbox" value="1" id="metodoAutomatico_Regression" name="metodoAutomatico_Regression">
                <label class="form-check-label" >
          Regression
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input require-three" type="checkbox" value="1" id="metodoAutomatico_Decision_Trees" name="metodoAutomatico_Decision_Trees">
                <label class="form-check-label" >
        Decision Trees
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input require-three" type="checkbox" value="1" id="metodoAutomatico_Clustering" name="metodoAutomatico_Clustering">
                <label class="form-check-label" >
          Clustering
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input require-three" type="checkbox" value="1" id="metodoAutomatico_PCA" name="metodoAutomatico_PCA">
                <label class="form-check-label" >
              PCA
                </label>
              </div>

              <div class="form-check">
                <input class="form-check-input require-three" type="checkbox" value="1" id="metodoAutomatico_Visualizacion_datos" name="metodoAutomatico_Visualizacion_datos">
                <label class="form-check-label" >
            Visualización de datos
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input require-three" type="checkbox" value="1" id="metodoAutomatico_Estadistica_descriptiva" name="metodoAutomatico_Estadistica_descriptiva">
                <label class="form-check-label" >
        Estadística descriptiva
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input require-three" type="checkbox" value="1" id="metodoAutomatico_Vector_Machine" name="metodoAutomatico_Vector_Machine">
                <label class="form-check-label" >
      Support Vector Machine
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input require-three" type="checkbox" value="1" id="metodoAutomatico_Random_Forest" name="metodoAutomatico_Random_Forest">
                <label class="form-check-label" >
      Random Forest
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input require-three" type="checkbox" value="1" id="metodoAutomatico_Nearest_Neighbours" name="metodoAutomatico_Nearest_Neighbours">
                <label class="form-check-label" >
        K – Nearest Neighbours
                </label>
              </div>
              </div>

              <div class="form-group col-md-6">

                    <br>


                <div class="form-check">
                  <input class="form-check-input require-three" type="checkbox" value="1" id="metodoAutomatico_Times_Series" name="metodoAutomatico_Times_Series">
                  <label class="form-check-label" >
            Times Series
                  </label>
                </div>

                <div class="form-check">
                  <input class="form-check-input require-three" type="checkbox" value="1" id="metodoAutomatico_Ensemble_Methods" name="metodoAutomatico_Ensemble_Methods">
                  <label class="form-check-label" >
            Ensemble Methods
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input require-three" type="checkbox" value="1" id="metodoAutomatico_Boosting" name="metodoAutomatico_Boosting">
                  <label class="form-check-label" >
              Boosting
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input require-three" type="checkbox" value="1" id="metodoAutomatico_Text_Minng" name="metodoAutomatico_Text_Minng">
                  <label class="form-check-label" >
          Text Minng
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input require-three" type="checkbox" value="1" id="metodoAutomatico_Neural_Networds" name="metodoAutomatico_Neural_Networds">
                  <label class="form-check-label" >
      Neural Networds
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input require-three" type="checkbox" value="1" id="metodoAutomatico_Boosted_Machines" name="metodoAutomatico_Boosted_Machines">
                  <label class="form-check-label" >
    Gradient Boosted Machines
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input require-three" type="checkbox" value="1" id="metodoAutomatico_Anomaly_Detection" name="metodoAutomatico_Anomaly_Detection">
                  <label class="form-check-label" >
    Anomaly Detection
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input require-three" type="checkbox" value="1" id="metodoAutomatico_Recommendation_systems" name="metodoAutomatico_Recommendation_systems">
                  <label class="form-check-label" >
    Recommendation systems
                  </label>
                </div>
                </div>
                <div class="form-group col-md-12">
              <label>Otros:</label>
              <textarea name="metodoAutomatico_otros" placeholder="especificar" id="metodoAutomatico_otros" class="form-control" rows="2" cols="20"></textarea>
                </div>
          </div>


          <div class="form-row">
            <div class="form-group col-md-12">
<label>B6.	¿Qué métodos y algoritmos de ciencia de datos/ aprendizaje automático usó en el último año para una aplicación del mundo real?  </label>
<select class="form-control" required id="metodos_aprendizaje" name="metodos_aprendizaje">
<option value="">Seleccione</option>
<option value="Regression">Regression</option>
<option value="Decision Trees">Decision Trees</option>
<option value="Clustering">Clustering</option>
<option value="PCA">PCA</option>
<option value="Visualización de datos">Visualización de datos</option>
<option value="Estadística descriptiva">Estadística descriptiva</option>
<option value="Support Vector Machine">Support Vector Machine</option>
<option value="Random Forest">Random Forest</option>
<option value="K – Nearest Neighbours">K – Nearest Neighbours</option>
<option value="Times Series">Times Series</option>
<option value="Ensemble Methods">Ensemble Methods</option>
<option value="Boosting">Boosting</option>
<option value="Text Minng">Text Minng</option>
<option value="Neural Networds">Neural Networds</option>
<option value="Gradient Boosted Machines">Gradient Boosted Machines</option>
<option value="Anomaly Detection">Anomaly Detection</option>
<option value="Recommendation systems">Recommendation systems</option>
<option value="Ninguna">Ninguna</option>
<option value="Otros">Otros</option>

</select>
            </div>
      </div>

      <div class="form-row" id="divB6_otros" >
       <div class="form-group col-md-12">
     <label>Otros:</label>
     <textarea name="metodos_aprendizaje_otros" placeholder="especificar" id="metodos_aprendizaje_otros" class="form-control" rows="2" cols="20"></textarea>
       </div>

     </div>
<!--  -->

<!-- Modal -->


<div class="form-row">
  <div style="text-align:center" class="form-group col-md-12">

    <!-- <div class="form-check" style="text-align:left">
      <input class="form-check-input require-three" type="checkbox" required value="1" id="capacitacion_edx" name="capacitacion_edx">
      <label class="form-check-label" >
Acepto que DMC utilice mis datos para temas analíticos.
      </label>
    </div> -->
    <div class="form-check" style="text-align:left">
      <input class="form-check-input require-three" required type="checkbox" value="1" id="capacitacion_edx" name="capacitacion_edx">
      <label class="form-check-label" >
He leído y acepto los <a href="#" data-toggle="modal" data-target="#myModal">términos y condiciones</a>
      </label>
    </div>
    <!-- <div class="card">
    <div class="card-header">
    Correo electrónico
    </div>
    <div class="card-body">
      <input type="email" id="correo_respuesta" class="form-control" placeholder="Correo electrónico" name="correo_respuesta" >

      <br>


    </div>
  </div> -->
  <br>
      <button type="submit" class="btn btn-primary btn-envia" id="button">Enviar</button>

   </div>
   </div>

	</div>
  				</form>





        <!-- inicio registro exitoso -->
        <div id="exito">


<p style="text-align:center"> <b>¡Gracias por participar de este estudio!</b> </p>

<p> ¡Los resultados serán compartidos en el AI & Analytics Summit 2021 y por correo electrónico!</p>
<p>Revisa tu bandeja de entrada (incluida la bandeja de spam) para conocer más de las actividades gratuitas de las que podrás participar.</p>

<!-- <button type="button" class="btn btn-primary btn-nuevo" name="button">realizar nueva encuesta</button> -->
        </div>
        <!-- fin -->
</div>




  		</div>


  	</div>



</body>
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
$(document).ready(function()
{
$('#div10_otros').hide();
$('#div12_otros').hide();

$('#div13_otros').hide();

$('#div16_otros').hide();
$('#divB4_otros').hide();
$('#divB6_otros').hide();

// $('.vista_inicial').hide();
//  $('#exito').show();
$('#exito').hide();


});


    $('.btn-nuevo').click(function(){

      $('.vista_inicial').show();

       $('#exito').hide();


    });
//Presencial
 $('#sector_trabajo').change(function(){
     var resultado = $('#sector_trabajo').val();
   if(resultado == 'Otros'){
    $('#div10_otros').show();
 }else {
$('#div10_otros').hide();
 }
 });
//Aún no he laborado
$('#frase_laboral').change(function(){
    var resultado = $('#frase_laboral').val();
    if (resultado == 'Aún no he laborado') {
document.getElementById("rango_remuneracion_mensual").focus();
     //cantidad_trabajadores
     $('#cantidad_trabajadores').attr('disabled', 'disabled');
       $('#puesto_trabajo').attr('disabled', 'disabled');
      $('#sector_trabajo').attr('disabled', 'disabled');

      //
      $('#cantidad_trabajadores').val('');
        $('#puesto_trabajo').val('');
       $('#sector_trabajo').val('');
    }else {
      $('#sector_trabajo').removeAttr('disabled');
        $('#puesto_trabajo').removeAttr('disabled');
        $('#cantidad_trabajadores').removeAttr('disabled');
    }



 });

 $('#actividad_laboral').change(function(){
     var resultado = $('#actividad_laboral').val();
    if(resultado == 'Otro'){
     $('#div13_otros').show();
  }else {
 $('#div13_otros').hide();
  }

 });


 $('#puesto_trabajo').change(function(){
     var puesto_trabajo = $('#puesto_trabajo').val();
   if(puesto_trabajo == 'Otros'){
    $('#div12_otros').show();
 }else {
$('#div12_otros').hide();
 }
 });

 $('#mod_capacitacion').change(function(){
     var mod_capacitacion = $('#mod_capacitacion').val();
   if(mod_capacitacion == 'Otros'){
    $('#div16_otros').show();
 }else {
$('#div16_otros').hide();
 }
 });
//
$('#mejor_herramienta').change(function(){
    var mejor_herramienta = $('#mejor_herramienta').val();
  if(mejor_herramienta == 'Otros'){
   $('#divB4_otros').show();
}else {
$('#divB4_otros').hide();
}
});


$('#metodos_aprendizaje').change(function(){
    var metodos_aprendizaje = $('#metodos_aprendizaje').val();
  if(metodos_aprendizaje == 'Otros'){
   $('#divB6_otros').show();
}else {
$('#divB6_otros').hide();
}
});
//registrar
$(document).on('submit','#form-agregar',function(e){


  parametros = $(this).serialize();

    $.ajax({
          url:'../suscripcion/controller/controller_cuestionario.php?op=registro',
          type:'POST',
          data:parametros,
            beforeSend: function() {
  $('.btn-envia').prop("disabled", true);
           },
         success:function(data){


 if (data == 'ok') {
   $('.btn-envia').prop("disabled", false);
   $('.vista_inicial').hide();
   $('#exito').show();
   $('#form-agregar')[0].reset();
 }else {
   alert("error al registrar");
 }



  }
   });

     e.preventDefault();
});



</script>

  </body>
</html>
