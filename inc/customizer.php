<?php

add_action( 'customize_register', 'logos_register' );
function logos_register( $wp_customize ) {
    $main_section_id = "rtheme_logos_section";
    
    $wp_customize->add_section( $main_section_id, array(
        'title'       => __( 'Logos Section', 'rtheme' ),
        'description' => '',
        'priority'    => 120,
    ) );

    $logo_names = [
        'Logo One' => 'logo_one',
        'Logo Two' => 'logo_two',
        'Logo Three' => 'logo_three',
        'Logo Four' => 'logo_four',
        'Logo Five' => 'logo_five',
        'Logo Six' => 'logo_six',
    ];
    
    foreach($logo_names as $logo_name => $logo_label) {
        $setting_id = sprintf('rtheme_%s', $logo_name);
        $wp_customize->add_setting($setting_id);

        $wp_customize->add_control(  new WP_Customize_Image_Control($wp_customize, $setting_id, array(
            'label'    => esc_html(__( $logo_label, 'rtheme')),
            'section'  =>  $main_section_id,
            'settings' => $setting_id
        )));
    }
}
