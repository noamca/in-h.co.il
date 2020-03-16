<?php
/**
 * The slider gallery 
 *
 * @package OZD_Studio
 */
?>

<?php if( $images ): ?>
				
	<!-- Slider main container -->
	<div class="swiper-container">
		<!-- Additional required wrapper -->
		<div class="swiper-wrapper">
			<!-- Slides -->
			<?php foreach( $images as $image ): ?>						

			<div class="swiper-slide swiper-lazy" style="background:url(<?php echo $image['url']; ?>)"></div>	
			<?php endforeach; ?>
		</div>

		<!-- If we need navigation buttons -->
		<div class="swiper-button-prev"></div>
		<div class="swiper-button-next"></div>

</div>					
<?php endif; ?>

