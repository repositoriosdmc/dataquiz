<?
require_once "../ds/gestionbd.php";
class encuesta{
	public function limpiar($valor) {
		return 	$valor=="" ? NULL :
		        trim(stripslashes($valor));
	}
	public function guardar_encuesta($pc,$cro,$ses,$clf,$com,$sib,$sib_com,$pro){
		$gbd=Gestionbd::getInstancia();
		$sql="call sp_encuesta_guardar (?,?,?,?,?,?,?,?,?)";
		$cmd=$gbd->prepare($sql);
		$cmd->bindparam(1,$_SERVER['REMOTE_ADDR']);
		$cmd->bindparam(2,$pc);
		$cmd->bindparam(3,$cro);
		$cmd->bindparam(4,$ses);
		$cmd->bindparam(5,self::limpiar($clf));
		$cmd->bindparam(6,self::limpiar($com));
		$cmd->bindparam(7,self::limpiar($sib));
		$cmd->bindparam(8,self::limpiar($sib_com));
		$cmd->bindparam(9,self::limpiar($pro));
		$cmd->execute();
	}

	public function guardar_encuesta_final($pc,$cro,$int,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$p9,
		$p10,$p11,$p12,$p13,$p14,$p15,$p16,$com){
		$gbd=Gestionbd::getInstancia();
		$sql="call sp_encuesta_final_guardar (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$cmd=$gbd->prepare($sql);
		$cmd->bindparam(1,$_SERVER['REMOTE_ADDR']);
		$cmd->bindparam(2,$pc);
		$cmd->bindparam(3,$cro);
		$cmd->bindparam(4,self::limpiar($int));
		$cmd->bindparam(5,$p1);
		$cmd->bindparam(6,$p2);
		$cmd->bindparam(7,$p3);
		$cmd->bindparam(8,$p4);
		$cmd->bindparam(9,$p5);
		$cmd->bindparam(10,$p6);
		$cmd->bindparam(11,$p7);
		$cmd->bindparam(12,$p8);
		$cmd->bindparam(13,$p9);
		$cmd->bindparam(14,$p10);
		$cmd->bindparam(15,$p11);
		$cmd->bindparam(16,$p12);
		$cmd->bindparam(17,$p13);
		$cmd->bindparam(18,$p14);
		$cmd->bindparam(19,$p15);
		$cmd->bindparam(20,$p16);
		$cmd->bindparam(21,self::limpiar($com));
		$cmd->execute();
	}

	public function cuestionario_final_registrar($pc,$cro,$p1,$p2,$p3_1,$p3_2,$p3_3,
	$p4_1,$p4_2,$p4_3,$p4_4,$p4_5,$p4_6,$p4_7,$p4_8,$p4_9,
	$p5_1,$p5_2,$p5_3,$p5_4,$p5_5,$p5_6,$p5_7,$p5_8,$p5_9,$p6,$p7_1,$p7_2,$p8,$p9,$p10,$consentimiento,$apellidos_nombres,$testimonio,$curso){
		$gbd=Gestionbd::getInstancia();
		$sql="call sp_cuestionario_final_registrar (:ip,:pc,:cronograma,:p1,:p2,:p3_1,:p3_2,:p3_3,:p4_1,:p4_2,:p4_3,:p4_4,:p4_5,:p4_6,:p4_7,:p4_8,:p4_9,
		:p5_1,:p5_2,:p5_3,:p5_4,:p5_5,:p5_6,:p5_7,:p5_8,:p5_9,:p6,:p7_1,:p7_2,:p8,:p9,:p10,:consentimiento,:apellidos_nombres,:testimonio,:curso)";
		$cmd=$gbd->prepare($sql);
		$cmd->bindparam(":ip",$_SERVER['REMOTE_ADDR']);
		$cmd->bindparam(":pc",$pc);
		$cmd->bindparam(":cronograma",$cro);
		$cmd->bindparam(":p1",self::limpiar($p1));
		$cmd->bindparam(":p2",self::limpiar($p2));
		$cmd->bindparam(":p3_1",self::limpiar($p3_1));
		$cmd->bindparam(":p3_2",self::limpiar($p3_2));
		$cmd->bindparam(":p3_3",self::limpiar($p3_3));
		$cmd->bindparam(":p4_1",self::limpiar($p4_1));
		$cmd->bindparam(":p4_2",self::limpiar($p4_2));
		$cmd->bindparam(":p4_3",self::limpiar($p4_3));
		$cmd->bindparam(":p4_4",self::limpiar($p4_4));
		$cmd->bindparam(":p4_5",self::limpiar($p4_5));
		$cmd->bindparam(":p4_6",self::limpiar($p4_6));
		$cmd->bindparam(":p4_7",self::limpiar($p4_7));
		$cmd->bindparam(":p4_8",self::limpiar($p4_8));
		$cmd->bindparam(":p4_9",self::limpiar($p4_9));
		$cmd->bindparam(":p5_1",self::limpiar($p5_1));
		$cmd->bindparam(":p5_2",self::limpiar($p5_2));
		$cmd->bindparam(":p5_3",self::limpiar($p5_3));
		$cmd->bindparam(":p5_4",self::limpiar($p5_4));
		$cmd->bindparam(":p5_5",self::limpiar($p5_5));
		$cmd->bindparam(":p5_6",self::limpiar($p5_6));
		$cmd->bindparam(":p5_7",self::limpiar($p5_7));
		$cmd->bindparam(":p5_8",self::limpiar($p5_8));
		$cmd->bindparam(":p5_9",self::limpiar($p5_9));
		$cmd->bindparam(":p6",self::limpiar($p6));
		$cmd->bindparam(":p7_1",self::limpiar($p7_1));
		$cmd->bindparam(":p7_2",self::limpiar($p7_2));
		$cmd->bindparam(":p8",self::limpiar($p8));
		$cmd->bindparam(":p9",self::limpiar($p9));
		$cmd->bindparam(":p10",self::limpiar($p10));
		$cmd->bindparam(":consentimiento",self::limpiar($consentimiento));
		$cmd->bindparam(":apellidos_nombres",self::limpiar($apellidos_nombres));
		$cmd->bindparam(":testimonio",self::limpiar($testimonio));
		$cmd->bindparam(":curso",self::limpiar($curso));
		$cmd->execute();
	}

	public function cuestionario_final_pea_registrar($pc,$cro,$p1,$p2,$p3_1,$p3_2,$p3_3,
	$p4_1,$p4_2,$p4_3,$p4_4,$p4_5,
	$p5_1,$p5_2,$p5_3,$p5_4,$p5_5,$p5_6,$p6,$p7_1,$p7_2,$p8,$p9,$p10,$consentimiento,$apellidos_nombres,$testimonio,$curso){
		$gbd=Gestionbd::getInstancia();
		$sql="call sp_cuestionario_final_pea_registrar (:ip,:pc,:cronograma,:p1,:p2,:p3_1,:p3_2,:p3_3,:p4_1,:p4_2,:p4_3,:p4_4,:p4_5,
		:p5_1,:p5_2,:p5_3,:p5_4,:p5_5,:p5_6,:p6,:p7_1,:p7_2,:p8,:p9,:p10,:consentimiento,:apellidos_nombres,:testimonio,:curso)";
		$cmd=$gbd->prepare($sql);
		$cmd->bindparam(":ip",$_SERVER['REMOTE_ADDR']);
		$cmd->bindparam(":pc",$pc);
		$cmd->bindparam(":cronograma",$cro);
		$cmd->bindparam(":p1",self::limpiar($p1));
		$cmd->bindparam(":p2",self::limpiar($p2));
		$cmd->bindparam(":p3_1",self::limpiar($p3_1));
		$cmd->bindparam(":p3_2",self::limpiar($p3_2));
		$cmd->bindparam(":p3_3",self::limpiar($p3_3));
		$cmd->bindparam(":p4_1",self::limpiar($p4_1));
		$cmd->bindparam(":p4_2",self::limpiar($p4_2));
		$cmd->bindparam(":p4_3",self::limpiar($p4_3));
		$cmd->bindparam(":p4_4",self::limpiar($p4_4));
		$cmd->bindparam(":p4_5",self::limpiar($p4_5));
		$cmd->bindparam(":p5_1",self::limpiar($p5_1));
		$cmd->bindparam(":p5_2",self::limpiar($p5_2));
		$cmd->bindparam(":p5_3",self::limpiar($p5_3));
		$cmd->bindparam(":p5_4",self::limpiar($p5_4));
		$cmd->bindparam(":p5_5",self::limpiar($p5_5));
		$cmd->bindparam(":p5_6",self::limpiar($p5_6));
		$cmd->bindparam(":p6",self::limpiar($p6));
		$cmd->bindparam(":p7_1",self::limpiar($p7_1));
		$cmd->bindparam(":p7_2",self::limpiar($p7_2));
		$cmd->bindparam(":p8",self::limpiar($p8));
		$cmd->bindparam(":p9",self::limpiar($p9));
		$cmd->bindparam(":p10",self::limpiar($p10));
		$cmd->bindparam(":consentimiento",self::limpiar($consentimiento));
		$cmd->bindparam(":apellidos_nombres",self::limpiar($apellidos_nombres));
		$cmd->bindparam(":testimonio",self::limpiar($testimonio));
		$cmd->bindparam(":curso",self::limpiar($curso));
		$cmd->execute();
	}

	public function cuestionario_final_online_registrar($pc,$cro,$p1,$p2,$p3_1,$p3_2,$p3_3,
	$p4_1,$p4_2,$p4_3,$p4_4,$p4_5,$p4_6,$p4_7,$p4_8,$p4_9,$p4_10,
	$p5_1,$p5_2,$p5_3,$p5_4,$p5_5,$p5_6,$p5_7,$p5_8,$p5_9,$p6,$p7_1,$p7_2,$p8,$p9,$p10,$p10_1,$p10_2,$p10_2_comentario,$consentimiento,$apellidos_nombres,$testimonio,$nps){
		$gbd=Gestionbd::getInstancia();
		$sql="call sp_cuestionario_final_online_registrar (:ip,:pc,:cronograma,:p1,:p2,:p3_1,:p3_2,:p3_3,:p4_1,:p4_2,:p4_3,:p4_4,:p4_5,:p4_6,:p4_7,:p4_8,:p4_9,:p4_10,
		:p5_1,:p5_2,:p5_3,:p5_4,:p5_5,:p5_6,:p5_7,:p5_8,:p5_9,:p6,:p7_1,:p7_2,:p8,:p9,:p10,:p10_1,:p10_2,:p10_2_comentario,:consentimiento,:apellidos_nombres,:testimonio,:nps)";
		$cmd=$gbd->prepare($sql);
		$cmd->bindparam(":ip",7);
		$cmd->bindparam(":pc",$pc);
		$cmd->bindparam(":cronograma",$cro);
		$cmd->bindparam(":p1",self::limpiar($p1));
		$cmd->bindparam(":p2",self::limpiar($p2));
		$cmd->bindparam(":p3_1",self::limpiar($p3_1));
		$cmd->bindparam(":p3_2",self::limpiar($p3_2));
		$cmd->bindparam(":p3_3",self::limpiar($p3_3));
		$cmd->bindparam(":p4_1",self::limpiar($p4_1));
		$cmd->bindparam(":p4_2",self::limpiar($p4_2));
		$cmd->bindparam(":p4_3",self::limpiar($p4_3));
		$cmd->bindparam(":p4_4",self::limpiar($p4_4));
		$cmd->bindparam(":p4_5",self::limpiar($p4_5));
		$cmd->bindparam(":p4_6",self::limpiar($p4_6));
		$cmd->bindparam(":p4_7",self::limpiar($p4_7));
		$cmd->bindparam(":p4_8",self::limpiar($p4_8));
		$cmd->bindparam(":p4_9",self::limpiar($p4_9));
		$cmd->bindparam(":p4_10",self::limpiar($p4_10));
		$cmd->bindparam(":p5_1",self::limpiar($p5_1));
		$cmd->bindparam(":p5_2",self::limpiar($p5_2));
		$cmd->bindparam(":p5_3",self::limpiar($p5_3));
		$cmd->bindparam(":p5_4",self::limpiar($p5_4));
		$cmd->bindparam(":p5_5",self::limpiar($p5_5));
		$cmd->bindparam(":p5_6",self::limpiar($p5_6));
		$cmd->bindparam(":p5_7",self::limpiar($p5_7));
		$cmd->bindparam(":p5_8",self::limpiar($p5_8));
		$cmd->bindparam(":p5_9",self::limpiar($p5_9));
		$cmd->bindparam(":p6",self::limpiar($p6));
		$cmd->bindparam(":p7_1",self::limpiar($p7_1));
		$cmd->bindparam(":p7_2",self::limpiar($p7_2));
		$cmd->bindparam(":p8",self::limpiar($p8));
		$cmd->bindparam(":p9",self::limpiar($p9));
		$cmd->bindparam(":p10",self::limpiar($p10));
		$cmd->bindparam(":p10_1",self::limpiar($p10_1));
		$cmd->bindparam(":p10_2",self::limpiar($p10_2));
		$cmd->bindparam(":p10_2_comentario",self::limpiar($p10_2_comentario));
		$cmd->bindparam(":consentimiento",self::limpiar($consentimiento));
		$cmd->bindparam(":apellidos_nombres",self::limpiar($apellidos_nombres));
		$cmd->bindparam(":testimonio",self::limpiar($testimonio));
		$cmd->bindparam(":nps",self::limpiar($nps));
		$cmd->execute();
	}


	public function verificar_ip($ip,$cod){
		$gbd=Gestionbd::getInstancia();
        $sql="select 1 as valor from actividad where  ip=? and cronograma_id=? and date(fecha_registro)=current_date()";
        $cmd=$gbd->prepare($sql);
        $cmd->bindParam(1,$ip);
        $cmd->bindParam(2,$cod);
        /*$cmd->bindParam(3,$ses);*/
        $cmd->execute();
        $lista=$cmd->fetch(PDO::FETCH_ASSOC);
        return $lista["valor"];
	}

	public function add_day($fecha){
		$segundos=strtotime ('+1 day' ,$fecha) ;
		return $segundos;
	}
	public function dias_clases($clases){
		$dias=array('Dom','Lun','Mar','Mie','Jue','Vie','Sab');
		$numero=array();
		$dias_clases=explode("-",$clases);
		foreach ($dias_clases as $key => $value) {
			$num_dia=array_search($value,$dias);
			array_push($numero,$num_dia);
		}

		return $numero;
	}

	public function es_feriado($fecha,$fecha_no_clases){
	    $fecha=date("d/m",$fecha);
	    /* 2014 '01/01','28/03','29/03',
		    '01/05','29/06','28/07','29/07','30/08',
		    '08/10','01/11','08/12','25/12'*/
	    $feriados=array('01/01','01/04','02/04',
		    '01/05','29/06','28/07','29/07',
		    '08/10','01/11','08/12','25/12');

	    if($fecha_no_clases!=""){
	    	$feriados=array_merge($feriados,$fecha_no_clases);
	    }

        $agosto=date("Y")."-08-30";
        $excepcion=date("w",strtotime($agosto));
        if($excepcion!=0 && $excepcion!=6){
            array_push($feriados,"30/08");
        }
	    $valor=(array_search($fecha,$feriados)===false) ? false : true;
	    return $valor;
    }

    public function fecha_no_clases($cadena_fechas){
    	if($cadena_fechas!=""){
    		$array_fecha=explode(",", $cadena_fechas);
    		$fechas=array();
    		foreach ($array_fecha as $key => $value) {
    			$part=explode("-",$value);
    			$cadena=$part[2]."/".$part[1];
    			$fechas[]=$cadena;
    		}
    	}else{
    		$fechas=null;
    	}

    	return $fechas;
    }



    public function diferencia_hora($hora_inicio,$hora_fin){
    	$diferencia_horas=strtotime($hora_fin)-strtotime($hora_inicio);
    	$horas=$diferencia_horas/3600;
    	return $horas;
    }

    public function fecha_ultima_clase($fecha,$fecha_no_clases,$clases,$cant_sesiones){
        $fecha_inicio=strtotime($fecha);
        $dias_clases=self::dias_clases($clases);
        $session=0;
        while ($session <$cant_sesiones) {
	        $dias_semana=array_search(date("w",$fecha_inicio),$dias_clases);
	        

	        if ($dias_semana!==false && $feriado===false) {
		        $session ++;
	        }
            $fecha_inicio=encuesta::add_day($fecha_inicio);
        }
        $fecha_fin=date("d/m/Y",strtotime ('-1 day' ,$fecha_inicio) );
        return $fecha_fin;
    }

	public function cronograma($salon){
		$gbd=Gestionbd::getInstancia();
        $sql="call sp_clase_hoy (?)";
        $cmd=$gbd->prepare($sql);
        $cmd->bindParam(1,$salon);
        $cmd->execute();
        $lista=$cmd->fetch(PDO::FETCH_ASSOC);
        return $lista;
	}

	public function numero_session($fecha_inicio,$fecha_no_clases,$clases){
		$arr_fecha_no_clases=self::fecha_no_clases($fecha_no_clases);
        $dias_clases=self::dias_clases($clases);
        $hoy=date('Y-m-d');
        $j =strtotime($hoy);
        $session=0;
        for($i=strtotime($fecha_inicio); $i<=$j; $i=self::add_day($i)){
	        $dias_semana=array_search(date("w",$i),$dias_clases);
	        $feriado=self::es_feriado($i,$arr_fecha_no_clases);

	        if ($dias_semana!==false && $feriado===false) {
		        $session ++;
	        }

        }

        return $session;
	}

	


	public function listado_comentario($id){
		$gbd=Gestionbd::getInstancia();
        $sql="select c.id,d.nombre as curso,e.nombre,c.fecha_ini,
                b.fecha_registro as fecha,a.num_session,
                a.calificacion,a.comentario
                from encuesta a
                inner join actividad b on a.actividad_id=b.id
                inner join cronograma c on b.cronograma_id=c.id
                inner join curso d on c.curso_id=d.id
                inner join profesor e on c.profesor_id=e.id
                where e.id=?
                order by b.fecha_registro desc limit 150";
        $cmd=$gbd->prepare($sql);
        $cmd->bindParam(1,$id);
        $cmd->execute();
        $lista=$cmd->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
	}


	public function listado_comentario_curso($id){
		$gbd=Gestionbd::getInstancia();
        $sql="select c.id,d.nombre as curso,e.nombre,c.fecha_ini,
                b.fecha_registro as fecha,a.num_session,
                a.calificacion,a.comentario,b.num_pc
                from encuesta a
                inner join actividad b on a.actividad_id=b.id
                inner join cronograma c on b.cronograma_id=c.id
                inner join curso d on c.curso_id=d.id
                inner join profesor e on c.profesor_id=e.id
                where d.id=?
                order by b.fecha_registro desc";
        $cmd=$gbd->prepare($sql);
        $cmd->bindParam(1,$id);
        $cmd->execute();
        $lista=$cmd->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
	}

	public function listado_comentario_fecha($dia){
		$gbd=Gestionbd::getInstancia();
        $sql="select c.id,d.nombre as curso,e.nombre,c.fecha_ini,
                b.fecha_registro as fecha,a.num_session,
                a.calificacion,a.comentario,b.num_pc
                from encuesta a
                inner join actividad b on a.actividad_id=b.id
                inner join cronograma c on b.cronograma_id=c.id
                inner join curso d on c.curso_id=d.id
                inner join profesor e on c.profesor_id=e.id
                where DATE(b.fecha_registro)=SUBDATE(CURDATE(),?)
                order by b.fecha_registro desc";
        $cmd=$gbd->prepare($sql);
        $cmd->bindParam(1,$dia);
        $cmd->execute();
        $lista=$cmd->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
	}

	public function listado_comentario_c(){
		$gbd=Gestionbd::getInstancia();
        $sql="select c.id,d.nombre as curso,e.nombre,c.fecha_ini,
                b.fecha_registro as fecha,a.num_session,
                a.calificacion,a.comentario,b.num_pc
                from encuesta a
                inner join actividad b on a.actividad_id=b.id
                inner join cronograma c on b.cronograma_id=c.id
                inner join curso d on c.curso_id=d.id
                inner join profesor e on c.profesor_id=e.id
                order by b.fecha_registro desc limit 5";
        $cmd=$gbd->prepare($sql);
        $cmd->execute();
        $lista=$cmd->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
	}

	public function listado_curso_form(){
		$gbd=Gestionbd::getInstancia();
        $sql="SELECT id,nombre FROM curso WHERE estado=1 OR pe=1 ORDER BY 1 DESC";
        $cmd=$gbd->prepare($sql);
        $cmd->bindParam(1,$id);
        $cmd->execute();
        $lista=$cmd->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
	}

	public function listado_profesor(){
		$gbd=Gestionbd::getInstancia();
        $sql="select * from profesor where not nombre is null order by 2";
        $cmd=$gbd->prepare($sql);
        $cmd->execute();
        $lista=$cmd->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
	}

	public function listado_curso() {
		$gbd=Gestionbd::getInstancia();
        $sql="select id,nombre from curso where not nombre is null and not id=5 order by 2";
        $cmd=$gbd->prepare($sql);
        $cmd->execute();
        $lista=$cmd->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
	}

	public function listado_dias(){
		$gbd=Gestionbd::getInstancia();
        $sql="SELECT 1 AS id,'Ayer' AS nombre UNION SELECT 2 AS id,'Hace 2 dias' AS nombre UNION SELECT 3 AS id,'Hace 3 dias' AS nombre UNION SELECT 4 AS id,'Hace 4 dias' AS nombre UNION SELECT 5 AS id,'Hace 5 dias' AS nombre UNION SELECT 6 AS id,'Hace 6 dias' AS nombre UNION SELECT 7 AS id,'Hace 7 dias' AS nombre";
        $cmd=$gbd->prepare($sql);
        $cmd->execute();
        $lista=$cmd->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
	}



	public function promedio_cronograma($id){
		$gbd=Gestionbd::getInstancia();
        $sql="select a.calificacion,count(1)as cantidad
 from encuesta a
 inner join actividad b on a.actividad_id=b.id
 inner join cronograma c on b.cronograma_id=c.id
where c.id=?
group by a.calificacion order by 2 desc";
        $cmd=$gbd->prepare($sql);
        $cmd->bindParam(1,$id);
        $cmd->execute();
        $lista=$cmd->fetchAll(PDO::FETCH_ASSOC);
        return $lista;

	}


	public function listado_comentario_cronograma($id){
		$gbd=Gestionbd::getInstancia();
        $sql="select c.id,d.nombre as curso,e.nombre,c.fecha_ini,
                b.fecha_registro as fecha,a.num_session,
                a.calificacion,a.comentario,b.num_pc
                from encuesta a
                inner join actividad b on a.actividad_id=b.id
                inner join cronograma c on b.cronograma_id=c.id
                inner join curso d on c.curso_id=d.id
                inner join profesor e on c.profesor_id=e.id
                where c.id=?
                order by b.fecha_registro desc";
        $cmd=$gbd->prepare($sql);
        $cmd->bindParam(1,$id);
        $cmd->execute();
        $lista=$cmd->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
	}

	public function promedio_cronograma_session($id,$session){
		$gbd=Gestionbd::getInstancia();
        $sql="select a.calificacion,count(1)as cantidad
 from encuesta a
 inner join actividad b on a.actividad_id=b.id
 inner join cronograma c on b.cronograma_id=c.id
where c.id=? and a.num_session=?
group by a.calificacion order by 2 desc";
        $cmd=$gbd->prepare($sql);
        $cmd->bindParam(1,$id);
        $cmd->bindParam(2,$session);
        $cmd->execute();
        $lista=$cmd->fetchAll(PDO::FETCH_ASSOC);
        return $lista;

	}


	public function listado_comentario_cronograma_session($id,$session){
		$gbd=Gestionbd::getInstancia();
        $sql="select c.id,d.nombre as curso,e.nombre,c.fecha_ini,c.fecha_fin,
c.sessiones,c.frecuencia,b.fecha_registro as fecha,
DAYNAME(b.fecha_registro) as dia,a.num_session,c.horario_ini,c.horario_fin,a.calificacion,a.comentario,b.num_pc
 from encuesta a
 inner join actividad b on a.actividad_id=b.id
 inner join cronograma c on b.cronograma_id=c.id
 inner join curso d on c.curso_id=d.id
 inner join profesor e on c.profesor_id=e.id
 where c.id=? and a.num_session=?
order by b.fecha_registro desc";
        $cmd=$gbd->prepare($sql);
        $cmd->bindParam(1,$id);
        $cmd->bindParam(2,$session);
        $cmd->execute();
        $lista=$cmd->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
	}

	public function listado_curso_interes(){
		$gbd=Gestionbd::getInstancia();
        $sql="select id,nombre from curso where estado=1 order by 2";
        $cmd=$gbd->prepare($sql);
        $cmd->execute();
        $lista=$cmd->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
	}




}
?>
