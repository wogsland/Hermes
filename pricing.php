<?php
include_once 'config.php';
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="Gary Peters">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- SITE TITLE -->
<title>GiveToken.com - Give a Token of Appreciation</title>

<!-- =========================
      FAV AND TOUCH ICONS  

<link rel="icon" href="assets/img/favicon.ico">
<link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="assets/img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="assets/img/apple-touch-icon-114x114.png">
============================== -->

<!-- =========================
     STYLESHEETS   
============================== -->
<!-- BOOTSTRAP -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- FONT ICONS -->
<link rel="stylesheet" href="assets/elegant-icons/style.css">
<link rel="stylesheet" href="assets/app-icons/styles.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<!--[if lte IE 7]><script src="lte-ie7.js"></script><![endif]-->

<!-- WEB FONTS -->
<link href='https://fonts.googleapis.com/css?family=Roboto:100,300,100italic,400,300italic' rel='stylesheet' type='text/css'>

<!-- CAROUSEL AND LIGHTBOX -->
<link rel="stylesheet" href="css/owl.theme.css">
<link rel="stylesheet" href="css/owl.carousel.css">
<link rel="stylesheet" href="css/nivo-lightbox.css">
<link rel="stylesheet" href="css/nivo_themes/default/default.css">

<!-- ANIMATIONS -->
<link rel="stylesheet" href="css/animate.min.css">

<!-- CUSTOM STYLESHEETS -->
<link rel="stylesheet" href="css/styles.css">

<!-- COLORS -->
<link rel="stylesheet" href="css/colors.css">

<!-- RESPONSIVE FIXES -->
<link rel="stylesheet" href="css/responsive.css">



<!--[if lt IE 9]>
			<script src="js/html5shiv.js"></script>
			<script src="js/respond.min.js"></script>
<![endif]-->

<!-- JQUERY -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

</head>

<body id="pricing-page">
<!-- =========================
     PRE LOADER       
============================== -->
<div class="preloader">
  <div class="status">&nbsp;</div>
</div>

<!-- =========================
     HEADER   
============================== -->
<header class="header" data-stellar-background-ratio="0.5" id="account-profile">

<!-- SOLID COLOR BG -->
<div class=""> <!-- To make header full screen. Use .full-screen class with solid-color. Example: <div class="solid-color full-screen">  -->

	<!-- STICKY NAVIGATION -->
	<div class="navbar navbar-inverse bs-docs-nav navbar-fixed-top sticky-navigation">
		<div class="container">
			<div class="navbar-header">
				
				<!-- LOGO ON STICKY NAV BAR -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#kane-navigation">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>

				<a class="navbar-brand" href="index.php"><img src="assets/img/logo-light.png" alt=""></a>
				
			</div>
			
			<!-- NAVIGATION LINKS -->
			<div class="navbar-collapse collapse" id="kane-navigation">
				<ul class="nav navbar-nav navbar-right main-navigation">
					<li><a href="index.php" class="external">Home</a></li>
					<li><a href="account.php" class="external">My Account</a></li>
					<li><a href="#">Login</a></li>
				</ul>
			</div>
		</div> <!-- /END CONTAINER -->
	</div> <!-- /END STICKY NAVIGATION -->
	
</div>
<!-- /END COLOR OVERLAY -->
</header>
<!-- /END HEADER -->

<!-- =========================
     PRICNG SECTION
============================== -->

<section class="" id="pricing-table">
	<div class="container mb30">
		<div class="pricing-tables attached">

        <h1 id="attached-narrow">Pricing Step One</h1>
        <div class="row">
          <div class="col-sm-3 col-md-3">
           
           <div class="plan first basic">

              <div class="head">
                <h2>Free</h2>
              
              </div>    
	
		          <div class="select-btn solid-blue"><button type="button" class="btn dark-grey" onclick="basicView()">Select <i class="fa fa-chevron-right"></i></button></div>

              <ul class="item-list">
								<li>Email Support</li>
								<li>The Core of Our Product</li>
								<li>&nbsp;</li>
								<li>&nbsp;</li>
								<li>&nbsp;</li>
								<li>&nbsp;</li>
								<li>&nbsp;</li>
								<li>&nbsp;</li>
								<li>&nbsp;</li>
              </ul>

              <div class="price">
                <h3><span class="symbol"></span>Free</h3>
                <h4>per month</h4>
              </div>

           </div>
             
            
          </div>


          <div class="col-sm-3 col-md-3 ">
              <div class="plan standard">

              <div class="head">
                <h2>Basic</h2>
              
              </div>    
	
		          <div class="select-btn solid-lt-blue"><button type="button" class="btn dark-grey" onclick="basicView()">Select <i class="fa fa-chevron-right"></i></button></div>

              <ul class="item-list">
								<li>Email Support</li>
								<li>Open Saved Tokens</li>
								<li>Embed Link</li>
								<li>&nbsp;</li>
								<li>&nbsp;</li>
								<li>&nbsp;</li>
								<li>&nbsp;</li>
								<li>&nbsp;</li>
								<li>&nbsp;</li>
              </ul>

              <div class="price">
                <h3><span class="symbol">$</span>2.99</h3>
                <h4>per month</h4>
              </div>

           </div>

          </div>


          <div class="col-sm-3 col-md-3 ">
              
              <div class="plan recommended">
								<div class="popular-badge">MOST POPULAR</div>
                <div class="head">
                  <h2>Premium</h2>
                </div>    
	
		            <div class="select-btn solid-lt-green"><button type="button" class="btn teal" onclick="premiumView()">Select <i class="fa fa-chevron-right"></i></button></div>

                <ul class="item-list">
									<li>8 HR Response Support</li>
									<li>Open Saved Tokens</li>
									<li>Embed Link</li>
									<li>Letter Formatting</li>
									<li>Analytics</li>
									<li>Advanced Send</li>
									<li>Animation Opener</li>
									<li>&nbsp;</li>
									<li>&nbsp;</li>
                </ul>

                <div class="price">
                  <h3><span class="symbol">$</span>49.99</h3>
                  <h4>per month</h4>
                </div>
           </div>

          </div>

          <div class="col-sm-3 col-md-3 ">
              
              <div class="plan last enterprise">

                <div class="head">
                  <h2>Enterprise</h2>
                </div>  
	
		            <div class="select-btn solid-green"><button type="button" class="btn dark-grey" onclick="entView()">Select <i class="fa fa-chevron-right"></i></button></div>
		            
                <ul class="item-list">
									<li>24/7 Response Support</li>
									<li>Open Saved Tokens</li>
									<li>Embed Link</li>
									<li>Custom Letter Formatting</li>
									<li>Advanced Analytics</li>
									<li>Advanced Send</li>
									<li>Custom Animation Opener</li>
									<li>Enterprise Shareable Library</li>
									<li>Token Collections</li>
                </ul>

                <div class="price">
                  <h3><span class="symbol">$</span>120</h3>
                  <h4>per user per month</h4>
                </div>

                
           </div>

          </div>

        </div> <!-- row-->

      </div>
	</div><!-- /contentpanel -->
</section>

<!-- Section for choosing Trackable Viewers-->
<section class="pricingChart not" id="pricingChart">
	<div class="container">
		<div class="verticleHeight40"></div>
		<h1 id="attached-narrow">Pricing Step Two -- Number of Trackable Viewers</h1>
		<div class="row pricingChart" id="getStarted">
      		<div class="span12 text-center clearfix">
          		<div class="pricingLevel pricingLevelOn" id="pricing500" onclick="pricingSwitchLevel(500)">
              		<div class="pricingImage"></div>
              		1-500
          		</div>

          		<div class="pricingLevel pricing2500" id="pricing2500" onclick="pricingSwitchLevel(2500)">
              		<div class="pricingImage"></div>
              		501-<span>2,500</span>
          		</div>

          		<div class="pricingLevel pricing5000" id="pricing5000" onclick="pricingSwitchLevel(5000)">
              		<div class="pricingImage"></div>
              		2,501-<span>5,000</span>
          		</div>

          		<div class="pricingLevel pricing10000" id="pricing10000" onclick="pricingSwitchLevel(10000)">
              		<div class="pricingImage"></div>
              		5,001-<span>10,000</span>
          		</div>

      		</div> <!-- end span12 -->
  		</div>
  	</div>
</section>

<!-- Section for choosing Users-->
<section class="pricingChart not" id="pricingChart2">
	<div class="container">
		<div class="verticleHeight40"></div>
		<h1 id="attached-narrow">Pricing Step Three -- How many Enterprise Users</h1>
		<div class="row pricingChart" id="getStarted2">
      		<div class="span12 text-center clearfix">
          		<div class="pricingLevel2 pricingLevelOn2" id="pricingU1" onclick="pricingSwitchLevel2(1)">
              		<div class="pricingImage"></div>
              		1-10
          		</div>

          		<div class="pricingLevel2 pricingU2" id="pricingU2" onclick="pricingSwitchLevel2(2)">
              		<div class="pricingImage"></div>
              		11-<span>50</span>
          		</div>

          		<div class="pricingLevel2 pricingU3" id="pricingU3" onclick="pricingSwitchLevel2(3)">
              		<div class="pricingImage"></div>
              		51-<span>180</span>
          		</div>

          		<div class="pricingLevel2 pricingU4" id="pricingU4" onclick="pricingSwitchLevel2(4)">
              		<div class="pricingImage"></div>
              		180+
          		</div>

      		</div> <!-- end span12 -->
  		</div>
  	</div>
</section>

<!-- Dynamic Price-->
<section class="pricingChart">
  	<div class="container">
		<div class="row pricingChart" id="topPricingChart">
	      	<div class="span12 blueBgWhiteCopy">
	          	<div class="row">
	              	<div class="span10 offset1 text-center">
	                  	<div class="pricingAmounts">
	                      	<span class="pricingDolla">$</span><span class="pricingLargeAmount pricingAnnualDiscountedPrice">25</span><span class="pricingPerMonthLabel">/month</span>
	                  	</div>
	              	</div>
	          	</div>
	      	</div>
  		</div>
		<div class="row pricingChart">
	      	<div class="span12 blueBgWhiteCopy showFormButton">
	          	<div class="row text-center">
	              	<div class="span8 offset2 text-center">
	                  	<div class="btn btn-default btn-lg standard-button" onclick="showForm()">Continue</div>
	              	</div>
	          	</div>
	      	</div>
  		</div>
		<div class="verticleHeight40"></div>
	</div>
</section>



<!-- =========================
     FOOTER 
============================== -->
<footer id="contact" class="deep-dark-bg mt20">

<div class="container">
	<div class="verticleHeight40"></div>
	<!-- LOGO -->
	<img src="assets/img/logo-light.png" alt="LOGO" class="responsive-img">
	
	<!-- SOCIAL ICONS -->
	<ul class="social-icons">
		<li><a href="#"><i class="social_facebook_square"></i></a></li>
		<li><a href="#"><i class="social_twitter_square"></i></a></li>
		<li><a href="#"><i class="social_pinterest_square"></i></a></li>
		<li><a href="#"><i class="social_googleplus_square"></i></a></li>
		<li><a href="#"><i class="social_instagram_square"></i></a></li>
		<li><a href="#"><i class="social_flickr_square"></i></a></li>
	</ul>
	
	<!-- COPYRIGHT TEXT -->
	<p class="copyright">
		©2015 GiveToken.com &amp; Giftly Inc., All Rights Reserved
	</p>

</div>
<!-- /END CONTAINER -->
 
</footer>
<!-- /END FOOTER -->


<!-- =========================
     SCRIPTS 
============================== -->
<script>
		function add(text){
	    var TheTextBox = document.getElementById("Mytextbox");
	    TheTextBox.value = TheTextBox.value + text;
		}

		function pricingSwitchLevel(size) {

        selected_account_size = size;

        $('.pricingLevelOn').removeClass('pricingLevelOn');
        var tab = $('#pricing' + size.toString());
        tab.addClass('pricingLevelOn');
    	}

		function pricingSwitchLevel2(size2) {

        selected_user_size = size2;

        $('.pricingLevelOn2').removeClass('pricingLevelOn2');
        var tab = $('#pricingU' + size2.toString());
        tab.addClass('pricingLevelOn2');
    	}

    	function basicView() {
        	$('#pricingChart').removeClass('not').addClass('not');
        	$('#pricingChart2').removeClass('not').addClass('not');
    	}

    	function premiumView() {
        	$('#pricingChart').removeClass('not');
        	$('#pricingChart2').removeClass('not').addClass('not');
    		$('html,body').animate({
        		scrollTop: $("#pricingChart").offset().top},
        		'slow');
    	}

    	function entView() {
        	$('#pricingChart').removeClass('not');
        	$('#pricingChart2').removeClass('not');
    		$('html,body').animate({
        		scrollTop: $("#pricingChart").offset().top},
        		'slow');
    	}
	
</script>

<script src="js/bootstrap.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.localScroll.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/nivo-lightbox.min.js"></script>
<script src="js/simple-expand.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/retina-1.1.0.min.js"></script>
<script src="js/jquery.nav.js"></script>
<script src="js/matchMedia.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.fitvids.js"></script>
<script src="js/custom.js"></script>

</body>
</html>