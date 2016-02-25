<meta name="description" content="<?php if(is_home()){echo 'wkwkrnhtによるニッチな情報局';}elseif (is_single()){echo $content_summary;}else{bloginfo('description');};?>">
<?php $content_summary= strip_tags($post-&gt;post_content);
$content_summary = str_replace("\n", "", $content_summary);
$content_summary = str_replace("\r", "", $content_summary);
$content_summary = mb_substr($content_summary, 0, 60). "...";?>
<meta name="keywords" content="<?php if(is_single()){$posttags = get_the_tags();if ($posttags){foreach($posttags as $tag){echo $tag->name . ',';}}the_title();}else {echo 'wkwkrnht'; echo 'RT狂';};?>">
