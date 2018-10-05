<!-- addthis -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58cc031f5b78ab73"></script> 
<!-- addthis -->

		<div class="contact-section" id="contact">
			<div class="container">
				<div class="contact-section-grids">
					<div class="col-md-3 contact-section-grid wow fadeInLeft" data-wow-delay="0.4s">
						<h4>餐飲</h4>
						<ul>
							<li><i class="point"></i></li>
							<li class="data"><a href="./menu.php">餐牌</a></li>
						</ul>
						<ul>
							<li><i class="point"></i></li>
							<li class="data"><a href="./redeem.php">優惠</a></li>
						</ul>
						<ul>
							<li><i class="point"></i></li>
							<li class="data"><a href="./NutritionAnalysis.php">營養分析</a></li>
						</ul>
                        <ul>
							<li><i class="point"></i></li>
							<li class="data"><a href="./foodranking.php">食物人氣排行榜</a></li>
						</ul>
					</div>
					<div class="col-md-3 contact-section-grid wow fadeInLeft" data-wow-delay="0.4s">
						<h4>帳戶</h4>
						<ul>
							<li><i class="point"></i></li>
							<li class="data"><a href="./changePWPage.php">更改密碼</a></li>
						</ul>
						<ul>
							<li><i class="point"></i></li>
							<li class="data"><a href="./balancePage.php">用戶查詢</a></li>
						</ul>
                        <ul>
							<li><i class="point"></i></li>
							<li class="data"><a href="./accumulatedPoint.php">積分</a></li>
						</ul>
                        <ul>
							<li><i class="point"></i></li>
							<li class="data"><a href="./menu.php">美食投票</a></li>
						</ul>
					</div>
					<div class="col-md-3 contact-section-grid wow fadeInRight" data-wow-delay="0.4s">
						<h4>關於我們</h4>
						<ul>
							<li><i class="point"></i></li>
							<li class="data"> <a href="./company.php">公司簡介</a></li>
						</ul>
						<ul>
							<li><i class="point"></i></li>
							<li class="data"> <a href="./contact.php">聯絡我們</a></li>
						</ul>
						<ul>
							<li><i class="point"></i></li>
							<li class="data"><a href="./privacy-terms.php">隱私政策</a></li>
						</ul>
					</div>
					<div class="col-md-3 contact-section-grid nth-grid wow fadeInRight" data-wow-delay="0.4s">
						<h4>食物搜尋</h4>
						<p>請寫出食品名稱: </p>
                         		   <form action="search.php" method="post">    
						<input type="text" name="Search" class="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
						<input type="submit" name="submit" value="搜尋">
						<br><br><a class="advbutton" href="advancedSearch.php">進階搜尋</a>
                         		   </form>
							<br><div class="addthis_inline_share_toolbox_zd2j_wfza"></div>
						</div>

					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	
	<!-- content-section-ends -->
	<!-- footer-section-starts -->	
	<div class="footer">
		<div class="container">
			<p class="wow fadeInLeft" data-wow-delay="0.4s">&copy; 2016  All rights  Reserved | By &nbsp;<a href="company.php">Nite</a></p>
		</div>
	</div>
	<!-- footer-section-ends -->
	  <script type="text/javascript">
						$(document).ready(function() {
							/*
							var defaults = {
					  			containerID: 'toTop', // fading element id
								containerHoverID: 'toTopHover', // fading element hover id
								scrollSpeed: 1200,
								easingType: 'linear' 
					 		};
							*/
							
							$().UItoTop({ easingType: 'easeOutQuart' });
							
						});
					</script>
				<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>