<?php
class GestionbdPL extends PDO {
//SIGLETON
//variable est�tica: Recibir� la instancia de la clase
private static $instancia=null;

//metodo est�tico: Crea una instancia de la misma clase
public static function getInstancia(){
try {
			if( self::$instancia == null ){ //Si a un no existe la instancia
				self::$instancia = new GestionbdPL();  //Crea la instancia(se ejecuta automaticamente el metodo constructor de la clase)
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
$url="mysql:host=aulavirtualdmc.com;dbname=aulavdmc_plataforma;charset=utf8";
$user="aulavdmc_pladmin";
$pass="{&lYK0dGm5H1";
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