<!DOCTYPE html>
<html>
	<head>
		<title>Recipes</title>

	</head>
	<body>
		<?php
			session_start();
			$id_user = $_GET['id'];

				if(isset($_POST['no'])) {
					header("Location: http://localhost/mysite/user.php");
				}
				if(isset($_POST['yes'])) {
					header("Location: http://localhost/mysite/del_user.php?id=$id_user");
				}
		?>
				<h2>Delete now?</h2>
		<form method="post">
			<input type = "submit" name = "yes" value = "yes"/>
			<input type = "submit" name = "no" value = "no"/>
		</form>
	</body>
</html>
