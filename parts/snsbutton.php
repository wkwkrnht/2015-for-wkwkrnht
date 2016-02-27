<h2 class="share">Share Button</h2>
<div class="snsbutton">
  <a class="tweet" href="https://twitter.com/share?url=<?php echo get_permalink()?>&amp;text=<?php echo trim(wp_title('', false));?>&amp;via=wkwkrnht`" onclick="window.open(encodeURI(decodeURI(this.href),'tweetwindow','width=550,height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;" target="_blank">\f202</a>
  <a class="fblike" href="http://www.facebook.com/share.php?u=<?php echo trim(wp_title('',false);?>" onclick="window.open(this.href,'window','width=550,height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;">\f203</a>
  <a class="g1" href="https://plus.google.com/share?url=<?php echo get_permalink()?>" target="_blank">\f206</a>
  <a class="line" href="http://line.me/R/msg/text/?<?php the_permalink();?>" target="_blank"><img src="img\line.svg"/></a>
  <a class="hatebu" href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php echo get_permalink()?>&amp;title=<?php echo trim(wp_title('', false);?>" target="_blank"><img src="img\hatebu.svg"/></a>
  <a class="pocket" href="http://getpocket.com/edit?url=<?php the_permalink();?>&amp;title=<?php echo trim(wp_title('', false);?>" onclick="window.open(this.href,'FBwindow','width=550,height=350,menubar=no,toolbar=no,scrollbars=yes');return false;">\f224</a>
  <a class="tumblr" href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=<?php echo get_permalink()?>" onclick="window.open(this.href,'window','width=550,height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;">\f214</a>
  <a class="linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink()?>&amp;title=<?php echo trim(wp_title('', false);?>" onclick="window.open(this.href,'window','width=550,height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;">\f208</a>
</div>