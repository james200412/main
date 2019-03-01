<?php
include('../../db/dbconnect.php');

if($_POST["dishnumber"])  
{  
//Bar Chart
$output = ''; 
$postdishnumber = $_POST["dishnumber"];

$query2="SELECT tborder_detail.did, sum(tborder_detail.subtotal) AS subtotal, 
(SELECT sum(tborder_detail.subtotal) from tborder_detail, tborder 
WHERE tborder_detail.oid = tborder.id AND tborder.status = 2) as sumtotal, tbmenu.dname FROM tborder_detail 
JOIN tbmenu ON tbmenu.id = tborder_detail.did 
JOIN tborder ON tborder.id = tborder_detail.oid 
AND tborder.status = 2 
GROUP BY tbmenu.id ORDER BY subtotal DESC LIMIT $postdishnumber
";

$queryt1 = "SELECT tborder_detail.did,
sum(tborder_detail.subtotal) AS subtotal, 
tbmenu.dname FROM tborder_detail
JOIN tbmenu ON tbmenu.id = tborder_detail.did JOIN tborder ON tborder.id = tborder_detail.oid 
AND tborder.status = 2 
GROUP BY tbmenu.id ORDER BY subtotal DESC LIMIT $postdishnumber";
$resultt1 = mysqli_query($connect, $queryt1);


$result2 = mysqli_query($connect, $query2);
$chart_data2 = '';
while($row2 = mysqli_fetch_array($result2))
{
 $chart_data2 .= "{ dish:'".$row2["dname"]."', subtotal:".$row2["subtotal"].", sumtotal:".$row2["sumtotal"]."}, ";
}

$chart_data2 = substr($chart_data2, 0, -2);


//echo $_POST["dishnumber"];
$output .='<!--Bar Chart-->
    <div id="barchart-content" class="ibox float-e-margins">
        <div class="ibox-title">';
if($postdishnumber !=10000){
$output .='<h5>Top ' . $postdishnumber . ' Dish Sales</h5>';
}else{
$output .='<h5>All Dish Sales</h5>'; 
}

$output .='<div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>

            </div>
        </div>
        <div class="ibox-content">
            <div id="morris-bar-chart"></div> 
            <br>



<table class="table table-bordered" >
<thead>
<tr>
<th>Dish Name</th>
<th>Profits(Subtotal)</th>
</tr>
</thead>
<tbody>';
$amount = 0;
while($rowt1 = mysqli_fetch_array($resultt1))
{
$output .='<tr><td>' .  $rowt1['dname'] . '</td>
<td>HKD$ '.  $rowt1['subtotal'] . '</td>

</tr>';
$amount += $rowt1['subtotal'];
}
/*
$queryt2 = "SELECT sum(amount) AS amount from tborder where status = 2";
$resultt2 = mysqli_query($connect, $queryt2);
$rowt2 = mysqli_fetch_assoc($resultt2);
*/
$output .='</tbody>

</table>  

* Top Sales Dish Revenue HKD$ ' . $amount . '
        </div>
       
    </div>
</div>
</div>
<!--Bar Chart End-->';

echo $output;
}


?>
<script>
Morris.Bar({
    element: 'morris-bar-chart',
    data: [<?php echo $chart_data2; ?>],
    xkey: 'dish',
    ykeys: ['sumtotal', 'subtotal'],
    labels: ['Total Amount HKD$', 'Subtotal HKD$'],
    hideHover: 'auto',
    resize: true,
    xLabelAngle: 60,
    barColors: ['#1ab394', 'lightblue'],
});

</script>
