<?php
/**
 * Clock Widget
 *
 * @package Rtheme
 */

namespace Rtheme\Inc;

use Rtheme\Inc\Traits\Singleton;
use WP_Widget;

class Clock_Widget extends WP_Widget {

    use Singleton;

    public function __construct() {

        parent::__construct(
            'clock_widget', // Base ID
            'Clock', // Name
			['description' => __('Clock Widget', 'rtheme')]
        );

    }

    public $args = array(
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
        'before_widget' => '<div class="widget-wrap">',
        'after_widget'  => '</div></div>',
    );

    public function widget( $args, $instance ) {

        echo $args['before_widget'];

        if ( !empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        echo '<div class="textwidget">';

        echo esc_html__( $instance['text'], 'rtheme' );

        echo '</div>';

		?>
		<section class="card">
			<div class="clock card-body">
				<span id="time"></span>
				<span id="ampm"></span>
				<span id="time-emoji"></span>
			</div>
		</section>
		<?php

        echo $args['after_widget'];

    }

    public function form( $instance ) {

        $title = !empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'rtheme' );
        $text  = !empty( $instance['text'] ) ? $instance['text'] : esc_html__( '', 'rtheme' );
        ?>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'rtheme' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <!-- <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'Text' ) ); ?>"><?php echo esc_html__( 'Text:', 'rtheme' ); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text" cols="30" rows="10"><?php echo esc_attr( $text ); ?></textarea>
        </p> -->
        <?php

    }

    public function update( $new_instance, $old_instance ) {

        $instance = array();

        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['text']  = ( !empty( $new_instance['text'] ) ) ? $new_instance['text'] : '';

        return $instance;
    }

}
