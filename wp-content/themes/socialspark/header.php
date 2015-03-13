<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<title><?php if (is_home() || is_page('155')) { bloginfo('name'); } else { wp_title(''); } ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?v=5" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/comment-reply.js?ver=20090102"></script>
	<!--[if IE 6]>
	<script src="<?php bloginfo('template_url'); ?>/js/DD_belatedPNG_0.0.8a-min.js" type="text/javascript"></script>
	<script type="text/javascript">
		DD_belatedPNG.fix('#wrapper, #socialnetwork, #footer, .png_bg, #logo img');
	</script>
	<![endif]-->
</head>
<body>

<?php /*<div id="cornerbanner"><a href="http://www.devalog.com/portfolio/"><img src="<?php bloginfo('template_url'); ?>/images/banner.png" alt="" border="0" /></a></div>*/ ?>


<div id="sidebar-menu" class="sidebar-mobile">
	<div class="sidebar-inner">
		<div class="pimpama-section">
			<h2>PIMPAMA</h2>
			<p>07 55449 3686</p>
			<button type="button" class="btn-sidebar">Book Online</button>
		</div><!--/.pimpama-section-->
		<div class="miami-section">
			<h2>Miami</h2>
			<p>07 55449 3686</p>
			<button type="button" class="btn-sidebar">Book Online</button>
		</div><!--/.pimpama-section-->
	</div>
	<?php 
		if (has_nav_menu('footer-menu')):
				wp_nav_menu( array( 
				'container_class' => 'sidebars_widgets-menu', 
				'theme_location' => 'footer-menu') 
				); 
		endif;
	?>
</div>



<div id="page">

	<div id="header">


		<?php if ( is_front_page() ) { ?>
			<div id="facebook-button">
				<a href="https://www.facebook.com/HairRocksAus/" target="_blank"><img src="http://hairrocks.com.au/wp-content/uploads/2012/12/facebook.jpg" width="153" height="65" border="0" alt="Like us on Facebook" /></a>
			</div>
		<?php } ?>


		<div id="branding">

<div id="info-pimpama">
	<a class="tel" href="tel:0755493686"><span>07 5549 3686<span></a>
	<a href="http://bookings.simplesalon.com/Login.aspx?api=96de1626-c274-451a-a211-cde942cf8f61">
	<img src="<?php bloginfo('template_url'); ?>/images/header-pimpama.png" width="340" height="241" alt="Pimpama Booking Button" border="0" />
	</a>
</div>

			<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
			<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img id="logo" src="<?php bloginfo('template_url'); ?>/images/header-logo.png" width="300" height="241" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" border="0" /></a>
		</div>

		<button class="sidebar-button">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>

<div id="info-miami">
	<a class="tel" href="tel:0755358999"><span>07 5535 8999<span></a>
	<a href="http://www.hairrocks.australiapos.com.au/">
	<img src="<?php bloginfo('template_url'); ?>/images/header-miami.png" width="340" height="241" alt="Miami Booking Button" border="0" />
	</a>
</div>

	<div id="main-menu" align="right">
		<ul id="menu-links">
			<li><a href="<?php echo home_url( '/' ); ?>">Home</a></li>
			<li><a href="<?php echo home_url( '/' ); ?>about">About</a></li>
			<li><a href="<?php echo home_url( '/' ); ?>blog">Blog</a></li>
			<li><a href="<?php echo home_url( '/' ); ?>prices">Prices</a></li>
			<li><a href="<?php echo home_url( '/' ); ?>products">Products</a></li>
			<li><a href="<?php echo home_url( '/' ); ?>contact">Contact</a></li>
			<!-- <li><a href="<?php echo home_url( '/' ); ?>products">Products</a></li> -->
		</ul>
	</div>

	<?php if ( is_front_page() ) { ?>
	<div id="header-images">
		<img src="<?php bloginfo('template_url'); ?>/images/header.jpg" width="960" height="288" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" border="0" />
	</div>
	<?php } ?>

	</div><!-- /header -->

	<div id="content">
