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
                    <a href="cms_index.php"><i class="fa fa-th-large"></i></i> <span class="nav-label">Dashboard </span></a>
                </li>
                <li>
                    <a href="cms_account_manage.php"><i class="fa fa-user-o"></i> <span class="nav-label">Account Management</span> </a>
                </li>
                <li>
                    <a href="cms_menu_manage.php"><i class="fa fa-list-alt"></i> <span class="nav-label">Menu Management</span> </a>
                </li>
                <li class="active">
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

                <style>
#myInput {

  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 20%;
  font-size: 16px;
  padding: 10px 20px 10px 20px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
</style>    

  <!--start-->
  <div class="container" style="width:100%;">
  <div>
           <h1 class="manage" style="width:50%;">Order Management</h1>
 </div> 
                <div align="right">
               <h3>Order Status&nbsp;:&nbsp;&nbsp;
     <select id="myInput" onchange="myFunction()">
     <option selected value="">All</option>
     <option value="Processing">Processing</option>
     <option value="Delivered">Delivered</option>
     <option value="Completed">Completed</option>
     <option value="Canceled">Canceled</option>
     </select>
                </div>
                <div class="table-responsive">  
                
                     <br />  
                     <div id="usertable">  
                          <table id="myTable" class="table table-bordered">  
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

                                    <?php 
                                    if($orderrow["status"] == 0){
                                        echo '<td bgcolor="#EF3B3B" style="color: white;">';
                                    }else if($orderrow["status"] == 1){
                                        echo '<td bgcolor="#F2BBB0" style="color: white;">';
                                    }else if($orderrow["status"] == 2){
                                        echo '<td bgcolor="lightgreen" style="color: white;">';
                                    }else if($orderrow["status"] == 3){
                                        echo '<td bgcolor="LightGray" style="color: white;">';
                                    }                        
                                    ?>

                                    
                                    <?php 
                                    if($orderrow["status"] == 0){
                                      echo "Processing";
                                    }else if($orderrow["status"] == 1){
                                      echo "Delivered";
                                    }else if($orderrow["status"] == 2){
                                      echo "Completed"; 
                                    }else if($orderrow["status"] == 3){
                                      echo "Canceled";
                                    }                        
                                    ?>
                                    </td>
                                   
<td align="center"><input type="button" data-toggle="modal" data-target="#orderdetail" name="detail" value="Detail" id="<?php echo $orderrow["id"]; ?>" class="btn btn-info btn-xs detail_data" /></td>  

                               </tr>
                               <?php
                               } 
                               ?>  
                                  </tbody>
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
      <button type="button" class="close" onClick="location.href=location.href">&times;</button>  
        <h4 class="modal-title" id="myModalLabel">Order Detail</h4>
      </div>
      <!--Body-->

      <br><div style="text-align: right; width: 95%;">
      <button class="btn btn-secondary btn-sm" onclick="printDiv('tableprint')">Print Order</button>      
      </div>
<div class="modal-body" id="modaldetail">



</div>

      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" onClick="location.href=location.href">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal: modalCart -->

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



  		function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
        }
        
        function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[6];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

</script>
