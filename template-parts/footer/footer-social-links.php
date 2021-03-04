
<?php
	$social_fb = get_theme_mod('trizen_foot_social_fb');
	$social_tw = get_theme_mod('trizen_foot_social_tw');
	$social_inc = get_theme_mod('trizen_foot_social_inc');
	$social_ln = get_theme_mod('trizen_foot_social_ln');
	$social_ggl = get_theme_mod('trizen_foot_social_ggl');
	$social_pnt = get_theme_mod('trizen_foot_social_pnt');
	$social_gt = get_theme_mod('trizen_foot_social_gt');

?>
<div class="col-lg-4">
	<div class="footer-social-box text-right">
		<ul class="social-profile">
			<?php if(!empty($social_fb)) { ?>
				<li>
					<a href="<?php echo esc_url($social_fb); ?>">
						<i class="lab la-facebook-f"></i>
					</a>
				</li>
			<?php } if(!empty($social_tw)) { ?>
				<li>
					<a href="<?php echo esc_url($social_tw); ?>">
						<i class="lab la-twitter"></i>
					</a>
				</li>
			<?php } if(!empty($social_inc)) { ?>
				<li>
					<a href="<?php echo esc_url($social_inc); ?>">
						<i class="lab la-instagram"></i>
					</a>
				</li>
			<?php } if(!empty($social_ln)) { ?>
				<li>
					<a href="<?php echo esc_url($social_ln); ?>">
						<i class="lab la-linkedin-in"></i>
					</a>
				</li>
			<?php } if(!empty($social_ggl)) { ?>
				<li>
					<a href="<?php echo esc_url($social_ggl); ?>">
						<i class="lab la-google-plus"></i>
					</a>
				</li>
			<?php } if(!empty($social_pnt)) { ?>
				<li>
					<a href="<?php echo esc_url($social_pnt); ?>">
						<i class="lab la-pinterest-p"></i>
					</a>
				</li>
			<?php } if(!empty($social_gt)) { ?>
				<li>
					<a href="<?php echo esc_url($social_gt); ?>">
						<i class="lab la-github"></i>
					</a>
				</li>
			<?php } ?>
		</ul>
	</div>
</div>
