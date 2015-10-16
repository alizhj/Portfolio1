<?php
/**
 * Template Name: This is me
 *
 * @package LISA HJÄRPE
 * @subpackage PORTFOLIO 2015
 * @since VERSION 1.0
 */
get_header();
?>

<div class="title">
	<?php
		if(have_posts()) {
			while(have_posts()) {
			the_post();
			?><h1 class="title1"><?php the_title();?></h1><?
		}
	}?>
</div><!-- #title -->

<div class="me">
	<?php
	if(have_posts()) {
		while(have_posts()) {
			the_post();
			?>
			<div class="me-pic"><? the_post_thumbnail(); ?></div>
			<div class="me-text"><p class="text1"><? the_content(); ?></p></div><?
			
		}
	}
	?>
	
</div>



<?php get_footer(); ?>
