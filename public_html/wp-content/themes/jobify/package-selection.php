<?php if ( $packages || $user_packages ) :
	$checked = 1;
	?>
	<ul class="job_packages">
		<?php //print_r ($user_packages); 
		$check = 0;
		/*foreach($user_packages as $pack){
			$listing = $pack->product_id;
			$list[$listing][] = $listing;
			print_r ($pack)
		}
		
		foreach($list as $l){
			echo $l[0];
			$prod = get_post($l[0]);
			$prod->post_title;
			$prod_section[0] = $prod->post_title;
			$prod_section[1] = count($l);
		}*/
		//print_r ($prod);
		?>
		<?php if ( $user_packages ) : ?>
			<li class="package-section"><?php _e( 'Your Packages:', 'wp-job-manager-wc-paid-listings' ); ?></li>
			<?php foreach ( $user_packages as $key => $package ) :
				$package = wc_paid_listings_get_package( $package );
				?>
				<li class="user-job-package">
					<input type="radio" <?php checked( $checked, 1 ); ?> name="job_package" value="user-<?php echo $key; ?>" id="user-package-<?php echo $package->get_id(); ?>" />
					<label for="user-package-<?php echo $package->get_id(); ?>"><?php echo $package->get_title(); ?></label><br/>
					<?php
						if ( $package->get_limit() ) {
							printf( _n( '%s job posted out of %d', '%s jobs posted out of %s', $package->get_count(), 'wp-job-manager-wc-paid-listings' ) . ', ', $package->get_count(), $package->get_limit() );
						} else {
							printf( _n( '%s job posted', '%s jobs posted', $package->get_count(), 'wp-job-manager-wc-paid-listings' ) . ', ', $package->get_count() );
						}

						if ( $package->get_duration() ) {
							printf( _n( 'listed for %s day', 'listed for %s days', $package->get_duration(), 'wp-job-manager-wc-paid-listings' ), $package->get_duration() );
						}

						$checked = 0;
					?>
				</li>
			<?php endforeach; ?>
		<?php endif; ?>
		<?php if ( $packages ) : ?>
			<li class="package-section"><?php _e( 'Purchase Package:', 'wp-job-manager-wc-paid-listings' ); ?></li>
			<?php foreach ( $packages as $key => $package ) :
				$product = get_product( $package );
				if ( ! $product->is_type( array( 'job_package', 'job_package_subscription' ) ) ) {
					continue;
				}
				?>
				<li class="job-package">
					<input type="radio" <?php checked( $checked, 1 ); ?> name="job_package" value="<?php echo $product->id; ?>" id="package-<?php echo $product->id; ?>" />
					<label for="package-<?php echo $product->id; ?>"><?php echo $product->get_title(); ?></label><br/>
					<?php
						printf( _n( '%s for %d job', '%s for %s jobs', $product->get_limit(), 'wp-job-manager-wc-paid-listings' ) . ' ', $product->get_price_html(), $product->get_limit() ? $product->get_limit() : __( 'unlimited', 'wp-job-manager-wc-paid-listings' ) );

						if ( $product->get_duration() ) {
							printf( _n( 'listed for %s day', 'listed for %s days', $product->get_duration(), 'wp-job-manager-wc-paid-listings' ), $product->get_duration() );
						}

						$checked = 0;
					?>
				</li>

			<?php endforeach; ?>
		<?php endif; ?>
	</ul>
<?php else : ?>

	<p><?php _e( 'No packages found', 'wp-job-manager-wc-paid-listings' ); ?></p>

<?php endif; ?>