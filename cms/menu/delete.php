<?php
include('../../db/dbconnect.php');

if(isset($_POST["dishid"]))
{
 $id=$_POST["dishid"];
 $query = "DELETE FROM TBMENU WHERE ID = $id";
 $result = mysqli_query($connect, $query);
}



?>
