<?php
include 'cms_session.php';
?>

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
                <li class="active">
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
                <li>
                                       <a href="#"><i class="fa fa-area-chart"></i> <span class="nav-label">Data Analysis</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse" style="">
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
                            Welcome To Content Management Systems
                        </h1>
                    </div>
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


</body>

</html>
