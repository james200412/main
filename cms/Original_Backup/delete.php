<?php

 $connect = mysqli_connect("localhost", "root", "", "testing");  

if(isset($_POST["userid"]))
{
 $id=$_POST["userid"];
 $query = "DELETE FROM tbl_employee WHERE id = $id";
 $result = mysqli_query($connect, $query);
  echo 'Data Deleted';
}



?>
