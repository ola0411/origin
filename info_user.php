<?php
	session_start();
    $check = isset($_SESSION['auth']) ? $_SESSION['auth'] : NULL;
    $rank  = isset($_SESSION['rank']) ? $_SESSION['rank'] : NULL;
    $login = isset($_SESSION['name']) ? $_SESSION['name'] : NULL;
	include ('includes/connect.php');
  include ('language.php');

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
				<div class = "avatar">
					<?php
						echo '<a href = "profile.php?lang=' . $lange .'">' . $lang[55][1] . '</a><br>';
						echo '<a href = "php/dell_prof.php">' . $lang[56][1] . '</a><br>';
						$result = $db -> query("SELECT * FROM reg WHERE login ='$login'");
						$data = $result -> fetch();
							do {

								printf('
								<br><div>
								<ol>
								<img src ="%s"/>
								<li><b> ' . $lang[13][1] . '</b>%s </li><br>
								<li><b>' . $lang[14][1] . '</b>%s </li><br>
								<li><b>' . $lang[15][1] . '</b>%s </li><br>
								<li><b>' . $lang[16][1] . '</b>%s</li><br>
								<li><b>' . $lang[18][1] . '</b>%s</li><br>
								<li><b>' . $lang[19][1] . '</b>%s</li><br>
								</ol><br>
								</div>
								',$data['img'], $data['login'], $data['email'], $data['name'], $data['last_name'], $data['date'], $data['date_av']);
							}
							while	($data = $result -> fetch());
					?>

				</div>
			</div>
			<div class ="right">
				<div class = "authorization">
					<?php include ('php/authorization.php'); ?>
				</div><br>
				<div class = "menu">
					<menu>
							<?php
                echo '<li><a href = "index.php?lang=' . $lange .'">' . $lang[1][1]. '</a></li>';
								if($rank == 1 || $rank == 2) {
										echo '<li><a href="new_article.php?lang=' . $lange .'">' . $lang[2][1] . '</a></li>';
								}
								if($rank == 1) {
			 						echo '<li><a href="user.php?lang=' . $lange .'">' . $lang[3][1] . '</a></li>';
                  echo '<li><a href = "language_editor.php?lang=' . $lange .'">' . $lang[62][1] . '</a></li>';
			 					}
			 				?>
					</menu>
				</div>
			</div>
			<div class = "footer"><?php echo $lang[4][1]?></div>
		</div>
	</body>
</html>
