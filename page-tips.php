<?php

/**
 * Template Name: Tips Page
 *
 * @package OZD_Studio
 */

get_header(); ?>


<!------------------------------ 
		TIPS
------------------------------->
<section id="tips" class="text-center">
	<div class="container">
		<h4 class="mobile-margin-bottom mobile-only"><?php the_title() ?></h4>
		<h2 class="section-header"><?php the_field('tips_title') ?></h2>
		<?php $args = array('post_type' => 'tip'); ?>
		<?php  $the_query = new WP_Query( $args ); if ( $the_query->have_posts() ) : ?>
			<?php $i = 0 ; while ( $the_query->have_posts() ) : $the_query->the_post(); $i ++;?>		
			<div class="tip text-right">
				<div class="header">
					0<?php echo $i ?>
					<div class="title"><?php echo get_the_title(); ?></div>
				</div>
				<div class="text"><?php the_content(); ?></div>
			</div>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); endif; ?>
	</div>
</section>

<?php
get_footer();
