<?php
	$con = mysqli_connect("localhost", "root", "mysql", "pitch");
	
	if (!$con) {
		echo "Error in Connecting " . mysqli_connect_error();
	}
?>