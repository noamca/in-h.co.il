<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package OZD_Studio
 */

get_header(); ?>

<section id="blog" class="">			
	<div class="container">
		<h1 class="section-header text-center">מילה שלי</h1>
		<div class="row">
			<div class="col-md-9">
				<?php if ( have_posts() ) :

					/* Start the Loop */
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', get_post_format() );
					endwhile;

					the_posts_navigation(); 
				endif; ?>

			</div>
			<div class="col-md-3">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</section>
<!------------------------------ 
		Brake
------------------------------->
<section id="brake" class="bg_color">
</section>
<?php
get_footer();
	