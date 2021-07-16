<?php

	// connect to database
	$conn = mysqli_connect('localhost', 'tanya', 'tanya132', 'bbs');

	// connection check
	if(!$conn){
		echo 'Connection Error: ' . mysqli_connec_error();
	}

?>