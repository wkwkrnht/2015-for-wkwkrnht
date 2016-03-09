function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)}(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create',<?php echo get_option('analytics_code');?>,'auto');ga('send','pageview');
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
