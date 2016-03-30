<footer class="entry-footer">
	<div id="slide">
		<?php if(is_active_sidebar('8')):
			dynamic_sidebar('8');
		else:
			echo'<h2>Share＆関連記事</h2>';
			get_template_part('parts/snsbutton');get_template_part('parts/related');
		endif;?>
	</div>
</footer>