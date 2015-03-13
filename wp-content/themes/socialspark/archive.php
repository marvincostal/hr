<?php get_header(); ?>

<div id="content-left">

<?php if (have_posts()) : ?>

<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>
<h1><?php single_cat_title(); ?></h1>
  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
<h1>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>
  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
<h1>Archive for <?php the_time('F jS, Y'); ?></h1>
  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
<h1>Archive for <?php the_time('F, Y'); ?></h1>
  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
<h1>Archive for <?php the_time('Y'); ?></h1>
<?php /* If this is an author archive */ } elseif (is_author()) { ?>
<h1>Author Archive</h1>
  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
<h1>Blog Archives</h1>
  <?php } ?>

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

	<div id="pagination">
			<?php if (wp_pagenav() != false) { ?>
				<p class="postnav">
					<?php  wp_pagenav();  ?>
				</p>
			<?php } ?>
		</div>

<?php else : ?>

<div class="entry">
<div class="entry_single">
	<h1>Category Error</h1>
	<h3>Sorry, the category you were looking for currently has no posts.</h3>
	<p>No sense sticking around here for very long. Check out the sidebar where you will be able to search and find some of our popular articles.</p>
</div>
</div>	

<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
