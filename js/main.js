$( document ).ready(function() {
	$('.scroll_down').click(function(e){
		e.preventDefault();
		var body = $("html, body");
		body.animate({scrollTop:474}, '500', 'swing', function() { 
		});
	});

	$('#filter li').click(function(){
		var selected = $(this).attr('data-filter');
		if(selected!='all'){
			history.pushState(null, null, '#'+selected);
		}else{
			history.pushState(null, null, '/inspiration/');
		}
		selected = "."+selected;
		$('#filter li').removeClass('active');
		$(this).addClass('active');
		if(selected != ".all"){	
			$('.post').hide();
			$(selected).show();
			$('.grid').isotope();
			console.log($(this).attr('data-filter'));
		}else{
			$('.post').show();
			$('.grid').isotope();
			console.log($(this).attr('data-filter'));
		}

	})

	$('.alignleft, .alignright').hover(function(){
		var it = $(this);
		it.children('img').fadeTo( 200 , 0.4,function(){
			it.children('.wp-caption-text').show();
		});
	}, function(){
		var it = $(this);
		it.children('img').fadeTo( 200 , 1, function(){
			it.children('.wp-caption-text').hide();			
		});		
	});
	$('blockquote').prepend('<span>&ldquo;</span>');
	$('blockquote').append('<span>&rdquo;</span>');

	$(window).scroll(function() {
		console.log();
	    if ($(this).scrollTop() > 227) {
	        $( ".navigation").addClass('fixed');
	    }
	    if ($(this).scrollTop() < 227) {
	        $( ".navigation" ).removeClass('fixed');
	    }
	});	
});