<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package trizen
 */

get_header();
get_template_part('inc/breadcrumb');
while (have_posts()) {
    the_post();
	if(is_active_sidebar('blog-sidebar')) {
	    $content_col = '8';
	} else {
		$content_col = '12';
    }
?>

	<section class="card-area section--padding blog-details-wrap">
		<div class="container">
			<div class="row">
				<div class="col-lg-<?php echo esc_attr($content_col); ?>">
					<div class="card-item blog-card blog-card-layout-2 blog-single-card mb-5">
						<?php if(!empty(get_the_post_thumbnail())) { ?>
							<div class="card-img before-none">
								<?php the_post_thumbnail(); ?>
							</div>
						<?php } ?>
						<div class="card-body px-0 pb-0">
							<?php the_category(); ?>
							<p class="card-meta pb-3 mb-0">
								<span class="post__author"><?php trizen_posted_by(); ?></span>
								<span class="post-dot"></span>
								<span class="post__date"> <?php the_time( get_option( 'date_format' ) ); ?></span>
								<span class="post-dot"></span>
								<span class="post__time"><?php comments_popup_link('0 Comment', '1 Comment', '% Comments', 'comments-link', ' Comments off'); ?></span>
								<span class="post-dot"></span>
								<span class="post__time">
                                    <?php post_reading_time( get_the_ID() ); ?>
                                </span>
							</p>
							<div class="section-block mb-3"></div>
							<?php
							the_content();

							wp_link_pages(array(
								'before'           => '<div class="page-links">',
								'after'            => '</div>',
								'nextpagelink'     => __('<i class="la la-angle-double-right"></i>', 'trizen'),
								'previouspagelink' => __('<i class="la la-angle-double-left"></i>', 'trizen'),
							));
							?>
							<div class="section-block"></div>
							<div class="post-tag-wrap d-flex align-items-center justify-content-between py-4">
                                <?php if(has_tag()) { ?>
                                    <ul class="tag-list">
                                        <?php the_tags('<li>', ' ', '</li> '); ?>
                                    </ul>
								<?php } get_template_part('template-parts/blog/social-share'); ?>
							</div>
							<div class="section-block"></div>
							<div class="post-navigation d-flex justify-content-between py-4">
								<?php previous_post_link('%link', '<i class="la la-arrow-left mr-2"></i> %title'); ?>
								<?php next_post_link('%link', '%title <i class="la la-arrow-right ml-2"></i>'); ?>
							</div>
							<div class="section-block"></div>
							<div class="post-author-wrap">
								<div class="author-content pt-5">
									<div class="d-flex">
										<div class="author-img author-img-md mr-4">
											<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
												<?php echo get_avatar(get_the_ID()); ?>
											</a>
										</div>
										<div class="author-bio">
											<h4 class="author__title">
												<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
													<?php echo get_the_author(); ?>
												</a>
											</h4>
											<span class="author__meta">
												<?php esc_html_e('About the Author', 'trizen'); ?>
											</span>
											<?php if(!empty(get_the_author_meta('description'))) { ?>
												<p class="author__text pt-1">
													<?php echo get_the_author_meta('description'); ?>
												</p>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php get_template_part('template-parts/blog/related-blog-post'); ?>
					<div class="section-block"></div>
					<div class="comment-forum pt-5">
						<?php if( comments_open() ) { ?>
							<h3 class="title">
								<?php comments_popup_link(
								        esc_html__('0 Comment', 'trizen'),
                                        esc_html__('1 Comment', 'trizen'),
                                        '% Comments',
                                        'comments-link',
                                        esc_html__('Comments are off for this post', 'trizen')); ?>
							</h3>
							<div class="form-box-test mt-5">
								<?php
								comments_template();
								?>
							</div>
						<?php } else { ?>
							<h3 class="title">
								<?php comments_popup_link(
								        esc_html__('0 Comment', 'trizen'),
                                        esc_html__('1 Comment', 'trizen'),
                                        '% Comments',
                                        'comments-link',
                                        esc_html__('Comments are off for this post', 'trizen')); ?>
							</h3>
						<?php } ?>
					</div>
				</div>

                <?php if(is_active_sidebar('blog-sidebar')) { ?>
                    <div class="col-lg-4">
                        <?php get_sidebar(); ?>
                    </div>
                <?php } ?>
			</div>
		</div>
	</section>

<?php
}
get_template_part('template-parts/footer/static-cta');
get_footer();
