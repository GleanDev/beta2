<?php
/**
 *
 */

if ( 'side' == jobify_theme_mod( 'jobify_listings', 'jobify_listings_display_area' ) )
	return;

$columns = jobify_theme_mod( 'jobify_listings', 'jobify_listings_topbar_columns' );
$colspan = jobify_theme_mod( 'jobify_listings', 'jobify_listings_topbar_colspan' );
$colspan = array_map( 'trim', explode( ' ', $colspan ) );

$args    = array(
	'before_widget' => '<aside class="job_listing-widget-top default-widget">',
	'after_widget'  => '</aside>',
	'before_title'  => '<h3 class="job_listing-widget-title-top">',
	'after_title'   => '</h3>'
);
?>
<script>
	jQuery(document).ready(function($){
		$('.bxslider').bxSlider({
		  pagerCustom: '#bx-pager'
		});
	});
</script>
<div class="job-meta-top row">

	<?php do_action( 'single_job_listing_info_before' ); ?>
	<?php $custom_check = 0; ?>
	<?php for ( $i = 1; $i <= $columns; $i++ ) :?>
		<div class="col-md-<?php echo $colspan[ $i - 1 ]; ?> col-sm-6 col-xs-12">

			<?php do_action( 'single_job_listing_info_start' ); ?>

			<?php if ( ! is_active_sidebar( 'single-job_listing-top-' . $i ) ) : ?>

				<?php if ( 1 == $i ) : ?>

					<?php the_widget( 'Jobify_Widget_Job_Company_Logo', array(), $args ); ?>

				<?php elseif ( 2 == $i ) : ?>

					<?php if ( ! class_exists( 'WP_Job_Manager_Job_Tags' ) ) : ?>
										<?php if($custom_check == 0): ?>
				<aside class="job_listing-widget-top default-widget">
				<h3 class="job_listing-widget-title-top">Address details</h3>
				<div class="job_listing-categories">
				<?php echo get_post_meta( $post->ID, 'addr_details', true ) ?>				
				</div>		
				</aside>
				<?php $custom_check++;endif; ?>
						<?php the_widget( 'Jobify_Widget_Job_Categories', array( 'title' => __( 'Job Category', 'jobify' ) ), $args ); ?>
						<script>
							jQuery('.job_listing-categories a').attr('href','#');
						</script>
					<?php else : ?>
						<?php the_widget( 'Jobify_Widget_Job_Tags', array( 'title' => __( 'Job Tags', 'jobify' ) ), $args ); ?>
					<?php endif; ?>

					<?php //the_widget( 'Jobify_Widget_Job_Share', array( 'title' => __( 'Share Job Posting', 'jobify' ) ), $args ); ?>

				<?php elseif ( 3 == $i ) : ?>
					<div itemprop="gallery" class="gallery_img col-md-<?php echo $col_overview; ?> col-sm-12">
					<h2 class="job-overview-title">Gallery</h2>
					<?php $first_img = get_post_meta( $post->ID, '_gallery_image', true ); ?>
					
					<ul class="bxslider">
					<?php 
						$att_media = get_attached_media( 'image' );
						foreach($att_media as $media): 
							
							$img_src = wp_get_attachment_image_src( $media->ID, 'medium');
							$img_src = $img_src[0]; 
					?>
							<li><img src='<?php echo $img_src; ?>' /></li>
					<?php	
						endforeach;
					?>
					</ul>
					
					<div id="bx-pager">
					<?php 
						$att_media = get_attached_media( 'image' );
						$pager_check = 0;
						foreach($att_media as $media): 
							
							$img_src = wp_get_attachment_image_src( $media->ID, 'thumbnail');
							$img_src = $img_src[0]; 
					?>
							<a data-slide-index="<?php echo $pager_check; ?>" href=""><img src='<?php echo $img_src; ?>' /></a>
							<?php $pager_check++; ?>
					<?php	
						endforeach;
					?>
					</div>
					</div>
					
					<?php the_widget( 'Jobify_Widget_Job_Company_Social', array( 'title' => __( 'Company Details', 'jobify' ) ), $args ); ?>

					<?php the_widget( 'Jobify_Widget_Job_Apply', array(), $args ); ?>

				<?php endif; ?>

			<?php else : ?>

				<?php dynamic_sidebar( 'single-job_listing-top-' . $i ); ?>

			<?php endif; ?>

			<?php do_action( 'single_job_listing_info_end' ); ?>

		</div>
	<?php endfor; ?>

	<?php do_action( 'single_job_listing_info_after' ); ?>

</div>