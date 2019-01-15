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
<title>SC & FOOD | Order Preview</title>
<!--Add to modal cart js and css-->
<link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery-3.1.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
<!--Add to modal cart js and css-->


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
	<div class="contact-head">
		    <div class="container">
				<h3>Order Preview</h3>
			</div>
		</div>

<br>
<div class="container">
    <h1></h1>
    <table class="table">
    <thead>
        <tr>
            <th>Dish Detail</th>
            <th>Detail</th>
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
            <td style="width: 10%"><?php echo $item["name"]; ?></td>
            <td style="width: 40%"><?php echo $item["detail"]; ?></td>
            <td style="width: 10%"><?php echo '$'.$item["price"].' HKD'; ?></td>
            <td style="width: 5%"><?php echo $item["qty"]; ?></td>
            <td style="width: 10%"><?php echo '$'.$item["subtotal"].' HKD'; ?></td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="4"><p>No items in your cart......</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4"></td>
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
        <p>
        <?php 
        if(isset($_SESSION['othersaddress'])){
            echo $_SESSION['othersaddress']; 
        }else{
            echo $crow['uaddress']; 
        }     
        ?>
        </p>
    </div><br>

    <div class="footBtn">
    <a href="front_viewcart.php" class="btn btn-warning"> Back to Cart</a>
    <a data-toggle="modal" data-target="#modalCartAddress" class="btn btn-success ">Use Other Delivery Address</a>
  <!--  <a href="cartaction.php?action=placeOrder" class="btn btn-success orderBtn">Confirm Order</a>
  -->  
<a class="btn btn-success orderBtn" data-toggle="modal" data-target="#paymentModal">Confirm Order</a>

 <!-- <a href="front_payment.php" class="btn btn-success orderBtn">Confirm Order</a>
            -->
</div><br>
</div>

<!-- footer-section-starts -->
<?php

include 'include/front_footer.php';

?>

</body>
</html>


<!-- Modal: modalCart -->
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel"> Please Select </h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body">
      
<form action="cartaction.php?action=placeOrder" method="post">
<ul class="list-inline order-type clearfix">
<li><label for="cod">
<span><i class="fa fa-taxi"></i> </span>
<span>Cash on delivery</span>
<input type="radio" id="cod" name="disposition-group" value="0" CHECKED/>
</label></li>
<li><label for="Others">
 <span class="disposition">Others</span>
<input type="radio" id="Others" name="disposition-group" value="1"></label>
</li></ul>

      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <!--<a href="cartaction.php?action=placeOrder" class="btn btn-success orderBtn">Confirm Order</a>-->
     <button id="submit" class="btn btn-success orderBtn">Confirm Order</button>
</form> 
</div>
    </div>
  </div>
</div>
<!-- Modal: modalCart -->




<!-- Modal: modalCartAddress -->
<div class="modal fade" id="modalCartAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel"> Select Delivery Address </h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body">
      
<form action="cartaction.php?action=ChangeAddress" method="post">
<ul class="list-inline order-type clearfix">
<li><label for="defaultaddress1">
<span><i class="fa fa-taxi"></i> </span>
<span>Default Delivery Address</span>

<input type="radio" id="defaultaddress" name="address" value="0" CHECKED/>
<p>
<?php
echo 'Address : '.$crow['uaddress'].'';
?>
</label></li>
<li><label for="Others"><br>
 <span class="disposition">Use Others Address</span>
<input type="radio" id="Otheraddress" name="address" value="1"></label><br>

<input type="text" id="Otheraddresstext" name="Otheraddresstext" style="width: 500px" disabled/>  

</li></ul>

      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <!--<a href="cartaction.php?action=placeOrder" class="btn btn-success orderBtn">Confirm Order</a>-->
     <button id="submit" class="btn btn-success orderBtn">Update</button>
</form> 
</div>
    </div>
  </div>
</div>
<!-- Modal: modalCartAddress -->

<script type="text/javascript">
        $("#defaultaddress").click(function() {
            $("#Otheraddresstext").prop("required", false);
            $("#Otheraddresstext").prop("disabled", true);
        });
        $("#Otheraddress").click(function() {
            $("#Otheraddresstext").prop("required", true);
            $("#Otheraddresstext").prop("disabled", false);
            $("#Otheraddresstext").focus();
        });
</script> 