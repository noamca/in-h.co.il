<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package OZD_Studio
 */

?>
	
	<!-- FOOTER contact
	================================================== -->
		 
	<section id="footer_contact" class="bg_color text-center">
		<div class="container">
				<h3 class=""><?php the_field('contact_form_header') ?></h3>
				<?php echo do_shortcode('[cf7-form cf7key="heb"]') ?>					
		</div>
	</section>
	
	<!------------------------------ 
			Offices
	------------------------------->
	<section id="offices" class="text-center">
		<div class="container">
			<h3 class="section-header"><?php the_field('office_header', pll_current_language('slug')); ?></h3>
			<div class="row">
				<?php $post_objects = get_field('contact_offices', 'option');?>
				<?php if( $post_objects ): ?>
					<?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
						<?php setup_postdata($post);?>
							<div class="office col-md-4 text-right mobile-center">
								<div class="header">
									<h4 class=""><?php the_title(); ?></h4>
									<p class=""><?php the_field('office_address') ?></p>						
								</div>
								<div class="img-container">
										<img src="<?php the_post_thumbnail_url() ?>" alt="">
								</div>
							</div>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>				
			</div>
		</div>
	</section>			
</div><!-- #content -->

	<!-- FOOTER
	================================================== -->
	<footer>
		<div class="container">
		<p><?php _e("כל הזכויות שמורות ל", "ozd-studio"); ?><a href="<?php echo esc_url( site_url() ); ?>" ><?php _e("אינהאוס", "ozd-studio"); ?></a> | <?php _e("עיצוב אתר", "ozd-studio"); ?> <a href="http://www.hollestudio.co.il" target="_blank">HolleStudio</a> | <?php _e("פיתוח אתר", "ozd-studio"); ?> <a href="http://www.ozdstudio.com" target="_blank">OZD Studio</a></p>
		</div><!-- container -->
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

<!-- JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->   
<script>
jQuery(window).load(function() {
    $('.img-container').find('img').each(function() {
        var imgClass = (this.width / this.height > 1) ? 'wide' : 'tall';
        $(this).addClass(imgClass);
    })
})
</script>
<script src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/js/jquery-3.1.1.min.js"></script>
<script src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/js/bootstrap.min.js"></script>
<script src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/js/money.min.js"></script>
<script src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/js/swiper.jquery.min.js"></script>
<script src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/js/jquery.easydropdown.min.js"></script>
<script src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/js/nouislider.min.js"></script>
<script src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/js/wNumb.js"></script>
<script src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/js/ozd.js"></script>



</body>
</html>
