<?php
        //Кількість голосів
        $golos_guery = $db -> query("SELECT * FROM rating WHERE id_article = '$id'");
        $num_posts = $golos_guery -> rowCount();
        if  ($num_posts > 0) {
        echo '<b>' .$lang[48][1].'  </b><i>' . $num_posts . '</i>';

        //Середня оцінка
        $res = $db -> query("SELECT AVG(rating) FROM rating WHERE id_article = '$id'");
        $row = $res ->fetch();
        echo '<b> '.$lang[49][1].'</b>'. $row[0];
        if($rank == 1) {
          echo '<a href = "php/dell_rating.php">[' . $lang[32][1] . ']</a>';
        }
        }
        else {
        echo $lang[50][1];
      }
