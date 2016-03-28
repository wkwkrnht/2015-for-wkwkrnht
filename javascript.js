jQuery(document).ready(function(){jQuery('#movetop').click(function(){jQuery('body,html').animate({scrollTop:0},500);});});
jQuery(document).ready(function(){jQuery('code').each(function(i,block){hljs.highlightBlock(block);});});
jQuery(document).ready(function(){$('.embedly-card').embedly({key:'<?php echo get_option('embedly_API_Key');?>'});});