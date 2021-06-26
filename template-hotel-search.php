<?php
/**
 * Template Name: Hotel Search Result
 */
get_header();


$query = array(
    'post_type'   => 'ts_hotel',
    'post_status' => 'publish',
    's'           => '',
    'orderby'     => 'post_modified',
    'order'       => 'DESC',
);

global $wp_query , $ts_search_query;


$hotel = TSHotel::inst();
$hotel->alter_search_query();

query_posts($query);
$ts_search_query = $wp_query;
$hotel->remove_alter_search_query();
wp_reset_query();

get_template_part('template-parts/hotel/elements/content');


get_footer();
?>

