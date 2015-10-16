<?php get_header(); ?>

<div class="myblog">
	<div class="blogcontent">
		<div class="blogposts">
			<?php if(have_posts()) {

				?>
				<h2><?php
					if(is_category()) {
						single_cat_title();
					}
					else if(is_tag()) {
						single_tag_title();
					}

					elseif(is_date()) {
						get_the_date('F Y');
					}
					else{
						echo 'Archives';
					}
					?>
				</h2>
				<?php
					while(have_posts()) {
						the_post();
						?><h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						
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
						<h3 class="blogtext"><? the_content(); ?></h3><br/><?
					}
				}
			?>
		</div><!-- #blogposts -->
	</div><!-- #blogcontent -->

	<div class="sidebar">
		<?php get_template_part('sidebar'); ?>
		
	
		get_the_category();
		?>
	</div><!-- #sidebar -->
</div><!-- #myblog -->

<div class="clearfix"></div>

archive.php
<?php get_footer(); ?>
