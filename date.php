<?php get_header(); ?>

<div class="myblog">
	<?php
	if(have_posts()) {
		?><h1 class="title1"><?php if(is_month()){
			echo get_the_date('F Y');
		}; ?></h1><?
	}
?>
	<div class="blogcontent">
		<div class="blogposts">
			<?php if(have_posts()) {

					?>
				
						<?php
						while(have_posts()) {
						the_post();
						?><h3 class="title3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

						<div class="titleLine"></div>

						<p><? the_time('j F Y'); ?> | by  <? the_author(); ?> | Posted in <?php 
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
						<p class="text1"><? the_content(); ?></p><br/><?
						}
					}
			?>
		</div><!-- #blogposts -->
	</div><!-- #blogcontent -->
</div><!-- #myblog -->

<div class="clearfix"></div>


<?php get_footer(); ?>
