<?php
		error_reporting(E_ALL);
		try {
			$db = new PDO('mysql:host=localhost;dbname=ololo; charset=utf8','root','123');
		}
		catch(PDOException $e) {
			die("Error: ".$e->getMessage());
		}
	if (isset($_POST['savefile'])) {
		@$img = 'img/avatar/'.$_FILES['userfile']['name'];
		if (isset($_FILES['userfile'])) {
			$query = $db->query("UPDATE reg SET img = '$img' WHERE login = '$login'");

			$uploaddir = '/var/www/html/mysite/img/avatar/';
			$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
			move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
			echo 'File successfully added';
			header('Location: http://localhost/mysite/info_user.php');
		}
	}
?>

<h2><?php echo $lang[25][1]; ?></h2><br>
<h4><?php echo $lang[69][1]; ?></h4><br>
<form enctype = "multipart/form-data" method = "POST">
	<input type = "hidden" name = "MAX_FILE_SIZE" value = "100000" />
	<?php echo $lang[70][1]; ?><input name = "userfile" type = "file" />
	<input type = "submit" name = "savefile" value = "<?php echo $lang[9][1]; ?>" />
</form><br><br>
