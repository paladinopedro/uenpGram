<?php
  require_once "arquivosBanco/conexaoComBanco.php";
  require_once "arquivosBanco/util.php";
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
      </div>
      <div class="divPerfil">
        <a class="corLink" href="perfil.php"><span> <?=$user["nome"]?> <i class="fas fa-user-alt"></i></span></a>
      </div>
     </header>

     <article>
       <div class="divMeio2">
         <?php
         if (empty($usuarioProcurado)) {
           header("Location: ../principal.php");
         }

         try{
             $sql = "select nome, apelido from usuario where nome = '$usuarioProcurado'";
             $stmt = getConnection()->prepare($sql);
             $stmt->execute();
             $row = $stmt->fetch();
             if($row){
               echo "<tr>";
               echo "<td>".$row['nome']."</td>";
               ?>
               <br>
               <?php
               echo "<td>".$row['apelido']."</td>";

               echo "</tr>";
             }

             //( as $row)

             //toSession("messages", "Ocorreu um erro ao realizar seu cadastro");
             //header("Location: ../../register.php");

         }catch(PDOException $e) {
           toSession("messages", "Ocorreu um erro ao realizar seu cadastro: ".$e->getMessage());
            header("Location: ../entrar.php");
         }

          ?>
       </div>

     </article>
  </body>
</html>
