<!DOCTYPE html>
<html>
  <head>
    <title>Recipes</title>

  </head>
  <body>
    <?php
        $id_art = $_GET['id_art'];
        $id = $_GET['id'];
        if(isset($_POST['no'])) {
          header("Location: http://localhost/mysite/view.php?id=$id_art");
        }
        if(isset($_POST['yes'])) {
          header("Location: http://localhost/mysite/dell_comment.php?id_art=$id_art&id=$id");
        }
    ?>
        <h2>Delete now?</h2>
    <form method="post">
      <input type = "submit" name = "yes" value = "yes"/>
      <input type = "submit" name = "no" value = "no"/>
    </form>
  </body>
</html>
