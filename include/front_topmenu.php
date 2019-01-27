    
<?php
session_start();

if(isset($_SESSION["userid"]) && $_SESSION['userlevel'] == 0){
?>

<style>
.userdetail1{
	color:black;
	font-size:1.3em;
	font-weight:300;
	margin-top: 3px;
}
</style>
<div class="header">
		<div class="container">
			<div class="top-header">
				<div class="col-sm-4 userdetail1">

				<div>
				&nbsp;
				</div>
				
				<div>Hello,&nbsp;<?php  echo $_SESSION["username"];?></div>

				</div>
				
				<div class="col-sm-4 ">
					<a href="index.php"><img src="../frontend/images/logo.png" class="img-responsive" alt="" /></a>
				</div>
				
				<div class="col-sm-4 queries" align="right">
					<p>Order Food now!!!<span>24-hour service</span></p>
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
						
						<li><a href="front_userinfo.php"><b>Account Info</a></b></li>|

			<?php	if(isset($_SESSION['cart_contents'])){	?>
						<li><a href="front_viewcart.php" ><b>
							<span class="glyphicon glyphicon-shopping-cart" style="color:red"></span>Cart</a></b></li>|
			<?php	}else{	?>
							<li><a href="front_viewcart.php" ><b>
							<span class="glyphicon glyphicon-shopping-cart"></span>Cart</a></b></li>|
			<?php	}	?>

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
		<div class="col-sm-4 userdetail1">

<div>
&nbsp;
</div>


</div>

<div class="col-sm-4 ">
	<a href="index.php"><img src="../frontend/images/logo.png" class="img-responsive" alt="" /></a>
</div>

<div class="col-sm-4 queries" align="right">
	<p>Order Food now!!!<span>24-hour service</span></p>
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
					<li><a href="front_login.php"><b>Login</a></li> |
					<li><a href="register.php"><b>Register</a> </li> |
					<li><a href="cms_stafflogin.php"><b>Staff Login</a></li>
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