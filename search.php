<?php get_header(); ?>
		<?php
			if( have_posts() ) {
				?>
				<h1 class="title1">Results: <?php the_search_query(); ?></h1>
				<?php
				while( have_posts() ) {
					get_template_part('content');
					break;
				}
			}
		?>
<?php get_footer(); ?>
