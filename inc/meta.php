<meta name="google-site-verification" content="<?php echo get_option('Google_Webmaster');?>">
<meta name="msvalidate.01" content="<?php echo get_option('Bing_Webmaster');?>">
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