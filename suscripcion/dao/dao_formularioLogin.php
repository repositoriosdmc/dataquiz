<?php


require_once "gestionbd.php";

// session_start();

class dao_formularioLogin
{

  public function datosUsuarioRedSocial($sesion)
  {
    $hash = md5(rand(0, 1000));
    $gbd = Gestionbd::getInstancia();

    try {



      $sql = 'SELECT * from form_login_usuarios where correo = :correo';
     

      $cmd = $gbd->prepare($sql);

      $cmd->bindparam(':correo', $sesion['CORREO']);


      $cmd->execute();

      $lista = $cmd->fetch(PDO::FETCH_ASSOC);
      $_SESSION['ID']  = $lista['id']; 

      // Verificar si el usuario existe
      if ($lista === false) {
  // El usuario no existe, registrar uno nuevo
  $sql_insert = 'INSERT INTO form_login_usuarios (nombres, apellido, usuario, correo, estado, formulario,tipo_registro,hash) 
  VALUES (:nombres, :apellido, :usuario, :correo, 1, :formulario,:tipo_registro,:hash)';
$cmd_insert = $gbd->prepare($sql_insert);
$cmd_insert->bindparam(':nombres', $sesion['NOMBRE']); // Corregido de :nombre a :nombres
$cmd_insert->bindparam(':apellido', $sesion['APELLIDO']);
$cmd_insert->bindparam(':usuario', $sesion['USUARIO']);
$cmd_insert->bindparam(':correo', $sesion['CORREO']);
$cmd_insert->bindparam(':formulario', $sesion['FORMULARIO']);
$cmd_insert->bindparam(':tipo_registro', $sesion['TIPO_REGISTRO']);
$cmd_insert->bindparam(':hash', $hash);
$cmd_insert->execute();

// Obtener el ID del último registro insertado, si lo lees dale var_dump
  $lista = $gbd->lastInsertId();
  $_SESSION['ID']  = $lista;
     
      }

      // Devolver la lista de usuario
      return $lista;
    } catch (\Exception $e) {

      echo "ERROR: " . $e->getMessage();
    }
  }

  public function registrarFichaContacto($id){

        try {

                $gbd=Gestionbd::getInstancia();

                $sql="INSERT into ficha_contacto (FICHA_CONTACTO_EMAIL,FICHA_CONTACTO_NOMBRES,FICHA_CONTACTO_APELLIDOS,FICHA_CONTACTO_TELEFONO,FECHA_REGISTRO,FICHA_CONTACTO_NUM_DOCUMENTO,FICHA_CONTACTO_TIPO_DOC)
    select correo,nombres,apellido,telefono,now(),numero_documento,tipo_documento from form_login_usuarios where id = :id";

                $cmd=$gbd->prepare($sql);
                $cmd->bindparam(':id',$id);
                $cmd->execute();
                return $gbd->lastInsertId();

        }
        catch (Exception $e)
        {
          echo "ERROR: " . $e->getMessage();
        }
  }


  public function registrarFichaContactoCapacitacion($fichaContactoId,$capacitacion){
    try {
            $gbd=Gestionbd::getInstancia();
            $sql="INSERT into ficha_contacto_capacitacion (FICHA_CONTACTO_ID,CAPACITACION_ID) values (:FICHA_CONTACTO_ID,:CAPACITACION_ID);";
            $cmd=$gbd->prepare($sql);

            $cmd->bindparam(':FICHA_CONTACTO_ID',$fichaContactoId);
            $cmd->bindparam(':CAPACITACION_ID',$capacitacion);
            $cmd->execute();

            return "ok";
    }
    catch (Exception $e)
    {
      echo "ERROR: " . $e->getMessage();
    }

}


public function ejecutarFlujoFicha($id_formulario, $id_usuario,$correo) {

  $inicio = $this->consultaFormularios($id_formulario);

  
   if ($this->validacionUsuarioInicio($inicio['capacitacion_id'], $correo)) return; //si es true , cancela todo


     $fichaContactoId = $this->registrarFichaContacto($id_usuario);
    

     return $this->registrarFichaContactoCapacitacion($fichaContactoId, $inicio['capacitacion_id']); 
}


  public function validacionUsuarioInicio($capacitacion, $mailUsuario)
  {

    $gbd = Gestionbd::getInstancia();

    try {

      $sql = "SELECT fc.FICHA_CONTACTO_ID,fc.FICHA_CONTACTO_EMAIL,fcc.CAPACITACION_ID
        from ficha_contacto fc
        join ficha_contacto_capacitacion fcc on fcc.FICHA_CONTACTO_ID = fc.FICHA_CONTACTO_ID
        where fc.FICHA_CONTACTO_EMAIL = :FICHA_CONTACTO_EMAIL and fcc.CAPACITACION_ID = :capacitacion_id

        order by fc.FICHA_CONTACTO_ID desc";

      $cmd = $gbd->prepare($sql);

      $cmd->bindparam(':FICHA_CONTACTO_EMAIL', $mailUsuario);

      $cmd->bindparam(':capacitacion_id', $capacitacion);

      $cmd->execute();

      $lista = $cmd->fetch(PDO::FETCH_ASSOC);

      return $lista;
    } catch (\Exception $e) {

      echo "ERROR: " . $e->getMessage();
    }
  }


  public function registrarArchivoExcel($intento,$respuesta_seleccionada,$id_usuario,$archivo,$fileName){
    try {
            $gbd=Gestionbd::getInstancia();
            $sql="INSERT INTO form_login_respuestas (respuesta_seleccionada,respuesta_texto,id_usuario,id_pregunta,archivo,numero_intento)
             values (:respuesta_seleccionada,:fileName,:id_usuario,8725,:archivo,:intento)";
            $cmd=$gbd->prepare($sql);

            $cmd->bindparam(':id_usuario',$id_usuario);
            $cmd->bindparam(':archivo',$archivo);
            $cmd->bindparam(':fileName',$fileName);
            $cmd->bindparam(':respuesta_seleccionada',$respuesta_seleccionada);
            $cmd->bindparam(':intento',$intento);
            $cmd->execute();

            return "ok";
    }
    catch (Exception $e)
    {
      echo "ERROR: " . $e->getMessage();
    }

}


  public function agregar_estado($usuario, $id_formulario)
  {

    $gbd = Gestionbd::getInstancia();

    try {

      $sql = 'INSERT into form_login_permisos (id_usuario,id_formulario,estado_permiso,intentos) values(:usuario,:id_formulario,0,1)';

      $cmd = $gbd->prepare($sql);
      $cmd->bindparam(':usuario', $usuario);
      $cmd->bindparam(':id_formulario', $id_formulario);
      $cmd->execute();

      return "ok";
    } catch (\Exception $e) {

      echo "ERROR: " . $e->getMessage();
    }
  }


  public function agregar_estado_certificaciones($usuario, $id_formulario,$estado_permiso, $datoRadio = null)
  {

    $gbd = Gestionbd::getInstancia();

    try {

      $sql = 'INSERT into form_login_permisos (id_usuario,id_formulario,estado_permiso,intentos,fecha_inicio,respuesta) 
      values(:usuario,:id_formulario,:estado_permiso,1,NOW(),:respuesta)';

      $cmd = $gbd->prepare($sql);
      $cmd->bindparam(':usuario', $usuario);
      $cmd->bindparam(':id_formulario', $id_formulario);
      $cmd->bindparam(':estado_permiso', $estado_permiso);
      $cmd->bindparam(':respuesta', $datoRadio);
      $cmd->execute();

      return "ok";
    } catch (\Exception $e) {

      echo "ERROR: " . $e->getMessage();
    }
  }


  public function actualizarEstadoPermiso($usuario, $id_formulario,$fecha_inicio, $estado = 1)
  {



    $gbd = Gestionbd::getInstancia();



    try {

      $sql = 'UPDATE form_login_permisos set estado_permiso = :estado,intentos = COALESCE(intentos)+1, fecha_inicio = :fecha_inicio  where id_usuario = :usuario and id_formulario =:id_formulario';



      $cmd = $gbd->prepare($sql);

      $cmd->bindparam(':estado', $estado);

      $cmd->bindparam(':usuario', $usuario);

      $cmd->bindparam(':id_formulario', $id_formulario);

      $cmd->bindparam(':fecha_inicio', $fecha_inicio);

      $cmd->execute();



      return "ok";
    } catch (\Exception $e) {

      echo "ERROR: " . $e->getMessage();
    }
  }

  public function actualizarFechaInicio($usuario, $id_formulario,$fecha_inicio)
  {

    $gbd = Gestionbd::getInstancia();

    try {

       $sql = 'UPDATE form_login_permisos set intentos = COALESCE(intentos)+1  
       ,fecha_inicio = :fecha_inicio
       where id_usuario = :usuario and id_formulario =:id_formulario';

      $cmd = $gbd->prepare($sql);
    
      $cmd->bindparam(':usuario', $usuario);
      $cmd->bindparam(':id_formulario', $id_formulario);
      $cmd->bindparam(':fecha_inicio', $fecha_inicio);
      $cmd->execute();

      return "ok";
    } catch (\Exception $e) {

      echo "ERROR: " . $e->getMessage();
    }
  }


  public function registrarEstadoEnvio($id_formulario, $usuario, $respuesta)
  {

    $gbd = Gestionbd::getInstancia();

    try {

       $sql = 'UPDATE form_login_permisos set respuesta = :respuesta 
       where id_usuario = :usuario and id_formulario =:id_formulario';

      $cmd = $gbd->prepare($sql);
    
      $cmd->bindparam(':usuario', $usuario);
      $cmd->bindparam(':id_formulario', $id_formulario);
      $cmd->bindparam(':respuesta', $respuesta);
      $cmd->execute();

      return "ok";
    } catch (\Exception $e) {

      echo "ERROR: " . $e->getMessage();
    }
  }


  public function actualizarEstado($usuario, $id_formulario,$fecha_fin,$estado)
  {

    $gbd = Gestionbd::getInstancia();

    try {

      $sql = 'UPDATE form_login_permisos set fecha_fin = :fecha_fin, estado_permiso = :estado
      where id_usuario = :usuario and id_formulario =:id_formulario';

     $cmd = $gbd->prepare($sql);
   
     $cmd->bindparam(':usuario', $usuario);
     $cmd->bindparam(':id_formulario', $id_formulario);
     $cmd->bindparam(':fecha_fin', $fecha_fin);
     $cmd->bindparam(':estado', $estado);
     $cmd->execute();
    } catch (\Exception $e) {

      echo "ERROR: " . $e->getMessage();
    }
  }

  public function agregarResultadosCertificaciones($usuario, $id_formulario, $intento)
  {
      $gbd = Gestionbd::getInstancia();
    //cambiar porcentaje a 40
      try {
          $sql = 'INSERT INTO form_login_resultados (id_usuario, id_formulario,fecha_inicio, fecha_fin, intento, porcentaje)
          VALUES (:usuario, :id_formulario, (select fecha_inicio from form_login_permisos
            where id_usuario = :usuario and id_formulario = :id_formulario) ,NOW(), :intento,( 
             select round((count(*) / 
             (select cantidad_preguntas from form_login_nombre where id_formulario = :id_formulario)
             ) * 100) porcentaje
        from form_login_respuestas fr
        left join form_login_preguntas fp on fp.id_pregunta = fr.id_pregunta
        where fr.id_usuario = :usuario
        and fp.id_formulario = :id_formulario
         and respuesta = respuesta_seleccionada
          AND fr.numero_intento = :intento
          ))';
  
          $cmd = $gbd->prepare($sql);
  
          $cmd->bindParam(':usuario', $usuario);
          $cmd->bindParam(':id_formulario', $id_formulario);
          $cmd->bindParam(':intento', $intento);
       
  
          $cmd->execute();
  
          return "ok";
      } catch (\Exception $e) {
          echo "ERROR: " . $e->getMessage();
      }
  }

  public function agregarResultadosFormLogin($usuario, $id_formulario, $intento)
  {
    $gbd = Gestionbd::getInstancia();
    try {
      $sql = 'INSERT INTO form_login_resultados (id_usuario, id_formulario,fecha_inicio, fecha_fin, intento,porcentaje)
      VALUES (:usuario, :id_formulario, (select fecha_inicio from form_login_permisos
        where id_usuario = :usuario and id_formulario = :id_formulario) ,NOW(), :intento,0)';

      $cmd = $gbd->prepare($sql);

      $cmd->bindParam(':usuario', $usuario);
      $cmd->bindParam(':id_formulario', $id_formulario);
      $cmd->bindParam(':intento', $intento);
   

      $cmd->execute();

      return "ok";
    } catch (\Exception $e) {
      echo "ERROR: " . $e->getMessage();
    }
  }
   
  public function porcentajeCertificaciones($id_formulario, $usuario,$intento)
  {
    // return $id_formulario;

    $gbd = Gestionbd::getInstancia();
    //cambiar a 40
    try {

      $sql = "SELECT fn.nombre,DATE_FORMAT(fecha_inicio, '%d/%m/%y - %H:%i %p') fecha_inicio,
      DATE_FORMAT(fecha_fin, '%d/%m/%y - %H:%i %p') fecha_fin,
      TIMEDIFF(fecha_fin,fecha_inicio) AS duracion,
      (  select round((count(*) / 
      (select cantidad_preguntas from form_login_nombre where id_formulario = :id_formulario)
      ) * 100) porcentaje
        from form_login_respuestas fr
        left join form_login_preguntas fp on fp.id_pregunta = fr.id_pregunta
        where fr.id_usuario = :usuario
        and fp.id_formulario = :id_formulario
         and respuesta = respuesta_seleccionada
          AND fr.numero_intento = :intento
          ) porcentaje
       from form_login_resultados fr 
       left join form_login_nombre fn on fn.id_formulario = fr.id_formulario
       where fr.id_formulario = :id_formulario and id_usuario = :usuario and intento = :intento";

      $cmd = $gbd->prepare($sql);

      $cmd->bindparam(':id_formulario', $id_formulario);

      $cmd->bindparam(':usuario', $usuario);
      $cmd->bindparam(':intento', $intento);

      $cmd->execute();

      $lista = $cmd->fetch(PDO::FETCH_ASSOC);
    
      return $lista;
    } catch (\Exception $e) {

      echo "ERROR: " . $e->getMessage();
    } 
  }

  public function puntajeconcursoLiv($capacitacion, $usuario, $intento)
  {

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

  public function consultaExamenes($correo)
  {
    $gbd = Gestionbd::getInstancia();

    try {

      $sql = 'SELECT flu.*,flp.estado_permiso,fln.formulario,fln.nombre FROM  form_login_usuarios flu
      left join form_login_permisos flp on flp.id_usuario = flu.id
      left join form_login_nombre fln on fln.id_formulario = flp.id_formulario
      WHERE flu.correo= :correo
      and flu.estado = 1
      and flp.estado_permiso = 0';

      $cmd = $gbd->prepare($sql);

      $cmd->bindparam(':correo', $correo);

      $cmd->execute();

      $lista = $cmd->fetchAll(PDO::FETCH_ASSOC);

      return $lista;
    } catch (\Exception $e) {

      echo "ERROR: " . $e->getMessage();
    }
  }
  

  public function puntajeConcursoAdvancedDataScience($capacitacion, $usuario, $intento)
  {

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

  public function puntajeMaximoConcursoAdvancedDataScience($capacitacion, $usuario)
  {

    $gbd = Gestionbd::getInstancia();

    try {

      $sql = 'SELECT MAX(puntaje) AS puntaje FROM ( SELECT SUM( CASE WHEN flr.respuesta_seleccionada IS NULL THEN 0 WHEN flr.respuesta_seleccionada = flp.respuesta THEN 5 ELSE -2 END ) AS puntaje FROM form_login_respuestas flr INNER JOIN form_login_preguntas flp ON flr.id_pregunta = flp.id_pregunta WHERE flp.id_formulario = :formulario AND flr.id_usuario = :usuario GROUP BY flr.id_usuario, flp.id_formulario,flr.numero_intento ) AS subconsulta';

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

  public function ranking()
  {

    $gbd = Gestionbd::getInstancia();

    try {

      $sql = 'SELECT flu.nombres,flu.apellido,MAX(sb.puntaje) AS puntaje FROM ( SELECT flr.id_usuario,flr.numero_intento, SUM( CASE WHEN flr.respuesta_seleccionada IS NULL THEN 0 WHEN flr.respuesta_seleccionada = flp.respuesta THEN 5 ELSE -2 END ) AS puntaje FROM form_login_respuestas flr INNER JOIN form_login_preguntas flp ON flr.id_pregunta = flp.id_pregunta WHERE flp.id_formulario = 8 and DATE(fecha_creacion)>="2024-03-18" GROUP BY flr.id_usuario, flp.id_formulario,flr.numero_intento ) AS sb INNER JOIN form_login_usuarios flu ON flu.id = sb.id_usuario WHERE not flu.id IN (2,62,63,99,98,97,93,91,309,1191) GROUP BY sb.id_usuario ORDER BY 3 DESC';

      $cmd = $gbd->prepare($sql);

      $cmd->execute();

      $lista = $cmd->fetchAll(PDO::FETCH_ASSOC);

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


  public function consultaUsuario($correo)
  {

    try {

      $gbd = Gestionbd::getInstancia();

      $sql = "SELECT id,formulario from form_login_usuarios where usuario = :correo";


      $cmd = $gbd->prepare($sql);


      $cmd->bindparam(':correo', $correo);

      $cmd->execute();



      $lista = $cmd->fetchAll(PDO::FETCH_ASSOC);

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

      if (is_array($lista) && isset($lista['estado'])) {
        return $lista['estado'];
      }

      return null;
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
/*
    $formulario = null;
    /* if (isset($post["grupo"])) {
      $formulario = $post["grupo"];
    } */
    $existe = $this->consultaUsuario($post["correo"]);
    
    // Verificar si existe el usuario
    if (count($existe) > 0) {
      $id = $existe[0]['id'];
      
      //actualiza el password
      $query = "UPDATE form_login_usuarios SET password_bcrypt = :password_bcrypt,formulario = :formulario WHERE correo = :correo";

      $gbd = Gestionbd::getInstancia();

      $cmd = $gbd->prepare($query);

      $cmd->bindparam(':password_bcrypt',  base64_encode($post["contraseña"]));

      $cmd->bindparam(':formulario', $post["grupo"]);

      $cmd->bindparam(':correo', $post["correo"]);

      $cmd->execute();

    //  return $id;
    }else{

    $gbd = Gestionbd::getInstancia();

    $sql = 'INSERT INTO form_login_usuarios(nombres,apellido,usuario,
tipo_documento,numero_documento,telefono,

    password_bcrypt,correo,hash,formulario,estado)

        values

     (:nombres,:apellido,:correo,:tipo_documento,:numero_documento,:telefono,

     :password_bcrypt,:correo,:hash,:formulario,1)';

    $cmd = $gbd->prepare($sql);

    $cmd->bindparam(':nombres', $post["nombres"]);

    $cmd->bindparam(':apellido', $post["apellidos"]);

    $cmd->bindparam(':tipo_documento', $post["tipo_documento"]);

    $cmd->bindparam(':numero_documento', $post["numero_documento"]);

    $cmd->bindparam(':telefono', $post["telefono"]);

    $cmd->bindparam(':password_bcrypt',  base64_encode($post["contraseña"]));

    $cmd->bindparam(':correo', $post["correo"]);

    $cmd->bindparam(':hash', $hash);

    $cmd->bindparam(':formulario', $post["grupo"]);
    $cmd->execute();
  
  // Obtener el ID del usuario registrado
  $id = $gbd->lastInsertId();
 // return $id;

    
    }


    $formularios = $this->consultaFormulario($post["grupo"]);

    foreach ($formularios as $formulario) {
    $valor = $this->registrarPermiso($id, $formulario["id_formulario"]);
    
    }

    if ($valor == "ok") {
      return 1;
    }
 
  
  }


  public function registrarPermiso($id, $formulario)
  {
    try {
      $gbd = Gestionbd::getInstancia();

      $sql = "INSERT INTO form_login_permisos (id_usuario, id_formulario, estado_permiso, intentos) 
      VALUES (:id, :formulario, 0, 0)";

      $cmd = $gbd->prepare($sql);

      $cmd->bindparam(':id', $id);

      $cmd->bindparam(':formulario', $formulario);

      $cmd->execute();

      return "ok";
    } catch (Exception $e) {

      echo "ERROR: " . $e->getMessage();
    }
  }


  public function consultaFormulario($grupo)
  {
    try {
      $gbd = Gestionbd::getInstancia();

      $sql = "SELECT * from form_login_nombre where grupo = :grupo";

      $cmd = $gbd->prepare($sql);

      $cmd->bindparam(':grupo', $grupo);

      $cmd->execute();

      $lista = $cmd->fetchAll(PDO::FETCH_ASSOC);

      return $lista;
    } catch (Exception $e) {

      echo "ERROR: " . $e->getMessage();
    }
  }



  public function consultaUsuarioexistente($post)
  {

    try {

      $gbd = Gestionbd::getInstancia();

      $sql = "SELECT * from form_login_grupo flg
left join form_login_nombre fln on fln.grupo = flg.id_grupo
left join form_login_permisos flp on flp.id_formulario = fln.id_formulario
left join form_login_usuarios flu on flu.id = flp.id_usuario
where flg.id_grupo = :grupo
 and flu.correo = :correo";

      $cmd = $gbd->prepare($sql);




      $cmd->bindparam(':grupo', $post["grupo"]);
      $cmd->bindparam(':correo', $post["correo"]);

      $cmd->execute();



      $lista = $cmd->fetchAll(PDO::FETCH_ASSOC);



      return count($lista);
    } catch (Exception $e) {

      echo "ERROR: " . $e->getMessage();
    }
  }


  //ranking de usuarios

  public function rankingPorExamen($id_formulario)
  {
    try {
      $gbd = Gestionbd::getInstancia();

      $sql = "SELECT flu.nombres,flu.apellido,flu.correo,
  flr.id_formulario ,flr.id_usuario,flr.intento,flr.porcentaje 
  from form_login_resultados flr
  left join form_login_usuarios flu on flu.id = flr.id_usuario
    where flr.id_formulario = :id_formulario
  
  order by flr.porcentaje desc";

      $cmd = $gbd->prepare($sql);

      $cmd->bindparam(':id_formulario', $id_formulario);

      $cmd->execute();

      $lista = $cmd->fetchAll(PDO::FETCH_ASSOC);

      return $lista;
    } catch (Exception $e) {

      echo "ERROR: " . $e->getMessage();
    }
  }


  public function consultaUsuarioexistenteCertificacion($post)
  {

    try {

      $gbd = Gestionbd::getInstancia();



      $sql = "SELECT * from form_login_usuarios where correo = :correo and  formulario = :formulario ";





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

  public function getNombreUsuario($usuario)
  {

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


  public function consultaActivarEstados($usuario)
  {
    try {
      $gbd = Gestionbd::getInstancia();

      // Obtener los datos con consultaActivarEstados
      $sql = "SELECT fr.porcentaje, fp.id_usuario, fp.id_formulario 
              FROM form_login_permisos fp
              LEFT JOIN form_login_resultados fr 
              ON fr.id_usuario = fp.id_usuario 
              AND fr.id_formulario = fp.id_formulario  
              AND fr.intento = fp.intentos
              WHERE fp.id_usuario = :usuario 
              AND (fp.intentos <= 1 OR fp.intentos IS NULL)
              ORDER BY fp.id_permiso DESC";

      $cmd = $gbd->prepare($sql);
      $cmd->bindParam(':usuario', $usuario);
      $cmd->execute();

      $resultados = $cmd->fetchAll(PDO::FETCH_ASSOC);

      // Iterar sobre los resultados y ejecutar el UPDATE
      foreach ($resultados as $resultado) {
        if (is_null($resultado['porcentaje'])) { // Verificar si porcentaje es NULL
          $id_formulario = $resultado['id_formulario'];

          $sqlUpdate = "UPDATE form_login_permisos 
                        SET estado_permiso = 0 
                        WHERE id_usuario = :usuario 
                        AND id_formulario = :id_formulario";

          $cmdUpdate = $gbd->prepare($sqlUpdate);
          $cmdUpdate->bindParam(':usuario', $usuario);
          $cmdUpdate->bindParam(':id_formulario', $id_formulario);
          $cmdUpdate->execute();
      }
      }

      return "Estados actualizados correctamente.";
  } catch (Exception $e) {
      echo "ERROR: " . $e->getMessage();
      return false;
  }
  
  }




  public function listaCapacitaciones($id)
  {

    try {

      $gbd = Gestionbd::getInstancia();



      $sql = 'SELECT tiempo_examen,nombre,id_formulario,estado_examen,estado_permiso,nombres,correo,formulario,capacitacion_id,cantidad_preguntas from

(

SELECT fn.tiempo_examen,fn.nombre, fn.id_formulario, IF(fu.id = :id AND fp.estado_permiso = 1, "terminado", "pendiente") AS estado_examen, fp.estado_permiso, fu.nombres , fu.correo,fn.formulario,fn.capacitacion_id
,fn.cantidad_preguntas
FROM form_login_nombre fn

LEFT JOIN form_login_permisos fp ON fp.id_formulario = fn.id_formulario

LEFT JOIN form_login_usuarios fu ON fu.id = fp.id_usuario

WHERE fn.estado = 1 AND fu.id = :id

UNION

SELECT tiempo_examen,nombre, id_formulario, "pendiente" AS estado_examen, "0" AS estado_permiso, null AS nombres, null AS correo,formulario,capacitacion_id,cantidad_preguntas

FROM form_login_nombre WHERE estado = 1

)AS subquery

GROUP BY nombre

ORDER BY
    CASE
        WHEN id_formulario = 73 THEN 0  
        ELSE 1                          
    END,
    id_formulario
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

      // Desactivar aleatoriedad para capacitaciones 71, 72 y 73
      if (!in_array($datos['capacitacion'], [71, 72, 73])) {
        $sql .= " ORDER BY RAND()";
      }
      $sql .= " LIMIT 1";
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

      $sql = "SELECT * FROM form_login_preguntas WHERE estado = 1 AND id_formulario = :capacitacion ";

      // Verificar si el array no está vacío
      if (!empty($preguntasId)) {
        // Crear un array para almacenar los nombres de los parámetros vinculados


        $inClause = implode(',', $preguntasId);

        $sql .= " AND NOT id_pregunta IN ($inClause)";
      }

      // Desactivar aleatoriedad para capacitaciones 71, 72 y 73
      if (!in_array($datos['capacitacion'], [71, 72, 73])) {
        $sql .= " ORDER BY RAND()";
      }
      $sql .= " LIMIT 1";
 
      $cmd = $gbd->prepare($sql);

      $cmd->bindParam(':capacitacion', $datos['capacitacion']);


      $cmd->execute();

      $lista = $cmd->fetch(PDO::FETCH_ASSOC);

      return $lista;
    } catch (Exception $e) {
      echo "ERROR: " . $e->getMessage();
    }
  }


  public function consultaPreguntasCertificaciones($datos)
  {

    $preguntasId = $datos["preguntas"];

    try {
      $gbd = Gestionbd::getInstancia();

      $sql = "SELECT * FROM form_login_preguntas WHERE estado = 1 AND id_formulario = :capacitacion ";

      // Verificar si el array no está vacío
      if (!empty($preguntasId)) {
        // Crear un array para almacenar los nombres de los parámetros vinculados


        $inClause = implode(',', $preguntasId);

        $sql .= " AND NOT id_pregunta IN ($inClause)";
      }

      // Desactivar aleatoriedad para capacitaciones 71, 72 y 73
      if (!in_array($datos['capacitacion'], [71, 72, 73])) {
        $sql .= " ORDER BY RAND()";
      }
      $sql .= " LIMIT 1";

      $cmd = $gbd->prepare($sql);

      $cmd->bindParam(':capacitacion', $datos['capacitacion']);
  

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


  public function datosUsuario($id_formulario, $id_usuario)
  {

    try {

      $gbd = Gestionbd::getInstancia();
      $sql = "SELECT concat(fu.nombres,' ', fu.apellido) nombres_completos,fu.id,fu.usuario,fu.correo,fp.id_permiso,
        fp.estado_permiso,fn.id_formulario,fn.nombre
        from form_login_usuarios fu
        left join form_login_permisos fp on fu.id = fp.id_usuario 
        left join form_login_nombre fn on fn.id_formulario = fp.id_formulario
        where fn.id_formulario = :id_formulario and fu.id = :id_usuario";

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
  
  public function consultaTemaXusuario($id_usuario,$id_formulario)
  {
    try {
      $gbd = Gestionbd::getInstancia();
      $sql = "SELECT
    tm.CAPACITACION_ID
    ,fln.nombre Examen
    ,tm.EDICION
    ,flp.tema
    ,flper.id_usuario
    ,flper.id_formulario
    ,SUM(CASE WHEN flr.respuesta_seleccionada = flp.respuesta THEN 1 ELSE 0 END) correcto
    ,SUM(CASE WHEN flr.respuesta_seleccionada != flp.respuesta THEN 1 ELSE 0 END) erroneo
    ,SUM(CASE WHEN flr.respuesta_seleccionada IS NULL THEN 1 ELSE 0 END) sin_respuesta
    ,SUM(CASE WHEN flr.respuesta_seleccionada = flp.respuesta THEN 1 ELSE 0 END) * 1.0 / COUNT(*) porcentaje_correcto
    ,SUM(CASE WHEN flr.respuesta_seleccionada != flp.respuesta THEN 1 ELSE 0 END) * 1.0 / COUNT(*) porcentaje_erroneo
    ,SUM(CASE WHEN flr.respuesta_seleccionada IS NULL THEN 1 ELSE 0 END) * 1.0 / COUNT(*) porcentaje_sin_respuesta
    FROM form_login_permisos flper
    JOIN form_login_nombre fln ON fln.id_formulario = flper.id_formulario
    LEFT JOIN form_login_preguntas flp ON flp.id_formulario = flper.id_formulario
    LEFT JOIN form_login_respuestas flr ON flr.id_pregunta = flp.id_pregunta AND flr.id_usuario = flper.id_usuario
    LEFT JOIN TB_PERMISOS_DATA_QUIZ dq ON dq.id_formulario = flper.id_formulario AND dq.id_usuario = flper.id_usuario
    LEFT JOIN BD_DWH.TB_MATRICULAS tm ON tm.ORDEN_SERVICIO_ID = dq.ORDEN_SERVICIO_ID
    LEFT JOIN BD_DWH.TB_COMUNIDAD com ON com.EMAIL = tm.EMAIL
    
    WHERE fln.id_formulario IN (30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,63,65,66,67,68,69)
    AND flr.numero_intento IS NOT NULL
    AND NOT flper.id_usuario IN (2330,309,1458)
     and flper.id_formulario = :id_formulario
     and flper.id_usuario = :id_usuario
    
    GROUP BY fln.nombre,tm.EDICION,flp.tema";

      $cmd = $gbd->prepare($sql);



      $cmd->bindparam(':id_usuario', $id_usuario);
      $cmd->bindparam(':id_formulario', $id_formulario);



      $cmd->execute();



      return  $lista = $cmd->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {

      echo "ERROR: " . $e->getMessage();
    }

  }



  public function plantillaCertificacion($link, $mail, $contraseña)
  { 

    $html = '<body topmargin="0" leftmargin="0" style="height: 100% !important; margin: 0; padding: 0; width: 100% !important;min-width: 100%;">
       
   <table width="100%" cellspacing="0" cellpadding="0" border="0" name="bmeMainBody" style="background-color: rgb(240, 240, 240);" bgcolor="#f0f0f0"><tbody><tr><td width="100%" valign="top" align="center">    
   <table cellspacing="0" cellpadding="0" border="0" name="bmeMainColumnParentTable"><tbody><tr><td name="bmeMainColumnParent" style="border-collapse: separate; border: 0px none transparent; border-radius: 0px; border-spacing: 0px; overflow: visible;">       
   <table name="bmeMainColumn" class="bmeMainColumn bmeHolder" style="max-width: 600px; overflow: visible; border-radius: 0px; border-collapse: separate; border-spacing: 0px;" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr id="section_1" class="flexible-section" data-columns="1" data-section-type="bmePreHeader"><td width="100%" class="blk_container bmeHolder" name="bmePreHeader" valign="top" align="center" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(230, 230, 232);" bgcolor="#e6e6e8"><div id="dv_2" class="blk_wrapper">    
   <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image" style=""><tbody><tr><td>    
   <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 0px; background-color: rgb(255, 255, 255);"><img    
    src="https://images.benchmarkemail.com/client1381227/image15362866.png" class="mobile-img-large" width="600" style="max-width: 1035px; display: block; border-radius: 0px;" alt="dmcperu" data-radius="0" border="0"></td></tr></tbody>    
   </table></td></tr></tbody>    
   </table></div><div id="dv_4" class="blk_wrapper" style="">    
   <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text" style=""><tbody><tr><td>    
   <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><th class="tdPart" valign="top" align="center" style="background-color: rgb(255, 255, 255);">    
   <table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float: left; background-color: rgb(255, 255, 255);" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 15px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="line-height: 125%;">    
   <p style="text-align: justify; margin-top: 0px; margin-bottom: 0px;"><span style="font-size: 12px; color: rgb(0, 0, 0);"><span style="line-height: 125%;"><strong>    
   <em>¡Gracias por registrarte!</em></strong>    
   <br>    
   <br>Tu cuenta ha sido creada con éxito. Actívala haciendo clic en el siguiente enlace y usando las siguientes credenciales:</span></span></p>    
   <ul>    
   <li style="text-align: justify;"><span style="font-size: 12px; color: rgb(0, 0, 0);"><span style="line-height: 125%;"><strong>Usuario</strong>:&nbsp;'. $mail .'</span></span></li>    
       
  
   </ul>    
   </div></td></tr></tbody>    
   </table></th></tr></tbody>    
   </table></td></tr></tbody>    
   </table></div></td></tr>   <tr><td width="100%" class="bmeHolder" valign="top" align="center" name="bmeMainContentParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px; overflow: hidden;">    
   <table name="bmeMainContent" style="border-radius: 0px; border-collapse: separate; border-spacing: 0px; border: 0px none transparent; overflow: visible;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"><tbody> <tr id="section_3" class="flexible-section" data-columns="1"><td width="100%" class="blk_container bmeHolder bmeBody" name="bmeBody" valign="top" align="center" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: rgb(255, 255, 255);" bgcolor="#ffffff"><div id="dv_7" class="blk_wrapper" style="">    
   <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_button" style="background-color: rgb(255, 255, 255);"><tbody><tr><td width="20"></td><td align="center">    
   <table class="tblContainer" cellspacing="0" cellpadding="0" border="0" width="100%"><tbody><tr><td height="0"></td></tr><tr><td align="center">    
   <table cellspacing="0" cellpadding="0" border="0" class="bmeButton" align="center" style="border-collapse: separate;"><tbody><tr><td style="border-radius: 50px; border-width: 0px; border-style: none; border-color: transparent; background-color: rgb(0, 0, 0); text-align: center; font-family: Arial, Helvetica, sans-serif; font-size: 13px; padding: 10px 20px; font-weight: bold; word-break: break-word;" class="bmeButtonText"><span style="font-family: Arial, Verdana; font-size: 13px; color: rgb(255, 255, 255);"><a style="color:#FFFFFF;text-decoration:none;" target="_blank" href="'. $link .'" target="_blank" data-link-type="web">Activa tu cuenta aquí</a></span></td></tr></tbody>    
   </table></td></tr><tr><td height="0"></td></tr></tbody>    
   </table></td><td width="20"></td></tr></tbody>    
   </table></div><div id="dv_3" class="blk_wrapper" style="">    
   <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(255, 255, 255);"><tbody><tr><td class="tblCellMain" style="padding: 10px 20px;">    
   <table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px none rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody>    
   </table></td></tr></tbody>    
   </table></div></td></tr>  <tr id="section_4" class="flexible-section" data-columns="1"><td width="100%" class="blk_container bmeHolder" name="bmePreFooter" valign="top" align="center" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: rgb(255, 255, 255);" bgcolor="#ffffff"></td></tr> </tbody>    
   </table></td> </tr>  <tr id="section_5" class="flexible-section" data-columns="1" data-section-type="bmeFooter"><td width="100%" class="blk_container bmeHolder" name="bmeFooter" valign="top" align="center" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(230, 230, 232);" bgcolor="#e6e6e8"><div id="dv_5" class="blk_wrapper" style="">    
   <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_social_follow" style="background-color: rgb(0, 0, 0);"><tbody><tr><td class="tblCellMain" align="center" style="padding-top:15px; padding-bottom:15px; padding-left:20px; padding-right:20px;">    
   <table class="tblContainer mblSocialContain" cellspacing="0" cellpadding="0" border="0" align="center" style="text-align:center;"><tbody><tr><td class="tdItemContainer">    
   </td></tr></tbody>    
   </table></td></tr></tbody>    
   </table></div></td></tr> </tbody>    
   </table> </td></tr></tbody>    
   </table></td></tr></tbody>    
   </table>    
   </body>';

    return $html;
  }

  public function pantillaResultadoNotas($capacitacionId,$idUsuario,$nombreCapacitacion,$puntosObtenidos, $nombreCap, $nombre, $apellidos, $link)
  {


    $bloqueRefuerzo = '';
if ($puntosObtenidos < 80) {
    $bloqueRefuerzo = '
    <strong> Curso de Refuerzo Asíncrono</strong> 
    <br><br>  
    👉 ¿Qué incluye?
    <br><br>
    <strong> Duración:</strong> 2 semanas  <br>
    ✅ Contenido práctico y actualizado <br>
    ✅ Recursos descargables (diapositivas y vídeos) <br>
    ✅ Costo: S/ 30 <br><br>
    <strong> Para adquirirlo da click:</strong> 
    <br>
    <a href="https://dmc.pe/producto/python-fundamentals-asincrono">https://dmc.pe/producto/python-fundamentals-asincrono</a>
    <br><br>';
}

$temas_raw = $this->consultaTemaXusuario($idUsuario,$capacitacionId);
$temas = [];
foreach ($temas_raw as $row) {
    // Cada fila debe tener: tema, porcentaje_correcto, porcentaje_erroneo, porcentaje_sin_respuesta
    $temas[$row['tema']] = [
        round($row['porcentaje_correcto'] * 100),
        round($row['porcentaje_erroneo'] * 100),
        round($row['porcentaje_sin_respuesta'] * 100)
    ];
}
    $colores = ['#27ae60', '#e74c3c', '#f1c40f'];
    $labels = ['Correcto', 'Erróneo', 'Sin Respuesta'];
    $barWidth = 30;
    $barSpacing = 10;
    $groupSpacing = 60; 
    $numTemas = count($temas);
    $numBarras = count($labels);
    $leftMargin = 60;
    $rightMargin = 30;
    // Ancho dinámico según la cantidad de temas
    $width = max(700, $leftMargin + $rightMargin + $numTemas * ($numBarras * $barWidth + $barSpacing * ($numBarras - 1) + $groupSpacing));
    $height = 300;
    $topMargin = 50;
    $bottomMargin = 60;
    $usableHeight = $height - $topMargin - $bottomMargin;
    $usableWidth = $width - $leftMargin - $rightMargin;
    $svg = '<svg width="'.$width.'" height="'.$height.'" xmlns="http://www.w3.org/2000/svg">';
    // Fondo
    $svg .= '<rect width="100%" height="100%" fill="#fff"/>';
    // Título (más arriba)
    $svg .= '<text x="'.($width/2).'" y="20" text-anchor="middle" font-family="Arial" font-size="22" font-weight="bold">Porcentaje de respuestas</text>';
    // Líneas horizontales y etiquetas de porcentaje
    for ($i = 0; $i <= 5; $i++) {
      $y = $topMargin + $i * ($usableHeight/5);
      $valor = 100 - $i*20;
      $svg .= '<line x1="'.$leftMargin.'" y1="'.$y.'" x2="'.($width-$rightMargin).'" y2="'.$y.'" stroke="#e5e5e5" stroke-width="1"/>';
      $svg .= '<text x="'.($leftMargin-10).'" y="'.($y+5).'" text-anchor="end" font-family="Arial" font-size="13" fill="#888">'.$valor.'%</text>';
    }
    // Barras
    $temaIndex = 0;
    foreach ($temas as $tema => $valores) {
      $xGrupo = $leftMargin + $temaIndex * ($numBarras*$barWidth + $barSpacing*($numBarras-1) + $groupSpacing);
      for ($j=0; $j<$numBarras; $j++) {
        $valor = $valores[$j];
        $barH = ($valor/100)*$usableHeight;
        $x = $xGrupo + $j*($barWidth + $barSpacing);
        $y = $topMargin + $usableHeight - $barH;
        $svg .= '<rect x="'.$x.'" y="'.$y.'" width="'.$barWidth.'" height="'.$barH.'" fill="'.$colores[$j].'" rx="4"/>';
        // Etiqueta de porcentaje sobre la barra
        $svg .= '<text x="'.($x+$barWidth/2).'" y="'.($y-7).'" text-anchor="middle" font-family="Arial" font-size="15" font-weight="bold" fill="#222">'.$valor.'%</text>';
      }
      // Etiqueta del tema
      $svg .= '<text x="'.($xGrupo + ($numBarras*$barWidth + $barSpacing*($numBarras-1))/2).'" y="'.($height-$bottomMargin+25).'" text-anchor="middle" font-family="Arial" font-size="16" fill="#222">'.$tema.'</text>';
      $temaIndex++;
    }
    // Leyenda
    $legendX = $leftMargin + 40;
    $legendY = $height - 20;
    for ($i=0; $i<$numBarras; $i++) {
      $svg .= '<rect x="'.($legendX + $i*130).'" y="'.($legendY-12).'" width="18" height="18" fill="'.$colores[$i].'" rx="3"/>';
      $svg .= '<text x="'.($legendX + $i*130 + 25).'" y="'.$legendY.'" font-family="Arial" font-size="15" fill="#222">'.$labels[$i].'</text>';
    }
    $svg .= '</svg>';

    $chartImage = '<img src="data:image/svg+xml;base64,'.base64_encode($svg).'" style="width: 100%; max-width: 700px; height: auto; margin: 20px auto; display: block;">';
    $html = '
    <body topmargin="0" leftmargin="0" style="height: 100% !important; margin: 0; padding: 0; width: 100% !important;min-width: 100%;">
    
    <table width="100%" cellspacing="0" cellpadding="0" border="0" name="bmeMainBody" style="background-color: rgb(240, 240, 240);" bgcolor="#f0f0f0"><tbody><tr><td width="100%" valign="top" align="center">    
    <table cellspacing="0" cellpadding="0" border="0" name="bmeMainColumnParentTable"><tbody><tr><td name="bmeMainColumnParent" style="border-collapse: separate; border: 0px none transparent; border-radius: 0px; border-spacing: 0px; overflow: visible;">       
    <table name="bmeMainColumn" class="bmeMainColumn bmeHolder" style="max-width: 600px; overflow: visible; border-radius: 0px; border-collapse: separate; border-spacing: 0px;" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr id="section_1" class="flexible-section" data-columns="1" data-section-type="bmePreHeader"><td width="100%" class="blk_container bmeHolder" name="bmePreHeader" valign="top" align="center" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(230, 230, 232);" bgcolor="#e6e6e8"><div id="dv_2" class="blk_wrapper">    
    <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image" style=""><tbody><tr><td>    
    <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 0px; background-color: rgb(255, 255, 255);"><img    
     src="https://images.benchmarkemail.com/client1381227/image15362867.png" class="mobile-img-large" width="600" style="max-width: 1035px; display: block; border-radius: 0px;" alt="dmcperu" data-radius="0" border="0"></td></tr></tbody>    
    </table></td></tr></tbody>    
    </table></div><div id="dv_4" class="blk_wrapper" style="">    
    <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text" style=""><tbody><tr><td>    
    <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><th class="tdPart" valign="top" align="center" style="background-color: rgb(255, 255, 255);">    
    <table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float: left; background-color: rgb(255, 255, 255);" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 15px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="line-height: 125%;">    
    <p style="text-align: justify; margin-top: 0px; margin-bottom: 0px;"><span style="font-size: 12px; color: rgb(0, 0, 0);"><span style="line-height: 125%;"><strong>    
    <em>Estimado/a '.$nombre.',</em></strong>    
      <br> 
      
    <br>   
    <br>Gracias por completar el <strong>Data Quiz</strong>. A continuación, te compartimos tu resultado:   
    <br>
    <br>
      Obtuviste  '.$puntosObtenidos.'%
    <br>    
     <div style="width:100%;text-align:center;">'.$chartImage.'</div>
    
    <br>  
    
Este resultado nos permite saber previamente cual es tu nivel de conocimiento para <strong>' . $nombreCapacitacion . '</strong> y de esta manera poder brindarte una experiencia de aprendizaje y calidad.
    <br><br>
      Sabemos que cada estudiante tiene su propio ritmo de aprendizaje, por lo que queremos brindarte 
la oportunidad de reforzar tus conocimientos a través de un curso asíncrono. Este curso puede 
ayudarte a comprender mejor los temas clave y prepararte con éxito para los siguientes desafíos académicos.
   <br><br>  
    '.$bloqueRefuerzo.'
    Si tienes dudas adicionales, estamos a tu disposición.<br><br>    
    Saludos,<br><br>    
    Área de CX<br>    
    DMC Institute<br>    
   
    </span></span></p>    
    </div></td></tr></tbody>    
    </table></th></tr></tbody>    
    </table></td></tr></tbody>    
    </table></div><div id="dv_3" class="blk_wrapper" style="">    
    <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(255, 255, 255);"><tbody><tr><td class="tblCellMain" style="padding: 8px 20px;">    
    <table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px none rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody>    
    </table></td></tr></tbody>    
    </table></div>
 
    
    </td></tr>  <tr id="section_4" class="flexible-section" data-columns="1">
    <td width="100%" class="blk_container bmeHolder" name="bmePreFooter" valign="top" align="center" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: rgb(255, 255, 255);" bgcolor="#ffffff"></td>
</tr> </tbody>    
    </table></td> </tr>  <tr id="section_5" class="flexible-section" data-columns="1" data-section-type="bmeFooter"><td width="100%" class="blk_container bmeHolder" name="bmeFooter" valign="top" align="center" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(230, 230, 232);" bgcolor="#e6e6e8"><div id="dv_5" class="blk_wrapper" style="">    
    <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_social_follow" style="background-color: rgb(0, 0, 0);"><tbody><tr><td class="tblCellMain" align="center" style="padding-top:15px; padding-bottom:15px; padding-left:20px; padding-right:20px;">    
    <table class="tblContainer mblSocialContain" cellspacing="0" cellpadding="0" border="0" align="center" style="text-align:center;"><tbody><tr><td class="tdItemContainer">    
    <table cellspacing="0" cellpadding="0" border="0" class="mblSocialContain" style="table-layout: auto;"><tbody><tr><td valign="top" name="bmeSocialTD" class="bmeSocialTD">
   
 </td></tr></tbody>    
    </table></td></tr></tbody>    
    </table></td></tr></tbody>    
    </table></div></td></tr> </tbody>    
    </table> </td></tr></tbody>    
    </table></td></tr></tbody>    
    </table>    
    
    </body>
    ';
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
