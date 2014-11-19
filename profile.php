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
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Рецепти</title>
		<meta http-equiv = "Content-Type" content = "text/html"; charset = "utf-8">
		<link rel = "stylesheet" type = "text/css" href = "css/style.css">
	</head>
	<body>
		<div class = "wrapper">
			<div class = "header">
				<div class = "image">
					<img src = "img/baner.jpg"/>
					<h2><span>Recipes</span></h2>
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
							echo "<h2>My Account :</h2>";
							echo '<a href ="new_password.php">New password</a><br>';
						    echo "<p><b>Login:</b><br><br><input type=\"text\" size=\"40\" value=\"".$row['login']."\" name=\"login\"/><br><br>";
						    echo "<p><b>E-mail:</b><br><br><input type =\"text\" size=\"40\" value =\"".$row['email']."\" name =\"email\"/><br><br>";
						    echo "<p><b>Your Name:</b><br><br><input type =\"text\" size=\"40\" value =\"".$row['name']."\" name =\"name\"/><br><br>";
						    echo "<p><b>Your Surname:</b><br><br><input type =\"text\" size=\"40\" value =\"".$row['last_name']."\" name =\"last_name\"/><br><br>";
						    echo '<input type = "submit" name = "save" />';
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
						<li><a href = index.php>Home</a></li>
						<?php
							if($rank == 1 || $rank == 2) {
								echo '<li><a href = new_article.php>Create new article</a></li>';
							}
							if($rank == 1) {
			 					echo '<li><a href = user.php>Browsing members</a></li>';
			 				}
			 			?>
					</menu>
				</div>
			</div>
		<div class="footer">Recipes © 2014</div>
	</body>
</html>
