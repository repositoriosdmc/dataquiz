<?php

require_once "gestionbd.php";




class dao_formularioLoginReset
{


  public function consultaDatos($post)
  {
      $gbd = Gestionbd::getInstancia();
      
      try {
          $sql = 'SELECT *, concat(nombres," ",apellido) nombres_completos FROM form_login_usuarios WHERE correo = :correo and estado = 1';
          $cmd = $gbd->prepare($sql);
          $cmd->bindParam(':correo', $post["email"]);
          $cmd->execute();
          
          $resultado = $cmd->fetch(PDO::FETCH_ASSOC);
          
          return $resultado; // Devolver solo la fila como un array asociativo
      } catch (\Exception $e) {
          echo "ERROR: " . $e->getMessage();
      } 
  }



  public function resetPassword($post)
  {



    $gbd = Gestionbd::getInstancia();

  

    try {
      $sql = "UPDATE form_login_usuarios set 
      password_bcrypt = :password_bcrypt
      where correo = :email and id = :id";
  
      $cmd = $gbd->prepare($sql);
  
      $cmd->bindparam(':email', $post["email"]);
      $cmd->bindparam(':id', $post["ha"]);
      $cmd->bindparam(':password_bcrypt', base64_encode($post["password"])); //encripto el password
    return  $cmd->execute();

    } catch (\Exception $e) {
      echo "ERROR: " . $e->getMessage();
    } 
 

  }




  public function mensajeRestablecerClave($post,$url){

    $html = '<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Restablecer Contraseña</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }
            .container {
                max-width: 600px;
                margin: 20px auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            h2 {
                color: #333;
            }
            a {
                color: #007bff;
                text-decoration: none;
            }
            a:hover {
                text-decoration: underline;
            }
            p {
                margin: 10px 0;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Restablecer Contraseña</h2>
            <p>Hola '.$post["nombres_completos"].',</p>
            <p>Recientemente solicitaste restablecer tu contraseña. Para cambiarla, haz clic en el siguiente enlace:</p>
            <p><a href="'.$url.'">Restablecer Contraseña</a></p>
            <p>Si no solicitaste este cambio, puedes ignorar este mensaje.</p>
            <p>Gracias,<br>El equipo de DMC Perú</p>
        </div>
    </body>
    </html>';

    return $html;

  }
  


}

?>