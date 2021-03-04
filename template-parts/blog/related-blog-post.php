
<?php
$show_related_post  = get_theme_mod('show_related_post', 1);
$related_post_title = get_theme_mod('trizen_related_post_title', __('Related Posts', 'trizen'));
$related_post_ppp = get_theme_mod('trizen_related_post_ppp',2);
$related_post_pi = explode(',', get_theme_mod('trizen_related_post_ids'));

if(!empty(get_theme_mod('trizen_related_post_ids'))) {
	$default_args = array(
		'post_type'      => 'post',
		'posts_per_page' => $related_post_ppp,
        'post__in'       => $related_post_pi
	);
} else {
	$default_args = array(
		'post_type'      => 'post',
		'posts_per_page' => $related_post_ppp
	);
}
$query = new WP_Query($default_args);

if($show_related_post == 1) {
    if($query->have_posts()) {
    ?>
    <div class="section-block"></div>
    <div class="related-posts pt-5 pb-4">
        <?php if(!empty($related_post_title)) { ?>
            <h3 class="title">
                <?php echo esc_html($related_post_title); ?>
            </h3>
        <?php } ?>
        <div class="row pt-4">

            <?php while ($query->have_posts()) { $query->the_post(); ?>
                <div class="col-lg-6 responsive-column">
                    <?php get_template_part('template-parts/blog/blog'); ?>
                </div>
            <?php } ?>

        </div>
    </div>
    <?php }
} ?>
