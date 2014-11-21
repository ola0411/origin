<?php
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
            <a href = "?lang=ua"><img src = "img/ua.jpg"></a>
            <a href = "?lang=eng"><img src = "img/eng.jpg"></a>
          </div>
              <img src = "mysite/img/baner.jpg"/>
            <h2><span><?php echo $lang[0][1]?></span></h2>
        </div>
      </div>
      <div class="left">

		<?php
			session_start();
			@$login = $_SESSION["name"];

				if(isset($_POST['no'])) {
					header("Location: http://localhost/mysite/info_user.php");
				}
				if(isset($_POST['yes'])) {
					header("Location: http://localhost/mysite/del_prof.php");
				}
		?>
				<h2>Delete now?</h2>
		<form method="post">
			<input type = "submit" name = "yes" value = "yes"/>
			<input type = "submit" name = "no" value = "no"/>
		</form>
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
