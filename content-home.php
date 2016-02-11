<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php twentyfifteen_post_thumbnail();?>
	<header class="home-header">
		<?php if ( is_single() ) :
				the_title( '<h1 class="title">', '</h1>' );
			else :
				the_title(sprintf('<h1 class="title"><a href="%s" rel="bookmark">', esc_url(get_permalink())),'</a></h1>');
			endif;?>
	</header><!-- .entry-header -->
	<div class="home-content">
		<?php the_content(sprintf( __('Continue reading %s','twentyfifteen'),the_title('<span class="screen-reader-text">','</span>',false)));//%s=Name of current post
			wp_link_pages(array(
				'before'      =>'<div class="page-links"><span class="page-links-title">' . __('Pages:','twentyfifteen').'</span>',
				'after'       =>'</div>',
				'link_before' =>'<span>',
				'link_after'  =>'</span>',
				'pagelink'    =>'<span class="screen-reader-text">' . __('Page', 'twentyfifteen').' </span>',
				'separator'   =>'<span class="screen-reader-text">, </span>',) );?>
	</div><!-- .entry-content -->
	<footer class="home-footer">
		<?php twentyfifteen_entry_meta(); ?>
		<span><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . '前に投稿しました'; ?></span>
		<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link"></span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
