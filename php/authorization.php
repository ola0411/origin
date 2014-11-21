<?php
	error_reporting(E_ALL);
	try {
		$db = new PDO('mysql:host=localhost;dbname=ololo','root','123');
	}
	catch(PDOException $e) {
    	die("Error: ".$e->getMessage());
	}
	if (isset($_POST["enter"])) {
		$e_login = $_POST["e_login"];
		$e_password = md5($_POST["e_password"]);
		$date = date("Y-m-d H:i:s");
		$row = $db->query("select * from reg WHERE login = '$e_login'")->fetch();
		$query = $db->query("UPDATE reg SET date_av = '$date' WHERE login = '$e_login'");


		if ($row['password'] == $e_password) {
			$_SESSION["name"] = $e_login;
			$_SESSION["rank"] = $row['rank'];
			$_SESSION["id_user"] = $row['id'];


		}
		else {
			echo $lang[34][1];
		}

		@$login = $_SESSION["name"];
		@$rank = $_SESSION["rank"];
		@$id_user = $_SESSION["id_user"];
		@$login1 = $_SESSION["login"];
		}
if($rank == 4) {
	if (isset($_POST["output"])) {
		unset($_SESSION["name"]);
		unset($_SESSION["rank"]);
		session_destroy();
	}
	echo $lang[35][1] . '<br>';
	echo '
	<form method="post">
	<input type="submit" name = "output" value = "' . $lang[38][1] . '"/>
	</form>';
}
else {
	if (isset($_POST["output"])) {
		unset($_SESSION["name"]);
		unset($_SESSION["rank"]);
		session_destroy();
	}
		if (isset($_SESSION["login"])) {
			$_SESSION["name"] = $_SESSION["login"];
			$login = $_SESSION["name"];
		}

	if(!isset($_SESSION["name"])){
		echo '
			<form method="post">
				<h3>' . $lang[57][1] . '</h3>
				<input type = "text" name = "e_login" placeholder = "' . $lang[13][1] . '" required /> <br>
				<input type = "password" name = "e_password" placeholder = "' . $lang[36][1] . '" required /> <br>
				<input type = "submit" name = "enter" value = "' . $lang[38][1] . '" />
			</form>';
			echo '<a href = "register.php">' . $lang[31][1] . '</a>';
	}
	else {
		echo 'login'."<a href = 'info_user.php'><b>$login</b></a>".'
		<br>
		<form method ="post">
		<input type = "submit" name = "output" value = "' . $lang[38][1] . '"/>';
	}
}

?>
