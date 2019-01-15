<?php
include 'cms_session.php';
include 'db/dbconnect.php';
 $orderquery = "SELECT * FROM TBORDER ORDER BY id DESC";  
 $orderresult = mysqli_query($connect, $orderquery);  

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
                <li>
                    <a href="cms_index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard Index</span></a>
                </li>
                <li>
                    <a href="cms_account_manage.php"><i class="fa fa-th-large"></i> <span class="nav-label">Account Management</span> </a>
                </li>
                <li>
                    <a href="cms_menu_manage.php"><i class="fa fa-th-large"></i> <span class="nav-label">Menu Management</span> </a>
                </li>
                <li class="active">
                    <a href="cms_order_manage.php"><i class="fa fa-th-large"></i> <span class="nav-label">Order Management</span> </a>
                </li>
                <li>
                    <a href="cms_sales_report.php"><i class="fa fa-th-large"></i> <span class="nav-label">Sales Report</span> </a>
                </li>
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
                    <div class="text-Left m-t-lg">

                    
  <!--start-->
  <div class="container" style="width:100%;">
           <h1 class="manage">Order Management</h1>
                <br />  
                <div class="table-responsive">  

                     <br />  
                     <div id="usertable">  
                          <table class="table table-bordered">  
                          <thead>
                               <tr>  
                                    <th width="5%">ORDER ID</th>  
                                    <th width="5%">MEMBER ID</th>
                                    <th width="5%">RECEIVABLE</th>
                                    <th width="10%">ORDER TIME</th>
                                    <th width="35%">DELIVERY ADDRESS</th>
                                    <th width="10%">PAYMENT TYPE</th>
                                    <th width="5%">STATUS</th>
                                    <th width="5%"></th>
                                    

                               </tr>  
                               </thead>
                               <tbody>
                               <?php  
                               while($orderrow = mysqli_fetch_array($orderresult))  
                               {  
                               ?>  
                               <tr>  
                                    <td>#<?php echo $orderrow["id"]; ?></td> 
                                    <td><?php echo $orderrow["uid"]; ?></td> 
                                    <td>$<?php echo $orderrow["amount"]; ?></td> 
                                    <td><?php echo $orderrow["odate"]; ?></td> 
                                    <td><?php echo $orderrow["oaddress"]; ?></td>
                                    <td><?php if ($orderrow["paytype"] == 0){
                                      echo "cash on delivery";
                                    }  else{
                                      echo "Others";
                                    }                              
                                    ?>
                                    </td>
                                    <td><?php if ($orderrow["status"] == 0){
                                      echo "Ordered";
                                    }else if($orderrow["status"] == 1){
                                      echo "Processing";
                                    }else if($orderrow["status"] == 2){
                                      echo "Delivering";
                                    }else if($orderrow["status"] == 3){
                                      echo "Completed"; 
                                    }else if($orderrow["status"] == 4){
                                      echo "Canceled";
                                    }                        
                                    ?>
                                    </td>
                                   
<td><input type="button" data-toggle="modal" data-target="#orderdetail" name="detail" value="Detail" id="<?php echo $orderrow["id"]; ?>" class="btn btn-info btn-xs detail_data" /></td>  

                               </tr>
                               <?php
                               } 
                               ?>  
                                  <tbody>
                          </table>  
                     </div>  
                </div>  
           </div>  



  <!--end-->


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


<!-- Guest Modal -->
<!-- Modal: modalCart -->
<div class="modal fade" id="orderdetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>  
        <h4 class="modal-title" id="myModalLabel">Order Detail</h4>
      </div>
      <!--Body-->
<div class="modal-body" id="modaldetail">



</div>
      <!--Footer
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Update Status</button>
      </div>-->
    </div>
  </div>
</div>
<!-- Modal: modalCart -->

<form action="../cms/order/update.php" method="POST">
<tr>  
<td width="30%"><label>Order Status</label></td> 
<td>
<select>
  <option value="0">Ordered</option>
  <option value="1">Processing</option>
  <option value="2">Delivering</option>
  <option value="3">Completed</option>
  <option value="4">Canceled</option>
</select>
<tr><td width="30%"></td>
<td>
<button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
<input type="submit" name="submit" id="submit" class="btn btn-outline-primary" Value="Update Status">
</td>
</tr>
</form>

<script>
/*ajax fetch data to edit form*/

      $(document).on('click', '.detail_data', function(){  
           var orderid = $(this).attr("id");  
           if(orderid != '')  
           {  
                $.ajax({  
                     url:"cms/order/fetch.php",  
                     method:"POST",  
                     data:{orderid:orderid},  
                     success:function(data){  
                          $('#modaldetail').html(data);  
                          $('#orderdetail').modal('show');  
                     }  
                });  
           }     
      });  

</script>
