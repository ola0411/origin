<?php
	session_start();
  $check = isset($_SESSION["auth"]) ? $_SESSION["auth"] : NULL;
  $rank = isset($_SESSION["rank"]) ? $_SESSION["rank"] : NULL;
  $login = isset($_SESSION['name']) ? $_SESSION['name'] : NULL;

  include ('includes/connect.php');
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
						<a href = "?lang=ua"><img src = "img/ua.jpg"></a>
						<a href = "?lang=eng"><img src = "img/eng.jpg"></a>
					</div>
							<img src = "img/baner.jpg"/>
						<h2><span><?php echo $lang[0][1]?></span></h2>
				</div>
			</div>
			<div class="left">
				<?php

            if(isset($_GET['lang'])) {
              switch($_GET['lang']):
                case 'ua':  $result = $db->query("SELECT * FROM article_ua");
                  break;
                case 'eng': $result = $db->query("SELECT * FROM article_eng");
                  break;
              endswitch;
            }
            else {
            $result = $db->query("SELECT * FROM article_ua");
            }

					if (empty($data['id'])) {
						$data['id'] = 1;
					}
					$max_posts = 5;
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
						if (($data["id"] > ($page*$max_posts-$max_posts)) && ($data["id"] <= $page * $max_posts)) {
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
								echo '<li><a href="new_article.php">' . $lang[2][1] . '</a></li>';
							}
							if($rank == 1) {
			 				echo '<li><a href = "user.php">' . $lang[3][1] . '</a></li>';
              echo '<li><a href = "language_editor.php">' . $lang[62][1] . '</a></li>';
			 				}
		 				?>
		 			</menu>
		 		</div>
		 	</div>
		 	<div style="clear:both"></div>
		</div>
		<div class="footer"><?php echo $lang[4][1]?></div>
	</body>
</html>
