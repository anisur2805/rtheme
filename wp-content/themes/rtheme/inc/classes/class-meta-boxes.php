<?php

namespace Rtheme\Inc;

use Rtheme\Inc\Traits\Singleton;

class Meta_Boxes {

    use Singleton;

    protected function __construct() {
        $this->setup_hooks();
    }

    protected function setup_hooks() {
		add_action( 'add_meta_boxes', [$this, 'register_metabox'] );
		add_action( 'save_post', [$this, 'save_post_data'] );
    }

    public function register_metabox( $post ) {
        $screens = ['post'];
        foreach ( $screens as $screen ) {
            add_meta_box(
                'hide_post_title', // Unique ID
                __( 'Hide Post Title', 'rtheme' ), // Box title
                [$this, 'hide_post_title_html'], // Content callback, must be of type callable
                $screen, // Post type
                'side'
            );
        }

    }

    public function hide_post_title_html( $post ) {

		wp_nonce_field( plugin_basename( __FILE__ ) , 'hide_title_nonce');

		$value = get_post_meta( $post->ID, '_hide_post_title', true );

        ?>
		<label for="hide_title_field" style="margin-bottom: 10px;display: block;"><?php esc_html_e( 'Hide Post Title', 'rtheme' );?> </label>
		<select name="hide_title_field" id="hide_title_field" class="postbox">
			<option value=""><?php esc_html_e( 'Select Option', 'rtheme' );?></option>
			<option value="yes" <?php selected( $value, 'yes' );?>><?php esc_html_e( 'Yes', 'rtheme' );?></option>
			<option value="no" <?php selected( $value, 'no' );?>><?php esc_html_e( 'No', 'rtheme' );?></option>
		</select>

		<?php
	}

	public function save_post_data( $post_id ) {

		if( ! isset( $_POST['hide_title_nonce'] ) || ! wp_verify_nonce( $_POST['hide_title_nonce'], plugin_basename( __FILE__ ) )) return;

		if ( array_key_exists( 'hide_title_field', $_POST ) ) {
			update_post_meta(
				$post_id,
				'_hide_post_title',
				$_POST['hide_title_field']
			);
		}
	}

}
