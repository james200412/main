<?php  
include('../../db/dbconnect.php');


 if(!empty($_POST))  
 {  
 
      $message = '';  
      $name = mysqli_real_escape_string($connect, $_POST["name"]);  
      $image = mysqli_real_escape_string($connect, $_POST["image"]);  
      $price = mysqli_real_escape_string($connect, $_POST["price"]);        
      $type = mysqli_real_escape_string($connect, $_POST["type"]); 
      $detail = mysqli_real_escape_string($connect, $_POST["detail"]);  
      $activate = mysqli_real_escape_string($connect, $_POST["activate"]); 

      if($_POST["userid"] != '')  
      {  
      
           $query = "  
           UPDATE TBMENU   
           SET dname='$name',   
           dimage='$image',              
           dprice = '$price',
           dtype = '$type',   
           detail='$detail',
           activate='$activate'
           WHERE id='".$_POST["userid"]."'";  
           $message = 'Update Complete';             
      }  
      else  
      {  
           $query = "  
           INSERT INTO TBMENU(dname, dimage, dprice, dtype, detail, activate)  
           VALUES('$name', '$image', '$price',  '$type', '$detail', '$activate');  
           ";  
           $message = 'Add Complete';  
      }  

  if(mysqli_query($connect, $query))  
      {  
  
           $select_query = "SELECT * FROM TBMENU ORDER BY ID DESC";  
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