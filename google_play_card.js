(function(scripts,callback,errorback){
	var url=JSON.parse(jQuery('#script').attr('data-url'));
	if (typeof errorback != 'function')errorback = function(url){alert('jsloader load error: ' + url)};
	var cssRegexp = /.css$/;
	var load = function (url){
		if (cssRegexp.test(url)){
			var link = document.createElement('link');
			link.href = url;
			link.type = 'text/css';
			link.rel = 'stylesheet';
			(document.getElementsByTagName('head')[0] || document.body).appendChild(link);
			if (scripts.length){load(scripts.shift());}else{callback();}
		}else{
			var script = document.createElement('script');
			script.type = 'text/javascript';
			script.charset = 'utf-8';
			var current_callback;
			if (scripts.length){var u = scripts.shift();current_callback = function(){load(u)}}else{current_callback = callback;}
			if (window.ActiveXObject){ // IE
				script.onreadystatechange = function () {
					if (script.readyState == 'complete' || script.readyState == 'loaded') {current_callback();}
				}
			}else{
				script.onload = current_callback;
				script.onerror = function () {errorback(url)};
			}
			script.src = url;
			document.body.appendChild(script);
		}
	};
	load(scripts.shift());
})(["//cdn.jsdelivr.net/jquery/latest/jquery.min.js"],function (){
	/*
	 * @title AndroidHtml for Play version 3.1
	 * @description Androidマ�?ケ�?��で実行すると、アイコンやQRコード生成を行います。�?力文字�?は好きなようにカスタマイズしてください�?
	 * @include https://play.google.com/store/apps/
	 * @license MIT License
	 * @require jquery
	 */
	(function(jQuery){
		// URL
		var url = jQuery('link[rel="canonical"]').attr('href');
		if (!url) {url = document.location.href;}
		if (url.search(/details/) != -1) {
			var html = '';
			var target = jQuery('#body-content');
			// アプリの名前
			//var title = target.find('div[itemprop=name]').text().trim();
			var title = target.find('.document-title').text().trim();
			// サプライヤー
			var supplier = target.find('span[itemprop=name]').text().trim();
			// 価格
			var price = target.find('meta[itemprop=price]').attr('content');
			if (price == 0) {
				price = '価格:&nbsp;' + '<meta itemprop="price" content="' + price + '">無�?';
			} else {
				price = '価格:&nbsp;' + '<span itemprop="price">' + price + '</span>';
			}
			// アプリアイコンURL(chrome の場合 webp 形式なので png にする)
			var image = target.find('img[itemprop=image]').attr('src');
			if (image.slice(-3) == '-rw') image = image.replace('-rw', '');
			image = '<img src="' + image + '" alt="' + title + '" itemprop="image" style="height:120px;width:120px;max-width:100%;vertical-align:middle;border:0;margin:0 1em 0 0;">';
			// 評価
			var rating = target.find('meta[itemprop=ratingValue]').attr('content');
			rating = parseFloat(rating).toFixed(1);
			// ファビコン
			var favicon = jQuery('link[rel="shortcut icon"]').attr('href');
			var now = new Date();
			var date = now.getFullYear() + '/' + (now.getMonth() + 1) + '/' + now.getDate();
			html = '<div class="googleplay-card" itemscope itemtype="http://schema.org/MobileApplication">';
			var dl = '<dl class="info">';
			var dt = '<dt class="title"><img alt="Google play" class="favicon" src="' + favicon + '" />&nbsp;' + '<span itemprop="name">' + title + '</span>' + '</dt>';
			dl += dt;
			var dd = '<dd class="description">';
			dd += '<div class="thumb">' + image + '</div>';
			dd += '<div class="supplier" itemscope itemtype="http://schema.org/Organization">製作: ' + '<span itemprop="name">' + supplier + '</span></div>';
			dd += '<div class="review" itemtype="http://schema.org/AggregateRating" itemscope itemprop="aggregateRating">評価: ' + '<span itemprop="ratingValue">' + rating + '</span> / 5段階中</div>';
			dd += '<div class="price" itemtype="http://schema.org/Offer" itemscope itemprop="offers">' + price + '<small>' + ' (' + date + ' 時点)' + '</small><br /></div>';
			dd += '<a href="' + url + '" target="_blank" title="' + title + '" itemprop="url" class="dowmloadlink"><img src="//dl.dropboxusercontent.com/u/540358/ja_generic_rgb_wo_45.png" alt="ダウンロー�?"/></a>';
			dd += '<small><a target="_blank" href="http://hayashikejinan.com/?p=818">powerted by: hayashikejinan</a></small>';
			dd += '</dd>';
			dl += dd;
			dl += '</dl>';
			html += dl + '</div>';
			jQuery.getScript('//cdn.jsdelivr.net/jquery.ui/latest/jquery-ui.min.js', function () {
				jQuery('head').after('<link rel="stylesheet" href="//cdn.jsdelivr.net/jquery.ui/latest/themes/smoothness/jquery-ui.min.css" />');
				jQuery('<textarea style="width:370px !important;z-index:9999;">' + html + '</textarea>').dialog({ width: 400, height: 300, title: 'これを貼付け�?' });
			});
			//window.prompt('これを貼付け�?', html);
		}
	})(jQuery);
});
function(s,url,arg){s=document.createElement("script");s.charset="utf-8";s.src=url+"?s="+encodeURIComponent(arg);document.body.appendChild(s)};