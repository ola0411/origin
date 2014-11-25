<!DOCTYPE html>
<html>
	<head>
		<title>Recipes</title>

	</head>
	<body>
		<?php
        session_start();
        $id_art = isset($_SESSION['id_art']) ? $_SESSION['id_art'] : NULL;
        if(isset($_POST['no'])) {
					header("Location: http://localhost/mysite/view.php?id=$id_art");
				}
				if(isset($_POST['yes'])) {
					header("Location: http://localhost/mysite/delete_article.php?id=$id_art");
				}
		?>
				<h2>Delete now?</h2>
		<form method="post">
			<input type = "submit" name = "yes" value = "yes"/>
			<input type = "submit" name = "no" value = "no"/>
		</form>
	</body>
</html>
