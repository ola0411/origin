<?php
include ('includes/connect.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $lang[31][1]?></title>
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
        <div class= "register">
        <?php
          if (isset($_POST['submit'])) {
            $login      = $_POST['login'];
            $password   = $_POST['password'];
            $r_password = $_POST['r_password'];
            $email      = $_POST['email'];
            $date       = date('Y-m-d H:i:s');
            $img        = 'img/avatar/profile.jpg';
            $rank       = 3;

              $log = $db->query("SELECT * FROM reg WHERE login = '$login'");
              $em  = $db->query("SELECT * FROM reg WHERE email = '$email'");

            if($password == $r_password) {
              $password = md5($password);

                  if(!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                          echo $lang[27][1];
                      }
                      else {
                    if($log ->fetchColumn() > 0) {
                      echo $lang[27][1] . "<b>$login</b>" . $lang[28][1];
                    }
                    elseif($em ->fetchColumn() > 0) {
                      echo $lang[29][1] . "<b>$email</b>" . $lang[28][1];
                    }
            else {
              $query = $db->query("INSERT INTO reg SET login = '$login', password = '$password', email = '$email', rank = '$rank', date = '$date', date_av = '$date', img = '$img'");
              session_start();
              $_SESSION["login"] = $login;
              $login1 = $_SESSION["login"];

              echo $lang[30][1] . "<b>$login</b>";
            }
                  }
                }
                else {
                  echo $lang[22][1];
                }
          }
    ?>
          <form method = "post" action = "register.php">
            <h3><?php echo $lang[31][1]?></h3>
            <input type = "text" name = "login" placeholder = "<?php echo $lang[14][1] ?>" required /> <br>
            <input type = "password" name = "password" placeholder = "<?php echo $lang[36][1] ?>" required /> <br>
            <input type = "password" name = "r_password" placeholder = "<?php echo $lang[24][1] ?>" required/><br>
            <input type = "email" name = "email" placeholder = "<?php echo $lang[14][1] ?>" required /><br><br>
            <input type = "submit" name = "submit" value = "<?php echo $lang[11][1] ?>" />
          </form>
      </div>
    </div>
      <div class = "right">
        <div class = "menu">
          <menu>
           <?php echo '<li><a href = index.php?lang=' . $lange .'>' . $lang[1][1]. '</a></li>'; ?>
          </menu>
        </div>
      </div>
      <div style="clear:both"></div>
    </div>
    <div class="footer"><?php echo $lang[4][1]?></div>
  </body>
</html>
