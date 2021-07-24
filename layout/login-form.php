
<div class="modal-popup">
	<div class="modal fade" id="loginPopupForm" tabindex="-1" role="dialog"  aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<div>
						<h5 class="modal-title title" id="exampleModalLongTitle2">
                            <?php esc_html_e('Login', 'trizen'); ?>
                        </h5>
						<p class="font-size-14">
                            <?php esc_html_e('Hello! Welcome to your account', 'trizen'); ?>
                        </p>
					</div>
					<button type="button" class="close" data-dismiss="modal" aria-label="<?php esc_attr_e('Close', 'trizen'); ?>">
						<span aria-hidden="true" class="la la-close"></span>
					</button>
				</div>
				<div class="modal-body">
					<div class="contact-form-action">
						<form id="trizen-login-form">
                            <!-- additional fields start -  -->
							<p class="trizen-msg-status"></p>
							<?php wp_nonce_field('ajax-login-nonce', 'security'); ?>
							<div class="input-box">
								<label class="label-text" for="username">
                                    <?php esc_html_e('Username', 'trizen'); ?>
                                </label>
								<div class="form-group">
									<span class="la la-user form-icon"></span>
									<input
										class="form-control"
										id="username"
										type="text"
                                        name="name"
										placeholder="<?php esc_attr_e('Type your username', 'trizen'); ?>">
								</div>
							</div>
							<div class="input-box">
								<label class="label-text" for="password">
                                    <?php esc_html_e('Password', 'trizen'); ?>
                                </label>
								<div class="form-group mb-2">
									<span class="la la-lock form-icon"></span>
									<input
										class="form-control"
										id="password"
										type="password"
										placeholder="<?php esc_attr_e('Type your password', 'trizen'); ?>">
								</div>
								<div class="d-flex align-items-center justify-content-between">
									<div class="custom-checkbox mb-0">
										<input
											name="rememberme"
											type="checkbox"
											id="rememberme"
											value="forever"/>
										<label for="rememberme">
                                            <?php esc_html_e('Remember me', 'trizen'); ?>
                                        </label>
									</div>
									<p class="forgot-password">
										<a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Forgot Password?', 'trizen'); ?></a>
									</p>
								</div>
							</div>
							<div class="btn-box pt-3">
								<button id="trizen-login-submit" type="submit" class="theme-btn w-100">
									<?php esc_html_e('Login Account', 'trizen'); ?>
								</button>
							</div>
						</form>
					</div><!-- end contact-form-action -->
				</div>
			</div>
		</div>
	</div>
</div>
