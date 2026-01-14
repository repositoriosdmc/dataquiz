<?php 

require_once  "dao/gestionbd.php";
require_once  "dao/dao_suscripcion.php";
require_once  "dao/dao_correo_gestion.php";

 $suscripcion=new suscripcion();

 $correoGestion=new correoGestion();

 $listaProductos = $correoGestion->lita_producto();

 

$valor = '';
foreach ($listaProductos as $producto) {
  $data = $correoGestion->consulta_inicio($producto["capacitacion_base_id"], $producto["capacitacion_id"], $producto["id_vendedor"]);

  if ($data) { // enviar si hay contenido

  $valor = '<table style="width:100%; border:1px solid black;">'; 
  $valor .= '<tr style=" border:1px solid black; background-color:blue; color:white">';
  $valor .= '<th colspan="4" style=" border:1px solid black;">'.$producto['capacitacion_base_id'].' '.$producto['capacitacion_base_nombre'].' '.$producto['usuario_nombre'].' '.$producto['capacitacion_nombre'].'</th>';
  $valor .= '</tr>';
  $valor .= '<tr style=" border:1px solid black;">'; 
  $valor .= '<th style=" border:1px solid black;">FECHA</th>';
  $valor .= '<th style=" border:1px solid black;">NOMBRE</th>';
  $valor .= '<th style=" border:1px solid black;">CORREO</th>';
  $valor .= '<th style=" border:1px solid black;">VENDEDOR</th>';
  $valor .= '</tr>';

  foreach ($data as $key => $value) {
      $valor .= '<tr style=" border:1px solid black;">';
      $valor .= '<td style=" border:1px solid black;">'.$value['fecha_registro'].'</td>';
      $valor .= '<td style=" border:1px solid black;">'.$value['nombre_completos'].'</td>';
      $valor .= '<td style=" border:1px solid black;">'.$value['ficha_contacto_email'].'</td>';
      $valor .= '<td style=" border:1px solid black;">'.$value['usuario_nombre'].'</td>';
      $valor .= '</tr>'; 
  }

 echo $valor .= '</table>'; 
 $enviado = $suscripcion->send_mail("Alerta leads sin gestión", $producto['usuario_nombre'], "Informes DMC", "", "", "", $producto['capacitacion_base_nombre'], $valor,"alessandra.reupo@dmc.pe");
//  $producto['usuario_nombre']
//$enviado = $suscripcion->send_mail("Alerta leads sin gestión", "carlos.mori@dmc.pe", "Informes DMC", "", "", "", $producto['capacitacion_base_nombre'], $valor,"u19308479@utp.edu.pe");
}
 
}

?>



