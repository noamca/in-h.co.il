<?php
/**
 * Template Name: About Page
 *
 * @package OZD_Studio
 */

get_header(); ?>

<?php $manger_ID = get_field('about_manger')->ID;
	$manager = array(
		title => get_the_title($manger_ID),
		imageUrl => get_the_post_thumbnail_url($manger_ID),
		subtitle => get_field('crew_subtitle',$manger_ID),
		phone => get_field('crew_tel',$manger_ID),
		email => get_field('crew_email',$manger_ID),
		linkedin => get_field('crew_linkedin',$manger_ID),
		facebook => get_field('crew_facebook',$manger_ID),
	);
?>

<!------------------------------ 
		About
------------------------------->
<section id="about" class="mobile-center">
	<div class="container">
		<h4 class="mobile-margin-bottom mobile-only"><?php the_title() ?></h4>
		<div class="row">
			<div class="col-md-3 manager mobile-padding mobile-margin-bottom">
				<div class="img-container">
					<img src="<?php echo get_the_post_thumbnail_url($manger_ID,'large') ?>" alt="">
				</div>
				<h4><?php echo $manager[title]; ?></h4>
				<div><?php echo $manager[subtitle]; ?></div>
				<hr>
				<div><a href="tel:<?php echo $manager[phone]; ?>"><?php echo $manager[phone]; ?></a></div>
				<p><a href="emailto:<?php echo $manager[email]; ?>"><?php echo $manager[email]; ?></a></p>
				<div class="container-social">
					<a href="<?php echo $manager[linkedin]; ?>" class="badge social-icon" target="_blank"><i class="fa fa-linkedin"></i></a>			
					<a href="<?php echo $manager[facebook]; ?>" class="badge social-icon" target="_blank"><i class="fa fa-facebook"></i></a>		
				</div>								
			</div>
			<div class="col-md-9">
				<h4><?php the_field('about_header'); ?></h4>
				<?php the_field('about_text'); ?>
			</div>
		</div>
	</div>
</section>
<section id="crew" class="bg_color text-center">
	<div class="container">
		<h2><?php _e("אנשי הצוות שלנו", "ozd-studio"); ?></h2>
		<?php $crew_objects = get_field('about_crew');?>
		<?php if( $crew_objects ): ?>
			<?php foreach( $crew_objects as $post): // variable must be called $post (IMPORTANT) ?>
				<?php setup_postdata($post); ?>
				<div class="crew row text-right mobile-center">
					<div class="col-md-3 mobile-padding">
						<div class="img-container mobile-margin-bottom">
							<img src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
						</div>						
					</div>
					<div class="col-md-9">
						<h4><?php the_title();?></h4>						
						<p class="crew_subtitle"><?php the_field('crew_subtitle');?></p>
						<p></p>
						<p class="crew_text"><?php the_field('crew_text');?></p>
						<div class="crew_meta mobile-only">
							<div>
								<?php the_title();?>
							</div>
							<div>
								<a href="<?php the_field('crew_tel');?>"><?php the_field('crew_tel');?></a>
							</div>
							<div class="mobile-margin-bottom">
								<a href="<?php the_field('crew_email');?>"><?php the_field('crew_email');?></a>
							</div>
							<a href="<?php the_field('crew_linkedin');?>" class="badge social-icon" target="_blank"><i class="fa fa-linkedin"></i></a>			
							<a href="<?php the_field('crew_facebook'); ?>" class="badge social-icon" target="_blank"><i class="fa fa-facebook"></i></a>
						</div>	
						<div class="crew_meta desktop-only">
							<?php the_title();?> 
							<a href="<?php the_field('crew_tel');?>"><?php the_field('crew_tel');?></a> &#124;
							<a href="<?php the_field('crew_email');?>"><?php the_field('crew_email');?></a> &#124;
							<a href="<?php the_field('crew_linkedin');?>" class="badge social-icon" target="_blank"><i class="fa fa-linkedin"></i></a>			
							<a href="<?php the_field('crew_facebook'); ?>" class="badge social-icon" target="_blank"><i class="fa fa-facebook"></i></a>
						</div>						
					</div>
				</div>
				<?php endforeach; ?>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>					
	</div>
</section>
<?php
get_footer();
