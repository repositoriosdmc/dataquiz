<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
class GestionbdDMC extends PDO {
//SIGLETON
//variable est�tica: Recibir� la instancia de la clase
private static $instancia=null;

//metodo est�tico: Crea una instancia de la misma clase
public static function getInstancia(){
try {
			if( self::$instancia == null ){ //Si a un no existe la instancia
				self::$instancia = new GestionbdDMC();  //Crea la instancia(se ejecuta automaticamente el metodo constructor de la clase)
			}
		} catch (Exception $e) {
			throw $e;
}
		return self::$instancia;//Retorna el objeto instanciado (variable estatica)		
//SINGLETON
}
//Metodo constructor
function __construct(){
try{
//Abre la conexion a la bd

/*$url="mysql:host=gator3299.hostgator.com;dbname=intradmc_admin;charset=utf8;";
$user="intradmc_admuser";
$pass="v7hc_(uMI37+";*/
$url="mysql:host=srv1048.hstgr.io;port=3306;dbname=u654289816_L7X9d;charset=utf8";
$user="u654289816_uFbML";
$pass="Jz>d^!QGXh5[";
/*$url="mysql:host=aulavirtualdmc.com;dbname=aulavdmc_admin;charset=utf8";
$user="aulavdmc_mdln1";
$pass="ibNZ!hjyS[p(";*/

parent::__construct($url,$user,$pass);  //Conexion con la base de datos
$this->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);  //Los errores se manejaran por excepciones
$this->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);
}
catch(Exception $e){
// Escribir el mensaje de error en un archivo de texto
error_log($e->getMessage()."\n\n",3,"../log/Error.log");
throw $e; //Disparamos el error hacia otro nivel
}
}

}  //fin de la clase

$gbd=GestionbdDMC::getInstancia();
    $sql="SELECT cl.*,0 as flag_comercial, p.post_id, p.curso,clp.product_net_revenue AS total, p.fecha_inicio, p.sku FROM ( SELECT p.id, MAX(IF(mt.meta_key = '_billing_first_name', mt.meta_value, '')) AS nombres, MAX(IF(mt.meta_key = '_billing_last_name', mt.meta_value, '')) AS apellidos, MAX(IF(mt.meta_key = '_billing_email', mt.meta_value, '')) AS mail, MAX(IF(mt.meta_key = '_billing_phone', mt.meta_value, '')) AS celular, MAX(IF(mt.meta_key = '_billing_dni', mt.meta_value, '')) AS dni, MAX(IF(mt.meta_key = '_order_currency', mt.meta_value, '')) AS moneda, MAX(IF(mt.meta_key = '_order_total', mt.meta_value, '')) AS total_total, MAX(IF(mt.meta_key = '_payment_method_title', mt.meta_value, '')) AS modo_pago, MAX(IF(mt.meta_key = '_paid_date', SUBTIME(mt.meta_value, '05:00:00'), '')) AS fecha_pago, MAX(IF(mt.meta_key = '_billing_company', mt.meta_value, '')) AS empresa, MAX(IF(mt.meta_key = '_billing_country', mt.meta_value, '')) AS pais FROM wp_wc_order_stats wpo INNER JOIN wp_posts p ON p.ID = wpo.order_id INNER JOIN wp_postmeta mt ON p.ID = mt.post_id WHERE p.post_type = 'shop_order' AND wpo.status IN ('wc-processing') AND wpo.flag_comercial = 0 AND mt.meta_key IN ('_billing_first_name', '_billing_last_name', '_billing_email', '_billing_phone','_billing_dni','_order_currency', '_order_total', '_payment_method_title', '_paid_date', '_billing_company', '_billing_country') GROUP BY post_id ) cl INNER JOIN wp_wc_order_product_lookup clp ON cl.id = clp.order_id INNER JOIN (SELECT post_id, MAX(IF(meta_key = '_wp_old_slug', meta_value, '')) AS curso, MAX(IF(meta_key = 'fecha_de_inicio', meta_value, '')) AS fecha_inicio, MAX(IF(meta_key = '_sku', meta_value, '')) AS sku FROM wp_postmeta WHERE meta_key IN ('_wp_old_slug', 'fecha_de_inicio', '_sku') GROUP BY post_id) p ON clp.product_id = p.post_id";
    $cmd=$gbd->prepare($sql);
    $cmd->execute();
    $lista=$cmd->fetchAll(PDO::FETCH_ASSOC);
    
    var_dump($lista);