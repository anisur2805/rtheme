<?php

namespace Rtheme\Inc;

use Rtheme\Inc\Traits\Singleton;

class Block_Patterns {

    use Singleton;

    protected function __construct() {
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        add_action( 'init', [$this, 'register_block_patterns'] );
    }

    /**
     * Enqueue Styles
     */
    public function register_block_patterns() {
		if(function_exists('register_block_pattern')) {
			register_block_pattern(
				'rtheme/cta',
				[
					'title' => __('Call to Action', 'rtheme'),
					'description' => __('Rtheme Call to action', 'rtheme'),
					'content' => "<!-- wp:cover {\"overlayColor\":\"vivid-cyan-blue\",\"align\":\"center\"} -->
					<div class=\"wp-block-cover aligncenter has-vivid-cyan-blue-background-color has-background-dim\"><div class=\"wp-block-cover__inner-container\"><!-- wp:heading {\"textAlign\":\"center\"} -->
					<h2 class=\"has-text-align-center\">Hello there</h2>
					<!-- /wp:heading -->

					<!-- wp:paragraph {\"align\":\"center\"} -->
					<p class=\"has-text-align-center\">Some para text here...</p>
					<!-- /wp:paragraph -->

					<!-- wp:buttons -->
					<div class=\"wp-block-buttons\"><!-- wp:button -->
					<div class=\"wp-block-button\"><a class=\"wp-block-button__link\">Learn More</a></div>
					<!-- /wp:button --></div>
					<!-- /wp:buttons --></div></div>
					<!-- /wp:cover -->

					<!-- wp:columns -->
					<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"100%\"} -->
					<div class=\"wp-block-column\" style=\"flex-basis:100%\"><!-- wp:group -->
					<div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:buttons {\"align\":\"center\"} -->
					<div class=\"wp-block-buttons aligncenter\"></div>
					<!-- /wp:buttons --></div></div>
					<!-- /wp:group --></div>
					<!-- /wp:column --></div>
					<!-- /wp:columns -->"
				]
			);
		}
    }

}
