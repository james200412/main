<?php
session_start(); 
require ('db/dbconnect.php');

$sql= "SELECT uname, ulevel FROM TBUSER WHERE id='$_POST[userid]' && upassword='$_POST[userpw]'";
$r = @mysqli_query ($connect, $sql);
$num = mysqli_num_rows($r);

if ($num > 0){
	while($row = mysqli_fetch_array($r, MYSQL_ASSOC)){
		$_SESSION["userid"]="$_POST[userid]";
		$_SESSION['username']=$row['uname'];
		$_SESSION['userlevel'] = $row['ulevel'];


		if ($row['ulevel'] == 0) {
			header("Location: index.php");
		}
		else if ($row['ulevel'] == 1 || $row['ulevel']== 2) {
			header("Location: cms_index.php");
		}
	}
}
else{
echo "<script type='text/javascript'>alert('Wrong Password or ID');</script>";

include 'cms_stafflogin.php';

//header("Location: /index.php");
//exit;
}

