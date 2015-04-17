<?php
/**
 * Price Table for WooCommerce Paid Listings
 *
 * Automatically populated with subscriptions.
 *
 * @since Jobify 1.0
 */
class Jobify_Widget_Price_Table_WC extends Jobify_Widget {

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->widget_cssclass    = 'jobify_widget_price_table_wc';
		$this->widget_description = __( 'Outputs Job Packages from WooCommerce', 'jobify' );
		$this->widget_id          = 'jobify_widget_price_table_wc';
		$this->widget_name        = __( 'Jobify - Home: WooCommerce Packages', 'jobify' );
		$this->settings           = array(
			'title' => array(
				'type'  => 'text',
				'std'   => __( 'Plans and Pricing', 'jobify' ),
				'label' => __( 'Title:', 'jobify' )
			),
			'orderby' => array(
				'label' => __( 'Order By:', 'jobify' ),
				'type' => 'select',
				'std'  => 'id',
				'options' => array(
					'id'   => __( 'ID', 'jobify' ),
					'title' => __( 'Title', 'jobify' ),
					'menu_order' => __( 'Menu Order', 'jobify' )
				)
			),
			'order' => array(
				'label' => __( 'Order:', 'jobify' ),
				'type' => 'select',
				'std'  => 'desc',
				'options' => array(
					'desc'   => __( 'DESC', 'jobify' ),
					'asc' => __( 'ASC', 'jobify' )
				)
			),
			'packages' => array(
				'label' => __( 'Package Type:', 'jobify' ),
				'type' => 'select',
				'std' => 'job_package',
				'options' => array(
					'job_package' => __( 'Job Packages', 'jobify' ),
					'resume_package' => __( 'Resume Packages', 'jobify' )
				)
			),
			'description' => array(
				'type'  => 'textarea',
				'rows'  => 4,
				'std'   => '',
				'label' => __( 'Description:', 'jobify' ),
			)
		);

		parent::__construct();
	}

	/**
	 * widget function.
	 *
	 * @see WP_Widget
	 * @access public
	 * @param array $args
	 * @param array $instance
	 * @return void
	 */
	function widget( $args, $instance ) {
		if ( $this->get_cached_widget( $args ) )
			return;

		ob_start();

		extract( $args );

		$title        = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
		$description  = $instance[ 'description' ];

		$orderby = isset( $instance[ 'orderby' ] ) ? $instance[ 'orderby' ] : 'id';
		$order = isset( $instance[ 'order' ] ) ? $instance[ 'order' ] : 'desc';
		$packages = isset( $instance[ 'packages' ] ) ? esc_attr( $instance[ 'packages' ] ) : 'job_package';

		$type = 'job_package' == $packages ? 'job_listing' : 'resume';
		$obj  = get_post_type_object( $type );

		$packages     = get_posts( array(
			'post_type'  => 'product',
			'posts_per_page' => -1,
			'tax_query'  => array(
				   'relation' => 'AND',
		        array(
		            'taxonomy' => 'product_cat',
		            'field' => 'slug',
		            'terms' => 'featured'
		        ),
				array(
					'taxonomy' => 'product_type',
					'field'    => 'slug',
					'terms'    => array( $packages, $packages . '_subscription' )
				)
			),
			'meta_query' => array(
				array(
					'key'     => '_visibility',
					'value'   => array( 'catalog', 'visible' ),
					'compare' => 'IN'
				)
			),
			'orderby' => $orderby,
			'order'   => 'ASC',
			//'order'   => $order,
			'suppress_filters' => 0
		) );
		
		$bulk     = get_posts( array(
			'post_type'  => 'product',
			'posts_per_page' => -1,
			'tax_query'  => array(
		        array(
		            'taxonomy' => 'product_cat',
		            'field' => 'slug',
		            'terms' => 'bulk'
		        )
			),
			'meta_query' => array(
				array(
					'key'     => '_visibility',
					'value'   => array( 'catalog', 'visible' ),
					'compare' => 'IN'
				)
			),
			'orderby' => $orderby,
			'order'   => 'ASC',
			//'order'   => $order,
			'suppress_filters' => 0
		) );

		if ( ! $packages || ! class_exists( 'WP_Job_Manager_WCPL' ) )
			return;

		$content = ob_get_clean();

		echo $before_widget;
		?>

		<div class="container">

			<?php if ( $title ) echo $before_title . $title . $after_title; ?>

			<?php if ( $description ) : ?>
				<p class="homepage-widget-description"><?php echo $description; ?></p>
			<?php endif; ?>

			<div class="row pricing-table-wrapper" data-columns>
				<?php foreach ( $packages as $key => $package ) : $product = get_product( $package ); ?>
					<div class="pricing-table-widget-wrapper">
						<div class="pricing-table-widget">
							<div class="pricing-table-widget-title">
								<?php echo get_post_field( 'post_title', $package ); ?>
							</div>

							<div class="pricing-table-widget-description">
								<h2><?php echo $product->get_price_html(); ?></h2>

								<p><span class="rcp_level_duration">
									<?php
										$limit = method_exists( $product, 'get_limit' ) ? $product->get_limit() : 0;
										$duration = $product->get_duration();

										echo _n(
											sprintf(
												'%1$s %2$s %3$s',
												$limit == 0 ? __( 'Unlimited', 'jobify' ) : $limit,
												$obj->labels->singular_name,
												$duration == 0 ? __( 'forever', 'jobify' ) : sprintf( 'for %d days',
												$duration )
											),
											sprintf(
												'%1$s %2$s %3$s',
												$limit == 0 ? __( 'Unlimited', 'jobify' ) : $limit,
												$obj->labels->name,
												$duration == 0 ? __( 'forever', 'jobify' ) : sprintf( 'for %d days',
												$duration )
											),
											$limit,
											'jobify'
										) . ' ';
									?>
								</span></p>

								<?php echo apply_filters( 'the_content', get_post_field( 'post_content', $product->id ) ); ?>

								<p>
									<?php
										$link 	= $product->add_to_cart_url();
										$label 	= apply_filters( 'add_to_cart_text', __( 'Add to Cart', 'jobify' ) );
									?>
									<?php if($product->id != 2265 ): ?>
										<a href="<?php echo esc_url( $link ); ?>" class="button-secondary"><?php echo $label; ?></a>
									<?php else: ?>
										<img style='width:80px;' src='http://scoot.my/wp-content/uploads/2015/02/lock.png' /><br/>
										<span style='color:#B40406'>COMING SOON!</span>
									<?php endif;?>
								</p>
							</div>
						</div>
					</div>

				<?php endforeach; ?>

			</div>
			<?php /*
			<div class='bulk_wrapper'>
				<table style="width:100%">
					  <tr>
						<td></td>
					  	<td></td>
					    <td style='text-align:center'>Price per Job</td>
					    <td style='text-align:center'>Total Savings</td>		
					    <td class='td_right'>Job Pack Prices</td>
					  </tr>
					<?php 
						$discount = array(
									0 => array('45.60','12','5'),
									1 => array('43.20', '48','10'),
									2 => array('40.80', '144','15'),
									3 => array('38.40', '480','20'),
								);
						$check = 0;
					?>
					<?php foreach ( $bulk as $key => $bulk ) : $product = get_product( $bulk ); ?>
						<?php 
							$price = $discount[$check][0]; 
							$save = $discount[$check][1];
							$disc = $discount[$check][2];
							$check++;
						?>
						<tr class='prod_row'>
									<input type='hidden' value='<?php echo $product->id; ?>' />
									<td>
										<div class="bulk-table-widget-title">
											<?php echo get_post_field( 'post_title', $bulk ); ?>
										</div>
									</td>
										<td class='content_td'>
											<?php echo apply_filters( 'the_content', get_post_field( 'post_content', $product->id ) ); ?>
										</td>
										<td style='text-align:center'>
											<?php echo "RM" . $price; ?>
										</td>
										<td style='text-align:center'>
											<?php echo "RM" . $save; ?>
										</td>
										<td class='td_right'>	
											<h2><?php echo $product->get_price_html(); ?></h2>
										</td>
											<p>
												<?php
													$link 	= $product->add_to_cart_url();
													$label 	= apply_filters( 'add_to_cart_text', __( 'Add to Cart', 'jobify' ) );
												?>
												
											</p>
						</tr>

					<?php endforeach; ?>
				</table>

			</div>
			
			<div class='pack_add'>
			<a href="" class="button-secondary">Add to Cart</a>
			</div>*/?>
			<span style='text-align:center;display:block;'>*Going on a recruitment drive? Bulk discounts are available in the Cart section.</span>
		</div>

		<?php
		echo $after_widget;

		echo $content;

		$this->cache_widget( $args, $content );
	}
}
