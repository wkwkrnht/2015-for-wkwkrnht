<!DOCTYPE html>
<html <?php language_attributes();?> class="no-js">
<head>
	<?php if(get_post_meta(get_the_ID(),'noindex',true)==1)echo '<meta name="robots" content="noindex">'?>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width">
	<meta name="theme-color" content="#ffcc00">
	<meta name="description" content="<?php if(is_category()){echo get_meta_description_from_category()}else{echo bloginfo('description')}?>">
	<meta name="keywords" content="<?php if(is_single()){echo get_the_tags()}elseif(is_category()){echo get_meta_keyword_from_category()};?>">
	<?php get_template_part('inc/ogp');?>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url');?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() );?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head();?>
	<script src="<?php echo get_stylesheet_directory_uri();?>/javascript.js" charset="UTF-8"></script>
</head>
<body <?php body_class();?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content','twentyfifteen');?></a>
	<div id="sidebar" class="sidebar">
		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
				<?php if(is_front_page()&&is_home()):?>
						<h1 class="site-title"><a href="<?php echo esc_url(home_url('/'));?>" rel="home"><?php bloginfo('name');?></a></h1>
					<?php else:?>
						<p class="site-title"><a href="<?php echo esc_url(home_url('/'));?>" rel="home"><?php bloginfo('name');?></a></p>
					<?php endif;
					$description = get_bloginfo('description','display');
					if($description||is_customize_preview()):?>
						<p class="site-description"><?php echo $description;?></p>
					<?php endif;?>
				<button class="secondary-toggle"><?php _e('Menu and widgets','twentyfifteen');?></button>
			</div><!-- .site-branding -->
		</header><!-- .site-header -->
		<?php get_sidebar();?>
	</div><!-- .sidebar -->
	<div id="content" class="site-content">
