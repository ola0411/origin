<?php
	session_start();
	error_reporting(E_ALL);
	@$login = $_SESSION['name'];
	@$check = $_SESSION["auth"];
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
		<title>Recipes</title>
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
				<div class = "info_user">
					<?php
						echo '<a href = "profile.php">Change Рrofile</a><br>';
						echo '<a href = "del_prof.php">Delete Рrofile</a><br>';
						$result = $db->query("SELECT * FROM reg WHERE login ='$login'");
						$data = $result->fetch();
							do {
							
								printf('
								<br><div>
								<ol>
								<li><b>Login:</b>%s </li><br>
								<li><b>Е-mail:</b>%s </li><br>
								<li><b>Name:</b>%s </li><br>
								<li><b>Surname:</b>%s</li><br>
								<li><b>Date registration:</b>%s</li><br>
								<li><b>Date of entrance:</b>%s</li><br>
								</ol><br>
								</div>
								',$data["login"], $data["email"], $data["name"], $data["last_name"], $data["date"], $data["date_av"]);
							}
							while	($data = $result->fetch());

					?>
					
				</div>
			</div>
			<div class ="right">
				<div class = "authorization">
					<?php include ("php/authorization.php"); ?>
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
			<div class = "footer">Recipes © 2014</div>
		</div>	
	</body>
</html>
