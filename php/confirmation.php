<!DOCTYPE html>
<html>
	<head>
		<title>Recipes</title>
		
	</head>
	<body>
		<?php
			session_start();
			$id_article = $_SESSION['id_article'];

				if(isset($_POST['no'])) {
					header("Location: http://localhost/mysite/view.php?id=$id_article");
				}
				if(isset($_POST['yes'])) {
					header("Location: http://localhost/mysite/delete_article.php?id=$id_article");
				}
		?>
				<h2>Delete now?</h2>
		<form method="post">
			<input type = "submit" name = "yes" value = "yes"/> 
			<input type = "submit" name = "no" value = "no"/>
		</form>
	</body>
</html>