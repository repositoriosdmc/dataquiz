<?php

//logout.php


//Destroy entire session data.
session_destroy();

//redirect page to index.php
header('location:https://certificaciones.dmc.pe/suscripcion/inicio_formulario');

?>