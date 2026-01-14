<?php
//require_once __DIR__ . '/../config/session_config.php';
session_start();


if( isset( $_SESSION['ID'])  )
{

  

   

  
  include '../template/inicio.php';
 

}
else
{

 include '../template/login.php';

} 



 ?>

