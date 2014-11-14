<?php
	session_start();
	@$check = $_SESSION["auth"];
	error_reporting(E_ALL);
	try	{
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
		<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
	<div class="wrapper">
		<div class="header">
			<div class="image">
				<img src="img/baner.jpg"/>
				<h2><span>Recipes</span></h2>
			</div>
		</div>
		<div class="left">
			<div class="edit_article">
				<?php
					$id=$_GET["id"];	
					if (isset($_POST['edit'])) {
						$title=$_POST['title'];
						$m_desk=$_POST['m_desk'];
						$desk=$_POST['desk'];
						$url=$_POST['url'];
						$id=$_GET["id"];
						
						function textFunc($str, $maxLen) {
							if (mb_strlen($str) > $maxLen) {
								preg_match( '/^.{0,'.$maxLen.'} .*?/ui', $str, $match );
								return $match[0].'...';
							}
							else {
								return $str;
							}
						}
						$cut = textFunc($m_desk, 150 ); 
						$query = $db->query("UPDATE article1 SET title='$title', m_desk='$cut', desk='$desk', url='$url' WHERE id='$id'");
						header("Location: http://localhost/mysite/view.php?id=$id");
					}
						$result = $db->query("SELECT * FROM article1 WHERE id='$id'");
						$row = $result->rowCount();
					while ($row = $data = $result->fetch()) {
						echo "<form method=\"post\">\n";
						echo "<h2>EDIT ARTICLE</h2><br>";
					    echo "<p><b>Title:</b><br><br><input type=\"text\" size=\"80\" value=\"".$row['title']."\" name=\"title\"/><br><br>";
					    echo "<p><b>A brief description of the article:</b><br><br><textarea name=\"m_desk\">".$row['m_desk']."</textarea></p><br>";
					    echo "<p><b>Main article:</b><br><br><textarea name=\"desk\" cols=\"90\" rows=\"3\">".$row['desk']."</textarea></p><br>";
						echo "<p><b>Picture</b><br><br><input type=\"text\" name=\"url\" size=\"6\" value=\"".$row['url']."\"/><input type=\"file\" name=\"url\" ><br><br>";
						echo "<input type=\"submit\" name=\"edit\" class=\"buttons\" value=\"Save\" />";
					}
				?>
		
			</div>
		</div>
		<div class="right">
			<div class="authorization">
					<?php include ("php/authorization.php"); ?>
			</div><br>
			<div class="menu">
				<menu>
					<li><a href=index.php>Home</a></li>
				<?php
						if($check == true) {
							echo '<li><a href = new_article.php>Create new article</a></li>';
						}
				?>
					<li><a href=user.php>Browsing members</a></li>
				</menu>
			</div>
		</div>
		<div class="footer">Recipes © 2014</div>
	</body>
</html>