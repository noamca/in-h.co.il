<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package OZD_Studio
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">


<!-- Bootstrap core CSS -->
<link href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap RTL CSS -->
<?php if( get_locale() == 'he_IL' ){ ?>
	<link href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/css/bootstrap-rtl.min.css" rel="stylesheet">
<?php } ?>
	
<!-- Font Awesome Icons -->
<link href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Alef|Heebo:300,400,500&amp;subset=hebrew" rel="stylesheet">

<!-- noUiSlider CSS -->
<link href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/css/nouislider.css" rel="stylesheet">	
<!-- EasyDropdown CSS -->
<link href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/css/easydropdown.metro.css" rel="stylesheet">




<!-- Swiper CSS -->
<link href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/css/swiper.min.css" rel="stylesheet">



<!-- FAVICON -->
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicon.png" />
<?php wp_head(); ?>
<!-- Responsive CSS -->
<link href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/responsive.css" rel="stylesheet">
<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body <?php body_class(); ?>>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ozd-studio' ); ?></a>
	
	<!-- HEADER
	================================================== -->
	<header id="masthead" class="site-header" role="banner">
	
		<!-- NAVBAR
		================================================== -->
		<div class="navbar navbar-inverse navbar-fixed-top bg_color" role="navigation">
		<div id="nav-bg"></div>
			<div class="container">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand mobile-icon" href="<?php echo esc_url( site_url() ); ?>">
					<div class="desktop-only">
						<img class="" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/img/logo.png" alt="<?php wp_title( '|', true, 'right' ); ?>">
					</div>
					<div class="mobile-only mobile-center">
						<img class="" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/img/logo_mobile.png" alt="<?php wp_title( '|', true, 'right' ); ?>">
					</div>
				</a>
				<div class="mobile-only" style="position: absolute; top: 10px; left: 10px">
				<a href="https://wa.me/972522433040?text=מבקש/ת שתחזור אלי. תודה."><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/img/whatsapp-logo.png" width="50px" height="50px" ></a>
				</div>
				<div class="navbar-social desktop-only float-left">
				<a href="https://wa.me/972522433040?text=מבקש/ת שתחזור אלי. תודה." class="whatsapp" ><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/img/whatsapp-logo.png" width="28px" height="28px" ></a>
					<!--<a href="tel:<?php the_field('contact_phone', 'option'); ?>" class="badge social-icon"><i class="fa fa-phone"></i></a> -->
					<a href="mailto:<?php the_field('contact_email', 'option'); ?>" class="badge social-icon"><i class="fa fa-envelope"></i></a>
					<a href="<?php the_field('contact_facebook', 'option'); ?>" class="badge social-icon" target="_blank"><i class="fa fa-facebook"></i></a>
					<div class="lang-switcher float-left">
						<?php $translations = pll_the_languages(array('raw'=>1));?>
						<select class="dropdown lang_switcher" id="lang-switcher">
						<?php foreach($translations as $translation){
							echo '<option value="'.$translation['url'].'">'.$translation['name'].'</option>';
						}?>
						</select>
					</div>
				</div>				
				<div class="navbar-collapse collapse">
					<?php
						wp_nav_menu( array(
							'menu'              => 'primary',
							'theme_location'    => 'primary',
							'depth'             => 2,
							'menu_class'        => 'nav navbar-nav',
							'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
							'walker'            => new WP_Bootstrap_Navwalker())
						);
					?>
					
					<span class="mobile-only">
						<div class="navbar-social">
							<a href="tel:<?php the_field('contact_phone', 'option'); ?>" class="badge social-icon"><i class="fa fa-phone"></i></a>
							<a href="mailto:<?php the_field('contact_email', 'option'); ?>" class="badge social-icon"><i class="fa fa-envelope"></i></a>
							<a href="<?php the_field('contact_facebook', 'option'); ?>" class="badge social-icon" target="_blank"><i class="fa fa-facebook"></i></a>
							<div class="lang-switcher float-left">
								<?php $translations = pll_the_languages(array('raw'=>1));?>
								<select class="dropdown lang_switcher" id="lang-switcher2">
									<?php foreach($translations as $translation){
										echo '<option value="'.$translation['url'].'">'.$translation['name'].'</option>';
									}?>
								</select>
							</div>							
						</div>	
					</span>
				</div>
			</div>
		</div>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
