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
<title>Cart</title>
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
    <h1>Order Preview</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Dish Detail</th>
            <th>Item Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo '$'.$item["price"].' HKD'; ?></td>
            <td><?php echo $item["qty"]; ?></td>
            <td><?php echo '$'.$item["subtotal"].' HKD'; ?></td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="4"><p>No items in your cart......</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo '$'.$cart->total().' HKD'; ?></strong></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
    <div class="shipAddr">
        <h4>Delivery Details</h4>
        <b>Customer Name:</b>
        <p><?php echo $crow['uname']; ?></p>
        <b>Email Address:</b>
        <p><?php echo $crow['uemail']; ?></p>
        <b>Phone Number:</b>
        <p><?php echo $crow['uphone']; ?></p>
        <b>Delivery Address:</b>
        <p><?php echo $crow['uaddress']; ?></p>
    </div>

    <div class="footBtn">
    <a href="front_viewcart.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Back to Cart</a>
    <a href="front_userinfo.php" class="btn btn-success"><i class="glyphicon glyphicon-menu-left"></i> Edit Delivery Address</a>
        <a href="cartAction.php?action=placeOrder" class="btn btn-success orderBtn">Confirm Order <i class="glyphicon glyphicon-menu-right"></i></a>
    </div>
</div>

<!-- footer-section-starts -->
<?php

include 'include/front_footer.php';

?>
</body>
</html>