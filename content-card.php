<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php twentyfifteen_post_thumbnail();?>
	<div class="card-content">
		<h1 class="title"><?php if(is_single() ) :
				the_title();
			else :
				the_title(sprintf('<a href="%s" rel="bookmark">',esc_url(get_permalink())), '</a>');
			endif;?></h1>
		<span class=metadate><?php echo get_the_date();echo ('（');echo yumepyon_diff();echo('）')?></span>
		<?php printf('<span class="byline"><span class="author vcard"><span class="screen-reader-text">%1$s </span><a class="url fn n" href="%2$s">%3$s</a></span></span>',_x('Author','Used before post author name.','twentyfifteen'),esc_url(get_author_posts_url(get_the_author_meta( 'ID' ))),get_the_author());
		 edit_post_link( __('Edit','twentyfifteen'),'<span class="edit-link"></span>');?>
	</div><!-- .card-content -->
</article><!-- #post-## -->
