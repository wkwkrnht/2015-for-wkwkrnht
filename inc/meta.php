<?php
$content_summary= strip_tags($post->post_content);
$content_summary = str_replace("\n","",$content_summary);
$content_summary = str_replace("\r","",$content_summary);
$content_summary = mb_substr($content_summary,0,60). "...";?>
<meta name="description" content="<?php if(is_single()){echo $content_summary;}
elseif(is_category()){echo get_meta_description_from_category();}
else{bloginfo('description');}?>">
<meta name="keywords" content="<?php if(is_category()){echo get_meta_keyword_from_category();}
elseif(is_single()){$posttags = get_the_tags();if($posttags){foreach($posttags as $tag){echo $tag->name . ','; }}the_title();}
elseif(!empty($custom['meta_keywords'][0])){echo['meta_keywords'][0];}else{echo'RT狂,wkwkrnht';}?>">