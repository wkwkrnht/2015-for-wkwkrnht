<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); }
//masonry
function masonry_scripts() {wp_enqueue_script( 'masonry', 'https://npmcdn.com/masonry-layout@4.0/dist/masonry.pkgd.min.js', array(), false, false );}
add_action( 'wp_enqueue_scripts', 'masonry_scripts');
//テンプレ
//function _scripts() {wp_enqueue_script( '', '', array(), false, false );}
//add_action( 'wp_enqueue_scripts', '_scripts');
// hide /?ver= & emoji
function vc_remove_wp_ver_css_js( $src ) {if ( strpos( $src, 'ver=' ) )  $src = remove_query_arg( 'ver', $src );  return $src;}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
remove_action('wp_head', 'wp_generator');
remove_action( ‘wp_head’, ‘print_emoji_detection_script’, 7 );
remove_action( ‘wp_print_styles’, ‘print_emoji_styles’ );
//sitemap
function simple_sitemap(){
  global $wpdb;
  $args = array('depth'        => 0,
    'show_date'    => NULL,
    'date_format'  => get_option('date_format'),
    'child_of'     => 0,
    'exclude'      => NULL,
    'include'      => NULL,
    'title_li'           => '<span class="pagemap">固定ページの一覧</span>',
    'echo'         => 1,
    'authors'      => NULL,
    'sort_column'  => 'menu_order, post_title',
    'link_before'  => NULL,
    'link_after'   => NULL,
    'exclude_tree' => NULL );
  echo '<div id="sitemap"><ul>';
    wp_list_pages($args);
  echo '</ul>';
  $args = array('show_option_all'    => NULL,
    'orderby'            => 'name',
    'order'              => 'ASC',
    'show_last_update'   => 0,
    'style'              => 'list',
    'show_count'         => 0,
    'hide_empty'         => 1,
    'use_desc_for_title' => 1,
    'child_of'           => 0,
    'feed'               => NULL,
    'feed_type'          => NULL,
    'feed_image'         => NULL,
    'exclude'            => NULL,
    'exclude_tree'       => NULL,
    'include'            => NULL,
    'hierarchical'       => true,
    'title_li'           => '<span class="catmap">記事カテゴリ</span>',
    'number'             => NULL,
    'echo'               => 1,
    'depth'              => 0,
    'current_category'   => 0,
    'pad_counts'         => 0,
    'taxonomy'           => 'category',
    'walker'             => 'Walker_Category' );
        echo '<ul>';
     echo wp_list_categories( $args );
     echo '</ul>';
  echo '</div>';
}
add_shortcode('sitemap', 'simple_sitemap');
// ウィジェットアーカイブを短く表示させます
function my_archives_link($link_html){
    $currentMonth = date('n');
    $currentYear = date('Y');
    $ym = explode('年', $link_html);
    $monthArray = explode('月', $ym[1]);
    $month = $monthArray[0];
    $year = intval(strip_tags($ym[0]));
    $linkMonth = substr('0'.$month, -2);
    $url = site_url('/').$year.'/'.$linkMonth.'/';
    $linkString = '%s<a href="'.$url.'" style="white-space: nowrap;">%s</a>'.
    $linkYear = '';
    $yearHtml = '<span style="font-weight:bold;">%s</span><br />';
    if (($currentMonth == $month) AND ($currentYear == $year)){
        $linkYear = sprintf($yearHtml, $year);
    } else {
        if ((intval($month) == 12) AND ($currentYear != $year)){
            $linkYear = '<br />'.sprintf($yearHtml, $year);
        }
    }
    return sprintf($linkString, $linkYear, $ym[1]);
}
add_filter('get_archives_link', 'my_archives_link');
