<?php
	session_start();
	error_reporting(E_ALL);
	@$login=$_SESSION['name'];
	@$check = $_SESSION["auth"];
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
				<div class="info_user">
					<?php
						echo '<a href="edit_user.php">Change Password</a><br>';
						$result = $db->query("SELECT * FROM reg WHERE login='$login'");
						$data = $result->fetch();
							do {
								printf('
								<br><div>
								<ol>
								<li><b>Login:</b>%s </li><br>
								<li><b>Е-mail:</b>%s </li><br>
								</ol><br>
								</div>
								',$data["login"], $data["email"]);
							}
							while	($data = $result->fetch());
					?>
				</div>
			</div>
			<div class="right">
				<div class="authorization">
					<?php
						include ("php/authorization.php");
					?>
				</div><br>
				<div class="menu">
					<menu>
						<li><a href = index.php>Home</a></li>
							<?php
								if($check == true) {
									echo '<li><a href = new_article.php>Create new article</a></li>';
								}
							?>
						<li><a href = user.php>Browsing members</a></li>
					</menu>
				</div>
			</div>
			<div class="footer">Recipes © 2014</div>
		</div>	
	</body>
</html>