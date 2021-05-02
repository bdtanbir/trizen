<?php
if(empty(get_the_post_thumbnail())) {
	$empty_img = 'empty-blog-image';
} else {
	$empty_img = '';
}
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('card-item blog-card ' . $empty_img); ?>>
    <div class="card-img">
		<?php the_post_thumbnail(); ?>
        <div class="post-format icon-element">
            <i class="la la-photo"></i>
        </div>
        <div class="card-body">
			<?php
			the_category();
			if(get_the_title()) {
				?>
                <h3 class="card-title line-height-26">
                    <a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
                    </a>
                </h3>
			<?php } ?>
            <p class="card-meta">
                <span class="post__date"> <?php the_time( get_option( 'date_format' ) ); ?></span>
                <span class="post-dot"></span>
                <span class="post__time"><?php esc_html_e('5 Mins read', 'trizen'); ?></span>
            </p>
        </div>
    </div>
    <div class="card-footer d-flex align-items-center justify-content-between">
        <div class="author-content d-flex align-items-center">
            <div class="author-img">
				<?php echo get_avatar(get_the_ID()); ?>
            </div>
            <div class="author-bio">
                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="author__title">
					<?php echo get_the_author(); ?>
                </a>
            </div>
        </div>
		<?php get_template_part('template-parts/blog/social-share'); ?>
    </div>
</div>
