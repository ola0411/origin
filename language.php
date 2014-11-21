	<?php
		if(isset($_GET['lang'])) {
		switch($_GET['lang']):
		   case 'ua':  $language = $db->query("SELECT * FROM ua");
		   		$lang = $language->fetchAll(PDO::FETCH_NUM);
		   		break;
		   case 'eng': $language = $db->query("SELECT * FROM eng");
		   		$lang = $language->fetchAll(PDO::FETCH_NUM);
		   		break;
		endswitch;
	}
	else {
		$language = $db->query("SELECT * FROM ua");
		$lang = $language->fetchAll(PDO::FETCH_NUM);
	}

