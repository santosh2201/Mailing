<?php

	/**
	  * Connect to Mysql Database
	  * params : Host , user , password
	  *
	  **/
     $con=mysqli_connect("localhost","root","nsr");
     
     // Check connection
     if (mysqli_connect_errno()) {
       echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }
     
?>
