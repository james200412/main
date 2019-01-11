<?php
if(isset($_SESSION["userid"]) && $_SESSION['userlevel'] == 0){
?>

	<!--Loginfooter-->
	<div class="contact-section" id="contact">
			<div class="container">
				<div class="contact-section-grids">
					<div class="col-md-3 contact-section-grid wow fadeInLeft" data-wow-delay="0.4s">
						<h4>Menu</h4>
						<ul>
							<li><i class="point"></i></li>
							<li class="data"><a href="front_menu.php">Menu</a></li>
						</ul>
						
					</div>
					<div class="col-md-3 contact-section-grid wow fadeInLeft" data-wow-delay="0.4s">
						<h4>Company Info</h4>
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
						<h4>Menu</h4>
						<ul>
							<li><i class="point"></i></li>
							<li class="data"><a href="front_menu.php">Menu</a></li>
						</ul>
						
					</div>
					<div class="col-md-3 contact-section-grid wow fadeInLeft" data-wow-delay="0.4s">
						<h4>Company Info</h4>
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
