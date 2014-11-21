<?php
	session_start();
	$rank = isset($_SESSION["rank"]) ? $_SESSION["rank"] : NULL;

	error_reporting(E_ALL);
	if($rank == 1) {
		try {
		$db = new PDO('mysql:host=localhost;dbname=ololo; charset=utf8','root','123');
		}
		catch(PDOException $e) {
		die("Error: ".$e->getMessage());
		}

		if (!isset($_GET["id"])) {
		$id = 1;
		}
		else {
		$id = $_GET["id"];
		}
		$strSQL = $db->query("DELETE FROM reg WHERE id = $id");
		header("Location: http://localhost/mysite/user.php");
	}
	else {
		echo 'You notlack rights';
	}
?>
