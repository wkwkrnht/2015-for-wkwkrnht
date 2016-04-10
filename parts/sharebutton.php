<div class="snsshare">
  <div class="content">
    <a href="https://twitter.com/share?url=<?php echo get_permalink();?>&amp;text=<?php echo trim(wp_title('',false));?>&amp;via=<?php the_author_meta('twitter');?>" onclick="window.open(encodeURI(decodeURI(this.href),'tweetwindow','width=550,height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;" target="_blank"><div class="tweet button"></div></a>
    <a href="http://www.facebook.com/share.php?u=<?php echo trim(wp_title('',false));?>" onclick="window.open(this.href,'window','width=550,height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;"><div class="fblike button"></div></a>
    <a href="http://line.me/R/msg/text/?<?php the_title(); ?>%0D%0A<?php the_permalink();?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri();?>/img/line.svg" alt="LINEで送る" class="line button"/></a>
    <a href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php echo get_permalink();?>&amp;title=<?php echo trim(wp_title('',false));?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri();?>/img/hatebu.svg" alt="hatebu" class="hatebu button"/></a>
    <a href="http://getpocket.com/edit?url=<?php the_permalink();?>&amp;title=<?php echo trim(wp_title('',false));?>" onclick="window.open(this.href,'window','width=550,height=350,menubar=no,toolbar=no,scrollbars=yes');return false;"><div class="pocket button"></div></a>
    <a href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=<?php echo get_permalink();?>" onclick="window.open(this.href,'window','width=550,height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;"><div class="tumblr button"></div></a>
  </div>
  <script src="//static.evernote.com/noteit.js"></script>
  <div class="content">
    <a href="https://plus.google.com/share?url=<?php echo get_permalink()?>" target="_blank"><div class="g1 button"></div></a>
    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink()?>&amp;title=<?php echo trim(wp_title('',false));?>" onclick="window.open(this.href,'window','width=550,height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;"><div class="linkedin button"></div></a>
	<a data-pin-do="buttonBookmark" href="https://www.pinterest.com/pin/create/button/"><div class="printerest button"></div></a>
	<a href="#" onclick="Evernote.doClip({url:'<?php the_permalink();?>',providerName:'<?php bloginfo('name');?>',title:'<?php the_title();?>',contentId:'post-<?php the_ID();?>',});return false;" class="evernote-btn-link"><div class="evernote button"></div></a>
	<a href="http://cdn.embedly.com/widgets/embed?url=<?php the_permalink();?>" onclick="window.open(this.href,'window','width=550,height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;"><img src="<?php echo get_stylesheet_directory_uri();?>/img/embed.svg" alt="embedly" class="embedly button"/></a>
  </div>
</div>