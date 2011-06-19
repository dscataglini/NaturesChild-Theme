<?php
  /**
   * Plugin Name: Button Widget
   * Plugin URI: http://junivi.com/
   * Description: A widget to place buttons in widgets area
   * Version: 0.1
   * Author: Diego Scataglini
   * Author URI: http://diegoscataglini.com
   *
   * This program is distributed in the hope that it will be useful,
   * but WITHOUT ANY WARRANTY; without even the implied warranty of
   * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
   */

  /**
   * Add function to widgets_init that'll load our widget.
   * @since 0.1
   */
  add_action( 'widgets_init', 'example_load_widgets' );

  /**
   * Register our widget.
   * 'Example_Widget' is the widget class used below.
   *
   * @since 0.1
   */
  function example_load_widgets() {
  	register_widget( 'Button_Widget' );
  }

  /**
   * Example Widget class.
   * This class handles everything that needs to be handled with the widget:
   * the settings, form, display, and update.  Nice!
   *
   * @since 0.1
   */
  class Button_Widget extends WP_Widget {

  	/**
  	 * Widget setup.
  	 */
  	function Button_Widget() {
  		/* Widget settings. */
  		$widget_ops = array( 'classname' => 'Button', 'description' => __('A button widget that links to a page.', 'Button') );

  		/* Widget control settings. */
  		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'button-widget' );

  		/* Create the widget. */
  		$this->WP_Widget( 'button-widget', __('Button Widget', 'Button'), $widget_ops, $control_ops );
  	}

  	/**
  	 * How to display the widget on the screen.
  	 */
  	function widget( $args, $instance ) {
  		extract( $args );

  		/* Our variables from the widget settings. */
  		$title = apply_filters('widget_title', $instance['title'] );
  		$text = $instance['text'];
  		$link = $instance['url'];
  		$style = $instance['style'];

  		/* Before widget (defined by themes). */
  		echo $before_widget;

  		/* Display the widget title if one was input (before and after defined by themes). */
  		//if ( $title )
  		//	echo $before_title . $title . $after_title;

  		/* Display name from widget settings if one was input. */
  		if ( $link )
  			printf( '<a href="'. $link .'" class="button '. $style .'-btn">' . __('%1$s.', 'example') . '</a>' , $text );

  		/* After widget (defined by themes). */
  		echo $after_widget;
  	}

  	/**
  	 * Update the widget settings.
  	 */
  	function update( $new_instance, $old_instance ) {
  		$instance = $old_instance;

  		/* Strip tags for title and name to remove HTML (important for text inputs). */
  		$instance['title'] = strip_tags( $new_instance['title'] );
  		$instance['text'] = strip_tags( $new_instance['text'] );

  		/* No need to strip tags for sex and show_sex. */
  		$instance['url'] = $new_instance['url'];
  		$instance['style'] = $new_instance['style'];

  		return $instance;
  	}

  	/**
  	 * Displays the widget settings controls on the widget panel.
  	 * Make use of the get_field_id() and get_field_name() function
  	 * when creating your form elements. This handles the confusing stuff.
  	 */
  	function form( $instance ) {

  		/* Set up some default widget settings. */
  		$defaults = array( 'title' => __('Button', 'button'), 'text' => __('Contact Us', 'button'), 'url' => '/', 'style' => __('brown', 'button'),  );
  		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

  		<!-- Widget Title: Text Input -->
  		<p>
  			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hybrid'); ?></label>
  			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
  		</p>

  		<!-- Your Name: Text Input -->
  		<p>
  			<label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e('Text for the button:', 'button'); ?></label>
  			<input id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" value="<?php echo $instance['text']; ?>" style="width:100%;" />
  		</p>

  		<!-- Your Name: Text Input -->
  		<p>
  			<label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e('Landing page url:', 'button'); ?></label>
  			<input id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" value="<?php echo $instance['url']; ?>" style="width:100%;" />
  		</p>

  		<!-- Sex: Select Box -->
  		<p>
  			<label for="<?php echo $this->get_field_id( 'style' ); ?>"><?php _e('style:', 'button'); ?></label> 
  			<select id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" class="widefat" style="width:100%;">
  				<option <?php if ( 'green' == $instance['style'] ) echo 'selected="selected"'; ?>>green</option>
  				<option <?php if ( 'dark-green' == $instance['style'] ) echo 'selected="selected"'; ?>>dark-green</option>
  				<option <?php if ( 'blue' == $instance['style'] ) echo 'selected="selected"'; ?>>blue</option>
  				<option <?php if ( 'dark-blue' == $instance['style'] ) echo 'selected="selected"'; ?>>dark-blue</option>
  				<option <?php if ( 'brown' == $instance['style'] ) echo 'selected="selected"'; ?>>brown</option>
  			</select>
  		</p>


  	<?php
  	}
  }

  ?>