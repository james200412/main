<?php

$orderid = $_POST['orderid'];
$date = $_POST['orderdate'];
	
include 'db/dbconnect.php';
$query = "SELECT * FROM TBORDER where id = '$orderid' AND odate BETWEEN '$date 00:00:00' AND '$date 23:59:59'";

$result = @mysqli_query($connect, $query);
$num = mysqli_num_rows($result); 

if(isset($orderid) && isset($date) && $num > 0){
session_start();
$_SESSION['feedbackoid'] = $_POST['orderid'];
$_SESSION['feedback'] = '1';

	header('Location: front_feedback.php');
}else if(isset($orderid) && isset($date)){
	echo '<script type="text/javascript">alert ("No Order Found!");</script>';
}



//FeebBack Form Action from front_feedback.php
if(isset($_POST['submit1']) && isset($_GET['id'])){
unset($_SESSION['feedbackoid']);

$fborderid = $_GET['id'];
$remarkfb = $_POST['remark'];	
$ans1= (int)$_POST['ans1-group'];
$ans2= (int)$_POST['ans2-group'];


//insert remark to feed back table
$queryfb = "INSERT INTO TBFEEDBACK (oid, remark, overallrate) VALUES ('".$fborderid."', '".$remarkfb."', '".$ans1."');";
$resultfb = @mysqli_query($connect, $queryfb);

//fecth ordered dish id by order id from order detail
$querygetod = "SELECT did FROM TBORDER_DETAIL WHERE oid =".$fborderid."";
$resultgetod = @mysqli_query($connect, $querygetod);
while($rowfod = mysqli_fetch_array($resultgetod)){

$rowdid1 = $rowfod['did'];
//update rating to menu table
$querydrate = "UPDATE TBMENU SET  
rating = rating + $ans2
WHERE id=".$rowdid1."";
$resultdrate = mysqli_query($connect, $querydrate);

}

echo "<script type='text/javascript'>alert('Thank you for feed back!');
window.location='index.php';
</script>";
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
	  					  

<Strong>
<p>You are welcome to participate in the SC & FOOD customer experience survey. 
<p>We value your feedback and thank you for your willingness to take 10 minutes to complete this survey and provide valuable advice to Us.
</Strong>

<p>Please enter the following information according to your Order.
						  <form action="#" method="post" id="feedback">  
                          <label>Order ID : </label> (e.g. : 100001)
                          <input type="text" name="orderid" id="orderid" class="form-control" style="width: 50%" />  
                          <br />  
                          <label>Order Date</label>  
                          <input type="date" name="orderdate" id="orderdate" class="form-control" style="width: 50%" data-date-format="YYYY-MM-DD"></textarea>  
                          <br />    
                          <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success" />  
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