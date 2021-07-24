
<div class="modal-popup">
	<div class="modal fade" id="signupPopupForm" tabindex="-1" role="dialog"  aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<div>
						<h5 class="modal-title title" id="exampleModalLongTitle">
                            <?php esc_html_e('Sign Up', 'trizen'); ?>
                        </h5>
						<p class="font-size-14">
                            <?php esc_html_e('Hello! Welcome Create a New Account', 'trizen'); ?>
                        </p>
					</div>
					<button type="button" class="close" data-dismiss="modal" aria-label="<?php esc_attr_e('Close', 'trizen'); ?>">
						<span aria-hidden="true" class="la la-close"></span>
					</button>
				</div>
				<div class="modal-body">
					<div class="contact-form-action">
						<form id="trizen-register-form">
                            <p class="trizen-msg-status"></p>
							<?php wp_nonce_field('ajax-register-nonce', 'signonsecurity'); ?>
							<div class="input-box">
								<label class="label-text" for="reg-username">
                                    <?php esc_html_e('Username', 'trizen'); ?>
                                </label>
								<div class="form-group">
									<span class="la la-user form-icon"></span>
									<input
                                        class="form-control"
                                        type="text"
                                        name="reg-username"
                                        id="reg-username"
                                        placeholder="<?php esc_attr_e('Type your username', 'trizen'); ?>">
								</div>
							</div>
							<div class="input-box">
								<label class="label-text" for="reg-email">
                                    <?php esc_html_e('Email Address', 'trizen'); ?>
                                </label>
								<div class="form-group">
									<span class="la la-envelope form-icon"></span>
									<input
                                        class="form-control"
                                        type="text"
                                        name="email"
                                        id="reg-email"
                                        placeholder="<?php esc_attr_e('Type your email', 'trizen'); ?>">
								</div>
							</div>
							<div class="input-box">
								<label class="label-text" for="reg-password">
                                    <?php esc_html_e('Password', 'trizen'); ?>
                                </label>
								<div class="form-group">
									<span class="la la-lock form-icon"></span>
									<input
                                        class="form-control"
                                        type="password"
                                        name="password"
                                        id="reg-password"
                                        placeholder="<?php esc_attr_e('Type password', 'trizen'); ?>">
								</div>
							</div>
							<div class="input-box">
								<label class="label-text" for="reg-password2">
                                    <?php esc_html_e('Repeat Password', 'trizen'); ?>
                                </label>
								<div class="form-group">
									<span class="la la-lock form-icon"></span>
									<input
                                        class="form-control"
                                        type="password"
                                        name="password2"
                                        id="reg-password2"
                                        placeholder="<?php esc_attr_e('Type again password', 'trizen'); ?>">
								</div>
							</div>
							<div class="btn-box pt-3 pb-4">
								<button id="trizen-register-submit" type="submit" class="theme-btn w-100 trizen-register-submit">
                                    <?php esc_html_e('Register Account', 'trizen'); ?>
                                </button>
							</div>
						</form>
					</div><!-- end contact-form-action -->
				</div>
			</div>
		</div>
	</div>
</div><!-- end modal-popup -->

