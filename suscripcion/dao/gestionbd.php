<?php 

class Gestionbd {

   public static function getInstancia() {
        try {
            $conexion = new PDO(
                'mysql:host=34.198.54.102;port=33061;dbname=BD_COMERCIAL;charset=utf8',
                'DMC_SISTEMA_COMERCIAL', // usuario
                'cMM6i*Nk#hEJrN4T', // contraseña
                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8')
            );

            $conexion->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            return $conexion;

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            throw $e; 
        }
    }
}

// $conexion = new Conexion();
// try {
//     $conexion->get_conexion();
//     echo "Conexión establecida";
// } catch (Exception $e) {
//     echo "No se pudo establecer la conexión: " . $e->getMessage();
// }

?>