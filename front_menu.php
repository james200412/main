<!DOCTYPE html>
<html>
<head>
<title>Popular-restaurent</title>
<link href="frontend/frontend-templates/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="frontend/frontend-templates/js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="frontend/frontend-templates/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lobster+Two:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--Animation-->
<script src="frontend/frontend-templates/js/wow.min.js"></script>
<link href="frontend/frontend-templates/css/animate.css" rel='stylesheet' type='text/css' />
<script>
	new WOW().init();
</script>
<script type="text/javascript" src="frontend/frontend-templates/js/move-top.js"></script>
<script type="text/javascript" src="frontend/frontend-templates/js/easing.js"></script>
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
	<div class="header">
		<div class="container">
			<div class="top-header">
				<div class="logo">
					<a href="index.html"><img src="images/logo.png" class="img-responsive" alt="" /></a>
				</div>
				<div class="queries">
					<p>Questions? Call us Toll-free!<span>1800-0000-7777 </span><label>(11AM to 11PM)</label></p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
			<div class="menu-bar">
			<div class="container">
				<div class="top-menu">
					<ul>
						<li class="active"><a href="index.php">Home</a></li>|
						<li><a href="front_menu.php">Menu</a></li>|
						<li><a href="Order.php">Order</a></li>|
						<li><a href="contact.php">contact</a></li>
						<div class="clearfix"></div>
					</ul>
				</div>
				<div class="login-section">
					<ul>
						<li><a href="login.html">Login</a>  </li> |
						<li><a href="register.html">Register</a> </li> |
						<li><a href="#">Help</a></li>
						<div class="clearfix"></div>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>		
				</div>


	<!-- header-section-ends -->
	<!-- content-section-starts -->

<!--menu-->
	<div class="Popular-Restaurants-content">
		<div class="Popular-Restaurants-grids">
			<div class="container">
				
							
                            <?php
                            include 'db/dbconnect.php';
                            $query = "SELECT * FROM TBMENU where dtype IN ('food') AND activate IN ('1')";
                            $result = @mysqli_query($connect, $query);
// Cycle through the result set
                            echo '<br>';
                            while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="Popular-Restaurants-grid wow fadeInRight" data-wow-delay="0.4s">' .
                                '<div class="col-md-3 restaurent-logo"><img src="img/' . $row['dimage'] . '" class="img-responsive" alt="" /></div>' .
                                '<div class="col-md-5 restaurent-title"><div class="logo-title"><h4>' . $row['dname'] . '</h4></div>'.
                                '<div class="rating">'. $row['detail'] .'</div>';
                     		echo '</div>';
							echo '<div class="col-md-4 buy"><span>' . '$' . $row['dprice'] . 
								'</span><class="morebtn hvr-rectangle-in"><input type="button" data-toggle="modal" data-target="#myModal" name="' . $row['DISHID'] . '" id="' . $row['DISHID'] . '" value="Add to Cart" /></div>' .
                                '<div class="clearfix"></div>' .
                                '</div>';
                            }
                            mysqli_close($connect);
							?>  
					
					  
                            <?php
                            include 'db/dbconnect.php';
                            $query = "SELECT * FROM TBMENU where dtype IN ('drink') AND activate IN ('1')";
                            $result = @mysqli_query($connect, $query);
// Cycle through the result set
                            echo '<br>';
                            while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="Popular-Restaurants-grid wow fadeInRight" data-wow-delay="0.4s">' .
                                '<div class="col-md-3 restaurent-logo"><img src="img/' . $row['dimage'] . '" class="img-responsive" alt="" /></div>' .
                                '<div class="col-md-5 restaurent-title"><div class="logo-title"><h4>' . $row['dname'] . '</h4></div>'.
                                '<div class="rating">'. $row['detail'] .'</div>';
                     		echo '</div>';
							echo '<div class="col-md-4 buy"><span>' . '$' . $row['dprice'] . 
								'</span><class="morebtn hvr-rectangle-in"><input type="button" data-toggle="modal" data-target="#myModal" name="' . $row['DISHID'] . '" id="' . $row['DISHID'] . '" value="Add to Cart" /></div>' .
                                '<div class="clearfix"></div>' .
                                '</div>';
                            }
                            mysqli_close($connect);
                            ?>  




				
			</div><!--<div class="container"></div> end-->
		</div>
	</div>
<!--menu-->


	<!--footer-->
	<div class="contact-section" id="contact">
			<div class="container">
				<div class="contact-section-grids">
					<div class="col-md-3 contact-section-grid wow fadeInLeft" data-wow-delay="0.4s">
						<h4>Site Links</h4>
						<ul>
							<li><i class="point"></i></li>
							<li class="data"><a href="#">About Us</a></li>
						</ul>
						<ul>
							<li><i class="point"></i></li>
							<li class="data"><a href="#">Contact Us</a></li>
						</ul>
						<ul>
							<li><i class="point"></i></li>
							<li class="data"><a href="#">Privacy Policy</a></li>
						</ul>
						<ul>
							<li><i class="point"></i></li>
							<li class="data"><a href="#">Terms of Use</a></li>
						</ul>
					</div>
					<div class="col-md-3 contact-section-grid wow fadeInLeft" data-wow-delay="0.4s">
						<h4>Site Links</h4>
						<ul>
							<li><i class="point"></i></li>
							<li class="data"><a href="#">About Us</a></li>
						</ul>
						<ul>
							<li><i class="point"></i></li>
							<li class="data"><a href="#">Contact Us</a></li>
						</ul>
						<ul>
							<li><i class="point"></i></li>
							<li class="data"><a href="#">Privacy Policy</a></li>
						</ul>
						<ul>
							<li><i class="point"></i></li>
							<li class="data"><a href="#">Terms of Use</a></li>
						</ul>
					</div>
					<div class="col-md-3 contact-section-grid wow fadeInRight" data-wow-delay="0.4s">
						<h4>Follow Us On...</h4>
						<ul>
							<li><i class="fb"></i></li>
							<li class="data"> <a href="#">  Facebook</a></li>
						</ul>
						<ul>
							<li><i class="tw"></i></li>
							<li class="data"> <a href="#">Twitter</a></li>
						</ul>
						<ul>
							<li><i class="in"></i></li>
							<li class="data"><a href="#"> Linkedin</a></li>
						</ul>
						<ul>
							<li><i class="gp"></i></li>
							<li class="data"><a href="#">Google Plus</a></li>
						</ul>
					</div>
					<div class="col-md-3 contact-section-grid nth-grid wow fadeInRight" data-wow-delay="0.4s">
						<h4>Subscribe Newsletter</h4>
						<p>To get latest updates and food deals every week</p>
						<input type="text" class="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
						<input type="submit" value="submit">
						</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	<!-- content-section-ends -->
	<!-- footer-section-starts -->
	<div class="footer">
		<div class="container">
			<p class="wow fadeInLeft" data-wow-delay="0.4s">Copyright &copy; james wong  2018</p>
		</div>
	</div>
	<!-- footer-section-ends -->
	  <script type="text/javascript">
						$(document).ready(function() {
							/*
							var defaults = {
					  			containerID: 'toTop', // fading element id
								containerHoverID: 'toTopHover', // fading element hover id
								scrollSpeed: 1200,
								easingType: 'linear' 
					 		};
							*/
							
							$().UItoTop({ easingType: 'easeOutQuart' });
							
						});
					</script>
				<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>


</body>
</html>