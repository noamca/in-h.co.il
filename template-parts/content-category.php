<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package OZD_Studio
 */

?>
<div class="col-md-6 scroll-load">
	<a href="<?php the_permalink() ?>">
		<div class="proj margin-bottom" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php the_post_thumbnail('large') ?>
			<div class="hover">
				<span><?php the_title() ?></span>
			</div>
		</div>
	</a>
</div>