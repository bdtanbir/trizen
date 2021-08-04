
<?php
$show_related_post  = get_theme_mod('show_related_post', 1);
$related_post_title = get_theme_mod('trizen_related_post_title', __('Related Posts', 'trizen'));
$related_post_pi    = explode(',', get_theme_mod('trizen_related_post_ids'));

if(!empty(get_theme_mod('trizen_related_post_ids'))) {
	$default_args = array(
		'post_type'      => 'post',
		'posts_per_page' => 3,
        'post__in'       => $related_post_pi
	);
} else {
	$default_args = array(
		'post_type'      => 'post',
		'posts_per_page' => 3
	);
}
$query = new WP_Query($default_args);
$current_single_post_id = get_the_ID(  );
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

            <?php while ($query->have_posts()) { $query->the_post(); 
                if($current_single_post_id !== get_the_ID()) {
                ?>
                <div class="col-lg-6 responsive-column">
                    <?php get_template_part('template-parts/content'); ?>
                </div>
                <?php
                }
             } 
            wp_reset_postdata(); ?>

        </div>
    </div>
    <?php }
} ?>
