<?php  
include 'cms_session.php';
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
  <h1 class="manage">Menu Manage</h1>	


<div class="form_div">
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
    <div class="form-group">
        <label for="dishID" class="control-label col-sm-4">ID:</label> 
        <div class="col-sm-8"  id="dID">
            <input type="text" class="form-control"  name="dishID" id="dishID" placeholder="" required="">
        </div>
    </div>
    <div class="form-group">
        <label for="dishName" class="control-label col-sm-4">DISH NAME:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="dishName" id="dishName" placeholder="">
        </div>
    </div>
    <div class="form-group">
        <label for="price" class="control-label col-sm-4">PRICE:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="price" id="price" placeholder="">
        </div>
    </div>
    <div class="form-group">
        <label for="dishType" class="control-label col-sm-4">TYPE:</label>
        <div class="col-sm-8">
        <select class="form-control" id="dishType" name="dishType" >
            <option selected value=""  name="dishType" disabled>SELECT</option>
            <option value="food">FOOD</option>
            <option value="drink">DRINK</option>                        
        </select> 
        </div>
    </div>
    <div class="form-group">
        <label for="detail" class="control-label col-sm-4">DETAIL:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="detail" id="detail" placeholder="">
        </div>
    </div>
    <div class="form-group">
        <label for="activate" class="control-label col-sm-4">ACTIVATE:</label>
        <div class="col-sm-8">
        <select class="form-control" id="activate" name="activate" >
            <option selected value=""  name="activate" disabled>SELECT</option>
            <option value="0">NO</option>
            <option value="1">YES</option>                        
        </select> 
        </div>
    </div>  
 

    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            <input type="file" name="fileToUpload" id="fileToUpload">
        </div>
    </div>
    <div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <input type="submit"  class="btn btn-success" value="ADD"  name="submit" id="add">
       <!-- <input type="submit"  class="btn btn-success" value="SEARCH"  name="submit" id="search">-->
        <input type="submit"  class="btn btn-success" value="EDIT"  name="submit" id="edit">
        <input type="submit"  class="btn btn-success" value="DELETE"  name="submit" id="delete">
    </div>
    </div>
</form>		
</div>

<div style="text-align:center; color: red; font-weight:bolder; font-size:20px;">
<?php
$target_dir = "img/menu/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

if ($_POST['submit']) {
    if ($_POST['submit'] == "ADD") {
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".<br>";
            $uploadOk = 1;
        } else {
            echo 'File are not image';
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo 'File Exist, Please Rename and Upload again';
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo 'File Too Large';
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo 'Only accept image file (JPG, JPEG, PNG & GIF)';
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo 'Upload Failed';
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                // echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.<br>";
                //.......................................................      
                //.......................................................   
                include 'db/dbconnect.php';

                $dishImage = basename($_FILES["fileToUpload"]["name"]);

                $query = "insert into TBMENU set id='$_POST[dishID]', dname='$_POST[dishName]', dprice='$_POST[price]', "
                        . "dtype='$_POST[dishType]', detail='$_POST[detail]', activate='$_POST[activate]', dimage='$dishImage'";

                if (mysqli_query($connect, $query)) {
                    echo 'Product Add success';
                } else {
                    echo 'Error ' . mysqli_error($connect);
                }
            } else {
                echo "Upload Failed";
            }
        }
        mysqli_close($connect);
    }


    /*
    if ($_POST['submit'] == "search") {
        include 'db/dbconnect.php';
        $dishName = $_POST['dishName'];
        $query = "SELECT * FROM TBMENU WHERE dname = '$dishName'";
        $result = mysqli_query($connect, $query);
        if ($result) {
            $roW = mysqli_fetch_assoc($result);

            echo $row;
            echo "<script>$(document).ready(function() {" . "$('#dishID').val(\"" . $row['id'] . "\");})</script>";
            echo "<script>$(document).ready(function() {" . "$('#dishName').val(\"" . $row['dname'] . "\");})</script>";
            echo "<script>$(document).ready(function() {" . "$('#dishType').val(\"" . $row['dtype'] . "\");})</script>";
            echo "<script>$(document).ready(function() {" . "$('#price').val(\"" . $row['dprice'] . "\");})</script>";
            echo "<script>$(document).ready(function() {" . "$('#detail').val(\"" . $row['detail'] . "\");})</script>";
            echo "<script>$(document).ready(function() {" . "$('#activate').val(\"" . $row['activate'] . "\");})</script>";
            echo "<script>$(document).ready(function() {" . "$('#edit').toggle();})</script>";
            echo "<script>$(document).ready(function() {" . "$('#delete').toggle();})</script>";
            $target_file = $target_dir . $row['dimage'];
        
        } else {
            echo '沒有配對的產品 ' . mysqli_error($connect);
        }
        mysqli_close($connect);
    }*/

    if ($_POST['submit'] == "EDIT") {
        include 'db/dbconnect.php';
        $dishImage = basename($_FILES["fileToUpload"]["name"]);

        $query = "UPDATE TBMENU set id='$_POST[dishID]', dname='$_POST[dishName]', dprice='$_POST[price]', "
                . "dtype='$_POST[dishType]', detail='$_POST[detail]', activate='$_POST[activate]', 
                WHERE dname='$_POST[dishName]'"; //exclude , DISHIMAGE='$dishImage'
        if (mysqli_query($connect, $query)) {
            echo 'EDIT COMPLETE';
        } else {
            echo 'ERROR' . mysqli_error($connect);
        }
        mysqli_close($connect);
    }

    

    if ($_POST['submit'] == "DELETE") {
        include 'db/dbconnect.php';
        $query1 = "SELECT dimage FROM TBMENU WHERE id = $_POST[dishID]";
        $result1 = mysqli_query($connect, $query1);
        $row1 = mysqli_fetch_assoc($result1);
        $data = $row1['dimage'];

        $query = "DELETE FROM TBMENU WHERE id = $_POST[dishID]";
        if (mysqli_query($connect, $query)) {
            echo 'DELETE SUCCESS';          
            $dirHandle = opendir("img/menu/");
            while ($file = readdir($dirHandle)) {
                if ($file == $data) {
                    unlink("img/menu/" . $file);
                }
            }
        } else {
            echo 'Error' . mysqli_error($connect);
        }
        mysqli_close($connect);
    }
}
?>
</div>

<div class="data_table">
<table id="productData" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>DISH NAME</th>
                <th>PRICE</th>
                <th>TYPE</th>
                <th>DETAIL</th>
                <th>ACTIVATE</th>              
            </tr>
        </thead>

        <tbody>       
        		<?php              
					include 'db/dbconnect.php';
					$query = "SELECT * FROM TBMENU";
					$result = mysqli_query($connect, $query);
					if ($result) {
						while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            $position = "";
							echo '<td>' . $row['id'] . '</td>';
							echo '<td>' . $row['dname'] . '</td>';
							echo '<td>' . $row['dprice'] . '</td>';
							echo '<td>' . $row['dtype'] . '</td>';
							echo '<td>' . $row['detail'] . '</td>';
    						echo '<td>' . $row['activate'] . '</td>';
                            echo '</tr>';
						}
					}
                
				?>
        
		</tbody>
</table>
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



  <script>
  	$( "#productData" ).DataTable({
        bPaginate: true,
bLengthChange: false,
bFilter: false,
bSort: false, 
bInfo: false,
bAutoWidth: false,
pageLength: 10  
  	});
  </script>
