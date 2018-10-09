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

      if($_POST["dishid"] != '')  
      {  
      
           $query = "  
           UPDATE TBUSER   
           SET uname='$name',   
           uaddress='$address',              
           uemail = '$email',
           uphone = '$phone',   
           ulevel='$level',
           upassword = '$password'   
           WHERE id='".$_POST["dishid"]."'";  
           $message = 'Update Complete';             
      }  
      else  
      {  
           $query = "  
           INSERT INTO TBUSER(uname, uaddress, uemail, uphone, ulevel, upassword)  
           VALUES('$name', '$address', '$email',  '$phone', '$level', '$password');  
           ";  
           $message = 'Add Complete';  
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