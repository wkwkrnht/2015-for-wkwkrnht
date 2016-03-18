<meta property="og:type" content="blog">
<?php if(is_single()){if(have_posts()):while(have_posts()):the_post();echo '<meta property="og:description" content="'.mb_substr(get_the_excerpt(),0,100).'">';echo "\n";endwhile;endif;
  echo'<meta property="og:title" content="';the_title();echo'">';echo"\n";
  echo'<meta property="og:url" content="';the_permalink();echo'">';echo"\n";
}else{
  echo'<meta property="og:description" content="'; bloginfo('description');echo '">';echo "\n";
  echo'<meta property="og:title" content="'; bloginfo('name');echo '">';echo "\n";
  echo'<meta property="og:url" content="';echo esc_url(home_url());echo '">';echo "\n";}
$str=$post->post_content;$searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';
if(is_single()){if(has_post_thumbnail()){$image_id=get_post_thumbnail_id();$image=wp_get_attachment_image_src($image_id,'full');echo'<meta property="og:image" content="'.$image[0].'">';echo "\n";
  }elseif(preg_match($searchPattern,$str,$imgurl) && !is_archive()){echo'<meta property="og:image" content="'.$imgurl[2].'">';echo "\n";
  }else{echo'<meta property="og:image" content="/img/no-img.png">';echo "\n";}
}else{if(get_header_image()){echo'<meta property="og:image" content="'.get_header_image().'">';echo "\n";}else{echo '<meta property="og:image" content="/img/icon.png">';echo "\n";}}?>
<meta property="og:site_name" content="<?php bloginfo('name');?>">
<meta property="og:locale" content="ja_JP"/>
<meta property="fb:admins" content="<?php echo get_option('facebookr_admins');?>">
<meta property="fb:app_id" content="<?php echo get_option('facebookr_appid');?>">
<meta name="twitter:card" content="summary">
<?php if(is_single()){if(have_posts()):while(have_posts()):the_post();echo'<meta name="twitter:description" content="'.mb_substr(get_the_excerpt(),0,100).'">';echo"\n";endwhile;endif;
  echo'<meta name="twitter:title" content="';the_title();echo'">';echo"\n";
  echo'<meta name="twitter:url" content="';the_permalink();echo'">';echo"\n";
}else{
  echo'<meta name="twitter:description" content="';bloginfo('description');echo'">';echo"\n";
  echo'<meta name="twitter:title" content="'; bloginfo('name'); echo '">';echo "\n";
  echo'<meta name="twitter:url" content="';echo esc_url(home_url());echo'">';echo"\n";}
$str=$post->post_content;$searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';
if(is_single()){
  if(has_post_thumbnail()){$image_id=get_post_thumbnail_id();$img_url=$image[0];$image=wp_get_attachment_image_src($image_id,'full');echo'<meta name="twitter:image" content="'.$image[0].'">';echo"\n";
  }elseif(preg_match($searchPattern,$str,$imgurl)&&!is_archive()){$img_url=$imgurl[2];echo'<meta name="twitter:image" content="'.$imgurl[2].'">';echo"\n";
  }else{echo '<meta name="twitter:image" content="/img/no-img.png">';echo"\n";}
}else{if(get_header_image()){echo'<meta name="twitter:image" content="'.get_header_image().'">';echo"\n";}else{echo'<meta name="twitter:image" content="/img/icon.png">';echo"\n";}}
preg_match( '/https?:\/\/(.+?)\//i',admin_url(),$results);?>
<meta name="twitter:domain" content="<?php echo $results[1] ?>">
<meta name="twitter:image:width" content="825px">
<meta name="twitter:image:height" content="510px">
<meta name="twitter:creator" content="@<?php if(is_single()){echo the_author_meta('twitter');}else{echo get_option('Twitter_URL');};?>">
<meta name="twitter:site" content="@<?php echo get_option('Twitter_URL');?>">
<?php
$content_summary=strip_tags($post->post_content);
$content_summary=str_replace("\n","",$content_summary);
$content_summary=str_replace("\r","",$content_summary);
$content_summary=mb_substr($content_summary,0,60). "...";
if($post->my_description):?><meta name="description" content="<?php echo esc_attr($post->my_description);?>" />
<?php elseif(is_single()):?><meta name="description" content="<?php echo $content_summary;?>" />
<?php
  elseif(is_category()){echo get_meta_description_from_category();}
  else:?><meta name="description" content="<?php bloginfo('description');?>" />
<?php endif;?>
<?php if($post->my_keywords):?>
	<meta name="keywords" content="<?php echo esc_attr($post->my_keywords);?>" />
<?php else:?>
	<meta name="keywords" content="デフォルトワード,デフォルトワード,デフォルトワード" />
<?php endif;?>
<?php if(wp_is_mobile()){echo'<meta name="theme-color" content="'echo get_option('GoogleChrome_URLbar');'">';}?>