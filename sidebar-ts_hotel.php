<?php

if(!is_active_sidebar('hotel-sidebar')) {
    return;
}
?>

<div class="sidebar single-content-sidebar mb-0">
    <?php
    dynamic_sidebar('hotel-sidebar');
    ?>
</div>
