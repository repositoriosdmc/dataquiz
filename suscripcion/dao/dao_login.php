<?php

// esto es la sesion del formulario login
require_once "gestionbd.php";

require_once  "mail/PHPMailerAutoload.php";

$usuario   =  trim($_REQUEST['usuario']);
$password  =  trim($_REQUEST['password']);

// $password = base64url_decode($password) ;

try {
  $gbd=Gestionbd::getInstancia();


      $sql  =  "SELECT * FROM  form_login_usuarios u
      WHERE correo=:usuario and estado = 1";


$statement = $gbd->prepare($sql);
$statement->bindParam(':usuario',$usuario);


$statement->execute();
$result   = $statement->fetch(PDO::FETCH_ASSOC);


if($result !== false && base64_decode($result['password_bcrypt']) === $password   )
{


    //Variables de Sesión
    session_start();

     $_SESSION['ID']   = $result['id'];
     $_SESSION['NOMBRE']   = $result['nombres'];
     $_SESSION['APELLIDO']   = $result['apellido'];
     $_SESSION['USUARIO']   = $result['usuario'];
     $_SESSION['CORREO']   = $result['correo'];
     $_SESSION['FORMULARIO'] = isset($result['formulario']) ? $result['formulario'] : 0;



    echo json_encode(

    array(

    'title'=>'Bienvenido',
    'text' => $_SESSION['USUARIO'] ,
    'type' =>'success'

    )

    );

}
else
{

echo json_encode(

array(

'title'=>'Acceso Denegado',
'text' => 'Usuario o Contraseña Incorrectos',
'type' =>'error'

)

);

}


} catch (\Exception $e) {
  echo json_encode(

array(


'title'=>'UPS',
'text' => "El challenge ya tèrmino",
//'text' => $e->getMessage(),
'type' =>'error'

)

);
}


 ?>
