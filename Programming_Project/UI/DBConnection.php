<?php
//Establishing connection with the database
$servername = "localhost";
$username = "root";
$password = "Gennadeios1234";
$database_name = "mydb";

$con = mysqli_connect($servername,$username,$password,$database_name,"3306");
if (!$con){
	die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected succesfully!";

?>
<br>
