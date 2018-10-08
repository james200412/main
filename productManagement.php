<?php
   session_start();
   if (empty($_SESSION['user'])) {
        header("Location: homepage.php");
   }   
    else {
        include 'mysqli_connect.php';
        $userID = $_SESSION['user'];
        $query = "SELECT PRIVILEGEID FROM ACCOUNT WHERE USERID = '$userID'";
        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $privi = $row['PRIVILEGEID'];
            if ( $privi == 0) 
                header("Location: homepage.php");        
        }    
        mysqli_close($connect);

   }
   
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>公大網上點餐 | OU Online Food Ordering - 食品管理 | Product Management</title>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />

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
                $("#edit").hide();
                $("#delete").hide();

                $("#dishID").click(function () {
                    $.ajax({
                        type: "POST",
                        url: "ajax_getdishID.php",
                        //data:dataString,
                        cache: false,
                        success: function (html) {
                            $("#dID").html(html);
                            $("#dishName").focus();
                        }
                    });
                });
                
                $('#productData').DataTable();

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
<h1 class="manage" style="padding-top:50px;">食品管理</h1>	


<div class="form_div">
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
    <div class="form-group">
        <label for="dishID" class="control-label col-sm-4">產品編號:</label> 
        <div class="col-sm-8"  id="dID">
            <input type="text" class="form-control"  name="dishID" id="dishID" placeholder="" required="">
        </div>
    </div>
    <div class="form-group">
        <label for="dishName" class="control-label col-sm-4">名稱:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="dishName" id="dishName" placeholder="">
        </div>
    </div>
    <div class="form-group">
        <label for="price" class="control-label col-sm-4">單價:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="price" id="price" placeholder="">
        </div>
    </div>
    <div class="form-group">
        <label for="dishType" class="control-label col-sm-4">類別:</label>
        <div class="col-sm-8">
        <select class="form-control" id="dishType" name="dishType" >
            <option selected value=""  name="dishType" disabled>請選擇</option>
            <option value="板燒雞扒早餐">板燒雞扒早餐</option>
            <option value="皇牌粉麵">皇牌粉麵</option>
            <option value="鮮油餐包">鮮油餐包</option>
            <option value="南冰魚柳早餐">南冰魚柳早餐</option>
            <option value="有營早餐">有營早餐</option>
            <option value="多士套餐">多士套餐</option>
            <option value="時菜雙併湯粉">時菜雙併湯粉</option>
            <option value="加配">加配</option>
            <option value="窩心熱飲">窩心熱飲</option>
            <option value="燒味一哥">燒味一哥</option>
            <option value="日日滋味">日日滋味</option>
            <option value="100分皇牌">100分皇牌</option>    
            <option value="是日特餐">是日特餐</option>
            <option value="香濃咖喱">香濃咖喱</option>
            <option value="兩餸套飯">兩餸套飯</option>
            <option value="特色扒餐">特色扒餐</option>
            <option value="有機燕麥蒸飯">有機燕麥蒸飯</option>
            <option value="美味滋選">美味滋選</option> 
            <option value="健康之選">健康之選</option>
            <option value="天天超值午餐">天天超值午餐</option>
            <option value="飲品">飲品</option>
            <option value="是日靚湯">是日靚湯</option>                          
        </select> 
        </div>
    </div>
    <div class="form-group">
        <label for="meat" class="control-label col-sm-4">肉:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="meat" id="meat" placeholder="">
        </div>
    </div>
    <div class="form-group">
        <label for="veg" class="control-label col-sm-4">菜:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="veg" id="veg" placeholder="">
        </div>
    </div>
    <div class="form-group">
        <label for="rating" class="control-label col-sm-4">評分(5最高):</label> 
        <div class="col-sm-8">
        <select id="rating" name="rating" class="form-control">
            <option selected value="" name="rating" disabled>請選擇</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>                  
        </select> 
        </div>
    </div>
    <div class="form-group">
        <label for="cookingtime" class="control-label col-sm-4">烹煮所需時間:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control"  name="cookingtime" id="cookingtime" placeholder="">
        </div>
    </div> 
    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
            <input type="file" name="fileToUpload" id="fileToUpload">
        </div>
    </div>
    <div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <input type="submit"  class="btn btn-default" value="新增"  name="submit" id="add">
        <input type="submit"  class="btn btn-default" value="搜尋"  name="submit" id="search">
        <input type="submit"  class="btn btn-default" value="修改"  name="submit" id="edit">
        <input type="submit"  class="btn btn-default" value="刪除"  name="submit" id="delete">
    </div>
    </div>
</form>		
</div>

<div style="text-align:center; color: red; font-weight:bolder; font-size:20px;">
<?php
$target_dir = "images/menu/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

if ($_POST['submit']) {
    if ($_POST['submit'] == "新增") {
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".<br>";
            $uploadOk = 1;
        } else {
            echo '文件不是圖片 ';
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo '文件已經存在 ';
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo '文件太大，無法上載 ';
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo '上載文件只可以接受JPG, JPEG, PNG & GIF格式 ';
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo '文件上載失敗 ';
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                // echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.<br>";
                //.......................................................      
                //.......................................................   
                include 'mysqli_connect.php';

                $dishImage = basename($_FILES["fileToUpload"]["name"]);

                $query = "insert into MENU set DISHID='$_POST[dishID]', DISHNAME='$_POST[dishName]', PRICE='$_POST[price]', "
                        . "DISHTYPE='$_POST[dishType]', MEAT='$_POST[meat]', VEGGI='$_POST[veg]', RATING='$_POST[rating]', "
                        . "COOKINGTIME='$_POST[cookingtime]', DISHIMAGE='$dishImage'";

                if (mysqli_query($connect, $query)) {
                    echo '成功增加新產品 ';
                } else {
                    echo '錯誤 ' . mysqli_error($connect);
                }
            } else {
                echo "文件上載失敗 ";
            }
        }
        mysqli_close($connect);
    }

    if ($_POST['submit'] == "搜尋") {
        include 'mysqli_connect.php';
        $dishName = $_POST['dishName'];
        $query = "SELECT * FROM MENU WHERE DISHNAME = '$dishName'";
        $result = mysqli_query($connect, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $rating = $row['RATING'];
            //echo $row['DISHID'];
            echo "<script>$(document).ready(function() {" . "$('#dishID').val(\"" . $row['DISHID'] . "\");})</script>";
            echo "<script>$(document).ready(function() {" . "$('#dishName').val(\"" . $row['DISHNAME'] . "\");})</script>";
            echo "<script>$(document).ready(function() {" . "$('#dishType').val(\"" . $row['DISHTYPE'] . "\");})</script>";
            echo "<script>$(document).ready(function() {" . "$('#price').val(\"" . $row['PRICE'] . "\");})</script>";
            echo "<script>$(document).ready(function() {" . "$('#meat').val(\"" . $row['MEAT'] . "\");})</script>";
            echo "<script>$(document).ready(function() {" . "$('#veg').val(\"" . $row['VEGGI'] . "\");})</script>";
          // echo "<script>$(document).ready(function() {" . "$('#rating').val(\"" . $rating . "\");})</script>";
          echo "<script>$(document).ready(function() {" . "$('#rating').val(" .$rating . ");})</script>";
            echo "<script>$(document).ready(function() {" . "$('#cookingtime').val(\"" . $row['COOKINGTIME'] . "\");})</script>";
            echo "<script>$(document).ready(function() {" . "$('#edit').toggle();})</script>";
            echo "<script>$(document).ready(function() {" . "$('#delete').toggle();})</script>";
            //basename($_FILES["fileToUpload"]["name"]) = $row['DISHIMAGE'];  //test  
            $target_file = $target_dir . $row['DISHIMAGE'];
        } else {
            echo '沒有配對的產品 ' . mysqli_error($connect);
        }
        mysqli_close($connect);
    }

    if ($_POST['submit'] == "修改") {
        include 'mysqli_connect.php';
        $dishImage = basename($_FILES["fileToUpload"]["name"]);

        $query = "UPDATE MENU set DISHID='$_POST[dishID]', DISHNAME='$_POST[dishName]', PRICE='$_POST[price]', "
                . "DISHTYPE='$_POST[dishType]', MEAT='$_POST[meat]', VEGGI='$_POST[veg]', RATING='$_POST[rating]', "
                . "COOKINGTIME='$_POST[cookingtime]' WHERE DISHNAME='$_POST[dishName]'"; //exclude , DISHIMAGE='$dishImage'
        if (mysqli_query($connect, $query)) {
            echo '成功修改產品資料 ';
        } else {
            echo '錯誤' . mysqli_error($connect);
        }
        mysqli_close($connect);
    }

    if ($_POST['submit'] == "刪除") {
        include 'mysqli_connect.php';
        $query1 = "SELECT DISHIMAGE FROM MENU WHERE DISHID = $_POST[dishID]";
        $result1 = mysqli_query($connect, $query1);
        $row1 = mysqli_fetch_assoc($result1);
        $data = row1['DISHIMAGE'];

        $query = "DELETE FROM MENU WHERE DISHID = $_POST[dishID]";
        if (mysqli_query($connect, $query)) {
            echo '成功刪除產品 ';          
            $dirHandle = opendir("images/menu/");
            while ($file = readdir($dirHandle)) {
                if ($file == $data) {
                    unlink("images/menu/" . $file);
                }
            }
        } else {
            echo '錯誤' . mysqli_error($connect);
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
                <th>產品編號</th>
                <th>名稱</th>
                <th>價格</th>
                <th>類別</th>
                <th>肉</th>
                <th>菜</th>
                <th>評分</th>
                <th>烹煮所需時間</th>                
            </tr>
        </thead>
        <!--
        <tfoot>
            <tr>
                <th>產品編號</th>
                <th>名稱</th>
                <th>價格</th>
                <th>類別</th>
                <th>肉</th>
                <th>菜</th>
                <th>評分</th>
                <th>烹煮所需時間</th> 
            </tr>
        </tfoot>
        -->
        <tbody>       
        		<?php              
					include './mysqli_connect.php';
					$query = "SELECT * FROM MENU";
					$result = mysqli_query($connect, $query);
					if ($result) {
						while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            $position = "";
							echo '<td>' . $row['DISHID'] . '</td>';
							echo '<td>' . $row['DISHNAME'] . '</td>';
							echo '<td>' . $row['PRICE'] . '</td>';
							echo '<td>' . $row['DISHTYPE'] . '</td>';
							echo '<td>' . $row['MEAT'] . '</td>';
    						echo '<td>' . $row['VEGGI'] . '</td>';
							echo '<td>' . $row['RATING'] . '</td>';
							echo '<td>' . $row['COOKINGTIME'] . '</td>';
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