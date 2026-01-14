<?

//header("location:https://survey.dmc.pe/suscripcion/mensaje_cierre.php");

$paises = file_get_contents("https://gist.githubusercontent.com/Yizack/bbfce31e0217a3689c8d961a356cb10d/raw/107e0bdf27918adea625410af0d340e8fc1cd5bf/countries.json");  
$paises = json_decode($paises,TRUE);  

$codigo = $_GET["concurso"];

if($codigo == 1480 || $codigo ==""){

  $codigo = 1480;

  $linea1 = "Summit";

  //header("location:https://survey.dmc.pe/suscripcion/mensaje_cierre.php");

}else if($codigo == 1563){

  $linea1 = "Summit";

  //header("location:https://survey.dmc.pe/suscripcion/mensaje_cierre.php");

}else{

  $codigo = 1480;

  $linea1 = "Sumit";

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DMC ONLINE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://survey.dmc.pe/suscripcion/assets/css/intlTelInput.min.css">
  <style>
    label.is-invalid {
      display: contents;
      font-size: 12px;
      color: red;
    }

    .iti {
      width: 100%;
    }

    .iti .form-control {
      padding-top: 1.625rem;
    }

    .iti+label {
      opacity: .65;
      transform: scale(.85) translateY(-.5rem) translateX(.15rem);
    }

    .iti__flag-container {
      top: 22px;
      left: 7px !important;
    }





    .cont {
      width: 600px;

    }
  </style>

</head>

<body style="background: #005078;">
  <div class="container">
    <form class="row justify-content-md-center" id="form" name="form" method="post"
      action="controller/controller_suscrito_curso_gratis.php">
      <div class="col-md-8" style="background: white url(https://survey.dmc.pe/suscripcion/assets/img/particulas.png); background-repeat: repeat; background-size: contain;">
        <input type="hidden" id="pais" name="pais">
        <input type="hidden" id="celular" name="celular">
        <input type="hidden" id="curso" name="curso" value="<?=$codigo?>">
        <input type="hidden" id="rdc" name="rdc" value="x">
        <div style="width: 30%; margin: auto;">
          <? if($codigo !=1563){?>
          <img src="https://dmc.pe/uploads/logo2-dmc-2019.png" alt="" style="text-align: center; width: 100px; margin: 0; margin-top: 15px;">
          <?} else{?>
            <img src="https://certificaciones.dmc.pe/suscripcion/assets/img/summit-logo.png" alt="" style="text-align: center; width: 230px; margin: 0; margin-top: 15px;">
          <? } ?>
        </div>
        <div style="margin-top:20px;">

          <? if($codigo !=1563){?>
          <p>
            ¡Hola! Somos DMC, la comunidad líder en el Perú vinculada a la analítica de datos. En esta oportunidad te
            invitamos a participar de nuestro curso “<?=$linea1?>”.
          </p>
          <p>
            El curso consta de 12 horas académicas bajo la modalidad de sesiones en vivo y es totalmente gratuito. Tenemos 300 vacantes directas disponibles para las primeras personas en registrarse. Si no logras acceder a una vacante directa, ¡no te desanimes! Sortearemos 200 vacantes adicionales entre todas las personas registradas hasta el 19 de setiembre.
          </p>
          <p>
          De acceder a una de las vacantes directas o ser ganador de una de las vacantes adicionales, nos estaremos comunicando el día 20 de setiembre (fecha del sorteo) a través del correo que nos dejes para brindarte más información sobre el inicio de clases. ¡Así que apresúrate y mucha suerte!
          </p>
          <?} else{?>
            <p>¡Hola! El AI &amp; Analytics Summit es el evento analítico más grande del Perú, organizado por DMC Perú y ahora con proyección global. Serán 5 días de actividades, más de 30 conferencias, 4 paneles transformadores, 6 workshops y más de 50 ponentes nacionales e internacionales de empresas líderes como Microsoft, Apple, Facebook, Netflix, LinkedIn, FIFA, ESPN, NASA, entre otros.</p>
            <p>Al registrarte en este formulario estarás participando automáticamente por una de las 100 entradas dobles disponibles (50 para ciudadanos nacionales y 50 para extranjeros). La fecha límite de participación es el domingo 03 de octubre. De resultar uno de los ganadores, te enviaremos el lunes 04 de octubre un correo con los resultados. No pierdas la oportunidad de vivir la experiencia AI &amp; Analytics Summit 2021. ¡Mucha suerte!</p>
          <? } ?>
        </div>



        <div class="row g-2 mb-3">
          <div class="col-md">
            <div class="form-floating">
              <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres"
                pattern="[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}" required>
              <label for="nombres" id="nombres-error">Nombre Completo</label>
            </div>
          </div>
          <div class="col-md">
            <div class="form-floating">
              <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos"
                pattern="[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}" required>
              <label for="apellidos" id="apellidos-error">Apellidos</label>
            </div>
          </div>
        </div>
        <div class="row g-2 mb-3">
          <div class="col-md">
            <div class="form-floating">
              <select class="form-select" name="tDocumento" id="tDocumento" required>
                <option value="DNI">DNI</option>
                <option value="OTROS">OTROS</option>
              </select>
              <label for="floatingInputGrid">Tipo Documento</label>
            </div>
          </div>
          <div class="col-md">
            <div class="form-floating">
              <input type="text" class="form-control" id="num_documento" name="num_documento" placeholder="Número"
                required>
              <label for="floatingInputGrid">Número</label>
            </div>
          </div>
        </div>
        <div class="row g-2 mb-3">
          <div class="col-md">
            <div class="form-floating">
              <select class="form-select" name="sexo" id="sexo" required>
                <option value="M">Hombre</option>
                <option value="F">Mujer</option>
              </select>
              <label for="floatingInputGrid">Género</label>
            </div>
          </div>
          <div class="col-md">
            <div class="form-floating">
              <input type="text" class="form-control" id="phone" name="phone" required>
              <label for="floatingInputGrid">Celular</label>
            </div>
          </div>
        </div>
        <div class="row g-2 mb-3">
          <div class="col-md">
            <div class="form-floating">
              <input type="number" class="form-control" id="edad" name="edad" placeholder="Edad" required>
              <label for="floatingInputGrid">¿Me podría indicar su edad? (en años)</label>
            </div>
          </div>
          <div class="col-md">
            <div class="form-floating">
              <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" required>
              <label for="floatingInputGrid">Email</label>
            </div>
          </div>

        </div>
        <div class="row g-2 mb-3">
          <div class="col-md">
            <div class="form-floating">
            
            <select class="form-select" id="pais" name="pais" required aria-label="Floating label select example" >
              <option selected>Seleccionar</option>
              <? for ($i = 0; $i < count($paises["countries"]); $i++) { ?>
                <option value='<?=$paises["countries"][$i]["name_es"]?>'><?=$paises["countries"][$i]["name_es"]?></option>
              <? } ?>
            </select>
            <label for="floatingInputGrid">¿Cuál es su país de residencia?</label>
            </div>
          </div>
          <div class="col-md">
            <div class="form-floating">
              <input type="text" class="form-control" id="provincia" name="provincia" placeholder="cargo">
              <label for="floatingInputGrid">¿En qué ciudad vive actualmente?</label>
            </div>
          </div>
        </div>
        <? if($codigo !=1563){?>
        <div class="row g-2 mb-3">

          <div class="col-md">
            <label for="floatingInputGrid" class="form-label">¿Cuál de las siguientes frases describe mejor su situación laboral?</label>

            <select class="form-select" name="p1_9" id="p1_9" required>
              <option value="">Seleccione</option>
              <option value="1">Actualmente estoy laborando, mi ocupación principal es dependiente</option>
              <option value="2">Actualmente estoy laborando, mi ocupación principal es independiente</option>
              <option value="3">Actualmente no estoy laborando,
                pero sí he trabajado antes</option>
              <option value="4">Aún no he laborado</option>
            </select>


          </div>
        </div>
        <div class="row g-2 mb-3">
          <div class="col-md">
            <label for="floatingInputGrid" class="form-label">¿En que qué sector trabaja actualmente? Si no se encuentra trabajando actualmente, considerar las labores del último trabajo</label>
            <select class="form-select" name="sector" id="sector" required>
              <option value="">Seleccione</option>
              <option value="1">Consultoría</option>
              <option value="2">Telecomunicaciones</option>
              <option value="3">Banca</option>
              <option value="4">Retail</option>
              <option value="5">Minería</option>
              <option value="6">Industria</option>
              <option value="7">Seguros</option>
              <option value="8">Retail</option>
              <option value="9">Tecnologías de Información</option>
              <option value="98">Otro(Especificar)</option>
            </select>
            <input type="text" class="form-control" id="sector_otro" name="sector_otro" placeholder="¿Cuál?" style="margin-top: 10px;display: none;" >
          </div>
        </div>

        <div class="row g-2 mb-3">
          <div class="col-md">´
            <label for="floatingInputGrid" class="form-label">¿Qué cantidad de personas tiene la empresa donde labora actualmente? Si no se encuentra trabajando actualmente, considerar las labores del último trabajo</label>
            <select class="form-select  " name="cantidad_persona" id="cantidad_persona" required>
              <option value="">Seleccione</option>
              <option value="1">Menos o igual a 10</option>
              <option value="2">De 11 a 50</option>
              <option value="3">De 51 a 100</option>
              <option value="4">De 101 a 1,000</option>
              <option value="5">Más de 1,000</option>
              <option value="99">No Precisa</option>
            </select>
          </div>
        </div>
        <div class="row g-2 mb-3">
          <div class="col-md">
            <label for="floatingInputGrid" class="form-label">¿Qué puesto tiene actualmente en su trabajo? Si no se encuentra trabajando actualmente, considerar las labores del último trabajo</label>

            <select class="form-select  " name="cargo" id="cargo" required>
              <option value="">Seleccione</option>
              <option value="1">Practicante Preprofesional</option>
              <option value="2">Practicante Profesional</option>
              <option value="3">Asistente / Ejecutivo Jr</option>
              <option value="4">Analista / Ejecutivo Sr</option>
              <option value="5">Jefe / Sub Gerente</option>
              <option value="6">Gerente de área</option>
              <option value="7">Director / VP</option>
              <option value="8">Gerente general / Dueño empresa</option>
              <option value="98 ">Otro (Especificar):</option>
            </select>
            <input type="text" class="form-control" id="cargo_otro" name="cargo_otro" placeholder="¿Cuál?" style="margin-top: 10px;display: none;" >
          </div>
        </div>
        <!--<div class="row g-2 mb-3">
          <div> ¿Cuáles de las siguientes instituciones las reconoce como especialistas en análisis de datos?
          </div>
          <div class="col-md">
          <div class="form-check">
            <input class="form-check-input require-one" type="checkbox" value="1" id="cibertec" name="cibertec">
            <label class="form-check-label" for="cibertec">
              Cibertec
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-one" type="checkbox" value="1" id="uni" name="uni">
            <label class="form-check-label" for="uni">
              UNI
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-one" type="checkbox" value="1" id="utec" name="utec">
            <label class="form-check-label" for="utec">
              UTEC
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-one" type="checkbox" value="1" id="ricardo_palma" name="ricardo_palma">
            <label class="form-check-label" for="ricardo_palma">
              Ricardo Palma
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-one" type="checkbox" value="1" id="pucp" name="pucp">
            <label class="form-check-label" for="pucp">
              PUCP / CENTRUM
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-one" type="checkbox" value="1" id="dmc" name="dmc">
            <label class="form-check-label" for="dmc">
              DMC
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-one" type="checkbox" value="1" id="social_data_consulting"
              name="social_data_consulting">
            <label class="form-check-label" for="social_data_consulting">
              Social Data Consulting
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-one" type="checkbox" value="1" id="new_horizons" name="new_horizons">
            <label class="form-check-label" for="new_horizons">
              New Horizons Perú
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-one" type="checkbox" value="1" id="bsg" name="bsg">
            <label class="form-check-label" for="bsg">
              BSG Institute
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-one" type="checkbox" value="1" id="cedhinfo" name="cedhinfo">
            <label class="form-check-label" for="cedhinfo">
              CEDHINFO
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-one" type="checkbox" value="1" id="coursera" name="coursera">
            <label class="form-check-label" for="coursera">
              Coursera
            </label>
          </div>
          </div>
          <div class="col-md">
          <div class="form-check">
            <input class="form-check-input require-one" type="checkbox" value="1" id="platzi" name="platzi">
            <label class="form-check-label" for="platzi">
              Platzi
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-one" type="checkbox" value="1" id="udemy" name="udemy">
            <label class="form-check-label" for="udemy">
              Udemy
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-one" type="checkbox" value="1" id="netzum" name="netzum">
            <label class="form-check-label" for="netzum">
              Netzum
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-one" type="checkbox" value="1" id="edx" name="edx">
            <label class="form-check-label" for="edx">
              edX
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-one" type="checkbox" value="1" id="datacamp" name="datacamp">
            <label class="form-check-label" for="datacamp">
              Datacamp
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-one" type="checkbox" value="1" id="khan_academy" name="khan_academy">
            <label class="form-check-label" for="khan_academy">
              Khan Academy
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-one" type="checkbox" value="1" id="codeacademy" name="codeacademy">
            <label class="form-check-label" for="codeacademy">
              Codeacademy
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-one" type="checkbox" value="1" id="ninguna" name="ninguna">
            <label class="form-check-label" for="ninguna">
              Ninguna
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-one" type="checkbox" value="1" id="otro_institucion" name="otro_institucion">
            <label class="form-check-label" for="otro_institucion">
              Otro
            </label>
            <input type="text" class="form-control" id="otro_institucion_otro" name="otro_institucion_otro" placeholder="¿Cuál?" style="margin-top: 10px;display: none;" >
          </div>
          </div>

        </div>
        <div class="row g-2 mb-3">
          <div>¿En qué instituciones ha llevado algún tipo de capacitación en análisis de datos?</div>
          <div class="col-md">
          <div class="form-check">
            <input class="form-check-input require-two" type="checkbox" value="1" id="cibertec_p2" name="cibertec_p2">
            <label class="form-check-label" for="cibertec_p2">
              Cibertec
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-two" type="checkbox" value="1" id="uni_p2" name="uni_p2">
            <label class="form-check-label" for="uni_p2">
              UNI
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-two" type="checkbox" value="1" id="utec_p2" name="utec_p2">
            <label class="form-check-label" for="utec_p2">
              UTEC
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-two" type="checkbox" value="1" id="ricardo_palma_p2" name="ricardo_palma_p2">
            <label class="form-check-label" for="ricardo_palma_p2">
              Ricardo Palma
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-two" type="checkbox" value="1" id="pucp_p2" name="pucp_p2">
            <label class="form-check-label" for="pucp_p2">
              PUCP / CENTRUM
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-two" type="checkbox" value="1" id="dmc_p2" name="dmc_p2">
            <label class="form-check-label" for="dmc_p2">
              DMC
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-two" type="checkbox" value="1" id="social_data_consulting_p2"
              name="social_data_consulting_p2">
            <label class="form-check-label" for="social_data_consulting_p2">
              Social Data Consulting
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-two" type="checkbox" value="1" id="new_horizons_p2" name="new_horizons_p2">
            <label class="form-check-label" for="new_horizons_p2">
              New Horizons Perú
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-two" type="checkbox" value="1" id="bsg_p2" name="bsg_p2">
            <label class="form-check-label" for="bsg_p2">
              BSG Institute
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-two" type="checkbox" value="1" id="cedhinfo_p2" name="cedhinfo_p2">
            <label class="form-check-label" for="cedhinfo_p2">
              CEDHINFO
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-two" type="checkbox" value="1" id="coursera_p2" name="coursera_p2">
            <label class="form-check-label" for="coursera_p2">
              Coursera
            </label>
          </div>
          </div>
          <div class="col-md">
          <div class="form-check">
            <input class="form-check-input require-two" type="checkbox" value="1" id="platzi_p2" name="platzi_p2">
            <label class="form-check-label" for="platzi_p2">
              Platzi
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input require-two" type="checkbox" value="1" id="udemy_p2" name="udemy_p2">
            <label class="form-check-label" for="udemy_p2">
              Udemy
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-two" type="checkbox" value="1" id="netzum_p2" name="netzum_p2">
            <label class="form-check-label" for="netzum_p2">
              Netzum
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-two" type="checkbox" value="1" id="edx_p2" name="edx_p2">
            <label class="form-check-label" for="edx_p2">
              edX
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-two" type="checkbox" value="1" id="datacamp_p2" name="datacamp_p2">
            <label class="form-check-label" for="datacamp_p2">
              Datacamp
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-two" type="checkbox" value="1" id="khan_academy_p2" name="khan_academy_p2">
            <label class="form-check-label" for="khan_academy_p2">
              Khan Academy
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-two" type="checkbox" value="1" id="codeacademy_p2" name="codeacademy_p2">
            <label class="form-check-label" for="codeacademy_p2">
              Codeacademy
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-two" type="checkbox" value="1" id="ninguna_p2" name="ninguna_p2">
            <label class="form-check-label" for="ninguna_p2">
              Ninguna
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-two" type="checkbox" value="1" id="otro_institucion_p2"
              name="otro_institucion_p2">
            <label class="form-check-label" for="otro_institucion_p2">
              Otro
            </label>
            <input type="text" class="form-control" id="otro_institucion_p2_otro" name="otro_institucion_p2_otro" placeholder="¿Cuál?" style="margin-top: 10px;display: none;" >
          </div>
          
        </div>-->
        <div class="row g-2 mb-3">
          <div class="col-md">
            <label for="floatingInputGrid" class="form-label">P3. ¿Qué institución considera que es la mejor para llevar alguna capacitación en análisis de datos?</label>
            <select class="form-select" name="institucion_p3" id="institucion_p3" required>
              <option value="">Seleccione</option>
              <option value="1">Cibertec</option>
              <option value="2">UNI</option>
              <option value="3">UTEC</option>
              <option value="4">Ricardo Palma</option>
              <option value="5">PUCP / CENTRUM</option>
              <option value="6">DMC</option>
              <option value="7">Social Data Consulting</option>
              <option value="8">New Horizons Perú</option>
              <option value="9">BSG Institute</option>
              <option value="10">CEDHINFO</option>
              <option value="11">Coursera</option>
              <option value="12">Platzi</option>
              <option value="13">Udemy</option>
              <option value="14">Netzum</option>
              <option value="15">edX</option>
              <option value="16">Datacamp</option>
              <option value="17">Khan Academy</option>
              <option value="18">Codeacademy</option>
              <option value="98">Otro</option>
            </select>
            <input type="text" class="form-control" id="institucion_p3_otro" name="institucion_p3_otro" placeholder="¿Cuál?" style="margin-top: 10px;display: none;" >
          </div>
        </div>
        <div class="row g-2 mb-3">
          <div class="col-md">
            <div class="form-floating">
              <input type="text" class="form-control" id="p4" name="p4" placeholder="p4"
                pattern="[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}" required>
              <label for="nombres" id ="nom_p4">¿Por qué considera que la institución (institución mencionada en
                la pregunta P3) es la mejor?</label>
            </div>
          </div>
        </div>
        <div class="row g-2 mb-3">
          <div class="col-md">´
            <label for="floatingInputGrid" class="form-label">¿Qué tipo de capacitaciones ha tenido en análisis de datos?</label>
            <select class="form-select " name="tipo_capacitacion" id="tipo_capacitacion" required>
              <option value="">Seleccione</option>
              <option value="1">Gratuitas</option>
              <option value="2">Pagadas</option>
              <option value="3">Ambas</option>
            </select>
          </div>
        </div>
        <div class="row g-2 mb-3">
          <div class="col-md">´
            <label for="floatingInputGrid" class="form-label">¿Cuál es su modalidad preferida para capacitarse?</label>
            <select class="form-select " name="modalidad" id="modalidad" required>
              <option value="">Seleccione</option>
              <option value="1">Presencial</option>
              <option value="2">Online – Clases en vivo</option>
              <option value="3">Online – Blended (Vivo + Grabado)</option>
              <option value="3">Online – Clases grabadas</option>
              <option value="98">Otro</option>
            </select>
            <input type="text" class="form-control" id="modalidad_otro" name="modalidad_otro" placeholder="¿Cuál?" style="margin-top: 10px;display: none;" >

          </div>
        </div>
        <div class="row g-2 mb-3">
          <div>¿Qué tipo de cursos estaría interesado en aprender para mejorar su perfil profesional?</div>
          <div class="col-md">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="base_datos" name="base_datos">
            <label class="form-check-label" for="base_datos">
              Base de datos
            </label>
          </div>
          
          <div class="form-check">
            <input class="form-check-input require-three" type="checkbox" value="1" id="visualizacion_datos"
              name="visualizacion_datos">
            <label class="form-check-label" for="visualizacion_datos">
              Visualización de datos
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-three" type="checkbox" value="1" id="r_python" name="r_python">
            <label class="form-check-label" for="r_python">
              Herramientas analíticas (R, Python)
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-three" type="checkbox" value="1" id="cloud" name="cloud">
            <label class="form-check-label" for="cloud">
              Herramientas on Cloud
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-three" type="checkbox" value="1" id="big_data" name="big_data">
            <label class="form-check-label" for="big_data">
              Herramientas de big data
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-three" type="checkbox" value="1" id="machine_learning" name="machine_learning">
            <label class="form-check-label" for="machine_learning">
              Herramientas de Machine Learning
            </label>
          </div>
          </div><div class="col-md">
          <div class="form-check">
            <input class="form-check-input require-three" type="checkbox" value="1" id="inteligencia_artificial"
              name="inteligencia_artificial">
            <label class="form-check-label" for="inteligencia_artificial">
              Inteligencia Artificial
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-three" type="checkbox" value="98" id="metodologia_agil" name="metodologia_agil">
            <label class="form-check-label" for="metodologia_agil">
              Metodologías ágiles
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-three" type="checkbox" value="1" id="p7_ninguna" name="p7_ninguna">
            <label class="form-check-label" for="p7_ninguna">
              Ninguna
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input require-three" type="checkbox" value="1" id="p7_otro" name="p7_otro">
            <label class="form-check-label" for="p7_otro">
              Otro
            </label>
            <input type="text" class="form-control" id="p7_otro_otro" name="p7_otro_otro" placeholder="¿Cuál?" style="margin-top: 10px;display: none;" >
          </div>
          </div>
          
        </div>
        <? }?>

        <div class="col-12 mb-3">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="datos" name="datos" value="1" required>
            <label class="form-check-label" for="datos">
              He leído y acepto los <a href="#" data-bs-toggle="modal" data-bs-target="#myModal">términos y
                condiciones</a>
            </label>
          </div>
        </div>

        <div class="d-grid gap-2" style=" margin-top: 25px; margin-bottom: 25px; ">
          <button class="btn btn-primary" type="submit" id="button">Enviar</button>
        </div>
      </div>
    </form>
  </div>
  <!-- Modal -->
  <? include_once "view/terminos.php"; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
    crossorigin="anonymous"></script>
  <script src="https://survey.dmc.pe/suscripcion/assets/js/jquery.min.js"></script>
  <script src="https://survey.dmc.pe/suscripcion/assets/js/intlTelInput.min.js"></script>
  <script src="https://survey.dmc.pe/suscripcion/assets/js/utils.js"></script>
  <script src="https://survey.dmc.pe/suscripcion/assets/js/jquery.validate.min.js"></script>
  <script type="text/javascript">

    var input = document.querySelector("#phone");

    function detect_country() {

      var celular = $("#phone").val();

      if (celular) {

        var pais = $(".iti__selected-flag").attr("title").split(" ");

        var nombrePais = pais[0].replace(":", "");

        var full_phone = iti.getNumber();

        $('#celular').val(full_phone);

        $('#pais').val(nombrePais);

      }

    }

    iti = window.intlTelInput(input, {
      initialCountry: "auto",
      geoIpLookup: function (callback) {
        $.get('https://ipinfo.io', function () { }, "jsonp").always(function (resp) {

          var countryCode = (resp && resp.country) ? resp.country : "";

          if (countryCode == "PE") {
            $('#pais').val("Peru");
            $('#tDocumento').val("DNI");
          }

          callback(countryCode);
        });
      },
    });

    $(document).ready(function () {

      valid = 0;

      $('.close').html("").addClass("btn-close").removeClass("close");

      $('#phone').blur(detect_country).keyup(detect_country).keydown(detect_country);

      $.validator.addMethod("pattern", function (value, element, param) {

        if (this.optional(element)) {
          return true;
        }

        if (typeof param === "string") {
          param = new RegExp("^(?:" + param + ")$");
        }

        return param.test(value);

      }, "Formato inválido");

      $.validator.addMethod("phoneInternational", function (value, element, param) {

        if (iti.isValidNumber()) {

          return true;

        } else {

          return false;

        }

      }, "Formato inválido");

      function otro_caption(e){

        var id = $(this);

        var valor = id.val();

        var tipo = id.attr("type");

        var input_otro = $('#'+id.attr("id")+"_otro");

        var bool_ = id.prop("checked");

        console.log(valor);

        if ( ( tipo!="checkbox" && valor == 98 ) || (tipo=="checkbox" && bool_ == true) ) {

          input_otro.attr("required","required");
          input_otro.show();
          input_otro.focus();

        } else {

          input_otro.removeAttr("required");
          input_otro.val('');
          input_otro.hide();

        }

        console.log(id.attr("id"));

      }

      $('#institucion_p3').change(function(){

        var valor = $(this).val();

        var label = $("#institucion_p3 :selected").text();

        if(valor !=98){

          var text = "¿Por qué considera que la institución "+label+" es la mejor?"

          $('#nom_p4').text(text);

          $('#p4').focus();

        }

      });

      $('#p1_9').change(function(){

        var valor = $(this).val();

        if(valor != "4"){

          $('#sector,#cantidad_persona,#cargo').removeAttr("disabled");

        }else{

          $('#sector,#cantidad_persona,#cargo').attr("disabled","disabled");
          
        }

      });

      $('#institucion_p3_otro').blur(function(){

        var valor = $(this).val();

        var text = "¿Por qué considera que la institución "+valor+" es la mejor?"

        $('#nom_p4').text(text);

        $('#p4').focus();

      })

      $('#ninguna').change(function(){

        var check = $(this).prop("checked");

        if( check ==true ){

          $('.require-one').attr("disabled","disabled");

        }else{

          $('.require-one').removeAttr("disabled");

        }

      });





      $('#sector,#cargo,#institucion_p3,#modalidad  ,#otro_institucion,#otro_institucion_p2,#p7_otro').change(otro_caption);

      $('#form').validate({
        ignore: ':hidden',
        ignoreTitle: true,
        errorClass: 'is-invalid',
        rules:
        {
          'num_documento':
          {
            required: true,
            pattern: /^[0-9]{8}$/,
          },
          'correo':
          {
            required: true,
            pattern: /^\S+@\S+\.\S+$/
          },
          'nombres':
          {
            required: true,
            pattern: /^[A-Za-z\sÃÃ‰ÃÃ“ÃšÃ¡Ã©Ã&shy;Ã³ÃºÃ‘Ã±]{2,}$/
          },
          'phone':
          {
            required: true,
            phoneInternational: true,
          },
          'cibertec':{
            required:{
              depends : function(element){
                return $('.require-one:checked').length==0;
              }
            }
          },
          'cibertec_p2':{
            required:{
              depends : function(element){
                return $('.require-two:checked').length==0;
              }
            }
          },
          'base_datos':{
            required:{
              depends : function(element){
                return $('.require-three:checked').length==0;
              }
            }
          }
        },
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
    })
  </script>
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