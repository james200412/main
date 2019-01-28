<!DOCTYPE html>
<html>
<head>
<title>SC & FOOD | Register</title>
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
include 'include/front_topmenu.php';
?>
	
	<!-- header-section-ends -->
	<!-- content-section-starts -->

	<div class="Popular-Restaurants-content">
		<div class="Popular-Restaurants-grids">
	   <div class="container">
		                   <!-- head link-->
				<div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="index.php" title="Go to Home Page">Home</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li>
					Register
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="index.php">Back to Home Page</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>	
<!--head link end-->
		  <div class="register">



<form method="post" action="register_action.php"> 
<div class="register-top-grid">
					<h3>PERSONAL INFORMATION</h3>
					 
					 
					 <div class="wow fadeInLeft" data-wow-delay="0.4s">
						<span> Name<label>*</label></span>
						<input type="text" name="name" id="name" required/> 
					 </div>


					 <div class="wow fadeInRight" data-wow-delay="0.4s">
						 <span>Email Address<label>*</label></span>
						 <input type="email" name="email" id="email" required/> 
					 </div>
					
					
					<div class="wow fadeInRight" data-wow-delay="0.4s">
					<span>Default Delivery Address<label>*</label></span>
					<input type="text" name="address" id="address" required/> 
					</div>
					
					<div class="wow fadeInRight" data-wow-delay="0.4s">
					<span>Phone Number<label>*</label></span>
                	<input type="text" name="phone" id="phone" size="8" maxlength="8" required/>  
					</div>
</div>


<div class="register-bottom-grid">
						    <h3>LOGIN INFORMATION</h3>
							 <div class="wow fadeInLeft" data-wow-delay="0.4s">
								<span>Password (at least 8 characters)<label>*</label></span>
								<input type="password" name="password" id="password" size="255" minlength="8" maxlength="255" required/>
							 </div>
</div>

				<div class="clearfix"> </div>
				<div class="register-but">
					   <input type="submit" name="submit" id="submit" value="Confirm"/>
					   <div class="clearfix"> </div>
				</div>
				
</form>


</div>
</div>
</div>
</div>



<?php
include 'include/front_footer.php';
?>

</body>
</html>