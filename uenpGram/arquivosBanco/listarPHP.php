<?php
require_once "conexaoComBanco.php";
require_once "util.php";

$buscar = fromPost("buscar");

if (empty($buscar)) {
  header("Location: ../principal.php");
}

try{
    $sql = "select nome, apelido from usuario where apelido = '$buscar' or nome = '$buscar'";
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
