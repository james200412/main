<?php
session_start(); 
require ('db/dbconnect.php');

$sql= "SELECT uname, ulevel, activate FROM TBUSER WHERE id='$_POST[userid]' && upassword='$_POST[userpw]'";
$r = @mysqli_query ($connect, $sql);
$num = mysqli_num_rows($r);

if ($num > 0){
	while($row = mysqli_fetch_array($r, MYSQL_ASSOC)){

if($row['activate'] == 0){
echo "<script type='text/javascript'>alert('Your Account has Disabled, please contact Admin');</script>";
include 'cms_stafflogin.php';

			// make sure no session exist
			session_unset(); 
			// destroy the session 
			session_destroy();
exit;
		}

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
			// make sure no session exist
			session_unset(); 
			// destroy the session 
			session_destroy();
include 'cms_stafflogin.php';
exit;
//header("Location: /index.php");
//exit;
}

