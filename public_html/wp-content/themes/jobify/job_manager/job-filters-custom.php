<?php wp_enqueue_script( 'wp-job-manager-ajax-filters' ); ?>


<?php do_action( 'job_manager_job_filters_before', $atts ); ?>

<form class="job_filters custom_search">
	<?php do_action( 'job_manager_job_filters_start', $atts ); ?>

	<div class="search_jobs">
		<?php do_action( 'job_manager_job_filters_search_jobs_start', $atts ); ?>
	
					<div class="job_category">
						
						<?php $taxonomies = array( 
						    'job_listing_category',
						    'job_listing_type'
						);
						
						$args = array(
						    'orderby'           => 'name',
						    'hierarchical'      => true,
						    'hide_empty'   => 0,
						); 
						
						$job_categories = get_terms($taxonomies[0], $args);
						$job_types = get_terms($taxonomies[1], $args); ?>

						<div id='search_checkbox'> 
							<span class='checkbox_label'>Category</span>
							<div class='slide_check'>
						<?php
						foreach($job_categories as $term):
							$term = $term->slug;

							?>
							<?php 
								if(in_array($term, $_POST['search_categ'])){
									$checked_val = true;
								}
								else{
									$checked_val = false;
								}
							?>
							<div class='check_wrap'><span><input class='search_checkbox' type="checkbox" name="search_categ[]" value="<?php echo $term ?>" <?php if($checked_val){ echo 'checked';} ?>/></span><span class='categ_span'><?php echo $term ?></span></div>
							<?php 
						endforeach;?>

							</div>
						</div>			
					</div>
					
					<div class="custom_job_types">
						
						<div id='custom_job_type'>
							<span class='checkbox_label'>Job Type</span> 
							<div class='slide_check'>
						<?php
						foreach($job_types as $term):
							$term = $term->name; 
							?>
							<?php 
								if(in_array($term, $_POST['filter_job_type'])){
									$checked_val = true;
								}
								else{
									$checked_val = false;
								}
							?>
							<div class='check_wrap'><span><input class='job_type_checkbox' type="checkbox" name="filter_job_type[]" value="<?php echo $term ?>" <?php if($checked_val){ echo 'checked';} ?>/></span><span class='categ_span'><?php echo $term ?></span></div>
							<?php 
						endforeach;?>

							</div>
						</div>		
					</div>
		<div class="search_keywords">
			<label for="search_keywords"><?php _e( 'Keywords', 'wp-job-manager' ); ?></label>
			<input type="text" name="search_keywords" id="search_keywords" placeholder="Type Keywords" value="<?php if($_POST['search_keywords']) { echo $_POST['search_keywords']; } else{ echo esc_attr( $keywords ); }  ?>" />
		</div>

		<div class="search_location">
			<label for="search_location"><?php _e( 'Location', 'wp-job-manager' ); ?></label>
			<input type="text" name="search_location" id="search_location" placeholder="Type Location" value="<?php if($_POST['search_location']) { echo $_POST['search_location']; } else{ echo esc_attr( $keywords ); }  ?>" />
		</div>
		



		<?php do_action( 'job_manager_job_filters_search_jobs_end', $atts ); ?>
	</div>

	<?php do_action( 'job_manager_job_filters_end', $atts ); ?>
</form>

<?php do_action( 'job_manager_job_filters_after', $atts ); ?>

<noscript><?php _e( 'Your browser does not support JavaScript, or it is disabled. JavaScript must be enabled in order to view listings.', 'wp-job-manager' ); ?></noscript>
