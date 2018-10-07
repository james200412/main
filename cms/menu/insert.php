<?php  
include('../../db/dbconnect.php');


 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $name = mysqli_real_escape_string($connect, $_POST["name"]);  
      $image = mysqli_real_escape_string($connect, $_POST["image"]);  
      $price = mysqli_real_escape_string($connect, $_POST["price"]);        
      $type = mysqli_real_escape_string($connect, $_POST["type"]); 
      $detail = mysqli_real_escape_string($connect, $_POST["detail"]);  


      if($_POST["userid"] != '')  
      {  
      
           $query = "  
           UPDATE TBMENU   
           SET dname='$name',   
           dimage='$image',              
           dprice = '$price',
           dtype = '$type',   
           detail='$detail'
           WHERE id='".$_POST["userid"]."'";  
           $message = 'Update Complete';             
      }  
      else  
      {  
           $query = "  
           INSERT INTO TBUSER(dname, dimage, dprice, dtype, detail)  
           VALUES('$name', '$image', '$price',  '$type', '$detail');  
           ";  
           $message = 'Add Complete';  
      }  

  if(mysqli_query($connect, $query))  
      {  

           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM TBMENU ORDER BY ID DESC";  
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
                      
                $output .= '  
                <tbody>
                     <tr>  
                     <td>' . $row["id"] . '</td> 
                     <td>' . $row["dimage"] . '</td> 
                     <td>' . $row["dname"] . '</td> 
                     <td>' . $row["dprice"] . '</td> 
                     <td>' . $row["dtype"] . '</td> 
                     <td>' . $row["detail"]. '</td>

                          <td><input type="button" name="edit" value="Edit" id="'.$row["id"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                          <td><input type="button" name="delete" value="delete" id="' . $row["id"] . '" class="btn btn-info btn-xs delete_data" /></td>  
                     </tr>  
                     </tbody>

                ';  
           }  
           $output .= '</table>';  
      }  
     /* echo $output;  */
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