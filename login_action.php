<?php
session_start(); 

require ('db/dbconnect.php');

$sql= "SELECT * FROM TBUSER WHERE id='$_POST[id]' && upassword='$_POST[pw]'";
$r = @mysqli_query ($connect, $sql);
$num = mysqli_num_rows($r);

if ($num > 0){
	while($row = mysqli_fetch_array($r, MYSQL_ASSOC)){
		$_SESSION["user"]="$_POST[id]";
		$_SESSION['name']=$row['uname'];
		$_SESSION['userlevel'] = $row['ulevel'];
		if ($row['ulevel'] == 0) {
			header("Location: index.php");
		}
		else if ($row['ulevel'] == 1 || $row['ulevel']== 2) {
			header("Location: cms_index.php");
		}
	}
}