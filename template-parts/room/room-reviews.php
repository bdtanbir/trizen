<?php
    $comments_count   = wp_count_comments(get_the_ID());
    $total            = (int)$comments_count->approved;
    $comment_per_page = (int)get_option('comments_per_page', 10);
    $paged            = (int)get('comment_page', 1);
    $from             = $comment_per_page * ($paged - 1) + 1;
    $to               = ($paged * $comment_per_page < $total) ? ($paged * $comment_per_page) : $total;

?>

<h3 class="title font-size-20"><?php echo sprintf(__('Showing %s reviews', 'trizen'), $to); ?></h3>
<div class="comments-list padding-top-50px">
    <?php
    
    $offset = ($paged - 1) * $comment_per_page;
    $args = [
        'number'  => $comment_per_page,
        'offset'  => $offset,
        'post_id' => get_the_ID(),
        'status'  => ['approve']
    ];
    $comments_query = new WP_Comment_Query;
    $comments       = $comments_query->query($args);

    if ($comments):
        foreach ($comments as $key => $comment):
            $args[ 'avatar_size' ] = 90;
            if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) :
            else :
                $comment_class = empty( $args[ 'has_children' ] ) ? '' : $comment_class .= 'parent';
                if ( !$comment->comment_approved ) {
                    return;
                }

                $comment_id   = $comment->comment_ID;
                $user_id      = get_comment( $comment_id )->user_id;
                $user_email   = get_comment( $comment_id )->comment_author_email;
                $current_user = wp_get_current_user();
                ?>
                <div class="comment">
                    <div class="comment-avatar">
                        <?php echo ts_get_profile_avatar( $user_id, 90 ) ?>
                    </div>
                    <div class="comment-body">
                        <div class="meta-data">
                            <?php
                            $stars        = TSReview::get_review_stars( get_the_ID() );
                            $comment_rate = (float)get_comment_meta( $comment_id, 'comment_rate', true );
 ?>
                            <h3 class="comment__author">
                                <?php echo TravelHelper::get_username( $user_id ); ?>
                            </h3>
                            <div class="meta-data-inner d-flex">
                                <?php if( $stars ) { ?>
                                    <span class="ratings d-flex align-items-center mr-1">
                                        <?php
                                            echo number_format( $comment_rate, 1, '.', ',' );
                                        ?>
                                    </span>
                                <?php } ?>
                                <p class="comment__date">
                                    <?php echo get_comment_date( 'M d, Y', $comment_id ) ?>
                                </p>
                            </div>
                        </div>
                        <p class="comment-content">
                            <?php
                            $content = get_comment_text( $comment_id );

                            echo balanceTags(esc_html($content)); ?>
                        </p>
                        <div class="reviews-reaction">
                            <?php
                            $count_like = (int)get_comment_meta( $comment_id, '_comment_like_count', true );

                            $review_obj = new TSReview();
                            if ( $review_obj->check_like( $comment_id ) ):
                                ?>
                                <a data-id="<?php echo esc_attr( $comment_id ); ?>" class="btn-like comment-dislike ts-like-review" href="#" title="<?php esc_attr_e('Dislike This', 'trizen'); ?>" data-toggle="tooltip" data-placement="top">
                                    <i class="la la-thumbs-o-up"></i> <?php echo '<span class="like-count">' . esc_html($count_like) . '</span>'; ?>
                                </a>
                            <?php else: ?>
                                <a data-id="<?php echo esc_attr( $comment_id ); ?>" href="#" class="btn-like comment-like ts-like-review " title="<?php esc_attr_e('Like This', 'trizen'); ?>" data-toggle="tooltip" data-placement="top">
                                    <i class="la la-thumbs-o-up"></i> <?php echo '<span class="like-count">' . esc_html($count_like) . '</span>'; ?>
                                </a>
                            <?php
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            <?php
            endif;
        endforeach;
    endif;
    ?>
</div>