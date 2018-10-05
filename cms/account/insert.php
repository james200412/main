<?php  
include('../../db/dbconnect.php');


 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $name = mysqli_real_escape_string($connect, $_POST["name"]);  
      $address = mysqli_real_escape_string($connect, $_POST["address"]);  
      $email = mysqli_real_escape_string($connect, $_POST["email"]);        
      $phone = mysqli_real_escape_string($connect, $_POST["phone"]); 
      $level = mysqli_real_escape_string($connect, $_POST["level"]);  
      $password = mysqli_real_escape_string($connect, $_POST["password"]);  

      if($_POST["userid"] != '')  
      {  
      
           $query = "  
           UPDATE TBUSER   
           SET uname='$name',   
           uaddress='$address',              
           uemail = '$email',
           uphone = '$phone',   
           ulevel='$level',
           upassword = '$password'   
           WHERE id='".$_POST["userid"]."'";  
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

           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM TBUSER ORDER BY ID DESC";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered">
                <thead>  
                     <tr>                                      
                     <th width="10%">USER ID</th>  
                     <th width="10%">NAME</th>
                     <th width="20%">ADDRESS</th>
                     <th width="10%">EMAIL</th>
                     <th width="10%">PHONE</th>
                     <th width="10%">USER LEVEL</th>
                     <th width="5%"></th>   
                     <th width="5%"></th>  
                     </tr> 
                     </thead>
           ';  
           
           while($row = mysqli_fetch_array($result))  
           {  
               
            if ($row["ulevel"] == 2){
                $row["ulevel"] = "Admin";
                      }  else if($row["ulevel"] == 1){
                $row["ulevel"] = "Staff";
                      }else{
                $row["ulevel"] = "Customer";
                      }                              
                      
                $output .= '  
                <tbody>
                     <tr>  
                     <td>' . $row["id"] . '</td> 
                     <td>' . $row["uname"] . '</td> 
                     <td>' . $row["uaddress"] . '</td> 
                     <td>' . $row["uemail"] . '</td> 
                     <td>' . $row["uphone"] . '</td> 
                     <td>' . $row["ulevel"]. '</td>

                          <td><input type="button" name="edit" value="Edit" id="'.$row["id"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                          <td><input type="button" name="delete" value="delete" id="' . $row["id"] . '" class="btn btn-info btn-xs delete_data" /></td>  
                     </tr>  
                     </tbody>
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;  
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