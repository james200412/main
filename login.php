<?php
session_start(); 
require ('db/dbconnect.php');

$sql= "SELECT * FROM TBUSER WHERE id='$_POST[id]' && upassword='$_POST[pw]'";
$r = @mysqli_query ($connect, $sql);
$num = mysqli_num_rows($r);

if ($num > 0){
	while($row = mysqli_fetch_array($r, MYSQL_ASSOC)){
		$_SESSION["user"]="$_POST[id]";
		$_SESSION['name']=$row['uname'];
		$_SESSION['userlevel'] = $row['ulevel'];
		if ($row['ulevel'] == 0) {
			header("Location: index.php");
		}
		else if ($row['ulevel'] == 1 || $row['ulevel']== 2) {
			header("Location: cms_index.php");
		}
	}
}
else {
?>	
	<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel='stylesheet' type='text/css' href='css/searchCSS.php' />
	<title>公大網上點餐 | OU Online Food Ordering - 登入 | Login</title>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<script src="js/jquery.min.js"></script>
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!--webfont-->
	<link href="css/fontface.css" rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lobster+Two:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<!--Animation-->
	<script src="js/wow.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>   
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>        
	<link href="css/animate.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/stylenav.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/newscss.css">

	<script>new WOW().init();</script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
			});
		});
	</script>

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

	<script>
		$(document).ready(function () {
		<?php
			include './mysqli_connect.php';
			$query = "SELECT max(DISHID) as max FROM MENU";
			$result = @mysqli_query($connect, $query);
			$row = mysqli_fetch_assoc($result);
			$max = $row['max'];
			for ($i = 1; $i <= $max; $i++) {
		?>
				$("#<?php echo $i ?>").click(function () {
					var id = <?php echo $i ?>;
					$.ajax({
						type: "POST",
						url: "ajax_addtocart.php",
						data: {id: id},
						cache: false,
						success: function (html) {
							$("#message").html(html);
						}
					});
				})
		<?php
			}
		?>
		})
	</script>
	<script src="js/simpleCart.min.js"></script>	
	</head>
	<body>

	<!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">購物車訊息</h4>
				</div>
				<div class="modal-body">
					<p id="message"></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">關閉視窗</button>
				</div>
			</div>
		</div>
	</div>

	<!-- header-section-starts -->
	<?php 
		include 'include/topmenu.php';
	?>
	<!-- header-section-ends -->
    
    <!--content section starts-->
	<?php
		echo "<div style='min-height:400px;padding-top:100px;'><center><h4>用户編號或密碼不正確</h4></center></div>";
	?>
    <!--content section ends-->
    
	<!-- footer starts-->
    <?php
        include 'include/footer.php';
    ?>
	<!-- footer end -->

	</body>
	</html>
	<?php
		} //end else
	?>	