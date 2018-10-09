<?php  
 include('../../db/dbconnect.php');
 
 if(isset($_POST["dishid1"]))  
 {  
      $query = "SELECT * FROM TBMENU WHERE id = '".$_POST["dishid1"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>
 