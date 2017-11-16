<!-- Mailchimp -->
<div class="container mailchimp">
	<h4>Nieuwsbrief</h4>
	<div class="row">
		<div class="col-md-4">
			<p>Wil je op de hoogte blijven van onze activiteiten? We sturen je maandelijks 1 nieuwsbrief met een overzicht. Je kan elk moment weer uitschrijven.</p>

		</div>
		<div class="col-md-8">

			<!-- Begin MailChimp Signup Form -->
			<p id="mc_embed_signup">
				<form action="https://themonkies.us17.list-manage.com/subscribe/post?u=22ba3e8381c5fdbeb839f4469&amp;id=63623f644c" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					<div id="mc_embed_signup_scroll">

						<div class="mc-field-group">
							<label for="mce-EMAIL">Email adres  <span class="asterisk">*</span>
							</label>
							<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
						</div>
						<div class="mc-field-group">
							<label for="mce-FNAME">Voornaam </label>
							<input type="text" value="" name="FNAME" class="" id="mce-FNAME">
						</div>
						<div class="mc-field-group">
							<label for="mce-LNAME">Achternaam </label>
							<input type="text" value="" name="LNAME" class="" id="mce-LNAME">
						</div>
						<div id="mce-responses" class="clear">
							<div class="response" id="mce-error-response" style="display:none"></div>
							<div class="response" id="mce-success-response" style="display:none"></div>
						</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
						<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_22ba3e8381c5fdbeb839f4469_63623f644c" tabindex="-1" value=""></div>
						<div class="clear"><input type="submit" value="Inschrijven" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
					</div>
				</form>
			</p>
			<!--End mc_embed_signup-->
		</div>	

	</div>
</div>




<!-- INSTAGRAM -->
	<div id="instagram" class="container">
		<div class="row">
			<?php echo do_shortcode('[instagram-feed]'); ?>
		</div>
	</div>


<!-- EVENTS SMALL -->
<?php // Retrieve the next 3 upcoming events
$events = tribe_get_events( array(
    'posts_per_page' => 3,
    'start_date' => time(),
) );
if(count($events) != 0){ ?>
	<div id="event-mini" class="container">
		<div class="row">
			<div class="col-md-3 col-sm-3">
				<!-- <h3>agenda</h3> -->
				<?php if(function_exists("pll_get_post")){ ?>
						<a href="<?php echo pll_home_url($slug)."events"; ?>"><h3><?php _e('agenda', 'themonkies') ?></h3></a>
				<?php }?>
			</div>
			<?php foreach ( $events as $post ) { ?>
			<div class="col-md-3 col-sm-3">
				<?php
		    		setup_postdata( $post );
					echo '<a href="'.get_the_permalink().'"><span>'.tribe_get_start_date( $post ).'</span><br>';
			    	echo $post->post_title.'</a>';
			    ?>
			</div>
			<?php }	?>
		</div>
	</div>
<?php } ?>


<footer>
&copy; The Monkies <?php echo date("Y"); ?> | <span class="dashicons dashicons-email-alt"></span> <a href="mailto:love@themonkies.nl">love@themonkies.nl</a> | <span class="dashicons dashicons-facebook-alt"></span> <a href="http://www.facebook.com/themonkies">Facebook</a> | Site by <a href="http://www.howaboutyes.com/">How About Yes</a>
</footer>

<!-- GOOGLE ANALYTICS -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-11737642-7', 'auto');
  ga('send', 'pageview');

</script>


<?php wp_footer(); ?>
</body>
</html>
