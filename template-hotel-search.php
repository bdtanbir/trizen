<?php
/**
 * Template Name: Hotel Search Result
 */
get_header();

get_template_part('template-parts/hotel/elements/search-form');

$query = array(
    'post_type'   => 'ts_hotel',
    'post_status' => 'publish',
    's'           => '',
    'orderby'     => 'post_modified',
    'order'       => 'DESC',
);

global $wp_query , $ts_search_query;


//$hotel = TSHotel::inst();
alter_search_query();

query_posts($query);
$ts_search_query = $wp_query;
remove_alter_search_query();
wp_reset_query();

get_template_part('template-parts/hotel/elements/content');


get_footer();
?>

