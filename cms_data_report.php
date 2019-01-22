<?php
include 'cms_session.php';
include 'db/dbconnect.php';
if($_SESSION['userlevel'] == 1){
    header('Location: cms_index.php');
}
 //Line Chart
$query = "SELECT sum(amount) AS sales, CAST(odate AS DATE) AS date FROM TBORDER WHERE status = 2 GROUP BY CAST(odate AS DATE)";
$result = mysqli_query($connect, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ date:'".$row["date"]."', sales:".$row["sales"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);

//Bar Chart
$query2="SELECT tborder_detail.did, sum(tborder_detail.subtotal) AS subtotal, 
(SELECT sum(tborder_detail.subtotal) from tborder_detail, tborder 
WHERE tborder_detail.oid = tborder.id AND tborder.status = 2) as sumtotal, tbmenu.dname FROM tborder_detail 
JOIN tbmenu ON tbmenu.id = tborder_detail.did 
JOIN tborder ON tborder.id = tborder_detail.oid 
AND tborder.status = 2 
GROUP BY tbmenu.id ORDER BY DPRICE DESC
";


$result2 = mysqli_query($connect, $query2);
$chart_data2 = '';
while($row2 = mysqli_fetch_array($result2))
{
 $chart_data2 .= "{ dish:'".$row2["dname"]."', subtotal:".$row2["subtotal"].", sumtotal:".$row2["sumtotal"]."}, ";
}

$chart_data2 = substr($chart_data2, 0, -2);



?>


<style>
.morris-hover{
    position:absolute;z-index:1000}
    
.morris-hover.morris-default-style{
    border-radius:10px;
    padding:6px;
    color:#666;
    background:rgba(255,255,255,0.8);
    border:solid 2px rgba(230,230,230,0.8);
    font-family:sans-serif;
    font-size:12px;
    text-align:center}

.morris-hover.morris-default-style .morris-hover-row-label{
    font-weight:bold;
    margin:0.25em 0}

.morris-hover.morris-default-style .morris-hover-point{
    white-space:nowrap;
    margin:0.1em 0}
</style>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SC & FOOD | Content Management Systems</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!--ionRangeSlider-->
    <link href="css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
    <link href="css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

<div id="wrapper">
<?php
include 'include/cms_leftbar.php';
?>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="logout.php">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        

   
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-left m-t-lg"style="width:60%;">
                        <h1>Sales Data</h1>
                    </div>
                    <div class="row">
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">History</span>
                        <h5>Total Revenue</h5>
                    </div>
                    <div class="ibox-content">
<?php
$querytotal = "SELECT sum(amount) AS amount FROM TBORDER WHERE status = 2";
$resulttotal = mysqli_query($connect, $querytotal);
$rowtotal = mysqli_fetch_assoc($resulttotal);
?>                        
<div class="stat-percent font-bold text-success"></div>
                        <small>HKD$</small>
                        <h1 class="no-margins"><?php echo $rowtotal['amount']; ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-info pull-right">History</span>
                        <h5>Confirmed Orders</h5>
                    </div>
                    <div class="ibox-content">   
<?php
$queryorder = "SELECT count(id) AS order_number FROM TBORDER WHERE status = 2";
$resultorder = mysqli_query($connect, $queryorder);
$roworder = mysqli_fetch_assoc($resultorder);
?>                           
                        <div class="stat-percent font-bold text-info"></div>
                        <small>Orders Number</small>
                        <h1 class="no-margins"><?php echo $roworder['order_number']; ?></h1>
   
                    </div>
                </div>
            </div>

        </div>
                </div>
                
            </div>
            
        


<!--chart-->

        <div class="wrapper wrapper-content animated fadeInRight" >
            <div class="row">
                <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Recent Sales Data</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
   
                        </div>
                    </div>
                    <div class="ibox-content" style="position: relative">
          <div id="recent-sales-chart"></div>
 
                    </div>
                </div>
            </div>

<!--Bar Chart-->
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Dish Sales Report</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>

                        </div>
                    </div>
                    <div class="ibox-content">
                        <div id="morris-bar-chart"></div> 
                        <br>

<?php
$queryt1 = "SELECT tborder_detail.did, 
sum(tborder_detail.subtotal) AS subtotal, 
tbmenu.dname FROM tborder_detail 
JOIN tbmenu ON tbmenu.id = tborder_detail.did GROUP BY tbmenu.id ORDER BY DPRICE DESC";
$resultt1 = mysqli_query($connect, $queryt1);


?>

<table class="table table-bordered" >
<thead>
  <tr>
    <th>Dish Name</th>
    <th>Profits(Subtotal)</th>
  </tr>
  </thead>
  <tbody>
<?php
  while($rowt1 = mysqli_fetch_array($resultt1))
  {
?>
  <tr>

<td><?php echo $rowt1['dname']; ?></td>
<td>HKD$ <?php echo $rowt1['subtotal']; ?></td>

  </tr>
<?php
  }
?>   
<?php
$queryt2 = "SELECT sum(amount) AS amount from tborder where status = 2";
$resultt2 = mysqli_query($connect, $queryt2);
$rowt2 = mysqli_fetch_assoc($resultt2);
?>  
  </tbody>

  </table>  
  *Total Revenue HKD$ <?php echo $rowt2['amount']; ?>
                    </div>
                   
                </div>
            </div>
            </div>
        <!--Bar Chart End-->
<!--Customer Remark-->

<div class="row">

        <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Customer Value</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
               
            </div>
        </div>
        <div class="ibox-content">
            <div class="row">
      
            <div id="show_ionrange"></div><br>

      <div style="text-align: right; width: 98%;">
      <button class="btn btn-secondary btn-sm" onclick="printDiv('tableprint1')">Print Customer Detail</button>      
      </div>
      
                <div class="col-sm-9 m-b-xs">
                </div>
            </div>
            <div class="table-responsive">
<?php
$queryorderdata = "SELECT tbuser.*, tborder.uid, sum(tborder.amount) AS uservalue 
FROM tborder JOIN tbuser ON tbuser.id = tborder.uid GROUP BY tborder.uid ORDER BY uservalue DESC";
$resultorderdata = mysqli_query($connect, $queryorderdata);

?>
<div id="tableprint1">
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
                    <tbody>
<?php
while($roworderdata = mysqli_fetch_array($resultorderdata))
{
?>
                    <tr>
                        <td>#<?php echo $roworderdata['id'];?></td>
                        <td><?php echo $roworderdata['uname'];?></td>
                        <td><?php echo $roworderdata['uaddress'];?></td>
                        <td><?php echo $roworderdata['uphone'];?></td>
                        <td><?php echo $roworderdata['uemail'];?></td>
                        <td>HKD$ <?php echo $roworderdata['uservalue'];?></td>
                    </tr>
<?php
}
?>
                    </tbody>
                </table>
                </div>


            </div>
        </div>
        </div>
        </div>
        </div>

<!--Customer Remark-->



        </div>
        </div>




        <div class="footer">
            <div>
                <strong>Copyright</strong> &copy; 2018
            </div>
        </div>

    </div>
</div>

<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

    <!-- Morris Chart 
 

     Morris Chart-->
     
     <script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="js/plugins/morris/morris.js"></script>

    <!--
    <script src="js/demo/morris-demo.js"></script>-->
    
    
    <!-- IonRangeSlider -->
    <script src="js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>
</body>

</html>



<script>
$(function() {

Morris.Line({
 element : 'recent-sales-chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'date',
 ykeys:['sales'],
 labels:['Sales amount HKD$'],
 hideHover:'auto',
 stacked:true,
     resize: true,
    lineWidth:4,
    lineColors: ['#1ab394'],
    pointSize:5,
});

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


});

function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
        }
        
/*
$("#show_ionrange").ionRangeSlider({
            min: 0,
            max: 10000,
            type: 'double',
            prefix: "$",
            maxPostfix: "+",
            prettify: false,
            hasGrid: true
        });
*/

    var $d4 = $("#show_ionrange");
    
    $d4.ionRangeSlider({
            min: 0,
            max: 10000,
            type: 'double',
            prefix: "$",
            maxPostfix: "+",
            prettify: false,
            hasGrid: true
        });
    
    $d4.on("change", function () {
        alert('123');
        var $inp = $(this);
        var v = $inp.prop("value");     // input value in format FROM;TO
        var from = $inp.data("from");   // input data-from attribute
        var to = $inp.data("to");       // input data-to attribute
    
        console.log(v, from, to);       // all values
    });
    
</script>
