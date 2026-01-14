<?

require_once "../dao/dao_inscripcion.php";
$inscripcion=new inscripcion();
echo json_encode( $inscripcion->cantidad_suscriptos_hoy() );

?>
