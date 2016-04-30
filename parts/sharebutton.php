<div id="flex" class="snsshare">
	<div class="content">
		<a href="https://twitter.com/share?url=<?php echo get_permalink();?>&amp;text=<?php echo trim(wp_title('',false));?>&amp;via=<?php the_author_meta('twitter');?>" class="sharewindow" target="_blank"><div class="tweet button"></div></a>
		<a href="http://www.facebook.com/share.php?u=<?php echo rawurlencode(get_permalink());?>" class="sharewindow" target="_blank"><div class="fb-like fb button"></div></a>
		<a href="http://line.me/R/msg/text/?<?php the_title();?>%0D%0A<?php the_permalink();?>" class="sharewindow" target="_blank"><img src="<?php echo get_stylesheet_directory_uri();?>/img/line.svg" alt="LINEで送る" class="line button"/></a>
		<a href="https://plus.google.com/share?url=<?php echo get_permalink();?>" class="sharewindow" target="_blank"><div class="g1 button"></div></a>
		<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink();?>&amp;title=<?php echo trim(wp_title('',false));?>" class="sharewindow" target="_blank"><div class="linkedin button"></div></a>
	</div>
	<div class="content">
		<a href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php echo get_permalink();?>&amp;title=<?php echo trim(wp_title('',false));?>" target="_blank"><div class="hatebu hatena button"></div></a>
		<a href="http://getpocket.com/edit?url=<?php the_permalink();?>&amp;title=<?php echo trim(wp_title('',false));?>" class="sharewindow" target="_blank"><div class="pocket button"></div></a>
		<a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&media=<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID));?>"><div class="printerest button"></div></a>
		<a href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=<?php echo get_permalink();?>" class="sharewindow" target="_blank"><div class="tumblr button"></div></a>
		<a href="http://cdn.embedly.com/widgets/embed?url=<?php the_permalink();?>" class="sharewindow" target="_blank"><div class="embedly button"></div></a>
	</div>
</div>
<script>(function(){var shareButton=document.getElementsByClassName("sharewindow");for(var i=0;i<shareButton.length;i++){shareButton[i].addEventListener("click",function(e){e.preventDefault();window.open(this.href,"SNS_window","width=600,height=500,menubar=no,toolbar=no,scrollbars=yes");},false);}})()</script>