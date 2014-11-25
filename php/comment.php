<?php
if($check == true) {
  if (isset($_POST['e_comment'])) {
    $comment = $_POST['comment'];
    $title   = $_POST['title'];
    $date    = date('Y-m-d H:i:s');
    include ('includes/my_functions.php');
    $comment = textFunc($comment, 150);
    $title_com = textFunc($comment, 15);

    if (!empty($_POST['title'])) {
      $query = $db->query("INSERT INTO comment SET id_article = '$id', lang = '$lange', login = '$login', date = '$date',  title = '$title', comment = '$comment'");
      header("Location: http://localhost/mysite/view.php?id=$id&lang=$lange");
    }
    else {
      $query = $db->query("INSERT INTO comment SET id_article = '$id', lang = '$lange', login = '$login', date = '$date',  title = '$title_com', comment = '$comment'");
      header("Location: http://localhost/mysite/view.php?id=$id&lang=$lange");
    }
  }
  ?>
  <div class="comment">
  <h3><?php echo $lang[40][1] ?></h3><br>
  <form method="post">
  <input type = "text" name = "title" placeholder = "<?php echo $lang[7][1] ?>" /> <br><br>
  <textarea name = "comment" cols="40" rows="3" placeholder = "<?php echo $lang[39][1] ?>" required></textarea></p>
  <input type = "submit" name="e_comment" value="<?php echo $lang[40][1] ?>" />
  </form>
  </div>

  <?php
    $result = $db -> query("SELECT * FROM comment WHERE id_article = '$id' AND lang = '$lange'");
          $max_posts = 5;
          $num_posts = $result -> RowCount();
          $num_pages = intval(($num_posts - 1) / $max_posts) + 1;
          for($i = 2 ; $i <= $num_pages; $i++)
          echo "<a href='/mysite/view.php?page=$i&lang=" . $lange . "&id=" . $id . "'>$i</a>";

          if (isset($_GET['page'])) {
            $page = $_GET['page'];
            if($page < 1)
              $page = 1;
            elseif($page > $num_pages)
              $page = $num_pages;
          }
          else {
            $page = 1;
          }
    $data = $result -> fetch();

      do {
        if (($data['id_article'] > ($page * $max_posts - $max_posts)) && ($data['id_article'] <= $page * $max_posts)) {
        if($rank == 1) {
      printf('<br></b><a href = "php/dell_commemt.php?id=%s&id_art=%s"><b>[' . $lang[32][1] . ']</b></a>
      ' , $data['id'], $data['id_article']);
      }
      printf('

      <div><br>
      <b>' . $lang[7][1] . '</b><i> %s</i><br>
      <b>' . $lang[39][1] . '</b><i> %s</i><br>
      </b><a href = "info_user.php?lang=' . $lange . '"><i>%s</i></a><br>
      <i>%s</i>
      <hr>
      </div>
      ', $data['title'],  $data['comment'], $data['login'], $data['date']);

      }
    }
    while($data = $result -> fetch());
    }
?>




