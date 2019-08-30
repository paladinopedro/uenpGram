<?php
  require_once "bootstrap.php";
?>
<!DOCTYPE html>
<html lang=pt dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>UenpGram - Cadastro</title>

    <link rel="stylesheet" href="css/estilo.css">
    <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  </head>
  <body>
    <header>
      <section>
        <div class="estiloSignUp">
          <div>
            <h1 class="estiloMenu"><i class="fas fa-graduation-cap"></i></i>UenpGram</h1>
          </div>
          <div class="menuLogin">
            <p>Registre-se para ver fotos dos Uenpianos mais querido.</p>
            <form class="formCredenc" method="POST" action="arquivosBanco/registroPHP.php">

              <input type="email" value="<?=fromSession("email")?>" name="email" placeholder="Número de Celular ou e-mail">
              <input type="text" value="<?=fromSession("nome")?>" name="nome" placeholder="Nome completo">
              <input type="text" value="<?=fromSession("usuario")?>" name="usuario"  placeholder="Nome de Usuário">
              <input type="password"  name="senha" placeholder="Senha">
              <div>
              <input type="checkbox" name="concordo">
              
              <label for="concordo"><span style="font-size: 13px;">Concordo com os termos,
                    Política de Dados e Política de Cookies.</span></label>
            </div>
            <div>
              <input id="botaoLogin" type="submit" value="SignUp">
              <p>Já possui uma Uenpconta? <a href="entrar.php">Clique aqui</a></p>
            </div>
          </form>
          </div>
        </div>

      <footer>

    </footer>
  </body>
</html>
