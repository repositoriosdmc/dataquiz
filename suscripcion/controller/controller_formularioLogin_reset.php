<?php
// Verificar si la solicitud POST está configurada y si contiene datos

session_start();

require "../dao/dao_formularioLoginReset.php";

require "../dao/dao_suscripcion.php";




$suscripcion=new suscripcion();

$dao_formularioLoginReset = new dao_formularioLoginReset();


switch ($_REQUEST["op"]) {
    case 'reset':


        $resultado = $dao_formularioLoginReset->consultaDatos($_REQUEST);
       
        $valor = 'sin datos';
        $texto = '<div class="col-md-6 offset-md-3">
        <div class="alert alert-danger" role="alert">
          No se pudo validar el correo. Inténte nuevamente.
          </div> </div>';

        if ($resultado ) {

        $url = 'https://certificaciones.dmc.pe/suscripcion/reset-password?mail='.$resultado['correo'].'&ha='.$resultado['id']; 

        $mensaje = $dao_formularioLoginReset->mensajeRestablecerClave($resultado,$url);
          
        $resultado = $suscripcion->send_mail("RESTABLECER CONTRASEÑA",$resultado['correo'], "Informes DMC", "", "", "", "INFORME CERTIFICACIONES DMC", $mensaje);
 
        
            if ($resultado) {
                 $valor = 'enviado';
                 $texto = '<div class="col-md-6 offset-md-3">
                 <div class="alert alert-success" role="alert">
                Se envió un correo para el restablecimiento de su contraseña.
                        </div></div>';
            }

      

         } 
       

        echo json_encode(
         array(
            'datos' =>$valor ,
            'text' => $texto
          
         )
        );

    break;

    case 'reset-password':

        $resultado = $dao_formularioLoginReset->consultaDatos($_REQUEST);

        $valor = 'danger'; 
        $texto = '¡No se pudo registrar, intente nuevamente!';

        if ($_REQUEST['password'] !== $_REQUEST["repite_password"] )  {

         $texto = '¡Las contraseñas deben ser identicas!';

        }else{

              if ($resultado['correo'] && $_REQUEST['password']  && $_REQUEST['repite_password']) {
              
                $data = $dao_formularioLoginReset->resetPassword($_REQUEST);
                  
                  if ($data) {
                    $texto = '¡Registrado! <br> Ir a loguin <a href="https://certificaciones.dmc.pe/suscripcion/inicio_formulario.php" >Aquí</a>';
                    $valor = 'success'; 
                    }
      
              } 
      

        };

        
     
   

         echo json_encode(
             array(
                'valor' =>$valor,
                'text' => $texto
             
             )
            );
        
    break;
    
    default:
        echo "nada";
    break;
}


?>
