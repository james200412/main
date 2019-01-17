<?php
if(!isset($_SESSION['feedback'])){

	header('Location: index.php');

}
?>
<!DOCTYPE html>
<html>
<head>
<title>SC & FOOD | Feed Back</title>
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



	<div class="contact-section-page">
		<div class="contact-head">
		    <div class="container">
				<h3>Feed Back</h3>
			</div>
		</div>
		<div class="contact_top">
			 		<div class="container">
			 			<div class="col-md-6 contact_left wow fadeInRight" data-wow-delay="0.4s">
	  					  
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

			
						</div>
					</div>
	</div>
	<!-- footer-section-starts -->
<?php

include 'include/front_footer.php';

?>
</body>
</html>