<?php
include 'cms_session.php';
include 'db/dbconnect.php';
if($_SESSION['userlevel'] == 1){
    header('Location: cms_index.php');
    }
 //Donut Chart- (get mark/most hight mark)*100 = % of get mark
$query = "SELECT COUNT(overallrate) AS vbad, 
(SELECT COUNT(overallrate) FROM tbfeedback WHERE overallrate = -1) AS bad, 
(SELECT COUNT(overallrate) FROM tbfeedback WHERE overallrate = 0) AS normal, 
(SELECT COUNT(overallrate) FROM tbfeedback WHERE overallrate = 1) AS good, 
(SELECT COUNT(overallrate) FROM tbfeedback WHERE overallrate = 2) AS vgood 
FROM tbfeedback WHERE overallrate = -2";

$result = mysqli_query($connect, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ label:'Very Good', value: ".$row["vgood"]."}, 
 { label:'Good', value: ".$row["good"]."},
 { label:'Normal', value: ".$row["normal"]."},
 { label:'Bad', value: ".$row["bad"]."}, 
 { label:'Very Bad', value: ".$row["vbad"]."}
 ";
}
$chart_data = substr($chart_data, 0, -2);


//Bar Chart
$query2 = "SELECT * FROM TBMENU ORDER BY RATING DESC LIMIT 3";
$result2 = mysqli_query($connect, $query2);
$chart_data2 = '';
while($row2 = mysqli_fetch_array($result2))
{
 $chart_data2 .= "{ dish:'".$row2["dname"]."', Rating:".$row2["rating"]."}, ";
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
                        <h1>Customer FeedBack</h1>
                    </div>
                    <div class="row">
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-info pull-right">History</span>
                        <h5>FeedBack Number</h5>
                    </div>
                    <div class="ibox-content">   
<?php
$queryorder = "SELECT count(id) AS feedback_number FROM tbfeedback";
$resultorder = mysqli_query($connect, $queryorder);
$roworder = mysqli_fetch_assoc($resultorder);
?>                           
                        <div class="stat-percent font-bold text-info"></div>
                        <small>FeedBack</small>
                        <h1 class="no-margins"><?php echo $roworder['feedback_number']; ?></h1>
   
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-primary pull-right">Summary</span>
                        <h5>Overall Customer Satisfaction</h5>
                    </div>
                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-md-6">


<?php
$query123 = "SELECT (SELECT COUNT(overallrate) FROM tbfeedback WHERE overallrate = -1 OR overallrate = -2) AS below, 
(SELECT COUNT(overallrate) FROM tbfeedback WHERE overallrate = 0 OR overallrate = 1 OR overallrate = 2) AS above 
FROM tbfeedback GROUP BY 1";
$result123 = mysqli_query($connect, $query123);
$row123 = mysqli_fetch_assoc($result123);
?>

                                <h1 class="no-margins"><?php echo $row123['above'];?></h1>
                                <div class="font-bold text-navy"><small>Normal Or Above</small></div>
                            </div>
                            <div class="col-md-6">
                                <h1 class="no-margins"><?php echo $row123['below'];?></h1>
                                <div class="font-bold text-navy"><small>Below Normal</small></div>
                            </div>
                        </div>


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
                        <h5>Customer Overall Satisfaction</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
   
                        </div>
                    </div>
                    <div class="ibox-content" style="position: relative">
          <div id="morris-donut-chart"></div>
<br>
<?php
$queryt3341 = "SELECT COUNT(overallrate) AS vbad1, 
(SELECT COUNT(overallrate) FROM tbfeedback WHERE overallrate = -1) AS bad1, 
(SELECT COUNT(overallrate) FROM tbfeedback WHERE overallrate = 0) AS normal1, 
(SELECT COUNT(overallrate) FROM tbfeedback WHERE overallrate = 1) AS good1, 
(SELECT COUNT(overallrate) FROM tbfeedback WHERE overallrate = 2) AS vgood1 
FROM tbfeedback WHERE overallrate = -2";
$resultt3341 = mysqli_query($connect, $queryt3341);
$rowt3341 = mysqli_fetch_array($resultt3341);
?>

<table class="table table-bordered" >
<thead>
  <tr>
    <th>Selection</th>
    <th>Number of return</th>
  </tr>
  </thead>
  <tbody>
  <tr>
<td>Very Good</td>
<td><?php echo $rowt3341['vgood1']; ?> Select</td>
  </tr> 
  <tr>
<td>Good</td>
<td><?php echo $rowt3341['good1']; ?> Select</td>
  </tr> 
  <tr>
<td>Normal</td>
<td><?php echo $rowt3341['normal1']; ?> Select</td>
  </tr> 
  <tr>
<td>Bad</td>
<td><?php echo $rowt3341['bad1']; ?> Select</td>
  </tr> 
  <tr>
<td>Very Bad</td>
<td><?php echo $rowt3341['vbad1']; ?> Select</td>
  </tr> 
  </tbody>
  </table>
  <?php
$queryt3342 = "SELECT COUNT(id) AS all1 FROM tbfeedback";
$resultt3342 = mysqli_query($connect, $queryt3342);
$rowt3342 = mysqli_fetch_array($resultt3342);
?>
  * Total Feedback Number : <?php echo $rowt3342['all1']; ?>
                    </div>
                </div>
            </div>

<!--Bar Chart-->
<style>
select {
    width: 30%;
    text-align: center;
    text-align-last: center;
}
</style>
            <div class="col-lg-6">

<h4>Show : &nbsp;
<select id="dish_rating" name="dish_rating">
<option disabled selected>Please Select</option>
<option value="10000">All</option>
<option value="3">Top 3</option>
<option value="5">Top 5</option>
<option value="10">Top 10</option>
</select>    </h4 >

                <div id="barchart-rating" class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Top Rated 3 Dishes</h5 >
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
$queryt1 = "SELECT * FROM TBMENU ORDER BY RATING DESC LIMIT 3";
$resultt1 = mysqli_query($connect, $queryt1);


?>

<table class="table table-bordered" >
<thead>
  <tr>
    <th>Dish Name</th>
    <th>Dish Rating</th>
  </tr>
  </thead>
  <tbody>
<?php
  while($rowt1 = mysqli_fetch_array($resultt1))
  {
?>
  <tr>

<td><?php echo $rowt1['dname']; ?></td>
<td><?php echo $rowt1['rating']; ?> Point</td>


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
        <!--Bar Chart End-->
       
<!--Customer Remark-->

<div class="row">

        <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Customer Remark</h5><small>&nbsp;(Display only not null records)</small>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
               
            </div>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-sm-9 m-b-xs">

                </div>
            </div>
            <div class="table-responsive">
<?php
$query233 = "SELECT * FROM tbfeedback WHERE remark IS NOT NULL AND remark !='' ORDER BY oid DESC";
$result233 = mysqli_query($connect, $query233);
?>
                <table class="table table-striped">
                <col width="20%">
                <col width="80%">
                    <thead>
                    <tr>
                        <th>#Order ID </th>
                        <th>Remark </th>
                    </tr>
                    </thead>
                    <tbody>
<?php
while($row233 = mysqli_fetch_array($result233))
{
?>
                    <tr>
                        <td>#<?php echo $row233['oid'];?></td>
                        <td><?php echo $row233['remark'];?></td>
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

</body>

</html>



<script>
$(function() {

//bar chart ajax 
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

$('#dish_rating').change(function() {
    
    var dishrating = $('#dish_rating').val();
    
    if(dishrating != ''){
    $.ajax({
            url: "cms/report/feedback_barchartfilter.php",
            method:"POST",
            data:{dishrating:dishrating},
            success: function(data343) {
            $('#barchart-rating').html(data343);
         //   alert(data343);
    
            }
      });
    }
    });


Morris.Donut({
    element: 'morris-donut-chart',
    data: [<?php echo $chart_data; ?>],
    resize: true,
    colors: ['#FF0000', '#FFF700','#00FF59','#0008FF','#FB00FF'],
});

});
</script>
