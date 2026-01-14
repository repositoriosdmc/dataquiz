<? session_start(); 
if (!isset($_SESSION['ID'])) {

    header('location: ../suscripcion/inicio_formulario.php');
  }

  require_once "../suscripcion/dao/dao_formularioLogin.php";
  $dao_formularioLogin = new dao_formularioLogin();
  $resultado = $dao_formularioLogin->porcentajeCertificaciones($_SESSION['idConcurso'], $_SESSION['ID'],$_SESSION['intento']);
  $listaRanking = $dao_formularioLogin->rankingPorExamen($_SESSION['idConcurso']);
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CERTIFICACIONES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <!-- DataTables JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="icon" href="../img/1 (5).png">
</head>

<body>
    <?php
    include "header.php";

    include 'nav.php';
    ?>
    <div class="alert " role="alert" style="background-image: url('../../img/Fondo de evaluación.jpg');  background-repeat: no-repeat; background-size: 100% 100%; ">

        <br> <img src="https://certificaciones.dmc.pe/img/logo secundario dmc institute-02.png" 
     class="float-md-end img-fluid" 
     style="max-width: 100px; width: 15%; min-width: 80px; height: auto;"
     alt="DMC Institute">

        <div class="row">

            <div class="col-md-1"></div>

            <div class="col-md-10">

                <h4 style="color:white; "><?=utf8_encode(base64_decode($_SESSION['nombreConcurso']))?></h4>

            </div>

        </div>

        <br><br>

    </div>

    <div class="container text-center pb-4">
        <div class="row justify-content-md-center">
            <div class="col col-lg-5">
       
                <h2>Resultados</h2>
                <p>Felicidades <?= $_SESSION['nombreUsuario']  ?></p>
                <p>Tu puntaje es:</p>
                <!-- <p style="font-weight: bold; font-size: 1.7em; color:#386cff "><? // $_SESSION['puntaje']  ?></p> -->
                <p style="font-weight: bold; font-size: 1.7em; color:#386cff "><?php echo $resultado["porcentaje"]  ?>% </p> 
                <!-- <p>Tu puntaje máximo es:</p>
                <p style="font-weight: bold; font-size: 1.7em; color:#386cff "><? // = $_SESSION['puntajeMaximo']  ?></p> -->
                <!-- <p>Intento:</p>
                <p style="font-weight: bold; font-size: 1.7em; color:#386cff "><?= $_SESSION['intento'] ?>/2</p> -->
                <p>Sigue aprendiendo y compartiendo tus conocimientos!</p>
                <a href="https://dmc.pe/" class="btn btn-primary">Visita nuestra web.</a>
                <br> <br>
                <a href="https://certificaciones.dmc.pe/suscripcion/inicio_formulario" class="btn btn-primary">Inicio</a>
                
                <?php if (!empty($listaRanking)): ?>
                <div class="mt-5">
                    <h4 class="mb-3" style="color: #006AFF">Ranking de Participantes</h4>
                    <div class="table-responsive">
                        <table id="rankingTable" class="table table-bordered table-hover" style="background-color: white; width:100%;">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Participante</th>
                                    <th>Puntuación</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listaRanking as $index => $participante): ?>
                                    <tr <?php echo ($participante['id_usuario'] == $_SESSION['ID']) ? 'class="table-primary"' : ''; ?>>
                                        <td><?php echo $index + 1; ?></td>
                                        <td><?php echo htmlspecialchars(ucfirst(strtolower($participante['nombres'])) . ' ' . ucfirst(strtolower($participante['apellido']))); ?></td>
                                        <td data-order="<?php echo $participante['porcentaje']; ?>"><?php echo number_format($participante['porcentaje']); ?>%</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <script>
                $(document).ready(function() {
                    $('#rankingTable').DataTable({
                        "pageLength": 50,
                        "language": {
                            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
                        },
                        "order": [[2, 'desc']],
                        "columnDefs": [
                            { "orderable": false, "targets": [0, 1] },
                            { "searchable": true, "targets": [1] }
                        ],
                        "dom": '<"top"f>rt<"bottom"lip><"clear">',
                        "initComplete": function() {
                            var table = this.api();
                            var userRow = $('tr.table-primary');
                            if (userRow.length > 0) {
                                var page = table.page();
                                var rowIndex = userRow.index();
                                var pageSize = table.page.len();
                                var pageToShow = Math.floor(rowIndex / pageSize);
                                table.page(pageToShow).draw(false);
                            }
                        }
                    });
                });
                </script>
                <?php endif; ?>
                
            </div>
            
        </div>

    </div>

</body>

</html>