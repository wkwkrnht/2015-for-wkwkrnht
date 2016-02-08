<?php add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); }
//masonry
function masonry_script() {wp_enqueue_script( 'masonry', '//npmcdn.com/masonry-layout@4.0/dist/masonry.pkgd.min.js', array('jquery'), false, false );}
add_action( 'wp_enqueue_script', 'masonry_script');
//code highlight
function code_scripts() {wp_enqueue_style( 'code', '//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.1.0/styles/default.min.css', array(), false, false );
  wp_enqueue_script( 'code', '//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.1.0/highlight.min.js', array('jquery'), false, false );}
add_action( 'wp_enqueue_scripts', 'code_scripts');
//テンプレ
//function _script() {wp_enqueue_script( '', '', array(), false, false );}
//add_action( 'wp_enqueue_script', '_scripts');
// hide /?ver= & emoji&error add_action
function wps_login_error() {remove_action('login_head', 'wp_shake_js', 12);}
add_action('login_head', 'wps_login_error');
function vc_remove_wp_ver_css_js( $src ) {if ( strpos( $src, 'ver=' ) )  $src = remove_query_arg( 'ver', $src );  return $src;}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
remove_action('wp_head', 'wp_generator');
remove_action( ‘wp_head’, ‘print_emoji_detection_script’, 7 );
remove_action( ‘wp_print_styles’, ‘print_emoji_styles’ );
//remove標準埋め込み
add_filter( 'embed_oembed_discover', '__return_false' );
remove_action( 'parse_query', 'wp_oembed_parse_query' );
remove_action( 'wp_head', 'wp_oembed_remove_discovery_links' );
remove_action( 'wp_head', 'wp_oembed_remove_host_js' );
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
//add:breadlist
function the_bread( $query = true ){
    if( is_archive()){
        $cate = get_queried_object();
    }else if( is_single() ){
        $cate = get_the_category();
        $cate = $cate[0];
    }
    $queried_object = get_queried_object();
    $current = array( "name"=>$cate->name , "term_id"=>$cate->term_id );
    $parents = array();
    echo '<ol class="bread clearfix" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">';
    if( is_home() ){
        //トップページの場合にはリンクを表示させない
        echo '<li>TOP</li>';
    }elseif( is_search() ){
        $search_query =  get_search_query();
        echo '<li><a href="' . home_url() . '/" itemprop="url"><span itemprop="title">TOP</span></a></li><li>'. $search_query .'の検索結果</li>';
    }elseif( is_page() ){
        //固定ページの処理
        echo '<li><a href="' . home_url() . '/" itemprop="url"><span itemprop="title">TOP</span></a> > </li>';
        if( $parent_ID = $queried_object->post_parent ){
            while( $parent_ID ){
                $parent = get_post( $parent_ID );
                array_unshift($parents , $parent);
                $parent_ID = $parent->post_parent;
            }
            foreach( $parents as $parent ){
                echo '<li><a href="'. get_permalink( $parent->ID ) .'" itemprop="url"><span itemprop="title">'. $parent->post_title .'</span></a> ></li>';
            }
        }
    }else{
        //それ以外のページの処理
        echo '<li><a href="' . home_url() . '/" itemprop="url"><span itemprop="title">TOP</span></a> > </li>';
        while( $cate->parent ){
            //ひとつ上の階層のカテゴリデータを配列$parentsの先頭に格納
            //下からカテゴリ階層を遡るのでデータは常に先頭に格納する必要がある
            $cate = get_category( $cate->parent );
            array_unshift($parents , $cate);
        }
        //$parentsの内容を表示
        foreach( $parents as $parent ){
            echo '<li><a href="'. get_category_link( $parent->term_id ) .'" itemprop="url"><span itemprop="title">' . $parent->name . '</span></a> > </li>';
        }
        //現在表示されているカテゴリの表示
        if( is_archive()){
            echo '<li>'.$current["name"].'</li>';
        }else if( is_single() ){
            echo '<li><a href="'. get_category_link( $current[" term_id"]="" )="" .'"="" itemprop="url"><span itemprop="title">'. $current["name"] .'</span></a></li>';
        }
    }
    echo '<li>'.$queried_object->post_title.'</li>';
    echo "</ol>";
}
//add:sitemap
function simple_sitemap(){
  global $wpdb;
  $args = array('depth'        => 0,
    'show_date'    => NULL,
    'date_format'  => get_option('date_format'),
    'child_of'     => 0,
    'exclude'      => NULL,
    'include'      => NULL,
    'title_li'     => '<span class="pagemap">固定ページの一覧</span>',
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
