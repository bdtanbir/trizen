

<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area bread-bg-9">
	<div class="breadcrumb-wrap">
		<div class="container">
			<div class="row align-items-center">
				<?php if(trizen_breadcrumb_title()) { ?>
					<div class="col-lg-6">
						<div class="breadcrumb-content">
							<div class="section-heading">
								<h2 class="sec__title text-white"><?php echo trizen_breadcrumb_title() ?></h2>
							</div>
						</div>
					</div>
				<?php }
				if ( function_exists('add_UA_widget_categories') ) {
					?>
					<div class="col-lg-6">
						<div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <?php
                                \UsefulAddons\Includes\Elements\Breadcrumbs\OEE_Breadcrumbs::breadcrumb();
                                ?>
                            </ul>
						</div>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
	<div class="bread-svg-box">
		<svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"><polygon points="100 0 50 10 0 0 0 10 100 10"></polygon></svg>
	</div>
</section>
<!-- ================================
    END BREADCRUMB AREA
================================= -->
