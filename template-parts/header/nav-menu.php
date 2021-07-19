
<?php
	if(function_exists('wp_nav_menu') && has_nav_menu('header_menu')) {
		wp_nav_menu(array(
			'theme_location' => 'header_menu',
			'depth'          => 3,
			'menu'           => 'ul',
			'menu_class'     => ' ',
			'menu_id'        => ' ',
			'container'       => 'nav',
			'container_class' => ' ',
			'walker'          => new WP_Trizen_Navwalker(),
		));
	}