<?php
/**
 * @package Sefrijn
 * Template Name: Inspiration
 */

	get_header();
	require("lib/settings.php");
?>
<div class="page inspiration">
<!-- 	<div id="filter">
		<ul class="subtitle">
			<li data-filter="all">All</li>
			<li data-filter="blog">Blog</li>
			<li data-filter="tumblr">Tumblr</li>
			<li data-filter="tweet">Twitter</li>
			<!-- <li data-filter="instagram">Instagram</li> -->
	<!-- </ul>
	</div> -->
	<div class="loading">
		<div class="sk-folding-cube">
			<div class="sk-cube1 sk-cube"></div>
			<div class="sk-cube2 sk-cube"></div>
			<div class="sk-cube4 sk-cube"></div>
			<div class="sk-cube3 sk-cube"></div>
		</div>
		<p>loading...</p>
	</div>
	<div class="grid">
			<?php 
			$pages = query_posts('post_type=post');
			if($pages){ /* display the children content  */
	  		foreach ($pages as $post) :
	  			setup_postdata($post); ?>
					<a class="post blog" data-date="<?php echo strtotime(get_the_date("n/j/Y")); ?>" href="<?php the_permalink(); ?>">
		  			<?php if ( has_post_thumbnail() ) { ?>
		  				<?php echo get_the_post_thumbnail( get_the_ID(), 'news-thumb'); ?>
						<?php } ?>		
		  			<h3><?php the_title(); ?></h3>
		  			<p class="subtitle"><?php echo get_post_field( 'subtitle', get_the_ID(), true) ?></p>
					</a>
	  		<?php endforeach;
			} 
			?>
	</div>
	<script>
	var tweets;
	var tumblr_posts;
	var tumblr_video;
	var insta;
//	$.get( "<?php echo get_template_directory_uri(); ?>/tweets.php", function( data ) {
//		tweets = JSON.parse(data);
//		console.log( tweets );
		// $.get( "<?php echo get_template_directory_uri(); ?>/instagrams.php", function( data ) {
			// insta = JSON.parse(data);
			// console.log( insta );
			//$.get( "<?php echo get_template_directory_uri(); ?>/tumblrs.php", function( data ) {
			//	tumblr_posts = JSON.parse(data).response.posts;
			//	console.log( tumblr_posts );
			//	$.get( "<?php echo get_template_directory_uri(); ?>/tumblrs-video.php", function( data ) {
			//		tumblr_video = JSON.parse(data).response.posts;
			//		console.log( tumblr_video );
					displayPosts();
//				});
//			});
		// });
//	});

	function displayPosts(){
		$('footer').hide();
		// for(var i = 0; i < tweets.length; i++){
		// 	var d = new Date(tweets[i].created_at);
		// 	var date = Math.floor(d / 1000);
		// 	$('.grid').append('<a target="_blank" class="post tweet" href="https://twitter.com/sefrijn/status/'+tweets[i].id_str+'" data-date="'+date+'"><img src="<?php echo get_template_directory_uri(); ?>/img/twitter.png">'+tweets[i].text+'</a>');		
		// }
		// for(var i = 0; i < insta.data.length; i++){
		// 	var d = new Date(insta.data[i].created_time * 1000);
		// 	var date = Math.floor(d / 1000);
		// 	var text;
		// 	if(insta.data[i].caption != null){
		// 		text = insta.data[i].caption.text;
		// 		if(text.length > 30){
		// 			text = text.substring(0, 30);
		// 		}
		// 	}else{
		// 		text = "";
		// 	}
		// 	$('.grid').append('<div class="post instagram" data-date="'+date+'" style="background-image:url(\''+insta.data[i].images.thumbnail.url+'\')"><a target="_blank" href="'+insta.data[i].link+'" class="hover"><img src="<?php echo get_template_directory_uri(); ?>/img/instagram.png"><span>'+text+'<span></a></div>');
		// }

		// for(var i = 0; i < tumblr_posts.length; i++){
		// 	for(var j = 0; j < tumblr_posts[i].photos.length; j++){
		// 		var dString = tumblr_posts[i].date;
		// 		var d = new Date(dString.substring(0, dString.indexOf(' ')));
		// 		var date = Math.floor(d / 1000);
		// 		if(Math.random() > 0.5 && tumblr_posts[i].photos[j].alt_sizes[2].height > 350){
		// 			$('.grid').append('<div class="post tumblr tumblr-large" data-date="'+date+'" style="background-image:url(\''+tumblr_posts[i].photos[j].alt_sizes[2].url+'\')"><a target="_blank" href="'+tumblr_posts[i].post_url+'" class="hover"><img src="<?php echo get_template_directory_uri(); ?>/img/tumblr.png"><span>'+tumblr_posts[i].tags[0]+'<span></a></div>');
		// 		}else{
		// 			if(tumblr_posts[i].photos[j].alt_sizes[2].height <200){
		// 				$('.grid').append('<div class="post tumblr tumblr-wide" data-date="'+date+'" style="background-image:url(\''+tumblr_posts[i].photos[j].alt_sizes[2].url+'\')"><a target="_blank" href="'+tumblr_posts[i].post_url+'" class="hover"><img src="<?php echo get_template_directory_uri(); ?>/img/tumblr.png"><span>'+tumblr_posts[i].tags[0]+'<span></a></div>');
		// 			}else{
		// 				$('.grid').append('<div class="post tumblr" data-date="'+date+'" style="background-image:url(\''+tumblr_posts[i].photos[j].alt_sizes[2].url+'\')"><a target="_blank" href="'+tumblr_posts[i].post_url+'" class="hover"><img src="<?php echo get_template_directory_uri(); ?>/img/tumblr.png"><span>'+tumblr_posts[i].tags[0]+'<span></a></div>');
		// 			}
		// 		}
		// 	}
		// }
		// for(var i = 0; i < tumblr_video.length; i++){
		// 	var dString = tumblr_video[i].date;
		// 	var d = new Date(dString.substring(0, dString.indexOf(' ')));
		// 	var date = Math.floor(d / 1000);
		// 	$('.grid').append('<div class="post tumblr tumblr-video tumblr-large" data-date="'+date+'">'+tumblr_video[i].player[1].embed_code+'</div>');
		// }



		$('.loading').hide();



		// Get selected part of site
		var sel = '';
		sel = window.location.hash.substr(1);
		if(sel!= ''){
			$('#filter li').removeClass('active');
			$('#filter li').each(function( index ) {
				if($(this).text().toUpperCase() === sel.toUpperCase()){
					$(this).addClass('active');
				}				
				$('.post').hide();
				var selClass = '.'+sel;
				$(selClass).show();
			});
		}else{
			$('#filter li:first-of-type').addClass('active');
		}

		$('.grid').isotope({
			itemSelector: '.post',
    		getSortData : {
        		number : function ( $elem ) {
        			var p = $elem;
        			return parseInt($(p).attr('data-date'));
      			}
      		}, 
      		sortBy: 'number', 
      		sortAscending : false, 
			layoutMode: 'masonry',
		  	masonry: {
  		  		columnWidth: 170, 
	    		isFitWidth: true
  			}
		});
		$('.grid').show(400);	
	}		

	</script>
<?php get_footer() ?>