<?php 
 
  require_once "../suscripcion/dao/dao_formularioLogin.php";

  $capacitacion = $_REQUEST['cap'];
  $usuario = $_REQUEST['us'];
  $intento = $_REQUEST['in'];
  $dao_formularioLogin = new dao_formularioLogin();
$resultado = $dao_formularioLogin->porcentajeCertificaciones($capacitacion, $usuario,$intento);
$datosUsuario = $dao_formularioLogin->datosUsuario($capacitacion, $usuario);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" >

    <title>Cerificaciones</title>
    <style>
table, th, td {
  border: 1px solid #0068FF ;
  border-collapse: collapse;
  color:black;
  /* background-color: rgba(0, 0, 0, 0.5);  */
  color:white;
}
th, td {
  padding-top: 10px;
  padding-bottom: 20px;
  padding-left: 30px;
  padding-right: 40px;
}
</style>
  </head>
  <body style="background-image: url('../../img/fondo general.jpg');" >
   
  


    <div class="container mt-4 p-4 text-center">
    <div class="row justify-content-md-center">
    <img src="../../img/logo-certif-dmc 2.png" class="mx-auto img-fluid" style="max-width: 50%;">
    
    
    <div class="row row-cols-1 pt-2 mt-4">

        <div class=" text-center " >
        <h2 style="color:#0068FF;" class="p-4" >Certificado Válido</h2>
          <h1 style="text-transform: uppercase;" class="text-white pb-4" ><?php  echo $datosUsuario["nombres_completos"]?></h1>
          
        </div>

        <table class="mx-auto" style="width:100%; ">
         
            <tr>
                <th>CERTIFICACIÓN:</th>
                <td><?php echo $datosUsuario["nombre"]?></td>
            </tr>
            <tr>
                <th>PORCENTAJE:</th>
                <td><?php echo $resultado["porcentaje"]?>%</td>
            </tr>
           
        </table>
    </div>
</div>
</div>

 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"  ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"  ></script>
   
  </body>
</html>