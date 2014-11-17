<?php
	session_start();
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
						if (!isset($_GET["id"])) {
							$id = 1;
						}
						else {
							$id = $_GET['id'];
						}
							$result = $db->query("select * from article1 WHERE id = '$id'");
							$data = $result->fetch();
							if (!empty($data)) {
								do {
									printf('
									<div>
									<img src = "img/article/%s">
									<h1>%s</h1>
									<a href = "edit_article.php?id=%s">[edit]</a>
									<a href = "delete_article.php?id=%s">[delete]</a>
									<p>%s</p>
						 			<b><i>%s</i></b><br>
							    	<i>%s</i>
							   		<div style = "clear:both"></div>
									</div>
									',$data["url"], $data["title"], $data["id"], $data["id"], $data["desk"], $data["login"], $data["date"]);
								}
								while	($data = $result->fetch());
						}
						else {
							print('Page not found');
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
