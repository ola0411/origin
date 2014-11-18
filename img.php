<?php
session_start();
	@$login = $_SESSION["name"];
	@$check = $_SESSION["auth"];
	@$rank = $_SESSION["rank"];
try {   
		$db = new PDO('mysql:host=localhost;dbname=ololo; charset=utf8','root','123');
	}
	catch(PDOException $e) {
		die("Error: ".$e->getMessage());
	}
	$result = $db->query("SELECT * FROM reg WHERE login = '$login'");
	header('Content-Type: image/jpeg');
	echo $row['avatar'];