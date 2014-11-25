
        <?php
        	session_start();
         	  $rank = isset($_SESSION['rank']) ? $_SESSION['rank'] : NULL;
            $login = isset($_SESSION['name']) ? $_SESSION['name'] : NULL;
        		 include ('includes/connect.php');

        		if (isset($_SESSION['name'])) {
        		$strSQL = $db->query("DELETE FROM reg WHERE login = '$login'");
        		unset($_SESSION['name']);
        		unset($_SESSION['rank']);
        		session_destroy();
        	  header('Location: http://localhost/mysite/');
        	}
        	?>

