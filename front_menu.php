<!DOCTYPE html>
<html>
<head>
<title>SC & FOOD | Menu</title>
<!--Add to cart js and css-->
<link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery-3.1.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
<!--Add to cart js and css-->


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
include 'include/front_topmenu.php';

?>
<!-- header-section-ends -->
<!-- content-section-starts -->

	<div class="Popular-Restaurants-content">
		<div class="Popular-Restaurants-grids">

<?php
if(isset($_SESSION['userid']) && $_SESSION['userlevel'] == 0){
//SESSION userid exist and user level = 0, user is login
?>

<!--Logined menu-->

			<div class="container">
		
<!-- head link-->
<div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="index.php" title="Go to Home Page">Home</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li>
                       Menu
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="index.php">Back to Home Page</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>	


<!-- Menu Start -->		
							
                            <?php
                            include 'db/dbconnect.php';
                            $query = "SELECT * FROM TBMENU where dtype IN ('food') AND activate IN ('1') ORDER BY id ASC";
                            $result = @mysqli_query($connect, $query);
// Cycle through the result set
                            echo '<br>';
                            while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="Popular-Restaurants-grid wow fadeInRight" data-wow-delay="0.4s">' .
                                '<div class="col-md-3 restaurent-logo"><img src="' . $row['dimage'] . '" class="img-responsive" alt="" /></div>' .
                                '<div class="col-md-5 restaurent-title"><div class="logo-title"><h4>' . $row['dname'] . '</h4></div>'.
                                '<div class="rating">'. $row['detail'] .'</div>';
                     		echo '</div>';
							echo '<div class="col-md-4 buy"><span>' . '$' . $row['dprice'] . 
                                '</span>
                                <a class="btn btn-success" href="cartaction.php?action=addToCart&id=' . $row["id"] . '">Add to cart</a>
                                </div>' .
                                '<div class="clearfix"></div>' .
                                '</div>';
                            }
                            mysqli_close($connect);
							?>  
					
					  
                            <?php
                            include 'db/dbconnect.php';
                            $query = "SELECT * FROM TBMENU where dtype IN ('drink') AND activate IN ('1') ORDER BY id ASC";
                            $result = @mysqli_query($connect, $query);
// Cycle through the result set
                            echo '<br>';
                            while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="Popular-Restaurants-grid wow fadeInRight" data-wow-delay="0.4s">' .
                                '<div class="col-md-3 restaurent-logo"><img src="' . $row['dimage'] . '" class="img-responsive" alt="" /></div>' .
                                '<div class="col-md-5 restaurent-title"><div class="logo-title"><h4>' . $row['dname'] . '</h4></div>'.
                                '<div class="rating">'. $row['detail'] .'</div>';
                     		echo '</div>';
							echo '<div class="col-md-4 buy"><span>' . '$' . $row['dprice'] . 
                                '</span>
                                <a class="btn btn-success" href="cartaction.php?action=addToCart&id=' . $row["id"] . '">Add to cart</a>
                                </div>' .
                                '<div class="clearfix"></div>' .
                                '</div>';
                            }
                            mysqli_close($connect);
                            ?>  




				
			</div><!--<div class="container"></div> end-->
<?php
//SESSION userid exist and user level = 0, user is login
}

else{
//Guest View Menu
?>



<!--Guest menu-->

<div class="container">

<!-- head link-->
<div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="index.php" title="Go to Home Page">Home</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li>
                       Menu
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="index.php">Back to Home Page</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>	


<!-- Menu Start -->
                <?php
//food
                include 'db/dbconnect.php';
                $query = "SELECT * FROM TBMENU where dtype IN ('food') AND activate IN ('1') ORDER BY id ASC";
                $result = @mysqli_query($connect, $query);
// Cycle through the result set
                echo '<br>';
                while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="Popular-Restaurants-grid wow fadeInRight" data-wow-delay="0.4s">' .
                    '<div class="col-md-3 restaurent-logo"><img src="' . $row['dimage'] . '" class="img-responsive" alt="" /></div>' .
                    '<div class="col-md-5 restaurent-title"><div class="logo-title"><h4>' . $row['dname'] . '</h4></div>'.
                    '<div class="rating">'. $row['detail'] .'</div>';
                echo '</div>';
                echo '<div class="col-md-4 buy"><span>' . '$' . $row['dprice'] . 
                    '</span><a class="btn btn-success" data-toggle="modal" data-target="#myModalguest">Add to cart</a></div>' .
                    '<div class="clearfix"></div>' .
                    '</div>';
                }
                mysqli_close($connect);
                ?>  
        
   
                <?php
//drink    
                include 'db/dbconnect.php';
                $query = "SELECT * FROM TBMENU where dtype IN ('drink') AND activate IN ('1') ORDER BY id ASC";
                $result = @mysqli_query($connect, $query);
// Cycle through the result set
                echo '<br>';
                while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="Popular-Restaurants-grid wow fadeInRight" data-wow-delay="0.4s">' .
                    '<div class="col-md-3 restaurent-logo"><img src="' . $row['dimage'] . '" class="img-responsive" alt="" /></div>' .
                    '<div class="col-md-5 restaurent-title"><div class="logo-title"><h4>' . $row['dname'] . '</h4></div>'.
                    '<div class="rating">'. $row['detail'] .'</div>';
                 echo '</div>';
                echo '<div class="col-md-4 buy"><span>' . '$' . $row['dprice'] . 
                    '</span><a class="btn btn-success"  data-toggle="modal" data-target="#myModalguest">Add to cart</a></div>' .
                    '<div class="clearfix"></div>' .
                    '</div>';
                }
                mysqli_close($connect);
                ?>  




    
</div><!--<div class="container"></div> end-->





<?php
}
?>



		</div>
	</div>
<!--menu-->

<!--footer-->
<?php
include 'include/front_footer.php';
?>

			
</body>
</html>


<!-- Guest Modal -->
<!-- Modal: modalCart -->
<div class="modal fade" id="myModalguest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Please Login</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body">

       Please Login and continue the Ordering Process. Thank you!
      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal: modalCart -->