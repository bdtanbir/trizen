<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trizen
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
if ( have_comments() ) {
	$remove_mg = ' ';
} else {
	$remove_mg = ' remove_mg';
}

if( have_comments() ) : ?>

    <ul class="comment-list ">
		<?php
		wp_list_comments( array(
			'avatar_size' => 90,
			'callback'    => 'trizen_comment',
			'short_ping'  => true,
		) );
		?>
    </ul>

	<?php

	the_comments_pagination(array(
		'prev_text' => '<span class="screen-reader-text">' . __('<i class="la la-angle-double-left"></i>', 'trizen') . '</span>',
		'next_text' => '<span class="screen-reader-text">' . __('<i class="la la-angle-double-right"></i>', 'trizen') . '</span>',
	));

endif;

if( !comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments') ) : ?>

    <p class="no-comments">
		<?php esc_html_e('Comments are closed.', 'trizen'); ?>
    </p>
<?php
endif;


$commenter = wp_get_current_commenter();
if( !isset($args[ 'format' ]) )
	$comments_args 		= array(
		'comment_field' => '<div class="col-md-12">
            <div class="input-box">
                <label class="label-text" for="comment">
                '.esc_html__('Message', 'trizen').' <span class="text-color">'.esc_html__('*', 'trizen').'</span>
                </label>
                <div class="form-group">
                <span class="la la-pencil form-icon"></span>
                    <textarea class="message-control form-control" id="comment" name="comment" aria-required="true" placeholder="' . esc_attr__("Write message", "trizen") . '"></textarea>
                </div>
            </div>
        </div>',
		'label_submit'        => esc_html__('Leave a Comment', 'trizen'),
		'class_submit' 		  => 'theme-btn',
		'comment_note_before' => '',
		'comment_notes_after' => '',
		'title_reply' 		  => esc_html__(' ', 'trizen'),
		'title_reply_before'  => '<div class="msg_form"><h5 id="reply-title" class="comment-reply-title">',
		'title_reply_after'   => '</h5></div><div class="form-title-wrap"><h3 class="title '.$remove_mg.'">'. esc_html__('Add a Comment','trizen') . '</h3></div>',
		'logged_in_as'        => '',
		'class_form' 		  => 'comment-form row',
		'cancel_reply_before' => '',
		'cancel_reply_after'  => '',
		'cancel_reply_link'   => esc_html__('Cancel Reply', 'trizen'),

		'fields' => apply_filters('comment_form_default_fields', array(

				'name' => '<div class="col-md-6 col-of-name">
                                <div class="input-box">
                                    <label class="label-text" for="name">'.esc_html__('Name', 'trizen').' <span class="text-color">'.esc_html__('*', 'trizen').'</span>
                                    </label>' .
				          '<div class="form-group">
                                    <input name="author" class="form-control" placeholder="' . esc_attr__("Your name", "trizen") . '" size="30" id="name" maxlength="100"><i class="la la-user form-icon"></i>
                                    </div>
                                </div>
                            </div>',

				'email' => '<div class="col-md-6 col-of-email">
                                <div class="input-box">
                                    <label class="label-text" for="email">'.esc_html__('Email', 'trizen').' <span class="text-color">'.esc_html__('*', 'trizen').'</span></label>' .
				           '<div class="form-group">
                                    <input name="email" class="form-control" placeholder="' . esc_attr__("Email address", "trizen") . '" size="30" id="email" maxlength="100"><i class="la la-envelope-o form-icon"></i>
                                </div>
                            </div>
                        </div>',

			)
		),
	);
comment_form($comments_args);
?>
