<?php //style.css読み込み
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); }
//外部JS読み込み
//masonry
function masonry_scripts() {wp_enqueue_script( 'masonry', 'https://npmcdn.com/masonry-layout@4.0/dist/masonry.pkgd.min.js', array(), false, false );}
add_action( 'wp_enqueue_scripts', 'masonry_scripts');
//
//function _scripts() {wp_enqueue_script( '', '', array(), false, false );}
//add_action( 'wp_enqueue_scripts', '_scripts');

// remove wp version param from any enqueued scripts
function vc_remove_wp_ver_css_js( $src ) {if ( strpos( $src, 'ver=' ) )  $src = remove_query_arg( 'ver', $src );  return $src;}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
