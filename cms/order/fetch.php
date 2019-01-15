<?php  
include('../../db/dbconnect.php');

if(isset($_POST["orderid"]))  
 {
     $output = '';  
     // Order
     $query = "SELECT * FROM TBORDER WHERE id = '".$_POST["orderid"]."'";  
     $result = mysqli_query($connect, $query);
     $row = mysqli_fetch_assoc($result);  

     // Order Detail with Menu Data
     $queryod = "SELECT * FROM TBORDER_DETAIL JOIN TBMENU ON TBORDER_DETAIL.did = TBMENU.id 
                 WHERE oid = '".$row["id"]."'"; 
     $resultod = mysqli_query($connect, $queryod); 
/*
     while($rowod = mysqli_fetch_assoc($resultod)){
          echo $rowod['dname'];
          echo ' X '.$rowod['qty'].'';  

     }
*/
     //User Data
     $queryud = "SELECT * FROM TBUSER WHERE id = '".$row["uid"]."'";  
     $resultud = mysqli_query($connect, $queryud);  
     $rowud = mysqli_fetch_assoc($resultud);  


 //    echo json_encode($row);  

//echo ''.$_POST["orderid"].'';

$output .='
<div class="table-responsive">  
<table class="table table-bordered">   
     <tr>  
          <td width="30%"><label>Order ID</label></td>  
          <td width="70%">#'.$row["id"].'</td>  
     </tr>  
     <tr>  
          <td width="30%"><label> Delivery Address</label></td>  
          <td width="70%">'.$row["oaddress"].'</td>  
     </tr>  
     <tr>  
          <td width="30%"><label>Order Date</label></td>  
          <td width="70%">'.$row["odate"].'</td>  
     </tr>  
     <tr>  
          <td width="30%"><label>Ordered Dish</label></td>
          <td width="70%">';

          while($rowod = mysqli_fetch_assoc($resultod)){
$output.= '<ol><li>'.$rowod['dname'].' X '.$rowod['qty'].'</li></ol>';  

          }   
     
$output .='         
</td>
     </tr>  
     <tr>  
          <td width="30%"><label>Customer Name</label></td>  
          <td width="70%">'.$rowud["uname"].'</td>  
     </tr>  
     <tr>  
     <td width="30%"><label>Contact Number</label></td>  
     <td width="70%">'.$rowud["uphone"].'</td>  
</tr>  
<tr>  
<td width="30%"><label>Payment Type</label></td>  
<td width="70%">'.$row["paytype"].'</td>  
</tr>  

<tr>  
<td width="30%"><label>Order Total</label></td>  
<td width="70%">$HKD '.$row["amount"].'.00</td>  
</tr>  

<form action="../cms/order/update.php" method="POST">
<tr>  
<td width="30%"><label>Order Status</label></td> 
<td>
<select>
  <option value="0">Ordered</option>
  <option value="1">Processing</option>
  <option value="2">Delivering</option>
  <option value="3">Completed</option>
  <option value="4">Canceled</option>
</select>
<tr><td width="30%"></td>
<td>
<button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
<input type="submit" name="submit" id="submit" class="btn btn-outline-primary" Value="Update Status">
</td>
</tr>
</form>

</td>

</tr>  


</table>  
</div>  
';  

echo $output;  
}

 ?>
 

 <?php

if(isset($_POST['submit'])){
die('test');
}

?>