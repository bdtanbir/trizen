<?php
if(!is_active_sidebar('hotel-room-sidebar')) {
    return;
}
?>


<div class="sidebar single-content-sidebar mb-0">
	<?php 
		dynamic_sidebar( 'hotel-room-sidebar' );
	?>
</div>



