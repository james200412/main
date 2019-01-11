<?php
// include database configuration file
include 'db/dbconnect.php';

// initializ shopping cart class
include 'cart.php';
$cart = new Cart;
//customer id from session 
$userid1 = $_SESSION["userid"];
// redirect to home if cart is empty
if($cart->total_items() <= 0){
    header("Location: index.php");
}


// get customer details by session customer ID
$query = "SELECT * FROM TBUSER WHERE id = '$userid1'";
$result = mysqli_query($connect, $query);
$crow = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>
<title>SC & FOOD | Payment</title>
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

<div class="container">
    <h1>Payment Method</h1>
 
    <div class="">
        <h4>Payment Details</h4>
        <b>Customer Name:</b>
        <p><?php echo $crow['uname']; ?></p>
        <b>Email Address:</b>
        <p><?php echo $crow['uemail']; ?></p>
        <b>Phone Number:</b>
        <p><?php echo $crow['uphone']; ?></p>
        <b>Delivery Address:</b>
        <p><?php echo $crow['uaddress']; ?></p>
    </div><br>

    <div class="footBtn">
    <a href="checkout.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i>Back to Order Preview</a>
  
  <a href="cartaction.php?action=placeOrder" class="btn btn-success orderBtn">Payment<i class="glyphicon glyphicon-menu-right"></i></a>
   </div><br>
</div>

<!-- footer-section-starts -->
<?php

include 'include/front_footer.php';

?>
</body>
</html>