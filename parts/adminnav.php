<nav id="admin-navigation" class="admin-navigation" role="navigation">
	<?php if(!is_user_logged_in()):?>
		<a href="<?php echo esc_url(home_url());?>/wp-login.php" target="_blank" class="loginbutton"></a>
	<?php else:?>
		<a href="<?php echo esc_url(home_url());?>/wp-admin/post-new.php" target="_blank" class="postnewbutton"></a>
		<?php if(is_home()):edit_post_link( ,);echo'<a href="wlw://wkwkrnht.gegahost.net/?postid=';echo the_ID();echo'" class="wlwedit"></a>';else:echo'<a href="wlw://wkwkrnht.gegahost.net/?postid=';echo the_ID();echo'" class="wlwedit"></a>';endif;?>
		<a href="<?php echo esc_url(home_url());?>/wp-admin/" target="_blank" class="adminmenubutton"></a>
	<?php endif;?>
</nav>