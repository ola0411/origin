	<?php
    if(isset($_GET['lang'])) {
      if($_GET['lang'] == 'ua' || $_GET['lang'] == 'eng'){
        $lange = $_GET['lang'];
        switch($_GET['lang']):
          case 'ua':  $language = $db->query("SELECT * FROM ua");
            $lang = $language -> fetchAll(PDO::FETCH_NUM);
          break;
          case 'eng': $language = $db->query("SELECT * FROM eng");
            $lang = $language -> fetchAll(PDO::FETCH_NUM);
          break;
      endswitch;
    }
    else {
      $_GET['lang'] = 'ua';
    }
  }
  else {
    $_GET['lang'] = 'ua';
    $lange = 'ua';
    $language = $db -> query("SELECT * FROM ua");
    $lang = $language -> fetchAll(PDO::FETCH_NUM);
  }
?>
