<?php if ( ! is_tax( 'job_listing_type' ) && empty( $job_types ) ) : ?>
	<ul class="job_types">

	</ul>
<?php elseif ( $job_types ) : ?>
	<?php foreach ( $job_types as $job_type ) : ?>
		<input type="hidden" name="filter_job_type[]" value="<?php echo sanitize_title( $job_type ); ?>" />
	<?php endforeach; ?>
<?php endif; ?>