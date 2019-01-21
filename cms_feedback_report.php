<?php
include 'cms_session.php';
include 'db/dbconnect.php';

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
$query2 = "SELECT * FROM TBMENU ORDER BY DTYPE DESC";
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

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">
                            
                            <?php
                         // echo 'Welcome : ';                          
                            echo $_SESSION['username'];
                            
                            ?>
                            
                            </strong>
                             </span> <span class="text-muted text-xs block">

                             <?php if ($_SESSION['userlevel'] == 2){
                                      echo "Administrator";
                                    }  else if($_SESSION['userlevel'] == 1){
                                      echo "Staff";
                                    }else{
                                      //echo "Customer";
                                    }                              
                                    ?>
                                                       
                             <b class="caret"></b></span> </span> </a>

                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                    </div>
                    <div class="logo-element">
                        CMS
                    </div>
                </li>
                <li>
                    <a href="cms_index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard </span></a>
                </li>
                <li>
                    <a href="cms_account_manage.php"><i class="fa fa-user-o"></i> <span class="nav-label">Account Management</span> </a>
                </li>
                <li>
                    <a href="cms_menu_manage.php"><i class="fa fa-list-alt"></i> <span class="nav-label">Menu Management</span> </a>
                </li>
                <li>
                    <a href="cms_order_manage.php"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Order Management</span> </a>
                </li>
            
                <li class="active">
<a href="#"><i class="fa fa-area-chart"></i> <span class="nav-label">Data Analysis</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse in" style="">
                        <li><a href="cms_data_report.php">Sales Data</a></li>
                        <li><a href="cms_feedback_report.php">Customer FeedBack</a></li>
                    </ul>                </li>
            </ul>

        </div>
    </nav>

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
 
                    </div>
                </div>
            </div>

<!--Bar Chart-->
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Dish Rating</h5>
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
$queryt1 = "SELECT * FROM TBMENU ORDER BY DTYPE DESC";
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
            <h5>Customer Remark</h5>
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
$query233 = "SELECT * FROM tbfeedback WHERE remark IS NOT NULL ORDER BY oid DESC";
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

Morris.Donut({
    element: 'morris-donut-chart',
    data: [<?php echo $chart_data; ?>],
    resize: true,
    colors: ['#FF0000', '#FFF700','#00FF59','#0008FF','#FB00FF'],
});

});
</script>
