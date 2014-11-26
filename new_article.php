<?php
  session_start();
  $rank = isset($_SESSION['rank']) ? $_SESSION['rank'] : NULL;
  $login = isset($_SESSION['name']) ? $_SESSION['name'] : NULL;
  include ('includes/connect.php');
  include ('includes/my_functions.php');
  include ('language.php');
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
                $desk_ua    = strip_tags($_POST['desk_ua']);
                $img        = $_POST['img'];
                $title_eng  = strip_tags($_POST['title_eng']);
                $desk_eng   = strip_tags($_POST['desk_eng']);
                $date       = date("d F G:i");
                $cut_ua     = textFunc($desk_ua, 150 );
                $cut_eng    = textFunc($desk_eng, 150 );
                $query_ua   = $db->query("INSERT INTO article_ua  SET title = '$title_ua',  m_desk = '$cut_ua',  desk = '$desk_ua',  login = '$login', date = '$date', url = '$img'");
                $query_eng  = $db->query("INSERT INTO article_eng SET title = '$title_eng', m_desk = '$cut_eng', desk = '$desk_eng', login = '$login', date = '$date', url = '$img'");
                header('Location: http://localhost/mysite/');
              }
              echo '<form method = "post">
              <h2>' . $lang[58][1] . '</h2><b>
              <p><b>' . $lang[7][1] . '</b><br><br>
              <input type = "text" name = "title_ua" size = "51" required ><br><br>
              <p><b>' . $lang[8][1] . '</b><br><br>
              <textarea name = "desk_ua" cols = "40" rows = "3" resize = "none" required></textarea></p><br>
              <h2>' . $lang[59][1] . '</h2><br>
              <p><b>' . $lang[7][1] . '</b><br><br>
              <input type = "text" name = "title_eng" size = "51" required ><br><br>
              <p><b>' . $lang[10][1] . '</b><br><br>
              <textarea name = "desk_eng" cols = "40" rows = "3" resize = "none" required></textarea></p><br>
              <p><b>' . $lang[9][1] . '</b><br><br>
              <input type = "file" name = "img" required /><br><br>
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
           <?php
            echo '<li><a href = index.php?lang=' . $lange .'>' . $lang[1][1]. '</a></li>';
            if($rank == 1) {
              echo '<li><a href = "user.php?lang=' . $lange . '">' . $lang[3][1] . '</a></li>';
                      echo '<li><a href = "language_editor.php?lang=' . $lange . '">' . $lang[62][1] . '</a></li>';
          }
            ?>
          </menu>
        </div>
      </div>
      <div class = "footer"><?php echo $lang[4][1]?></div>
    </div>
  </body>
</html>
