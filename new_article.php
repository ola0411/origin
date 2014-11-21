<?php
	session_start();
$rank = isset($_SESSION["rank"]) ? $_SESSION["rank"] : NULL;
$login = isset($_SESSION['name']) ? $_SESSION['name'] : NULL;

	include ('includes/connect.php');
  include ('includes/my_functions.php');
	include ("language.php");
	?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $lang[0][1]; ?></title>
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
					<h2><span><?php echo $lang[0][1]; ?></span></h2>
				</div>
			</div>
			<div class = "left">
				<div class = "new_article">
					<?php
						if($rank == 1 || $rank == 2) {
							if (isset($_POST['article'])) {
								$title_ua   = strip_tags($_POST['title_ua']);
								$m_desk_ua  = strip_tags($_POST['m_desk_ua']);
								$desk_ua    = strip_tags($_POST['desk_ua']);
								$img_ua     = $_POST['img_ua'];
								$title_eng  = strip_tags($_POST['title_eng']);
                $m_desk_eng = strip_tags($_POST['m_desk_eng']);
                $desk_eng   = strip_tags($_POST['desk_eng']);
                $img_eng    = $_POST['img_eng'];
                $date       = date("d F G:i");
								$cut_ua     = textFunc($m_desk_ua, 150 );
                $cut_eng    = textFunc($m_desk_eng, 150 );
  							$query_ua   = $db->query("INSERT INTO article_ua VALUES ('','$title_ua', '$cut_ua', '$desk_ua', '$login', '$date', '$img_ua')");
                $query_eng  = $db->query("INSERT INTO article_eng VALUES ('','$title_eng', '$cut_eng', '$desk_eng', '$login', '$date', '$img_eng')");
							  header("Location: http://localhost/mysite/");
							}
							echo '<form method = "post">
									<h2>' . $lang[58][1] . '</h2><br>
				 					<p><b>' . $lang[7][1] . '</b><br><br>
				   					<input type = "text" name = "title_ua" size = "51" required ><br><br>
									<p><b>' . $lang[8][1] . '</b><br><br>
				   					<textarea name = "m_desk_ua" cols = "40" rows = "3" required></textarea></p><br>
									<p><b>' . $lang[10][1] . '</b><br><br>
				   					<textarea name = "desk_ua" cols = "40" rows = "3" resize = "none" required></textarea></p><br>
									<p><b>' . $lang[9][1] . '</b><br><br>
				 					<input type = "text" name ="img" size="45">
									<input type = "file" name = "img_ua" required /><br><br>
                  <h2>' . $lang[59][1] . '</h2><br>
                  <p><b>' . $lang[7][1] . '</b><br><br>
                    <input type = "text" name = "title_eng" size = "51" required ><br><br>
                  <p><b>' . $lang[8][1] . '</b><br><br>
                    <textarea name = "m_desk_eng" cols = "40" rows = "3" required></textarea></p><br>
                  <p><b>' . $lang[10][1] . '</b><br><br>
                    <textarea name = "desk_eng" cols = "40" rows = "3" resize = "none" required></textarea></p><br>
                  <p><b>' . $lang[9][1] . '</b><br><br>
                  <input type = "text" name ="img" size="45">
                  <input type = "file" name = "img_eng" required /><br><br>
                  <input type = "submit" name = "article" value = " ' . $lang[11][1] . '" />
              </form>';
						}
						else {
							echo $lang[5][1];
						}
					?>

				</div>
			</div>
			<div class = "right">
				<div class = "authorization">
					<?php include("php/authorization.php"); ?>
				</div><br>
				<div class = "menu">
					<menu>
						<li><a href = index.php><?php echo $lang[1][1]?></a></li>
						<?php
							if($rank == 1) {
								echo '<li><a href = "user.php">' . $lang[3][1] . '</a></li>';
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
