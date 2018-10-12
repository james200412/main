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


  

<!--    <link href="css/bootstrap.min.css" rel="stylesheet">
 <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

-->


</head>
<body>
    <!-- header-section-starts -->
	<?php
	include 'include/front_topmenu.php'
	?>
	<!-- header-section-ends -->





         <div class="register-top-grid">
             <div class="col-lg-10">
                 <h2>Customer Cart</h2>
             </div>
         </div>

        <div class="animated fadeInRight">
<br>


            <div class="row">
                <div class="col-md-9">



                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table shoping-cart-table">

                                    <tbody>
                                    <tr>
                                        <td width="90">
                                            <div class="cart-product-imitation">
                                            </div>
                                        </td>
                                        <td class="desc">
                                            <h3>
                                                <a href="#" class="text-navy">
                                                    Text editor
                                                </a>
                                            </h3>
                                            <p class="small">
                                                There are many variations of passages of Lorem Ipsum available
                                            </p>
                                            <dl class="small m-b-none">
                                                <dt>Description lists</dt>
                                                <dd>List is perfect for defining terms.</dd>
                                            </dl>

                                            <div>
                                                <a href="#" class="text-muted">Remove item</a>
                                            </div>

                                            
                                        </td>

                                        <td>
                                            $50,00
                                        </td>
                                        <td width="65">
                                            <input type="text" class="form-control" placeholder="2">
                                        </td>
                                        <td>
                                            <h4>
                                                $100,00
                                            </h4>
                                        </td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>




                        <div class="">
                            <div class="table-responsive">
                                <table class="table shoping-cart-table">

                                    <tbody>
                                    <tr>
                                        <td width="90">
                                            <div class="cart-product-imitation">
                                            </div>
                                        </td>
                                        <td class="desc">
                                            <h3>
                                                <a href="#" class="text-navy">
                                                    Text editor
                                                </a>
                                            </h3>
                                            <p class="small">
                                                There are many variations of passages of Lorem Ipsum available
                                            </p>
                                            <dl class="small m-b-none">
                                                <dt>Description lists</dt>
                                                <dd>List is perfect for defining terms.</dd>
                                            </dl>

                                            <div>
                                                <a href="#" class="text-muted">Remove item</a>
                                            </div>
                                        </td>

                                        <td>
                                            $50,00
                                        </td>
                                        <td width="65">
                                            <input type="text" class="form-control" placeholder="2">
                                        </td>
                                        <td>
                                            <h4>
                                                $100,00
                                            </h4>
                                        </td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>



                    </div>

                    <button class="btn btn-white">Checkout</button>
                    &nbsp&nbsp&nbsp
                    <button class="btn btn-white">Back to Menu</button>

                    <br> 
                </div>
            </div>




        </div>
        </div>

























































<!--test cart-->
<!--
<?php session_start();
#cart.php - A simple shopping cart with add to cart, and remove links
 //---------------------------
 //initialize sessions

//Define the products and cost
$products = array("product A", "product B", "product C");
$amounts = array("19.99", "10.99", "2.99");

//Load up session
 if ( !isset($_SESSION["total"]) ) {
   $_SESSION["total"] = 0;
   for ($i=0; $i< count($products); $i++) {
    $_SESSION["qty"][$i] = 0;
   $_SESSION["amounts"][$i] = 0;
  }
 }

 //---------------------------
 //Reset
 if ( isset($_GET['reset']) )
 {
 if ($_GET["reset"] == 'true')
   {
   unset($_SESSION["qty"]); //The quantity for each product
   unset($_SESSION["amounts"]); //The amount from each product
   unset($_SESSION["total"]); //The total cost
   unset($_SESSION["cart"]); //Which item has been chosen
   }
 }

 //---------------------------
 //Add
 if ( isset($_GET["add"]) )
   {
   $i = $_GET["add"];
   $qty = $_SESSION["qty"][$i] + 1;
   $_SESSION["amounts"][$i] = $amounts[$i] * $qty;
   $_SESSION["cart"][$i] = $i;
   $_SESSION["qty"][$i] = $qty;
 }

  //---------------------------
  //Delete
  if ( isset($_GET["delete"]) )
   {
   $i = $_GET["delete"];
   $qty = $_SESSION["qty"][$i];
   $qty--;
   $_SESSION["qty"][$i] = $qty;
   //remove item if quantity is zero
   if ($qty == 0) {
    $_SESSION["amounts"][$i] = 0;
    unset($_SESSION["cart"][$i]);
  }
 else
  {
   $_SESSION["amounts"][$i] = $amounts[$i] * $qty;
  }
 }
 ?>
 <h2>List of All Products</h2>
 <table>
   <tr>
   <th>Product</th>
   <th width="10px">&nbsp;</th>
   <th>Amount</th>
   <th width="10px">&nbsp;</th>
   <th>Action</th>
   </tr>
 <?php
 for ($i=0; $i< count($products); $i++) {
   ?>
   <tr>
   <td><?php echo($products[$i]); ?></td>
   <td width="10px">&nbsp;</td>
   <td><?php echo($amounts[$i]); ?></td>
   <td width="10px">&nbsp;</td>
   <td><a href="?add=<?php echo($i); ?>">Add to cart</a></td>
   </tr>
   <?php
 }
 ?>
 <tr>
 <td colspan="5"></td>
 </tr>
 <tr>
 <td colspan="5"><a href="?reset=true">Reset Cart</a></td>
 </tr>
 </table>
 <?php
 if ( isset($_SESSION["cart"]) ) {
 ?>
 <br/><br/><br/>
 <h2>Cart</h2>
 <table>
 <tr>
 <th>Product</th>
 <th width="10px">&nbsp;</th>
 <th>Qty</th>
 <th width="10px">&nbsp;</th>
 <th>Amount</th>
 <th width="10px">&nbsp;</th>
 <th>Action</th>
 </tr>
 <?php
 $total = 0;
 foreach ( $_SESSION["cart"] as $i ) {
 ?>
 <tr>
 <td><?php echo( $products[$_SESSION["cart"][$i]] ); ?></td>
 <td width="10px">&nbsp;</td>
 <td><?php echo( $_SESSION["qty"][$i] ); ?></td>
 <td width="10px">&nbsp;</td>
 <td><?php echo( $_SESSION["amounts"][$i] ); ?></td>
 <td width="10px">&nbsp;</td>
 <td><a href="?delete=<?php echo($i); ?>">Delete from cart</a></td>
 </tr>
 <?php
 $total = $total + $_SESSION["amounts"][$i];
 }
 $_SESSION["total"] = $total;
 ?>
 <tr>
 <td colspan="7">Total : <?php echo($total); ?></td>
 </tr>
 </table>
 <?php
 }
 ?>
-->






</div>
	<!-- footer-section-starts -->
<?php

include 'include/front_footer.php';

?>
</body>
</html>