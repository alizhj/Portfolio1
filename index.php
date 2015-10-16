<?php get_header(); ?>

<!-- Shows the titel on the page -->
<div class="title">
	<h1 class="title1">My blog</h1>
</div><!-- #title -->

<div class="blogcontent">
	<div class="blogposts">
		<?php if(have_posts()) {
					while(have_posts()) {
					the_post();

					?><h3 class="title3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

					<div class="titleLine"></div>

					<p><? the_time('j F Y'); ?> | by  <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> | Posted in <?php 
					$categories = get_the_category();
					$seperator = ", ";
					$output= '';

					if($categories){
						foreach ($categories as $category) {
							$output .=  '<a href="' . get_category_link($category->term_id) .'">' . $category->cat_name . '</a>' . $seperator;
						}
					}
					echo trim($output, $seperator);

					?></p>
					<p class="text1"><? echo get_the_excerpt(); ?>
						<a href="<?php the_permalink();?>">Read more&raquo</a></p><br/><?
					}
				}
		?>
	</div><!-- #blogposts -->

	<div class="sidebar">
	<?php get_template_part('sidebar'); ?>
	<?php
	/*get_the_category();*/
	?>
	</div><!-- #sidebar -->

</div><!-- #blogcontent -->


<div class="clearfix"></div>


<?php get_footer(); ?>
