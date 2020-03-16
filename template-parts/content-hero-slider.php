<?php
/**
 * The slider gallery 
 *
 * @package OZD_Studio_-_Final_Drum
 */
?>

	
<?php if( $images ): ?>
<div class="gallery-container">
	<!-- Slider main container -->
	<div class="swiper-container hero-slider">
		<div class="swiper-wrapper">
			<!-- Slides -->
			<?php foreach( $images as $image ): ?>						
			<div class="swiper-slide slides_<?php echo $slidesPerView ?>" style="background:url(<?php echo $image['url']; ?>)"></div>	
			<?php endforeach; ?>
		</div>
		<div class="swiper-pagination"></div>
	</div>					
</div>
	<script>
		jQuery(function(){ 
			$('.hero-slider').each(function( i ) {
				var GallerySwiper = new Swiper ($('.hero-slider')[i], {
					  // Optional parameters
						paginationClickable: true,
						pagination: $(this).find('.swiper-pagination'),
						slidesPerView: parseInt(<?php echo $slidesPerView ?>),
						spaceBetween: 0,
						loop: true,			
						autoplay: 3500,
						speed:1000,
					    effect: 'fade',
						autoplayDisableOnInteraction: false,
				});
			});
		});
	</script>
<?php endif; ?>	  