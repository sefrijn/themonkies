<?php 
$home_url = function_exists('pll_home_url') ? pll_home_url() : get_site_url();
?>

<!-- Header -->
<header class="wrapper">
	<div class="container site-header">
		<a href="<?php echo $home_url ?>">The Monkies</a>
		<p>Creating a happy life on planet earth together.</p>
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