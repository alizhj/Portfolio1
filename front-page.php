<?php get_header(); ?>
<!-- ########################################## -->
<!-- ################## HOME ################## -->
<!-- ########################################## -->



<div id="home">

	<div class="mobile-menu">
			  	<a class="dropdown-link">&#9776 Menu</a>
		  		<ul class="mobile-dropdown">
		  			<?php 
						$args = array(
						'theme_location' => 'primary');
					?> 
				    <li><?php wp_nav_menu($args); ?></li>
				  
		  		</ul>
			</div><!-- #mobile-menu -->

	<div class="profile">

	<div class="name">
		<h1 class="namelight">My</h1>
		<h1 class="namelight">Name</h1>
		<h1 class="namelight">Is:</h1>

		<?php 
			if(have_posts()){
				while(have_posts()){
					the_post();
					?>
					<!-- Metaboxens innehåll skrivs ut här -->
					<h1 class="namewhite"><? echo get_post_meta($post->ID, 'portfolio-firstname', true);?></h1>
					<h1 class="namewhite"><? echo get_post_meta($post->ID, 'portfolio-surname', true); ?></h1>
					<?php
				}
			}
		?>
	</div> <!-- #name -->

	<div class="socialmedia">
	<?php
		$socialmedias = array(
			'Facebook' => array(get_option('page_facebook'), 'fa fa-facebook'),
			'Linkedin' => array(get_option('page_linkedin'), 'fa fa-linkedin'),
			'Instagram' => array(get_option('page_instagram'), 'fa fa-instagram'),
			'Youtube' => array(get_option('page_youtube'), 'fa fa-youtube')
			);


		//loopning av sociala medier + placering i DIV
	 	foreach ($socialmedias as $socialmedia) {
	 		echo '<div class="opacity1">'; 
	 		echo '<a href="'.$socialmedia[0].'" target="_blank" <i class="'.$socialmedia[1].'">';
	 		echo '</a>';
	 		echo '</div>';
	 	}
	?>
	</div><!-- #socialmedia -->

	<div class="clearfix"></div>

	<div class="pictureMobile">
	<?php
		if(have_posts()) {
			while(have_posts()) {
				the_post();
				the_post_thumbnail();
			}
		}
	?>
	</div> <!-- #pictureMobile -->

	<div class="info">
	<?php
		if(have_posts()) {
			while(have_posts()) {
			the_post();
			the_content();
			}
		}
	?>
	</div><!-- #info -->

	<div class="line">

		<nav class="site-nav">
			<?php 
				$args = array(
				'theme_location' => 'primary');
			?> 
			<?php wp_nav_menu($args); ?>
			
		</nav><!-- #site-nav -->

		

	</div><!-- #line -->
	</div><!-- #profile -->

	<div class="picture">
	<?php
		if(have_posts()) {
			while(have_posts()) {
				the_post();
				the_post_thumbnail();
			}
		}
	?>
	</div> <!-- #picture -->
	</hr>
</div> <!-- #home -->

<div class="clearfix"></div>




<!-- ########################################## -->
<!-- ############## THIS IS ME ################ -->
<!-- ########################################## -->
<div id="this-is-me">
	<nav class="site-nav2">
			<?php 
				$args = array(
				'theme_location' => 'home');
			?> 
			<?php wp_nav_menu($args); ?>
			
		</nav><!-- #site-nav -->

	<?php 
	$pages = get_posts(array(
		'post_type' => 'page',
		'meta_key' => '_wp_page_template',
		'meta_value' => 'templates/page-this-is-me.php'
		));
	foreach($pages as $page) { 

		?><div class="title">
			<h1 class="title1">
				<? echo apply_filters('the_title', $page->post_title);?>
			</h1>
		</div><!-- #title -->

		<div class="me">
			<div class="me-pic">
				<? echo get_the_post_thumbnail($page->ID); ?>
			</div>
			<div class="me-text">
				<p class="text1"><?php echo apply_filters('the_content', $page->post_content ); ?></p>
			</div>
	
	<?		
	}
	?>
	
</div><!-- #this-is-me -->

	

<!-- ########################################## -->
<!-- ############### PORTFOLIO ################ -->
<!-- ########################################## -->

<div id="portfolio">
	<nav class="site-nav2">
			<?php 
				$args = array(
				'theme_location' => 'home');
			?> 
			<?php wp_nav_menu($args); ?>
			
	</nav><!-- #site-nav -->
</br>
	<?php 

	$pages = get_posts(array(
		'post_type' => 'page',
		'meta_key' => '_wp_page_template',
		'meta_value' => 'templates/page-portfolio.php'
		));
	foreach($pages as $page) { 

		?><div class="title">
			<h1 class="title1">
				<? echo apply_filters('the_title', $page->post_title);?>
			</h1>
		</div><!-- #title -->

	<?		
	}
	?>

		
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

</div>
</hr>


<!-- ########################################## -->
<!-- ############### CONTACT ME ############### -->
<!-- ########################################## -->

<div id="contact-me">
	
	<?php 

	$pages = get_posts(array(
		'post_type' => 'page',
		'meta_key' => '_wp_page_template',
		'meta_value' => 'templates/page-contact-me.php'
		));
	foreach($pages as $page) { 

		?>

			
	</nav><!-- #site-nav -->
</br>
	<div class="title">
		<nav class="site-nav2">
		<?php 
			$args = array(
			'theme_location' => 'home');
		?> 
		<?php wp_nav_menu($args); ?>
		
	</nav><!-- #site-nav -->
			<h1 class="title1">
				<? echo apply_filters('the_title', $page->post_title);?>
			</h1>
		</div><!-- #title -->
		
	
		<hr>
	
		<?php echo apply_filters('the_content', $page->post_content ); 
	}?>
	
	
</div><!-- #this-is-me -->
<hr/>


<!-- ########################################## -->
<!-- ################# FOOTER ################# -->
<!-- ########################################## -->

<?php get_footer(); ?> 
