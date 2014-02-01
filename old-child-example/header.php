<?php
/**
 * The template for displaying the header
 *
 * @package Reactor
 * @subpackge Templates
 * @since 1.0.0
 */?>
<!DOCTYPE html>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if ( IE 7 )&!( IEMobile )]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if ( IE 8 )&!( IEMobile )]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->

<head>
<?php wp_head(); ?>
<?php reactor_head(); ?>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700|Roboto+Condensed:300,700' rel='stylesheet' type='text/css'>
<?php 
//	if (is_page( 'Discography' ) ) 
	if ( is_post_type_archive('discography') ) {  ?>
		<link rel="stylesheet" type="text/css" href="http://giorgiomoroder.com/wp-content/themes/moroder/library/css/discog.css" />
		<script src="http://giorgiomoroder.com/wp-content/themes/moroder/library/js/jquery.mixitup.js"></script>
		<script src="http://giorgiomoroder.com/wp-content/themes/moroder/library/js/discog.js"></script>
<?php } ?>
<script type="text/javascript">
	$(document).ready(function() {
		$(".mobilenav").click(
		  function () { 
			$(".mobile-menu").slideToggle( "fast" );
			}
		);
	});
</script>


</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
<?php reactor_header_before(); ?>
<header id="header" class="site-header" role="banner">
	<div class="row">
		<div class="column large-12 medium-12 small-12">
			<div class="inner-header header-wrap">


				<div class="row hide-for-small">
					
					<div class="site-logo-head column large-2 medium-3 small-6 small-off"> 
						<img src="http://giorgiomoroder.com/wp-content/themes/moroder/library/img/logo-head.png"> 
					</div>
					
					<div class="site-logo column large-6 medium-5 small-8"> 
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"> 
							<img src="http://giorgiomoroder.com/wp-content/themes/moroder/library/img/logo9.png" alt="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?> logo"> 
						</a> 
					</div>
					
					<div class="site-social column large-4 medium-4 small-12">
						<ul class="social-nav">
							<a href="https://www.facebook.com/GiorgioMoroderOfficial"><li class="fb"></li></a> 
							<a href="https://twitter.com/giorgiomoroder"><li class="twit"></li></a> 
							<a href="https://plus.google.com/114468572828368637501" rel="publisher"><li class="googleplus"></li></a>
							<a href="https://soundcloud.com/giorgiomoroder"><li class="sc"></li></a> 
							<a href="http://instagram.com/igiorgiomoroder"><li class="insta"></li></a> 
							<a href="https://play.spotify.com/artist/6jU2Tt13MmXYk0ZBv1KmfO"><li class="spot"></li></a>
						</ul>
					</div>
					
					<div class="site-nav column large-10 medium-9 small-12">
						<nav role="navigation" id="menu">
							<ul class="horizontal-nav">
								<li class="menu-item"> <a class="scroll" href="http://giorgiomoroder.com/home">Home</a></li>
								<li class="menu-item"> <a class="scroll" href="http://giorgiomoroder.com/music/">Music</a></li>
								<li class="menu-item"> <a class="scroll" href="http://giorgiomoroder.com/discography/">Discography</a></li>
								<li class="menu-item"> <a class="scroll" href="http://giorgiomoroder.com/events/">Events</a></li>
<?php /*?>								<li class="menu-item"> <a class="scroll" href="http://giorgiomoroder.com/tour/">Tour</a></li><?php */?>
<?php /*?>								<li class="menu-item"> <a class="scroll" href="http://giorgiomoroder.com/dj/">DJ</a></li><?php */?>
								<li class="menu-item"> <a class="scroll" href="http://giorgiomoroder.com/news/">News</a></li>
								<li class="menu-item"> <a class="scroll" href="http://giorgiomoroder.com/biography/">Biography</a></li>
								<li class="menu-item"> <a class="scroll" href="http://giorgiomoroder.com/videos/">Videos</a></li>
								<li class="menu-item"> <a class="scroll" href="http://giorgiomoroder.com/photos/">Photos</a></li>
							</ul>
						</nav>
					</div>
				
				</div>
				
				
				
				
				
				
				
			<?php /*?>MOBILE HEADER<?php */?>
				<div class="row show-for-small">
	
					<div class="site-logo column small-12"> 
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                         	<img src="<?php echo get_site_url(); ?>/wp-content/themes/moroder/library/img/mobile-logo.png" alt="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?> logo"> 
                        </a>
                    </div>
					
					<div class="site-social column large-4 medium-4 small-12">
						<ul class="social-nav">
							<a href="https://www.facebook.com/GiorgioMoroderOfficial"><li class="fb"></li></a> 
							<a href="https://twitter.com/giorgiomoroder"><li class="twit"></li></a> 
							<a href="https://plus.google.com/114468572828368637501" rel="publisher"><li class="googleplus"></li></a>
							
							<a href="https://soundcloud.com/giorgiomoroder"><li class="sc"></li></a> 
							<a href="http://instagram.com/igiorgiomoroder"><li class="insta"></li></a> 
							<a href="https://play.spotify.com/artist/6jU2Tt13MmXYk0ZBv1KmfO"><li class="spot"></li></a>
						</ul>
						<a class="mobilenav" href="#"><span data-icon="a" aria-hidden="true" class="mobile-icon"></span></a>							
					</div>


					
					<div class="column small-12"> 
                    	<div class="menu-wrap clearfix">
                            
							<div class="site-nav column small-12">
								<nav role="navigation" id="menu" class="mobile-menu">
									<ul class="horizontal-nav">
										<li class="menu-item"> <a class="scroll" href="http://giorgiomoroder.com/home">Home</a></li>
										<li class="menu-item"> <a class="scroll" href="http://giorgiomoroder.com/music/">Music</a></li>
										<li class="menu-item"> <a class="scroll" href="http://giorgiomoroder.com/discography/">Discography</a></li>
										<li class="menu-item"> <a class="scroll" href="http://giorgiomoroder.com/events/">Events</a></li>
										<?php /*?><li class="menu-item"> <a class="scroll" href="http://giorgiomoroder.com/tour/">Tour</a></li>
										<li class="menu-item"> <a class="scroll" href="http://giorgiomoroder.com/dj/">DJ</a></li><?php */?>
										<li class="menu-item"> <a class="scroll" href="http://giorgiomoroder.com/news/">News</a></li>
										<li class="menu-item"> <a class="scroll" href="http://giorgiomoroder.com/biography/">Biography</a></li>
										<li class="menu-item"> <a class="scroll" href="http://giorgiomoroder.com/videos/">Videos</a></li>
										<li class="menu-item"> <a class="scroll" href="http://giorgiomoroder.com/photos/">Photos</a></li>
									</ul>
								</nav>
							</div>
					<!-- .site-nav --> 
                        </div>
    				</div><!-- .site-logo-nav -->

				</div>
				<!-- .row --> 
			<?php /*?>END MOBILE HEADER<?php */?>				
				
				
				
				
				
				
				
				
				
				
			</div>
		</div>
	</div>
	<!-- .row --> 
</header>
<!-- #header -->

<?php reactor_header_after(); ?>
<div id="main" class="wrapper">
