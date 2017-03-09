<!-- Navigation -->
<div class="navigation">
	<?php wp_nav_menu(); ?>
</div>
<header class="wrapper">
	<div class="container">
		<a href="<?php
			if (function_exists('pll_home_url')) {
				echo pll_home_url();
			}else{
				echo get_site_url();	
			}
 			?>">
				The Monkies
			</a>
		<p>Creating a nice life on planet earth together.</p>
		<?php if (function_exists('pll_current_language')) { ?>
			<div id="lang" class="dropdown">
			  <a href="#" class="button" id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    <?php echo pll_current_language('name');?>
			    <span class="caret"></span>
			  </a>
			  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel">
				<?php pll_the_languages();?>
			  </ul>
			</div>
		<?php } ?>
	</div>
</header>