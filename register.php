<?php
include ('includes/connect.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $lang[31][1]?></title>
    <script src="js/functions.js"></script>
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
            $pass   = $_POST['pass'];
            $rpass = $_POST['rpass'];
            $email      = $_POST['email'];
            $date       = date('Y-m-d H:i:s');
            $img        = 'img/avatar/profile.jpg';
            $rank       = 3;

              $log = $db->query("SELECT * FROM reg WHERE login = '$login'");
              $em  = $db->query("SELECT * FROM reg WHERE email = '$email'");

            if($pass == $rpass) {
              $pass = md5($pass);

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
              $query = $db->query("INSERT INTO reg SET login = '$login', password = '$pass', email = '$email', rank = '$rank', date = '$date', date_av = '$date', img = '$img'");
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

            <form name="register" onSubmit="valid(); return(false);" method="post">
            <h3><?php echo $lang[31][1]?></h3>
            <input type = "text" name = "login" placeholder = "<?php echo $lang[14][1] ?>"/> <br>
            <input type = "password" name = "pass" placeholder = "<?php echo $lang[36][1] ?>"/> <br>
            <input type = "password" name = "rpass" placeholder = "<?php echo $lang[24][1] ?>"/><br>
            <input type = "text" name = "email" placeholder = "<?php echo $lang[14][1] ?>"/><br><br>
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
    </div>
    <div class="footer"><?php echo $lang[4][1]?></div>
  </body>
</html>
