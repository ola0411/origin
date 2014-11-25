<?php
  session_start();
  $check = isset($_SESSION['auth']) ? $_SESSION['auth'] : NULL;
  $rank = isset($_SESSION['rank']) ? $_SESSION['rank'] : NULL;
  $login = isset($_SESSION['name']) ? $_SESSION['name'] : NULL;

  include ('includes/connect.php');
  include ('language.php');
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
      <div class = "left">
        <div class = "edit_user">

          <?php
          if($rank == 1) {
            $id = $_GET['id'];
            if(isset($_POST['save'])) {
              $lang_eng = $_POST['lange_eng'];

            $up_eng = $db->query("UPDATE eng SET lange = '$lang_eng' WHERE id = '$id'");

            header('Location: http://localhost/mysite/language_editor.php');
          }
              $sel_ua = $db->query("SELECT * FROM ua WHERE id = '$id'");
              $sel_eng = $db->query("SELECT * FROM eng WHERE id = '$id'");
              $row_ua = $sel_ua->rowCount();
              $row_eng = $sel_ua->rowCount();


          if (!empty($row_ua && $row_eng)) {

            while ($row_eng = $sel_eng->fetch()) {
              echo "<form method=\"post\">\n";
              echo '<h2>' . $lang[62][1]. '</h2><br>';
              echo '<b>' . $lang[60][1] . "</b><br><input type =\"text\" size=\"40\" value =\"".$row_eng['lange']."\" name =\"lange_eng\"/><br>
                    <br><input type='submit' name='save' value='" . $lang[11][1] . "' />
                  </form>";
            }
         }
       }
          else {
            echo $lang[5][1];
          }
          ?>



          </form>
        </div>
      </div>
      <div class = "right">
        <div class = "authorization">
          <?php include("php/authorization.php"); ?>
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
              }
            ?>
          </menu>
        </div>
      </div>
    <div class="footer"><?php echo $lang[4][1]?></div>
  </body>
</html>
