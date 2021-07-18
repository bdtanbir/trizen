<?php

if(!isset($post_type)){
    $post_type = 'ts_hotel';
}
global $wp_query, $ts_search_query;
if ($ts_search_query) {
    $query = $ts_search_query;
} else $query = $wp_query;

$result_string = '';
switch ($post_type){
    case 'ts_hotel':
        $result_string = balanceTags(get_result_string());
        break;
    default:
        $result_string = balanceTags(get_result_string());
        break;
}
?>

<section class="card-area section--padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="filter-wrap margin-bottom-30px">
                    <div class="filter-top d-flex align-items-center justify-content-between pb-4">
                        <div>
                            <h3 class="title font-size-24">
                                <?php echo balanceTags(esc_html( $result_string )); ?>
                            </h3>
                            <p class="font-size-14">
                                <?php esc_html_e('Book with confidence: No hotel booking fees', 'trizen'); ?>
                            </p>
                        </div>
                    </div>

                    <!-- Toolbar -->
                    <?php get_template_part('template-parts/hotel/elements/toolbar'); ?>
                </div>
            </div>
        </div>

        <div class="row modern-search-result" id="modern-search-result">
            <?php
            if($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    ?>
                    <div class="col-lg-4 responsive-column">
                        <?php get_template_part('template-parts/hotel/loop-hotel'); ?>
                    </div>
                    <?php
                }
            } else{
                get_template_part('template-parts/hotel/elements/none');
            }
            wp_reset_query();
            ?>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="btn-box mt-3 text-center">
                    <?php echo TravelHelper::paging(false, false); ?>
                    <p class="font-size-13 pt-2">
                        <?php
                        if (!empty($ts_search_query)) {
                            $query = $ts_search_query;
                        }
                        if ($query->found_posts):
                            $page = get_query_var('paged');
                            $posts_per_page = 12;
                            if (!$page) $page = 1;
                            $last = (int)$posts_per_page * (int)($page);
                            if ($last > $query->found_posts) $last = $query->found_posts;
                            echo sprintf(__('Showing %d - %d of %d ', 'trizen'), (int)$posts_per_page * ($page - 1) + 1, $last, $query->found_posts );
                            echo ''.( $query->found_posts == 1 ) ? __( 'Hotel', 'trizen' ) : __( 'Hotels', 'trizen' );
                        endif;
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>