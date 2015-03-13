<?php

// Set newrelic application
if (extension_loaded('newrelic'))
	newrelic_set_appname('hairrocks');

/**
 * Theme options (admin)
 */
require_once (TEMPLATEPATH . '/functions/theme-options.php');

/** Tell WordPress to run socialspark_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'socialspark_setup' );

if ( ! function_exists( 'socialspark_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function socialspark_setup() {

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );


	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(	array(
			'top-menu' => __( 'Top Menu' ),
			'main-menu' => __( 'Main Menu' ),
			'footer-menu' => __( 'Footer Menu' )
	)	);

	// This theme allows users to set a custom background
	add_custom_background();

	// Your changeable header business starts here
	define( 'HEADER_TEXTCOLOR', '' );
	// No CSS, just IMG call. The %s is a placeholder for the theme template directory URI.
	define( 'HEADER_IMAGE', '%s/images/logo.png' );


	// Add a way for the custom header to be styled in the admin panel that controls
	// custom headers. See socialspark_admin_header_style(), below.
	add_custom_image_header( '', 'socialspark_admin_header_style' );

	// ... and thus ends the changeable header business.

}
endif;

if ( ! function_exists( 'socialspark_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in socialspark_setup().
 */
function socialspark_admin_header_style() {
?>
<style type="text/css">
/* Shows the same border as on front end */
#headimg {
	border-bottom: 1px solid #000;
	border-top: 4px solid #000;
}
/* If NO_HEADER_TEXT is false, you would style the text with these selectors:
	#headimg #name { }
	#headimg #desc { }
*/
</style>
<?php
}
endif;



/**
 * Sidebars
 */
register_sidebar( array(
	'name' => __( 'Sidebar', 'socialspark' ),
	'id' => 'sidebar',
	'description' => __( 'The sidebar widget area', 'socialspark' ),
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );


/**
 * Footer
 */
register_sidebar( array(
	'name' => __( 'Footer', 'socialspark' ),
	'id' => 'footer',
	'description' => __( 'The footer widget area', 'socialspark' ),
	'before_widget' => '<div class="widget-horizontal">',
	'after_widget' => '</div>',
	'before_title' => '<h4>',
	'after_title' => '</h4>',
) );

/**
 * Email Subscription widget class
 */
class WP_Widget_Email_Subscription extends WP_Widget {

	function WP_Widget_Email_Subscription() {
		$widget_ops = array('classname' => 'widget_email_subscription', 'description' => __('HTML for email subscription'));
		$control_ops = array('width' => 400, 'height' => 350);
		$this->WP_Widget('email_subscription', __('Email Subscription Code'), $widget_ops, $control_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
		$text = apply_filters( 'widget_text', $instance['text'], $instance );
		echo $before_widget;
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; } ?>
			<div class="emailsubscriptionwidget"><table width="243" border="0" cellpadding="0" cellspacing="0"><tr><td><?php echo $text; ?></td></tr></table></div>
		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$title = strip_tags($instance['title']);
		$text = format_to_edit($instance['text']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>

<?php
	}
}

/**
 * Blog Statistics widget class
 */
class WP_Widget_Blog_Statistics extends WP_Widget {

	function WP_Widget_Blog_Statistics() {
		$widget_ops = array('classname' => 'widget_blog_statistics', 'description' => __('Blog statistics, RSS, Facebook &amp; Twitter links'));
		$control_ops = array('width' => 400, 'height' => 350);
		$this->WP_Widget('blog_statistics', __('Blog Statistics'), $widget_ops, $control_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
		echo $before_widget;
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; } ?>
		<ul><li style="padding: 10px;">
		<table width="100%" cellpadding="0">
		<tr>
			<td width="60%"><div class="stats_title">Readers</div></td>
			<td>&nbsp;</td>
			<td width="60%"><div class="stats_title">Posts</div></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td><div class="stats_count"><?php socialspark_readers(); ?></div></td>
			<td align="center"><div class="stats_count">|</div></td>
			<td><div class="stats_count"><?php socialspark_posts(); ?></div></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
		<td colspan="4" align="center"><div style="margin: 0 5px; border-bottom: 1px #dedede solid;"></div></td>
		</tr>
		</table>

		<div class="stats_icons"><a class="tip" title="Subscribe via RSS" target="_blank" href="<?php bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/icon_rss_big.png" alt="" border="0" /></a></div>
		<?php
		/* Subscribe Via Email */
		$socialspark_emailsubscribe = get_option('socialspark_emailsubscribe');
		if (!empty($socialspark_emailsubscribe))
			echo '<div class="stats_icons"><a class="tip" title="Subscribe via Email" target="_blank" href="' . stripslashes($socialspark_emailsubscribe) . '"><img src="' . get_bloginfo('template_directory') . '/images/icon_email_big.png" alt="Subscribe Via Email" border="0" /></a></div>';

		/* Facebook */
		$socialspark_facebookid = get_option('socialspark_facebookid');
		if (!empty($socialspark_facebookid))
			echo '<div class="stats_icons"><a class="tip" title="View Facebook Fan Page" target="_blank" href="' . stripslashes($socialspark_facebookid) . '"><img src="' . get_bloginfo('template_directory') . '/images/icon_facebook_big.png" alt="View Facebook Fan Page" border="0" /></a></div>';

		/* Twitter */
		$socialspark_twitterid = get_option('socialspark_twitterid');
		if (!empty($socialspark_twitterid))
			echo '<div class="stats_icons"><a class="tip" title="Follow On Twitter" target="_blank" href="http://www.twitter.com/' . stripslashes($socialspark_twitterid) . '"><img src="' . get_bloginfo('template_directory') . '/images/icon_twitter_big.png" alt="Follow On Twitter" border="0" /></a></div>';
		?>
		<div class="c"></div>
		</li></ul>
		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
		$title = strip_tags($instance['title']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

<?php
	}
}

/**
 * Register all of the WordPress widgets on startup.
 */
function socialspark_widgets_init() {

	register_widget('WP_Widget_Email_Subscription');

	register_widget('WP_Widget_Blog_Statistics');

}

add_action('widgets_init', 'socialspark_widgets_init', 1);

/**
 * Theme header
 */
function socialspark_header() {

	/* JavaScript for comment replies */
	if (is_singular())
		wp_enqueue_script('comment-reply');

	/* Custom Favicon */
	$socialspark_favicon_url = get_option('socialspark_favicon_url');
	if (!empty($socialspark_favicon_url))
		echo '<link rel="icon" href="' . stripslashes($socialspark_favicon_url) . '" type="image/png" />' . "\n";

	/* Custom CSS */
	$socialspark_bgurl = get_option('socialspark_bgurl');
	$socialspark_bgcolor = get_option('socialspark_bgcolor');
	$socialspark_headerheight = get_option('socialspark_headerheight');
	$socialspark_descriptionsize = get_option('socialspark_descriptionsize');
	$socialspark_descriptioncolor = get_option('socialspark_descriptioncolor');
	if (!empty($socialspark_bgurl) || !empty($socialspark_bgcolor) || !empty($socialspark_headerheight) || !empty($socialspark_descriptionsize) || !empty($socialspark_descriptioncolor)) {
		echo '<style type="text/css"> ';
		echo 'body { ';
		if (!empty($socialspark_bgcolor))
			echo 'background-color: ' . $socialspark_bgcolor . '; ';
		if (!empty($socialspark_bgurl))
			echo 'background-image: url(' . $socialspark_bgurl . '); ';
		echo '} ';
		if (!empty($socialspark_headerheight))
			echo '#branding { height: ' . $socialspark_headerheight . ' } ';
		if (!empty($socialspark_descriptionsize) || !empty($socialspark_descriptioncolor))
			echo '#site-description { ';
		if (!empty($socialspark_descriptionsize))
			echo 'font-size: ' . $socialspark_descriptionsize . '; ';
		if (!empty($socialspark_descriptioncolor))
			echo 'color: ' . $socialspark_descriptioncolor . '; ';
		echo '} ';
		echo '</style>';
	}

}
add_action('wp_head', 'socialspark_header');

/**
 * Theme footer
 */
function socialspark_footer() {

	/* Analytics Code */
	$socialspark_analytics_code = get_option('socialspark_analytics_code');
	if (!empty($socialspark_analytics_code))
		echo stripslashes ($socialspark_analytics_code);

}
add_action('wp_footer', 'socialspark_footer');

/**
 * Related posts
 */
function socialspark_related_posts() {
	global $post;

	$backup = $post;
	$tags = wp_get_post_tags($post->ID);
	if ($tags) {
		$tag_ids = array();
		foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;

		$args=array(
			'tag__in' => $tag_ids,
			'post__not_in' => array($post->ID),
			'showposts' => 4, // Number of related posts that will be shown.
			'caller_get_posts' => 1
		);
		$my_query = new wp_query($args);
		if( $my_query->have_posts() ) {
			echo '<h3 class="entry_title">Related Posts</h3><div class="related_posts"><ol class="related-posts">';
			while ($my_query->have_posts()) {
				$my_query->the_post();
				?>
				<li class="related"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><img src="<?php bloginfo('template_directory'); ?>/thumbnail.php?src=<?php echo catch_that_image(); ?>&amp;h=120&amp;w=120&amp;zc=1" border="0" align="left" class="post_image" alt="" /></a><br /><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
				<?php
			}
			echo '</ol><div class="c"></div></div>';
		}
	}
	$post = $backup;
	wp_reset_query();

}

/**
 * Comments layout
 */
function heatlthytheme_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment;
?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID(); ?>">
			<div class="comment-author">
				<?php echo get_avatar($comment,$size=$args['avatar_size'],$default=get_bloginfo('template_directory') . '/images/custom-gravatar.jpg'); ?>
				<div class="comment-meta"><?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?><br /><?php printf(get_comment_date('d.m.y')) ?></div>
			</div>
			<div class="comment-text">
				<div class="comment-arrow"></div>
				<?php if ($comment->comment_approved == '0') : ?>
					<em><?php _e('Your comment is awaiting moderation.') ?></em>
					<br />
				<?php endif; ?>
				<?php comment_text() ?>
				<?php if ($comment_reply_link = get_comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'])))) echo '<div class="comment-reply">' . $comment_reply_link . '</div>'; ?>
			</div>
		</div>
		<div class="c"></div>
<?php
}

/**
 * Blog readers
 */
function socialspark_readers() {

	$socialspark_twitterid = get_option('socialspark_twitterid');

	if (!empty($socialspark_twitterid)) {

		$key = 'socialspark_readers_count_' . $socialspark_twitterid;

		// Let's see if we have a cached version
		$readers_count = get_transient($key);
		if ($readers_count !== false) {
			echo $readers_count;
			return;
		}

	}

	$readers = stripslashes(get_option('socialspark_readers'));
	if (!empty($socialspark_twitterid))
		$followers = twitter_followers_count($socialspark_twitterid);
	else
		$followers = 0;
	$total = $readers + $followers;

	$count = number_format($total, 0, '.', ',');

	if (!empty($socialspark_twitterid)) {
		set_transient($key, $count, 60*60*24);
		update_option($key, $count);
	}
	echo $count;

}

/**
 * Blog posts
 */
function socialspark_posts() {
	global $wpdb;

	$key = 'socialspark_posts_count';

	$posts = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' AND post_name NOT LIKE '%revision%' AND post_name NOT LIKE '%autosave%'");

	$count = number_format($posts, 0);

	set_transient($key, $count, 60*60*24);
	update_option($key, $count);
	echo $count;

}

/**
 * Blog comments
 */
function socialspark_comments() {
	global $wpdb;

	$key = 'socialspark_comments_count';

	// Let's see if we have a cached version
	$comments_count = get_transient($key);
	if ($comments_count !== false) {
		echo $comments_count;
		return;
	}

	$comments = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments  WHERE comment_approved = '1'");

	$count = number_format($comments, 0);

	set_transient($key, $count, 60*60*24);
	update_option($key, $count);
	echo $count;

}

// create clean pingbacks and trackbacks
function GetCleanPings($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; echo '<li>'.comment_author_link().'</li>';
}

/**
 * Count twitter followers
 */
function twitter_followers_count($screen_name = '') {

	if (empty($screen_name))
		return 0;

	$key = 'twitter_followers_count_' . $screen_name;

	// Let's see if we have a cached version
	$followers_count = get_transient($key);
	if ($followers_count !== false)
		return $followers_count;

	// If there's no cached version we ask Twitter
	$response = wp_remote_get("http://api.twitter.com/1/users/show.json?screen_name=" . $screen_name);
	if (is_wp_error($response)) {
		// In case Twitter is down we return the last successful count
		return get_option($key);
	} else {
		// If everything's okay, parse the body and json_decode it
		$json = json_decode(wp_remote_retrieve_body($response));
		$count = $json->followers_count;

		// Store the result in a transient, expires after 1 day
		// Also store it as the last successful using update_option
		set_transient($key, $count, 60*60*24);
		update_option($key, $count);
		return $count;
	}
}

/**
 * Extract a thumbnail for a post
 */
function catch_that_image() {
	global $post, $posts;
	$first_img = '';
	ob_start();
	ob_end_clean();
	if ($post_thumbnail = get_the_post_thumbnail($post->ID)) { /* Find uploaded thumbnail */
		$image_code = $post_thumbnail;
	} else {	/* Find thumbnail from within the post */
		$image_code = $post->post_content;
	}
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $image_code, $matches);
	if (isset($matches)) {
		$siteurl_info = parse_url(get_option('siteurl'));
		foreach($matches[1] AS $image) {
			if (preg_match ('/http:\/\//', $image) == true) {
				$url_info = parse_url($image);
				if (preg_match ('/' . $siteurl_info['host'] . '/', $url_info['host']) == true) {
					$first_img = $image;
					break;
				}
			} else {
				$first_img = $image;
				break;
			}
		}
	}
	if (empty($first_img)) { /* No images found... show default */
		$socialspark_post_image_url = get_option('socialspark_post_image_url');
		$first_img = (!empty($socialspark_post_image_url)) ? $socialspark_post_image_url : get_bloginfo('template_directory') . '/images/noimage.jpg';
	}
	return $first_img;
}


/**
 * Navigation
 */
function wp_pagenav($psr_size = 2, $psr_sep = '&nbsp;', $psr_cl = '<span class="current">', $psr_cr = '</span>', $psr_1 = 'First', $psr_2 = '<<', $psr_3 = '>>', $psr_4 = 'Last') {
	global $wpdb, $wp_query;

	$psr_pages = $wp_query->max_num_pages; // number of pages
	$psr_paged = intval(get_query_var('paged')); // current page
	if ($psr_paged < 1)
		$psr_paged = 1;

	if (1 < $psr_pages) {

		$psr_size = (int) $psr_size;
		if ($psr_size < 1)
			$psr_size = 2;
		if (100 < $psr_size)
			$psr_size = 2;

		if (1 < $psr_paged) {
			$psr_url1 = esc_url(get_pagenum_link(1));
			$psr_url2 = esc_url(get_pagenum_link($psr_paged-1));
			echo '<a href="' . $psr_url1 . '">' . $psr_1 . '</a>' . $psr_sep . '<a href="' . $psr_url2. '">' . $psr_2 . '</a>' . $psr_sep;
		}
		for($a=0; $a < $psr_size; $a++) {
			$psr_num = ($psr_paged-($psr_size-$a));
			if (0 < $psr_num) {
				$psr_url = esc_url(get_pagenum_link($psr_num));
				echo '<a href="' . $psr_url . '">' . $psr_num . '</a>' . $psr_sep;
			}
		}
		$psr_url  = esc_url(get_pagenum_link($psr_paged));
		echo $psr_cl . '<a href="' . $psr_url . '">' . $psr_paged . '</a>' . $psr_cr;
		for($a=0; $a < $psr_size; $a++) {
			$psr_num = ($psr_paged+($a+1));
			if ($psr_num < ($psr_pages+1)) {
				$psr_url = esc_url(get_pagenum_link($psr_num));
				echo $psr_sep . '<a href="' . $psr_url . '">' . $psr_num . '</a>';
			}
		}
		if ($psr_paged < $psr_pages) {
			$psr_url1 = esc_url(get_pagenum_link($psr_paged+1));
			$psr_url2 = esc_url(get_pagenum_link($psr_pages));
			echo $psr_sep . '<a href="' . $psr_url1 . '">' . $psr_3 . '</a>' . $psr_sep . '<a href="' . $psr_url2 . '">' . $psr_4 . '</a>';
		}

	} else {
		return false;
	}
}
?>
