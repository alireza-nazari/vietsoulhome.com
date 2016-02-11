<?php include "includes/header.php"; ?>
<?php include "includes/connection.php"; ?>

<body class="landing">
	<div id="page-wrapper">
    <!-- Navigation -->
<?php include "includes/navbar.php"; ?>

<!-- Banner -->
<section id="banner">
	<div class="content">
		<header>
			<h2>Welcome to VietSoul</h2>
			<p>A family-owned restaurant in Richmond, TX<br />
			where you can discover all about the Vietnamese cuisine.</p>
		</header>
		<span class="image"><img src="images/vn-logo.png" alt="" style="height: 100%;" /></span>
	</div>
	<a href="#one" class="goto-next scrolly">Next</a>
</section>

<!-- One -->
<section id="one" class="spotlight style1 top">
	<span class="image fit main"><img src="images/vietcuisine.jpg" alt="" style="width: 100%; height: auto" /></span>
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="5u 12u$(medium)">
					<header>
						<h2>Vietnamese cuisine</h2>
						<p>A style of cooking with complementary textures, reliance on herbs and vegetables</p>
					</header>
				</div>
				<div class="3u 12u$(medium)">
					<p>Our food features a combination of five fundamental tastes: 
					Sour, Bitter, Sweet, Spicy, and Salty.</p>
					<p>Each Vietnamese dish has 
					a distinctive flavor which reflects one or more of these elements.</p>
				</div>
				<div class="4u$ 12u$(medium)">
					<p>Our cuisine is listed as one of the healthiest in the world. Our food usually contain plenty of vegetables
					 and herbs which ensure that you get your daily recommended dose of Vitamin E and A.<br/> These vitamins help reverse ageing 
					 which is why we look young all the time. Most of our broth take hours to prepare and is rich with vitamins and minerals 
					 which will help boost your immunity.</p>
				</div>
			</div>
		</div>
	</div>
	<a href="#two" class="goto-next scrolly">Next</a>
</section>

<!-- Two -->
<section id="two" class="spotlight style2 right">
	<span class="image fit main"><img src="images/vietsoul-front.jpg" alt="" /></span>
	<div class="content">
		<header>
			<h2>Our restaurant</h2>
			<p>We are a family-owned business</p>
		</header>
		<p>We are very happy to present you our traditional, homemade style of cooking.
		We believe that all food should be served within the day it is cooked; and with our
		fresh ingredients, we hope to bring you the best experience to Vietnamese cuisine.</p>
		<ul class="actions">
			<li><a href="#four" class="button scrolly">Learn more about Our Services</a></li>
		</ul>
	</div>
	<a href="#three" class="goto-next scrolly">Next</a>
</section>

<!-- Three -->
<section id="three" class="spotlight style3 left">
	<span class="image fit main bottom"><img src="images/pic03.jpg" alt="" /></span>
	<div class="content">
		<header>
			<h2>Our products</h2>
			<p>We present you the most famous Vietnamese dishes with our exceptional recipe</p>
		</header>
		<p>We exclusively choose out most famous, healthiest and newcomer-friendly dishes to get
		you started with Vietnamese cuisine.</p>
		<p>We take pride in our products.</p>
		<ul class="actions">
			<li><a href="menu/" class="button">Take a Look at Our Menu</a></li>
		</ul>
	</div>
	<a href="#four" class="goto-next scrolly">Next</a>
</section>

<!-- Four -->
<section id="four" class="wrapper style1 special fade-up">
	<div class="container">
		<header class="major">
			<h2>Our Services</h2>
			<p>We offer Online ordering for your convinience as well as improving our service overall</p>
		</header>
		<div class="box alt">
			<div class="row uniform">
				<section class="4u 6u(medium) 12u$(xsmall)">
					<span class="icon alt major fa-fighter-jet"></span>
					<h3>Exceptional service</h3>
					<p>We hold true to the qoute <em>"Customer is God"</em> with all our hearts.</p>
				</section>
				<section class="4u 6u$(medium) 12u$(xsmall)">
					<span class="icon alt major fa-cutlery"></span>
					<h3>Excellent products</h3>
					<p>All our food is daily-cooked and extremely healthy.</p>
				</section>
				<section class="4u$ 6u(medium) 12u$(xsmall)">
					<span class="icon alt major fa-coffee"></span>
					<h3>Exclusive dinning atmosphere</h3>
					<p>Take your experience to the next level.</p>
				</section>
				<section class="4u 6u$(medium) 12u$(xsmall)">
					<span class="icon alt major fa-wifi"></span>
					<h3>Enjoy your meal</h3>
					<p>Free wifi and cozy atmosphere to make you feel like home.</p>
				</section>
				<section class="4u 6u(medium) 12u$(xsmall)">
					<span class="icon alt major fa-shopping-cart"></span>
					<h3>Online Ordering</h3>
					<p>Fully customizable your order online.</p>
				</section>
				<section class="4u$ 6u$(medium) 12u$(xsmall)">
					<span class="icon alt major fa-money"></span>
					<h3>Online Payment</h3>
					<p>Walk-in and walk-out the restaurant <strong>FAST</strong>.</p>
				</section>
			</div>
		</div>
		<footer class="major">
			<ul class="actions">
				<li><a href="registration/" class="button special">SignUp and LogIn to Order Online</a></li>
			</ul>
		</footer>
	</div>
</section>

<!-- Five -->
<section id="five" class="wrapper style2 special fade" style="background: #DB3E4E">
	<div class="container">
		<header>
			<h2>Tell us about it</h2>
			<p>Have any problems? Leave your comment here to help us to improve our service ...</p>
			<p>We are appreciated your critique!</p>
		</header>
		<form method="post" action="#" class="container 50%">
			<div class="row uniform 50%">
				<div class="8u 12u$(xsmall)"><input type="email" name="email" id="email" placeholder="Your Email Address" /></div>
				<div class="4u$ 12u$(xsmall)"><input type="submit" value="Get Involved" class="fit special" /></div>
				<div class="12u$"><textarea rows="4" name="comment" id="comment" placeholder="Your Comment" style="resize: none"></textarea><div>
			</div>
		</form>
	</div>
</section>
        <!-- Footer -->
<?php include "includes/footer.php"; ?>