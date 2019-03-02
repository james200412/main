<?php
include('../../db/dbconnect.php');

if($_POST["periodnumber"])  
{  

$periodnumber = $_POST["periodnumber"];
    //Line Chart - select time period
$querytime = "SELECT sum(amount) AS sales, CAST(odate AS DATE) AS date 
              FROM TBORDER WHERE status = 2 AND CAST(odate AS DATE) 
              AND DATE (odate) > DATE_SUB(CURDATE(), INTERVAL $periodnumber DAY) 
              GROUP BY CAST(odate AS DATE)";
$result = mysqli_query($connect, $querytime);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{

$chart_data += $row["sales"];

}

$querytime2 = "SELECT count(id) AS onumber, CAST(odate AS DATE) AS date 
FROM TBORDER WHERE status = 2 AND CAST(odate AS DATE)
AND DATE (odate) > DATE_SUB(CURDATE(), INTERVAL $periodnumber DAY)";
$result2 = mysqli_query($connect, $querytime2);
$chart_data2 = '';
$row2 = mysqli_fetch_assoc($result2);
$chart_data2 = $row2["onumber"];


echo '
<div class="col-sm-4"><h4>Period Revenue : </h4>           
<small>HKD$</small>
<h1>' . $chart_data . '</h1>
</div>

<div class="col-sm-4"><h4>Period Confirmed Orders : </h4>           
<small>Order Number</small>
<h1>' . $chart_data2 . '</h1>
</div>

';
}
?>