<?php
session_start();
if ($_SESSION['user']) {
    $login = true;
} else {
    $login = false;
}
?>
<style>
#cf3 {
  position:relative;
  height:26px;
  width:88px;
  margin:0 auto;
}

#cf3 img {
  position:absolute;
  left:0;
  -webkit-transition: opacity 1s ease-in-out;
  -moz-transition: opacity 1s ease-in-out;
  -o-transition: opacity 1s ease-in-out;
  transition: opacity 1s ease-in-out;
}


  @keyframes cf3FadeInOut {
  0% {
  opacity:1;
}
45% {
opacity:1;
}
55% {
opacity:0;
}
100% {
opacity:0;
}
}

#cf3 img.top {
animation-name: cf3FadeInOut;
animation-timing-function: ease-in-out;
animation-iteration-count: infinite;
animation-duration: 1s;
animation-direction: alternate;
}
</style>

<!--- css link --->
<link rel="stylesheet" href="css/topcss.css" type="text/css" />
<!--- css end --->
<div class="header">
    <div class="container">
        <div class="top-header">
            <div class="logo">
                <a href="homepage.php"><img src="images/logo.png" class="img-responsive" alt="" /></a>
            </div>
            <div class="queries">
                <p> 電話查詢: <span>2713-4717 </span><label>(營業時間 08:30 to 22:30)</label>&nbsp;&nbsp;<a href="trackRecord.php">我的訂單</a></p>
            </div>
            <div class="header-right">
     <!--    <a href="menu.php"  class="order-now-button"><img src="images/order-now-button1.png" style="max-height: 26px; max-width: 88px;"></a>  -->       
           <a href="menu.php">
            <div id="cf3">
                <img class="bottom" src="images/order-now-button1.png" style="max-height: 26px; max-width: 88px;" />
                <img class="top" src="images/order-now-button2.png" style="max-height: 26px; max-width: 88px;" />
            </div>
            </a>
                <!-- 3 icons -->
                <div class="dropdown">
                    <span><a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class ="image" src="images/user02.jpg" alt="login"></a></span>
                    <div class="dropdown-content">
                        <?php
                        if (!$login) {
                            ?>

                            <form id="loginForm" form action="login.php" method="post">
                                <fieldset id="body">
                                
                                    <label for="OUID">用户編號:</label>
                                    <input type="text" class="form-control" value=""  name="id" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                    this.value = '';
                                                }" maxlength="8" placeholder="請輸入你的用户編號">

                                    <label for="password">密碼:</label>
                                    <input type="password" class="form-control" value="" name="pw" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                    this.value = '';
                                                }" maxlength="255" placeholder="請輸入你的密碼">

                                    <input id= "login" value="登入" type="submit">
                                </fieldset>
                            </form>
                            <?php
                        } else if ($login) {
                            ?>
                            <form id="logoutForm" form action="logout.php" method="post">
                                <fieldset id="body01">

                                    <input id= "logout" value="登出" type="submit">
                                </fieldset>
                            </form>	

                            <?php
                        }
                        ?>
                    </div>
                </div>

                <div class="dropdown">
                    <span><a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class ="image" src="images/search.jpg" alt="search"></a></span>
                    <div class="dropdown-content">
                        <div class="search-form">
                            <form action="search.php" method="post" class="navbar-form">        
                                <input type="text" class="search-text" name="Search" placeholder="搜尋食品名稱...">
                                <button type="submit" name="submit" class="search-submit"><img src="images/search_h.jpg" alt="search"></button>
                                <br><br><a class="advbutton" href="advancedSearch.php">進階搜尋</a>
                            </form>

                        </div>
                    </div>

                </div>

                <div class="dropdown">
                    <span><a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class ="image" src="images/cart03.jpg" alt="shopping-cart"></a></span>
                    <div class="dropdown-content">
                        <div class="cart-box">                             

                            <?php
                            $userid = $_SESSION['user'];
                            echo '<form method="post" action="checkout_procedure.php">';
							
                                if (!$login) {
                                    echo '<p style="text-align:right">請先登入</p>';
                                } else if ($login) {
                                    include './mysqli_connect.php';
                                    $query = "select * from SALE_ADD where userID = '$userid'";
                                    $result = mysqli_query($dbc, $query);
                                    
                                    if (mysqli_num_rows($result) > 0) {
										echo '<table class="table">'.
											  '<thead>'.
												 '<tr>'.
												 '<th>商品名稱</th>'.
												 '<th>單價</th>'.
												 '<th>數量</th><tr>'.
                                                                                 
												 '</thead>'.
												 '<tbody>';
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<tr>'.
												 '<td>' . $row['item_add'] . '</td>'.
												 '<td>' . $row['price'] . '</td>' .
												 '<td>' . $row['quantity'] . '</td>'.
												 '<tr>';
												 
                                        }										
                                        echo '</tbody></table>';
                                        echo '<a href="checkout_procedure.php" class="button">付款</a>';
                                    }   else {
                                        echo '<p style="text-align:right">空購物車</p>';
                                    }
                                }
							
                            echo '</form>';    
                            ?>
                <!--
                            <p><a href="javascript:;" class="simpleCart_empty">清除購物車資料</a></p>    

                            <a href="checkout_procedure.php" class="button">Checkout</a>  
                -->
                            <div class="clearfix"> </div>
                        </div>   

                    </div>
                </div>
            </div>

            <!-- 3 icons end -->
            <div class="clearfix"></div>
        </div>
    </div>

    <!-- neviagetion bar -->
    <!-- responsiveslides -->
    <script src="js/responsiveslides.min.js"></script>
    <script>
                                        // You can also use "$(window).load(function() {"
                                        $(function () {
                                            // Slideshow 4
                                            $("#slider3").responsiveSlides({
                                                auto: true,
                                                pager: false,
                                                nav: false,
                                                speed: 500,
                                                namespace: "callbacks",
                                                before: function () {
                                                    $('.events').append("<li>before event fired.</li>");
                                                },
                                                after: function () {
                                                    $('.events').append("<li>after event fired.</li>");
                                                }
                                            });
                                        });
    </script>
    <!-- responsiveslides -->
    <div class="container">
        <div class="callbacks_container">
            <ul class="rslides" id="slider3"><li>
                    <div class="navigation text-center">
                        <span class="menu"><img src="images/menu.png" alt=""/></span>
                        <ul class="nav1">
                            <li class="active"><a href="homepage.php">主頁</a></li>
                            <li><a href="menu.php">餐牌</a></li>
                            <li><a href="NutritionAnalysis.php">營養分析</a></li>
                            <li><a href="redeem.php">積分優惠</a></li>
                            <li><a href="accountInfo.php">用戶資訊</a></li>
                            <div class="clearfix"></div>
                        </ul>
                    </div>
                </li></ul>
        </div>
        <!-- nevigation bar end-->

        <!-- login log -->	
    </div>

</div>		