<?php


 session_start();
 if (!isset($_SESSION[ID])) {

    header('location: ../../suscripcion/inicio_formulario.php');
  }
  
  require_once "../../suscripcion/dao/dao_formularioLogin.php";

$dao_formularioLogin = new dao_formularioLogin();

$valor = $dao_formularioLogin->consultaEstado($_SESSION['idConcurso'], $_SESSION['ID']);

$resultado = $dao_formularioLogin->porcentajeCertificaciones($_SESSION['idConcurso'], $_SESSION['ID'],$valor['intentos']);

 include "../../template/header.php";

 include '../../template/nav.php';



$nombreCurso =  utf8_encode(base64_decode($_SESSION['nombreConcurso']));


$url = "https://www.linkedin.com/profile/add?startTask=CERTIFICATION_NAME
&name=".$nombreCurso."
&organizationId=2746054
&issueYear=".date("Y")."
&issueMonth=".date("m")."
&certUrl=https://certificaciones.dmc.pe/template/archivos/certificado.php?cap%3D".$_SESSION['idConcurso']."%26us%3D".$_SESSION['ID']."%26in%3D".$valor['intentos']."";

?>
<style>
.p-detalle {
    color:#0653C8;
    font-family: serif;
    font-size: 120%
}
.span-detalle {
    color:white;
}
</style>


<!--  -->
<div class="container d-flex justify-content-center align-items-center ">
  <div class="container-center" style="height: 100%; width: 100%; background-color: rgba(0, 0, 0, 0.4); padding-bottom: 10vh;">

  <span id="contenido-body" >


<div class="container mt-5">
  <div class="row justify-content-center align-items-center">
    <div class="col-md-8 col-sm-12 mb-3">
    <img src="../../img/logo-certif-dmc 2.png"  style="max-width: 50%;">
    </div>

    <div class="col-md-8 col-sm-8 mt-4 mb-4">
    <div class="d-flex justify-content-between">
    <div>
    <h3 style="color: white"><?php echo $nombreCurso ?></h3>

    <h5 class="pt-3 pb-3 text-white" >
<svg xmlns="http://www.w3.org/2000/svg" width="36" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
</svg> 

<?php echo $_SESSION[NOMBRE]." ".$_SESSION[APELLIDO] ?> </h5>

    <p class="p-detalle" > Porcentaje: <span class="span-detalle" ><?php echo $resultado["porcentaje"]?>%</span> </p>
    <p class="p-detalle" > Duración: <span class="span-detalle" ><?php echo $resultado["duracion"]?></span> </p>
    <p class="p-detalle" > Fecha inicio: <span class="span-detalle" ><?php echo $resultado["fecha_inicio"]?></span> </p>
    <p class="p-detalle" > Fecha fin: <span class="span-detalle" ><?php echo $resultado["fecha_fin"]?></span> </p>
    </div>


    <?php 
        if ($resultado["porcentaje"] >= 80) {  ?>
         <div class="text-center " style="padding-top: 19% ;" >
     <div style="height: 87%;border-left: 1px solid #10656F;"  ></div> 
    </div>

    <div class="text-center pl-3 " style="padding-top: 19% ;" >
          <p> <a type="button" href="../archivos/certificado.php?cap=<?php echo $_SESSION['idConcurso']; ?>&us=<?php echo $_SESSION['ID']; ?>&in=<?php echo $valor['intentos']; ?>"  target=”_blank”><img src="../../img/boton-certificado.png" style="max-width: 40%;"></a> </p>  
          <p class="text-white" > <b>Descargar Certificado</b> </p>
    </div>
     <?php     }else{  ?>
      
    
     <img  src="../../img/certificado-examen.jpg"  style="max-width: 35%;height: 35%;padding-top: 10% ">
         
      
      <?php   }  ?>


    
    </div>
    </div>
  </div>

</div>


</span>

</div>

</div>






<div class="container d-flex justify-content-center align-items-center ">
<div class="container-center" style="height: 100%; width: 100%; background-color: white; padding-bottom: 10vh;">

<div class="container mt-5">
<div class="row justify-content-center align-items-center">
    <div class="col-8 mt-4 mb-4">
  
    <h3 style="color: #006AFF"> <b>Feedback </b> </h3>

   
        <?php 
        if ($resultado["porcentaje"] >= 80) {
        // include "mensaje-aprobado.php";
        ?>
          

          <p> <b>¡Felicitaciones por aprobar el examen! Celebramos contigo este nuevo logro. </b> </p>


<p>Comparte este logro y demuestra tus habilidades siguiendo estos pasos:</p>
<p ><span class="text-primary" >1.</span>  Agrega una nueva certificación a tu perfil de Linkedin</p> 
<p>  
<svg xmlns="http://www.w3.org/2000/svg" width="37" height="37" style="color:#007bff" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
  <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
</svg>
<a class="btn btn-primary" href="<?php echo $url ?>" target="_blank" style="position: relative; display: inline-block;">
 
  Add to profile
</a>

</p>
<p ><span class="text-primary" >2.</span> ¡Sigamos conectados! Te invitamos a seguirnos en Linkedin
<br>
    <a href="https://www.linkedin.com/company/dmc-peru/" >linkedin DMC</a>
</p> 

<p><span class="text-primary" >3.</span> Comparte en redes sociales tu nuevo logro alcanzado, menciónanos @DMCPerú #CertificacionesDMC</p>
<p><span class="text-primary" >4.</span> Continúa adquiriendo con nosotros nuevas habilidades a través del aprendizaje. Te obsequiamos un % de descuento en nuestras capacitaciones. </p>
<p><span class="text-primary" >5.</span> Conoce nuestro portafolio y abre las puertas de tu futuro: <br> <a href="https://dmc.pe/">https://dmc.pe/</a> </p>




          <?php 

        }else{
            include "mensaje-reprobado.php";
        }
        ?>

        <a class="btn btn-primary pl-5 pr-5 mt-5" href="../../suscripcion/inicio_formulario.php">Continuar</a>
    </div>

    </div>
</div>
</div>
</div>

<script>
   var miDiv = document.querySelector("body");

miDiv.style.backgroundImage = "url('../../img/fondo general.jpg')";
miDiv.style.backgroundSize = "cover";
miDiv.style.backgroundRepeat = "no-repeat";

// cambia color del navbar
var navbar = document.getElementById("miNavbar");
navbar.classList.remove("bg-light");
navbar.style.backgroundColor = "#slal4la";



</script>

  <!-- fin -->

  <?php

   include "../../template/footer.php";

  ?>
