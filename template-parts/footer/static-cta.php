<?php
    $cta_title     = get_theme_mod('trizen_stc_cta_title');
    $cta_shortcode = get_theme_mod('trizen_stc_cta_shortcode');

if(!empty($cta_title) || !empty($cta_shortcode)) {
?>
    <section class="cta-area subscriber-area section-bg-2 padding-top-60px padding-bottom-60px">
        <div class="container">
            <div class="row align-items-center">
                <?php if(!empty($cta_title)) { ?>
                    <div class="col-lg-7">
                        <div class="section-heading">
                            <h2 class="sec__title font-size-30 text-white">
                                <?php echo esc_html($cta_title); ?>
                            </h2>
                        </div>
                    </div>
                <?php } if(!empty($cta_shortcode)) { ?>
                    <div class="col-lg-5">
                        <div class="subscriber-box">
                            <div class="contact-form-action">
                                <?php echo do_shortcode($cta_shortcode); ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>



