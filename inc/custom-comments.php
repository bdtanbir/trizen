<?php

function trizen_comment($comment, $args, $depth)
{
	if( 'div' === $args[ 'style' ] ) {
		$tag       = 'div';
		$add_below = 'comments';
	}
	else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}
	$allowed_html = trizen_wses_allowed_menu_html();
	?>
	<<?php echo wp_kses($tag, $allowed_html) ?> <?php comment_class(empty($args[ 'has_children' ]) ? (!($args[ 'has_children' ]=='depth-1') ?
	'new-depth' : '') : 'parent') ?> id="comment-<?php comment_ID() ?>">

	<?php if( 'div'!=$args[ 'style' ] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>">
<?php endif; ?>


	<div class="comment-item">
		<?php if( $args[ 'avatar_size' ]!=0 ) { ?>
			<div class="comment-avatar">
				<?php echo get_avatar($comment, $args[ 'avatar_size' ]); ?>
			</div>
		<?php } ?>
		<div class="comment-body">
			<div class="meta-data">
				<h3 class="comment__author">
					<?php echo get_comment_author(); ?>
				</h3>
				<p class="comment__date">
					<?php printf(__('%1$s', 'trizen'), get_comment_date(get_option( 'date_format' ))); ?>
				</p>
			</div>
			<?php comment_text(); ?>
			<div class="comment-reply">
				<?php
				comment_reply_link(
					array_merge(
						$args,
						array(
							'reply_text' => __('<i class="la la-mail-reply"></i> Reply', 'trizen'),
							'add_below'  => $add_below,
							'depth' 	 => $depth,
							'max_depth'  => $args[ 'max_depth' ]
						)
					)
				); ?>
			</div>
		</div>
	</div><!-- end comment -->


	<?php if( 'div'!=$args[ 'style' ] ) : ?>
	</div>
<?php endif;

}