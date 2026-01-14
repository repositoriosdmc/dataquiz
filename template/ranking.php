<?php

// https://www.shanidkv.com/blog/font-awesome-icons-css-content-values


error_reporting(E_ALL);
ini_set('display_errors', '1');




require_once "../suscripcion/dao/dao_formularioLogin.php";



$dao_formularioLogin = new dao_formularioLogin();



$participantes = $dao_formularioLogin->ranking();


?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ranking de Resultados - Analytics</title>
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #f8f8f8;
      margin: 0;
      padding: 0;
      display: grid;
      justify-content: center;
      align-items: center;

    }

    .ranking-container {
      max-width: 650px;
      width: 100%;
      margin: 20px 0;
      background-color: #fff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .ranking-header {
      background-color: #303f9f;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    .ranking-list {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .ranking-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px solid #ddd;
      padding: 15px;
      font-size: 16px;
      transition: background-color 0.3s;
    }

    .ranking-item:hover {
      background-color: #f5f5f5;
    }

    .ranking-item:nth-child(even) {
      background-color: #f9f9f9;
    }

    .ranking-item span {
      font-weight: bold;
      margin-right: 10px;
    }

    .ranking-item .rank {
      font-size: 24px;
      color: #303f9f;
    }
  </style>
</head>

<body>
  <div style="text-align: center;margin-top: 15px;">
    <img src="https://certificaciones.dmc.pe/img/logo_encuesta.png" alt="" style="
    height: 79px;
    margin: inherit;
    background: transparent;
">
  </div>
  <div class="ranking-container">

    <div class="ranking-header">
      <h2>Ranking de CONCURSO DATA SCIENCE 2024</h2>
    </div>
    <ul class="ranking-list">
      <? foreach ($participantes as $key => $participante) { ?>
        <li class="ranking-item">
          <span class="rank"><?= $key + 1 ?></span>
          <span><?= $participante['nombres'] ?> <?= $participante['apellido'] ?></span>
          <span>Puntuación: <?= $participante['puntaje'] ?></span>
        </li>
      <? } ?>

      <!-- Agrega más elementos según sea necesario -->
    </ul>
  </div>

</body>

</html>