<?php
  session_start();
  $check = isset($_SESSION["auth"]) ? $_SESSION["auth"] : NULL;
  $rank = isset($_SESSION["rank"]) ? $_SESSION["rank"] : NULL;
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
            <a href = "?lang=ua"><img src = "img/ua.jpg"></a>
            <a href = "?lang=eng"><img src = "img/eng.jpg"></a>
          </div>
              <img src = "img/baner.jpg"/>
            <h2><span><?php echo $lang[0][1]?></span></h2>
        </div>
      </div>
      <div class="left">
        <div class="user">
          <?php
              $lang_ua  = $db -> query("SELECT * FROM ua");
              $lang_eng = $db -> query("SELECT * FROM eng");
              $row_ua   = $lang_ua -> fetch();
              $row_eng  = $lang_eng -> fetch();
          do {
                  printf('
                  <table>
                  <tr>
                  <td><b>%s</b></td><td><a href="edit_lange.php?id=%s&lang=' . $lange .'">[' . $lang[33][1] . ']</a></td>
                  </tr>
                  </table>
                  ',$row_ua['lange'], $row_ua['id']);
                }
                while ($row_ua = $lang_ua->fetch());
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
      <div style="clear:both"></div>
    </div>
    <div class="footer"><?php echo $lang[4][1]?></div>
  </body>
</html>
