  <?php



require_once "gestionbd.php";



class sorteoAniversario{



  public function registrar($nombres,$apellidos,$celular,$mail,$tDocumento,$nro_documento,$genero,
  $edad,$pais,$profesion){


 try {

      $gbd=Gestionbd::getInstancia();

      $sql="insert into ficha_contacto (FICHA_CONTACTO_NOMBRES,FICHA_CONTACTO_APELLIDOS,FICHA_CONTACTO_TIPO_DOC,FICHA_CONTACTO_NUM_DOCUMENTO,

      FICHA_CONTACTO_SEXO,FICHA_CONTACTO_TELEFONO,FICHA_CONTACTO_EDAD,FICHA_CONTACTO_EMAIL,FICHA_CONTACTO_PAIS,
FECHA_REGISTRO,FICHA_CONTACTO_PROFESION,FICHA_CONTACTO_MODO,FICHA_CONTACTO_FORMATO
)values

 (:FICHA_CONTACTO_NOMBRES,:FICHA_CONTACTO_APELLIDOS,:FICHA_CONTACTO_TIPO_DOC,:FICHA_CONTACTO_NUM_DOCUMENTO

,:FICHA_CONTACTO_SEXO,:FICHA_CONTACTO_TELEFONO,:FICHA_CONTACTO_EDAD,:FICHA_CONTACTO_EMAIL,:FICHA_CONTACTO_PAIS

,now(),:FICHA_CONTACTO_PROFESION,1,'Madre') ";

  $cmd=$gbd->prepare($sql);

  $cmd->bindparam(':FICHA_CONTACTO_NOMBRES',$nombres);

  $cmd->bindparam(':FICHA_CONTACTO_APELLIDOS',$apellidos);

  $cmd->bindparam(':FICHA_CONTACTO_TIPO_DOC',$tDocumento);

  $cmd->bindparam(':FICHA_CONTACTO_NUM_DOCUMENTO',$nro_documento);

  $cmd->bindparam(':FICHA_CONTACTO_SEXO',$genero);

  $cmd->bindparam(':FICHA_CONTACTO_TELEFONO',$celular);

  $cmd->bindparam(':FICHA_CONTACTO_EDAD',$edad);

  $cmd->bindparam(':FICHA_CONTACTO_EMAIL',$mail);

  $cmd->bindparam(':FICHA_CONTACTO_PAIS',$pais);
  $cmd->bindparam(':FICHA_CONTACTO_PROFESION',$profesion);



if ($cmd->execute()) {

		return $gbd->lastInsertId();



}else {



  return "no registro";



}





}

 catch (Exception $e)

{
   echo "ERROR: " . $e->getMessage();
}



  }


  public function registrarCuestionarioMatematica($nombres,$apellidos,$celular,$mail,$tDocumento,$nro_documento){

    $mail = strtolower($mail);
 try {

      $gbd=Gestionbd::getInstancia();

      $sql="insert into ficha_contacto (FICHA_CONTACTO_NOMBRES,FICHA_CONTACTO_APELLIDOS,FICHA_CONTACTO_TIPO_DOC,FICHA_CONTACTO_NUM_DOCUMENTO,
      FICHA_CONTACTO_TELEFONO,FICHA_CONTACTO_EMAIL,
      FECHA_REGISTRO,FICHA_CONTACTO_MODO,FICHA_CONTACTO_FORMATO
      )values

       (:FICHA_CONTACTO_NOMBRES,:FICHA_CONTACTO_APELLIDOS,:FICHA_CONTACTO_TIPO_DOC,:FICHA_CONTACTO_NUM_DOCUMENTO
      ,:FICHA_CONTACTO_TELEFONO,:FICHA_CONTACTO_EMAIL
      ,now(),1,'Madre') ";

  $cmd=$gbd->prepare($sql);

  $cmd->bindparam(':FICHA_CONTACTO_NOMBRES',$nombres);

  $cmd->bindparam(':FICHA_CONTACTO_APELLIDOS',$apellidos);

  $cmd->bindparam(':FICHA_CONTACTO_TIPO_DOC',$tDocumento);

  $cmd->bindparam(':FICHA_CONTACTO_NUM_DOCUMENTO',$nro_documento);

  $cmd->bindparam(':FICHA_CONTACTO_TELEFONO',$celular);

  $cmd->bindparam(':FICHA_CONTACTO_EMAIL',$mail);


if ($cmd->execute()) {

    return $gbd->lastInsertId();



}else {



  return "no registro";



}





}

 catch (Exception $e)

{
   echo "ERROR: " . $e->getMessage();
}



  }



// consulta correlativo

public function consulta_correlativo()
{

try {
    $gbd=Gestionbd::getInstancia();

    $sql = "SELECT count(*) numero from ficha_contacto_capacitacion where CAPACITACION_ID = '2354'";


        $cmd=$gbd->prepare($sql);

        $cmd->execute();

        $lista=$cmd->fetch(PDO::FETCH_ASSOC);

       return $lista;

 }
  catch (Exception $e)
 {
    echo "ERROR: " . $e->getMessage();

 }


}





  public function registrar_codigo($id_ficha,$codigo_ficha){



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


  public function actualizar_correlativo($numero){

      $gbd=Gestionbd::getInstancia();

      $sql="UPDATE correlativos set numero = :numero where id = 1";


  $cmd=$gbd->prepare($sql);

  $cmd->bindparam(':numero',$numero);


  if ($cmd->execute()) {
  return "ok";
  }else {
  return "no registro";
  }




  }


  public function registrar_datosSecundarios($id_ficha,$post){

    if ($post['b5_centroEstudio'] == 'Otro') {
      $b5_centroEstudio = $post['b5_otro'];
    }else {
      $b5_centroEstudio = $post['b5_centroEstudio'];
    }
 if ($post['cargo'] == '98') {
   $cargo = $post['cargo_otro'];
 }else {
   $cargo = $post['cargo'];
 }
 if ($post['sector'] == 'Otro') {
   $sector = $post['c3_otro'];
 }else {
   $sector = $post['sector'];
 }

 if ($post['c6_labores'] == 'Otro') {
   $labores = $post['c6_otro'];
 }else {
   $labores = $post['c6_labores'];
 }

// b5_otro

 if ($post['e2_modalidad'] == 'Otro') {
   $modalidad = $post['e2_otro'];
 }else {
   $modalidad = $post['e2_modalidad'];
 }

$gbd=Gestionbd::getInstancia();


$nombre_form = 'DMC ANIVERSARIO 2024';

  $sql="insert into cuestionario (id_ficha_contacto,nombre_cuestionario,centro_estudios,
  frase_laboral,
  puesto_trabajo,sector_trabajo,
  cantidad_personal,rango_remuneracion,labores,
  dmc_check1,dmc_check2,dmc_check3,check_dsr1,check_dsr2,
  check_dsr3,check_sdc1,check_sdc2,check_sdc3,check_nh1,
  check_nh2,check_nh3,check_ci1,check_ci2,check_ci3,
  check_bic1,check_bic2,check_bic3,check_bda1,check_bda2,
  check_bda3,check_dp1,check_dp2,check_dp3,
  check_utec1,check_utec2,check_utec3,
  check_upc1,check_upc2,check_upc3,
  check_cib1,check_cib2,check_cib3,
  check_cour1,check_cour2,check_cour3,
  check_pl1,check_pl2,check_pl3,
  check_ud1,check_ud2,check_ud3,
  check_net1,check_net2,check_net3,
  check_edx1,check_edx2,check_edx3,
  check_cr1,check_cr2,check_cr3,
  check_dc1,check_dc2,check_dc3,
  check_ka1,check_ka2,check_ka3,
  check_cc1,check_cc2,check_cc3,

  check_k1,check_k2,check_k3,
  check_pav1,check_pav2,check_pav3,
  check_au1,check_au2,check_au3,

  empresa_otro,
  d5,d6,d7,empresa_2_4,empresa_2_5,
  empresa_2_6,empresa_2_7,empresa_2_8,empresa_2_9,empresa_2_10,
  empresa_2_11,empresa_2_12,empresa_2_13,empresa_2_14,empresa_2_15,
  empresa_2_16,empresa_2_17,

  capacitacion1,capacitacion2,capacitacion3,capacitacion4,capacitacion5,
  capacitacion_otro,

  modalidad,
  d4,
  pref_capacitacion_lunes,pref_capacitacion_martes,pref_capacitacion_miercoles,
  pref_capacitacion_jueves,pref_capacitacion_viernes,pref_capacitacion_sabado,
  pref_capacitacion_domingo,
  6_am,7_am,8_am,9_am,
  5_pm,6_pm,7_pm,8_pm,9_pm,10_pm,horario_otro,d3,
  dia_semana_lunes,dia_semana_martes,dia_semana_miercoles,dia_semana_jueves,dia_semana_viernes,
  fin_semana_sabado,fin_semana_domingo,fin_semana_sabado_domingo,fin_semana_ninguno,
  capacitarte_data_analyst,capacitarte_data_scientist,capacitarte_data_engineer,capacitarte_otro,
  chk_base_datos,chk_visualizacion_datos,chk_herramienta_analitica,chk_cloud,chk_big_data,chk_machine_learning,
  chk_inteligencia_artificial,chk_metodologias_agiles,chk_ninguna,chk_otro
)
  values (:id_ficha_contacto,:nombre_cuestionario,:centro_estudios,
  :frase_laboral,:puesto_trabajo,:sector_trabajo,
  :cantidad_personal,:rango_remuneracion_mensual,:labores,
  :dmc_check1,:dmc_check2,:dmc_check3,:check_dsr1,:check_dsr2,
  :check_dsr3,:check_sdc1,:check_sdc2,:check_sdc3,:check_nh1,
  :check_nh2,:check_nh3,:check_ci1,:check_ci2,:check_ci3,
  :check_bic1,:check_bic2,:check_bic3,:check_bda1,:check_bda2,
  :check_bda3,:check_dp1,:check_dp2,:check_dp3,
  :check_utec1,:check_utec2,:check_utec3,
  :check_upc1,:check_upc2,:check_upc3,
  :check_cib1,:check_cib2,:check_cib3,
  :check_cour1,:check_cour2,:check_cour3,
  :check_pl1,:check_pl2,:check_pl3,
  :check_ud1,:check_ud2,:check_ud3,
  :check_net1,:check_net2,:check_net3,
  :check_edx1,:check_edx2,:check_edx3,
  :check_cr1,:check_cr2,:check_cr3,
  :check_dc1,:check_dc2,:check_dc3,
  :check_ka1,:check_ka2,:check_ka3,
  :check_cc1,:check_cc2,:check_cc3,

  :check_k1,:check_k2,:check_k3,
  :check_pav1,:check_pav2,:check_pav3,
  :check_au1,:check_au2,:check_au3,

  :empresa_otro,
  :d5,:d6,:d7,:empresa_2_4,:empresa_2_5,
  :empresa_2_6,:empresa_2_7,:empresa_2_8,:empresa_2_9,:empresa_2_10,
  :empresa_2_11,:empresa_2_12,:empresa_2_13,:empresa_2_14,:empresa_2_15,
  :empresa_2_16,:empresa_2_17,

  :capacitacion1,:capacitacion2,:capacitacion3,:capacitacion4,:capacitacion5,
  :capacitacion_otro,

  :modalidad,
  :d4,
  :pref_capacitacion_lunes,:pref_capacitacion_martes,:pref_capacitacion_miercoles,
  :pref_capacitacion_jueves,:pref_capacitacion_viernes,:pref_capacitacion_sabado,
  :pref_capacitacion_domingo,
  :6_am,:7_am,:8_am,:9_am,
  :5_pm,:6_pm,:7_pm,:8_pm,:9_pm,:10_pm,:horario_otro,
  :d3,
  :dia_semana_lunes,:dia_semana_martes,:dia_semana_miercoles,:dia_semana_jueves,:dia_semana_viernes,
  :fin_semana_sabado,:fin_semana_domingo,:fin_semana_sabado_domingo,:fin_semana_ninguno,
  :capacitarte_data_analyst,:capacitarte_data_scientist,:capacitarte_data_engineer,:capacitarte_otro,
  :chk_base_datos,:chk_visualizacion_datos,:chk_herramienta_analitica,:chk_cloud,:chk_big_data,:chk_machine_learning,
  :chk_inteligencia_artificial,:chk_metodologias_agiles,:chk_ninguna,:chk_otro
  )";


  $cmd=$gbd->prepare($sql);

  $cmd->bindparam(':id_ficha_contacto',$id_ficha);
  $cmd->bindparam(':nombre_cuestionario',$nombre_form);

 $cmd->bindparam(':centro_estudios',$b5_centroEstudio);

  $cmd->bindparam(':frase_laboral',$post['c1_situacionLaboral']);
  $cmd->bindparam(':puesto_trabajo',$cargo);
  $cmd->bindparam(':sector_trabajo',$sector);
  $cmd->bindparam(':cantidad_personal',$post['cantidad_trabajadores']);
  $cmd->bindparam(':rango_remuneracion_mensual',$post['rango_remuneracion_mensual']);
  $cmd->bindparam(':labores',$labores);

//D
  $cmd->bindparam(':dmc_check1',$post['check_dmc1']);
  $cmd->bindparam(':dmc_check2',$post['check_dmc2']);
  $cmd->bindparam(':dmc_check3',$post['check_dmc3']);

  $cmd->bindparam(':check_dsr1',$post['check_dsr1']);
  $cmd->bindparam(':check_dsr2',$post['check_dsr2']);
  $cmd->bindparam(':check_dsr3',$post['check_dsr3']);

  $cmd->bindparam(':check_sdc1',$post['check_sdc1']);
  $cmd->bindparam(':check_sdc2',$post['check_sdc2']);
  $cmd->bindparam(':check_sdc3',$post['check_sdc3']);

  $cmd->bindparam(':check_nh1',$post['check_nh1']);
  $cmd->bindparam(':check_nh2',$post['check_nh2']);
  $cmd->bindparam(':check_nh3',$post['check_nh3']);

  $cmd->bindparam(':check_ci1',$post['check_ci1']);
  $cmd->bindparam(':check_ci2',$post['check_ci2']);
  $cmd->bindparam(':check_ci3',$post['check_ci3']);

  $cmd->bindparam(':check_bic1',$post['check_bic1']);
  $cmd->bindparam(':check_bic2',$post['check_bic2']);
  $cmd->bindparam(':check_bic3',$post['check_bic3']);

  $cmd->bindparam(':check_bda1',$post['check_bda1']);
  $cmd->bindparam(':check_bda2',$post['check_bda2']);
  $cmd->bindparam(':check_bda3',$post['check_bda3']);

  $cmd->bindparam(':check_dp1',$post['check_dp1']);
  $cmd->bindparam(':check_dp2',$post['check_dp2']);
  $cmd->bindparam(':check_dp3',$post['check_dp3']);

  $cmd->bindparam(':check_utec1',$post['check_utec1']);
  $cmd->bindparam(':check_utec2',$post['check_utec2']);
  $cmd->bindparam(':check_utec3',$post['check_utec3']);
  $cmd->bindparam(':check_upc1',$post['check_upc1']);
  $cmd->bindparam(':check_upc2',$post['check_upc2']);
  $cmd->bindparam(':check_upc3',$post['check_upc3']);

  $cmd->bindparam(':check_cib1',$post['check_cib1']);
  $cmd->bindparam(':check_cib2',$post['check_cib2']);
  $cmd->bindparam(':check_cib3',$post['check_cib3']);
  $cmd->bindparam(':check_cour1',$post['check_cour1']);
  $cmd->bindparam(':check_cour2',$post['check_cour2']);
  $cmd->bindparam(':check_cour3',$post['check_cour3']);

  $cmd->bindparam(':check_pl1',$post['check_pl1']);
  $cmd->bindparam(':check_pl2',$post['check_pl2']);
  $cmd->bindparam(':check_pl3',$post['check_pl3']);
  $cmd->bindparam(':check_ud1',$post['check_ud1']);
  $cmd->bindparam(':check_ud2',$post['check_ud2']);
  $cmd->bindparam(':check_ud3',$post['check_ud3']);

  $cmd->bindparam(':check_net1',$post['check_net1']);
  $cmd->bindparam(':check_net2',$post['check_net2']);
  $cmd->bindparam(':check_net3',$post['check_net3']);
  $cmd->bindparam(':check_edx1',$post['check_edx1']);
  $cmd->bindparam(':check_edx2',$post['check_edx2']);
  $cmd->bindparam(':check_edx3',$post['check_edx3']);

  $cmd->bindparam(':check_cr1',$post['check_cr1']);
  $cmd->bindparam(':check_cr2',$post['check_cr2']);
  $cmd->bindparam(':check_cr3',$post['check_cr3']);
  $cmd->bindparam(':check_dc1',$post['check_dc1']);
  $cmd->bindparam(':check_dc2',$post['check_dc2']);
  $cmd->bindparam(':check_dc3',$post['check_dc3']);

  $cmd->bindparam(':check_ka1',$post['check_ka1']);
  $cmd->bindparam(':check_ka2',$post['check_ka2']);
  $cmd->bindparam(':check_ka3',$post['check_ka3']);
  $cmd->bindparam(':check_cc1',$post['check_cc1']);
  $cmd->bindparam(':check_cc2',$post['check_cc2']);
  $cmd->bindparam(':check_cc3',$post['check_cc3']);

  $cmd->bindparam(':check_k1',$post['check_k1']);
  $cmd->bindparam(':check_k2',$post['check_k2']);
  $cmd->bindparam(':check_k3',$post['check_k3']);
  $cmd->bindparam(':check_pav1',$post['check_pav1']);
  $cmd->bindparam(':check_pav2',$post['check_pav2']);
  $cmd->bindparam(':check_pav3',$post['check_pav3']);
  $cmd->bindparam(':check_au1',$post['check_au1']);
  $cmd->bindparam(':check_au2',$post['check_au2']);
  $cmd->bindparam(':check_au3',$post['check_au3']);

  $cmd->bindparam(':empresa_otro',$post['empresa_otro']);


  $cmd->bindparam(':d5',$post['d5']);
  $cmd->bindparam(':d6',$post['d6']);
  $cmd->bindparam(':d7',$post['d7']);
  $cmd->bindparam(':empresa_2_4',$post['d2_nh']);
  $cmd->bindparam(':empresa_2_5',$post['d2_cedhinfo']);
  $cmd->bindparam(':empresa_2_6',$post['d2_bic']);
  $cmd->bindparam(':empresa_2_7',$post['d2_bda']);
  $cmd->bindparam(':empresa_2_8',$post['d2_dp']);
  $cmd->bindparam(':empresa_2_9',$post['d2_utec']);
  $cmd->bindparam(':empresa_2_10',$post['d2_upc']);
  $cmd->bindparam(':empresa_2_11',$post['d2_cibertec']);
  $cmd->bindparam(':empresa_2_12',$post['d2_coursera']);
  $cmd->bindparam(':empresa_2_13',$post['d2_platzi']);
  $cmd->bindparam(':empresa_2_14',$post['d2_udemy']);
  $cmd->bindparam(':empresa_2_15',$post['d2_netzum']);
  $cmd->bindparam(':empresa_2_16',$post['d2_edx']);
  $cmd->bindparam(':empresa_2_17',$post['d2_crehana']);


  $cmd->bindparam(':capacitacion1',$post['check_pr']);
  $cmd->bindparam(':capacitacion2',$post['check_ocv']);
  $cmd->bindparam(':capacitacion3',$post['check_ob']);
  $cmd->bindparam(':capacitacion4',$post['check_ocg']);
  $cmd->bindparam(':capacitacion5',$post['check_ni']);
  $cmd->bindparam(':capacitacion_otro',$post['check_capcitacionOtro']);
//
  $cmd->bindparam(':modalidad',$modalidad);

  $cmd->bindparam(':pref_capacitacion_lunes',$post['dia_pref_capLunes']);
  $cmd->bindparam(':pref_capacitacion_martes',$post['dia_pref_capMartes']);
  $cmd->bindparam(':pref_capacitacion_miercoles',$post['dia_pref_capMiercoles']);
  $cmd->bindparam(':pref_capacitacion_jueves',$post['dia_pref_capJueves']);
  $cmd->bindparam(':pref_capacitacion_viernes',$post['dia_pref_capViernes']);
  $cmd->bindparam(':pref_capacitacion_sabado',$post['dia_pref_capSabado']);
  $cmd->bindparam(':pref_capacitacion_domingo',$post['dia_pref_capDomingo']);

  $cmd->bindparam(':6_am',$post['horario6am']);
  $cmd->bindparam(':7_am',$post['horario7am']);
  $cmd->bindparam(':8_am',$post['horario8am']);
  $cmd->bindparam(':9_am',$post['horario9am']);
  $cmd->bindparam(':5_pm',$post['horario5pm']);
  $cmd->bindparam(':6_pm',$post['horario6pm']);
  $cmd->bindparam(':7_pm',$post['horario7pm']);
  $cmd->bindparam(':8_pm',$post['horario8pm']);
  $cmd->bindparam(':9_pm',$post['horario9pm']);
  $cmd->bindparam(':10_pm',$post['horario10pm']);
  $cmd->bindparam(':horario_otro',$post['horario_otro']);

  $cmd->bindparam(':d3',$post['d3']);

  $cmd->bindparam(':d4',$post['d4']);

  //Sorteo de Aniversario
  $cmd->bindparam(':dia_semana_lunes',$post['dsLunes']);
  $cmd->bindparam(':dia_semana_martes',$post['dsMartes']);
  $cmd->bindparam(':dia_semana_miercoles',$post['dsMiercoles']);
  $cmd->bindparam(':dia_semana_jueves',$post['dsJueves']);
  $cmd->bindparam(':dia_semana_viernes',$post['dsViernes']);
  $cmd->bindparam(':fin_semana_sabado',$post['fsSabado']);
  $cmd->bindparam(':fin_semana_domingo',$post['fsDomingo']);
  $cmd->bindparam(':fin_semana_sabado_domingo',$post['fsSabadoDomingo']);
  $cmd->bindparam(':fin_semana_ninguno',$post['fsNinguno']);
  $cmd->bindparam(':capacitarte_data_analyst',$post['cpDataAnalyst']);
  $cmd->bindparam(':capacitarte_data_scientist',$post['cpDataScience']);
  $cmd->bindparam(':capacitarte_data_engineer',$post['cpDataEngineer']);
  $cmd->bindparam(':capacitarte_otro',$post['cpOtro']);

  $cmd->bindparam(':chk_base_datos',$post['chk_base_datos']);
  $cmd->bindparam(':chk_visualizacion_datos',$post['chk_visualizacion_datos']);
  $cmd->bindparam(':chk_herramienta_analitica',$post['chk_herramienta_analitica']);
  $cmd->bindparam(':chk_cloud',$post['chk_cloud']);
  $cmd->bindparam(':chk_big_data',$post['chk_big_data']);
  $cmd->bindparam(':chk_inteligencia_artificial',$post['chk_inteligencia_artificial']);
  $cmd->bindparam(':chk_machine_learning',$post['chk_machine_learning']);
  $cmd->bindparam(':chk_metodologias_agiles',$post['chk_metodologias_agiles']);
  $cmd->bindparam(':chk_ninguna',$post['chk_ninguna']);
  $cmd->bindparam(':chk_otro',$post['chk_otro']);



  //horas_duracion_parcial horas_duracion_total
  if ($cmd->execute()) {

    return 'ok';

  }else {

  return "no registro";
}

}


  public function registrar_datosCurso($id_ficha,$post,$contador){

      $gbd=Gestionbd::getInstancia();

      $sql="insert into cuestionario_matematica (vendedor_id,id_ficha,b1,b2,
      b3,b4,b5,b6,b7,b8,b9,b10,respuestas)
                values (:vendedor,:id_ficha,:b1,:b2,
                :b3,:b4,:b5,:b6,:b7,:b8,:b9,:b10,:respuestas)";

  $cmd=$gbd->prepare($sql);

  $cmd->bindparam(':vendedor',$post['vendedor']);
  $cmd->bindparam(':id_ficha',$id_ficha);
  $cmd->bindparam(':b1',$post['b1']);
  $cmd->bindparam(':b2',$post['b2']);
  $cmd->bindparam(':b3',$post['b3']);
  $cmd->bindparam(':b4',$post['b4']);
  $cmd->bindparam(':b5',$post['b5']);
  $cmd->bindparam(':b6',$post['b6']);
  $cmd->bindparam(':b7',$post['b7']);
  $cmd->bindparam(':b8',$post['b8']);
  $cmd->bindparam(':b9',$post['b9']);
  $cmd->bindparam(':b10',$post['b10']);
  $cmd->bindparam(':respuestas',$contador);
  if ($cmd->execute()) {

    return 'ok';

  }else {

  return "no registro";

  }



  }




  public function mensajeCursoGratuito(){

    $html = '<body topmargin="0" leftmargin="0" style="height: 100% !important; margin: 0; padding: 0; width: 100% !important;min-width: 100%;"><img
     src="https://clt1381227.benchmarkurl.com/c/o?e=158C91D&c=15136B&t=1&l=6AE75B9A&email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&relid=" alt="" border="0" style="display:none;" height="1" width="1">

    <table name="bmeMainBody" style="background-color: rgb(240, 240, 240);" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#f0f0f0"><tbody><tr><td width="100%" valign="top" align="center">
    <table name="bmeMainColumnParentTable" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="bmeMainColumnParent" style="border-collapse: separate; border: 0px none transparent; border-radius: 0px; border-spacing: 0px; overflow: visible;">
    <table name="bmeMainColumn" class="bmeMainColumn bmeHolder" style="max-width: 600px; overflow: visible; border-radius: 0px; border-collapse: separate; border-spacing: 0px;" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr id="section_1" class="flexible-section" data-columns="1" data-section-type="bmePreHeader"><td class="blk_container bmeHolder" name="bmePreHeader" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(230, 230, 232);" width="100%" valign="top" bgcolor="#e6e6e8" align="center"><div id="dv_16" class="blk_wrapper" style="">
    <table class="blk" name="blk_divider" style="background-color: rgb(53, 230, 218);" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="tblCellMain" style="padding: 2px 0px 3px;">
    <table class="tblLine" style="border-top: 1px none rgb(228, 228, 228); min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td><span></span></td></tr></tbody>
    </table></td></tr></tbody>
    </table></div></td></tr>   <tr><td class="bmeHolder" name="bmeMainContentParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px; overflow: hidden;" width="100%" valign="top" align="center">
    <table name="bmeMainContent" style="border-radius: 0px; border-collapse: separate; border-spacing: 0px; border: 0px none transparent; overflow: visible;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr id="section_2" class="flexible-section" data-columns="1"><td class="blk_container bmeHolder" name="bmeHeader" style="border: 0px none transparent; background-color: rgb(255, 255, 255);" width="100%" valign="top" bgcolor="#ffffff" align="center"><div id="dv_2" class="blk_wrapper" style="">
    <table class="blk" name="blk_image" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td>
    <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="bmeImage" style="border-collapse: collapse; padding: 0px;" align="center"><img
     src="https://images.benchmarkemail.com/client1381227/image13347496.jpg" class="mobile-img-large" style="max-width: 828px; display: block; border-radius: 0px;" alt="" data-radius="0" width="600" border="0"></td></tr></tbody>
    </table></td></tr></tbody>
    </table></div></td></tr> <tr id="section_3" class="flexible-section" data-columns="1"><td class="blk_container bmeHolder bmeBody" name="bmeBody" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: rgb(255, 255, 255);" width="100%" valign="top" bgcolor="#ffffff" align="center"><div id="dv_10" class="blk_wrapper" style="">
    <table class="blk" name="blk_boxtext" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="bmeBoxContainer" style="padding: 0px;" align="center">
    <table name="tblText" class="tblText" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td style="padding: 20px; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 14px; color: rgb(56, 56, 56); border-width: 1px; border-style: none; border-color: rgb(225, 225, 225); background-color: rgb(255, 255, 255); border-collapse: collapse; word-break: break-word;" name="tblCell" class="tblCell" valign="top" align="left"><div>
    <div style="text-align: justify;"><span style="color: #000000; line-height: 125%;"><strong>¡Felicidades!</strong></span></div>
    <div style="text-align: justify;">&nbsp;</div>
    <div style="text-align: justify;"><span style="color: #000000; line-height: 125%; font-size: 12px;">Eres uno de los 300 afortunados que han conseguido una vacante directa para el curso gratuito <strong>"<span style="font-size: 12px; color: #000000;"><span style="line-height: 125%;">Introducción a la Analítica de Datos</span></span>".</strong>
    <br></span></div>
    <div style="text-align: justify;">&nbsp;</div>
    <div style="text-align: justify;"><span style="color: #000000; line-height: 125%; font-size: 12px;">En los próximos días nos contactaremos contigo, al número y correo que nos has proporcionado para brindarte toda la información necesaria para iniciar las clases. Desde ya<strong>, confirmamos tu inscripción</strong> en el curso que desarrollamos para que puedas capacitarte de manera gratuita.
    <br></span></div>
    </div></td></tr></tbody>
    </table></td></tr></tbody>
    </table></div><div id="dv_14" class="blk_wrapper" style="">
    <table class="blk" name="blk_text" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td>
    <table class="bmeContainerRow" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><th class="tdPart" style="background-color: rgb(0, 0, 0);" valign="top" align="center">
    <table name="tblText" class="tblText" style="float: left; background-color: rgb(0, 0, 0);" width="600" cellspacing="0" cellpadding="0" border="0" align="left"><tbody><tr><td name="tblCell" class="tblCell" style="padding: 10px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;" valign="top" align="left"><div style="line-height: 150%; text-align: center;"><span style="color: #ffffff;"><strong>INFORMACIÓN DEL CURSO</strong></span></div></td></tr></tbody>
    </table></th></tr></tbody>
    </table></td></tr></tbody>
    </table></div><div id="dv_3" class="blk_wrapper" style="">
    <table class="blk" name="blk_text" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td>
    <table class="bmeContainerRow" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><th class="tdPart" valign="top" align="center">
    <table name="tblText" class="tblText" style="float:left; background-color:transparent;" width="600" cellspacing="0" cellpadding="0" border="0" align="left"><tbody><tr><td name="tblCell" class="tblCell" style="padding: 10px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;" valign="top" align="left"><div style="line-height: 150%;">
    <ul>

    <li><span style="color: #000000; font-size: 12px;"><strong>Duración:&nbsp;</strong>09 horas cronológicas (03 sesiones).</span></li>

    <li><span style="color: #000000; font-size: 12px;"><strong>Sesión 01:</strong> <span style="font-size: 12px; line-height: 150%; color: #000000;"><span style="line-height: 150%;">lune</span>s, 23 de enero de 7:30 pm. a 10:30 pm.</span>
    <br></span></li>

    <li><span style="color: #000000; font-size: 12px;"><strong>Sesión 02:</strong> <span style="font-size: 12px; line-height: 150%; color: #000000;">miércoles, 25 de enero de 7:30 pm. a 10:30 pm.</span>
    <br></span></li>

    <li><span style="color: #000000; font-size: 12px;"><strong>Sesión 03:</strong> <span style="font-size: 12px; line-height: 150%; color: #000000;">miércoles, 01 de febrero de 7:30 pm. a 10:30 pm.</span>
    <br></span></li>

    <li><span style="color: #000000; font-size: 12px;"><strong>Brochure:</strong>&nbsp;ver <a href="https://clt1381227.benchmarkurl.com/c/l?u=ED8627E&e=158C91D&c=15136B&t=1&l=6AE75B9A&email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&seq=1" target="_blank" style="text-decoration: none;"><strong><span style="text-decoration: underline; color: #05d6df;">aquí.</span></strong></a></span></li>
    </ul>
    </div></td></tr></tbody>
    </table></th></tr></tbody>
    </table></td></tr></tbody>
    </table></div><div id="dv_7" class="blk_wrapper" style="">
    <table class="blk" name="blk_text" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td>
    <table class="bmeContainerRow" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><th class="tdPart" style="background-color: rgb(0, 0, 0);" valign="top" align="center">
    <table name="tblText" class="tblText" style="float: left; background-color: rgb(0, 0, 0);" width="600" cellspacing="0" cellpadding="0" border="0" align="left"><tbody><tr><td name="tblCell" class="tblCell" style="padding: 10px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;" valign="top" align="left"><div style="line-height: 150%; text-align: center;"><span style="color: #ffffff;"><strong>DOCENTE DEL CURSO</strong></span></div></td></tr></tbody>
    </table></th></tr></tbody>
    </table></td></tr></tbody>
    </table></div><div id="dv_5" class="blk_wrapper" style="">
    <table class="blk" name="blk_divider" style="background-color: rgb(255, 255, 255);" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="tblCellMain" style="padding: 12px 0px 5px;">
    <table class="tblLine" style="border-top: 1px none rgb(228, 228, 228); min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td><span></span></td></tr></tbody>
    </table></td></tr></tbody>
    </table></div><div id="dv_11" class="blk_wrapper" style="">
    <table class="blk" name="blk_imagecaption" style="width: 600px; background-color: rgb(255, 255, 255);" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td>
    <table class="bmeCaptionContainer" style="padding-left:20px; padding-right:20px; padding-top:0px; padding-bottom:0px;border-collapse:separate;" width="100%" cellspacing="0" cellpadding="0"><tbody><tr><td class="bmeImageContainerRow" gutter="10" valign="top">
    <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="tdPart" valign="top">
    <table class="bmeImageContainer" style="float:left;" width="100%" cellspacing="0" cellpadding="0" border="0" align="left"><tbody><tr><td name="tdContainer" valign="top">
    <table class="bmeImageTable" dimension="30%" imgid="1" style="float: left; width: 180px;" width="180" height="147" cellspacing="0" cellpadding="0" border="0" align="left"><tbody><tr><td name="bmeImgHolder" width="187" valign="middle" height="147" align="center"><img
     src="https://images.benchmarkemail.com/client1381227/image13347646.png" class="mobile-img-large" style="max-width: 341px; display: block; border-radius: 0px;" alt="" data-radius="0" data-original-max-width="341" width="180" border="0"></td></tr></tbody>
    </table>
    <table class="bmeCaptionTable" style="float: right; width: 360px; word-break: break-word;" width="360" cellspacing="0" cellpadding="0" border="0" align="right"><tbody><tr><td name="tblCell" class="tblCell" style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: normal; color: rgb(56, 56, 56); text-align: left; word-break: break-word;" valign="top" align="left"><div style="line-height: 150%;">
    <div style="text-align: justify; line-height: 150%;">&nbsp;</div>
    <div style="text-align: justify; line-height: 150%;"><span style="color: #05d6df; line-height: 150%;">_________</span></div>
    <div style="text-align: justify; line-height: 150%;"><span style="font-size: 13px; line-height: 150%;"><strong>Luis Chacón
    <br></strong></span></div>
    <div style="text-align: justify; line-height: 150%;"><span style="font-size: 13px; line-height: 150%;">
    <em><strong>Asociado Sr. Analytics en </strong></em></span><strong><span style="font-size: 13px; line-height: 150%;">APOYO Consultoría</span></strong></div>
    <div style="text-align: justify; line-height: 150%;"><span style="font-size: 13px; line-height: 150%;">Experiencia previa en BCP, Banco Interamericano de Desarrollo y Sunat. Maestría en Gestión Económica Empresarial y bachiller en Estadística por la UNMSM.</span></div>
    </div></td></tr></tbody>
    </table></td></tr></tbody>
    </table></td></tr></tbody>
    </table></td></tr></tbody>
    </table></td></tr></tbody>
    </table></div><div id="dv_12" class="blk_wrapper" style="">
    <table class="blk" name="blk_divider" style="background-color: rgb(255, 255, 255);" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="tblCellMain" style="padding: 12px 0px 5px;">
    <table class="tblLine" style="border-top: 1px none rgb(228, 228, 228); min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td><span></span></td></tr></tbody>
    </table></td></tr></tbody>
    </table></div><div id="dv_9" class="blk_wrapper" style="">
    <table class="blk" name="blk_text" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td>
    <table class="bmeContainerRow" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><th class="tdPart" style="background-color: rgb(0, 0, 0);" valign="top" align="center">
    <table name="tblText" class="tblText" style="float: left; background-color: rgb(0, 0, 0);" width="600" cellspacing="0" cellpadding="0" border="0" align="left"><tbody><tr><td name="tblCell" class="tblCell" style="padding: 10px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;" valign="top" align="left"><div style="line-height: 150%; text-align: center;"><span style="color: #ffffff;"><strong>CONOCE NUESTROS PRODUCTOS
    <br></strong></span></div></td></tr></tbody>
    </table></th></tr></tbody>
    </table></td></tr></tbody>
    </table></div><div id="dv_6" class="blk_wrapper" style="">
    <table class="blk" name="blk_image" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td>
    <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="bmeImage" style="border-collapse: collapse;padding-left:20px; padding-right: 20px;padding-top:20px; padding-bottom: 20px; " align="center"><img
     src="https://images.benchmarkemail.com/client1381227/image13366967.png" class="mobile-img-large" style="max-width: 1600px; display: block; border-radius: 0px;" alt="" data-radius="0" width="560" border="0"></td></tr></tbody>
    </table></td></tr></tbody>
    </table></div></td></tr>   </tbody>
    </table></td> </tr>  <tr id="section_5" class="flexible-section" data-columns="1" data-section-type="bmeFooter"><td class="blk_container bmeHolder" name="bmeFooter" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(230, 230, 232);" width="100%" valign="top" bgcolor="#e6e6e8" align="center"><div id="dv_4" class="blk_wrapper" style="">
    <table class="blk" name="blk_social_follow" style="background-color: rgb(0, 0, 0);" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="tblCellMain" style="padding-top:15px; padding-bottom:15px; padding-left:20px; padding-right:20px;" align="center">
    <table class="tblContainer mblSocialContain" style="text-align:center;" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr><td class="tdItemContainer">
    <table class="mblSocialContain" style="table-layout: auto;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="bmeSocialTD" class="bmeSocialTD" valign="top"><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->
    <table class="bmeFollowItem" type="website" style="float: left; display: block;" cellspacing="0" cellpadding="0" border="0" align="left"><tbody><tr><td class="bmeFollowItemIcon" gutter="20" style="padding-right:20px;height:20px;" width="24" align="left"><a href="https://clt1381227.benchmarkurl.com/c/l?u=ED84D83&e=158C91D&c=15136B&t=1&l=6AE75B9A&email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);" target="_blank"><img
     src="https://ui.benchmarkemail.com/images/editor/socialicons/wb_btn.png" alt="Website" style="display: block; max-width: 114px;" width="24" height="24" border="0"></a></td></tr></tbody>
    </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->
    <table class="bmeFollowItem" type="facebook" style="float: left; display: block;" cellspacing="0" cellpadding="0" border="0" align="left"><tbody><tr><td class="bmeFollowItemIcon" gutter="20" style="padding-right:20px;height:20px;" width="24" align="left"><a href="https://clt1381227.benchmarkurl.com/c/l?u=ED84D84&e=158C91D&c=15136B&t=1&l=6AE75B9A&email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);" target="_blank"><img
     src="https://ui.benchmarkemail.com/images/editor/socialicons/fb_btn.png" alt="Facebook" style="display: block; max-width: 114px;" width="24" height="24" border="0"></a></td></tr></tbody>
    </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->
    <table class="bmeFollowItem" type="instagram" style="float: left; display: block;" cellspacing="0" cellpadding="0" border="0" align="left"><tbody><tr><td class="bmeFollowItemIcon" gutter="20" style="padding-right:20px;height:20px;" width="24" align="left"><a href="https://clt1381227.benchmarkurl.com/c/l?u=ED84D85&e=158C91D&c=15136B&t=1&l=6AE75B9A&email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);" target="_blank"><img
     src="https://ui.benchmarkemail.com/images/editor/socialicons/in_btn.png" alt="Instagram" style="display: block; max-width: 114px;" width="24" height="24" border="0"></a></td></tr></tbody>
    </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->
    <table class="bmeFollowItem" type="linkedin" style="float: left; display: block;" cellspacing="0" cellpadding="0" border="0" align="left"><tbody><tr><td class="bmeFollowItemIcon" gutter="20" style="padding-right:20px;height:20px;" width="24" align="left"><a href="https://clt1381227.benchmarkurl.com/c/l?u=ED84D86&e=158C91D&c=15136B&t=1&l=6AE75B9A&email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);" target="_blank"><img
     src="https://ui.benchmarkemail.com/images/editor/socialicons/li_btn.png" alt="LinkedIn" style="display: block; max-width: 114px;" width="24" height="24" border="0"></a></td></tr></tbody>
    </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->
    <table class="bmeFollowItem" type="youtube" style="float: left; display: block;" cellspacing="0" cellpadding="0" border="0" align="left"><tbody><tr><td class="bmeFollowItemIcon" gutter="20" style="height:20px;" width="24" align="left"><a href="https://clt1381227.benchmarkurl.com/c/l?u=ED84D87&e=158C91D&c=15136B&t=1&l=6AE75B9A&email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);" target="_blank"><img
     src="https://ui.benchmarkemail.com/images/editor/socialicons/yt_btn.png" alt="YouTube" style="display: block; max-width: 114px;" width="24" height="24" border="0"></a></td></tr></tbody>
    </table></td></tr></tbody>
    </table></td></tr></tbody>
    </table></td></tr></tbody>
    </table></div></td></tr> </tbody>
    </table> </td></tr></tbody>
    </table></td></tr></tbody>
    </table>
    <!-- Test Path -->
    </body>
  ';

      return $html;

  }

  public function mensajeVacanteAgotada(){

    $html = '
    <body topmargin="0" leftmargin="0" style="height: 100% !important; margin: 0; padding: 0; width: 100% !important;min-width: 100%;"><img
     src="https://clt1381227.benchmarkurl.com/c/o?e=158C91B&c=15136B&t=1&l=6AE75B9A&email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&relid=" alt="" border="0" style="display:none;" height="1" width="1">

    <table name="bmeMainBody" style="background-color: rgb(240, 240, 240);" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#f0f0f0"><tbody><tr><td width="100%" valign="top" align="center">
    <table name="bmeMainColumnParentTable" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="bmeMainColumnParent" style="border-collapse: separate; border: 0px none transparent; border-radius: 0px; border-spacing: 0px; overflow: visible;">
    <table name="bmeMainColumn" class="bmeMainColumn bmeHolder" style="max-width: 600px; overflow: visible; border-radius: 0px; border-collapse: separate; border-spacing: 0px;" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr id="section_1" class="flexible-section" data-columns="1" data-section-type="bmePreHeader"><td class="blk_container bmeHolder" name="bmePreHeader" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(230, 230, 232);" width="100%" valign="top" bgcolor="#e6e6e8" align="center"><div id="dv_16" class="blk_wrapper" style="">
    <table class="blk" name="blk_divider" style="background-color: rgb(53, 230, 218);" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="tblCellMain" style="padding: 2px 0px 3px;">
    <table class="tblLine" style="border-top: 1px none rgb(228, 228, 228); min-width: 1px;" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td><span></span></td></tr></tbody>
    </table></td></tr></tbody>
    </table></div></td></tr>   <tr><td class="bmeHolder" name="bmeMainContentParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px; overflow: hidden;" width="100%" valign="top" align="center">
    <table name="bmeMainContent" style="border-radius: 0px; border-collapse: separate; border-spacing: 0px; border: 0px none transparent; overflow: visible;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr id="section_2" class="flexible-section" data-columns="1"><td class="blk_container bmeHolder" name="bmeHeader" style="border: 0px none transparent; background-color: rgb(255, 255, 255);" width="100%" valign="top" bgcolor="#ffffff" align="center"><div id="dv_5" class="blk_wrapper" style="">
    <table class="blk" name="blk_image" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td>
    <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="bmeImage" style="border-collapse: collapse; padding: 0px;" align="center"><img
     src="https://images.benchmarkemail.com/client1381227/image13347496.jpg" class="mobile-img-large" style="max-width: 828px; display: block; border-radius: 0px;" alt="" data-radius="0" data-original-max-width="828" width="600" border="0"></td></tr></tbody>
    </table></td></tr></tbody>
    </table></div></td></tr> <tr id="section_3" class="flexible-section" data-columns="1"><td class="blk_container bmeHolder bmeBody" name="bmeBody" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: rgb(255, 255, 255);" width="100%" valign="top" bgcolor="#ffffff" align="center"><div id="dv_10" class="blk_wrapper" style="">
    <table class="blk" name="blk_boxtext" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="bmeBoxContainer" style="padding: 0px;" align="center">
    <table name="tblText" class="tblText" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td style="padding: 20px; font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 14px; color: rgb(56, 56, 56); border-width: 1px; border-style: none; border-color: rgb(225, 225, 225); background-color: rgb(255, 255, 255); border-collapse: collapse; word-break: break-word;" name="tblCell" class="tblCell" valign="top" align="left"><div style="text-align: left;"><span style="color: #000000; font-size: 14px;"><strong>¡Hola!</strong></span></div>
    <div style="text-align: justify;">
    <div>&nbsp;</div>
    <div style="text-align: justify;"><span style="font-size: 12px; color: #000000;">Gracias por tu interés en el curso gratuito <span style="line-height: 125%;"><strong>"Introducción a la Analítica de Datos"</strong>. </span>Queremos comentarte que el límite de vacantes directas disponibles ya ha sido cubierto. </span></div>
    <div>&nbsp;</div>
    <div style="text-align: justify;"><span style="font-size: 12px; color: #000000;">¡Pero no te desanimes! Participarás del sorteo de vacantes adicionales el jueves 19 de enero. De resultar ganador(a), te enviaremos un correo con los accesos correspondientes para ingresar a esta capacitación online 100% gratuita.</span></div>
    </div></td></tr></tbody>
    </table></td></tr></tbody>
    </table></div><div id="dv_2" class="blk_wrapper" style="">
    <table class="blk" name="blk_text" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td>
    <table class="bmeContainerRow" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><th class="tdPart" style="background-color: rgb(0, 0, 0);" valign="top" align="center">
    <table name="tblText" class="tblText" style="float: left; background-color: rgb(0, 0, 0);" width="600" cellspacing="0" cellpadding="0" border="0" align="left"><tbody><tr><td name="tblCell" class="tblCell" style="padding: 10px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;" valign="top" align="left"><div style="text-align: center;"><span style="color: #ffffff;"><strong>CONOCE NUESTROS PRODUCTOS</strong></span></div></td></tr></tbody>
    </table></th></tr></tbody>
    </table></td></tr></tbody>
    </table></div><div id="dv_3" class="blk_wrapper" style="">
    <table class="blk" name="blk_image" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td>
    <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="bmeImage" style="border-collapse: collapse;padding-left:20px; padding-right: 20px;padding-top:20px; padding-bottom: 20px; " align="center"><img
     src="https://images.benchmarkemail.com/client1381227/image13366967.png" class="mobile-img-large" style="max-width: 1600px; display: block; border-radius: 0px;" alt="" data-radius="0" width="560" border="0"></td></tr></tbody>
    </table></td></tr></tbody>
    </table></div></td></tr>   </tbody>
    </table></td> </tr>  <tr id="section_5" class="flexible-section" data-columns="1" data-section-type="bmeFooter"><td class="blk_container bmeHolder" name="bmeFooter" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(230, 230, 232);" width="100%" valign="top" bgcolor="#e6e6e8" align="center"><div id="dv_4" class="blk_wrapper" style="">
    <table class="blk" name="blk_social_follow" style="background-color: rgb(0, 0, 0);" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="tblCellMain" style="padding-top:15px; padding-bottom:15px; padding-left:20px; padding-right:20px;" align="center">
    <table class="tblContainer mblSocialContain" style="text-align:center;" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr><td class="tdItemContainer">
    <table class="mblSocialContain" style="table-layout: auto;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td name="bmeSocialTD" class="bmeSocialTD" valign="top"><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->
    <table class="bmeFollowItem" type="website" style="float: left; display: block;" cellspacing="0" cellpadding="0" border="0" align="left"><tbody><tr><td class="bmeFollowItemIcon" gutter="20" style="padding-right:20px;height:20px;" width="24" align="left"><a href="https://clt1381227.benchmarkurl.com/c/l?u=ED8424F&e=158C91B&c=15136B&t=1&l=6AE75B9A&email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);" target="_blank"><img
     src="https://ui.benchmarkemail.com/images/editor/socialicons/wb_btn.png" alt="Website" style="display: block; max-width: 114px;" width="24" height="24" border="0"></a></td></tr></tbody>
    </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->
    <table class="bmeFollowItem" type="facebook" style="float: left; display: block;" cellspacing="0" cellpadding="0" border="0" align="left"><tbody><tr><td class="bmeFollowItemIcon" gutter="20" style="padding-right:20px;height:20px;" width="24" align="left"><a href="https://clt1381227.benchmarkurl.com/c/l?u=ED84250&e=158C91B&c=15136B&t=1&l=6AE75B9A&email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);" target="_blank"><img
     src="https://ui.benchmarkemail.com/images/editor/socialicons/fb_btn.png" alt="Facebook" style="display: block; max-width: 114px;" width="24" height="24" border="0"></a></td></tr></tbody>
    </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->
    <table class="bmeFollowItem" type="instagram" style="float: left; display: block;" cellspacing="0" cellpadding="0" border="0" align="left"><tbody><tr><td class="bmeFollowItemIcon" gutter="20" style="padding-right:20px;height:20px;" width="24" align="left"><a href="https://clt1381227.benchmarkurl.com/c/l?u=ED84251&e=158C91B&c=15136B&t=1&l=6AE75B9A&email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);" target="_blank"><img
     src="https://ui.benchmarkemail.com/images/editor/socialicons/in_btn.png" alt="Instagram" style="display: block; max-width: 114px;" width="24" height="24" border="0"></a></td></tr></tbody>
    </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->
    <table class="bmeFollowItem" type="linkedin" style="float: left; display: block;" cellspacing="0" cellpadding="0" border="0" align="left"><tbody><tr><td class="bmeFollowItemIcon" gutter="20" style="padding-right:20px;height:20px;" width="24" align="left"><a href="https://clt1381227.benchmarkurl.com/c/l?u=ED84252&e=158C91B&c=15136B&t=1&l=6AE75B9A&email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);" target="_blank"><img
     src="https://ui.benchmarkemail.com/images/editor/socialicons/li_btn.png" alt="LinkedIn" style="display: block; max-width: 114px;" width="24" height="24" border="0"></a></td></tr></tbody>
    </table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->
    <table class="bmeFollowItem" type="youtube" style="float: left; display: block;" cellspacing="0" cellpadding="0" border="0" align="left"><tbody><tr><td class="bmeFollowItemIcon" gutter="20" style="height:20px;" width="24" align="left"><a href="https://clt1381227.benchmarkurl.com/c/l?u=ED84253&e=158C91B&c=15136B&t=1&l=6AE75B9A&email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);" target="_blank"><img
     src="https://ui.benchmarkemail.com/images/editor/socialicons/yt_btn.png" alt="YouTube" style="display: block; max-width: 114px;" width="24" height="24" border="0"></a></td></tr></tbody>
    </table></td></tr></tbody>
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

  public function mensajeSeisMenosCorrectas($contador){

    $html = '<table width="100%" cellspacing="0" cellpadding="0" border="0" name="bmeMainBody" style="background-color: rgb(240, 240, 240);" bgcolor="#f0f0f0"><tbody><tr><td width="100%" valign="top" align="center">
<table cellspacing="0" cellpadding="0" border="0" name="bmeMainColumnParentTable"><tbody><tr><td name="bmeMainColumnParent" style="border-collapse: separate; border: 0px none transparent; border-radius: 0px; border-spacing: 0px; overflow: visible;">
<table name="bmeMainColumn" class="bmeMainColumn bmeHolder" style="max-width: 600px; overflow: visible; border-radius: 0px; border-collapse: separate; border-spacing: 0px;" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr id="section_1" class="flexible-section" data-columns="1" data-section-type="bmePreHeader"><td width="100%" class="blk_container bmeHolder" name="bmePreHeader" valign="top" align="center" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(230, 230, 232);" bgcolor="#e6e6e8"><div id="dv_16" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(22, 167, 224);"><tbody><tr><td class="tblCellMain" style="padding: 2px 0px;">
<table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px none rgb(228, 228, 228); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody>
</table></td></tr></tbody>
</table></div></td></tr>   <tr><td width="100%" class="bmeHolder" valign="top" align="center" name="bmeMainContentParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px; overflow: hidden;">
<table name="bmeMainContent" style="border-radius: 0px; border-collapse: separate; border-spacing: 0px; border: 0px none transparent; overflow: visible;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr id="section_2" class="flexible-section" data-columns="1"><td width="100%" class="blk_container bmeHolder" name="bmeHeader" valign="top" align="center" style="border: 0px none transparent; background-color: rgb(255, 255, 255);" bgcolor="#ffffff"><div id="dv_17" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td>
<table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 0px; background-color: rgb(255, 255, 255);"><img
 src="https://images.benchmarkemail.com/client1381227/image13684309.jpg" class="mobile-img-large" width="600" style="max-width: 1035px; display: block; border-radius: 0px;" alt="dmcperu" data-radius="0" border="0" data-original-max-width="1035"></td></tr></tbody>
</table></td></tr></tbody>
</table></div><div id="dv_11" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text"><tbody><tr><td>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><th class="tdPart" valign="top" align="center" style="background-color: rgb(255, 255, 255);">
<table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float: left; background-color: rgb(255, 255, 255);" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="line-height: 150%;">
<div style="line-height: 125%;">
<div style="text-align: justify; line-height: 125%;">
<div style="line-height: 125%;">
<div style="line-height: 125%;">
<div style="text-align: justify; line-height: 125%;">
<div style="line-height: 125%;">
<div dir="auto" style="text-align: justify;"><strong><span style="font-size: 12px; line-height: 125%; color: #000000;">
<em><span style="line-height: 125%;">¡Gracias por tu participación en este reto!&nbsp;</span></em></span></strong></div>
<div dir="auto" style="text-align: justify;">&nbsp;</div>
<div dir="auto" style="text-align: justify;"><span style="font-size: 12px; line-height: 125%; color: #000000;"><span style="line-height: 125%;">Buscando conmemorar el Día de las Matemáticas, creamos este cuestionario para poner a prueba tus conocimientos y difundir datos interesantes sobre esta fecha tan especial. Como beneficio por tu participación y desempeño en esta prueba podrás acceder a beneficios exclusivos.</span></span></div>
<div dir="auto" style="text-align: justify;">&nbsp;</div>
<div dir="auto" style="text-align: center;"><strong><span style="font-size: 12px; line-height: 125%; color: #000000;"><span style="line-height: 125%;">Tu resultado:</span></span></strong></div>
<div dir="auto" style="text-align: center;"><span style="font-size: 12px; line-height: 125%; color: #000000;"><span style="text-decoration: underline;"><span style="line-height: 125%;"><span style="line-height: 125%;">'.$contador.'  </span></span></span><span style="line-height: 125%;"><span style="line-height: 125%;"><span style="text-decoration: underline;">respuestas correctas</span> de 10 preguntas.</span></span></span></div>
<div dir="auto" style="text-align: center;">&nbsp;</div>
<div dir="auto" style="text-align: center;"><strong><span style="color: #000000; font-size: 12px; line-height: 125%;">Tu promoción:</span></strong></div>
<div dir="auto" style="text-align: center;"><span style="color: #000000; font-size: 12px; line-height: 125%;"><span style="text-decoration: underline;">50% de descuento</span> en cursos y especializaciones.</span></div>
<div dir="auto" style="text-align: justify;">&nbsp;</div>
<div dir="auto" style="text-align: justify;">&nbsp;</div>
<div dir="auto" style="text-align: justify;"><span style="font-size: 12px; line-height: 125%; color: #000000;">Refuerza tus conocimientos en matemáticas y otras técnicas analíticas con nuestras más de 40 capacitaciones disponibles para ti.</span></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div></td></tr></tbody>
</table></th></tr></tbody>
</table></td></tr></tbody>
</table></div></td></tr> <tr id="section_3" class="flexible-section" data-columns="1"><td width="100%" class="blk_container bmeHolder bmeBody" name="bmeBody" valign="top" align="center" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: rgb(255, 255, 255);" bgcolor="#ffffff"><div id="dv_2" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td>
<table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 0px; background-color: rgb(255, 255, 255);"><img
 src="https://images.benchmarkemail.com/client1381227/image13684545.jpg" class="mobile-img-large" width="600" style="max-width: 1080px; display: block; border-radius: 0px;" alt="dmcperu" data-radius="0" border="0" data-original-max-width="1080"></td></tr></tbody>
</table></td></tr></tbody>
</table></div><div id="dv_3" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td>
<table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 20px 0px; background-color: rgb(255, 255, 255);"><a href="https://clt1381227.benchmarkurl.com/c/l?u=F27A987&e=15ECDC0&c=15136B&t=1&l=6AE75B9A&email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&seq=1" target="_blank" draggable="false"><img
 src="https://images.benchmarkemail.com/client1381227/image12154714.png" width="225" style="max-width: 225px; display: block; border-radius: 0px;" alt="dmcperu" data-radius="0" border="0" data-original-max-width="225"></a></td></tr></tbody>
</table></td></tr></tbody>
</table></div></td></tr> <tr id="section_6" class="flexible-section" data-columns="2"><td width="100%">
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
<table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="website" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://clt1381227.benchmarkurl.com/c/l?u=F279DC2&e=15ECDC0&c=15136B&t=1&l=6AE75B9A&email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);" target="_blank"><img
 src="https://ui.benchmarkemail.com/images/editor/socialicons/wb_btn.png" alt="dmcperu" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody>
</table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->
<table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="facebook" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://clt1381227.benchmarkurl.com/c/l?u=F279DC3&e=15ECDC0&c=15136B&t=1&l=6AE75B9A&email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);" target="_blank"><img
 src="https://ui.benchmarkemail.com/images/editor/socialicons/fb_btn.png" alt="dmcperu" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody>
</table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->
<table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="instagram" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://clt1381227.benchmarkurl.com/c/l?u=F279DC4&e=15ECDC0&c=15136B&t=1&l=6AE75B9A&email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);" target="_blank"><img
 src="https://ui.benchmarkemail.com/images/editor/socialicons/in_btn.png" alt="dmcperu" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody>
</table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->
<table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="linkedin" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://clt1381227.benchmarkurl.com/c/l?u=F279DC5&e=15ECDC0&c=15136B&t=1&l=6AE75B9A&email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);" target="_blank"><img
 src="https://ui.benchmarkemail.com/images/editor/socialicons/li_btn.png" alt="dmcperu" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody>
</table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->
<table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="youtube" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="height:20px;"><a href="https://clt1381227.benchmarkurl.com/c/l?u=F279DC6&e=15ECDC0&c=15136B&t=1&l=6AE75B9A&email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);" target="_blank"><img
 src="https://ui.benchmarkemail.com/images/editor/socialicons/yt_btn.png" alt="dmcperu" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody>
</table></td></tr></tbody>
</table></td></tr></tbody>
</table></td></tr></tbody>
</table></div></td></tr> </tbody>
</table> </td></tr></tbody>
</table></td></tr></tbody>
</table>
    ';
return $html;
  }

  public function mensajeSieteMasCorrectas($contador){

    $html = '<table width="100%" cellspacing="0" cellpadding="0" border="0" name="bmeMainBody" style="background-color: rgb(240, 240, 240);" bgcolor="#f0f0f0"><tbody><tr><td width="100%" valign="top" align="center">
<table cellspacing="0" cellpadding="0" border="0" name="bmeMainColumnParentTable"><tbody><tr><td name="bmeMainColumnParent" style="border-collapse: separate; border: 0px none transparent; border-radius: 0px; border-spacing: 0px; overflow: visible;">
<table name="bmeMainColumn" class="bmeMainColumn bmeHolder" style="max-width: 600px; overflow: visible; border-radius: 0px; border-collapse: separate; border-spacing: 0px;" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr id="section_1" class="flexible-section" data-columns="1" data-section-type="bmePreHeader"><td width="100%" class="blk_container bmeHolder" name="bmePreHeader" valign="top" align="center" style="color: rgb(102, 102, 102); border: 0px none transparent; background-color: rgb(230, 230, 232);" bgcolor="#e6e6e8"><div id="dv_16" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_divider" style="background-color: rgb(22, 167, 224);"><tbody><tr><td class="tblCellMain" style="padding: 2px 0px;">
<table class="tblLine" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-top: 1px none rgb(228, 228, 228); min-width: 1px;"><tbody><tr><td><span></span></td></tr></tbody>
</table></td></tr></tbody>
</table></div></td></tr>   <tr><td width="100%" class="bmeHolder" valign="top" align="center" name="bmeMainContentParent" style="border: 0px none transparent; border-radius: 0px; border-collapse: separate; border-spacing: 0px; overflow: hidden;">
<table name="bmeMainContent" style="border-radius: 0px; border-collapse: separate; border-spacing: 0px; border: 0px none transparent; overflow: visible;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center"><tbody><tr id="section_2" class="flexible-section" data-columns="1"><td width="100%" class="blk_container bmeHolder" name="bmeHeader" valign="top" align="center" style="border: 0px none transparent; background-color: rgb(255, 255, 255);" bgcolor="#ffffff"><div id="dv_17" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td>
<table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 0px; background-color: rgb(255, 255, 255);"><img
 src="https://images.benchmarkemail.com/client1381227/image13684309.jpg" class="mobile-img-large" width="600" style="max-width: 1035px; display: block; border-radius: 0px;" alt="dmcperu" data-radius="0" border="0" data-original-max-width="1035"></td></tr></tbody>
</table></td></tr></tbody>
</table></div><div id="dv_11" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text"><tbody><tr><td>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><th class="tdPart" valign="top" align="center" style="background-color: rgb(255, 255, 255);">
<table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float: left; background-color: rgb(255, 255, 255);" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word;"><div style="line-height: 150%;">
<div style="line-height: 125%;">
<div style="text-align: justify; line-height: 125%;">
<div style="line-height: 125%;">
<div style="line-height: 125%;">
<div style="text-align: justify; line-height: 125%;">
<div style="line-height: 125%;">
<div dir="auto" style="text-align: justify;"><strong><span style="font-size: 12px; line-height: 125%; color: #000000;">
<em><span style="line-height: 125%;">¡Gracias por tu participación en este reto!&nbsp;</span></em></span></strong></div>
<div dir="auto" style="text-align: justify;">&nbsp;</div>
<div dir="auto" style="text-align: justify;"><span style="font-size: 12px; line-height: 125%; color: #000000;"><span style="line-height: 125%;">Buscando conmemorar el Día de las Matemáticas, creamos este cuestionario para poner a prueba tus conocimientos y difundir datos interesantes sobre esta fecha tan especial. Como beneficio por tu participación y desempeño en esta prueba podrás acceder a beneficios exclusivos.</span></span></div>
<div dir="auto" style="text-align: justify;">&nbsp;</div>
<div dir="auto" style="text-align: center;"><strong><span style="font-size: 12px; line-height: 125%; color: #000000;"><span style="line-height: 125%;">Tu resultado:</span></span></strong></div>
<div dir="auto" style="text-align: center;"><span style="font-size: 12px; line-height: 125%; color: #000000;"><span style="text-decoration: underline;"><span style="line-height: 125%;"><span style="line-height: 125%;">'.$contador.' </span></span></span><span style="line-height: 125%;"><span style="line-height: 125%;"><span style="text-decoration: underline;">respuestas correctas</span> de 10 preguntas.</span></span></span></div>
<div dir="auto" style="text-align: center;">&nbsp;</div>
<div dir="auto" style="text-align: center;"><strong><span style="color: #000000; font-size: 12px; line-height: 125%;">Tu promoción:</span></strong></div>
<div dir="auto" style="text-align: center;"><span style="color: #000000; font-size: 12px; line-height: 125%;"><span style="text-decoration: underline;">60% de descuento</span> en cursos y especializaciones.</span></div>
<div dir="auto" style="text-align: justify;">&nbsp;</div>
<div dir="auto" style="text-align: justify;">&nbsp;</div>
<div dir="auto" style="text-align: justify;"><span style="font-size: 12px; line-height: 125%; color: #000000;">Refuerza tus conocimientos en matemáticas y otras técnicas analíticas con nuestras más de 40 capacitaciones disponibles para ti.</span></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div></td></tr></tbody>
</table></th></tr></tbody>
</table></td></tr></tbody>
</table></div></td></tr> <tr id="section_3" class="flexible-section" data-columns="1"><td width="100%" class="blk_container bmeHolder bmeBody" name="bmeBody" valign="top" align="center" style="color: rgb(56, 56, 56); border: 0px none transparent; background-color: rgb(255, 255, 255);" bgcolor="#ffffff"><div id="dv_2" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td>
<table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 0px; background-color: rgb(255, 255, 255);"><img
 src="https://images.benchmarkemail.com/client1381227/image13684544.jpg" class="mobile-img-large" width="600" style="max-width: 1080px; display: block; border-radius: 0px;" alt="dmcperu" data-radius="0" border="0" data-original-max-width="1080"></td></tr></tbody>
</table></td></tr></tbody>
</table></div><div id="dv_3" class="blk_wrapper" style="">
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td>
<table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 20px 0px; background-color: rgb(255, 255, 255);"><a href="https://clt1381227.benchmarkurl.com/c/l?u=F279E32&e=15ECC06&c=15136B&t=1&l=6AE75B9A&email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&seq=1" target="_blank" draggable="false"><img
 src="https://images.benchmarkemail.com/client1381227/image12154714.png" width="225" style="max-width: 225px; display: block; border-radius: 0px;" alt="dmcperu" data-radius="0" border="0" data-original-max-width="225"></a></td></tr></tbody>
</table></td></tr></tbody>
</table></div></td></tr> <tr id="section_6" class="flexible-section" data-columns="2"><td width="100%">
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
<table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="website" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://clt1381227.benchmarkurl.com/c/l?u=F278DD3&e=15ECC06&c=15136B&t=1&l=6AE75B9A&email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);" target="_blank"><img
 src="https://ui.benchmarkemail.com/images/editor/socialicons/wb_btn.png" alt="dmcperu" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody>
</table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->
<table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="facebook" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://clt1381227.benchmarkurl.com/c/l?u=F278DD4&e=15ECC06&c=15136B&t=1&l=6AE75B9A&email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);" target="_blank"><img
 src="https://ui.benchmarkemail.com/images/editor/socialicons/fb_btn.png" alt="dmcperu" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody>
</table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->
<table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="instagram" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://clt1381227.benchmarkurl.com/c/l?u=F278DD5&e=15ECC06&c=15136B&t=1&l=6AE75B9A&email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);" target="_blank"><img
 src="https://ui.benchmarkemail.com/images/editor/socialicons/in_btn.png" alt="dmcperu" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody>
</table>
<table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="linkedin" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="padding-right:20px;height:20px;"><a href="https://clt1381227.benchmarkurl.com/c/l?u=F278DD6&e=15ECC06&c=15136B&t=1&l=6AE75B9A&email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);" target="_blank"><img
 src="https://ui.benchmarkemail.com/images/editor/socialicons/li_btn.png" alt="dmcperu" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody>
</table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->
<table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="youtube" style="float: left; display: block;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="24" style="height:20px;"><a href="https://clt1381227.benchmarkurl.com/c/l?u=F278DD7&e=15ECC06&c=15136B&t=1&l=6AE75B9A&email=BW8dJ7cz51frs5FRg67sMXlXE%2BueQKLKeeWRGMtRs94%3D&seq=1" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: none; border-width: 0px; border-color: rgb(0, 0, 238);" target="_blank"><img
 src="https://ui.benchmarkemail.com/images/editor/socialicons/yt_btn.png" alt="dmcperu" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody>
</table></td></tr></tbody>
</table></td></tr></tbody>
</table></td></tr></tbody>
</table></div></td></tr> </tbody>
</table> </td></tr></tbody>
</table></td></tr></tbody>
</table>
    ';
  return $html;
  }

}





 ?>
