<? session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liv Data Summit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
    include "header.php";

    include 'nav.php';
    ?>
    <div class="alert " role="alert" style="background-image: url('../../img/Fondo de evaluación.jpg');  background-repeat: no-repeat; background-size: 100% 100%; ">

        <br> <img src="https://certificaciones.dmc.pe/img/logo_encuesta.png" style=" float: right; " width="140px">

        <div class="row">

            <div class="col-md-1"></div>

            <div class="col-md-10">

                <h4 style="color:white; "><?=utf8_encode(base64_decode($_SESSION['nombreConcurso']))?></h4>

            </div>

        </div>

        <br><br>

    </div>

    <div class="container text-center">
        <div class="row justify-content-md-center">
            <div class="col col-lg-5">
                <h2>Resultados</h2>
                <p>Felicidades <?= $_SESSION['nombreUsuario']  ?></p>
                <p>Tu puntaje es:</p>
                <p style="font-weight: bold; font-size: 1.7em; color:#386cff "><?= $_SESSION['puntaje']  ?></p>
                <p>Tu puntaje máximo es:</p>
                <p style="font-weight: bold; font-size: 1.7em; color:#386cff "><?= $_SESSION['puntajeMaximo']  ?></p>
                <p>Intento:</p>
                <p style="font-weight: bold; font-size: 1.7em; color:#386cff "><?= $_SESSION['intento']  ?>/3</p>
                <p>Sigue aprendiendo y compartiendo tus conocimientos!</p>

                <!--<p>Fecha de Finalización del concurso:</p>
                <p style="font-weight: bold; font-size: 1.7em; color:#386cff ">10 de enero 2024</p>-->
                
                <a href="https://certificaciones.dmc.pe/template/formulario-concurso-data.php?cap=<?=base64_encode($_SESSION['idConcurso'])?>&nom=<?=$_SESSION['nombreConcurso']?>" class="btn btn-primary">Intentar de nuevo</a>

            </div>
            
        </div>

    </div>

</body>

</html>