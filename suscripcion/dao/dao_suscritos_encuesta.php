<?php

require_once "dao_suscripcion.php";

require_once "dao_plataforma.php";

require_once "gestionbd.php";

class suscritos_dmc
{

    public function registrar_encuesta($datos)
    {

        $gbd = Gestionbd::getInstancia();
        $sql = "insert into suscrito_curso_gratis (encuesta_id,ficha_contacto_id,edad,p1_9,p1_10,p1_10_otro,p1_11,p1_12,p1_12_otro,p2_1_cibertec,p2_1_uni,p2_1_utec,p2_1_ricardo_palma,p2_1_pucp,p2_1_dmc,p2_1_social_data_consulting,p2_1_new_horizons,p2_1_bsg,p2_1_cedhinfo,p2_1_coursera,p2_1_platzi,p2_1_udemy,p2_1_netzum,p2_1_edx,p2_1_datacamp,p2_1_khan_academy,p2_1_code_academy,p2_1_ninguna,p2_1_otro,p2_1_otro_nombre,p2_2_cibertec,p2_2_uni,p2_2_utec,p2_2_ricardo_palma,p2_2_pucp,p2_2_dmc,p2_2_social_data_consulting,p2_2_new_horizons,p2_2_bsg,p2_2_cedhinfo,p2_2_coursera,p2_2_platzi,p2_2_udemy,p2_2_netzum,p2_2_edx,p2_2_datacamp,p2_2_khan_academy,p2_2_code_academy,p2_2_ninguna,p2_2_otro,p2_2_otro_nombre,p2_3,p2_3_otro_nombre,p2_4,p2_5,p2_6,p2_6_otro_nombre,p2_7_base_datos,p2_7_visualizacion_datos,p2_7_herramienta_analitica,p2_7_herramienta_cloud,p2_7_herramienta_big_data,p2_7_herramienta_machine_learning,p2_7_inteligencia_artificial,p2_7_metodologias_agiles,p2_7_ninguna,p2_7_otro,p2_7_otro_nombre) values ('',:ficha_contacto_id,:edad,:p1_9,:p1_10,:p1_10_otro,:p1_11,:p1_12,:p1_12_otro,:p2_1_cibertec,:p2_1_uni,:p2_1_utec,:p2_1_ricardo_palma,:p2_1_pucp,:p2_1_dmc,:p2_1_social_data_consulting,:p2_1_new_horizons,:p2_1_bsg,:p2_1_cedhinfo,:p2_1_coursera,:p2_1_platzi,:p2_1_udemy,:p2_1_netzum,:p2_1_edx,:p2_1_datacamp,:p2_1_khan_academy,:p2_1_code_academy,:p2_1_ninguna,:p2_1_otro,:p2_1_otro_nombre,:p2_2_cibertec,:p2_2_uni,:p2_2_utec,:p2_2_ricardo_palma,:p2_2_pucp,:p2_2_dmc,:p2_2_social_data_consulting,:p2_2_new_horizons,:p2_2_bsg,:p2_2_cedhinfo,:p2_2_coursera,:p2_2_platzi,:p2_2_udemy,:p2_2_netzum,:p2_2_edx,:p2_2_datacamp,:p2_2_khan_academy,:p2_2_code_academy,:p2_2_ninguna,:p2_2_otro,:p2_2_otro_nombre,:p2_3,:p2_3_otro_nombre,:p2_4,:p2_5,:p2_6,:p2_6_otro_nombre,:p2_7_base_datos,:p2_7_visualizacion_datos,:p2_7_herramienta_analitica,:p2_7_herramienta_cloud,:p2_7_herramienta_big_data,:p2_7_herramienta_machine_learning,:p2_7_inteligencia_artificial,:p2_7_metodologias_agiles,:p2_7_ninguna,:p2_7_otro,:p2_7_otro_nombre)";
        $cmd = $gbd->prepare($sql);
        $cmd->bindparam(':ficha_contacto_id', $datos['ficha_contacto_id']);
        $cmd->bindparam(':edad', $datos['edad']);
        $cmd->bindparam(':p1_9', $datos['p1_9']);
        $cmd->bindparam(':p1_10', $datos['sector']);
        $cmd->bindparam(':p1_10_otro', $datos['sector_otro']);
        $cmd->bindparam(':p1_11', $datos['cantidad_persona']);
        $cmd->bindparam(':p1_12', $datos['cargo']);
        $cmd->bindparam(':p1_12_otro', $datos['cargo_otro']);
        $cmd->bindparam(':p2_1_cibertec', $datos['cibertec']);
        $cmd->bindparam(':p2_1_uni', $datos['uni']);
        $cmd->bindparam(':p2_1_utec', $datos['utec']);
        $cmd->bindparam(':p2_1_ricardo_palma', $datos['ricardo_palma']);
        $cmd->bindparam(':p2_1_pucp', $datos['pucp']);
        $cmd->bindparam(':p2_1_dmc', $datos['dmc']);
        $cmd->bindparam(':p2_1_social_data_consulting', $datos['social_data_consulting']);
        $cmd->bindparam(':p2_1_new_horizons', $datos['new_horizons']);
        $cmd->bindparam(':p2_1_bsg', $datos['bsg']);
        $cmd->bindparam(':p2_1_cedhinfo', $datos['cedhinfo']);
        $cmd->bindparam(':p2_1_coursera', $datos['coursera']);
        $cmd->bindparam(':p2_1_platzi', $datos['platzi']);
        $cmd->bindparam(':p2_1_udemy', $datos['udemy']);
        $cmd->bindparam(':p2_1_netzum', $datos['netzum']);
        $cmd->bindparam(':p2_1_edx', $datos['edx']);
        $cmd->bindparam(':p2_1_datacamp', $datos['datacamp']);
        $cmd->bindparam(':p2_1_khan_academy', $datos['khan_academy']);
        $cmd->bindparam(':p2_1_code_academy', $datos['codeacademy']);
        $cmd->bindparam(':p2_1_ninguna', $datos['ninguna']);
        $cmd->bindparam(':p2_1_otro', $datos['otro_institucion']);
        $cmd->bindparam(':p2_1_otro_nombre', $datos['otro_institucion_otro']);
        $cmd->bindparam(':p2_2_cibertec', $datos['cibertec_p2']);
        $cmd->bindparam(':p2_2_uni', $datos['uni_p2']);
        $cmd->bindparam(':p2_2_utec', $datos['utec_p2']);
        $cmd->bindparam(':p2_2_ricardo_palma', $datos['ricardo_palma_p2']);
        $cmd->bindparam(':p2_2_pucp', $datos['pucp_p2']);
        $cmd->bindparam(':p2_2_dmc', $datos['dmc_p2']);
        $cmd->bindparam(':p2_2_social_data_consulting', $datos['social_data_consulting_p2']);
        $cmd->bindparam(':p2_2_new_horizons', $datos['new_horizons_p2']);
        $cmd->bindparam(':p2_2_bsg', $datos['bsg_p2']);
        $cmd->bindparam(':p2_2_cedhinfo', $datos['cedhinfo_p2']);
        $cmd->bindparam(':p2_2_coursera', $datos['coursera_p2']);
        $cmd->bindparam(':p2_2_platzi', $datos['platzi_p2']);
        $cmd->bindparam(':p2_2_udemy', $datos['udemy_p2']);
        $cmd->bindparam(':p2_2_netzum', $datos['netzum_p2']);
        $cmd->bindparam(':p2_2_edx', $datos['edx_p2']);
        $cmd->bindparam(':p2_2_datacamp', $datos['datacamp_p2']);
        $cmd->bindparam(':p2_2_khan_academy', $datos['khan_academy_p2']);
        $cmd->bindparam(':p2_2_code_academy', $datos['codeacademy_p2']);
        $cmd->bindparam(':p2_2_ninguna', $datos['ninguna_p2']);
        $cmd->bindparam(':p2_2_otro', $datos['otro_institucion_p2']);
        $cmd->bindparam(':p2_2_otro_nombre', $datos['otro_institucion_p2_otro']);
        $cmd->bindparam(':p2_3', $datos['institucion_p3']);
        $cmd->bindparam(':p2_3_otro_nombre', $datos['institucion_p3_otro']);
        $cmd->bindparam(':p2_4', $datos['p4']);
        $cmd->bindparam(':p2_5', $datos['tipo_capacitacion']);
        $cmd->bindparam(':p2_6', $datos['modalidad']);
        $cmd->bindparam(':p2_6_otro_nombre', $datos['modalidad_otro']);
        $cmd->bindparam(':p2_7_base_datos', $datos['base_datos']);
        $cmd->bindparam(':p2_7_visualizacion_datos', $datos['visualizacion_datos']);
        $cmd->bindparam(':p2_7_herramienta_analitica', $datos['r_python']);
        $cmd->bindparam(':p2_7_herramienta_cloud', $datos['cloud']);
        $cmd->bindparam(':p2_7_herramienta_big_data', $datos['big_data']);
        $cmd->bindparam(':p2_7_herramienta_machine_learning', $datos['machine_learning']);
        $cmd->bindparam(':p2_7_inteligencia_artificial', $datos['inteligencia_artificial']);
        $cmd->bindparam(':p2_7_metodologias_agiles', $datos['metodologia_agil']);
        $cmd->bindparam(':p2_7_ninguna', $datos['p7_ninguna']);
        $cmd->bindparam(':p2_7_otro', $datos['p7_otro']);
        $cmd->bindparam(':p2_7_otro_nombre', $datos['p7_otro_otro']);
        $cmd->execute();
        return $gbd->lastInsertId();
    }

    public function registrar_plataforma($datos)
    {

        $gbd = Gestionbd::getInstancia();
        $sql = "insert into suscrito_plataforma (encuesta_id,ficha_contacto_id,fec_nac,p1_1,p1_2,p1_2_otro,p1_3,p1_3_otro,p2_1,p2_1_otro,p2_2_1,p2_2_2,p2_2_3,p2_2_4
        ,p2_2_5,p2_2_6,p2_2_7,p2_2_7_otro,p2_3_1,p2_3_2,p2_3_3,p2_3_4,p2_3_5,p2_3_6,p2_3_7,p2_3_8,p2_3_8_otro,p2_4,p2_5,p2_6_1,p2_6_2,p2_6_3,p2_6_4,p2_6_5,p2_6_6,p2_6_7,p2_6_7_otro,p2_7_1,p2_7_2,p2_7_3,p2_7_4,p2_7_5,p2_7_6,p2_7_7,p2_7_8,p2_7_9,p2_7_10,p2_7_10_otro,datos) values ('',:ficha_contacto_id,:fec_nac,:p1_1,:p1_2,:p1_2_otro,:p1_3,:p1_3_otro,:p2_1,:p2_1_otro,:p2_2_1,:p2_2_2,:p2_2_3,:p2_2_4
        ,:p2_2_5,:p2_2_6,:p2_2_7,:p2_2_7_otro,:p2_3_1,:p2_3_2,:p2_3_3,:p2_3_4,:p2_3_5,:p2_3_6,:p2_3_7,:p2_3_8,:p2_3_8_otro,:p2_4,:p2_5,:p2_6_1,:p2_6_2,:p2_6_3,:p2_6_4,:p2_6_5,:p2_6_6,:p2_6_7,:p2_6_7_otro,:p2_7_1,:p2_7_2,:p2_7_3,:p2_7_4,:p2_7_5,:p2_7_6,:p2_7_7,:p2_7_8,:p2_7_9,:p2_7_10,:p2_7_10_otro,:datos)";
        $cmd = $gbd->prepare($sql);
        $cmd->bindparam(':ficha_contacto_id', $datos['ficha_contacto_id']);
        $cmd->bindparam(':fec_nac', $datos['fec_nac']);
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



    public function registrar_inscripcion($persona_id,$capacitacion)
    {

        $gbd = Gestionbd::getInstancia();
        $sql = "insert into orden_servicio (orden_servicio_id,servicio_id,servicio_tipo,usuario_servicio,cliente_servicio,orden_servicio_estado_id,fecha_registro,pago_tipo,pago_forma,orden_servicio_moneda,orden_servicio_monto_referencial,orden_servicio_monto_descuento,orden_servicio_monto_real,orden_servicio_monto_pagado,orden_servicio_flag_datos) 
        values('',:servicio,'CAPACITACION',:usuario_servicio,:cliente_servicio,1,NOW(),'personal','contado','s',0,0,0,0,1)";
        $cmd = $gbd->prepare($sql);
        $cmd->bindparam(':usuario_servicio', $persona_id);
        $cmd->bindparam(':cliente_servicio', $persona_id);
        $cmd->bindparam(':servicio', $capacitacion);
        $cmd->execute();
        return $gbd->lastInsertId();
    }

    public function cantidad_inscritos($capacitacion)
    {
        $gbd = Gestionbd::getInstancia();
        $sql = "SELECT COUNT(1) AS cantidad FROM orden_servicio WHERE servicio_id = :capacitacion limit 1";
        $cmd = $gbd->prepare($sql);
        $cmd->bindparam(':capacitacion', $capacitacion);
        $cmd->execute();
        $lista = $cmd->fetch(PDO::FETCH_ASSOC);
        return $lista["cantidad"] > 0 ? $lista["cantidad"] : 0;
    }

    public function validar_inscripcion_persona($capacitacion,$cliente_id)
    {
        $gbd = Gestionbd::getInstancia();
        $sql = "SELECT orden_servicio_id FROM orden_servicio WHERE servicio_id = :capacitacion and usuario_servicio = :cliente limit 1";
        $cmd = $gbd->prepare($sql);
        $cmd->bindparam(':capacitacion', $capacitacion);
        $cmd->bindparam(':cliente', $cliente_id);
        $cmd->execute();
        $lista = $cmd->fetch(PDO::FETCH_ASSOC);
        return $lista["orden_servicio_id"] > 0 ? 1 : 0;
    }

    public function registrar_encuesta_kayrus($datos){

        $gbd = Gestionbd::getInstancia();
        $sql = "insert into encuesta_keyrus (ENCUESTA_ID,FICHA_CONTACTO_ID,LABORANDO_ACTUALMENTE,EMPRESA,CARGO,CORREO_CORPORATIVO,CARRERA,CARRERA_OTRO,SECTOR,SECTOR_OTRO,CANTIDAD_TRABAJADORES) 
        values('',:id,:laborando,:empresa,:cargo,:correo_corporativo,:carrera,:carrera_otro,:sector,:sector_otro,:cantidad_trabajadores)";
        $cmd = $gbd->prepare($sql);
        $cmd->bindparam(':id', $datos["ficha_contacto_id"]);
        $cmd->bindparam(':laborando', $datos["estado_laboral"]);
        $cmd->bindparam(':empresa', $datos["empresa"]);
        $cmd->bindparam(':cargo', $datos["cargo"]);
        $cmd->bindparam(':correo_corporativo', $datos["correo_corporativo"]);
        $cmd->bindparam(':carrera', $datos["carrera"]);
        $cmd->bindparam(':carrera_otro', $datos["carrera_otro"]);
        $cmd->bindparam(':sector', $datos["sector"]);
        $cmd->bindparam(':sector_otro', $datos["sector_otro"]);
        $cmd->bindparam(':cantidad_trabajadores', $datos["cantidad_persona"]);
        $cmd->execute();
        return $gbd->lastInsertId();

    }

    public function registrar_proceso_encuesta_kayrus($datos){

        $suscripcion = new suscripcion();    

        $ficha_contacto_id = self::registrar_ficha_contacto($datos);

        $datos["ficha_contacto_id"] = $ficha_contacto_id;

        $id =  self::registrar_encuesta_kayrus($datos);

        $mensaje = self::mensaje_keyrus();

        $titulo = 'DMC - Keyrus | Semana BI: cursos asíncronos gratuitos';

        $suscripcion->send_mail("DMC Perú", $datos["correo"], $datos["nombres"], "", "", "", $titulo, $mensaje);

        return $id;

    }

    public function registrar_ficha_contacto($datos){

        $suscripcion = new suscripcion();

        $datos["atendido"] = 0;

        $datos["num_documento"] = null;

        $ficha_contacto_id = $suscripcion->registrar_contacto($datos);

        $suscripcion->registrar_ficha_capacitacion($ficha_contacto_id, 2520, null);

        //Registrar_persona

        $dni = $datos["num_documento"];

        $persona = $suscripcion->validar_persona_mail_dni($datos["correo"], $dni);

        $persona_id = $persona["id"];

        if ($persona === false) {

            $persona_id = $suscripcion->registrar_persona($datos);

        } elseif ($persona_id > 0 && $persona["dni"] == 0 && $dni != null) {

            $suscripcion->actualizar_dni($datos["tipo_documento"], $dni, $datos["pais"], $datos["provincia"], $id);
        
        }

        return $ficha_contacto_id;

    }

    public function registrar_plataforma_datos($datos)
    {

        $suscripcion = new suscripcion();

        $plataforma = new plataforma();

        $datos["atendido"] = 0;

        $plataforma->registrar_plataforma_espejo($datos); //Registro espejo en BD Plataforma

        $ficha_contacto_id = $suscripcion->registrar_contacto($datos);

        $suscripcion->registrar_ficha_capacitacion($ficha_contacto_id, 1287, null);

        $datos["ficha_contacto_id"] = $ficha_contacto_id;

        //Registrar_persona

        $dni = $datos["num_documento"];

        $persona = $suscripcion->validar_persona_mail_dni($datos["correo"], $dni);

        $persona_id = $persona["id"];

        if ($persona === false) {

            $persona_id = $suscripcion->registrar_persona($datos);
        } elseif ($persona_id > 0 && $persona["dni"] == 0 && $dni != null) {

            $suscripcion->actualizar_dni($datos["tipo_documento"], $dni, $datos["pais"], $datos["provincia"], $id);
        }


        //Registrar encuesta
        $encuesta_id = self::registrar_plataforma($datos);






        //validar si se inscribio

        $mensaje = self::mensaje_plataforma($datos["nombres"], $datos["correo"]);

        $titulo = '🔴¡Inicia tu prueba gratuita hoy! Plataforma Virtual DMC';

        $suscripcion->send_mail("DMC Perú", $datos["correo"], $datos["nombres"], "", "", "", $titulo, $mensaje);


        /*if ($validacion_inscripcion == 0 && $vacantes <= 160) {

            //Registrar la inscripción
            self::registrar_inscripcion($persona_id);

            $mensaje = self::mensaje_aceptacion();

            $titulo = 'Inscripción al curso "Introducción a la visualización de datos con Power BI"';

            $suscripcion->send_mail($titulo,$datos["correo"],$datos["nombres"],"","","",$titulo,$mensaje);

        }else{

            $titulo = 'Inscripción al curso "Introducción a la visualización de datos con Power BI"';

            $mensaje = self::mensaje_agotado();

            $suscripcion->send_mail($titulo,$datos["correo"],$datos["nombres"],"","","",$titulo,$mensaje);


        }*/

        //Validar si hay cupos

        return "ok";
    }

    public function registrar_concurso($datos)
    {

        $suscripcion = new suscripcion();

        $datos["atendido"] = 0;

        $ficha_contacto_id = $suscripcion->registrar_contacto($datos);

        $capacitacion = $datos["curso"];


        $suscripcion->registrar_ficha_capacitacion($ficha_contacto_id, $capacitacion, null);

        $datos["ficha_contacto_id"] = $ficha_contacto_id;

        //Registrar_persona

        $dni = $datos["num_documento"];

        $persona = $suscripcion->validar_persona_mail_dni($datos["correo"], $dni);

        $persona_id = $persona["id"];

        if ($persona === false) {

            $persona_id = $suscripcion->registrar_persona($datos);
        } elseif ($persona_id > 0 && $persona["dni"] == 0 && $dni != null) {

            $suscripcion->actualizar_dni($datos["tipo_documento"], $dni, $datos["pais"], $datos["provincia"], $id);
        }
        
        if($capacitacion!=1563){//Condición Summit

        //Registrar encuesta
        $encuesta_id = self::registrar_encuesta($datos);  
        
        //validar si se inscribio

        $validacion_inscripcion = self::validar_inscripcion_persona($capacitacion,$persona_id);

        $vacantes = self::cantidad_inscritos($capacitacion);

        $x = 0;

        if ($validacion_inscripcion == 0 && $vacantes < 300) {

            //Registrar la inscripción
            self::registrar_inscripcion($persona_id,$capacitacion);

            $x = 1;

        }

        }

        if ($capacitacion == 1480) {

            $titulo = 'Inscripción al curso "Estrategias y herramientas de visualización de datos"';

            if($x == 1){

                $mensaje = self::mensaje_aceptacion();

            }else {
                
                $mensaje = self::mensaje_agotado();

            }

        }

        if ($capacitacion == 1563) {

            $titulo = 'Ya estás participando en el sorteo del AI & Analytics Summit';

            $mensaje = self::mensaje_summit();

        }

        $suscripcion->send_mail($titulo, $datos["correo"], $datos["nombres"], "", "", "", $titulo, $mensaje);

        //$titulo = 'Curso gratuito "Introducción a la visualización de datos con Power"';
        

        $suscripcion->send_mail("DMC Perú", $datos["correo"], $datos["nombres"], "", "", "", $titulo, $mensaje);

        //Validar si hay cupos

        return "ok";
    }

    public function mensaje_keyrus(){

        $html = '<table name="bmeMainBody" style="background-color: rgb(240, 240, 240);" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#f0f0f0"><tbody><tr><td width="100%" valign="top" align="center"> <table name="bmeMainColumnParentTable" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="bmeMainColumnParent" style="border-collapse: separate; border: 0px none transparent; border-radius: 0px; border-spacing: 0px; overflow: visible;"> <table name="bmeMainColumn" class="bmeMainColumn bmeHolder" style="max-width: 600px; overflow: visible; border-radius: 0px; border-collapse: separate; border-spacing: 0px;" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr id="section_1" class="flexible-section" data-columns="1" data-section-type="bmePreHeader"><td class="blk_container bmeHolder" name="bmePreHeader" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(230, 230, 232);" width="100%" valign="top" bgcolor="#e6e6e8" align="center"></td></tr>   <tr><td class="bmeHolder" name="bmeMainContentParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px; overflow: hidden;" width="100%" valign="top" align="center"> <table name="bmeMainContent" style="border-radius: 0px; border-collapse: separate; border-spacing: 0px; border: 0px none transparent; overflow: visible;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr id="section_2" class="flexible-section" data-columns="1"><td class="blk_container bmeHolder" name="bmeHeader" style="border: 0px none transparent; background-color: rgb(255, 255, 255);" width="100%" valign="top" bgcolor="#ffffff" align="center"><div id="dv_2" class="blk_wrapper" style=""> <table class="blk" name="blk_image" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td> <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="bmeImage" style="border-collapse: collapse; padding: 0px; background-color: rgb(255, 255, 255);" align="center"><img src="https://images.benchmarkemail.com/client1381227/image13774305.jpg" class="mobile-img-large" width="600" style="max-width: 1200px; display: block; border-radius: 0px;" alt="Tomar encuesta" data-radius="0" border="0" data-original-max-width="1200"></td></tr></tbody> </table></td></tr></tbody> </table></div></td></tr> <tr id="section_3" class="flexible-section" data-columns="1"><td class="blk_container bmeHolder bmeBody" name="bmeBody" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: rgb(255, 255, 255);" width="100%" valign="top" bgcolor="#ffffff" align="center"><div id="dv_10" class="blk_wrapper" style=""> <table class="blk" name="blk_boxtext" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="bmeBoxContainer" style="padding: 0px;" align="center"> <table name="tblText" class="tblText" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td style="padding: 20px; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 14px; color: rgb(56, 56, 56); border-width: 1px; border-style: none; border-color: rgb(225, 225, 225); background-color: rgb(255, 255, 255); border-collapse: collapse; word-break: break-word;" name="tblCell" class="tblCell" valign="top" align="left"><div style="line-height: 125%;"> <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 0px; color: rgb(33, 37, 41); font-family: Arial; font-size: 16px; background-color: rgb(255, 255, 255); text-align: justify; line-height: 125%;"><span style="font-size: 12px; color: rgb(0, 0, 0); line-height: 125%;"> <em>¡Gracias por registrarte! <br> <br></em></span><span style="font-size: 12px; color: rgb(0, 0, 0); line-height: 125%;">Somos&nbsp;<strong>DMC Perú</strong>, una organización líder en el país vinculada a la analítica de datos, que se preocupa por brindarte alternativas de crecimiento en temas relacionados a la analítica. En esta ocasión, en alianza con&nbsp;<span style="line-height: 125%;"><strong>Keyrus</strong>, empresa colombiana especializada en el desarrollo de soluciones tecnológicas, compartimos contigo 8 <strong>cursos asíncronos</strong> relacionados al <strong>Business Intelligence</strong>, sin costo alguno. <br> <br></span></span><span style="font-size: 12px; color: rgb(0, 0, 0); line-height: 125%;"><span style="line-height: 125%;">Podrás acceder a videos de Data Storytelling, Tableau Storytelling, Equipos Ágiles BI y Liderazgo de Equipos BI por un plazo de </span></span><span style="color: rgb(0, 0, 0); font-size: 12px; line-height: 125%;"><span style="line-height: 125%;">3 meses. Así que aprovecha esta oportunidad y adquiere nuevos conocimientos para que potencies tu perfil profesional.</span></span></p> </div></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_6" class="blk_wrapper" style=""> <table class="blk" name="blk_button" style="background-color: rgb(255, 255, 255);" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td width="20"></td><td align="center"> <table class="tblContainer" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td height="0"></td></tr><tr><td align="center"> <table class="bmeButton" cellspacing="0" cellpadding="0" border="0" align="center" style="border-collapse: separate;"><tbody><tr><td style="border-radius: 50px; border-width: 0px; border-style: none; border-color: transparent; background-color: rgb(25, 106, 163); text-align: center; font-family: Arial, Helvetica, sans-serif; font-size: 14px; padding: 15px 25px; font-weight: bold; word-break: break-word;" class="bmeButtonText"><span style="font-family:Arial, Verdana; font-size:14px;color:#FFFFFF;"><a style="color:#FFFFFF;text-decoration:none;" target="_blank" href="https://clt1381227.benchmarkurl.com/c/l?u=F3C4E61&amp;e=1607779&amp;c=15136B&amp;t=1&amp;l=6AE75B9A&amp;email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&amp;seq=1" data-link-type="web">Accede a las capacitaciones</a></span></td></tr></tbody> </table></td></tr><tr><td height="0"></td></tr></tbody> </table></td><td width="20"></td></tr></tbody> </table></div></td></tr>   </tbody> </table></td> </tr>  <tr id="section_5" class="flexible-section" data-columns="1" data-section-type="bmeFooter"><td class="blk_container bmeHolder" name="bmeFooter" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(230, 230, 232);" width="100%" valign="top" bgcolor="#e6e6e8" align="center"><div id="dv_3" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(255, 255, 255);"><tbody><tr><td class="tblCellMain" style="padding: 15px 20px;"> <table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px none rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_4" class="blk_wrapper" style=""> <table class="blk" name="blk_social_follow" style="background-color: rgb(0, 0, 0);" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="tblCellMain" style="padding-top:15px; padding-bottom:15px; padding-left:20px; padding-right:20px;" align="center"> <table class="tblContainer mblSocialContain" style="text-align:center;" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr><td class="tdItemContainer"> <table class="mblSocialContain" style="table-layout: auto;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="bmeSocialTD" class="bmeSocialTD" valign="top"><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table class="bmeFollowItem" type="website" style="float: left; display: block;" cellspacing="0" cellpadding="0" border="0" align="left"><tbody><tr><td class="bmeFollowItemIcon" gutter="20" style="padding-right:20px;height:20px;" width="24" align="left"><a href="https://clt1381227.benchmarkurl.com/c/l?u=F3C4C27&amp;e=1607779&amp;c=15136B&amp;t=1&amp;l=6AE75B9A&amp;email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/wb_btn.png" alt="Website" style="display: block; max-width: 114px;" width="24" height="24" border="0"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table class="bmeFollowItem" type="facebook" style="float: left; display: block;" cellspacing="0" cellpadding="0" border="0" align="left"><tbody><tr><td class="bmeFollowItemIcon" gutter="20" style="padding-right:20px;height:20px;" width="24" align="left"><a href="https://clt1381227.benchmarkurl.com/c/l?u=F3C4C28&amp;e=1607779&amp;c=15136B&amp;t=1&amp;l=6AE75B9A&amp;email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/fb_btn.png" alt="Facebook" style="display: block; max-width: 114px;" width="24" height="24" border="0"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table class="bmeFollowItem" type="instagram" style="float: left; display: block;" cellspacing="0" cellpadding="0" border="0" align="left"><tbody><tr><td class="bmeFollowItemIcon" gutter="20" style="padding-right:20px;height:20px;" width="24" align="left"><a href="https://clt1381227.benchmarkurl.com/c/l?u=F3C4C29&amp;e=1607779&amp;c=15136B&amp;t=1&amp;l=6AE75B9A&amp;email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/in_btn.png" alt="Instagram" style="display: block; max-width: 114px;" width="24" height="24" border="0"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table class="bmeFollowItem" type="linkedin" style="float: left; display: block;" cellspacing="0" cellpadding="0" border="0" align="left"><tbody><tr><td class="bmeFollowItemIcon" gutter="20" style="padding-right:20px;height:20px;" width="24" align="left"><a href="https://clt1381227.benchmarkurl.com/c/l?u=F3C4C2A&amp;e=1607779&amp;c=15136B&amp;t=1&amp;l=6AE75B9A&amp;email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/li_btn.png" alt="LinkedIn" style="display: block; max-width: 114px;" width="24" height="24" border="0"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table class="bmeFollowItem" type="youtube" style="float: left; display: block;" cellspacing="0" cellpadding="0" border="0" align="left"><tbody><tr><td class="bmeFollowItemIcon" gutter="20" style="height:20px;" width="24" align="left"><a href="https://clt1381227.benchmarkurl.com/c/l?u=F3C4C2B&amp;e=1607779&amp;c=15136B&amp;t=1&amp;l=6AE75B9A&amp;email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/yt_btn.png" alt="YouTube" style="display: block; max-width: 114px;" width="24" height="24" border="0"></a></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_8" class="blk_wrapper" style=""> <table class="blk" name="blk_footer" style="background-color: rgb(240, 240, 240);" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="tblCell" class="tblCell" style="padding: 20px; word-break: break-word;" valign="top" align="left"> <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="bmeBadgeText" style="text-align: center; word-break: break-word;" align="center"><span id="spnFooterText" style="font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 11px; line-height: 140%;"><br></span> <br> <br></td></tr></tbody> </table></td></tr></tbody> </table></div></td></tr> </tbody> </table> </td></tr></tbody> </table></td></tr></tbody> </table>';
        return $html;
    }


}
