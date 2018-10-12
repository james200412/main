<?php  
include('../../db/dbconnect.php');


 if(!empty($_POST))  
 {   
      $message = '';  
      $name = mysqli_real_escape_string($connect, $_POST["name"]);  
      $address = mysqli_real_escape_string($connect, $_POST["address"]);  
      $email = mysqli_real_escape_string($connect, $_POST["email"]);        
      $phone = mysqli_real_escape_string($connect, $_POST["phone"]); 
      $level = mysqli_real_escape_string($connect, $_POST["level"]);  
      $password = mysqli_real_escape_string($connect, $_POST["password"]); 
      $activate = mysqli_real_escape_string($connect, $_POST["activate"]);

      if($_POST["userid"] != '')  
      {  
      
           $query = "  
           UPDATE TBUSER   
           SET uname='$name',   
           uaddress='$address',              
           uemail = '$email',
           uphone = '$phone',   
           ulevel='$level',
           upassword = '$password',  
           activate = '$activate' 
           WHERE id='".$_POST["userid"]."'";  
            
      }  
      else  
      {  
           $query = "  
           INSERT INTO TBUSER(uname, uaddress, uemail, uphone, ulevel, upassword, activate)  
           VALUES('$name', '$address', '$email',  '$phone', '$level', '$password', '$activate');  
           ";  
 
      }  

  if(mysqli_query($connect, $query))  
      {  
 
           $select_query = "SELECT * FROM TBUSER ORDER BY ID DESC";  
           $result = mysqli_query($connect, $select_query);  

           while($row = mysqli_fetch_array($result)){}

      }  
 }

 ?>

<script>   	

   	$( ".table" ).DataTable({
bPaginate: true,
bLengthChange: false,
bFilter: true,
bSort: false, 
bInfo: false,
bAutoWidth: false,
pageLength: 10
  	});

</script>