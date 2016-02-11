<?php
$query = $_SERVER['PHP_SELF'];
$path = pathinfo( $query );
$basename = $path['basename'];
?>

<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="../">
				VietSoul				
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">

<?php
if ($basename == 'index.php')
	echo '<li><a href="login.php" class="">Already have an account? Login now</a></li>';
else 
	echo '<li><a href="../registration" class="">Don\'t have an account?</a></li>';
?>

					<li class="">						
						<a href="../" class="">
							<i class="icon-chevron-left"></i>
							Back to Homepage
						</a>
						
					</li>
				</ul>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->