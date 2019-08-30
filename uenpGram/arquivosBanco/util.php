<?php
function fromGet($param){
    if (isset($_GET[$param])){
        return $_GET[$param];
    }
}
function fromPost($param){
    if (isset($_POST[$param])){
        return $_POST[$param];
    }
}

/*function fromFiles($param, $param2){
    if (isset($_FILES[$param, $param2])){
        return $_FILES[$param, $param2];
    }
}*/
  function toSession($key, $value){
    session_start();
    $_SESSION[$key] = $value;
  }
  function getUser(){
    session_start();
    if (!isset($_SESSION) ||!isset($_SESSION["autenticado"])){
      return null;
    }
    return $_SESSION["autenticado"];
  }
  function fromSession($param){
    $value = "";
    if (!isset($_SESSION))
      session_start();
    if (isset($_SESSION[$param])){
      $value = $_SESSION[$param];
      unset($_SESSION[$param]);
    }
    return $value;
  }

  function getData($param){
  $value = "";
  if (!isset($_SESSION))
    session_start();
  if (isset($_SESSION[$param])){
    $value = $_SESSION[$param];
  }
  return $value;
}
