<?php
	header("Content-Type: application/xml; charset=ISO-8859-1");

	if($_POST) $request = $_POST;
	else if($_GET) $request = $_GET;
	else
	{
		echo '<error>no query</error>';
		return;
	}

	$values = array();
	foreach ($request as $key => $value)
	{
		array_push($values, $value);
	}

	echo '<?xml version="1.0" encoding="ISO-8859-1" ?>';
	echo '<xml>'. implode(",", $values) .'</xml>';

?>
