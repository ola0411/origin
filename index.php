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
			<div class="left">
				<?php
					$result = $db->query("SELECT * FROM article1"); 
					
					if (empty($data['id'])) {
						$data['id'] = 1;
					}
					$max_posts = 10;
					$num_posts = $result->rowCount();
					$num_pages = intval(($num_posts-1) / $max_posts)+1;

					for($i=1 ; $i<=$num_pages; $i++)
 					echo "<a href='/mysite/index.php?page=$i'>$i</a>";
 
 					if (isset($_GET["page"])) {
 						$page = $_GET["page"];
 						if($page < 1)
 							$page = 1;
 						elseif($page > $num_pages)
 							$page = $num_pages;
 					}
 					else {
 						$page = 1;
 					}
 					$data = $result->fetch();
					do {
						if (($data["id"]>($page*$max_posts-$max_posts))&&($data["id"]<=$page*$max_posts)) {
							printf('
							<div class="article">
						    <img src="img/article/%s"/>
						    <a class="title" href="view.php?id=%s"><h2>%s</h2></a>
						    <p>%s<a href="view.php?id=%s"><h3>Read More</h3></a></p><br>
						    <b><i>%s</i></b><br>
						    <i>%s</i>
						    </div>

							',$data["url"], $data["id"], $data["title"], $data["m_desk"], $data["id"], $data["login"], $data["date"]);
							}
					}
					while($data = $result->fetch());
				?>
			</div>
			<div class = "right">
				<div class = "authorization">
					<?php include ("php/authorization.php"); ?>
				</div><br>
				<div class = "menu">
					<menu>
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
		 	<div style="clear:both"></div>
		</div>
		<div class="footer">Recipes © 2014</div>
	</body>
</html>