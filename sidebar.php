<section id="secondary" class="secondary">
	<?php //if(is_adminnav_dsp()):?>
		<?php get_template_part('parts/adminnav');?>
	<?php //endif;?>
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
		<div class="copyright" role="contentinfo">&copy;2016<?php bloginfo('name');?></div>
	</footer>
</section>