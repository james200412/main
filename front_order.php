<!DOCTYPE html>
<html>
<head>
<title>SC & FOOD | order page</title>
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
			<div class="order-form-head text-Right wow bounceInLeft" data-wow-delay="0.4s">
						<h3>Order History</h3>
					</div>
<!--Left Side-->

<?php
include 'db/dbconnect.php';
 $queryuser = "SELECT * FROM TBUSER WHERE id = '".$_SESSION["userid"]."'";  
 $resultuser = mysqli_query($connect, $queryuser);  
 $rowuser = mysqli_fetch_assoc($resultuser);

 $querysum = "SELECT SUM(amount) AS sum FROM TBORDER WHERE uid = '".$_SESSION["userid"]."'";  
 $resultsum = mysqli_query($connect, $querysum);  
 $rowsum = mysqli_fetch_assoc($resultsum);
 $sum = $rowsum['sum'];

 $querylast = "SELECT CAST(odate AS DATE) FROM TBORDER WHERE uid = '".$_SESSION["userid"]."' ORDER BY odate DESC";  
 $resultlast = mysqli_query($connect, $querylast);  
 $rowlast = mysqli_fetch_assoc($resultlast);
?>  

<div class="col-md-5 wow bounceIn" data-wow-delay="0.4s">
<br><br><br><br>
<div class="order-account">
<ul class="h4">
<?php
echo '<li><b>'. $rowuser['uname'] .'</b></li><br>';
echo '<li>Member Card ID： '. $rowuser['id'] .'</li>';
echo '<li>Accumulated Spending [Till '. $rowlast['CAST(odate AS DATE)'] .'] : $HKD '.$sum.'.00</li>';
?>
<br>
	<a class="btn btn-success" href="front_userinfo.php"><h4>Update Account Detail</h4></a>
</ul>
</div>
	
</div>

<!--Left Side end-->


<!-- Right Side Order History Start -->	
<style type="text/css">
       .order-account {
            border: solid 1px gray;
            border-bottom-width: 1px;
			border-radius: 10px;
			padding-left: 10px;
			width: 80%;
        }

       .order-history__content {
            border: solid 1px none;
            border-bottom-width: 1px;
			border-radius: 10px;
			width: 100%;
        }
		ul{
			list-style-type: none;
			padding-left: 5px;
		}
		li{
            padding-top: 5px;
            padding-bottom: 5px
		}

	.accordion {
  border-left: 5px solid lightgreen;
  background-color: #f1f1f1;
  list-style-type: none;
  padding: 10px 20px;
  border-radius: 20px;
  padding-left: 10px;
}
    </style>
	
<div class="col-md-6 ordering-image wow bounceIn" data-wow-delay="0.4s">
	<div class="order-history">
		<header class="order-history__header">
		<br>
			<h3>Past Orders - Only last 5 Orders will be display</h3> 
			<div class="text-right"><br></div></header>			

<?php
						$query = "SELECT * FROM TBORDER WHERE uid = '".$_SESSION['userid']."' ORDER BY id DESC LIMIT 5";
						$result = @mysqli_query($connect, $query);
						$numcount = mysqli_num_rows($result);
if($numcount > 0){
while ($row = mysqli_fetch_assoc($result)) {
echo '<div class="order-history__content">';
echo '<div class="accordion">';
echo '<ul><li class="accordion__item cf active">';
echo '<a href="#" class="accordion__title"><h4><u>'. $row['odate'] . '</u></h4><i class="fa fa-angle-up"></i></a>';
echo '<ul class="accordion__content" ><li>';
echo '<ul><li>Order ID#' . $row['id'] . '</li></ul>';

//Order content
$query1 = "SELECT * FROM TBORDER_DETAIL JOIN TBMENU ON (TBMENU.id = TBORDER_DETAIL.did) WHERE oid = '".$row['id']."' ORDER BY TBMENU.dprice DESC";
		$result1 = @mysqli_query($connect, $query1);
while ($row1 = mysqli_fetch_assoc($result1)) {
echo '<div class="order-detail"><div><h4 class="h4"><b>Item : </b>'. $row1['dname'] .' x '. $row1['qty'] .'</h4>';
echo '<div>Sub Total : $HKD '. $row1['subtotal'] .'.00</div>';
echo '<ul><li><b>Item detail : </b>';
echo '<div>'. $row1['detail'] .'</div>';
echo '</li></ul></div>';
}

echo '<br><div><div><p><b>Delivery Address:</b><br>'. $row['oaddress'] .'</p></div>

<ul><br><li><b>Order Total : </b>';
echo '$HKD '. $row['amount'] .'.00</li>
<li></li></ul></div></li></ul></li></ul></div></div>
<br>';
}
}else{
	echo 'No Order Placed Before!! <a href="front_menu.php" style="color:red;font-size:20px;">Order</a> Now!';
}
?>

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

<script>
(function () {
            var allItems = $('.accordion__item');
            // close all panels
            var allPanels = $('.accordion__content').hide();
            // when you click a title
            $('.accordion__title').click(function() {
                $(this).find('.fa').toggleClass('fa-angle-up fa-angle-down');
                $this = $(this);
                $target = $this.closest('li');
                // if open remove class and slide up
                if ($target.hasClass('active')) {
                    $target.removeClass('active');
                    $target.find('ul').slideUp();
                } else {
                    allItems.removeClass('active');
                    allItems.find('.accordion__title').find('.fa').removeClass('fa-angle-up');
                    allItems.find('.accordion__title').find('.fa').addClass('fa-angle-down');
                    $target.find('.accordion__title').find('.fa').toggleClass('fa-angle-up fa-angle-down');
                    allPanels.slideUp();
                    $target.addClass('active');
                    $target.find('ul').slideDown();
                }
                return false;
            });
        })();
		</script>