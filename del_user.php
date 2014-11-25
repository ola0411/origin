<?php
	session_start();
	$rank = isset($_SESSION['rank']) ? $_SESSION['rank'] : NULL;

  error_reporting(E_ALL);
  try {
    $db = new PDO('mysql:host=localhost;dbname=ololo; charset=utf8','root','123');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e) {
    die("Error: ".$e->getMessage());
  }

	if($rank == 1) {

		if (!isset($_GET['id'])) {
		$id = 1;
		}
		else {
		$id = $_GET['id'];
		}
		$strSQL = $db->query("DELETE FROM reg WHERE id = $id");
		header('Location: http://localhost/mysite/user.php?lang=' . $lange . '');
	}
	else {
		echo $lang[5][1];
	}
?>
