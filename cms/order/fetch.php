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

     //User Data
     $queryud = "SELECT * FROM TBUSER WHERE id = '".$row["uid"]."'";  
     $resultud = mysqli_query($connect, $queryud);  
     $rowud = mysqli_fetch_assoc($resultud);  


 //    echo json_encode($row);  

//echo ''.$_POST["orderid"].'';

$output .='
<div class="table-responsive">  
<div id="tableprint"> 
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

<td width="70%">';

if($row["paytype"]==0){

$output .='cash on delivery';

}else{

 $output .='Others';
 
}


$output .='</td>  

</tr>  

<tr>  
<td width="30%"><label>Order Total</label></td>  
<td width="70%">$HKD '.$row["amount"].'.00</td>  
</tr>  
</table>  
</div><!-- print area-->


<form action="/cms/order/update.php" method="POST">
<table>
<tr>  
<td width="30%"><label><h4>Order Status</label></td> 
<td>
<select id="selectstatus" name="selectstatus" style="border-radius: 5px; width:150px">';


if($row["status"]==0){
$output .='
     <option selected value="0">Processing</option>
     <option value="1">Delivered</option>
     <option value="2">Completed</option>
     <option value="3">Canceled</option>';
}else if($row["status"]==1){
$output .='
     <option value="0">Processing</option>
     <option selected value="1">Delivered</option>
     <option value="2">Completed</option>
     <option value="3">Canceled</option>';
}else if($row["status"]==2){
$output .='
     <option value="0">Processing</option>
     <option value="1">Delivered</option>
     <option selected value="2">Completed</option>
     <option value="3">Canceled</option>';
}else if($row["status"]==3){
$output .='
     <option value="0">Processing</option>
     <option value="1">Delivered</option>
     <option value="2">Completed</option>
     <option selected value="3">Canceled</option>';
}


$output .='</select>
</td>
<input type="hidden" name="postorderid" id="postorderid" value="'.$_POST["orderid"].'">
<td width="20%" colspan="2">
<input type="submit" name="submit" id="submit" class="btn btn-outline-primary" Value="Update Status">

</td>
</tr>

</table>
</form>

</div>  

';  

echo $output;  
}

 ?>
 
