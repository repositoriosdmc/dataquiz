<?php
// https://www.shanidkv.com/blog/font-awesome-icons-css-content-values
session_start();
if (!isset($_SESSION[ID])) {
header('location: ../suscripcion/inicio_formulario.php');
}
include "header.php";
include 'nav.php';
?>

PYHTON FUNDAMENTALS

<?php include "footer.php"; ?>
