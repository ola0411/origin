<?php
	session_start();
	@$login = $_SESSION["name"];
	@$check = $_SESSION["auth"];
	@$rank = $_SESSION["rank"];
	error_reporting(E_ALL);
	try {
		$db = new PDO('mysql:host=localhost;dbname=ololo; charset=utf8','root','123');
	}
	catch(PDOException $e) {
		die("Error: ".$e->getMessage());
	}
	include ("language.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $lang[0][1]?></title>
		<meta http-equiv = "Content-Type" content = "text/html"; charset = "utf-8">
		<link rel = "stylesheet" type = "text/css" href = "css/style.css">
	</head>
	<body>
		<div class = "wrapper">
			<div class = "header">
				<div class = "image">
					<div class = "lang">
						<a href = "?lang=ua"><img src = "img/ua.jpg"></a>
						<a href = "?lang=eng"><img src = "img/eng.jpg"></a>
					</div>
					<img src = "img/baner.jpg"/>
					<h2><span><?php echo $lang[0][1]?></span></h2>
				</div>
			</div>
			<div class = "left">
				<div class = "edit_user">

					<?php
						include ("php/file.php");
						if(isset($_POST['save'])) {
							$login = $_POST["login"];
							$email = $_POST["email"];
							$name = $_POST["name"];
							$last_name = $_POST["last_name"];

							$query = $db->query("UPDATE reg SET login = '$login', email = '$email', name = '$name', last_name = '$last_name' WHERE login = '$login'");
							header('Location: http://localhost/mysite/info_user.php');
						}
							$result = $db->query("SELECT * FROM reg WHERE login = '$login'");
							$row = $result->rowCount();

						while ($row = $result->fetch()) {
							echo "<form method=\"post\">\n";
							echo '<h2>' . $lang[25][1] . '</h2>';
							echo '<a href ="new_password.php">' . $lang[23][1] . '</a><br>';
						  echo'<p><b>' . $lang[13][1] . "</b><br><br><input type=\"text\" size=\"40\" value=\"".$row['login']."\" name=\"login\"/><br><br>";
						  echo '<p><b>' . $lang[14][1] . "</b><br><br><input type =\"text\" size=\"40\" value =\"".$row['email']."\" name =\"email\"/><br><br>";
						  echo '<p><b>' . $lang[15][1] . "</b><br><br><input type =\"text\" size=\"40\" value =\"".$row['name']."\" name =\"name\"/><br><br>";
						  echo '<p><b>' . $lang[16][1] . "</b><br><br><input type =\"text\" size=\"40\" value =\"".$row['last_name']."\" name =\"last_name\"/><br><br>";
						  echo '<input type = "submit" name = "' . $lang[11][1] . '" />';
						}
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
							if($rank == 1 || $rank == 2) {
								echo '<li><a href="new_article.php">' . $lang[2][1] . '</a></li>';
							}
							if($rank == 1) {
			 					echo '<li><a href="user.php">' . $lang[3][1] . '</a></li>';
                echo '<li><a href = "language_editor.php">' . $lang[62][1] . '</a></li>';
			 				}
			 			?>
					</menu>
				</div>
			</div>
		<div class="footer"><?php echo $lang[4][1]?></div>
	</body>
</html>
