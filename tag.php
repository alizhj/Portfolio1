<?php get_header(); ?>

<?php
	if(have_posts()) {
		?>
		<h2><?php single_tag_title(); ?></h2>
		<?php
		while(have_posts()) {
			the_post();
			?><h3 class="title3"><? the_title();?></h3><?
			the_content();
		}
	}
?>

tag.php
<?php get_footer(); ?>