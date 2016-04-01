<nav id="admin-navigation" class="admin-navigation" role="navigation">
	<?php if(!is_user_logged_in()):?>
		<a href="<?php echo esc_url(home_url());?>/wp-login.php" target="_blank" class="loginbutton"></a>
	<?php else:?>
		<a href="<?php echo esc_url(home_url());?>/wp-admin/post-new.php" target="_blank" class="postnewbutton"></a>
		<?php if(is_home()):edit_post_link();endif;?>
		<a href="wlw://wkwkrnht.gegahost.net/?postid=<?php echo the_ID();?>" class="wlwedit"></a>
		<a href="<?php echo esc_url(home_url());?>/wp-admin/" target="_blank" class="adminmenubutton"></a>
	<?php endif;?>
</nav>