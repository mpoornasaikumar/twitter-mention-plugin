<?php

/**
 * Adds twitter_follow widget
 */
class twitter_follow_widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'twitterfollow_widget', // Base ID
			esc_html__( 'twitterfollow', 'twt_domain' ), // Name
			array( 'description' => esc_html__( 'Widget to display Twitter Follow', 'twt_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget']; // wwhatever you want to display before widghet(<div>, etc) 
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		// widget content output

		echo '<a href="https://twitter.com/intent/tweet?screen_name='.$instance['url'].'&ref_src=twsrc%5Etfw" class="twitter-mention-button" data-size = "'.$instance['size'].'">Tweet to @'.$instance['url'].'</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>';

		echo $args['after_widget']; // wwhatever you want to display after widghet( </div>, etc) 
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'twitterfollow', 'twt_domain' );
		

		$url = ! empty( $instance['url'] ) ? $instance['url'] : esc_html__( 'mpoornasaikumar', 'twt_domain' );
		
		$size = ! empty( $instance['size'] ) ? $instance['size'] : esc_html__( 'default', 'twt_domain' );
		?>

		<!-- TITLE -->
		<p>
		 <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
		 	<?php esc_attr_e( 'Title:', 'twt_domain' ); ?>
		 </label> 

		 <input
		  class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
		  name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
		  type="text" 
		  value="<?php echo esc_attr( $title ); ?>">
		</p>


		<!-- Profile Name -->
		<p>
		 <label for="<?php echo esc_attr( $this->get_field_id( 'url' ) ); ?>">
		 	<?php esc_attr_e( 'Screen(Profile) Name:', 'twt_domain' ); ?>
		 </label> 

		 <input
		  class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'url' ) ); ?>"
		  name="<?php echo esc_attr( $this->get_field_name( 'url' ) ); ?>" 
		  type="text" 
		  value="<?php echo esc_attr( $url ); ?>">
		</p>


		<!-- Data size -->
		<p>
      <label for="<?php echo $this->get_field_id('size'); ?>">
        <?php esc_attr_e('Display Size:', 'twt_domain'); ?>
        
      </label>
      <select id="<?php echo $this->get_field_id('size'); ?>" name="<?php echo $this->get_field_name('size'); ?>">
        <option value="default" <?php echo ($size == 'default') ? 'selected' : ''; ?>>
            Default</option>
        <option value="large"<?php echo ($size == 'large') ? 'selected' : ''; ?>>
            Large</option>
     	</select>

   			 </p>


		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

		$instance['url'] = ( ! empty( $new_instance['url'] ) ) ? sanitize_text_field( $new_instance['url'] ) : '';

		$instance['size'] = ( ! empty( $new_instance['size'] ) ) ? sanitize_text_field( $new_instance['size'] ) : '';


		return $instance;
	}

} // class Foo_Widget