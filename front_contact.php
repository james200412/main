<!DOCTYPE html>
<html>
<head>
<title>SC & FOOD | Contact Us</title>
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



	<div class="contact-section-page">
		<div class="contact-head">
		    <div class="container">
				<h3>Contact Us</h3>
			</div>
		</div>
		<div class="contact_top">
			 		<div class="container">
			 			<div class="col-md-6 contact_left wow fadeInRight" data-wow-delay="0.4s">

							 <h4>Contact Info</h4>
							     		
			      						<address>
											 <p>Email:<a href="mail-to: info@scfood.com"> info@scfood.com</a></p>
											 <p>Phone:  +852 1234 5678</p>
											 <p>Address: </p>
											<p>SC & FOOD Ltd, Cityu Scope</p>
									 	 	<p>City University of Hong Kong.</p>
											<p>Tat Chee Avenue. Kowloon Tong</p>
							   			</address>
										   <h4>Give us feed back!</h4><br>
 <a href="front_feedback_action.php" class="btn btn-info">Go Feed Back</a> 						
					        
							</div>

					        <div class="col-md-6 company-right wow fadeInLeft" data-wow-delay="0.4s">
					        	<div class="contact-map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17555.804209326525!2d114.16640211677054!3d22.328951638805563!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3404073400f3ef35%3A0xeb61704ffb0ba959!2z6aaZ5riv5Z-O5biC5aSn5a24!5e0!3m2!1szh-TW!2shk!4v1547402103268" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
						
							 </div>
						</div>
					</div>

	</div>
	<!-- footer-section-starts -->
<?php

include 'include/front_footer.php';

?>
</body>
</html>