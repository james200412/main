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
<!--Tabs-->
<ul class="nav nav-tabs">


<?php
                include 'db/dbconnect.php';
                $query = "SELECT * FROM TBMENUTYPE where activate IN ('1') ORDER BY id ASC";
                $result = @mysqli_query($connect, $query);
//all dishes
echo '<li class="active"><a data-toggle="tab" href="#all">ALL Dishes</a></li>';
// Cycle through the result set
                while ($row = mysqli_fetch_assoc($result)) {
echo   '<li><a data-toggle="tab" href="#' . $row['id'] . '">'. $row['dtname'] .'</a></li>';
                }
                mysqli_close($connect);
        
                
?>
  </ul>

<div class="tab-content">
<?php
//all
echo '<div id="all" class="tab-pane fade in active">';
echo '<br>';
include 'db/dbconnect.php';
$q123 = "SELECT * FROM TBMENU where activate IN ('1') ORDER BY dtype ASC";
$re123 = mysqli_query($connect, $q123);

             while ($rowtx123 = mysqli_fetch_assoc($re123)) {
              echo '<div class="Popular-Restaurants-grid wow fadeInRight" data-wow-delay="0.4s">' .
                  '<div class="col-md-3 restaurent-logo"><img src="' . $rowtx123['dimage'] . '" style="height:150px; width:auto" class="img-responsive img-rounded" alt="" /></div>' .
                  '<div class="col-md-5 restaurent-title"><div class="logo-title"><h4>' . $rowtx123['dname'] . '</h4></div>'.
                  '<div class="rating">'. $rowtx123['detail'] .'</div>';
           echo '</div>';
echo '<div class="col-md-4 buy"><span>' . '$' . $rowtx123['dprice'] . 
                  '</span>
                  <a class="btn btn-danger" href="cartaction.php?action=addToCart&id=' . $rowtx123["id"] . '">Add to cart</a>
                  </div>' .
                  '<div class="clearfix"></div>' .
                  '</div>';
              }
             mysqli_close($connect);

echo '</div>';
//all end


                include 'db/dbconnect.php';
                $queryt = "SELECT * FROM TBMENUTYPE where activate IN ('1') ORDER BY id ASC";
                $resultt = @mysqli_query($connect, $queryt);
// Cycle through the result set
   while ($rowt = mysqli_fetch_assoc($resultt)) { 
   $typeid = $rowt['id'];
   echo '<div id="' . $typeid . '" class="tab-pane fade">';
   echo '<br>';
   

   $q = "SELECT * FROM TBMENU where dtype IN ('" . $typeid . "') AND activate IN ('1') ORDER BY id ASC";
   $re = mysqli_query($connect, $q);

// Cycle through the result set
                while ($rowtx = mysqli_fetch_assoc($re)) {
                  echo '<div class="Popular-Restaurants-grid wow fadeInRight" data-wow-delay="0.4s">' .
                      '<div class="col-md-3 restaurent-logo"><img src="' . $rowtx['dimage'] . '" style="height:150px; width:auto" class="img-responsive img-rounded" alt="" /></div>' .
                      '<div class="col-md-5 restaurent-title"><div class="logo-title"><h4>' . $rowtx['dname'] . '</h4></div>'.
                      '<div class="rating">'. $rowtx['detail'] .'</div>';
               echo '</div>';
    echo '<div class="col-md-4 buy"><span>' . '$' . $rowtx['dprice'] . 
                      '</span>
                      <a class="btn btn-danger" href="cartaction.php?action=addToCart&id=' . $rowtx["id"] . '">Add to cart</a>
                      </div>' .
                      '<div class="clearfix"></div>' .
                      '</div>';
                  }
                echo '</div>';
     }
                mysqli_close($connect);
        


                ?>  			
  </div>
<!--Tabs-->

					
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

<!--Tabs-->
<ul class="nav nav-tabs">


<?php
                include 'db/dbconnect.php';
                $query = "SELECT * FROM TBMENUTYPE where activate IN ('1') ORDER BY id ASC";
                $result = @mysqli_query($connect, $query);
//all dishes
echo '<li class="active"><a data-toggle="tab" href="#all">ALL Dishes</a></li>';
// Cycle through the result set
                while ($row = mysqli_fetch_assoc($result)) {
echo   '<li><a data-toggle="tab" href="#' . $row['id'] . '">'. $row['dtname'] .'</a></li>';
                }
                mysqli_close($connect);
        
                
?>
  </ul>

<div class="tab-content">
<?php
//all
echo '<div id="all" class="tab-pane fade in active">';
echo '<br>';
include 'db/dbconnect.php';
$q123 = "SELECT * FROM TBMENU where activate IN ('1') ORDER BY dtype ASC";
$re123 = mysqli_query($connect, $q123);

while ($rowtx123=mysqli_fetch_assoc($re123)){
// Cycle through the result set
             echo '<div class="Popular-Restaurants-grid wow fadeInRight" data-wow-delay="0.4s">' .
                 '<div class="col-md-3 restaurent-logo"><img src="' . $rowtx123['dimage'] . '" style="height:150px; width:auto" class="img-responsive img-rounded" alt="" /></div>' .
                 '<div class="col-md-5 restaurent-title"><div class="logo-title"><h4>' . $rowtx123['dname'] . '</h4></div>'.
                 '<div class="rating">'. $rowtx123['detail'] .'</div>';
             echo '</div>';
             echo '<div class="col-md-4 buy"><span>' . '$' . $rowtx123['dprice'] . 
                 '</span><a class="btn btn-danger" data-toggle="modal" data-target="#myModalguest">Add to cart</a></div>' .
                 '<div class="clearfix"></div>' .
                 '</div>';
             }
             mysqli_close($connect);

echo '</div>';
//all end


                include 'db/dbconnect.php';
                $queryt = "SELECT * FROM TBMENUTYPE where activate IN ('1') ORDER BY id ASC";
                $resultt = @mysqli_query($connect, $queryt);
// Cycle through the result set
   while ($rowt = mysqli_fetch_assoc($resultt)) { 
   $typeid = $rowt['id'];
   echo '<div id="' . $typeid . '" class="tab-pane fade">';
   echo '<br>';
   

   $q = "SELECT * FROM TBMENU where dtype IN ('" . $typeid . "') AND activate IN ('1') ORDER BY id ASC";
   $re = mysqli_query($connect, $q);

   while ($rowtx=mysqli_fetch_assoc($re)){
// Cycle through the result set
                echo '<div class="Popular-Restaurants-grid wow fadeInRight" data-wow-delay="0.4s">' .
                    '<div class="col-md-3 restaurent-logo"><img src="' . $rowtx['dimage'] . '" style="height:150px; width:auto" class="img-responsive img-rounded" alt="" /></div>' .
                    '<div class="col-md-5 restaurent-title"><div class="logo-title"><h4>' . $rowtx['dname'] . '</h4></div>'.
                    '<div class="rating">'. $rowtx['detail'] .'</div>';
                echo '</div>';
                echo '<div class="col-md-4 buy"><span>' . '$' . $rowtx['dprice'] . 
                    '</span><a class="btn btn-danger" data-toggle="modal" data-target="#myModalguest">Add to cart</a></div>' .
                    '<div class="clearfix"></div>' .
                    '</div>';
                }
                echo '</div>';
     }
                mysqli_close($connect);
        


                ?>  
                
<!--Food-->				
  </div>
<!--Tabs-->

    
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