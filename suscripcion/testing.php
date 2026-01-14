<?

require_once "dao/dao_suscripcion.php";

$outcurso=array(190,15,96,98);

$suscripcion=new suscripcion();
$curso=$suscripcion->listado_curso();
$concurso=$_GET["concurso"];
$GtCurso=$_GET['curso'];
if ($GtCurso) {
    $capacitacion_id=$suscripcion->obtener_capacitacion_id($GtCurso);
    $capacitacion=$suscripcion->charla_informativa_check($GtCurso);
}

$concurso_id=$concurso==1 ? 9 : 0 ;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha de Suscritos - DMC</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://survey.dmc.pe/suscripcion/assets/css/selectize.default.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://survey.dmc.pe/suscripcion/assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="https://survey.dmc.pe/suscripcion/assets/js/additional-methods.min.js"></script>
    <script type="text/javascript" src="https://survey.dmc.pe/suscripcion/assets/js/selectize.min.js"></script>
    <script type="text/javascript" src="https://survey.dmc.pe/suscripcion/assets/js/detect.js"></script>
    <script type="text/javascript" src="https://survey.dmc.pe/suscripcion/assets/js/app_prueba.js?v=0.12"></script>
    <style type="text/css">
        .selectize-dropdown-content{
            background: white;
        }
    </style>
</head>

<body class="modal-open">
    <img src="data.jpg" alt="" style="position: fixed; min-width: 100%; min-height: 100%; top: 50%; left: 50%; transform: translateX(-50%) translateY(-50%); z-index: -1;">
    <!-- Modal -->
    <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: block; padding-right: 16px;">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content" style="background-color: #151a2c; color: white;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Solicitud de Información</h5>
                </div>
                <form name="form" method="POST" action="controller/controller_suscripcion.php">
                    <div class="modal-body">
                        <div>
                            <p>Completa el formulario para conocer más sobre los cursos, programas, workshops y la experiencia de estudiar en DMC. Recibirás un E-Mail con la información dentro de la próxima hora.</p>
                        </div>
                        <div>
                            <input type="hidden" name="documento" value="DNI">
                            <input type="hidden" name="codigo" id="codigo">
                            <input type="hidden" name="browser" id="browser">
                            <input type="hidden" name="version" id="version">
                            <input type="hidden" name="atendido" id="atendido" value="<?=$concurso_id?>">
                            <?php if ($capacitacion_id>0): ?>
                                <input type="hidden" name="capacitacion_id" id="capacitacion_id" value=<?=$capacitacion_id;?>>
                            <?php endif ?>
                            <input type="hidden" name="so" id="so">

                        </div>
                        <?php if ($capacitacion): ?>
                                <div style="font-size: 27px; font-weight: bold; color: #5150b2;"><?=$concurso==1 ? "Concurso de Conocimiento de " : ""?><?=$capacitacion?></div>
                                <input type="hidden" name="cursos[]" id="curso" value=<?=$capacitacion_id?>>
                        <?endif;?>
                        <div class="form-row">
                            <div class="form-group col">
                                <input type="text" id="num_documento" name="num_documento" class="form-control" placeholder="DNI" autocomplete="off" required pattern="[0-9]{8}">
                            </div>
                            <div class="form-group col">
                                <input type="email" id="correo" name="correo" class="form-control" placeholder="E-mail" required>
                            </div>
                            <div class="form-group col">
                                <input type="text" id="nombres" name="nombres" required class="form-control" placeholder="Nombres" autocomplete="off" pattern="[A-Za-z\sÁÉÍÓÚáéíóúÑñ]{2,}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <input type="text" id="celular" name="celular" class="form-control" placeholder="Teléfono" autocomplete="off">
                            </div>
                            <div class="form-group col">
                                <select id="medio" name="medio" class="form-control" placeholder="*¿Como se enteró?">
                                  <option value="" selected="selected">¿Como se enteró?</option>
                                  <option value="1">Facebook</option>
                                  <option value="2">Google</option>
                                  <option value="3">Folleto informativo</option>
                                  <option value="4">Alumno - Ex-Alumno</option>
                                  <option value="5">Linkedin</option>
                                  <option value="6">Correo Electrónico</option>
                                  <option value="8">Youtube</option>
                                  <option value="11">WhatsApp</option>
                                  <option value="21">Instagram</option>
                                  <option value="7">Otros</option>
                                  <?php if ($_GET["facebook_leads"]==1): ?>
                                    <option value="10">Facebook - Leads</option>
                                  <?php endif ?>
                                  <option value="23" selected="selected">Facebook - A/B T</option>

                                </select>
                            </div>
                            <div class="form-group col">
                                <input type="text" id="centro_trabajo" name="centro_trabajo" class="form-control" placeholder="Centro de Trabajo" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                              <select id="select" name="cursos[]" required="required" class="form-control" placeholder="*Seleccione el curso que desea" multiple="multiple">
                                <? foreach ($curso as $key => $value) : ?>
                                    <option value=<?=$value["id"]?>>
                                        <?=$value['nombre']?> 	
                                    </option>
                                <? endforeach; ?>
                              </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <textarea id="mensaje" name="mensaje" class="form-control" rows="3" autocomplete="off" placeholder="Mensaje"></textarea>
                            </div>
                        </div>
                        <div style="margin-bottom: -25px;">
                            <div class="form-check form-check-inline ope show">
                                <label style="font-size: 12px;">
                                    <input type="checkbox" name="datos" id="datos" value="1" required="" style="margin-top: 2.5px;">
                                    <a data-toggle="modal" style="font-family: arial; font-size: 12px; font-weight: bold;" data-target="#myModal">De conformidad con la Ley N° 29733, Ley de Protección de Datos Personales.</a>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="button" class="btn btn-primary" data-loading-text="Enviando...">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal-backdrop fade show"></div>
    <? include_once "view/terminos.php"; ?>
</body>

</html>