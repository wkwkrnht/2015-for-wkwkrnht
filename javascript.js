jQuery(function(){
  //top-button
  jQuery('#page-top').click(function(){jQuery('body,html').animate({scrollTop:0},500);return false;});
  //目次
  $('#toc').toc({
    'selectors':'.entry-content h2,.entry-content h3',//目次として表示する要素のCSSセレクターを指定
    'container':'body',//コンテナ要素
    'smoothScrolling': true, //スムーズなスクロールを有効にするか
    'prefix': 'toc',//アンカータグとクラス名のプレフィックス
    'onHighlight':function(el){},//新しいセクションがハイライトされたときの動作を指定
    'highlightOnScroll':true,//ハイライトを有効にするか
    'highlightOffset':100,//次の見出しのトリガーとなるオフセット位置
    'anchorName':function(i,heading,prefix){return prefix+i;},//アンカーネームのカスタマイズ
    'headerText':function(i,heading,$heading){return $heading.text();},//ヘッダーアイテムテキストのカスタマイズ
    'itemClass':function(i,heading,$heading,prefix){return $heading[0].tagName.toLowerCase();}//アイテムクラスのカスタマイズ
  });
  //next
});
