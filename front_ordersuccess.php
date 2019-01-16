<?php
if(!isset($_REQUEST['id'])){
    header("Location: index.php");
}
$requestid = $_REQUEST['id'];
// include database configuration file
include 'db/dbconnect.php';

// get order details by order ID
$query = "SELECT odate FROM TBORDER WHERE id = '$requestid'";
$result = mysqli_query($connect, $query);
$crow = mysqli_fetch_assoc($result);

?>


<!DOCTYPE html>
<html>
<head>
<title>SC & FOOD | FeedBack </title>
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


<script src="frontend/js/jquery.carouFredSel-6.1.0-packed.js"></script>
<script src="frontend/js/tms-0.4.1.js"></script>
<script>
 $(window).load(function(){
      $('.slider')._TMS({
              show:0,
              pauseOnHover:false,
              prevBu:'.prev',
              nextBu:'.next',
              playBu:false,
              duration:800,
              preset:'fade', 
              pagination:true,//'.pagination',true,'<ul></ul>'
              pagNums:false,
              slideshow:8000,
              numStatus:false,
              banners:false,
          waitBannerAnimation:false,
        progressBar:false
      })  
      });
      
     $(window).load (
    function(){$('.carousel1').carouFredSel({auto: false,prev: '.prev',next: '.next', width: 960, items: {
      visible : {min: 1,
       max: 4
},
height: 'auto',
 width: 240,

    }, responsive: false, 
    
    scroll: 1, 
    
    mousewheel: false,
    
    swipe: {onMouse: false, onTouch: false}});
    
    
    });      

     </script>
<script src="frontend/js/jquery.easydropdown.js"></script>

<style>
		ul{
			list-style-type: none;

		}
</style>

</head>
<body>


    <!-- header-section-starts -->
	<?php
include 'include/front_topmenu.php';
	?>
	<!-- header-section-ends -->
	<div class="order-section-page">
		<div class="ordering-form">
			<div class="container">
			<div class="order-form-head text-Right">
						<h3>Thank You For Ordering!</h3>
					</div>

<!--Left Side-->
<?php
include 'db/dbconnect.php';
 $queryuser = "SELECT * FROM TBUSER WHERE id = '".$_SESSION["userid"]."'";  
 $resultuser = mysqli_query($connect, $queryuser);  
?>  

<div class="col-md-5 wow bounceIn" data-wow-delay="0.4s">
<br><br>
<div class="order-account">

<ul class="h4">
<li><b>Order ID : </b>#<?php echo $_GET['id']; ?></li><br>
<li>Your order has placed successfully.</li><br>

<?php
$timecrow = $crow['odate'];
$minutes_to_add = 90;
$time = new DateTime($timecrow);
$time->add(new DateInterval('PT' . $minutes_to_add . 'M'));

$stamp = $time->format('H:i');

$time2 = new DateTime($timecrow);
$stamp2 = $time2->format('H:i');

echo '<li>Ordered Time : '.$stamp2.'</li><br>';
?>
</p>
<?php
echo 'Estimated Delivery Time : '.$stamp.'';
?>


<br><br>
	<a class="btn btn-success" href="front_order.php" target="_blank"><h4>Check Order Detail</h4></a>
</ul>

</div>
	
</div>

<!--Left Side end-->


<!-- Right Side Order History Start -->	

<div class="col-md-6 ordering-image wow bounceIn" data-wow-delay="0.4s">
	<div class="order-history">
		<header class="order-history__header">
			<h3>FeedBack</h3> 
			<div class="text-right"><br></div>
            </header>			
<div class="feedback-content">
 <form method="post" id="feedback">  
                          <label>今天的消費方式</label> 
                          <input type="text" name="name" id="name" class="form-control" />  
                          <br />  
                          <label>整體滿意度</label>  
                          <textarea name="address" id="address" class="form-control"></textarea>  
                          <br />  
                          <label>不滿意的餐點項目</label>  
                          <input type="email" name="email" id="email" class="form-control" />  
                          <br />                            
                          <label>用餐碰到的問題</label>  
                          <input type="text" name="phone" id="phone" size="8" maxlength="8" class="form-control" />  
                          <br />
                          <label>其中會有一題(非選擇題)可以詳述你的用餐經驗</label>  
                          <input type="password" name="password" size="20"  minlength="8" maxlength="20" id="password" class="form-control" />  
                          <br />
                          <label>ACTIVATE</label>  
                          <select name="activate" id="activate" class="form-control">  
                               <option value="1">Yes</option>  
                               <option value="0">No</option>
                          </select>  
                          <br />    
						  <label>Select</label>  
<p><input type="radio" id="cod" name="disposition-group" value="0" CHECKED/> Cash on delivery
<p><input type="radio" id="cod" name="disposition-group" value="0" CHECKED/> Cash on delivery
<br><br>
                          <input type="hidden" name="userid" id="userid" />

                          <input type="submit" name="insert" id="insert" value="Submit" class="btn btn-success" />  
                     </form>  



</div>
<br>


			</div>
				</div>
			</div>
		</div>
<!-- Order History End -->	




	<!-- footer -->
	<?php
include 'include/front_footer.php';
	?>
</body>
</html>
