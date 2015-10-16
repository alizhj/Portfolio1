<?php
/**
 * Template Name: Portfolio
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
			?><h1 class="title1"><?php the_title();?></h1><?
		}
	}?>
</div><!-- #title -->



<!-- Looping out all projects -->
<div class="page-portfolio">
		
<?php
	$query = new WP_Query(array('post_type' => 'Portfolio'));
	//query_posts('cat=3');
	?><div class="project"><?
	while($query->have_posts()) {
		?>
		
		
		<?php
			$query->the_post();
			?>
				
			<div class="portfolioThumb"><a href="<?php the_permalink(); ?>">
				<!--<h2 class="title2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>-->
				
				<?the_post_thumbnail(); ?>
			</a></div><!-- #portfolioThumb -->
		

		<?php
	}
	?>
	</div> <!-- #project -->

</div><!--#page-portfolio -->
<div class="clearfix"></div>

<?php get_footer(); ?>