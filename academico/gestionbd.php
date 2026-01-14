<?php
class Gestionbd extends PDO {
//SIGLETON
//variable est�tica: Recibir� la instancia de la clase
private static $instancia=null;

//metodo est�tico: Crea una instancia de la misma clase
public static function getInstancia(){
try {
			if( self::$instancia == null ){ //Si a un no existe la instancia
				self::$instancia = new Gestionbd();  //Crea la instancia(se ejecuta automaticamente el metodo constructor de la clase)
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
$url="mysql:host=34.198.54.102;port=33061;dbname=BD_COMERCIAL;charset=utf8";
$user="admin";
$pass="DMC#AWSBD123";
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
?>