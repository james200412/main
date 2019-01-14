<?php
if(isset($_SESSION["userid"]) && $_SESSION['userlevel'] == 0){
?>

	<!--Loginfooter-->
	<div class="contact-section" id="contact">
			<div class="container">
				<div class="contact-section-grids">
					<div class="col-md-3 contact-section-grid wow fadeInLeft" data-wow-delay="0.4s">
						<h4>About Us</h4>
						<ul>
						<li><i class="glyphicon glyphicon-tag" style="color:green"></i></li>
						<li class="data"><a href="index.php">Brand Story</a></li>
						</ul>
						<ul>
							<li><i class="glyphicon glyphicon-tag" style="color:green"></i></li>
							<li class="data"><a href="front_contact.php">Contact Us</a></li>
						</ul>
					</div>
					<div class="col-md-3 contact-section-grid wow fadeInLeft" data-wow-delay="0.4s">
						<h4>The Restaurant</h4>
						<ul>
						<li><i class="glyphicon glyphicon-tag" style="color:green"></i></li>
							<li class="data"><a href="front_menu.php">Menu</a></li>
						</ul>

						<ul>
						<li><i class="glyphicon glyphicon-tag" style="color:green"></i></li>
							<li class="data"><a href="index.php">Privacy Policy</a></li>
						</ul>
					</div>
					<div class="col-md-3 contact-section-grid wow fadeInLeft" data-wow-delay="0.4s">
						<h4>Member</h4>
						<ul>
						<li><i class="glyphicon glyphicon-tag" style="color:green"></i></li>
							<li class="data"><a href="front_userinfo.php">Account Info</a></li>
						</ul>

						<ul>
						<li><i class="glyphicon glyphicon-tag" style="color:green"></i></li>
							<li class="data"><a href="front_viewcart.php">Cart</a></li>
						</ul>

						<ul>
						<li><i class="glyphicon glyphicon-tag" style="color:green"></i></li>
							<li class="data"><a href="front_order.php">Track Order</a></li>
						</ul>
					</div>
				
					<div class="col-md-3 contact-section-grid wow fadeInLeft" data-wow-delay="0.4s">
					<h4>Share With Friend!</h4>
					<!-- Go to www.addthis.com/dashboard to customize your tools --> 
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b921927bca7c3ad"></script>

						<!-- Go to www.addthis.com/dashboard to customize your tools --> 
					<div class="addthis_inline_share_toolbox"></div> 					
					</div>

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



<?php

}else{

	?>

	<!--Guestfooter-->
	<div class="contact-section" id="contact">
			<div class="container">
				<div class="contact-section-grids">
					<div class="col-md-3 contact-section-grid wow fadeInLeft" data-wow-delay="0.4s">
						<h4>About Us</h4>
						<ul>
						<li><i class="glyphicon glyphicon-tag" style="color:green"></i></li>
						<li class="data"><a href="index.php">Brand Story</a></li>
						</ul>
						<ul>
							<li><i class="glyphicon glyphicon-tag" style="color:green"></i></li>
							<li class="data"><a href="front_contact.php">Contact Us</a></li>
						</ul>
					</div>
					<div class="col-md-3 contact-section-grid wow fadeInLeft" data-wow-delay="0.4s">
						<h4>The Restaurant</h4>
						<ul>
						<li><i class="glyphicon glyphicon-tag" style="color:green"></i></li>
							<li class="data"><a href="front_menu.php">Menu</a></li>
						</ul>

						<ul>
						<li><i class="glyphicon glyphicon-tag" style="color:green"></i></li>
							<li class="data"><a href="index.php">Privacy Policy</a></li>
						</ul>
					</div>
					<div class="col-md-3 contact-section-grid wow fadeInLeft" data-wow-delay="0.4s">
						<h4>Member</h4>
						<ul>
						<li><i class="glyphicon glyphicon-tag" style="color:green"></i></li>
							<li class="data"><a href="front_login.php">Login</a></li>
						</ul>

						<ul>
						<li><i class="glyphicon glyphicon-tag" style="color:green"></i></li>
							<li class="data"><a href="register.php">Register</a></li>
						</ul>

						<ul>
						<li><i class="glyphicon glyphicon-tag" style="color:green"></i></li>
							<li class="data"><a href="front_order.php">Track Order</a></li>
						</ul>
					</div>
				


					<div class="col-md-3 contact-section-grid wow fadeInLeft" data-wow-delay="0.4s">
					<h4>Share With Friend!</h4>
					<!-- Go to www.addthis.com/dashboard to customize your tools --> 
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b921927bca7c3ad"></script>

						<!-- Go to www.addthis.com/dashboard to customize your tools --> 
					<div class="addthis_inline_share_toolbox"></div> 					
					</div>


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



<?php

}

?>

										
