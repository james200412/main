<?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "testing");  
 if(isset($_POST["userid"]))  
 {  
      $query = "SELECT * FROM tbl_employee WHERE id = '".$_POST["userid"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>
 