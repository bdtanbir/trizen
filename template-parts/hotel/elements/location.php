<?php

$location_id   = get( 'location_id', '' );
$location_name = get( 'location_name', '' );
if(empty($location_name)){
	if(!empty($location_id)){
		$location_name = get_the_title($location_id);
	}
}

$lists     = TravelHelper::getListFullNameLocation( 'ts_hotel' );
$locations = TravelHelper::buildTreeHasSort( $lists );

if(is_singular('location')){
	$location_id = get_the_ID();
}
?>



<div class="input-box form-extra-field field-detination">
	<div class="form-group tp-hotel-wrapper">
		<div class="dropdown" data-toggle="dropdown" id="dropdown-destination">
			<label class="label-text">
				<?php esc_html_e( 'Destination / Hotel name', 'trizen' ); ?>
			</label>
			<div class="render position-relative">
				<span class="la la-map-marker form-icon"></span>
				<?php
				if(empty($location_name)) {
					$placeholder = esc_html__('Where are you going?', 'trizen');
				}else{
					$placeholder = esc_html($location_name);
				}
				?>
				<input class="form-control" type="text" touchend="stKeyupsmartSearch(this)" autocomplete="off" onkeyup="stKeyupsmartSearch(this)" id="location_name" name="location_name" value="<?php echo esc_attr($location_name); ?>" placeholder="<?php echo esc_attr($placeholder);?>" />
			</div>

			<input type="hidden" name="location_id" value="<?php echo esc_attr($location_id); ?>"/>
		</div>
		<ul class="dropdown-menu" id="dropdown_destination" aria-labelledby="dropdown-destination">
			<?php
			TravelHelper::buildTreeOptionLocation($locations, $location_id);
			?>
		</ul>

	</div>
</div>

<script>
    function stKeyupsmartSearch(event){
        // Declare variables
        var input, filter, ul, li, a, i, txtValue;
        input  = event.value.toUpperCase();
        filter = event.value.toUpperCase();
        parent = event.closest(".form-extra-field");
        ul     = parent.getElementsByTagName('ul')[0];
        li     = ul.getElementsByTagName('li');

        // Loop through all list items, and hide those who don't match the search query
        for (i = 0; i < li.length; i++) {
            //a = li[i].getElementsByTagName("a")[0];
            txtValue =  li[i].textContent ||  li[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }
</script>
