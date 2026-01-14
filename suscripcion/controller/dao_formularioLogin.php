<?php







require_once "gestionbd.php";







class dao_formularioLogin
{







  public function agregar_estado($usuario, $id_formulario)
  {



    $gbd = Gestionbd::getInstancia();



    try {



      $sql = 'INSERT into form_login_permisos (id_usuario,id_formulario,estado_permiso,intentos) values(:usuario,:id_formulario,1,1)';



      $cmd = $gbd->prepare($sql);



      $cmd->bindparam(':usuario', $usuario);

      $cmd->bindparam(':id_formulario', $id_formulario);

      $cmd->execute();



      return "ok";
    } catch (\Exception $e) {

      echo "ERROR: " . $e->getMessage();
    }
  }


  public function actualizarEstadoPermiso($usuario, $id_formulario, $estado = 1)
  {



    $gbd = Gestionbd::getInstancia();



    try {



      $sql = 'UPDATE form_login_permisos set estado_permiso = :estado,intentos = COALESCE(intentos)+1  where id_usuario = :usuario and id_formulario =:id_formulario';



      $cmd = $gbd->prepare($sql);

      $cmd->bindparam(':estado', $estado);

      $cmd->bindparam(':usuario', $usuario);

      $cmd->bindparam(':id_formulario', $id_formulario);

      $cmd->execute();



      return "ok";
    } catch (\Exception $e) {

      echo "ERROR: " . $e->getMessage();
    }
  }


  public function puntajeconcursoLiv($capacitacion,$usuario,$intento){

    $gbd = Gestionbd::getInstancia();

    try {



      $sql = 'SELECT SUM( CASE WHEN flr.respuesta_seleccionada IS NULL THEN 0 WHEN flr.respuesta_seleccionada = flp.respuesta THEN 2 ELSE -1 END) AS puntaje FROM form_login_respuestas flr INNER JOIN form_login_preguntas flp ON flr.id_pregunta = flp.id_pregunta WHERE flp.id_formulario = :formulario AND flr.id_usuario = :usuario AND flr.numero_intento = :intento';



      $cmd = $gbd->prepare($sql);

      $cmd->bindparam(':formulario', $capacitacion);

      $cmd->bindparam(':usuario', $usuario);

      $cmd->bindparam(':intento', $intento);

      $cmd->execute();

      $lista = $cmd->fetch(PDO::FETCH_ASSOC);

      return $lista;

    } catch (\Exception $e) {

      echo "ERROR: " . $e->getMessage();
    }
  }

  public function puntajeConcursoAdvancedDataScience($capacitacion,$usuario,$intento){

    $gbd = Gestionbd::getInstancia();

    try {



      $sql = 'SELECT SUM( CASE WHEN flr.respuesta_seleccionada IS NULL THEN 0 WHEN flr.respuesta_seleccionada = flp.respuesta THEN 5 ELSE -2 END) AS puntaje FROM form_login_respuestas flr INNER JOIN form_login_preguntas flp ON flr.id_pregunta = flp.id_pregunta WHERE flp.id_formulario = :formulario AND flr.id_usuario = :usuario AND flr.numero_intento = :intento';



      $cmd = $gbd->prepare($sql);

      $cmd->bindparam(':formulario', $capacitacion);

      $cmd->bindparam(':usuario', $usuario);

      $cmd->bindparam(':intento', $intento);

      $cmd->execute();

      $lista = $cmd->fetch(PDO::FETCH_ASSOC);

      return $lista;

    } catch (\Exception $e) {

      echo "ERROR: " . $e->getMessage();
    }
  }

  public function puntajeMaximoConcursoAdvancedDataScience($capacitacion,$usuario){

    $gbd = Gestionbd::getInstancia();

    try {

      $sql = 'SELECT MAX(puntaje) AS puntaje_maximo FROM ( SELECT SUM( CASE WHEN flr.respuesta_seleccionada IS NULL THEN 0 WHEN flr.respuesta_seleccionada = flp.respuesta THEN 5 ELSE -2 END ) AS puntaje FROM form_login_respuestas flr INNER JOIN form_login_preguntas flp ON flr.id_pregunta = flp.id_pregunta WHERE flp.id_formulario = :formulario AND flr.id_usuario = :usuario GROUP BY flr.id_usuario, flp.id_formulario ) AS subconsulta';

      $cmd = $gbd->prepare($sql);

      $cmd->bindparam(':formulario', $capacitacion);

      $cmd->bindparam(':usuario', $usuario);

      $cmd->execute();

      $lista = $cmd->fetch(PDO::FETCH_ASSOC);

      return $lista;

    } catch (\Exception $e) {

      echo "ERROR: " . $e->getMessage();

      
    }
  }



  public function registrarRespuestas($id_pregunta, $respuesta_seleccionado, $numero_opcion_seleccionado, $id_usuario, $numero_intento)
  {



    $gbd = Gestionbd::getInstancia();



    $sql = 'insert into form_login_respuestas(respuesta_seleccionada,respuesta_texto,

    id_pregunta,id_usuario,numero_intento)

          values

       (:respuesta_seleccionada,:respuesta,

     :id_pregunta,:id_usuario,:numero_intento)';

    // falta agregar id_pregunta para join

    $cmd = $gbd->prepare($sql);



    $cmd->bindparam(':respuesta_seleccionada', $numero_opcion_seleccionado);

    $cmd->bindparam(':respuesta', $respuesta_seleccionado);

    $cmd->bindparam(':id_pregunta', $id_pregunta);

    $cmd->bindparam(':id_usuario', $id_usuario);

    $cmd->bindparam(':numero_intento', $numero_intento);

    // si en la pregunta ponen ":" el json no guarda bien

    if ($cmd->execute()) {



      return "ok";
    } else {



      return "no registro";
    }
  }









  public function consultaFormularios($id_formulario)
  {

    try {

      $gbd = Gestionbd::getInstancia();



      $sql = "SELECT * from form_login_nombre where id_formulario = :id_formulario";





      $cmd = $gbd->prepare($sql);



      $cmd->bindparam(':id_formulario', $id_formulario);

      $cmd->execute();



      $lista = $cmd->fetch(PDO::FETCH_ASSOC);



      return $lista;
    } catch (Exception $e) {

      echo "ERROR: " . $e->getMessage();
    }
  }





  // nuevo

  public function consultaPreguntas($post)
  {

    try {

      $gbd = Gestionbd::getInstancia();



      $sql = "SELECT * from form_login_preguntas where estado = 1 and id_formulario = :capacitacion ORDER BY RAND()  limit 20";





      $cmd = $gbd->prepare($sql);



      $cmd->bindparam(':capacitacion', $post['capacitacion']);

      $cmd->execute();



      $lista = $cmd->fetchAll(PDO::FETCH_ASSOC);



      return $lista;
    } catch (Exception $e) {

      echo "ERROR: " . $e->getMessage();
    }
  }

  public function validar_respuesta($preguntasId, $respuesta)
  {

    try {

      $gbd = Gestionbd::getInstancia();

      $sql = "SELECT 'ok' AS estado FROM form_login_preguntas WHERE id_pregunta=:preguntaId AND respuesta= :respuesta ORDER BY 1 DESC";

      $cmd = $gbd->prepare($sql);

      $cmd->bindparam(':preguntaId', $preguntasId);

      $cmd->bindparam(':respuesta', $respuesta);

      $cmd->execute();



      $lista = $cmd->fetch(PDO::FETCH_ASSOC);

      return $lista["estado"];
    } catch (Exception $e) {

      echo "ERROR: " . $e->getMessage();
    }
  }







  public function registro_calificaciones($usuario, $id_formulario, $puntosObtenidos)
  {



    $gbd = Gestionbd::getInstancia();



    try {



      $sql = 'INSERT into calificaciones (id_usuario,id_formulario,intento,nota_obtenida,nota_aprobatoria)

value (:usuario,:id_formulario,(

select max(intentos) from form_login_permisos where id_usuario = 2 and id_formulario = 1

),:nota_obtenida,

(select nota_aprobatoria from form_login_nombre where id_formulario = :id_formulario)

)';



      $cmd = $gbd->prepare($sql);



      $cmd->bindparam(':usuario', $usuario);

      $cmd->bindparam(':id_formulario', $id_formulario);

      $cmd->bindparam(':nota_obtenida', $puntosObtenidos);

      $cmd->execute();



      return "ok";
    } catch (\Exception $e) {

      echo "ERROR: " . $e->getMessage();
    }
  }









  public function registrarUsuario($post, $hash)
  {



    $gbd = Gestionbd::getInstancia();





    $sql = 'insert into form_login_usuarios(nombres,apellido,usuario,

    password,correo,hash,telefono,tipo_documento,numero_documento)

        values

     (:nombres,:apellido,:correo,

     :password,:correo,:hash,:telefono,:tipo_documento,:numero_documento)';



    $cmd = $gbd->prepare($sql);



    $cmd->bindparam(':nombres', $post["nombres"]);

    $cmd->bindparam(':apellido', $post["apellidos"]);

    $cmd->bindparam(':password', $post["contraseña"]);

    $cmd->bindparam(':correo', $post["correo"]);

    $cmd->bindparam(':telefono', $post["telefono"]);

    $cmd->bindparam(':hash', $hash);



    $cmd->bindparam(':tipo_documento', $post["tipo_documento"]);

    $cmd->bindparam(':numero_documento', $post["numero_documento"]);





    if ($cmd->execute()) {



      return "ok";
    } else {



      return "no registro";
    }
  }



  public function consultaUsuarioexistente($post)
  {

    try {

      $gbd = Gestionbd::getInstancia();



      $sql = "SELECT * from form_login_usuarios where correo = :correo ";





      $cmd = $gbd->prepare($sql);





      $cmd->bindparam(':correo', $post["correo"]);

      $cmd->execute();



      $lista = $cmd->fetchAll(PDO::FETCH_ASSOC);



      return count($lista);
    } catch (Exception $e) {

      echo "ERROR: " . $e->getMessage();
    }
  }



  public function validarUsuario($post)
  {

    try {

      $gbd = Gestionbd::getInstancia();



      $sql = "SELECT * from form_login_usuarios where estado = 1 and hash = :hash and correo = :correo ";





      $cmd = $gbd->prepare($sql);



      $cmd->bindparam(':hash', $post["hash"]);

      $cmd->bindparam(':correo', $post["correo"]);

      $cmd->execute();



      $lista = $cmd->fetchAll(PDO::FETCH_ASSOC);



      return count($lista);
    } catch (Exception $e) {

      echo "ERROR: " . $e->getMessage();
    }
  }

  public function getNombreUsuario($usuario){

    try {

      $gbd = Gestionbd::getInstancia();

      $sql = "SELECT nombres from form_login_usuarios where id = :usuario ";

      $cmd = $gbd->prepare($sql);

      $cmd->bindparam(':usuario', $usuario);

      $cmd->execute();

      $lista = $cmd->fetch(PDO::FETCH_ASSOC);

      return $lista;

    } catch (Exception $e) {

      echo "ERROR: " . $e->getMessage();
    }

  }





  public function activarCuenta($post)
  {



    $gbd = Gestionbd::getInstancia();





    $sql = "UPDATE form_login_usuarios set estado = 1

    where correo = :correo and hash = :hash";

    $cmd = $gbd->prepare($sql);

    $cmd->bindparam(':correo', $post["correo"]);

    $cmd->bindparam(':hash', $post["hash"]);

    if ($cmd->execute()) {



      return "se activo la cuenta";
    } else {



      return "no registro";
    }
  }





  public function listaCapacitaciones($id)
  {

    try {

      $gbd = Gestionbd::getInstancia();



      $sql = 'SELECT tiempo_examen,nombre,id_formulario,estado_examen,estado_permiso,nombres,correo from

(

SELECT fn.tiempo_examen,fn.nombre, fn.id_formulario, IF(fu.id = :id AND fp.estado_permiso = 1, "terminado", "pendiente") AS estado_examen, fp.estado_permiso, fu.nombres , fu.correo

FROM form_login_nombre fn

LEFT JOIN form_login_permisos fp ON fp.id_formulario = fn.id_formulario

LEFT JOIN form_login_usuarios fu ON fu.id = fp.id_usuario

WHERE fn.estado = 1 AND fu.id = :id

UNION

SELECT tiempo_examen,nombre, id_formulario, "pendiente" AS estado_examen, "0" AS estado_permiso, null AS nombres, null AS correo

FROM form_login_nombre WHERE estado = 1

)AS subquery

GROUP BY nombre

';





      $cmd = $gbd->prepare($sql);

      $cmd->bindparam(':id', $id);

      $cmd->execute();



      $lista = $cmd->fetchAll(PDO::FETCH_ASSOC);



      return json_encode($lista);
    } catch (Exception $e) {

      echo "ERROR: " . $e->getMessage();
    }
  }

  public function pruebaConsulta($datos)
  {

    $preguntasId = $datos["preguntas"];

    try {

      $gbd = Gestionbd::getInstancia();

      $sql = "SELECT * FROM form_login_preguntas WHERE estado = 1 AND id_formulario = :capacitacion";

      // Verificar si el array no está vacío
      if (!empty($preguntasId)) {

        $inClause = implode(',', $preguntasId);

        $sql .= " AND NOT id_pregunta IN ($inClause)";
      }

      $sql .= " ORDER BY RAND() LIMIT 1";
      return $sql;
    } catch (Exception $e) {

      echo "ERROR: " . $e->getMessage();
    }
  }

  public function consultaConcursoPreguntas($datos)
  {

    $preguntasId = $datos["preguntas"];

    try {
      $gbd = Gestionbd::getInstancia();

      $sql = "SELECT * FROM form_login_preguntas WHERE estado = 1 AND id_formulario = :capacitacion and nivel = :nivel";

      // Verificar si el array no está vacío
      if (!empty($preguntasId)) {
        // Crear un array para almacenar los nombres de los parámetros vinculados


        $inClause = implode(',', $preguntasId);

        $sql .= " AND NOT id_pregunta IN ($inClause)";
      }

      $sql .= " ORDER BY RAND() LIMIT 1";

      $cmd = $gbd->prepare($sql);

      $cmd->bindParam(':capacitacion', $datos['capacitacion']);
      $cmd->bindParam(':nivel', $datos['nivel']);

      $cmd->execute();

      $lista = $cmd->fetch(PDO::FETCH_ASSOC);

      return $lista;
    } catch (Exception $e) {
      echo "ERROR: " . $e->getMessage();
    }
  }





  public function consultaEstado($id_formulario, $id_usuario)
  {

    try {

      $gbd = Gestionbd::getInstancia();



      $sql = "SELECT * from form_login_permisos where id_formulario = :id_formulario and id_usuario = :id_usuario";



      $cmd = $gbd->prepare($sql);



      $cmd->bindparam(':id_formulario', $id_formulario);

      $cmd->bindparam(':id_usuario', $id_usuario);

      $cmd->execute();



      return $lista = $cmd->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {

      echo "ERROR: " . $e->getMessage();
    }
  }





  public function resultadosExamen($id_formulario, $id_usuario)
  {

    try {

      $gbd = Gestionbd::getInstancia();



      $sql = "SELECT p.*,r.respuesta_seleccionada,r.respuesta_texto,r.id_pregunta,r.id_usuario,p.id_formulario

      from form_login_preguntas p

		  join form_login_respuestas r on r.id_pregunta = p.id_pregunta

			join form_login_nombre fn on fn.id_formulario = p.id_formulario

      where r.id_usuario = :id_usuario and p.id_formulario = :id_formulario

      and r.numero_intento in ( select max(intentos) from form_login_permisos where id_usuario = :id_usuario and id_formulario = :id_formulario )";



      $cmd = $gbd->prepare($sql);



      $cmd->bindparam(':id_formulario', $id_formulario);

      $cmd->bindparam(':id_usuario', $id_usuario);



      $cmd->execute();



      return  $lista = $cmd->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $e) {

      echo "ERROR: " . $e->getMessage();
    }
  }





  public function pantillaResultadoNotas($puntosObtenidos, $nombreCap, $nombre, $apellidos)
  {



    $html = '<body topmargin="0" leftmargin="0" style="height: 100% !important; margin: 0; padding: 0; width: 100% !important;min-width: 100%;"><div id="dhtmlwindowholder"><span style="display:none">.</span></div>

<link rel="stylesheet" href="/style/modal.css" type="text/css">

<script type="text/javascript" src="/script/modal.js"></script><div id="interVeil"></div>



<meta content="width=device-width, initial-scale=1.0" name="viewport">

<img src="https://clt1381227.benchmarkurl.com/c/o?e=166BC85&amp;c=15136B&amp;t=1&amp;l=6AE75B9A&amp;email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&amp;relid=" alt="" border="0" style="display:none;" height="1" width="1">

<table width="100%" cellspacing="0" cellpadding="0" border="0" name="bmeMainBody" style="background-color: rgb(240, 240, 240);" bgcolor="#f0f0f0"><tbody><tr><td width="100%" valign="top" align="center">

<table cellspacing="0" cellpadding="0" border="0" name="bmeMainColumnParentTable"><tbody><tr><td name="bmeMainColumnParent" style="border-collapse: separate; border: 0px none transparent; border-radius: 0px; border-spacing: 0px; overflow: visible;">

<table name="bmeMainColumn" class="bmeMainColumn bmeHolder" style="max-width: 600px; overflow: visible; border-radius: 0px; border-collapse: separate; border-spacing: 0px;" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr id="section_1" class="flexible-section" data-columns="1" data-section-type="bmePreHeader"><td width="100%" class="blk_container bmeHolder" name="bmePreHeader" valign="top" align="center" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(230, 230, 232);" bgcolor="#e6e6e8"><div id="dv_17" class="blk_wrapper" style="">

<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td>

<table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 0px; background-color: rgb(255, 255, 255);"><img src="https://images.benchmarkemail.com/client1381227/image14150026.jpg" class="mobile-img-large" width="600" style="max-width: 828px; display: block; border-radius: 0px;" alt="dmcperu" data-radius="0" border="0"></td></tr></tbody>

</table></td></tr></tbody>

</table></div></td></tr>   <tr><td width="100%" class="bmeHolder" valign="top" align="center" name="bmeMainContentParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px; overflow: hidden;">

<table name="bmeMainContent" style="border-radius: 0px; border-collapse: separate; border-spacing: 0px; border: 0px none transparent; overflow: visible;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr id="section_2" class="flexible-section" data-columns="1"><td width="100%" class="blk_container bmeHolder" name="bmeHeader" valign="top" align="center" style="border: 0px none transparent; background-color: rgb(255, 255, 255);" bgcolor="#ffffff"><div id="dv_4" class="blk_wrapper" style="">

<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(255, 255, 255);"><tbody><tr><td class="tblCellMain" style="padding: 8px 20px;">

<table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px none rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody>

</table></td></tr></tbody>

</table></div><div id="dv_2" class="blk_wrapper" style="">

<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text"><tbody><tr><td>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><th class="tdPart" valign="top" align="center" style="background-color: rgb(255, 255, 255);">

<table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float: left; background-color: rgb(255, 255, 255);" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="line-height: 150%;">

<p style="color: rgb(56, 56, 56); font-family: Arial, Helvetica, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255); margin-top: 0px; margin-bottom: 0px; text-align: left;"><span style="font-size: 12px; color: rgb(0, 0, 0);"><strong>Hola ' . $nombre . ' ' . $apellidos . ',</strong></span></p>

<p style="color: rgb(56, 56, 56); font-family: Arial, Helvetica, sans-serif; font-size: 14px; text-align: left; white-space: normal; background-color: rgb(255, 255, 255); margin-top: 0px; margin-bottom: 0px;">&nbsp;</p>

<p style="margin: 0px 0cm; line-height: 107%; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: rgb(0, 0, 0);">Te compartimos los resultados de tu evaluación de certificación ' . $nombreCap . ':</span></p>

<p style="margin: 0px 0cm; line-height: 107%; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: rgb(0, 0, 0);">La nota obtenida es <strong><span style="text-decoration: underline;">' . $puntosObtenidos . '</span></strong>.</span></p>

<p style="color: rgb(56, 56, 56); font-family: Arial, Helvetica, sans-serif; font-size: 14px; text-align: left; white-space: normal; background-color: rgb(255, 255, 255); margin-top: 0px; margin-bottom: 0px;"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: rgb(0, 0, 0);">&nbsp;</span></p>

</div></td></tr></tbody>

</table></th></tr></tbody>

</table></td></tr></tbody>

</table></div><div id="dv_6" class="blk_wrapper" style="">

<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(255, 255, 255);"><tbody><tr><td class="tblCellMain" style="padding: 8px 20px;">

<table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px none rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody>

</table></td></tr></tbody>

</table></div></td></tr> <tr id="section_3" class="flexible-section" data-columns="1"><td width="100%" class="blk_container bmeHolder bmeBody" name="bmeBody" valign="top" align="center" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: rgb(255, 255, 255);" bgcolor="#ffffff"></td></tr> <tr id="section_6" class="flexible-section" data-columns="2"><td width="100%">

<table class="bmeHolder" name="bmeBody" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: rgb(255, 255, 255);" bgcolor="#ffffff"> <tbody><tr> <td width="100%" valign="top" align="center">   <div>

<table class="blk_parent1" cellspacing="0" cellpadding="0" style="max-width: 600px;" width="600" align="center"><tbody><tr><th valign="top" align="center" class="tdPart" width="50%">

<table cellspacing="0" cellpadding="0" border="0" width="100%" class="bmeHolder1" style="float:left;" align="left"><tbody><tr><td valign="top" align="center" class="blk_container bmeColumn1" name="bmeColumn1" style="color: rgb(56, 56, 56); border: 0px none transparent;" bgcolor=""></td></tr></tbody>

</table></th><th valign="top" align="center" class="tdPart" width="50%">

<table cellspacing="0" cellpadding="0" border="0" width="100%" class="bmeHolder1" style="float:right;" align="right"><tbody><tr><td valign="top" align="center" class="blk_container bmeColumn2" name="bmeColumn2" style="color: rgb(56, 56, 56); border: 0px none transparent;" bgcolor=""></td></tr></tbody>

</table>  </th></tr></tbody>

</table></div>  </td> </tr> </tbody>

</table> </td></tr> <tr id="section_4" class="flexible-section" data-columns="1"><td width="100%" class="blk_container bmeHolder" name="bmePreFooter" valign="top" align="center" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: rgb(255, 255, 255);" bgcolor="#ffffff"></td></tr> </tbody>

</table></td> </tr>  <tr id="section_5" class="flexible-section" data-columns="1" data-section-type="bmeFooter"><td width="100%" class="blk_container bmeHolder" name="bmeFooter" valign="top" align="center" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(230, 230, 232);" bgcolor="#e6e6e8"><div id="dv_5" class="blk_wrapper" style="">

<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_social_follow" style="background-color: rgb(0, 0, 0);"><tbody><tr><td class="tblCellMain" align="center" style="padding-top:15px; padding-bottom:15px; padding-left:20px; padding-right:20px;">

<table class="tblContainer mblSocialContain" cellspacing="0" cellpadding="0" border="0" align="center" style="text-align:center;"><tbody><tr><td class="tdItemContainer">

<table cellspacing="0" cellpadding="0" border="0" class="mblSocialContain" style="table-layout: auto;"><tbody><tr><td valign="top" name="bmeSocialTD" class="bmeSocialTD"><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->

<table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="website" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://clt1381227.benchmarkurl.com/c/l?u=F97477B&amp;e=166BC85&amp;c=15136B&amp;t=1&amp;l=6AE75B9A&amp;email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/wb_btn.png" alt="dmcperu" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody>

</table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->

<table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="facebook" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://clt1381227.benchmarkurl.com/c/l?u=F97477C&amp;e=166BC85&amp;c=15136B&amp;t=1&amp;l=6AE75B9A&amp;email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/fb_btn.png" alt="dmcperu" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody>

</table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->

<table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="instagram" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://clt1381227.benchmarkurl.com/c/l?u=F97477D&amp;e=166BC85&amp;c=15136B&amp;t=1&amp;l=6AE75B9A&amp;email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/in_btn.png" alt="dmcperu" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody>

</table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->

<table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="linkedin" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://clt1381227.benchmarkurl.com/c/l?u=F97477E&amp;e=166BC85&amp;c=15136B&amp;t=1&amp;l=6AE75B9A&amp;email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/li_btn.png" alt="dmcperu" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody>

</table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->

<table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="youtube" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="height:20px;"><a href="https://clt1381227.benchmarkurl.com/c/l?u=F97477F&amp;e=166BC85&amp;c=15136B&amp;t=1&amp;l=6AE75B9A&amp;email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/yt_btn.png" alt="dmcperu" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody>

</table></td></tr></tbody>

</table></td></tr></tbody>

</table></td></tr></tbody>

</table></div></td></tr> </tbody>

</table> </td></tr></tbody>

</table></td></tr></tbody>

</table>

<!-- Test Path -->

</body>';



    return $html;
  }





  public function plantillaConfirmacion($link, $mail, $contraseña)
  {



    $html = '<tbody><tr><td width="100%" valign="top" align="center">

<table cellspacing="0" cellpadding="0" border="0" name="bmeMainColumnParentTable"><tbody><tr><td name="bmeMainColumnParent" style="border-collapse: separate; border: 0px none transparent; border-radius: 0px; border-spacing: 0px; overflow: visible;">

<table name="bmeMainColumn" class="bmeMainColumn bmeHolder" style="max-width: 600px; overflow: visible; border-radius: 0px; border-collapse: separate; border-spacing: 0px;" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr id="section_1" class="flexible-section" data-columns="1" data-section-type="bmePreHeader"><td width="100%" class="blk_container bmeHolder" name="bmePreHeader" valign="top" align="center" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(230, 230, 232);" bgcolor="#e6e6e8"><div id="dv_17" class="blk_wrapper" style="">

<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td>

<table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 0px; background-color: rgb(255, 255, 255);"><img src="https://images.benchmarkemail.com/client1381227/image14150027.jpg" class="mobile-img-large" width="600" style="max-width: 828px; display: block; border-radius: 0px;" alt="dmcperu" data-radius="0" border="0"></td></tr></tbody>

</table></td></tr></tbody>

</table></div></td></tr>   <tr><td width="100%" class="bmeHolder" valign="top" align="center" name="bmeMainContentParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px; overflow: hidden;">

<table name="bmeMainContent" style="border-radius: 0px; border-collapse: separate; border-spacing: 0px; border: 0px none transparent; overflow: visible;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr id="section_2" class="flexible-section" data-columns="1"><td width="100%" class="blk_container bmeHolder" name="bmeHeader" valign="top" align="center" style="border: 0px none transparent; background-color: rgb(255, 255, 255);" bgcolor="#ffffff"><div id="dv_4" class="blk_wrapper" style="">

<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(255, 255, 255);"><tbody><tr><td class="tblCellMain" style="padding: 8px 20px;">

<table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px none rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody>

</table></td></tr></tbody>

</table></div><div id="dv_2" class="blk_wrapper" style="">

<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text"><tbody><tr><td>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><th class="tdPart" valign="top" align="center" style="background-color: rgb(255, 255, 255);">

<table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float: left; background-color: rgb(255, 255, 255);" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="line-height: 150%;">

<p style="color: rgb(56, 56, 56); font-family: Arial, Helvetica, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255); margin-top: 0px; margin-bottom: 0px; text-align: left;"><span style="font-size: 12px; color: rgb(0, 0, 0);"><strong>¡Gracias por registrarte!</strong></span></p>

<p style="color: rgb(56, 56, 56); font-family: Arial, Helvetica, sans-serif; font-size: 14px; text-align: left; white-space: normal; background-color: rgb(255, 255, 255); margin-top: 0px; margin-bottom: 0px;">&nbsp;</p>

<p style="color: rgb(56, 56, 56); font-family: Arial, Helvetica, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255); margin-top: 0px; margin-bottom: 0px; text-align: left;"><span style="font-size: 12px; color: rgb(0, 0, 0);">Tu cuenta ha sido creada con éxito. Actívala haciendo clic en el siguiente botón y con las siguientes credenciales:</span></p>

<p style="color: rgb(56, 56, 56); font-family: Arial, Helvetica, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255); margin-top: 0px; margin-bottom: 0px; text-align: center;"><span style="font-size: 12px; color: rgb(0, 0, 0);"><strong><span style="text-decoration: underline;">Usuario</span>:&nbsp;</strong>' . $mail . '</span></p>

<p style="color: rgb(56, 56, 56); font-family: Arial, Helvetica, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255); margin-top: 0px; margin-bottom: 0px; text-align: center;"><span style="font-size: 12px; color: rgb(0, 0, 0);"><strong><span style="text-decoration: underline;">Contraseña</span>:&nbsp;</strong>' . $contraseña . '</span></p>

<p style="color: rgb(56, 56, 56); font-family: Arial, Helvetica, sans-serif; font-size: 14px; text-align: left; white-space: normal; background-color: rgb(255, 255, 255); margin-top: 0px; margin-bottom: 0px;">&nbsp;</p>

</div></td></tr></tbody>

</table></th></tr></tbody>

</table></td></tr></tbody>

</table></div><div id="dv_3" class="blk_wrapper" style="">

<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_button" style="background-color: rgb(255, 255, 255);"><tbody><tr><td width="20"></td><td align="center">

<table class="tblContainer" cellspacing="0" cellpadding="0" border="0" width="100%"><tbody><tr><td height="0"></td></tr><tr><td align="center">

<table cellspacing="0" cellpadding="0" border="0" class="bmeButton" align="center" style="border-collapse: separate;"><tbody><tr><td style="border-radius: 50px; border-width: 0px; border-style: none; background-color: rgb(0, 0, 0); text-align: center; font-family: Arial, Helvetica, sans-serif; font-size: 14px; padding: 15px 20px; font-weight: bold;  border-collapse: separate;word-break: break-word;" class="bmeButtonText"><span style="font-family:Arial, Verdana; font-size:14px;color:#FFFFFF;"><a href="' . $link . '" style="color:#FFFFFF;text-decoration:none;" target="_blank"> Activa tu cuenta aquí</a></span></td></tr></tbody>

</table></td></tr><tr><td height="0"></td></tr></tbody>

</table></td><td width="20"></td></tr></tbody>

</table></div><div id="dv_6" class="blk_wrapper" style="">

<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(255, 255, 255);"><tbody><tr><td class="tblCellMain" style="padding: 10px 20px;">

<table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px none rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody>

</table></td></tr></tbody>

</table></div></td></tr> <tr id="section_3" class="flexible-section" data-columns="1"><td width="100%" class="blk_container bmeHolder bmeBody" name="bmeBody" valign="top" align="center" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: rgb(255, 255, 255);" bgcolor="#ffffff"></td></tr> <tr id="section_6" class="flexible-section" data-columns="2"><td width="100%">

<table class="bmeHolder" name="bmeBody" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: rgb(255, 255, 255);" bgcolor="#ffffff"> <tbody><tr> <td width="100%" valign="top" align="center">   <div>

<table class="blk_parent1" cellspacing="0" cellpadding="0" style="max-width: 600px;" width="600" align="center"><tbody><tr><th valign="top" align="center" class="tdPart" width="50%">

<table cellspacing="0" cellpadding="0" border="0" width="100%" class="bmeHolder1" style="float:left;" align="left"><tbody><tr><td valign="top" align="center" class="blk_container bmeColumn1" name="bmeColumn1" style="color: rgb(56, 56, 56); border: 0px none transparent;" bgcolor=""></td></tr></tbody>

</table></th><th valign="top" align="center" class="tdPart" width="50%">

<table cellspacing="0" cellpadding="0" border="0" width="100%" class="bmeHolder1" style="float:right;" align="right"><tbody><tr><td valign="top" align="center" class="blk_container bmeColumn2" name="bmeColumn2" style="color: rgb(56, 56, 56); border: 0px none transparent;" bgcolor=""></td></tr></tbody>

</table>  </th></tr></tbody>

</table></div>  </td> </tr> </tbody>

</table> </td></tr> <tr id="section_4" class="flexible-section" data-columns="1"><td width="100%" class="blk_container bmeHolder" name="bmePreFooter" valign="top" align="center" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: rgb(255, 255, 255);" bgcolor="#ffffff"></td></tr> </tbody>

</table></td> </tr>  <tr id="section_5" class="flexible-section" data-columns="1" data-section-type="bmeFooter"><td width="100%" class="blk_container bmeHolder" name="bmeFooter" valign="top" align="center" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(230, 230, 232);" bgcolor="#e6e6e8"><div id="dv_5" class="blk_wrapper" style="">

<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_social_follow" style="background-color: rgb(0, 0, 0);"><tbody><tr><td class="tblCellMain" align="center" style="padding-top:15px; padding-bottom:15px; padding-left:20px; padding-right:20px;">

<table class="tblContainer mblSocialContain" cellspacing="0" cellpadding="0" border="0" align="center" style="text-align:center;"><tbody><tr><td class="tdItemContainer">

<table cellspacing="0" cellpadding="0" border="0" class="mblSocialContain" style="table-layout: auto;"><tbody><tr><td valign="top" name="bmeSocialTD" class="bmeSocialTD"><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->

<table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="website" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://clt1381227.benchmarkurl.com/c/l?u=F9746A2&amp;e=166BC67&amp;c=15136B&amp;t=1&amp;l=6AE75B9A&amp;email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/wb_btn.png" alt="dmcperu" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody>

</table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->

<table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="facebook" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://clt1381227.benchmarkurl.com/c/l?u=F9746A3&amp;e=166BC67&amp;c=15136B&amp;t=1&amp;l=6AE75B9A&amp;email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/fb_btn.png" alt="dmcperu" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody>

</table>

<table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="instagram" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://clt1381227.benchmarkurl.com/c/l?u=F9746A4&amp;e=166BC67&amp;c=15136B&amp;t=1&amp;l=6AE75B9A&amp;email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/in_btn.png" alt="dmcperu" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody>

</table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->

<table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="linkedin" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://clt1381227.benchmarkurl.com/c/l?u=F9746A5&amp;e=166BC67&amp;c=15136B&amp;t=1&amp;l=6AE75B9A&amp;email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/li_btn.png" alt="dmcperu" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody>

</table>

<table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="youtube" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="height:20px;"><a href="https://clt1381227.benchmarkurl.com/c/l?u=F9746A6&amp;e=166BC67&amp;c=15136B&amp;t=1&amp;l=6AE75B9A&amp;email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/yt_btn.png" alt="dmcperu" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody>

</table></td></tr></tbody>

</table></td></tr></tbody>

</table></td></tr></tbody>

</table></div></tr></tbody>

</table></td></tr></tbody>

 ';



    return $html;
  }
}
