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
			echo "Username or password incorrect";
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
	echo 'This user has blocked the site administrator . Avtoryzaytsiya failure<br>';
	echo '
	<form method="post">
	<input type="submit" name = "output" value = "Exit"/>
	</form>';
}
else {
	if (isset($_POST["output"])) {
		unset($_SESSION["name"]);
		unset($_SESSION["rank"]);
		session_destroy();
	}
		if (isset($_SESSION["login"])) {
			$_SESSION["name"]=$_SESSION["login"];
			$login=$_SESSION["name"];
		}
	
	if(!isset($_SESSION["name"])){
		echo '
			<form method="post">
				<h3>Log in </h3>
				<input type = "text" name = "e_login" placeholder = "Login" required /> <br>
				<input type = "password" name = "e_password" placeholder = "Password" required /> <br>
				<input type = "submit" name = "enter" value = "Input" />
			</form>';
			echo '<a href = "register.php" target="_blank" onclick="window.open(this.href,this.target,"width=250,height=225,scrollbars=1");return false;">Registr</a>';
	}
	else {
		echo 'login'."<a href = 'info_user.php'><b>$login</b></a>".'
		<br>
		<form method ="post">
		<input type = "submit" name = "output" value = "Exit"/>';
	}
}

?>