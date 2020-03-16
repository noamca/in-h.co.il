<?php
/**
 * The asset
 *
 * @package OZD_Studio
 */
	$category = get_the_category()[0]->cat_name;
?>

	<div class="col-md-4 text-right">
		<img class="spinner margin-bottom" src="<?php echo esc_url( site_url() ); ?>/wp-includes/images/spinner-2x.gif" alt="">
		<div class="asset" id="asset_<?php echo $post->ID ?>">		
			<div class="header">
				<h4 class="location inline-block"><?php echo get_the_title() ?></h4>
				<div class="category <?php echo ($category == __("להשכרה", "ozd-studio")) ? 'rent' : 'sale' ?> float-left"><?php echo $category ?></div>						
			</div>
			<div class="img-container">
				<img src="<?php the_post_thumbnail_url('large') ?>" alt="">
			</div>
			<div class="meta">
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
				<div class=""><bolder><?php echo array_values(wp_get_post_terms( $post->ID, 'asset_type',array( 'fields' => 'names' )))[0]; ?></bolder>&nbsp;</div>
				<div class=""><bolder><?php _e("שטח בנוי:", "ozd-studio"); ?> </bolder><?php the_field('asset_sqm') ?> <?php _e('מ"ר', "ozd-studio"); ?>&nbsp;</div>
				<div class=""><bolder><?php _e("מגרש:", "ozd-studio"); ?> </bolder><?php the_field('asset_yard_sqm') ?> <?php _e('מ"ר', "ozd-studio"); ?>&nbsp;</div>
				<div class=""><bolder><?php _e("חדרים:", "ozd-studio"); ?> </bolder><?php the_field('asset_rooms') ?>&nbsp;</div>
				<div class="text-alt"><bolder><?php the_field('asset_action'); ?>&nbsp;</bolder>&nbsp;</div>
			</div>
			<div><a id='<?php the_ID() ?>' class="btn btn_white ajax_load_asset"><?php _e("לעוד פרטים", "ozd-studio"); ?></a></div>
		</div>
	</div>
	
