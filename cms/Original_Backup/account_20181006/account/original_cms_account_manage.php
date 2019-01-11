<?php  
 include 'db/dbconnect.php';
 $query = "SELECT * FROM TBUSER ORDER BY id DESC";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>SC & FOOD | Content Management Systems</title>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<!-- DataTables -->
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

  
  
      </head>  
      <body>  
 

          <br /><br />
           <div class="container" style="width:1000px;">  
                <h3 align="center">Content Management Systems | Account Management</h3>  
                <br />  
                <div class="table-responsive">  
                     <div>  
                          <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add User Account</button>  
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
                          <input type="text" name="email" id="email" class="form-control" />  
                          <br />                            
                          <label>Enter Phone Number</label>  
                          <input type="text" name="phone" id="phone" size="8" maxlength="8" class="form-control" />  
                          <br />
                          <label>Enter Password</label>  
                          <input type="text" name="password" size="20" maxlength="20" id="password" class="form-control" />  
                          <br />  
                          <label>Select User Level</label>  
                          <select name="level" id="level" class="form-control">  
                               <option value="2">Admin</option>  
                               <option value="1">Staff</option>
                               <option value="0">Customer</option>    
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
