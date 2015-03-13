<?php get_header(); ?>

<div id="blog-left">

	<?php if (have_posts()) : ?>

		<?php $x = 1; while (have_posts()) : the_post();?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="entry">
				<div class="entry_content">
					<div class="entry_thumb">
					<a href="<?php the_permalink() ?>" rel="bookmark"><img src="<?php bloginfo('template_directory'); ?>/thumbnail.php?src=<?php echo catch_that_image(); ?>&amp;h=230&amp;w=230&amp;zc=1" border="0" align="left" class="post_image" alt="" /></a>
					</div>
					<div class="entry_text">
					<h2 class="post_heading"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<?php the_excerpt('...'); ?>	
					</div>
					<div class="c"></div>
				</div>
			</div>
		</div>
		<hr />
		<?php the_time('F jS Y'); ?> <a href="<?php the_permalink(); ?>" class="continue">Continue Reading &#62;</a>
		<hr />
		<?php $x++; endwhile; ?>
		
		<div id="pagination">
			<?php if (wp_pagenav() != false) { ?>
				<p class="postnav">
					<?php  wp_pagenav();  ?>
				</p>
			<?php } ?>
		</div>

	<?php else : ?>

		<h1>Not Found</h1>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
