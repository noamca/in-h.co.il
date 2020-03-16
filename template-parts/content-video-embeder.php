<?php
/**
 * 
 *
 * @package OZD_Studio
 */
?>


		<?php if( have_rows('video_embed') ): // check if the repeater field has rows of data

			// loop through the rows of data
			while ( have_rows('video_embed') ) : the_row(); // display a sub field value ?>

				<div class="embed-container">
					<?php the_sub_field('video_embed_link'); ?>
				</div>	

			<?php endwhile; ?> 

			<a id="loadMore" class="btn btn_big" href="#"><span>טען עוד סרטונים</span></a>
	
		<?php else : /* no rows found */ endif;	?>	
