<div class="rating">
	<form method="post">
		<b>Good for:</b>
		<label><input type="radio" name="score" value="1" onClick="rating.submit();"> 1</label>
		<label><input type="radio" name="score" value="2" onClick="rating.submit();"> 2</label>
		<label><input type="radio" name="score" value="3" onClick="rating.submit();"> 3</label>
		<label><input type="radio" name="score" value="4" onClick="rating.submit();"> 4</label>
		<label><input type="radio" name="score" value="5" onClick="rating.submit();"> 5</label>
		<input type="submit" name="golos" value="Rate" />
	
	<?php
		$id=$_GET["id"];
		if (isset($_POST['golos'])) {
    		$rating = $_POST['score'];
			switch ($_POST['score']) {
		        case 1:  echo '<b>Your grade material '.$_POST['score']. '.  Thank you!</b><br><br>'; break;
		        case 2:  echo '<b>Your grade material '.$_POST['score']. '.  Thank you!</b><br><br>'; break;
		        case 3:  echo '<b>Your grade material '.$_POST['score']. '.  Thank you!</b><br><br>'; break;
		        case 4:  echo '<b>Your grade material'.$_POST['score']. '.   Thank you!</b><br><br>'; break;
		        case 5:  echo '<b>Your grade material '.$_POST['score']. '.  Thank you!</b><br><br>'; break;
	  			default: echo 'You have not voted !';
						}
			$query= $db->query("INSERT INTO rating VALUES ('', '$id', '$rating')");
			
			//Кількість голосів
			$result = $db->query("SELECT * FROM rating WHERE id_article='$id'");
			$num_posts = $result->fetchColumn();
				if  ($num_posts > 0) { 
					echo "<b>Number of votes: </b><i>$num_posts</i>";
					
					//Середня оцінка
					$result = $db->query("SELECT AVG(rating) FROM rating WHERE id_article='$id'");
					$row = $result->fetch();
					echo "<b> The average rating of the material:</b> $row[0]";
				}
				else {
					echo "For this item Nobody has voted";
				}
		}
		else {
			//Кількість голосів
			$result = $db->query("SELECT * FROM rating WHERE id_article='$id'") or die(mysql_error());
			$num_posts = $result->fetchColumn();
			if  ($num_posts > 0) { 
				echo "<b>Number of votes: </b><i>$num_posts</i>";
				//Середня оцінка
				$result = $db->query("SELECT AVG(rating) FROM rating WHERE id_article='$id'") or die(mysql_error());
				$row = $result->fetch();
				echo "<b> The average rating of the material:</b> $row[0] ";
			}
			else {
			echo "For this item Nobody has voted";
			}
		}
	?>
	</form>
</div>	

	
