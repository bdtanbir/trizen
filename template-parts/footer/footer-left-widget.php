<?php
    $footer_lf_content = get_theme_mod('trizen_foot_lf_widget_content');
    $footer_lf_address = get_theme_mod('trizen_foot_lf_widget_address');
    $footer_lf_pn_num  = get_theme_mod('trizen_foot_lf_widget_pn_num');
    $footer_lf_email   = get_theme_mod('trizen_foot_lf_widget_email');

    $allowed_html = trizen_wses_allowed_menu_html();
?>

<div class="col-lg-3 responsive-column">
	<div class="footer-item">
		<div class="footer-logo padding-bottom-30px">
			<?php get_template_part('template-parts/header/common-logo'); ?>
		</div><!-- end logo -->
        <?php if(!empty($footer_lf_content)) { ?>
            <p class="footer__desc">
                <?php echo wp_kses($footer_lf_content, $allowed_html); ?>
            </p>
        <?php }

        if(!empty($footer_lf_address) || !empty($footer_lf_pn_num) || !empty($footer_lf_email)) { ?>
            <ul class="list-items pt-3">
                <?php if(!empty($footer_lf_address)) { ?>
                    <li>
                        <?php echo wp_kses($footer_lf_address, $allowed_html); ?>
                    </li>
                <?php } if(!empty($footer_lf_pn_num)) { ?>
                    <li>
                        <?php echo wp_kses($footer_lf_pn_num, $allowed_html); ?>
                    </li>
                <?php } if(!empty($footer_lf_email)) { ?>
                    <li>
                        <a href="#">
                            <?php echo wp_kses($footer_lf_email, $allowed_html); ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        <?php } ?>
	</div>
</div>


