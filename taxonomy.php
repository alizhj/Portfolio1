<?php get_header(); ?>

<div class="blogcontent">
	<div class="blogposts">
		<?php if(have_posts()) {
			
			while(have_posts()) {
			the_post();

			?><h3 class="title3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

			<div class="titleLine"></div>

			<p class="text1"><? the_content();
			
			}
		}
		?>
		taxonomy.php
	</div><!-- #blogposts -->
</div><!-- #blogcontent -->
<?php get_footer(); ?>