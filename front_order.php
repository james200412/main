<!DOCTYPE html>
<html>
<head>
<title>order page</title>
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
			<div class="order-form-head text-center wow bounceInLeft" data-wow-delay="0.4s">
						<h3>Restaurant Order Form</h3>
						<p>Ordering Food Was Never So Simple !!!!!!</p>
					</div>
				<div class="col-md-6 order-form-grids">
					
					<div class="order-form-grid  wow fadeInLeft" data-wow-delay="0.4s">
						<h5>Order Information</h5>
								<span>Type of Order</span>
								 <div class="dropdown-button">           			
            			<select class="dropdown" tabindex="9" data-settings='{"wrapperClass":"flat"}'>
            			<option value="0">Pick up</option>	
						<option value="1">Delivery</option>
						<option value="2">Catering</option>
					  </select>
					</div>
		              <span>Restaurant Location</span>
					   <div class="dropdown-button wow">           			
            			<select class="dropdown" tabindex="9" data-settings='{"wrapperClass":"flat"}'>
            			<option value="0">Restaurent A,144 East MG Road Indore</option>	
						<option value="1">Restaurent B,64 Paarli Hills IndoreIndore</option>
					  </select> 
					</div>
					<span>Location name</span>
								 <div class="dropdown-button">           			
            			<select class="dropdown" tabindex="9" data-settings='{"wrapperClass":"flat"}'>
            			<option value="0">Secundrabad</option>	
						<option value="1">Location-1</option>
						<option value="2">Location-2</option>
					  </select>
					</div>
					<span>cuisine-name</span>
					   <div class="dropdown-button">           			
            			<select class="dropdown" tabindex="9" data-settings='{"wrapperClass":"flat"}'>
            			<option value="0">cuisine-name</option>	
						<option value="1">cuisine-name</option>
						<option value="2">cuisine-name</option>
					  </select> 
					</div>
					<input type="text" class="text" value="Time" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Time';}"><br>
					<div class="wow swing animated" data-wow-delay= "0.4s">
					<input type="button" value="order now">
					</div>
					</div>
				</div>
				<div class="col-md-6 ordering-image wow bounceIn" data-wow-delay="0.4s">
					<img src="frontend/images/order.jpg" class="img-responsive" alt="" />
				</div>
			</div>
		</div>



	<!-- footer -->
	<?php
include 'include/front_footer.php';
	?>
</body>
</html>