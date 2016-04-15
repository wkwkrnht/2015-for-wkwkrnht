<nav id="admin-navigation" class="admin-navigation" role="navigation">
	<?php if(!is_user_logged_in()):?>
		<a href="<?php echo esc_url(home_url());?>/wp-login.php" target="_blank" class="loginbutton"></a>
	<?php else:?>
		<a href="<?php echo esc_url(home_url());?>/wp-admin/post-new.php" target="_blank" class="postnewbutton"></a>
		<?php if(is_home()):edit_post_link();endif;?>
		<a href="wlw://wkwkrnht.gegahost.net/?postid=<?php echo the_ID();?>" class="wlwedit"></a>
		<a href="<?php echo esc_url(home_url());?>/wp-admin/" target="_blank" class="adminmenubutton"></a>
	<?php endif;?>
	<?php if(is_pushnotice_dsp()):?>
      <a href="<?php echo get_option('Pushnotice_URL');?>" onclick="window.open(this.href,'window','width=550,height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;"><div class="pushnotice"></div></a>
    <?php else:?>
      <a href="https://push.dog/subscribe?url=<?php echo esc_url(home_url());?>" onclick="window.open(this.href,'window','width=550,height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;"><div class="pushnotice"></div></a>
    <?php endif;?>
</nav>