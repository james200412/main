<?php
include('../../db/dbconnect.php');

if(isset($_POST["dishid"]))
{

 $id=$_POST["dishid"];


 $query = "SELECT dimage FROM TBMENU WHERE id = $id";
 $result = mysqli_query($connect, $query);
 $row = mysqli_fetch_array($result);  



 unlink('../../'. $row['dimage']);



 $query = "DELETE FROM TBMENU WHERE id = $id";
 $result = mysqli_query($connect, $query);




}
?>
