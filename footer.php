<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package trizen
 */

$footer_lf_widget = get_theme_mod('show_footer_lf_widget');

$footer_security_terms_title = get_theme_mod('trizen_foot_security_terms_title');
$footer_security_terms_url  = get_theme_mod('trizen_foot_security_terms_url');
$footer_security_privacy_title  = get_theme_mod('trizen_foot_security_privacy_title');
$footer_security_privacy_url  = get_theme_mod('trizen_foot_security_privacy_url');
$footer_security_help_title  = get_theme_mod('trizen_foot_security_help_title');
$footer_security_help_url  = get_theme_mod('trizen_foot_security_help_url');

$copyright = get_theme_mod('trizen_copyright_txt', __('&copy; Copyright Trizen 2020. Made with <i class="la la-heart"></i> by <a href="https://themeforest.net/user/techydevs/portfolio">TechyDevs</a>', 'trizen'));

$allowed_html = trizen_wses_allowed_menu_html();
?>


<!-- ================================
       START FOOTER AREA
================================= -->

<section class="footer-area section-bg padding-top-100px padding-bottom-30px">
    <div class="container">
        <?php if(is_active_sidebar('footer-widgets') || $footer_lf_widget == 1) { ?>
            <div class="row">
                <?php
                    if($footer_lf_widget == 1) {
                        get_template_part( 'template-parts/footer/footer-left-widget' );
                    }

                    dynamic_sidebar('footer-widgets');
                ?>
            </div>
        <?php } ?>
        <div class="row align-items-center">
	        <?php if(!empty($footer_security_terms_title) || !empty($footer_security_privacy_title) || !empty($footer_security_help_title)) { ?>
                <div class="col-lg-8">
                    <div class="term-box footer-item">
                        <ul class="list-items list--items d-flex align-items-center">
                            <?php if(!empty($footer_security_terms_title)) { ?>
                                <li>
                                    <a href="<?php echo esc_url($footer_security_terms_url); ?>"><?php echo esc_html($footer_security_terms_title); ?></a>
                                </li>
                            <?php } if(!empty($footer_security_privacy_title)) { ?>
                                <li>
                                    <a href="<?php echo esc_url($footer_security_privacy_url); ?>">
                                        <?php echo esc_html($footer_security_privacy_title); ?>
                                    </a>
                                </li>
                            <?php } if(!empty($footer_security_help_title)) { ?>
                                <li>
                                    <a href="<?php echo esc_url($footer_security_help_url); ?>">
                                        <?php echo esc_html($footer_security_help_title); ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
	        <?php } ?>

            <?php get_template_part('template-parts/footer/footer-social-links'); ?>
        </div>
    </div>
    <div class="section-block mt-4"></div>
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-lg-12">
                <div class="copy-right padding-top-30px">
                    <p class="copy__desc">
                        <?php echo wp_kses($copyright, $allowed_html); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================================
       START FOOTER AREA
================================= -->

<!-- start back-to-top -->
<div id="back-to-top">
    <i class="la la-angle-up" title="Go top"></i>
</div>
<!-- end back-to-top -->

<!-- end modal-shared -->
<?php get_template_part('layout/register-form'); ?>

<!-- end modal-shared -->
<?php get_template_part('layout/login-form'); ?>

<!-- Template JS Files -->
<?php wp_footer(); ?>
</body>
</html>
