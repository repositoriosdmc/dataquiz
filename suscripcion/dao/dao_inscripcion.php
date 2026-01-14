<?
require_once "../ds/gestionbd.php";
require_once "../dao/dao_cliente.php";
require_once "../dao/dao_pagos.php";
require_once "../dao/dao_dmc.php";
require_once "../dao/dao_mail.php";
require_once "../dao/dao_suscripcion.php";


class inscripcion{  

    public function registrar_inscripcion($cliente,$cronograma,$medio,$descuento,$precio,$num_descuento,$matricula){
        $gbd=Gestionbd::getInstancia();
        $sql="insert into inscripciones values ('',now(),:cliente_id,:cronograma_id,:medio_id,:descuento_id,:precio,:num_descuento,:condiciones_matricula,0)";
        $cmd=$gbd->prepare($sql);
        $cmd->bindparam(":cliente_id",$cliente);
        $cmd->bindparam(":cronograma_id",$cronograma);
        $cmd->bindparam(":medio_id",$medio);
        $cmd->bindparam(":descuento_id",$descuento);
        $cmd->bindparam(":precio",$precio);
        $cmd->bindparam(":num_descuento",$num_descuento);
        $cmd->bindparam(":condiciones_matricula",$matricula);
        $cmd->execute();
        $id=$gbd->lastInsertId();
        return (int)$id;
    }  

    public function mensaje_admin($data){
        $msj.="Tipo Documento: ".$data["tipo_documento"]."<br>";
        $msj.="Documento: ".$data["num_documento"]."<br>";
        $msj.="Nombres: ".$data["nombres"]."<br>";
        $msj.="Apellidos: ".$data["apellidos"]."<br>";
        $msj.="Fec. Nacimiento: ".$data["fec_nac"]."<br>";
        $msj.="Número de celular: ".$data["celular"]."<br>";
        $msj.="E-mail Personal: ".$data["correo"]."<br>";
        $msj.="Distrito: ".$data["direccion"]."<br>";
        $msj.="Universidad: ".$data["universidad"]."<br>";
        $msj.="Nivel Educativo: ".$data["nivel_academico"]."<br>";
        $msj.="Profesión: ".$data["profesion"]."<br>";
        $msj.="Empresa donde Labora: ".$data["empresa"]."<br>";
        $msj.="Puesto: ".$data["puesto"]."<br>";
        $msj.="Tel. Emp: ".$data["telefono_emp"]."<br>";
        $msj.="Correo Emp: ".$data["correo_emp"]."<br>";
        $msj.="Curso: ".$data["cronograma"]."<br>";
        $msj.="Modalidad: ".$data["descuento"]."<br>";
        $msj.="Forma de pago: ".$data["pago"]."<br>";
        $msj.="Cómo se enteró del curso: ".$data["medio"]."<br>";
        $msj.="Acepto términos y condiciones: ".$data["datos"]."<br>";
        $msj.="Acepto términos y condiciones de matricula: ".$data["matricula"]."<br>";
        $msj.="Navegador: ".$data["browser"]."<br>";
        $msj.="Versión: ".$data["version"]."<br>";
        $msj.="Sistema operativo: ".$data["so"]."<br>";
        return $msj;

    }

    public function mensaje_recordatorio_cliente($nom,$cliente_id,$suscripcion_id){
        $msj="";
        $msj.="";
        return $msj;
    }


    public function registrar_proceso_inscripcion($post,$file){
        $dmc=new dmc();
        $cliente= new cliente();
        $mail=new mail();
        $pagos=new pagos();
        $suscripcion=new suscripcion();
        $datos=$dmc->limpiar($post);
        $fec_nac=$datos["fec_nac"]!=null ? $dmc->convert_fecha($datos["fec_nac"]) : null;//Fecha de Nacimiento
        if($datos["codigo"]==""){
            //Registro de Cliente
            $datos["datos"]=$datos["datos"]===null ? 0 : $datos["datos"];//terminos y condiciones

            $cliente_id=$cliente->registrar_datos_completo_cliente($datos["codigo"],$datos["tipo_documento"],$datos["num_documento"],$datos["nombres"],$datos["apellidos"],$fec_nac,$datos["celular"],$datos["correo"],$datos["direccion"],$datos["datos"],$datos["universidad"],$datos["nivel_academico"],$datos["profesion"],$datos["empresa"],$datos["puesto"],$datos["telefono_emp"],$datos["correo_emp"],$datos["datos_laborales"]);
        }else if($datos["codigo"]>0){

            if(strlen($datos["suscripcion"])===40){
                $cliente->actualizar_datos_completos_cliente($datos["codigo"],$datos["tipo_documento"],$datos["num_documento"],$datos["nombres"],$datos["apellidos"],$fec_nac,$datos["celular"],$datos["correo"],$datos["universidad"],$datos["nivel_academico"],$datos["profesion"],$datos["empresa"],$datos["puesto"],$datos["telefono_emp"],$datos["correo_emp"],$datos["datos_laborales"]);
            }
            $cliente_id=$datos["codigo"];
            $new_datos_cliente=$cliente->mostrar_datos_cliente($datos["codigo"]);
            $datos["nombres"]=$new_datos_cliente["nombres"];
            $datos["apellidos"]=$new_datos_cliente["apellidos"];
            $datos["celular"]=$new_datos_cliente["celular"];
            $datos["correo"]=$new_datos_cliente["correo"];
            $datos["datos"]=$new_datos_cliente["terminos_condiciones"];
            $datos["universidad"]=$new_datos_cliente["universidad"];
            $datos["nivel_academico"]=$new_datos_cliente["nivel_academico"];
            $datos["profesion"]=$new_datos_cliente["profesion"];
            $datos["empresa"]=$new_datos_cliente["empresa"];
            $datos["puesto"]=$new_datos_cliente["puesto"];

            
        }
        if($cliente_id>0){
            if(strlen($datos["suscripcion"])===40){//Obtener Id de Hash
                $datos["suscripcion"]=$suscripcion->obtener_id($datos["suscripcion"]);
            }else{
                $datos["suscripcion"]=NULL;
            }
            //Registro de Inscripción
            $datos["num_descuento"]=$datos["num_descuento"]==null ? 0 : $datos["num_descuento"];
            $inscripcion_id= self::registrar_inscripcion($cliente_id,$datos["cronograma"],$datos["medio"],$datos["descuento"],0,$datos["num_descuento"],$datos["matricula"]);

            if($inscripcion_id>0){
                $folder="../assets/img/vch/";
                $url_imagen=$dmc->guardar_imagen($folder,"voucher",$file);
                $forma_de_pago_id=$pagos->registrar_forma_de_pago($url_imagen,null,null,null,null,null);
                if($forma_de_pago_id>0){
                    $pagos->registrar_inscripcion_pago($inscripcion_id,$forma_de_pago_id,0,null);
                }
            }
        }


        // información cambiada para el mensaje del cliente

        $datos["descuento"]=$datos["nombre_descuento"];
        $datos["medio"]=$datos["nombre_medio"];
        $datos["pago"]=$datos["pago"]==NULL ? "Corporativo" : $datos["pago"];
        $datos["datos"]=$datos["datos"]==1 ? "Sí" : "NO";
        $datos["matricula"]=$datos["matricula"]==1 ? "Sí" : "NO";


        $mensaje_admin=self::mensaje_admin($datos);
        $mensaje_cliente=self::mensaje_cliente($datos["nombres"],$datos["apellidos"]);


        $mail->send_mail("Ficha inscripción Grupo Líder World",$datos["correo"],"Grupo Líder World Consulting","","","1","Ficha Inscripción Grupo Líder World Consulting",$mensaje_cliente);
        $mail->send_mail("Ficha inscripción Grupo Líder World","marco.medrano@dataminingperu.com","Grupo Líder World Consulting",$file,$url_imagen,"1","Ficha Inscripción Grupo Líder World Consulting",$mensaje_admin);
        $mail->send_mail("Ficha inscripción Grupo Líder World","informes@grupoliderworld.pe","Grupo Líder World Consulting",$file,$url_imagen,"1","Ficha Inscripción Grupo Líder World Consulting",$mensaje_admin);


        
    }

    public function mensaje_cliente($nom,$ape){
        $msj="Estimado(a): ".$nom." ".$ape.".";
        $msj.="<br><br>";
        $msj.="Felicidades! Tu inscripción se ha realizado de manera satisfactoria.";
        $msj.="<br><br>";
        $msj.="Saludos,";
        $msj.="<br><br>";
        $msj.="Coordinación";
        $msj.="<br>";
        $msj.="<b>Grupo Lider World</b>";
        $msj.="<br>";
        $msj.="<a href='http://grupoliderworld.pe/' target='_blank'>www.grupoliderworld.pe/</a>";
        return $msj;
    }

    public function validar_curso($cliente,$curso){
        $gbd=Gestionbd::getInstancia();
        $sql="SELECT 1 AS estado FROM inscripciones WHERE cliente_id=:cliente AND cronograma_id=:curso limit 1";
        $cmd=$gbd->prepare($sql);
        $cmd->bindparam(":cliente",$cliente);
        $cmd->bindparam(":curso",$curso);
        $cmd->execute();
        $lista=$cmd->fetch(PDO::FETCH_ASSOC);
        return $lista;
    }

    public function validar_documento($tipo_documento,$num_documento){
        $gbd=Gestionbd::getInstancia();
        $sql="SELECT CASE WHEN b.id IS NULL THEN 0 ELSE 1 END AS estado,a.id FROM clientes a LEFT JOIN inscripciones b ON a.id=b.cliente_id WHERE a.tipo_documento=:tipo_documento AND a.num_documento=:num_documento limit 1";
        $cmd=$gbd->prepare($sql);
        $cmd->bindparam(":tipo_documento",$tipo_documento);
        $cmd->bindparam(":num_documento",$num_documento);
        $cmd->execute();
        $lista=$cmd->fetch(PDO::FETCH_ASSOC);
        return $lista;
    }

    public function lista_cronograma(){
        $gbd=Gestionbd::getInstancia();
        $gbd->query("SET lc_time_names='es_MX'");
        $sql="SELECT a.id,b.nombre FROM cronograma a INNER JOIN cursos b ON a.`curso_id`=b.`id` AND CURDATE()<=a.`fecha_inicio`  ORDER BY b.nombre";
        $cmd=$gbd->prepare($sql);
        $cmd->execute();
        $lista=$cmd->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
    }

    public function listado_inscriptos(){
        $gbd=Gestionbd::getInstancia();
        $sql="SELECT a.id AS inscripcion_id,c.id AS inscripcion_pago_id,d.`id` AS forma_de_pago_id,c.`fecha_registro`, b.`nombres`,b.`apellidos`,i.`empresa`,d.`forma` AS tipo, h.`nombre` AS curso,e.`nombre` AS descuento, d.`lugar`, d.`fecha`,d.`num_operacion`,c.`monto`, a.`universitario`, a.`igv`,d.`comprobante_url`, c.`comentario`,a.`estado` FROM inscripciones a INNER JOIN clientes b ON a.`cliente_id`=b.`id` INNER JOIN inscripcion_pago c ON a.`id`=c.`inscripcion_id` INNER JOIN forma_de_pago d ON c.`forma_de_pago_id`=d.`id` LEFT JOIN descuentos e ON a.`descuento_id`=e.`id` LEFT JOIN cronograma f ON a.`cronograma_id`=f.`id` LEFT JOIN capacitacion_precios g ON f.`capacitacion_precios_id`=g.`id` LEFT JOIN capacitacion h ON g.`capacitacion_id`=h.`id` LEFT JOIN datos_laborales i ON b.`id`=i.`cliente_id` ORDER BY a.`estado` ASC, a.`fecha_registro` DESC";
        $cmd=$gbd->prepare($sql);
        $cmd->execute();
        $lista=$cmd->fetchAll(PDO::FETCH_ASSOC);
        return $lista;

    }

    public function actualizar_inscripcion_estado($estado,$id){
        $gbd=Gestionbd::getInstancia();
        $sql="update inscripciones set estado=:estado where id=:id";
        $cmd=$gbd->prepare($sql);
        $cmd->bindparam(":estado",intval($estado));
        $cmd->bindparam(":id",$id);
        $cmd->execute();
    }

    public function actualizar_inscripcion_igv($igv,$id){
        $gbd=Gestionbd::getInstancia();
        $sql="update inscripciones set igv=:igv  where id=:id";
        $cmd=$gbd->prepare($sql);
        $cmd->bindparam(":igv",$igv);
        $cmd->bindparam(":id",$id);
        $cmd->execute();
    }

    public function actualizar_universitario($uni,$id){
        $gbd=Gestionbd::getInstancia();
        $sql="update inscripciones set universitario=:universitario  where id=:id";
        $cmd=$gbd->prepare($sql);
        $cmd->bindparam(":universitario",$uni);
        $cmd->bindparam(":id",$id);
        $cmd->execute();
    }

}



?>
