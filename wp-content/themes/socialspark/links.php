<?php
/*
Template Name: Links
*/
?>

<?php get_header(); ?>

<div id="content-left">

<div class="entry">
	<div class="entry_single">
	<h1>Links</h1>
	<ul>
		<?php wp_list_bookmarks(); ?>
	</ul>
	</div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
