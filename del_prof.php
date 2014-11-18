<?php
	session_start();
	error_reporting(E_ALL);
	@$login = $_SESSION["name"];
	@$rank = $_SESSION["rank"];
		try {
			$db = new PDO('mysql:host=localhost;dbname=ololo; charset=utf8','root','123');
			}
		catch(PDOException $e) {
	    die("Error: ".$e->getMessage());
		}
		if (isset ($_SESSION["name"])) {
			$delSQL = $db->query("DELETE FROM reg WHERE login = $login");
		unset($_SESSION["name"]);
		unset($_SESSION["rank"]);
		session_destroy();
	header("Location: http://localhost/mysite/");
	}
	?>