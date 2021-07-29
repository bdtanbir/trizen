
<?php
	$related_title   = get_theme_mod('trizen_room_grid_related_rooms_title');
	$related_content = get_theme_mod('trizen_room_grid_related_rooms_content');


	$default_args = array(
		'post_type' => 'hotel_room',
		'posts_per_page' => 2
	);
	$query_args = new WP_Query($default_args);
?>

<section class="related-tour-area related-rooms-wrap section--padding">
	<div class="container">
		<?php if(!empty($related_title) || !empty($related_content)) { ?>
			<div class="row">
				<div class="col-lg-12">
					<div class="section-heading text-center">
						<?php if(!empty($related_title)) { ?>
							<h2 class="sec__title">
								<?php echo esc_html($related_title); ?>
							</h2>
						<?php } if(!empty($related_content)) { ?>
							<p class="sec__desc">
								<?php echo esc_html($related_content); ?>
							</p>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php } if($query_args->have_posts()) { ?>
			<div class="row padding-top-50px">

				<?php while($query_args->have_posts()) { $query_args->the_post(); ?>
					<div class="col-lg-6">
						<?php get_template_part('template-parts/room/loop-rooms'); ?>
					</div>
				<?php }
				wp_reset_query();
				?>

			</div>
		<?php } ?>
	</div>
</section>
