<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<div class="post" id="post-<?php the_ID(); ?>">
		<div class="entry">
			<div class="entry_single">

				<div id="archives">  
				
				<h1>Archives (Latest Posts)</h1>
				
				<div id="archives_month">
					<select name="archive-dropdown" class="archives_select" onChange='document.location.href=this.options[this.selectedIndex].value;'> 
						<option value=""><?php echo esc_attr(__('Select a Month')); ?></option> 
						<?php wp_get_archives('type=monthly&format=option&show_post_count=1'); ?>
					</select>
				</div>
				  
				<div id="archives_cat">
					<?php wp_dropdown_categories('show_option_none=Select a Category&class=archives_select&show_count=1&orderby=name'); ?>
				</div>
				
				<script type="text/javascript">
				var dropdown = document.getElementById("cat");
				function onCatChange() {
					if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
						location.href = "<?php echo get_option('home'); ?>/?cat="+dropdown.options[dropdown.selectedIndex].value;
					}
				}
				dropdown.onchange = onCatChange;
				</script>	
				
				<p>Check out the archive of our latest posts.</p>
				
				<ul id="archive-list">
					<?php /* Show latest 32 posts */ $myposts = get_posts('numberposts=32&'); foreach($myposts as $post) : ?>
					<li><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" class="tip"><img class="archive_image" src="<?php bloginfo('template_directory'); ?>/thumbnail.php?src=<?php echo catch_that_image(); ?>&amp;h=50&amp;w=50&amp;zc=1" width="50" height="50" border="0" alt="<?php the_title(); ?>" /></a>
					
					<div class="archive_title"><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" class="tip"><?php the_title(); ?></a><br />
					<div class="archive_date">Posted: <?php the_time('d, M, Y'); ?></div>
					</div>
					
					</li>
					<?php endforeach; ?>
				</ul>
				
					
				</div>

		</div>
	</div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
