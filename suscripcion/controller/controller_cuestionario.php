<?php

require_once "../dao/dao_cuestionario.php";

require_once "../dao/dao_suscripcion.php";

//
// $mensajes = new mensajes();


$mensaje = '

<!DOCTYPE html>
<html>
<head>

<title>GRATUITOS</title>
<link rel="shortcut icon" href="favicon.ico">

<meta name="googlebot" content="noindex" />
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW"/><link rel="stylesheet" href="/style/dhtmlwindow.css" type="text/css" />
<script type="text/javascript" src="/script/dhtmlwindow.js">
/***********************************************
* DHTML Window Widget- © Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use.
* Visit www.dynamicdrive.com for full source code
***********************************************/
</script>
<link rel="stylesheet" href="/style/modal.css" type="text/css" />
<script type="text/javascript" src="/script/modal.js"></script>
<script type="text/javascript">
	function show_popup(popup_name,popup_url,popup_title,width,height) {var widthpx = width +  "px";var heightpx = height +  "px";emailwindow = dhtmlmodal.open(popup_name , "iframe", popup_url , popup_title , "width=" + widthpx + ",height="+ heightpx + ",center=1,resize=0,scrolling=1");}
 function show_modal(popup_name,popup_url,popup_title,width,height){var widthpx = width +  "px";var heightpx = height +  "px";emailwindow = dhtmlmodal.open(popup_name , "iframe", popup_url , popup_title , "width=" + widthpx + ",height="+ heightpx + ",modal=1,center=1,resize=0,scrolling=1");}
var popUpWin=0;
	function popUpWindow(URLStr,PopUpName, width, height){if(popUpWin) { if(!popUpWin.closed) popUpWin.close();}var left = (screen.width - width) / 2;var top = (screen.height - height) / 2;popUpWin = open(URLStr, PopUpName,	"toolbar=0,location=0,directories=0,status=0,menub	ar=0,scrollbar=0,resizable=0,copyhistory=yes,width="+width+",height="+height+",left="+left+", 	top="+top+",screenX="+left+",screenY="+top+"");}
</script>

<meta content="width=device-width, initial-scale=1.0" name="viewport">
<style type="text/css">
/*** BMEMBF Start ***/
/* CMS V4 Editor Test */
[name=bmeMainBody]{min-height:1000px;}
@media only screen and (max-width: 480px){table.blk, table.tblText, .bmeHolder, .bmeHolder1, table.bmeMainColumn{width:100% !important;} }
@media only screen and (max-width: 480px){.bmeImageCard table.bmeCaptionTable td.tblCell{padding:0px 20px 20px 20px !important;} }
@media only screen and (max-width: 480px){.bmeImageCard table.bmeCaptionTable.bmeCaptionTableMobileTop td.tblCell{padding:20px 20px 0 20px !important;} }
@media only screen and (max-width: 480px){table.bmeCaptionTable td.tblCell{padding:10px !important;} }
@media only screen and (max-width: 480px){table.tblGtr{ padding-bottom:20px !important;} }
@media only screen and (max-width: 480px){td.blk_container, .blk_parent, .bmeLeftColumn, .bmeRightColumn, .bmeColumn1, .bmeColumn2, .bmeColumn3, .bmeBody{display:table !important;max-width:600px !important;width:100% !important;} }
@media only screen and (max-width: 480px){table.container-table, .bmeheadertext, .container-table { width: 95% !important; } }
@media only screen and (max-width: 480px){.mobile-footer, .mobile-footer a{ font-size: 13px !important; line-height: 18px !important; } .mobile-footer{ text-align: center !important; } table.share-tbl { padding-bottom: 15px; width: 100% !important; } table.share-tbl td { display: block !important; text-align: center !important; width: 100% !important; } }
@media only screen and (max-width: 480px){td.bmeShareTD, td.bmeSocialTD{width: 100% !important; } }
@media only screen and (max-width: 480px){td.tdBoxedTextBorder{width: auto !important;} }
@media only screen and (max-width: 480px){th.tdBoxedTextBorder{width: auto !important;} }

@media only screen and (max-width: 480px){table.blk, table[name=tblText], .bmeHolder, .bmeHolder1, table[name=bmeMainColumn]{width:100% !important;} }
@media only screen and (max-width: 480px){.bmeImageCard table.bmeCaptionTable td[name=tblCell]{padding:0px 20px 20px 20px !important;} }
@media only screen and (max-width: 480px){.bmeImageCard table.bmeCaptionTable.bmeCaptionTableMobileTop td[name=tblCell]{padding:20px 20px 0 20px !important;} }
@media only screen and (max-width: 480px){table.bmeCaptionTable td[name=tblCell]{padding:10px !important;} }
@media only screen and (max-width: 480px){table[name=tblGtr]{ padding-bottom:20px !important;} }
@media only screen and (max-width: 480px){td.blk_container, .blk_parent, [name=bmeLeftColumn], [name=bmeRightColumn], [name=bmeColumn1], [name=bmeColumn2], [name=bmeColumn3], [name=bmeBody]{display:table !important;max-width:600px !important;width:100% !important;} }
@media only screen and (max-width: 480px){table[class=container-table], .bmeheadertext, .container-table { width: 95% !important; } }
@media only screen and (max-width: 480px){.mobile-footer, .mobile-footer a{ font-size: 13px !important; line-height: 18px !important; } .mobile-footer{ text-align: center !important; } table[class="share-tbl"] { padding-bottom: 15px; width: 100% !important; } table[class="share-tbl"] td { display: block !important; text-align: center !important; width: 100% !important; } }
@media only screen and (max-width: 480px){td[name=bmeShareTD], td[name=bmeSocialTD]{width: 100% !important; } }
@media only screen and (max-width: 480px){td[name=tdBoxedTextBorder]{width: auto !important;} }
@media only screen and (max-width: 480px){th[name=tdBoxedTextBorder]{width: auto !important;} }

@media only screen and (max-width: 480px){.bmeImageCard table.bmeImageTable{height: auto !important; width:100% !important; padding:20px !important;clear:both; float:left !important; border-collapse: separate;} }
@media only screen and (max-width: 480px){.bmeMblInline table.bmeImageTable{height: auto !important; width:100% !important; padding:10px !important;clear:both;} }
@media only screen and (max-width: 480px){.bmeMblInline table.bmeCaptionTable{width:100% !important; clear:both;} }
@media only screen and (max-width: 480px){table.bmeImageTable{height: auto !important; width:100% !important; padding:10px !important;clear:both; } }
@media only screen and (max-width: 480px){table.bmeCaptionTable{width:100% !important;  clear:both;} }
@media only screen and (max-width: 480px){table.bmeImageContainer{width:100% !important; clear:both; float:left !important;} }
@media only screen and (max-width: 480px){table.bmeImageTable td{padding:0px !important; height: auto; } }
@media only screen and (max-width: 480px){img.mobile-img-large{width:100% !important; height:auto !important;} }
@media only screen and (max-width: 480px){img.bmeRSSImage{max-width:320px; height:auto !important;} }
@media only screen and (min-width: 640px){img.bmeRSSImage{max-width:600px !important; height:auto !important;} }
@media only screen and (max-width: 480px){.trMargin img{height:10px;} }
@media only screen and (max-width: 480px){div.bmefooter, div.bmeheader{ display:block !important;} }
@media only screen and (max-width: 480px){.tdPart{ width:100% !important; clear:both; float:left !important; } }
@media only screen and (max-width: 480px){table.blk_parent1, table.tblPart {width: 100% !important; } }
@media only screen and (max-width: 480px){.tblLine{min-width: 100% !important;} }
@media only screen and (max-width: 480px){.bmeMblCenter img { margin: 0 auto; } }
@media only screen and (max-width: 480px){.bmeMblCenter, .bmeMblCenter div, .bmeMblCenter span  { text-align: center !important; text-align: -webkit-center !important; } }
@media only screen and (max-width: 480px){.bmeNoBr br, .bmeImageGutterRow, .bmeMblStackCenter .bmeShareItem .tdMblHide { display: none !important; } }
@media only screen and (max-width: 480px){.bmeMblInline table.bmeImageTable, .bmeMblInline table.bmeCaptionTable, .bmeMblInline { clear: none !important; width:50% !important; } }
@media only screen and (max-width: 480px){.bmeMblInlineHide, .bmeShareItem .trMargin { display: none !important; } }
@media only screen and (max-width: 480px){.bmeMblInline table.bmeImageTable img, .bmeMblShareCenter.tblContainer.mblSocialContain, .bmeMblFollowCenter.tblContainer.mblSocialContain{width: 100% !important; } }
@media only screen and (max-width: 480px){.bmeMblStack> .bmeShareItem{width: 100% !important; clear: both !important;} }
@media only screen and (max-width: 480px){.bmeShareItem{padding-top: 10px !important;} }
@media only screen and (max-width: 480px){.tdPart.bmeMblStackCenter, .bmeMblStackCenter .bmeFollowItemIcon {padding:0px !important; text-align: center !important;} }
@media only screen and (max-width: 480px){.bmeMblStackCenter> .bmeShareItem{width: 100% !important;} }
@media only screen and (max-width: 480px){ td.bmeMblCenter {border: 0 none transparent !important;} }
@media only screen and (max-width: 480px){.bmeLinkTable.tdPart td{padding-left:0px !important; padding-right:0px !important; border:0px none transparent !important;padding-bottom:15px !important;height: auto !important;} }
@media only screen and (max-width: 480px){.tdMblHide{width:10px !important;} }
@media only screen and (max-width: 480px){.bmeShareItemBtn{display:table !important;} }
@media only screen and (max-width: 480px){.bmeMblStack td {text-align: left !important;} }
@media only screen and (max-width: 480px){.bmeMblStack .bmeFollowItem{clear:both !important; padding-top: 10px !important;} }
@media only screen and (max-width: 480px){.bmeMblStackCenter .bmeFollowItemText{padding-left: 5px !important;} }
@media only screen and (max-width: 480px){.bmeMblStackCenter .bmeFollowItem{clear:both !important;align-self:center; float:none !important; padding-top:10px;margin: 0 auto;} }
@media only screen and (max-width: 480px){
.tdPart> table{width:100% !important;}
}
@media only screen and (max-width: 480px){.tdPart>table.bmeLinkContainer{ width:auto !important; } }
@media only screen and (max-width: 480px){.tdPart.mblStackCenter>table.bmeLinkContainer{ width:100% !important;} }
.blk_parent:first-child, .blk_parent{float:left;}
.blk_parent:last-child{float:right;}
/*** BMEMBF END ***/

</style>
<!--[if gte mso 9]>
<xml>


96

</xml>
<![endif]-->

</head>
<body topmargin="0" leftmargin="0" style="height: 100% !important; margin: 0; padding: 0; width: 100% !important;min-width: 100%;"><img
 src="https://dmc.bmetrack.com/c/o?e=1307349&c=30209&t=1&email=i%2BCaT7R1BoIAuDtY3H6hMRAq9ju3J6BX&relid=" alt="" border="0" style="display:none;" height="1" width="1">

<table width="100%" cellspacing="0" cellpadding="0" border="0" name="bmeMainBody" style="background-color: rgb(238, 238, 238);" bgcolor="#eeeeee"><tbody><tr><td width="100%" valign="top" align="center">
<table cellspacing="0" cellpadding="0" border="0" name="bmeMainColumnParentTable"><tbody><tr><td name="bmeMainColumnParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate;">
<table name="bmeMainColumn" class="bmeHolder bmeMainColumn" style="max-width: 600px; overflow: visible; border-radius: 0px; border-collapse: separate; border-spacing: 0px;" cellspacing="0" cellpadding="0" border="0" align="center">   <tbody><tr id="section_1" class="flexible-section" data-columns="1" data-section-type="bmePreHeader"><td width="100%" class="blk_container bmeHolder" name="bmePreHeader" valign="top" align="center" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: rgb(255, 255, 255);" bgcolor="#ffffff"><div id="dv_14" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(14, 85, 114);"><tbody><tr><td class="tblCellMain" style="padding: 2px 20px;">
<table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px none rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody>
</table></td></tr></tbody>
</table></div><div id="dv_16" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td>
<table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 0px;"><img
 src="https://images.benchmarkemail.com/client197129/image11028093.jpg" class="mobile-img-large" width="600" style="max-width: 1433px; display: block; border-radius: 0px;" alt="" data-radius="0" border="0" data-original-max-width="1433"></td></tr></tbody>
</table></td></tr></tbody>
</table></div></td></tr><tr><td width="100%" class="bmeHolder" valign="top" align="center" name="bmeMainContentParent" style="border: 0px none rgb(102, 102, 102); border-radius: 0px; border-collapse: separate; border-spacing: 0px; overflow: hidden;">
<table name="bmeMainContent" style="border-radius: 0px; border-collapse: separate; border-spacing: 0px; border: 0px none transparent;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"> <tbody><tr id="section_2" class="flexible-section" data-columns="1"><td width="100%" class="blk_container bmeHolder" name="bmeHeader" valign="top" align="center" style="border: 0px none transparent; color: rgb(56, 56, 56); background-color: rgb(255, 255, 255);" bgcolor="#ffffff"><div id="dv_18" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text" style=""><tbody><tr><td>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><th valign="top" align="center" class="tdPart" style="background-color: rgb(255, 255, 255);">
<table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float: left; background-color: rgb(255, 255, 255);" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="line-height: 125%;"><span style="font-size: 18px; color: #000000; line-height: 125%;"><strong>Hola,</strong></span></div>
<div style="line-height: 125%;">&nbsp;</div>
<div style="text-align: justify; line-height: 125%;">
<div style="line-height: 125%;">
<div style="line-height: 125%;">
<div><span style="font-size: 12px; color: #000000; line-height: 125%;">¡Gracias por llenar la encuesta <strong>"Perfil del Científico de Datos"</strong>!</span>
<br><span style="font-size: 12px; color: #000000; line-height: 125%;">&nbsp;</span>
<br><span style="font-size: 12px; color: #000000; line-height: 125%;">Por tu participación en esta iniciativa podrás formar parte de la presentación de resultados que se llevará a cabo en la clausura del congreso AI & Analytics Summit 2021. Además, tendrás acceso a otras actividades gratuitas:</span></div>
<div><span style="font-size: 12px; line-height: 125%; color: #000000;">&nbsp;</span></div>
<div>
<ul style="list-style-position: inside;">

<li><span style="font-size: 12px; line-height: 125%; color: #000000;"><strong>Lunes 18 de octubre: </strong>Open Day – Entrevistas a personalidades.</span></li>

<li><span style="font-size: 12px; line-height: 125%; color: #000000;"><strong>Martes 19 de octubre:</strong> Panel transformador – Deportes.</span></li>

<li><span style="font-size: 12px; line-height: 125%; color: #000000;"><strong>Miércoles 20 de octubre: </strong>Panel transformador – Ciudad.</span></li>

<li><span style="font-size: 12px; line-height: 125%; color: #000000;"><strong>Jueves 21 de octubre:</strong> Panel transformador – Educación.</span></li>

<li><span style="font-size: 12px; line-height: 125%; color: #000000;"><strong>Viernes 22 de octubre: </strong>Panel transformador – Medios de comunicación.</span></li>
</ul>
<span style="font-size: 12px; color: #000000; line-height: 125%;">&nbsp;</span>
<br><span style="font-size: 12px; color: #000000; line-height: 125%;">Días antes del evento te enviaremos los accesos a nuestra plataforma. Recuerda que puedes comprar tu entrada al evento y tener acceso completo a todas las conferencias y workshops a cargo de profesionales de renombre de empresas líderes a nivel mundial como Microsoft, Google, LinkedIn, Apple, PayPal, FIFA, ESPN, NASA y muchas más.</span></div>
</div>
</div>
</div></td></tr></tbody>
</table></th></tr></tbody>
</table></td></tr></tbody>
</table></div>
</td></tr>  <tr id="section_3" class="flexible-section" data-columns="1"><td width="100%" class="blk_container bmeHolder bmeBody" name="bmeBody" valign="top" align="center" style="color: rgb(56, 56, 56); border: 0px none transparent;" bgcolor=""><div id="dv_11" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text" style=""><tbody><tr><td>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><th valign="top" align="center" class="tdPart" style="background-color: rgb(0, 0, 0);">
<table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float: left; background-color: rgb(0, 0, 0);" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 10px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="line-height: 150%; text-align: center;"><span style="color: #ffffff;"><strong>DETALLES GENERALES</strong></span></div></td></tr></tbody>
</table></th></tr></tbody>
</table></td></tr></tbody>
</table></div><div id="dv_25" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text" style=""><tbody><tr><td>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><th valign="top" align="center" class="tdPart" style="background-color: rgb(255, 255, 255);">
<table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float: left; background-color: rgb(255, 255, 255);" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="line-height: 150%;">
<ul style="list-style-position: inside;">

<li><span style="font-size: 12px; line-height: 150%; color: #000000;"><strong>Fechas:<span style="line-height: 150%;">&nbsp;</span></strong>lunes 18 al viernes 22 de octubre del 2021.</span></li>

<li><span style="font-size: 12px; line-height: 150%; color: #000000;"><strong>Horario:</strong><span style="line-height: 150%;"> </span>desde las 9:00 am. hasta las 10:00 pm.</span></li>

<li><span style="font-size: 12px; line-height: 150%; color: #000000;"><strong>Modalidad:</strong><span style="line-height: 150%;">&nbsp;</span>online, en vivo a través de una plataforma propia.</span></li>

<li><span style="font-size: 12px; line-height: 150%; color: #000000;"><strong>Website:<span style="line-height: 150%;">&nbsp;</span></strong>conoce todos los detalles <span style="color: #20799d;"><a href="https://dmc.bmetrack.com/c/l?u=CC9F3F9&e=1307349&c=30209&t=1&email=i%2BCaT7R1BoIAuDtY3H6hMRAq9ju3J6BX&seq=1" target="_blank" style="text-decoration: none; color: #20799d;"><strong><span style="text-decoration: underline; color: #0a6a90;">aquí</span></strong></a></span>.</span></li>

<li><span style="font-size: 12px; line-height: 150%; color: #000000;"><strong>Inversión:</strong><span style="line-height: 150%;">&nbsp;</span>US$ 80.</span></li>

<li><span style="font-size: 12px; line-height: 150%; color: #000000;"><strong>Promoción:<span style="line-height: 150%;"> </span></strong>50% de descuento hasta el 08/10 (aplica solo para personas naturales).</span></li>
</ul>
<ul style="list-style-position: inside;"></ul>
<ul style="list-style-position: inside;"></ul>
</div></td></tr></tbody>
</table></th></tr></tbody>
</table></td></tr></tbody>
</table></div><div id="dv_19" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_button" style="background-color: rgb(255, 255, 255);"><tbody><tr><td width="0"></td><td align="center">
<table class="tblContainer" cellspacing="0" cellpadding="0" border="0" width="100%"><tbody><tr><td height="0"></td></tr><tr><td align="center">
<table cellspacing="0" cellpadding="0" border="0" class="bmeButton" align="center" style="border-collapse: separate;"><tbody><tr><td style="border-radius: 50px; border-width: 0px; border-style: none; border-color: transparent; background-color: rgb(0, 0, 0); text-align: center; font-family: Arial, Helvetica, sans-serif; font-size: 14px; padding: 15px 30px; font-weight: bold;word-break: break-word;" class="bmeButtonText"><span style="font-family:Arial, Verdana; font-size:14px;color:#FFFFFF;"><a style="color:#FFFFFF;text-decoration:none;" target="_blank" draggable="false" href="https://dmc.bmetrack.com/c/l?u=CC9F3FA&e=1307349&c=30209&t=1&email=i%2BCaT7R1BoIAuDtY3H6hMRAq9ju3J6BX&seq=1" target="_blank" data-link-type="web">Ver brochure</a></span></td></tr></tbody>
</table></td></tr><tr><td height="0"></td></tr></tbody>
</table></td><td width="0"></td></tr></tbody>
</table></div><div id="dv_9" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(255, 255, 255);"><tbody><tr><td class="tblCellMain" style="padding: 10px 20px;">
<table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px none rgb(255, 255, 255); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody>
</table></td></tr></tbody>
</table></div><div id="dv_26" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(255, 255, 255);"><tbody><tr><td class="tblCellMain" style="padding: 2px 20px;">
<table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px none rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody>
</table></td></tr></tbody>
</table></div><div id="dv_24" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text" style=""><tbody><tr><td>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><th valign="top" align="center" class="tdPart" style="background-color: rgb(0, 0, 0);">
<table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float: left; background-color: rgb(0, 0, 0);" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 10px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="text-align: center;"><strong><span style="color: #ffffff;">CONFERENCIAS Y ACTIVIDADES&nbsp;</span></strong></div></td></tr></tbody>
</table></th></tr></tbody>
</table></td></tr></tbody>
</table></div><div id="dv_13" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td>
<table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 0px; background-color: rgb(255, 255, 255);"><img
 src="https://images.benchmarkemail.com/client197129/image11028230.png" class="mobile-img-large" width="600" style="max-width: 1134px; display: block; border-radius: 0px;" alt="" data-radius="0" border="0" data-original-max-width="1134"></td></tr></tbody>
</table></td></tr></tbody>
</table></div>


<div id="dv_31" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(255, 255, 255);"><tbody><tr><td class="tblCellMain" style="padding: 5px 20px;">
<table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px none rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody>
</table></td></tr></tbody>
</table></div><div id="dv_21" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text" style=""><tbody><tr><td>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><th valign="top" align="center" class="tdPart" style="background-color: rgb(0, 0, 0);">
<table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float: left; background-color: rgb(0, 0, 0);" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 10px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="text-align: center;"><strong><span style="color: #ffffff;">MÁS DE 50 PONENTES DE EMPRESAS LÍDERES GLOBALES</span></strong></div></td></tr></tbody>
</table></th></tr></tbody>
</table></td></tr></tbody>
</table></div><div id="dv_10" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td>
<table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 0px; background-color: rgb(255, 255, 255);"><a href="https://dmc.bmetrack.com/c/l?u=CC9F3FB&e=1307349&c=30209&t=1&email=i%2BCaT7R1BoIAuDtY3H6hMRAq9ju3J6BX&seq=1" target="_blank"><img
 src="https://images.benchmarkemail.com/client197129/image11128776.png" class="mobile-img-large" width="600" style="max-width: 1200px; display: block; border-radius: 0px;" alt="" data-radius="0" border="0" data-original-max-width="1200"></a></td></tr></tbody>
</table></td></tr></tbody>
</table></div><div id="dv_1" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(255, 255, 255);"><tbody><tr><td class="tblCellMain" style="padding: 2px 20px;">
<table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px dashed rgb(14, 85, 114); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody>
</table></td></tr></tbody>
</table></div><div id="dv_35" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td>
<table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 0px; background-color: rgb(255, 255, 255);"><a href="https://dmc.bmetrack.com/c/l?u=CC9F3FB&e=1307349&c=30209&t=1&email=i%2BCaT7R1BoIAuDtY3H6hMRAq9ju3J6BX&seq=2" target="_blank"><img
 src="https://images.benchmarkemail.com/client197129/image11128778.png" class="mobile-img-large" width="600" style="max-width: 1200px; display: block; border-radius: 0px;" alt="" data-radius="0" border="0" data-original-max-width="1200"></a></td></tr></tbody>
</table></td></tr></tbody>
</table></div><div id="dv_3" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text" style=""><tbody><tr><td>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><th valign="top" align="center" class="tdPart" style="background-color: rgb(0, 0, 0);">
<table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float: left; background-color: rgb(0, 0, 0);" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 10px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="text-align: center;"><strong><span style="color: #ffffff;">BENEFICIOS ADICIONALES</span></strong></div></td></tr></tbody>
</table></th></tr></tbody>
</table></td></tr></tbody>
</table></div><div id="dv_32" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td>
<table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 0px; background-color: rgb(255, 255, 255);"><img
 src="https://images.benchmarkemail.com/client197129/image11028184.png" class="mobile-img-large" width="600" style="max-width: 1134px; display: block; border-radius: 0px;" alt="" data-radius="0" border="0" data-original-max-width="1134"></td></tr></tbody>
</table></td></tr></tbody>
</table></div><div id="dv_6" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text" style=""><tbody><tr><td>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><th valign="top" align="center" class="tdPart" style="background-color: rgb(2, 68, 134);">
<table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float: left; background-color: rgb(2, 68, 134);" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 10px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="text-align: center;"><strong><span style="color: #ffffff;">CONSIGUE TU ENTRADA CON UN GRAN BENEFICIO</span></strong></div></td></tr></tbody>
</table></th></tr></tbody>
</table></td></tr></tbody>
</table></div><div id="dv_33" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(255, 255, 255);"><tbody><tr><td class="tblCellMain" style="padding: 2px 20px;">
<table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px none rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody>
</table></td></tr></tbody>
</table></div><div id="dv_8" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td>
<table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 0px; background-color: rgb(255, 255, 255);"><a href="https://dmc.bmetrack.com/c/l?u=CC9F3FC&e=1307349&c=30209&t=1&email=i%2BCaT7R1BoIAuDtY3H6hMRAq9ju3J6BX&seq=1" target="_blank"><img
 src="https://images.benchmarkemail.com/client197129/image11137383.png" class="mobile-img-large" width="600" style="max-width: 1280px; display: block; border-radius: 0px;" alt="" data-radius="0" border="0"></a></td></tr></tbody>
</table></td></tr></tbody>
</table></div><div id="dv_23" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(255, 255, 255);"><tbody><tr><td class="tblCellMain" style="padding: 10px 20px;">
<table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px none rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody>
</table></td></tr></tbody>
</table></div><div id="dv_4" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_button" style="background-color: rgb(255, 255, 255);"><tbody><tr><td width="0"></td><td align="center">
<table class="tblContainer" cellspacing="0" cellpadding="0" border="0" width="100%"><tbody><tr><td height="0"></td></tr><tr><td align="center">
<table cellspacing="0" cellpadding="0" border="0" class="bmeButton" align="center" style="border-collapse: separate;"><tbody><tr><td style="border-radius: 50px; border-width: 0px; border-style: none; border-color: transparent; background-color: rgb(2, 68, 134); text-align: center; font-family: Arial, Helvetica, sans-serif; font-size: 14px; padding: 15px 30px; font-weight: bold; word-break: break-word;" class="bmeButtonText"><span style="font-family:Arial, Verdana; font-size:14px;color:#FFFFFF;"><a style="color:#FFFFFF;text-decoration:none;" target="_blank" href="https://dmc.bmetrack.com/c/l?u=CC9F3FC&e=1307349&c=30209&t=1&email=i%2BCaT7R1BoIAuDtY3H6hMRAq9ju3J6BX&seq=2" target="_blank" data-link-type="web" draggable="false">Compra tu entrada aquí</a></span></td></tr></tbody>
</table></td></tr><tr><td height="0"></td></tr></tbody>
</table></td><td width="0"></td></tr></tbody>
</table></div><div id="dv_34" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(255, 255, 255);"><tbody><tr><td class="tblCellMain" style="padding: 5px 20px;">
<table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px none rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody>
</table></td></tr></tbody>
</table></div><div id="dv_29" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(255, 255, 255);"><tbody><tr><td class="tblCellMain" style="padding: 10px 20px;">
<table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px solid rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody>
</table></td></tr></tbody>
</table></div><div id="dv_30" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text" style=""><tbody><tr><td>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><th valign="top" align="center" class="tdPart" style="background-color: rgb(0, 0, 0);">
<table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float: left; background-color: rgb(0, 0, 0);" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 10px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="text-align: center;"><strong><span style="color: #ffffff;">AUSPICIADORES</span></strong></div></td></tr></tbody>
</table></th></tr></tbody>
</table></td></tr></tbody>
</table></div><div id="dv_5" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td>
<table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 0px; background-color: rgb(255, 255, 255);"><img
 src="https://images.benchmarkemail.com/client197129/image11150211.png" class="mobile-img-large" width="600" style="max-width: 1200px; display: block; border-radius: 0px;" alt="" data-radius="0" border="0"></td></tr></tbody>
</table></td></tr></tbody>
</table></div><div id="dv_7" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(255, 255, 255);"><tbody><tr><td class="tblCellMain" style="padding: 10px 20px;">
<table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px solid rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody>
</table></td></tr></tbody>
</table></div></td></tr> <tr id="section_6" class="flexible-section" data-columns="3"><td width="100%">
<table class="bmeHolder" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" name="bmeBody" style="color: rgb(56, 56, 56); border: 0px none transparent;" bgcolor=""> <tbody><tr> <td width="100%" valign="top" align="center">   <div>
<table class="blk_parent1" cellspacing="0" cellpadding="0" style="max-width: 600px;" width="600" align="center"><tbody><tr><th valign="top" align="center" class="tdPart" width="33%">
<table cellspacing="0" cellpadding="0" border="0" width="100%" class="blk_parent" align="left" style="float:left;"><tbody><tr><td valign="top" align="center" class="blk_container bmeColumn1" name="bmeColumn1" style="color: rgb(56, 56, 56); border: 0px none transparent;" bgcolor="">


</td></tr></tbody>
</table></th><th valign="top" align="center" class="tdPart" width="33%">
<table cellspacing="0" cellpadding="0" border="0" width="100%" class="blk_parent" align="left" style="float:left;"><tbody><tr><td valign="top" align="center" class="blk_container bmeColumn2" name="bmeColumn2" style="color: rgb(56, 56, 56); border: 0px none transparent;" bgcolor="">


</td></tr></tbody>
</table></th><th valign="top" align="center" class="tdPart" width="33%">
<table cellspacing="0" cellpadding="0" border="0" width="100%" class="blk_parent" align="left" style="float:left;"><tbody><tr><td valign="top" align="center" class="blk_container bmeColumn3" name="bmeColumn3" style="color: rgb(56, 56, 56); border: 0px none transparent;" bgcolor="">


</td></tr></tbody>
</table>   </th></tr></tbody>
</table> </div> </td> </tr></tbody>
</table> </td></tr> <tr id="section_4" class="flexible-section" data-columns="1"><td width="100%" class="blk_container bmeHolder" name="bmePreFooter" valign="top" align="center" style="color: rgb(56, 56, 56); border: 0px none transparent;" bgcolor="">
<div id="dv_27" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text" style=""><tbody><tr><td>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><th valign="top" align="center" class="tdPart" style="background-color: rgb(0, 0, 0);">
<table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float: left; background-color: rgb(0, 0, 0);" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="line-height: 150%; text-align: center;"><span style="color: #ffffff;"><strong>¡Contáctanos!</strong></span>
<br><span style="color: #ffffff; font-size: 12px;">Si tienes alguna consulta, comunícate con nuestro asesor</span>
<br><span style="font-size: 12px;"><span style="color: #ffffff;">comercial al teléfono:</span> <span style="color: #ffffff;"><span><span style="color: #20799d;"><a rel="noopener" href="https://dmc.bmetrack.com/c/l?u=CD25AB7&amp;e=131119D&amp;c=30209&amp;t=1&amp;l=13419EF6&amp;email=dCcwP8Ylq%2BDTG%2FXwPa3Jb3zBjzlZ2TJR&amp;seq=1" target="_blank" style="color: #20799d;">+51 994 227 768</a></span>&nbsp;con Luis Loo.</span></span>
<br></span></div></td></tr></tbody>
</table></th></tr></tbody>
</table></td></tr></tbody>
</table></div><div id="dv_22" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(255, 255, 255);"><tbody><tr><td class="tblCellMain" style="padding: 2px 20px;">
<table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px none rgb(255, 255, 255); min-width: 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid;"><tbody><tr><td><span></span></td></tr></tbody>
</table></td></tr></tbody>
</table></div><div id="dv_15" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_social_follow" style="background-color: rgb(0, 0, 0);"><tbody><tr><td class="tblCellMain" align="center" style="padding-top:15px; padding-bottom:15px; padding-left:20px; padding-right:20px;">
<table class="tblContainer mblSocialContain" cellspacing="0" cellpadding="0" border="0" align="center" style="text-align:center;"><tbody><tr><td class="tdItemContainer">
<table cellspacing="0" cellpadding="0" border="0" class="mblSocialContain" style="table-layout: auto;"><tbody><tr><td valign="top" name="bmeSocialTD" class="bmeSocialTD"><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->
<table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="website" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=CC9F3FE&e=1307349&c=30209&t=1&email=i%2BCaT7R1BoIAuDtY3H6hMRAq9ju3J6BX&seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);" target="_blank"><img
 src="https://ui.benchmarkemail.com/images/editor/socialicons/wb_btn.png" alt="Website" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody>
</table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->
<table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="facebook" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=CC9F3FF&e=1307349&c=30209&t=1&email=i%2BCaT7R1BoIAuDtY3H6hMRAq9ju3J6BX&seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);" target="_blank"><img
 src="https://ui.benchmarkemail.com/images/editor/socialicons/fb_btn.png" alt="Facebook" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody>
</table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->
<table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="instagram" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=CC9F400&e=1307349&c=30209&t=1&email=i%2BCaT7R1BoIAuDtY3H6hMRAq9ju3J6BX&seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);" target="_blank"><img
 src="https://ui.benchmarkemail.com/images/editor/socialicons/in_btn.png" alt="Instagram" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody>
</table>
<table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="linkedin" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://dmc.bmetrack.com/c/l?u=CC9F401&e=1307349&c=30209&t=1&email=i%2BCaT7R1BoIAuDtY3H6hMRAq9ju3J6BX&seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);" target="_blank"><img
 src="https://ui.benchmarkemail.com/images/editor/socialicons/li_btn.png" alt="LinkedIn" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody>
</table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]--><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->
<table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="youtube" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="height: 20px; padding-right: 20px;"><a href="https://dmc.bmetrack.com/c/l?u=CC9F402&e=1307349&c=30209&t=1&email=i%2BCaT7R1BoIAuDtY3H6hMRAq9ju3J6BX&seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 28px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);" target="_blank"><img
 src="https://ui.benchmarkemail.com/images/editor/socialicons/yt_btn.png" alt="YouTube" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody>
</table></td></tr></tbody>
</table></td></tr></tbody>
</table></td></tr></tbody>
</table></div><div id="dv_2" class="blk_wrapper" style="">

<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style=""><tbody><tr><td class="tblCellMain" style="padding: 10px 20px;">
<table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px none rgb(225, 225, 225); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody>
</table></td></tr></tbody>
</table></div>
</td></tr> </tbody>
</table> </td></tr><tr id="section_5" class="flexible-section" data-columns="1" data-section-type="bmeFooter"><td width="100%" class="blk_container bmeHolder" name="bmeFooter" valign="top" align="center" style="color: rgb(102, 102, 102); border: 0px none transparent;" bgcolor=""><div id="dv_20" class="blk_wrapper" style="">


</div></td></tr> </tbody>
</table> </td></tr></tbody>
</table></td></tr></tbody>
</table>
<!-- Test Path -->

</body>
</html>";



';


$suscripcion = new suscripcion();

// $suscripcion->send_mail();
  $titulo = 'AI & Analytics Summit 2021 - Actividades gratuitas';
//correo
 $result2 = $suscripcion->send_mail("DMC Perú", $_REQUEST['correo'], $_REQUEST['nombres'], "", "", "", $titulo, $mensaje);

$cuestionario = new cuestionario();

    $opcion = $_REQUEST['op'];


    $nombres = $_REQUEST['nombres'];
    $apellidos = $_REQUEST['apellidos'];
    $tDocumento = $_REQUEST['tDocumento'];
    $num_documento = $_REQUEST['numero'];
    $genero = $_REQUEST['genero'];

    $phone = $_REQUEST['phone'];
    $edad = $_REQUEST['edad'];
    $correo = $_REQUEST['correo'];
    $pais = $_REQUEST['pais'];
    $ciudad = $_REQUEST['ciudad'];

    $fecha = $_REQUEST['fecha'];

     $id_ficha = $cuestionario->registrar_cuestionario($nombres,$apellidos,$tDocumento,$num_documento,$genero,
     $phone,$edad,$correo,$pais,$ciudad,$fecha);

      $valor = $cuestionario->registrar_codigo($id_ficha,$_REQUEST['codigo']);

// detalles del cuestionario
    $frase_laboral = $_REQUEST['frase_laboral'];

    if ($_REQUEST['sector_trabajo'] == 'Otros') {
      $sector_laboral = $_REQUEST['sector_trabajo_otros'];
    }else {
      $sector_laboral = $_REQUEST['sector_trabajo'];
    }

    $cantidad_trabajadores = $_REQUEST['cantidad_trabajadores'];

    if ($_REQUEST['puesto_trabajo'] == 'Otros') {
      $puesto_trabajo = $_REQUEST['puesto_trabajo_otros'];
    }else {
      $puesto_trabajo = $_REQUEST['puesto_trabajo'];
    }
      $dominio_ingles = $_REQUEST['ingles'];
      $capacitacion = $_REQUEST['capacitacion'];

//modalidad checks
  if ($_REQUEST['modalidad_Presencial']) {
  $modalidad_presencial = $_REQUEST['modalidad_Presencial'];
}else {
  $modalidad_presencial = "0";
}

if ($_REQUEST['modalidad_vivo']) {
  $modalidad_vivo = $_REQUEST['modalidad_vivo'];
}else {
  $modalidad_vivo = '0';
}

if ($_REQUEST['modalidad_grabadoVivo']) {
      $modalidad_grabadoVivo = $_REQUEST['modalidad_grabadoVivo'];
}else {
    $modalidad_grabadoVivo  = '0';
}

  if ($_REQUEST['modalidad_grabado']) {
    $modalidad_grabado = $_REQUEST['modalidad_grabado'];
  }else {
      $modalidad_grabado = '0';
  }


    $modalidad_otros = $_REQUEST['modalidad_otros'];





// fin
  if ($_REQUEST['mod_capacitacion'] == 'Otros') {
  $mod_capacitacion = $_REQUEST['mod_capacitacion_otros'];
  }else {
  $mod_capacitacion = $_REQUEST['mod_capacitacion'];
  }

// capacitacion checks

  if ($_REQUEST['capacitacion_institutos_nacionales']) {
    $capacitacion_institutos_nacionales = $_REQUEST['capacitacion_institutos_nacionales'];
  }else {
    $capacitacion_institutos_nacionales = "0";
  }
   if ($_REQUEST['capacitacion_institutos_extranjeros']) {
     $capacitacion_institutos_extranjeros = $_REQUEST['capacitacion_institutos_extranjeros'];
   }else {
     $capacitacion_institutos_extranjeros = "0";
   }

    if ($_REQUEST['capacitacion_Unacionales']) {
      $capacitacion_Unacionales = $_REQUEST['capacitacion_Unacionales'];
    }else {
      $capacitacion_Unacionales = "0";
    }

    if ($_REQUEST['capacitacion_Uextranjeros']) {
         $capacitacion_Uextranjeros = $_REQUEST['capacitacion_Uextranjeros'];
   } else {
      $capacitacion_Uextranjeros = "0";
    }

    if ($_REQUEST['capacitacion_coursera']) {
         $capacitacion_coursera = $_REQUEST['capacitacion_coursera'];
   } else {
      $capacitacion_coursera = "0";
    }

  //
   if ($_REQUEST['capacitacion_platzi']) {
     $capacitacion_platzi = $_REQUEST['capacitacion_platzi'];
   } else {
       $capacitacion_platzi = "0";
   }


  //
   if ($_REQUEST['capacitacion_udemy']) {
     $capacitacion_udemy = $_REQUEST['capacitacion_udemy'];
   } else {
     $capacitacion_udemy = "0";
   }
  //
  if ($_REQUEST['capacitacion_netzum']) {
     $capacitacion_netzum = $_REQUEST['capacitacion_netzum'];
   } else {
     $capacitacion_netzum = "0";
   }

   if ($_REQUEST['capacitacion_edx']) {
      $capacitacion_edx = $_REQUEST['capacitacion_edx'];
   }else {
     $capacitacion_edx = "0";
   }

  if ($_REQUEST['capacitacion_datacamp']) {
    $capacitacion_datacamp = $_REQUEST['capacitacion_datacamp'];
  } else {
  $capacitacion_datacamp = "0";
  }

  if ($_REQUEST['capacitacion_khan']) {
  $capacitacion_khan = $_REQUEST['capacitacion_khan'];
  } else {
  $capacitacion_khan ="0";
  }
  if ($_REQUEST['capacitacion_Codeacademy']) {
     $capacitacion_Codeacademy = $_REQUEST['capacitacion_Codeacademy'];
  } else {
    $capacitacion_Codeacademy = "0";
  }

  if ($_REQUEST['capacitacion_Kagle']) {
      $capacitacion_Kagle = $_REQUEST['capacitacion_Kagle'];
  } else {
    $capacitacion_Kagle = "0";
  }

  if ($_REQUEST['capacitacion_Analytics_Vidhya']) {
    $capacitacion_Analytics_Vidhya = $_REQUEST['capacitacion_Analytics_Vidhya'];
  } else {
    $capacitacion_Analytics_Vidhya = "0";
  }
  if ($_REQUEST['capacitacion_autodidacta']) {
    $capacitacion_autodidacta = $_REQUEST['capacitacion_autodidacta'];
  } else {
    $capacitacion_autodidacta = "0";
  }
$capacitacion_otros = $_REQUEST['capacitacion_otros'];


//final
 $consideracion_institucion = '';

   //radios B1
   $bd = $_REQUEST['bd'];
   $vizualizacion = $_REQUEST['vizualizacion'];
   $etl = $_REQUEST['etl'];
   $programacion = $_REQUEST['programacion'];
   $analiticas = $_REQUEST['analiticas'];
   $cloud = $_REQUEST['cloud'];
   $big_data = $_REQUEST['big_data'];



   //herramientas técnologicas checks

  if ($_REQUEST['herramientas_SPSS']) {
  $herramientas_SPSS = $_REQUEST['herramientas_SPSS'];
  } else {
  $herramientas_SPSS = "0";
  }

   if ($_REQUEST['herramientas_SAS']) {
     $herramientas_SAS = $_REQUEST['herramientas_SAS'];
   } else {
     $herramientas_SAS = "0";
   }

   if ($_REQUEST['herramientas_MINITAB']) {
     $herramientas_MINITAB = $_REQUEST['herramientas_MINITAB'];
   } else {
     $herramientas_MINITAB = "0";
   }

   if ($_REQUEST['herramientas_RAPIDMINER']) {
     $herramientas_RAPIDMINER = $_REQUEST['herramientas_RAPIDMINER'];
   } else {
      $herramientas_RAPIDMINER = "0";
   }

   if ($_REQUEST['herramientas_R']) {
     $herramientas_R = $_REQUEST['herramientas_R'];
   } else {
     $herramientas_R = "0";
   }

   if ($_REQUEST['herramientas_PYTHON']) {
     $herramientas_PYTHON = $_REQUEST['herramientas_PYTHON'];
   } else {
     $herramientas_PYTHON = "0";
   }
   if ($_REQUEST['herramientas_EXCEL']) {
      $herramientas_EXCEL = $_REQUEST['herramientas_EXCEL'];
   } else {
     $herramientas_EXCEL = "0";
   }
   if ($_REQUEST['herramientas_ANACONDA']) {
     $herramientas_ANACONDA = $_REQUEST['herramientas_ANACONDA'];
   } else {
    $herramientas_ANACONDA = "0";
   }

   if ($_REQUEST['herramientas_SQL']) {
     $herramientas_SQL = $_REQUEST['herramientas_SQL'];
   }else {
      $herramientas_SQL = "0";
   }
   if ($_REQUEST['herramientas_ORACLE']) {
     $herramientas_ORACLE = $_REQUEST['herramientas_ORACLE'];
   }else {
     $herramientas_ORACLE = "0";
   }
   if ($_REQUEST['herramientas_TENSORFLOW']) {
     $herramientas_TENSORFLOW = $_REQUEST['herramientas_TENSORFLOW'];
   }else {
     $herramientas_TENSORFLOW = "0";
   }
   if ($_REQUEST['herramientas_KERAS']) {
     $herramientas_KERAS = $_REQUEST['herramientas_KERAS'];
   }else {
     $herramientas_KERAS = "0";
   }
   if ($_REQUEST['herramientas_POWER_BI']) {
     $herramientas_POWER_BI = $_REQUEST['herramientas_POWER_BI'];
   }else {
     $herramientas_POWER_BI = "0";
   }
   if ($_REQUEST['herramientas_TABLEAU']) {
    $herramientas_TABLEAU = $_REQUEST['herramientas_TABLEAU'];
   }else {
    $herramientas_TABLEAU = "0";
   }
   if ($_REQUEST['herramientas_APACHE_SPARK']) {
      $herramientas_APACHE_SPARK = $_REQUEST['herramientas_APACHE_SPARK'];
   }else {
     $herramientas_APACHE_SPARK = "0";
   }
   if ($_REQUEST['herramientas_NINGUNA']) {
     $herramientas_NINGUNA = $_REQUEST['herramientas_NINGUNA'];
   }else {
    $herramientas_NINGUNA = "0";
   }


   $herramientas_otros = $_REQUEST['herramientas_otros'];

  //usados en trabajo

    if ($_REQUEST['uso_actual_SPSS']) {
      $uso_actual_SPSS = $_REQUEST['uso_actual_SPSS'];
    } else {
      $uso_actual_SPSS = "0";
    }
    if ($_REQUEST['uso_actual_SAS']) {
      $uso_actual_SAS = $_REQUEST['uso_actual_SAS'];
    } else {
      $uso_actual_SAS = "0";
    }
    if ($_REQUEST['uso_actual_MINITAB']) {
      $uso_actual_MINITAB = $_REQUEST['uso_actual_MINITAB'];
    } else {
      $uso_actual_MINITAB = "0";
    }
    if ($_REQUEST['uso_actual_RAPIDMINER']) {
      $uso_actual_RAPIDMINER = $_REQUEST['uso_actual_RAPIDMINER'];
    } else {
      $uso_actual_RAPIDMINER = "0";
    }
    if ($_REQUEST['uso_actual_R']) {
     $uso_actual_R = $_REQUEST['uso_actual_R'];
    } else {
       $uso_actual_R = "0";
    }
    if ($_REQUEST['uso_actual_PYTHON']) {
    $uso_actual_PYTHON = $_REQUEST['uso_actual_PYTHON'];
    } else {
      $uso_actual_PYTHON = "0";
    }
    if ($_REQUEST['uso_actual_EXCEL']) {
      $uso_actual_EXCEL = $_REQUEST['uso_actual_EXCEL'];

    } else {
      $uso_actual_EXCEL = "0";
    }
    if ($_REQUEST['uso_actual_ANACONDA']) {
      $uso_actual_ANACONDA = $_REQUEST['uso_actual_ANACONDA'];
    } else {
      $uso_actual_ANACONDA = "0";
    }
//aa
    if ($_REQUEST['uso_actual_SQL']) {
      $uso_actual_SQL = $_REQUEST['uso_actual_SQL'];
    } else {
      $uso_actual_SQL = "0";
    }

     if ($_REQUEST['uso_actual_ORACLE']) {
         $uso_actual_ORACLE = $_REQUEST['uso_actual_ORACLE'];
     } else {
       $uso_actual_ORACLE = "0";
     }

     if ($_REQUEST['uso_actual_TENSORFLOW']) {
       $uso_actual_TENSORFLOW = $_REQUEST['uso_actual_TENSORFLOW'];
     } else {
       $uso_actual_TENSORFLOW = "0";
     }

     if ($_REQUEST['uso_actual_KERAS']) {
     $uso_actual_KERAS = $_REQUEST['uso_actual_KERAS'];
     } else {
     $uso_actual_KERAS = "0";
     }

     if ($_REQUEST['uso_actual_POWER_BI']) {
     $uso_actual_POWER_BI = $_REQUEST['uso_actual_POWER_BI'];
     } else {
       $uso_actual_POWER_BI = "0";
     }

     if ($_REQUEST['uso_actual_TABLEAU']) {
     $uso_actual_TABLEAU = $_REQUEST['uso_actual_TABLEAU'];
     } else {
       $uso_actual_TABLEAU = "0";
     }

     if ($_REQUEST['uso_actual_APACHE_SPARK']) {
       $uso_actual_APACHE_SPARK = $_REQUEST['uso_actual_APACHE_SPARK'];
     } else {
       $uso_actual_APACHE_SPARK = "0";
     }
     if ($_REQUEST['uso_actual_NINGUNA']) {
         $uso_actual_NINGUNA = $_REQUEST['uso_actual_NINGUNA'];
     } else {
       $uso_actual_NINGUNA = "0";
     }

     $uso_actual_otro = $_REQUEST['uso_actual_otro'];

//fin

   if ($_REQUEST['mejor_herramienta'] == 'Otros') {
   $mejor_herramienta = $_REQUEST['mejor_herramienta_otros'];
  }else {
   $mejor_herramienta = $_REQUEST['mejor_herramienta'];
  }

  //metodos aprendizaje automatico

  if ($_REQUEST['metodoAutomatico_Regression']) {
    $metodoAutomatico_Regression = $_REQUEST['metodoAutomatico_Regression'];
  } else {
   $metodoAutomatico_Regression = "0";
  }

  if ($_REQUEST['metodoAutomatico_Decision_Trees']) {
    $metodoAutomatico_Decision_Trees = $_REQUEST['metodoAutomatico_Decision_Trees'];
  } else {
    $metodoAutomatico_Decision_Trees = "0";
  }
  if ($_REQUEST['metodoAutomatico_Clustering']) {
      $metodoAutomatico_Clustering = $_REQUEST['metodoAutomatico_Clustering'];
  } else {
      $metodoAutomatico_Clustering = "0";
  }
  if ($_REQUEST['metodoAutomatico_PCA']) {
      $metodoAutomatico_PCA = $_REQUEST['metodoAutomatico_PCA'];
  } else {
    $metodoAutomatico_PCA = "0";
  }
  if ($_REQUEST['metodoAutomatico_Visualizacion_datos']) {
    $metodoAutomatico_Visualizacion_datos = $_REQUEST['metodoAutomatico_Visualizacion_datos'];
  } else {
    $metodoAutomatico_Visualizacion_datos = "0";
  }
  if ($_REQUEST['metodoAutomatico_Estadistica_descriptiva']) {
    $metodoAutomatico_Estadistica_descriptiva = $_REQUEST['metodoAutomatico_Estadistica_descriptiva'];
  } else {
      $metodoAutomatico_Estadistica_descriptiva = "0";
  }
  if ($_REQUEST['metodoAutomatico_Vector_Machine']) {
    $metodoAutomatico_Vector_Machine = $_REQUEST['metodoAutomatico_Vector_Machine'];
  } else {
    $metodoAutomatico_Vector_Machine = "0";
  }
  if ($_REQUEST['metodoAutomatico_Random_Forest']) {
    $metodoAutomatico_Random_Forest = $_REQUEST['metodoAutomatico_Random_Forest'];
  } else {
  $metodoAutomatico_Random_Forest = "0";
  }

  if ($_REQUEST['metodoAutomatico_Nearest_Neighbours']) {
    $metodoAutomatico_Nearest_Neighbours = $_REQUEST['metodoAutomatico_Nearest_Neighbours'];
  } else {
      $metodoAutomatico_Nearest_Neighbours = "0";
  }


//aa

  if ($_REQUEST['metodoAutomatico_Times_Series']) {
  $metodoAutomatico_Times_Series = $_REQUEST['metodoAutomatico_Times_Series'];
  } else {
  $metodoAutomatico_Times_Series = "0";
  }

  if ($_REQUEST['metodoAutomatico_Ensemble_Methods']) {
  $metodoAutomatico_Ensemble_Methods = $_REQUEST['metodoAutomatico_Ensemble_Methods'];
  } else {
  $metodoAutomatico_Ensemble_Methods = "0";
  }
  if ($_REQUEST['metodoAutomatico_Boosting']) {
  $metodoAutomatico_Boosting = $_REQUEST['metodoAutomatico_Boosting'];
  } else {
  $metodoAutomatico_Boosting = "0";
  }
  if ($_REQUEST['metodoAutomatico_Text_Minng']) {
  $metodoAutomatico_Text_Minng = $_REQUEST['metodoAutomatico_Text_Minng'];
  } else {
  $metodoAutomatico_Text_Minng = "0";
  }
  if ($_REQUEST['metodoAutomatico_Neural_Networds']) {
  $metodoAutomatico_Neural_Networds = $_REQUEST['metodoAutomatico_Neural_Networds'];
  } else {
  $metodoAutomatico_Neural_Networds = "0";
  }

  if ($_REQUEST['metodoAutomatico_Boosted_Machines']) {
  $metodoAutomatico_Boosted_Machines = $_REQUEST['metodoAutomatico_Boosted_Machines'];
  } else {
  $metodoAutomatico_Boosted_Machines = "0";
  }
  if ($_REQUEST['metodoAutomatico_Anomaly_Detection']) {
  $metodoAutomatico_Anomaly_Detection = $_REQUEST['metodoAutomatico_Anomaly_Detection'];
  } else {
  $metodoAutomatico_Anomaly_Detection = "0";
  }
  if ($_REQUEST['metodoAutomatico_Recommendation_systems']) {
  $metodoAutomatico_Recommendation_systems = $_REQUEST['metodoAutomatico_Recommendation_systems'];
  } else {
  $metodoAutomatico_Recommendation_systems = "0";
  }

  $metodoAutomatico_otros = $_REQUEST['metodoAutomatico_otros'];


// fin
if ($_REQUEST['metodos_aprendizaje'] == 'Otros') {
$metodos_aprendizaje = $_REQUEST['metodos_aprendizaje_otros'];
}else {
$metodos_aprendizaje = $_REQUEST['metodos_aprendizaje'];
}
$correo_respuesta = '';

if ($_REQUEST['actividad_laboral'] == "Otro") {
  $actividad_laboral = $_REQUEST['actividad_laboral_otros'];
} else {
  $actividad_laboral = $_REQUEST['actividad_laboral'];
}


$rango_remuneracion_mensual =$_REQUEST['rango_remuneracion_mensual'];
$cambio_trabajo_ultimo_año = $_REQUEST['cambio_trabajo_ultimo_año'];
$cambio_funciones_ultimo_año = $_REQUEST['cambio_funciones_ultimo_año'];
$nivel_satisfaccion_trabajo = $_REQUEST['nivel_satisfaccion_trabajo'];
$nivel_satisfaccion_horario = $_REQUEST['nivel_satisfaccion_horario'];
$nivel_satisfaccion_remuneracion = $_REQUEST['nivel_satisfaccion_remuneracion'];


 echo $resultado = $cuestionario->registrar_suscritos_perfil_ds($id_ficha,$frase_laboral,$sector_laboral,
 $cantidad_trabajadores,$puesto_trabajo,
  $dominio_ingles,$capacitacion,$modalidad_presencial,$modalidad_vivo,$modalidad_grabadoVivo,
$modalidad_grabado,$modalidad_otros,$mod_capacitacion,$capacitacion_institutos_nacionales,
  $capacitacion_institutos_extranjeros,$capacitacion_Unacionales,$capacitacion_Uextranjeros,
 $capacitacion_coursera,$capacitacion_platzi,$capacitacion_udemy,$capacitacion_netzum,
 $capacitacion_edx,$capacitacion_datacamp,$capacitacion_khan,$capacitacion_Codeacademy,
 $capacitacion_Kagle,$capacitacion_Analytics_Vidhya,$capacitacion_autodidacta,$capacitacion_otros,
 $consideracion_institucion,$bd,$vizualizacion,$etl,$programacion,$analiticas,$cloud,$big_data,
 $herramientas_SPSS,$herramientas_SAS,$herramientas_MINITAB,$herramientas_RAPIDMINER,$herramientas_R,
 $herramientas_PYTHON,$herramientas_EXCEL,$herramientas_ANACONDA,$herramientas_SQL,$herramientas_ORACLE,
 $herramientas_TENSORFLOW,$herramientas_KERAS,$herramientas_POWER_BI,$herramientas_TABLEAU,
 $herramientas_APACHE_SPARK,$herramientas_NINGUNA,$herramientas_otros,
 $uso_actual_SPSS,$uso_actual_SAS,$uso_actual_MINITAB,$uso_actual_RAPIDMINER,$uso_actual_R,
 $uso_actual_PYTHON,$uso_actual_EXCEL,$uso_actual_ANACONDA,
 $uso_actual_SQL,$uso_actual_ORACLE,$uso_actual_TENSORFLOW,$uso_actual_KERAS,$uso_actual_POWER_BI,
 $uso_actual_TABLEAU,$uso_actual_APACHE_SPARK,$uso_actual_NINGUNA,$uso_actual_otro,$mejor_herramienta,
 $metodoAutomatico_Regression,$metodoAutomatico_Decision_Trees,$metodoAutomatico_Clustering,
 $metodoAutomatico_PCA,$metodoAutomatico_Visualizacion_datos,$metodoAutomatico_Estadistica_descriptiva,
 $metodoAutomatico_Vector_Machine,$metodoAutomatico_Random_Forest,$metodoAutomatico_Nearest_Neighbours,
 $metodoAutomatico_Times_Series,$metodoAutomatico_Ensemble_Methods,$metodoAutomatico_Boosting,
 $metodoAutomatico_Text_Minng,$metodoAutomatico_Neural_Networds,$metodoAutomatico_Boosted_Machines,
 $metodoAutomatico_Anomaly_Detection,$metodoAutomatico_Recommendation_systems,$metodoAutomatico_otros,
 $metodos_aprendizaje,$correo_respuesta,$actividad_laboral,
 $rango_remuneracion_mensual,$cambio_trabajo_ultimo_año,$cambio_funciones_ultimo_año,$nivel_satisfaccion_trabajo,$nivel_satisfaccion_horario,$nivel_satisfaccion_remuneracion
 );

 ?>
