<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php twentyfifteen_post_thumbnail();?>
	<div class="card-content">
		<?php if (is_single() ) :
				the_title('<h1 class="title">','</h1>');
			else :
				the_title(sprintf('<h1 class="title"><a href="%s" rel="bookmark">',esc_url(get_permalink())),'</a></h1>');
			endif;?>
		<span><?php echo get_the_date(); '('human_time_diff(get_the_time('U'),current_time('timestamp') ).'前の投稿)';?></span>
		<?php printf('<span class="byline"><span class="author vcard"><span class="screen-reader-text">%1$s </span><a class="url fn n" href="%2$s">%3$s</a></span></span>',_x('Author','Used before post author name.','twentyfifteen'),esc_url(get_author_posts_url(get_the_author_meta( 'ID' ))),get_the_author());?>
		<?php edit_post_link( __('Edit','twentyfifteen'),'<span class="edit-link"></span>');?>
	</div><!-- .card-content -->
</article><!-- #post-## -->
