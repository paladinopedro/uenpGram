<?php
  require_once "bootstrap.php";
 ?>
<!DOCTYPE html>
<html lang=pt dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>UenpGram - Login</title>

    <link rel="stylesheet" href="css/estilo.css">
    <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  </head>
  <body>
    <header>
      <section>
        <div class="estiloLogin">
          <div>
            <h1 class="estiloMenu"><i class="fas fa-graduation-cap"></i></i>UenpGram</h1>
          </div>
          <div class="menuLogin">
            <p>Só aqui você encontra as melhores fotos e videos sobre os Uenpianos mais querido da melhor pioneira do Paraná.</p>
            <h2><?=fromSession("messages")?></h2>
            <form class="formCredenc" method="POST" action="arquivosBanco/logIn.php">
              <input type="text" name="usuario" placeholder="Digite seu Usuário" required="required">
              <input type="password" name="senha" placeholder="Digite sua Senha" required="required">
              <input id="botaoLogin" type="submit" value="Login">
              <p>Ainda não possui uma Uenpconta? <a href="registro.php">Clique aqui!</a></p>
            </form>
          </div>
        </div>

    <footer>

    </footer>
  </body>
</html>
