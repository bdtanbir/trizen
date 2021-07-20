<?php
$ts_is_woocommerce_checkout = apply_filters('ts_is_woocommerce_checkout',false);
$color_cart  = '';
$stroke_cart = false;
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
    <ul class="dropdown-menu" aria-labelledby="d-minicart" style="width: 500px;">
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
                                    <a class="ts-link c-main" href="<?php echo get_the_permalink($room_id) ?>">
                                        <?php echo esc_html($post_title); ?>
                                    </a>
                                </h4>
                            <?php else: ?>
                                <h4 class="media-heading">
                                    <a class="ts-link c-main" href="<?php echo get_the_permalink($post_id) ?>">
                                        <?php echo esc_html($post_title); ?>
                                    </a>
                                </h4>
                            <?php endif; ?>
                            <div class="price-wrapper">
                                <?php esc_html_e('Price:', 'trizen') ?>
                                <span class="price"><?php echo TravelHelper::format_money($price); ?></span>
                            </div>
                        </div>
                    </div>
                </li>
            <?php
            endforeach;
            ?>
            <li class="cart-total">
                <div class="sub-total">
                    <?php esc_html_e('Subtotal', 'trizen') ?> <span class="price">
                        <?php echo balanceTags(esc_html( $cart_total_amount )); ?>
                    </span>
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



