<?php
require_once "util.php";
require_once "conexaoComBanco.php";


$imagem = $_FILES['imagem'];
$descricao = fromPost("descricao");
//var_dump($imagem);
if(!isset($_POST["Salvar"])){
  if(!empty($imagem)){
    $message = "";
    $tamanho = (1024 * 1024) * 16;
    if(!preg_match("/^image\/(pjpeg|jpeg|png|jpg)$/", $imagem["type"])){
      toSession("messages", "<script type=\"text/javascript\">alert('Tipo de arquivo inválido!');</script>");
    // toSession("publiDescript", $description);
    // toSession("publiCity", $city);
    // toSession("publiState", $state);
    // header("Location: ../../nav.php?page=publication");
      exit();

  }
}
  if($imagem["size"] > $tamanho){
  toSession("messages", "<script type=\"text/javascript\">alert('A imagem não pode ser maior que: $tamanho bytes!');</script>");
  // toSession("publiDescript", $description);
  // toSession("publiCity", $city);
  // toSession("publiState", $state);
  // header("Location: ../../nav.php?page=publication");
  exit();
  }

    preg_match("/\.(pjpeg|jpeg|png|jpg){1}$/i", $imagem["name"], $ext);
    $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
    $caminho_imagem = "imagens/" . $nome_imagem;
    move_uploaded_file($imagem["tmp_name"], $caminho_imagem);
    $sql = "INSERT INTO imagens (nome_imagem, caminho_imagem, descricao) VALUES ('$nome_imagem','$caminho_imagem', '$descricao')";
        $stmt = getConnection()->prepare($sql);
        $stmt->bindParam(':nome_imagem', $nome_imagem);
        $stmt->bindParam(':caminho_imagem', $caminho_imagem);
        $stmt->bindParam(':descricao', $descricao);
        if ($stmt->execute()){
          // toSession("messages", "Cadastro realizado com sucesso!");
          header("Location: ../perfil.php");
    // toSession("publiImage", $nome_imagem);
    // toSession("publiDescript", $descricao);
    // header("Location: ../perfil.php");
}

}
else{
  toSession("messages", "Erro");
  header("Location: ../principal.php");
}


  // try{
  //     $sql = "INSERT INTO imagens (nome_imagem,
  //       caminho_imagem, descricao) VALUES ('$nome_imagem','$caminho_imagem', '$descricao')";
  //     $stmt = getConnection()->prepare($sql);
  //     $stmt->bindParam(':nome_imagem', $nome_imagem);
  //     $stmt->bindParam(':caminho_imagem', $caminho_imagem);
  //     $stmt->bindParam(':descricao', $descricaoEvento);
  //     if ($stmt->execute()){
  //       toSession("messages", "Cadastro realizado com sucesso!");
  //       //header("Location: ../perfil.php");
  //
  //     } else {
  //       toSession("messages", "Ocorreu um erro ao realizar seu cadastro");
  //       //header("Location: ../principal.php");
  //     }
  //   }catch(PDOException $e) {
  //     toSession("messages", "Ocorreu um erro ao realizar seu cadastro: ".$e->getMessage());
  //      //header("Location: ../principal.php");
  //   }
  //     //( as $row)
  //
  //     //toSession("messages", "Ocorreu um erro ao realizar seu cadastro");
  //     //header("Location: ../../register.php");
  //
  // // }catch(PDOException $e) {
  // //   toSession("messages", "Ocorreu um erro ao realizar seu cadastro: ".$e->getMessage());
  // //    header("Location: ../entrar.php");
  // // }
?>
