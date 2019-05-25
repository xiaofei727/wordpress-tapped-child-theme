<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
	<?php endif; ?>
	<link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
      crossorigin="anonymous"
		/>
		<link href="https://fonts.googleapis.com/css?family=PT+Serif&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
    <title>Tapped <?php 	echo $post->post_title ?></title>
	<?php wp_head(); ?>
	<?php
		
			echo '<link rel="stylesheet" href="' . get_stylesheet_directory_uri() . '/css/About.css" />';
		
		
			echo '<link rel="stylesheet" href="' . get_stylesheet_directory_uri() . '/css/Tapped.css" />';
		
		
			echo '<link rel="stylesheet" href="' . get_stylesheet_directory_uri() . '/css/Tapped.css" />';
			echo '<script src="' . get_stylesheet_directory_uri() . '/js/reserve.js"></script>';
		
		
			echo '<link rel="stylesheet" href="' . get_stylesheet_directory_uri() . '/css/ColdBrew.css" />';
			echo '<script src="' . get_stylesheet_directory_uri() . '/js/coldbrew.js"></script>';
		
		
			echo '<link rel="stylesheet" href="' . get_stylesheet_directory_uri() . '/css/SpecialEvent.css" />';
			echo '<script src="' . get_stylesheet_directory_uri() . '/js/specialevent.js"></script>';
		
		
			echo '<link rel="stylesheet" href="' . get_stylesheet_directory_uri() . '/css/TappedVending.css" />';
		
	?>
	<style>
		h4, h5, h6{
			font-weight: 400;
		}
		#image_slide h1{
			font-size: 4em;
		}
		h2{
			font-size:2.2em;
		}
		.pattern-wrapper{
			background: url('http://studio7.website/tapped/wp-content/themes/twentysixteen-child/image/pattern.jpg') repeat;
		}
		#benefits{
			padding: 80px 10px;

		}
		#benefits h4{
			font-size: 22px;
		}
		.tabcontent p{
			margin-bottom: 0px !important;
		}
		#image_slide h1 {
		    font-size: 4em;
		    line-height: 72px;
		}
		.cafe-image{
			max-height: 400px;
			text-align: center;
			display: block;
			margin: 0px auto;
			margin-top: 30px;
		}
		.coffee-service-image{
			height: auto;
			max-width: 100%;
			vertical-align: middle;
			max-height: 400px;
			text-align: center;
			display: block;
			margin: 0px auto;
			padding-top: 40px;
		}
		.office-tea-service img {
		    height: auto;
		    max-width: 100%;
		    vertical-align: middle;
		    max-height: 90px;
		    display: block;
		    margin: 0px auto;
		}
		#freshed_brew div.left{
			padding-left: 2vw;
		}
		@media only screen and (max-width: 600px) {
		  #image_slide h1{
		    color: white;
		    padding-right: 0vw;
		    padding-left: 0vw;
		  }
		  small {
		      margin-left: 0px;
		  }
		  #benefits {
		      padding: 30px 10px;
		  }
		  #image_slide h1, #image_slide h4 {
		      padding-right: 0vw;
		      padding-left: 0vw;
		  }
		}
	</style>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<div class="site-inner">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentysixteen' ); ?></a>

		<header id="masthead" class="site-header" role="banner">
			<div class="site-header-main">
				<div class="site-branding">
					
					<h1 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/image/logo.png" alt="">
						</a>
					</h1>
				
				</div><!-- .site-branding -->

				<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>
					<button id="menu-toggle" class="menu-toggle"><?php _e( 'Menu', 'twentysixteen' ); ?></button>

					<div id="site-header-menu" class="site-header-menu">
						<?php if ( has_nav_menu( 'primary' ) ) : ?>
							<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'twentysixteen' ); ?>">
								<?php
									wp_nav_menu(
										array(
											'theme_location' => 'primary',
											'menu_class' => 'primary-menu',
										)
									);
								?>
							</nav><!-- .main-navigation -->
						<?php endif; ?>

						<?php if ( has_nav_menu( 'social' ) ) : ?>
							<nav id="social-navigation" class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'twentysixteen' ); ?>">
								<?php
									wp_nav_menu(
										array(
											'theme_location' => 'social',
											'menu_class'  => 'social-links-menu',
											'depth'       => 1,
											'link_before' => '<span class="screen-reader-text">',
											'link_after'  => '</span>',
										)
									);
								?>
							</nav><!-- .social-navigation -->
						<?php endif; ?>
					</div><!-- .site-header-menu -->
				<?php endif; ?>
			</div><!-- .site-header-main -->

			<?php if ( get_header_image() ) : ?>
				<?php
					/**
					 * Filter the default twentysixteen custom header sizes attribute.
					 *
					 * @since Twenty Sixteen 1.0
					 *
					 * @param string $custom_header_sizes sizes attribute
					 * for Custom Header. Default '(max-width: 709px) 85vw,
					 * (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px'.
					 */
					$custom_header_sizes = apply_filters( 'twentysixteen_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px' );
				?>
				<div class="header-image">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>" sizes="<?php echo esc_attr( $custom_header_sizes ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
					</a>
				</div><!-- .header-image -->
			<?php endif; // End header image check. ?>
		</header><!-- .site-header -->

		<div id="content" class="site-content">
