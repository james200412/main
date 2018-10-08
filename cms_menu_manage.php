<?php  
include 'db/dbconnect.php';
include 'cms_session.php';

 $query = "SELECT * FROM TBMENU ORDER BY id ASC";  
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
test
                            </strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
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
                <li class="active">
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
                <h3 align="center">Menu Management</h3>  
                <br />  
                <div class="table-responsive">  
                     <div>  
                          <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add Dish</button>  
                     </div>  
                     <br />  
                     <div id="usertable">  
                          <table class="table table-bordered">  
                          <thead>
                               <tr>  
                                    
                                    <th width="10%">ID</th>  
                                    <th width="10%">DISH IMAGE</th>
                                    <th width="10%">DISH NAME</th>                                    
                                    <th width="10%">PRICE</th>
                                    <th width="10%">TYPE</th>
                                    <th width="20%">DETAIL</th>
                                    <th width="10%">ACTIVATE</th>
                                    <th width="10%"></th>
                                    <th width="10%"></th>  
                               </tr>  
                               </thead>
                               <tbody>
                               <?php  
                               while($row = mysqli_fetch_array($result))  
                               {  
                               ?>  
                               <tr>  
                                    <td><?php echo $row["id"]; ?></td>                                    
                                    <td><img src="<?php echo img . '/' . $row["dimage"]; ?>" height="100" width="100"/></td>
                                    <td><?php echo $row["dname"]; ?></td> 
                                    <td><?php echo $row["dprice"]; ?></td> 
                                    <td><?php echo $row["dtype"]; ?></td>
                                    <td><?php echo $row["detail"]; ?></td>
                                    <td><?php if ($row["activate"] == 0){
                                      echo "No";
                                    }else {
                                      echo "Yes";
                                    }                                             
                                    ?>
                                    </td>  
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
                     <h4 class="modal-title">Menu</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="add_form" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">  
                          <label>Dish Name</label> 
                          <input type="text" name="name" id="name" class="form-control" required/>  
                          <br />  
                          <label>Price</label>  
                          <input type="text" name="price" id="price" class="form-control" required/>  
                          <br />                            
                          <label>Type</label>   
                          <select name="type" id="type" class="form-control" required>  
                               <option value="food">Food</option>  
                               <option value="drink">Drink</option>               
                          </select>  
                          <br />
                          <label>Enter Detail</label>  
                          <textarea name="detail" id="detail" class="form-control"></textarea>  
                          <br />                            
                          <label>Activate</label>   
                          <select name="activate" id="activate" class="form-control">  
                               <option value="0">No</option>  
                               <option value="1">Yes</option>               
                          </select>  
                          <br />


                          <label>Select image to upload</label>
                          <input type="file" name="fileToUpload" id="fileToUpload">


                          <br />
                          <input type="hidden" name="dishid" id="dishid" />

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


<?php
include 'cms/menu/insert.php';
?>

<script>
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  


      $(document).on('click', '.edit_data', function(){  
           var dishid = $(this).attr("id");  
           $.ajax({  
                url:"cms/menu/fetch.php",  
                method:"POST",  
                data: {dishid: dishid},
                dataType:"json",  
                success:function(data){
                     $('#dishid').val(data.id);                   
                     $('#name').val(data.dname);  
                     $('#image').val(data.dimage);  
                     $('#price').val(data.dprice);
                     $('#type').val(data.dtype);
                     $('#detail').val(data.detail);                                        
                     $('#activate').val(data.activate);
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  


      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#name').val() == "")  
           {  
                alert("Dish Name is required");  
           }  
           else if($('#image').val() == '')  
           {  
                alert("Image is required");  
           }

           else if($('#price').val() == '')  
           {  
                alert("Price is required");  
           }  
           else if($('#type').val() == '')  
           {  
                alert("Type is required");  
           }  
           else  
           {  
                $.ajax({  
                     url:"cms/menu/insert.php",  
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
                          $('#dishid').val("");
                         alert(data);
                          location.reload();  
                     }  
                });  
           }  
      });  

/*

      $(document).on('click', '.view_data', function(){  
           var dishid = $(this).attr("id");  
           if(dishid != '')  
           {  
                $.ajax({  
                     url:"cms/menu/select.php",  
                     method:"POST",  
                     data:{dishid:dishid},  
                     success:function(data){  
                          $('#userdetail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  */
 });  


$(document).on('click', '.delete_data', function(){
  var dishid = $(this).attr("id");
  var el = this;
  if(confirm("Are you sure you want to delete this?"))
  {
   $.ajax({
    url:"cms/menu/delete.php",
    method:"POST",
    data:{dishid:dishid},
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

