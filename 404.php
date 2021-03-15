<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package trizen
 */

get_header();

$error_img  = get_theme_mod('trizen_error_img', get_template_directory_uri().'/assets/images/404.png');
$error_pg_title = get_theme_mod('trizen_error_title', __('Ooops! This Page Does Not Exist', 'trizen'));
$error_pg_content = get_theme_mod('trizen_error_content', __('We\'re sorry, but it appears the website address you entered was</br>
incorrect, or is temporarily unavailable.', 'trizen'));
$error_btn_text = get_theme_mod('trizen_error_btn', __('Back to Home', 'trizen'));

$allowed_html = trizen_wses_allowed_menu_html();
?>

<!-- ================================
    START ERROR AREA
================================= -->
<?php if(!empty($error_pg_title) || !empty($error_pg_content) || !empty($error_btn_text)) { ?>
<section class="error-area section--padding text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto">
				<?php if(!empty($error_img)) { ?>
					<div class="error-img">
						<img 
						src="<?php echo esc_url($error_img); ?>" 
						alt="<?php esc_attr_e('Error Image', 'trizen'); ?>"
						width="670"
						height="388">
					</div>
				<?php }
				if(!empty($error_pg_title) || !empty($error_pg_content)) { ?>
					<div class="section-heading padding-top-35px">
						<?php if(!empty($error_pg_title)) { ?>
							<h2 class="sec__title mb-0">
								<?php echo esc_html($error_pg_title); ?>
							</h2>
						<?php } if(!empty($error_pg_content)) { ?>
							<p class="sec__desc pt-3">
								<?php echo wp_kses($error_pg_content, $allowed_html); ?>
							</p>
						<?php } ?>
					</div>
				<?php } 
				if(!empty($error_btn_text)) { ?>
					<div class="btn-box padding-top-30px">
						<a href="<?php echo esc_url(home_url('/')); ?>" class="theme-btn">
							<i class="la la-reply mr-1"></i> <?php echo esc_html($error_btn_text); ?>
						</a>
					</div>
				<?php } ?>
            </div>
        </div>
    </div>
</section>
<?php } ?>
<!-- ================================
    END ERROR AREA
================================= -->

<?php
get_footer();
