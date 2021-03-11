<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trizen
 */

get_header();
get_template_part('inc/breadcrumb-only-title');

?>
    <section class="card-area hotel-room-grid-wrap section--padding">
        <div class="container">
            <?php if(have_posts()) : ?>
                <div class="row">

                    <div class="blog-masonry">
                        <?php
                        /* Start the Loop */
                        while ( have_posts() ) {
                            the_post();?>
                            <div class="col-lg-6 responsive-column blog-item-isotope">
                                <?php get_template_part('template-parts/room/loop-rooms'); ?>
                            </div>
                        <?php } ?>
                        <!-- End the Loop -->
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <?php get_template_part('template-parts/blog/pagination'); ?>
                    </div>
                </div>
            <?php
            else :
                get_template_part( 'template-parts/content', 'none' );
            endif;
            ?>
        </div>
    </section>

<?php
get_footer();