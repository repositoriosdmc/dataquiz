<?
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();

require_once "../dao/dao_cuestionario.php";

$cuestionario = new cuestionario();


if(count($_POST)>0){

    $validar = $cuestionario->validar_email($_POST["correo"]);

    if($validar==0){ // No se encontro ningún registro con ese correo
        $cuestionario->registrar_cuestionario_perfil_data_analytics($_POST);
    }

    

}

header("location:https://certificaciones.dmc.pe/suscripcion/graciasDataAnalytics.php");
