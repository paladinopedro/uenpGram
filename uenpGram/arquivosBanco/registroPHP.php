<?php
require_once "util.php";
require_once "conexaoComBanco.php";


$email = fromPost("email");
$nome = fromPost("nome");
$apelido = fromPost("usuario");
$senha = fromPost("senha");
$concordo = fromPost("concordo");

//verificação
$messages = "";
if (empty($email)) {
  $messages .= ("<li>E-mail obrigatório</li>");
}
if (empty($nome)) {
  $messages .= ("<li>Nome obrigatório</li>");
}
if (empty($apelido)) {
  $messages .= ("<li>Apelido obrigatório</li>");
}
if (empty($senha)) {
  $messages .= ("<li>Senha obrigatória</li>");
}
if (!isset($concordo)){
  $messages .= ("<li>Você precisa aceitar os termos para se cadastrar</li>");
}
if (strlen($messages) > 0){
  $messages = "<ul>".$messages."</ul>";
  toSession("messages", $messages);
  toSession("email", $email);
  toSession("nome", $nome);
  toSession("apelido", $apelido);
  header("Location: ../registro.php");   //https://stackoverflow.com/questions/2112373/php-page-redirect
  exit();
}
try{
  $sql = "INSERT INTO usuario(nome, email, apelido, senha) VALUES (:nome, :email, :apelido,:senha)";
  $stmt = getConnection()->prepare($sql);
  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':apelido', $apelido);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':senha', $senha);
  if ($stmt->execute()){
    toSession("messages", "Cadastro realizado com sucesso!");
    header("Location: ../entrar.php");
  } else {
    toSession("messages", "Ocorreu um erro ao realizar seu cadastro");
    header("Location: ../registro.php");
  }
}catch(PDOException $e) {
  toSession("messages", "Ocorreu um erro ao realizar seu cadastro: ".$e->getMessage());
   header("Location: ../registro.php");
}
?>
