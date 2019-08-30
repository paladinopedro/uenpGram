<?php
function getProfile($username){
  $sql = "SELECT idusuario, nome, email, apelido, senha FROM usuario WHERE username = '$username'";
  $stmt = getConnection()->query($sql);
  $row = $stmt->fetch();
  if($row){
    $sql = "SELECT image FROM image WHERE idImage =".$row['image'];
    $stmt = getConnection()->query($sql);
    toSession("userProfileImage", $stmt->fetch());
    $sql = "SELECT count(idUsuario) as publicacao FROM publicacao WHERE idUsuario =".$row['idUsuario'];
    $stmt = getConnection()->query($sql);
    toSession("userProfilePubli", $stmt->fetch());
    $sql = "SELECT count(idUsuario_seguidor) as seguindo FROM seguidores WHERE idUsuario_seguidor =".$row['idUsuario'];
    $stmt = getConnection()->query($sql);
    toSession("userProfileSeguindo", $stmt->fetch());
    $sql = "SELECT count(idUsuario_seguido) as seguidores FROM seguidores WHERE idUsuario_seguido =".$row['idUsuario'];
    $stmt = getConnection()->query($sql);
    toSession("userProfileSeguidores", $stmt->fetch());
    toSession("userProfile", $row);
  }
}
?>
