<?

require_once  "gestionbd_plataforma.php";

class plataforma{

	public function limpiar($valor) {

		return 	$valor=="" ? NULL : 
		trim(stripslashes($valor));

	}

	public function getIp(){
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
	}	

	public function registrar_contacto($datos){
		$gbd=GestionbdPL::getInstancia();
		$sql="insert into ficha_contacto (FICHA_CONTACTO_ID,FECHA_REGISTRO,FICHA_CONTACTO_NOMBRE,FICHA_CONTACTO_APELLIDOS,FICHA_CONTACTO_EMAIL,FICHA_CONTACTO_CELULAR,FICHA_CONTACTO_TPO_DOCUMENTO,FICHA_CONTACTO_NUM_DOCUMENTO,FICHA_CONTACTO_FEC_NACIMIENTO,FICHA_CONTACTO_SEXO,FICHA_CONTACTO_PAIS,FICHA_CONTACTO_CIUDAD,FICHA_CONTACTO_FLG_DATOS_TRATAMIENTO,FICHA_CONTACTO_FLG_DATOS) values('',NOW(),:NOMBRES,:APELLIDOS,:EMAIL,:CELULAR,:TPO_DOCUMENTO,:NUM_DOCUMENTO,:FEC_NAC,:SEXO,:PAIS,:CIUDAD,:TRATAMIENTO,:DATOS)";
		$cmd=$gbd->prepare($sql);
		$cmd->bindparam(':NOMBRES',$datos['nombres']);
		$cmd->bindparam(':APELLIDOS',$datos['apellidos']);
		$cmd->bindparam(':EMAIL',$datos['correo']);
		$cmd->bindparam(':CELULAR',$datos['celular']);
		$cmd->bindparam(':TPO_DOCUMENTO',$datos['tDocumento']);
		$cmd->bindparam(':NUM_DOCUMENTO',$datos['num_documento']);
		$cmd->bindparam(':FEC_NAC',$datos['fec_nac']);
		$cmd->bindparam(':SEXO',$datos['sexo']);
		$cmd->bindparam(':PAIS',$datos['pais']);
		$cmd->bindparam(':CIUDAD',$datos['provincia']);
		$cmd->bindparam(':TRATAMIENTO',$datos['datos_2']);
		$cmd->bindparam(':DATOS',$datos['datos']);
		$cmd->execute();
		return $gbd->lastInsertId();
	}

	public function registrar_encuesta_plataforma($datos)
    {

        $gbd = GestionbdPL::getInstancia();
        $sql = "insert into suscrito_plataforma (encuesta_id,ficha_contacto_id,p1_1,p1_2,p1_2_otro,p1_3,p1_3_otro,p2_1,p2_1_otro,p2_2_1,p2_2_2,p2_2_3,p2_2_4
        ,p2_2_5,p2_2_6,p2_2_7,p2_2_7_otro,p2_3_1,p2_3_2,p2_3_3,p2_3_4,p2_3_5,p2_3_6,p2_3_7,p2_3_8,p2_3_8_otro,p2_4,p2_5,p2_6_1,p2_6_2,p2_6_3,p2_6_4,p2_6_5,p2_6_6,p2_6_7,p2_6_7_otro,p2_7_1,p2_7_2,p2_7_3,p2_7_4,p2_7_5,p2_7_6,p2_7_7,p2_7_8,p2_7_9,p2_7_10,p2_7_10_otro,datos) values ('',:ficha_contacto_id,:p1_1,:p1_2,:p1_2_otro,:p1_3,:p1_3_otro,:p2_1,:p2_1_otro,:p2_2_1,:p2_2_2,:p2_2_3,:p2_2_4
        ,:p2_2_5,:p2_2_6,:p2_2_7,:p2_2_7_otro,:p2_3_1,:p2_3_2,:p2_3_3,:p2_3_4,:p2_3_5,:p2_3_6,:p2_3_7,:p2_3_8,:p2_3_8_otro,:p2_4,:p2_5,:p2_6_1,:p2_6_2,:p2_6_3,:p2_6_4,:p2_6_5,:p2_6_6,:p2_6_7,:p2_6_7_otro,:p2_7_1,:p2_7_2,:p2_7_3,:p2_7_4,:p2_7_5,:p2_7_6,:p2_7_7,:p2_7_8,:p2_7_9,:p2_7_10,:p2_7_10_otro,:datos)";
        $cmd = $gbd->prepare($sql);
        $cmd->bindparam(':ficha_contacto_id', $datos['ficha_contacto_id']);
        $cmd->bindparam(':p1_1', $datos['p1_1']);
        $cmd->bindparam(':p1_2', $datos['sector']);
        $cmd->bindparam(':p1_2_otro', $datos['sector_otro']);
        $cmd->bindparam(':p1_3', $datos['cargo']);
        $cmd->bindparam(':p1_3_otro', $datos['cargo_otro']);
        $cmd->bindparam(':p2_1', $datos['modalidad']);
        $cmd->bindparam(':p2_1_otro', $datos['modalidad_otro']);
        $cmd->bindparam(':p2_2_1', $datos['precio']);
        $cmd->bindparam(':p2_2_2', $datos['iteraccion_docente']);
        $cmd->bindparam(':p2_2_3', $datos['iteraccion_companeros']);
        $cmd->bindparam(':p2_2_4', $datos['libertad_horario']);
        $cmd->bindparam(':p2_2_5', $datos['asistencia_academica']);
        $cmd->bindparam(':p2_2_6', $datos['cantidad_horas']);
        $cmd->bindparam(':p2_2_7', $datos['p2_otro']);
        $cmd->bindparam(':p2_2_7_otro', $datos['p2_otro_otro']);
        $cmd->bindparam(':p2_3_1', $datos['coursera']);
        $cmd->bindparam(':p2_3_2', $datos['platzi']);
        $cmd->bindparam(':p2_3_3', $datos['netzum']);
        $cmd->bindparam(':p2_3_4', $datos['edx']);
        $cmd->bindparam(':p2_3_5', $datos['datacamp']);
        $cmd->bindparam(':p2_3_6', $datos['codeacademy']);
        $cmd->bindparam(':p2_3_7', $datos['ninguna']);
        $cmd->bindparam(':p2_3_8', $datos['p3_otro']);
        $cmd->bindparam(':p2_3_8_otro', $datos['p3_otro_otro']);
        $cmd->bindparam(':p2_4', $datos['p4']);
        $cmd->bindparam(':p2_5', $datos['tipo_capacitacion']);
        $cmd->bindparam(':p2_6_1', $datos['constancia_digital']);
        $cmd->bindparam(':p2_6_2', $datos['asesoria_docente']);
        $cmd->bindparam(':p2_6_3', $datos['variedad_cursos']);
        $cmd->bindparam(':p2_6_4', $datos['ruta_aprendizaje']);
        $cmd->bindparam(':p2_6_5', $datos['comunidad']);
        $cmd->bindparam(':p2_6_6', $datos['promociones']);
        $cmd->bindparam(':p2_6_7', $datos['p6_otro']);
        $cmd->bindparam(':p2_6_7_otro', $datos['p6_otro_otro']);
        $cmd->bindparam(':p2_7_1', $datos['base_datos']);
        $cmd->bindparam(':p2_7_2', $datos['visualizacion_datos']);
        $cmd->bindparam(':p2_7_3', $datos['r_python']);
        $cmd->bindparam(':p2_7_4', $datos['cloud']);
        $cmd->bindparam(':p2_7_5', $datos['big_data']);
        $cmd->bindparam(':p2_7_6', $datos['machine_learning']);
        $cmd->bindparam(':p2_7_7', $datos['inteligencia_artificial']);
        $cmd->bindparam(':p2_7_8', $datos['metodologia_agil']);
        $cmd->bindparam(':p2_7_9', $datos['habilidades_blandas']);
        $cmd->bindparam(':p2_7_10', $datos['p7_otro']);
        $cmd->bindparam(':p2_7_10_otro', $datos['p7_otro_otro']);
        $cmd->bindparam(':datos', $datos['datos_2']);
        $cmd->execute();
        return $gbd->lastInsertId();
    }
	

	public function registrar_plataforma_espejo($datos){

		$ficha_contacto_id = self::registrar_contacto($datos);

		$datos["ficha_contacto_id"] = $ficha_contacto_id;

		self::registrar_encuesta_plataforma($datos);
	
	}




}



?>