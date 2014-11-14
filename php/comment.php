<?php

$log=$_SESSION["name"];

if (isset($_POST['e_comment'])) {
$comment=$_POST['comment'];
function textFunc( $str, $maxLen )
	{
	if ( mb_strlen( $str ) > $maxLen )
		{
		preg_match( '/^.{0,'.$maxLen.'} .*?/ui', $str, $match );
		return $match[0].'...';
		}
	else {
		return $str;
		}
	}

$cut=textFunc( $comment, 150 ); 

$query= $db->query("INSERT INTO comment VALUES ('','$st','$log', '$cut')");
}
?>
<div class="coment">
<h3>ADD COMMENT</h3>
<form method="post">
<p><b>Comment:</b></p>
<textarea name="comment" cols="40" rows="3" required></textarea></p>
<input type="submit" name="e_comment" value="Add comment" />
</form>
</div>




