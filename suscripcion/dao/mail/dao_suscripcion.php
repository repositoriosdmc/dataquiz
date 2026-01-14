<?

require_once  "gestionbd.php";
//require_once  "dao_mensaje.php";
require_once  "dao_mensajedmc.php";
// Importa las clases de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Carga cada archivo de la clase manualmente

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class suscripcion
{

	public function limpiar($valor)
	{

		return 	$valor == "" ? NULL :
			trim(stripslashes($valor));
	}

	public function getIp()
	{
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}

	public function getPaises()
	{

		$url = "https://restcountries.eu/rest/v2/all?fields=translations;callingCodes";

		$paisesJson = file_get_contents($url);

		return  json_decode($paisesJson);
	}


	public function lista_email_ficha_contacto($curso)
	{
		$gbd = Gestionbd::getInstancia();
		$sql = "SELECT fc.`FICHA_CONTACTO_EMAIL` FROM ficha_contacto fc INNER JOIN ficha_contacto_capacitacion fcc ON fc.`FICHA_CONTACTO_ID`=fcc.`FICHA_CONTACTO_ID` WHERE fcc.`CAPACITACION_ID` = :curso  AND NOT fc.`FICHA_CONTACTO_EMAIL` LIKE '%dmc.pe%' GROUP BY fc.`FICHA_CONTACTO_EMAIL` order by fc.fecha_registro desc";
		$cmd = $gbd->prepare($sql);
		$cmd->bindparam(":curso", $curso);
		$cmd->execute();
		$lista = $cmd->fetchAll(PDO::FETCH_ASSOC);
		return $lista;
	}



	public function listado_curso($capacitacion = null)
	{
		$gbd = Gestionbd::getInstancia();
		$sql = "SELECT a.capacitacion_id AS id, LOCATE(a.capacitacion_base_id,:capacitacion) AS estado, UPPER(a.capacitacion_base_nombre) AS nombre, a.descripcion,a.celular,UPPER(a.categoria) AS categoria, UPPER(a.linea) AS linea, a.orden FROM ( SELECT CASE a.capacitacion_base_id WHEN @curType THEN @curRow := @curRow + 1 ELSE @curRow := 1 END AS NUMERO, @curType := a.capacitacion_base_id AS capacitacion_base_id, a.capacitacion_base_nombre, a.capacitacion_id,a.capacitacion_base_tipo, a.capacitacion_fecha_inicio, a.descripcion,a.celular, a.categoria,a.linea,a.orden FROM (SELECT c.CAPACITACION_ID,cb.capacitacion_base_id,cb.capacitacion_base_nombre, c.capacitacion_fecha_inicio, cb.capacitacion_base_tipo, cb.capacitacion_base_descripcion AS descripcion,u.USUARIO_CELULAR AS  celular, case cbt.PRODUCTO_TIPO when 'CURSOS REGULARES' then 'CURSOS' when 'PEA' then 'PROGRAMAS' when 'TALLER' then 'CAPACITACIÓN GRATUITA' when 'CHARLA' then 'CAPACITACIÓN GRATUITA' when 'CONFERENCIA' then 'SUMMIT' else cbt.PRODUCTO_TIPO end as categoria, case cbt.PRODUCTO_TIPO when 'CURSOS REGULARES' then cb.CAPACITACION_BASE_LINEA when 'PEA' then cb.CAPACITACION_BASE_LINEA when 'ESPECIALIZACIONES' then cb.CAPACITACION_BASE_LINEA when 'CONFERENCIA' then NULL when 'TALLER' then 'TALLERES' when 'CHARLA' then 'CHARLAS' end as linea, IFNULL(cb.capacitacion_base_orden,100) AS orden FROM capacitacion_base cb INNER JOIN capacitacion c ON cb.capacitacion_base_id=c.capacitacion_base_id LEFT JOIN usuario u on c.VENDEDOR_ID = u.USUARIO_ID LEFT JOIN capacitacion_base_tipo cbt on cb.CAPACITACION_BASE_TIPO = cbt.CAP_BASE_TIPO_NOMBRE WHERE DATE(c.capacitacion_fecha_inicio)>=DATE(NOW()) AND NOT c.capacitacion_vacantes=c.capacitacion_matriculados AND c.capacitacion_estado=1 AND cbt.UNIDAD_NEGOCIO IN ('CAPACITACION_PERSONAS','EVENTOS') and NOT cb.capacitacion_base_tipo = 'CURSO GRATUITO' ORDER BY cb.capacitacion_base_id,c.capacitacion_fecha_inicio) a JOIN (SELECT @curRow := 0, @curType := '') r ) a WHERE a.numero=1 ORDER BY FIELD(a.categoria,'CURSOS','ESPECIALIZACIONES','PROGRAMAS','CAPACITACIÓN GRATUITA','SUMMIT') asc, a.linea,a.orden";
		$cmd = $gbd->prepare($sql);
		$cmd->bindparam(":capacitacion", $capacitacion);
		$cmd->execute();
		$lista = $cmd->fetchAll(PDO::FETCH_ASSOC);
		return $lista;
	}

	public function listado_cursoV3($capacitacion)
	{
		$gbd = Gestionbd::getInstancia();
		$sql = "SELECT a.capacitacion_id AS id, UPPER(a.capacitacion_base_nombre) AS nombre, a.descripcion,a.celular FROM ( SELECT CASE a.capacitacion_base_id WHEN @curType THEN @curRow := @curRow + 1 ELSE @curRow := 1 END AS NUMERO, @curType := a.capacitacion_base_id AS capacitacion_base_id, a.capacitacion_base_nombre, a.capacitacion_id,a.capacitacion_base_tipo, a.capacitacion_fecha_inicio, a.descripcion,a.celular FROM (SELECT c.CAPACITACION_ID,cb.capacitacion_base_id, cb.capacitacion_base_nombre, c.capacitacion_fecha_inicio, cb.capacitacion_base_tipo, cb.capacitacion_base_descripcion AS descripcion,u.USUARIO_CELULAR AS  celular FROM capacitacion_base cb INNER JOIN capacitacion c ON cb.capacitacion_base_id=c.capacitacion_base_id LEFT JOIN usuario u on c.VENDEDOR_ID = u.USUARIO_ID LEFT JOIN capacitacion_base_tipo cbt on cb.CAPACITACION_BASE_TIPO = cbt.CAP_BASE_TIPO_NOMBRE WHERE cb.CAPACITACION_BASE_ID= :capacitacion and DATE(c.capacitacion_fecha_inicio)>=DATE(NOW()) AND NOT c.capacitacion_vacantes=c.capacitacion_matriculados AND c.capacitacion_estado=1 AND cbt.UNIDAD_NEGOCIO IN ('CAPACITACION_PERSONAS','EVENTOS') and NOT cb.capacitacion_base_tipo = 'CURSO GRATUITO' ORDER BY cb.capacitacion_base_id,c.capacitacion_fecha_inicio) a JOIN (SELECT @curRow := 0, @curType := '') r ) a WHERE a.numero=1";
		$cmd = $gbd->prepare($sql);
		$cmd->bindparam(":capacitacion", $capacitacion);
		$cmd->execute();
		$lista = $cmd->fetch(PDO::FETCH_ASSOC);
		return $lista;
	}

	public function listado_curso_power()
	{
		$gbd = Gestionbd::getInstancia();
		$sql = "SELECT a.capacitacion_id AS id, UPPER(a.capacitacion_base_nombre) AS nombre,a.descripcion,a.celular,upper(a.categoria) as categoria,upper(IFNULL(a.linea,'NUEVO')) AS linea,a.orden FROM ( SELECT CASE a.capacitacion_base_id WHEN @curType THEN @curRow := @curRow + 1 ELSE @curRow := 1 END AS NUMERO, @curType := a.capacitacion_base_id AS capacitacion_base_id, a.capacitacion_base_nombre,a.capacitacion_id,a.capacitacion_base_tipo, a.capacitacion_fecha_inicio,a.descripcion,a.celular, a.categoria,a.linea,a.orden FROM (SELECT c.CAPACITACION_ID,cb.capacitacion_base_id,cb.capacitacion_base_nombre, c.capacitacion_fecha_inicio, cb.capacitacion_base_tipo, cb.capacitacion_base_descripcion AS descripcion,null AS celular, CASE WHEN cb.capacitacion_base_tipo = 'PEA ONLINE' OR cb.capacitacion_base_tipo = 'PEA' THEN 'Programa de Especialización' WHEN cb.capacitacion_base_tipo <> 'TALLER ONLINE' AND IFNULL(cb.capacitacion_base_especializacion,0) <> 'MARKETING DIGITAL' THEN 'Cursos Power' WHEN cb.capacitacion_base_tipo <> 'TALLER ONLINE' AND cb.capacitacion_base_especializacion = 'MARKETING DIGITAL' THEN 'Cursos Marketing Digital' WHEN cb.capacitacion_base_tipo = 'TALLER ONLINE'  THEN 'Talleres gratuitos' END AS categoria, cb.capacitacion_base_linea AS linea,IFNULL(cb.capacitacion_base_orden,100) AS orden FROM capacitacion_base cb INNER JOIN capacitacion c ON cb.capacitacion_base_id=c.capacitacion_base_id WHERE DATE(c.capacitacion_fecha_inicio)>=DATE(NOW()) AND NOT c.capacitacion_vacantes=c.capacitacion_matriculados AND c.capacitacion_estado=1 AND cb.capacitacion_base_tipo IN ('CURSO POWER') ORDER BY cb.capacitacion_base_id,c.capacitacion_fecha_inicio) a JOIN (SELECT @curRow := 0, @curType := '') r ) a WHERE a.numero=1 ORDER BY FIELD(a.categoria,'Cursos Analytics','Cursos Marketing Digital','Programa de Especialización','Talleres gratuitos') ASC,a.orden";
		$cmd = $gbd->prepare($sql);
		$cmd->execute();
		$lista = $cmd->fetchAll(PDO::FETCH_ASSOC);
		return $lista;
	}

	public function listado_curso_concurso()
	{
		$gbd = Gestionbd::getInstancia();
		$sql = "SELECT CAPACITACION_BASE_ID as id, capacitacion_base_nombre as nombre FROM capacitacion_base where capacitacion_base_id in (254,290,300,255,297,298,283,289,256,316,317)";
		$cmd = $gbd->prepare($sql);
		$cmd->execute();
		$lista = $cmd->fetchAll(PDO::FETCH_ASSOC);
		return $lista;
	}

	public function send_mail($from_name, $correo, $nom, $file, $url, $id, $asunto, $mensaje)
	{
		$mail = new PHPMailer;

		//$mail->SMTPDebug = 3;            JOIN (SELECT @curRow := 0, @curType := '') r) a                   // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'mail.intranetdmc.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'test@intranetdmc.com';
        $mail->Password = 'YZtOIDQ.5IqM';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;                                       // TCP port to connect to

		$mail->setFrom('capacitacion@dmc.pe', $from_name);
		$mail->addAddress($correo, $nom);     // Add a recipient

		if (is_array($file)) {
			foreach ($file as $key => $value) {
				$tmp = $file[$key]["tmp_name"];
				if (is_uploaded_file($tmp)) {
					$mail->addAttachment($tmp, $file[$key]["name"]);
				}
			}
		}

		if ($url) {
			$mail->addStringAttachment(file_get_contents($url), $id . ".pdf");
		}


		// Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->CharSet = 'UTF-8';
		$mail->Subject = $asunto;
		$mail->Body    = $mensaje; //'This is the HTML message body <b>in bold!</b>';
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		return $mail->send();


	}



	public function registrar_ficha_contacto_charla($charla_id, $ficha_contacto_id)
	{

		$gbd = Gestionbd::getInstancia();

		$sql = "insert into ficha_contacto_charla(capacitacion_charla_id,ficha_contacto_id,asistencia) values(:charla_id,:ficha_contacto_id,0)";

		$cmd = $gbd->prepare($sql);

		$cmd->bindparam(':charla_id', $charla_id);

		$cmd->bindparam(':ficha_contacto_id', $ficha_contacto_id);

		$cmd->execute();

		return $gbd->lastInsertId();
	}

	public function charla_informativa_check($curso)
	{
		$gbd = Gestionbd::getInstancia();
		$sql = "SELECT c.capacitacion_base_nombre as capacitacion FROM capacitacion_charla a INNER JOIN capacitacion b ON a.capacitacion_id=b.capacitacion_id INNER JOIN capacitacion_base c ON b.capacitacion_base_id=c.capacitacion_base_id and c.capacitacion_base_tipo='PEA' WHERE a.capacitacion_charla_fecha_inicio>=CURDATE() and c.capacitacion_base_id=:curso GROUP BY c.capacitacion_base_nombre";
		$cmd = $gbd->prepare($sql);
		$cmd->bindparam(":curso", $curso);
		$cmd->execute();
		$lista = $cmd->fetch(PDO::FETCH_ASSOC);
		return $lista['capacitacion'];
	}

	public function charla_informativa_obtener_id($curso)
	{
		$gbd = Gestionbd::getInstancia();
		$sql = "SELECT a.capacitacion_charla_id AS id FROM capacitacion_charla a INNER JOIN capacitacion b ON a.capacitacion_id=b.capacitacion_id WHERE a.capacitacion_charla_fecha_inicio>=CURDATE() and b.capacitacion_id=:curso ORDER BY a.capacitacion_charla_fecha_inicio LIMIT 1";
		$cmd = $gbd->prepare($sql);
		$cmd->bindparam(":curso", $curso);
		$cmd->execute();
		$lista = $cmd->fetch(PDO::FETCH_ASSOC);
		return $lista['id'];
	}

	public function obtener_capacitacion_id($id)
	{
		$gbd = Gestionbd::getInstancia();

		$sql = "SELECT GROUP_CONCAT(a.capacitacion_id) as id FROM capacitacion a INNER JOIN capacitacion_base b ON a.capacitacion_base_id=b.capacitacion_base_id WHERE DATE(a.capacitacion_fecha_inicio)>=DATE(NOW()) AND NOT a.`CAPACITACION_VACANTES`=a.`CAPACITACION_MATRICULADOS` AND b.capacitacion_base_id in ($id) ORDER BY a.CAPACITACION_fecha_inicio LIMIT 1";

		$cmd = $gbd->prepare($sql);
		//$cmd->bindparam(":id",$id, PDO::PARAM_STR);
		$cmd->execute();
		$lista = $cmd->fetch(PDO::FETCH_ASSOC);
		return $lista['id'];
	}

	public function actualizar_fecha_inicio()
	{
		$gbd = Gestionbd::getInstancia();
		$sql = "UPDATE ficha_contacto a INNER JOIN ficha_contacto_capacitacion b ON a.ficha_contacto_id=b.ficha_contacto_id AND b.capacitacion_id=0 INNER JOIN ( SELECT a.ficha_contacto_id,b.`CAPACITACION_BASE_ID`,MIN(CAPACITACION_FECHA_INICIO) AS fecha_inicio FROM ficha_contacto a INNER JOIN ficha_contacto_capacitacion b ON a.ficha_contacto_id=b.ficha_contacto_id AND b.capacitacion_id=0 INNER JOIN capacitacion c ON b.`CAPACITACION_BASE_ID`=c.`CAPACITACION_BASE_ID` AND a.`FECHA_REGISTRO`<=c.`CAPACITACION_FECHA_INICIO` GROUP BY a.ficha_contacto_id,b.`CAPACITACION_BASE_ID`) c ON b.ficha_contacto_id=c.ficha_contacto_id AND b.`CAPACITACION_BASE_ID`=c.`CAPACITACION_BASE_ID` INNER JOIN capacitacion d ON c.capacitacion_base_id=d.capacitacion_base_id AND c.fecha_inicio=d.capacitacion_fecha_inicio SET b.CAPACITACION_id=d.capacitacion_id";
		$cmd = $gbd->prepare($sql);
		$cmd->execute();
		$sql = "UPDATE ficha_contacto a INNER JOIN ficha_contacto_capacitacion b ON a.ficha_contacto_id=b.ficha_contacto_id AND b.capacitacion_id=0 INNER JOIN ( SELECT a.ficha_contacto_id,b.`CAPACITACION_BASE_ID`,MAX(CAPACITACION_FECHA_INICIO) AS fecha_inicio FROM ficha_contacto a INNER JOIN ficha_contacto_capacitacion b ON a.ficha_contacto_id=b.ficha_contacto_id AND b.capacitacion_id=0 INNER JOIN capacitacion c ON b.`CAPACITACION_BASE_ID`=c.`CAPACITACION_BASE_ID` AND a.`FECHA_REGISTRO`>=c.`CAPACITACION_FECHA_INICIO` GROUP BY a.ficha_contacto_id,b.`CAPACITACION_BASE_ID`) c ON b.ficha_contacto_id=c.ficha_contacto_id AND b.`CAPACITACION_BASE_ID`=c.`CAPACITACION_BASE_ID` INNER JOIN capacitacion d ON c.capacitacion_base_id=d.capacitacion_base_id AND c.fecha_inicio=d.capacitacion_fecha_inicio SET b.CAPACITACION_id=d.capacitacion_id";
		$cmd = $gbd->prepare($sql);
		$cmd->execute();
	}

	public function listado_curso_base()
	{
		$gbd = Gestionbd::getInstancia();
		$sql = "SELECT CAPACITACION_BASE_ID as id ,CAPACITACION_BASE_NOMBRE as nombre FROM capacitacion_base WHERE capacitacion_base_estado=1 ORDER BY CAPACITACION_BASE_NOMBRE";
		$cmd = $gbd->prepare($sql);
		$cmd->execute();
		$lista = $cmd->fetchAll(PDO::FETCH_ASSOC);
		return $lista;
	}

	public function listado_informacion_cursos($cursos)
	{
		$gbd = Gestionbd::getInstancia();
		$sql = "SELECT a.capacitacion_base_tipo,a.capacitacion,DATE(a.fecha_inicio) AS inicio,LOWER(a.horario) AS horario, a.capacitacion_sesiones, a.capacitacion_horas,a.capacitacion_precio_base,a.nivel,a.brochure,a.imagen FROM ( SELECT b.capacitacion_base_id,b.CAPACITACION_ID, a.capacitacion_base_tipo,a.capacitacion_base_nombre AS capacitacion, b.capacitacion_fecha_inicio AS fecha_inicio, CASE WHEN COUNT(DISTINCT c.DIA)=1 AND COUNT(DISTINCT CONCAT(c.HORA_INICIO,' a ',c.HORA_FIN))=1 THEN CONCAT( CASE c.DIA WHEN 1 THEN 'lunes' WHEN 2 THEN 'martes' WHEN 3 THEN 'miércoles' WHEN 4 THEN 'jueves' WHEN 5 THEN 'viernes' WHEN 6 THEN 'sábados' WHEN 7 THEN 'domingos' END,' de ',DATE_FORMAT(c.HORA_INICIO,'%h:%i %p'),'. a ', DATE_FORMAT(c.HORA_FIN,'%h:%i %p') ,'.' ) WHEN COUNT(DISTINCT c.DIA)>1 AND COUNT(DISTINCT CONCAT(c.HORA_INICIO,' a ',c.HORA_FIN))=1 THEN CONCAT( GROUP_CONCAT( DISTINCT CASE c.DIA WHEN 1 THEN 'lun' WHEN 2 THEN 'mar' WHEN 3 THEN 'mié' WHEN 4 THEN 'jue' WHEN 5 THEN 'vie' WHEN 6 THEN 'sáb' WHEN 7 THEN 'dom' END ORDER BY c.DIA SEPARATOR '-' ),' de ',GROUP_CONCAT(DISTINCT CONCAT(DATE_FORMAT(c.HORA_INICIO,'%h:%i %p'),'. a ', DATE_FORMAT(c.HORA_FIN,'%h:%i %p'),'.')) ) ELSE GROUP_CONCAT( DISTINCT CONCAT( CASE c.DIA WHEN 1 THEN 'lunes' WHEN 2 THEN 'martes' WHEN 3 THEN 'miércoles' WHEN 4 THEN 'jueves' WHEN 5 THEN 'viernes' WHEN 6 THEN 'sábados' WHEN 7 THEN 'domingos' END,' de ',DATE_FORMAT(c.HORA_INICIO,'%h:%i %p'),'. a ', DATE_FORMAT(c.HORA_FIN,'%h:%i %p'),'.' ) ORDER BY c.DIA ) END AS horario, b.capacitacion_sesiones, b.capacitacion_horas,b.capacitacion_precio_base,a.capacitacion_base_nivel AS nivel, a.capacitacion_base_brochure AS brochure, capacitacion_base_imagen AS imagen FROM capacitacion_base a INNER JOIN capacitacion b ON a.capacitacion_base_id=b.capacitacion_base_id LEFT JOIN capacitacion_horarios c ON b.capacitacion_id=c.capacitacion_id WHERE b.capacitacion_id IN ($cursos) GROUP BY b.capacitacion_base_id,b.CAPACITACION_ID, a.capacitacion_base_tipo,a.capacitacion_base_nombre, b.capacitacion_fecha_inicio,b.capacitacion_sesiones, b.capacitacion_horas, b.capacitacion_precio_base) a GROUP BY a.capacitacion_base_tipo, a.capacitacion,a.fecha_inicio,a.horario,a.capacitacion_sesiones, a.capacitacion_horas, a.capacitacion_precio_base, a.nivel ORDER BY FIELD(a.capacitacion_id,$cursos) LIMIT 3";
		$cmd = $gbd->prepare($sql);
		$cmd->execute();
		$lista = $cmd->fetchAll(PDO::FETCH_ASSOC);
		return $lista;
	}

	public function listado_capacitacion_jarvis($capacitacion)
	{
		$gbd = Gestionbd::getInstancia();
		$sql = "SELECT c.capacitacion_base_id,c.CAPACITACION_ID, cb.capacitacion_base_tipo AS tipo, cb.capacitacion_base_nombre AS nombre, DATE(c.capacitacion_fecha_inicio) AS inicio,DATE(c.capacitacion_fecha_fin) AS fin, CASE WHEN COUNT(DISTINCT ch.DIA)=1 AND COUNT(DISTINCT CONCAT(ch.HORA_INICIO,' a ',ch.HORA_FIN))=1 THEN CONCAT( CASE ch.DIA WHEN 1 THEN 'lunes' WHEN 2 THEN 'martes' WHEN 3 THEN 'miércoles' WHEN 4 THEN 'jueves' WHEN 5 THEN 'viernes' WHEN 6 THEN 'sábados' WHEN 7 THEN 'domingos' END,' de ',DATE_FORMAT(ch.HORA_INICIO,'%h:%i %p'),'. a ',DATE_FORMAT(ch.HORA_FIN,'%h:%i %p') ,'.' ) WHEN COUNT(DISTINCT ch.DIA)>1 AND COUNT(DISTINCT CONCAT(ch.HORA_INICIO,' a ',ch.HORA_FIN))=1 THEN CONCAT( GROUP_CONCAT( DISTINCT CASE ch.DIA WHEN 1 THEN 'lun' WHEN 2 THEN 'mar' WHEN 3 THEN 'mie' WHEN 4 THEN 'jue' WHEN 5 THEN 'vie' WHEN 6 THEN 'sáb' WHEN 7 THEN 'dom' END ORDER BY ch.DIA SEPARATOR '-' ),' de ', GROUP_CONCAT(DISTINCT CONCAT(DATE_FORMAT(ch.HORA_INICIO,'%h:%i %p'),'. a ', DATE_FORMAT(ch.HORA_FIN,'%h:%i %p'),'.')) ) ELSE GROUP_CONCAT( DISTINCT CONCAT( CASE ch.DIA WHEN 1 THEN 'lunes' WHEN 2 THEN 'martes' WHEN 3 THEN 'miércoles' WHEN 4 THEN 'jueves' WHEN 5 THEN 'viernes' WHEN 6 THEN 'sábados' WHEN 7 THEN 'domingos' END,' de ',DATE_FORMAT(ch.HORA_INICIO,'%h:%i %p'),'. a ',DATE_FORMAT(ch.HORA_FIN,'%h:%i %p'),'.' ) ORDER BY ch.DIA ) END AS horario, c.capacitacion_sesiones AS sesiones, c.capacitacion_horas AS horas,c.capacitacion_precio_base AS precio_soles, c.capacitacion_precio_dolar AS precio_dolares, cb.capacitacion_base_nivel AS nivel,cb.capacitacion_base_brochure AS brochure, capacitacion_base_imagen AS imagen,cb.capacitacion_base_conocimientos AS conocimientos,cb.capacitacion_base_requerimientos AS requerimientos, TRIM(GROUP_CONCAT(DISTINCT CONCAT(IFNULL(p.persona_nombre,''),' ',IFNULL(p.persona_apellidos,''),' | ',IFNULL(p.persona_cargo,'')))) AS docente, c.capacitacion_enlace AS enlace,c.capacitacion_fecha_descuento AS fecha_limite_descuento,c.capacitacion_numero_descuento AS descuento,cb.capacitacion_base_especializacion AS especializacion, u.usuario_celular AS celular_ventas, CASE WHEN cb.capacitacion_base_tipo = 'PEA ONLINE' OR cb.capacitacion_base_tipo = 'PEA' THEN 'PROGRAMA DE ESPECIALIZACIÓN' WHEN cb.capacitacion_base_tipo <> 'TALLER ONLINE' AND IFNULL(cb.capacitacion_base_especializacion,0) = '0' THEN 'CURSO ANALYTICS' WHEN cb.capacitacion_base_tipo = 'TALLER ONLINE'  THEN 'TALLERES GRATUITOS' ELSE UPPER(cb.capacitacion_base_especializacion) END AS categoria FROM capacitacion_base cb INNER JOIN capacitacion c ON cb.capacitacion_base_id=c.capacitacion_base_id LEFT JOIN capacitacion_horarios ch ON c.capacitacion_id=ch.capacitacion_id LEFT JOIN capacitacion_docente cd ON c.capacitacion_id=cd.capacitacion_id LEFT JOIN persona p ON cd.persona_id = p.persona_id left join usuario u on c.vendedor_id = u.usuario_id WHERE c.capacitacion_id IN ($capacitacion) AND NOT cb.capacitacion_base_tipo IN ('IN-HOUSE','ANALYTICS','DIGITACIÓN','INVESTIGACIÓN') GROUP BY c.capacitacion_base_id,c.CAPACITACION_ID,cb.capacitacion_base_tipo,cb.capacitacion_base_nombre, c.capacitacion_fecha_inicio,c.capacitacion_sesiones, c.capacitacion_horas,c.capacitacion_precio_base,cb.capacitacion_base_especializacion,u.usuario_celular ORDER BY FIELD(c.capacitacion_id,$capacitacion) LIMIT 3";
		$cmd = $gbd->prepare($sql);
		$cmd->execute();
		$lista = $cmd->fetchAll(PDO::FETCH_ASSOC);
		return $lista;
	}

	public function siguiente_inicio($capacitacion)
	{
		$gbd = Gestionbd::getInstancia();
		$sql = "SELECT DATE(c.capacitacion_fecha_inicio) AS inicio,DATE(c.capacitacion_fecha_fin) AS fin, CASE WHEN COUNT(DISTINCT ch.DIA)=1 AND COUNT(DISTINCT CONCAT(ch.HORA_INICIO,' a ',ch.HORA_FIN))=1 THEN CONCAT( CASE ch.DIA WHEN 1 THEN 'lunes' WHEN 2 THEN 'martes' WHEN 3 THEN 'miércoles' WHEN 4 THEN 'jueves' WHEN 5 THEN 'viernes' WHEN 6 THEN 'sábados' WHEN 7 THEN 'domingos' END,' de ',DATE_FORMAT(ch.HORA_INICIO,'%h:%i %p'),'. a ', DATE_FORMAT(ch.HORA_FIN,'%h:%i %p') ,'.' ) WHEN COUNT(DISTINCT ch.DIA)>1 AND COUNT(DISTINCT CONCAT(ch.HORA_INICIO,' a ',ch.HORA_FIN))=1 THEN CONCAT( GROUP_CONCAT( DISTINCT CASE ch.DIA WHEN 1 THEN 'lun' WHEN 2 THEN 'mar' WHEN 3 THEN 'mie' WHEN 4 THEN 'jue' WHEN 5 THEN 'vie' WHEN 6 THEN 'sáb' WHEN 7 THEN 'dom' END ORDER BY ch.DIA SEPARATOR '-' ),' de ', GROUP_CONCAT(DISTINCT CONCAT(DATE_FORMAT(ch.HORA_INICIO,'%h:%i %p'),'. a ', DATE_FORMAT(ch.HORA_FIN,'%h:%i %p'),'.')) ) ELSE GROUP_CONCAT( DISTINCT CONCAT( CASE ch.DIA WHEN 1 THEN 'lunes' WHEN 2 THEN 'martes' WHEN 3 THEN 'miércoles' WHEN 4 THEN 'jueves' WHEN 5 THEN 'viernes' WHEN 6 THEN 'sábados' WHEN 7 THEN 'domingos' END,' de ',DATE_FORMAT(ch.HORA_INICIO,'%h:%i %p'),'. a ', DATE_FORMAT(ch.HORA_FIN,'%h:%i %p'),'.' ) ORDER BY ch.DIA ) END AS horario FROM capacitacion_base cb INNER JOIN capacitacion c ON cb.capacitacion_base_id=c.capacitacion_base_id LEFT JOIN capacitacion_horarios ch ON c.capacitacion_id=ch.capacitacion_id WHERE c.CAPACITACION_BASE_ID IN (:capacitacion_base_id) AND date(c.CAPACITACION_FECHA_INICIO) >= CURRENT_DATE() and  cb.capacitacion_base_tipo IN ('ESPECIALIZACIÓN DMC') GROUP BY  c.CAPACITACION_ID ORDER BY c.CAPACITACION_FECHA_INICIO  LIMIT 1,2";
		$cmd = $gbd->prepare($sql);
		$cmd->bindparam(":capacitacion_base_id", $capacitacion);
		$cmd->execute();
		$lista = $cmd->fetch(PDO::FETCH_ASSOC);
		return $lista;
	}

	public function listado_informacion_cursos_local($cursos)
	{
		$gbd = Gestionbd::getInstancia();
		$sql = "SELECT a.capacitacion_base_tipo,a.capacitacion_base_id,a.capacitacion, DATE(a.fecha_inicio) AS inicio,LOWER(a.horario) AS horario, a.capacitacion_sesiones, a.capacitacion_horas,a.capacitacion_precio_base,a.nivel,a.brochure,a.imagen, IF(a.capacitacion_base_tipo='PEA',(SELECT descuento_porcentaje FROM descuento WHERE DESCUENTO_NOMBRE='PE - COMUNIDAD DMC'),IF(a.capacitacion_base_tipo='CURSO',(SELECT descuento_porcentaje FROM descuento WHERE DESCUENTO_NOMBRE='CA-COMUNIDAD DMC'),0)) AS porcentaje_comunidad, IF(a.capacitacion_base_tipo='PEA',(SELECT descuento_porcentaje FROM descuento WHERE DESCUENTO_NOMBRE='PE - GRUPAL DE 3 MÁS/CORPORATIVO'),IF(a.capacitacion_base_tipo='CURSO',(SELECT descuento_porcentaje FROM descuento WHERE DESCUENTO_NOMBRE='CA-Grupal (min. 3 personas)'),0)) AS porcentaje_grupal, IF(a.capacitacion_base_tipo='PEA',(SELECT descuento_porcentaje FROM descuento WHERE DESCUENTO_NOMBRE='PE - POR PRONTO PAGO'),IF(a.capacitacion_base_tipo='CURSO',(SELECT descuento_porcentaje FROM descuento WHERE DESCUENTO_NOMBRE='CA-POR PRONTO PAGO'),0)) AS porcentaje_pronto_pago FROM ( SELECT CASE a.capacitacion_base_id WHEN @curType THEN @curRow := @curRow + 1 ELSE @curRow := 1 END AS NUMERO, @curType := a.capacitacion_base_id AS id,a.* FROM ( SELECT b.capacitacion_base_id,b.CAPACITACION_ID, a.capacitacion_base_tipo, a.capacitacion_base_nombre AS capacitacion, b.capacitacion_fecha_inicio AS fecha_inicio, CASE WHEN COUNT(DISTINCT c.DIA)=1 AND COUNT(DISTINCT CONCAT(c.HORA_INICIO,' a ',c.HORA_FIN))=1 THEN CONCAT( CASE c.DIA WHEN 1 THEN 'lunes' WHEN 2 THEN 'martes' WHEN 3 THEN 'miércoles' WHEN 4 THEN 'jueves' WHEN 5 THEN 'viernes' WHEN 6 THEN 'sábados' WHEN 7 THEN 'domingos' END,' de ',DATE_FORMAT(c.HORA_INICIO,'%h:%i %p'),'. a ',DATE_FORMAT(c.HORA_FIN,'%h:%i %p') ,'.' ) WHEN COUNT(DISTINCT c.DIA)>1 AND COUNT(DISTINCT CONCAT(c.HORA_INICIO,' a ',c.HORA_FIN))=1 THEN CONCAT( GROUP_CONCAT( DISTINCT CASE c.DIA WHEN 1 THEN 'lun' WHEN 2 THEN 'mar' WHEN 3 THEN 'mié' WHEN 4 THEN 'jue' WHEN 5 THEN 'vie' WHEN 6 THEN 'sáb' WHEN 7 THEN 'dom' END ORDER BY c.DIA SEPARATOR '-' ),' de ',GROUP_CONCAT(DISTINCT CONCAT(DATE_FORMAT(c.HORA_INICIO,'%h:%i %p'),'. a ', DATE_FORMAT(c.HORA_FIN,'%h:%i %p'),'.')) ) ELSE GROUP_CONCAT( DISTINCT CONCAT( CASE c.DIA WHEN 1 THEN 'lunes' WHEN 2 THEN 'martes' WHEN 3 THEN 'miércoles' WHEN 4 THEN 'jueves' WHEN 5 THEN 'viernes' WHEN 6 THEN 'sábados' WHEN 7 THEN 'domingos' END,' de ',DATE_FORMAT(c.HORA_INICIO,'%h:%i %p'),'. a ',DATE_FORMAT(c.HORA_FIN,'%h:%i %p'),'.' ) ORDER BY c.DIA ) END AS horario, b.capacitacion_sesiones, b.capacitacion_horas,b.capacitacion_precio_base,a.capacitacion_base_nivel AS nivel,a.capacitacion_base_brochure AS brochure, capacitacion_base_imagen AS imagen FROM capacitacion_base a INNER JOIN capacitacion b ON a.capacitacion_base_id=b.capacitacion_base_id LEFT JOIN capacitacion_horarios c ON b.capacitacion_id=c.capacitacion_id WHERE a.capacitacion_base_id IN ($cursos) AND NOT b.capacitacion_vacantes=b.capacitacion_matriculados AND b.capacitacion_fecha_inicio>=CURRENT_DATE() GROUP BY b.capacitacion_base_id,b.CAPACITACION_ID,a.capacitacion_base_tipo,a.capacitacion_base_nombre, b.capacitacion_fecha_inicio,b.capacitacion_sesiones, b.capacitacion_horas,b.capacitacion_precio_base ORDER BY a.capacitacion_base_id,b.capacitacion_fecha_inicio) a JOIN (SELECT @curRow := 0, @curType := '') r) a LEFT JOIN descuento_capacitacion b ON a.capacitacion_id=b.capacitacion_id LEFT JOIN descuento c ON c.descuento_id=b.descuento_id WHERE a.numero=1 GROUP BY a.capacitacion_base_tipo,a.capacitacion,a.fecha_inicio,a.horario,a.capacitacion_sesiones, a.capacitacion_horas, a.capacitacion_precio_base,a.nivel ORDER BY FIELD(a.capacitacion_base_id,$cursos) LIMIT 3";
		$cmd = $gbd->prepare($sql);
		$cmd->execute();
		$lista = $cmd->fetchAll(PDO::FETCH_ASSOC);
		return $lista;
	}


	public function cadena_curso($id)
	{
		$gbd = Gestionbd::getInstancia();
		$sql = "SELECT GROUP_CONCAT(capacitacion_base_nombre) AS cursos FROM capacitacion_base WHERE capacitacion_base_id IN ($id) limit 1";
		$cmd = $gbd->prepare($sql);
		$cmd->execute();
		$lista = $cmd->fetch(PDO::FETCH_ASSOC);
		return $lista;
	}

	public function get_vendedor_mail($curso)
	{

		$gbd = Gestionbd::getInstancia();
		$sql = "SELECT u.USUARIO_NOMBRE as correo FROM capacitacion c inner join usuario u on c.VENDEDOR_ID = u.USUARIO_ID where c.CAPACITACION_ID = :capacitacion_id limit 1";
		$cmd = $gbd->prepare($sql);
		$cmd->bindparam(":capacitacion_id", $curso);
		$cmd->execute();
		$lista = $cmd->fetch(PDO::FETCH_ASSOC);
		return $lista['correo'];
	}


	public function mensaje_admin($data)
	{
		$mensaje = "
            <p>Nombres: " . ucfirst($data["nombres"]) . "</p></br>
            <p>Correo: " . $data["correo"] . "</p></br>
            <p>Centro de Trabajo: " . $data["centro_trabajo"] . "</p></br>
            <p>Celular: <a href='https://wa.me/" . $data["celular"] . "' target='_blank'>" . $data["celular"] . "<a></p></br>
            <p>Medio: " . $data["medio"] . "</p></br>
            <p>Cantidad Curso(s): " . $data["cant_cursos"] . "</p></br>
            <p>Curso(s): " . $data["nom_cursos"] . "</p></br>
            <p>Consulta: " . $data["mensaje"] . "</p></br>
            <p>Navegador: " . $data["browser"] . "</p></br>
            <p>Versión: " . $data["version"] . "</p></br>
            <p>Sistema Operativo: " . $data["so"] . "</p></br>";
		return $mensaje;
	}

	public function mensaje_curso()
	{
		setlocale(LC_TIME, "es_PE");
	}


	public function fecha_inicio($fec)
	{
		return utf8_encode(ucfirst(strtoLower(strftime("%d de  %b, %Y ", strtotime($fec)))));
	}

	public function horario($hora_inicio, $hora_fin)
	{
		return strftime("%I:%M %P", strtotime($hora_inicio)) . " a " . strftime("%I:%M %P", strtotime($hora_fin));
	}

	public function admin_dmc($data)
	{
		$params = [
			'nombres' => $data["nombres"],
			'correo' => $data["correo"],
			'celular' => $data["celular"],
			'medio' => $data["medio"],
			'centro_trabajo' => $data["centro_trabajo"],
			'cursos' => $data["curso"],
			'mensaje' => $data["consulta"],
			'datos' => true,
		];
		$curl = curl_init();
		curl_setopt_array($curl, [
			CURLOPT_URL => 'http://admin.dmc.pe/ficha-contacto/registrar',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_TIMEOUT => 30000,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => json_encode($params),
			CURLOPT_HTTPHEADER => [
				'accept: */*',
				'accept-language: en-US,en;q=0.8',
				'content-type: application/json'
			]
		]);

		$response = curl_exec($curl);
		return $response;
	}

	public function registrar_inscripcion_all($data)
	{
		$mensaje = new mensajeDMC();

		//Registro de Suscripción
		$curso = $data["curso"];
		$cantidad_cursos = count($curso);

		if ($cantidad_cursos > 0) {
			//Envio de correo al cliente
			$enviado = false;

			$data["cant_cursos"] = $cantidad_cursos;
			$id_cursos = implode(",", $curso);

			//Mensaje para correo y envio de correos
			if ($cantidad_cursos >= 1 && $cantidad_cursos <= 3) {
				$titulo = "Respondido por DMC";
				$respuesta = 1;
			} else {
				$titulo = "Envió información incompleta";
				$respuesta = 2;
			}

			$cursos = self::listado_informacion_cursos($id_cursos);
			//Mensaje de Cliente
			$mensaje = $mensaje->plantilla_correo($cursos);


			$enviado = self::send_mail("Informes DMC", $data["correo"], $data["nombres"], "", "", "", "INFORME CURSOS DMC", $mensaje);
			/*Guardar en el nuevo sistema*/
			$data["medio"] = $data["medio"] == "" ? 12 : $data["medio"];
			$charla = $data["charla_informativa"];
			$ficha_contacto = json_decode(self::admin_dmc($data));

			if ($charla == 1 && $cantidad_cursos == 1) {
				$charla_id = self::charla_informativa_obtener_id($curso[0]);
				$ficha_contacto_id = $ficha_contacto->id;
				if ($charla_id > 0 && $ficha_contacto_id > 0) {
					self::registrar_ficha_contacto_charla($charla_id, $ficha_contacto_id);
				}
			}
			/*
		    Resultados ok:
		    {"status":"ok","messages":["Ficha de inscripci\u00f3n correctamente registrada"]}
		    */





			//Enviar Correos a DMC y Coordinación

			$cadena_curso = self::cadena_curso($id_cursos);
			$data["nom_cursos"] = $cadena_curso["cursos"];
			$medio = ["-", "Facebook", "Google", "Folleto Informativo", "Alumno - Ex-Alumno", "Linkedin", "Correo Electrónico", "Otros", "Youtube", "", "Facebook - Leads", "Whatsapp", "Ninguna"];
			$data["medio"] = $medio[$data["medio"]];
			$mensaje_admin = self::mensaje_admin($data);

			//Envio de Correo
			self::send_mail($titulo . " - Suscritos", "informes@dataminingperu.com", "Informes DMC", "", "", "", $titulo . " - Suscritos cursos DMC", $mensaje_admin);
			self::send_mail("Lead Ventas", "marco.medrano@dataminingperu.com", "Informes DMC", "", "", "", $titulo . " - Suscritos cursos DMC", $mensaje_admin);
		}


		return $enviado;
	}


	public function charla_informativa_validacion($correo, $pea)
	{
		$gbd = Gestionbd::getInstancia();
		$sql = "SELECT 1 as estado FROM ficha_contacto a INNER JOIN ficha_contacto_charla b ON a.ficha_contacto_id=b.ficha_contacto_id INNER JOIN capacitacion_charla c ON b.capacitacion_charla_id=c.capacitacion_charla_id WHERE a.ficha_contacto_email=:correo AND c.capacitacion_id=:pea AND c.capacitacion_charla_fecha_inicio>=CURRENT_DATE";
		$cmd = $gbd->prepare($sql);
		$cmd->bindparam(':correo', $correo);
		$cmd->bindparam(':pea', $pea);
		$cmd->execute();
		$lista = $cmd->fetch(PDO::FETCH_ASSOC);
		return $lista["estado"];
	}

	public function listado_actividad_consulta($id)
	{
		$gbd = Gestionbd::getInstancia();
		$sql = "select id,fecha_registro,medio_int,fecha_actividad,comentarios from suscripcion_actividad_medio where suscripcion_id=? order by fecha_actividad desc";
		$cmd = $gbd->prepare($sql);
		$cmd->bindparam(1, $id);
		$cmd->execute();
		$lista = $cmd->fetchAll(PDO::FETCH_ASSOC);
		return $lista;
	}

	public function listar_cursos_online($TextCursoId)
	{
		$gbd = Gestionbd::getInstancia();
		$sql = "SELECT cb.`CAPACITACION_BASE_NOMBRE` as tema,c.`CAPACITACION_FECHA_INICIO` as inicio,ch.hora_inicio,ch.hora_fin,p.persona_nombre as nombres,p.persona_apellidos as apellidos,c.`CAPACITACION_ENLACE` as enlace FROM capacitacion c INNER JOIN capacitacion_base cb ON c.`CAPACITACION_BASE_ID`=cb.`CAPACITACION_BASE_ID` LEFT JOIN capacitacion_horarios ch ON c.capacitacion_id=ch.capacitacion_id LEFT JOIN capacitacion_docente cd ON c.capacitacion_id = cd.capacitacion_id LEFT JOIN persona p ON cd.persona_id = p.persona_id WHERE c.`CAPACITACION_ID` IN (" . $TextCursoId . ") AND DATE(c.capacitacion_fecha_inicio)>=DATE(NOW()) AND  cb.`CAPACITACION_BASE_TIPO` = 'DMC ONLINE' order by c.capacitacion_fecha_inicio";
		$cmd = $gbd->prepare($sql);
		$cmd->execute();
		$lista = $cmd->fetchAll(PDO::FETCH_ASSOC);
		return $lista;
	}



	public function registrar_contacto($datos)
	{
		$gbd = Gestionbd::getInstancia();
		$sql = "insert into ficha_contacto (FICHA_CONTACTO_ID,FICHA_CONTACTO_EMAIL,FICHA_CONTACTO_NOMBRES,FICHA_CONTACTO_APELLIDOS,FICHA_CONTACTO_TELEFONO,FICHA_CONTACTO_MODO,FICHA_CONTACTO_PROFESION,FICHA_CONTACTO_CENTRO_TRABAJO,FICHA_CONTACTO_CARGO,FICHA_CONTACTO_MENSAJE,FECHA_REGISTRO,FICHA_CONTACTO_FLAG_ATENDIDO,FICHA_CONTACTO_FECHA_ATENCION,FICHA_CONTACTO_FLAG_DATOS,FICHA_CONTACTO_HORARIO,FICHA_CONTACTO_USUARIO,FICHA_CONTACTO_NUM_DOCUMENTO,FICHA_CONTACTO_PAIS,FICHA_CONTACTO_PROVINCIA,FICHA_CONTACTO_SEXO,FICHA_CONTACTO_EDAD) values('',:EMAIL,:NOMBRES,:APELLIDOS,:TELEFONO,:MEDIO,:PROFESION,:CENTRO_TRABAJO,:CARGO,:MENSAJE,NOW(),:FLAG_ATENDIDO,:FECHA_ATENDIDO,:DATOS,NULL,:USUARIO,:DNI,:PAIS,:PROVINCIA,:SEXO,:EDAD)";
		$cmd = $gbd->prepare($sql);
		$cmd->bindparam(':EMAIL', $datos['correo']);
		$cmd->bindparam(':NOMBRES', $datos['nombres']);
		$cmd->bindparam(':APELLIDOS', $datos['apellidos']);
		$cmd->bindparam(':TELEFONO', $datos['celular']);
		$cmd->bindparam(':MEDIO', $datos['medio']);
		$cmd->bindparam(':PROFESION', $datos['profesion']);
		$cmd->bindparam(':CENTRO_TRABAJO', $datos['centro_trabajo']);
		$cmd->bindparam(':CARGO', $datos['cargo']);
		$cmd->bindparam(':MENSAJE', $datos['mensaje']);
		$cmd->bindparam(':FLAG_ATENDIDO', $datos['atendido']);
		$cmd->bindparam(':FECHA_ATENDIDO', $datos['fecha_atendido']);
		$cmd->bindparam(':DATOS', $datos['datos']);
		$cmd->bindparam(':USUARIO', $datos['num_usuario']);
		$cmd->bindparam(':DNI', $datos['num_documento']);
		$cmd->bindparam(':PAIS', $datos['pais']);
		$cmd->bindparam(':PROVINCIA', $datos['provincia']);
		$cmd->bindparam(':SEXO', $datos['sexo']);
		$cmd->bindparam(':EDAD', $datos['edad']);
		$cmd->execute();
		return $gbd->lastInsertId();
	}

	public function registrar_ficha_capacitacion($contacto_id, $capacitacion_id, $capacitacion_base_id)
	{
		$gbd = Gestionbd::getInstancia();
		$sql = "insert into ficha_contacto_capacitacion (FICHA_CONTACTO_ID,CAPACITACION_ID,CAPACITACION_BASE_ID) values(:FICHA_CONTACTO_ID,:CAPACITACION_ID,:CAPACITACION_BASE_ID)";
		$cmd = $gbd->prepare($sql);
		$cmd->bindparam(':FICHA_CONTACTO_ID', $contacto_id);
		$cmd->bindparam(':CAPACITACION_ID', $capacitacion_id);
		$cmd->bindparam(':CAPACITACION_BASE_ID', $capacitacion_base_id);
		$cmd->execute();
		return $gbd->lastInsertId();
	}

	public function registrar_persona($datos)
	{
		$gbd = Gestionbd::getInstancia();
		$sql = "insert into persona (PERSONA_ID,PERSONA_EMAIL,PERSONA_NOMBRE,PERSONA_APELLIDOS,PERSONA_TELEFONO1,PERSONA_TIPO_DOCUMENTO,PERSONA_NUMERO_DOCUMENTO,PERSONA_PAIS,PERSONA_PROVINCIA,PERSONA_SEXO,FECHA_REGISTRO) values('',:EMAIL,:NOMBRES,:APELLIDOS,:TELEFONO,:TIPO_DOCUMENTO,:NUM_DOCUMENTO,:PAIS,:PROVINCIA,:SEXO,NOW())";
		$cmd = $gbd->prepare($sql);
		$cmd->bindparam(':EMAIL', $datos['correo']);
		$cmd->bindparam(':NOMBRES', $datos['nombres']);
		$cmd->bindparam(':APELLIDOS', $datos['apellidos']);
		$cmd->bindparam(':TELEFONO', $datos['telefono']);
		$cmd->bindparam(':TIPO_DOCUMENTO', $datos['tipo_documento']);
		$cmd->bindparam(':NUM_DOCUMENTO', $datos['num_documento']);
		$cmd->bindparam(':PAIS', $datos['pais']);
		$cmd->bindparam(':PROVINCIA', $datos['provincia']);
		$cmd->bindparam(':SEXO', $datos['sexo']);
		$cmd->execute();
		return $gbd->lastInsertId();
	}

	public function validar_persona($email)
	{
		$gbd = Gestionbd::getInstancia();
		$sql = "SELECT PERSONA_ID as id FROM persona WHERE PERSONA_EMAIL=:EMAIL limit 1";
		$cmd = $gbd->prepare($sql);
		$cmd->bindparam(":EMAIL", $email);
		$cmd->execute();
		$lista = $cmd->fetch(PDO::FETCH_ASSOC);
		return $lista["id"] > 0 ? $lista["id"] : 0;
	}

	public function validar_persona_mail_dni($email, $dni)
	{
		$gbd = Gestionbd::getInstancia();
		$sql = "SELECT IFNULL(PERSONA_ID,0) AS ID,IF(PERSONA_EMAIL!='',1,0) AS email,IF(PERSONA_NUMERO_DOCUMENTO!='',1,0) AS dni FROM persona WHERE NOT IFNULL(PERSONA_TIPO_DOCUMENTO,'0')='RUC' AND (PERSONA_EMAIL=:EMAIL OR PERSONA_NUMERO_DOCUMENTO=:DNI)  limit 1";
		$cmd = $gbd->prepare($sql);
		$cmd->bindparam(":EMAIL", $email);
		$cmd->bindparam(":DNI", $dni);
		$cmd->execute();
		$lista = $cmd->fetch(PDO::FETCH_ASSOC);
		return $lista;
	}

	public function actualizar_dni($tipo, $dni, $pais, $provincia, $id)
	{
		$gbd = Gestionbd::getInstancia();
		$sql = "update persona set persona_tipo_documento=:tipo, persona_numero_documento=:dni,persona_pais=:pais,persona_provincia=:provincia,fecha_actualizacion = now() where persona_id=:id";
		$cmd = $gbd->prepare($sql);
		$cmd->bindparam(":tipo", $tipo);
		$cmd->bindparam(":dni", $dni);
		$cmd->bindparam(":pais", $pais);
		$cmd->bindparam(":provincia", $provincia);
		$cmd->bindparam(":id", $id);
		$cmd->execute();
		/*$lista=$cmd->fetch(PDO::FETCH_ASSOC);
		return $lista;*/
	}

	public function registrar_ficha_contacto($datos)
	{
		$contacto_id = self::registrar_contacto($datos);
		//Registrar Persona
		$dni = $datos["num_documento"];
		if ($contacto_id > 0) {
			$persona = self::validar_persona_mail_dni($datos["correo"], $dni);
			$id = $persona["id"];
			if ($persona === false) {
				self::registrar_persona($datos);
			} elseif ($id > 0 && $persona["dni"] == 0 && $dni != null) {
				self::actualizar_dni($datos["tipo_documento"], $dni, $datos["pais"], $datos["provincia"], $id);
			}
		}
		return $contacto_id;
	}

	public function registrar_ficha_contacto_capacitacion($datos)
	{
		$cursos = $datos["cursos"];
		$cant_curso = count($cursos);

		if ($cant_curso > 0) {
			//Registrar Ficha Contacto
			$contacto_id = self::registrar_ficha_contacto($datos);

			if ($contacto_id > 0) {

				//Registrar Ficha Contacto Capacitación
				foreach ($cursos as $key => $value) {
					if ($datos["tipo"] == 1) {
						$capacitacion_id = $value;
						$capacitacion_base_id = 0;
					} else {
						$capacitacion_id = 0;
						$capacitacion_base_id = $value;
					}
					if ($key < 3 || $capacitacion_id == 0) {

						$id = self::registrar_ficha_capacitacion($contacto_id, $capacitacion_id, $capacitacion_base_id);
					}
				}
			}
		}
		return $contacto_id;
	}

	public function validar_email_concurso($mail)
	{

		$gbd = Gestionbd::getInstancia();
		$sql = "SELECT ficha_contacto_id as id FROM ficha_contacto WHERE ficha_contacto_email=:mail AND not ficha_contacto_num_documento IS NULL AND DATE(fecha_registro)>='2019-07-01' LIMIT 1";
		$cmd = $gbd->prepare($sql);
		$cmd->bindparam(':mail', $mail);
		$cmd->execute();
		$lista = $cmd->fetch(PDO::FETCH_ASSOC);
		return (int)$lista["id"] > 0 ? $lista["id"] : 0;
	}



	public function ficha_contacto($data)
	{

		//$mensaje=new mensaje();

		$mensajedmc = new mensajeDMC();

		$status_ok = false; //Esta condición es para poder enviar mensaje personalizados

		$data["tipo_documento"] = NULL;

		if (strlen($data["num_documento"]) >= 8 or $data["tDocumento"] != "") {

			$data["tipo_documento"] = $data["tDocumento"];
		} else if (strlen($data["num_documento"]) == 8) {

			$data["tipo_documento"] = "DNI";
		}

		$data["datos"] = $data["datos"] == 1 ? 1 : 0;
		$contacto_id = self::registrar_ficha_contacto_capacitacion($data);
		$curso = $data["cursos"];
		$cantidad_cursos = count($curso);
		$data["cant_cursos"] = $cantidad_cursos;
		/* Registro para Charla Informativa */
		/*$charla=$data["charla_informativa"];
		if($charla==1 && $cantidad_cursos==1){
		    $charla_id=self::charla_informativa_obtener_id($curso[0]);
		    if($charla_id>0 && $contacto_id>0){
		    	self::registrar_ficha_contacto_charla($charla_id,$contacto_id);
		    }

		}*/
		if ($cantidad_cursos > 0) {

			//Envio de correo al cliente
			$enviado = false;

			$data["cursos"] = $cantidad_cursos;
			$id_cursos = implode(",", $curso);

			//Mensaje para correo y envio de correos
			if ($cantidad_cursos >= 1 && $cantidad_cursos <= 3) {
				$titulo = "Respondido por DMC";
				$respuesta = 1;
			} else {
				$titulo = "Envió información incompleta";
				$respuesta = 2;
			}
			if ($data["tipo"] == 1) {
				$cursos = self::listado_informacion_cursos($id_cursos);
			} else {
				$cursos = self::listado_informacion_cursos_local($id_cursos);
			}


			//Mensaje de Cliente

			$mensaje = null;

			if ($data["check_mail"] == 1) {

				$dataCapacitacion = self::listado_capacitacion_jarvis($id_cursos);


				$titulo = strstr($mensaje, "METODOLOGÍA") != "" || $curso[0] == 966 || $curso[0] == 1015 ? "Informes DMC - Hasta 30% de dto. en cursos Online todo Octubre." : "DMC - Taller Online Gratuito";

				if ($curso[0] == 1110 || $curso[0] == 1107) {

					$titulo = "Informes DMC - Hasta 30% de dto. en cursos Online todo Octubre.";
				}

				if ($status_ok == false) {

					foreach ($dataCapacitacion as $capacitacion) {

						$titulo = $capacitacion["categoria"] . " - " . $capacitacion["nombre"];

						if ($capacitacion["capacitacion_id"] == "1474") {

							$titulo = "Programas de especialización - " . $capacitacion["nombre"];

							$mensaje = $mensajedmc->mensaje_dsf();
						} else if ($capacitacion["capacitacion_id"] == "2455") {

							$titulo = "Programa de Especialización Analítica: PEA Data Science";

							$mensaje = $mensajedmc->charla_dsf();
						}else if ($capacitacion["capacitacion_id"] == "2439") {

							$titulo = "Programa de Especialización Analítica: PEA Data Engineer";

							$mensaje = $mensajedmc->mensaje_data_engineer();
						} else if ($capacitacion["capacitacion_id"] == "1324") {

							$mensaje = $mensajedmc->mensaje_bi(); //cambie 1429

						} else if ($capacitacion["capacitacion_id"] == "2436") {

							$titulo = "Programa de Especialización: Business Intelligence Fundamentals";

							$mensaje = $mensajedmc->bi_fundamentals();
							
						} else if ($capacitacion["capacitacion_id"] == "1479") {

							$mensaje = $mensajedmc->charla_bi();

							$titulo = "Programas de especialización - " . $capacitacion["nombre"];
						} else if ($capacitacion["capacitacion_id"] == "1210") {

							$mensaje = $mensajedmc->evento_dmc();
						} else if ($capacitacion["capacitacion_id"] == "1465") {

							$mensaje = $mensajedmc->mail_pea_marketing();
						} else if ($capacitacion["capacitacion_id"] == "1463") {

							$mensaje = $mensajedmc->charla_marketing();
						} else if ($capacitacion["capacitacion_id"] == "1729") {

							$titulo = $capacitacion["nombre"];

							$mensaje = $mensajedmc->mensaje_pea_marketing_digital();
						} else if ($capacitacion["capacitacion_id"] == "1746") {

							$titulo = $capacitacion["nombre"];

							$mensaje = $mensajedmc->charla_advanced();
						} else if ($capacitacion["capacitacion_id"] == "1749") {

							$titulo = $capacitacion["nombre"];

							$mensaje = $mensajedmc->mensaje_data_engineer();

						} else if ($capacitacion["capacitacion_id"] == "2408") {

							$titulo = 'Charla gratuita: ¿Cómo me convierto en un Data Engineer?';

							$mensaje = $mensajedmc->charla_data_engineer();

						} else if ($capacitacion["capacitacion_id"] == "1736") {

							$titulo = $capacitacion["nombre"];

							$mensaje = $mensajedmc->mensaje_charla_pea_dam();
						} else if ($capacitacion["capacitacion_id"] == "1468") {

							$mensaje = $mensajedmc->charla_ml();
						} else if ($capacitacion["capacitacion_id"] == "1743") {

							$titulo = $capacitacion["nombre"];

							$mensaje = $mensajedmc->mensaje_advanced_datascience();

							/*}else if($capacitacion["capacitacion_id"]=="1362"){

					    	$mensaje = $mensajedmc->especializacion_excel();

							$titulo = "Especialización - ".$capacitacion["nombre"];*/
						} else if ($capacitacion["capacitacion_id"] == "1342") {

							$mensaje = $mensajedmc->mensaje_charla_data_science_advanced();
						} else if ($capacitacion["capacitacion_id"] == "1321") {

							$mensaje = $mensajedmc->mensaje_especializacion_power_bi();
						} else if ($capacitacion["capacitacion_id"] == "1368") {

							$mensaje = $mensajedmc->mensaje_sqlserver();
						} else if ($capacitacion["capacitacion_id"] == "2362") {

							$titulo = "Programa de Especialización: Advanced BI";

							$mensaje = $mensajedmc->bi_advanced();
						} else if ($capacitacion["capacitacion_id"] == "1664") {

							$titulo = $capacitacion["nombre"];

							$mensaje = $mensajedmc->charla_bi_advanced();
						} else if ($capacitacion["capacitacion_id"] == "1724") {

							$titulo = $capacitacion["nombre"];

							$mensaje = $mensajedmc->mensaje_charla_marketing_digital();
						} else if ($capacitacion["capacitacion_id"] == "1376") {

							$titulo = $capacitacion["nombre"];

							$mensaje = $mensajedmc->dmc_talks();
						} else if ($capacitacion["capacitacion_id"] == "2450") {

							$titulo = "Charla gratuita: Fundamentos para una Arquitectura de Datos";

							$mensaje = $mensajedmc->charla_data_architect();
						} else if ($capacitacion["capacitacion_id"] == "1700") {

							$titulo = $capacitacion["nombre"];

							$mensaje = $mensajedmc->data_analytics_managament();
						} else if ($capacitacion["capacitacion_id"] == "2526") {

							$titulo = "Charla gratuita: La analítica como eje en la transformación digital";

							$mensaje = $mensajedmc->charla_pea_data_analytics();
						} else if ($capacitacion["capacitacion_id"] == "2435") {

							$titulo = "Conversatorio gratuito: Data Engineer vs. Data Architect";

							$mensaje = $mensajedmc->evento_dmc();
						} else if ($capacitacion["capacitacion_id"] == "2499") {

							$titulo = 'Charla informativa: PEA Market Risk Analytics';

							$mensaje = $mensajedmc->market_risk_analytics_charla();
							
						}else if ($capacitacion["capacitacion_id"] == "1719") {

							$titulo = $capacitacion["nombre"];

							$mensaje = $mensajedmc->charla_data_science_fundamentals();
						} else if ($capacitacion["capacitacion_id"] == "2529") {

							$titulo = "Charla gratuita: ¿Cómo inicio mi camino en el mundo del Business Intelligence?";

							$mensaje = $mensajedmc->charla_bi_fundamentals();
						} else if ($capacitacion["capacitacion_id"] == "1679") {

							$titulo = $capacitacion["nombre"];

							$mensaje = $mensajedmc->charla_qlik_bi();
						} else if ($capacitacion["capacitacion_id"] == "1720") {

							$titulo = $capacitacion["nombre"];

							$mensaje = $mensajedmc->charla_pea_data_science_marketing();
						} else if ($capacitacion["capacitacion_id"] == "1400") {

							$titulo = $capacitacion["nombre"];

							$mensaje = $mensajedmc->mensaje_especializacion_python();

							/*}else if($capacitacion["capacitacion_id"]=="1410"){

							$titulo = $capacitacion["nombre"];

					    	$mensaje = $mensajedmc->especializacion_scoring();*/
						} else if ($capacitacion["capacitacion_id"] == "1412") {

							$titulo = $capacitacion["nombre"];

							$mensaje = $mensajedmc->especializacion_ml();
						} else if ($capacitacion["capacitacion_id"] == "1438") {

							$titulo = $capacitacion["nombre"];

							$mensaje = $mensajedmc->mensaje_charla_data_analytics();
						} else if ($capacitacion["capacitacion_id"] == "1426") {

							$titulo = $capacitacion["nombre"];

							$mensaje = $mensajedmc->mensaje_summit();
						} else if ($capacitacion["capacitacion_id"] == "1698") {

							$titulo = $capacitacion["nombre"];

							$mensaje = $mensajedmc->PEA_F();
						} else if ($capacitacion["capacitacion_id"] == "1722") {

							$titulo = 'Charla informativa: PEAS Business Intelligence';

							$mensaje = $mensajedmc->PEA_BIF_ABI();
						} else if ($capacitacion["capacitacion_id"] == "1676") {

							$titulo = $capacitacion["nombre"];

							$mensaje = $mensajedmc->PEA_Data_Science_Marketing();
						} else if ($capacitacion["capacitacion_id"] == "1714") {

							$titulo = $capacitacion["nombre"];

							$mensaje = $mensajedmc->Aplicaciones_Data_Science_para_gestión_marketing();
						} else if ($capacitacion["capacitacion_id"] == "1713") {

							$titulo = $capacitacion["nombre"];

							$mensaje = $mensajedmc->Aplicaciones_Machine_Learning_sector_financiero();
						} else if ($capacitacion["capacitacion_id"] == "1458") {

							$titulo = $capacitacion["nombre"];

							$mensaje = $mensajedmc->mensaje_summit_one_day();
						} else if ($capacitacion["capacitacion_id"] == "1561") {

							$titulo = $capacitacion["nombre"];

							$mensaje = $mensajedmc->mensaje_sistema_recomendacion();
						} else {

							$siguiente_inicio = self::siguiente_inicio($capacitacion["capacitacion_base_id"]);

							$mensaje = $mensajedmc->plantilla_correoV2($capacitacion, $siguiente_inicio);
							//$mensaje = $mensajedmc->plantilla_correo($capacitacion,$siguiente_inicio);



						}

						$capacitacion["categoria"] = $capacitacion["categoria"] == "CURSOS POWER" ? "CURSO ANALYTICS" : $capacitacion["categoria"];





						$enviado = self::send_mail("Informes DMC", $data["correo"], $data["nombres"], "", "", "", $titulo, $mensaje);
					}
				} else {

					$enviado = self::send_mail("Informes DMC", $data["correo"], $data["nombres"], "", "", "", $titulo, $mensaje);
				}
			}





			//Enviar Correos a DMC y Coordinación

			$cadena_curso = self::cadena_curso($id_cursos);
			$data["nom_cursos"] = $cadena_curso["cursos"];
			$medio = ["-", "Facebook", "Google", "Folleto Informativo", "Alumno - Ex-Alumno", "Linkedin", "Correo Electrónico", "Otros", "Youtube", "", "Facebook - Leads", "Whatsapp", "Ninguna"];
			$data["medio"] = $medio[$data["medio"]];
			$mail_vendedor = self::get_vendedor_mail($curso[0]);
			$mensaje_admin = self::mensaje_admin($data);

			//Envio de Correo

			self::send_mail($titulo . " - Suscritos", "informes@dataminingperu.com", "Informes DMC", "", "", "", $titulo . " - Suscritos cursos DMC", $mensaje_admin);

			if ($curso[0] == 465) {
				self::send_mail($titulo . " - Suscritos", "katherine.uribe@dmc.pe", "Informes DMC", "", "", "", $titulo . " - Suscritos cursos DMC", $mensaje_admin);
			}

			//self::send_mail($titulo." - Suscritos","marco.medrano@dataminingperu.com","Informes DMC","","","",$titulo." - Suscritos cursos DMC",$mensaje_admin);

			if ($mail_vendedor) {
				$titulo = "Lead #" . date("YmdGis") . " - " . $titulo;
				self::send_mail($titulo, $mail_vendedor, "Informes DMC", "", "", "", $titulo . " - Suscritos cursos DMC", $mensaje_admin);
			}
			return true;
		}
	}
}
