<?php
$trizen_room_rules_data = get_post_meta(get_the_ID(), 'trizen_room_rules_data_group', true);
if(is_array($trizen_room_rules_data)) {
?>
    <h3 class="title font-size-15 font-weight-medium pb-3">
        <?php esc_html_e('House Rules', 'trizen'); ?>
    </h3>
    <ul class="list-items">
        <?php foreach ( $trizen_room_rules_data as $item ) { ?>
            <li>
                <i class="la la-dot-circle mr-2"></i><?php echo esc_html($item['trizen_room_rules_title']); ?>
            </li>
        <?php } ?>
    </ul>
<?php } ?>



