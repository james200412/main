<?php  
include 'cms_session.php';
include 'db/dbconnect.php';
 $query = "SELECT * FROM TBUSER ORDER BY id DESC";  
 $result = mysqli_query($connect, $query);  
 ?>  
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Content Management Systems</title>
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
                <li class="active">
                    <a href="cms_account_manage.php"><i class="fa fa-th-large"></i> <span class="nav-label">Account Management</span> </a>
                </li>
                <li>
                    <a href="cms_menu_manage.php"><i class="fa fa-th-large"></i> <span class="nav-label">Menu Management</span> </a>
                </li>
                <li>
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
                   <!-- <form role="search" class="navbar-form-custom" method="post" action="#">
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
                    <div class="text-Left m-t-lg">

                    
  <!--start-->
           <div class="container" style="width:100%;">
           <h1 class="manage">Account Management</h1>
                <br />  
                <div class="table-responsive">  
                     <div>  
                          <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-success">Add User Account</button>  
                     </div>  
                     <br />  
                     <div id="usertable">  
                          <table class="table table-bordered">  
                          <thead>
                               <tr>  
                                    
                                    <th width="10%">USER ID</th>  
                                    <th width="10%">NAME</th>
                                    <th width="20%">ADDRESS</th>
                                    <th width="10%">EMAIL</th>
                                    <th width="10%">PHONE</th>
                                    <th width="10%">USER LEVEL</th>
                                    <th width="5%"></th>
                                    <th width="5%"></th>  
                               </tr>  
                               </thead>
                               <tbody>
                               <?php  
                               while($row = mysqli_fetch_array($result))  
                               {  
                               ?>  
                               <tr>  
                                    <td><?php echo $row["id"]; ?></td> 
                                    <td><?php echo $row["uname"]; ?></td> 
                                    <td><?php echo $row["uaddress"]; ?></td> 
                                    <td><?php echo $row["uemail"]; ?></td> 
                                    <td><?php echo $row["uphone"]; ?></td> 
                                    <td><?php if ($row["ulevel"] == 2){
                                      echo "Admin";
                                    }  else if($row["ulevel"] == 1){
                                      echo "Staff";
                                    }else{
                                      echo "Customer";
                                    }                              
                                    ?>
                                    </td>
                                    <td><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" /></td>  
  <!-- <td><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" /></td> -->
                                    <td><input type="button" name="delete" value="delete" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs delete_data" /></td> 
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
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2017
            </div>
        </div>

    </div>
</div>

<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="js/plugins/dataTables/datatables.min.js"></script>
<script src="js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>


<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

</body>
</html>




<!-- call form -->


  <!-- Add Form & Edit Form-->
 <!--<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">User Details</h4>  
                </div>  
                <div class="modal-body" id="userdetail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  -->


 <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Account</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                          <label>Enter User Name</label> 
                          <input type="text" name="name" id="name" class="form-control" />  
                          <br />  
                          <label>Enter Address</label>  
                          <textarea name="address" id="address" class="form-control"></textarea>  
                          <br />  
                          <label>Enter Email</label>  
                          <input type="email" name="email" id="email" class="form-control" />  
                          <br />                            
                          <label>Enter Phone Number</label>  
                          <input type="text" name="phone" id="phone" size="8" maxlength="8" class="form-control" />  
                          <br />
                          <label>Enter Password</label>  
                          <input type="password" name="password" size="20" maxlength="20" id="password" class="form-control" />  
                          <br />  
                          <label>Select User Level</label>  
                          <select name="level" id="level" class="form-control">  
                               <option value="0">Customer</option>  
                               <option value="1">Staff</option>
                               <option value="2">Admin</option>    
                          </select>  
                          <br />  
                          <input type="hidden" name="userid" id="userid" />

                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div> 
<!-- End Add Form and Edit Form-->


<!-- call form end-->

<script>
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  


      $(document).on('click', '.edit_data', function(){  
           var userid = $(this).attr("id");  
           $.ajax({  
                url:"cms/account/fetch.php",  
                method:"POST",  
                data:{userid:userid},  
                dataType:"json",  
                success:function(data){
                     $('#userid').val(data.id);                   
                     $('#name').val(data.uname);  
                     $('#address').val(data.uaddress);  
                     $('#email').val(data.uemail);
                     $('#phone').val(data.uphone);
                     $('#level').val(data.ulevel);                                        
                     $('#password').val(data.upassword); 
                                         
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  


      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#name').val() == "")  
           {  
                alert("Name is required");  
           }  
           else if($('#address').val() == '')  
           {  
                alert("Address is required");  
           }

           else if($('#email').val() == '')  
           {  
                alert("Email is required");  
           }  
           else if($('#password').val() == '')  
           {  
                alert("Password is required");  
           }  
           else  
           {  
                $.ajax({  
                     url:"cms/account/insert.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(), 

/*
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  */

                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                         /* $('#usertable').html(data);*/
                          $('#userid').val("");
                          location.reload();  
                     }  
                });  
           }  
      });  

/*

      $(document).on('click', '.view_data', function(){  
           var userid = $(this).attr("id");  
           if(userid != '')  
           {  
                $.ajax({  
                     url:"cms/account/select.php",  
                     method:"POST",  
                     data:{userid:userid},  
                     success:function(data){  
                          $('#userdetail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  */
 });  


$(document).on('click', '.delete_data', function(){
  var userid = $(this).attr("id");
  var el = this;
  if(confirm("Are you sure you want to delete this?"))
  {
   $.ajax({
    url:"cms/account/delete.php",
    method:"POST",
    data:{userid:userid},
    success:function(data)
    {
     $(el).closest('tr').css('background','#de6f6c');
    $(el).closest('tr').fadeOut(800, function(){ 
     $(this).remove();
    });

    }
   });
  }
  else
  {
   return false; 
  }
 });
 
   	$( ".table" ).DataTable({
bPaginate: true,
bLengthChange: false,
bFilter: true,
bSort: false, 
bInfo: false,
bAutoWidth: false,
pageLength: 10
  	});

</script>
