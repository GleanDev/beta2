<?php
/**
 * Callout
 *
 * @since Jobify 1.0
 */
class Jobify_Widget_Callout extends Jobify_Widget {

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->widget_cssclass    = 'jobify_widget_callout';
		$this->widget_description = __( 'Display call-out area with a bit of text and a button.', 'jobify' );
		$this->widget_id          = 'jobify_widget_callout';
		$this->widget_name        = __( 'Jobify - Home: Callout', 'jobify' );
		$this->settings           = array(
			'description' => array(
				'type'  => 'textarea',
				'rows'  => 4,
				'std'   => null,
				'label' => __( 'Description left:', 'jobify' ),
			),
			'title' => array(
				'type'  => 'text',
				'std'   => 'Learn More',
				'label' => __( 'Button Label left:', 'jobify' )
			),
			'button-url' => array(
				'type'  => 'text',
				'std'   => null,
				'label' => __( 'Button URL left:', 'jobify' )
			),

			'description2' => array(
				'type'  => 'textarea',
				'rows'  => 4,
				'std'   => null,
				'label' => __( 'Description right:', 'jobify' ),
			),
			'title2' => array(
				'type'  => 'text',
				'std'   => 'Learn More',
				'label' => __( 'Button Label right:', 'jobify' )
			),
			'button-url2' => array(
				'type'  => 'text',
				'std'   => null,
				'label' => __( 'Button URL right:', 'jobify' )
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

		$button_label = isset ( $instance[ 'title' ] ) ? $instance[ 'title' ] : null;
		$button_url   = $instance[ 'button-url' ];
		$description  = $instance[ 'description' ];

		$button_label2 = isset ( $instance[ 'title2' ] ) ? $instance[ 'title2' ] : null;
		$button_url2   = $instance[ 'button-url2' ];
		$description2  = $instance[ 'description2' ];

		echo $before_widget;
		?>

			<div class="callout container">
				<div class='left_side'>
					<div class="callout-description">
						<?php echo wpautop( $description ); ?>
					</div>

					<?php if ( '' != $button_label ) : ?>
					<div class="callout-action">
						<a href="<?php echo esc_url( $button_url ); ?>" class="button"><?php echo esc_attr( $button_label ); ?></a>
					</div>
					<?php endif; ?>
				</div>


				<div class='right_side'>
				<script>
				jQuery(document).ready(function($){
					$('.callout_sign_up').click(function(e){
						e.preventDefault();
						$('#register-modal a').click();
					});
				});
				</script>
					<div class="callout-description">
						<?php echo wpautop( $description2 ); ?>
					</div>

					<?php if ( '' != $button_label2 ) : ?>
					<div class="callout-action callout_sign_up">
						<a href="<?php echo esc_url( $button_url2 ); ?>" class="button"><?php echo esc_attr( $button_label2 ); ?></a>
					</div>
					<?php endif; ?>
				</div>
			</div>

		<?php
		echo $after_widget;

		$content = apply_filters( 'jobify_widget_callout', ob_get_clean(), $instance, $args );

		echo $content;

		$this->cache_widget( $args, $content );
	}
}