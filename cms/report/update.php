<?php
include('../../db/dbconnect.php');

if($_POST["sion"])  
{  
$arr = explode(';', $_POST["sion"]);
$var1 = $arr[0]; // from
$var2 = $arr[1]; // to


$output = '';  

/*
//ogrinal query
$queryorderdata = "SELECT tbuser.*, tborder.uid, sum(tborder.amount) AS uservalue 
FROM tborder JOIN tbuser ON tbuser.id = tborder.uid GROUP BY tborder.uid ORDER BY uservalue DESC";

//with filter query
$queryorderdata = "SELECT tbuser.*, tborder.uid, sum(tborder.amount) AS uservalue 
FROM tborder JOIN tbuser ON tbuser.id = tborder.uid GROUP BY tborder.uid 
HAVING SUM(tborder.amount) > $var1 AND SUM(tborder.amount) < $var2 
ORDER BY uservalue DESC";
*/
//completed query with ionrangeslider

$queryorderdata = "SELECT tbuser.*, tborder.uid, sum(tborder.amount) AS uservalue 
FROM tborder JOIN tbuser ON tbuser.id = tborder.uid AND tborder.status = 2 GROUP BY tborder.uid 
HAVING SUM(tborder.amount) > $var1 AND SUM(tborder.amount) < $var2 
ORDER BY uservalue DESC";


$resultorderdata = mysqli_query($connect, $queryorderdata);


$output .='
<table class="table table-striped">
<col width="10%">
<col width="10%">
<col width="30%">
<col width="10%">
<col width="10%">
<col width="10%">
    <thead>
    <tr>
        <th>#ID </th>
        <th>Customer Name </th>
        <th>Address </th>
        <th>Phone </th>
        <th>Email </th>
        <th>Total Value </th>
    </tr>
    </thead>
    <tbody>';
    
while($roworderdata = mysqli_fetch_array($resultorderdata))
{
$output .='
    <tr>
        <td>#'.$roworderdata["id"].'</td>
        <td>'.$roworderdata["uname"].'</td>
        <td>'.$roworderdata["uaddress"].'</td>
        <td>'.$roworderdata["uphone"].'</td>
        <td>'.$roworderdata["uemail"].'</td>
        <td>HKD$ '.$roworderdata["uservalue"].'</td>
    </tr>
';
}
$output .='
    </tbody>
</table>
';  

echo $output;  

}


?>