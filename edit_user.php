<?php
	session_start();
	@$login = $_SESSION["name"];
	@$check = $_SESSION["auth"];
	error_reporting(E_ALL);
	try {   
		$db = new PDO('mysql:host=localhost;dbname=ololo; charset=utf8','root','123');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
					<h2><span>Рецепти</span></h2>
				</div>
			</div>
			<div class = "left">
				<div class = "edit_user">
					<?php
						if(isset($_POST['edit_user'])) {
							$login = $_POST['login'];
							$password = $_POST['password'];
							$r_password = $_POST['r_password'];
				
							if($password == $r_password) {
								$password = md5($password);
								echo 'Password successfully changed';	
							}
							else {
								echo 'Passwords do not match';
							}
							$query = $db->prepare("UPDATE reg SET login = '$login', password = '$password' WHERE login = '$login'");
						}
							$result = $db->query("SELECT * FROM reg WHERE login = '$login'");
							$row = $result->rowCount();

						while ($row = $result->fetch()) {
							echo "<form method=\"post\">\n";
							echo "<h2>My Account :</h2><br>";
						    echo "<p><b>Login:</b><br><br><input type=\"text\" size=\"40\" value=\"".$row['login']."\" name=\"login\"/><br><br>";
						    echo "<p><b>New password:</b><br><br><input type=\"password\" name=\"password\" size=\"40\" ><br><br>";
						   	echo "<p><b>Confirm password:</b><br><br><input type=\"password\" name=\"r_password\" size=\"40\"><br><br>";
							echo "<input type=\"submit\" name=\"edit_user\" class=\"buttons\" value=\"Save\" />";
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
							if($check == true) {
								echo '<li><a href = new_article.php>Create new article</a></li>';
							}
						?>
						<li><a href = user.php>Browsing members</a></li>
					</menu>
				</div>
			</div>
		<div class="footer">Recipes © 2014</div>
	</body>
</html>