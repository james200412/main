<?php
include 'cms_session.php';
include 'db/dbconnect.php';
 
$query = "SELECT *, sum(amount) AS sales FROM TBORDER GROUP BY CAST(odate AS DATE)";
$result = mysqli_query($connect, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ date:'".$row["odate"]."', sales:".$row["sales"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);

?>


<style>
.morris-hover{position:absolute;z-index:1000}.morris-hover.morris-default-style{border-radius:10px;padding:6px;color:#666;background:rgba(255,255,255,0.8);border:solid 2px rgba(230,230,230,0.8);font-family:sans-serif;font-size:12px;text-align:center}.morris-hover.morris-default-style .morris-hover-row-label{font-weight:bold;margin:0.25em 0}
.morris-hover.morris-default-style .morris-hover-point{white-space:nowrap;margin:0.1em 0}
</style>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SC & FOOD | Content Management Systems</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--<link href="font-awesome/css/font-awesome.css" rel="stylesheet">-->


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
                    <a href="cms_data_report.php"><i class="fa fa-area-chart"></i> <span class="nav-label">Data Analysis & Report</span> </a>
                </li>
            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <!--<form role="search" class="navbar-form-custom" method="post" action="#">
                        <div class="form-group">
                            <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>-->
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
                    <div class="text-center m-t-lg">
                        <h1>
                            Sales Data
                        </h1>



<p>Sales Data Analysis and Reporting Module
<p>The staff can view the sales data in the report within the content management module. 
<p>The report is divided the sales data according to the different time period, for example by month.


                    </div>
                    
                </div>
                
            </div>
            
        </div>


<!--chart-->
        <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Morris.js Charts</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Graphs</a>
                        </li>
                        <li class="active">
                            <strong>Morris.js Charts</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight" >
            <div class="row">
                <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Area Chart Example <small>With custom colors.</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content" style="position: relative">
                        <div id="morris-area-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Bar Chart Example </h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div id="morris-bar-chart"></div>
                    </div>
                </div>
            </div>
            </div>
        
            <div class="row">
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Line Chart Example </h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div id="morris-line-chart"></div>
                        </div>
                    </div>
                </div>

              
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Donut Chart Example</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div id="morris-donut-chart" ></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Simple one line Example </h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div id="morris-one-line-chart"></div>
                            <div id="mycanvas"></div>
                            
                            
                        </div>
                    </div>
                </div>
            </div> 
            
   <div class="container" style="width:900px;" >
   <h3 align="Left">Last 10 Years Profit, Purchase and Sale Data</h3>   
   <br /><br />
   <div class="ibox-content">
   <div id="chart"></div>
  </div>
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

Morris.Line({
    element: 'morris-one-line-chart',
        data: [
            { year: '2008', value: 5 },
            { year: '2009', value: 10 },
            { year: '2010', value: 8 },
            { year: '2011', value: 22 },
            { year: '2012', value: 8 },
            { year: '2014', value: 10 },
            { year: '2015', value: 5 }
        ],
    xkey: 'year',
    ykeys: ['value'],
    resize: true,
    lineWidth:4,
    labels: ['Value'],
    lineColors: ['#1ab394'],
    pointSize:5,
});

Morris.Area({
    element: 'morris-area-chart',
    data: [
        { period: '2010 1Q1', iphone: 2666, ipad: null, itouch: 2647 },
        { period: '2010 Q2', iphone: 2778, ipad: 2294, itouch: 2441 },
        { period: '2010 Q3', iphone: 4912, ipad: 1969, itouch: 2501 },
        { period: '2010 Q4', iphone: 3767, ipad: 3597, itouch: 5689 },
        { period: '2011 Q1', iphone: 6810, ipad: 1914, itouch: 2293 },
        { period: '2011 Q2', iphone: 5670, ipad: 4293, itouch: 1881 },
        { period: '2011 Q3', iphone: 4820, ipad: 3795, itouch: 1588 },
        { period: '2011 Q4', iphone: 5073, ipad: 5967, itouch: 5175 },
        { period: '2012 Q1', iphone: 5687, ipad: 4460, itouch: 2028 },
        { period: '2012 Q2', iphone: 8432, ipad: 5713, itouch: 1791 } ],
    xkey: 'period',
    ykeys: ['iphone', 'ipad', 'itouch'],
    labels: ['iPhone', 'iPad', 'iPod Touch'],
    pointSize: 2,
    hideHover: 'auto',
    resize: true,
    lineColors: ['#87d6c6', '#54cdb4','#1ab394'],
    lineWidth:2,
    pointSize:1,
});

Morris.Donut({
    element: 'morris-donut-chart',
    data: [{ label: "Download Sales", value: 12 },
        { label: "In-Store Sales", value: 30 },
        { label: "Mail-Order Sales", value: 20 } ],
    resize: true,
    colors: ['#87d6c6', '#54cdb4','#1ab394'],
});

Morris.Bar({
    element: 'morris-bar-chart',
    data: [{ y: '2006', a: 10, b: 10 },
        { y: '2007', a: 10, b: 10 },
        { y: '2008', a: 10, b: 10 },
        { y: '2009', a: 10, b: 10 },
        { y: '2010', a: 10, b: 10 },
        { y: '2011', a: 10, b: 10 },
        { y: '2012', a: 10, b: 10 } ],
    xkey: 'y',
    ykeys: ['a', 'b'],
    labels: ['Series A', 'Series B'],
    hideHover: 'auto',
    resize: true,
    barColors: ['#1ab394', '#cacaca'],
});

Morris.Line({
    element: 'morris-line-chart',
    data: [{ y: '2010', a: 100, b: 90 },
        { y: '2011', a: 75, b: 65 },
        { y: '2012', a: 50, b: 40 },
        { y: '2013', a: 75, b: 65 },
        { y: '2014', a: 50, b: 40 },
        { y: '2015', a: 75, b: 65 },
        { y: '2016', a: 100, b: 90 },
        { y: '2017', a: 100, b: 90 },
        { y: '2018', a: 100, b: 90 } ],
    xkey: 'y',
    ykeys: ['a', 'b'],
    labels: ['Series A', 'Series B'],
    hideHover: 'auto',
    resize: true,
    lineColors: ['#54cdb4','#1ab394'],
});


Morris.Line({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'date',
 ykeys:['sales'],
 labels:['sales'],
 hideHover:'auto',
 stacked:true,
     resize: true,
    lineWidth:4,
    lineColors: ['#1ab394'],
    pointSize:5,
});


});
</script>
