<!DOCTYPE html>
<html>
	<head>
		<title>Recipes</title>
		<meta http-equiv = "Content-Type" content = "text/html"; charset="utf-8">
		<link rel="stylesheet" type = "text/css" href = "css/style_view.css">
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
				<div class = "article">
					<?php
						session_start();
						@$rank = $_SESSION["rank"];
						error_reporting(E_ALL);
						if($rank == 1 || $rank == 2) {
							try {
								$db = new PDO('mysql:host=localhost;dbname=ololo; charset=utf8','root','123');
							}
							catch(PDOException $e) {
						    	die("Error: ".$e->getMessage());
							}

							if (!isset($_GET["id"])) {
								$id = 1;
							} 
							else {
								$id = $_GET["id"];
							}	
							$strSQL = $db->query("DELETE FROM article1 WHERE id = $id");
							header("Location: http://localhost/mysite");
						}
						else {
							echo 'You notlack rights';
						}
					?>
				</div>
			</div>
			<div class = "right">
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