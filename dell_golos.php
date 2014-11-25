<?php
  session_start();
  $rank = isset($_SESSION['rank']) ? $_SESSION['rank'] : NULL;
  $login = isset($_SESSION['name']) ? $_SESSION['name'] : NULL;
  $id_art = isset($_SESSION['id_art']) ? $_SESSION['id_art'] : NULL;

  error_reporting(E_ALL);
try {
  $db = new PDO('mysql:host=localhost;dbname=ololo; charset=utf8','root','123');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e) {
  die("Error: ".$e->getMessage());
  }

    $strSQL = $db->query("DELETE FROM rating WHERE id_article = '$id_art' AND login = '$login'");
    header("Location: http://localhost/mysite/view.php?id=$id_art");
?>
