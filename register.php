<?php
	error_reporting(E_ALL);
	try {
		$db = new PDO('mysql:host=localhost;dbname=ololo','root','123');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e) {
		die("Error: ".$e->getMessage());
	}

	if (isset($_POST['submit'])) {
		$login=$_POST['login'];
		$password=$_POST['password'];
		$r_password=$_POST['r_password'];
		$email=$_POST['email'];

		if ($password==$r_password) {
		$password=md5($password);
		}
		$log = $db->query("select * from reg WHERE login='$login'");
		if ($log->fetchColumn()!=0) {
			echo "Користувач з таким логіном вже існує";
		}
		else {
		$query = $db->prepare("INSERT INTO reg VALUES ('','$login', '$password', '$email')");
		session_start();
		$_SESSION["login"]=$login;
		echo "Реєстрація пройшла успішно. Ви увійшли під логіном <b>$login</b>";
		}
	}
?>
<html>
	<head>
		<title>Registration</title>
		<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/style_reg.css">
	</head>
	<body>
		<div class="register">
			<form method="post" action="register.php">
				<h3>РЕЄСТРАЦІЯ</h3>
				<input type="text" name="login" placeholder="Login" required /> <br>
				<input type="password" name="password" placeholder="Password" required /> <br>
				<input type="password" name="r_password" placeholder="Confirm password" required/><br>
				<input type="text" name="email" placeholder="E-mail" required /><br><br>
				<input type="submit" name="submit" value="///Registration" />
			</form>
		</div>
	</body>
</html>
