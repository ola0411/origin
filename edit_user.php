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
				<div class = "edit_user">
					<form method = "post">
						<b>Edit rank:</b>
						<label><input type ="radio" name ="score" value ="1" onClick = "rating.submit();">admin</label>
						<label><input type ="radio" name ="score" value ="2" onClick = "rating.submit();">editor</label>
						<label><input type ="radio" name ="score" value ="3" onClick = "rating.submit();">user</label>
						<label><input type ="radio" name ="score" value ="4" onClick = "rating.submit();">anonym</label>
						<br><br><input type="submit" name="edit" value="Save" />
					<?php
						$user_id = $_GET["id"];

							if (isset($_POST['golos'])) {
	    						$rating = $_POST['score'];
								switch ($_POST['score']) {
									case 1: $_POST['score'];
									case 2: $_POST['score'];
									case 3: $_POST['score'];
									case 4: $_POST['score'];	
								}
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
