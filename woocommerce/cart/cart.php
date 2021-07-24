<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); 


$ts_is_woocommerce_checkout = apply_filters('ts_is_woocommerce_checkout',false);
$color_cart  = '';
$stroke_cart = false;
$cart_url          = wc_get_cart_url();
$cart_total_item   = (int) WC()->cart->get_cart_contents_count();
$cart_total_amount = WC()->cart->get_cart_subtotal();
?>

<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php do_action( 'woocommerce_before_cart_table' ); ?>

	<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
		<thead>
			<tr>
				<th class="product-details"><?php esc_html_e( 'Product', 'trizen' ); ?></th>
				<th class="product-price"><?php esc_html_e( 'Price', 'trizen' ); ?></th>
				<th class="product-quantity"><?php esc_html_e( 'Quantity', 'trizen' ); ?></th>
				<th class="product-subtotal"><?php esc_html_e( 'Subtotal', 'trizen' ); ?></th>
				<th class="product-remove text-center"><?php esc_html_e( 'Action', 'trizen' ); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php do_action( 'woocommerce_before_cart_contents' ); ?>

			<?php
            $items = WC()->cart->get_cart();
            foreach($items as $item => $values) {
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
                $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $values ) : '', $values, $item );
					?>
                    <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $values, $item ) ); ?>">
                        <td class="product-details" data-title="<?php esc_attr_e( 'Product', 'trizen' ); ?>">
                            <div class="table-content product-content d-flex align-items-center">
                                <a href="<?php echo get_the_permalink( $post_id ); ?>">
                                    <?php
                                        if( has_post_thumbnail( $post_id ) ){
                                            echo get_the_post_thumbnail( $post_id, 'thumbnail', array('class' => 'img-responsive media-object') );
                                        }
                                    ?>
                                </a>
                                <div class="product-content-right">
                                    <?php
                                        echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( get_the_permalink( $post_id ) ), $_product->get_name() ), $values, $item ) );
                                        do_action( 'woocommerce_after_cart_item_name', $values, $item );
                                        echo wc_get_formatted_cart_item_data( $values ); // PHPCS: XSS ok.
                                        if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $values['quantity'] ) ) {
                                            echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'trizen' ) . '</p>', $product_id ) );
                                        }
                                    ?>
                                    <div class="product-info line-height-24">
                                        <span class="product-info-label">
                                            <?php esc_html_e( 'Reservation:', 'trizen' ); ?>
                                        </span>
                                        <span class="product-info-value">
                                            <span class="product-check-in">
                                                <?php echo esc_html($values['ts_booking_data']['check_in']); ?>
                                            </span>
                                            <span class="product-mark"> - </span>
                                            <span class="product-check-out">
                                                <?php echo esc_html($values['ts_booking_data']['check_out']); ?>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="product-info line-height-24">
                                        <span class="product-info-label">
                                            <?php esc_html_e( 'Guests:', 'trizen' ); ?>
                                        </span>
                                        <span class="product-info-value"><?php echo esc_html($values['ts_booking_data']['adult_number']); esc_html_e( ' Adult(s)', 'trizen' ); ?></span>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td class="product-price" data-title="<?php esc_attr_e( 'Price', 'trizen' ); ?>">
                            <?php
                                echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $values, $item ); // PHPCS: XSS ok.
                            ?>
                        </td>

                        <td class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'trizen' ); ?>">
                            <?php
                            if ( $_product->is_sold_individually() ) {
                                $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $item );
                            } else {
                                $product_quantity = woocommerce_quantity_input(
                                    array(
                                        'input_name'   => "cart[{$item}][qty]",
                                        'input_value'  => $cart_item['quantity'],
                                        'max_value'    => $_product->get_max_purchase_quantity(),
                                        'min_value'    => '0',
                                        'product_name' => $_product->get_name(),
                                    ),
                                    $_product,
                                    false
                                );
                            }

                            echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $item, $values ); // PHPCS: XSS ok.
                            ?>
                        </td>

                        <td class="product-subtotal" data-title="<?php esc_attr_e( 'Subtotal', 'trizen' ); ?>">
                            <?php
                                echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $values['quantity'] ), $values, $item ); // PHPCS: XSS ok.
                            ?>
                        </td>

                        <td class="product-remove">
                            <div class="remove-wrap text-center">
                                <?php
                                    echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                        'woocommerce_cart_item_remove_link',
                                        sprintf(
                                            '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="la la-times"></i></a>',
                                            esc_url( wc_get_cart_remove_url( $item ) ),
                                            esc_html__( 'Remove this item', 'trizen' ),
                                            esc_attr( $post_id ),
                                            esc_attr( $_product->get_sku() )
                                        ),
                                        $item
                                    );
                                ?>
                            </div>
                        </td>
                    </tr>
					<?php
				// }
			}
			?>

			<?php do_action( 'woocommerce_cart_contents' ); ?>

			<tr>
				<td colspan="6" class="actions">

					<?php if ( wc_coupons_enabled() ) { ?>
						<div class="coupon">
                            <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'trizen' ); ?>" /> <button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'trizen' ); ?>"><?php esc_attr_e( 'Apply coupon', 'trizen' ); ?></button>
							<?php do_action( 'woocommerce_cart_coupon' ); ?>
						</div>
					<?php } ?>

					<button type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'trizen' ); ?>"><?php esc_html_e( 'Update cart', 'trizen' ); ?></button>

					<?php do_action( 'woocommerce_cart_actions' ); ?>

					<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
				</td>
			</tr>

			<?php do_action( 'woocommerce_after_cart_contents' ); ?>
		</tbody>
	</table>
	<?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>

<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

<div class="cart-collaterals">
	<?php
		/**
		 * Cart collaterals hook.
		 *
		 * @hooked woocommerce_cross_sell_display
		 * @hooked woocommerce_cart_totals - 10
		 */
		do_action( 'woocommerce_cart_collaterals' );
	?>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
