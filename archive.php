<?php

/**
 *
 * @package OZD_Studio
 */

get_header(); ?>


<!------------------------------ 
		SEARCH
------------------------------->
<section id="search" class="text-center">
	<div class="container bg_color">
		<!-- <img class="spinner margin-bottom" src="<?php echo esc_url( site_url() ); ?>/wp-includes/images/spinner-2x.gif" alt="">
		<div class=" spinner-hide"> -->
			<h2><?php _e("חיפוש נכס", "ozd-studio"); ?></h2>
			<?php get_search_form(); ?>
		<!--</div>-->
	</div>
</section>
<!------------------------------ 
		ASSETS
------------------------------->
<section id="assets" class="bg_color">
	<div class="text-center container">		
		<div class="row">
		<?php if (have_posts()) : ?>
			<?php $i = 0 ; while ( have_posts() ) : the_post(); $i ++;
				 get_template_part( 'template-parts/content', 'asset' );
						
			if (($i % 3) == 0) { ?>
				<div class="asset-full col-md-12 desktop-only"></div>
				<?php
			}
			echo '<div class="asset-full col-md-12 mobile-only"></div>';
			endwhile; ?>
			<div class="asset-full col-md-12 desktop-only"></div>
		<?php else : ?>
			<?php _e("לא נמצאו נכסים, יש להכניס לחיפוש ערכים שונים.", "ozd-studio"); ?>
		<?php endif;?>
		</div>
	</div>
</section>
<script>
/// Curency Convert	
	function changeCurency(sel){
		var theField = jQuery(sel).parents('.asset-price').find('.asset-price-no');
		var currentValue = jQuery(theField).attr('value');
		var FromCurrency = jQuery(theField).attr('curency');
		var ToCurrency = sel.value;
		jQuery(theField).attr('curency', ToCurrency);
		var demo = function(data) {
			fx.base = "EUR";
			fx.rates = data.rates;
			var rate = fx(currentValue).from(FromCurrency).to(ToCurrency);
			jQuery(theField).html(rate.toLocaleString( undefined, { maximumFractionDigits: 0 }));
			jQuery(theField).attr('value',rate);
		}

		$.getJSON("https://api.fixer.io/latest", demo);
	}
/// Scroll after Search	
	jQuery(document).ready(function () {
		if (window.location.href.indexOf("?") != -1){
					setTimeout( function() {
					$('html, body').animate({
						scrollTop: $('#assets').offset().top - $('.navbar').outerHeight() + 'px'
					}, 2000, 'swing');
				}, 1000);
		}
	});
</script>



<? get_footer();