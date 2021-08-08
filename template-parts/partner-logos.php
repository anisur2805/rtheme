<?php

$main_section_id = "rtheme_logos_section";
$logo_names      = [
    'Logo One'   => 'logo_one',
    'Logo Two'   => 'logo_two',
    'Logo Three' => 'logo_three',
    'Logo Four'  => 'logo_four',
    'Logo Five'  => 'logo_five',
    'Logo Six'   => 'logo_six',
];

?>

<div class="partner-logos">
    <div class="container">
        <div class="customRow">
            <?php
                foreach ( $logo_names as $logo_label => $logo_name ) {
                    $setting_id = sprintf( 'rtheme_%s', $logo_name );
                    // var_dump($setting_id);
                    // die();
                    $logo_url   = get_theme_mod( $setting_id );
                    if ( !empty( $logo_url ) ) { ?>
                    <div class="customCol">
                        <img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_html( $logo_label ); ?>" />
                    </div>
                    <?php
                    }
                }
            ?>
        </div>
    </div>
</div>