<meta property="og:type" content="blog">
<?php if(is_single()){
if(have_posts()): while(have_posts()): the_post();
  echo '<meta property="og:description" content="'.mb_substr(get_the_excerpt(), 0, 100).'">';echo "\n";
endwhile; endif;
  echo '<meta property="og:title" content="'; the_title(); echo '">';echo "\n";
  echo '<meta property="og:url" content="'; the_permalink(); echo '">';echo "\n";
}else{
  echo '<meta property="og:description" content="'; bloginfo('description'); echo '">';echo "\n";
  echo '<meta property="og:title" content="'; bloginfo('name'); echo '">';echo "\n";
  echo '<meta property="og:url" content="'; bloginfo('url'); echo '">';echo "\n";}
$str = $post->post_content;
$searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';
if(is_single()){
  if(has_post_thumbnail()){
    $image_id = get_post_thumbnail_id();
    $image = wp_get_attachment_image_src( $image_id, 'full');
    echo '<meta property="og:image" content="'.$image[0].'">';echo "\n";
  }else if(preg_match($searchPattern, $str, $imgurl ) && !is_archive()) {
    echo '<meta property="og:image" content="'.$imgurl[2].'">';echo "\n";
  }else{
    $ogp_image = '/img/no-img.png';
    echo '<meta property="og:image" content="'.$ogp_image.'">';echo "\n";}
}else{
  if (get_header_image()){echo '<meta property="og:image" content="'.get_header_image().'">';echo "\n";}else{echo '<meta property="og:image" content="/img/icon.png">';echo "\n";}}?>
<meta property="og:site_name" content="<?php bloginfo('name');?>">
<meta property="og:locale" content="ja_JP" />
<meta property="fb:admins" content="100010188733942">
<meta property="fb:app_id" content="951165034967338">
<meta name="twitter:card" content="summary">
<?php if (is_single()){
if(have_posts()): while(have_posts()): the_post();
  echo '<meta name="twitter:description" content="'.mb_substr(get_the_excerpt(), 0, 100).'">';echo "\n";
endwhile; endif;
  echo '<meta name="twitter:title" content="'; the_title(); echo '">';echo "\n";
  echo '<meta name="twitter:url" content="'; the_permalink(); echo '">';echo "\n";
  }else{
  echo '<meta name="twitter:description" content="'; bloginfo('description'); echo '">';echo "\n";
  echo '<meta name="twitter:title" content="'; bloginfo('name'); echo '">';echo "\n";
  echo '<meta name="twitter:url" content="'; bloginfo('url'); echo '">';echo "\n";}
$str = $post->post_content;
$searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';
if (is_single()){
  if (has_post_thumbnail()){
    $image_id = get_post_thumbnail_id();
    $image = wp_get_attachment_image_src($image_id,'full');
    $img_url = $image[0];
    echo '<meta name="twitter:image" content="'.$image[0].'">';echo "\n";
  }else if(preg_match($searchPattern,$str,$imgurl) && !is_archive()){
    $img_url = $imgurl[2];
    echo '<meta name="twitter:image" content="'.$imgurl[2].'">';echo "\n";
  }else{
    $ogp_image = '/img/no-img.png';
    $img_url = $ogp_image;
    echo '<meta name="twitter:image" content="'.$ogp_image.'">';echo "\n";}
}else{//get_stylesheet_directory_uri().
  if (get_header_image()){
    $img_url = get_header_image();
    echo '<meta name="twitter:image" content="'.$img_url.'">';echo "\n";
  }else{echo '<meta name="twitter:image" content="/img/icon.png">';echo "\n";}}
preg_match( '/https?:\/\/(.+?)\//i', admin_url(), $results );
list($width,$height) = getimagesize($img_url);?>
<meta name="twitter:domain" content="<?php echo $results[1] ?>">
<meta name="twitter:image:width" content="<?php echo $width ?>">
<meta name="twitter:image:height" content="<?php echo $height ?>">
<meta name="twitter:creator" content="@wkwkrnht">
<meta name="twitter:site" content="@wkwkrnht">
