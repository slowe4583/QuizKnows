<?php
	$dbc = new mysqli('localhost', 'root', '', 'db_fcelite');
	if($dbc->connect_errno){
		echo "Failed to connect to MySQL: ",$dbc->connect_errno, $dbc->connect_error;
	} else {
		echo "STATUS: Connection successful.";
	}
	?>