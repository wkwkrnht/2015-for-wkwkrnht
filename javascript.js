function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)}(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create',<?php echo get_option('Google_Analytics');?>,'auto');ga('send','pageview');
jQuery(document).ready(function(){jQuery('code').each(function(i,block){hljs.highlightBlock(block);});});
jQuery('#page-top').click(function(){jQuery('#main').animate({scrollTop:0},slow);});