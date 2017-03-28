<?php 
$home_url = function_exists('pll_home_url') ? pll_home_url() : get_site_url();
?>

<!-- Navigation -->
<div class="navigation">
	<div class="container">
	    <input type="checkbox" id="hamburger"/>
		<label class="menuicon" for="hamburger">
  			<span></span>
		</label>
		<!-- <h2 class="menuicon-caption"><?php // _e('Menu') ?></h2> -->
		<a href="<?php echo $home_url ?>" class="logo">
			<h2>The Monkies</h2>
		</a>
		<div class="menu-wrapper">
			<?php wp_nav_menu(); ?>
		</div>
	</div>
</div>