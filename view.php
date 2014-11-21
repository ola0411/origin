<?php
	session_start();
	@$check = $_SESSION["auth"];
	@$rank = $_SESSION["rank"];
	@$login = $_SESSION['name'];
	error_reporting(E_ALL);
	try {
		$db = new PDO('mysql:host=localhost;dbname=ololo; charset=utf8','root','123');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e) {
    die("Error: ".$e->getMessage());
	}
	include ("language.php");
  $url = $_SERVER["REQUEST_URI"];
  ?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $lang[0][1]?></title>
		<meta http-equiv = "Content-Type" content = "text/html"; charset="utf-8">
		<link rel="stylesheet" type = "text/css" href = "css/style_view.css">
	</head>
	<body>
		<div class = "wrapper">
			<div class = "header">
				<div class = "image">
					<div class = "lang">
						<a href ="<?php echo $url . '&lang=ua'; ?>"><img src = "img/ua.jpg"></a>
						<a href ="<?php echo $url . '&lang=eng'; ?>"><img src = "img/eng.jpg"></a>
					</div>
					<img src = "img/baner.jpg"/>
					<h2><span><?php echo $lang[0][1]?></span></h2>
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
								$_SESSION['id_article'] = $_GET['id'];
								$id_article = $_SESSION['id_article'];
							}
                  if(isset($_GET['lang'])) {
                    switch($_GET['lang']):
                      case 'ua':  $result = $db->query("SELECT * FROM article_ua WHERE id = '$id'");
                        break;
                      case 'eng': $result = $db->query("SELECT * FROM article_eng WHERE id = '$id'");
                        break;
                    endswitch;
            }
            else {
            $result = $db->query("SELECT * FROM article_ua WHERE id = '$id'");
            }

								$data = $result->fetch();
								if (!empty($data)) {
									do {

										printf('
										<div>
										<img src = "img/article/%s">
										<h1>%s</h1>
										<a href = "edit_article.php?id=%s"> [' . $lang[33][1] . '] </a>
										<a href = "php/confirmation.php?id=%s">[' . $lang[32][1] . ']</a>
										<p>%s</p>
							 			<b><i>%s</i></b><br>
								    	<i>%s</i>
										</div>
										',$data['url'], $data['title'], $data['id'], $data['id'], $data['desk'], $data['login'], $data['date']);
									}
									while	($data = $result->fetch());
								}
								else {
									print($lang[5][1]);
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
						<li><a href = index.php><?php echo $lang[1][1]; ?></a></li>
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
			<div class = "footer"><?php echo $lang[4][1]; ?></div>
		</div>
	</body>
</html>


