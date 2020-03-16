<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package OZD_Studio
 */
get_header();

?>

<section id="post" class="text-center">			
	<div class="container text-center">						
		<?php while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', get_post_type() );
		endwhile; ?>
	</div>
</section>

<?php get_footer();
