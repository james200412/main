<?php  
include 'cms_session.php';
include 'db/dbconnect.php';
 $query = "SELECT TBMENU.*, TBMENUTYPE.dtname FROM TBMENU JOIN TBMENUTYPE ON TBMENUTYPE.id = TBMENU.dtype ORDER BY TBMENU.id ASC";  
 $result = mysqli_query($connect, $query);  

 $querydt = "SELECT * FROM TBMENUTYPE ORDER BY id ASC";  
 $resultdt = mysqli_query($connect, $querydt);  

 $querydt1 = "SELECT * FROM TBMENUTYPE ORDER BY id ASC";  
 $resultdt1 = mysqli_query($connect, $querydt1);  
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
           <h1 class="manage">Menu</h1>
                <br />  
                <div class="">  
                     <div>  
                          <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-success">Add Menu</button>  
                     </div>  
                     <br />  
                     <div id="usertable">  
                          <table class="table table-bordered">  
                          <thead>
                               <tr>  
                                    <th width="5%">DISH ID</th>  
                                    <th width="15%">DISH IMAGE</th>
                                    <th width="10%">DISH NAME</th>
                                    <th width="10%">DISH PRICE</th>
                                    <th width="10%">DISH TYPE</th>
                                    <th width="30%">DETAIL</th>
                                    <th width="10%">ACTIVATE</th>
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
                                    <td>


                                    <img class="img-thumbnail" src="<?php echo $row["dimage"]; ?>" />
                                    
                                    
                                    
                                    </td> 
                                    <td><?php echo $row["dname"]; ?></td> 
                                    <td>$<?php echo $row["dprice"]; ?></td> 
                                    <td><?php echo $row["dtname"]; ?></td> 
                                    <td><?php echo $row["detail"]; ?></td>
                                    <td><?php if ($row["activate"] == 0){
                                      echo "No";
                                    }  else{
                                      echo "Yes";
                                    }                              
                                    ?>
                                    </td>
                                    <td><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" /></td>  
  <!-- <td><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" /></td> -->
  <!-- <td><input type="button" name="delete" value="delete" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs delete_data" /></td> 
                               -->
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
                     <form method="post" action="cms/menu/insert.php" enctype="multipart/form-data">  
                          <label>Enter Name</label> 
                          <input type="text" name="adname" id="adname" class="form-control" required/>  
                          <br />  
                          <label>Detail</label>  
                          <textarea name="adetail" id="adetail" class="form-control" required></textarea>  
                          <br />  

                          <label>TYPE</label>  
                           <select name="atype" id="atype" class="form-control" required>  
<?php  while($rowdt = mysqli_fetch_array($resultdt))  
                               {  ?>
                                   
<option value="<?php echo $rowdt['id'];?>"><?php echo $rowdt['dtname'];?></option> 
<?php
                              }
                          ?>
                          </select> 
                         
                          <br />                            
                          <label>Enter Price</label>  
                          <input type="text" name="adprice" id="adprice" size="8" maxlength="8" class="form-control" required/>  
                          <br />
                          <label>Activate</label>  
                          <select name="activate1" id="activate1" class="form-control" required>  
                               <option value="0">NO</option>  
                               <option value="1">YES</option>
                          </select>  
                          <br />  

                         <label>Select image to upload:</label>
                          <input type="file" name="aimage" id="aimage" required>
                          <br />  

                          <input type="hidden" name="dishid" id="dishid" />
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
                     <form method="post" action="cms/menu/update.php" enctype="multipart/form-data">
                          <label>Enter Name</label> 
                          <input type="text" name="edname" id="edname" class="form-control" />  
                          <br />  
                          <label>Detail</label>  
                          <textarea name="edetail" id="edetail" class="form-control"></textarea>  
                          <br />  
                          <label>TYPE</label>  
                          <select name="etype" id="etype" class="form-control">  
<?php  while($rowdt1 = mysqli_fetch_array($resultdt1))  
                               {  ?>
                                   
<option value="<?php echo $rowdt1['id'];?>"><?php echo $rowdt1['dtname'];?></option> 
<?php
                              }
                          ?>
                          </select>  
                          <br />                            
                          <label>Enter Price</label>  
                          <input type="text" name="edprice" id="edprice" size="8" maxlength="8" class="form-control" />  
                          <br />
                          <label>Activate</label>  
                          <select name="eactivate" id="eactivate" class="form-control">  
                               <option value="0">NO</option>  
                               <option value="1">YES</option>
                          </select>  
                          <br />  

                         <label>Select image to upload:</label>
                          <input type="file" name="eimage" id="eimage">
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
                url:"cms/menu/fetch.php",  
                method:"POST",  
                data:{dishid1:dishid1},  
                dataType:"json",  
                success:function(data){
                    
                     $('#dishid1').val(data.id);                   
                     $('#edname').val(data.dname);  
                     $('#edetail').val(data.detail);  
                     $('#etype').val(data.dtype);
                     $('#edprice').val(data.dprice);
                     $('#eactivate').val(data.activate); 
                                         
                     $('#edit_data_Modal').modal('show');  
                }  
           });  
      });  



/*ajax delete*/

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
