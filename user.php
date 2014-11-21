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
	include ("language.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $lang[0][1]?></title>
		<meta http-equiv = "Content-Type" content = "text/html"; charset = "utf-8">
		<link rel = "stylesheet" type = "text/css" href = "css/style.css">
	</head>
	<body>
		<div class = "wrapper">
			<div class = "header">
				<div class = "image">
					<div class = "lang">
						<span><a href = "?lang=ua"><img src = "img/ua.jpg"></a></span>
						<span><a href = "?lang=eng"><img src = "img/eng.jpg"></a>
					</div>
					<img src = "img/baner.jpg"/>
					<h2><span><?php echo $lang[0][1]?></span></h2>
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
									<li><b>' . $lang[13][1] . '</b>%s<b>' . $lang[14][1] . '</b>%s  <a href="edit_user.php?id=%s">[' . $lang[33][1] . ']</a> <a href="php/dell_user.php?id=%s"> [' . $lang[32][1] . ']</a>
									</ul><br>
									</div>
									',$data['login'], $data['email'], $data['id'], $data['id']);
								}
								while ($data = $result->fetch());
						}
						else {
								echo $lang[5][1];
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
						<li><a href = index.php><?php echo $lang[1][1]?></a></li>
						<?php
							if($rank == 1 || $rank == 2) {
								echo '<li><a href="new_article.php">' . $lang[2][1] . '</a></li>';
							}
              if($rank == 1) {
                echo '<li><a href="user.php">' . $lang[3][1] . '</a></li>';
                echo '<li><a href = "language_editor.php">' . $lang[62][1] . '</a></li>';
              }
						?>
					</menu>
				</div>
			</div>
			<div class = "footer"><?php echo $lang[4][1]?></div>
		</div>
	</body>
</html>
