<?php
/**
 * Template Name: Contact me
 *
 * @package LISA HJÄRPE
 * @subpackage PORTFOLIO 2015
 * @since VERSION 1.0
 */
get_header();
?>
<!-- Shows the titel on the page -->
<div class="title">
	<?php
		if(have_posts()) {
			while(have_posts()) {
			the_post();
			?><h1><?php the_title();?></h1><?
		}
	}?>
</div><!-- #title -->

<div class="contact">
	<?php
	if(have_posts()) {
		while(have_posts()) {
			the_post();
			the_content();
		}
	}
	?>
</div>


<?php get_footer(); ?>
