<?php
$valoracion = [1, 2, 3, 4, 5, "NS/NP"];

$skills = ["Programación", "Estadística", "Machine Learning", "Base de Datos", "Visualización", "Procesamiento Big Data", "Comunicación"];

$herramientas = ["Excel", "Tableau", "Power BI", "Python", "R", "TensorFlow y/o PyTorch", "SQL", "Git", "DataBricks", "Airflow", "Docker", "AWS", "GCP", "Azure"];

function procesarPalabra($palabra)
{
    // Convertir la palabra a minúsculas
    $palabra = strtolower($palabra);

    // Reemplazar caracteres acentuados por sus equivalentes sin acento
    $palabra = str_replace(
        ['á', 'é', 'í', 'ó', 'ú', 'ü', 'ñ'],
        ['a', 'e', 'i', 'o', 'u', 'u', 'n'],
        $palabra
    );

    // Reemplazar espacios en blanco por guiones bajos
    $palabra = str_replace(' ', '_', $palabra);

    // Reemplazar barras diagonales por guiones bajos
    $palabra = str_replace('/', '_', $palabra);

    return $palabra;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESTUDIO DEL PROFESIONAL EN DATA &amp; ANALYTICS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>

<style>
    body {
        background: #f5f4f1;
    }

    .fd-logo {
        /*background: url(https://certificaciones.dmc.pe/suscripcion/assets/img/summit_2018.jpg);*/
        background: url(https://certificaciones.dmc.pe/suscripcion/assets/img/banner-2023-sept-encuesta.jpg);
        text-align: center;
        padding: 23px;
        background-size: cover;
        border-radius: 30px 30px 0 0;
        background-position: 0px -55px;
        height: 106px;
    }

    .fd-cmcado {
        background: rgb(48, 126, 162);
        padding: 19px 34px;
        color: #efefef;
        text-align: justify;
        background-image: linear-gradient(96.5deg, rgba(39, 103, 187, 1) 10.4%, rgba(16, 72, 144, 1) 87.7%);
        background-image: linear-gradient(89.7deg, rgba(0, 32, 95, 1) 2.8%, rgba(132, 53, 142, 1) 97.8%);
        background-image: linear-gradient(83.2deg, rgba(150, 93, 233, 1) 10.8%, rgba(99, 88, 238, 1) 94.3%);
    }

    .fd-cmcado p.titulo {
        font-weight: bold;
        font-size: 1.2em;
        text-align: center;
    }

    .col-md-9 {
        box-shadow: 26px 26px 10px rgb(76 76 76 / 26%);
        padding: 0;
        margin-top: 40px;
        border-radius: 30px;
        margin-bottom: 40px;
    }

    .form {
        background: white;
        padding: 19px 34px;
        border-radius: 0 0 30px 30px;
        padding-bottom: 30px;
    }

    .form p {
        color: #1379ff;
        font-weight: bold;
        font-size: .95em;
        margin-bottom: 0;
        margin-top: 30px;
    }

    label.form-label {
        font-size: 0.8em;
        font-weight: bold;
        color: #424242;
        font-family: monospace;
    }

    .center-vertical {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .row.spc {
        margin-bottom: 15px;
    }

    .form-control.mg-10 {

        margin-top: 15px;
    }
</style>

<body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-9">
                <a href="https://dmc.pe/" target="_blank">
                    <div class="fd-logo">

                    </div>
                </a>
                <div class="fd-cmcado">
                    <p class="titulo">ESTUDIO DEL PROFESIONAL EN DATA &amp; ANALYTICS</p>
                    <p>¡Saludos! Somos DMC, líderes en la formación de profesionales en el ámbito de Data &amp;
                        Analytics. Nos complace invitarte a participar en nuestro estudio titulado &quot;Perfil del
                        Profesional de Data &amp; Analytics&quot;. Con este estudio, aspiramos a obtener una comprensión
                        precisa de la situación actual de los profesionales en este campo en constante crecimiento, así
                        como de sus conocimientos, habilidades y preferencias.</p>
                    <p>Dedicar unos 15 minutos de tu tiempo para responder esta encuesta nos permitirá obtener
                        información valiosa. Queremos asegurarte que todas tus respuestas serán tratadas con
                        absoluta confidencialidad y rigurosidad estadística. Una vez finalizado el análisis de datos,
                        estaremos encantados de compartir contigo los resultados de este estudio. Estos resultados
                        serán presentados durante el LivData Summit 2023, un evento que reúne a destacados
                        expertos en el área.</p>
                    <p>Agradecemos de antemano tu colaboración, la cual contribuirá a un mejor entendimiento de la
                        dinámica actual en el mundo de Data &amp; Analytics.</p>
                </div>
                <div class="form">
                    <form method="post" action="controller/controllerCuestionarioDA.php" class="row g-3">
                        <p>PERFIL DEL ENTREVISTADO</p>
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Edad</label>
                            <input type="number" class="form-control" name="edad" placeholder="" required>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Sexo</label>
                            <select class="form-select" aria-label="Default select example" name="sexo">
                                <option selected>Seleccione</option>
                                <option value="H">Hombre</option>
                                <option value="M">Mujer</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">País</label>
                            <input type="text" class="form-control" name="pais" placeholder="" required>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Ciudad</label>
                            <input type="text" class="form-control" name="ciudad" placeholder="" required>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" name="correo" placeholder="" required>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Años de experiencia en el Mundo de
                                Data &amp; Analytics</label>
                            <input type="number" class="form-control" name="anioExp" placeholder="" required>
                        </div>
                        <p>SITUACIÓN LABORAL</p>
                        <div class="col-md-12">
                            <label for="exampleFormControlInput1" class="form-label">¿Que frase describe mejor su
                                situación laboral?</label>

                            <select class="form-control" name="frase" id="frase" required>

                                <option value="">Seleccione</option>

                                <option value="Actualmente estoy laborando, mi ocupación principal es dependiente">Actualmente estoy laborando, mi ocupación principal es dependiente</option>

                                <option value="Actualmente estoy laborando, mi ocupación principal es independiente">Actualmente estoy laborando, mi ocupación principal es independiente </option>

                                <option value="Actualmente no estoy laborando, pero sí he trabajado antes">Actualmente no estoy laborando, pero sí he trabajado antes</option>

                                <option value="Aún no he laborado">Aún no he laborado</option>

                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="exampleFormControlInput1" class="form-label">¿En que qué sector trabaja
                                actualmente? (Si no se encuentra trabajando
                                actualmente, considerar las labores del último trabajo)</label>
                            <select class="form-control " required id="sectorTrabajo" name="sectorTrabajo" onchange="mostrarOcultarCampo(event)">

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
                            <input type="text" name="sectorTrabajo_otro" id="sectorTrabajo_otro" placeholder="Otros..." class="form-control mg-10" style="display:none">

                        </div>
                        <div class="col-md-12">
                            <label for="exampleFormControlInput1" class="form-label">¿Qué cantidad de personas tiene la
                                empresa donde labora actualmente? (Si no se
                                encuentra trabajando actualmente, considerar las labores del último trabajo) ?</label>
                            <select class="form-control " required name="cantidadTrabajadores">

                                <option value="">Seleccione</option>

                                <option value="Menos de 10">Menos de 10</option>

                                <option value="De 11 a 50">De 11 a 50 </option>

                                <option value="De 51 a 100">De 51 a 100</option>

                                <option value="De 101 a 1,000">De 101 a 1,000</option>

                                <option value="Más de 1,000">Más de 1,000</option>

                                <option value="No Precisa">No Precisa</option>

                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="exampleFormControlInput1" class="form-label">¿Qué puesto tiene actualmente en su
                                trabajo? (Si no se encuentra trabajando
                                actualmente, considerar las labores del último trabajo)</label>
                            <select class="form-control " id="puestoTrabajo" required name="puestoTrabajo" onchange="mostrarOcultarCampo(event)">

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
                            <input type="text" name="puestoTrabajo_otro" id="puestoTrabajo_otro" placeholder="Otros..." class="form-control mg-10" style="display:none">
                        </div>

                        <div class="col-md-12">
                            <label for="exampleFormControlInput1" class="form-label">¿En qué rango se encuentra su
                                remuneración mensual? (Monto en dólares)</label>
                            <select class="form-control " id="rangoRemuneracionMensual" required name="rangoRemuneracionMensual">

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
                        <div class="col-md-12">
                            <label for="exampleFormControlInput1" class="form-label">¿Según la actividad de su trabajo y
                                según lo que ha desarrollado en su vida
                                laborar, ¿se considera un …?</label>
                            <select class="form-control " required name="actividadLaboral" onchange="mostrarOcultarCampo(event)">

                                <option value="">Seleccione</option>

                                <option value="Analista de datos">Analista de datos</option>

                                <option value="Analista de tecnologías de información">Analista de tecnologías de
                                    información </option>

                                <option value="Arquitecto de datos">Arquitecto de datos</option>

                                <option value="Ingeniero de datos">Ingeniero de datos</option>

                                <option value="Científico de datos">Científico de datos</option>

                                <option value="Cloud Engineer">Cloud Engineer</option>

                                <option value="Cloud Developer">Cloud Developer</option>

                                <option value="Cloud Analyst">Cloud Analyst</option>

                                <option value="Ingeniero DevOps">Ingeniero DevOps</option>

                                <option value="Otro">Otro</option>

                            </select>
                            <input type="text" name="actividadLaboral_otro" id="actividadLaboral_otro" placeholder="Otro..." class="form-control mg-10" style="display:none">
                        </div>

                        <div class="col-md-12">
                            <label for="exampleFormControlInput1" class="form-label">Dominio del Idioma Inglés</label>
                            <select class="form-control " required name="ingles">

                                <option value="">Seleccione</option>

                                <option value="Avanzado">Avanzado</option>

                                <option value="Intermedio">Intermedio </option>

                                <option value="Básico">Básico</option>

                                <option value="Ninguno">Ninguno</option>

                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="exampleFormControlInput1" class="form-label">¿En el último año ha cambiado de
                                trabajo?</label>
                            <select class="form-control " required name="ultimoAnioTrabajo">

                                <option value="">Seleccione</option>

                                <option value="Sí">Sí</option>

                                <option value="No">No</option>

                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="exampleFormControlInput1" class="form-label">¿En el último año ha cambiado de
                                funciones o ha sido promovido?</label>
                            <select class="form-control " required name="ultimoAnioCambio">

                                <option value="">Seleccione</option>

                                <option value="Sí">Sí</option>

                                <option value="No">No</option>

                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="exampleFormControlInput1" class="form-label">¿En el último año se ha capacitado
                                en algún tema de Data &amp; Analytics?</label>
                            <select class="form-control " required name="ultimoAnioCapacitacion">

                                <option value="">Seleccione</option>

                                <option value="Sí">Sí</option>

                                <option value="No">No</option>

                            </select>
                        </div>
                        <p>COMPETENCIAS Y HERRAMIENTAS DE DATA &amp; ANALYTICS</p>
                        <div class="col-md-12">
                            <label for="exampleFormControlInput1" class="form-label">En una escala del 1 al 5, ¿Qué tan
                                importante son las siguientes competencias para el
                                desempeño de tus funciones actuales en el mundo de Data &amp; Analytics? (1 es nada
                                importante y 5 es muy importante)</label>

                            <? foreach ($skills as $skill) { ?>
                                <div class="row spc">
                                    <div class="col-md-3 center-vertical"><?= $skill ?></div>
                                    <div class="col-md-6">
                                        <? foreach ($valoracion as $key => $val) { ?>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" required name="competencia_<?= procesarPalabra($skill) ?>" id="competencia_<?= procesarPalabra($skill) . $key ?>" value="<?= $val ?>">
                                                <label class="form-check-label" for="competencia_<?= procesarPalabra($skill) . $key ?>"><?= $val ?></label>
                                            </div>
                                        <?  } ?>
                                    </div>
                                </div>
                            <?  } ?>


                        </div>
                        <div class="col-md-12">
                            <label for="exampleFormControlInput1" class="form-label">En una escala del 1 al 5, ¿cómo
                                calificarías el nivel de desarrollo de estas competencias
                                en tu perfil? (1 = Muy bajo, 5 = Muy alto)</label>
                            <? foreach ($skills as $skill) { ?>
                                <div class="row spc">
                                    <div class="col-md-3 center-vertical"><?= $skill ?></div>
                                    <div class="col-md-6">
                                        <? foreach ($valoracion as $key => $val) { ?>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" required name="nivel_<?= procesarPalabra($skill) ?>" id="nivel_<?= procesarPalabra($skill) . $key ?>" value="<?= $val ?>">
                                                <label class="form-check-label" for="nivel_<?= procesarPalabra($skill) . $key ?>"><?= $val ?></label>
                                            </div>
                                        <?  } ?>
                                        </select>
                                    </div>
                                </div>
                            <?  } ?>
                        </div>
                        <div class="col-md-12">
                            <label for="exampleFormControlInput1" class="form-label">En una escala del 1 al 5, ¿Qué tan
                                importante son las siguientes herramientas para el
                                desempeño de tus funciones actuales en el mundo de Data &amp; Analytics? (1 es nada
                                importante y 5 es muy importante)</label>
                            <? foreach ($herramientas as $hr) { ?>
                                <div class="row spc">
                                    <div class="col-md-3 center-vertical"><?= $hr ?></div>
                                    <div class="col-md-6">
                                        <? foreach ($valoracion as $key => $val) { ?>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" required name="herramienta_<?= procesarPalabra($hr) ?>" id="herramienta_<?= procesarPalabra($hr) . $key ?>" value="<?= $val ?>">
                                                <label class="form-check-label" for="herramienta_<?= procesarPalabra($hr) . $key ?>"><?= $val ?></label>
                                            </div>
                                        <?  } ?>
                                    </div>
                                </div>
                            <?  } ?>
                        </div>
                        <div class="col-md-12">
                            <label for="exampleFormControlInput1" class="form-label">En una escala del 1 al 5, ¿cómo
                                calificarías el nivel de capacidades de estas
                                herramientas en tu perfil profesional? (1 = Muy bajo, 5 = Muy alto)</label>
                            <? foreach ($herramientas as $hr) { ?>
                                <div class="row spc">
                                    <div class="col-md-3 center-vertical"><?= $hr ?></div>
                                    <div class="col-md-6">
                                        <? foreach ($valoracion as $key => $val) { ?>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" required name="nivel_<?= procesarPalabra($hr) ?>" id="nivel_<?= procesarPalabra($hr) . $key ?>" value="<?= $val ?>">
                                                <label class="form-check-label" for="nivel_<?= procesarPalabra($hr) . $key ?>"><?= $val ?></label>
                                            </div>
                                        <?  } ?>
                                    </div>
                                </div>
                            <?  } ?>
                        </div>
                        <p>RETOS Y TENDENCIAS</p>
                        <div class="col-md-12">
                            <label for="exampleFormControlInput1" class="form-label">En tu opinión, ¿cuál es el mayor
                                desafío actual en el campo de Data &amp; Analytics en el
                                mercado peruano?</label>
                            <input type="text" class="form-control" name="desafioActual" placeholder="" required>
                        </div>
                        <div class="col-md-12">
                            <label for="exampleFormControlInput1" class="form-label">¿Qué tendencias ves emergiendo en
                                el ámbito de Data &amp; Analytics en los próximos
                                años?</label>
                            <input type="text" class="form-control" name="tendencia" placeholder="" required>
                        </div>
                        <div class="col-md-12">
                            <label for="exampleFormControlInput1" class="form-label">¿Tienes algún comentario adicional
                                o sugerencia que quieras compartir sobre el
                                panorama de Data &amp; Analytics en Perú?</label>
                            <input type="text" class="form-control" name="sugerencia" placeholder="" required>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto" style="margin-top: 30px;">
                            <button class="btn btn-primary" type="submit">Enviar</button>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    </div>
</body>

</html>

<script>
    // Obtén una referencia al elemento select
    const fraseSelect = document.getElementById("frase");

    // Obtén referencias a los campos que deseas habilitar/deshabilitar
    const camposADeshabilitar = [
        document.querySelector('select[name="sectorTrabajo"]'),
        document.querySelector('select[name="cantidadTrabajadores"]'),
        document.querySelector('select[name="puestoTrabajo"]'),
        document.querySelector('select[name="rangoRemuneracionMensual"]'),
        document.querySelector('select[name="actividadLaboral"]')
    ];

    // Agrega un evento 'change' al elemento select
    fraseSelect.addEventListener("change", function() {
        if (fraseSelect.value === "Aún no he laborado") {
            // Desactiva los campos
            camposADeshabilitar.forEach(function(campo) {
                campo.disabled = true;
                campo.removeAttribute("required")
            });

            // Activa el foco en el campo 'idioma'
            document.querySelector('select[name="ingles"]').focus();
        } else {
            // Habilita los campos
            camposADeshabilitar.forEach(function(campo) {
                campo.disabled = false;
                campo.setAttribute("required", "required");
            });
        }
    });

    function mostrarOcultarCampo(event) {

        var seleccion = event.target.value;

        var nombreCampo = event.target.name

        var OtroCampo = document.getElementById(nombreCampo + "_otro");

        if (seleccion == "Otros" || seleccion == "Otro") {

            OtroCampo.style.display = "block";
            OtroCampo.disabled = false;
            OtroCampo.setAttribute("required", "required");
            OtroCampo.focus();

        } else {

            OtroCampo.style.display = "none";
            OtroCampo.disabled = true;
            OtroCampo.removeAttribute("required");
        }
    }
</script>