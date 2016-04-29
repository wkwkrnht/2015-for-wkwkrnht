<footer class="entry-footer">
	<h2><?php echo get_option('entryfooter_txt')?></h2>
	<div id="flex">
		<?php if(is_active_sidebar('8')):
			dynamic_sidebar('8');
		else:
			get_template_part('parts/snsbutton');get_template_part('parts/related');
		endif;?>
	</div>
	<script src="google_play_card.js"></script><div id="googleplay-card" data-url="https://play.google.com/store/apps/details?id=jp.ddo.pigsty.HabitBrowser&hl=ja"></div>
</footer>