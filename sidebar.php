<section id="secondary" class="secondary">
	<?php if(is_adminnav_dsp()):?>
		<nav id="admin-navigation" class="admin-navigation" role="navigation">
			<?php if(!is_user_logged_in()):?>
				<a href="<?php echo esc_url(home_url());?>/wp-login.php" target="_blank" class="login"></a>
			<?php else:?>
				<a href="<?php echo esc_url(home_url());?>/wp-login.php?loggedout=true" target="_blank" class="logout"></a><a href="<?php echo esc_url(home_url());?>/wp-admin/post-new.php" target="_blank" class="addnew"></a><?php edit_post_link();?><a href="wlw://wkwkrnht.gegahost.net/?postid=<?php echo the_ID();?>" class="wlwedit"></a><a href="<?php echo esc_url(home_url());?>/wp-admin/" target="_blank" class="adminmenu"></a>
			<?php endif;?>
		</nav>
	<?php endif;?>
	<?php if(has_nav_menu('social')):?>
		<nav id="social-navigation" class="social-navigation" role="navigation">
			<?php wp_nav_menu(array('theme_location'=>'social','depth'=>1,'link_before'=>'<span class="screen-reader-text">','link_after'=>'</span>',));?>
		</nav>
	<?php endif;?>
	<?php if(has_nav_menu('primary')):?>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php wp_nav_menu(array('menu_class'=>'nav-menu','theme_location'=>'primary',));?>
		</nav>
	<?php endif;?>
	<?php if(is_active_sidebar('sidebar-1')):?>
		<div id="widget-area" class="widget-area" role="complementary"><?php dynamic_sidebar('sidebar-1');?></div>
	<?php endif;?>
	<footer id="site-footer">
		<div class="copyright" role="contentinfo">&copy;<?php echo get_first_post_year() . '&nbsp;';bloginfo('name');?></div>
	</footer>
</section>