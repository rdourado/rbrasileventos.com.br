<?php

// My Functions

function url()
{
	echo get_template_directory_uri() . '/';
}

function email()
{
	echo antispambot( get_bloginfo( 'admin_email' ) );
}

function image( $field, $size = 'large', $attr = null )
{
	$field = is_array( $field ) ? $field['ID'] : $field;
	echo wp_get_attachment_image( $field, $size, null, $attr );
}

function tag( $str, $open, $close, $replace_open, $replace_close )
{
	$str = str_replace( $open, $replace_open, $str );
	$str = str_replace( $close, $replace_close, $str );
	echo $str;
}

function my_field( $field, $before = '', $after = '' )
{
	global $post;
	$value = get_field( $field );
	if ( $value ) {
		if ( stristr( $before, '$1' ) ) {
			echo str_replace( '$1', $value, $before ) . $after;
		} else {
			echo $before . $value . $after;
		}
	}
}

function shape( $index = 4 )
{
	$shapes = array(
		'w2x h3x',
		'w4x h2x',
		'',
		'',
		'w2x h2x',
		'w3x h2x',
		'w2x',
		'w2x h3x',
		'w4x h2x',
		'',
		'',
		'w2x h2x',
		'w3x h2x',
		'w2x'
	);
	echo $shapes[ $index ];
}

// Setup

add_action( 'after_setup_theme', 'my_setup' );
add_action( 'wp_enqueue_scripts', 'my_scripts' );
add_action( 'admin_menu', 'remove_menus' );

function my_setup()
{
	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails', array( 'post' ) );
	set_post_thumbnail_size(   300, 300, true );
	add_image_size( 'avatar',  224, 224, true );
	add_image_size( 'brand',   200, 200, false );
	add_image_size( 'gallery', 600, 600, false );

	register_nav_menus( array(
		'primary' => __('Menu', 'rbrasil'),
	) );

	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	// add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', my_fonts_url() ) );

	if ( function_exists( 'acf_add_options_page' ) ) {
		acf_add_options_page( array(
			'page_title' => 'Opções',
			'position'   => 21,
			'menu_slug'  => 'acf-options',
			'redirect'   => true,
		) );
		acf_add_options_sub_page( array(
			'page_title' 	=> 'Redes Sociais',
			'menu_title'	=> 'Redes Sociais',
			'parent_slug'	=> 'acf-options',
		) );
		acf_add_options_sub_page( array(
			'page_title' 	=> 'Localização',
			'menu_title'	=> 'Localização',
			'parent_slug'	=> 'acf-options',
		) );
	}
}

function my_scripts()
{
	global $post;

	// CSS
	wp_enqueue_style( 'my-css', get_template_directory_uri() . '/css/screen.css', array(), filemtime( TEMPLATEPATH . '/css/screen.css' ) );
	wp_enqueue_style( 'fancy-css', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.css', array(), '2.1.5' );

	// jQuery
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', '//code.jquery.com/jquery-1.11.3.min.js', false, null, true );
	wp_enqueue_script( 'jquery' );

	// JS
	wp_enqueue_script( 'gmaps', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', array(), null, true );
	wp_enqueue_script( 'fancy-js', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.pack.js', array( 'jquery' ), '2.1.5', true );
	wp_enqueue_script( 'my-js', get_template_directory_uri() . '/js/scripts.js', array( 'jquery', 'fancy-js', 'gmaps' ), filemtime( TEMPLATEPATH . '/js/scripts.js' ), true );
}

function remove_menus()
{
	global $menu;
	$restricted = array( __('Tools'), __('Comments') );
	end( $menu );
	while ( prev( $menu ) ) {
		$value = explode( ' ', $menu[key( $menu )][0] );
		if ( in_array( $value[0] != NULL ? $value[0] : "" , $restricted ) ) {
			unset( $menu[key( $menu )] );
		}
	}
}
