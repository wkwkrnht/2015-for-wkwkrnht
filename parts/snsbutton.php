<h2 class="sharebutton">Share Button</h2>
<div class="buttonarea">
  <a href="https://twitter.com/share?url=<?php echo get_permalink()?>&amp;text=<?php echo trim(wp_title('',false));?>&amp;via=wkwkrnht`" onclick="window.open(encodeURI(decodeURI(this.href),'tweetwindow','width=550,height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;" target="_blank"><div class="tweet"></div></a>
  <a href="http://www.facebook.com/share.php?u=<?php echo trim(wp_title('',false));?>" onclick="window.open(this.href,'window','width=550,height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;"><div class="fblike"></div></a>
  <a href="https://plus.google.com/share?url=<?php echo get_permalink()?>" target="_blank"><div class="g1"></div></a>
  <a href="http://line.me/R/msg/text/?<?php the_permalink();?>" target="_blank"><img src="<?php get_stylesheet_directory_uri();?>/img/line.svg" class="line"/></a>
  <a href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php echo get_permalink()?>&amp;title=<?php echo trim(wp_title('',false));?>" target="_blank"><img src="<?php get_stylesheet_directory_uri();?>/img/hatebu.svg" class="hatebu"/></a>
  <a href="http://getpocket.com/edit?url=<?php the_permalink();?>&amp;title=<?php echo trim(wp_title('',false));?>" onclick="window.open(this.href,'FBwindow','width=550,height=350,menubar=no,toolbar=no,scrollbars=yes');return false;"><div class="pocket"></div></a>
  <a href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=<?php echo get_permalink()?>" onclick="window.open(this.href,'window','width=550,height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;"><div class="tumblr"></div></a>
  <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink()?>&amp;title=<?php echo trim(wp_title('',false));?>" onclick="window.open(this.href,'window','width=550,height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;"><div class="linkedin"></div></a>
</div>