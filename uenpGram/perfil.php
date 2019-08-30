<?php
  require_once "arquivosBanco/util.php";
  require_once "arquivosBanco/conexaoComBanco.php";
  session_start();
  $user = $_SESSION["autenticado"];
  if (!isset($user)){
      header("Location: entrar.php");
      exit();
  }else{
    $usuarioProcurado = fromPost("usuario");
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
        <a class="corLink" href="principal.php"><h1 class"divLogo"><i class="fas fa-graduation-cap"></i>UenpGram</a>
      </div>
      <div class="divAddImg">
        <form  action="arquivosBanco/cadastroImagens.php" method="POST" enctype="multipart/form-data">
          <input type="text" name="descricao">
            <!-- <input type="file" name="imagem"> -->
            <label for='selecao-arquivo'>Adicionar Imagem</label>
            <input id='selecao-arquivo' type="file" name="imagem">
            <input type="submit" value="Salvar">

        </form>
      </div>
      <div class="divPerfil">
        <a class="corLink" href="perfil.php"><span> <?=$user["nome"]?> <i class="fas fa-user-alt"></i></span></a>
      </div>
     </header>
     <article>
       <?php

       $sql = "select caminho_imagem from imagens";
       foreach (getConnection()->query($sql) as $row) {
         // echo "<td>".$row['nome']."</td>";
         // echo "<td>".$row['apelido']."</td>";
         //var_dump($row);
         ?>

         <br>
         <img src="<?=$row['caminho_imagem']?>" alt="teste">
         <!-- <img src="imagens/bola-de-futebol-de-campo-adidas-starlancer-v-img.jpg" alt=""> -->
         <!-- <a class="corLink" href="perfil.php"><span>  <i class="fas fa-user-alt"></i></span></a> -->
         <?php
       }
       ?>
     </article>
  </body>
</html>
