<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package OZD_Studio_-_Somek_Winery
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<section>
<div class="container">
	<div class="entry-content">
	<h1 class="text-center section-header"><?php the_title(''); ?></h1>
		<?php
			the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ozd-studio' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</div>
</section>
</article><!-- #post-## -->
