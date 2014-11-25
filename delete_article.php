
					<?php
						session_start();
            $rank = isset($_SESSION['rank']) ? $_SESSION['rank'] : NULL;
            $id_art = isset($_SESSION['id_art']) ? $_SESSION['id_art'] : NULL;
						 include ('includes/connect.php');
             include ('language.php');

    					if (!isset($_GET['id'])) {
								$id = 1;
							}
							else {
								$id = $_GET['id'];
							}
              if ($rank == 1 || $rank == 2) {
  							 $strSQL = $db -> query("DELETE FROM article_eng WHERE id = '$id'");
                 $strSQL = $db -> query("DELETE FROM article_ua WHERE id = '$id'");
  							 header('Location: http://localhost/mysite?lang=' . $lange . '');
              }
						  else {
							echo 'You do not have sufficient rights';
						}
					?>
