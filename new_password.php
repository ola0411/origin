<?php
	session_start();
	error_reporting(E_ALL);
	@$login=$_SESSION['name'];
	@$check = $_SESSION['auth'];
	@$rank = $_SESSION['rank'];
	try {
		$db = new PDO('mysql:host=localhost;dbname=ololo; charset=utf8','root','123');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e) {
		die("Error: ".$e->getMessage());
	}
  include ("language.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $lang[0][1]; ?></title>
		<meta http-equiv = "Content-Type" content = "text/html"; charset = "utf-8">
		<link rel = "stylesheet" type = "text/css" href = "css/style.css">
	</head>
	<body>
		<div class = "wrapper">
			<div class = "header">
				<div class = "image">
					<div class = "lang">
						<span><a href = "?lang=ua"><img src = "img/ua.jpg"></a></span>
						<span><a href = "?lang=eng"><img src = "img/eng.jpg"></a>
					</div>
					<img src = "img/baner.jpg"/>
					<h2><span><?php echo $lang[0][1]; ?></span></h2>
				</div>
			</div>
			<div class = "left">
				<div class = "profile">
					<?php
					if(isset($_POST['save_pass'])) {
							$password = $_POST["password"];
							$r_password = $_POST["r_password"];

							if($password == $r_password) {
								$password = md5($password);
								echo $lang[21][1];

								$query = $db->prepare("UPDATE reg SET password = '$password' WHERE login = '$login'");
								header("Location: http://localhost/mysite/info_user.php");
							}
							else {
								echo $lang[22][1];
							}
					}
							echo "<form method=\"post\">\n";
							echo '<h2>' . $lang[23][1] . '</h2><br>';
						  echo '<p><b>' . $lang[23][1] . "</b><br><input type =\"password\" name =\"password\" size =\"25\" ><br><br>";
						  echo '<p><b>' . $lang[24][1] . "</b><br><input type =\"password\" name =\"r_password\" size =\"25\"><br><br>";
							echo "<input type =\"submit\" name =\"save_pass\" class =\"buttons\" value =\"" . $lang[11][1] . "\" />";

					?>
				</div>
			</div>
			<div class = "right">
				<div class = "authorization">
					<?php include("php/authorization.php"); ?>
				</div><br>
				<div class = "menu">
					<menu>
						<li><a href = index.php><?php echo $lang[1][1]?></a></li>
						<?php

							if($check == 1 || $check == 2) {
								echo '<li><a href="new_article.php">' . $lang[2][1] . '</a></li>';
							}
							if($check == 1) {
								echo '<li><a href = "user.php">' . $lang[3][1] . '</a></li>';
                echo '<li><a href = "language_editor.php">' . $lang[62][1] . '</a></li>';
							}
						?>
					</menu>
				</div>
			</div>
		<div class="footer"><?php echo $lang[4][1]?></div>
	</body>
</html>
