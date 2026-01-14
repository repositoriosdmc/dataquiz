<?php

if(isset($_POST)){

    require_once "../dao/dao_persona.php";

    $persona = new persona();

    $codigo = str_pad("PER".$_POST["tp_doc"].$_POST["num_doc"], 16, "0", STR_PAD_RIGHT) ;

    echo json_encode( $persona->validar_dni($codigo) );

}

?>