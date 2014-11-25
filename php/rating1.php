<div class="rating">
<form method="post">
<b><?php echo $lang[64][1]; ?></b>
<label><input type="radio" name="score" value="1" onClick="rating.submit();"> 1</label>
<label><input type="radio" name="score" value="2" onClick="rating.submit();"> 2</label>
<label><input type="radio" name="score" value="3" onClick="rating.submit();"> 3</label>
<label><input type="radio" name="score" value="4" onClick="rating.submit();"> 4</label>
<label><input type="radio" name="score" value="5" onClick="rating.submit();"> 5</label>
<input type="submit" name="golos" value="<?php echo $lang[65][1]; ?>" />

<?php

if ($check == true) {
 if (isset($_POST['golos'])) {
  $rating = $_POST['score'];
     switch (isset($_POST['score'])) {
      case 1:
        echo '<b>' . $lang[47][1] .  $_POST['score']. '</b><br>';
      break;
      case 2:
        echo '<b>' . $lang[47][1] .  $_POST['score']. '</b><br>';
      break;
      case 3:
        echo '<b>' . $lang[47][1] .  $_POST['score']. '</b><br>';
      break;
      case 4:
        echo '<b>' . $lang[47][1] .  $_POST['score']. '</b><br>';
      break;
      case 5:
        echo '<b>' . $lang[47][1] .  $_POST['score']. '</b><br>';
      break;
      default: echo $lang[66][1];
    }
      $query = $db -> query("INSERT INTO rating SET login = '$login', id_article = '$id', rating = '$rating'");
      echo $lang[68][1];
  }
}
else {
  echo $lang[67][1];
}
?>
</div>
</form>
