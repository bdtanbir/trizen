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
?>
    <section class="card-area blog-grid-wrap section--padding">
        <div class="container">
            <?php if(have_posts()) : ?>
            <div class="row">
                <div class="blog-masonry">
                    <?php
                    /* Start the Loop */
                    while ( have_posts() ) {
                        the_post();?>
                        <div class="col-lg-4 responsive-column blog-item-isotope">
                            <?php get_template_part('template-parts/blog/blog'); ?>
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
    } ?>

    <!-- ================================
		START CTA AREA
	================================= -->
    <section class="cta-area subscriber-area section-bg-2 padding-top-60px padding-bottom-60px">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="section-heading">
                        <h2 class="sec__title font-size-30 text-white">Subscribe to see Secret Deals</h2>
                    </div><!-- end section-heading -->
                </div><!-- end col-lg-7 -->
                <div class="col-lg-5">
                    <div class="subscriber-box">
                        <div class="contact-form-action">
                            <form action="#">
                                <div class="input-box">
                                    <label class="label-text text-white">Enter email address</label>
                                    <div class="form-group mb-0">
                                        <span class="la la-envelope form-icon"></span>
                                        <input class="form-control" type="email" name="email" placeholder="Email address">
                                        <button class="theme-btn theme-btn-small submit-btn" type="submit">Subscribe</button>
                                        <span class="font-size-14 pt-1 text-white-50"><i class="la la-lock mr-1"></i>Don't worry your information is safe with us.</span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- end section-heading -->
                </div><!-- end col-lg-5 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end cta-area -->
    <!-- ================================
		END CTA AREA
	================================= -->

<?php
get_footer();
