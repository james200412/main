<?php
session_start();

require ('db/dbconnect.php');

$sql= "SELECT uname FROM TBUSER WHERE id='$_SESSION[userid]'";
$r = mysqli_query ($connect, $sql);
$num = @mysqli_num_rows($r);

if ($num > 0){
while($row = mysqli_fetch_array($r, MYSQL_ASSOC)){
	// remove all session variables
	session_unset(); 

	// destroy the session 
	session_destroy();
	
	header("Location: index.php");
}
}else{
	echo "No Session";
} 



?>