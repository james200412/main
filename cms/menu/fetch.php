<?php  
 include('../../db/dbconnect.php');
 
 if(isset($_POST["dishid"]))  
 {  
      $query = "SELECT * FROM TBMENU WHERE id = '".$_POST["dishid"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>
 