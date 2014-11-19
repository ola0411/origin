<?php
	session_start();
	@$check = $_SESSION["auth"];
	@$rank = $_SESSION["rank"];
	@$login = $_SESSION['name'];
	error_reporting(E_ALL);
	try	{
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
		<div class="left">
			<div class="edit_article">
				<?php
				$id = $_GET["id"];
					if($rank == 1 || $rank == 2) {
						if (isset($_POST['edit'])) {
						header("Location: http://localhost/mysite/view.php?id=$id");
						$title  = strip_tags($_POST['title']);
						$m_desk = strip_tags($_POST['m_desk']);
						$desk   = strip_tags($_POST['desk']);
						$url    = strip_tags($_POST['url']);
						$id     = strip_tags($_GET["id"]);
						$query  = $db->query("UPDATE article1 SET title = '$title', m_desk = '$m_desk', desk = '$desk', url = '$url' WHERE id = '$id'");
					}
						$result = $db->query("SELECT * FROM article1 WHERE id ='$id'");
						$row = $result->rowCount();
					while ($row = $result->fetch()) {
						echo "<form method = \"post\">\n";
						echo "<h2>EDIT ARTICLE</h2><br>";
					    echo "<p><b>Title:</b><br><br><input type = \"text\" size = \"80\" value = \"".$row['title']."\" name = \"title\"/><br><br>";
					    echo "<p><b>A brief description of the article:</b><br><br><textarea name = \"m_desk\">".$row['m_desk']."</textarea></p><br>";
					    echo "<p><b>Main article:</b><br><br><textarea name = \"desk\" cols = \"90\" rows = \"3\">".$row['desk']."</textarea></p><br>";
						echo "<p><b>Picture</b><br><br><input type = \"text\" name = \"url\" size = \"6\" value = \"".$row['url']."\"/><input type=\"file\" name=\"url\" ><br><br>";
						echo "<input type=\"submit\" name = \"edit\" class = \"buttons\" value = \"Save\" />";
					}
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
		<div class="footer">Recipes © 2014</div>
	</body>
</html>