<?php
    $user_login_text = get_theme_mod('trizen_hd_user_action_login_title', __('Login', 'trizen'));
?>
<div class="header-top-bar padding-right-100px padding-left-100px">
	<div class="container-fluid">
		<div class="row align-items-center">
			<?php if(!empty(get_theme_mod('trizen_hd_bar_mobile_num')) || !empty(get_theme_mod('trizen_hd_bar_email'))) { ?>
                <div class="col-lg-6">
                    <div class="header-top-content">
                        <div class="header-left">
                            <ul class="list-items">
                                <?php if(!empty(get_theme_mod('trizen_hd_bar_mobile_num'))) { ?>
                                    <li><a href="#"><i class="la la-phone mr-1"></i><?php echo get_theme_mod('trizen_hd_bar_mobile_num'); ?></a></li>
                                <?php } if(!empty(get_theme_mod('trizen_hd_bar_email'))) { ?>
                                    <li><a href="#"><i class="la la-envelope mr-1"></i><?php echo get_theme_mod('trizen_hd_bar_email'); ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
			<?php
				$login_reg_class = 'justify-content-end';
			} else {
			    $login_reg_class = 'justify-content-start';
            } ?>
			<div class="col-lg-6">
				<div class="header-top-content">
					<div class="header-right d-flex align-items-center <?php echo esc_attr($login_reg_class); ?>">
						<div class="header-right-action">
							<?php if(! is_user_logged_in()) { ?>
                                <a href="#" class="theme-btn theme-btn-small theme-btn-transparent mr-1 user-signup-btn" data-toggle="modal" data-target="#signupPopupForm">Sign Up</a>
                                <a href="#" class="theme-btn theme-btn-small user-login-btn" data-toggle="modal" data-target="#loginPopupForm">
                                    <?php
                                    if(!empty($user_login_text)) {
	                                    echo esc_html($user_login_text);
                                    } else {
                                        esc_html_e('Login', 'trizen');
                                    } ?>
                                </a>
                            <?php } else { ?>
                                <a href="<?php echo wp_logout_url(home_url()); ?>" class="theme-btn theme-btn-small theme-btn-transparent">
                                    Logout
                                </a>
                            <?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
