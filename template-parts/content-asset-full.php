<?php
/**
 * The Full asset
 *
 * @package OZD_Studio
 */
	$category = get_the_category()[0]->cat_name;
?>





<?php $manger_ID = get_field('asset_manager')->ID;
	$manager = array(
		title => get_the_title($manger_ID),
		imageUrl => get_the_post_thumbnail_url($manger_ID),
		subtitle => get_field('crew_subtitle',$manger_ID),
		phone => get_field('crew_tel',$manger_ID),
		email => get_field('crew_email',$manger_ID),
		linkedin => get_field('crew_linkedin',$manger_ID),
		facebook => get_field('crew_facebook',$manger_ID),
	);
?>
<?php $slidesPerView = 1; $spaceBetween = 0; $changeSpeed = 6500; ?>
<div class="asset full text-right" id="<?php echo 'asset_' . $post->ID . '_full' ?>">
	<div class="header">
		<h4 class="location inline-block"><?php echo get_the_title() ?></h4>
		<div class="btn badge social-icon float-left close-asset-full" asset_id='<?php echo 'asset_' . $post->ID ?>'><i class="fa fa-times" aria-hidden="true"></i></div>
		<div class="category <?php echo ($category == __("להשכרה", "ozd-studio")) ? 'rent' : 'sale' ?> float-left"><?php echo $category ?></div>						
	</div>
	<div class="row">
		<div class="col-md-9">
			<div class="asset-gallery">
				<?php $images = get_field('asset_gallery'); include(locate_template('template-parts/content-gallery-slider.php'));?>
			</div>
			<div class="meta">
			<div class="asset-text margin-bottom mobile-center"><?php the_field('asset_text') ?></div>
				<h4><?php _e("פרטי הנכס", "ozd-studio"); ?></h4>
				<div class="asset-price">
					<div class="asset-price-no" curency="ILS" value="<?php echo get_field('asset_price') ?>"><?php echo number_format(get_field('asset_price'),0,".",","); ?></div>
					<div class="asset-curency">
						<form method="get" id="" class="">
							<div class="form-group drop" id="">
								<select class="dropdown" onchange="changeCurency(this)">
									<option value="ILS" selected >NIS</option>
									<option value="USD">USD</option>
									<option value="EUR">EUR</option>
								</select>
							</div>
						</form>
					</div>
				</div>
				<div class="float-left"><bolder>ID: </bolder><?php the_field('asset_id'); ?></div>
				<div class=""><bolder><?php echo array_values(wp_get_post_terms( $post->ID, 'asset_type',array( 'fields' => 'names' )))[0]; ?></bolder></div>
				<div class=""><bolder><?php _e("שטח בנוי:", "ozd-studio"); ?> </bolder><?php the_field('asset_sqm') ?> <?php _e('מ"ר', "ozd-studio"); ?>&nbsp;</div>
				<div class=""><bolder><?php _e("מגרש:", "ozd-studio"); ?> </bolder><?php the_field('asset_yard_sqm') ?> <?php _e('מ"ר', "ozd-studio"); ?>&nbsp;</div>
				<div class=""><bolder><?php _e("חדרים:", "ozd-studio"); ?> </bolder><?php the_field('asset_rooms') ?>&nbsp;</div>
				<div class="text-alt"><bolder><?php the_field('asset_action'); ?>&nbsp;</bolder></div>
				<div class="asset-terms">
					<?php 
					$terms = get_the_terms($post->ID, 'asset_taxonomy');
					foreach($terms as $term){
						echo '<div class="asset-term">' . $term->name .'</div>';
					}
					?>
				</div>
				<h4><?php _e("מיקום", "ozd-studio"); ?></h4>
				<?php echo term_description(wp_get_post_terms( $post->ID, 'asset_area',array( 'fields' => 'ids' ))[0],'asset_area') ?>
				<div class="map">
				<iframe
				  width="600"
				  height="450"
				  frameborder="0" style="border:0"
				  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCzJnqZF_DWWUKYGkmB4kcc95wVLqRb6Vo
					&q=<?php echo array_values(wp_get_post_terms( $post->ID, 'asset_area',array( 'fields' => 'names' )))[0]; ?>,+Israel" allowfullscreen>
				</iframe>
				</div>												
			</div>
		</div>
		<div class="col-md-3 mobile-center">
			<div class="manager">
				<div class="mobile-padding">
					<div class="img-container">
						<img src="<?php echo get_the_post_thumbnail_url($manger_ID,'large') ?>" alt="">
					</div>
				</div>
				<h4><?php echo $manager[title]; ?></h4>
				<div><?php echo $manager[subtitle]; ?></div>
				<hr align="right">
				<div><a href="tel:<?php echo $manager[phone]; ?>"><?php echo $manager[phone]; ?></a></div>
				<p><a href="emailto:<?php echo $manager[email]; ?>"><?php echo $manager[email]; ?></a></p>
				<div class="container-social">
					<a href="<?php echo $manager[linkedin]; ?>" class="badge social-icon" target="_blank"><i class="fa fa-linkedin"></i></a>			
					<a href="<?php echo $manager[facebook]; ?>" class="badge social-icon" target="_blank"><i class="fa fa-facebook"></i></a>		
				</div>								
			</div>
			<div class="form-header"><?php _e("שלחו הודעה", "ozd-studio"); ?></div>
			<?php echo do_shortcode('[cf7-form cf7key="heb"]') ?>
			
			<script> initContactForm() </script>		
			
							
		</div>
	</div>
</div>

<script>
	jQuery('.close-asset-full').on('click',function(){
		var asset_id = '#' + $(this).attr('asset_id');
		$('html, body').animate({
			scrollTop: $(asset_id).offset().top - $('.navbar').outerHeight()
		}, 800,'swing');
		$('.ajax_load_asset').removeClass('active');
		$(this).parents('.col-md-12').css('height', 'auto');
		$(this).parents('.col-md-12').empty();
	});
</script>
<script src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/js/jquery.easydropdown.min.js"></script>
