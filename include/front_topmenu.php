    
<?php
session_start();

if(isset($_SESSION["userid"]) && $_SESSION['userlevel'] == 0){
?>


<div class="header">
		<div class="container">
			<div class="top-header">
				<div class="logo">
					<a href="index.php"><img src="../frontend/images/logo.png" class="img-responsive" alt="" /></a>
				</div>
				<div class="queries">
					<p>Order Food now!!!<span>1234-5678 </span><label>(11AM to 11PM)</label></p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
			<div class="menu-bar">
			<div class="container">
				<div class="top-menu">
					<ul>
						<li><a href="index.php">Home</a></li>|
						<li><a href="front_menu.php">Menu</a></li>|
						<li><a href="front_order.php">Order</a></li>|
						<li><a href="front_contact.php">contact us</a></li>
						<div class="clearfix"></div>
					</ul>
				</div>


				<div class="login-section">
					<ul>
						<li>Welcome !! <b><?php  echo $_SESSION["username"];?></b></li>|
						<li><a href="front_userinfo.php"><b>User Account Info</a></b></li>|
						<li><a href="front_cart.php"><b>Cart</a></b></li>|
						<li><a href="logout.php"><b>Log Out</b></a>  </li>
						<div class="clearfix"></div>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>		
	</div>


<?php

}else{

	?>

	<div class="header">
	<div class="container">
		<div class="top-header">
			<div class="logo">
				<a href="index.php"><img src="../frontend/images/logo.png" class="img-responsive" alt="" /></a>
			</div>
			<div class="queries">
				<p>Order Food now!!!<span>1234-5678 </span><label>(11AM to 11PM)</label></p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
		<div class="menu-bar">
		<div class="container">
			<div class="top-menu">
				<ul>
					<li><a href="index.php">Home</a></li>|
					<li><a href="front_menu.php">Menu</a></li>|
					<li><a href="front_order.php">Order</a></li>|
					<li><a href="front_contact.php">contact us</a></li>
					<div class="clearfix"></div>
				</ul>
			</div>
			<div class="login-section">
				<ul>
					<li><a href="front_login.php">Login</a>  </li> |
					<li><a href="register.php">Register</a> </li> |
					<li><a href="cms_stafflogin.php">Staff Login</a></li>
					<div class="clearfix"></div>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>		
</div>

<?php

}

?>