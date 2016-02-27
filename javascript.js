jQuery(function(){
  //top-button
  jQuery('#page-top').click(function(){jQuery('body,html').animate({scrollTop:0},500);return false;});
  //favicon
  jQuery('a[href^="http://"]').filter(function(){return this.hostname && this.hostname !== location.hostname;}).each(function(){
        var l = jQuery(this);
        var fu =l.attr('href').replace(/^(http:\/\/[^\/]+).*jQuery/, 'jQuery1') + '/favicon.ico';
        var fi = jQuery('<img src="favicon.png" alt="favicon"/>')['prependTo'](l);
        var e = new Image();
        e.src = fu;
        if (e.complete) fi.attr('src',fu);
          else e.onload = function(){fi.attr('src',fu);};
        });
  //目次
  function makeMokuji(){
		var idcount = 1;
		var mokuji = '';
		var currentlevel = 0
		var sectionTopArr = new Array();
		jQuery('entry-content h2,entry-content h3,entry-content h4').each(function(i){
			this.id = 'chapter-' + idcount;
			idcount ++;
			var level = 0;
			if(this.nodeName.toLowerCase() == 'h2'){level = 1;}else if(this.nodeName.toLowerCase() == 'h3'){level = 2;}else if(this.nodeName.toLowerCase() == 'h4'){level = 3;}
			while(currentlevel < level) {mokuji += '<ol class="chapter">';currentlevel ++;}
			while(currentlevel > level) {mokuji += '</ol>';currentlevel --;}
			mokuji += '<li><a href="#' + this.id + '">' + jQuery(this).html() + '</a></li>\n';
		});
		while(currentlevel > 0) {mokuji += '</ol>';currentlevel --;}
		strMokuji = '<h4>目次<span class="closeBtn"><i class="fa fa-times-circle-o"></i></span></h4>\<div class="mokujiInner">'+ mokuji +'</div>';
		jQuery('.mokuji').html(strMokuji);
		jQuery('.mokuji li').not('.accordion, .accBtn').click(function(){
			var speed = 800;
			var href = jQuery(this).find('a').attr('href');
			var target = jQuery(href == '#' || href == '' ? 'html' : href);
			var position = target.offset().top;
			jQuery('html, body').stop().animate({scrollTop:position}, speed,'easeInOutCirc');
			return false;
		});
		jQuery('.mokuji ol').prev().addClass('accordion').append('<span class="accBtn"><i class="fa fa-plus-square-o"></i></span>');
		jQuery('.mokuji li.accordion').wrapInner('<div class="inner clearfix"></div>');
		jQuery('.accBtn').click(function(){
			jQuery(this).parents('li').next().stop().slideToggle(300,'easeInOutCirc');
			jQuery('.closeBtn').removeClass('active').addClass('active');
			if(jQuery(this).find('i').hasClass('fa-plus-square-o')){jQuery(this).find('i').removeClass('fa-plus-square-o').addClass('fa-minus-square-o');}else{jQuery(this).find('i').removeClass('fa-minus-square-o').addClass('fa-plus-square-o');}
			return false;
		});
		var closeBtnFlag = '';
		jQuery('.mokuji li').each(function(){if(jQuery(this).hasClass('accordion')){closeBtnFlag = false;}});
		if( closeBtnFlag == true ) {jQuery('.closeBtn').hide();}
		jQuery('.closeBtn').click(function(){
			jQuery(this).toggleClass('active');
			if( jQuery(this).hasClass('active') ){
				jQuery('.mokuji ol ol').stop().slideDown(300, 'easeInOutCirc');
				jQuery('.accBtn').find('i').removeClass('fa-plus-square-o').addClass('fa-minus-square-o');
			}else{
				jQuery('.mokuji ol ol').stop().slideUp(300, 'easeInOutCirc');
				jQuery('.accBtn').find('i').removeClass('fa-minus-square-o').addClass('fa-plus-square-o');
			}
		});
		var secTopArr = new Array();
		secTopArr.length = 0;
		var current = -1;
		jQuery('article [id^="chapter"]').each(function(i){secTopArr[i] = jQuery(this).offset().top;});
		jQuery(window).on('load scroll',function(){
			for (var i = secTopArr.length-1; i>=0; i--) {
				if(jQuery(window).scrollTop() > secTopArr[i] - 20){
					jQuery('.mokuji li').removeClass('current').eq(i).addClass('current');
					jQuery('.mokuji ol ol li.current').parent('ol').prev().addClass('current');
					break;
				}
			}
		});
	}
	makeMokuji();
	function fixedSide(){
		var w = window.innerWidth;
		var mainH = jQuery('#main').height();
		var sideH = jQuery('#side').height();
		var fixedElm = '';
		if(mainH > sideH){
			fixedElm = jQuery('.mokuji');
			var fixedSideTop = fixedElm.offset().top;
			var footerTop = jQuery('footer').offset().top;
			var scrollBottom = jQuery('body').height() - jQuery(window).height() - jQuery('footer').outerHeight();
			jQuery(window).scroll(function(){
				y = jQuery(window).scrollTop();
				if(y > fixedSideTop){fixedElm.addClass('fixed-side');}else{fixedElm.removeClass('fixed-side');}
			});
		}
	}
	fixedSide();
  //next
});