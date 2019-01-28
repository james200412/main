<?php
// initializ shopping cart class
include 'Cart.php';
$cart = new Cart;
?>

<!DOCTYPE html>
<html>
<head>
<title>SC & FOOD | Cart</title>
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

    function updateCartItem(obj,id){
        $.get("cartaction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
            if(data == 'error'){
                alert('Only Accept Integer');
            }else if(data == 'ok'){
                location.reload();
            }else{
                alert('update failed');
            }
        });
    }
    </script>

</head>
<body>
    <!-- header-section-starts -->
	<?php
	include 'include/front_topmenu.php'
	?>
	<!-- header-section-ends -->

	<div class="Popular-Restaurants-content">

		    <div class="container">
                
<!-- head link-->
<div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="index.php" title="Go to Home Page">Home</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li>
                       Cart
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="index.php">Back to Home Page</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>	
<h3>Cart Information</h3>
			</div>
		</div>
<br>
    <div class="container">
    <h1></h1>
    <table class="table">
    <thead>    
        <tr>
            <th>Dish Name</th>
            <th>Detail</th>
            <th>Item Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>&nbsp;</th>
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
           
<style>
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
</style>

<td style="width: 5%"><input type="number" min="1" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
            
            
            <td style="width: 15%"><?php echo '$'.$item["subtotal"].' HKD'; ?></td>
           
            <td style="width: 10%">
                <a href="cartaction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="btn btn-danger" onclick="return confirm('Confirm Delete')"><i class="glyphicon glyphicon-ban-circle"></i></a>
            </td> 

        </tr>

    
       
      

        <?php 
        } 
          }else{ 
        ?>
        <td><I style="font-size:18px">The Cart is Empty.<br></td>

        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td><a href="front_menu.php" class="btn btn-warning">Back To Menu</a></td>

    <?php if($cart->total_items() > 0){ ?>
            <td>
            <a href="cartaction.php?action=removeCartItemall" class="btn btn-danger" onclick="return confirm('Confirm Delete')">Clear All</a>
     </td>
            <?php } ?>

            <td colspan="2"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total Price: <?php echo '$'.$cart->total().' HKD'; ?></strong></td>
            <td><a href="checkout.php" class="btn btn-success btn-block">Checkout <i class="glyphicon glyphicon-circle-arrow-right"></i></a></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
</div>


<br>
<br>
<br>

</div>
	<!-- footer-section-starts -->
<?php

include 'include/front_footer.php';

?>
</body>
</html>