<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package Lisa Hjärpe
 * @subpackage Portfolio2015
 * @since VERSIONING
 */
?>
	<footer class="site-footer">
		<div class="copy"><h3><?php echo get_option('page_copyright') . " " . get_option('page_copyyear');?></h3></div>
	</footer>
	
	</div> <!-- #wrapper -->

	<?php wp_footer(); ?>
	
</body>
</html>