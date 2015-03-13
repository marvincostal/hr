	<div class="c"></div>
	
	<?php /* Load this at the end as the JavaScript sometimes takes time to load */ if (is_single()) : ?>
	
	<?php endif; ?>
	
	<div class="c"></div>
	
	</div>
	
</div>

<div class="c"></div>
</div>

<div id="footer">
	<div id="footer-inner">
	<?php if (!dynamic_sidebar('footer')) {} ?>
	<div class="c"></div>
	<div id="footer-menu-container">
		<div id="copyright">Copyright © <?php echo date("Y"); ?> Hair Rocks</div>
		<div id="footer-menu">
			<?php wp_nav_menu( array( 'container_class' => 'footer-menu', 'theme_location' => 'footer-menu') ); ?>
		</div>
	</div>
	</div>
</div>


<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery('body').find('.select').each(function() { 
		jQuery(this).change(function() {
			if (jQuery(this).val() == '') { 
				jQuery(this).val(this.defaultValue); 
			}
		});
		jQuery(this).click(function() {
			if (jQuery(this).val() == this.defaultValue)
				jQuery(this).select();
		});
	});
});
<?php /* Scroll social media icons */ if (is_single()) : ?>
jQuery(function() {
	var offset = jQuery("#socialnetwork").offset();
	var topPadding = 100;
	jQuery(window).scroll(function() {
		if (jQuery(window).scrollTop() > offset.top) {
			jQuery("#socialnetwork").stop().animate({
				marginTop: jQuery(window).scrollTop() - offset.top + topPadding
			});
		} else {
			jQuery("#socialnetwork").stop().animate({
				marginTop: 0
			});
		};
	});
});
<?php endif; ?>
jQuery(document).ready(function($) {
	var body = $('body');
	function openSidebar() {
		if (body.hasClass('active')) {
			body.animate({
				'right': '0',
					},
				'slow', function() {
				body.removeClass('active');
			});
		} else {
			body.addClass('active');
			body.animate({
				'right': '300px',
				},
				'slow', function() {
				body.addClass('active');
			});
		}
	}
	$('.sidebar-button').on('click', openSidebar);
});
</script>
	
<?php wp_footer(); ?>

</body>
</html>
