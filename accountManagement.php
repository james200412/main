<?php
   session_start();
   if (empty($_SESSION['user'])) {
        header("Location: homepage.php");
   }   
    else {
        include 'mysqli_connect.php';
        $userID = $_SESSION['user'];
        $query = "SELECT PRIVILEGEID FROM ACCOUNT WHERE USERID = '$userID'";
        $result = mysqli_query($dbc, $query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $privi = $row['PRIVILEGEID'];
            if ( $privi == 0) 
                header("Location: homepage.php");        
        }    
        mysqli_close($dbc);

   }
   
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>公大網上點餐 | OU Online Food Ordering - 帳戶管理 | Account Management</title>

<!--
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
-->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>

<!-- Custom Theme files -->


<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/stylenav.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/newscss.css">
<link href="css/clientcss.css" rel="stylesheet" type="text/css" />


<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lobster+Two:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

<!--Animation-->
<script src="js/wow.min.js"></script>
<link href="css/animate.css" rel='stylesheet' type='text/css' />
<script>
    new WOW().init();
</script>

<!-- data table -->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>  
		<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script> 
		<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script> 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
<!-- end of data table -->


<!--  Modal -->

  
  

<script src="js/simpleCart.min.js"> </script>	
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
				});
			});
</script>

        <script>
            $(document).ready(function () {
                $('#acoountData').DataTable();
                $("#edit").hide();
                $("#delete").hide();
            })
        </script>

<!-- end of animation -->
<!-- css -->
<style>
.header-right{
	z-index: 0;
}
.container{
	z-index: 2;
}

.slider {
	width: 500px;
	margin: 2em auto;
	
}

.slider-wrapper {
	width: 100%;
	height: 300px;
	position: relative;
}

.slide {
	float: left;
	position: absolute;
	width: 100%;
	height: 100%;
	opacity: 0;
	transition: opacity 3s linear;
}

.slider-wrapper > .slide:first-child {
	opacity: 1;
}
</style>
<!-- end of css -->

</head>
<body>
    <!-- header-section-starts -->

<?php 
include 'include_page/admin_topmenu.php';
?>

	<!-- header-section-ends -->
	<!-- content-section-starts -->
<h1 class="manage" style="padding-top:50px;">帳戶管理</h1>		
    



    <!--  modal because of datatable js and bootstrap js  -->
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">帳號管理訊息</h4>
        </div>
        <div class="modal-body">
          <p id="message">
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">關閉視窗</button>
        </div>
      </div>
      
    </div>
  </div>
  
  

<div class="form_div">
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
    <div class="form-group">
        <label for="userID" class="control-label col-sm-4">用戶編號:</label> 
        <div class="col-sm-8">
            <input type="text" class="form-control"  name="userID" id="userID" placeholder="" required="">
        </div>
    </div>
    <div class="form-group">
        <label for="userName" class="control-label col-sm-4">用戶姓名:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="userName" id="userName" placeholder="">
        </div>
    </div>
    <div class="form-group">
        <label for="userPassword" class="control-label col-sm-4">密碼:</label>
        <div class="col-sm-8">
            <input type="password" class="form-control" name="userPassword" id="userPassword" placeholder="" required="">
        </div>
    </div>    
    <div class="form-group">
        <label for="email" class="control-label col-sm-4">電子郵件:</label>
        <div class="col-sm-8">
            <input type="email" class="form-control" name="email" id="email" placeholder="" required="">
        </div>
    </div>
    <div class="form-group">
        <label for="tel" class="control-label col-sm-4">電話:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="tel" id="tel" placeholder="">
        </div>
    </div>    
    <div class="form-group">
        <label for="amount" class="control-label col-sm-4">資產:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="amount" id="amount" placeholder="">
        </div>
    </div>
    <div class="form-group">
        <label for="point" class="control-label col-sm-4">積分:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="point" id="point" placeholder="">
        </div>
    </div>
    <div class="form-group">
        <label for="privilegeid" class="control-label col-sm-4">權限:</label> 
        <div class="col-sm-8">
        <select id="privilegeid" name="privilegeid" class="form-control">
          <!--  <option selected value="" name="privilegeid" disabled>請選擇</option>  -->
            <option selected value="顧客">顧客</option>
            <?php 
                if ($privi == 2) {
            ?>
            <option value="員工">員工</option>
            <option value="管理員">管理員</option>  
            <?php
                }
            ?>
        </select> 
        </div>
    </div>
    <div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <input type="submit"  class="btn btn-default" value="新增"  name="submit" id="add" data-toggle="modal" data-target="#myModal">
        <input type="submit"  class="btn btn-default" value="搜尋"  name="submit" id="search">
        <input type="submit"  class="btn btn-default" value="修改"  name="submit" id="edit">
        <input type="submit"  class="btn btn-default" value="刪除"  name="submit" id="delete">
    </div>
    </div>
</form>    	
</div>

<div style="text-align:center; color: red; font-weight:bolder; font-size:20px;">
<?php

if (isset($_POST['submit'])) {
   
    include 'mysqli_connect.php';
    if ($_POST['submit'] == "新增") {   
        $query = "INSERT INTO ACCOUNT SET USERID='$_POST[userID]', NAME='$_POST[userName]', AMOUNT = '$_POST[amount]', POINTS='$_POST[point]',
                    EMAIL='$_POST[email]', TELEPHONE='$_POST[tel]', PRIVILEGEID='$_POST[privilegeid]', PASSWORD='$_POST[userPassword]'";

        if (mysqli_query($dbc, $query)) {
            echo '成功加入新用戶';
            //echo "<script>$(document).ready(function() {" . "$('#message').html(\"成功加入新用戶\");})</script>";
        }  else {
            echo '加入新用戶失敗';
            //echo "<script>$(document).ready(function() {" . "$('#message').html(\"加入新用戶失敗\");})</script>";
        }
    }

 
    if ($_POST['submit'] == "搜尋") {
        $userID = $_POST['userID'];
        $query = "SELECT * FROM ACCOUNT WHERE USERID = '$userID'";
        $result = mysqli_query($dbc, $query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            echo "<script>$(document).ready(function() {" . "$('#userID').val(\"" . $row['USERID'] . "\");})</script>";
            echo "<script>$(document).ready(function() {" . "$('#userName').val(\"" . $row['NAME'] . "\");})</script>";
            echo "<script>$(document).ready(function() {" . "$('#userPassword').val(\"" . $row['PASSWORD'] . "\");})</script>";
            echo "<script>$(document).ready(function() {" . "$('#email').val(\"" . $row['EMAIL'] . "\");})</script>";
            echo "<script>$(document).ready(function() {" . "$('#tel').val(\"" . $row['TELEPHONE'] . "\");})</script>";
            echo "<script>$(document).ready(function() {" . "$('#amount').val(\"" . $row['AMOUNT'] . "\");})</script>";
            echo "<script>$(document).ready(function() {" . "$('#point').val(\"" . $row['POINTS'] . "\");})</script>";
            if ($row['PRIVILEGEID'] == 2) 
                echo "<script>$(document).ready(function() {" . "$('#privilegeid').val(\"管理員\");})</script>";
            else if ($row['PRIVILEGEID'] == 1) 
                echo "<script>$(document).ready(function() {" . "$('#privilegeid').val(\"員工\");})</script>";  
            else
                echo "<script>$(document).ready(function() {" . "$('#privilegeid').val(\"顧客\");})</script>";  
            echo "<script>$(document).ready(function() {" . "$('#edit').toggle();})</script>";
            echo "<script>$(document).ready(function() {" . "$('#delete').toggle();})</script>";
            //basename($_FILES["fileToUpload"]["name"]) = $row['DISHIMAGE'];  //test  
            $target_file = $target_dir . $row['DISHIMAGE'];
        } else {
            echo '沒有配對的用戶 ' . mysqli_error($dbc);
        }
    }

    if ($_POST['submit'] == "修改") {
        $userID = $_POST['userID'];
        $right = $_POST['privilegeid'];
        if ($right == "管理員") {
            $r = 2;
        }   else if ($right == "員工") {
            $r = 1;
        }   else {
            $r = 0;
        }
        
        $query = "UPDATE ACCOUNT SET NAME='$_POST[userName]', AMOUNT = '$_POST[amount]', POINTS='$_POST[point]',
                    EMAIL='$_POST[email]', TELEPHONE='$_POST[tel]', PRIVILEGEID=$r, PASSWORD='$_POST[userPassword]' WHERE USERID = '$userID'";
        if (mysqli_query($dbc, $query)) {
            echo '成功更改用戶資料';
        }  else {
            echo '更改用戶資料失敗';
        }        
    }

    if ($_POST['submit'] == "刪除") {
        $userID = $_POST['userID'];
        $query = "DELETE FROM ACCOUNT WHERE USERID = '$userID'";
        $result = mysqli_query($dbc, $query);
        if ($result) {
            echo '成功刪除用戶';
        }  else {
            echo '刪除用戶失敗';
        }
        
    }
     
    mysqli_close($dbc);
   
}

?>          
</div>

<div class="data_table">
<table id="acoountData" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>用戶編號</th>
                <th>用戶姓名</th>
                <th>帳號資產</th>
                <th>帳號積分</th>
                <th>電子郵件</th>
                <th>權限</th>
            </tr>
        </thead>
        <!--
        <tfoot>
            <tr>
                <th>用戶編號</th>
                <th>用戶姓名</th>
                <th>帳號資產</th>
                <th>帳號積分</th>
                <th>電子郵件</th>
                <th>權限</th>
            </tr>
        </tfoot>
        -->
        <tbody>       
    			<?php              
					include './mysqli_connect.php';
                    
                    $query = "SELECT * FROM ACCOUNT WHERE PRIVILEGEID = 0";
                    if ($privi == 2) 
					    $query = "SELECT * FROM ACCOUNT";                    
					$result = mysqli_query($dbc, $query);
					if ($result) {
						while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            $position = "";
							echo '<td>' . $row['USERID'] . '</td>';
							echo '<td>' . $row['NAME'] . '</td>';
							echo '<td>' . $row['AMOUNT'] . '</td>';
							echo '<td>' . $row['POINTS'] . '</td>';
							echo '<td>' . $row['EMAIL'] . '</td>';
    						    if ($row['PRIVILEGEID'] == 2)
                                    echo '<td>管理員</td>';
							    else if  ($row['PRIVILEGEID'] == 1) 
                                    echo '<td>員工</td>';
						    	else
                                    echo '<td>顧客</td>';
                            
							//echo '<td>' . $row['PRIVILEGEID'] . '</td>';
                            echo '</tr>';
						}
					}
                
				?>
        
		</tbody>
</table>
</div>



<!-- footer -->
<?php  
include 'include_page/admin_footer.php';
?>
<!-- footer end -->
</body>
</html>		