<?php
/*
Template Name: Home Layout
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
		
</div>

<div id="content-left">

		<!-- Latest Post -->

		<?php /* Show latest post */ $myposts = get_posts('numberposts=1&offset=3'); foreach($myposts as $post) : ?>
		<div class="post">

				<div class="entry_content_home">
					<div class="entry_thumb_home">
					<div class="new_banner"><img src="<?php bloginfo('template_url'); ?>/images/new_banner.png"></div>
					<a href="<?php the_permalink() ?>" rel="bookmark"><img src="<?php bloginfo('template_directory'); ?>/thumbnail.php?src=<?php echo catch_that_image(); ?>&amp;h=220&amp;w=220&amp;zc=1" border="0" align="left" class="post_image" alt="" /></a>
					</div>
					<div class="entry_text_home">
					<p class="smalltitle">Latest from the blog..</p>
					<h2 class="post_heading_home"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<p><?php echo substr(strip_tags($post->post_content), 0, 305);?>...</p>
					</div>
					<div class="c"></div>
				</div>

		</div>			
		<?php endforeach; ?>
		
		<h4>More Great Articles..</h4>
		
		<!-- Show post 2, 3 & 4 -->
		
		<div class="alignsnippets">
		<?php /* Show post 2, 3 & 4 */ $myposts = get_posts('numberposts=3&offset=4'); foreach($myposts as $post) : ?>
				
		<div class="post">

			<div class="entry_content_snippet">
				<div class="entry_text_snippet">
				<div class="entry_thumb_home"><a href="<?php the_permalink() ?>" rel="bookmark"><img src="<?php bloginfo('template_directory'); ?>/thumbnail.php?src=<?php echo catch_that_image(); ?>&amp;h=100&amp;w=210&amp;zc=1" border="0" align="left" class="post_image" alt="" /></a></div>
				<div style="padding: 110px 10px 0 0px;">
				<h3 class="post_heading_home"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
				<p><?php echo substr(strip_tags($post->post_content), 0, 140);?>...</p>
				</div>
				</div>
			</div>
			
		</div>		

		<?php endforeach; ?>
		
		<div class="c"></div>
		</div>

	<?php else : ?>

		<h1>Not Found</h1>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>
