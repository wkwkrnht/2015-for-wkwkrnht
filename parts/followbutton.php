<div class="snsshare">
  <div class="content">
	<?php if(is_pushnotice_dsp()):?>
      <a href="<?php echo get_option('Pushnotice_URL');?>" onclick="window.open(this.href,'window','width=550,height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;"><div class="pushnotice button"></div></a>
    <?php else:?>
      <a href="https://push.dog/subscribe?url=<?php echo esc_url(home_url());?>" onclick="window.open(this.href,'window','width=550,height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;"><div class="pushnotice button"></div></a>
    <?php endif;?>
  </div>
</div>