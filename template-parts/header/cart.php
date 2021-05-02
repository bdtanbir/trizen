<?php
$ts_is_woocommerce_checkout = apply_filters('ts_is_woocommerce_checkout',false);
$color_cart  = '';
$stroke_cart = false;

//if(!function_exists('WC')){
    $cart_url          = wc_get_cart_url();
    $cart_total_item   = (int) WC()->cart->get_cart_contents_count();
    $cart_total_amount = WC()->cart->get_cart_subtotal();
    ?>
    <li class="dropdown dropdown-minicart">
        <div id="d-minicart" class="mini-cart" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="cart-caret">
                <?php echo esc_html($cart_total_item) ?>
            </div>
        </div>
        <ul class="dropdown-menu" aria-labelledby="d-minicart">
            <li class="heading">
                <h4 class="st-heading-section">
                    <?php esc_html_e('Your Cart', 'trizen') ?>
                </h4>
            </li>
            <?php
            $items = WC()->cart->get_cart();
            if (!empty($items)):
                foreach($items as $item => $values):
                    $_product = wc_get_product( $values['data']->get_id());
                    $post_id  = (int) get_post_meta($_product->get_id(), '_ts_booking_id', true );

                    $post_title = $_product->get_title();
                    if( get_post_type( $post_id ) == 'ts_hotel' ){
                        $room_id    = (int) get_post_meta( $_product->get_id(), 'room_id', true );
                        $post_title = get_the_title( $room_id );
                    }
                    /*echo '<pre>';
                    print_r($values);
                    echo '</pre>';*/
                    $quantity = (int) $values['quantity'];
                    $price    = (float) $values['line_total'];
                    $tax      = (float) $values['line_tax'];
                    $price    = $price + $tax;
                    ?>
                    <li class="cart-item">
                        <div class="media">
                            <div class="media-left">
                                <?php
                                if( has_post_thumbnail( $post_id ) ){
                                    echo get_the_post_thumbnail( $post_id, 'thumbnail', array('class' => 'img-responsive media-object') );
                                }
                                ?>
                            </div>
                            <div class="media-body">
                                <?php
                                if( get_post_type( $post_id ) == 'ts_hotel '):
                                    $room_id = (int) get_post_meta( $_product->ID, 'room_id', true );
                                    ?>
                                    <h4 class="media-heading">
                                        <a class="st-link c-main" href="<?php echo get_the_permalink($room_id) ?>">
                                            <?php echo esc_html($post_title); ?>
                                        </a>
                                    </h4>
                                <?php else: ?>
                                    <h4 class="media-heading">
                                        <a class="st-link c-main" href="<?php echo get_the_permalink($post_id) ?>">
                                            <?php echo esc_html($post_title); ?>
                                        </a>
                                    </h4>
                                <?php endif; ?>
                                <div class="price-wrapper">
                                    <?php esc_html_e('Price:', 'trizen') ?>
                                    <span class="price"><?php echo format_money($price); ?></span>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php
                endforeach;
                ?>
                <li class="cart-total">
                    <div class="sub-total">
                        <?php esc_html_e('Subtotal', 'trizen') ?> <span class="price"><?php echo balanceTags($cart_total_amount); ?></span>
                    </div>
                    <a href="<?php echo add_query_arg(['action' => 'ts-remove-cart', 'security' => wp_create_nonce('ts-security')]); ?>" class="btn btn-danger btn-full upper">
                        <?php esc_html_e('Remove Cart', 'trizen') ?>
                    </a>
                    <a href="<?php echo esc_url(get_permalink( wc_get_page_id( 'checkout' ) )) ?>" class="btn btn-green btn-full upper mt10">
                        <?php esc_html_e('Check Out', 'trizen') ?>
                    </a>
                </li>
            <?php
            else:
                ?>
                <div class="col-lg-12 cart-text-empty text-warning">
                    <?php esc_html_e('Your cart is empty', 'trizen'); ?>
                </div>
            <?php
            endif;
            ?>
        </ul>
    </li>
    <?php
//}else {
//    ?>
<!--    <li class="dropdown dropdown-minicart">-->
<!--        --><?php
//        // $check_out_url = (int)st()->get_option('page_checkout', '');
//        $check_out_url     = get_permalink();
//        $cart_total_item   = (int)cart_count();
//        $cart_total_amount = (float)(check_cart()) ? getTotal() : 0;
//        $post_id_global    = 0;
//        ?>
<!--        <div id="d-minicart" class="mini-cart" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--            <div class="cart-caret">-->
<!--                --><?php //echo esc_html($cart_total_item) ?>
<!--            </div>-->
<!--        </div>-->
<!--        <ul class="dropdown-menu" aria-labelledby="d-minicart">-->
<!--            <li class="heading">-->
<!--                <h4 class="st-heading-section">-->
<!--                    --><?php //esc_html_e('Your Cart', 'trizen'); ?>
<!--                </h4>-->
<!--            </li>-->
<!--            --><?php
//            if (check_cart()):
//                $items = get_carts();
//                foreach ($items as $post_id => $value):
//                    $post_id_global = $post_id;
//                    $post_title     = get_the_title($post_id);
//                    if (get_post_type($post_id) == 'ts_hotel') {
//                        $room_id    = (int)$value['data']['room_id'];
//                        $post_title = get_the_title($room_id);
//                    }
//                    $quantity = (int)count($items);
//                    $price    = (float)getTotal();
//                    ?>
<!--                    <li class="cart-item">-->
<!--                        <div class="media">-->
<!--                            <div class="media-left">-->
<!--                                --><?php
//                                if (has_post_thumbnail($post_id)) {
//                                    echo get_the_post_thumbnail($post_id, [70, 70], ['class' => 'media-object']);
//                                }
//                                ?>
<!--                            </div>-->
<!--                            <div class="media-body">-->
<!--                                --><?php
//                                if (get_post_type($post_id) == 'ts_hotel'):
//                                    $room_id = (int)$value['data']['room_id'];
//                                    ?>
<!--                                    <h4 class="media-heading">-->
<!--                                        <a class="st-link c-main" href="--><?php //echo get_the_permalink($room_id) ?><!--">-->
<!--                                            --><?php //echo esc_html($post_title); ?>
<!--                                        </a>-->
<!--                                    </h4>-->
<!--                                --><?php //else: ?>
<!--                                    <h4 class="media-heading">-->
<!--                                        <a class="st-link c-main" href="--><?php //echo get_the_permalink($post_id) ?><!--">-->
<!--                                            --><?php //echo esc_html($post_title); ?>
<!--                                        </a>-->
<!--                                    </h4>-->
<!--                                --><?php //endif; ?>
<!--                                <div class="price-wrapper">-->
<!--                                    --><?php //esc_html_e('Price:', 'trizen') ;?>
<!--                                     <span class="price">-->
<!--                                         --><?php ////echo format_money($price,false); ?>
<!--                                     </span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <a href="--><?php //echo add_query_arg(['action' => 'ts-remove-cart', 'security' => wp_create_nonce('ts-security')]); ?><!--" class="cart-delete-item"><i class="fa">-->
<!--                                <svg width="16px" height="16px" viewBox="0 0 16 16"-->
<!--                                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">-->
<!--                                    <g id="Menu" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"-->
<!--                                       stroke-linecap="round" stroke-linejoin="round">-->
<!--                                        <g id="Menu-Mega" transform="translate(-1355.000000, -383.000000)"-->
<!--                                           stroke="#A0A9B2">-->
<!--                                            <g id="cart" transform="translate(1120.000000, 130.000000)">-->
<!--                                                <g id="hotel" transform="translate(0.000000, 198.000000)">-->
<!--                                                    <g id="Group" transform="translate(236.000000, 56.000000)">-->
<!--                                                        <g id="bin-1">-->
<!--                                                            <path d="M0,2 L14,2" id="Shape"></path>-->
<!--                                                            <path d="M8.5,0 L5.5,0 C4.94771525,0 4.5,0.44771525 4.5,1 L4.5,2 L9.5,2 L9.5,1 C9.5,0.44771525 9.05228475,0 8.5,0 Z"-->
<!--                                                                  id="Shape"></path>-->
<!--                                                            <path d="M5.5,10.5 L5.5,5.5" id="Shape"></path>-->
<!--                                                            <path d="M8.5,10.5 L8.5,5.5" id="Shape"></path>-->
<!--                                                            <path d="M11.5766667,13.0826667 C11.5336578,13.6011549 11.100269,14.0000465 10.58,14 L3.42066667,14 C2.9003977,14.0000465 2.4670089,13.6011549 2.424,13.0826667 L1.5,2 L12.5,2 L11.5766667,13.0826667 Z"-->
<!--                                                                  id="Shape"></path>-->
<!--                                                        </g>-->
<!--                                                    </g>-->
<!--                                                </g>-->
<!--                                            </g>-->
<!--                                        </g>-->
<!--                                    </g>-->
<!--                                </svg>-->
<!--                            </i>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                --><?php
//                endforeach;
//                ?>
<!--                <li class="cart-total">-->
<!--                    <div class="sub-total">-->
<!--                        --><?php //esc_html_e('Subtotal', 'trizen') ?>
<!--                        <span class="price">-->
<!--                            --><?php ////echo TravelHelper::format_money($cart_total_amount,false); ?>
<!--                        </span>-->
<!--                    </div>-->
<!--                    <a href="--><?php //echo esc_url($check_out_url) ?><!--" class="btn btn-green btn-full upper">-->
<!--                        --><?php //esc_html_e('Pay Now', 'trizen') ?>
<!--                    </a>-->
<!--                </li>-->
<!--            --><?php
//            else:
//                ?>
<!--                <div class="col-lg-12 cart-text-empty text-warning">-->
<!--                    --><?php //esc_html_e('Your cart is empty', 'trizen'); ?>
<!--                </div>-->
<!--            --><?php
//            endif;
//            ?>
<!--        </ul>-->
<!--    </li>-->
<!--    --><?php
//}


