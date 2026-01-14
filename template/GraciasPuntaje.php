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

                <h4 style="color:white; ">¡EL RETO DMC!</h4>

            </div>

        </div>

        <br><br>

    </div>

    <div class="container text-center">
        <div class="row justify-content-md-center">
            <div class="col col-lg-5">
                <h2>Resultados</h2>
                <p>Felicidades <?= $_SESSION['nombreUsuario']  ?></p>
                <p>Tu nivel en Data & Analytics es:</p>
                <p style="font-weight: bold; font-size: 1.7em; color:#386cff "><?= mb_strtoupper($_SESSION['nombreNivel'],'UTF-8')  ?></p>
                <p>Sigue aprendiendo y compartiendo tus conocimientos!</p>
                
                <a href="https://certificaciones.dmc.pe/template/formulario-concurso.php?cap=Nw==&nom=oUVMIFJFVE8gRE1DIQ==" class="btn btn-primary">Intentar de nuevo</a>

            </div>
            
        </div>

    </div>

</body>

</html>