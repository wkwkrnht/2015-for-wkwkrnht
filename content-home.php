<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php twentyfifteen_post_thumbnail();?>
	<div class="card-content">
		<?php if (is_single() ) :
				the_title('<h1 class="title">','</h1>');
			else :
				the_title(sprintf('<h1 class="title"><a href="%s" rel="bookmark">',esc_url(get_permalink())),'</a></h1>');
			endif;?>
			<?php twentyfifteen_entry_meta(); ?>
			<span><?php echo human_time_diff( get_the_time('U'),current_time('timestamp') ) . '前に投稿しました';?></span>
			<?php edit_post_link( __('Edit','twentyfifteen'),'<span class="edit-link"></span>');?>
	</div><!-- .card-content -->
</article><!-- #post-## -->
