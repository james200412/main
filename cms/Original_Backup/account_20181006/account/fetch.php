<?php  
 include('../../db/dbconnect.php');
 
 
 if(isset($_POST["userid"]))  
 {  
      $query = "SELECT * FROM TBUSER WHERE ID = '".$_POST["userid"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>
 