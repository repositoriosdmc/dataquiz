<?
require_once "../dao/dao_inscripcion.php";

function utf8_array($lista){
$data=array();
    $convertedArray = array();
    foreach($lista as $key => $value) {
      foreach ($lista[$key] as $key => $value) {
        $cod[$key]=utf8_encode($value);
      }
      array_push($data,$cod);
    }
    return $data;
}
echo json_encode(utf8_array(inscripcion::listado_actividad_consulta($_POST['id'])));


?>
