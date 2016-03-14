<?php
/**
 * The sidebar containing the main widget area
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0*/?>
<div id="secondary" class="secondary">
	<?php if(has_nav_menu('primary')):?>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php wp_nav_menu(array('menu_class'=>'nav-menu','theme_location'=>'primary',));?>
		</nav>
	<?php endif;?>
	<?php if(has_nav_menu('social')):?>
		<nav id="social-navigation" class="social-navigation" role="navigation">
			<?php wp_nav_menu(array('theme_location'=>'social','depth'=>1,'link_before'=>'<span class="screen-reader-text">','link_after'=>'</span>',));?>
		</nav>
	<?php endif;?>
	<?php if(is_active_sidebar('sidebar-1')):?>
		<div id="widget-area" class="widget-area" role="complementary"><?php dynamic_sidebar('sidebar-1');?></div>
	<?php endif;?>
	<footer id="site-footer">
		<div class="site-info"role="contentinfo"><?php do_action('twentyfifteen_credits');?></div>
		<div class="copyright">&copy;2016<?php bloginfo('name');?></div>
	</footer>
</div>