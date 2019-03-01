<?php
include('../../db/dbconnect.php');

if($_POST["dishrating"])  
{  
    
$postdishrating = $_POST["dishrating"];

//Bar Chart
$query2 = "SELECT * FROM TBMENU ORDER BY RATING DESC LIMIT $postdishrating";
$result2 = mysqli_query($connect, $query2);
$chart_data2 = '';
while($row2 = mysqli_fetch_array($result2))
{
 $chart_data2 .= "{ dish:'".$row2["dname"]."', Rating:".$row2["rating"]."}, ";
}

$chart_data2 = substr($chart_data2, 0, -2);


$output = ''; 
$output .= '
<div id="barchart-rating" class="ibox float-e-margins">
<div class="ibox-title">';

if($postdishrating!=10000){
$output .= '<h5>Top Rated ' . $postdishrating . ' Dishes </h5>';
}else{
$output .= '<h5>All Rated Dishes </h5>';
}

$output .= '
<div class="ibox-tools">
        <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>
</div>   


<div class="ibox-content">
    <div id="morris-bar-chart"></div> 
    <br>';

$queryt1 = "SELECT * FROM TBMENU ORDER BY RATING DESC LIMIT $postdishrating";
$resultt1 = mysqli_query($connect, $queryt1);


$output .= '
<table class="table table-bordered" >
<thead>
<tr>
<th>Dish Name</th>
<th>Dish Rating</th>
</tr>
</thead>
<tbody>';

while($rowt1 = mysqli_fetch_array($resultt1))
{
$output .= '
<tr>
<td>' . $rowt1['dname'] . '</td>
<td>' . $rowt1['rating'] . ' Point</td>


</tr>';

}
$output .= '  
</tbody>
</table>
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
    ykeys: ['Rating'],
    labels: ['Rating '],
    hideHover: 'auto',
    resize: true,
    xLabelAngle: 60,
    barColors: ['#1ab394', 'lightblue'],
});
</script>
