<?php

require_once "gestionbd.php";

class persona{
    
    public function limpiar($valor) {

		return 	$valor=="" ? NULL : 
		trim(stripslashes($valor));

    }

    public function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
    
    public function registrar_persona($codigo,$tipo_documento,$numero_documento,$nombres,$ap_pat,$ap_mat,$fec_nac,$pais,$ciudad){

		$gbd=Gestionbd::getInstancia();

        $ip=self::get_client_ip();

        $sql="insert into MD_PERSONA(codunicoper,tip_documento,nro_documento,des_nombre,des_apellido_paterno,des_apellido_materno,fec_nacimiento,des_pais,des_ciudad,
        flg_activo) values
         (:codigo,:tipo_documento,:dni,:nombres,:ap_pat,:ap_mat,:fec_nac,:pais,:ciudad,1)";

		$cmd=$gbd->prepare($sql);

		$cmd->bindparam(':codigo',$codigo);

        $cmd->bindparam(':tipo_documento',$tipo_documento);
        
        $cmd->bindparam(':dni',$numero_documento);
        
        $cmd->bindparam(':nombres',$nombres);
        
        $cmd->bindparam(':ap_pat',$ap_pat);

        $cmd->bindparam(':ap_mat',$ap_mat);
        
        $cmd->bindparam(':fec_nac',$fec_nac);

        $cmd->bindparam(':pais',$pais);

        $cmd->bindparam(':ciudad',$ciudad);

		$cmd->execute();

		return $gbd->lastInsertId();
    }

    public function registrar_correo($codigo,$correo,$datos){
        
        $gbd=Gestionbd::getInstancia();

        $sql="insert into MD_CORREO(codunicoper,des_correo,flg_datos) values
         (:codigo,:correo,:flg_datos)";

		$cmd=$gbd->prepare($sql);

		$cmd->bindparam(':codigo',$codigo);

        $cmd->bindparam(':correo',$correo);

        $cmd->bindparam(':flg_datos',$datos);

		$cmd->execute();

		return $gbd->lastInsertId();
    }
    
    public function registrar_telefonos($codigo,$tipo_telefono,$nro_telefono,$datos){
        
        $gbd=Gestionbd::getInstancia();

        $sql="insert into MD_TELEFONO(codunicoper,tip_telefono,num_telefono,flg_datos) values
        (:codigo,:tipo_telefono,:telefono,:flg_datos)";

		$cmd=$gbd->prepare($sql);

		$cmd->bindparam(':codigo',$codigo);

        $cmd->bindparam(':tipo_telefono',$tipo_telefono);

        $cmd->bindparam(':telefono',$nro_telefono);

        $cmd->bindparam(':flg_datos',$datos);

		$cmd->execute();

        return $gbd->lastInsertId();
        
    }

    public function registrar_estudio($codigo,$cod_grado,$institucion,$especialidad,$nivel){
        
        $gbd=Gestionbd::getInstancia();

        $sql="insert into MD_ESTUDIO(codunicoper,cod_gradoinstruccion,des_institucion,des_especialidad,num_nivel) values
        (:codigo,:cod_grado,:institucion,:especialidad,:num_nivel)";

		$cmd=$gbd->prepare($sql);

		$cmd->bindparam(':codigo',$codigo);

        $cmd->bindparam(':cod_grado',$cod_grado);

        $cmd->bindparam(':institucion',$institucion);
        
        $cmd->bindparam(':especialidad',$especialidad);
        
        $cmd->bindparam(':num_nivel',$nivel);

		$cmd->execute();

		return $gbd->lastInsertId();
    }

    public function registrar_consulta($codigo,$curso,$medio,$mensaje,$fec_registro,$tip_atendido,$datos){

        $gbd=Gestionbd::getInstancia();

        $sql="insert into MD_CONSULTAS (codunicoper,codcapacitacion,tip_contacto,des_mensaje,fec_registro_consulta,tip_atendido,flg_datos) values
        (:codigo,:curso,:medio,:mensaje,:fec_registro,:tip_atendido,:datos)";

		$cmd=$gbd->prepare($sql);

        $cmd->bindparam(':codigo',$codigo);
        
        $cmd->bindparam(':curso',$curso);

        $cmd->bindparam(':medio',$medio);
        
        $cmd->bindparam(':mensaje',$mensaje);
        
        $cmd->bindparam(':fec_registro',$fec_registro);

        $cmd->bindparam(':tip_atendido',$tip_atendido);

        $cmd->bindparam(':datos',$datos);

		$cmd->execute();

		return $gbd->lastInsertId();
    }

    public function registrar_trabajo($codigo,$centro_trabajo,$cargo){
        
        $gbd=Gestionbd::getInstancia();

        $sql="insert into MD_TRABAJO (codunicoper,des_centrotrabajo,des_cargo) values
        (:codigo,:centro_trabajo,:cargo)";

		$cmd=$gbd->prepare($sql);

		$cmd->bindparam(':codigo',$codigo);

        $cmd->bindparam(':centro_trabajo',$centro_trabajo);
        
        $cmd->bindparam(':cargo',$cargo);

		$cmd->execute();

		return $gbd->lastInsertId();
    }

    public function registrar_embajador($datos){

        $nombres = $datos["nombres"];

        $num_documento = $datos["num_documento"];

        $tipo_documento=1;

        $pais = $datos["pais"];

        $cod_pais = strtoupper(substr($pais,0,3));

        $codigo = str_pad($cod_pais.$tipo_documento.$num_documento, 16, "0", STR_PAD_RIGHT);

        $grado = $datos["grado"];

        $embajador = $datos["codigo"];

        $correos = $datos["correo"];

        $telefonos = $datos["celular"];

        $activo = 1;

        $flag_datos = $datos["datos"];

        $tipo_telefono = 1;

        $origen = 2;

        $medio = 20;

        $mensaje=$datos["mensaje"];

        $tip_atendido=0;

        date_default_timezone_set('America/Lima');

        $date = new DateTime(); 

        $fec_registro = $date->format('Y-m-d H:i:s');

        $cursos = $_POST["cursos"];

        if(self::validar_dni($codigo)!=1){

            self::registrar_persona($codigo,$tipo_documento,$num_documento,$nombres,$datos["apellidos"],NULL,$datos["fec"],$pais,$datos["ciudad"]);
            
        }

        

        foreach($correos as $x =>  $correo){

            self::registrar_correo($codigo,$correo,$flag_datos);

        }

        foreach($telefonos as $y =>  $telefono){

            self::registrar_telefonos($codigo,$tipo_telefono,$telefono,$flag_datos);

        }

        self::registrar_estudio($codigo,$grado,$datos["institucion"],$datos["especialidad"],$datos["ciclo"]);

        self::registrar_trabajo($codigo,$datos["centro_trabajo"],$datos["cargo"]);

        foreach($cursos as $z => $curso){

            self::registrar_consulta($codigo,$curso,$medio,$mensaje,$fec_registro,$tip_atendido,$flg_datos);

        }

    }

    public function validar_dni($dni){

        $gbd=Gestionbd::getInstancia();

		$sql="SELECT 1 AS estado FROM MD_PERSONA WHERE CODUNICOPER=:id limit 1";

        $cmd=$gbd->prepare($sql);
        
        $cmd->bindparam(":id",$dni);
        
        $cmd->execute();
        
        $lista=$cmd->fetch(PDO::FETCH_ASSOC);
        
		return isset($lista['estado']) ? $lista['estado'] : 0 ;
    }

    public function lista_universidades(){

    	$gbd=Gestionbd::getInstancia();

		$sql="SELECT COD_INSTITUCION AS id, DES_NOMBRE as UNIVERSIDAD FROM MD_INSTITUCION_OLD ORDER BY 2";

        $cmd=$gbd->prepare($sql);
        
        $cmd->execute();
        
        $lista=$cmd->fetchAll(PDO::FETCH_ASSOC);

        return $lista;
    }
    

}
?>