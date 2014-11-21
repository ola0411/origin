<?php
  error_reporting(E_ALL);
try {
  $db = new PDO('mysql:host=localhost;dbname=ololo; charset=utf8','root','123');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e) {
  die("Error: ".$e->getMessage());
  }
  include ("language.php");
?>
