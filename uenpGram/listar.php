<?php
require_once "arquivosBanco/conexaoComBanco.php";
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
    <title>UenpGram - Perfil</title>

    <link rel="stylesheet" href="css/estilo.css">
    <span><link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet"></span>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  </head>
  <body>
    <header class="estiloPrincipal">
      <div>
        <a class="corLink" class="corLink" href="principal.php"><h1 class"divLogo"><i class="fas fa-graduation-cap"></i>UenpGram</a>
        </div>
      <div class="divPerfil">
        <a class="corLink" class="corLink" href="perfil.php"><span> <?=$user["nome"]?> <i class="fas fa-user-alt"></i></span></a>
      </div>
     </header>
     <article class="listaCentro">
       <?php


       $buscar = fromPost("buscar");

       if (empty($buscar)) {
         header("Location: ../principal.php");
       }

       $sql = "select nome, apelido from usuario where apelido LIKE '%$buscar%' or nome LIKE '%$buscar%'";
       foreach (getConnection()->query($sql) as $row) {
         echo "<tr>";
         // echo "<td>".$row['nome']."</td>";
         // echo "<td>".$row['apelido']."</td>";
         ?>

         <br>
         <form action="perfilProcurado.php" method="post">
           <input type="hidden" name="usuario" value="<?php echo $row['nome'] ?>">
           <td><input class="btnNomeLista" type="submit" value="<?php echo $row['nome']?>"> </td>
         </form>
         <!-- <a class="corLink" href="perfil.php"><span>  <i class="fas fa-user-alt"></i></span></a> -->
         <?php
         echo "</tr>";
       }
       ?>
     </article>
  </body>
</html>
