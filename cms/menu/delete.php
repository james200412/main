<?php
include('../../db/dbconnect.php');

if(isset($_POST["userid"]))
{
 $id=$_POST["userid"];
 $query = "DELETE FROM TBMENU WHERE ID = $id";
 $result = mysqli_query($connect, $query);
}



?>
