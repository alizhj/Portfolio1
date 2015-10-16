<?php get_header(); ?>

<?php
	if(have_posts()) {
		?><h1 class="title1"><?php single_tag_title(); ?></h1><?
	}
?>
<? get_template_part('content'); ?>
category.php
<?php get_footer(); ?>