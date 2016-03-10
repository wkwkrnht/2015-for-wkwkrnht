function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)}(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create',<?php echo get_option('ganalytics');?>,'auto');ga('send','pageview');
jQuery(function(){
  //top-button
  jQuery('#page-top').click(function(){jQuery('body,html').animate({scrollTop:0},500);return false;});
  //slide
  jQuery(document).ready(function(){
	  jQuery('#next').click(function(event){event.preventDefault();jQuery('#slide').animate({scrollLeft:'+=455'},'slow');});
	  jQuery('#pre').click(function(event){event.preventDefault();jQuery('#slide').animate({scrollRight:'+=455'},'slow');});});
  //next
});