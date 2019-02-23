<?php  
include 'cms_session.php';
include 'db/dbconnect.php';
 $query = "SELECT * FROM TBMENUTYPE ORDER BY id ASC";  
 $result = mysqli_query($connect, $query);  
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
                    <div class="text-Left m-t-lg">

                    
  <!--start-->
  <div class="container" style="width:100%;">
           <h1 class="manage">Dish Type</h1>
                <br />  
                <div class="">  
                     <div>  
                          <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-success">Add Type</button>  
                     </div>  
                     <br />  
                     <div id="usertable">  
                          <table class="table table-bordered">  
                          <thead>
                               <tr>  
                                    <th width="5%">TYPE ID</th>  
                                    <th width="15%">TYPE NAME</th>
                                    <th width="10%">DISPLAY?</th>
                                    <th width="5%"></th>
                                    <!--<th width="5%"></th>  -->
                               </tr>  
                               </thead>
                               <tbody>
                               <?php  
                               while($row = mysqli_fetch_array($result))  
                               {  
                               ?>  
                               <tr>  
                                    <td>#<?php echo $row["id"]; ?></td> 
                                    <td><?php echo $row["dtname"]; ?></td> 
                                    <td><?php if ($row["activate"] == 0){
                                      echo "No";
                                    }  else{
                                      echo "Yes";
                                    }                              
                                    ?>
                                    </td>
                                    <td><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" /></td>  

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
<script src="js/plugins/dataTables/datatables.min.js"></script>
<script src="js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>


<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

</body>
</html>





<!-- call form -->


<!-- Add Form-->


<div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">ADD Form</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" action="cms/menutype/insert.php" enctype="multipart/form-data">  
                          <label>Type Name</label> 
                          <input type="text" name="adname" id="adname" class="form-control" required/>  
                          <br />                             
                          <label>Display?</label>  
                          <select name="activate1" id="activate1" class="form-control" required>  
                               <option value="0">NO</option>  
                               <option value="1">YES</option>
                          </select>  
                          <br /> 
                          <input type="submit" name="insert" id="insert" value="insert" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div> 
<!-- End Add Form-->






<!-- Edit Form-->

<div id="edit_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Edit</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" action="cms/menutype/update.php" enctype="multipart/form-data">
                          <label>Enter Name</label> 
                          <input type="text" name="edname" id="edname" class="form-control" />  
                          <br />  
                          <label>Display?</label>  
                          <select name="eactivate" id="eactivate" class="form-control">  
                               <option value="0">NO</option>  
                               <option value="1">YES</option>
                          </select>  
                          <br />  
                          <input type="hidden" name="dishid1" id="dishid1"/>
                          <input type="submit" name="update" id="update" value="Update" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div> 
<!-- End Edit Form-->



<!-- call form end-->


<script>


/*ajax fetch data to edit form*/
      $(document).on('click', '.edit_data', function(){  
           var dishid1 = $(this).attr("id");  
           $.ajax({  
                url:"cms/menutype/fetch.php",  
                method:"POST",  
                data:{dishid1:dishid1},  
                dataType:"json",  
                success:function(data){
                    
                     $('#dishid1').val(data.id);                   
                     $('#edname').val(data.dtname);  
                     $('#edetail').val(data.dtdetail);  
                     $('#eactivate').val(data.activate); 
                                         
                     $('#edit_data_Modal').modal('show');  
                }  
           });  
      });  
 


  	$( ".table" ).DataTable({
        bPaginate: true,
bLengthChange: false,
bFilter: false,
bSort: false, 
bInfo: false,
bAutoWidth: false,
pageLength: 10  
  	});
  </script>
