<?php

$cod = $_GET['curso'] ?? '';

$url = $cod >0 ? '?curso='.$cod : '';

header("location:https://dmc.pe/descubre/dmc.php".$url);
