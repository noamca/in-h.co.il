<?php
/**
 * Template part for displaying navigation in single posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package OZD_Studio
 */

?>



<div class="post_nav text-right">

	<a href="<?php echo esc_url( site_url() ); ?>/projects"class="back"></a>
	<a href="<?php echo next_post_href('project'); ?>" class="prev"></a>
	<a href="<?php echo prev_post_href('project'); ?>" class="next"></a>	

</div>