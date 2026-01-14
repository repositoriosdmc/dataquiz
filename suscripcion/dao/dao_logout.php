<?php

require_once "gestionbd.php";

session_start();

try {


echo json_encode(

array(

'type'=>'success',
'title'=>'¡Hasta luego!',
'text' => $_SESSION['USUARIO']
)

);

unset($_SESSION['ID']);
unset($_SESSION['NOMBRE']);
unset($_SESSION['APELLIDO']);
unset($_SESSION['USUARIO']);
unset($_SESSION['id_formulario']);
session_destroy();

} catch (Exception $e) {

echo json_encode(

array(

'type'=>'error',
'title'=>$e->getMessage()
)

);




}




 ?>
