<?php add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles(){wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css' ); }
//masonry
function masonry_script(){wp_enqueue_script( 'masonry','//npmcdn.com/masonry-layout@4.0/dist/masonry.pkgd.min.js',array('jquery'),false,false);}
add_action('wp_enqueue_script', 'masonry_script');
//code highlight
function code_scripts(){wp_enqueue_style('code','//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.1.0/styles/default.min.css',array(),false,false);wp_enqueue_script('code', '//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.1.0/highlight.min.js',array('jquery'),false,false);}
add_action('wp_enqueue_scripts', 'code_scripts');
//テンプレ
//function _script(){wp_enqueue_script('','',array(),false,false);}
//add_action('wp_enqueue_script', '_scripts');
// hide /?ver= & emoji&error add_action
function wps_login_error() {remove_action('login_head','wp_shake_js',12);}
add_action('login_head', 'wps_login_error');
function vc_remove_wp_ver_css_js( $src ) {if ( strpos( $src, 'ver=' ) )  $src = remove_query_arg( 'ver', $src );  return $src;}
add_filter('style_loader_src','vc_remove_wp_ver_css_js',9999);
add_filter('script_loader_src','vc_remove_wp_ver_css_js',9999);
remove_action('wp_head','wp_generator');
remove_action('wp_head','print_emoji_detection_script',7);
remove_action('wp_print_styles','print_emoji_styles');
//remove標準埋め込み
add_filter('embed_oembed_discover','__return_false');
remove_action('parse_query','wp_oembed_parse_query');
remove_action('wp_head','wp_oembed_remove_discovery_links');
remove_action('wp_head','wp_oembed_remove_host_js');
//from:URL to:はてなブログカード
function url_to_hatena_blog_card($the_content) {
  if ( is_singular() ) {
    $res = preg_match_all('/^(<p>)?(<a.+?>)?https?:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+(<\/a>)?(<\/p>)?(<br ? \/>)?$/im', $the_content,$m);
    foreach ($m[0] as $match) {
      $url = strip_tags($match);
      $tag = '<iframe class="hatenablogcard" src="http://hatenablog.com/embed?url='.$url.'" frameborder="0" scrolling="no"></iframe>';
      $the_content = preg_replace('{'.preg_quote($match).'}', $tag , $the_content, 1);
    }
  }
  return $the_content;
}
add_filter('the_content','url_to_hatena_blog_card');
//from:@* to:twitter name
function twtreplace($content) {
$twtreplace = preg_replace('/([^a-zA-Z0-9-_&])@([0-9a-zA-Z_]+)/',"$1<a href=\"http://twitter.com/$2\" target=\"_blank\" rel=\"nofollow\">@$2</a>",$content);
return $twtreplace;
}
add_filter('the_content', 'twtreplace');
add_filter('comment_text', 'twtreplace');
//カレンダー短縮
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
//add keyword highlight
function wps_highlight_results($text) {
	if(is_search()){
	$sr = get_query_var('s');
	$keys = explode(" ",$sr);
	$text = preg_replace('/('.implode('|', $keys) .')/iu', '<span class="search-highlight">'.$sr.'</span>', $text);
	}
	return $text;
}
add_filter('the_title', 'wps_highlight_results');
add_filter('the_content', 'wps_highlight_results');
//add pic&© to RSS
function rss_edit($content) {
	global $post;
	if (has_post_thumbnail($post->ID)) {$img = get_the_post_thumbnail($post->ID);} else {$img = '<img src="/no-img.png" width="400" height="200" alt="' . get_the_title() . '">';}
	$content = '<p>' . $img . '</p>' . $content . '<p>&raquo; <a href="' . get_permalink($post->ID)  . '">続きを読む</a></p>' . '<p>copyrights &copy; ALL Rights Reserved ' . ' <a href="http://wkwkrnht.gegahost.net">wkwkrnht</a>.</p>';
    return $content;
}
add_filter('the_excerpt_rss', 'add_thumb_to_RSS');
add_filter('the_content_feed', 'add_thumb_to_RSS');
