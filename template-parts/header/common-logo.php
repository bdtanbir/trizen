
<?php
$display_bloginfo_name = get_theme_mod('display_header_text', 1);
/*general logo*/
$logo        = get_theme_mod( 'custom_logo' );
/*logo src*/
$logo_src    = $logo;
// retina logo
$retina_logo     = get_theme_mod( 'retina_logo' );
$retina_logo_src = $retina_logo;
if(!empty($logo)) {
	?>
    <a href='<?php echo esc_url(home_url('/')); ?>'>
        <img
                src="<?php echo esc_url($logo_src); ?>"
                alt="<?php esc_attr_e('Logo', 'trizen'); ?>"
                srcset="<?php echo esc_url( $logo_src ); ?> 1x, <?php echo esc_url( $retina_logo_src ); ?> 2x"
                width="134"
                height="30"
        >
    </a>
<?php } else {
	if($display_bloginfo_name == 1) {
		?>
        <a href='<?php echo esc_url(home_url('/')); ?>'>
            <h2 class="site-name">
				<?php bloginfo('name'); ?>
            </h2>
        </a>
		<?php
	}
} ?>


