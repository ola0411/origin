<?php
try {   
		$db = new PDO('mysql:host=localhost;dbname=ololo; charset=utf8','root','123');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
	catch(PDOException $e) {
		die("Error: ".$e->getMessage());
	}

if (isset($_POST['submit'])) {
	$login      = $_POST['login'];
	$password   = $_POST['password'];
	$r_password = $_POST['r_password'];
	$email      = $_POST['email'];
	$date       = date("Y-m-d H:i:s");

	if ($password == $r_password) {
		$password = md5($password);
		$rank = 3;
	}

	$log = $db->query("SELECT * FROM reg WHERE login = '$login'");
	$em  = $db->query("SELECT * FROM reg WHERE email = '$email'");

		if ($log ->fetchColumn() > 0) {
			echo " User with this login <b>$login</b> already exists";
		}
		elseif ($em ->fetchColumn() > 0) {
			echo " User with this email <b>$email</b> already exists";
		}
else {
		$query = $db->query("INSERT INTO reg VALUES ('','$login', '$password', '$email', '$rank', '$date', '', '', '')");

	session_start();
	$_SESSION["login"] = $login;
		echo "Registration was successful. You are logged in login <b>$login</b>";
}
}

?>
<html>
<head>
<title>Реєстрація</title>
<meta http-equiv = "Content-Type" content = "text/html"; charset = "utf-8">
<link rel = "stylesheet" type = "text/css" href = "css/style_reg.css">
</head>
<body>

<div class = "register">
<form method = "post" action = "register.php">
<h3>РЕЄСТРАЦІЯ</h3>
<input type = "text" name = "login" placeholder = "Login" required /> <br>
<input type = "password" name = "password" placeholder = "Password" required /> <br>
<input type = "password" name = "r_password" placeholder = "Repeat password" required/><br>
<input type = "text" name = "email" placeholder = "E-mail" required /><br><br>
<input type = "submit" name = "submit" value = "Save" />
</form>
</html>