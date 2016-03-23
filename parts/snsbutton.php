<div class="snsshare">
  <div class="content">
    <a href="https://twitter.com/share?url=<?php echo get_permalink()?>&amp;text=<?php echo trim(wp_title('',false));?>&amp;via=<?php the_author_meta('twitter');?>" onclick="window.open(encodeURI(decodeURI(this.href),'tweetwindow','width=550,height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;" target="_blank"><div class="tweet button"></div></a>
    <a href="http://www.facebook.com/share.php?u=<?php echo trim(wp_title('',false));?>" onclick="window.open(this.href,'window','width=550,height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;"><div class="fblike button"></div></a>
    <a href="http://line.me/R/msg/text/?<?php the_permalink();?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri();?>/img/line.svg" class="line button"/></a>
    <a href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php echo get_permalink()?>&amp;title=<?php echo trim(wp_title('',false));?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri();?>/img/hatebu.svg" class="hatebu button"/></a>
    <a href="http://getpocket.com/edit?url=<?php the_permalink();?>&amp;title=<?php echo trim(wp_title('',false));?>" onclick="window.open(this.href,'FBwindow','width=550,height=350,menubar=no,toolbar=no,scrollbars=yes');return false;"><div class="pocket button"></div></a>
    <a href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=<?php echo get_permalink()?>" onclick="window.open(this.href,'window','width=550,height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;"><div class="tumblr button"></div></a>
  </div>
  <div class="content">
    <a href="https://plus.google.com/share?url=<?php echo get_permalink()?>" target="_blank"><div class="g1 button"></div></a>
    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink()?>&amp;title=<?php echo trim(wp_title('',false));?>" onclick="window.open(this.href,'window','width=550,height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;"><div class="linkedin button"></div></a>
    <?php if(get_option('Pushnotice_Dsp')):?>
      <a href="<?php echo get_option('Pushnotice_URL')?>" onclick="window.open(this.href,'window','width=550,height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;"><div class="pushnotice button"></div></a>
    <?php else:?>
      <a href="https://push.dog/subscribe?url=<?php echo esc_url(home_url())?>" onclick="window.open(this.href,'window','width=550,height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;"><div class="pushnotice button"></div></a>
    <?php endif;?>
  </div>
</div>