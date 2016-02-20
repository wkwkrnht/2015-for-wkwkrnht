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
//ゆめぴょん流相対時間
function yumepyon_diff(){
$now_yumepyon_time = current_time('timestamp');

//投稿時とhuman_time_diffの取得
//海外サーバー仕様
//$post_yumepyon_time = get_post_time('U',true);
//$human_yumepyon_diff = human_time_diff($post_yumepyon_time);
//日本サーバー仕様
$post_yumepyon_time = get_post_time();
$human_yumepyon_diff = human_time_diff($post_yumepyon_time,$now_yumepyon_time);

//何時間後から「昨日表示」にするか
$yesterday_flag = 12;
//何日以上前からを「〜ヶ月前表示」にするか
$month_flag = 100;

$difference_sec = $now_yumepyon_time - $post_yumepyon_time;
$difference_day = floor($difference_sec / 86400);
$difference_month = date('n',$now_yumepyon_time) - date('n',$post_yumepyon_time);
$difference_year = date('Y',$now_yumepyon_time) - date('Y',$post_yumepyon_time);
$day_to_year = ceil($difference_day/30.4);
$post_weekly = date('w',$post_yumepyon_time);
$today_weekly = date('w',$now_yumepyon_time);
$difference_week = $today_weekly - $post_weekly;
$difference_weekly = array('7','8','9','10','11','12','13');
$weekly_label = array('日','月','火','水','木','金','土');
    if( date('n',$now_yumepyon_time) >= 7 && $difference_year > 0 ){
        echo "昨年".date('n',$post_yumepyon_time)."月に作成";
    }elseif( $difference_day >= $month_flag && abs($difference_month) != 6 && 12 > $day_to_year ){
        echo $day_to_year."ヶ月前に作成";
    }elseif( ( $difference_month == 6  && $difference_year == 0 ) || ( $difference_month == -6 && $difference_year == 1 ) ){
        echo "半年前に作成";
    }elseif( $difference_year > 0 ){
        echo get_the_date();
    }elseif( 3 > $difference_day && ( $difference_week == 2 || $difference_week == -5 ) ){
        echo "一昨日作成";
    }elseif( 2 > $difference_day && ( $difference_week == 1 || $difference_week == -6 ) && $difference_sec > 3600 * $yesterday_flag ){
        echo "昨日作成";
    }else{
        echo $human_yumepyon_diff."前に作成";
    }
}
//アイキャッチ自動設定（YouTube対応版）
require_once(ABSPATH . '/wp-admin/includes/image.php');
function fetch_thumbnail_image($matches, $key, $post_content, $post_id){
  $imageTitle = '';
  preg_match_all('/<\s*img [^\>]*title\s*=\s*[\""\']?([^\""\'>]*)/i', $post_content, $matchesTitle);
  if (count($matchesTitle) && isset($matchesTitle[1])) {$imageTitle = $matchesTitle[1][$key];}
  $imageUrl = $matches[1][$key];
  $filename = substr($imageUrl, (strrpos($imageUrl, '/'))+1);
  if (!(($uploads = wp_upload_dir(current_time('mysql')) ) && false === $uploads['error'])){return null;}
  $filename = wp_unique_filename( $uploads['path'], $filename );
  $new_file = $uploads['path'] . "/$filename";
  if (!ini_get('allow_url_fopen')) {
    $file_data = curl_get_file_contents($imageUrl);
  } else {
    if ( WP_Filesystem() ) {global $wp_filesystem; $file_data = @$wp_filesystem->get_contents($imageUrl);}
  }
  if (!$file_data) {return null;}
  if ( WP_Filesystem() ) {global $wp_filesystem;$wp_filesystem->put_contents($new_file, $file_data);}
  $stat = stat( dirname( $new_file ));
  $perms = $stat['mode'] & 0000666;
  @ chmod( $new_file, $perms );
  $wp_filetype = wp_check_filetype( $filename, $mimes );
  extract( $wp_filetype );
  if ( ( !$type || !$ext ) && !current_user_can( 'unfiltered_upload' ) ) {return null;}
  $url = $uploads['url'] . "/$filename";
  $attachment = array(
    'post_mime_type' => $type,
    'guid' => $url,
    'post_parent' => null,
    'post_title' => $imageTitle,
    'post_content' => '',
  );
  $thumb_id = wp_insert_attachment($attachment, $file, $post_id);
  if ( !is_wp_error($thumb_id) ) {
    wp_update_attachment_metadata( $thumb_id, wp_generate_attachment_metadata( $thumb_id, $new_file ) );
    update_attached_file( $thumb_id, $new_file );
    return $thumb_id;
  }
  return null;
}
//投稿内の最初の画像をアイキャッチに
function auto_post_thumbnail_image() {
  global $wpdb;
  global $post;
  $post_id = $post->ID;
  if (get_post_meta($post_id, '_thumbnail_id', true) || get_post_meta($post_id, 'skip_post_thumb', true)) {return;}
  $post = $wpdb->get_results("SELECT * FROM {$wpdb->posts} WHERE id = $post_id");
  $matches = array();
  preg_match_all('/<\s*img [^\>]*src\s*=\s*[\""\']?([^\""\'>]*)/i', $post[0]->post_content, $matches);
  if (empty($matches[0])) {
    preg_match('%(?:youtube\.com/(?:user/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $post[0]->post_content, $match);
    if (!empty($match[1])) {$matches=array(); $matches[0]=$matches[1]=array('http://img.youtube.com/vi/'.$match[1].'/mqdefault.jpg');}
  }
  if (count($matches)) {
    foreach ($matches[0] as $key => $image) {
      preg_match('/wp-image-([\d]*)/i', $image, $thumb_id);
      $thumb_id = $thumb_id[1];
      if (!$thumb_id) {
        $image = substr($image, strpos($image, '"')+1);
        $result = $wpdb->get_results("SELECT ID FROM {$wpdb->posts} WHERE guid = '".$image."'");
        $thumb_id = $result[0]->ID;
      }
      if (!$thumb_id) {$thumb_id = fetch_thumbnail_image($matches, $key, $post[0]->post_content, $post_id);}
      if ($thumb_id) {update_post_meta( $post_id, '_thumbnail_id', $thumb_id );break;}
    }
  }
}
add_action('save_post', 'auto_post_thumbnail_image');
add_action('draft_to_publish', 'auto_post_thumbnail_image');
add_action('new_to_publish', 'auto_post_thumbnail_image');
add_action('pending_to_publish', 'auto_post_thumbnail_image');
add_action('future_to_publish', 'auto_post_thumbnail_image');
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
//rubisuporrt
add_action( 'after_setup_theme', 'ruby_setup' );
function ruby_setup() {global $allowedposttags;foreach ( array( 'ruby', 'rp', 'rt' ) as $tag )	if ( !isset( $allowedposttags[$tag] ) ) $allowedposttags[$tag] = array();}
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
