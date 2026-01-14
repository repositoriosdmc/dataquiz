<?php



require_once "gestionbd.php";

require_once  "mail/PHPMailerAutoload.php";

class menbresia_cursoGratis{

  public function registrar_plan($pais,$nombres,$apellidos,$edad,$tDocumento,$num_documento,$correo,$phone,$fecha){


      $gbd=Gestionbd::getInstancia();



      $sql="insert into ficha_contacto(FICHA_CONTACTO_PAIS,FICHA_CONTACTO_NOMBRES,FICHA_CONTACTO_APELLIDOS,FICHA_CONTACTO_EDAD,

          FICHA_CONTACTO_TIPO_DOC,FICHA_CONTACTO_NUM_DOCUMENTO,FICHA_CONTACTO_EMAIL,FICHA_CONTACTO_TELEFONO,

         FICHA_CONTACTO_TIPO_REGISTRO,FECHA_REGISTRO)

          values

       (:pais,:nombres,:apellidos,:edad,:tDocumento,:num_documento,:correo,:phone,'PLAN GRATUITO',:FECHA_REGISTRO)";



  $cmd=$gbd->prepare($sql);


  $cmd->bindparam(':pais',$pais);
  $cmd->bindparam(':nombres',$nombres);

  $cmd->bindparam(':apellidos',$apellidos);

  $cmd->bindparam(':edad',$edad);

  $cmd->bindparam(':tDocumento',$tDocumento);

  $cmd->bindparam(':num_documento',$num_documento);

  $cmd->bindparam(':correo',$correo);

  $cmd->bindparam(':phone',$phone);

  $cmd->bindparam(':FECHA_REGISTRO',$fecha);

if ($cmd->execute()) {

		return $gbd->lastInsertId();

}else {

  return "no registro";

}

  }





// menbresia



public function registrar_ficha($nombres,$apellidos,$correo,$phone){



    $gbd=Gestionbd::getInstancia();



    $sql="insert into ficha_contacto(FICHA_CONTACTO_NOMBRES,FICHA_CONTACTO_APELLIDOS,

      FICHA_CONTACTO_EMAIL,FICHA_CONTACTO_TELEFONO,
    FECHA_REGISTRO)

        values

     (:nombres,:apellidos,
     :correo,:phone,now())";


$cmd=$gbd->prepare($sql);

$cmd->bindparam(':nombres',$nombres);

$cmd->bindparam(':apellidos',$apellidos);


$cmd->bindparam(':correo',$correo);

$cmd->bindparam(':phone',$phone);


if ($cmd->execute()) {

		return $gbd->lastInsertId();

}else {

return "no registro";

}



// return $gbd->lastInsertId();

}



//---SORTEO
public function registrar_ficha_sorteo($nombres,$apellidos,$correo,$phone,$tipo_doc,$num_documento){



    $gbd=Gestionbd::getInstancia();



    $sql="insert into ficha_contacto(FICHA_CONTACTO_NOMBRES,FICHA_CONTACTO_APELLIDOS,

      FICHA_CONTACTO_EMAIL,FICHA_CONTACTO_TELEFONO,FICHA_CONTACTO_TIPO_DOC,FICHA_CONTACTO_NUM_DOCUMENTO,
    FECHA_REGISTRO)

        values

     (:nombres,:apellidos,
     :correo,:phone,
     :FICHA_CONTACTO_TIPO_DOC,:FICHA_CONTACTO_NUM_DOCUMENTO,
     now())";


$cmd=$gbd->prepare($sql);

$cmd->bindparam(':nombres',$nombres);

$cmd->bindparam(':apellidos',$apellidos);


$cmd->bindparam(':correo',$correo);

$cmd->bindparam(':phone',$phone);
$cmd->bindparam(':FICHA_CONTACTO_TIPO_DOC',$tipo_doc);
$cmd->bindparam(':FICHA_CONTACTO_NUM_DOCUMENTO',$num_documento);

if ($cmd->execute()) {

		return $gbd->lastInsertId();

}else {

return "no registro";

}



// return $gbd->lastInsertId();

}






public function registrar_codigo_ficha($id_ficha,$codigo_ficha){



    $gbd=Gestionbd::getInstancia();



    $sql="insert into ficha_contacto_capacitacion(FICHA_CONTACTO_ID,CAPACITACION_ID)

        values

     (:FICHA_CONTACTO_ID,:CAPACITACION_ID)";



$cmd=$gbd->prepare($sql);



$cmd->bindparam(':FICHA_CONTACTO_ID',$id_ficha);

$cmd->bindparam(':CAPACITACION_ID',$codigo_ficha);



if ($cmd->execute()) {

  return "ok";

}else {

return "no registro";

}

}



//





public function registrar_cursoGratis($id_ficha,$codigo_ficha){



    $gbd=Gestionbd::getInstancia();



    $sql="insert into ficha_contacto_capacitacion(FICHA_CONTACTO_ID,CAPACITACION_ID)

        values

     (:FICHA_CONTACTO_ID,:CAPACITACION_ID)";



$cmd=$gbd->prepare($sql);



$cmd->bindparam(':FICHA_CONTACTO_ID',$id_ficha);

$cmd->bindparam(':CAPACITACION_ID',$codigo_ficha);



if ($cmd->execute()) {

  return "ok";

}else {

return "no registro";

}

}

 public function mensajePlataforma(){

  $html = '<table name="bmeMainBody" style="background-color: rgb(230, 230, 232);" border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#e6e6e8"><tbody><tr><td valign="top" width="100%" align="center"> <table cellspacing="0" cellpadding="0" border="0" name="bmeMainColumnParentTable"><tbody><tr><td name="bmeMainColumnParent" style="border-collapse: separate;"> <table name="bmeMainColumn" class="bmeHolder bmeMainColumn" style="max-width: 600px; border-radius: 0px; border-collapse: separate; border-spacing: 0px; border: 0px none rgba(0, 0, 0, 0); overflow: visible;" align="center" border="0" cellpadding="0" cellspacing="0">    <tbody><tr id="section_1" class="flexible-section" data-columns="1" data-section-type="bmePreHeader"><td class="blk_container bmeHolder" name="bmePreHeader" style="color: rgb(137, 137, 137); background-color: rgb(230, 230, 232);   " align="center" valign="top" width="100%" bgcolor="#e6e6e8"><div id="dv_1" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td> <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse;padding-left:20px; padding-right: 20px;padding-top:20px; padding-bottom: 20px; "><img src="https://images.benchmarkemail.com/client1387607/image11250695.png" width="138" style="max-width: 138px; display: block; border-radius: 0px;" alt="" data-radius="0" border="0"></td></tr></tbody> </table></td></tr></tbody> </table></div></td></tr> <tr><td class="bmeHolder" align="center" valign="top" width="100%" name="bmeMainContentParent" style="border-collapse: separate; border-color: rgba(0, 0, 0, 0); border-radius: 10px; border-spacing: 0px;"> <table name="bmeMainContent" style="border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px; border-collapse: separate; border-spacing: 0px; border: 0px none transparent; overflow: hidden;" align="center" border="0" cellpadding="0" cellspacing="0" width="100%"> <tbody><tr class="flexible-section" data-columns="1" data-columns-ratio="" id="section_10"><td width="100%" class="blk_container bmeHolder bmeBody" name="bmeBody" valign="top" align="center" style="background-color: rgb(255, 255, 255);" bgcolor="#ffffff"><div id="dv_2" class="blk_wrapper" style=""> <table class="blk" name="blk_image" border="0" cellpadding="0" cellspacing="0" width="600"><tbody><tr><td> <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="bmeImage" style="padding: 0px; border-collapse: collapse; background-color: rgb(128, 128, 128);" align="center"><a href="https://clt1387607.bmetrack.com/c/l?u=CFFE5C8&amp;e=134A0D6&amp;c=152C57&amp;t=1&amp;l=6D48A063&amp;email=kJRjcW%2FiPDNRAfSWHFmD5Y9nNPuw6lIV&amp;seq=1" target="_blank"><img src="https://images.benchmarkemail.com/client1387607/image11309291.jpg" class="mobile-img-large" width="600" style="max-width: 800px; display: block; border-radius: 0px;" alt="" data-radius="0" border="0"></a></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_11" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text"><tbody><tr><td> <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><th class="tdPart" valign="top" align="center"> <table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float:left; background-color:transparent;" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 15px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="line-height: 150%;"> <div style="text-align: center;"><span style="font-size: 21px; line-height: 150%;"><strong><span style="line-height: 150%;">¡Gracias por participar!</span></strong></span></div> <div>&nbsp;</div> <div> <div><span style="font-size: 16px;">Confirmamos tu participación en el sorteo de <strong>50 membresías</strong> mensuales que se llevará a cabo el <strong>lunes 29 de noviembre</strong>. De resultar ganador del sorteo nos estaremos contactando al correo registrado para darte los accesos a nuestra <strong>Plataforma Virtual DMC.</strong></span></div> </div> </div></td></tr></tbody> </table></th></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_25" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_button" style=""><tbody><tr><td width="20"></td><td align="center"> <table class="tblContainer" cellspacing="0" cellpadding="0" border="0" width="100%"><tbody><tr><td height="5"></td></tr><tr><td align="center"> <table cellspacing="0" cellpadding="0" border="0" class="bmeButton" align="center" style="border-collapse: separate;"><tbody><tr><td style="border-radius: 50px; border-width: 0px; border-style: none; border-color: transparent; background-color: rgb(0, 193, 213); text-align: center; font-family: Arial, Helvetica, sans-serif; font-size: 14px; padding: 10px 40px; font-weight: bold; word-break: break-word;" class="bmeButtonText"><span style="font-family:Arial, Verdana; font-size:14px;color:#FFFFFF;"><a style="color:#FFFFFF;text-decoration:none;" target="_blank" href="https://clt1387607.bmetrack.com/c/l?u=CFFE5C9&amp;e=134A0D6&amp;c=152C57&amp;t=1&amp;l=6D48A063&amp;email=kJRjcW%2FiPDNRAfSWHFmD5Y9nNPuw6lIV&amp;seq=1" data-link-type="web" draggable="false">Visitar web </a></span></td></tr></tbody> </table></td></tr><tr><td height="5"></td></tr></tbody> </table></td><td width="20"></td></tr></tbody> </table></div></td></tr><tr id="section_2" class="flexible-section" data-columns="1" style=""><td class="blk_container bmeHolder" name="bmeHeader" style="background-color: rgb(255, 255, 255);   " align="center" valign="top" width="100%" bgcolor="#ffffff"><div id="dv_17" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style=""><tbody><tr><td class="tblCellMain" style="padding-top:20px; padding-bottom:20px;padding-left:20px;padding-right:20px;"> <table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px solid rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_4" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text"><tbody><tr><td> <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><th class="tdPart" valign="top" align="center"> <table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float:left; background-color:transparent;" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 10px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="line-height: 150%;"> <div style="text-align: center;"><span style="font-size: 20px;"><strong><span>Podrás acceder a estos beneficios:</span></strong></span></div> <div style="text-align: center;"><span style="font-size: 14px;"><span><span style="line-height: 150%;">Inscríbete en cualquier Plan y obtén estos beneficios desde el primer día</span></span></span></div> </div></td></tr></tbody> </table></th></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_3" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td> <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse;padding-left:20px; padding-right: 20px;padding-top:20px; padding-bottom: 20px; "><img src="https://images.benchmarkemail.com/client1387607/image11308851.jpg" class="mobile-img-large" width="560" style="max-width: 721px; display: block; border-radius: 0px;" alt="" data-radius="0" border="0"></td></tr></tbody> </table></td></tr></tbody> </table></div></td></tr><tr class="flexible-section" data-columns="1" data-columns-ratio="" id="section_11" style=""><td width="100%" class="blk_container bmeHolder bmeBody" name="bmeBody" valign="top" align="center" style="background-color: rgb(255, 255, 255);" bgcolor="#ffffff"><div id="dv_12" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style=""><tbody><tr><td class="tblCellMain" style="padding-top:20px; padding-bottom:20px;padding-left:20px;padding-right:20px;"> <table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px solid rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_26" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text"><tbody><tr><td> <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><th class="tdPart" valign="top" align="center"> <table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float:left; background-color:transparent;" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 15px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="line-height: 150%;"> <div style="text-align: center;"><span style="font-size: 20px;"><strong><span>Conoce nuestros planes:</span></strong></span></div> <div style="text-align: center;"><span style="font-size: 14px;"><span><span>¡Elige el Plan que más te convenga y empieza a potenciar tus habilidades analíticas!</span></span></span></div> </div></td></tr></tbody> </table></th></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_24" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style=""><tbody><tr><td class="tblCellMain" style="padding: 8px 20px;"> <table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px none rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody> </table></td></tr></tbody> </table></div></td></tr><tr class="flexible-section" data-columns="3" data-columns-ratio="" id="section_6" style=""><td width="100%"> <table class="bmeHolder bmeBody" name="bmeBody" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="background-color: rgb(255, 255, 255);" bgcolor="#ffffff"><tbody><tr><td width="100%" valign="top" align="center"><div> <table class="blk_parent1" cellspacing="0" cellpadding="0" style="max-width: 600px;" width="600" align="center"><tbody><tr><th valign="top" align="center" width="33%" class="tdPart"> <table cellspacing="0" cellpadding="0" border="0" width="100%" class="blk_parent" align="left" style="float:left;"><tbody><tr><td valign="top" align="center" class="blk_container bmeColumn1" name="bmeColumn1" style=""><div id="dv_5" class="blk_wrapper" style=""> <table width="200" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td> <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 5px;"><a href="https://clt1387607.bmetrack.com/c/l?u=CFFE5CA&amp;e=134A0D6&amp;c=152C57&amp;t=1&amp;l=6D48A063&amp;email=kJRjcW%2FiPDNRAfSWHFmD5Y9nNPuw6lIV&amp;seq=1" target="_blank"><img src="https://images.benchmarkemail.com/client1387607/image11251782.jpg" class="mobile-img-large" width="190" style="max-width: 1921px; display: block; border-radius: 0px;" alt="" data-radius="0" border="0" data-original-max-width="1921"></a></td></tr></tbody> </table></td></tr></tbody> </table></div></td></tr></tbody> </table></th><th valign="top" align="center" width="33%" class="tdPart"> <table cellspacing="0" cellpadding="0" border="0" width="100%" class="blk_parent" align="left" style="float:left;"><tbody><tr><td valign="top" align="center" class="blk_container bmeColumn2" name="bmeColumn2" style=""><div id="dv_9" class="blk_wrapper" style=""> <table width="200" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td> <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 5px;"><a href="https://clt1387607.bmetrack.com/c/l?u=CFFE5CB&amp;e=134A0D6&amp;c=152C57&amp;t=1&amp;l=6D48A063&amp;email=kJRjcW%2FiPDNRAfSWHFmD5Y9nNPuw6lIV&amp;seq=1" target="_blank"><img src="https://images.benchmarkemail.com/client1387607/image11251781.jpg" class="mobile-img-large" width="190" style="max-width: 1920px; display: block; border-radius: 0px;" alt="" data-radius="0" border="0" data-original-max-width="1920"></a></td></tr></tbody> </table></td></tr></tbody> </table></div></td></tr></tbody> </table></th><th valign="top" align="center" width="33%" class="tdPart"> <table cellspacing="0" cellpadding="0" border="0" width="100%" class="blk_parent" align="left" style="float:left;"><tbody><tr><td valign="top" align="center" class="blk_container bmeColumn3" name="bmeColumn3" style=""><div id="dv_10" class="blk_wrapper" style=""> <table width="200" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td> <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 5px;"><a href="https://clt1387607.bmetrack.com/c/l?u=CFFE5CC&amp;e=134A0D6&amp;c=152C57&amp;t=1&amp;l=6D48A063&amp;email=kJRjcW%2FiPDNRAfSWHFmD5Y9nNPuw6lIV&amp;seq=1" target="_blank"><img src="https://images.benchmarkemail.com/client1387607/image11251688.jpg" class="mobile-img-large" width="190" style="max-width: 1920px; display: block; border-radius: 0px;" alt="" data-radius="0" border="0" data-original-max-width="1920"></a></td></tr></tbody> </table></td></tr></tbody> </table></div></td></tr></tbody> </table></th></tr></tbody> </table></div></td></tr></tbody> </table></td></tr><tr class="flexible-section" data-columns="3" data-columns-ratio="" id="section_8" style=""><td width="100%"> <table class="bmeHolder bmeBody" name="bmeBody" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="background-color: rgb(255, 255, 255);" bgcolor="#ffffff"><tbody><tr><td width="100%" valign="top" align="center"><div> <table class="blk_parent1" cellspacing="0" cellpadding="0" style="max-width: 600px;" width="600" align="center"><tbody><tr><th valign="top" align="center" width="33%" class="tdPart"> <table cellspacing="0" cellpadding="0" border="0" width="100%" class="blk_parent" align="left" style="float:left;"><tbody><tr><td valign="top" align="center" class="blk_container bmeColumn1" name="bmeColumn1" style=""></td></tr></tbody> </table></th><th valign="top" align="center" width="33%" class="tdPart"> <table cellspacing="0" cellpadding="0" border="0" width="100%" class="blk_parent" align="left" style="float:left;"><tbody><tr><td valign="top" align="center" class="blk_container bmeColumn2" name="bmeColumn2" style=""><div id="dv_27" class="blk_wrapper" style=""> <table width="200" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td> <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 10px 5px;"><a href="https://clt1387607.bmetrack.com/c/l?u=CFFE5CD&amp;e=134A0D6&amp;c=152C57&amp;t=1&amp;l=6D48A063&amp;email=kJRjcW%2FiPDNRAfSWHFmD5Y9nNPuw6lIV&amp;seq=1" target="_blank" draggable="false"><img src="https://images.benchmarkemail.com/client1387607/image11251783.jpg" class="mobile-img-large" width="190" style="max-width: 1920px; display: block; border-radius: 0px;" alt="" data-radius="0" border="0" data-original-max-width="1920"></a></td></tr></tbody> </table></td></tr></tbody> </table></div></td></tr></tbody> </table></th><th valign="top" align="center" width="33%" class="tdPart"> <table cellspacing="0" cellpadding="0" border="0" width="100%" class="blk_parent" align="left" style="float:left;"><tbody><tr><td valign="top" align="center" class="blk_container bmeColumn3" name="bmeColumn3" style=""></td></tr></tbody> </table></th></tr></tbody> </table></div></td></tr></tbody> </table></td></tr>  <tr id="section_4" class="flexible-section" data-columns="1"><td class="blk_container bmeHolder" name="bmePreFooter" style="background-color: rgb(255, 255, 255);   " align="center" valign="top" width="100%" bgcolor="#ffffff"><div id="dv_30" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style=""><tbody><tr><td class="tblCellMain" style="padding-top:20px; padding-bottom:20px;padding-left:20px;padding-right:20px;"> <table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px none rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_28" class="blk_wrapper" style=""> <table class="blk" name="blk_divider" style="background-color: rgb(38, 57, 78);" border="0" cellpadding="0" cellspacing="0" width="600"><tbody><tr><td class="tblCellMain" style="padding: 5px 20px;"> <table class="tblLine" style="border-top: 1px none rgb(225, 225, 225); min-width: 1px;" border="0" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td><span></span></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_29" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text"><tbody><tr><td> <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><th class="tdPart" valign="top" align="center" style="background-color: rgb(38, 57, 78);"> <table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float: left; background-color: rgb(38, 57, 78);" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 15px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="line-height: 150%; text-align: center;"><span style="font-size: 16px; line-height: 150%; color: #ffffff;"><strong>¡Gracias por elegirnos!</strong></span></div></td></tr></tbody> </table></th></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_14" class="blk_wrapper" style=""> <table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text"><tbody><tr><td> <table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><th class="tdPart" valign="top" align="center" style="background-color: rgb(38, 57, 78);"> <table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float: left; background-color: rgb(38, 57, 78);" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 10px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="line-height: 150%; text-align: center;"><span style="font-size: 12px; line-height: 150%; color: #ffffff;">Síguenos en nuestras redes sociales</span></div></td></tr></tbody> </table></th></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_7" class="blk_wrapper" style=""> <table style="background-color: rgb(38, 57, 78);" name="blk_social_follow" class="blk" border="0" cellpadding="0" cellspacing="0" width="600"><tbody><tr><td class="tblCellMain" align="center" style="padding-top:5px; padding-bottom:5px; padding-left:20px; padding-right:20px;"> <table class="tblContainer mblSocialContain" cellspacing="0" cellpadding="0" border="0" align="center" style="text-align:center;"><tbody><tr><td class="tdItemContainer"> <table cellspacing="0" cellpadding="0" border="0" class="mblSocialContain" style="table-layout: auto;"><tbody><tr><td valign="top" name="bmeSocialTD" class="bmeSocialTD"><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="facebook" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="15" width="24" style="padding-right:15px;height:55px;"><a href="https://clt1387607.bmetrack.com/c/l?u=CFFE5D0&amp;e=134A0D6&amp;c=152C57&amp;t=1&amp;l=6D48A063&amp;email=kJRjcW%2FiPDNRAfSWHFmD5Y9nNPuw6lIV&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 193, 213);border-radius: 4px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/fb_btn.png" alt="Facebook" style="display: block; max-width: 114px;" border="0" width="57" height="57"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="instagram" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="15" width="24" style="padding-right:15px;height:55px;"><a href="https://clt1387607.bmetrack.com/c/l?u=CFFE5D1&amp;e=134A0D6&amp;c=152C57&amp;t=1&amp;l=6D48A063&amp;email=kJRjcW%2FiPDNRAfSWHFmD5Y9nNPuw6lIV&amp;seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 193, 213);border-radius: 4px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/in_btn.png" alt="Instagram" style="display: block; max-width: 114px;" border="0" width="57" height="57"></a></td></tr></tbody> </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--> <table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="website" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="15" width="24" style="height:55px;"><a href="https://clt1387607.bmetrack.com/c/l?u=CFFE5C9&amp;e=134A0D6&amp;c=152C57&amp;t=1&amp;l=6D48A063&amp;email=kJRjcW%2FiPDNRAfSWHFmD5Y9nNPuw6lIV&amp;seq=2" target="_blank" style="display: inline-block;background-color: rgb(0, 193, 213);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);"><img src="https://ui.benchmarkemail.com/images/editor/socialicons/wb_btn.png" alt="Website" style="display: block; max-width: 114px;" border="0" width="57" height="57"></a></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table></div><div id="dv_15" class="blk_wrapper" style=""> <table class="blk" name="blk_divider" style="background-color: rgb(38, 57, 78);" border="0" cellpadding="0" cellspacing="0" width="600"><tbody><tr><td class="tblCellMain" style="padding: 20px;"> <table class="tblLine" style="border-top: 1px solid rgb(225, 225, 225); min-width: 1px;" border="0" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td><span></span></td></tr></tbody> </table></td></tr></tbody> </table></div></td></tr> </tbody> </table> </td></tr>   </tbody> </table></td></tr></tbody> </table></td></tr></tbody> </table>';

  return $html;

 }







//

}
