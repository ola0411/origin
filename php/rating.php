<?php
$select = $db ->query("SELECT * FROM rating WHERE id_article = '$id' AND login = '$login'");
$golos = $select->fetch();
if ($check == true) {
  if (empty($golos)) {
     if (isset($_POST['golos'])) {
        $rating = $_POST['score'];
        $query = $db -> query("INSERT INTO rating SET login = '$login', id_article = '$id', rating = '$rating'");
        header("Location: http://localhost/mysite/view.php?id=$id&lang=$lange");
      }
      echo '<div class="rating">
      <form method="post">
      <b>' . $lang[64][1]. '</b>
      <label><input type="radio" name="score" value="1" onClick="rating.submit();"> 1</label>
      <label><input type="radio" name="score" value="2" onClick="rating.submit();"> 2</label>
      <label><input type="radio" name="score" value="3" onClick="rating.submit();"> 3</label>
      <label><input type="radio" name="score" value="4" onClick="rating.submit();"> 4</label>
      <label><input type="radio" name="score" value="5" onClick="rating.submit();"> 5</label>
      <input type="submit" name="golos" value="' . $lang[65][1] . '" />
      </div>
      </form>';
  }
  else {
    echo '<div class="rating">';
    echo '<b>' . $lang[47][1] .  '</b>' . "$golos[rating]";
    echo '<b><i>' . $lang[68][1] . '</b></i>';
    echo '<a href = "php/dell_golos.php?"><b>['. $lang[32][1] .']</b></a>';
    echo '</div>';
  }
}
?>

