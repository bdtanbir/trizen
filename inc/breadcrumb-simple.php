

<?php
if ( function_exists('add_UA_widget_categories') ) { ?>
	<section class="breadcrumb-top-bar">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcrumb-list breadcrumb-top-list">
						<ul class="list-items bg-transparent radius-none p-0">
							<?php
							\UsefulAddons\Includes\Elements\Breadcrumbs\OEE_Breadcrumbs::breadcrumb();
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } ?>
