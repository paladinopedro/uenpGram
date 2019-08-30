<?php
  require_once "arquivosBanco/util.php";
  session_start();
  $user = $_SESSION["autenticado"];
  if (!isset($user)){
      header("Location: entrar.php");
      exit();
  }
  ?>

<!DOCTYPE html>
<html lang=pt dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>UenpGram - Página Principal</title>

    <link rel="stylesheet" href="css/estilo.css">
    <span><link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet"></span>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  </head>
  <body>
    <header class="estiloPrincipal">
      <div>
        <a class="corLink" class="corLink" href="principal.php"><h1 class"divLogo" ><i class="fas fa-graduation-cap"></i>UenpGram</a>
      </div>
      <div class="divBusca">
        <form action="listar.php" method="post">
        <input  id="txtBusca" type="text" name="buscar" placeholder="Buscar...">
        </form>
      </div>
      <div class="divPerfil" class="principalA">
        <a class="corLink" href="perfil.php"><span> <?=$user["nome"]?> <i class="fas fa-user-alt"></i></span></a>
      </div>
     </header>
     <div class="divMeio">
       <p></p>
     </div>
  </body>
</html>
