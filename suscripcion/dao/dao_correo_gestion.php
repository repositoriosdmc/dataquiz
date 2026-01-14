<?php

require_once "gestionbd.php";

class correoGestion{


    public function consulta_inicio($codigo,$inicio,$vendedor)
    {
    
    try {
        $gbd=Gestionbd::getInstancia();
    
        $sql = "WITH select_leads AS (
            SELECT
                leads.*
                #,se.SEGMENTO
                ,hr.ejecutivo
                ,hr.id
                ,hr.id_contacto
                ,hr.num_doc
                ,hr.capacitacion_id AS capacitacion_id_hr
                ,hr.correo_registro
                ,hr.whatsapp
                ,hr.correo
                ,hr.llamada
                ,hr.estado
                ,hr.fecha
                ,hr.tipo_registro
                ,hr.tabla
                ,IFNULL(hr.ejecutivo,IFNULL(asesores_activos.ID_VENDEDOR,asesores_inactivos.ID_VENDEDOR)) asesor
                ,IFNULL(asesores_activos.ID_VENDEDOR,asesores_inactivos.ID_VENDEDOR) ID_ASESOR
            #     ,u.USUARIO_NOMBRE
                ,IFNULL(hr.observaciones, ' ') obs
            FROM
            (
                SELECT
                    c.CAPACITACION_ID
                    ,cb.CAPACITACION_BASE_ID
                    ,cb.CAPACITACION_BASE_TIPO
                    ,cb.capacitacion_base_nombre capacitacion
                    ,DATE(c.CAPACITACION_FECHA_INICIO) CAPACITACION_FECHA_INICIO
                    ,CONCAT(c.CAPACITACION_NOMBRE,' / ',DATE(c.CAPACITACION_FECHA_INICIO)) INICIO
                    ,CONCAT(IFNULL(fc.ficha_contacto_nombres,''),' ',IFNULL(fc.FICHA_CONTACTO_APELLIDOS, '')) nombre_completos
                    ,fc.FICHA_CONTACTO_NUM_DOCUMENTO numero_documento
                    ,fc.ficha_contacto_email FICHA_CONTACTO_EMAIL
                    ,fc.ficha_contacto_telefono FICHA_CONTACTO_TELEFONO
                    ,fc.FECHA_REGISTRO fecha_registro
                    ,fc.FICHA_CONTACTO_ID
                    ,fc.FICHA_CONTACTO_TIPO_REGISTRO
                    ,fc.FICHA_CONTACTO_ESTADO
                    ,IFNULL((ROW_NUMBER() OVER (PARTITION BY fcc.CAPACITACION_ID ORDER BY fc.FECHA_REGISTRO) - 1) % cantidad_asesores_activos.NRO_AXC + 1
                    ,(ROW_NUMBER() OVER (PARTITION BY fcc.CAPACITACION_ID ORDER BY fc.FECHA_REGISTRO) - 1) % cantidad_asesores_inactivos.NRO_AXC + 1) orden_asesor
                FROM ficha_contacto fc
                INNER JOIN ficha_contacto_capacitacion fcc ON fc.FICHA_CONTACTO_ID = fcc.FICHA_CONTACTO_ID
                INNER JOIN capacitacion c ON fcc.CAPACITACION_ID = c.CAPACITACION_ID
                INNER JOIN capacitacion_base cb ON c.CAPACITACION_BASE_ID = cb.CAPACITACION_BASE_ID AND cb.CAPACITACION_BASE_ID = $codigo
                LEFT JOIN
                (
                    SELECT
                        ta.CAPACITACION_ID
                        ,COUNT(ta.CAPACITACION_ID) NRO_AXC
                    FROM TB_ASIGNACION_ASESORES ta
                    WHERE ta.FECHA_INICIO_GESTION <= CURDATE()
                    AND ta.FECHA_FIN_GESTION >= CURDATE()
                    GROUP BY ta.CAPACITACION_ID
                    UNION ALL
                    SELECT
                        c.CAPACITACION_ID
                        ,1 NRO_AXC
                    FROM capacitacion c
                    LEFT JOIN TB_ASIGNACION_ASESORES ta ON ta.CAPACITACION_ID=c.CAPACITACION_ID
                    WHERE ta.CAPACITACION_ID IS NULL
                ) cantidad_asesores_activos ON cantidad_asesores_activos.CAPACITACION_ID= c.CAPACITACION_ID
                LEFT JOIN
                (
                    SELECT
                        ta.CAPACITACION_ID
                        ,COUNT(ta.CAPACITACION_ID) NRO_AXC
                    FROM TB_ASIGNACION_ASESORES ta
                    WHERE ta.FECHA_INICIO_GESTION <= CURDATE()
                    AND ta.FECHA_FIN_GESTION <= CURDATE()
                    GROUP BY ta.CAPACITACION_ID
                ) cantidad_asesores_inactivos on cantidad_asesores_inactivos.CAPACITACION_ID =  c.CAPACITACION_ID
                LEFT JOIN
                (
                    SELECT
                        p.PERSONA_NUMERO_DOCUMENTO DOCUMENTO
                    FROM orden_servicio os
                    INNER JOIN capacitacion c ON os.SERVICIO_ID=c.CAPACITACION_ID
                    INNER JOIN capacitacion_base cb ON c.CAPACITACION_BASE_ID=cb.CAPACITACION_BASE_ID
                    INNER JOIN persona p ON os.USUARIO_SERVICIO=p.PERSONA_ID
                    LEFT JOIN orden_servicio_baja osb ON os.ORDEN_SERVICIO_ID= osb.ORDEN_SERVICIO_ID
                    WHERE osb.ORDEN_SERVICIO_ID IS NULL
                    AND cb.CAPACITACION_BASE_TIPO IN ('PLANES ANUALES','MEMBRESÍAS DATAPRO')
                    AND IFNULL(os.PLAN_FECHA_FIN, DATE(os.FECHA_REGISTRO + INTERVAL 364 DAY))>NOW()
                ) planes_dni ON planes_dni.DOCUMENTO=fc.FICHA_CONTACTO_NUM_DOCUMENTO
                LEFT JOIN
                (
                    SELECT
                        p.PERSONA_EMAIL EMAIL
                    FROM orden_servicio os
                    INNER JOIN capacitacion c ON os.SERVICIO_ID=c.CAPACITACION_ID
                    INNER JOIN capacitacion_base cb ON c.CAPACITACION_BASE_ID=cb.CAPACITACION_BASE_ID
                    INNER JOIN persona p ON os.USUARIO_SERVICIO=p.PERSONA_ID
                    LEFT JOIN orden_servicio_baja osb ON os.ORDEN_SERVICIO_ID= osb.ORDEN_SERVICIO_ID
                    WHERE osb.ORDEN_SERVICIO_ID IS NULL
                    AND cb.CAPACITACION_BASE_TIPO IN ('PLANES ANUALES','MEMBRESÍAS DATAPRO')
                    AND IFNULL(os.PLAN_FECHA_FIN, DATE(os.FECHA_REGISTRO + INTERVAL 364 DAY))>NOW()
                ) planes_email ON planes_email.EMAIL=fc.FICHA_CONTACTO_EMAIL
                WHERE c.CAPACITACION_FECHA_INICIO >= DATE(NOW())- INTERVAL 180 DAY
                AND NOT (fc.FICHA_CONTACTO_EMAIL LIKE '%dmc.pe%' OR fc.FICHA_CONTACTO_EMAIL LIKE '%dataminingperu.com%')
                AND NOT c.CAPACITACION_ID=2719
                AND planes_dni.DOCUMENTO IS NULL
                AND planes_email.EMAIL IS NULL
                AND fc.FICHA_CONTACTO_EMAIL != ''
                GROUP BY c.CAPACITACION_ID,fc.FICHA_CONTACTO_EMAIL
            ) leads
            LEFT JOIN BD_DWH.TB_SEGMENTO se ON se.EMAIL = leads.ficha_contacto_email
            LEFT JOIN historial_registros hr on hr.id_contacto = leads.FICHA_CONTACTO_ID AND hr.tipo_registro = 'Consultas Directas'
            LEFT JOIN
            (
                SELECT
                    ta.CAPACITACION_ID
                    ,ta.ID_VENDEDOR
                    ,ROW_NUMBER() OVER (PARTITION BY ta.CAPACITACION_ID) orden_asesor
                FROM
                    TB_ASIGNACION_ASESORES ta
                WHERE ta.FECHA_INICIO_GESTION <= CURDATE()
                AND ta.FECHA_FIN_GESTION >= CURDATE()
                UNION ALL
                SELECT
                    c.CAPACITACION_ID
                    ,c.VENDEDOR_ID
                    ,1 orden_asesor
                FROM capacitacion c
                LEFT JOIN TB_ASIGNACION_ASESORES ta ON ta.CAPACITACION_ID=c.CAPACITACION_ID
                WHERE ta.CAPACITACION_ID IS NULL
            ) asesores_activos ON asesores_activos.orden_asesor = leads.orden_asesor AND asesores_activos.CAPACITACION_ID = leads.CAPACITACION_ID
            LEFT JOIN
            (
                SELECT
                    ta.CAPACITACION_ID
                    ,ta.ID_VENDEDOR
                    ,ROW_NUMBER() OVER (PARTITION BY ta.CAPACITACION_ID) orden_asesor
                FROM
                    TB_ASIGNACION_ASESORES ta
                WHERE ta.FECHA_INICIO_GESTION <= CURDATE()
                AND ta.FECHA_FIN_GESTION <= CURDATE()
                GROUP BY ta.CAPACITACION_ID,ta.ID_VENDEDOR
            ) asesores_inactivos ON asesores_inactivos.orden_asesor = leads.orden_asesor AND asesores_inactivos.CAPACITACION_ID = leads.CAPACITACION_ID
            LEFT JOIN usuario u ON u.USUARIO_ID = IFNULL(asesores_activos.ID_VENDEDOR,asesores_inactivos.ID_VENDEDOR)
            WHERE leads.CAPACITACION_BASE_ID IN ($codigo)
            )
            SELECT
                l.*
                ,u.USUARIO_NOMBRE
                ,fecha_historial.detalle_no_venta
                ,fecha_historial.fecha ultimo_registro
            FROM select_leads AS l
            LEFT JOIN
            (
                SELECT
                    hr.id_contacto
                    ,rh.detalle_no_venta
                    ,DATE_FORMAT(MAX(rh.fecha), '%Y-%m-%d %T') fecha
                FROM historial_registros hr
                INNER JOIN registro_historico rh ON hr.id_contacto = rh.id_contacto
                WHERE hr.id_contacto IN (SELECT FICHA_CONTACTO_ID FROM select_leads)
                AND hr.tipo_registro = 'Consultas Directas'
                GROUP BY hr.id_contacto
            ) fecha_historial on fecha_historial.id_contacto = l.FICHA_CONTACTO_ID
            LEFT JOIN usuario u ON u.USUARIO_ID = l.asesor
            WHERE l.FICHA_CONTACTO_ESTADO = '0'
            and (l.estado is null)
            and  l.CAPACITACION_ID = $inicio
            and l.ID_ASESOR = $vendedor
            ORDER BY l.fecha_registro DESC;";
    
    
            $cmd=$gbd->prepare($sql);
    
            $cmd->execute();
    
            $lista=$cmd->fetchAll(PDO::FETCH_ASSOC);
    
           return $lista;
    
     }
      catch (Exception $e)
     {
        echo "ERROR: " . $e->getMessage();
    
     }
    
    
    }




    public function lita_producto()
    {
    
    try {
        $gbd=Gestionbd::getInstancia();
    
        $sql = "SELECT
        taa.*,u.USUARIO_NOMBRE,cb.CAPACITACION_BASE_NOMBRE,c.CAPACITACION_NOMBRE,c.CAPACITACION_FECHA_INICIO
        ,cb.CAPACITACION_BASE_ID
         from TB_ASIGNACION_ASESORES taa
         left join capacitacion c on taa.CAPACITACION_ID = c.CAPACITACION_ID
         left join capacitacion_base cb on cb.CAPACITACION_BASE_ID = c.CAPACITACION_BASE_ID
         left join usuario u on u.USUARIO_ID =  taa.ID_VENDEDOR
         where 
         c.CAPACITACION_FECHA_INICIO > DATE_SUB(now(), INTERVAL 1 MONTH)
         AND NOT cb.CAPACITACION_BASE_TIPO IN ('MEMBRESÍAS DATAPRO','PLANES ANUALES','CURSO GRATUITO','TALLER ONLINE','IN-HOUSE','INVESTIGACIÓN',
         'ANALYTICS','SUBSIDIO ESSALUD','PLATAFORMA DMC','MEMBRESÍA - PLATAFORMA','PACK - PLATAFORMA','CURSO - PLATAFORMA',
         'CAMPAÑA - PLATAFORMA')
          AND c.CAPACITACION_PRECIO_BASE > 0
		  AND CAPACITACION_BASE_ESTADO = 1
          
        --  and cb.CAPACITACION_BASE_ID = 1390
      --   and taa.CAPACITACION_ID in (3036,3058)
         order by ID DESC";
    
    
            $cmd=$gbd->prepare($sql);
    
            $cmd->execute();
    
            $lista=$cmd->fetchAll(PDO::FETCH_ASSOC);
    
           return $lista;
    
     }
      catch (Exception $e)
     {
        echo "ERROR: " . $e->getMessage();
    
     }
    
    
    }



    

}