<footer class="entry-footer">
	<h2><?php echo get_option('entryfooter_txt')?></h2>
	<?php if(is_active_sidebar('8')):
		dynamic_sidebar('8');
	else:
		get_template_part('parts/snsbutton');get_template_part('parts/related');
	endif;?>
</footer>