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

if (!is_active_sidebar('trizen-footer-widgets') || !$footer_lf_widget == 1 || !empty($footer_security_terms_title) || !empty($footer_security_privacy_title) || !empty($footer_security_help_title) || !empty($copyright) || !empty($social_fb) || !empty($social_tw) || !empty($social_inc) || !empty($social_ln) || !empty($social_ggl) || !empty($social_pnt) || !empty($social_gt)
) {
    if(empty($footer_security_terms_title) && empty($footer_security_privacy_title) && empty($footer_security_help_title) && empty($social_fb) && empty($social_tw) && empty($social_inc) && empty($social_ln) && empty($social_ggl) && empty($social_pnt) && empty($social_gt) && !is_active_sidebar('trizen-footer-widgets') && !$footer_lf_widget == 1
    ) {
        $extra_pd = '';
        $border_after_widgets = '';
    } else {
        if(!empty($footer_security_terms_title) || !empty($footer_security_privacy_title) || !empty($footer_security_help_title) || !empty($social_fb) || !empty($social_tw) || !empty($social_inc) || !empty($social_ln) || !empty($social_ggl) || !empty($social_pnt) || !empty($social_gt) && !is_active_sidebar('trizen-footer-widgets') && !$footer_lf_widget == 1
        ) {
            $extra_pd = 'padding-top-30px';
        } else {
            $extra_pd = 'padding-top-100px';
        }
        if(!empty($copyright)) {
            $border_after_widgets = '<div class="section-block mt-4"></div>';
        } else {
            $border_after_widgets = '';
        }
    }
?>

<section class="footer-area section-bg padding-bottom-30px <?php echo esc_attr($extra_pd); ?>">
    <div class="container">
        <?php if(is_active_sidebar('trizen-footer-widgets') || $footer_lf_widget == 1) { ?>
            <div class="row">
                <?php
                    if($footer_lf_widget == 1) {
                        get_template_part( 'template-parts/footer/footer-left-widget' );
                    }

                    dynamic_sidebar('trizen-footer-widgets');
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
    <?php echo wp_kses($border_after_widgets, $allowed_html);
    if(!empty($copyright)) {
    ?>
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
    <?php } ?>
</section>
<?php }

get_template_part('layout/back-to-top');
?>


<!-- end modal-shared -->
<?php get_template_part('layout/register-form'); ?>

<!-- end modal-shared -->
<?php get_template_part('layout/login-form'); ?>


<!-- end modal-shared -->
<div class="modal-popup">
    <div class="modal fade" id="sharePopupForm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title title" id="exampleModalLongTitle4">Share this tour</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="la la-close"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="copy-to-clipboard-wrap">
                        <div class="copy-to-clipboard">
                            <div class="contact-form-action d-flex align-items-center">
                                <span class="text-success-message">Copied!</span>
                                <input type="text" class="form-control copy-input" value="https://www.tripstar.com/share/101WxMB0oac1hVQQ==/">
                                <div class="btn-box">
                                    <button class="theme-btn theme-btn-light copy-text">Copy</button>
                                </div>
                            </div>
                        </div><!-- end copy-to-clipboard -->
                        <ul class="social-profile text-center">
                            <li><a href="#"><i class="lab la-facebook-f"></i></a></li>
                            <li><a href="#"><i class="lab la-twitter"></i></a></li>
                            <li><a href="#"><i class="lab la-instagram"></i></a></li>
                            <li><a href="#"><i class="lab la-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- end modal-popup -->

<!-- Template JS Files -->
<?php wp_footer(); ?>
</body>
</html>
