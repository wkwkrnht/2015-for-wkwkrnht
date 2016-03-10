function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)}(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create',<?php echo get_option('ganalytics');?>,'auto');ga('send','pageview');
jQuery(function(){
  //top-button
  jQuery('#page-top').click(function(){jQuery('body,html').animate({scrollTop:0},500);return false;});
  //目次
  jQuery('#toc').toc({
    'selectors':'.entry-content h2,.entry-content h3',//目次として表示する要素のCSSセレクターを指定
    'container':'body',//コンテナ要素
    'smoothScrolling':true, //スムーズなスクロールを有効にするか
    'prefix':'toc',//アンカータグとクラス名のプレフィックス
    'onHighlight':function(el){},//新しいセクションがハイライトされたときの動作を指定
    'highlightOnScroll':true,//ハイライトを有効にするか
    'highlightOffset':100,//次の見出しのトリガーとなるオフセット位置
    'anchorName':function(i,heading,prefix){return prefix+i;},//アンカーネームのカスタマイズ
    'headerText':function(i,heading,$heading){return $heading.text();},//ヘッダーアイテムテキストのカスタマイズ
    'itemClass':function(i,heading,$heading,prefix){return $heading[0].tagName.toLowerCase();}//アイテムクラスのカスタマイズ
  });
  //slide
  jQuery(document).ready(function(){
	  jQuery('#next').click(function(event){event.preventDefault();jQuery('#slide').animate({scrollLeft:'+=455'},'slow');});
	  jQuery('#pre').click(function(event){event.preventDefault();jQuery('#slide').animate({scrollRight:'+=455'},'slow');});});
  //next
});
jQuery(document).ready(function(jQuery){
	function getRightClick(e){var rightclick;
		if(!e) var e = window.event;
		if(e.which) rightclick = (e.which == 3);
		else if(e.button) rightclick = (e.button == 2);
		return rightclick;
	}
	function getSelectionText(){var text = "";
	    if(window.getSelection){text = window.getSelection().toString();
	    }else if(document.selection && document.selection.type != "Control"){text = document.selection.createRange().text;}
	    return text;
	}
	jQuery('.entry-content').mousedown(function (event){
		jQuery('body').attr('mouse-top',event.clientY+window.pageYOffset);
		jQuery('body').attr('mouse-left',event.clientX);
		if(!getRightClick(event) && getSelectionText().length > 0){jQuery('.twtshare').remove();document.getSelection().removeAllRanges();}
	});
  	jQuery('.entry-content').mouseup(function (event){var t=jQuery(event.target);var st=getSelectionText();
       	if(st.length > 3 && !getRightClick(event)){mts = jQuery('body').attr('mouse-top');
      	 	mte = event.clientY+window.pageYOffset;
      	 	if(parseInt(mts) < parseInt(mte)) mt = mts;
      	 		else mt = mte;
      	 	mlp = jQuery('body').attr('mouse-left');
      	 	mrp = event.clientX;
      	 	ml = parseInt(mlp)+(parseInt(mrp)-parseInt(mlp))/2;
      	 	sl = window.location.href.split('?')[0];
      	 	maxl = 107;
      	 	st = st.substring(0,maxl);
      	 	st = st+' @wpmudev';
      	 	jQuery('body').append("<a href=\"https://twitter.com/share?url="+encodeURIComponent(sl)+"&text="+encodeURIComponent(st)+"\" class='twtshare icon-social-twitter' onclick=\"window.open(this.href, \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600\');return false;\"></a>");
      	 	jQuery('.twtshare').css({position: 'absolute',top: parseInt(mt)-60,left: parseInt(ml)});
     	}
  });
});