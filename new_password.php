<?php
	session_start();
	error_reporting(E_ALL);
	@$login=$_SESSION['name'];
	@$check = $_SESSION['auth'];
	@$rank = $_SESSION["rank"];
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
		<title>Рrofile</title>
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
				<div class = "profile">
					<?php
					if(isset($_POST['save_pass'])) {
							$password = $_POST["password"];
							$r_password = $_POST["r_password"];
										
							if($password == $r_password) {
								$password = md5($password);
								echo 'Password successfully changed';
								
								$query = $db->prepare("UPDATE reg SET password = '$password' WHERE login = '$login'");
								header("Location: http://localhost/mysite/info_user.php");	
							}
							else {
								echo 'Passwords do not match';
							}
					}
							echo "<form method=\"post\">\n";
							echo "<h2>NEW PASSWORD:</h2><br>";
						    echo "<p><b>New password:</b><br><input type =\"password\" name =\"password\" size =\"25\" ><br><br>";
						   	echo "<p><b>Confirm password:</b><br><input type =\"password\" name =\"r_password\" size =\"25\"><br><br>";
							echo "<input type =\"submit\" name =\"save_pass\" class =\"buttons\" value =\"Save\" />";
					
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
							if($check == 1 || $check == 2) {
								echo '<li><a href = new_article.php>Create new article</a></li>';
							}
							if($check == 1) {
								echo '<li><a href = user.php>Browsing members</a></li>';
							}
						?>
					</menu>
				</div>
			</div>
		<div class="footer">Recipes © 2014</div>
	</body>
</html>