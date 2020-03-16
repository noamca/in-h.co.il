<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package OZD_Studio
 */

get_header();
$category_id = get_queried_object()->term_id;
$parent_id = get_queried_object()->parent;

?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
	<section>
	<div class="category-content text-center container">
	
		<h1><?php echo get_cat_name( get_queried_object()->parent ) ?></h1>
		
		<div class="cat-list margin-bottom">
			<?php $args = array( 'child_of' => $parent_id, ); $categories = get_categories( $args ); foreach($categories as $category) { 
				if($category_id == $category->term_id){$class = 'active';}else{ $class = '';}
				echo '<a class="' . $class . ' " href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> ';
			}?>
		</div>
		
		<div class="row">
			<img class="spinner margin-bottom" src="<?php echo esc_url( site_url() ); ?>/wp-includes/images/spinner-2x.gif" alt="">
			<?php $args = array( 'post_type' => 'project' ,'cat' => $category_id); $the_query = new WP_Query( $args ); if ( $the_query->have_posts() ) : ?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post();					
					get_template_part( 'template-parts/content', 'category' );
				endwhile; ?>
			<?php wp_reset_postdata(); endif; ?>
		</div>
		
	</div>
	</section>
	</main><!-- #main -->
</div><!-- #primary -->

<script>	
jQuery(window).load(function() {
	
	$(".scroll-load").slice(0, 6).show();
	var win = $(window);
	// Each time the user scrolls
	win.scroll(function() {
		// End of the document reached?
		console.log($(document).height() - win.height() );
		console.log(win.scrollTop() + $('#footer_contact').height() + $('footer').height());
		if ($(document).height() - win.height()  <= win.scrollTop() + $('#footer_contact').height() + $('footer').height()) {
				$(".scroll-load:hidden").slice(0, 2).fadeIn('slow');
		}
	});
	
    $('.proj').find('img').each(function() {
        var imgClass = (this.width / this.height > 1) ? 'wide' : 'tall';
        $(this).addClass(imgClass);
    });
	$('.spinner').hide();
	$('.proj').css('opacity',1);
})

</script>
		

<?php

get_footer();
