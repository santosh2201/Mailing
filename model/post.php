<?php 
// Create database practo
$sql="CREATE DATABASE practo";
if (mysqli_query($con,$sql)) {
echo "Database practo created successfully";
}

//Use database practo
$sql="USE practo";
mysqli_query($con,$sql);

// Create table Persons
$sql="CREATE TABLE Persons(Recipients TEXT,Subject TEXT,Message TEXT)";
if (mysqli_query($con,$sql)) {
echo "Table persons created successfully";
}

//Insert Recipient, Subject, Message into Persons table
mysqli_query($con,"INSERT INTO Persons (Recipients, Subject, Message)
VALUES ('$email', '$subject', '$message')");

?>
