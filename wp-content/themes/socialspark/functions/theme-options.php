<?php
/**
 * Custom Options Panel For This Wordpress Theme 
 */

$theme_name = 'socialspark';
$theme_shortname = 'socialspark';
$theme_version = '1.0';
$theme_url = get_bloginfo('template_url');

/**
 * Theme options
 */
global $options;
$options = array(

	array( 
		'name' => 'General',
		'type' => 'section'
		),
	
	array( 
		'type' => 'open'
		),
	
	array( 
		'name' => 'Email Subscription',
		'desc' => 'Enter the link to your email subscription form.<br/><br/>(ie. <strong>http://feedburner.google.com/fb/a/mailverify?uri=YourWebsite&amp;loc=en_US</strong>)',
		'id' => $theme_shortname . '_emailsubscribe',
		'type' => 'text',
		'default' => ''
		),
	
	array(
		'name' => 'Twitter Username',
		'desc' => 'Enter your Twitter username.<br/><br/>(ie. if your Twitter address is http://twitter.com/JohnSmith just enter <strong>JohnSmith</strong>)',
		'id' => $theme_shortname . '_twitterid',
		'type' => 'text',
		'default' => ''
		),
	
	array( 
		'name' => 'Facebook Page',
		'desc' => 'Link to your Facebook page.<br/><br/>(ie. <strong>http://www.facebook.com/yourwebsite</strong>)',
		'id' => $theme_shortname . '_facebookid',
		'type' => 'text',
		'default' => ''
		),
	
	array( 
		'name' => 'Number Of Readers',
		'desc' => 'Enter the total number of readers.<br/><br/>(ie. Total number of RSS Subscribers + Facebook Fans + LinkedIn/Yahoo/Google Group Members, etc) <br/><br/><strong>Please note:</strong> Your Twitter followers will automatically be added to this number based on the Twitter Username above.',
		'id' => $theme_shortname . '_readers',
		'type' => 'text',
		'default' => '0'
		),
	
	array( 
		'type' => 'close'
		),
	
	array( 
		'name' => 'Design',
		'type' => 'section'
		),
	
	array( 
		'type' => 'open'
		),
	
	array( 
		'name' => 'Header Height',
		'desc' => 'Enter the height you would like to set your header to.<br/><br/>Default Height is 180px',
		'id' => $theme_shortname . '_headerheight',
		'type' => 'text',
		'default' => ''
		),
	
	/*
	array( 
		'name' => 'Logo Image',
		'desc' => 'Enter the URL for your logo.<br/><br/>(ie. <strong>http://www.yourwebsite.com/images/logo.png</strong>)<br/><br/>Ideal Logo Height: 150px',
		'id' => $theme_shortname . '_logourl',
		'type' => 'text',
		'default' => $theme_url . '/images/logo.png'
		),
	*/
	
	array( 
		'name' => 'Description Color',
		'desc' => 'Enter the color of the description next to the logo.<br/><br/>(ie. <strong>#000000</strong>) ',
		'id' => $theme_shortname . '_descriptioncolor',
		'type' => 'text',
		'default' => '#E76F0D'
		),
	
	array( 
		'name' => 'Description Font Size',
		'desc' => 'Enter the font size of the description next to the logo.<br /><br />Default Font Size: 17px<br/><br/>(ie. <strong>16px</strong>) ',
		'id' => $theme_shortname . '_descriptionsize',
		'type' => 'text',
		'default' => ''
		),
	
	/*
	array( 
		'name' => 'Background Image',
		'desc' => 'Enter the url for your background image. Ideally, the size of the background image should be at least: <br/><br/>Dimensions: 1024px (Width) x 768px (Height)<br/><br/>(ie. <strong>http://www.yourwebsite.com/images/background.jpg</strong>)',
		'id' => $theme_shortname . '_bgurl',
		'type' => 'text',
		'default' => $theme_url . '/images/bg/grass.jpg'
		),
	
	array( 
		'name' => 'Background Color',
		'desc' => 'Enter the colour code for your background color.<br/><br/>(ie. <strong>#000000</strong>)<br/><br/>This colour is used underneath your background image or if no background image is specified.',
		'id' => $theme_shortname . '_bgcolor',
		'type' => 'text',
		'default' => '#ccc'
		),
	*/
	
	array( 
		'name' => 'Custom Favicon',
		'desc' => 'Specify the URL for your favicon.<br/><br/>Dimensions: 32px (Width) x 32px (Height)<br/><br/>(ie. http://www.yourwebsite.com/images/favicon.png)',
		'id' => $theme_shortname . '_favicon_url',
		'type' => 'text',
		'default' => ''
		),
	
	array( 
		'name' => 'About Author Image',
		'desc' => 'By default, the about author image will display the gravatar photo linked to the authors email. However, if you would like to replace the gravatar image, you can specify the url here.<br/><br/>Dimensions: 100px (Width) x 100px (Height)<br/><br/>(ie. http://www.yourwebsite.com/images/author.jpg)',
		'id' => $theme_shortname . '_author_image_url',
		'type' => 'text',
		'default' => ''
		),
	
	array( 
		'name' => 'Default Post Image',
		'desc' => 'If there are no images within a post, the default post image is used for the thumbnail (ie. homepage, related posts, archives, etc). You can specify the url here.<br/><br/>(ie. http://www.yourwebsite.com/images/post_thumbnail.jpg)<br/><br/>Dimensions: 200px (Width) x 200px (Height)',
		'id' => $theme_shortname . '_post_image_url',
		'type' => 'text',
		'default' => $theme_url . '/images/no_postimage.jpg'
		),
	
	array( 
		'type' => 'close'
		),
	
	array( 
		'name' => 'Footer',
		'type' => 'section'
		),
	
	array( 
		'type' => 'open'
		),
	
	array( 
		'name' => 'Footer Text',
		'desc' => 'Specify your text, copyright statements, etc. You can use HTML standard code in this box.',
		'id' => $theme_shortname . '_footer_text',
		'type' => 'textarea',
		'default' => ''
		),
	
	array( 
		'name' => 'Analytics/Tracking Code',
		'desc' => 'You can paste your Google Analytics or other website tracking code in this box. This will be automatically added to the footer.',
		'id' => $theme_shortname . '_analytics_code',
		'type' => 'textarea',
		'default' => ''
		),
	
	array( 
		'type' => 'close'
		),

);

/**
 * Add Theme Options On Activation
 */
if (is_admin() && isset($_GET['activated']) && $pagenow == 'themes.php') {
	socialspark_install_options();
}

/**
 * Install Default Options
 */
function socialspark_install_options() {
global $options;

	foreach ($options as $value) {
		if ($value['type'] == 'section' || $value['type'] == 'open' || $value['type'] == 'close' || empty($value['default']))
			continue;
		if (!get_option($value['id']))
			update_option($value['id'], $value['default']);
	}

}

/**
 * Update Menu
 */
function socialspark_add_menu() {
global $theme_name;
	
	add_theme_page( $theme_name, $theme_name, 'administrator', basename(__FILE__), 'socialspark_admin');

}

/**
 * Reset Transients
 */
function socialspark_reset_transients() {

	$socialspark_twitterid = get_option('socialspark_twitterid');	
	if (!empty($socialspark_twitterid)) {	
		$key = 'socialspark_readers_count_' . $socialspark_twitterid;		
		delete_transient($key);
		delete_option($key);		
	}
	
}

/**
 * Update Options
 */
function socialspark_add_init() {
global $options;

	$file_dir = get_bloginfo('template_directory');
	wp_enqueue_style('socialspark_css', $file_dir . '/functions/theme-options.css', false, '1.0', 'all');
	wp_enqueue_script('socialspark_script', $file_dir . '/functions/theme-options.js', false, '1.0');

	if (isset($_GET['page']) && ($_GET['page'] == basename(__FILE__))) {
		if (isset($_REQUEST['action']) && ('save' == $_REQUEST['action'])) {
			foreach ($options as $value) {
				if (!array_key_exists('id', $value))
					continue;
				if (isset($_REQUEST[$value['id']]))
					update_option($value['id'], $_REQUEST[$value['id']]);
				else
					delete_option($value['id']);
			}
			socialspark_reset_transients();
			header('location: admin.php?page=' . basename(__FILE__) . '&saved=true');
		} else if (isset ($_REQUEST['action']) && ('reset' == $_REQUEST['action'])) {
			foreach ($options as $value) {
				if (array_key_exists('id', $value))
					delete_option($value['id']);
			}
			socialspark_install_options();
			header('location: admin.php?page=' . basename(__FILE__) . '&reset=true');
		}
	}
	
}

/**
 * Add Options To Admin
 */
function socialspark_admin() {
global $theme_name, $theme_shortname, $theme_version, $options;

	$i=0;

	if (isset ($_REQUEST['saved']) && ($_REQUEST['saved']))
		echo '<div id="message" class="updated fade"><p><strong>' . $theme_name . ' settings saved.</strong></p></div>';
	if (isset ($_REQUEST['reset']) && ($_REQUEST['reset']))
		echo '<div id="message" class="updated fade"><p><strong>' . $theme_name . ' settings reset.</strong></p></div>';

	?>
	
	<div class="wrap">
	<div class="options_wrap">
	<h2 class="settings-title"><?php echo $theme_name; ?> Settings</h2>
	
	<form method="post">
	<input type="hidden" name="action" value="save" />
	
	<?php foreach ($options as $value) : ?>
		
		<?php if ($value['type'] == 'section') : ?>
		
		<div class="section_wrap">
		<h3 class="section_title"><?php echo $value['name']; ?></h3>
		<div class="section_body">
		
		<?php elseif ($value['type'] == 'text') : ?>
		
		<div class="options_input options_text">
			<div class="options_desc"><?php echo $value['desc']; ?></div>
			<span class="labels"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></span>
			<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php echo stripslashes(get_option($value['id'])); ?>" />
		</div>
		
		<?php elseif ($value['type'] == 'textarea') : ?>
		
		<div class="options_input options_textarea">
			<div class="options_desc"><?php echo $value['desc']; ?></div>
			<span class="labels"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></span>
			<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo stripslashes(get_option($value['id']) ); ?></textarea>
		</div>
		
		<?php elseif ($value['type'] == 'select') : ?>
		
		<div class="options_input options_select">
			<div class="options_desc"><?php echo $value['desc']; ?></div>
			<span class="labels"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></span>
			<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
			<?php foreach ($value['options'] as $option) { ?>
					<option<?php if (get_option($value['id']) == $option) echo ' selected="selected"'; ?>><?php echo $option; ?></option><?php } ?>
			</select>
		</div>
		
		<?php elseif ($value['type'] == 'radio') : ?>
		
		<div class="options_input options_select">
			<div class="options_desc"><?php echo $value['desc']; ?></div>
			<span class="labels"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></span>
			 <?php 
			 foreach ($value['options'] as $key=>$option) {
			    $checked = '';
				$radio_setting = get_option($value['id']);
				?>
				<input type="radio" name="<?php echo $value['id']; ?>" value="<?php echo $key; ?>"<?php if ($key == $radio_setting) echo 'checked="checked"'; ?> /><?php echo $option; ?><br />
			 <?php } ?>
		</div>
		
		<?php elseif ($value['type'] == 'checkbox') : ?>
		
		<div class="options_input options_checkbox">
			<div class="options_desc"><?php echo $value['desc']; ?></div>
			<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true"<?php if (get_option($value['id'])) echo ' checked="checked"'; ?> />
			<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
		</div>
		
		<?php elseif ($value['type'] == 'close') : $i++; ?>
		
		<span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="Save Changes" /></span>
		</div>
		</div>
		
		<?php endif; ?>
		
	<?php endforeach; ?>
	
	<span class="submit"><input name="save" type="submit" value="Save All Changes" /></span>
	
	</form>
	
	<form method="post">
	<input type="hidden" name="action" value="reset" />
	<span class="submit"><input name="reset" type="submit" value="Reset All Options" /></span>
	</form>
	
	<br/>
	</div>
	
	</div>
	<?php
}

/**
 * Add Action Hooks
 */
add_action('admin_init', 'socialspark_add_init');
add_action('admin_menu' , 'socialspark_add_menu');

?>
