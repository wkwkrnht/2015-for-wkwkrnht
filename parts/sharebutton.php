<script src="//static.evernote.com/noteit.js"></script>
<div id="fb-root"></div>
<script>(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.6&appId=951165034967338";fjs.parentNode.insertBefore(js,fjs);}(document,'script','facebook-jssdk'));</script>
<div class="snsshare">
  <div class="content">
    <a href="https://twitter.com/share?url=<?php echo get_permalink();?>&amp;text=<?php echo trim(wp_title('',false));?>&amp;via=<?php the_author_meta('twitter');?>" onclick="window.open(encodeURI(decodeURI(this.href),'tweetwindow','width=550,height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;" target="_blank"><div class="tweet button"></div></a>
    <a href="http://www.facebook.com/share.php?u=<?php echo trim(wp_title('',false));?>" onclick="window.open(this.href,'window','width=550,height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;"><div class="fb-like fb button"></div></a>
    <a href="http://line.me/R/msg/text/?<?php the_title(); ?>%0D%0A<?php the_permalink();?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri();?>/img/line.svg" alt="LINEで送る" class="line button"/></a>
    <a href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php echo get_permalink();?>&amp;title=<?php echo trim(wp_title('',false));?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri();?>/img/hatebu.svg" alt="hatebu" class="hatebu hatena button"/></a>
    <a href="https://plus.google.com/share?url=<?php echo get_permalink();?>" target="_blank"><div class="g1 button"></div></a>
    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink();?>&amp;title=<?php echo trim(wp_title('',false));?>" onclick="window.open(this.href,'window','width=550,height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;"><div class="linkedin button"></div></a>
  </div>
  <div class="content">
	<a href="#" onclick="Evernote.doClip({url:'<?php the_permalink();?>',providerName:'<?php bloginfo('name');?>',title:'<?php the_title();?>',contentId:'post-<?php the_ID();?>',});return false;" class="evernote-btn-link"><div class="evernote button"></div></a>
    <div class="fb-save fb button" data-uri="<?php echo get_permalink();?>"></div>
	<a data-pin-do="buttonBookmark" href="https://www.pinterest.com/pin/create/button/"><div class="printerest button"></div></a>
	<a href="http://getpocket.com/edit?url=<?php the_permalink();?>&amp;title=<?php echo trim(wp_title('',false));?>" onclick="window.open(this.href,'window','width=550,height=350,menubar=no,toolbar=no,scrollbars=yes');return false;"><div class="pocket button"></div></a>
    <a href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=<?php echo get_permalink();?>" onclick="window.open(this.href,'window','width=550,height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;"><div class="tumblr button"></div></a>
	<a href="#" onclick="javascript:(function(a,b,c,d){function%20e(a,c){if("undefined"!=typeof%20c){var%20d=b.createElement("input");d.name=a,d.value=c,d.type="hidden",p.appendChild(d)}}var%20f,g,h,i,j,k,l,m,n,o=a.encodeURIComponent,p=b.createElement("form"),q=b.getElementsByTagName("head")[0],r="_press_this_app",s=!0;if(d){if(!c.match(/^https?:/))return%20void(top.location.href=d);if(d+="&u="+o(c),c.match(/^https:/)&&d.match(/^http:/)&&(s=!1),a.getSelection?h=a.getSelection()+"":b.getSelection?h=b.getSelection()+"":b.selection&&(h=b.selection.createRange().text||""),d+="&buster="+(new%20Date).getTime(),s||(b.title&&(d+="&t="+o(b.title.substr(0,256))),h&&(d+="&s="+o(h.substr(0,512)))),f=a.outerWidth||b.documentElement.clientWidth||600,g=a.outerHeight||b.documentElement.clientHeight||700,f=800>f||f>5e3?600:.7*f,g=800>g||g>3e3?700:.9*g,!s)return%20void%20a.open(d,r,"location,resizable,scrollbars,width="+f+",height="+g);i=q.getElementsByTagName("meta")||[];for(var%20t=0;t<i.length&&!(t>200);t++){var%20u=i[t],v=u.getAttribute("name"),w=u.getAttribute("property"),x=u.getAttribute("content");x&&(v?e("_meta["+v+"]",x):w&&e("_meta["+w+"]",x))}j=q.getElementsByTagName("link")||[];for(var%20y=0;y<j.length&&!(y>=50);y++){var%20z=j[y],A=z.getAttribute("rel");("canonical"===A||"icon"===A||"shortlink"===A)&&e("_links["+A+"]",z.getAttribute("href"))}b.body.getElementsByClassName&&(k=b.body.getElementsByClassName("hfeed")[0]),k=b.getElementById("content")||k||b.body,l=k.getElementsByTagName("img")||[];for(var%20B=0;B<l.length&&!(B>=100);B++)n=l[B],n.src.indexOf("avatar")>-1||n.className.indexOf("avatar")>-1||n.width&&n.width<256||n.height&&n.height<128||e("_images[]",n.src);m=b.body.getElementsByTagName("iframe")||[];for(var%20C=0;C<m.length&&!(C>=50);C++)e("_embeds[]",m[C].src);b.title&&e("t",b.title),h&&e("s",h),p.setAttribute("method","POST"),p.setAttribute("action",d),p.setAttribute("target",r),p.setAttribute("style","display:%20none;"),a.open("about:blank",r,"location,resizable,scrollbars,width="+f+",height="+g),b.body.appendChild(p),p.submit()}})(window,document,top.location.href,"http:\/\/wkwkrnht.wp.xdomain.jp\/wp-admin\/press-this.php?v=8");"><div class="press-this button"></div></a>
  </div>
  <div class="content">
	<?php if(function_exists('print_embed_sharing_button')){print_embed_sharing_button();};?>
	<a href="http://cdn.embedly.com/widgets/embed?url=<?php the_permalink();?>" onclick="window.open(this.href,'window','width=550,height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;"><img src="<?php echo get_stylesheet_directory_uri();?>/img/embed.svg" alt="embedly" class="embedly button"/></a>
	<a href="#" onclick="window.open().document;d.writeln('<textarea%20rows=1%20cols=40>'+'<code><iframe class="hatenablogcard" style="width:100%;height:155px;margin:15px 0;max-width:680px;" title="<?php the_title();?>" src="http://hatenablog.com/embed?url=<?php echo get_permalink();?>" frameborder="0" scrolling="no"></iframe></code>'+'</textarea>');return false;" target="_blank"><div class="hatena-card hatena button"></div></a>
	
	
	
  </div>
</div>