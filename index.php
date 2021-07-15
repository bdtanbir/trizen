<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trizen
 */

get_header();
get_template_part('inc/breadcrumb');
$static_infobox = get_theme_mod('show_static_infobox');
$static_cta     = get_theme_mod('show_static_footer_cta');
?>
    <section class="card-area blog-grid-wrap section--padding overflow-hidden">
        <div class="container">
            <?php if(have_posts()) : ?>
            <div class="row">
                <div class="blog-masonry">
                    <?php
                    /* Start the Loop */
                    while ( have_posts() ) {
                        the_post();?>
                        <div class="col-lg-4 responsive-column blog-item-isotope">
                            <?php get_template_part('template-parts/content'); ?>
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

    <?php if($static_infobox == 1) { ?>
        <div class="section-block"></div>

    <?php
        get_template_part('template-parts/blog/static-infobox');
    }

    if($static_cta == 1) {
	    get_template_part( 'template-parts/footer/static-cta' );
    }
    ?>

<?php
get_footer();
