<?php
	session_start();
  $check = isset($_SESSION["auth"]) ? $_SESSION["auth"] : NULL;
  $rank = isset($_SESSION["rank"]) ? $_SESSION["rank"] : NULL;
  $login = isset($_SESSION['name']) ? $_SESSION['name'] : NULL;

	include ('includes/connect.php');
  include ('language.php');
  $url = $_SERVER["REQUEST_URI"];
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $lang[0][1]; ?></title>
		<meta http-equiv = "Content-Type" content = "text/html"; charset = "utf-8">
		<link rel = "stylesheet" type = "text/css" href = "css/style.css">
	</head>
	<body>
		<div class = "wrapper">
			<div class = "header">
				<div class = "image">
					<div class = "lang">
					<a href ="<?php echo $url . '&lang=ua'; ?>"><img src = "img/ua.jpg"></a>
          <a href ="<?php echo $url . '&lang=eng'; ?>"><img src = "img/eng.jpg"></a>
				</div>
					<img src = "img/baner.jpg"/>
					<h2><span><?php echo $lang[0][1]; ?></span></h2>
				</div>
			</div>
			<div class = "left">
				<div class = "edit_user">

					<?php
						$id = $_GET["id"];
						if(isset($_POST['save'])) {
							$login = $_POST['login'];
							$email = $_POST["email"];
							$name = $_POST["name"];
							$last_name = $_POST["last_name"];
							$rank1 = $_POST['score'];


						$query = $db->query("UPDATE reg SET login = '$login', email = '$email', rank = '$rank1', name = '$name', last_name = '$last_name' WHERE id = '$id'");
						header("Location: http://localhost/mysite/user.php");
					}
							$result = $db->query("SELECT * FROM reg WHERE id = '$id'");
							$row = $result->rowCount();
					if (!empty($row)) {
 						while ($row = $result->fetch()) {
							echo "<form method=\"post\">\n";
							echo '<h2>' . $lang[51][1] . '</h2><br>';
						  echo '<p><b>' . $lang[13][1] . "</b><br><br><input type=\"text\" size=\"40\" value=\"".$row['login']."\" name=\"login\"/><br><br>";
						  echo '<p><b>' . $lang[14][1] . "</b><br><br><input type =\"text\" size=\"40\" value =\"".$row['email']."\" name =\"email\"/><br><br>";
						  echo '<p><b>' . $lang[15][1] . "</b><br><br><input type =\"text\" size=\"40\" value =\"".$row['name']."\" name =\"name\"/><br><br>";
						  echo '<p><b>' . $lang[16][1] . "</b><br><br><input type =\"text\" size=\"40\" value =\"".$row['last_name']."\" name =\"last_name\"/><br><br>";
						  echo "<b>" . $lang[17][1] . "</b>
						    	<label><input type ='radio' name ='score' value ='1' onClick = 'rank1.submit() ;'>" . $lang[52][1] . "</label>
									<label><input type ='radio' name ='score' value ='2' onClick = 'rank1.submit() ;'>" . $lang[53][1] . "</label>
									<label><input type ='radio' checked name ='score' value ='3' onClick = 'rank1.submit() ;'>" . $lang[54][1] . "</label>
									<br><br><input type='submit' name='save' value='" . $lang[11][1] . "' />
									</form>";

						}
					}
					else {
						echo $lang[5][1];
					}
					?>



					</form>
				</div>
			</div>
			<div class = "right">
				<div class = "authorization">
					<?php include("php/authorization.php"); ?>
				</div><br>
				<div class = "menu">
					<menu>
						<li><a href = index.php><?php echo $lang[1][1]?></a></li>
						<?php
							if($rank == 1 || $rank == 2) {
				        echo '<li><a href="new_article.php">' . $lang[2][1] . '</a></li>';
							}
							if($rank == 1) {
			 					echo '<li><a href = "user.php">' . $lang[3][1] . '</a></li>';
                echo '<li><a href = "language_editor.php">' . $lang[62][1] . '</a></li>';
			 				}
			 			?>
					</menu>
				</div>
			</div>
		<div class="footer"><?php echo $lang[4][1]?></div>
	</body>
</html>
