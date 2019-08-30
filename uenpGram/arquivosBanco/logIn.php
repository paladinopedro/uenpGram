<?php
require_once "util.php";
require_once "conexaoComBanco.php";

$apelido = fromPost("usuario");
$senha = fromPost("senha");
//verificação
$messages = "";
if (empty($apelido)) {
  $messages .= ("<li>Apelido obrigatório</li>");
}
if (empty($senha)) {
  $messages .= ("<li>Senha obrigatória</li>");
}
if (strlen($messages) > 0){
  $messages = "<ul>".$messages."</ul>";
  toSession("messages", $messages);
  toSession("usuario", $apelido);
  header("Location: ../entrar.php");   //https://stackoverflow.com/questions/2112373/php-page-redirect

  exit();
}
try{
    $sql = "select nome, email, apelido from usuario where apelido = '$apelido' and senha='$senha'";
    $stmt = getConnection()->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch();
    if($row){
        toSession("autenticado", $row);
        header("Location: ../principal.php");
    } else {
        toSession("messages", "Usuário/Senha incorretos.");
        header("Location: ../entrar.php");
    }
    //( as $row)

    //toSession("messages", "Ocorreu um erro ao realizar seu cadastro");
    //header("Location: ../../register.php");

}catch(PDOException $e) {
  toSession("messages", "Ocorreu um erro ao realizar seu cadastro: ".$e->getMessage());
   header("Location: ../entrar.php");
}
?>
