<?php
/**
 * Template Name: Address change
 *
 * @package Jobify
 * @since Jobify 1.0
 */

get_header();
?>

<?php

// The Query
$args = array(
        'post_type' => 'job_listing',
        'posts_per_page' => -1
    );
$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {

    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        //the_title();
        $post_custom = get_post_custom();
        $post_location = $post_custom['_job_location'];
        $post_location = $post_location[0];
        //$post_lat = $post_custom['geolocation_lat'];
        //$post_long = $post_custom['geolocation_long'];
        //echo $post_location[0] . " " . $post_lat[0] . " " . $post_long[0];

        $post_custom = get_post_custom();
        $post_custom = $post_custom['_job_location'];
        
        echo "<br/>" . $post_custom[0] . " " . $post_lat[0] . " " . $post_long[0];
        echo "<br/>";
    }

} else {
    // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();

?>

<?php 
get_footer();
?>