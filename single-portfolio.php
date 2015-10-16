<?php get_header(); ?>

<div class="show-portfolio">
<?php 
	if(have_posts()){
		while(have_posts()){
			the_post();
			?><h1 class="title1"><?the_title();?></h1>

			<div class="titleLine"></div>

			<p class="text1"><? the_content(); ?></p>

			<?php if (class_exists('MultiPostThumbnails')){
			   ?><div class="single-pic"><? MultiPostThumbnails::the_post_thumbnail(get_post_type(),'secondary-image'); ?>
			   </div><!- #single-pic --><?
			}


		}
	}


?>
<!-- show skills to each project -->
	<div class="tags">
		<?php
			echo get_the_term_list( $post->ID, 'skill', 
				'<h3>Used skills:</h3> 
					<ul><li>', 
						'</li><li>', 
					'</li></ul>' );
		?>
	</div><!-- #tags -->

			

			
</div><!-- #show-portfolio -->


</br>

<?php get_footer(); ?>