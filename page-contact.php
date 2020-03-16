<?php
/**
 * Template Name: Contact Page
 *
 * @package OZD_Studio
 */

get_header(); ?>
<div id="contact_page">

	<!-- contact details
	================================================== -->
		 
	<section id="contact_details" class="text-center bg_image mobile-padding" style="background-image: url(<?php echo get_field('contact_image')['url']; ?>)">
		<div class="container">
			<h3 class=""><?php the_field('contact_title') ?></h3>
			<div><?php the_field('contact_text') ?></div>
			<div class="strong">
				<div class="mobile-only">
					<a href="tel:<?php the_field('contact_phone', 'option'); ?>"><?php the_field('contact_phone', 'option'); ?></a><br>
					<a href="tel:<?php the_field('contact_phone_2', 'option'); ?>"><?php the_field('contact_phone_2', 'option'); ?></a>				
				</div>
				<div class="desktop-only">
					<a href="tel:<?php the_field('contact_phone', 'option'); ?>"><?php the_field('contact_phone', 'option'); ?></a> &#124;
					<a href="tel:<?php the_field('contact_phone_2', 'option'); ?>"><?php the_field('contact_phone_2', 'option'); ?></a>				
				</div>
			</div>
			<a href="#footer_contact" class="btn btn_grey"><?php _e("שלחו הודעה", "ozd-studio"); ?></a>	
		</div>
	</section>
	
</div>
<?php
get_footer('contact');
