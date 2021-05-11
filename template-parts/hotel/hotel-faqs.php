<?php
$trizen_hotel_faqs_data    = get_post_meta(get_the_ID(), 'trizen_hotel_faqs_data_group', true);


if($trizen_hotel_faqs_data) {
?>

<div id="faq" class="page-scroll">
	<div class="single-content-item padding-top-40px padding-bottom-40px">
		<h3 class="title font-size-20">
            <?php esc_html_e('FAQs', 'trizen'); ?>
        </h3>
		<div class="accordion accordion-item padding-top-30px" id="accordionExample2">

			<?php
			    $count = 0;
                foreach( $trizen_hotel_faqs_data as $index => $field ) {
                    $count++;
                    if($count == 1) {
                        $faq_active = 'show';
                    } else {
	                    $faq_active = '';
                    }
                    ?>
                    <div class="card">
                        <div class="card-header" id="faqHeadingFour">
                            <h2 class="mb-0">
                                <button class="btn btn-link d-flex align-items-center justify-content-end flex-row-reverse font-size-16" type="button" data-toggle="collapse" data-target="#faq-collapse-<?php echo esc_attr($index); ?>" aria-expanded="true" aria-controls="faq-collapse-<?php echo esc_attr($index); ?>">
                                    <span class="ml-3">
                                        <?php echo esc_attr($field['trizen_hotel_faqs_title']); ?>
                                    </span>
                                    <i class="la la-minus"></i>
                                    <i class="la la-plus"></i>
                                </button>
                            </h2>
                        </div>
                        <div id="faq-collapse-<?php echo esc_attr($index); ?>" class="collapse <?php echo esc_attr($faq_active); ?>" aria-labelledby="faqHeadingFour" data-parent="#accordionExample2">
                            <div class="card-body d-flex">
                                <p>
                                    <?php echo esc_html($field['trizen_hotel_faqs_content']); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php
                }
            ?>

		</div>
	</div>
	<div class="section-block"></div>
</div>

<?php } ?>

