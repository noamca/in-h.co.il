<?php
/**
 * The Serach Form
 *
 * @package OZD_Studio
 */
?>
<script src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/js/nouislider.min.js"></script>

<form role="search" method="get" id="searchform" action="<?php echo site_url() ?>/asset/" class="text-right mobile-center">  
	<div class="filters text-right">
		<!-- Category Search -->    
		<div class="form-group drop" id="category">
			<select class="dropdown" name="cat">
				<option value="" selected class="label" ><?php _e("קנית / השכרת נכס", "ozd-studio"); ?></option>
			<?php $categories = get_categories();foreach( $categories as $category): ?>
				<option value="<?php echo $category->term_id ?>"><?php echo $category->cat_name ?></option>
			<?php endforeach; ?> 
				<option value="" ><?php _e("הכל", "ozd-studio"); ?></option>
			</select>
		</div>

		<!-- Area Search -->    
		<div class="form-group drop" id="area">
			<select class="dropdown" name="area">
				<option value="" selected class="label"><?php _e("בחר מיקום הנכס", "ozd-studio"); ?></option>
				<?php $terms = get_terms( array( 'taxonomy' => 'asset_area', 'hide_empty' => true, 'orderby' => 'count', 'order' => 'DESC') ); foreach( $terms as $term): ?>
					<option value="<?php echo $term->term_id ?>"><?php echo $term->name ?></option>
				<?php endforeach; ?> 
				<option value="" ><?php _e("הכל", "ozd-studio"); ?></option>
			</select>
		</div>

		<!-- Type Search -->    
		<div class="form-group drop" id="type">
			<select class="dropdown" name="type">
				<option value="" class="label"><?php _e("בחר סוג הנכס", "ozd-studio"); ?></option>
				<?php $terms = get_terms( array( 'taxonomy' => 'asset_type', 'hide_empty' => true,) ); foreach( $terms as $term): ?>
					<option value="<?php echo $term->term_id ?>"><?php echo $term->name ?></option>
				<?php endforeach; ?> 
				<option value="" ><?php _e("הכל", "ozd-studio"); ?></option>
			</select>
		</div>
		<!-- Tag Search -->
		<div class="form-group mobile-margin-bottom" id="free_search" style="">
		  <input type="search" value="<?php echo get_search_query(); ?>" class="" name="s" placeholder="<?php _e("חיפוש חופשי...", "ozd-studio"); ?>">
		</div> 

		<button type="submit" class="btn btn_grey desktop-only" id="searchsubmit">
		  <?php _e("חפש", "ozd-studio"); ?> <i class="fa fa-search" aria-hidden="true"></i>
		</button>
	</div>
	
	<div id="price">	
		<?php _e("טווח מחירים", "ozd-studio"); ?> <div class="mobile-only"></div><span dir="rtl"><input size='' type="text" id="price_input_max"/>&nbsp;&#45;&nbsp;<input type="text" size='' id="price_input_min"/></span>
	
		<input type="hidden" name="min" id="price_min"/>
		<input type="hidden" name="max" id="price_max"/>

		<div id="slider-snap"></div>
	</div>
	<button type="submit" class="btn btn_grey mobile-only" id="searchsubmit">
	  חפש <i class="fa fa-search" aria-hidden="true"></i>
	</button>
</form>	
<script>
	
jQuery(window).on('load', function() {

		var parts = window.location.search.substr(1).split("&");
		var $_GET = {};
		for (var i = 0; i < parts.length; i++) {
			var temp = parts[i].split("=");
			$_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
		}

	
	
	var rangeSlider = document.getElementById('slider-snap');

	noUiSlider.create(rangeSlider, {
		start: [ <?php the_field('search_select_min','option')?> , <?php the_field('search_select_max','option')?> ],
		step: 10000,
		connect: true,
		range: {
			'min': [ <?php the_field('search_min','option')?> ],
			'max': [ <?php the_field('search_max','option')?> ]		
		},
		format: wNumb({
			decimals: 0,
			thousand: ',',
		})

	});

	var price_input_min = document.getElementById('price_input_min'),
		price_input_max = document.getElementById('price_input_max'),
		input_min = document.getElementById('price_min'),
		input_max = document.getElementById('price_max');

	// When the slider value changes, update the input and span
	rangeSlider.noUiSlider.on('update', function( values, handle ) {
		if ( handle ) {
			price_input_max.value = values[handle];
			input_max.value = values[handle].replace(/\,/g,'');
		} else {
			price_input_min.value = values[handle];
			input_min.value = values[handle].replace(/\,/g,'');
		}
	});

	// When the input changes, set the slider value
	price_input_min.addEventListener('change', function(){
		rangeSlider.noUiSlider.set([null, this.value]);
	});
	price_input_max.addEventListener('change', function(){
		rangeSlider.noUiSlider.set([this.value, null]);
	});	

	// Change inputs based on search Query

	rangeSlider.noUiSlider.set([null, $_GET['max']]);
	rangeSlider.noUiSlider.set([$_GET['min'], null]);
	jQuery("#searchform").find("select").each(function(){
		console.log(this);
		var value = $_GET[$(this).attr("name")];
		if(value){
			//$(this).easyDropDown('select', $(this).children("option[value='" + value + "']").index()-1);;
		}		
	});		
		
});
</script>

