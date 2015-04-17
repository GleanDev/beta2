<?php
/**
 * Template Name: Resume
 *
 * @package Jobify
 * @since Jobify 1.0
 */

get_header();
?>
<br/><br/><br/>
<?php

if ( is_user_logged_in() ):

    global $current_user;
    get_currentuserinfo();
    $author_query = array('post_type' => 'job_listing' , 'posts_per_page' => '-1','author' => $current_user->ID);
    $author_posts = new WP_Query($author_query);
    $c = 0;
    while($author_posts->have_posts()) : $author_posts->the_post();

    	$status = get_post_status();
    	if($status == 'publish'){
    		$browse = true;
    		break;
    	}  

    endwhile;

else :

    echo "not logged in";

endif;

	?>
<?php if($browse): ?>

			<div>
				<?php
					$shortcode = '[resumes]';
					echo do_shortcode($shortcode);
				?>
			</div>

				<?php
			else:
				echo "You must have at least one active job in order to browse through Resumes.";

endif;
get_footer();
?>