<?php
/**
 * The Serach Form
 *
 * @package OZD_Studio
 */
?>
<form role="search" method="get" id="searchform" action="<?php echo $current_url; ?>" class="text-right">
    <input type="hidden" name="s" value="true" />
    
	<!-- Category Search -->    
   	<div class="form-group drop" id="category">
		<select class="dropdown" >
			<option value="" selected class="label">קנית נכס / השכרת נכס</option>
		<?php $categories = get_categories();foreach( $categories as $category): ?>
			<option value="<?php echo $category->cat_name ?>"><?php echo $category->cat_name ?></option>
		<?php endforeach; ?> 
		</select>
	</div>
	
	<!-- Area Search -->    
	<div class="form-group drop" id="area">
		<select class="dropdown" >
			<option value="" selected class="label">בחר מיקום הנכס</option>
			<?php $args = array( 'post_type' => 'area' ); $the_query = new WP_Query( $args ); if ( $the_query->have_posts() ) : ?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<option value="<?php the_title() ?>"><?php the_title() ?></option>				
				<?php endwhile; ?>
			<?php wp_reset_postdata(); endif; ?>
		</select>
	</div>
  	
   	<!-- Type Search -->    
   	<div class="form-group drop" id="type">
		<select class="dropdown">
			<option value="" selected class="label">בחר סוג הנכס</option>
			<?php $terms = get_terms( array( 'taxonomy' => 'asset_type', 'hide_empty' => false,) ); foreach( $terms as $term): ?>
				<option value="<?php echo $term->name ?>"><?php echo $term->name ?></option>
			<?php endforeach; ?> 
		</select>
	</div>
   
    <!-- Tag Search -->
	<div class="form-group" id="free_search" style="width: calc( 30% + 5px);">
	  <input type="text" class="" placeholder="חיפוש חופשי...">
	</div> 
	
	<button type="submit" class="btn btn_grey" id="searchsubmit">
	  חפש <i class="fa fa-search" aria-hidden="true"></i>
	</button>
	<div class="form-group text-right" id="price">
		טווח מחירים <input type="text" id="price_input_min"/>&nbsp;&#45;&nbsp;<input type="text" id="price_input_max"/>	
	</div>
	<div id="slider-snap"></div>
</form>	

<script>
	jQuery(window).load(function() {

		var rangeSlider = document.getElementById('slider-snap');

		noUiSlider.create(rangeSlider, {
			start: [ 5000000, 10000000 ],
			step: 10000,
			connect: true,
			range: {
				'min': [  2500000 ],
				'max': [ 10000000 ]		
			},
			format: wNumb({
				decimals: 0,
				thousand: ',',
			})

		});

		var input_min = document.getElementById('price_input_min'),
			input_max = document.getElementById('price_input_max');

		// When the slider value changes, update the input and span
		rangeSlider.noUiSlider.on('update', function( values, handle ) {
			if ( handle ) {
				input_min.value = values[handle];
			} else {
				input_max.value = values[handle];
			}
		});

		// When the input changes, set the slider value
		input_min.addEventListener('change', function(){
			rangeSlider.noUiSlider.set([null, this.value]);
		});
		input_max.addEventListener('change', function(){
			rangeSlider.noUiSlider.set([this.value, null]);
		});	
	});
</script>