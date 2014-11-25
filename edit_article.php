<?php
	session_start();
	$check = isset($_SESSION['auth']) ? $_SESSION['auth'] : NULL;
	$rank = isset($_SESSION['rank']) ? $_SESSION['rank'] : NULL;
	$login = isset($_SESSION['name']) ? $_SESSION['name'] : NULL;
	$id = $_GET['id'];
	  include ('includes/connect.php');
    $url = $_SERVER["REQUEST_URI"];
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
						<a href ="<?php echo $url . '&lang=ua'; ?>"><img src = "img/ua.jpg"></a>
            <a href ="<?php echo $url . '&lang=eng'; ?>"><img src = "img/eng.jpg"></a>
					</div>
				<img src = "img/baner.jpg"/>
				<h2><span><?php echo $lang[0][1]; ?></span></h2>
			</div>
		</div>
		<div class="left">
			<div class="edit_article">
				<?php

					if($rank == 1 || $rank == 2) {
						if (isset($_POST['edit'])) {
						header("Location: http://localhost/mysite/view.php?id=$id");
						$title  = strip_tags($_POST['title']);
						$m_desk = strip_tags($_POST['m_desk']);
						$desk   = strip_tags($_POST['desk']);
						$url    = strip_tags($_POST['url']);
						$id     = strip_tags($_GET["id"]);


              if(isset($_GET['lang'])) {
                switch($_GET['lang']):
                  case 'ua':  $query  = $db->query("UPDATE article_ua SET title = '$title', m_desk = '$m_desk', desk = '$desk', url = '$url' WHERE id = '$id'");
                    break;
                  case 'eng': $query  = $db->query("UPDATE article_eng SET title = '$title', m_desk = '$m_desk', desk = '$desk', url = '$url' WHERE id = '$id'");
                    break;
                endswitch;
              }
              else {
              $query  = $db->query("UPDATE article_ua SET title = '$title', m_desk = '$m_desk', desk = '$desk', url = '$url' WHERE id = '$id'");
              }
					}

              if(isset($_GET['lang'])) {
              switch($_GET['lang']):
                case 'ua':
                  $result = $db->query("SELECT * FROM article_ua WHERE id = '$id'");
                  break;
                case 'eng':
                  $result = $db->query("SELECT * FROM article_eng WHERE id ='$id'");
                  break;
              endswitch;
            }
            else {
            $result = $db->query("SELECT * FROM article_ua WHERE id ='$id'");
            }

						$row = $result->rowCount();
					while ($row = $result->fetch()) {
  					echo "<form method = \"post\">\n";
  					echo '<h2> ' . $lang[6][1] . '</h2><br>';
  					echo '<p><b>' . $lang[7][1] . "</b><br><br><input type = \"text\" size = \"80\" value = \"".$row['title']."\" name = \"title\"/><br><br>";
  					echo '<p><b>' . $lang[8][1] . "</b><br><br><textarea name = \"m_desk\">".$row['m_desk']."</textarea></p><br>";
  					echo '<p><b>' . $lang[10][1] . "</b><br><br><textarea name = \"desk\" cols = \"90\" rows = \"3\">".$row['desk']."</textarea></p><br>";
  				  echo '<p><b>' . $lang[9][1] . "</b><br><br><input type = \"text\" name = \"url\" size = \"6\" value = \"".$row['url']."\"/><input type=\"file\" name=\"url\" ><br><br>";
  					echo "<input type=\"submit\" name = \"edit\" class = \"buttons\" value = \"" . $lang[11][1] . "\" />";
					}
				}

				else {
					echo $lang[5][1];
				}
				?>

			</div>
		</div>
		<div class = "right">
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
			 				echo '<li><a href = "user.php?lang=' . $lange .'">' . $lang[3][1] . '</a></li>';
              echo '<li><a href = "language_editor.php?lang=' . $lange .'">' . $lang[62][1] . '</a></li>';
			 			}
			 		?>
				</menu>
			</div>
		</div>
		<div class="footer"><?php echo $lang[4][1]?></div>
	</body>
</html>
