<?php
	session_start();
	@$login=$_SESSION["name"];
	@$check = $_SESSION["auth"];
	@$rank = $_SESSION["rank"];
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
				<div class = "user">
					<?php
						if($rank == 1) {
							$result = $db->query("select * from reg");
							$data = $result->fetch();
							do {
								printf('
								<div>
								<ul>
								<li><b>Login:</b>%s  <b>Е-mail:</b>%s  <a href = "edit_user.php?id=%s">[edit]</a> <a href = "del_user.php?id=%s">[delete]</a>
								</ul><br>
								</div>
								',$data['login'], $data['email'], $data['id'], $data['id']);
							}
							while ($data = $result->fetch());
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
						?>
					</menu>
				</div>
			</div>
			<div class = "footer">Recipes © 2014</div>
		</div>
	</body>
</html>
