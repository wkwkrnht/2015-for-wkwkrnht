<!DOCTYPE html>
<html <?php language_attributes();?> class="no-js">
<head>
	<?php if(get_post_meta(get_the_ID(),'noindex',true)==1){echo'<meta name="robots" content="noindex">';};?>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width">
	<?php /*get_template_part('inc/meta');*/get_template_part('inc/ogp');?>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url');?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url(get_template_directory_uri());?>/js/html5.js"></script>
	<![endif]-->
	<script src="<?php echo esc_url(home_url());?>/wp-content/themes/2015-for-wkwkrnht/javascript.js" charset="UTF-8"></script>
	<?php if(get_skin_file()):?><link rel="stylesheet" href="<?php echo get_skin_file();?>"><?php endif;
	wp_head();?>
</head>
<body <?php body_class();?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content','twentyfifteen');?></a>
	<section id="sidebar" class="sidebar">
		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
				<button class="secondary-toggle"><?php _e('Menu and widgets','twentyfifteen');?></button>
				<?php if(is_front_page()&&is_home()):?>
					<h1 class="site-title"><a href="<?php echo esc_url(home_url('/'));?>" rel="home"><?php bloginfo('name');?></a></h1>
				<?php else:?>
					<p class="site-title"><a href="<?php echo esc_url(home_url('/'));?>" rel="home"><?php bloginfo('name');?></a></p>
				<?php endif;?>
			</div>
		</header>
		<?php get_sidebar();?>
	</section>
	<section id="content" class="site-content">