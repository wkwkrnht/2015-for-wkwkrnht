<?php //style.css読み込み
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); }
//<script src="https://npmcdn.com/masonry-layout@4.0/dist/masonry.pkgd.min.js"></script>
