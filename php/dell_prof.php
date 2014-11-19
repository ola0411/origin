<!DOCTYPE html>
<html>
	<head>
		<title>Recipes</title>
		
	</head>
	<body>
		<?php
			session_start();
			@$login = $_SESSION["name"];

				if(isset($_POST['no'])) {
					header("Location: http://localhost/mysite/info_user.php");
				}
				if(isset($_POST['yes'])) {
					header("Location: http://localhost/mysite/del_prof.php");
				}
		?>
				<h2>Delete now?</h2>
		<form method="post">
			<input type = "submit" name = "yes" value = "yes"/> 
			<input type = "submit" name = "no" value = "no"/>
		</form>
	</body>
</html>