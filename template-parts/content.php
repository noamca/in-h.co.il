<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package OZD_Studio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php ozd_studio_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if ( has_post_thumbnail() ) { // check for feature image ?> 
		<div class="post-image">
			<?php the_post_thumbnail(); ?>
		</div><!-- post-image -->
		<?php } ?>
	</div><!-- .entry-content -->

	<div class="post-excerpt">
		<?php the_excerpt(); ?>
	</div><!-- post-excerpt -->
	<div class="post_footer">
		<div><a href="<?php echo get_permalink() ?>" class="btn btn_white pull-left">לפוסט המלא</a></div>				
		<div class="f-share"><div id="shareBtn" onclick="myFacebookShare('<?php echo get_permalink() ?>')" class="btn badge social-icon shareBtn"><i class="fa fa-facebook"></i></div>שתפו חברים</div>
	</div>
</article><!-- #post-## -->