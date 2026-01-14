<?
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "dao_mail.php";


$request = file_get_contents('php://input');


function procesoRegistro($request){

    $correo = 'marco.medrano@dataminingperu.com';

    $mensajePost = var_export($request, true);

    $req_dump = print_r($request,true);

    $json_data = file_put_contents('request.log',$req_dump);

    $action = var_export($json_data,true);

    $mail = new mail();

    $pagos = null;
    
    $json = json_decode($request, true);

    $data = $json;

    $mail->send_mail("Informes DMC",$correo,"DMC","","","",'Prueba POST',$mensajePost);
    
    //$mail->send_mail("Informes DMC",$correo,"DMC","","","",'Array Id',$data["billing"]["first_name"]);

    //$mail->send_mail("Informes DMC",$correo,"DMC","","","",'Array Mensaje',var_export($data,true));


    





    return $mensajePost;

}





procesoRegistro($request);

//var_dump(lista_pago_id(3418));
 

?>