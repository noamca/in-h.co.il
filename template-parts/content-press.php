<?php
/**
 * The press
 *
 * @package OZD_Studio
 */
?>

<div class="col-md-3 press text-center">
	<a href="<?php the_permalink() ?>">
		<div class="img-container press_img">
			<?php the_post_thumbnail('large') ?>
		</div>
	</a>	
	<div class="press_text"><?php the_content(); ?></div>
	<a href="<?php the_permalink() ?>" class="press_url btn btn_white">לכתבה המלאה</a>
</div>