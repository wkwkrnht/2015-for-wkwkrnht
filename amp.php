<!DOCTYPE html>
<html amp class="amp">
<head>
	<meta charset="utf-8">
	<?php $canonical_url=get_permalink();?>
	<link rel="canonical" href="<?php echo $canonical_url;?>" />
	<link rel="amphtml" href="<?php echo $canonical_url.'?amp=1';?>">
	<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
	<meta name="google-site-verification" content="<?php echo get_option('Google_Webmaster');?>">
	<meta name="msvalidate.01" content="<?php echo get_option('Bing_Webmaster');?>" />
	<meta property="og:type" content="blog">
	<?php if(is_single()):if(have_posts()):while(have_posts()):the_post();echo'<meta property="og:description" content="';mb_substr(get_the_excerpt(),0,100);echo'">';echo"\n";endwhile;endif;
		echo'<meta property="og:title" content="';the_title();echo'">';echo"\n";
		echo'<meta property="og:url" content="';the_permalink();echo'">';echo"\n";endif;
		if(is_single()){if(has_post_thumbnail()){$image_id=get_post_thumbnail_id();$image=wp_get_attachment_image_src($image_id,'full');echo'<meta property="og:image" content="';echo$image[0];echo'">';echo"\n";
		}elseif(preg_match($searchPattern,$str,$imgurl) && !is_archive()){echo'<meta property="og:image" content="';echo $imgurl[2];echo'">';echo"\n";}else{echo'<meta property="og:image" content="/img/no-img.png">';echo"\n";}
		}else{if(get_header_image()){echo'<meta property="og:image" content="';get_header_image();echo'">';echo "\n";}else{echo'<meta property="og:image" content="/img/icon.png">';echo"\n";}}?>
	<meta property="og:site_name" content="<?php bloginfo('name');?>">
	<meta property="og:locale" content="ja_JP"/>
	<meta property="fb:admins" content="<?php echo get_option('facebookr_admins');?>">
	<meta property="fb:app_id" content="<?php echo get_option('facebookr_appid');?>">
	<meta name="twitter:card" content="summary">
	<?php if(is_single()):if(have_posts()):while(have_posts()):the_post();echo'<meta name="twitter:description" content="'.mb_substr(get_the_excerpt(),0,100).'">';echo"\n";endwhile;endif;
		echo'<meta name="twitter:title" content="';the_title();echo'">';echo"\n";
		echo'<meta name="twitter:url" content="';the_permalink();echo'">';echo"\n";endif;
		$str=$post->post_content;$searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';
		if(is_single()){if(has_post_thumbnail()){$image_id=get_post_thumbnail_id();$img_url=$image[0];$image=wp_get_attachment_image_src($image_id,'full');echo'<meta name="twitter:image" content="';echo$image[0];echo'">';echo"\n";
		}elseif(preg_match($searchPattern,$str,$imgurl)&&!is_archive()){$img_url=$imgurl[2];echo'<meta name="twitter:image" content="';echo$imgurl[2];echo'">';echo"\n";}else{echo '<meta name="twitter:image" content="/img/no-img.png">';echo"\n";}
		}else{if(get_header_image()){echo'<meta name="twitter:image" content="'.get_header_image().'">';echo"\n";}else{echo'<meta name="twitter:image" content="/img/icon.png">';echo"\n";}}
		preg_match('/https?:\/\/(.+?)\//i',admin_url(),$results);?>
	<meta name="twitter:domain" content="<?php echo $results[1] ?>">
	<meta name="twitter:image:width" content="825px">
	<meta name="twitter:image:height" content="510px">
	<meta name="twitter:creator" content="@<?php if(is_single()){echo the_author_meta('twitter');}else{echo get_option('Twitter_URL');};?>">
	<meta name="twitter:site" content="@<?php echo get_option('Twitter_URL');?>">
	<?php if(wp_is_mobile()):echo'<meta name="theme-color" content="';echo get_option('GoogleChrome_URLbar');echo'">';endif;?>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url');?>">
	<script async src="https://cdn.ampproject.org/v0.js"></script>
	<script type="application/ld+json">
		{
			"@context": "http://schema.org",
			"@type": "NewsArticle",
			"mainEntityOfPage":{
				"@type":"WebPage",
				"@id":"<?php the_permalink();?>"
				},
			"headline": "<?php the_title();?>",
			"image": {
				"@type": "ImageObject",
				"url": "<?php
				$image_id=get_post_thumbnail_id();
				$image_url=wp_get_attachment_image_src($image_id,true);
				echo $image_url[0];?>",
				"height": 800,
				"width": 800
				},
			"datePublished": "<?php the_time('Y/m/d')?>",
			"dateModified": "<?php the_modified_date('Y/m/d')?>",
			"author": {
				"@type": "Person",
				"name": "<?php the_author_meta('display_name');?>"
				},
			"publisher": {
				"@type": "Organization",
				"name": "<?php bloginfo('name');?>",
				"logo": {
					"@type": "ImageObject",
					"url": "<?php bloginfo('template_url');?>/img/logo.png",
					"width": 130,
					"height": 53
					}
				},
			"description": "<?php echo mb_substr(strip_tags($post->post_content),0,60);?>…"
		}
	</script>
	<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
	<script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
	<script async custom-element="amp-facebook" src="https://cdn.ampproject.org/v0/amp-facebook-0.1.js"></script>
	<script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>
	<script async custom-element="amp-vine" src="https://cdn.ampproject.org/v0/amp-vine-0.1.js"></script>
	<script custom-element="amp-twitter" src="https://cdn.ampproject.org/v0/amp-twitter-0.1.js" async></script>
	<script custom-element="amp-instagram" src="https://cdn.ampproject.org/v0/amp-instagram-0.1.js" async></script>
	<link rel="stylesheet" href="//fonts.googleapis.com/earlyaccess/notosansjapanese.css">
	<link rel="stylesheet" href="//fonts.googleapis.com/earlyaccess/notosans.css">
</head>
<body>
	<div class="siteinfo"><a href="<?php bloginfo('URL');?>">
		<p><amp-img src="<?php get_site_icon_url();?>" width="200px" height="200px" />
		<span class="title"><?php bloginfo('name');?></span></p>
	</a></div>
	<header>
		<?php twentyfifteen_post_thumbnail();
		the_title(sprintf('<h1 class="entry-title"><a href="%s" rel="bookmark">',esc_url(get_permalink())),'</a></h1>');?>
		<div itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="bread"><?php if(!is_home()&&!is_front_page()):
			$cat = is_single() ? get_the_category():array(get_category($cat));
			if($cat&&!is_wp_error($cat)){$par=get_category($cat[0]->parent);
			echo'<a href="'.home_url().'" itemprop="url"><span itemprop="title">Home</span></a><span class="sp">/</span>';
			while($par&&!is_wp_error($par)&&$par->term_id != 0){$echo='<a href="'.get_category_link($par->term_id).'" itemprop="url"><span itemprop="title">'.$par->name.'</span></a><span class="sp">/</span>'.$echo;$par=get_category($par->parent);}
			echo $echo.'<a href="'.get_category_link($cat[0]->term_id).'" itemprop="url"><span itemprop="title">'.$cat[0]->name.'</span></a>';}endif;?></div>
		<div class="meta"><?php twentyfifteen_entry_meta();?></div>
	</header>
	<section>
		<?php if(empty($post->post_password)):echo apply_filters('the_content',$post->post_content);endif;?>
	</section>
	<style amp-custom>
		body{font-style:"Noto Serif" sans-serif;line-height:1.5;}.siteinfo{width:100vw;height:15vh;background-color:#ffcc00;box-shadow:0 2px 2px 0 #999;text-align:center;}.title .siteinfo{font-size:26px;}.bread{color:#ddd;}.bread .sp{color:#333;margin:0 .5em;}header{text-align:center;margin:5px 0;}span .meta{padding:2px;}section{width:86vw;margin:0 7vw;}
		table{border-collapse:separate;border-spacing:1px;line-height:1.5;border-top:1px solid #ccc;}th{width:150px;padding:10px;font-weight:bold;vertical-align:top;border-bottom:1px solid #ccc;background:#efefef;text-align:center;}td{width:350px;padding:10px;vertical-align:top;border-bottom:1px solid #ccc;text-align:left;}
		amp-iframe,amp-img,h2,h3,h4{text-align:center;}h2,h3,h4{min-height:45px;}h3,h4{background-color:#fff;}h2{color:#fff;background:#ffcc00;}h3{border-left:10px solid #ffcc00;}h4{border-bottom:8px solid #ffcc00;}
	</style>
	<amp-pixel src="//ssl.google-analytics.com/collect?v=1&amp;tid=<?php echo get_option('Google_Analytics');?>&amp;t=pageview&amp;cid=$RANDOM&amp;dt=$TITLE&amp;dl=$CANONICAL_URL&amp;z=$RANDOM"></amp-pixel>
</body>
</html>