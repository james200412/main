<?php
session_start();

if(!isset($_SESSION['feedback']) | !isset($_SESSION['feedbackoid'])){

	header('Location: index.php');

}

$fboid = $_SESSION['feedbackoid'];


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
				<h3>Feed Back Form</h3>
			</div>
		</div>
		<div class="contact_top">
			 		<div class="container">
			 			<div class="col-md-6 contact_left wow fadeInRight" data-wow-delay="0.4s">
<style>
        .Q1{width:100%;border-bottom:2px solid #CCC; line-height:50px;}
        .A1{width:100%;}
</style>


<form action="front_feedback_action.php?id=<?php echo $fboid;?>" method="post" id="feedback"> 
			<table class="Q1">
            <colgroup><col width="30px"><col></colgroup>            
            <tbody><tr><td>1.</td><td><label>Overall Satisfaction</td></tr>
            <tr><td>  
			</td><td>
            <table class="A1" id="ans1" border="0">
			<tbody><tr>
			<td><input id="ans1_0" type="radio" name="ans1-group" value="2" CHECKED/><label for="ans1_0">Very Good</label></td>
			<td><input id="ans1_1" type="radio" name="ans1-group" value="1"><label for="ans1_1">Good</label></td>
			<td><input id="ans1_2" type="radio" name="ans1-group" value="0"><label for="ans1_2">Normal</label></td>
			<td><input id="ans1_3" type="radio" name="ans1-group" value="-1"><label for="ans1_3">Bad</label></td>
			<td><input id="ans1_4" type="radio" name="ans1-group" value="-2"><label for="ans1_4">Very Bad</label></td>
			</tr>
			</tbody></table>
            </td></tr> 
            </tbody></table>
            <br /> 


			<table class="Q1">
            <colgroup><col width="30px"><col></colgroup>            
            <tbody><tr><td>2.</td><td><label>Are You Satisfaction For the Ordered Dish?</td></tr>
            <tr><td>  
			</td><td>
            <table class="A1" id="ans2" border="0">
			<tbody><tr>
			<td><input id="ans2_0" type="radio" name="ans2-group" value="1" CHECKED/><label for="ans2_0">Yes</label></td>
			<td><input id="ans2_1" type="radio" name="ans2-group" value="-1"><label for="ans2_1">No</label></td>
			<td><input id="ans2_2" type="radio" name="ans2-group" value="0"><label for="ans2_2">No Comment</label></td>
			</tr>
			</tbody></table>
            </td></tr> 
            </tbody></table>                          
            <br />  

            <label>Remark</label>  
            <input type="text" name="remark" id="remark" size="20" id="remark" class="form-control" />  
            <br />    

            <input type="submit" name="submit1" id="submit1" value="Submit" class="btn btn-success"/>  
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