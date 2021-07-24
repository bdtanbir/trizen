<?php
$breadcrumb_shape = get_theme_mod('show_breadcrumb_overlay_shape', 1);

if($breadcrumb_shape == 1) {
	$breadcrumb_shape_show = '';
} else {
	$breadcrumb_shape_show = 'hide-before';
}


if(trizen_breadcrumb_title()) { ?>

<section class="breadcrumb-area static-breadcrumb <?php echo esc_attr($breadcrumb_shape_show); ?>">
	<div class="breadcrumb-wrap">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcrumb-content text-center">
						<div class="section-heading">
							<h2 class="sec__title text-white">
								<?php echo trizen_breadcrumb_title() ?>
							</h2>
						</div>
						<span class="arrow-blink">
                            <i class="la la-arrow-down"></i>
                        </span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="bread-svg-box">
		<svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"><polygon points="100 0 50 10 0 0 0 10 100 10"></polygon></svg>
	</div>
</section>
<?php } ?>
