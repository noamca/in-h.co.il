<?php
/**
 * The exhibitions
 *
 * @package OZD_Studio
 */
?>
<?php if ( !wp_is_mobile() ) { ?>
<div class="gallery-container">
	<!-- Slider main container -->
	<div class="swiper-container exhibition_slider">
		<!-- Additional required wrapper -->

		<div class="swiper-wrapper">
			<!-- Slides -->  
<?php } ?>
		<?php $loop = new WP_Query( array('post_type' => 'exhibition', 'orderby' => 'post_title', 'order' => 'ASC'));
		if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); $post_ID = get_the_ID(); $images = get_field('exhibit_imges',$post_ID); ?>
			<div class="swiper-slide">
				<div class="row">
					<div class="exhibition_text col-md-4">
						<h4 class="exhibition_title"><?php echo get_the_title(); ?></h4>
						<?php the_field('exhibit_text',$post_ID); ?>
					</div>
					<div class="exhibition_gallery col-md-8">
						<?php foreach( $images as $image ): ?>
							<div class="exhibition-img">
								<img class="" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
							</div>
						<?php endforeach; ?>
						<?php if( have_rows('exhibit_videos') ): while ( have_rows('exhibit_videos') ) : the_row();?>
							<div class="embed-container">
								<?php the_sub_field('exhibit_video'); ?>
							</div>			
						<?php endwhile;endif;?>
					</div>	
				</div>
			</div>

		<?php endwhile; endif; wp_reset_postdata(); ?>
<?php if ( !wp_is_mobile() ) { ?>

		</div>

	</div>

	<!-- If we need navigation buttons -->
	<div class="swiper-arrows">
		<div class="container">
			<div class="swiper-button-prev"></div>
			<div class="swiper-button-next"></div>					
		</div>
	</div>
</div>
<script>
	jQuery(function(){ 
		if($('.swiper-slide').length > 1){
			$('.exhibition_slider').each(function( i ) {
				var GallerySwiper = new Swiper ($('.exhibition_slider')[i], {
					  // Optional parameters
						nextButton: $('.swiper-button-prev')[i],
						prevButton: $('.swiper-button-next')[i],
						slidesPerView:1,
						spaceBetween: 150,
						loop: true,
						autoplayDisableOnInteraction: false,
				});
			});
		} else {
			$('.swiper-arrows').hide();
		};
	});
</script>
<?php } ?>