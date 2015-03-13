<?php get_header(); ?>

<div id="content-left">
	
	<h1>Search Results</h1>

	<?php if (have_posts()) : ?>

		<?php $x = 1; while (have_posts()) : the_post();?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="entry">
				<div class="entry_date"><div><?php the_time('d'); ?><br /><?php the_time('M') ?></div></div>
				<div class="entry_content">
					<div class="entry_thumb">
					<a href="<?php the_permalink() ?>" rel="bookmark"><img src="<?php bloginfo('template_directory'); ?>/thumbnail.php?src=<?php echo catch_that_image(); ?>&amp;h=200&amp;w=200&amp;zc=1" border="0" align="left" class="post_image" alt="" /></a>
					</div>
					<div class="entry_text">
					<h2 class="post_heading"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<?php the_excerpt('...'); ?>	
					</div>
					<div class="c"></div>
				</div>
				<div class="entry_meta">
					<table width="100%" cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td width="45"><div class="comment_count"><?php comments_popup_link('0', '1', '%'); ?></div></td>
							<td><div class="comment_link"><a href="<?php the_permalink(); ?>#comments" title="View The Comments">Comments</a> | <?php if(function_exists('the_views')) { the_views(); } ?></div></td>
							<td><a href="<?php the_permalink(); ?>" class="continue">Continue Reading &#62;</a></td>
						</tr>
					</table>
				</div>
			</div>
		</div>			
		<?php $x++; endwhile; ?>

		<div id="navigation">
			<?php if (wp_pagenav() != false) { ?>
				<p class="postnav">
					<?php  wp_pagenav();  ?>
				</p>
			<?php } ?>
		</div>

	<?php else : ?>

		<div class="entry">
			<div class="entry_single">
			<h2>No posts found.</h2>			
			<?php include (TEMPLATEPATH . '/searchform.php'); ?>
			<div>&nbsp;</div>
			</div>
		</div>

	<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>