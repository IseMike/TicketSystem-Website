<?php
	function makeSafe($input)
	{
		$id = trim($input);
		$id = stripslashes($input);
		$id = htmlspecialchars($input);
	}
?>