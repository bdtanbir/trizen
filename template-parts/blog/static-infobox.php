<?php
$infobox1_title   = get_theme_mod('trizen_stc_pg_infobox_1_title');
$infobox1_content = get_theme_mod('trizen_stc_pg_infobox_1_content');
$infobox1_box_url = get_theme_mod('trizen_stc_pg_infobox_1_bx_url');
$infobox2_title   = get_theme_mod('trizen_stc_pg_infobox_2_title');
$infobox2_content = get_theme_mod('trizen_stc_pg_infobox_2_content');
$infobox2_box_url = get_theme_mod('trizen_stc_pg_infobox_2_bx_url');
$infobox3_title   = get_theme_mod('trizen_stc_pg_infobox_3_title');
$infobox3_content = get_theme_mod('trizen_stc_pg_infobox_3_content');
$infobox3_box_url = get_theme_mod('trizen_stc_pg_infobox_3_bx_url');


$allowed_html = trizen_wses_allowed_menu_html();

if(!empty($infobox1_title) || !empty($infobox1_content) || !empty($infobox2_title) ||
   !empty($infobox2_content) || !empty($infobox3_title) || !empty($infobox3_content)) {
?>
<section class="info-area info-bg padding-top-90px padding-bottom-70px">
	<div class="container">
		<div class="row">
			<?php if(!empty($infobox1_title) || !empty($infobox1_content)) { ?>
                <div class="col-lg-4 responsive-column">
                    <a href="<?php echo esc_url($infobox1_box_url); ?>" class="icon-box icon-layout-2 d-flex">
                        <div class="info-icon flex-shrink-0 bg-rgb text-color-2">
                            <i class="la la-phone"></i>
                        </div>
                        <div class="info-content">
                            <?php if(!empty($infobox1_title)) { ?>
                                <h4 class="info__title">
                                    <?php echo esc_html($infobox1_title); ?>
                                </h4>
                            <?php } if(!empty($infobox1_content)) { ?>
                                <p class="info__desc">
                                    <?php echo wp_kses($infobox1_content, $allowed_html); ?>
                                </p>
                            <?php } ?>
                        </div>
                    </a>
                </div>
			<?php }
			if(!empty($infobox2_title) || !empty($infobox2_content)) { ?>
                <div class="col-lg-4 responsive-column">
                    <a href="<?php echo esc_url($infobox2_box_url); ?>" class="icon-box icon-layout-2 d-flex">
                        <div class="info-icon flex-shrink-0 bg-rgb-2 text-color-3">
                            <i class="la la-money"></i>
                        </div>
                        <div class="info-content">
                            <?php if(!empty($infobox2_title)) { ?>
                                <h4 class="info__title">
                                    <?php echo esc_html($infobox2_title); ?>
                                </h4>
                            <?php } if(!empty($infobox2_content)) { ?>
                                <p class="info__desc">
                                    <?php echo wp_kses($infobox2_content, $allowed_html); ?>
                                </p>
                            <?php } ?>
                        </div>
                    </a>
                </div>
			<?php }
			if(!empty($infobox3_title) || !empty($infobox3_content)) { ?>
                <div class="col-lg-4 responsive-column">
                    <a href="<?php echo esc_url($infobox3_box_url); ?>" class="icon-box icon-layout-2 d-flex">
                        <div class="info-icon flex-shrink-0 bg-rgb-3 text-color-4">
                            <i class="la la-times"></i>
                        </div>
                        <div class="info-content">
                            <?php if(!empty($infobox3_title)) { ?>
                                <h4 class="info__title">
                                    <?php echo esc_html($infobox3_title); ?>
                                </h4>
                            <?php } if(!empty($infobox3_content)) { ?>
                                <p class="info__desc">
                                    <?php echo wp_kses($infobox3_content, $allowed_html); ?>
                                </p>
                            <?php } ?>
                        </div>
                    </a>
                </div>
			<?php } ?>
		</div>
	</div>
</section>
<?php } ?>
