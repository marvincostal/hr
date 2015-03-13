<?php
/*
Template Name: Test Home Layout
*/
?>

<?php get_header(); ?>

<div id="content-main">

	<?php if (have_posts()) : ?>
	
		<!-- Main Slider -->	
		<div id="mainslider_container">
			<div id="mainslider_container_border">
				<div class="mainslider_border"><img src="<?php bloginfo('template_url'); ?>/images/mainslider_bottom.png" width="960" height="58" alt="" border="0" /></div>
					<ul id="mainslider">
						<?php /* Show post 1, 2 & 3 */ $myposts = get_posts('numberposts=3&'); foreach($myposts as $post) : ?>
							<li class="title_container">
								<div class="mainslider_title"><h3 class="mainslider_title_style"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3></div>
								<div class="entry_thumb_mainslider"><a href="<?php the_permalink() ?>" rel="bookmark"><img src="<?php bloginfo('template_directory'); ?>/thumbnail.php?src=<?php echo catch_that_image(); ?>&amp;h=400&amp;w=310&amp;zc=1" border="0" align="left" class="mainslider_image" alt="" /></a></div>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
		</div>
		

		<?php endif; ?>
	

<?php get_footer(); ?>

