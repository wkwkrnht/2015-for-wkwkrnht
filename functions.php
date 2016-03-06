<?php add_action('wp_enqueue_scripts','theme_enqueue_styles');function theme_enqueue_styles(){wp_enqueue_style('parent-style',get_template_directory_uri().'/style.css' );}
//外部スクリプト読み込み
function swiper_Initialize_script(){wp_enqueue_script('swiper_Initialize','get_template_directory_uri()./inc/swiper-local.js',array(),false,false);}
add_action('wp_enqueue_script','swiper_Initialize_script');
function toc_script(){wp_enqueue_script('toc','get_template_directory_uri()./parts/toc.min.js',array(),false,false);}
add_action('wp_enqueue_script','toc_scripts');
function swiper_scripts(){wp_enqueue_script('swiper','//cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.min.js',array(),false,false);wp_enqueue_style('swiper','//cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css',array(),false,false);}
add_action('wp_enqueue_script','swiper_scripts');
function code_scripts(){wp_enqueue_style('code','//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.1.0/styles/default.min.css',array(),false,false);wp_enqueue_script('code', '//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.1.0/highlight.min.js',array('jquery'),false,false);}
add_action('wp_enqueue_scripts','code_scripts');
/*function _script(){wp_enqueue_script('','',array(),false,false);}
add_action('wp_enqueue_script','_scripts');*/
// hide /?ver= & emoji&error add_action & 標準埋め込み
function wps_login_error() {remove_action('login_head','wp_shake_js',12);}
add_action('login_head', 'wps_login_error');
function vc_remove_wp_ver_css_js($src){if(strpos($src,'ver='))$src = remove_query_arg('ver',$src);return $src;}
add_filter('style_loader_src','vc_remove_wp_ver_css_js',9999);
add_filter('script_loader_src','vc_remove_wp_ver_css_js',9999);
remove_action('wp_head','wp_generator');
remove_action('wp_head','print_emoji_detection_script',7);
remove_action('wp_print_styles','print_emoji_styles');
add_filter('embed_oembed_discover','__return_false');
remove_action('parse_query','wp_oembed_parse_query');
remove_action('wp_head','wp_oembed_remove_discovery_links');
remove_action('wp_head','wp_oembed_remove_host_js');
//twentyfifteen_entry_meta
function twentyfifteen_entry_meta(){
  //「この投稿を先頭に固定表示」にチェックして投稿すると上部に表示される
  if(is_sticky()&&is_home()&& !is_paged()){printf('<span class="sticky-post">%s</span>',__('Featured','twentyfifteen'));}
  //画像サイズ(横 x 縦)表示
  if(is_attachment() && wp_attachment_is_image()){$metadata = wp_get_attachment_metadata();printf('<span class="full-size-link"><span class="screen-reader-text">%1$s</span><a href="%2$s">%3$s &times;%4$s</a></span>',_x('Full size','Used before full size attachment link.','twentyfifteen'),esc_url(wp_get_attachment_url()),$metadata['width'],$metadata['height']);}
  //「投稿日」・「更新日」
  if(in_array(get_post_type(),array('post','attachment'))){
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if(get_the_time('U')!== get_the_modified_time('U')){$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';}
      $time_string = sprintf($time_string,esc_attr(get_the_date('c')),get_the_date(),esc_attr(get_the_modified_date('c')),get_the_modified_date());
      printf('<span class="posted-on"><span class="screen-reader-text">%1$s</span><a href="%2$s" rel="bookmark">%3$s</a></span>',_x('Posted on','Used before publish date.','twentyfifteen'),esc_url(get_permalink()),$time_string);
      echo('（');echo yumepyon_diff();echo('）');
  }
  //投稿者|カテゴリー|タグ(順同)
  if('post' == get_post_type()){
    if(is_singular()||is_multi_author()){printf('<span class="byline"><span class="author vcard"><span class="screen-reader-text">%1$s</span><a class="url fn n" href="%2$s">%3$s</a></span></span>',_x('Author','Used before post author name.','twentyfifteen'),esc_url(get_author_posts_url(get_the_author_meta('ID'))),get_the_author());}
    $categories_list = get_the_category_list(_x(',','Used between list items,there is a space after the comma.','twentyfifteen'));
    if($categories_list && twentyfifteen_categorized_blog()){printf('<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',_x('Categories','Used before category names.','twentyfifteen'),$categories_list);}
    $tags_list = get_the_tag_list('',_x(',','Used between list items,there is a space after the comma.','twentyfifteen'));
    if($tags_list){printf('<span class="tags-links"><span class="screen-reader-text">%1$s</span>%2$s</span>',_x('Tags','Used before tag names.','twentyfifteen'),$tags_list);}
  }
  //"コメントをどうぞ"、"n件のコメント"表示
  if(!is_single() && !post_password_required() && (comments_open() || get_comments_number())){
    echo'<span class="comments-link">';
    comments_popup_link(__('Leave a comment','twentyfifteen'),__('1 Comment','twentyfifteen' ),__('% Comments','twentyfifteen'));
    echo'</span>';
  }
}
//Alt属性がないIMGタグにalt=""を追加する
add_filter('the_content',function($content){return preg_replace('/<img((?![^>]*alt=)[^>]*)>/i','<img alt=""${1}>',$content);});
//ゆめぴょん流相対時間
function yumepyon_diff(){$now_yumepyon_time = current_time('timestamp');
//投稿時とhuman_time_diffの取得
//海外サーバー仕様
//$post_yumepyon_time = get_post_time('U',true);
//$human_yumepyon_diff = human_time_diff($post_yumepyon_time);
//日本サーバー仕様
$post_yumepyon_time = get_post_time();
$human_yumepyon_diff = human_time_diff($post_yumepyon_time,$now_yumepyon_time);
$yesterday_flag = 18;
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
    if(date('n',$now_yumepyon_time) >= 7 && $difference_year > 0){
        echo "昨年".date('n',$post_yumepyon_time)."月に作成";
    }elseif($difference_day >= $month_flag && abs($difference_month) != 6 && 12 > $day_to_year ){
        echo $day_to_year."ヶ月前に作成";
    }elseif(($difference_month == 6  && $difference_year == 0) || ($difference_month == -6 && $difference_year == 1 ) ){
        echo "半年前に作成";
    }elseif($difference_year > 0){echo get_the_date();
    }elseif(3>$difference_day && ($difference_week == 2 || $difference_week == -5)){echo "一昨日作成";
    }elseif(2>$difference_day && ($difference_week == 1 || $difference_week == -6) && $difference_sec>3600*$yesterday_flag){echo "昨日作成";
    }else{echo $human_yumepyon_diff."前に作成";}}
//カスタムフィールド追加
add_action('admin_menu','add_custom_fields');
add_action('save_post','save_custom_fields');
function add_custom_fields(){add_meta_box('my_sectionid','カスタムフィールド','my_custom_fields','post');}
function my_custom_fields(){global $post;
  $meta_keywords = get_post_meta($post->ID,'meta_keywords',true);
  $noindex = get_post_meta($post->ID,'noindex',true);
  if($noindex==1){ $noindex_c="checked";}
  else{$noindex_c= "/";}
  echo'<p>チェックするとnoindexに<br/><input type="checkbox" name="noindex" value="1" ' . $noindex_c . '>noindex</p>';
  echo'<p>meta keyword設定(カンマ区切りで2〜6つまで)<br/><input type="text" name="meta_keywords" value="'.esc_html($meta_keywords).'" size="40"/></p>';}
function save_custom_fields($post_id){if(!empty($_POST['meta_keywords']))update_post_meta($post_id,'meta_keywords',$_POST['meta_keywords'] );else delete_post_meta($post_id,'meta_keywords');if(!empty($_POST['noindex']))update_post_meta($post_id,'noindex',$_POST['noindex']);else delete_post_meta($post_id,'noindex');}
//アイキャッチ自動設定（YouTube対応版）
require_once(ABSPATH . '/wp-admin/includes/image.php');
function fetch_thumbnail_image($matches, $key, $post_content, $post_id){
  $imageTitle = '';
  preg_match_all('/<\s*img [^\>]*title\s*=\s*[\""\']?([^\""\'>]*)/i', $post_content, $matchesTitle);
  if (count($matchesTitle) && isset($matchesTitle[1])) {$imageTitle = $matchesTitle[1][$key];}
  $imageUrl = $matches[1][$key];
  $filename = substr($imageUrl, (strrpos($imageUrl, '/'))+1);
  if (!(($uploads = wp_upload_dir(current_time('mysql')) ) && false === $uploads['error'])){return null;}
  $filename = wp_unique_filename($uploads['path'],$filename);
  $new_file = $uploads['path'] . "/$filename";
  if(!ini_get('allow_url_fopen')){
    $file_data = curl_get_file_contents($imageUrl);
  }else{if(WP_Filesystem()){global $wp_filesystem; $file_data = @$wp_filesystem->get_contents($imageUrl);}}
  if(!$file_data){return null;}
  if(WP_Filesystem()){global $wp_filesystem;$wp_filesystem->put_contents($new_file, $file_data);}
  $stat = stat(dirname($new_file));
  $perms = $stat['mode'] & 0000666;
  @ chmod($new_file,$perms );
  $wp_filetype = wp_check_filetype($filename,$mimes);
  extract($wp_filetype);
  if ( ( !$type || !$ext ) && !current_user_can( 'unfiltered_upload' ) ) {return null;}
  $url = $uploads['url'] . "/$filename";
  $attachment = array(
    'post_mime_type' => $type,
    'guid' => $url,
    'post_parent' => null,
    'post_title' => $imageTitle,
    'post_content' => '',);
  $thumb_id = wp_insert_attachment($attachment,$file,$post_id);
  if(!is_wp_error($thumb_id)){
    wp_update_attachment_metadata($thumb_id,wp_generate_attachment_metadata($thumb_id,$new_file));
    update_attached_file($thumb_id,$new_file);
    return $thumb_id;}
  return null;}
function auto_post_thumbnail_image(){
  global $wpdb;
  global $post;
  $post_id = $post->ID;
  if(get_post_meta($post_id,'_thumbnail_id',true) || get_post_meta($post_id, 'skip_post_thumb', true)) {return;}
  $post = $wpdb->get_results("SELECT * FROM {$wpdb->posts} WHERE id = $post_id");
  $matches = array();
  preg_match_all('/<\s*img [^\>]*src\s*=\s*[\""\']?([^\""\'>]*)/i', $post[0]->post_content, $matches);
  if(empty($matches[0])){
    preg_match('%(?:youtube\.com/(?:user/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $post[0]->post_content, $match);
    if(!empty($match[1])){$matches=array(); $matches[0]=$matches[1]=array('http://img.youtube.com/vi/'.$match[1].'/mqdefault.jpg');}}
  if(count($matches)){
    foreach ($matches[0] as $key => $image){
      preg_match('/wp-image-([\d]*)/i', $image, $thumb_id);
      $thumb_id = $thumb_id[1];
      if(!$thumb_id){
        $image = substr($image, strpos($image, '"')+1);
        $result = $wpdb->get_results("SELECT ID FROM {$wpdb->posts} WHERE guid = '".$image."'");
        $thumb_id = $result[0]->ID;}
      if (!$thumb_id) {$thumb_id = fetch_thumbnail_image($matches, $key, $post[0]->post_content, $post_id);}
      if ($thumb_id) {update_post_meta( $post_id, '_thumbnail_id', $thumb_id );break;}
    }
  }
}
add_action('save_post','auto_post_thumbnail_image');
add_action('draft_to_publish','auto_post_thumbnail_image');
add_action('new_to_publish','auto_post_thumbnail_image');
add_action('pending_to_publish','auto_post_thumbnail_image');
add_action('future_to_publish','auto_post_thumbnail_image');
//from:URL to:はてなブログカード
function url_to_hatena_blog_card($the_content){
  if(is_singular()){
    $res = preg_match_all('/^(<p>)?(<a.+?>)?https?:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+(<\/a>)?(<\/p>)?(<br ? \/>)?$/im', $the_content,$m);
    foreach ($m[0] as $match){
      $url = strip_tags($match);
      $tag = '<iframe class="hatenablogcard" src="http://hatenablog.com/embed?url='.$url.'" frameborder="0" scrolling="no"></iframe>';
      $the_content = preg_replace('{'.preg_quote($match).'}', $tag , $the_content, 1);}}return $the_content;}
add_filter('the_content','url_to_hatena_blog_card');
//from:@* to:twitter name
function twtreplace($content){$twtreplace = preg_replace('/([^a-zA-Z0-9-_&])@([0-9a-zA-Z_]+)/',"$1<a href=\"http://twitter.com/$2\" target=\"_blank\" rel=\"nofollow\">@$2</a>",$content);return $twtreplace;}
add_filter('the_content','twtreplace');
add_filter('comment_text','twtreplace');
//カテゴリー説明文をメタ化
function get_meta_description_from_category(){$cate_desc = trim(strip_tags(category_description()));if ($cate_desc){return $cate_desc;}$cate_desc = '「' . single_cat_title('', false) . '」の記事一覧です。' . get_bloginfo('description');return $cate_desc;}
function get_meta_keyword_from_category(){return single_cat_title('', false) . ',ブログ,記事一覧';}
function get_mtime($format){$mtime = get_the_modified_time('Ymd');$ptime = get_the_time('Ymd');if ($ptime > $mtime){return get_the_time($format);}elseif($ptime === $mtime){return null;}else{return get_the_modified_time($format);}}
//add keyword highlight & ルビサポート
function wps_highlight_results($text){
	if(is_search()){
	$sr = get_query_var('s');
	$keys = explode(" ",$sr);
	$text = preg_replace('/('.implode('|', $keys) .')/iu','<span class="search-highlight">'.$sr.'</span>', $text);}
	return $text;}
add_filter('the_title','wps_highlight_results');
add_filter('the_content','wps_highlight_results');
add_action('after_setup_theme','ruby_setup');
function ruby_setup(){global $allowedposttags;foreach(array('ruby','rp','rt') as $tag )	if(!isset($allowedposttags[$tag]))$allowedposttags[$tag] = array();}
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
    if(($currentMonth == $month) AND ($currentYear == $year)){$linkYear = sprintf($yearHtml, $year);
    }else{if((intval($month) == 12) AND ($currentYear != $year)){$linkYear = '<br />'.sprintf($yearHtml, $year);}}
    return sprintf($linkString, $linkYear, $ym[1]);}
add_filter('get_archives_link','my_archives_link');
//add pic&© to RSS
function rss_edit($content){
	global $post;
	if (has_post_thumbnail($post->ID)) {$img = get_the_post_thumbnail($post->ID);} else {$img = '<img src="/no-img.png" width="400" height="200" alt="' . get_the_title() . '">';}
	$content = '<p>' . $img . '</p>' . $content . '<p>&raquo; <a href="' . get_permalink($post->ID)  . '">続きを読む</a></p>' . '<p>copyrights &copy; ALL Rights Reserved ' . ' <a href="http://wkwkrnht.gegahost.net">wkwkrnht</a>.</p>';
    return $content;}
add_filter('the_excerpt_rss', 'add_thumb_to_RSS');
add_filter('the_content_feed', 'add_thumb_to_RSS');
// テーマカスタマイザーにロゴアップロード設定機能追加
define('LOGO_SECTION','logo_section');
define('LOGO_IMAGE_URL','logo_image_url');
function themename_theme_customizer($wp_customize){$wp_customize->add_section(LOGO_SECTION,array('title' => 'ロゴ画像','priority' => 30,'description' => 'サイトのロゴ設定。',));$wp_customize->add_setting(LOGO_IMAGE_URL);$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,LOGO_IMAGE_URL,array('label' => 'ロゴ','section' => LOGO_SECTION,'settings' => LOGO_IMAGE_URL,'description' => '画像をアップロードするとヘッダーにあるデフォルトのサイト名と入れ替わります。',)));}
add_action( 'customize_register','themename_theme_customizer');
function get_the_logo_image_url(){return esc_url(get_theme_mod(LOGO_IMAGE_URL));}
//投稿記事一覧にアイキャッチ画像を表示
function customize_admin_manage_posts_columns($columns){$columns['thumbnail'] = __('Thumbnail');return $columns;}
function customize_admin_add_column($column_name,$post_id){if('thumbnail' == $column_name){$thum = get_the_post_thumbnail($post_id,array(100,100));}if(isset($thum) && $thum){echo $thum;}}
add_filter('manage_posts_columns','customize_admin_manage_posts_columns');
add_action('manage_posts_custom_column','customize_admin_add_column',10,2);