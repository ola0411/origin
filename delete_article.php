
					<?php
						session_start();
            $rank = isset($_SESSION["rank"]) ? $_SESSION["rank"] : NULL;
						 include ('includes/connect.php');

            if($rank == 1 || $rank == 2) {
							try {
								$db = new PDO('mysql:host=localhost;dbname=ololo; charset=utf8','root','123');
							}
							catch(PDOException $e) {
						    	die("Error: ".$e->getMessage());
							}

							if (!isset($_GET["id"])) {
								$id = 1;
							}
							else {
								$id = $_GET["id"];
							}
							$strSQL = $db->query("DELETE FROM article1 WHERE id = $id");
							header("Location: http://localhost/mysite");
						}
              include ("language.php");
						else {
							echo $lang[5][1];
						}
					?>
