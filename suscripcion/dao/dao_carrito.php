<?
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once  "gestionbd_dmc.php";

require_once  "gestionbd.php";

require_once "dao_mail.php";


$request = file_get_contents('php://input');


function lista_pagos(){

    $gbd=GestionbdDMC::getInstancia();
    $sql="SELECT cl.*,0 as flag_comercial, p.post_id, p.curso,clp.product_net_revenue AS total, p.fecha_inicio, p.sku FROM ( SELECT p.id, MAX(IF(mt.meta_key = '_billing_first_name', mt.meta_value, '')) AS nombres, MAX(IF(mt.meta_key = '_billing_last_name', mt.meta_value, '')) AS apellidos, MAX(IF(mt.meta_key = '_billing_email', mt.meta_value, '')) AS mail, MAX(IF(mt.meta_key = '_billing_phone', mt.meta_value, '')) AS celular, MAX(IF(mt.meta_key = '_billing_dni', mt.meta_value, '')) AS dni, MAX(IF(mt.meta_key = '_order_currency', mt.meta_value, '')) AS moneda, MAX(IF(mt.meta_key = '_order_total', mt.meta_value, '')) AS total_total, MAX(IF(mt.meta_key = '_payment_method_title', mt.meta_value, '')) AS modo_pago, MAX(IF(mt.meta_key = '_paid_date', SUBTIME(mt.meta_value, '05:00:00'), '')) AS fecha_pago, MAX(IF(mt.meta_key = '_billing_company', mt.meta_value, '')) AS empresa, MAX(IF(mt.meta_key = '_billing_country', mt.meta_value, '')) AS pais FROM wp_wc_order_stats wpo INNER JOIN wp_posts p ON p.ID = wpo.order_id INNER JOIN wp_postmeta mt ON p.ID = mt.post_id WHERE p.post_type = 'shop_order' AND wpo.status IN ('wc-processing') AND wpo.flag_comercial = 0 AND mt.meta_key IN ('_billing_first_name', '_billing_last_name', '_billing_email', '_billing_phone','_billing_dni','_order_currency', '_order_total', '_payment_method_title', '_paid_date', '_billing_company', '_billing_country') GROUP BY post_id ) cl INNER JOIN wp_wc_order_product_lookup clp ON cl.id = clp.order_id INNER JOIN (SELECT post_id, MAX(IF(meta_key = '_wp_old_slug', meta_value, '')) AS curso, MAX(IF(meta_key = 'fecha_de_inicio', meta_value, '')) AS fecha_inicio, MAX(IF(meta_key = '_sku', meta_value, '')) AS sku FROM wp_postmeta WHERE meta_key IN ('_wp_old_slug', 'fecha_de_inicio', '_sku') GROUP BY post_id) p ON clp.product_id = p.post_id";
    $cmd=$gbd->prepare($sql);
    $cmd->execute();
    $lista=$cmd->fetchAll(PDO::FETCH_ASSOC);
    return $lista;
    
}

function lista_pago_id($id){

    $gbd=GestionbdDMC::getInstancia();
    $sql="SELECT cl.*, p.post_id, p.curso,clp.product_net_revenue AS total, p.fecha_inicio, p.sku FROM ( SELECT p.id,wpo.flag_comercial, MAX(IF(mt.meta_key = '_billing_first_name', mt.meta_value, '')) AS nombres, MAX(IF(mt.meta_key = '_billing_last_name', mt.meta_value, '')) AS apellidos, MAX(IF(mt.meta_key = '_billing_email', mt.meta_value, '')) AS mail, MAX(IF(mt.meta_key = '_billing_phone', mt.meta_value, '')) AS celular, MAX(IF(mt.meta_key = '_billing_dni', mt.meta_value, '')) AS dni, MAX(IF(mt.meta_key = '_order_currency', mt.meta_value, '')) AS moneda, MAX(IF(mt.meta_key = '_order_total', mt.meta_value, '')) AS total_total, MAX(IF(mt.meta_key = '_payment_method_title', mt.meta_value, '')) AS modo_pago, MAX(IF(mt.meta_key = '_paid_date', SUBTIME(mt.meta_value, '05:00:00'), '')) AS fecha_pago, MAX(IF(mt.meta_key = '_billing_company', mt.meta_value, '')) AS empresa, MAX(IF(mt.meta_key = '_billing_country', mt.meta_value, '')) AS pais FROM wp_wc_order_stats wpo INNER JOIN wp_posts p ON p.ID = wpo.order_id INNER JOIN wp_postmeta mt ON  p.ID = mt.post_id WHERE  p.id = :id GROUP BY post_id ) cl INNER JOIN wp_wc_order_product_lookup clp ON cl.id = clp.order_id INNER JOIN (SELECT post_id, MAX(IF(meta_key = '_wp_old_slug', meta_value, '')) AS curso, MAX(IF(meta_key = 'fecha_de_inicio', meta_value, '')) AS fecha_inicio, MAX(IF(meta_key = '_sku', meta_value, '')) AS sku FROM wp_postmeta WHERE meta_key IN ('_wp_old_slug', 'fecha_de_inicio', '_sku')  GROUP BY post_id) p ON clp.product_id = p.post_id";
    $cmd=$gbd->prepare($sql);
    $cmd->bindparam(":id",$id);
    $cmd->execute();
    $lista=$cmd->fetchAll(PDO::FETCH_ASSOC);
    return $lista;

}

function updateOrdenWoocomerce($ordenId){

    $gbd=GestionbdDMC::getInstancia();
    $sql="update wp_wc_order_stats set flag_comercial = 1 where order_id = :id";
    $cmd=$gbd->prepare($sql);
    $cmd->bindparam(":id",$ordenId);
    $cmd->execute();

}

function getCapacitacion($capacitacionBaseId,$fechaInicio){

    $gbd=Gestionbd::getInstancia();
    $sql="select c.capacitacion_id,c.capacitacion_precio_base,c.capacitacion_precio_dolar,cb.capacitacion_base_nombre,cb.capacitacion_base_tipo from capacitacion c inner join capacitacion_base cb on c.capacitacion_base_id = cb.capacitacion_base_id where c.capacitacion_base_id = :capacitacionBaseId and c.capacitacion_fecha_inicio = :fechaInicio ORDER BY IF(c.capacitacion_vacantes > c.capacitacion_matriculados,1,2) LIMIT 1";
    $cmd=$gbd->prepare($sql);
    $cmd->bindparam(":capacitacionBaseId",$capacitacionBaseId);
    $cmd->bindparam(":fechaInicio",$fechaInicio);
    $cmd->execute();
    $lista=$cmd->fetchAll(PDO::FETCH_ASSOC);
    return $lista;

}

function getCapacitacionId($capacitacionId){

    $gbd=Gestionbd::getInstancia();
    $sql="select c.capacitacion_id,c.capacitacion_precio_base,c.capacitacion_precio_dolar,cb.capacitacion_base_nombre,cb.capacitacion_base_tipo from capacitacion c inner join capacitacion_base cb on c.capacitacion_base_id = cb.capacitacion_base_id where c.capacitacion_id = :capacitacionId ";
    $cmd=$gbd->prepare($sql);
    $cmd->bindparam(":capacitacionId",$capacitacionId);
    $cmd->execute();
    $lista=$cmd->fetchAll(PDO::FETCH_ASSOC);
    return $lista;

}

function getCliente($email){

    $gbd=Gestionbd::getInstancia();
    $sql="select persona_id from persona where persona_email = :email order by persona_numero_documento desc,persona_id asc limit 1";
    $cmd=$gbd->prepare($sql);
    $cmd->bindparam(":email",$email);
    $cmd->execute();
    $lista=$cmd->fetch(PDO::FETCH_ASSOC);
    return $lista["persona_id"]; 

}

function insertCliente($nombre,$apellidos,$email,$celular){

    $gbd=Gestionbd::getInstancia();
    $sql="insert into persona (PERSONA_NOMBRE,PERSONA_APELLIDOS,PERSONA_EMAIL,PERSONA_TELEFONO1,PERSONA_TIPO_DOCUMENTO) values(:nombre,:apellidos,:email,:celular,'SD')";
    $cmd=$gbd->prepare($sql);
    $cmd->bindparam(":nombre",$nombre);
    $cmd->bindparam(":apellidos",$apellidos);
    $cmd->bindparam(":email",$email);
    $cmd->bindparam(":celular",$celular);
    $cmd->execute();
    return $gbd->lastInsertId();

}

function insertServicio($capacitacionId,$clienteId,$moneda,$montoReferencial,$montoDescuento,$montoPagado){

    $gbd=Gestionbd::getInstancia();
    $sql="insert into orden_servicio (SERVICIO_ID,SERVICIO_TIPO,USUARIO_SERVICIO,CLIENTE_SERVICIO,ORDEN_SERVICIO_ESTADO_ID,FECHA_REGISTRO,PAGO_TIPO,PAGO_FORMA,ORDEN_SERVICIO_MONEDA,ORDEN_SERVICIO_MONTO_REFERENCIAL,ORDEN_SERVICIO_MONTO_DESCUENTO,ORDEN_SERVICIO_MONTO_REAL,ORDEN_SERVICIO_MONTO_PAGADO,ORDEN_SERVICIO_FLAG_DATOS,FLG_CARRITO_COMPRAS) values (:capacitacionId,'CAPACITACION',:usuario,:cliente,2,now(),'personal','contado',:moneda,:montoReferencial,:montoDescuento,:montoReal,:montoPagado,1,1)";
    $cmd=$gbd->prepare($sql);
    $cmd->bindparam(":capacitacionId",$capacitacionId);
    $cmd->bindparam(":usuario",$clienteId);
    $cmd->bindparam(":cliente",$clienteId);
    $cmd->bindparam(":moneda",$moneda);
    $cmd->bindparam(":montoReferencial",$montoReferencial);
    $cmd->bindparam(":montoDescuento",$montoDescuento);
    $cmd->bindparam(":montoReal",$montoPagado);
    $cmd->bindparam(":montoPagado",$montoPagado);
    $cmd->execute();
    return $gbd->lastInsertId();

}

function addVacantes($capacitacion){

    $gbd=Gestionbd::getInstancia();
    $sql="update capacitacion set CAPACITACION_MATRICULADOS = CAPACITACION_MATRICULADOS+1 where CAPACITACION_ID = :capacitacionId";
    $cmd=$gbd->prepare($sql);
    $cmd->bindparam(":capacitacionId",$capacitacion);
    $cmd->execute();

}

function insertPagos($servicioId,$tipoPago,$fechaOperacion,$moneda,$total){
    $gbd=Gestionbd::getInstancia();
    $sql="insert into orden_servicio_pago (ORDEN_SERVICIO_ID,ORDEN_SERVICIO_FECHA_REGISTRO,TRANSFERENCIA_TIPO,TRANSFERENCIA_FECHA_OPERACION,COMPROBANTE_TIPO,MONEDA,MONTO_NETO,MONTO_IGV,MONTO_TOTAL,COMPROBANTE_NUMERO) values (:servicioId,now(),:tipoPago,:fechaOperacion,'recibo',:moneda,:neto,0,:total,0)";
    $cmd=$gbd->prepare($sql);
    $cmd->bindparam(":servicioId",$servicioId);
    $cmd->bindparam(":tipoPago",$tipoPago);
    $cmd->bindparam(":fechaOperacion",$fechaOperacion);
    $cmd->bindparam(":moneda",$moneda);
    $cmd->bindparam(":neto",$total);
    $cmd->bindparam(":total",$total);
    $cmd->execute();
    return $gbd->lastInsertId();

}

function mensaje($nombre,$tipo,$capacitacion){

    $textTipo = $tipo != "ESPECIALIZACIÓN" ? $tipo.": " : "" ;

    $html = '<table width="100%" cellspacing="0" cellpadding="0" border="0" name="bmeMainBody" style="background-color: rgb(240, 240, 240);" bgcolor="#f0f0f0"><tbody><tr><td width="100%" valign="top" align="center"> <table cellspacing="0" cellpadding="0" border="0" name="bmeMainColumnParentTable"><tbody><tr><td name="bmeMainColumnParent" style="border-collapse: separate; border: 0px none transparent; border-radius: 0px; border-spacing: 0px; overflow: visible;"> <table name="bmeMainColumn" class="bmeMainColumn bmeHolder" style="max-width: 600px; overflow: visible; border-radius: 0px; border-collapse: separate; border-spacing: 0px;" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr id="section_1" class="flexible-section" data-columns="1" data-section-type="bmePreHeader"><td width="100%" class="blk_container bmeHolder" name="bmePreHeader" valign="top" align="center" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(230, 230, 232);" bgcolor="#e6e6e8"><div id="dv_16" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(100, 194, 230);"><tbody><tr><td class="tblCellMain" style="padding: 2px 0px 3px;"> <table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px none rgb(228, 228, 228); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody> </table></td></tr></tbody> </table></div></td></tr>   <tr><td width="100%" class="bmeHolder" valign="top" align="center" name="bmeMainContentParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px; overflow: hidden;"> <table name="bmeMainContent" style="border-radius: 0px; border-collapse: separate; border-spacing: 0px; border: 0px none transparent; overflow: visible;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr id="section_3" class="flexible-section" data-columns="1"><td width="100%" class="blk_container bmeHolder bmeBody" name="bmeBody" valign="top" align="center" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: rgb(255, 255, 255);" bgcolor="#ffffff"><div id="dv_18" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td> <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 0px; background-color: rgb(255, 255, 255);"><img src="https://images.benchmarkemail.com/client1381227/image11487448.png" class="mobile-img-large" width="600" style="max-width: 828px; display: block; border-radius: 0px;" alt="" data-radius="0" border="0"></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_10" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_boxtext" style=""><tbody><tr><td align="center" name="bmeBoxContainer" style="padding: 0px;"> <table cellspacing="0" cellpadding="0" width="100%" name="tblText" class="tblText" border="0"><tbody><tr><td valign="top" align="left" style="padding: 20px; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 14px; color: rgb(56, 56, 56); border-width: 1px; border-style: none; border-color: rgb(225, 225, 225); background-color: rgb(255, 255, 255); border-collapse: collapse; word-break: break-word;" name="tblCell" class="tblCell"><div style="line-height: 125%;"> <div style="line-height: 125%;"><span style="font-size: 14px; line-height: 125%; color: #000000;"><strong>Hola, ';
    
    $html .= $nombre;
    
    $html .='</strong></span></div> <div style="line-height: 125%;">&nbsp;</div> <div style="line-height: 125%;"> <div style="line-height: 125%;"> <div style="text-align: justify; line-height: 125%;"> <div><span style="font-size: 12px; color: #000000;"><span>Estamos muy contentos de que hayas escogido a&nbsp;</span><strong>DMC Perú</strong><span>&nbsp;para complementar tu desarrollo profesional. ¡Te damos la bienvenida a nuestra comunidad!</span></span></div> <div>&nbsp;</div> <div style="text-align: center;"><strong><span style="font-size: 12px; color: #000000;"><span>';
    
    $html .= $textTipo.$capacitacion;
    
    $html .= '</span></span></strong></div> <div>&nbsp;</div> <div><span style="font-size: 12px; color: #000000;"><span>Antes del inicio del curso recibirás al correo electrónico proporcionado toda la información sobre las capacitaciones y los materiales necesarios para el óptimo desarrollo de las clases como el acceso al aula virtual y a nuestra plataforma e-learning, el almacenamiento de las clases grabadas y las presentaciones, lecturas y otros archivos que el docente proporcione en las sesiones.</span></span></div> <div>&nbsp;</div> <div><span style="font-size: 12px; color: #000000;"><span>Además, de ser el caso, compartiremos contigo los manuales de instalación de los programadas necesarios, así como el contacto de nuestro Soporte Técnico y Asistencia Académica para que puedan orientarte si tienes alguna duda o imprevisto.</span></span></div> <div>&nbsp;</div> <div><span style="font-size: 12px; color: #000000;"><span>¡Gracias por tu confirmar en nosotros!</span></span></div> <div><span style="font-size: 12px; color: #000000;"><span>Atentamente,</span></span></div> <div>&nbsp;</div> <div><strong><span style="font-size: 12px; color: #000000;"><span>DMC Perú</span></span></strong></div> </div> </div> </div> </div></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_6" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(255, 255, 255);"><tbody><tr><td class="tblCellMain" style="padding: 5px 20px 10px;"> <table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px solid rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody> </table></td></tr></tbody> </table></div></td></tr> <tr id="section_6" class="flexible-section" data-columns="2"><td width="100%"> <table class="bmeHolder" name="bmeBody" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: rgb(255, 255, 255);" bgcolor="#ffffff"> <tbody><tr> <td width="100%" valign="top" align="center">   <div> <table class="blk_parent1" cellspacing="0" cellpadding="0" style="max-width: 600px;" width="600" align="center"><tbody><tr><th valign="top" align="center" class="tdPart" width="50%"> <table cellspacing="0" cellpadding="0" border="0" width="100%" class="bmeHolder1" style="float:left;" align="left"><tbody><tr><td valign="top" align="center" class="blk_container bmeColumn1" name="bmeColumn1" style="color: rgb(56, 56, 56); border: 0px none transparent;" bgcolor=""></td></tr></tbody> </table></th><th valign="top" align="center" class="tdPart" width="50%"> <table cellspacing="0" cellpadding="0" border="0" width="100%" class="bmeHolder1" style="float:right;" align="right"><tbody><tr><td valign="top" align="center" class="blk_container bmeColumn2" name="bmeColumn2" style="color: rgb(56, 56, 56); border: 0px none transparent;" bgcolor=""></td></tr></tbody> </table>  </th></tr></tbody> </table></div>  </td> </tr> </tbody> </table> </td></tr> <tr id="section_4" class="flexible-section" data-columns="1"><td width="100%" class="blk_container bmeHolder" name="bmePreFooter" valign="top" align="center" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: rgb(255, 255, 255);" bgcolor="#ffffff"><div id="dv_3" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_boxtext" style=""><tbody><tr><td align="center" name="bmeBoxContainer" style="padding: 0px;"> <table cellspacing="0" cellpadding="0" width="100%" name="tblText" class="tblText" border="0"><tbody><tr><td valign="top" align="left" style="padding: 20px; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 14px; color: rgb(56, 56, 56); border-width: 1px; border-style: none; border-color: rgb(225, 225, 225); background-color: rgb(0, 0, 0); border-collapse: collapse; word-break: break-word;" name="tblCell" class="tblCell"><div style="line-height: 150%;"> <div style="text-align: center;"><span style="font-size: 14px; color: #ffffff;"><strong>¡Contáctanos!</strong></span> <br><span style="font-size: 12px; color: #ffffff;">Si tienes alguna consulta, comunícate</span></div> <div style="text-align: center;"><span style="font-size: 12px; color: #ffffff;">al correo: <span style="color: #44b9e8;"><a href="mailto:asistente.academico@dmc.pe" style="text-decoration: none; color: #44b9e8;">asistente.academico@dmc.pe</a>&nbsp;</span></span></div> </div></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_42" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(255, 255, 255);"><tbody><tr><td class="tblCellMain" style="padding: 2px 0px;"> <table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px none rgb(228, 228, 228); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody> </table></td></tr></tbody> </table></div></td></tr> </tbody> </table></td> </tr>  <tr id="section_5" class="flexible-section" data-columns="1" data-section-type="bmeFooter"><td width="100%" class="blk_container bmeHolder" name="bmeFooter" valign="top" align="center" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(230, 230, 232);" bgcolor="#e6e6e8"><div id="dv_5" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_social_follow" style="background-color: rgb(0, 0, 0);"><tbody><tr><td class="tblCellMain" align="center" style="padding-top:15px; padding-bottom:15px; padding-left:20px; padding-right:20px;"> <table class="tblContainer mblSocialContain" cellspacing="0" cellpadding="0" border="0" align="center" style="text-align:center;"><tbody><tr><td class="tdItemContainer"> <table cellspacing="0" cellpadding="0" border="0" class="mblSocialContain" style="table-layout: auto;"><tbody><tr><td valign="top" name="bmeSocialTD" class="bmeSocialTD"><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="website" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://clt1381227.bmetrack.com/c/l?u=D24D288&amp;e=137735D&amp;c=15136B&amp;t=1&amp;l=6AE75B9A&amp;email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/wb_btn.png" alt="Website" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="facebook" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://clt1381227.bmetrack.com/c/l?u=D24D289&amp;e=137735D&amp;c=15136B&amp;t=1&amp;l=6AE75B9A&amp;email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/fb_btn.png" alt="Facebook" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="instagram" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://clt1381227.bmetrack.com/c/l?u=D24D28A&amp;e=137735D&amp;c=15136B&amp;t=1&amp;l=6AE75B9A&amp;email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/in_btn.png" alt="Instagram" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="linkedin" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://clt1381227.bmetrack.com/c/l?u=D24D28B&amp;e=137735D&amp;c=15136B&amp;t=1&amp;l=6AE75B9A&amp;email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/li_btn.png" alt="LinkedIn" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="youtube" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="height:20px;"><a href="https://clt1381227.bmetrack.com/c/l?u=D24D28C&amp;e=137735D&amp;c=15136B&amp;t=1&amp;l=6AE75B9A&amp;email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/yt_btn.png" alt="YouTube" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></div></td></tr> </tbody> </table> </td></tr></tbody> </table></td></tr></tbody> </table>';

    return $html;

}


function procesoRegistro($request){

    $correo = 'marco.medrano@dataminingperu.com';

    $mensajePost = var_export($request, true);

    $req_dump = print_r($request,true);

    $json_data = file_put_contents('request.log',$req_dump);

    $action = var_export($json_data,true);

    $mail = new mail();

    $pagos = null;
    
    if($json = json_decode($request, true)){

        $data = $json;

        $mail->send_mail("Informes DMC",$correo,"DMC","","","",'Prueba POST',$mensajePost);
    
        //$mail->send_mail("Informes DMC",$correo,"DMC","","","",'Array Id',$data["billing"]["first_name"]);

        //$mail->send_mail("Informes DMC",$correo,"DMC","","","",'Array Mensaje',var_export($data,true));

    }

    

    
    $dataId = isset($data["id"]) ? $data["id"] : null;

    $dataStatus = isset($data["status"]) ? $data["id"] : null;

    if($dataId>0 && $dataStatus=="processing"){

        $pagos = lista_pago_id($dataId);

        $lista = "De uno";

    }else if ($dataStatus!="failed"){

        $pagos = lista_pagos();

        $lista = "De lista";
        
    }
    
    $mensajePagos = var_export($pagos, true);

    //$mail->send_mail("Informes DMC",$correo,"DMC","","","",'Prueba Query',$mensajePagos);

    /*$mail->send_mail("Informes DMC",$correo,"DMC","","","",'Forma de inscripción',$lista);*/



    if(count($pagos)>0){

        foreach($pagos as $detalle){

            $sku = explode("-",$detalle["sku"]);

            $fechaInicio = date("Y-m-d", strtotime($detalle["fecha_inicio"]));

            $capacitacion = getCapacitacion($sku[0],$fechaInicio);

            $correo = $detalle["mail"];

            $nombre = $detalle["nombres"];

            if(count($capacitacion)==1 && $detalle["flag_comercial"]==0){

                $clienteId = getCliente($correo);

                if($clienteId==null){

                    $clienteId = insertCliente($detalle["nombres"],$detalle["apellidos"],$detalle["mail"],$detalle["celular"]);

                }



                if($capacitacion>0 && $clienteId>0){

                    $moneda = $detalle["moneda"] == "PEN" ? "s" : "d";

                    if($moneda == "s"){

                        $montoReferencial = $capacitacion[0]["capacitacion_precio_base"];

                    }else{

                        $montoReferencial = $capacitacion[0]["capacitacion_precio_dolar"];

                    }

                    $montoTotal = $detalle["total"];

                    $montoDescuento = $montoReferencial - $montoTotal;

                    $capacitacionId = $capacitacion[0]["capacitacion_id"];

                    $orden_servicio_id = insertServicio($capacitacionId,$clienteId,$moneda,$montoReferencial,$montoDescuento,$montoTotal);

                    if($orden_servicio_id >0){

                        $pagoId = insertPagos($orden_servicio_id,$detalle["modo_pago"],$detalle["fecha_pago"],$moneda,$montoTotal);
                    
                    }

                    $mail->send_mail("Informes DMC",$correo,"DMC","","","",'Codigo de pago',$pagoId);

                    if($pagoId>0){

                        addVacantes($capacitacionId);

                        updateOrdenWoocomerce($detalle["id"]);

                        $tipo = $capacitacion[0]["capacitacion_base_tipo"];

                        $search = array(" ONLINE"," DMC");

                        $replace   = array(""); 

                        $tipo = str_replace($search, $replace, $tipo);
            
                        $nomCapacitacion = $capacitacion[0]["capacitacion_base_nombre"];

                        $mensaje = mensaje($nombre,$tipo,$nomCapacitacion);

                        $asunto = "Confirmación de inscripción - ". $nomCapacitacion; echo "ok";

                        $mail->send_mail("Informes DMC",$correo,"DMC","","","",$asunto,$mensaje);

                        $mail->send_mail("Informes DMC","asistente.academico@dmc.pe","DMC","","","",$asunto,$mensaje);

                        $mail->send_mail("Informes DMC","marco.medrano@dataminingperu.com","DMC","","","",$asunto,$mensaje);

                        //$mail->send_mail("Informes DMC","marco.medrano@dmc.pe","DMC","","","",$asunto,$mensaje);

                        //$mail->send_mail("Informes Prueba","marco.medrano@dataminingperu.com","DMC","","","",$asunto,"No enviar");

                    }

                    

                }




            }


        }


    }

    return $capacitacion[0];

}





procesoRegistro($request);

//var_dump(lista_pago_id(3418));
 

?>