<?php add_action('wp_enqueue_scripts','theme_enqueue_styles');function theme_enqueue_styles(){wp_enqueue_style('parent-style',get_template_directory_uri().'/style.css');}
//判別
function is_active_plugin($path){$active_plugins=get_option('active_plugins');if(is_array($active_plugins)){foreach($active_plugins as $value){if($value==$path)return true;}}return false;}
$myAmp=false;$string=$post->post_content;$nowurl=$_SERVER["REQUEST_URI"];if(strpos($nowurl,'amp')!==false&&strpos($string,'<script>')===false&&is_single()):$myAmp=true;endif;
/*外部スクリプト読み込み
function _script(){wp_enqueue_script('','',array(),false,false);}
add_action('wp_enqueue_script','_scripts');*/
//消去 /?ver=&emoji&error add_action&標準埋め込み&genericons
function wps_login_error() {remove_action('login_head','wp_shake_js',12);}
function vc_remove_wp_ver_css_js($src){if(strpos($src,'ver='))$src=remove_query_arg('ver',$src);return $src;}
function dequeue_genericons(){wp_dequeue_style('genericons');}
add_action('wp_enqueue_scripts','dequeue_genericons',11);
add_action('login_head','wps_login_error');
add_filter('style_loader_src','vc_remove_wp_ver_css_js',9999);
add_filter('script_loader_src','vc_remove_wp_ver_css_js',9999);
add_filter('embed_oembed_discover','__return_false');
remove_action('wp_head','wp_generator');
remove_action('wp_head','print_emoji_detection_script',7);
remove_action('wp_print_styles','print_emoji_styles');
remove_action('parse_query','wp_oembed_parse_query');
remove_action('wp_head','wp_oembed_remove_discovery_links');
remove_action('wp_head','wp_oembed_remove_host_js');
//メタとサムネ(標準とAMP)
function twentyfifteen_entry_meta(){if(is_sticky()&&is_home()&&!is_paged()):printf('<span class="sticky-post">%s</span>',__('Featured','twentyfifteen'));endif;//投稿を先頭に固定
  //投稿日&更新日
  if(in_array(get_post_type(),array('post','attachment'))){
    $time_string='<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if(get_the_time('U')!==get_the_modified_time('U')){$time_string='<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';}
      $time_string=sprintf($time_string,esc_attr(get_the_date('c')),get_the_date(),esc_attr(get_the_modified_date('c')),get_the_modified_date());
      printf('<span class="posted-on"><span class="screen-reader-text">%1$s</span><a href="%2$s" rel="bookmark">%3$s</a></span>',_x('Posted on','Used before publish date.','twentyfifteen'),esc_url(get_permalink()),$time_string);
      echo('<span class="humantime">（');echo human_time_diff(get_the_time('U'), current_time('timestamp'));echo('前）</span>');}
  //投稿者|カテゴリー|タグ(順同)
  if('post'==get_post_type()){
    if(is_singular()&&is_multi_author()){printf('<span class="byline"><span class="author vcard"><span class="screen-reader-text">%1$s</span><a class="url fn n" href="%2$s">%3$s</a></span></span>',_x('Author','Used before post author name.','twentyfifteen'),esc_url(get_author_posts_url(get_the_author_meta('ID'))),get_the_author());}
    $categories_list=get_the_category_list(_x(',','Used between list items,there is a space after the comma.','twentyfifteen'));
    if($categories_list&&twentyfifteen_categorized_blog()){printf('<span class="cat-links"><span class="screen-reader-text">%1$s</span>%2$s</span>',_x('Categories','Used before category names.','twentyfifteen'),$categories_list);}
    $tags_list=get_the_tag_list('',_x(',','Used between list items,there is a space after the comma.','twentyfifteen'));
    if($tags_list){printf('<span class="tags-links"><span class="screen-reader-text">%1$s</span>%2$s</span>',_x('Tags','Used before tag names.','twentyfifteen'),$tags_list);}}
  //画像サイズ(横 x 縦)表示&コメントをどうぞ&コメント数
  if(is_attachment()&&wp_attachment_is_image()){$metadata=wp_get_attachment_metadata();printf('<span class="full-size-link"><span class="screen-reader-text">%1$s</span><a href="%2$s">%3$s &times;%4$s</a></span>',_x('Full size','Used before full size attachment link.','twentyfifteen'),esc_url(wp_get_attachment_url()),$metadata['width'],$metadata['height']);}
  if(!is_single()&&!post_password_required()&&(comments_open()||get_comments_number())){echo'<span class="comments-link">';comments_popup_link(__('Leave a comment','twentyfifteen'),__('1 Comment','twentyfifteen' ),__('% Comments','twentyfifteen'));echo'</span>';}
}
if(!function_exists('twentyfifteen_post_thumbnail')):function twentyfifteen_post_thumbnail(){if(post_password_required()||is_attachment()||!has_post_thumbnail()){return;}if(is_singular()):?><div class="post-thumbnail"><?php the_post_thumbnail();?></div><?php else:?><a class="post-thumbnail" href="<?php the_permalink();?>" aria-hidden="true"><?php the_post_thumbnail('post-thumbnail',array('alt'=>get_the_title()));?></a><?php endif;}endif;
function amp_post_thumbnail(){echo'<amp-img src="' . the_post_thumbnail() . '" alt="thumbnail" width=825 heght=510 layout="responsive" class="thumbnail"></amp-img>';}
function amp_entry_meta(){if(in_array(get_post_type(),array('post','attachment'))){$time_string='<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if(get_the_time('U')!==get_the_modified_time('U')){$time_string='<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';}
	$time_string=sprintf($time_string,esc_attr(get_the_date('c')),get_the_date(),esc_attr(get_the_modified_date('c')),get_the_modified_date());
	printf('<span>%1$s<a href="%2$s" rel="bookmark">%3$s</a></span>',_x('Posted on','Used before publish date.','twentyfifteen'),esc_url(get_permalink()),$time_string);
	echo('<span>（');echo human_time_diff(get_the_time('U'),current_time('timestamp'));echo('前）</span>');}}
//サムネサイズ追加&Alt属性がないIMGタグにalt=""を追加する&サムネ自動設定
add_image_size('related',150,150,true);
add_filter('the_content',function($content){return preg_replace('/<img((?![^>]*alt=)[^>]*)>/i','<img alt=""${1}>',$content);});
require_once(ABSPATH . '/wp-admin/includes/image.php');
function fetch_thumbnail_image($matches,$key,$post_content,$post_id){
  $imageTitle='';
  preg_match_all('/<\s*img [^\>]*title\s*=\s*[\""\']?([^\""\'>]*)/i',$post_content,$matchesTitle);
  if(count($matchesTitle) && isset($matchesTitle[1])){$imageTitle=$matchesTitle[1][$key];}
  $imageUrl=$matches[1][$key];$filename=substr($imageUrl,(strrpos($imageUrl,'/'))+1);
  if(!(($uploads=wp_upload_dir(current_time('mysql')))&&false===$uploads['error'])){return null;}
  $filename=wp_unique_filename($uploads['path'],$filename);$new_file=$uploads['path'] . "/$filename";
  if(!ini_get('allow_url_fopen')){$file_data=curl_get_file_contents($imageUrl);
  }else{if(WP_Filesystem()){global $wp_filesystem;$file_data=@$wp_filesystem->get_contents($imageUrl);}}
  if(!$file_data){return null;}
  if(WP_Filesystem()){global $wp_filesystem;$wp_filesystem->put_contents($new_file,$file_data);}
  $stat=stat(dirname($new_file));$perms=$stat['mode']&0000666;
  @ chmod($new_file,$perms);
  $wp_filetype=wp_check_filetype($filename,$mimes);
  extract($wp_filetype);
  if((!$type||!$ext)&&!current_user_can('unfiltered_upload')){return null;}
  $url=$uploads['url'] . "/$filename";
  $attachment=array('post_mime_type'=>$type,'guid'=>$url,'post_parent'=>null,'post_title'=>$imageTitle,'post_content'=>'',);
  $thumb_id=wp_insert_attachment($attachment,$file,$post_id);
  if(!is_wp_error($thumb_id)){wp_update_attachment_metadata($thumb_id,wp_generate_attachment_metadata($thumb_id,$new_file));update_attached_file($thumb_id,$new_file);return $thumb_id;}
  return null;}
function auto_post_thumbnail_image(){global $wpdb;global $post;$post_id=$post->ID;
  if(get_post_meta($post_id,'_thumbnail_id',true) || get_post_meta($post_id,'skip_post_thumb',true)){return;}
  $post=$wpdb->get_results("SELECT * FROM {$wpdb->posts} WHERE id = $post_id");$matches=array();
  preg_match_all('/<\s*img [^\>]*src\s*=\s*[\""\']?([^\""\'>]*)/i', $post[0]->post_content, $matches);
  if(empty($matches[0])){preg_match('%(?:youtube\.com/(?:user/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $post[0]->post_content, $match);
    if(!empty($match[1])){$matches=array();$matches[0]=$matches[1]=array('http://img.youtube.com/vi/'.$match[1].'/mqdefault.jpg');}}
  if(count($matches)){foreach($matches[0]as$key=>$image){preg_match('/wp-image-([\d]*)/i', $image, $thumb_id);$thumb_id = $thumb_id[1];
      if(!$thumb_id){$image=substr($image,strpos($image,'"')+1);$result=$wpdb->get_results("SELECT ID FROM {$wpdb->posts} WHERE guid = '".$image."'");$thumb_id=$result[0]->ID;}
      if(!$thumb_id){$thumb_id = fetch_thumbnail_image($matches, $key, $post[0]->post_content, $post_id);}
      if($thumb_id){update_post_meta($post_id,'_thumbnail_id',$thumb_id);break;}
    }
  }
}
add_action('save_post','auto_post_thumbnail_image');
add_action('draft_to_publish','auto_post_thumbnail_image');
add_action('new_to_publish','auto_post_thumbnail_image');
add_action('pending_to_publish','auto_post_thumbnail_image');
add_action('future_to_publish','auto_post_thumbnail_image');
//URL→ブログカード&@hoge→twitterリンク&キーワードハイライト&ルビサポート
function ruby_setup(){global $allowedposttags;foreach(array('ruby','rp','rt') as $tag )if(!isset($allowedposttags[$tag]))$allowedposttags[$tag]=array();}
function wps_highlight_results($text){if(is_search()){$sr=get_query_var('s');$keys=explode(" ",$sr);$text=preg_replace('/('.implode('|',$keys) .')/iu','<span class="marker">'.$sr.'</span>',$text);}return $text;}
function twtreplace($content){$twtreplace=preg_replace('/([^a-zA-Z0-9-_&])@([0-9a-zA-Z_]+)/',"$1<a href=\"http://twitter.com/$2\" target=\"_blank\" rel=\"nofollow\">@$2</a>",$content);return $twtreplace;}
function url_to_hatena_blog_card($the_content){if(is_singular()){$res=preg_match_all('/^(<p>)?(<a.+?>)?https?:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+(<\/a>)?(<\/p>)?(<br ? \/>)?$/im',$the_content,$m);
    foreach($m[0] as $match){$url=strip_tags($match);$tag='<a class="embedly-card"href="'.$url.'"></a><script async src="//cdn.embedly.com/widgets/platform.js" charset="UTF-8"></script>';$the_content=preg_replace('{'.preg_quote($match).'}',$tag,$the_content,1);}
  }
  return $the_content;}
add_filter('the_content','url_to_hatena_blog_card');
add_filter('the_content','twtreplace');
add_filter('comment_text','twtreplace');
add_filter('the_title','wps_highlight_results');
add_filter('the_content','wps_highlight_results');
add_action('after_setup_theme','ruby_setup');
//SNSボタンと関連記事のウィジェット化&PCのみ表示テキストウイジェットの追加&entry-footerにウィジェットエリア追加
class PcTextWidgetItem extends WP_Widget{
  function PcTextWidgetItem(){parent::WP_Widget(false,$name='Text widget（for PC）');}
  function widget($args,$instance){extract($args);$title=apply_filters('widget_title_pc_text',$instance['title_pc_text']);$text=apply_filters('widget_text_pc_text',$instance['text_pc_text']);if(!wp_is_mobile()):echo('<div id="pc-text-widget" class="widget pc_text">');if($title){echo '<h4>'.$title.'</h4>';}echo('<div class="text-pc">');echo $text;echo'</div></div>';endif;}
  function update($new_instance,$old_instance){$instance=$old_instance;$instance['title_pc_text']=strip_tags($new_instance['title_pc_text']);$instance['text_pc_text']=$new_instance['text_pc_text'];return $instance;}
  function form($instance){if(empty($instance)){$instance = array('title_pc_text'=>null,'text_pc_text'=>null,);}
    $title=esc_attr($instance['title_pc_text']);$text=esc_attr($instance['text_pc_text']);?>
    <p>
      <label for="<?php echo $this->get_field_id('title_pc_text');?>"><?php _e('Title');?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('title_pc_text');?>" name="<?php echo $this->get_field_name('title_pc_text');?>" type="text" value="<?php echo $title;?>"/>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('text_pc_text');?>"><?php _e('Text');?></label>
      <textarea class="widefat" id="<?php echo $this->get_field_id('text_pc_text');?>" name="<?php echo $this->get_field_name('text_pc_text');?>" cols="20" rows="16"><?php echo $text;?></textarea>
    </p>
    <?php
  }
}
add_action('widgets_init',create_function('','return register_widget("PcTextWidgetItem");'));
class sns_sharebutton extends WP_Widget{
    function __construct(){parent::__construct('sns_sharebutton','SNSシェアボタン',array('description'=>'SNSシェアボタン',));}
    public function widget($args,$instance){echo $args['before_widget'];get_template_part('parts/snsbutton');echo $args['after_widget'];}
    public function form($instance){$title=!empty($instance['title']) ? $instance['title']:__( '','text_domain');?>
		<p>
		<label for="<?php echo $this->get_field_id('title');?>"><?php _e('タイトル:');?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo esc_attr($title);?>">
		</p>
		<?php 
	}
	public function update($new_instance,$old_instance){$instance=array();$instance['title']=(!empty($new_instance['title'])) ? strip_tags($new_instance['title']):'';return $instance;}
}
add_action('widgets_init',function(){register_widget('sns_sharebutton');});
class author-bio extends WP_Widget{
    function __construct(){parent::__construct('author-bio','投稿者カード',array('description'=>'投稿者のプロフィールカード',));}
    public function widget($args,$instance){echo $args['before_widget'];get_template_part('parts/author-bio');echo $args['after_widget'];}
    public function form($instance){$title=!empty($instance['title']) ? $instance['title']:__( '','text_domain');?>
		<p>
		<label for="<?php echo $this->get_field_id('title');?>"><?php _e('タイトル:');?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo esc_attr($title);?>">
		</p>
		<?php 
	}
	public function update($new_instance,$old_instance){$instance=array();$instance['title']=(!empty($new_instance['title']))?strip_tags($new_instance['title']):'';return $instance;}
}
add_action('widgets_init',function(){register_widget('author-bio');});
class related_posts extends WP_Widget{
    function __construct(){parent::__construct('related_posts','関連記事',array('description'=>'関連記事',));}
    public function widget($args,$instance){echo $args['before_widget'];get_template_part('parts/related');echo $args['after_widget'];}
    public function form($instance){$title=!empty($instance['title']) ? $instance['title']:__( '','text_domain');?>
		<p>
		<label for="<?php echo $this->get_field_id('title');?>"><?php _e('タイトル:');?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo esc_attr($title);?>">
		</p>
		<?php 
	}
	public function update($new_instance,$old_instance){$instance=array();$instance['title']=(!empty($new_instance['title'])) ? strip_tags($new_instance['title']):'';return $instance;}
}
add_action('widgets_init',function(){register_widget('related_posts');});
class disqus_widget extends WP_Widget{
    function __construct(){parent::__construct('disqus_widget','Disqus',array('description'=>'Disqus',));}
    public function widget($args,$instance){echo $args['before_widget'];?><div id="disqus_thread"></div><script>(function(){var d=document,s=d.createElement('script');s.src='//<?php echo get_option('Disqus_ID')?>.disqus.com/embed.js';s.setAttribute('data-timestamp',+new Date());(d.head||d.body).appendChild(s);})();</script><noscript><a href="https://disqus.com/?ref_noscript" rel="nofollow">Please enable JavaScript to view the comments powered by Disqus.</a></noscript><?php echo $args['after_widget'];}
    public function form($instance){$title=!empty($instance['title']) ? $instance['title']:__( '','text_domain');?>
		<p>
		<label for="<?php echo $this->get_field_id('title');?>"><?php _e('タイトル:');?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo esc_attr($title);?>">
		</p>
		<?php 
	}
	public function update($new_instance,$old_instance){$instance=array();$instance['title']=(!empty($new_instance['title'])) ? strip_tags($new_instance['title']):'';return $instance;}
}
add_action('widgets_init',function(){register_widget('disqus_widget');});
function entry_footer_sidebar(){register_sidebar(array('name'=>'エントリーフッター','id'=>'8','before_widget'=>'<div>','after_widget'=>'</div>','before_title'=>'','after_title'=>'',));}
add_action('widgets_init','entry_footer_sidebar');
//カレンダー短縮
function my_archives_link($link_html){
    $currentMonth=date('n');
    $currentYear=date('Y');
    $ym=explode('年',$link_html);
    $monthArray=explode('月',$ym[1]);
    $month=$monthArray[0];
    $year=intval(strip_tags($ym[0]));
    $linkMonth=substr('0'.$month,-2);
    $url=site_url('/').$year.'/'.$linkMonth.'/';
    $linkString='%s<a href="'.$url.'" style="white-space: nowrap;">%s</a>'.
    $linkYear='';
    $yearHtml='<span style="font-weight:bold;">%s</span><br />';
    if(($currentMonth == $month)AND($currentYear == $year)){$linkYear=sprintf($yearHtml,$year);
    }else{if((intval($month) == 12)AND($currentYear != $year)){$linkYear='<br/>'.sprintf($yearHtml,$year);}}
    return sprintf($linkString,$linkYear,$ym[1]);}
add_filter('get_archives_link','my_archives_link');
//カテゴリー説明文をメタ化
function get_meta_description_from_category(){$cate_desc=trim(strip_tags(category_description()));if($cate_desc){return $cate_desc;}$cate_desc='「' . single_cat_title('',false) . '」の記事一覧です。' . get_bloginfo('description');return $cate_desc;}
function get_meta_keyword_from_category(){return single_cat_title('',false) . ',ブログ,記事一覧';}
function get_mtime($format){$mtime=get_the_modified_time('Ymd');$ptime=get_the_time('Ymd');if($ptime > $mtime){return get_the_time($format);}elseif($ptime === $mtime){return null;}else{return get_the_modified_time($format);}}
//カスタマイザー弄り&投稿記事一覧にアイキャッチ画像を表示
function customize_admin_manage_posts_columns($columns){$columns['thumbnail']=__('Thumbnail');return $columns;}
function customize_admin_add_column($column_name,$post_id){if('thumbnail'==$column_name){$thum=get_the_post_thumbnail($post_id,array(100,100));}if(isset($thum)&&$thum){echo $thum;}}
add_filter('manage_posts_columns','customize_admin_manage_posts_columns');
add_action('manage_posts_custom_column','customize_admin_add_column',10,2);
add_action('customize_register','theme_customize');
function theme_customize($wp_customize){
    $wp_customize->add_section('sns_section',array('title'=>'独自設定','priority'=>1,'description'=>'セクションの詳細',));
	$wp_customize->add_setting('Adminnav_Dsp',array('type'=>'theme_mod',));
    $wp_customize->add_control('Adminnav_Dsp',array('section'=>'sns_section','settings'=>'Adminnav_Dsp','label'=>'管理者向けメニューを表示する','type'=>'checkbox'));
	$wp_customize->add_setting('entryfooter_txt',array('type'=>'option',));
    $wp_customize->add_control('entryfooter_txt',array('section'=>'sns_section','settings'=>'entryfooter_txt','label'=>'エントリーフッターのタイトルを入力する','type'=>'text'));
    $wp_customize->add_setting('GoogleChrome_URLbar',array('type'=>'option',));
    $wp_customize->add_control('GoogleChrome_URLbar',array('section'=>'sns_section','settings'=>'GoogleChrome_URLbar','label'=>'モバイル版GoogleChrome向けURLバーの色コードを指定する','type'=>'text'));
    $wp_customize->add_setting('Google_Webmaster',array('type'=>'option',));
    $wp_customize->add_control('Google_Webmaster',array('section'=>'sns_section','settings'=>'Google_Webmaster','label'=>'サイトのGoogleSerchconsole向けコードを指定する','type'=>'text'));
    $wp_customize->add_setting('Bing_Webmaster',array('type'=>'option',));
    $wp_customize->add_control('Bing_Webmaster',array('section'=>'sns_section','settings'=>'Bing_Webmaster','label'=>'サイトのBingWebmaster向けコードを指定する','type'=>'text'));
    $wp_customize->add_setting('Google_Analytics',array('type'=>'option',));
    $wp_customize->add_control('Google_Analytics',array('section'=>'sns_section','settings'=>'Google_Analytics','label'=>'サイトのGoogleAnalyticsコードを指定する','type'=>'text'));
    $wp_customize->add_setting('Other_Analytics',array('type'=>'option',));
    $wp_customize->add_control('Other_Analytics',array('section'=>'sns_section','settings'=>'Other_Analytics','label'=>'サイトのAnalyticsコードを指定する','type'=>'text'));
    $wp_customize->add_setting('Twitter_URL',array('type'=>'option',));
    $wp_customize->add_control('Twitter_URL',array('section'=>'sns_section','settings'=>'Twitter_URL','label'=>'サイト全体のTwitterアカウントへを指定する','type'=>'text'));
    $wp_customize->add_setting('facebookr_appid',array('type'=>'option',));
    $wp_customize->add_control('facebookr_appid',array('section'=>'sns_section','settings'=>'facebookr_appid','label'=>'facebookのappidを表示する','type'=>'text'));
    $wp_customize->add_setting('facebookr_admins',array('type'=>'option',));
    $wp_customize->add_control('facebookr_admins',array('section'=>'sns_section','settings'=>'facebookr_admins','label'=>'facebookのadminidを指定する','type'=>'text'));
    $wp_customize->add_setting('Pushnotice_Dsp',array('type'=>'theme_mod',));
    $wp_customize->add_control('Pushnotice_Dsp',array('section'=>'sns_section','settings'=>'Pushnotice_Dsp','label'=>'プッシュ通知の登録URLを指定する','type'=>'checkbox'));
    $wp_customize->add_setting('Pushnotice_URL',array('type'=>'option',));
    $wp_customize->add_control('Pushnotice_URL',array('section'=>'sns_section','settings'=>'Pushnotice_URL','label'=>'プッシュ通知の登録URLを入力する','type'=>'text'));
	$wp_customize->add_setting('Pushnotice_APIkey',array('type'=>'option',));
    $wp_customize->add_control('Pushnotice_APIkey',array('section'=>'sns_section','settings'=>'Pushnotice_APIkey','label'=>'プッシュ通知のAPIkeyを入力する','type'=>'text'));
	$wp_customize->add_setting('Disqus_ID',array('type'=>'option',));
    $wp_customize->add_control('Disqus_ID',array('section'=>'sns_section','settings'=>'Disqus_ID','label'=>'DisqusのIDを入力する','type'=>'text'));
}
function is_pushnotice_dsp(){return get_theme_mod('Pushnotice_Dsp','false');}
function is_adminnav_dsp(){return get_theme_mod('Adminnav_Dsp','false');}
//プロフィール欄追加(the_author_meta('twitter')で表示)
function my_new_contactmethods($contactmethods){
  $contactmethods['TEL']='TEL';
  $contactmethods['FAX']='FAX';
  $contactmethods['Addres']='住所';
  $contactmethods['Graveter']='Graveter';
  $contactmethods['LINE']='LINE';
  $contactmethods['YO!']='YO!';
  $contactmethods['twitter']='Twitter';
  $contactmethods['facebook']='Facebook';
  $contactmethods['Linkedin']='Linkedin';
  $contactmethods['Google+']='Google+';
  $contactmethods['Github']='Github';
  $contactmethods['Bitbucket']='Bitbucket';
  $contactmethods['Codepen']='Codepen';
  $contactmethods['JSbuddle']='JSbuddle';
  $contactmethods['Quita']='Quita';
  $contactmethods['xda']='xda';
  $contactmethods['hatenablog']='はてなブログ';
  $contactmethods['hatenadiary']='はてなダイアリー';
  $contactmethods['hatebu']='はてなブックマーク';
  $contactmethods['Pocket']='Pocket';
  $contactmethods['ameba']='アメーバ';
  $contactmethods['fc2']='fc2';
  $contactmethods['mixi']='mixi';
  $contactmethods['Instagram']='Instagram';
  $contactmethods['Flickr']='Flickr';
  $contactmethods['FourSquare']='FourSquare';
  $contactmethods['Swarm']='Swarm';
  $contactmethods['Steam']='Steam';
  $contactmethods['XboxLive']='XboxLive';
  $contactmethods['PSN']='PSN';
  $contactmethods['NINTENDOaccount']='ニンテンドーアカウント';
  $contactmethods['NINTENDONetworkID']='ニンテンドーネットワークID';
  $contactmethods['friendcode']='フレンドコード';
  $contactmethods['UPlay']='UPlay';
  $contactmethods['EAOrigin']='EAOrigin';
  $contactmethods['SQUAREENIXMembers']='SQUAREENIXMembers';
  $contactmethods['BANDAINAMCOID']='BANDAINAMCOID';
  $contactmethods['SEGAID']='SEGAID';
  $contactmethods['vine']='vine';
  $contactmethods['vimeo']='vimeo';
  $contactmethods['YouTube']='YouTube';
  $contactmethods['USTREAM']='USTREAM';
  $contactmethods['Twitch']='Twitch';
  $contactmethods['niconico']='niconico';
  $contactmethods['Skype']='Skype';
  $contactmethods['twitcasting']='ツイキャス';
  $contactmethods['MixCannel']='MixChannel';
  $contactmethods['Slideshare']='Slideshare';
  $contactmethods['Medium']='Medium';
  $contactmethods['note']='note';
  $contactmethods['Pxiv']='Pxiv';
  $contactmethods['Tumblr']='Tumblr';
  $contactmethods['Blogger']='Blogger';
  $contactmethods['livedoor']='livedoor';
  $contactmethods['wordpress.com']='wordpress.com';
  $contactmethods['wordpress.org']='wordpress.org';
  $contactmethods['Adsense']='アドセンス';
  $contactmethods['A8.net']='A8.net';
  $contactmethods['GoogleAdsense']='GoogleAdsense';
  $contactmethods['AmazonAdsense']='Amazonアフィリエイト';
  $contactmethods['Amazonlist']='Amazonの欲しいものリスト';
  $contactmethods['Yahooaction']='Yahoo!オークション';
  $contactmethods['Rakutenaction']='楽天オークション';
  $contactmethods['Rakuma']='ラクマ';
  $contactmethods['Merukari']='メルカリ';
  $contactmethods['Bitcoin']='Bitcoin';
  return $contactmethods;}
add_filter('user_contactmethods','my_new_contactmethods',10,1);
//add pic&©&予約記事 to RSS
function rss_post_thumbnail($content){global $post;if(has_post_thumbnail($post->ID)){$content = '<p>' . get_the_post_thumbnail($post->ID) . '</p>' . $content;}return $content;}
function rss_feed_copyright($content){$content=$content.'<a href="' . home_url() . '"><p>Copyright &copy;' . get_bloginfo('name') . 'All Rights Reserved.</p></a>';return $content;}
add_filter('the_excerpt_rss','rss_feed_copyright');
add_filter('the_content_feed','rss_feed_copyright');
add_filter('the_excerpt_rss','rss_post_thumbnail');
add_filter('the_content_feed','rss_post_thumbnail');