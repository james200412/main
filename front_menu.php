<?php
echo'menu';

?>



   <!-- content-section-starts -->


   <div class="Popular-Restaurants-content">
          <div class="Popular-Restaurants-grids">             
                <div class="container">



                    <ul id="myTab" class="nav nav-tabs"  role="tablist">
					
						<?php
						    	date_default_timezone_set('Asia/Hong_Kong');
						    	$time = time();
							if (date('Hi', $time)>="0830" && date('Hi', $time)<"2330") {
								echo '<li class="active"><a href="#fish" data-toggle="tab">Food</a></li>'.
									 '<li><a href="#drink" data-toggle="tab">Drink</a></li>';
							}	else {
								echo"<p id='closed'>非營業時間</p>";
								echo"</div>";
								echo"<style>#closed{ min-height: 400px;}</style>";
                        
							}
						?>
					
                    </ul> 
                    

                    
                    <div id="myTabContent" class="tab-content">                                         
                        
                        <div class="tab-pane fade" id="fish">    

                            <?php
                            include 'db/dbconnect.php';
                            $query = "SELECT * FROM TBMENU where dtype IN ('food')";
                            $result = @mysqli_query($connect, $query);
// Cycle through the result set
                            echo '<br>';
                            while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="Popular-Restaurants-grid wow fadeInRight" data-wow-delay="0.4s">' .
                                '<div class="col-md-3 restaurent-logo"><a href="comment.php?id=' . $row['DISHID'] . '"><img src="images/menu/' . $row['DISHIMAGE'] . '" class="img-responsive" alt="" /></a></div>' .
                                '<div class="col-md-5 restaurent-title"><div class="logo-title"><h4><a href="#">' . $row['DISHNAME'] . '</a></h4></div>'.
                                '<div class="rating"><img src="images/star'.(int)$row['RATING'] . '.png" class="img-responsive" alt="" style="width:30%; height:30%"/></div>';
                                if($row['NUTTYPE']=='MEAT'){
                                        echo '<br/><br/><div class="nuticon"><img src="images/meat.png" class="img-responsive" alt="" style="width:6%; height:6%"/><p>肉類菜式</p></div></div>';}
                                else if($row['NUTTYPE']=='VEGGI'){
                                        echo '<br/><br/><div class="nuticon"><img src="images/vegetable.png" class="img-responsive" alt="" style="width:6%; height:6%"/><p>蔬果類菜式</p></div></div>';}
                                else if($row['NUTTYPE']=='CEREAL'){
                                        echo '<br/><br/><div class="nuticon"><img src="images/cereal.png" class="img-responsive" alt="" style="width:6%; height:6%"/><p>榖類菜式</p></div></div>';}
                                else {echo '</div>';}
                                echo '<div class="col-md-4 buy"><span>' . '$' . $row['PRICE'] . '</span><class="morebtn hvr-rectangle-in"><input type="button" data-toggle="modal" data-target="#myModal" name="' . $row['DISHID'] . '" id="' . $row['DISHID'] . '" value="購買" /></div>' .
                                '<div class="clearfix"></div>' .
                                '</div>';
                            }
                            mysqli_close($connect);
                            ?>   
                        </div>  

                    </div>

                    
                </div>               
            </div>
        </div>




                            <?php
                            include 'db/dbconnect.php';
                            $query = "SELECT * FROM TBMENU where dtype IN ('food')";
                            $result = @mysqli_query($connect, $query);
                            $row = mysqli_fetch_assoc($result);
                            echo '<br>';
                            while ($row = mysqli_fetch_assoc($result)) {
     echo '<div class="Popular-Restaurants-grid wow fadeInRight" data-wow-delay="0.4s">'.
                  '<div class="col-md-3 restaurent-logo"><img src="img/' $row['dimage']; '" class="img-responsive" alt="" width=100 height=100 />'.
                           ' </div>
                    
                    
					<div class="col-md-2 restaurent-title">


						<div class="logo-title">
                            <!--<h4><a href="#">pizza hut</a></h4>-->
                            <h4> ??????</h4>
						</div>
                        
                        
                        <div class="rating">
							<span>ratings</span>
                        </div>
                        
                        
                    </div>
                    

					<div class="col-md-7 buy">
						<span>$45</span>
						<input type="button" value="buy">
					</div>
                    
                    
                    <div class="clearfix"></div>
        </div>';
    }
    mysqli_close($connect);
        ?>



    