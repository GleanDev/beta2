<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package Jobify
 * @since Jobify 1.0
 */

global $post;
if(is_user_logged_in()){
	$current_user = get_current_user_id();
}
?>
<script>
	jQuery(document).ready(function($){
		var job_id = <?php echo get_the_ID(); ?>;
		var current_user = '<?php echo $current_user ?>';
		$('.apply_wrap a').click(function(){
			$.ajax({
            url: '<?php echo get_permalink("2373"); ?>', //This is the current doc
            type: "POST",
            data: {job_id: job_id, user:current_user},
            success: function(data){
            	//alert(data);
            }
        }); 
		});

		$('.apply_wrap a').click(function(){
			$('#apply_hidden_overlay').show();
		});

		$('.mfp-close').click(function(){
			$('#apply_hidden_overlay').hide();
		})

		$(".apply_hidden_wrap").appendTo("#apply_hidden_overlay");

	})
</script>

<?php if (is_single()): ?>	
						<div class='apply_hidden_wrap'>
						<button title="Close (Esc)" type="button" class="mfp-close">×</button>
							<div class='apply_hidden'>
								<?php
									if(is_user_logged_in()){
										echo do_shortcode('[ninja_forms_display_form id=1] '); 
									}
									else{
										echo 'Please sign in!';
									}
								?>	
							</div>
						</div>
<?php endif; ?>

<div class="page-header">
	<div>
		<?php $tax = get_the_terms( $post->ID, 'job_listing_category' ); ?>  
		<?php 
			foreach($tax as $t){
				$term_id = $t->term_id;
				$tax_name = $t->taxonomy;
			}
			$img = get_field("background_image", $tax_name . '_' . $term_id); 
		?>
		<img class='bgImg' src='<?php echo $img; ?>' />
	</div>
	<div class='job_h_wrap'>		
		<h1 class="page-title"><?php the_title(); ?></h1>
		<h2 class="page-subtitle">
			<?php do_action( 'single_job_listing_meta_before' ); ?>

			<ul>
				<?php do_action( 'single_job_listing_meta_start' ); ?>

				<li class="job-type <?php echo get_the_job_type() ? sanitize_title( get_the_job_type()->slug ) : ''; ?>"><?php the_job_type(); ?></li>
				<li class="job-company">
					<?php
					if ( class_exists( 'Astoundify_Job_Manager_Companies' ) && '' != get_the_company_name() ) :
						$companies   = Astoundify_Job_Manager_Companies::instance();
						$company_url = esc_url( $companies->company_url( get_the_company_name() ) );
					?>
					<a href="<?php echo $company_url; ?>" target="_blank"><?php the_company_name(); ?></a>
					<?php else : ?>
						<?php the_company_name(); ?>
					<?php endif; ?>
				</li>
				<li class="job-location"><i class="icon-location"></i> <?php the_job_location(); ?></li>
				<li class="job-date-posted"><i class="icon-calendar"></i> <?php printf( __( 'Posted <date>%s</date> ago', 'jobify' ), human_time_diff( get_post_time( 'U' ), current_time( 'timestamp' ) ) ); ?></li>

			</ul>

			<?php do_action( 'single_job_listing_meta_after' ); ?>
		</h2>
	</div>
</div>
<div id='job_content_wrap'>
	<div id="content" class="container" role="main">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-content">

				<?php if ( 'preview' == $post->post_status ) : ?>
					<?php //get_job_manager_template_part( 'content-single', 'job_listing' ); ?>
					











					<?php //the_content(); 
					
					$meta = get_post_meta($post->ID);?>
					<div id='single_job_logo_section'>
						<?php 
							the_company_logo( $size = 'medium');
						?>
						<div class='single_address'>
							
							<h2>Address</h2>
							<?php
							echo $meta['addr_details'][0];
							?>
							
							<br/> <br/>
							
							<h2>Job Category</h2>
							<?php 
								$terms = wp_get_post_terms( $post->ID , 'job_listing_category');
								foreach($terms as $t){
									echo $t->name;
								}
							?>
						</div>
					</div>
					
					<div id='single_job_map'>
						<?php do_action( 'single_job_listing_meta_end' ); ?>
					</div><br/>

					<?php 
						for($x=0;$x<10;$x++){

							if($x != 0){
								$sufix = $x;
							}
							else{
								$sufix='';
							}

							if($meta['_gallery_image' . $sufix][0]):
								$collection[]= $meta['_gallery_image' . $sufix];
							endif;
						}

						if($collection):
					?>
						<ul class="bxslider">

							<?php
								foreach($collection as $c):
							?>
									<li><img src="<?php echo $c[0]; ?>" /></li>
							<?php
								endforeach;
							?>
						  
						</ul>
						<script>
							jQuery('.bxslider').bxSlider();
						</script>
						<?php endif; ?>

					<br/>
					<h1>Overview</h1>
					<span><?php echo get_the_content(); ?></span>

					<br/>
					<h1>Requirements</h1>
					<span><?php echo $meta['_requirements'][0]; ?></span>

					<br/>
					<h1>Salary and benefits</h1>
					<span><?php echo $meta['_job_salary'][0]; ?></span>


















				<?php else : ?>
					<?php //the_content(); 
					
					$meta = get_post_meta($post->ID);?>
					<div id='single_job_logo_section'>
						<?php 
							the_company_logo( $size = 'medium');
						?>
						<div class='single_address'>
							
							<h2>Address</h2>
							<?php
							echo $meta['addr_details'][0];
							?>
							
							<br/> <br/>
							
							<h2>Job Category</h2>
							<?php 
								$terms = wp_get_post_terms( $post->ID , 'job_listing_category');
								foreach($terms as $t){
									echo $t->name;
								}
							?>
						</div>
					</div>
					
					<div id='single_job_map'>
						<?php do_action( 'single_job_listing_meta_end' ); ?>
					</div><br/>

					<?php 
						for($x=0;$x<10;$x++){

							if($x != 0){
								$sufix = $x;
							}
							else{
								$sufix='';
							}

							if($meta['_gallery_image' . $sufix][0]):
								$collection[]= $meta['_gallery_image' . $sufix];
							endif;
						}

					?>
					<div class='apply_wrap' style='text-align:right;'><a class="button" href="#">Apply to job</a></div>
					<?php
						if($collection):
					?>
						<ul class="bxslider">

							<?php
								foreach($collection as $c):
							?>
									<li><img src="<?php echo $c[0]; ?>" /></li>
							<?php
								endforeach;
							?>
						  
						</ul>
						<script>
							jQuery('.bxslider').bxSlider();
						</script>
						<?php endif; ?>

					<br/>
					<h1>Overview</h1>
					<span><?php echo get_the_content(); ?></span>

					<br/>
					<h1>Requirements</h1>
					<span><?php echo $meta['_requirements'][0]; ?></span>

					<br/>
					<h1>Salary and benefits</h1>
					<span><?php echo $meta['_job_salary'][0]; ?></span>

					<div style='float:right'><?php echo do_shortcode('[post_view]'); ?></div>
				<?php endif; ?>

				<?php get_template_part( 'content-single-job', 'related' ); ?>
			</div>
		</article><!-- #post -->
	</div>
</div>
