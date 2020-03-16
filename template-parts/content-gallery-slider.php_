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
	<div class="swiper-container gallery-slider">
		<div class="swiper-wrapper">
			<!-- Slides -->
			<?php $index = 0; foreach( $images as $image ): $index++; ?>						
			<div class="cursor swiper-slide disable-mobile slides_<?php echo $slidesPerView ?>" data-toggle="modal" data-target="#galleryModal" onclick="openModal(<?php echo ($index) ?>)" style="background:url(<?php echo $image['sizes']['large']; ?>)"></div>
			<?php endforeach; ?>
		</div>
	</div>	
	<div class="lunch-modal desktop-only"><?php _e("הגדל תמונה", "ozd-studio"); ?> <a class="btn badge social-icon"><i class="fa fa-plus" aria-hidden="true"></i></a></div>
	<div class="swiper-button-prev swiper-gallery-prev"></div>
	<div class="swiper-button-next swiper-gallery-next"></div>
</div>
	<script>
		jQuery(function(){ 
			$('.gallery-slider').each(function() {
				var GallerySwiper = new Swiper ($(this), {
					  // Optional parameters
						nextButton: $(this).parent().children('.swiper-button-prev'),
						prevButton: $(this).parent().children('.swiper-button-next'),
						paginationClickable: true,
						slidesPerView: parseInt(<?php echo $slidesPerView ?>),
						spaceBetween: parseInt(<?php echo $spaceBetween ?>),
						loop: true,			
						autoplay: 4500,
						autoplayDisableOnInteraction: false,
				});
			});
		});
		jQuery('.col-md-12.mobile-only').find('.modal').remove();
	</script>
<?php endif; ?>

	  	  
<!-- Gallery MODAL
================================================== -->	
<div class="modal fade" id="galleryModal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<a class="btn modal-close badge social-icon float-left" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></a>
			<div class="gallery-container"><!-- Slider main container -->
				<div class="swiper-container modal-gallery-slider"><!-- Slider container -->
					<div class="swiper-wrapper">
						<?php $index = 0; foreach( $images as $image ): ?>						
						<div class="swiper-slide slides_<?php echo $slidesPerView ?>" style="background:url(<?php echo $image['sizes']['large']; ?>)"></div>	
						<?php $index++; endforeach; $index = 0; ?>
					</div>
				</div>
				<div class="swiper-button-prev modal-swiper-button-prev"></div><!-- Navigation buttons -->
				<div class="swiper-button-next modal-swiper-button-next"></div><!-- Navigation buttons -->
			</div>
			
		</div><!-- modal-content -->
	</div><!-- modal-dialog -->
</div><!-- modal -->


<script>
	function openModal(slideId) {
		document.getElementById('galleryModal').style.display = "block";
		
		var GallerySwiper = new Swiper ('.modal-gallery-slider', {
			  // Optional parameters
				nextButton: '.modal-swiper-button-prev',
				prevButton: '.modal-swiper-button-next',
				slidesPerView: 1,
				spaceBetween: 10,
				loop: true,			
				autoplayDisableOnInteraction: false,
			});
		GallerySwiper.slideTo(slideId,0,false);	
	}
</script>