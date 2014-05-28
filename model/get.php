<?php

	// Use database practo
	mysqli_query($con, "USE practo");
	$result = mysqli_query($con, "SELECT * FROM Persons");

?>
