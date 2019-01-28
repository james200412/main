<?php
session_start(); 
require ('db/dbconnect.php');
$md5 = md5($_POST['userpw']);

$sql= "SELECT id, uname, ulevel, uaddress, activate  
FROM TBUSER WHERE (id='$_POST[userid]' OR uemail='$_POST[userid]' ) && upassword='$md5'";
$r = @mysqli_query ($connect, $sql);
$num = mysqli_num_rows($r);

if ($num > 0){
	while($row = mysqli_fetch_array($r, MYSQL_ASSOC)){

		if($row['activate'] == 0){
			echo "<script type='text/javascript'>alert('Your Account has Disabled, please contact Admin');</script>";
			include 'index.php';

			// make sure no session exist
			session_unset(); 
			// destroy the session 
			session_destroy();
			exit;
					}

		$_SESSION["userid"]=$row['id'];
		$_SESSION['username']=$row['uname'];
		$_SESSION['defaultaddress']=$row['uaddress'];
		$_SESSION['userlevel'] = $row['ulevel'];


		if ($row['ulevel'] == 0) {
			echo "<script type='text/javascript'>alert('Welcome');</script>";
			header("Location: index.php");
		}
		else if ($row['ulevel'] == 1 || $row['ulevel']== 2) {
			echo "<script type='text/javascript'>alert('Please use Staff Login Page');</script>";

			include 'cms_stafflogin.php';
		}
	}
}
else{
echo "<script type='text/javascript'>alert('Wrong Password or ID');</script>";
			// make sure no session exist
			session_unset(); 
			// destroy the session 
			session_destroy();
include 'front_login.php';
exit;
//header("Location: /index.php");
//exit;
}

