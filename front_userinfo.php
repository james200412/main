<!DOCTYPE html>
<html>
<head>
<title>SC & FOOD | User Account Info</title>
<link href="frontend/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="frontend/js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="frontend/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lobster+Two:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--Animation-->
<script src="frontend/js/wow.min.js"></script>
<link href="frontend/css/animate.css" rel='stylesheet' type='text/css' />
<script>
	new WOW().init();
</script>
<script type="text/javascript" src="frontend/js/move-top.js"></script>
<script type="text/javascript" src="frontend/js/easing.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
				});
			});
		</script>

</head>
<body>
    <!-- header-section-starts -->
	<?php
	include 'include/front_topmenu.php'
	?>
	<!-- header-section-ends -->

<?php
include 'db/dbconnect.php';
 $query = "SELECT * FROM TBUSER WHERE id = '".$_SESSION["userid"]."'";  
 $result = mysqli_query($connect, $query);  
 $row = mysqli_fetch_array($result);

 $rname = $row['uname'];
 $remail = $row['uemail'];
 $raddress = $row['uaddress'];
 $rphone = $row['uphone'];
 $rpassword = $row['upassword'];

 ?>  


	<div class="contact-section-page">
		<div class="contact-head">
		    <div class="container">
				<h3>Account Information</h3>
			</div>
		</div>
		<div class="contact_top">
			 		<div class="container">
			 			<div class="col-md-6 contact_left wow fadeInRight" data-wow-delay="0.4s">
			 				<h4>Account Update</h4>
<form method="post" action="userinfo_action.php"> 
<div class="register-top-grid">

					 <div class="wow fadeInLeft" data-wow-delay="0.4s">
						Name<label>*</label> 
						<input type="text" style="border:1px solid #5e5e5e"  name="name" id="name" value="<?php echo $rname;?>" required/> 
					 </div>


					 <div class="wow fadeInRight" data-wow-delay="0.4s">
						 Email Address<label>*</label> 
						 <input type="email" style="border:1px solid #5e5e5e" name="email" id="email" value="<?php echo $remail;?>" required/> 
					 </div>
					
					<div class="wow fadeInRight" data-wow-delay="0.4s">
						Phone Number<label>*</label> 
                		<input type="text" style="border:1px solid #5e5e5e" name="phone" id="phone" size="8" maxlength="8" value="<?php echo $rphone;?>" required/>  
					</div>

					<div class="wow fadeInRight" data-wow-delay="0.4s">
						Default Delivery Address<label>*</label>
						<input type="text" style="width: 250%; border:1px solid #5e5e5e" name="address" id="address" value="<?php echo $raddress;?>" required/> 
					</div>
					
				
</div>


<div class="register-bottom-grid">
							 <div class="wow fadeInLeft" data-wow-delay="0.4s">
								Password (within 8 ~ 20 characters)<label>*</label>
								<input type="password" style="border:1px solid #5e5e5e" name="password" id="password" size="20" minlength="8" maxlength="20" value="<?php echo $rpassword;?>" required/>
							 </div>
</div>

				<div class="clearfix"> </div>
				<div class="register-but">
					   <input type="submit" name="submit" id="submit" value="Apply Change"/>
					   <div class="clearfix"> </div>
				</div>
				
</form>
</div>


	</div>
	</div>
	<!-- footer-section-starts -->
<?php

include 'include/front_footer.php';

?>
</body>
</html>
