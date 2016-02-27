jQuery( function(){
  var topBth = jQuery('#page-top');//スクロールしてトップ
    topBth.click(function(){jQuery('body,html').animate({scrollTop:0},500);return false;});
});