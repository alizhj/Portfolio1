<div class="comments">
<?php 
	if($comments) {
		?>
	<ul id="comments_section">
		<?php
		foreach($comments as $comment) {
			?>
			<li id="comment<?php comment_ID(); ?>">

				<?php 
				if($comment->comment_aproved = '0') {
					?><p>Your comment is undergoing moderation.</p><?php
				}
				?>

				<p class="comment-author"><?php comment_author_link(); ?> wrote <?php comment_date(); ?>:</p>
				<div class="titleLine"></div>
				<p class="text1"><?php comment_text(); ?></p>
			</li>
			<?php
		}
		?>
	</ul>

	<?php

	}
	else {
		?>
			<p class="text1">Be the first to comment!</p>
		<?php
	}
	comment_form();
?>
</div><!-- #comments -->