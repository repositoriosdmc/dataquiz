<?php



require_once "gestionbd.php";



class cuestionario
{





  //ciudad en provincia

  public function registrar_cuestionario(
    $nombres,
    $apellidos,
    $tDocumento,
    $num_documento,
    $genero,

    $phone,
    $edad,
    $correo,
    $pais,
    $ciudad,
    $fecha
  ) {



    try {

      $gbd = Gestionbd::getInstancia();



      $sql = "insert into ficha_contacto(FICHA_CONTACTO_NOMBRES,FICHA_CONTACTO_APELLIDOS,FICHA_CONTACTO_TIPO_DOC,FICHA_CONTACTO_NUM_DOCUMENTO,

FICHA_CONTACTO_SEXO,FICHA_CONTACTO_TELEFONO,FICHA_CONTACTO_EDAD,FICHA_CONTACTO_EMAIL, FICHA_CONTACTO_PAIS,FICHA_CONTACTO_PROVINCIA,FECHA_REGISTRO)

          values

       (:nombres,:apellidos,:tDocumento,:num_documento,:genero,:phone,:edad,

       :correo,:pais,:ciudad,:fecha)";



      $cmd = $gbd->prepare($sql);



      $cmd->bindparam(':nombres', $nombres);

      $cmd->bindparam(':apellidos', $apellidos);

      $cmd->bindparam(':tDocumento', $tDocumento);

      $cmd->bindparam(':num_documento', $num_documento);

      $cmd->bindparam(':genero', $genero);

      $cmd->bindparam(':phone', $phone);

      $cmd->bindparam(':edad', $edad);

      $cmd->bindparam(':correo', $correo);

      $cmd->bindparam(':pais', $pais);

      $cmd->bindparam(':ciudad', $ciudad);



      $cmd->bindparam(':fecha', $fecha);

      if ($cmd->execute()) {

        return $gbd->lastInsertId();
      } else {

        return "no registro";
      }
    } catch (Exception $e) {

      echo "ERROR: " . $e->getMessage();
    }
  }



  //codigo

  public function registrar_codigo($id_ficha, $codigo_ficha)
  {



    $gbd = Gestionbd::getInstancia();



    $sql = "insert into ficha_contacto_capacitacion(FICHA_CONTACTO_ID,CAPACITACION_ID)

        values

     (:FICHA_CONTACTO_ID,:CAPACITACION_ID)";



    $cmd = $gbd->prepare($sql);



    $cmd->bindparam(':FICHA_CONTACTO_ID', $id_ficha);

    $cmd->bindparam(':CAPACITACION_ID', $codigo_ficha);



    if ($cmd->execute()) {

      return "ok";
    } else {

      return "no registro";
    }
  }



  //



  public function registrar_suscritos_perfil_ds(
    $id_ficha_contacto,
    $situacion_laboral,
    $sector_laboral,

    $cantidad_trabajadores,
    $puesto_trabajo,
    $dominio_ingles,
    $capacitacion,
    $modalidad_presencial,
    $modalidad_vivo,
    $modalidad_grabadoVivo,
    $modalidad_grabado,
    $modalidad_otros,
    $mod_capacitacion,

    $capacitacion_institutos_nacionales,
    $capacitacion_institutos_extranjeros,
    $capacitacion_Unacionales,

    $capacitacion_Uextranjeros,
    $capacitacion_coursera,
    $capacitacion_platzi,
    $capacitacion_udemy,
    $capacitacion_netzum,

    $capacitacion_edx,
    $capacitacion_datacamp,
    $capacitacion_khan,
    $capacitacion_Codeacademy,

    $capacitacion_Kagle,
    $capacitacion_Analytics_Vidhya,
    $capacitacion_autodidacta,
    $capacitacion_otros,

    $consideracion_institucion,
    $bd,
    $vizualizacion,
    $etl,
    $programacion,
    $analiticas,
    $cloud,
    $big_data,

    $herramientas_SPSS,
    $herramientas_SAS,
    $herramientas_MINITAB,
    $herramientas_RAPIDMINER,
    $herramientas_R,

    $herramientas_PYTHON,
    $herramientas_EXCEL,
    $herramientas_ANACONDA,
    $herramientas_SQL,
    $herramientas_ORACLE,

    $herramientas_TENSORFLOW,
    $herramientas_KERAS,
    $herramientas_POWER_BI,
    $herramientas_TABLEAU,

    $herramientas_APACHE_SPARK,
    $herramientas_NINGUNA,
    $herramientas_otros,

    $uso_actual_SPSS,
    $uso_actual_SAS,
    $uso_actual_MINITAB,
    $uso_actual_RAPIDMINER,
    $uso_actual_R,

    $uso_actual_PYTHON,
    $uso_actual_EXCEL,
    $uso_actual_ANACONDA,

    $uso_actual_SQL,
    $uso_actual_ORACLE,
    $uso_actual_TENSORFLOW,
    $uso_actual_KERAS,
    $uso_actual_POWER_BI,

    $uso_actual_TABLEAU,
    $uso_actual_APACHE_SPARK,
    $uso_actual_NINGUNA,
    $uso_actual_otro,
    $mejor_herramienta,

    $metodoAutomatico_Regression,
    $metodoAutomatico_Decision_Trees,
    $metodoAutomatico_Clustering,

    $metodoAutomatico_PCA,
    $metodoAutomatico_Visualizacion_datos,
    $metodoAutomatico_Estadistica_descriptiva,

    $metodoAutomatico_Vector_Machine,
    $metodoAutomatico_Random_Forest,
    $metodoAutomatico_Nearest_Neighbours,

    $metodoAutomatico_Times_Series,
    $metodoAutomatico_Ensemble_Methods,
    $metodoAutomatico_Boosting,

    $metodoAutomatico_Text_Minng,
    $metodoAutomatico_Neural_Networds,
    $metodoAutomatico_Boosted_Machines,

    $metodoAutomatico_Anomaly_Detection,
    $metodoAutomatico_Recommendation_systems,
    $metodoAutomatico_otros,

    $metodos_aprendizaje,
    $correo_respuesta,
    $actividad_laboral,

    $rango_remuneracion_mensual,
    $cambio_trabajo_ultimo_año,
    $cambio_funciones_ultimo_año,
    $nivel_satisfaccion_trabajo,
    $nivel_satisfaccion_horario,
    $nivel_satisfaccion_remuneracion

  ) {

    try {

      $gbd = Gestionbd::getInstancia();



      $sql = "insert into cuestionario_perfil_ds(

  id_ficha_contacto,situacion_laboral,sector_laboral,cantidad_trabajadores,puesto_trabajo,

  dominio_ingles,capacitacion_ciencia_datos,modalidad_presencial,modalidad_vivo,modalidad_grabadoVivo,

  modalidad_grabado,modalidad_otros,modalidad_preferida,capacitacion_institutos_nacionales,

  capacitacion_institutos_extranjeros,capacitacion_Unacionales,capacitacion_Uextranjeros,

  capacitacion_coursera,capacitacion_platzi,capacitacion_udemy,capacitacion_netzum,

  capacitacion_edx,capacitacion_datacamp,capacitacion_khan,capacitacion_Codeacademy,

  capacitacion_Kagle,capacitacion_Analytics_Vidhya,capacitacion_autodidacta,capacitacion_otros,

  consideracion_institucion,radio_bd,radio_vizualizacion,radio_etl,radio_programacion,radio_analiticas,

  radio_cloud,radio_big_data,herramientas_SPSS,herramientas_SAS,herramientas_MINITAB,herramientas_RAPIDMINER,

  herramientas_R,herramientas_PYTHON,herramientas_EXCEL,herramientas_ANACONDA,herramientas_SQL,herramientas_ORACLE,

   herramientas_TENSORFLOW,herramientas_KERAS,herramientas_POWER_BI,herramientas_TABLEAU,

   herramientas_APACHE_SPARK,herramientas_NINGUNA,herramientas_otros,

   uso_actual_SPSS,uso_actual_SAS,uso_actual_MINITAB,uso_actual_RAPIDMINER,uso_actual_R,

    uso_actual_PYTHON,uso_actual_EXCEL,uso_actual_ANACONDA,

    uso_actual_SQL,uso_actual_ORACLE,uso_actual_TENSORFLOW,uso_actual_KERAS,uso_actual_POWER_BI,

    uso_actual_TABLEAU,uso_actual_APACHE_SPARK,uso_actual_NINGUNA,uso_actual_otro,mejor_herramienta,

    metodoAutomatico_Regression,metodoAutomatico_Decision_Trees,metodoAutomatico_Clustering,

metodoAutomatico_PCA,metodoAutomatico_Visualizacion_datos,metodoAutomatico_Estadistica_descriptiva,

metodoAutomatico_Vector_Machine,metodoAutomatico_Random_Forest,metodoAutomatico_Nearest_Neighbours,

metodoAutomatico_Times_Series,metodoAutomatico_Ensemble_Methods,metodoAutomatico_Boosting,

  metodoAutomatico_Text_Minng,metodoAutomatico_Neural_Networds,metodoAutomatico_Boosted_Machines,

  metodoAutomatico_Anomaly_Detection,metodoAutomatico_Recommendation_systems,

  metodoAutomatico_otros,metodos_aprendizaje,correo_respuesta,actividad_laboral,



  rango_remuneracion_mensual,cambio_trabajo_ultimo_año,cambio_funciones_ultimo_año,nivel_satisfaccion_trabajo,

  nivel_satisfaccion_horario,nivel_satisfaccion_remuneracion

)

        values

     (

 :id_ficha_contacto,:situacion_laboral,:sector_laboral,:cantidad_trabajadores,:puesto_trabajo,

:dominio_ingles,:capacitacion_ciencia_datos,:modalidad_presencial,:modalidad_vivo,:modalidad_grabadoVivo,

:modalidad_grabado,:modalidad_otros,:modalidad_preferida,:capacitacion_institutos_nacionales,

:capacitacion_institutos_extranjeros,:capacitacion_Unacionales,:capacitacion_Uextranjeros,

:capacitacion_coursera,:capacitacion_platzi,:capacitacion_udemy,:capacitacion_netzum,

:capacitacion_edx,:capacitacion_datacamp,:capacitacion_khan,:capacitacion_Codeacademy,

:capacitacion_Kagle,:capacitacion_Analytics_Vidhya,:capacitacion_autodidacta,:capacitacion_otros,

:consideracion_institucion,:radio_bd,:radio_vizualizacion,:radio_etl,:radio_programacion,

:radio_analiticas,:radio_cloud,:radio_big_data,:herramientas_SPSS,:herramientas_SAS

,:herramientas_MINITAB,:herramientas_RAPIDMINER,:herramientas_R,:herramientas_PYTHON,:herramientas_EXCEL,

:herramientas_ANACONDA,:herramientas_SQL,:herramientas_ORACLE,:herramientas_TENSORFLOW,

:herramientas_KERAS,:herramientas_POWER_BI,:herramientas_TABLEAU,:herramientas_APACHE_SPARK,

:herramientas_NINGUNA,:herramientas_otros,:uso_actual_SPSS,:uso_actual_SAS,:uso_actual_MINITAB,

:uso_actual_RAPIDMINER,:uso_actual_R,:uso_actual_PYTHON,:uso_actual_EXCEL,:uso_actual_ANACONDA,

:uso_actual_SQL,:uso_actual_ORACLE,:uso_actual_TENSORFLOW,:uso_actual_KERAS,:uso_actual_POWER_BI,

:uso_actual_TABLEAU,:uso_actual_APACHE_SPARK,:uso_actual_NINGUNA,:uso_actual_otro,:mejor_herramienta,

:metodoAutomatico_Regression,:metodoAutomatico_Decision_Trees,:metodoAutomatico_Clustering,

:metodoAutomatico_PCA,:metodoAutomatico_Visualizacion_datos,:metodoAutomatico_Estadistica_descriptiva,

:metodoAutomatico_Vector_Machine,:metodoAutomatico_Random_Forest,:metodoAutomatico_Nearest_Neighbours,

:metodoAutomatico_Times_Series,:metodoAutomatico_Ensemble_Methods,:metodoAutomatico_Boosting,

:metodoAutomatico_Text_Minng,:metodoAutomatico_Neural_Networds,:metodoAutomatico_Boosted_Machines,

:metodoAutomatico_Anomaly_Detection,:metodoAutomatico_Recommendation_systems,

:metodoAutomatico_otros,:metodos_aprendizaje,:correo_respuesta,:actividad_laboral,

:rango_remuneracion_mensual,:cambio_trabajo_ultimo_anio,:cambio_funciones_ultimo_anio,:nivel_satisfaccion_trabajo,

:nivel_satisfaccion_horario,:nivel_satisfaccion_remuneracion



     )";





      $cmd = $gbd->prepare($sql);



      $cmd->bindparam(':id_ficha_contacto', $id_ficha_contacto);

      $cmd->bindparam(':situacion_laboral', $situacion_laboral);

      $cmd->bindparam(':sector_laboral', $sector_laboral);

      $cmd->bindparam(':cantidad_trabajadores', $cantidad_trabajadores);

      $cmd->bindparam(':puesto_trabajo', $puesto_trabajo);

      $cmd->bindparam(':dominio_ingles', $dominio_ingles);

      $cmd->bindparam(':capacitacion_ciencia_datos', $capacitacion);

      $cmd->bindparam(':modalidad_presencial', $modalidad_presencial);

      $cmd->bindparam(':modalidad_vivo', $modalidad_vivo);

      $cmd->bindparam(':modalidad_grabadoVivo', $modalidad_grabadoVivo);

      $cmd->bindparam(':modalidad_grabado', $modalidad_grabado);

      $cmd->bindparam(':modalidad_otros', $modalidad_otros);

      $cmd->bindparam(':modalidad_preferida', $mod_capacitacion);

      //A17

      $cmd->bindparam(':capacitacion_institutos_nacionales', $capacitacion_institutos_nacionales);

      $cmd->bindparam(':capacitacion_institutos_extranjeros', $capacitacion_institutos_extranjeros);

      $cmd->bindparam(':capacitacion_Unacionales', $capacitacion_Unacionales);

      $cmd->bindparam(':capacitacion_Uextranjeros', $capacitacion_Uextranjeros);

      $cmd->bindparam(':capacitacion_coursera', $capacitacion_coursera);

      $cmd->bindparam(':capacitacion_platzi', $capacitacion_platzi);

      $cmd->bindparam(':capacitacion_udemy', $capacitacion_udemy);

      $cmd->bindparam(':capacitacion_netzum', $capacitacion_netzum);

      $cmd->bindparam(':capacitacion_edx', $capacitacion_edx);

      $cmd->bindparam(':capacitacion_datacamp', $capacitacion_datacamp);

      $cmd->bindparam(':capacitacion_khan', $capacitacion_khan);

      $cmd->bindparam(':capacitacion_Codeacademy', $capacitacion_Codeacademy);

      $cmd->bindparam(':capacitacion_Kagle', $capacitacion_Kagle);

      $cmd->bindparam(':capacitacion_Analytics_Vidhya', $capacitacion_Analytics_Vidhya);

      $cmd->bindparam(':capacitacion_autodidacta', $capacitacion_autodidacta);

      $cmd->bindparam(':capacitacion_otros', $capacitacion_otros);

      $cmd->bindparam(':consideracion_institucion', $consideracion_institucion);



      $cmd->bindparam(':radio_bd', $bd);

      $cmd->bindparam(':radio_vizualizacion', $vizualizacion);

      $cmd->bindparam(':radio_etl', $etl);

      $cmd->bindparam(':radio_programacion', $programacion);

      $cmd->bindparam(':radio_analiticas', $analiticas);

      $cmd->bindparam(':radio_cloud', $cloud);

      $cmd->bindparam(':radio_big_data', $big_data);



      //herramientas tecnologicas b2

      $cmd->bindparam(':herramientas_SPSS', $herramientas_SPSS);

      $cmd->bindparam(':herramientas_SAS', $herramientas_SAS);

      $cmd->bindparam(':herramientas_MINITAB', $herramientas_MINITAB);

      $cmd->bindparam(':herramientas_RAPIDMINER', $herramientas_RAPIDMINER);

      $cmd->bindparam(':herramientas_R', $herramientas_R);

      $cmd->bindparam(':herramientas_PYTHON', $herramientas_PYTHON);

      $cmd->bindparam(':herramientas_EXCEL', $herramientas_EXCEL);

      $cmd->bindparam(':herramientas_ANACONDA', $herramientas_ANACONDA);

      $cmd->bindparam(':herramientas_SQL', $herramientas_SQL);

      $cmd->bindparam(':herramientas_ORACLE', $herramientas_ORACLE);

      $cmd->bindparam(':herramientas_TENSORFLOW', $herramientas_TENSORFLOW);

      $cmd->bindparam(':herramientas_KERAS', $herramientas_KERAS);

      $cmd->bindparam(':herramientas_POWER_BI', $herramientas_POWER_BI);

      $cmd->bindparam(':herramientas_TABLEAU', $herramientas_TABLEAU);

      $cmd->bindparam(':herramientas_APACHE_SPARK', $herramientas_APACHE_SPARK);

      $cmd->bindparam(':herramientas_NINGUNA', $herramientas_NINGUNA);

      $cmd->bindparam(':herramientas_otros', $herramientas_otros);



      //b3

      $cmd->bindparam(':uso_actual_SPSS', $uso_actual_SPSS);

      $cmd->bindparam(':uso_actual_SAS', $uso_actual_SAS);

      $cmd->bindparam(':uso_actual_MINITAB', $uso_actual_MINITAB);

      $cmd->bindparam(':uso_actual_RAPIDMINER', $uso_actual_RAPIDMINER);

      $cmd->bindparam(':uso_actual_R', $uso_actual_R);

      $cmd->bindparam(':uso_actual_PYTHON', $uso_actual_PYTHON);

      $cmd->bindparam(':uso_actual_EXCEL', $uso_actual_EXCEL);

      $cmd->bindparam(':uso_actual_ANACONDA', $uso_actual_ANACONDA);



      $cmd->bindparam(':uso_actual_SQL', $uso_actual_SQL);

      $cmd->bindparam(':uso_actual_ORACLE', $uso_actual_ORACLE);

      $cmd->bindparam(':uso_actual_TENSORFLOW', $uso_actual_TENSORFLOW);

      $cmd->bindparam(':uso_actual_KERAS', $uso_actual_KERAS);

      $cmd->bindparam(':uso_actual_POWER_BI', $uso_actual_POWER_BI);

      $cmd->bindparam(':uso_actual_TABLEAU', $uso_actual_TABLEAU);

      $cmd->bindparam(':uso_actual_APACHE_SPARK', $uso_actual_APACHE_SPARK);

      $cmd->bindparam(':uso_actual_NINGUNA', $uso_actual_NINGUNA);

      $cmd->bindparam(':uso_actual_otro', $uso_actual_otro);



      $cmd->bindparam(':mejor_herramienta', $mejor_herramienta);



      // b5

      $cmd->bindparam(':metodoAutomatico_Regression', $metodoAutomatico_Regression);

      $cmd->bindparam(':metodoAutomatico_Decision_Trees', $metodoAutomatico_Decision_Trees);

      $cmd->bindparam(':metodoAutomatico_Clustering', $metodoAutomatico_Clustering);

      $cmd->bindparam(':metodoAutomatico_PCA', $metodoAutomatico_PCA);

      $cmd->bindparam(':metodoAutomatico_Visualizacion_datos', $metodoAutomatico_Visualizacion_datos);

      $cmd->bindparam(':metodoAutomatico_Estadistica_descriptiva', $metodoAutomatico_Estadistica_descriptiva);

      $cmd->bindparam(':metodoAutomatico_Vector_Machine', $metodoAutomatico_Vector_Machine);

      $cmd->bindparam(':metodoAutomatico_Random_Forest', $metodoAutomatico_Random_Forest);

      $cmd->bindparam(':metodoAutomatico_Nearest_Neighbours', $metodoAutomatico_Nearest_Neighbours);



      $cmd->bindparam(':metodoAutomatico_Times_Series', $metodoAutomatico_Times_Series);

      $cmd->bindparam(':metodoAutomatico_Ensemble_Methods', $metodoAutomatico_Ensemble_Methods);

      $cmd->bindparam(':metodoAutomatico_Boosting', $metodoAutomatico_Boosting);

      $cmd->bindparam(':metodoAutomatico_Text_Minng', $metodoAutomatico_Text_Minng);

      $cmd->bindparam(':metodoAutomatico_Neural_Networds', $metodoAutomatico_Neural_Networds);

      $cmd->bindparam(':metodoAutomatico_Boosted_Machines', $metodoAutomatico_Boosted_Machines);

      $cmd->bindparam(':metodoAutomatico_Anomaly_Detection', $metodoAutomatico_Anomaly_Detection);

      $cmd->bindparam(':metodoAutomatico_Recommendation_systems', $metodoAutomatico_Recommendation_systems);



      $cmd->bindparam(':metodoAutomatico_otros', $metodoAutomatico_otros);

      $cmd->bindparam(':metodos_aprendizaje', $metodos_aprendizaje);

      $cmd->bindparam(':correo_respuesta', $correo_respuesta);



      $cmd->bindparam(':actividad_laboral', $actividad_laboral);

      // nuevo

      $cmd->bindparam(':rango_remuneracion_mensual', $rango_remuneracion_mensual);

      $cmd->bindparam(':cambio_trabajo_ultimo_anio', $cambio_trabajo_ultimo_año);

      $cmd->bindparam(':cambio_funciones_ultimo_anio', $cambio_funciones_ultimo_año);

      $cmd->bindparam(':nivel_satisfaccion_trabajo', $nivel_satisfaccion_trabajo);

      $cmd->bindparam(':nivel_satisfaccion_horario', $nivel_satisfaccion_horario);

      $cmd->bindparam(':nivel_satisfaccion_remuneracion', $nivel_satisfaccion_remuneracion);







      if ($cmd->execute()) {

        return 'ok';
      } else {

        return "no registro";
      }
    } catch (\Exception $e) {

      echo "error" . $e->getMessage();
    }
  }


  public function registrar_cuestionario_perfil_data_analytics($datos)
  {

    try {

      $gbd = Gestionbd::getInstancia();



      $sql = "insert into cuestionario_data_analytics
        values
     (NULL,

 now(),:edad,:sexo,:pais,:ciudad,:correo,:anio_analytics,:frase,:sector_laboral,:sector_laboral_otro,:cantidad_trabajadores,:puesto_trabajo,:puesto_trabajo_otro,

:remuneracion_mensual,:actividad_trabajo,:actividad_trabajo_otro,:dominio_ingles,:cambio_trabajo,:cambio_funciones,:capacito_data_analytics,
:competencia_programacion,:competencia_estadistica,:competencia_ml,:competencia_bd,:competencia_visualizacion,:competencia_pbd,:competencia_comunicacion,
:nivel_programacion,:nivel_estadistica,:nivel_ml,:nivel_bd,:nivel_visualizacion,:nivel_pbd,:nivel_comunicacion,
:hr_excel,:hr_tableau,:hr_power_bi,:hr_python,:hr_r,:hr_tensor,:hr_sql,:hr_git,:hr_data_bricks,:hr_airflow,:hr_docker,:hr_aws,:hr_gcp,:hr_azure,
:nivel_excel,:nivel_tableau,:nivel_power_bi,:nivel_python,:nivel_r,:nivel_tensor,:nivel_sql,:nivel_git,:nivel_data_bricks,:nivel_airflow,:nivel_docker,:nivel_aws,:nivel_gcp,:nivel_azure,
:desafio,:tendencia,:sugerencia
     )";

      $cmd = $gbd->prepare($sql);

      //PERFIL DEL ENTREVISTADO
      $cmd->bindparam(':edad', $datos["edad"]);
      $cmd->bindparam(':sexo', $datos["sexo"]);
      $cmd->bindparam(':pais', $datos["pais"]);
      $cmd->bindparam(':ciudad', $datos["ciudad"]);
      $cmd->bindparam(':correo', $datos["correo"]);
      $cmd->bindparam(':anio_analytics', $datos["anioExp"]);

      //SITUACIÓN LABORAL
      $cmd->bindparam(':frase', $datos["frase"]);
      $cmd->bindparam(':sector_laboral', $datos["sectorTrabajo"]);
      $cmd->bindparam(':sector_laboral_otro', $datos["sectorTrabajo_otro"]);
      $cmd->bindparam(':cantidad_trabajadores', $datos["cantidadTrabajadores"]);
      $cmd->bindparam(':puesto_trabajo', $datos["puestoTrabajo"]);
      $cmd->bindparam(':puesto_trabajo_otro', $datos["puestoTrabajo_otro"]);
      $cmd->bindparam(':remuneracion_mensual', $datos["rangoRemuneracionMensual"]);
      $cmd->bindparam(':actividad_trabajo', $datos["actividadLaboral"]);
      $cmd->bindparam(':actividad_trabajo_otro', $datos["actividadLaboral_otro"]);
      $cmd->bindparam(':dominio_ingles', $datos["ingles"]);
      $cmd->bindparam(':cambio_trabajo', $datos["ultimoAnioTrabajo"]);
      $cmd->bindparam(':cambio_funciones', $datos["ultimoAnioCambio"]);
      $cmd->bindparam(':capacito_data_analytics', $datos["ultimoAnioCapacitacion"]);

      //COMPETENCIAS Y HERRAMIENTAS DE DATA & ANALYTICS


      $cmd->bindparam(':competencia_programacion', $datos["competencia_programacion"]);
      $cmd->bindparam(':competencia_estadistica', $datos["competencia_estadistica"]);
      $cmd->bindparam(':competencia_ml', $datos["competencia_machine_learning"]);
      $cmd->bindparam(':competencia_bd', $datos["competencia_base_de_datos"]);
      $cmd->bindparam(':competencia_visualizacion', $datos["competencia_visualizacion"]);
      $cmd->bindparam(':competencia_pbd', $datos["competencia_procesamiento_big_data"]);
      $cmd->bindparam(':competencia_comunicacion', $datos["competencia_comunicacion"]);
      $cmd->bindparam(':nivel_programacion', $datos["nivel_programacion"]);
      $cmd->bindparam(':nivel_estadistica', $datos["nivel_estadistica"]);
      $cmd->bindparam(':nivel_ml', $datos["nivel_machine_learning"]);
      $cmd->bindparam(':nivel_bd', $datos["nivel_base_de_datos"]);
      $cmd->bindparam(':nivel_visualizacion', $datos["nivel_visualizacion"]);
      $cmd->bindparam(':nivel_pbd', $datos["nivel_procesamiento_big_data"]);
      $cmd->bindparam(':nivel_comunicacion', $datos["nivel_comunicacion"]);
      $cmd->bindparam(':hr_excel', $datos["herramienta_excel"]);
      $cmd->bindparam(':hr_tableau', $datos["herramienta_tableau"]);
      $cmd->bindparam(':hr_power_bi', $datos["herramienta_power_bi"]);
      $cmd->bindparam(':hr_python', $datos["herramienta_python"]);
      $cmd->bindparam(':hr_r', $datos["herramienta_r"]);
      $cmd->bindparam(':hr_tensor', $datos["herramienta_tensorflow_y_o_pytorch"]);
      $cmd->bindparam(':hr_sql', $datos["herramienta_sql"]);
      $cmd->bindparam(':hr_git', $datos["herramienta_git"]);
      $cmd->bindparam(':hr_data_bricks', $datos["herramienta_databricks"]);
      $cmd->bindparam(':hr_airflow', $datos["herramienta_airflow"]);
      $cmd->bindparam(':hr_docker', $datos["herramienta_docker"]);
      $cmd->bindparam(':hr_aws', $datos["herramienta_aws"]);
      $cmd->bindparam(':hr_gcp', $datos["herramienta_gcp"]);
      $cmd->bindparam(':hr_azure', $datos["herramienta_azure"]);
      $cmd->bindparam(':nivel_excel', $datos["nivel_excel"]);
      $cmd->bindparam(':nivel_tableau', $datos["nivel_tableau"]);
      $cmd->bindparam(':nivel_power_bi', $datos["nivel_power_bi"]);
      $cmd->bindparam(':nivel_python', $datos["nivel_python"]);
      $cmd->bindparam(':nivel_r', $datos["nivel_r"]);
      $cmd->bindparam(':nivel_tensor', $datos["nivel_tensorflow_y_o_pytorch"]);
      $cmd->bindparam(':nivel_sql', $datos["nivel_sql"]);
      $cmd->bindparam(':nivel_git', $datos["nivel_git"]);
      $cmd->bindparam(':nivel_data_bricks', $datos["nivel_databricks"]);
      $cmd->bindparam(':nivel_airflow', $datos["nivel_airflow"]);
      $cmd->bindparam(':nivel_docker', $datos["nivel_docker"]);
      $cmd->bindparam(':nivel_aws', $datos["nivel_aws"]);
      $cmd->bindparam(':nivel_gcp', $datos["nivel_gcp"]);
      $cmd->bindparam(':nivel_azure', $datos["nivel_azure"]);

      //RETOS Y TENDENCIAS
      $cmd->bindparam(':desafio', $datos["desafioActual"]);
      $cmd->bindparam(':tendencia', $datos["tendencia"]);
      $cmd->bindparam(':sugerencia', $datos["sugerencia"]);

      if ($cmd->execute()) {

        return 'ok';
      } else {

        return "no registro";
      }
    } catch (\Exception $e) {

      echo "error" . $e->getMessage();
    }
  }

  public function validar_email($correo)
  {

    $gbd = Gestionbd::getInstancia();
    // Construye la consulta SQL
    $sql = "SELECT COUNT(1) AS cantidad FROM cuestionario_data_analytics WHERE correo = :correo GROUP BY correo";

    // Prepara la consulta
    $stmt = $gbd->prepare($sql);

    // Bind de parámetros
    $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);

    // Ejecuta la consulta
    try {
      $stmt->execute();
      $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($resultado) {
        $cantidad = $resultado['cantidad'];
        return $cantidad;
      } else {
        return 0;
      }
    } catch (PDOException $e) {
      die("Error al ejecutar la consulta: " . $e->getMessage());
    }

    // Cierra la conexión a la base de datos
    $gbd = null;

  }
}
