<?php
						session_start();
						 $rank = isset($_SESSION['rank']) ? $_SESSION['rank'] : NULL;
						  include ('includes/connect.php');

							if (!isset($_GET['id'])) {
								$id = 1;
							}
							else {
								$id = $_GET['id'];
							}
							$strSQL = $db -> query("DELETE FROM reg WHERE id = $id");
							header('Location: http://localhost/mysite/user.php?lang=' . $lange . '');
						}
						else {
							echo $lang[5][1];
						}
					?>
