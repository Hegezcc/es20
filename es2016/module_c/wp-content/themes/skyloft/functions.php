<?php

@ini_set( 'upload_max_size' , '32M' );
@ini_set( 'post_max_size', '32M');
@ini_set( 'max_execution_time', '300' );

add_filter( 'upload_size_limit', 'increase_upload' );

function increase_upload( $bytes )
{
	return 33554432; // 32 megabytes
}

add_action( 'wp_enqueue_scripts', 'skyloft_enqueue_styles' );
function skyloft_enqueue_styles() {
	$parenthandle = 'zacklive-style';
	$theme = wp_get_theme();
	wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css',
		array(),
		$theme->parent()->get('Version')
	);

	wp_enqueue_style( 'skyloft-style', get_stylesheet_uri(),
		array( $parenthandle ),
		$theme->get('Version')
	);
}