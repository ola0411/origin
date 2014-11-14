<?php
	session_start();
	@$login= $_SESSION["name"];
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
				<div class="new_article">
					<?php
						if (isset($_POST['article'])) {
							$title  = $_POST['title'];
							$m_desk = $_POST['m_desk'];
							$desk   = $_POST['desk'];
							$img    = $_POST['img'];
							$date   = date("d F G:i");
			
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
						$query = $db->query("INSERT INTO article1 VALUES ('','$title', '$cut', '$desk', '$login', '$date', '$img')");
						header("Location: http://localhost/mysite/");
						}
					?>
					<form method="post" action="new_article.php">
						<h2>ARTICLE</h2><br>
	 					<p><b>Title of article:</b><br><br>
	   					<input type="text" name="title" size="51" required><br><br>
						<p><b>A brief description of the article:</b><br><br>
	   					<textarea name="m_desk" cols="40" rows="3" required></textarea></p><br>
						<p><Text :</b><br><br>
	   					<textarea name="desk" cols="40" rows="3" resize="none" required></textarea></p><br>
						<p><b>Add img:</b><br><br>
	 					<input type="text" name="img" size="45">
						<input type="file" name="img" required /><br><br>
						<input type="submit" name="article" value="Add adticle" />
					</form>
				
				</div>
			</div>
			<div class="right">
				<div class="authorization">
					<?php include("php/authorization.php"); ?>
				</div><br>
				<div class="menu">
					<menu>
						<li><a href=index.php>Home</a></li>
						<li><a href=user.php>Browsing members</a></li>
					</menu>
				</div>
			</div>
			<div class="footer">Recipes © 2014</div>
		</div>
	</body>
</html>
