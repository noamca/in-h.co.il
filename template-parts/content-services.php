<?php
/**
 * The Services
 *
 * @package OZD_Studio
 */
?>


<?php $loop = new WP_Query( array('post_type' => 'service', 'orderby' => 'post_title', 'order' => 'ASC'));
if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); $post_ID = get_the_ID(); $images = get_field('lec_photos',$post_ID); ?>
<div class="service text-right">
	<div class="row">
		<div class="col-md-3">
			<div class="img-container">
				<img src="<?php the_post_thumbnail_url() ?>" alt="">
			</div>
		</div>
		<div class="col-md-9">
			<h3 class="service_title"><?php echo get_the_title(); ?></h3>
			<?php if(get_field('service_subtitle')) : ?><div class="service_subtitle"><?php the_field('service_subtitle'); ?></div><?php endif ?>
			<?php if(get_field('service_content')) : ?><div class="service_content"><?php the_field('service_content'); ?></div><?php endif ?>
			
			<?php if(get_field('service_price')) : ?>
			<div class="service_price">
				<strong>עלויות:</strong>
				<p><?php the_field('service_price'); ?></p>
			</div>
			<?php endif ?>

			<?php if( have_rows('service_prices_single') ): ?>
			
				<strong>עלויות מפגש בודד, שלא במסגרת פרויקט שלם:</strong>
				<?php while ( have_rows('service_prices_single') ) : the_row(); ?>    
				<div class="service_price_single"><?php the_sub_field('service_price_single');?></div>
			
			<?php endwhile ?>
	
			<?php;endif; ?>
		</div>
	 </div>	
	<div class="service_text"><?php the_field('service_text'); ?></div>
	<div class="service_sub_header text-center"><?php the_field('service_sub_header'); ?></div>
</div>
<?php endwhile; endif; wp_reset_postdata(); ?>


