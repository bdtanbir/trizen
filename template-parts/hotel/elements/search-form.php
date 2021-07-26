
<?php
	$action_page = get_option('hotel_search_result_page');

?>


<section class="breadcrumb-area static-breadcrumb bread-bg-7">
	<div class="breadcrumb-wrap">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-10 mx-auto">
					<div class="search-result-content">
                        <?php if(get_the_title()) { ?>
                            <div class="section-heading">
                                <h2 class="sec__title text-white">
                                    <?php the_title(); ?>
                                </h2>
                            </div>
                        <?php } ?>
						<div class="search-fields-container margin-top-30px">
							<div class="contact-form-action hotel-search-form-home">
								<form action="<?php echo esc_url(home_url($action_page)); ?>" class="row">
									<div class="col-lg-4 col-sm-6 pr-0">
										<?php get_template_part('template-parts/hotel/elements/location'); ?>
									</div>
									<div class="col-lg-4 pr-0">
										<?php get_template_part('template-parts/hotel/elements/date'); ?>
									</div>
									<div class="col-lg-4 col-sm-6">
										<?php get_template_part('template-parts/hotel/elements/guest'); ?>
									</div>

									<?php get_template_part('template-parts/hotel/elements/advanced'); ?>

                                    <div class="btn-box pt-3 col-lg-12">
                                        <button class="theme-btn btn-search" type="submit">
											<?php esc_html_e('Search Now', 'trizen'); ?>
                                        </button>
                                    </div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="bread-svg-box">
		<svg class="bread-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"><polygon points="100 0 50 10 0 0 0 10 100 10"></polygon></svg>
	</div>
</section>


