<?php
function getConnection() {
  $username = 'root';
  $password = '';
  $conn = new PDO('mysql:host=localhost;dbname=bd_uenpgram_final',  $username, $password);
  return $conn;
}
 ?>
