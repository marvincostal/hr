<?php get_header(); ?>

<div id="blog-left">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		
		<!-- Social Icons - Side Slider -->
		<div id="socialnetwork">
			<div class="entry_date">
				<div class="date_month"><?php the_time('M') ?></div>
				<div class="date_day"><?php the_time('d'); ?></div>
			</div>
			<div><a href="http://twitter.com/share" class="twitter-share-button" data-count="vertical">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div>
			<div><script src="http://www.stumbleupon.com/hostedbadge.php?s=5"></script></div>
			<div><iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink()); ?>&amp;layout=box_count&amp;show_faces=true&amp;width=51&amp;action=like&amp;font=lucida+grande&amp;colorscheme=light&amp;height=65" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:51px; height:65px;" allowTransparency="true"></iframe></div>
		</div>
	

			<div class="entry">
				<div class="entry_single">
				<h1><?php the_title(); ?></h1>
				<?php the_content('Continue Reading...'); ?>
				<p><?php the_tags(); ?></p>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				
				</div>
				<?php /* if (!get_post_meta($post->ID, 'hide-author') || get_post_meta($post->ID, 'hide-author', true) != 'yes') : ?>
				<div class="content_author">
					<div class="authorpic">
					<?php 
					$socialspark_author_image_url = get_option('socialspark_author_image_url');
					if (!empty($socialspark_author_image_url)) 
						echo '<img width="100" height="100" class="avatar avatar-100 photo" src="' . stripslashes($socialspark_author_image_url) . '" alt="" />';
					else
						echo get_avatar(get_the_author_meta('email'));
					?>
					</div>
					<div class="post-author">
						<div class="author-descr">
							<h2>About The Author: <?php the_author(); ?></h2>
							<p><?php the_author_meta('description'); ?></p>
							<div class="author-details"><img src="<?php bloginfo('template_directory'); ?>/images/page_icon.jpg" class="author_thumbnail" alt="Author Articles" />View all articles from <?php the_author_posts_link(); ?> (<?php the_author_posts(); ?>)</div>
						</div>
					</div>
					<div class="c"></div>
				</div>
				<?php endif; */ ?>	
				<div class="entry_meta">
					<div class="entry_meta_text">
					<?php if(function_exists('the_views')) { the_views(); } ?> Please consider sharing..
					</div>
					<div class="entry_meta_icons">
						<a href="http://www.facebook.com/share.php?src=bm&u=<?php the_permalink() ?>&t=<?php the_title() ?>&v=3" rel="nofollow" target="_blank" title="Share on Facebook!"><img src="<?php bloginfo('template_url'); ?>/images/icon_facebook.jpg" border="0" alt="" /></a>
						&nbsp;<a href="http://twitter.com/home?status=Currently reading <?php the_permalink(); ?>" title="Share on Twitter!" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/icon_twitter.jpg" alt="" border="0" /></a>
						&nbsp;<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>&title=<?php the_title(); ?>&summary=<?php the_excerpt(); ?>&source=http://www.rockyourguitar.com/" rel="nofollow" target="_blank" title="LinkedIn"><img src="<?php bloginfo('template_directory'); ?>/images/icon_linkedin.jpg" alt="LinkedIn" /></a>&nbsp;<a href="http://www.stumbleupon.com/submit?url=<?php the_permalink() ?>&title=<?php the_title(); ?>" title="Bookmark at StumbleUpon" rel="nofollow" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/icon_stumbleupon.jpg" alt="" border="0" /></a>
					</div>
				</div>
			</div>
		</div>
		
		<!--Related Posts -->
		<?php socialspark_related_posts(); ?>
		
		<?php /*comments_template('', true);*/ ?>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

	<?php endif; ?>
	
</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
