<?php

add_action( 'wp_enqueue_scripts', 'skyloft_enqueue_styles' );
function skyloft_enqueue_styles() {
    $theme = wp_get_theme();
    wp_enqueue_style( 'wp-bootstrap-starter', get_template_directory_uri() . '/style.css',
        array(),
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'skyloft', get_stylesheet_uri(),
        array( 'wp-bootstrap-starter' ),
        $theme->get('Version')
    );
}