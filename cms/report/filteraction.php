<?php
include('../../db/dbconnect.php');

if($_POST["From"]||$_POST["to"])  
{  

$from = $_POST["From"];
$to = $_POST["to"];
    //Line Chart - select time period
$querytime = "SELECT sum(amount) AS sales, CAST(odate AS DATE) AS date 
                  FROM TBORDER WHERE status = 2 AND CAST(odate AS DATE) BETWEEN '$from' AND '$to' 
                  GROUP BY CAST(odate AS DATE)";
$result = mysqli_query($connect, $querytime);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
/*
$chart_data .= "{ date:'".$row["date"]."', sales:".$row["sales"]."}, ";
*/
$chart_data[] = array(
    'date'  => $row["date"],
    'sales'  => $row["sales"]
);
}

$chart_data = json_encode($chart_data);
echo $chart_data;
}
?>